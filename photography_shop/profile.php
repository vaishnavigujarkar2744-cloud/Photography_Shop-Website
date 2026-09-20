<?php
require_once "config/db.php"; require_once "config/functions.php"; require_user();
$id=$_SESSION['user_id'];$message='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']);$phone=trim($_POST['phone']);$address=trim($_POST['address']);
    $stmt=$conn->prepare("UPDATE users SET name=?,phone=?,address=? WHERE id=?");
    $stmt->bind_param("sssi",$name,$phone,$address,$id);$stmt->execute();
    $_SESSION['user_name']=$name;$message="Profile updated.";
}
$stmt=$conn->prepare("SELECT * FROM users WHERE id=?");$stmt->bind_param("i",$id);$stmt->execute();$user=$stmt->get_result()->fetch_assoc();
$page_title="My Profile"; require_once "includes/header.php"; require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container"><div class="row justify-content-center"><div class="col-lg-7">
<div class="card border-0 shadow p-4 rounded-xl"><h2>My Profile</h2>
<?php if($message): ?><div class="alert alert-success"><?= e($message) ?></div><?php endif; ?>
<form method="post">
<label class="form-label">Name</label><input class="form-control mb-3" name="name" value="<?= e($user['name']) ?>" required>
<label class="form-label">Email</label><input class="form-control mb-3" value="<?= e($user['email']) ?>" disabled>
<label class="form-label">Phone</label><input class="form-control mb-3" name="phone" value="<?= e($user['phone']) ?>">
<label class="form-label">Address</label><textarea class="form-control mb-3" name="address"><?= e($user['address']) ?></textarea>
<button class="btn btn-gold">Save Changes</button>
</form></div></div></div></div></section>
<?php require_once "includes/footer.php"; ?>