<?php include "usable.php";
if(isset($_POST['search']) and empty($_POST['value'])){
	header('Location:index.php');
}else{
	$value = clean_up(trim($_POST['value']));
	$value = preg_replace("/[^a-zA-Z -]/","",$value);
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
			<?php
			$query1 = mysqli_query($con,"select count(*) as total from ((select song_title, song_author, song_url, song_date as song from songs where song_title like '%".$value."%' or song_author like '%".$value."%')					
			union all (select video_title, video_author, video_url, video_date as videos from videos where video_title like '%".$value."%' or video_author like '%".$value."%') 
			union all (select post_title, post_author, post_url, post_date as post from posts where post_title like '%".$value."%' or post_author like '%".$value."%'))x")or die(mysqli_error($con));
			$data = $query1->fetch_assoc();
			if($data['total'] < 1){
				?>
			<div class="sub-banner">
				 <div class="container">
					<h6>OOps</h6>
					 <p>Empty result: we are working on giving you the best!</p>
				</div>
			</div>
			<?php
			}else{
			
			?>
            <div class="sub-banner">
				 <div class="container">
				 <h6>Filtered Result</h6>
			   </div>
            </div>
            <!--Sub Banner Wrap End-->
            <!--Main Content Wrap Start-->
            <div class="kode_content_wrap">
                <section>
                    <div class="container">
                        <div class="mp3-list-wrap">
                            <div class="heading-2">
                                <h5>Search Results </h5>
                            </div>
                            <!--Mp3 List Search Start-->
                         
                            <!--Mp3 List Search End-->
                            <!--Mp3 Alpha List Start-->
                           
                            <!--Mp3 Alpha List End-->
                            <!--Mp3 List Table Start-->
                            <ul class="mp3-list-table" >
                                <li class="list-header">
                                    <div class="mp3-title"><h6>Title</h6></div>
                                    <div class="artists"><h6>Author</h6></div>
                                    <div class="genre"><h6>Label</h6></div>
                                    <div class="released"><h6>Date Posted</h6></div>
                                </li>
                                <!--Mp3 List Thumb Start-->
								<?php
								 $query1 = $con->query("(select song_title, song_author, song_url, song_date, 'song' as type from songs where song_title like '%".$value."%' or song_author like '%".$value."%')					
			union (select video_title, video_author, video_url, video_date, 'video' as type from videos where video_title like '%".$value."%' or video_author like '%".$value."%') 
			union (select post_title, post_author, post_url, post_date, 'post' as type from posts where post_title like '%".$value."%' or post_author like '%".$value."%')")or die(mysqli_error($con));
		$type = '';
								
								  while($row = $query1->fetch_assoc()){
									  if($row['type'] == 'song'){
										  $type='Music';
								   ?>
                                <li>
                                    <div class="mp3-title">
                                        <div class="mp3-playlist-item-cover">
                                            <span class="img-holder">
                                                <img src="extra-images/mc.png" alt="">
                                            </span>
                                        </div>
                                        <div class="text-overflow">
                                            <a class="mp3-icon" href="download.php?url=<?php echo $row['song_url'];?>"><i class="icon-play-button"></i></a>
                                            <a class="mp3-icon" href="download.php?url=<?php echo $row['song_url'];?>"><i class="icon-music-1"></i></a>
                                            <h6><a href="download.php?url=<?php echo $row['song_url'];?>"><?php echo $row['song_title'];?></a></h6>
                                        </div>
                                    </div>
                                    <div class="artists"><h6><b><?php echo $row['song_author'];?></b></h6></div>
                                    <div class="key"><h6><?php echo $type; ?></h6></div>
                                    <div class="released"><h6><?php echo facebook_time_ago($row['song_date']);?></h6></div>
                                </li>
								<?php
									  }else if($row['type'] == 'video'){
										  $type='Video';
										  $row = mysqli_fetch_array(mysqli_query($con,"select * from videos where video_title like '%".$value."%' or video_author like '%".$value."%'"))
										  ?>
										  <li>
                                    <div class="mp3-title">
                                        <div class="mp3-playlist-item-cover">
                                            <span class="img-holder">
                                                <img src="extra-images/001.jpg" alt="">
                                            </span>
                                        </div>
                                        <div class="text-overflow">
                                            <a class="mp3-icon" href="v-download.php?url=<?php echo $row['video_url'];?>"><i class="icon-play-button"></i></a>
                                            <a class="mp3-icon" href="v-download.php?url=<?php echo $row['video_url'];?>"><i class="icon-music-1"></i></a>
                                            <h6><a href="v-download.php?url=<?php echo $row['video_url'];?>"><?php echo $row['video_title'];?></a></h6>
                                        </div>
                                    </div>
                                    <div class="artists"><h6><b><?php echo $row['video_author'];?></b></h6></div>
                                    <div class="key"><h6><?php echo $type; ?></h6></div>
                                    <div class="released"><h6><?php echo facebook_time_ago($row['video_date']);?></h6></div>
                                </li>
										  <?php
										  
									  }else if($row['type'] == 'post'){
										  $type='Blog post';
										 $row = mysqli_fetch_array(mysqli_query($con,"select * from posts where post_title like '%".$value."%' or post_author like '%".$value."%'"))
										  ?>
										  <li>
                                    <div class="mp3-title">
                                        <div class="mp3-playlist-item-cover">
                                            <span class="img-holder">
                                                <img src="extra-images/mc.png" alt="">
                                            </span>
                                        </div>
                                        <div class="text-overflow">
                                            <a class="mp3-icon" href="blog-single.php?url=<?php echo $row['post_url'];?>"><i class="fa fa-sticky-note-o"></i></a>
                                            <a class="mp3-icon" href="blog-single.php?url=<?php echo $row['post_url'];?>"><i class="icon-music-1"></i></a>
                                            <h6><a href="blog-single.php?url=<?php echo $row['post_url'];?>"><?php echo $row['post_title'];?></a></h6>
                                        </div>
                                    </div>
                                    <div class="artists"><h6><b><?php echo $row['post_author'];?></b></h6></div>
                                    <div class="key"><h6><?php echo $type; ?></h6></div>
                                    <div class="released"><h6><?php echo facebook_time_ago($row['post_date']);?></h6></div>
                                </li>
										  <?php
									  }
									  }
								?>
                                <!--Mp3 List Thumb End-->
                                <!--Mp3 List Thumb End-->
                            </ul>
                            <!--Mp3 List Table End-->
                        </div>
                        <!--Pagination Wrap Start-->
                        <?php
			}
						?>
                        <!--Pagination Wrap End-->
						
                    </div>
                </section>
            </div>
            <!--Main Content Wrap End-->
            <?php
			//}else{
			?>
			<!--<div class="sub-banner">
				 <div class="container">
					<h6>OOps</h6>
					 <p>Empty result: we are working on giving you the best!</p>
				</div>
			</div>-->
			<?php
			//}
			?>
			<section class="kode_subscribe_section border overlay">
			<div class="container">
            <?php include "includes/subscribe.php"; ?>
			</div>
			</section>

            <!--Footer Wrap Start-->
			               
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
    </body>

</html>
<?php
}
?>