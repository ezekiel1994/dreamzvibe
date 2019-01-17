<?php
include "usable.php";
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
					<h6>Blog</h6>
                
                 </div>
            </div>
            <!--Sub Banner Wrap End-->
            <!--Main Content Wrap Start-->
            <div class="kode_content_wrap">
                <section class="artist-section">
                    <div class="container">
                    <div class="row">
					<?php 
								$query1 = $con->query("select * from posts where post_action = 1");
								  while($row = $query1->fetch_assoc()){
									   $content = $row['post_content'];
						?>
                      <div class="col-md-4 col-sm-6">
                                <!--Blog Full Start-->
                                <div class="msl-blog-full blog-small">
                                    <figure>
										<img src="admin/<?php echo $row['post_image']; ?>" alt="KODEFOREST">
                                        <!--<img src="extra-images/blog-small-1.jpg" alt="KODEFOREST">-->
                                        <span class="editor-label"><i class="fa fa-calendar"></i><?php echo date_format(date_create($row['post_date']),"d-M");  ?></span>
                                    </figure>
                                    <div class="text">
                                        <h5 class="blog-title"><a href="#"><?php echo $row['post_title']; ?></a></h5>
                                        <p><?php echo strip_tags(substr($content,0,200)); ?></p>
                                        <a class="btn-1" href="blog-single.php?url=<?php echo $row['post_url']; ?>" style="cursor:pointer;">Read More</a>
                                    </div>
                                </div>
                                <!--Blog Full End-->
                        <!--Blog Full End-->
                    </div>
					<?php
						 }
						?>
						<div class="col-md-12">
                                <!--Pagination Wrap Start-->
                                <ul class="pagination">
									<li>
										<a aria-label="Previous" href="#">
										<span aria-hidden="true"><i class="fa fa-angle-left"></i>PREV</span>
										</a>
									</li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li>
										<a aria-label="Next" href="#">
										<span aria-hidden="true">Next<i class="fa fa-angle-right"></i></span>
										</a>
									</li>
								</ul>
                                <!--Pagination Wrap End-->
                            </div>
                    </div>
                    </div>
                </section>
            </div>
            <!--Main Content Wrap End-->
           
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

</script>
    </body>

</html>
