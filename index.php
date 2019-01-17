<?php include "usable.php";
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
       <?php include "includes/meta-head.php"; ?>
	   
</head>

    <body class="msl-black">
        <!--Loader Wrapper Start-->
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!--Loader Wrapper End--> 
        
        <!--Kode Wrapper Start-->  
        <div class="kode_wrapper"> 
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

            <div class="banner_slider">
                                        <?php include "includes/banner.php"; ?> 
            </div>
            
			<!--Program List Wrap Start-->
			<div class="music-top-cover-wrapper">
				 <?php include "includes/middle-row.php"; ?>
			</div>
			<!--Program List Wrap Start-->
			
            <!--Main Content Wrap Start-->
            <section>
			
	            <div class="container">
	            	<div class="row">
	            		<div class="col-md-8">
				            <?php include "includes/main-content.php"; ?>
	            		</div>
	            		<div class="col-md-4">
	            			<aside>
                                <!--Widget Artist Start-->
                                <?php include "includes/right-bar.php"; ?>
                            </aside>
	            		</div>
	            	</div>
	            </div>
            </section>
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
		
		<div class="sidebars">
        	<div class="sidebar right">
	           	<a href="#" class="side_t close_cross" data-action="close" data-side="right"><span></span></a>
	        	<div class="kode_sidebar_right">
	        		<a href="#" class="kode_logo"><img src="images/footer-logo.png" alt=""></a>
	        		<ul class="kode_demos">
	        			<li>
	        				<a href="event-detail.html" data-rel='prettyPhoto'><img src="images/demos/home1.jpg" alt="Default Home Page"><span ><i class="fa fa-search-plus" aria-hidden="true"></i></span></a>
	        			</li>
	        			<li>
	        				<a href="event-organiser.html" data-rel='prettyPhoto'><img src="images/demos/home2.jpg" alt="Home page 2"><span ><i class="fa fa-search-plus" aria-hidden="true"></i></span></a>
	        			</li>
	        			<li>
	        				<a href="shop-items.html" data-rel='prettyPhoto'><img src="images/demos/home3.jpg" alt="Home page 3"><span ><i class="fa fa-search-plus" aria-hidden="true"></i></span></a>
	        			</li>
	        			<li>
	        				<a href="video-list.html" data-rel='prettyPhoto'><img src="images/demos/home4.jpg" alt="Home page 4"><span ><i class="fa fa-search-plus" aria-hidden="true"></i></span></a>
	        			</li>
	        			<li>
	        				<a href="headers.html" data-rel='prettyPhoto'><img src="images/demos/home5.jpg" alt="Home page 5"><span ><i class="fa fa-search-plus" aria-hidden="true"></i></span></a>
	        			</li>
	        			<li>
	        				<a href="blog-detail-leftsidebar.html" data-rel='prettyPhoto'><img src="images/demos/home6.jpg" alt="black version"><span ><i class="fa fa-search-plus" aria-hidden="true"></i></span></a>
	        			</li>
	        		</ul>
	        		
	        		<ul class="kf_connect">
                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li class="dribble"><a href="#"><i class="fa fa-life-ring"></i></a></li>
                        <li class="behance"><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li class="gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
					<p><i aria-hidden="true" class="fa fa-copyright"></i>2018 MUSIC FOREST TEMPLATE Made by KODEFOREST</p>

	        	</div>
	        </div>
	    </div> 
	    <div class="search-overlay" id="kode-search-overlay">
		    <button class="close-btn" id="close-btn-button"><i class="fa fa-times"></i></button>
		    <div id="search-wrapper">
		      <form method="get" id="search-from2" action="#">
		        <input type="text" value="" placeholder="Search..." id="search-felid">
		        <i class="fa fa-search search-icon"><input value="" type="submit"></i>
		      </form>
		    </div>
	  	</div>

	  	
        <!--Jquery Library-->
      <?php include "includes/bottom-js.php"; ?>   
  </body>


</html>
