<?php
require_once "config/db.php";require_once "config/functions.php";
$shop=get_shop($conn);
$page_title="Contact";require_once "includes/header.php";require_once "includes/navbar.php";
$phone=preg_replace('/\D+/','',$shop['phone']??'');$wa=preg_replace('/\D+/','',$shop['whatsapp']??$phone);
?>
<section class="page-banner"><div class="container"><h1>Contact</h1><p class="lead mb-0">Let's plan your next memorable event.</p></div></section>
<section class="section"><div class="container"><div class="row g-4">
<div class="col-md-6"><div class="info-card p-4 h-100"><h3><?= e($shop['shop_name']??'Photography Studio') ?></h3>
<p><i class="bi bi-person"></i> <?= e($shop['photographer_name']??'') ?></p>
<p><i class="bi bi-telephone"></i> <?= e($shop['phone']??'') ?></p>
<p><i class="bi bi-envelope"></i> <?= e($shop['email']??'') ?></p>
<p><i class="bi bi-geo-alt"></i> <?= nl2br(e($shop['address']??'')) ?></p>
<div class="d-flex gap-2 mt-4"><?php if($phone): ?><a class="btn btn-dark" href="tel:<?= e($phone) ?>">📞 Call</a><?php endif; ?><?php if($wa): ?><a class="btn btn-success" href="https://wa.me/<?= e($wa) ?>" target="_blank">💬 WhatsApp</a><?php endif; ?></div>
</div></div>
<div class="col-md-6"><div class="info-card p-4 h-100"><h3>Visit Us</h3><p><?= e($shop['location']??'') ?></p>
<?php if(!empty($shop['map_url'])): ?><a class="btn btn-gold" target="_blank" href="<?= e($shop['map_url']) ?>">Open Google Maps</a><?php endif; ?>
</div></div>
</div></div></section>
<?php require_once "includes/footer.php"; ?>