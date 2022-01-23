<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
  	
  	header('location: login.php');
  }
    if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type= "text/css" href ="style.css"/>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;

}
footer {
	  position: fixed;
   left: 0;
   bottom: 100%;
   width: 100%;
  text-align: center;
  padding: 3px;
  background-color: #141f1f;
  color: white;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}
.submit {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
  width:300px;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

	input[type=text] {
  width:100%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 12px;
  font-size: 16px;
  background-color: white;
  background-image: url('search.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 9px 15px 9px 30px;
}

	input[type=file] {
  width:100%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 12px;
  font-size: 16px;
  background-color: white;
  background-image: url('search.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 9px 15px 9px 30px;
}

.srchBtn{
	border-radius: 12px;
	  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 9px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
label {
  
  color: grey;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 13px;
}
.inputfile {
	width: 100%;
	height: 40px;
	opacity: 10;
	
	z-index: -1;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
	img_alig:right;
	margin:50px;
  }
}


/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="home.php">Home</a>
  <a href="mypro.php" class="active">My Products</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <img alt="Cart" src="cart.png" href="fb.com" width="30px"  align="right">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



<br>

<div class="tab" align="center">

  <button class="tablinks" onclick="openCity(event, 'upload')">Upload </button>
  <button class="tablinks" onclick="openCity(event, 'orders')">Orders </button>
</div>

<div id="upload" class="tabcontent">
  
<form method="POST" action="errors.php" enctype="multipart/form-data">

	  <label for="email"><b>Name</b></label><br>
    <input type="text" placeholder="Enter Product Name" name="Match" id="Match" required><br>
	
	<label  for="date"><b>Price</b></label><br>
    <input type="text" placeholder="Enter Price in lkr" name="Date" id="Date" required><br>
	
	<label for="id"><b>Quantity</b></label><br>
    <input type="text" placeholder="Enter Quantity" name="Id" id="Id" required><br>
	<label for="id"><b>Description</b></label><br>
    <input type="text" placeholder="Product Description" maxlength="50" name="desc" id="desc" required><br>

	<label for="image"><b>Image</b></label><br>
	<input type="file" name="uploadfile" class="inputfile" style="width:200px"/>
		
<center>	<div>
		<button type="submit" class="submit"  name="upload">UPLOAD</button>
		</div>
		

</form>
   <footer>
 
  
<?php 

$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users where email='{$_SESSION['email']}'");


while($row = mysqli_fetch_array($result))
{
	
	   $s=$row['username'];
	   $type=$row['usertype'];
	   echo 'Logged in as '; echo $s ; echo ' ';
	   
	   if($type=="admin"){
		   
		   echo ' <br>
<a href="" style="color: red;">Admin</a> ';
	   }
	   
}


?>


<a href="home.php?logout='1'" style="color: red;">logout</a> 
</footer> 
</div>
<div id="orders" class="tabcontent">
  

<table align="center">

<?php






$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM `order` ");

 $count = 0;

while($row = mysqli_fetch_array($result))
{

	   $pid=$row['proid'];
		$add=$row['address'];
			$sts=$row['status'];
			$oid=$row['orderid'];

	$sql=("SELECT * FROM products where id=$pid");

	$results = mysqli_query($con,$sql);
	
while($row = mysqli_fetch_array($results))
{   $s=$row['image'];
	   $r=$row['id'];
	    $pr=$row['price'];
		$des=$row['des'];
		$nm=$row['name'];
		
	 if($count==4) //three images per row
            {
               print "</tr>";
               $count = 0;
            }
            if($count==0)
               print "<tr>";
            print "<td>";
			?>
			  <?php
	   $s=$row['image'];
	   $r=$row['id'];
	    $pr=$row['price'];
		$des=$row['des'];
		$nm=$row['name'];
		echo '<br>';
	 echo'<div class="card">
	 <center><p class="price">'.$nm.'</p>
 <center><p class="price">'.$des.'</p>
  <center><p class="price">'.$pr.' LKR</p>
 <img src="uploads/'.$s.'" alt="" style="width:200px;height:200px">
 
    <center><p class="price">'.$add.' </p>
	 <center><p class="price">'.$sts.'</p>
	  <center><p class="price">'.$oid.'</p>
  
 
   
   <p></p> 
  </div>
</div>';
	
}
echo'
<center>
  <form action="" method="post">
  <input   name="stsupdate"  placeholder="Update Status" type="text"><br>
   <input type="submit"  name="stsup" value="Update Status" class="submit"></center> 
   <input   name="oid"  value='.$oid.' type="hidden"><br>

  
  
   </form>';

            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
	   
	   if(isset($_POST['stsup']))
{
	$orderid=$_POST['oid'];
	$stsup=$_POST['stsupdate'];
		  $sqlup= "UPDATE `order` SET `status`='$stsup' WHERE orderid='$orderid' ";
	  mysqli_query($con, $sqlup);
	  
	  

}
?>


 </div>




<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>




<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

   <footer>
 
  
<?php 

$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users where email='{$_SESSION['email']}'");


while($row = mysqli_fetch_array($result))
{
	
	   $s=$row['username'];
	   $type=$row['usertype'];
	   echo 'Logged in as '; echo $s ; echo ' ';
	   
	   if($type=="admin"){
		   
		   echo ' <br>
<a href="" style="color: red;">Admin</a> ';
	   }
	   
}


?>


<a href="home.php?logout='1'" style="color: red;">logout</a> 
</footer> 
</body>
</html>
