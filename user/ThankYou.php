<?php include '../config.php';?>
<?php
	$customerID="";

echo $customerID=$_SESSION['username'];


?>

<br>
<?php

$result = $con->query("SELECT * FROM orders where customerid='$customerID' ORDER BY order_date DESC LIMIT 1"); 
$orderid="";
if($result && $result->num_rows > 0)
 {
$row = $result->fetch_assoc();
echo $orderid=$row['orderno'];

 }
 $totalBill="";

$result = mysqli_query($con, "SELECT SUM(`total`) AS value_sum FROM orders where customerid='$customerID' and orderno='$orderid'"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$totalBill=$sum;


$result = $con->query("SELECT * FROM orders where customerid='$customerID' and orderno='$orderid'"); 







?>

<?php include 'header.php'; ?>  
<?php include 'navbar.php'; ?> 
<head>
	<script>
    function doPrint() {
        var prtContent = document.getElementById('div1');
        prtContent.border = 0; //set no border here
        var WinPrint = window.open('', '', 'left=100,top=100,width=1000,height=1000,toolbar=0,scrollbars=1,status=0,resizable=1');
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
</head>

   <form method="POST" action="ThankYou.php">
<div id="div1">

<h2>Your Receipet</h2>
<?php
if($result->num_rows > 0)
 {
	while($row = $result->fetch_assoc())
	{		
	
?>

<table border=1>
<tr><td>Order No</td><td><?php  echo $row['orderno'];?></td></tr>
<tr><td>Customer ID</td><td><?php echo $row['customerid'];?></td></tr>
<tr><td>Product No </td><td><?php echo $row['productno']; ?></td></tr>
<tr><td>Price</td><td><?php echo $row['unitprice'];?></td></tr>
<tr><td>Quantity </td><td><?php echo $row['qty'];?></td></tr>
<tr><td>Total </td><td><?php echo $row['total'];?></td></tr>



</table>
  



<?php
 }
 }
 
        ?> 
		<br><br>
		
		<table >
 <tr><td><h2>Total Amount <h2></td><td><h2><?php  echo $totalBill;?><h2></td></tr>
</table>




	
</div>
<button type="submit" name="print" onclick="doPrint()" >Print Receipet</button>
<br>

                </form>
            
        
    </main>
</div>
</body>
</html>