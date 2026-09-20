<?php
require_once "config/db.php";require_once "config/functions.php";require_user();
$stmt=$conn->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY id DESC");$stmt->bind_param("i",$_SESSION['user_id']);$stmt->execute();$result=$stmt->get_result();
$page_title="My Orders";require_once "includes/header.php";require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container"><h1 class="fw-bold mb-4">My Orders</h1>
<div class="table-responsive"><table class="table bg-white align-middle"><thead><tr><th>Order</th><th>Total</th><th>Status</th><th>Date</th></tr></thead><tbody>
<?php while($o=$result->fetch_assoc()): ?><tr><td>#<?= (int)$o['id'] ?></td><td>₹<?= number_format($o['total_amount'],2) ?></td><td><span class="badge text-bg-warning"><?= e($o['status']) ?></span></td><td><?= e($o['created_at']) ?></td></tr><?php endwhile; ?>
</tbody></table></div></div></section>
<?php require_once "includes/footer.php"; ?>