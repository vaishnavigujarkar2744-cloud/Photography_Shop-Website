<?php
require_once "header.php";
$id=(int)($_GET['id']??0);$edit=$id>0;$error='';
$product=['name'=>'','description'=>'','price'=>'','category'=>'Photo Frames','stock'=>0,'image'=>''];
if($edit){$stmt=$conn->prepare("SELECT * FROM products WHERE id=?");$stmt->bind_param("i",$id);$stmt->execute();$product=$stmt->get_result()->fetch_assoc();if(!$product)redirect("products.php");}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']);$description=trim($_POST['description']);$price=(float)$_POST['price'];$category=trim($_POST['category']);$stock=(int)$_POST['stock'];$image=$product['image'];
    if(!empty($_FILES['image']['name'])){
        $ext=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));$allowed=['jpg','jpeg','png','webp'];
        if(!in_array($ext,$allowed) || $_FILES['image']['size']>3*1024*1024)$error="Use JPG, PNG or WEBP image under 3MB.";
        else{$image=uniqid('product_',true).'.'.$ext;move_uploaded_file($_FILES['image']['tmp_name'],__DIR__.'/../assets/images/products/'.$image);}
    }
    if(!$error){
        if($edit){$stmt=$conn->prepare("UPDATE products SET name=?,description=?,price=?,category=?,stock=?,image=? WHERE id=?");$stmt->bind_param("ssdsisi",$name,$description,$price,$category,$stock,$image,$id);}
        else{$stmt=$conn->prepare("INSERT INTO products(name,description,price,category,stock,image) VALUES(?,?,?,?,?,?)");$stmt->bind_param("ssdsis",$name,$description,$price,$category,$stock,$image);}
        if($stmt->execute())redirect("products.php");$error="Could not save product.";
    }
}
?>
<h1><?= $edit?'Edit':'Add' ?> Product</h1>
<?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post" enctype="multipart/form-data" class="card admin-card p-4">
<input class="form-control mb-3" name="name" placeholder="Product name" value="<?= e($product['name']) ?>" required>
<textarea class="form-control mb-3" name="description" placeholder="Description"><?= e($product['description']) ?></textarea>
<div class="row g-3"><div class="col-md-4"><input class="form-control" type="number" step="0.01" name="price" placeholder="Price" value="<?= e($product['price']) ?>" required></div>
<div class="col-md-4"><select class="form-select" name="category"><?php foreach(['Photo Frames','Photo Albums','Canvas Prints','Photo Gifts'] as $v): ?><option <?= $product['category']===$v?'selected':'' ?>><?= e($v) ?></option><?php endforeach; ?></select></div>
<div class="col-md-4"><input class="form-control" type="number" name="stock" placeholder="Stock" value="<?= e($product['stock']) ?>" required></div></div>
<input class="form-control my-3" type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
<?php if($product['image']): ?><img src="../assets/images/products/<?= e($product['image']) ?>" width="120" class="rounded mb-3"><?php endif; ?>
<button class="btn btn-dark"><?= $edit?'Update':'Add' ?> Product</button>
</form>
<?php require_once "footer.php"; ?>