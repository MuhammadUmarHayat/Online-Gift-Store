
<?php
include '../config.php';

$result = mysqli_query($con, "SELECT count(`userid`) AS value_sum FROM users"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$totalCustomers=$sum;

$result = mysqli_query($con, "SELECT count(`id`) AS value_sum FROM categories"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$totalCategories=$sum;

$result = mysqli_query($con, "SELECT count(`id`) AS value_sum FROM gifts"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$totalGifts=$sum;

$result = mysqli_query($con, "SELECT sum(`purchasingPrice`) AS value_sum FROM gifts"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$totalPurchases=$sum;



$result = mysqli_query($con, "SELECT count(`total`) AS value_sum FROM orders"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$totalOrders=$sum;

$result = mysqli_query($con, "SELECT sum(`total`) AS value_sum FROM orders"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$totalIncome=$sum;


?>


<?php include 'header.php';?>
<?php include 'navbar.php';?>


<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-3">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h5 class="card-title">Total Gifts</h5>
            <p class="card-text"><?php echo $totalGifts ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h5 class="card-title">Total Categories</h5>
            <p class="card-text"><?php echo $totalCategories ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h5 class="card-title">Total Customers</h5>
            <p class="card-text"><?php echo $totalCustomers ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-info text-white">
          <div class="card-body">
            <h5 class="card-title">Total Purchases</h5>
            <p class="card-text"><?php echo $totalPurchases ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card bg-danger text-white">
          <div class="card-body">
            <h5 class="card-title">Total Orders</h5>
            <p class="card-text"><?php echo $totalOrders ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card bg-secondary text-white">
          <div class="card-body">
            <h5 class="card-title">Total Income</h5>
            <p class="card-text"><?php echo $totalIncome ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include 'footer.php';?>


