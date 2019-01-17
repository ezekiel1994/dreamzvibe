<?php 
require "../usable.php";
include "admin_func/functions.php";
if(!logged_in()){
	header('Location:../login.php');
}else if(!isset($_GET['pid']) || empty($_GET['pid'])){
	header('Location:index.php');
}else{
	$song_id = clean_up($_GET['pid']);
	$song_id = preg_replace("/[^0-9]+/","",$song_id);
	$query = "select * from categories";
$run_pro = $con->query($query);
$query2 = "select * from classess";
$run_pro2 = $con->query($query2);
	$query_res = mysqli_query($con,"select * from songs where song_id = '$song_id'");
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
	if(!empty($_FILES["picture"]["name"]) || !empty($_FILES["song"]["name"])){
		$allowed_ext = array("image/jpg","image/jpeg","image/png");
		$song_allowed_ext = array("mp3","mp4","wma");
		$song = $_FILES['song']['name'];
		$song_image = $_FILES['picture']['name']; 
		$song_tmp = $_FILES['song']['tmp_name']; 
		$song_image_tmp = $_FILES['picture']['tmp_name'];
		$title =      clean_up($_song['title']);
		$author =    clean_up($_song['author']);
		$description =    clean_up($_song['desc']);
		$song_url = clean_up(seo_url($title));
		$cat =    clean_up((int)$_POST['cat']);
		$class =    clean_up((int)$_POST['class']);
		$type = $_FILES['picture']['type'];
		$song_date = clean_up(date('Y-m-d h:i:s'));
		$song_type = $_FILES['song']['type'];
		$ext = explode('.',$song);
		$final_ext = end($ext);
		 if(empty($title) || empty($author) || empty($description)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else if(!in_array($final_ext, $song_allowed_ext)){
				$errors[] = "Song type not supported";
		}else if(!in_array($type, $allowed_ext)){
				$errors[] = "image type not supported";
		}else{
				$extension = explode(".", $_FILES["picture"]["name"]);
				$newfilename = clean_up(round(microtime(true)) . '.' . end($extension));
				$folder="song_image_cover/";
				$dir=$folder.$newfilename;
				
				$song_base=$_FILES['song']['name'];
				$exxt = explode(".", $_FILES["song"]["name"]);
				$song_base = $song_url.'.' . end($exxt);
				$directory="songs/";
				$direct=$directory.$song_base;
				
				if(move_uploaded_file($song_tmp,$directory.$song_base) || move_uploaded_file($song_image_tmp,$dir)){
				$upd = mysqli_query($con,"update songs set song_title='$title',song_author='$author',song_description='$description',song_url='$song_url',song_image_path='$dir',song_path='$direct',song_type='$class',song_category='$cat',song_date='$song_date' where song_id='$song_id'")or die(mysqli_error($con));
				echo '<script>swal("Success!", "you have successfully updated this song!", "success");</script>';
				 echo "<div class='alert alert-success'>song submitted successfully <a href='index.php'>, goto Dashboard</a> <span class='glyphicon glyphicon-ok'></span></div>";
				die();
				}else{
					$errors[] = "error saving file";
				}
			}
	}else if(empty($_FILES["picture"]["name"])){
		$song_allowed_ext = array("mp3","mp4","wma");
		$song = $_FILES['song']['name'];
		$song_tmp = $_FILES['song']['tmp_name'];
		$title =      clean_up($_song['title']);
		$author =    clean_up($_song['author']);
		$description =    clean_up($_song['desc']);
		$song_url = clean_up(seo_url($title));
		$cat =    clean_up((int)$_POST['cat']);
		$class =    clean_up((int)$_POST['class']);
		$song_date = clean_up(date('Y-m-d h:i:s'));
		$song_type = $_FILES['song']['type'];
		$ext = explode('.',$song);
		$final_ext = end($ext);
		 if(empty($title) || empty($author) || empty($description)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else if(!in_array($final_ext, $song_allowed_ext)){
				$errors[] = "Song file type not supported";
		}else{
				$song_base=$_FILES['song']['name'];
				$exxt = explode(".", $_FILES["song"]["name"]);
				$song_base = $song_url.'.' . end($exxt);
				$directory="songs/";
				$direct=$directory.$song_base;
				
				if(move_uploaded_file($song_tmp,$directory.$song_base)){
				$upd = mysqli_query($con,"update songs set song_title='$title',song_author='$author',song_description='$description',song_url='$song_url',song_path='$direct',song_type='$class',song_category='$cat',song_date='$song_date' where song_id='$song_id'")or die(mysqli_error($con));
				echo '<script>swal("Success!", "you have successfully updated this song!", "success");</script>';
				 echo "<div class='alert alert-success'>song submitted successfully <a href='index.php'>, goto Dashboard</a> <span class='glyphicon glyphicon-ok'></span></div>";
				die();
				}else{
					$errors[] = "error saving file";
				}
			}
	}else if(empty($_FILES["song"]["name"])){
		$allowed_ext = array("image/jpg","image/jpeg","image/png");
		$song_image = $_FILES['picture']['name'];
		$song_image_tmp = $_FILES['picture']['tmp_name'];
		$title =      clean_up($_song['title']);
		$author =    clean_up($_song['author']);
		$description =    clean_up($_song['desc']);
		$song_url = clean_up(seo_url($title));
		$cat =    clean_up((int)$_POST['cat']);
		$class =    clean_up((int)$_POST['class']);
		$type = $_FILES['picture']['type'];
		$song_date = clean_up(date('Y-m-d h:i:s'));
		 if(empty($title) || empty($author) || empty($description)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else if(!in_array($type, $allowed_ext)){
				$errors[] = "image type not supported";
		}else{
				$extension = explode(".", $_FILES["picture"]["name"]);
				$newfilename = clean_up(round(microtime(true)) . '.' . end($extension));
				$folder="song_image_cover/";
				$dir=$folder.$newfilename;
				if(move_uploaded_file($song_image_tmp,$dir)){
				$upd = mysqli_query($con,"update songs set song_title='$title',song_author='$author',song_description='$description',song_url='$song_url',song_image_path='$dir',song_type='$class',song_category='$cat',song_date='$song_date' where song_id='$song_id'")or die(mysqli_error($con));
				echo '<script>swal("Success!", "you have successfully updated this song!", "success");</script>';
				 echo "<div class='alert alert-success'>song submitted successfully <a href='index.php'>, goto Dashboard</a> <span class='glyphicon glyphicon-ok'></span></div>";
				die();
				}else{
					$errors[] = "error saving file";
				}
			}
	}else{
		$title =      clean_up($_song['title']);
		$author =    clean_up($_song['author']);
		$description =    clean_up($_song['desc']);
		$song_url = clean_up(seo_url($title));
		$cat =    clean_up((int)$_POST['cat']);
		$class =    clean_up((int)$_POST['class']);
		$song_date = clean_up(date('Y-m-d h:i:s'));
		if(empty($title) || empty($author) || empty($description)){
				$errors[] = "<strong>All feilds are required!</strong>";
		 }else{
				$upd = mysqli_query($con,"update songs set song_title='$title',song_author='$author',song_description='$description',song_url='$song_url',song_date='$song_date' where song_id='$song_id'")or die(mysqli_error($con));
				if($upd){
				echo '<script>swal("Success!", "you have successfully updated this song!", "success");</script>';
				echo "<div class='alert alert-success'>song submitted successfully <a href='index.php'>, goto Dashboard</a> <span class='glyphicon glyphicon-ok'></span></div>";
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
		<div class="col-md-8 col-sm-12">
				 <?php if(!empty($errors)){echo error_display($errors);}
			 if(isset($_GET['success'])){
				 echo "<div class='alert alert-success'>song submitted successfully <span class='glyphicon glyphicon-ok'></span></div>";
			 }
			 ?>
                <div  class="panel panel-default">
                <div  class="panel-heading ">
                 <h4 style="text-align: center;"><span class="glyphicon glyphicon-plus"></span> Edit song</h4>
				 </div>
				<div class="panel-body">
				    <form method="song" class="well" enctype="multipart/form-data">
			<div class="row">
					<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
						<input type="text"   class="form-control" style="width: 100%;"  name="title" placeholder="song Title" value="<?php echo $res['song_title'];?>"/>
					</div>
			<br>
				<div class="input-group margin-bottom-sm col-sm-7">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text"   class="form-control" style="width:100%;" name="author" placeholder="song Author" value="<?php echo $res['song_author'];?>" />
					</div>
			<br>
			
				<label>Song category:</label><br>
				<select name="cat" id="cat" class="form-control">
				<?php $run = mysqli_fetch_array(mysqli_query($con,"select category from categories where category_id = '{$res['song_category']}'"));?>
				<option value="<?php echo $run['category_id'];?>"><?php echo $run['category'];?></option>
					<?php 
					while($row=$run_pro->fetch_assoc()){
						echo "<option value='".$row['category_id']."'>".$row['category']."</option>";
					}
					?>
				</select>
				<br>
				<label>Song Type:</label><br>
				<select name="class" class="form-control">
				<?php $run = mysqli_fetch_array(mysqli_query($con,"select class from classess where class_id = '{$res['song_type']}'"));?>
				<option value="<?php echo $run['class_id'];?>"><?php echo $run['class'];?></option>
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
				<div class="col-md-6 col-sm-6">
				<label>Song Picture:</label>
				<input type="file" value="upload image" name="picture" class="btn btn-primary btn-xs"><br>
				<img src="<?php echo $res['song_image_path'];?>" style="width:230px;height:130px;" class="img img-responsive">
				</div>
				<div class="col-md-6 col-sm-4">
				<label>File upload:</label>
				<input type="file" value="upload file" name="song" class="btn btn-primary btn-sm"/><br>
				 <audio controls>
				  <source src="<?php echo $res['song_path'];?>" type="audio/mpeg" style="width:100%;max-width:600px;">
					Your browser does not support the audio element.
				</audio> 
				</div>
				</div>
				<label>Song Description:</label><br>
				<textarea cols="38" rows="4"  name="desc" style="resize:none;" id="txtArea"><?php echo $res['song_description']; ?></textarea>
				
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
		<div class="col-md-4 col-sm-12">
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