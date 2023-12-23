

<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";
$title;
                                        
$price;
$qty;
                   
$total;

$id= $_GET['id'];
$result = $con->query("SELECT * FROM `carts`  WHERE `id`='$id'");
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
        ////INSERT INTO `carts`( `giftid`, `title`, `price`, `qty`, `total`, `customer`) VALUES ('','','','','','')
        $title=$row['title'];
                                        
                     $price=$row['price'];
                     $qty=$row['qty'];
                                        
                     $total=$row['total'];
                     
                    }
                }

if (isset($_POST['save']))
 {
    $id= $_GET['id'];

   
      $qty = $_POST['qty'];
     $description=$_POST['description'];
            
     $total=$qty*$price;


       $query = "update `carts` set `qty`='$qty', `total`='$total' where id='$id'";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/mygiftstore/user/mycart.php');
          
        
  }
    



?>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<br>

<div>
<form method="post" action="editcart.php?id=<?php echo $id; ?>"> 
                    <div class="center">
                        <table>
                        <tr>
                                <td># </td>
                                <td><?php echo $id; ?></td>
                            </tr>
                            <tr>
                                <td>Title </td>
                                <td><?php echo $title; ?></td>
                            </tr>
                           
                            <tr>
                                <td> Unit Price</td>
                                <td><?php echo $price; ?></td>
                            </tr>
                            
                            <tr>
                                <td> Quantity</td>
                                <td><input type="number" name="qty" value="<?php echo $qty; ?>"> </td>
                            </tr>
                            <tr>
                                <td> Total</td>
                                <td><?php echo $total; ?></td>
                            </tr>
                           
                           <tr>
                                <td> </td>
                                <td> <button type="submit" name="save"> Submit </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message;
                        ?>
                    </div>
                </form>

    </div>
    <?php include 'footer.php';?>