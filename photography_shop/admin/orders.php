<?php
$page_title="Orders";require_once "header.php";
if($_SERVER['REQUEST_METHOD']==='POST'){$id=(int)$_POST['id'];$status=$_POST['status'];$allowed=['Pending','Confirmed','Packed','Completed','Cancelled'];if(in_array($status,$allowed)){ $s=$conn->prepare("UPDATE orders SET status=? WHERE id=?");$s->bind_param("si",$status,$id);$s->execute();}redirect("orders.php");}
$result=$conn->query("SELECT * FROM orders ORDER BY id DESC");
?>
<h1>Orders</h1><div class="table-responsive"><table class="table bg-white align-middle"><thead><tr><th>ID</th><th>Customer</th><th>Phone</th><th>Total</th><th>Status</th><th>Date</th></tr></thead><tbody>
<?php while($o=$result->fetch_assoc()): ?><tr><td>#<?= (int)$o['id'] ?></td><td><?= e($o['customer_name']) ?></td><td><?= e($o['phone']) ?></td><td>₹<?= number_format($o['total_amount'],2) ?></td><td><form method="post" class="d-flex gap-1"><input type="hidden" name="id" value="<?= (int)$o['id'] ?>"><select name="status" class="form-select form-select-sm"><?php foreach(['Pending','Confirmed','Packed','Completed','Cancelled'] as $v): ?><option <?= $o['status']===$v?'selected':'' ?>><?= $v ?></option><?php endforeach; ?></select><button class="btn btn-sm btn-dark">Save</button></form></td><td><?= e($o['created_at']) ?></td></tr><?php endwhile; ?>
</tbody></table></div><?php require_once "footer.php"; ?>