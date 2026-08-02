<?php
$site_name  = 'Percival Systems LLC';
$site_email = 'contact@percival-systems.com';
$site_phone = '(412)-780-2053';
$site_phone_tel = '+14127802053';

// Canonical production URL, used for social link previews (Open Graph/Twitter Card).
// Hardcoded rather than derived from $_SERVER so previews always point at the live
// site, even when this is rendered from a local/dev host.
$site_url = 'https://percival-systems.com';
$og_url   = $site_url . ($_SERVER['PHP_SELF'] ?? '/index.php');
$og_image = $site_url . '/assets/img/og-image.png';

if (!isset($page_title)) {
    $page_title = 'Software & IT Services';
}
if (!isset($page_description)) {
    $page_description = 'Percival Systems LLC provides software development, systems administration, networking, and security services built on real-world production infrastructure experience.';
}
if (!isset($current_page)) {
    $current_page = '';
}

function ps_nav_class($page, $current) {
    return 'nav-link' . ($page === $current ? ' active' : '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
  // Applied before CSS/paint so a stored dark preference doesn't flash light first.
  // Default (no stored value, or "light") is light mode: no attribute needed.
  (function () {
    if (localStorage.getItem('ps-theme') === 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    }
  })();
</script>
<title><?php echo htmlspecialchars($page_title); ?> | <?php echo htmlspecialchars($site_name); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($og_url); ?>">
<link rel="icon" type="image/svg+xml" href="/assets/img/circuitry_Y.svg">

<!-- Open Graph / Facebook, Slack, iMessage, etc. -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?php echo htmlspecialchars($site_name); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($og_url); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?> | <?php echo htmlspecialchars($site_name); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Percival Systems LLC: Software &amp; IT Services">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?> | <?php echo htmlspecialchars($site_name); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
<?php if (!empty($extra_head)) echo $extra_head; ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-ps sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="/home">
      <span class="logo-mark"><img src="/assets/img/circuitry_Y.svg" alt="Percival Systems logo mark"></span>
      <span>Percival Systems <span class="brand-llc">LLC</span></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="<?php echo ps_nav_class('home', $current_page); ?>" href="/home">Home</a></li>
        <li class="nav-item"><a class="<?php echo ps_nav_class('services', $current_page); ?>" href="/services">Services</a></li>
        <li class="nav-item"><a class="<?php echo ps_nav_class('portfolio', $current_page); ?>" href="/portfolio">Portfolio</a></li>
        <li class="nav-item"><a class="<?php echo ps_nav_class('about', $current_page); ?>" href="/about">About</a></li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
          <button type="button" id="themeToggle" class="btn btn-outline-gold theme-toggle-btn" aria-label="Toggle dark mode" title="Toggle dark mode">
            <i class="bi bi-moon-stars-fill" id="themeToggleIcon"></i>
          </button>
        </li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
          <a class="btn btn-gold btn-sm px-3" href="/contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main>
