<?php
$page_title = 'Portfolio';
$page_description = 'A selection of websites designed and developed by Percival Systems LLC.';
$current_page = 'portfolio';
include __DIR__ . '/includes/header.php';

$projects = [
    [
        'name' => 'Tailiens',
        'url' => 'https://tailiens.com/',
        'icon' => 'bi-globe2',
        'desc' => 'Website design and development.',
    ],
    [
        'name' => 'Sureshot Inc',
        'url' => 'http://sureshotinc.com/',
        'icon' => 'bi-globe2',
        'desc' => 'Website design and development.',
    ],
    [
        'name' => 'johnlradford.io',
        'url' => 'https://johnlradford.io/',
        'icon' => 'bi-person-badge',
        'desc' => "Personal site for Percival Systems' founder, John Radford.",
    ],
    [
        'name' => 'Dillon F. Meyer',
        'url' => 'https://dillonfmeyer.com/',
        'icon' => 'bi-globe2',
        'desc' => 'Website design and development.',
    ],
    [
        'name' => 'Allegheny United',
        'url' => 'https://alleghenyunited.org/',
        'icon' => 'bi-globe2',
        'desc' => 'Website design and development.',
    ],
];
?>

<section class="hero py-5">
  <div class="container py-4">
    <div class="eyebrow mb-3">Our Work</div>
    <h1 class="fw-bold mb-3">Portfolio</h1>
    <p class="lead mb-0 col-lg-8">
      A selection of websites we've designed and built.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-4">
      <?php foreach ($projects as $p): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card card-ps p-4 h-100 d-flex flex-column">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="portfolio-favicon"><i class="bi <?php echo $p['icon']; ?>"></i></div>
            <h5 class="card-title mb-0"><?php echo htmlspecialchars($p['name']); ?></h5>
          </div>
          <p class="text-muted small flex-grow-1"><?php echo htmlspecialchars($p['desc']); ?></p>
          <a href="<?php echo htmlspecialchars($p['url']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-navy btn-sm mt-2 align-self-start">
            Visit Site <i class="bi bi-box-arrow-up-right ms-1"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container py-5 text-center">
    <h2 class="mb-3">Want to see your project here?</h2>
    <p class="lead mb-4 col-lg-8 mx-auto" style="color: rgba(255,255,255,.85);">
      Let's build something worth showing off.
    </p>
    <a href="/contact.php" class="btn btn-gold btn-lg px-4">Start a Project</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
