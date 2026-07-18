<?php
$page_title = 'Services';
$page_description = 'Web development, custom software, infrastructure, networking, security, hosting, consulting, and AI/data services from Percival Systems LLC.';
$current_page = 'services';
include __DIR__ . '/includes/header.php';

$services = [
    [
        'icon' => 'bi-code-slash',
        'title' => 'Web Development',
        'items' => [
            'Website design and development',
            'PHP, Python, and JavaScript web applications',
            'Website rebuilds and modernization',
            'Performance optimization and caching',
            'SEO (Search Engine Optimization)',
        ],
    ],
    [
        'icon' => 'bi-gear-wide-connected',
        'title' => 'Custom Software Development',
        'items' => [
            'Backend systems and automation scripts',
            'Internal tooling and workflow automation',
            'REST API and JSON-RPC service development',
            'Systems integration and data pipeline development ("software plumbing")',
            'Webhook integrations and third-party API clients',
        ],
    ],
    [
        'icon' => 'bi-hdd-rack',
        'title' => 'Infrastructure & Systems Administration',
        'items' => [
            'Linux server setup, configuration, and maintenance (RHEL, Ubuntu, FreeBSD)',
            'QEMU/KVM virtualization and cluster management',
            'Puppet and Ansible automation and fleet management',
            'Web server configuration (Nginx, Apache)',
        ],
    ],
    [
        'icon' => 'bi-diagram-3',
        'title' => 'Networking & IT',
        'items' => [
            'Network design and architecture',
            'Switch configuration and VLAN setup',
            'Wireless access point deployment',
            'IP camera and physical security systems',
            'DMZ configuration and network segmentation',
            'VPN setup and management (self-hosted and commercial)',
        ],
    ],
    [
        'icon' => 'bi-shield-lock',
        'title' => 'Security',
        'items' => [
            'Penetration testing',
            'Rate limiting and DDoS mitigation',
            'IP threat intelligence integration',
            'SOC/SIEM monitoring setup',
            'HMAC-secured API endpoints',
            'Firewall and ACL configuration',
            'Intrusion detection',
            'Malware scanning & cleanup',
        ],
    ],
    [
        'icon' => 'bi-wordpress',
        'title' => 'WordPress',
        'items' => [
            'Site design and development',
            'Site migrations',
            'Automatic updates and backups',
            'Google Analytics setup',
            'Custom plugins and themes',
            'Custom form handlers',
            'Performance optimization (caching & compression)',
            'Security hardening & malware cleanup',
            'WooCommerce setup and customization',
            'Third-party API and webhook integrations',
        ],
    ],
    [
        'icon' => 'bi-envelope-at',
        'title' => 'Hosting & Email',
        'items' => [
            'Web hosting setup and management',
            'Email server configuration and deliverability',
            'SSL certificate management and automation',
            'DNS configuration',
        ],
    ],
    [
        'icon' => 'bi-clipboard-check',
        'title' => 'Consulting & Auditing',
        'items' => [
            'Software architecture review and auditing',
            'Security audits',
            'Fractional IT: ongoing IT management for small to mid-sized organizations',
            'Documentation and process development',
        ],
    ],
    [
        'icon' => 'bi-cpu',
        'title' => 'AI & Data',
        'items' => [
            'Custom RAG pipeline development',
            'Internal LLM tooling for staff productivity',
            'Business metrics and KPI pipeline development',
            'Log aggregation and centralized reporting',
        ],
    ],
];
?>

<section class="hero py-5">
  <div class="container py-4">
    <div class="eyebrow mb-3">What We Offer</div>
    <h1 class="fw-bold mb-3">Services</h1>
    <p class="lead mb-0 col-lg-8">
      From front-end code to back-end infrastructure, here's the full range of what
      Percival Systems LLC can take off your plate.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($services as $s): ?>
      <div class="col-md-6">
        <div class="card card-ps p-4">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="icon-badge"><i class="bi <?php echo $s['icon']; ?>"></i></div>
            <h4 class="card-title mb-0"><?php echo htmlspecialchars($s['title']); ?></h4>
          </div>
          <ul class="mb-0">
            <?php foreach ($s['items'] as $item): ?>
            <li class="mb-2 text-muted"><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container py-5 text-center">
    <h2 class="mb-3">Not sure where to start?</h2>
    <p class="lead mb-4 col-lg-8 mx-auto" style="color: rgba(255,255,255,.85);">
      Tell us what you're working with and what's not working, and we'll help you figure out
      the right scope.
    </p>
    <a href="/contact.php" class="btn btn-gold btn-lg px-4">Contact Us</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
