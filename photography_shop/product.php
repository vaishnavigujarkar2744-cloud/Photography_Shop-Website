<?php
require_once "config/db.php";
require_once "config/functions.php";
$id=(int)($_GET['id'] ?? 0);
$stmt=$conn->prepare("SELECT * FROM products WHERE id=? LIMIT 1");
$stmt->bind_param("i",$id);
$stmt->execute();
$product=$stmt->get_result()->fetch_assoc();
if(!$product){ redirect("products.php"); }
$page_title=$product['name'];
require_once "includes/header.php";
require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container">
<div class="row g-5 align-items-center">
<div class="col-lg-6"><img src="assets/images/products/<?= e($product['image']) ?>" class="img-fluid rounded-xl shadow" alt="<?= e($product['name']) ?>"></div>
<div class="col-lg-6">
<span class="badge badge-gold"><?= e($product['category']) ?></span>
<h1 class="display-5 fw-bold mt-2"><?= e($product['name']) ?></h1>
<p class="text-muted"><?= nl2br(e($product['description'])) ?></p>
<div class="price mb-3">₹<?= number_format((float)$product['price'],2) ?></div>
<p>Available stock: <strong><?= (int)$product['stock'] ?></strong></p>
<?php if((int)$product['stock'] > 0): ?>
<form method="post" action="cart.php" class="d-flex gap-2">
<input type="hidden" name="action" value="add">
<input type="hidden" name="product_id" value="<?= (int)$product['id'] ?>">
<input type="number" name="quantity" value="1" min="1" max="<?= (int)$product['stock'] ?>" class="form-control" style="max-width:110px">
<button class="btn btn-gold px-4">Add to Cart</button>
</form>
<?php else: ?><div class="alert alert-secondary">Out of stock.</div><?php endif; ?>
</div></div></div></section>
<?php require_once "includes/footer.php"; ?>