</main>

<footer class="site-footer">
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-lg-4">
        <a href="/index.php" class="d-flex align-items-center gap-2 text-white text-decoration-none mb-3">
          <span class="logo-mark"><i class="bi bi-diagram-3-fill"></i></span>
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
          <li class="mb-2"><a href="/index.php">Home</a></li>
          <li class="mb-2"><a href="/services.php">Services</a></li>
          <li class="mb-2"><a href="/portfolio.php">Portfolio</a></li>
          <li class="mb-2"><a href="/about.php">About</a></li>
          <li class="mb-2"><a href="/contact.php">Contact</a></li>
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
</body>
</html>
