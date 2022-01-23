
<!DOCTYPE html>
<html>
<head>
  <title>UserRegistration</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
  <style>
  .highlight{
	
	 border: 1px solid #ccc;
  background-color: #f1f1f1;
  width:400px;
	
	
}
</style>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="">
  	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" required value="">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required value="">
  	</div>
	<div class="input-group">
  	  <label>Phone</label>
  	  <input type="" name="phone" required value="">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" required name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" required name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
	<?php
  session_start(); 
// initializing variables
$username = "";
$email    = "";
$phone    = "";
$error=0;
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'shopping');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	
  	  echo '<script>alert("password doesnt match")</script>';
	  header('location: Signup.php');
  }
  
  else{
	  
	   $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
    
	$error=1;
	

    }
	
		 if ($user['email'] === $email) {
			 $error=2;
    }
	
	
		if ($error==1){
			 	echo'<div class=highlight>';	
  	  echo' <p style="color:red;">this username already exist please try a new one';
	
  	//echo '<div class="msg">'
      //  .'YOUR MESSAGE IN HERE'
        //.'</div>';
			//echo 'user exixt';
			
		}
		else if($error==2){
			//echo 'email exixt';
		echo'<div class=highlight>';	
  	  echo '<p style="color:red;">this email have already been used';
	
			
		}
	
		//////////////////////////////////////
		
		
	
	
		
	}
	else{
		
			$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO `users`( `username`, `email`, `phone`, `password` ) VALUES ('$username','$email','$phone','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	
  	header('location: home.php');
	}
	}
	

   
  


  }



?>
  </form>
</body>
</html>