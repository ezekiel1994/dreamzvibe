<?php include "usable.php";
if(!isset($_GET['uid']) and empty($_GET['uid'])){
	header('Location:index.php');
}else{
	$uid = clean_up(trim($_GET['uid']));
	$uid = preg_replace("/[^0-9]/","1",$uid);
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
			$qq = mysqli_num_rows(mysqli_query($con,"select * from songs join classess on songs.song_type = classess.class_id where songs.song_type='$uid'"));
								
			if($qq>0){
			?>
            <div class="sub-banner">
				 <div class="container">
					<?php 
					$qck = $con->query("select * from songs join classess on songs.song_type = classess.class_id where songs.song_type='$uid'");	
					if($row = $qck->fetch_assoc()){
					echo "<h6>".$row['class']."</h6>";
					}
					?>
			   </div>
            </div>
            <!--Sub Banner Wrap End-->
            <!--Main Content Wrap Start-->
            <div class="kode_content_wrap">
                <section>
                    <div class="container">
                        <div class="mp3-list-wrap">
                            <div class="heading-2">
                                <h5>ALL TRACKS</h5>
                            </div>
                            <!--Mp3 List Search Start-->
                         
                            <!--Mp3 List Search End-->
                            <!--Mp3 Alpha List Start-->
                            <div class="rgb-alpha-listing-nav">
                                <ul>
                                    <li><a href="filter.php?alpha=a">a</a></li>
                                    <li><a href="filter.php?alpha=b">b</a></li>
                                    <li><a href="filter.php?alpha=c">c</a></li>
                                    <li><a href="filter.php?alpha=d">d</a></li>
                                    <li><a href="filter.php?alpha=e">e</a></li>
                                    <li><a href="filter.php?alpha=f">f</a></li>
                                    <li><a href="filter.php?alpha=g">g</a></li>
                                    <li><a href="filter.php?alpha=h">h</a></li>
                                    <li><a href="filter.php?alpha=i">i</a></li>
                                    <li><a href="filter.php?alpha=j">j</a></li>
                                    <li><a href="filter.php?alpha=k">k</a></li>
                                    <li><a href="filter.php?alpha=l">l</a></li>
                                    <li><a href="filter.php?alpha=m">m</a></li>
                                    <li><a href="filter.php?alpha=n">n</a></li>
                                    <li><a href="filter.php?alpha=o">o</a></li>
                                    <li><a href="filter.php?alpha=p">p</a></li>
                                    <li><a href="filter.php?alpha=q">q</a></li>
                                    <li><a href="filter.php?alpha=r">r</a></li>
                                    <li><a href="filter.php?alpha=s">s</a></li>
                                    <li><a href="filter.php?alpha=t">t</a></li>
                                    <li><a href="filter.php?alpha=u">u</a></li>
                                    <li><a href="filter.php?alpha=v">v</a></li>
                                    <li><a href="filter.php?alpha=w">w</a></li>
                                    <li><a href="filter.php?alpha=x">x</a></li>
                                    <li><a href="filter.php?alpha=y">y</a></li>
                                    <li><a href="filter.php?alpha=z">z</a></li>
                                </ul>
                            </div>
                            <!--Mp3 Alpha List End-->
                            <!--Mp3 List Table Start-->
                            <ul class="mp3-list-table" >
                                <li class="list-header">
                                    <div class="mp3-title"><h6>Title</h6></div>
                                    <div class="artists"><h6>Artists</h6></div>
                                    <div class="mp3-label"><h6>Genre</h6></div>
                                    <div class="genre"><h6>Label</h6></div>
                                    <div class="released"><h6>Date Posted</h6></div>
                                </li>
                                <!--Mp3 List Thumb Start-->
								<?php
								$result_per_page = 9;
								$qq = mysqli_num_rows(mysqli_query($con,"select * from songs join classess on songs.song_type = classess.class_id where songs.song_type='$uid' order by song_id desc"));
								$number_of_pages = ceil($qq/9);
								if(!isset($_GET['page'])){
									$page = 1;
								}else{
									$page = $_GET['page'];
								}
								$start = ($page-1)*$result_per_page;
								 $query1 = $con->query("select * from songs join classess on songs.song_type = classess.class_id where songs.song_type='$uid' order by song_id desc limit ".$start.",".$result_per_page."");
								
								  while($row = $query1->fetch_assoc()){
									   $desc = $row['song_description'];
								   ?>
                                <li>
                                    <div class="mp3-title">
                                        <div class="mp3-playlist-item-cover">
                                            <span class="img-holder">
                                                <img src="admin/<?php echo $row['song_image_path'];?>" alt="">
                                            </span>
                                        </div>
                                        <div class="text-overflow">
                                            <a class="mp3-icon" href="download.php?url=<?php echo $row['song_url'];?>"><i class="icon-play-button"></i></a>
                                            <a class="mp3-icon" href="download.php?url=<?php echo $row['song_url'];?>"><i class="icon-music-1"></i></a>
                                            <h6><a href="download.php?url=<?php echo $row['song_url'];?>"><?php echo $row['song_title'];?></a></h6>
                                        </div>
                                    </div>
                                    <div class="artists"><h6><b><?php echo $row['song_author'];?></b></h6></div>
                                    <div class="genre"><h6><?php echo $row['class'];?></h6></div>
                                    <div class="key"><h6>Dreamzvibe</h6></div>
                                    <div class="released"><h6><?php echo facebook_time_ago($row['song_date']);?></h6></div>
                                </li>
								<?php
								  }
								?>
                                <!--Mp3 List Thumb End-->
                                <!--Mp3 List Thumb End-->
                            </ul>
                            <!--Mp3 List Table End-->
                        </div>
                        <!--Pagination Wrap Start-->
                        <?php
					$one = 1;
					echo "<ul class='pagination'>";
					//prev
					if($page != 1 && $page ){
						$prev = $page-$one;
				echo "<li><a aria-label='Previous' href='?uid=".$uid."&page=".$prev."'><span aria-hidden='true'><i class='fa fa-angle-left'></i>PREV</span></a></li>";
					}else{
						$prev = 1;
				echo "<li class='disabled' style='display:none;'><a aria-label='Previous' href='?uid=".$uid."&page=".$prev."'><span aria-hidden='true'><i class='fa fa-angle-left'></i>PREV</span></a></li>";
					}
					echo "<li class='active'><a href='?uid=".$uid."&page=".$page."'>".$page."</a></li>";
					echo "<li class='disabled'><a href=''>....</a></li>";
					echo "<li><a href='?uid=".$uid."&page=".$number_of_pages."'>".$number_of_pages."</a></li>";
					//next
					if($page != $number_of_pages){
						$next = $page+1;
			echo "<li><a aria-label='Next' href='?uid=".$uid."&page=".$next."'><span aria-hidden='true'>Next<i class='fa fa-angle-right'></i></span></a></li>";
					}else{
						$next = $number_of_pages;
						echo "<li class='disabled' style='display:none;'><a aria-label='Next' href='?uid=".$uid."&page=".$next."'><span aria-hidden='true'>Next<i class='fa fa-angle-right'></i></span></a></li>";
			
					}
					echo "</ul>";
				?>
                        <!--Pagination Wrap End-->
						
                    </div>
                </section>
            </div>
            <!--Main Content Wrap End-->
            <?php
			}else{
			?>
			<div class="sub-banner">
				 <div class="container">
					<h6>OOps</h6>
					 <p>Empty result: we are working on giving you the best!</p>
				</div>
			</div>
			<?php
			}
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