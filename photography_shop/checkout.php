<?php
require_once "config/db.php"; require_once "config/functions.php"; require_user();
if(empty($_SESSION['cart'])) redirect("cart.php");
$error='';$total=0;
foreach($_SESSION['cart'] as $id=>$qty){
    $stmt=$conn->prepare("SELECT price,stock FROM products WHERE id=?");$stmt->bind_param("i",$id);$stmt->execute();$p=$stmt->get_result()->fetch_assoc();
    if(!$p || $qty>$p['stock']) $error="One or more products are out of stock or have insufficient stock.";
    if($p) $total += $p['price']*$qty;
}
$stmt=$conn->prepare("SELECT * FROM users WHERE id=?");$stmt->bind_param("i",$_SESSION['user_id']);$stmt->execute();$user=$stmt->get_result()->fetch_assoc();
if($_SERVER['REQUEST_METHOD']==='POST' && !$error){
    $name=trim($_POST['name']);$phone=trim($_POST['phone']);$address=trim($_POST['address']);
    $conn->begin_transaction();
    try{
        $stmt=$conn->prepare("INSERT INTO orders(user_id,customer_name,phone,address,total_amount,status) VALUES(?,?,?,?,?,'Pending')");
        $stmt->bind_param("isssd",$_SESSION['user_id'],$name,$phone,$address,$total);$stmt->execute();$order_id=$conn->insert_id;
        foreach($_SESSION['cart'] as $id=>$qty){
            $stmt=$conn->prepare("SELECT price,stock FROM products WHERE id=? FOR UPDATE");$stmt->bind_param("i",$id);$stmt->execute();$p=$stmt->get_result()->fetch_assoc();
            if(!$p || $p['stock']<$qty) throw new Exception("Stock changed. Please try again.");
            $stmt2=$conn->prepare("INSERT INTO order_items(order_id,product_id,quantity,price) VALUES(?,?,?,?)");
            $stmt2->bind_param("iiid",$order_id,$id,$qty,$p['price']);$stmt2->execute();
            $stmt3=$conn->prepare("UPDATE products SET stock=stock-? WHERE id=?");$stmt3->bind_param("ii",$qty,$id);$stmt3->execute();
        }
        $conn->commit();$_SESSION['cart']=[];redirect("order_success.php?id=".$order_id);
    }catch(Exception $ex){$conn->rollback();$error=$ex->getMessage();}
}
$page_title="Checkout"; require_once "includes/header.php"; require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container"><div class="row g-5">
<div class="col-lg-7"><div class="card border-0 shadow p-4 rounded-xl"><h2>Checkout</h2>
<?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post">
<input class="form-control mb-3" name="name" value="<?= e($user['name']) ?>" placeholder="Full name" required>
<input class="form-control mb-3" name="phone" value="<?= e($user['phone']) ?>" placeholder="Phone" required>
<textarea class="form-control mb-3" name="address" placeholder="Delivery address" required><?= e($user['address']) ?></textarea>
<button class="btn btn-gold w-100">Place Order • ₹<?= number_format($total,2) ?></button>
</form></div></div>
<div class="col-lg-5"><div class="info-card p-4"><h4>Order Summary</h4>
<?php foreach($_SESSION['cart'] as $id=>$qty):
$stmt=$conn->prepare("SELECT name,price FROM products WHERE id=?");$stmt->bind_param("i",$id);$stmt->execute();$p=$stmt->get_result()->fetch_assoc(); if(!$p)continue;?>
<div class="d-flex justify-content-between border-bottom py-2"><span><?= e($p['name']) ?> × <?= (int)$qty ?></span><strong>₹<?= number_format($p['price']*$qty,2) ?></strong></div>
<?php endforeach; ?><h4 class="text-end mt-3">₹<?= number_format($total,2) ?></h4></div></div>
</div></div></section>
<?php require_once "includes/footer.php"; ?>