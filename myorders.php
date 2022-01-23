<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;

}
</style>
<html>
<table align="center">
<?php

  session_start(); 




$con=mysqli_connect("localhost", "root", "", "shopping");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM `order` WHERE `username`='{$_SESSION['username']}' ");

 $count = 0;

while($row = mysqli_fetch_array($result))
{

	   $pid=$row['proid'];
		$add=$row['address'];
			$sts=$row['status'];

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
	  
  
 
   
   <p></p> 
  </div>
</div>';
	
}



            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
?>
