<?php 
require "../usable.php";
include "admin_func/functions.php";
if(!logged_in()){
	header('Location:../login.php');
}else if(!isset($_GET['pid']) || empty($_GET['pid'])){
	header('Location:index.php');
}else{
	
	$post_id = clean_up($_GET['pid']);
	 $query_res = mysqli_query($con,"select * from posts where post_id = '$post_id'");
	 $res = mysqli_fetch_array($query_res);
	 

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
		<?php include "includes/main-header.php"; ?>
</head>
<body>
<?php
if(isset($_POST['upload'])){
	if(!empty($_FILES["picture"]["name"])){
		$allowed_ext = array("image/jpg","image/jpeg","image/png");
		$song_image = $_FILES['picture']['name'];  
		$song_image_tmp = $_FILES['picture']['tmp_name'];
		$title =      clean_up($_POST['title']);
		$author =    clean_up($_POST['author']);
		$content =    clean_up($_POST['content']);
		$post_url = clean_up(seo_url($title));
		$type = $_FILES['picture']['type'];
		$post_date = clean_up(date('Y-m-d h:i:s'));
		 if(empty($title) || empty($author) || empty($content)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else if(empty($_FILES["picture"]["name"])){
				$errors[] = "please select an image to upload";
		}else if(!in_array($type, $allowed_ext)){
				$errors[] = "image type not supported";
		}else{
				$extension = explode(".", $_FILES["picture"]["name"]);
				$newfilename = clean_up(round(microtime(true)) . '.' . end($extension));
				$folder="post_img/";
				$dir=$folder.$newfilename;
				if(move_uploaded_file($song_image_tmp,$dir)){
				$upd = mysqli_query($con,"update posts set post_title='$title',post_author='$author',post_content='$content',post_url='$post_url',post_image='$dir',post_date='$post_date' where post_id='$post_id'")or die(mysqli_error($con));
				echo '<script>swal("Success!", "you have successfully updated this post!", "success");</script>';
				 echo "<div class='alert alert-success'>Post submitted successfully <a href='index.php'>, goto Dashboard</a> <span class='glyphicon glyphicon-ok'></span></div>";
				die();
				}else{
					$errors[] = "error saving file";
				}
			}
	}else{
		$title =    clean_up($_POST['title']);
		$author =    clean_up($_POST['author']);
		$content =    clean_up($_POST['content']);
		$post_url = 	clean_up(seo_url($title));
		$post_date = 	clean_up(date('Y-m-d h:i:s'));
		if(empty($title) || empty($author) || empty($content)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else{
				$upd = mysqli_query($con,"update posts set post_title='$title',post_author='$author',post_content='$content',post_url='$post_url',post_date='$post_date' where post_id='$post_id'")or die(mysqli_error($con));
				if($upd){
				echo '<script>swal("Success!", "you have successfully updated this post!", "success");</script>';
				echo "<div class='alert alert-success'>Post submitted successfully <a href='index.php'>, goto Dashboard</a> <span class='glyphicon glyphicon-ok'></span></div>";
				die();
				}else{
					$errors[] = "error saving file";
				}
			}
	}	
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
	<section>
		<div class="col-md-8">
				 <?php if(!empty($errors)){echo error_display($errors);}
			 if(isset($_GET['success'])){
				 echo "<div class='alert alert-success'>Post submitted successfully <span class='glyphicon glyphicon-ok'></span></div>";
			 }
			 ?>
                <div  class="panel panel-default">
                <div  class="panel-heading ">
                 <h4 style="text-align: center;"><span class="glyphicon glyphicon-plus"></span> Edit Post</h4>
				 </div>
				 <div class="panel-body">
				    <form method="POST" class="well" enctype="multipart/form-data">
			<div class="row">
					<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<input type="text"   class="form-control" name="title" placeholder="post Title" value="<?php echo $res['post_title'];?>"/>
					</div>
			<br>
				<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text"   class="form-control" name="author" placeholder="post Author" value="<?php echo $res['post_author'];?>"/>
					</div>
			<br>
				<label>Post content:</label><br>
				<textarea cols="38" rows="4"  name="content" style="resize:none;" id="txtArea"><?php echo $res['post_content'];?></textarea>
				<br>
				<span id="error"></span>
				<br>
				<label>Post Picture:</label>
				<input type="file" value="upload image" name="picture" class="btn btn-primary btn-xs">
				<img src="<?php echo $res['post_image'];?>" style="width:230px;height:130px;" class="img img-responsive">
				<br>
				<button class="btn btn-primary btn-sm" name="upload">UPDATE</button>
			</form>
               </div>
     
         </div>
		 
</div>
		</div>
		</section>
	<!-- sidebar-->
		<aside>
		<div class="col-md-4">
		<?php include "includes/aside.php"; ?>
		</div>
		</aside>
		
	</div>
</div>
<footer>
<?php include "includes/footer.php"; ?>
</footer>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>
	<script>
$(document).ready(function(){
	//alert('ok');
	$('#txtArea').keyup(function(){
		var count = $(this).val().length;
		//alert(count);
		if(count > 5000){
			$(this).addClass('stroke');
			$('#error').html('you have exceeded the maximum lenght for Desciption').css('color','red');
			this.value = this.value.substring(0,5000);
		}else{
			$(this).removeClass('stroke');
			$('#error').html('');
		}
	});
		
	
});
</script>
<script>
CKEDITOR.replace('txtArea');
</script>
</body>
</html>
<?php
}
?>