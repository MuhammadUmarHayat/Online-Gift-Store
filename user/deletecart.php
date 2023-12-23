<?php include '../config.php';
 

 $id= $_GET['id'];


 $insert = $con->query("DELETE FROM `carts` WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/mygiftstore/user/mycart.php');
 

?>