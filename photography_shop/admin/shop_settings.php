<?php
$page_title="Shop Settings";require_once "header.php";$message='';
$shop=get_shop($conn);
if($_SERVER['REQUEST_METHOD']==='POST'){
$fields=['shop_name','photographer_name','description','phone','whatsapp','email','address','location','map_url'];
$data=[];foreach($fields as $f)$data[$f]=trim($_POST[$f]??'');
$s=$conn->prepare("UPDATE shop_settings SET shop_name=?,photographer_name=?,description=?,phone=?,whatsapp=?,email=?,address=?,location=?,map_url=? WHERE id=1");
$s->bind_param("sssssssss",$data['shop_name'],$data['photographer_name'],$data['description'],$data['phone'],$data['whatsapp'],$data['email'],$data['address'],$data['location'],$data['map_url']);$s->execute();$message="Shop settings updated."; $shop=get_shop($conn);
}
?>
<h1>Shop Settings</h1><?php if($message): ?><div class="alert alert-success"><?= e($message) ?></div><?php endif; ?>
<form method="post" class="card admin-card p-4"><div class="row g-3">
<?php foreach(['shop_name'=>'Shop Name','photographer_name'=>'Photographer Name','phone'=>'Phone','whatsapp'=>'WhatsApp','email'=>'Email','location'=>'Location','map_url'=>'Google Maps URL'] as $name=>$label): ?>
<div class="col-md-6"><label class="form-label"><?= e($label) ?></label><input class="form-control" name="<?= e($name) ?>" value="<?= e($shop[$name]??'') ?>"></div>
<?php endforeach; ?>
<div class="col-12"><label class="form-label">Description</label><textarea class="form-control" name="description" rows="4"><?= e($shop['description']??'') ?></textarea></div>
<div class="col-12"><label class="form-label">Address</label><textarea class="form-control" name="address" rows="3"><?= e($shop['address']??'') ?></textarea></div>
</div><button class="btn btn-dark mt-3">Save Settings</button></form>
<?php require_once "footer.php"; ?>