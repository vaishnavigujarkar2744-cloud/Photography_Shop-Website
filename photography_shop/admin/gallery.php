<?php
$page_title="Gallery";require_once "header.php";$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
$title=trim($_POST['title']);$category=trim($_POST['category']);$image='';
if(!empty($_FILES['image']['name'])){
$ext=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));$allowed=['jpg','jpeg','png','webp'];
if(!in_array($ext,$allowed)||$_FILES['image']['size']>4*1024*1024)$error="Invalid image or image is over 4MB.";
else{$image=uniqid('gallery_',true).'.'.$ext;move_uploaded_file($_FILES['image']['tmp_name'],__DIR__.'/../assets/images/gallery/'.$image);}
}
if(!$error&&$image){$s=$conn->prepare("INSERT INTO gallery(title,image,category) VALUES(?,?,?)");$s->bind_param("sss",$title,$image,$category);$s->execute();redirect("gallery.php");}
}
if(isset($_GET['delete'])){$id=(int)$_GET['delete'];$s=$conn->prepare("DELETE FROM gallery WHERE id=?");$s->bind_param("i",$id);$s->execute();redirect("gallery.php");}
$result=$conn->query("SELECT * FROM gallery ORDER BY id DESC");
?>
<h1>Gallery</h1><?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<div class="row g-4"><div class="col-lg-5"><div class="card admin-card p-4"><form method="post" enctype="multipart/form-data"><input class="form-control mb-2" name="title" placeholder="Photo title" required><select class="form-select mb-2" name="category"><option>Wedding</option><option>Birthday</option><option>Baby Shower</option><option>Puja</option><option>Other</option></select><input class="form-control mb-3" type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required><button class="btn btn-dark">Upload Photo</button></form></div></div>
<div class="col-lg-7"><div class="row g-3"><?php while($g=$result->fetch_assoc()): ?><div class="col-6"><img src="../assets/images/gallery/<?= e($g['image']) ?>" class="w-100 rounded" style="height:180px;object-fit:cover"><div class="d-flex justify-content-between mt-1"><span><?= e($g['title']) ?></span><a class="text-danger" href="?delete=<?= (int)$g['id'] ?>">Delete</a></div></div><?php endwhile; ?></div></div></div>
<?php require_once "footer.php"; ?>