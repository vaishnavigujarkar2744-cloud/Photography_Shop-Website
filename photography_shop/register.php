<?php
require_once "config/db.php";
require_once "config/functions.php";
if(user_logged_in()) redirect("index.php");
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']); $email=trim($_POST['email']); $phone=trim($_POST['phone']);
    $password=$_POST['password']; $confirm=$_POST['confirm_password'];
    if($password!==$confirm) $error="Passwords do not match.";
    elseif(strlen($password)<6) $error="Password must be at least 6 characters.";
    else{
        $stmt=$conn->prepare("SELECT id FROM users WHERE email=?");
        $stmt->bind_param("s",$email);$stmt->execute();
        if($stmt->get_result()->num_rows) $error="Email is already registered.";
        else{
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $stmt=$conn->prepare("INSERT INTO users(name,email,phone,password) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss",$name,$email,$phone,$hash);
            if($stmt->execute()) redirect("login.php?registered=1");
            $error="Registration failed.";
        }
    }
}
$page_title="Register"; require_once "includes/header.php"; require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container"><div class="row justify-content-center"><div class="col-lg-6">
<div class="card border-0 shadow p-4 rounded-xl"><h2 class="fw-bold">Create Account</h2><p class="text-muted">Join us to shop and book photography services.</p>
<?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post">
<input class="form-control mb-3" name="name" placeholder="Full name" required>
<input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
<input class="form-control mb-3" name="phone" placeholder="Phone number" required>
<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
<input class="form-control mb-3" type="password" name="confirm_password" placeholder="Confirm password" required>
<button class="btn btn-gold w-100">Register</button>
</form><p class="mt-3 mb-0">Already have an account? <a href="login.php">Login</a></p>
</div></div></div></div></section>
<?php require_once "includes/footer.php"; ?>