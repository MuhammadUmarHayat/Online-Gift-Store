
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

if (isset($_POST['save']))
 {
    
      $title = $_POST['title'];
     $description=$_POST['description'];
     
     $productno = $_POST['productno'];
     $discount=$_POST['discount'];
     $dateofexpiry = $_POST['dateofexpiry'];
     $status="active";
     $remarks="ok";
      
          


       $query = "INSERT INTO `promotions`( `title`, `description`, `productno`, `discount`, `dateofexpiry`, `status`, `remarks`) VALUES ('$title','$description','$productno','$discount','$dateofexpiry','$status','$remarks')";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/mygiftstore/admin/promotion.php');
          
        
        }
   


?>

<?php include 'header.php';?>

<?php include 'navbar.php';?>
<br>
<h2>New Gift</h2>
<br>
<div>
    <form method="post" action="newpromotion.php" enctype="multipart/form-data">
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
                                <td>Choose Product </td>
<td>
<select name="productno" id="productno">
    <option disabled selected>-- Select Product--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT * From `gifts`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['title'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>

                              
                            </tr>
                           
                            <tr>
                                <td>Discount Price </td>
                                <td><input type="number" name="discount" required> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Expiry Date </td>
                                <td><input type="date" name="dateofexpiry" required> <span class="error">*</span> </td>
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