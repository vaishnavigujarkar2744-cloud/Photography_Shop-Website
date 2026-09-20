<?php
require_once "config/db.php"; require_once "config/functions.php"; require_user();
$id=(int)($_GET['id']??0);
$page_title="Order Success";require_once "includes/header.php";require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container text-center"><div class="card border-0 shadow p-5 rounded-xl">
<div class="display-2">🎉</div><h1>Order Placed!</h1><p class="lead">Thank you. Your order <strong>#<?= $id ?></strong> has been received.</p>
<a href="my_orders.php" class="btn btn-gold me-2">My Orders</a><a href="products.php" class="btn btn-outline-dark">Continue Shopping</a>
</div></div></section>
<?php require_once "includes/footer.php"; ?>