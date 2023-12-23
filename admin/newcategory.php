
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

if (isset($_POST['save']))
 {
    

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
//INSERT INTO `categories`( `title`, `description`, `photo`) VALUES ('','','')
      $title = $_POST['title'];
     $description=$_POST['description'];
            
          


       $query = "INSERT INTO `categories`( `title`, `description`, `photo`) VALUES ('$title','$description','$imgContent')";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/mygiftstore/admin/category.php');
          
        
        }
    }
}


?>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<br>

<div>
    <form method="post" action="newcategory.php" enctype="multipart/form-data">
                    <div class="center">
                        <table>
                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="title" required> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" required> <span class="error">*</span> </td>
                            </tr>
                            

                           
                            <tr>
                                <td>
                                    <label>Select product photo:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
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