<?php
$showAlert = false;
$showError = false;
$conn = mysqli_connect("localhost","root","","application");
//   if($conn){
//   	echo "connected";
//  }
 if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$rpassword = $_POST["rpassword"];
	$utype = $_POST["utype"];
    // $exists =false;

//Check whether this username exists or not ... first make  username unique from database
	
$existSql = "SELECT * FROM `product2` WHERE username = '$username' ";
$exe = mysqli_query($conn,$existSql);
$numExistRows = mysqli_num_rows($exe);
if($numExistRows > 0){
	$showError = "Username Already Exists !!";
}
else {

    if(($password == $rpassword) ){
        $sql = "INSERT INTO `product2` ( `username`, `email`, `password`, `rpassword`, `utype`,`date`) VALUES ( '$username', '$email', '$password', '$rpassword', '$utype',current_timestamp());";
        $exe = mysqli_query($conn,$sql);
        if($exe){
            $showAlert = true;
        }
    }
else{
	$showError = "Passwords do not match !!";
}

}
 }

?>










<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="product.css">
 	<script type="text/javascript" src="./js/main.js"></script>
	 <style>
        body {
           
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            margin: 0px;



        }
    </style>
	 
 </head>
<body style="background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgpnqZ9ezbmkqdtBDDsCVrynewooDBkg5tvQ&usqp=CAU');">
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./header.php"); ?>
	<br/><br/>

	<?php
	if($showAlert){
		echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> Your Account has been Created. You Can Login Now!!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	}

	if($showError){
		echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $showError.'
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	}

?>
	<div class="container">
		<div class="card mx-auto" style="width: 30rem; background-color:#0000004a; color:white;">
	        <div class="card-header">Register</div>
		      <div class="card-body">
		        <form id="register_form"  action="register.php" method = "post" >
		          <div class="form-group">
		            <label for="username">Full Name</label>
		            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="email">Email address</label>
		            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		            <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		          </div>
		          <div class="form-group">
		            <label for="password1">Password</label>
		            <input type="password" name="password" class="form-control"  id="password1" placeholder="Password">
		            <small id="p1_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="password2">Re-enter Password</label>
		            <input type="password" name="rpassword" class="form-control"  id="password2" placeholder="Password">
		            <small id="p2_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="usertype">Usertype</label>
		            <select name="utype" class="form-control" id="usertype">
		              <option value="">Choose User Type</option>
		              <option value="Admin">Admin</option>
		              <option value="Other">Other</option>
		            </select>
		            <small id="t_error" class="form-text text-muted"></small>
		          </div>
		          <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Register</button>
		          <span><a href="login.php">Login</a></span>
		        </form>
		      </div>
	      <div class="card-footer text-muted">
	        
	      </div>
	    </div>
	</div>

</body>
</html>

