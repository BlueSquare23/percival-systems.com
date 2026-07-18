<?php
session_start();

$page_title = 'Contact';
$page_description = 'Get in touch with Percival Systems LLC about a software development or IT services project.';
$current_page = 'contact';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = $_SESSION['contact_errors'] ?? [];
$old    = $_SESSION['contact_old'] ?? [];
unset($_SESSION['contact_errors'], $_SESSION['contact_old']);

$status = $_GET['status'] ?? '';

include __DIR__ . '/includes/header.php';
?>

<section class="hero py-5">
  <div class="container py-4">
    <div class="eyebrow mb-3">Get In Touch</div>
    <h1 class="fw-bold mb-3">Contact Us</h1>
    <p class="lead mb-0 col-lg-8">
      Tell us a bit about your project or your infrastructure, and we'll follow up
      at <?php echo htmlspecialchars($site_email); ?>.
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
                       value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>">
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="190" required
                       value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">
              </div>
              <div class="col-12">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" maxlength="200" required
                       value="<?php echo htmlspecialchars($old['subject'] ?? ''); ?>">
              </div>
              <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="6" maxlength="5000" required><?php echo htmlspecialchars($old['message'] ?? ''); ?></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-gold btn-lg px-4">Send Message</button>
              </div>
            </div>
          </form>
        </div>

        <div class="text-center text-muted small mt-4">
          Prefer email? Reach us directly at
          <a href="mailto:<?php echo htmlspecialchars($site_email); ?>"><?php echo htmlspecialchars($site_email); ?></a>.
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
