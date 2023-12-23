<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";
$title="";
                                        
                     
$salePrice;

$id= $_GET['id'];
$result = $con->query("SELECT * FROM `gifts`  WHERE `id`='$id'");

//add to cart 


    $giftid= $_GET['id'];
    $qty= 1; 
    $customer=$username;
//checking weather cart hase same gift of same customer
    $record = $con->query("SELECT * FROM `carts`  WHERE `giftid`='$giftid' and `customer`='$customer'");
    if($record->num_rows > 0)
    {
        $message= "you have already selected this gift item."; 
        header('Location:http://localhost/mygiftstore/user/mycart.php');
    }
    else
    {
   // $title="";
   $result = $con->query("SELECT * FROM `gifts`  WHERE `id`='$id'");

   if($result->num_rows > 0)
   {
       while($row = $result->fetch_assoc())
       {//`categories`( `title`, `description`
           $title=$row['title'];
                                           
                        
                        $salePrice =$row['salePrice'];
   
   
   
   }
   }                                 
                     
$total=$qty*$salePrice;
        //INSERT INTO `carts`( `giftid`, `title`, `price`, `qty`, `total`, `customer`) VALUES ('','','','','','')
        $query = "INSERT INTO `carts`( `giftid`, `title`, `price`, `qty`, `total`, `customer`) VALUES ('$giftid','$title','$salePrice','$qty','$total','$customer')";

        $insert = mysqli_query($con, $query);
        $_SESSION['message']=  $message;

        header('Location:http://localhost/mygiftstore/user/mycart.php');

    }



       
          
        
  