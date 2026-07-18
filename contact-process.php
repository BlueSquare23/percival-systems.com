<?php
session_start();

$to_email = 'contact@percival-systems.com';

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

// Honeypot: if filled out, it's a bot — pretend success and drop it
if (!empty($_POST['website'])) {
    header('Location: /contact.php?status=success');
    exit;
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$old = [
    'name'    => $name,
    'email'   => $email,
    'subject' => $subject,
    'message' => $message,
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

if (!empty($errors)) {
    ps_back_with_errors($errors, $old);
}

// Single-line fields must not contain header-injection characters
$clean_name    = str_replace(["\r", "\n"], '', $name);
$clean_subject = str_replace(["\r", "\n"], '', $subject);

$mail_subject = '[Percival Systems Contact] ' . $clean_subject;

$body  = "New contact form submission from percival-systems.com\n\n";
$body .= "Name: {$clean_name}\n";
$body .= "Email: {$email}\n";
$body .= "Subject: {$clean_subject}\n\n";
$body .= "Message:\n{$message}\n";

$headers   = [];
$headers[] = 'From: Percival Systems Website <no-reply@percival-systems.com>';
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
