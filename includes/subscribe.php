<?php 
if(isset($_POST['subscribe'])){
	$email = clean_up($_POST['email']);
	$date = clean_up(date("d-M-Y"));
	if(empty($email)){
		echo "<script>alert('please enter a valid email')</script>";
	}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo "<script>alert('Please enter a valid Email!')</script>";	
		}else if(email_exist($email)===true){
			echo "<script>alert('this email exist on our database!')</script>";	
		}else{
	$r = $con->query("insert into users(user_email,user_date)values('$email','$date')");
		if($r){
		echo "<script>alert('thank you for subscribing')</script>";	
		}
	}
}
?> 
 <div class="kode_subscribe_menu">
                        <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <h3>Subcribe Our Newsletter</h3>
                        <h5>To Get All The Latest News And Updates</h5>
                        <form method="POST">
                            <div class="subscribe_form">
                                <input type="text" placeholder="Your Email Address here . . ." name="email" required>
                                <button name="subscribe">Subcribe</button>
                            </div>
                        </form>
                    </div>