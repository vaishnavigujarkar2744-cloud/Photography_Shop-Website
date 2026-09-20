<?php
$page_title = "Gallery";
require_once "includes/header.php";
require_once "includes/navbar.php";
$category = $_GET['category'] ?? '';
if ($category !== '') {
    $stmt = $conn->prepare("SELECT * FROM gallery WHERE category=? ORDER BY id DESC");
    $stmt->bind_param("s", $category);
} else {
    $stmt = $conn->prepare("SELECT * FROM gallery ORDER BY id DESC");
}
$stmt->execute();
$result = $stmt->get_result();
?>
<section class="page-banner"><div class="container"><h1>Our Gallery</h1><p class="lead mb-0">A glimpse of the stories we have captured.</p></div></section>
<section class="section">
<div class="container">
<div class="text-center mb-4">
<a class="btn btn-outline-dark rounded-pill m-1" href="gallery.php">All</a>
<?php foreach (['Wedding','Birthday','Baby Shower','Puja','Other'] as $cat): ?>
<a class="btn btn-outline-dark rounded-pill m-1" href="gallery.php?category=<?= urlencode($cat) ?>"><?= e($cat) ?></a>
<?php endforeach; ?>
</div>
<div class="row g-4">
<?php while($row=$result->fetch_assoc()): ?>
<div class="col-md-6 col-lg-4">
<img src="assets/images/gallery/<?= e($row['image']) ?>" class="gallery-img" alt="<?= e($row['title']) ?>">
<div class="pt-2"><h5><?= e($row['title']) ?></h5><small class="text-muted"><?= e($row['category']) ?></small></div>
</div>
<?php endwhile; ?>
</div>
</div>
</section>
<?php require_once "includes/footer.php"; ?>