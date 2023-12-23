<?php include '../config.php'; 

//session_start();
$customerID="";

$customerID= $_SESSION['username'];
//echo "<h1> Welcome : ".$customerID."</h1>";

if(isset($_POST['order']))
{
	header('Location:http://localhost/mygiftstore/user/payments.php');
}
?>
<?php include 'header.php'; ?>  
<?php include 'navbar.php'; ?>  

<div >

                <form method="POST" action="checkout.php">
				<br>
<br> 
<br>
<table border=1>
<tr><th>ID</th><th>Title</th><th>unitPrice</th><th>Quantity</th><th>TotalPrice</th></tr>
<?php
// Get image data from database 
$result = $con->query("SELECT * FROM `carts` WHERE customer='$customerID'"); 
 if($result->num_rows > 0)
 { 
 while($row = $result->fetch_assoc())
 {
	 
	 
	echo"<tr><td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['price']."</td><td>".$row['qty']."</td><td>".$row['total']."</td></tr>";
	     
 }
 }
 else{
	 
	 
	  echo "No orders are found!";
 }
 ?>
 </table>
 <?php
 //////////////////////////
 $result = mysqli_query($con, 'SELECT SUM(`Total`) AS value_sum FROM carts'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "<br> <h2>Total Amount : ".$sum."</h2>";
 ?>
<br>
                    <button class="btn-success" type="submit" name="order">Place Order</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>