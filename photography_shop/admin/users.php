<?php
$page_title="Users";require_once "header.php";$result=$conn->query("SELECT id,name,email,phone,address,created_at FROM users ORDER BY id DESC");
?>
<h1>Users</h1><div class="table-responsive"><table class="table bg-white"><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Joined</th></tr></thead><tbody>
<?php while($u=$result->fetch_assoc()): ?><tr><td><?= (int)$u['id'] ?></td><td><?= e($u['name']) ?></td><td><?= e($u['email']) ?></td><td><?= e($u['phone']) ?></td><td><?= e($u['address']) ?></td><td><?= e($u['created_at']) ?></td></tr><?php endwhile; ?>
</tbody></table></div><?php require_once "footer.php"; ?>