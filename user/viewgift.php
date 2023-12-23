<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";
$title="";
                                        
                     
$salePrice;

$id= $_GET['id'];
$result = $con->query("SELECT * FROM `gifts`  WHERE `id`='$id'");


//add to cart 

if (isset($_POST['save']))
 {
    $giftid= $_GET['id'];
    $qty= $_POST['qty']; 
    $customer=$username;
//checking weather cart hase same gift of same customer
    $record = $con->query("SELECT * FROM `carts`  WHERE `giftid`='$giftid' and `customer`='$customer'");
    if($record->num_rows > 0)
    {
        $message="you have already selected this gift item."; 
    }
    else
    {
   // $title="";
   $result = $con->query("SELECT * FROM `gifts`  WHERE `id`='$id'");

   if($result->num_rows > 0)
   {
       while($row = $result->fetch_assoc())
       {//`categories`( `title`, `description`
           $title=$row['title'];
                                           
                        
                        $salePrice =$row['salePrice'];
   
   
   
   }
   }                                 
                     
$total=$qty*$salePrice;
        //INSERT INTO `carts`( `giftid`, `title`, `price`, `qty`, `total`, `customer`) VALUES ('','','','','','')
        $query = "INSERT INTO `carts`( `giftid`, `title`, `price`, `qty`, `total`, `customer`) VALUES ('$giftid','$title','$salePrice','$qty','$total','$customer')";

        $insert = mysqli_query($con, $query);


        header('Location:http://localhost/mygiftstore/user/index.php');

    }



       
          
        
  }
    


include 'header.php';?>
<?php include 'navbar.php';?>

<div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //`categories`( `title`, `description`, `photo`
    ?>
    <br><br><br>
    <form method="post" action="viewgift.php?id=<?php echo $id; ?>"> 
    <table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>
<table>
<tr>
                                <td>#</td>
                                <td><?php echo $id; ?></td>
                            </tr>
<tr>
<td><td><td><h3><?php echo $row['title'] ?></h3> <td>
</tr>
<tr>
<td><td><td><?php echo $row['description'] ?><td>
</tr>
<tr>
<td><td><td><?php echo $row['salePrice'] ?>$<td>
</tr>
<tr>
<td>  <td><td><select name="qty" id="qty">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>

  
</select><td>
</tr>
<tr>
<td><td><td> <button type="submit" name="save"> Add To Cart </button> </td>
</tr>
<tr>
<td><td><td><?php
                        echo $message;
                        ?><td>
</tr>
    </table>
    </form>
<br>
 
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