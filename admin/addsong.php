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
$query2 = "select * from classess";
$run_pro2 = $con->query($query2);


if(isset($_POST['upload'])){
$allowed_ext = array("image/jpg","image/jpeg");
		
		$song_allowed_ext = array("mp3","mp4","wma");
		$song = $_FILES['song']['name'];
		$song_image = $_FILES['picture']['name']; 
		$song_tmp = $_FILES['song']['tmp_name']; 
		$song_image_tmp = $_FILES['picture']['tmp_name'];
		$title =      clean_up($_POST['title']);
		$author =    clean_up($_POST['author']);
		$cat =    clean_up((int)$_POST['cat']);
		$class =    clean_up((int)$_POST['class']);
		$desc =    clean_up($_POST['desc']);
		$song_url = clean_up(seo_url($title));
		$type = $_FILES['picture']['type'];
		$song_type = $_FILES['song']['type'];
		$ext = explode('.',$song);
		$final_ext = end($ext);
		
		 if(empty($title) || empty($author) || empty($desc) || empty($cat) || empty($class) ){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else if(title_exist($_POST['title'])){
				$errors[] = "<strong>this song title exist!</strong>";
		}else if(empty($_FILES["picture"]["name"])){
				$errors[] = "please select an image to upload";
		}else if(empty($_FILES["song"]["name"])){
				$errors[] = "please select a music file";
		}else if($_FILES["song"]["size"] > 15485760){
				$errors[] = "File too large";
		}else if(!in_array($type, $allowed_ext)){
				$errors[] = "Song image type not supported";
		}else if(!in_array($final_ext, $song_allowed_ext)){
				$errors[] = "Song type not supported";
		}else{
				$extension = explode(".", $_FILES["picture"]["name"]);
				$newfilename = clean_up(round(microtime(true)) . '.' . end($extension));
				$folder="song_image_cover/";
				$dir=$folder.$newfilename;
				move_uploaded_file($song_image_tmp,$dir);

				$song_base=$_FILES['song']['name'];
				$exxt = explode(".", $_FILES["song"]["name"]);
				$song_base = $song_url.'.' . end($exxt);
				$directory="songs/";
				$direct=$directory.$song_base;
				if(move_uploaded_file($song_tmp,$directory.$song_base)){
				$register_item = array(
								"song_title"=>trim($title),
								"song_author"=>trim($author),
								"song_description"=>trim($desc),
								"song_category"=>trim($cat),
								"song_type"=>trim($class),
								"song_image_path"=>trim($dir),
								"song_path"=>trim($direct),
								"song_url"=>trim($song_url),
								"song_date"=>clean_up(date('Y-m-d h:i:s')),
								"song_action"=>'1'
							);
				register_song($register_item);
				header('Location:addsong.php?success');
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
				 echo "<div class='alert alert-success'>Song added successfully <span class='glyphicon glyphicon-ok'></span></div>";
			 }
			 ?>
                <div  class="panel panel-default">
                <div  class="panel-heading ">
                 <h4 style="text-align: center;"><span class="glyphicon glyphicon-plus"></span> Add Song</h4>
				 </div>
				 <div class="panel-body">
				    <form method="POST" class="well" enctype="multipart/form-data">
			<div class="row">
					<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<input type="text"   class="form-control" style="width: 100%;"  name="title" placeholder="song Title" />
					</div>
			<br>
				<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text"   class="form-control" style="width:100%;" name="author" placeholder="song Author" />
					</div>
			<br>
			
				<label>Song category:</label><br>
				<select name="cat" id="cat" class="form-control">
				<option>-select category-</option>
					<?php 
					while($row=$run_pro->fetch_assoc()){
						echo "<option value='".$row['category_id']."'>".$row['category']."</option>";
					}
					?>
				</select>
				<br>
				<label>Song Type:</label><br>
				<select name="class" class="form-control">
				<option>-select type-</option>
					<?php 
					while($row=$run_pro2->fetch_assoc()){
						echo "<option value='".$row['class_id']."'>".$row['class']."</option>";
					}
					?>
				</select>
				<br>
				<span id="error"></span>
				<br>
				<div class="row">
				<div class="col-md-6">
				<label>Song Picture:</label>
				<input type="file" value="upload image" name="picture" class="btn btn-primary btn-xs">
				</div>
				<div class="col-md-6">
				<label>File upload:</label>
				<input type="file" value="upload file" name="song" class="btn btn-primary btn-sm"/>
				</div>
				</div>
				<label>Song Description:</label><br>
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