

<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

$title;
$description;
$id= $_GET['id'];
$result = $con->query("SELECT * FROM `categories`  WHERE `id`='$id'");
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{//`categories`( `title`, `description`
        $title=$row['title'];
                                        
                     $description=$row['description'];
                    }
                }

if (isset($_POST['save']))
 {
    $id= $_GET['id'];

   
      $title = $_POST['title'];
     $description=$_POST['description'];
            
          


       $query = "update `categories` set `title`='$title', `description`='$description' where id='$id'";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/mygiftstore/admin/category.php');
          
        
  }
    



?>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<br>

<div>
<form method="post" action="edit_category.php?id=<?php echo $id; ?>"> 
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