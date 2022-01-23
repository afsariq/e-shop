<?php
  session_start(); 
$msg = "";

// If upload button is clicked ...
 $Match = $_POST['Match'];
    $Date = $_POST['Date'];
	$Id = $_POST['Id'];
		$desc= $_POST['desc'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "uploads/".$filename;
		
	$db = mysqli_connect("localhost", "root", "", "shopping");
	
	
	

$result = mysqli_query($db,"SELECT * FROM users where email='{$_SESSION['email']}'");


while($row = mysqli_fetch_array($result))
{
	
	
	   $s=$row['username'];
	 
	   
}

		// Get all the submitted data from the form
		$sql = "INSERT INTO products (`name`, `price`, `qty`, `image`,`des`, `userid`)  VALUES ('$Match','$Date','$Id','$filename','$desc','$s')";

		// Execute query
		mysqli_query($db, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}



?>