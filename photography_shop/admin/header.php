<?php
require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../config/functions.php";
require_admin();
$shop=get_shop($conn);
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= e($page_title??'Admin') ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
body{background:#f4f5f7}.sidebar{min-height:100vh;background:#111;color:#fff;position:sticky;top:0}.sidebar a{color:#ddd;display:block;padding:11px 15px;border-radius:8px;margin:3px 0}.sidebar a:hover{background:#2b2b2b;color:#fff}.admin-card{border:0;border-radius:18px;box-shadow:0 8px 25px rgba(0,0,0,.06)}
</style></head><body>
<div class="container-fluid"><div class="row">
<aside class="col-lg-2 sidebar p-3">
<h4 class="mb-4">📸 Admin</h4>
<a href="dashboard.php">Dashboard</a><a href="products.php">Products</a><a href="services.php">Services</a><a href="gallery.php">Gallery</a><a href="orders.php">Orders</a><a href="bookings.php">Bookings</a><a href="users.php">Users</a><a href="shop_settings.php">Shop Settings</a><a href="../index.php">View Website</a><a href="logout.php">Logout</a>
</aside><main class="col-lg-10 p-4">