<footer class="site-footer mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-5">
                <h4><?= e($shop['shop_name'] ?? 'SnapFrame Photography') ?></h4>
                <p class="text-light opacity-75"><?= e($shop['description'] ?? 'We capture your beautiful moments forever.') ?></p>
            </div>
            <div class="col-md-3">
                <h6>Quick Links</h6>
                <a href="services.php">Services</a>
                <a href="products.php">Shop</a>
                <a href="gallery.php">Gallery</a>
            </div>
            <div class="col-md-4">
                <h6>Contact</h6>
                <p><i class="bi bi-telephone"></i> <?= e($shop['phone'] ?? '') ?></p>
                <p><i class="bi bi-envelope"></i> <?= e($shop['email'] ?? '') ?></p>
                <p><i class="bi bi-geo-alt"></i> <?= e($shop['address'] ?? '') ?></p>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center small opacity-75">© <?= date('Y') ?> <?= e($shop['shop_name'] ?? 'SnapFrame Photography') ?>. All rights reserved.</div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>