

<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

$title;
$description;


                   $discount;
                     $productno;
                     $dateofexpiry;

$id= $_GET['id'];
$result = $con->query("SELECT * FROM `promotions`  WHERE `id`='$id'");
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{//`categories`( `title`, `description`
        $title=$row['title'];
                                        
                     $description=$row['description'];
                   $discount=  $row['discount'];
                     $productno=$row['productno'];
                     $dateofexpiry= $row['dateofexpiry'];
                    



                    }
                }

if (isset($_POST['save']))
 {
    $id= $_GET['id'];

   
      $title = $_POST['title'];
     $description=$_POST['description'];
     
     
     $discount= $_POST['discount'];
     $productno= $_POST['productno'];;
     $dateofexpiry= $_POST['dateofexpiry'];;

          


       $query = "update `promotions` set `title`='$title',`description`='$description',discount='$discount',productno='$productno',dateofexpiry='$dateofexpiry' where id='$id'";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/mygiftstore/admin/promotion.php');
          
        
  }
    



?>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<br>

<div>
<form method="post" action="edit_promo.php?id=<?php echo $id; ?>"> 
                    <div class="center">
                        <table>
                        <tr>
                                <td># </td>
                                <td><?php echo $id; ?></td>
                            </tr>
                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="title" value="<?php echo $title; ?>"> </td>
                            </tr>
                            
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" value="<?php echo $description; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Product Number</td>
                                <td><input type="number" name="productno" value="<?php echo $productno; ?>"> </td>
                            </tr>
                            
                            <tr>
                                <td>Discount</td>
                                <td><input type="number" name="purchasingPrice" value="<?php echo $discount; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Expiry Date </td>
                                <td><input type="date" name="dateofexpiry" value="<?php echo $dateofexpiry; ?>"> </td>
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