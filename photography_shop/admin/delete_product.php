<?php
require_once "../config/db.php";require_once "../config/functions.php";require_admin();
$id=(int)($_GET['id']??0);$stmt=$conn->prepare("DELETE FROM products WHERE id=?");$stmt->bind_param("i",$id);$stmt->execute();redirect("products.php");
?>