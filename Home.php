<?php 
  session_start(); 

  
    if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="st.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.highlight{
	
	 border: 1px solid #ccc;
  background-color: #f1f1f1;
  width:400px;
	
	
}
.resp{
	
	width:100%;
	
	
}
table {
  width: 100%;
}
td{
width:33%;

}

/* Style the tab */
.tab {
  border: 2px solid #ccc;
  background-color: transparent;

}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: center;
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
</style>

</head>
<title>HOME</title>
<body>

<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>


  <a href="about.php">About</a>
  <a href="cartphp.php"  align="right">Cart</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>





<table align="center"><tr>
<center><h3>Recent Products</h3></tr>
<?php
$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"SELECT * FROM `products` ORDER BY Id DESC LIMIT 4 ");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
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
		$qt=$row['qty'];
		
		
	 echo'<div class="card">
 <img class="resp" src="uploads/'.$s.'" alt="" ">
 <center><p class="price">Only '.$qt.' available</p>
 <center><p class="price">'.$nm.'</p>
  <center><p class="price">'.$pr.' LKR</p>
   
	  
  
 
   
   <p></p> 
  ';





		
	
?>
<center>
  <form action="" method="post">
   <input type="submit" value="Add to cart" name="pre" class="registerbtn"></center> 
   <input   name="id"  value="<?php echo $r?>" type="hidden"><br>
  
  
   </form>
 
 <?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
        ?>




</table>
<div>
<a style="float:right;margin:20px" href="allpro.php" >See all..</a>

</div>
<br><br><br>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Special Offers</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Shoes</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Wedding Dresses</button>
    <button class="tablinks" onclick="openCity(event, 'Kids Wear')">Kids Wears</button>
	  <button class="tablinks" onclick="openCity(event, 'Toys')">Toys</button>
</div>

<div id="London" class="tabcontent">
 
<table align="center"><tr>
<?php
$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"SELECT * FROM `products` WHERE offer!=0 ");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
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
		$qt=$row['qty'];
		$off=$row['offer'];
		
		
	 echo'<div class="card">
 <img class="resp" src="uploads/'.$s.'" alt="" ">
 <center><p class="price">Only '.$qt.' available</p>
 <center><p class="price">'.$nm.'</p>
  <center><p class="price">'.$pr.' LKR</p>
    <center><p class="price">'.$off.'% Offer</p>
   
	  
  
 
   
   <p></p> 
  ';





		
	
?>
<center>
  <form action="" method="post">
   <input type="submit" value="Add to cart" name="pre" class="registerbtn"></center> 
   <input   name="id"  value="<?php echo $r?>" type="hidden"><br>
  
  
   </form>
 
 <?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
        ?>




</table>
</div>

<div id="Paris" class="tabcontent">
 
<table align="center"><tr>
<?php
$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"SELECT * FROM `products` WHERE name='Shoe'");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
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
		$qt=$row['qty'];
		$off=$row['offer'];
		
		
	 echo'<div class="card">
 <img class="resp" src="uploads/'.$s.'" alt="" ">
 <center><p class="price">Only '.$qt.' available</p>
 <center><p class="price">'.$nm.'</p>
  <center><p class="price">'.$pr.' LKR</p>
   
   
	  
  
 
   
   <p></p> 
  ';





		
	
?>
<center>
  <form action="" method="post">
   <input type="submit" value="Add to cart" name="pre" class="registerbtn"></center> 
   <input   name="id"  value="<?php echo $r?>" type="hidden"><br>
  
  
   </form>
 
 <?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
        ?>




</table>
</div>

<div id="Tokyo" class="tabcontent">


<table align="center"><tr>
<?php
$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"SELECT * FROM `products` WHERE name='Wedding Dress'");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
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
		$qt=$row['qty'];
		$off=$row['offer'];
		
		
	 echo'<div class="card">
 <img class="resp" src="uploads/'.$s.'" alt="" ">
 <center><p class="price">Only '.$qt.' available</p>
 <center><p class="price">'.$nm.'</p>
  <center><p class="price">'.$pr.' LKR</p>
    <center><p class="price">'.$off.'% Offer</p>
   
	  
  
 
   
   <p></p> 
  ';





		
	
?>
<center>
  <form action="" method="post">
   <input type="submit" value="Add to cart" name="pre" class="registerbtn"></center> 
   <input   name="id"  value="<?php echo $r?>" type="hidden"><br>
  
  
   </form>
 
 <?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
        ?>




</table>
 
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

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
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
if (isset($_SESSION['email'])) {
  	
  	

$result = mysqli_query($con,"SELECT * FROM users where email='{$_SESSION['email']}'");


while($row = mysqli_fetch_array($result))
{
	
	
	   $s=$row['username'];
	 $_SESSION['username']=$s;
	   $type=$row['usertype'];
	   echo 'Logged in as '; echo $s ; echo ' ';
	   
	   if($type=="admin"){
		   
		   echo ' <br>
<a href="mypro.php" style="color: red;">Admin</a> ';
	   }
	   
}
echo'<a href="home.php?logout=1" style="color: red;">logout</a> ';
  }
  
  else{
	  		   echo ' <br>
<a href="login.php" style="color: Green;">Login</a> ';
  }
?>


</footer> 
</body>
</html>

  <?php
if(isset($_POST['pre']))
{
/*	*/
		
$id = $_POST['id'];



// Set session variables
$_SESSION["Pid"] = $id;
if (!isset($_SESSION['email'])) {
	echo'<center>';
		echo '<div class="highlight">';
	echo '<p style="color:red;">You cant add to the cart without login';
		//header('location: home.php');
		
		echo '</div>';

	}
	else{
		
	$db = mysqli_connect("localhost", "root", "", "shopping");
	
	
	$name=$_SESSION['username'];
	
	/*echo $name;
	echo $id;*/

$sql = "INSERT INTO `cart`(`pid`, `username`) VALUES('$id','$name')";
mysqli_query($db, $sql);

echo'<center><div class="highlight"><p style="color:green;">Successfully added to cart ';
echo'<br>';
	}
}
?>