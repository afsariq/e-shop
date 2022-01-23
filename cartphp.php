<html>
<head>
<link rel="stylesheet" type="text/css" href="st.css">
<style>
.registerbtn{
 border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 300px;
  font-size: 18px;
}
.register{

  width: 100%;
  font-size: 18px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;

}
.resp{
	
	width:300px;
	
	
}
</style></head>
<body>

<div class="topnav" id="myTopnav">
  <a href="home.php" >Home</a>

  <a href="about.php">About</a>
  <a href="cartphp.php" class="active" align="right">Cart</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div><br>
<a href="myorders.php">Check my orders</a>
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
<table align="center">
<?php

  session_start(); 
  $l=3;
  
 
 $nm=$_SESSION['username'];
 
$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM `cart` WHERE `username`='$nm' ");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
	
	   $id=$row['pid'];
		$uname=$row['username'];
	
	$sql=("SELECT * FROM products where id=$id");

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
 <img src="uploads/'.$s.'" alt="" class="resp">
 <center><p class="price">'.$nm.'</p>
 <center><p class="price">'.$des.'</p>
  <center><p class="price">'.$pr.' LKR</p>
   
	  
  
 
   
   <p></p> 
 ';
	
}
?>
<center>
  <form action="" method="post">
  <input   name="qty" placeholder="Enter Quantity"  type="text" required><br>
  <input   name="add" placeholder="Enter Address"  type="text" required><br>
   <input type="submit" value="Confirm Order" name="pre" class="registerbtn"></center> 
   <input   name="id"  value="<?php echo $r?>" type="hidden"><br>

  
  
   </form>
   
   

 <?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
	   ?>
       
	</body>
	</html>
	
	<?php
if(isset($_POST['pre']))
{

$id = $_POST['id'];
$qty = $_POST['qty'];
$add = $_POST['add'];

	$dbcon = mysqli_connect("localhost", "root", "", "shopping");
	
	

	
	/*echo $name;
	echo $id;*/

$sql = "INSERT INTO `order`(`proid`, `qty`, `address`, `username`) VALUES ('$id','$qty','$add','{$_SESSION['username']}')";
mysqli_query($dbcon, $sql);


	
	$sqldel= "DELETE FROM `cart` WHERE pid='$id' AND username='{$_SESSION['username']}'";
	
mysqli_query($dbcon, $sqldel);


$result = mysqli_query($con,"SELECT * FROM `products` WHERE `id`='$id' ");

 

while($row = mysqli_fetch_array($result))
{
 $qtytb=$row['qty'];
	   $upd=$qtytb-$qty;
	   
	  $sqlup= "UPDATE `products` SET `qty`='$upd' WHERE id='$id' ";
	  mysqli_query($dbcon, $sqlup);
	  
}

header('location: cartphp.php');
}

?>