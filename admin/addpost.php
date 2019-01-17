<?php 
require "../usable.php";
include "admin_func/functions.php";
if(!logged_in()){
	header('Location:../login.php');
}else{
/* $inipath = php_ini_loaded_file();

if ($inipath) {
    echo 'Loaded php.ini: ' . $inipath;
} else {
   echo 'A php.ini file is not loaded';
}	 */


if(isset($_POST['upload'])){
$allowed_ext = array("image/jpg","image/jpeg","image/png");
		$song_image = $_FILES['picture']['name'];  
		$song_image_tmp = $_FILES['picture']['tmp_name'];
		$title =      clean_up($_POST['title']);
		$author =    clean_up($_POST['author']);
		$content =    clean_up($_POST['content']);
		$post_url = clean_up(seo_url($title));
		$type = $_FILES['picture']['type'];
		
		 if(empty($title) || empty($author) || empty($content)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else if(post_title_exist($_POST['title'])){
				$errors[] = "<strong>this post title exist!</strong>";
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
				$register_item = array(
								"post_title"=>trim($title),
								"post_author"=>trim($author),
								"post_content"=>trim($content),
								"post_image"=>trim($dir),
								"post_url"=>trim($post_url),
								"post_date"=>clean_up(date('Y-m-d h:i:s')),
								"post_action"=>'1'
							);
				register_post($register_item);
				header('Location:addpost.php?success');
				}else{
					$errors[] = "error saving file";
				}
			}
} 

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
		<?php include "includes/main-header.php"; ?>
</head>
<body>
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
                 <h4 style="text-align: center;"><span class="glyphicon glyphicon-plus"></span> Add Post</h4>
				 </div>
				 <div class="panel-body">
				    <form method="POST" class="well" enctype="multipart/form-data">
			<div class="row">
					<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<input type="text"   class="form-control" name="title" placeholder="post Title" />
					</div>
			<br>
				<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text"   class="form-control" name="author" placeholder="post Author" />
					</div>
			<br>
				<label>Post content:</label><br>
				<textarea cols="38" rows="4"  name="content" style="resize:none;" id="txtArea"></textarea>
				<br>
				<span id="error"></span>
				<br>
				<label>Post Picture:</label>
				<input type="file" value="upload image" name="picture" class="btn btn-primary btn-xs">
				<br>
				<button class="btn btn-primary btn-sm" name="upload">UPLOAD</button>
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