<?php
$page_title="Dashboard";require_once "header.php";
function count_table($conn,$table){$r=$conn->query("SELECT COUNT(*) c FROM `$table`");return $r->fetch_assoc()['c'];}
$users=count_table($conn,'users');$products=count_table($conn,'products');$orders=count_table($conn,'orders');$bookings=count_table($conn,'bookings');$services=count_table($conn,'services');
$rev=$conn->query("SELECT COALESCE(SUM(total_amount),0) total FROM orders WHERE status<>'Cancelled'")->fetch_assoc()['total'];
?>
<h1 class="fw-bold">Dashboard</h1><p class="text-muted">Welcome, <?= e($_SESSION['admin_name']) ?></p>
<div class="row g-4 mt-2">
<?php foreach([['Users',$users,'bi-people'],['Products',$products,'bi-box-seam'],['Orders',$orders,'bi-bag-check'],['Bookings',$bookings,'bi-calendar-event'],['Services',$services,'bi-camera'],['Revenue','₹'.number_format($rev,2),'bi-currency-rupee']] as $c): ?>
<div class="col-sm-6 col-xl-4"><div class="card admin-card p-4"><div class="d-flex justify-content-between"><div><div class="text-muted"><?= e($c[0]) ?></div><h2><?= e($c[1]) ?></h2></div><i class="bi <?= e($c[2]) ?> fs-1"></i></div></div></div>
<?php endforeach; ?>
</div>
<?php require_once "footer.php"; ?>