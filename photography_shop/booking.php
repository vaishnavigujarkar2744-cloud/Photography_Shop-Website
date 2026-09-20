<?php
require_once "config/db.php";require_once "config/functions.php";
$service=trim($_GET['service']??'');$error='';$success='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!user_logged_in()) redirect("login.php");
    $name=trim($_POST['customer_name']);$phone=trim($_POST['phone']);$event=trim($_POST['event_type']);
    $date=$_POST['event_date'];$time=$_POST['event_time'];$location=trim($_POST['location']);$message=trim($_POST['message']);
    $stmt=$conn->prepare("INSERT INTO bookings(user_id,customer_name,phone,event_type,event_date,event_time,location,message) VALUES(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("isssssss",$_SESSION['user_id'],$name,$phone,$event,$date,$time,$location,$message);
    if($stmt->execute()) $success="Booking request sent successfully. The photographer will contact you.";
    else $error="Could not submit booking.";
}
$page_title="Book Photographer";require_once "includes/header.php";require_once "includes/navbar.php";
?>
<section class="section mt-5 pt-5"><div class="container"><div class="row justify-content-center"><div class="col-lg-8">
<div class="card border-0 shadow p-4 rounded-xl"><h2>Book a Photography Service</h2><p class="text-muted">Tell us about your event and we will contact you.</p>
<?php if($success): ?><div class="alert alert-success"><?= e($success) ?></div><?php endif; ?>
<?php if($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
<form method="post">
<div class="row g-3">
<div class="col-md-6"><input class="form-control" name="customer_name" placeholder="Your name" value="<?= e($_SESSION['user_name']??'') ?>" required></div>
<div class="col-md-6"><input class="form-control" name="phone" placeholder="Phone number" required></div>
<div class="col-md-6"><select class="form-select" name="event_type" required><option value="">Select event</option><?php foreach(['Wedding','Pre-Wedding','Birthday','Baby Shower','Puja','Anniversary','Other'] as $v): ?><option <?= $service===$v?'selected':'' ?>><?= e($v) ?></option><?php endforeach; ?></select></div>
<div class="col-md-6"><input class="form-control" type="date" name="event_date" required></div>
<div class="col-md-6"><input class="form-control" type="time" name="event_time" required></div>
<div class="col-md-6"><input class="form-control" name="location" placeholder="Event location" required></div>
<div class="col-12"><textarea class="form-control" name="message" rows="4" placeholder="Tell us your requirements"></textarea></div>
</div><button class="btn btn-gold mt-4">Send Booking Request</button>
</form></div></div></div></div></section>
<?php require_once "includes/footer.php"; ?>