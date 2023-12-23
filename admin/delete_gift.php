<?php include '../config.php';
 

 $id= $_GET['id'];


 $insert = $con->query("DELETE FROM `gifts` WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/mygiftstore/admin/gift.php');
 

?>
