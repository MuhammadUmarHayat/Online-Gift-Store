<?php include '../config.php';?>
<?php 

	$customerID="";
$amount=0;
$customerID=$_SESSION['username'];


$result = mysqli_query($con, 'SELECT SUM(`Total`) AS value_sum FROM carts'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$amount=$sum ;


if(isset($_POST['done']))//place your order and submit payment
{
if(!empty($_POST)) 
{
	//order is placed now...........
	try 
	{
		
       //empty the cart when order is places
 
			
          $cusID = $customerID;
           
			 $status = "paid";
			 $bankname= $_POST['bankname'];
			          $accountNumber= $_POST['accountNumber'];
					  
		$method="";			  
				
	 if(isset($_POST['methods']))
{
	$method=$_POST['methods'];
    $date=date('d/m/y');
	//save order////////////////
	
	$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'giftstoredb');

$result = $con->query("SELECT * FROM `carts` WHERE customer='$customerID'"); 
 if($result->num_rows > 0)
 { 
    $orderno=rand(111,999);
 while($row = $result->fetch_assoc())
 {
	
	//SELECT `id`, `giftid`, `title`, `price`, `qty`, `total`, `customer` FROM `carts`  
	echo $row['id']."-".$row['customer']."-".$row['giftid']."-".$row['price']."-".$row['qty']."-".$row['Total']."<br>";
	
	$customer=$row['customer'];
	$productno=$row['giftid'];
	$price=$row['price'];
	$quantity=$row['qty'];
	$status="paid";
	$total=$row['total'];
    $date=date('d/m/y');
	                                                                                                                  //INSERT INTO `orders`(`orderno`, `customerid`, `productno`, `unitprice`, `qty`, `total`, `order_date`, `status`) VALUES ('','','','','','','','')
	
$q1="INSERT INTO `orders`(`orderno`, `customerid`, `productno`, `unitprice`, `qty`, `total`, `order_date`, `status`) VALUES ('$orderno','$customer','$productno','$price','$quantity','$total','$date','$status')";
			 $query = mysqli_query($con,$q1);	

	
 }//end loop
  
 }
 else
 {
	 
	 
	  echo "No orders are found!";
 }

	
	
	
	
	
	
	$q2="DELETE FROM `carts`";
			 $query = mysqli_query($con,$q2);	

 
}
else{
	
	
	echo "please select payment method first";
}
	
	
			$query="";
			
			if($method =="cod")
			{
                /////////////Do Payment via Cash on Delivery////////////////
                //$customerID
				echo "cod"; //INSERT INTO `payments`( `orderno`, `method`, `amount`, `paymentDate`, `status`, `customer`, `bankName`, `accountNumber`) VALUES ('','','','','','','','','')
			echo $q1="INSERT INTO `payments`( `orderno`, `method`, `amount`, `paymentDate`, `status`, `customer`) VALUES ('$orderno', '$method`, '$amount','$date', '$status',$customer)";
			echo " result".$query = mysqli_query($con,$q1);	
			//getData($customerID) ;
			
            header('Location:http://localhost/mygiftstore/user/ThankYou.php');
				echo 'Thank you for payment!';
				
				
				
			}
			else if ($method =="online")
			{
                /////////////Do Payment via online Banking////////////////
				echo " <br> Online Bankig <br>";                                                                                             ///INSERT INTO `payments`( `orderno`, `method`, `amount`, `paymentDate`, `status`, `customer`, `bankName`, `accountNumber`) VALUES ('','','','','','','','','')
				 $q1="INSERT INTO `payments`( `orderno`, `method`, `amount`, `paymentDate`, `status`, `customer`, `bankName`, `accountNumber`) VALUES ('$orderno','$method','$amount','$date','$status','$customer','$bankname','$accountNumber')";
			 $query = mysqli_query($con,$q1);	
			 ////////////////////////////////Save order////////////////////////
			 
			//getData($customerID) ;
				echo 'Thank you for payment!';
				header('Location:http://localhost/mygiftstore/user/ThankYou.php');
				
			}
	}
	
	
 catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
 
		
	}
	

else
{
	
	
	
	echo "Please fill the form first";
}
}




?>
<?php include 'header.php'; ?>  
				<br>
<div >

                <form method="POST" action="payments.php">
				
				  
				<table>
				
				<input type="radio" name="methods"
<?php if (isset($methods) && $methods=="cod") echo "checked";?>
 value="cod">Cash on Delivery<br>
  <input type="radio" name="methods"
  <?php if (isset($methods) && $methods=="online") echo "checked";?> value="online">Online Banking<br>
  <br>
				
				
				
				
				
				
				
				
				
				<tr><td> Enter cusID:</td><td> <?php  echo $customerID; //$amount?></td></tr>
				
		<tr><td> Enter  Bank Name(for online banking):</td><td> <input type="text" name="bankname"></td></tr>		
				
				 <tr><td> Enter  Account Number (for online banking):</td><td> <input type="text" name="accountNumber"></td></tr>
				
				
				
				
				<tr><td> Enter  payment amount:</td><td> <?php  echo $amount;?></td></tr>
				
				<tr><td> </td><td> <button class="btn-success" type="submit" name="done" >Submit</button></td></tr>			


                    
					</table>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>