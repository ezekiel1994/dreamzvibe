<?php 
require "../usable.php";
include "admin_func/functions.php";
if(!logged_in()){
	header('Location:../login.php');
}else{
if(isset($_POST['addcat'])){
	if(empty($_POST['cat'])){
		echo "<script>alert('category fields cannot be empty')</script>";
}else if(category_exist($_POST['cat'])){
		echo "<script>alert('category already exist!')</script>";
}else{
		$cat = clean_up($_POST['cat']);
		$date = date('d-m-Y');
		if($query = $con->query("insert into categories(category,category_date)values('$cat','$date')")){
			echo "<script>alert('category created successfully')</script>";
		}else{
			echo "<script>alert('invalid query')</script>";
		}
	}
}
if(isset($_GET['pid'])){
	$post_id = clean_up($_GET['pid']);
	disable_enable_post($post_id,"posts",0,"post_action","post_id");
		header('Location:index.php?action=true');
}
if(isset($_GET['did'])){
	$post_id = clean_up($_GET['did']);
	disable_enable_post($post_id,"posts",1,"post_action","post_id");
		header('Location:index.php?action=true');

}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
		<?php include "includes/main-header.php"; ?>
</head>
<body>
<?php
if(isset($_GET['action'])===true ){
	echo '<script>swal("Success!", "Changes made successfuly", "success");</script>';
}
?>
<?php include "includes/nav.php"; ?>
<div class="container">
<br><br><br><br>
<div class="row">
<div class="col-md-12">
	<div class="alert alert-info">
			<ul>
				<li>Dashboard</li>
			</ul>
	</div>
</div>
</div>

	<div class="row">
	<!-- sidebar-->
		<aside>
		<div class="col-md-3">
		<?php include "includes/aside.php"; ?>
		</div>
		</aside>
		<section>
		<div class="col-md-9">
		<?php include "includes/main_content.php"; ?>
		</div>
		</section>
	</div>
</div>
<footer>
<?php include "includes/footer.php"; ?>
</footer>
<script src="../assets/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
	/* $('#show').click(function(){
		$(this).toggle(function(){
			$(this).text('hey');
		});
	}); */
});
</script>
</body>
</html>
<?php
}
?>