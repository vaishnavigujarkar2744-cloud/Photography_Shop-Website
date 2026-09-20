<?php
$page_title = "Shop";
require_once "includes/header.php";
require_once "includes/navbar.php";
$category = $_GET['category'] ?? '';
if ($category !== '') {
    $stmt=$conn->prepare("SELECT * FROM products WHERE category=? ORDER BY id DESC");
    $stmt->bind_param("s",$category);
} else {
    $stmt=$conn->prepare("SELECT * FROM products ORDER BY id DESC");
}
$stmt->execute();
$result=$stmt->get_result();
?>
<section class="page-banner">
    <div class="container">
        <h1>Memory Shop</h1>
        <p>Frames, Albums and custom photo products.</p>
    </div>
</section>
<section class="section"><div class="container">
<div class="text-center mb-4">
<a class="btn btn-outline-dark rounded-pill m-1" href="products.php">All</a>
<?php foreach(['Photo Frames','Photo Albums','Canvas Prints','Photo Gifts'] as $cat): ?>
<a class="btn btn-outline-dark rounded-pill m-1" href="products.php?category=<?= urlencode($cat) ?>"><?= e($cat) ?></a>
<?php endforeach; ?>
</div>
<div class="row g-4">
<?php while($p=$result->fetch_assoc()): ?>
<div class="col-sm-6 col-lg-3">
<div class="product-card h-100">
<img src="assets/images/products/<?= e($p['image']) ?>" class="product-img" alt="<?= e($p['name']) ?>">
<div class="p-3">
<small class="text-muted"><?= e($p['category']) ?></small>
<h5 class="mt-1"><?= e($p['name']) ?></h5>
<p class="small text-muted"><?= e($p['description']) ?></p>
<div class="price">₹<?= number_format((float)$p['price'],2) ?></div>
<a href="product.php?id=<?= (int)$p['id'] ?>" class="btn btn-dark w-100 mt-3 rounded-pill">View Product</a>
</div></div></div>
<?php endwhile; ?>
</div>
</div></section>
<?php require_once "includes/footer.php"; ?>