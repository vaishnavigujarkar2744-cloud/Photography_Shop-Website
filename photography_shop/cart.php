<?php
require_once "config/db.php";
require_once "config/functions.php";
if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    $action=$_POST['action'] ?? '';
    $id=(int)($_POST['product_id'] ?? 0);
    $qty=max(1,(int)($_POST['quantity'] ?? 1));
    if($action==='add' && $id>0){
        $stmt=$conn->prepare("SELECT stock FROM products WHERE id=?");
        $stmt->bind_param("i",$id); $stmt->execute();
        $p=$stmt->get_result()->fetch_assoc();
        if($p && (int)$p['stock']>0){
            $_SESSION['cart'][$id]=min(($_SESSION['cart'][$id]??0)+$qty,(int)$p['stock']);
        }
    } elseif($action==='update'){
        foreach($_POST['qty'] ?? [] as $pid=>$quantity){
            $pid=(int)$pid; $quantity=(int)$quantity;
            if($quantity<=0) unset($_SESSION['cart'][$pid]);
            else {
                $stmt=$conn->prepare("SELECT stock FROM products WHERE id=?");
                $stmt->bind_param("i",$pid); $stmt->execute();
                $p=$stmt->get_result()->fetch_assoc();
                if($p) $_SESSION['cart'][$pid]=min($quantity,(int)$p['stock']);
            }
        }
    } elseif($action==='remove'){
        unset($_SESSION['cart'][$id]);
    }
    redirect("cart.php");
}
$page_title="Cart";
require_once "includes/header.php";
require_once "includes/navbar.php";
$total=0;
?>
<section class="section mt-5 pt-5"><div class="container">
<h1 class="fw-bold mb-4">Your Cart</h1>
<?php if(empty($_SESSION['cart'])): ?>
<div class="alert alert-info">Your cart is empty. <a href="products.php">Continue shopping</a>.</div>
<?php else: ?>
<form method="post"><input type="hidden" name="action" value="update">
<div class="table-responsive"><table class="table align-middle bg-white">
<thead><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr></thead><tbody>
<?php foreach($_SESSION['cart'] as $id=>$qty):
$stmt=$conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->bind_param("i",$id);$stmt->execute();$p=$stmt->get_result()->fetch_assoc();
if(!$p){unset($_SESSION['cart'][$id]);continue;}
$sub=$p['price']*$qty;$total+=$sub;
?>
<tr>
<td><div class="d-flex align-items-center gap-3"><img src="assets/images/products/<?= e($p['image']) ?>" width="70" height="60" style="object-fit:cover;border-radius:10px"><strong><?= e($p['name']) ?></strong></div></td>
<td>₹<?= number_format($p['price'],2) ?></td>
<td><input type="number" name="qty[<?= (int)$id ?>]" value="<?= (int)$qty ?>" min="0" max="<?= (int)$p['stock'] ?>" class="form-control" style="width:100px"></td>
<td>₹<?= number_format($sub,2) ?></td>
<td><button class="btn btn-sm btn-outline-danger" type="submit" formaction="cart.php" name="action" value="remove" onclick="this.form.product_id.value='<?= (int)$id ?>'">Remove</button></td>
</tr>
<?php endforeach; ?>
</tbody></table></div>
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
<button class="btn btn-outline-dark">Update Cart</button>
<h3>Total: ₹<?= number_format($total,2) ?></h3>
<a href="checkout.php" class="btn btn-gold">Proceed to Checkout</a>
</div>
<input type="hidden" name="product_id" value="">
</form>
<?php endif; ?>
</div></section>
<?php require_once "includes/footer.php"; ?>