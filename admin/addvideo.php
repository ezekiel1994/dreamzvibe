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
$query = "select * from categories";
$run_pro = $con->query($query);


if(isset($_POST['upload'])){
$allowed_ext = array("image/jpg","image/jpeg");
		
		$video_allowed_ext = array("avi","mp4","wma");
		$video = $_FILES['video']['name'];
		$video_image = $_FILES['picture']['name']; 
		$video_tmp = $_FILES['video']['tmp_name']; 
		$video_image_tmp = $_FILES['picture']['tmp_name'];
		$title =      clean_up($_POST['title']);
		$author =    clean_up($_POST['author']);
		$desc =    clean_up($_POST['desc']);
		$video_url = clean_up(seo_url($title));
		$type = $_FILES['picture']['type'];
		$video_type = $_FILES['video']['type'];
		$ext = explode('.',$video);
		$final_ext = end($ext);
		
		 if(empty($title) || empty($author) || empty($desc)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else if(video_title_exist($_POST['title'])){
				$errors[] = "<strong>this video title exist!</strong>";
		}else if(empty($_FILES["picture"]["name"])){
				$errors[] = "please select an image to upload";
		}else if(empty($_FILES["video"]["name"])){
				$errors[] = "please select a music file";
		}else if($_FILES["video"]["size"] > 55485760){
				$errors[] = "File too large";
		}else if(!in_array($type, $allowed_ext)){
				$errors[] = "Video image type not supported";
		}else if(!in_array($final_ext, $video_allowed_ext)){
				$errors[] = "Video type not supported";
		}else{
				$extension = explode(".", $_FILES["picture"]["name"]);
				$newfilename = clean_up(round(microtime(true)) . '.' . end($extension));
				$folder="video_image_cover/";
				$dir=$folder.$newfilename;
				move_uploaded_file($video_image_tmp,$dir);

				$video_base=$_FILES['video']['name'];
				$video_temp=$_FILES["video"]["tmp_name"];
				$exxt = explode(".", $_FILES["video"]["name"]);
				$video_base = $video_url.'.' . end($exxt);
				$directory="videos/";
				$direct=$directory.$video_base;
				if(move_uploaded_file($video_tmp,$direct)){
				$register_item = array(
								"video_title"=>trim($title),
								"video_author"=>trim($author),
								"video_description"=>trim($desc),
								"video_image_path"=>trim($dir),
								"video_path"=>trim($direct),
								"video_url"=>trim($video_url),
								"video_date"=>clean_up(date('Y-m-d h:i:s')),
								"video_action"=>1
							);
				register_video($register_item);
				header('Location:addvideo.php?success');
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
				 echo "<div class='alert alert-success'>video added successfully <span class='glyphicon glyphicon-ok'></span></div>";
			 }
			 ?>
                <div  class="panel panel-default">
                <div  class="panel-heading ">
                 <h4 style="text-align: center;"><span class="glyphicon glyphicon-plus"></span> Add video</h4>
				 </div>
				 <div class="panel-body">
				    <form method="POST" class="well" enctype="multipart/form-data">
			<div class="row">
					<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<input type="text"   class="form-control" name="title" placeholder="video Title" />
					</div>
				
			<br>
				<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text"   class="form-control" name="author" placeholder="video Author" />
					</div>
					<br>
				<span id="error"></span>
				<br>
				<div class="row">
				<div class="col-md-6">
				<label>Video Picture:</label>
				<input type="file" value="upload image" name="picture" class="btn btn-danger btn-xs"/>
				</div>
				<div class="col-md-6">
				<label>File upload:</label>
				<input type="file" value="upload file" name="video" class="btn btn-danger btn-sm"/>
				</div>
				</div>
			<br>
				<label>video Description:</label><br>
				<textarea cols="38" rows="4"  name="desc" style="resize:none;" id="txtArea"></textarea>
				
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