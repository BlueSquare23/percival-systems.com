<?php
session_start();

require __DIR__ . '/includes/env.php';
load_env(__DIR__ . '/.env');
$captcha_site_key = $_ENV['CAPTCHA_SITE_KEY'] ?? '';

$page_title = 'Contact';
$page_description = 'Get in touch with Percival Systems LLC about a software development or IT services project.';
$current_page = 'contact';
$extra_head = '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = $_SESSION['contact_errors'] ?? [];
$old    = $_SESSION['contact_old'] ?? [];
unset($_SESSION['contact_errors'], $_SESSION['contact_old']);

$status = $_GET['status'] ?? '';

$service_types = [
    'web'          => 'Web Development',
    'software'     => 'Custom Software Development',
    'infrastructure' => 'Infrastructure & Systems Administration',
    'networking'   => 'Networking & IT',
    'security'     => 'Security',
    'wordpress'    => 'WordPress',
    'hosting'      => 'Hosting & Email',
    'consulting'   => 'Consulting & Auditing',
    'ai-data'      => 'AI & Data',
    'other'        => 'Other / Not Sure',
];

$budget_ranges = [
    'under2500'  => 'Under $2,500',
    '2500to10000' => '$2,500 - $10,000',
    '10000to25000' => '$10,000 - $25,000',
    'over25000'  => '$25,000+',
    'unknown'    => 'Not Sure Yet',
];

$timelines = [
    'asap'     => 'ASAP',
    'month'    => 'Within a month',
    'quarter'  => '1-3 months',
    'flexible' => 'Flexible',
];

include __DIR__ . '/includes/header.php';
?>

<section class="hero py-5">
  <div class="container py-4">
    <div class="eyebrow mb-3">Get In Touch</div>
    <h1 class="fw-bold mb-3">Contact Us</h1>
    <p class="lead mb-0 col-lg-8">
      Tell us a bit about your project or your infrastructure, and we'll follow up
      at <?php echo htmlspecialchars($site_email); ?> or <?php echo htmlspecialchars($site_phone); ?>.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <?php if ($status === 'success'): ?>
        <div class="alert alert-success" role="alert">
          <i class="bi bi-check-circle-fill me-2"></i>
          Thanks for reaching out! Your message has been sent, and we'll be in touch soon.
        </div>
        <?php elseif ($status === 'error' && !empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          Please fix the following before submitting:
          <ul class="mb-0 mt-2">
            <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php elseif ($status === 'error'): ?>
        <div class="alert alert-danger" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          Something went wrong sending your message. Please try again, or email us directly.
        </div>
        <?php endif; ?>

        <div class="card card-ps p-4 p-md-5">
          <form action="/contact-process.php" method="post" novalidate>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

            <!-- Honeypot field: hidden from real users, bots often fill it in -->
            <div style="position: absolute; left: -9999px;" aria-hidden="true">
              <label for="website">Website</label>
              <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="row g-3">
              <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="150" required
                       placeholder="Jane Smith"
                       value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="190" required
                       placeholder="jane@example.com"
                       value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">
              </div>
              <div class="col-12">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" maxlength="200" required
                       placeholder="What can we help you with?"
                       value="<?php echo htmlspecialchars($old['subject'] ?? ''); ?>">
              </div>
              <div class="col-12">
                <label for="service_type" class="form-label">Type of Service</label>
                <select class="form-select" id="service_type" name="service_type">
                  <option value="" disabled <?php echo empty($old['service_type']) ? 'selected' : ''; ?>>Select a service...</option>
                  <?php foreach ($service_types as $value => $label): ?>
                  <option value="<?php echo htmlspecialchars($value); ?>" <?php echo (($old['service_type'] ?? '') === $value) ? 'selected' : ''; ?>><?php echo htmlspecialchars($label); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="budget" class="form-label">Estimated Budget</label>
                <select class="form-select" id="budget" name="budget">
                  <option value="" disabled <?php echo empty($old['budget']) ? 'selected' : ''; ?>>Select a budget range...</option>
                  <?php foreach ($budget_ranges as $value => $label): ?>
                  <option value="<?php echo htmlspecialchars($value); ?>" <?php echo (($old['budget'] ?? '') === $value) ? 'selected' : ''; ?>><?php echo htmlspecialchars($label); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="timeline" class="form-label">Timeline</label>
                <select class="form-select" id="timeline" name="timeline">
                  <option value="" disabled <?php echo empty($old['timeline']) ? 'selected' : ''; ?>>Select a timeline...</option>
                  <?php foreach ($timelines as $value => $label): ?>
                  <option value="<?php echo htmlspecialchars($value); ?>" <?php echo (($old['timeline'] ?? '') === $value) ? 'selected' : ''; ?>><?php echo htmlspecialchars($label); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="6" maxlength="5000" required
                          placeholder="Tell us about your project, goals, and any specific requirements..."><?php echo htmlspecialchars($old['message'] ?? ''); ?></textarea>
              </div>
              <div class="col-12">
                <div class="g-recaptcha" data-sitekey="<?php echo htmlspecialchars($captcha_site_key); ?>"></div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-gold btn-lg px-4">Send Message</button>
              </div>
            </div>
          </form>
        </div>

        <div class="text-center text-muted small mt-4">
          Prefer to reach us directly?
          <a href="mailto:<?php echo htmlspecialchars($site_email); ?>"><?php echo htmlspecialchars($site_email); ?></a>
          or
          <a href="tel:<?php echo htmlspecialchars($site_phone_tel); ?>"><?php echo htmlspecialchars($site_phone); ?></a>.
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
