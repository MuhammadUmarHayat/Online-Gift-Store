<?php include 'header.php';?>
<?php include 'navbar.php';?>
<br>
<a class="btn btn-primary mb-3" text-decoration: none; href="newcategory.php">New Category</a>
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result = $con->query("SELECT * FROM `categories`");
?>

<div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //`categories`( `title`, `description`, `photo`
    ?>
    <table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>


<?php echo $row['title'] ?> <br>
        

        <?php echo $row['description'] ?><br>
        
             
        <?php echo '<a  text-decoration: none;"  href="edit_category.php?id=' . $row['id'] . '">Edit Details</a>';?>
         <?php echo '<a text-decoration: none;"  href="delete_category.php?id=' . $row['id'] . '">Remove Details</a>';?>
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