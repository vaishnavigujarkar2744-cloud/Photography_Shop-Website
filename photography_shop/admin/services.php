<?php
$page_title="Services";require_once "header.php";
if(isset($_GET['delete'])){$id=(int)$_GET['delete'];$s=$conn->prepare("DELETE FROM services WHERE id=?");$s->bind_param("i",$id);$s->execute();redirect("services.php");}
if($_SERVER['REQUEST_METHOD']==='POST'){
$name=trim($_POST['name']);$description=trim($_POST['description']);$price=trim($_POST['price']);$image=trim($_POST['image']);
$s=$conn->prepare("INSERT INTO services(name,description,price,image) VALUES(?,?,?,?)");$s->bind_param("ssss",$name,$description,$price,$image);$s->execute();redirect("services.php");
}
$result=$conn->query("SELECT * FROM services ORDER BY id DESC");
?>
<h1>Services</h1><div class="row g-4">
<div class="col-lg-5"><div class="card admin-card p-4"><h4>Add Service</h4><form method="post"><input class="form-control mb-2" name="name" placeholder="Service name" required><textarea class="form-control mb-2" name="description" placeholder="Description"></textarea><input class="form-control mb-2" name="price" placeholder="Starting price e.g. ₹15,000"><input class="form-control mb-3" name="image" placeholder="Gallery image filename (optional)"><button class="btn btn-dark">Add Service</button></form></div></div>
<div class="col-lg-7"><div class="card admin-card p-3"><table class="table"><tr><th>Name</th><th>Price</th><th></th></tr><?php while($s=$result->fetch_assoc()): ?><tr><td><?= e($s['name']) ?></td><td><?= e($s['price']) ?></td><td><a class="btn btn-sm btn-outline-danger" href="?delete=<?= (int)$s['id'] ?>">Delete</a></td></tr><?php endwhile; ?></table></div></div>
</div><?php require_once "footer.php"; ?>