
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
//INSERT INTO `gifts`( `title`, `description`, `status`, `photo`, `category`, `purchasingPrice`, `purchasingDate`, `qty`, `salePrice`, `remarks`) VALUES ('','','','','','','','','','')
      $title = $_POST['title'];
     $description=$_POST['description'];
     $status="available";
     $category = $_POST['category'];
     $purchasingPrice=$_POST['purchasingPrice'];
     $purchasingDate = $_POST['purchasingDate'];
     $qty=$_POST['qty'];
     $salePrice = $_POST['salePrice'];
     $remarks="ok";
      
          


       $query = "INSERT INTO `gifts`( `title`, `description`, `status`, `photo`, `category`, `purchasingPrice`, `purchasingDate`, `qty`, `salePrice`, `remarks`) VALUES ('$title','$description','$status','$imgContent','$category','$purchasingPrice','$purchasingDate','$qty','$salePrice','$remarks')";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/mygiftstore/admin/gift.php');
          
        
        }
    }
}


?>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<br>
<h2>New Gift</h2>
<br>
<div>
    <form method="post" action="newgift.php" enctype="multipart/form-data">
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
                                <td>Choose School </td>
<td>
<select name="category" id="category">
    <option disabled selected>-- Select category--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT * From `categories`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>

                              
                            </tr>
                            
                            <tr>
                                <td>Purchasing Price </td>
                                <td><input type="number" name="purchasingPrice" required> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Purchasing Date </td>
                                <td><input type="date" name="purchasingDate" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Purchasing Quantity </td>
                                <td><input type="number" name="qty" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Sale Price </td>
                                <td><input type="number" name="salePrice" required> <span class="error">*</span> </td>
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