
<!DOCTYPE html>
<html>
<head>
  <title>UserLogin</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
  <div class="header">
  	<h2>User Login</h2>
  </div>

  <form method="POST" action="">
  	
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required value="">
  	</div>
	
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" required name="password_1">
  	</div>
  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Don't have an accont? <a href="signup.php">Sign up</a>
  	</p>
	<?php
 session_start(); 


	 $username="";
	 $password="";
	$db = mysqli_connect('localhost', 'root', '', 'shopping');
	
if (isset($_POST['login_user'])) {
	
	
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password_1']);

 


  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	 



	  $_SESSION['email'] = $email;
	

		
  	  header('location: home.php');
  	}else {
  		 header('location: signup.php');
  	}
  
}
?>
  </form>
</body>
</html>