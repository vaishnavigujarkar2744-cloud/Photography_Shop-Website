<?php
require_once "config/db.php";
require_once "config/functions.php";
if(user_logged_in()) redirect("index.php");
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=trim($_POST['email']);$password=$_POST['password'];
    $stmt=$conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");$stmt->bind_param("s",$email);$stmt->execute();
    $user=$stmt->get_result()->fetch_assoc();
    if($user && password_verify($password,$user['password'])){
        session_regenerate_id(true);
        $_SESSION['user_id']=$user['id'];$_SESSION['user_name']=$user['name'];
        redirect("index.php");
    } else $error="Invalid email or password.";
}
$page_title="Login"; require_once "includes/header.php"; require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container"><div class="row justify-content-center"><div class="col-lg-5">
<div class="card border-0 shadow p-4 rounded-xl"><h2 class="fw-bold">Welcome Back</h2>
<?php if(isset($_GET['registered'])): ?><div class="alert alert-success">Registration successful. Please login.</div><?php endif; ?>
<?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post">
<input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
<button class="btn btn-gold w-100">Login</button>
</form><p class="mt-3">New user? <a href="register.php">Create account</a></p>
</div></div></div></div></section>
<?php require_once "includes/footer.php"; ?>