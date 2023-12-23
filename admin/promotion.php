<?php include 'header.php';?>
<?php include 'navbar.php';?>
<br>
<a  class="btn btn-primary mb-3" text-decoration: none; href="newpromotion.php">New Promotion</a>
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
$query = "SELECT gifts.title AS gift_title, promotions.title AS promotion_title,promotions.description As promo,promotions.id AS promoid, promotions.*, gifts.* FROM `promotions`
INNER JOIN gifts ON gifts.id = promotions.productno";

// Get data from the database
$result = $con->query($query);
?>

<div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
       
    ?>
    <table>
    <tr>
        <td>
        <h3><?php echo $row['promotion_title'] ?></h3>
    </td>
<td>





        <?php echo $row['promo'] ?><br>
       
        <b><?php echo $row['gift_title'] ?></b> <br>

      Upto  <?php echo $row['dateofexpiry'] ?><br>
      
        
             
        <?php echo '<a  text-decoration: none;"  href="edit_promo.php?id=' . $row['promoid'] . '">Edit Details</a>';?>
         <?php echo '<a text-decoration: none;"  href="delete_promo.php?id=' . $row['promoid'] . '">Remove Details</a>';?>
         </td>   
    

<?php
      }
    }
                        ?>
</td>
</tr>
</table>
                    </div>







<?php include 'footer.php';?>