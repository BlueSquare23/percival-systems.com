</main>

<footer class="site-footer">
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-lg-4">
        <a href="/home" class="d-flex align-items-center gap-2 text-white text-decoration-none mb-3">
          <span class="logo-mark"><img src="/assets/img/circuitry_Y.svg" alt="Percival Systems logo mark"></span>
          <span class="fw-semibold">Percival Systems <span style="color: var(--ps-gold);">LLC</span></span>
        </a>
        <p class="small mb-0">
          Software development and IT services built on real-world production
          infrastructure experience, from the network layer to the application layer.
        </p>
      </div>
      <div class="col-lg-4">
        <h6>Quick Links</h6>
        <ul class="list-unstyled small">
          <li class="mb-2"><a href="/home">Home</a></li>
          <li class="mb-2"><a href="/services">Services</a></li>
          <li class="mb-2"><a href="/portfolio">Portfolio</a></li>
          <li class="mb-2"><a href="/about">About</a></li>
          <li class="mb-2"><a href="/contact">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h6>Contact</h6>
        <ul class="list-unstyled small">
          <li class="mb-2">
            <i class="bi bi-envelope-fill me-2"></i>
            <a href="mailto:<?php echo htmlspecialchars($site_email); ?>"><?php echo htmlspecialchars($site_email); ?></a>
          </li>
          <li class="mb-2">
            <i class="bi bi-telephone-fill me-2"></i>
            <a href="tel:<?php echo htmlspecialchars($site_phone_tel); ?>"><?php echo htmlspecialchars($site_phone); ?></a>
          </li>
          <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Pittsburgh, PA</li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="text-center small">
      &copy; <?php echo date('Y'); ?> Percival Systems LLC. All rights reserved.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  (function () {
    var root = document.documentElement;
    var toggle = document.getElementById('themeToggle');
    var icon = document.getElementById('themeToggleIcon');

    function applyIcon(theme) {
      if (icon) {
        icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
      }
    }

    applyIcon(root.getAttribute('data-bs-theme') === 'dark' ? 'dark' : 'light');

    if (toggle) {
      toggle.addEventListener('click', function () {
        var next = root.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
        if (next === 'dark') {
          root.setAttribute('data-bs-theme', 'dark');
        } else {
          root.removeAttribute('data-bs-theme');
        }
        localStorage.setItem('ps-theme', next);
        applyIcon(next);
      });
    }
  })();
</script>
</body>
</html>
