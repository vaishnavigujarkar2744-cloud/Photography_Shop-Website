<?php
$page_title = "About";
require_once "includes/header.php";
require_once "includes/navbar.php";
?>
<section class="page-banner"><div class="container"><h1>About Us</h1><p class="lead mb-0">Meet the people behind your memories.</p></div></section>
<section class="section">
<div class="container">
<div class="row g-5 align-items-center">
<div class="col-lg-6"><img src="assets/images/setup.webp" class="img-fluid rounded-xl shadow" alt="Photographer"></div>
<div class="col-lg-6">
<h2><?= e($shop['shop_name'] ?? 'Photography Studio') ?></h2>
<h5 class="text-muted">Photographer: <?= e($shop['photographer_name'] ?? '') ?></h5>
<p class="mt-3"><?= nl2br(e($shop['description'] ?? '')) ?></p>
<div class="info-card p-4 mt-4">
<p><i class="bi bi-geo-alt-fill"></i> <strong>Location:</strong> <?= e($shop['location'] ?? '') ?></p>
<p><i class="bi bi-telephone-fill"></i> <strong>Phone:</strong> <?= e($shop['phone'] ?? '') ?></p>
<p class="mb-0"><i class="bi bi-envelope-fill"></i> <strong>Email:</strong> <?= e($shop['email'] ?? '') ?></p>
</div>
</div>
</div>
</div>
</section>
<?php require_once "includes/footer.php"; ?>