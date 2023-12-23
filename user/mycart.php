<?php include 'header.php';?>
<?php
include 'navbar.php';
include '../config.php';
$message="";
$username=   $_SESSION['username'];

if (isset($_SESSION['message'])) {
    // The 'message' session variable is defined
    $message = $_SESSION['message'];
    "Message: $message";
} else {
    // The 'message' session variable is not defined
    $message="";
}

$query="";

    $query="SELECT * FROM `carts`";
 
?>



<?php
$result = $con->query($query);?>
<div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        
    ?>
    <table>
    <tr>
        <td>
        <h3><?php echo $row['id'] ?></h3> <br> 
    </td>
<td>



        

      Product #  <?php echo $row['giftid'] ?><br>
        <h3><?php echo $row['title'] ?></h3> <br>

        

        Unit Price  <?php echo $row['price'] ?>$<br>
     
       Quantity <?php echo $row['qty'] ?> <br>
        
       Total<?php echo $row['total'] ?>$ <br>
      
        
             
        <?php echo '<a  text-decoration: none;"  href="editcart.php?id=' . $row['id'] . '">Edit Details</a>';?>
         <?php echo '<a text-decoration: none;"  href="deletecart.php?id=' . $row['id'] . '">Remove</a>';?>
         </td>   
    

<?php
      }
    }
                        ?>
</td>
</tr>
</table>
                    </div>
                    <?php echo $message ?><br>

<?php include 'footer.php';?>
