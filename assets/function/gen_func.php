<?php
$errors = array();
function admin_id($username){
	global $con;
	$username=clean_up($username);
	$query=mysqli_query($con,"select admin_id from admin_login where username = '$username'");
	$row=mysqli_fetch_array($query);
	return $row['admin_id'];
}
function login($username,$password){
	global $con;
	//$password=md5($password);
	$username=clean_up($username);
	$password=clean_up($password);
	$user_id = admin_id($username);
	return (mysqli_num_rows(mysqli_query($con,"select admin_id from admin_login where username = '$username' and password='$password'"))==1)? $user_id : false;	
}

function error_display($errors){
	foreach($errors as $error){
		return "<div class='alert alert-danger'><strong>".$error."</strong></div>";
	}
}
function clean_up($value){
	global $con;
	return mysqli_real_escape_string($con,$value);
}
 function facebook_time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 }  
function email_exist($value){
	global $con;
	$value=clean_up($value);
	return (mysqli_num_rows(mysqli_query($con,"select user_email from users where  user_email= '$value'"))==1)?true : false;	
}
?>