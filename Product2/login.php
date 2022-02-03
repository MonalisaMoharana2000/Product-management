<?php
$login = false;
$showError = false;
$conn = mysqli_connect("localhost","root","","application");
//   if($conn){
//   	echo "connected";
//  }
 if($_SERVER["REQUEST_METHOD"]=="POST"){

    
	$username = $_POST["username"];
	$password = $_POST["password"];
	// $date = $_POST["date"];
   
   
        $sql = "Select * from product2 where username = '$username' AND password = '$password' AND current_timestamp()";
        $exe = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($exe);
        if($num == 1){
            $login = true;
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			header("location: dashboard.php");
        }
   
else{
	$showError = "Invalid Credentials!!";
}

 }

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	
 	<link rel="stylesheet" type="text/css" href="login.css">
 	<!-- <script type="text/javascript" rel="stylesheet" src="./js/main.js"></script> -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body style = " background: rgb(187,187,245)">

	<!-- Navbar -->
	
	
	
	<?php
	if($login){
		echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success!</strong> You are Logged In!!
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
		<div class="card">
			<div class="inner-box">
				<div class="card-front">
				<h2>LOGIN</h2>
		  
		    <form id="form_login" action="login.php" method = "post">
			<input type="text" class="input-box" name="username"  placeholder="Username"
			 required>
			  
			 <input type="password" class="input-box" name="password"  placeholder="Password"
			 required>

			 <button type="submit" class="submit-btn "><i class="fa fa-lock">&nbsp;</i>Login</button>
			 <input type="checkbox"><span>Remember Me</span>
			 
			</form>
			<span><a href="register.php">Register</a></span>
			<a href="#">Forget Password ?</a>
		    
		</div>

		<div class="card-back">

		</div>
			</div>
		</div>

</div>
		  
</body>
</html>