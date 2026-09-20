<?php
$page_title="Bookings";require_once "header.php";
if($_SERVER['REQUEST_METHOD']==='POST'){$id=(int)$_POST['id'];$status=$_POST['status'];$allowed=['Pending','Confirmed','Completed','Cancelled'];if(in_array($status,$allowed)){ $s=$conn->prepare("UPDATE bookings SET status=? WHERE id=?");$s->bind_param("si",$status,$id);$s->execute();}redirect("bookings.php");}
$result=$conn->query("SELECT * FROM bookings ORDER BY id DESC");
?>
<h1>Photography Bookings</h1><div class="table-responsive"><table class="table bg-white align-middle"><thead><tr><th>Customer</th><th>Event</th><th>Date/Time</th><th>Location</th><th>Phone</th><th>Status</th></tr></thead><tbody>
<?php while($b=$result->fetch_assoc()): ?><tr><td><?= e($b['customer_name']) ?></td><td><?= e($b['event_type']) ?></td><td><?= e($b['event_date']) ?><br><?= e($b['event_time']) ?></td><td><?= e($b['location']) ?></td><td><?= e($b['phone']) ?></td><td><form method="post" class="d-flex gap-1"><input type="hidden" name="id" value="<?= (int)$b['id'] ?>"><select name="status" class="form-select form-select-sm"><?php foreach(['Pending','Confirmed','Completed','Cancelled'] as $v): ?><option <?= $b['status']===$v?'selected':'' ?>><?= $v ?></option><?php endforeach; ?></select><button class="btn btn-sm btn-dark">Save</button></form></td></tr><?php endwhile; ?>
</tbody></table></div><?php require_once "footer.php"; ?>