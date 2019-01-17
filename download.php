<?php include "usable.php";
if(!isset($_GET['url']) and empty($_GET['url'])){
	header('Location:index.php');
}else{
	$url = clean_up(trim($_GET['url']));
	$url = preg_replace("/[^0-9a-zA-Z-]/","",$url);
	$get_id = "select song_id from songs where song_url = '$url'";
	$stmt = $con->query($get_id);
	$row = $stmt->fetch_assoc();
	$post_id = clean_up($row['song_id']);
	/* if(isset($_POST['submit']) && !empty($_GET['url'])){
		if(empty($_POST['user']) || empty($_POST['comment'])){
			echo "<script>alert('all comment feilds are required')</script>";
		}
	} */
	if(isset($_POST['submit'])){
		$user = $_POST['user'];
		$comment = $_POST['comment'];
		if(empty($user) || empty($comment)){
			echo "<script>alert('all comment feilds are required')</script>";
		}else{
			$user = clean_up($user);
			$comment = clean_up($comment);
			$date = clean_up(date('Y-m-d h:i:s'));
			$ins = $con->query("insert into comments(item_id,comment_user,comment,comment_date,comment_action)values('$post_id','$user','$comment','$date',1)");
			if($ins){
				echo "<script>alert('we have received your comment!')</script>";
				echo "<script>window.open('download.php?url=".$url."','_self')</script>";
			}else{
				echo "<script>alert('oops, an Error occured!')</script>";
			}
		}
	}
	if(isset($_POST['reply'])){
		$user_name = $_POST['user_name'];
		$user_comment = $_POST['user_comment'];
		$user_hidden = $_POST['user_hidden'];
		/* echo $user_hidden;
		die(); */
		if(empty($user_name) || empty($user_comment) || empty($user_hidden)){
			echo "<script>alert('please say something!')</script>";
		}else{
			$user_name = clean_up($user_name);
			$user_comment = clean_up($user_comment);
			$user_hidden = clean_up($user_hidden);
			$date = clean_up(date('Y-m-d h:i:s'));
			$rns = $con->query("insert into replies(reply_user,reply_header_id,reply,reply_date)values('$user_name','$user_hidden','$user_comment','$date')")or die(mysqli_error($con));
			if($rns){
				echo "<script>alert('we have received your comment!')</script>";
				echo "<script>window.open('download.php?url=".$url."','_self')</script>";
			}else{
				echo "<script>alert('oops, an Error occured!')</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
 <?php include "includes/meta-head.php"; ?>
    </head>
    <body class="msl-black">
        <!--Loader Wrapper Start-->
        
        <!--Loader Wrapper End--> 
        <!--Kode Wrapper Start-->   
        <div class="kode_wrapper"> 
             <!--Kode header Start-->  
			<header class="header-style-3">
                <div class="header-1st-row">
                   <?php include "includes/first-row.php"; ?>
                </div>
                <div class="header-2st-row ">
                    <div class="container">
                      <?php include "includes/second-row.php"; ?>			
                    </div>
                </div>
                <div class="header-2st-row align-center-nav">
				<div class="container">
                    <?php include "includes/inner-nav.php"; ?>		
                </div>
                </div>
            </header>
			<!--Kode header ends-->
            <!--Sub Banner Wrap Start-->
            <div class="sub-banner">
                <div class="container">
					<?php $query1 = $con->query("select * from songs where song_url = '$url'");
								  if($row = $query1->fetch_assoc()){ ?>
					<h6><?php echo $row['song_title']." - ".$row['song_author']; ?></h6>
                <?php
								  }else{
						echo "<h6>ERROR</h6>";			  
								  }
				?>
                 </div>
            </div>
            <!--Sub Banner Wrap End-->
            <!--Main Content Wrap Start-->
            <div class="kode_content_wrap">
                <section class="artist-section">
                    <div class="container">
                    <div class="row">
                      <div class="col-md-8">
                        <!--Blog Full Start-->
						<?php 
								$query1 = $con->query("select * from songs join classess on songs.song_type = classess.class_id where songs.song_url = '$url'");
								  if($row = $query1->fetch_assoc()){
									   $desc = $row['song_description'];
						?>
                        <div class="msl-blog-full">
                            <figure>
                                <img src="admin/<?php echo $row['song_image_path']; ?>" alt="dreamzvibe">
                                <span class="editor-label"><i class="fa fa-star"></i>Editor Choice</span>
                            </figure>
                            <div class="text">
                                <h5 class="blog-title"><a href="#"><?php echo $row['song_title'];?></a></h5>
                                <p><?php echo $desc; ?></p>
                                <a class="btn-1" style="cursor:pointer;" href="mp3-get.php?<?php echo "file=".$row['song_path']."&url=".$row['song_url']; ?>">Download</span></a>
                                <div class="admin-post pull-right">
                                    <figure><img src="extra-images/dw.png" alt="dreamzvibe"></figure>
                                    <h6><a href="#"><?php echo $row['song_author']; ?></a></h6>
                                </div>
                            </div>
                        </div>
                        <!--Blog Full End-->
                        <?php
						 }else{
							 ?>
			<div class="msl-blog-full">
                            <div class="text">
					<h6>OOps</h6>
					 <p>Error: Something went wrong!</p>
				</div>
			</div>
			<?php
						 }
						?>
                    </div>
					<div class="col-md-4">
	            			<aside>
							<h3>Recommended songs</h3>
                                <!--Widget Artist Start-->
                                <?php include "includes/right-bar.php"; ?>
                            </aside>
	            		</div>
                    </div>
                    </div>
                </section>
            </div>
            <!--Main Content Wrap End-->
           <?php include "includes/comments.php"; ?>
            <footer class="msl-footer">
                <?php include "includes/footer.php"; ?>
            </footer>
            <!--Footer Wrap End-->

            <!--Copy Right Wrap Start-->
            <div class="msl-copyright theme-bg">
               <?php include "includes/copyright.php"; ?>
            </div>
            <!--Copy Right Wrap End-->
        </div>
        <!--Jquery Library-->
      <?php include "includes/bottom-js.php"; ?>
	  <script>
$(document).ready(function(){
	$('.comment-reply-link').hover(function(){
			$(this).css('cursor','pointer');
	});
	$('.kode-reply-form').hide();
	$('.comment-reply-link').click(function(){
		$('.kode-reply-form').hide();
		$(this).parents('.kode-author-content').parents('.kode-author').parents('.comment_item').parents('.grand_parent').find('.kode-reply-form').slideDown();
	});
});
</script>
    </body>

</html>
<?php
}
?>