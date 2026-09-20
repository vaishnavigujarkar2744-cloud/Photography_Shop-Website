<?php
$page_title = "Services";
require_once "includes/header.php";
require_once "includes/navbar.php";
$result = $conn->query("SELECT * FROM services ORDER BY id DESC");
?>
<section class="page-banner"><div class="container"><h1>Photography Services</h1><p class="lead mb-0">Professional coverage for every celebration.</p></div></section>
<section class="section"><div class="container"><div class="row g-4">
<?php while($service=$result->fetch_assoc()): ?>
<div class="col-md-6 col-lg-4">
<div class="service-card h-100">
<?php if($service['image']): ?><img src="assets/images/gallery/<?= e($service['image']) ?>" class="service-img" alt="<?= e($service['name']) ?>"><?php endif; ?>
<div class="p-4">
<h4><?= e($service['name']) ?></h4>
<p class="text-muted"><?= nl2br(e($service['description'])) ?></p>
<?php if($service['price']): ?><p class="price"><?= e($service['price']) ?></p><?php endif; ?>
<a href="booking.php?service=<?= urlencode($service['name']) ?>" class="btn btn-dark rounded-pill">Book This Service</a>
</div></div></div>
<?php endwhile; ?>
</div></div></section>
<?php require_once "includes/footer.php"; ?>