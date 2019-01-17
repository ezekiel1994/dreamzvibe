<?php include "usable.php"; ?>
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
					<h6>Video list</h6>
			   </div>
            </div>
            <!--Sub Banner Wrap End-->
            <!--Main Content Wrap Start-->
            <div class="kode_content_wrap">
                <section>
                    <div class="container">
                        <div class="row">
                                <!--Mp3 List Thumb Start-->
								<?php
								$result_per_page = 9;
								$qq = mysqli_num_rows(mysqli_query($con,"select * from videos order by video_id desc"));
								$number_of_pages = ceil($qq/9);
								if(!isset($_GET['page'])){
									$page = 1;
								}else{
									$page = $_GET['page'];
								}
								$start = ($page-1)*$result_per_page;
								 $query1 = $con->query("select * from videos order by video_id desc limit ".$start.",".$result_per_page."");
								
								  while($row = $query1->fetch_assoc()){
									   $desc = $row['video_description'];
								   ?>
                                 <div class="col-md-4 col-sm-6">
                                <div class="msl-video-thumb">
                                    <figure><img src="admin/<?php echo $row['video_image_path'];?>" alt="KODEFOREST"></figure>
                                    <div class="text">
                                        <h5 class="video-title"><a href="#"><?php echo $row['video_title'];?></a></h5>
                                        <a href="v-download.php?url=<?php echo $row['video_url'];?>" class="video-icon theme-bg">
                                            <i class="icon-multimedia-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
								<?php
								  }
								?>
                                <!--Mp3 List Thumb End-->
                                <!--Mp3 List Thumb End-->
                            
                        </div>
                        <!--Pagination Wrap Start-->
                        <?php
					$one = 1;
					echo "<ul class='pagination'>";
					//prev
					if($page != 1 && $page ){
						$prev = $page-$one;
				echo "<li><a aria-label='Previous' href='?page=".$prev."'><span aria-hidden='true'><i class='fa fa-angle-left'></i>PREV</span></a></li>";
					}else{
						$prev = 1;
				echo "<li class='disabled' style='display:none;'><a aria-label='Previous' href='?page=".$prev."'><span aria-hidden='true'><i class='fa fa-angle-left'></i>PREV</span></a></li>";
					}
					echo "<li class='active'><a href='?page=".$page."'>".$page."</a></li>";
					echo "<li class='disabled'><a href=''>....</a></li>";
					echo "<li><a href='?page=".$number_of_pages."'>".$number_of_pages."</a></li>";
					//next
					if($page != $number_of_pages){
						$next = $page+1;
			echo "<li><a aria-label='Next' href='?page=".$next."'><span aria-hidden='true'>Next<i class='fa fa-angle-right'></i></span></a></li>";
					}else{
						$next = $number_of_pages;
						echo "<li class='disabled' style='display:none;'><a aria-label='Next' href='?page=".$next."'><span aria-hidden='true'>Next<i class='fa fa-angle-right'></i></span></a></li>";
			
					}
					echo "</ul>";
				?>
                        <!--Pagination Wrap End-->
						
                    </div>
                </section>
            </div>
            <!--Main Content Wrap End-->
            
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
