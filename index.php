<?php
$page_title = 'Home';
$page_description = 'Percival Systems LLC: software development, systems administration, networking, and security services for small and mid-sized organizations.';
$current_page = 'home';
include __DIR__ . '/includes/header.php';

$service_highlights = [
    ['bi-code-slash', 'Web Development', 'Custom websites and web apps in PHP, Python, and JavaScript, plus rebuilds and performance tuning.'],
    ['bi-gear-wide-connected', 'Custom Software', 'Backend systems, internal tooling, REST/JSON-RPC APIs, and the "software plumbing" that ties it together.'],
    ['bi-hdd-rack', 'Infrastructure & SysAdmin', 'Linux server management, QEMU/KVM virtualization, and Puppet/Ansible automation.'],
    ['bi-diagram-3', 'Networking & IT', 'Network design, VLANs, wireless deployment, VPNs, and network segmentation.'],
    ['bi-shield-lock', 'Security', 'Penetration testing, intrusion detection, malware cleanup, and SOC/SIEM monitoring.'],
    ['bi-wordpress', 'WordPress', 'Site design and development, automatic updates and backups, and custom plugins and themes.'],
    ['bi-envelope-at', 'Hosting & Email', 'Web hosting, email deliverability, SSL automation, and DNS configuration.'],
    ['bi-clipboard-check', 'Consulting & Auditing', 'Architecture and security audits, fractional IT, and process documentation.'],
    ['bi-cpu', 'AI & Data', 'Custom RAG pipelines, internal LLM tooling, and business metrics pipelines.'],
];
?>

<section class="hero">
  <div class="container">
    <div class="row align-items-center gy-5">
      <div class="col-lg-7">
        <div class="eyebrow mb-3">Software &amp; IT Services</div>
        <h1 class="fw-bold mb-4">Practical engineering for the systems your business runs on.</h1>
        <p class="lead mb-4">
          Percival Systems LLC builds and maintains the software, servers, and networks that
          keep organizations running, from custom applications to the infrastructure
          underneath them.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="/services.php" class="btn btn-gold btn-lg px-4">View Our Services</a>
          <a href="/contact.php" class="btn btn-outline-gold btn-lg px-4">Get In Touch</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="hero-icon-wrap">
          <i class="bi bi-diagram-3-fill"></i>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-eyebrow mb-2">What We Do</div>
      <h2>Full-Stack Software &amp; IT Services</h2>
      <p class="text-muted col-lg-8 mx-auto">
        One partner for the code, the servers, and everything that connects them.
      </p>
    </div>
    <div class="row g-4">
      <?php foreach ($service_highlights as $s): ?>
      <div class="col-md-6 col-lg-3">
        <div class="card card-ps p-4">
          <div class="icon-badge mb-3"><i class="bi <?php echo $s[0]; ?>"></i></div>
          <h5 class="card-title"><?php echo htmlspecialchars($s[1]); ?></h5>
          <p class="text-muted small mb-0"><?php echo htmlspecialchars($s[2]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-5">
      <a href="/services.php" class="btn btn-outline-navy px-4">See Full Service List</a>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="row align-items-center gy-5">
      <div class="col-lg-6">
        <div class="section-eyebrow mb-2">Why Percival Systems</div>
        <h2 class="mb-4">Built on real production experience, not just theory.</h2>
        <p class="text-muted">
          Percival Systems LLC was founded by an engineer with 6+ years running infrastructure
          for a production web hosting company, managing distributed KVM clusters, building
          internal automation, and keeping customer-facing systems online. That background shapes
          how we work: practical, automation-first, and security-conscious from the start.
        </p>
        <a href="/about.php" class="btn btn-outline-navy mt-2">More About Us</a>
      </div>
      <div class="col-lg-6">
        <div class="row g-4">
          <div class="col-sm-6">
            <div class="card card-ps p-4">
              <div class="icon-badge mb-3"><i class="bi bi-server"></i></div>
              <h6 class="card-title">Real Infrastructure Experience</h6>
              <p class="text-muted small mb-0">Years managing production servers, virtualization clusters, and fleets at scale.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-ps p-4">
              <div class="icon-badge mb-3"><i class="bi bi-lightning-charge"></i></div>
              <h6 class="card-title">Automation-First</h6>
              <p class="text-muted small mb-0">Puppet, Ansible, and custom tooling built to eliminate manual, repetitive work.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-ps p-4">
              <div class="icon-badge mb-3"><i class="bi bi-shield-check"></i></div>
              <h6 class="card-title">Security-Conscious</h6>
              <p class="text-muted small mb-0">HMAC-secured APIs, rate limiting, and threat intelligence built in, not bolted on.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card card-ps p-4">
              <div class="icon-badge mb-3"><i class="bi bi-diagram-2"></i></div>
              <h6 class="card-title">Full-Stack Range</h6>
              <p class="text-muted small mb-0">From application code to network switches, one partner across the stack.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container py-5 text-center">
    <h2 class="mb-3">Have a project in mind?</h2>
    <p class="lead mb-4 col-lg-8 mx-auto" style="color: rgba(255,255,255,.85);">
      Whether it's a new application, a server migration, or an infrastructure audit,
      let's talk about what you need.
    </p>
    <a href="/contact.php" class="btn btn-gold btn-lg px-4">Contact Us</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
