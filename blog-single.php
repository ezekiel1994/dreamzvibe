<?php include "usable.php";
if(!isset($_GET['url']) and empty($_GET['url'])){
	header('Location:index.php');
}else{
	$url = clean_up(trim($_GET['url']));
	$url = preg_replace("/[^0-9a-zA-Z-]/","",$url);
	$get_id = "select post_id from posts where post_url = '$url'";
	$stmt = $con->query($get_id);
	$row = $stmt->fetch_assoc();
	$post_id = clean_up($row['post_id']);
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
			$ins = $con->query("insert into post_comments(item_id,comment_user,comment,comment_date,comment_action)values('$post_id','$user','$comment','$date',1)");
			if($ins){
				echo "<script>alert('we have received your comment!')</script>";
				echo "<script>window.open('blog-single.php?url=".$url."','_self')</script>";
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
			$rns = $con->query("insert into post_replies(reply_user,reply_header_id,reply,reply_date)values('$user_name','$user_hidden','$user_comment','$date')")or die(mysqli_error($con));
			if($rns){
				echo "<script>alert('we have received your comment!')</script>";
				echo "<script>window.open('blog-single.php?url=".$url."','_self')</script>";
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
				<?php $query1 = $con->query("select * from posts where post_url = '$url'");
								  if($row = $query1->fetch_assoc()){ ?>
					<h6><?php echo $row['post_title'] ?></h6>
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
								$query1 = $con->query("select * from posts where posts.post_url = '$url'");
								  if($row = $query1->fetch_assoc()){
									   //$content = $row['post_description'];
						?>
                        <div class="msl-featured-thumb blog-detail">
                                    <figure>
                                        <img src="extra-images/blog-detail.jpg" alt="KODEFOREST">
                                    </figure>
                                    <div class="text blog-detail-caption">
                                        <!--Featured Title Start-->
                                        <h4 class="featured-title">
                                            <a href="#"><?php echo $row['post_title']; ?></a>
                                        </h4>
                                        <!--Featured Title End-->
                                        <!--Featured Meta Start-->
                                        <div class="blog-post-meta">
                                            <div class="blog-info blog-admin">
                                                <a href="#"><?php echo $row['post_author']; ?> -</a>
                                                <span><?php echo $row['post_title']; ?></span>
                                            </div>
                                            <div class="blog-info blog-comment">
                                                <?php 
												$main_comment = mysqli_num_rows(mysqli_query($con,"select * from post_comments where item_id = '$post_id' " ));
												//$sub_comment = mysqli_num_rows(mysqli_query($con,"select * from post_replies where reply_header_id = '$post_id' " ));
												?>
												<span><?php echo $main_comment; ?>  Comments  <i class="fa fa-comment-o"></i></span>
                                            </div>
                                        </div>
                                        <!--Featured Meta End-->
										<?php echo $row['post_content']; ?>
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
							<h3>Recommended posts</h3>
                                <!--Widget Artist Start-->
                                <?php include "includes/post_right_bar.php"; ?>
                            </aside>
                        
                    </div>
                    </div>
                    </div>
                </section>
            </div>
            <!--Main Content Wrap End-->
           <?php include "includes/post_comments.php"; ?>
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