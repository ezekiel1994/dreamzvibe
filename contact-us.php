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
                    <div class="container">
                        <?php include "includes/first-row.php"; ?>
                    </div>
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
                     <h6>Get in touch with us</h6>
                </div>
            </div>
            <!--Sub Banner Wrap End-->
            <!--Main Content Wrap Start-->
            <div class="kode_content_wrap">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="widget-contact">
                                    <h4 class="widget-title2">Get In Touch</h4>
                                    <form method="post" id="commentform" class="light_bg comment-form">
                                        <div class="kode-left-comment-sec">
                                            <div class="kf_commet_field">
                                                <input placeholder="Full Name*" name="author" type="text" value="" data-default="Name*" size="30">
                                            </div>
                                            <div class="kf_commet_field">
                                                <input placeholder="Phone Number*" name="email" type="text" value="" data-default="Email*" size="30">
                                            </div>
                                            <div class="kf_commet_field">
                                                <input placeholder="Email Address*" name="email" type="text" value="" data-default="Email*" size="30">
                                            </div>
                                            <div class="kf_commet_field full-width-kode">
                                                <input placeholder="Website" name="url" type="text" value="" data-default="Website" size="30">
                                            </div>
                                        </div>
                                        <div class="kode-textarea">
                                            <textarea placeholder="Type Your Comments*" name="comment"></textarea>
                                        </div>
                                        <p class="form-submit "><input name="submit" type="submit" class="submit btn-1 theme-bg" value="Send Now"></p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="widget-contact social-contact">
                                    <h4 class="widget-title2">Contact Us</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis lacinia tellus. Nullam venenatis a sem non dictum. Aliquam orci ipsum, malesuada lacinia faucibus nec, bibendum a enim...</p>
                                    <ul class="kf_contact_meta">
                                        <li>
                                            <span class="fa fa-phone"></span>
                                            <p>(+234) - 70 - 80481215</p>
                                        </li>
                                        <li>
                                            <span class="fa fa-envelope"></span>
                                            <p>dreamzvibe@kodeblog.com</p>
                                        </li>
                                        <li>
                                            <span class="fa fa-map-marker"></span>
                                            <p>90, Light peace St, Nigeria</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!--Main Content Wrap End-->
            
			
           <section class="kode_subscribe_section border overlay">
                <div class="container">
		    <?php include "includes/subscribe.php"; ?> 

				</div>
			</section>
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

<!-- Mirrored from kodeforest.net/html/musicforest/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Nov 2018 18:11:40 GMT -->
</html>
