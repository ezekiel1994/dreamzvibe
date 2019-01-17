<?php
 require('usable.php');
if (isset($_POST['login'])) {
	
  $username =      clean_up($_POST['username']);
  $password =    clean_up($_POST['password']);
     
     if(empty($username) || empty($password)){
		 $errors[] = "<strong>All feild are required!</strong>";
	 }else if(!login($username,$password)){
		 $errors[] = "<strong>username/password incorrect!</strong>";
	 }else{
		 $_SESSION['admin_id'] = login($username,$password);
		 header('Location:admin/index.php');
	 }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
</head>
<body>
<div class="container"> <br/>
  <br/>
  <br/>
  <div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
	<h3><a href="index.php" style="color:lightblue;font-weight:700;"> Home</a></h3>
      <div class="panel panel-default" id="loginBox">
        <div class="panel-heading"> <strong> Admin Login Details </strong> </div>
        <div class="panel-body">
			<?php if(!empty($errors)){echo error_display($errors);}?>
          <form role="form" id="form" method="post">
            <br />
            <div class="form-group input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-tag"  ></i></span>
              <input type="text" name="username" id="username" class="form-control" placeholder="username" />
            </div>
            <div class="form-group input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"  ></i></span>
              <input type="password" name="password" id="password" class="form-control"  placeholder="Your Password" />
            </div>   
            <hr />
            <div align="center">
              <button style="width:100%;" name="login" id="login" class="btn btn-primary">&nbsp;Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
