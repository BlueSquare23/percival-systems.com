<?php
$site_name  = 'Percival Systems LLC';
$site_email = 'contact@percival-systems.com';
$site_phone = '(412)-780-2053';
$site_phone_tel = '+14127802053';

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
<title><?php echo htmlspecialchars($page_title); ?> | <?php echo htmlspecialchars($site_name); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">

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
    <a class="navbar-brand d-flex align-items-center gap-2" href="/index.php">
      <span class="logo-mark"><i class="bi bi-diagram-3-fill"></i></span>
      <span>Percival Systems <span class="brand-llc">LLC</span></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="<?php echo ps_nav_class('home', $current_page); ?>" href="/index.php">Home</a></li>
        <li class="nav-item"><a class="<?php echo ps_nav_class('services', $current_page); ?>" href="/services.php">Services</a></li>
        <li class="nav-item"><a class="<?php echo ps_nav_class('portfolio', $current_page); ?>" href="/portfolio.php">Portfolio</a></li>
        <li class="nav-item"><a class="<?php echo ps_nav_class('about', $current_page); ?>" href="/about.php">About</a></li>
        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
          <a class="btn btn-gold btn-sm px-3" href="/contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main>
