<?php
session_start();

require __DIR__ . '/includes/env.php';
load_env(__DIR__ . '/.env');

$to_email = $_ENV['TO_ADDRESS']   ?? 'contact@percival-systems.com';
$from_email = $_ENV['FROM_ADDRESS'] ?? 'no-reply@percival-systems.com';

function ps_back_with_errors(array $errors, array $old) {
    $_SESSION['contact_errors'] = $errors;
    $_SESSION['contact_old']    = $old;
    header('Location: /contact.php?status=error');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact.php');
    exit;
}

// CSRF check
$token = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
    ps_back_with_errors(['Your session expired. Please try again.'], []);
}

// Honeypot: if filled out, it's a bot, so pretend success and drop it
if (!empty($_POST['website'])) {
    header('Location: /contact.php?status=success');
    exit;
}

$name         = trim($_POST['name'] ?? '');
$email        = trim($_POST['email'] ?? '');
$subject      = trim($_POST['subject'] ?? '');
$service_type = trim($_POST['service_type'] ?? '');
$budget       = trim($_POST['budget'] ?? '');
$timeline     = trim($_POST['timeline'] ?? '');
$message      = trim($_POST['message'] ?? '');
$captcha      = trim($_POST['g-recaptcha-response'] ?? '');

$old = [
    'name'         => $name,
    'email'        => $email,
    'subject'      => $subject,
    'service_type' => $service_type,
    'budget'       => $budget,
    'timeline'     => $timeline,
    'message'      => $message,
];

$errors = [];

if ($name === '' || mb_strlen($name) > 150) {
    $errors[] = 'Please enter a valid name.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 190) {
    $errors[] = 'Please enter a valid email address.';
}
if ($subject === '' || mb_strlen($subject) > 200) {
    $errors[] = 'Please enter a subject.';
}
if ($message === '' || mb_strlen($message) > 5000) {
    $errors[] = 'Please enter a message (up to 5000 characters).';
}

// reCAPTCHA verification
$captcha_secret = $_ENV['CAPTCHA_SECRET_KEY'] ?? '';
if ($captcha_secret === '' || $captcha_secret === 'your_secret_key_here') {
    $errors[] = 'reCAPTCHA is not configured on the server.';
} elseif ($captcha === '') {
    $errors[] = 'Please complete the reCAPTCHA verification.';
} else {
    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query([
            'secret'   => $captcha_secret,
            'response' => $captcha,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ]),
        CURLOPT_TIMEOUT        => 10,
    ]);
    $verify_raw = curl_exec($ch);
    curl_close($ch);

    $verify = json_decode($verify_raw ?: '{}', true);
    if (empty($verify['success'])) {
        $errors[] = 'reCAPTCHA verification failed. Please try again.';
    }
}

if (!empty($errors)) {
    ps_back_with_errors($errors, $old);
}

// Human-readable labels for the email body
$service_type_labels = [
    'web'            => 'Web Development',
    'software'       => 'Custom Software Development',
    'infrastructure' => 'Infrastructure & Systems Administration',
    'networking'     => 'Networking & IT',
    'security'       => 'Security',
    'wordpress'      => 'WordPress',
    'hosting'        => 'Hosting & Email',
    'consulting'     => 'Consulting & Auditing',
    'ai-data'        => 'AI & Data',
    'other'          => 'Other / Not Sure',
];
$budget_labels = [
    'under2500'    => 'Under $2,500',
    '2500to10000'  => '$2,500 - $10,000',
    '10000to25000' => '$10,000 - $25,000',
    'over25000'    => '$25,000+',
    'unknown'      => 'Not Sure Yet',
];
$timeline_labels = [
    'asap'     => 'ASAP',
    'month'    => 'Within a month',
    'quarter'  => '1-3 months',
    'flexible' => 'Flexible',
];

$service_type_label = $service_type_labels[$service_type] ?? $service_type;
$budget_label        = $budget_labels[$budget] ?? $budget;
$timeline_label      = $timeline_labels[$timeline] ?? $timeline;

// Single-line fields must not contain header-injection characters
$clean_name    = str_replace(["\r", "\n"], '', $name);
$clean_subject = str_replace(["\r", "\n"], '', $subject);

$mail_subject = '[Percival Systems Contact] ' . $clean_subject;

$body  = "New contact form submission from percival-systems.com\n\n";
$body .= "Name: {$clean_name}\n";
$body .= "Email: {$email}\n";
$body .= "Subject: {$clean_subject}\n";
if ($service_type !== '') $body .= "Type of Service: {$service_type_label}\n";
if ($budget !== '')       $body .= "Estimated Budget: {$budget_label}\n";
if ($timeline !== '')     $body .= "Timeline: {$timeline_label}\n";
$body .= "\nMessage:\n{$message}\n";

$headers   = [];
$headers[] = "From: Percival Systems Website <{$from_email}>";
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'X-Mailer: PHP/' . phpversion();

$sent = mail($to_email, $mail_subject, $body, implode("\r\n", $headers));

unset($_SESSION['contact_old'], $_SESSION['contact_errors'], $_SESSION['csrf_token']);

if ($sent) {
    header('Location: /contact.php?status=success');
} else {
    header('Location: /contact.php?status=error');
}
exit;
