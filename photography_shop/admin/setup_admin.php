<?php
require_once "../config/db.php";
$name="Admin";$email="admin@gmail.com";$password="admin123";$hash=password_hash($password,PASSWORD_DEFAULT);
$stmt=$conn->prepare("SELECT id FROM admins WHERE email=?");$stmt->bind_param("s",$email);$stmt->execute();
if($stmt->get_result()->num_rows===0){
    $stmt=$conn->prepare("INSERT INTO admins(name,email,password) VALUES(?,?,?)");$stmt->bind_param("sss",$name,$email,$hash);$stmt->execute();
    echo "Admin created successfully.<br>Email: admin@gmail.com<br>Password: admin123<br><strong>Delete setup_admin.php now.</strong>";
}else echo "Admin already exists. Delete setup_admin.php now.";
?>