<?php include '../config.php';
 

 $id= $_GET['id'];


 $insert = $con->query("DELETE FROM `categories` WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/mygiftstore/admin/category.php');
 

?>