<?php include '../config.php';
 

 $id= $_GET['id'];


 $insert = $con->query("DELETE FROM `promotions` WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/mygiftstore/admin/promotion.php');
 

?>
