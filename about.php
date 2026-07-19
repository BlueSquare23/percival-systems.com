<?php
$page_title = 'About';
$page_description = 'About Percival Systems LLC, founded by a DevOps engineer with 6+ years of production infrastructure experience.';
$current_page = 'about';
include __DIR__ . '/includes/header.php';

$experience = [
    [
        'title' => 'Virtual Resource Manager',
        'desc'  => 'Built a Perl-based system spanning 30-40 host systems and thousands of guest VMs: per-host REST API agents broadcasting live stats, a weighted-average rebalancing algorithm, and an interactive REPL CLI for managing QEMU/KVM clusters.',
    ],
    [
        'title' => 'Custom RAG Pipeline for Internal LLM Tooling',
        'desc'  => 'Developed a Python application to export documents from wikis, knowledge bases, and GitLab, chunk and vectorize them into ChromaDB, and power internal LLMs that help staff draft replies and troubleshoot issues.',
    ],
    [
        'title' => 'Centralized IP Threat Intelligence System',
        'desc'  => 'Built Perl modules querying multiple public threat intelligence APIs, with a centralized data store and Redis caching to cut down on redundant external lookups.',
    ],
    [
        'title' => 'Zendesk Webhook API',
        'desc'  => 'Developed an HMAC-verified Perl Plack REST API to auto-complete ticket details from a username or account number, saving support staff significant manual lookup time.',
    ],
    [
        'title' => 'Nginx & Apache Rate Limiting',
        'desc'  => 'Integrated connection and request rate limiting into a legacy build system, with a reporting pipeline to check false positives and tune thresholds.',
    ],
    [
        'title' => 'KPI & Business Metrics Pipeline',
        'desc'  => 'Automated the collection of core business metrics across billing and account systems into a central database, replacing recurring manual reporting.',
    ],
    [
        'title' => 'CloudLinux Integration',
        'desc'  => 'Integrated CloudLinux into a legacy build system and Puppet across a fleet of shared servers, with custom monitoring integrations and an Ansible playbook for fleet-wide deployment.',
    ],
    [
        'title' => 'Automated SSL Renewal Notices',
        'desc'  => 'Replaced a highly manual certificate-expiration notification process with automated tooling, saving substantial support staff time.',
    ],
];

$skills = [
    'Languages' => ['Perl', 'Python', 'Bash', 'PHP', 'JavaScript'],
    'Infra & DevOps' => ['Linux (RHEL/Ubuntu/FreeBSD)', 'QEMU/KVM', 'Puppet', 'Ansible', 'Nginx', 'Apache', 'ELK Stack'],
    'Data & Caching' => ['MySQL/MariaDB', 'Redis', 'ChromaDB'],
    'Security & Networking' => ['SOC/SIEM', 'VPN', 'Rate Limiting', 'IP Threat Intelligence', 'HMAC Auth'],
    'Tools' => ['GitLab CI/CD', 'Netbox', 'CloudLinux', 'Icinga2', 'REST APIs', 'Plack/PSGI'],
];

$open_source = [
    ['name' => 'Web-LGSM', 'url' => 'https://github.com/BlueSquare23/web-lgsm', 'desc' => 'Web portal for managing Linux game servers.'],
    ['name' => 'Term::ReadLine::Repl', 'url' => 'https://metacpan.org/pod/Term::ReadLine::Repl', 'desc' => 'Published CPAN REPL module, used in production cluster-management tooling.'],
    ['name' => 'Acme::Shotgun', 'url' => 'https://metacpan.org/pod/Acme::Shotgun', 'desc' => 'Published CPAN module.'],
];
?>

<section class="hero py-5">
  <div class="container py-4">
    <div class="eyebrow mb-3">About Us</div>
    <h1 class="fw-bold mb-3">Founded on production experience.</h1>
    <p class="lead mb-0 col-lg-8">
      Percival Systems LLC was founded in 2026 by John Radford, a DevOps engineer and systems
      administrator with 6+ years of experience running infrastructure for a production web
      hosting company.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row gy-5">
      <div class="col-lg-5">
        <div class="section-eyebrow mb-2">Our Story</div>
        <h2 class="mb-4">From production hosting to Percival Systems</h2>
        <p class="text-muted">
          Before founding Percival Systems, John spent 6+ years at a production web hosting
          company, starting in support, moving into NOC and security work, and ultimately
          serving as a DevOps Specialist and Systems Administrator.
        </p>
        <p class="text-muted">
          Along the way, he built internal tooling and automation spanning distributed KVM
          clusters, custom RAG pipelines, security systems, and business metrics platforms,
          always with an emphasis on clean, usable tools for the people who depend on them.
        </p>
        <p class="text-muted">
          Percival Systems LLC exists to bring that same practical, full-stack approach to
          small and mid-sized organizations that need software built and infrastructure run,
          without the overhead of a large agency.
        </p>
      </div>
      <div class="col-lg-7">
        <div class="section-eyebrow mb-2">Experience Highlights</div>
        <h2 class="mb-4">Selected work</h2>
        <?php foreach ($experience as $e): ?>
        <div class="exp-item">
          <h5 class="mb-1"><?php echo htmlspecialchars($e['title']); ?></h5>
          <p class="text-muted small mb-0"><?php echo htmlspecialchars($e['desc']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-eyebrow mb-2">Skills</div>
      <h2>Technical Toolbox</h2>
    </div>
    <div class="row g-4">
      <?php foreach ($skills as $category => $items): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card card-ps p-4 h-100">
          <h6 class="card-title mb-3"><?php echo htmlspecialchars($category); ?></h6>
          <div>
            <?php foreach ($items as $item): ?>
            <span class="skill-badge"><?php echo htmlspecialchars($item); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-eyebrow mb-2">Open Source</div>
      <h2>Contributions to the Community</h2>
    </div>
    <div class="row g-4">
      <?php foreach ($open_source as $proj): ?>
      <div class="col-md-4">
        <div class="card card-ps p-4 h-100">
          <div class="icon-badge mb-3"><i class="bi bi-git"></i></div>
          <h5 class="card-title"><?php echo htmlspecialchars($proj['name']); ?></h5>
          <p class="text-muted small mb-3"><?php echo htmlspecialchars($proj['desc']); ?></p>
          <a href="<?php echo htmlspecialchars($proj['url']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-navy btn-sm align-self-start">
            View Project <i class="bi bi-box-arrow-up-right ms-1"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container py-5 text-center">
    <h2 class="mb-3">Let's work together</h2>
    <p class="lead mb-4 col-lg-8 mx-auto" style="color: rgba(255,255,255,.85);">
      Get in touch to talk about your project or infrastructure needs.
    </p>
    <a href="/contact.php" class="btn btn-gold btn-lg px-4">Contact Us</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
