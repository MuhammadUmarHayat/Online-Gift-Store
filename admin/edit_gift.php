

<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

$title;
$description;
$purchasingPrice;
$purchasingDate;
$salePrice;
$qty;
$id= $_GET['id'];
$result = $con->query("SELECT * FROM `gifts`  WHERE `id`='$id'");
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{//`categories`( `title`, `description`
        $title=$row['title'];
                                        
                     $description=$row['description'];
                   $purchasingPrice=  $row['purchasingPrice'];
                     $purchasingDate=$row['purchasingDate'];
                     $qty= $row['qty'];
                     $salePrice =$row['salePrice'];



}
}

if (isset($_POST['save']))
 {
    $id= $_GET['id'];

   
      $title = $_POST['title'];
     $description=$_POST['description'];
     
     $purchasingPrice= $_POST['purchasingPrice'];;
     $purchasingDate= $_POST['purchasingDate'];
     $salePrice= $_POST['salePrice'];
     $qty= $_POST['qty']; 

          //$id,$title,$description,$purchasingPrice,$purchasingDate,$salePrice,$qty


       $query = "update `gifts` set `title`='$title',`description`='$description',purchasingPrice='$purchasingPrice',purchasingDate='$purchasingDate',salePrice='$salePrice',qty='$qty' where id='$id'";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/mygiftstore/admin/gift.php');
          
        
  }
    



?>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<br>

<div>
<form method="post" action="edit_gift.php?id=<?php echo $id; ?>"> 
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
                                <td>Purchasing Price </td>
                                <td><input type="number" name="purchasingPrice" value="<?php echo $purchasingPrice; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Purchasing Date </td>
                                <td><input type="date" name="purchasingDate" value="<?php echo $purchasingDate; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Sale Price </td>
                                <td><input type="number" name="salePrice" value="<?php echo $salePrice; ?>"> </td>
                            </tr>
                            
                            <tr>
                                <td>Quantity </td>
                                <td><input type="number" name="qty" value="<?php echo $qty; ?>"> </td>
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