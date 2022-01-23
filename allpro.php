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

</style>

</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="home.php">Home</a>


  <a href="about.php">About</a>
  <a href="cartphp.php"  align="right">Cart</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>





<table align="center"><tr>

<?php
$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"SELECT * FROM `products` ORDER BY Id DESC");

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


<div>






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