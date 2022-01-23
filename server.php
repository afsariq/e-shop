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
  	 



	  //$_SESSION['username'] = $email;
	

		
  	  header('location: home.php');
  	}else {
  		 header('location: signup.php');
  	}
  
}
?>