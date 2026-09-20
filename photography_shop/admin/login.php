<?php
require_once "../config/db.php";require_once "../config/functions.php";
if(admin_logged_in()) redirect("dashboard.php");
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=trim($_POST['email']);$password=$_POST['password'];
    $stmt=$conn->prepare("SELECT * FROM admins WHERE email=? LIMIT 1");$stmt->bind_param("s",$email);$stmt->execute();$admin=$stmt->get_result()->fetch_assoc();
    if($admin && password_verify($password,$admin['password'])){
        session_regenerate_id(true);$_SESSION['admin_id']=$admin['id'];$_SESSION['admin_name']=$admin['name'];redirect("dashboard.php");
    } else $error="Invalid admin email or password.";
}
?>
<!DOCTYPE html><html><head><title>Admin Login</title><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-dark"><div class="container py-5"><div class="row justify-content-center"><div class="col-md-5"><div class="card p-4 shadow">
<h2>📸 Admin Login</h2><p class="text-muted">Photography Shop Management</p>
<?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post"><input class="form-control mb-3" type="email" name="email" placeholder="Admin email" required><input class="form-control mb-3" type="password" name="password" placeholder="Password" required><button class="btn btn-dark w-100">Login</button></form>
</div></div></div></div></body></html>