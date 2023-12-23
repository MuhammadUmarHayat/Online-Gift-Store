<?php include 'header.php';?>
<?php
include 'navbar.php';
include '../config.php';

$query="";
if (isset($_GET['catid'])) // search by category
{
    $id = $_GET['catid'];
     $query = "SELECT g.id, g.title, g.description, g.status, g.photo, g.category, g.purchasingPrice, g.purchasingDate, g.qty, g.salePrice, g.remarks, p.discount, CASE WHEN p.discount IS NOT NULL THEN g.salePrice - (g.salePrice * p.discount / 100) ELSE g.salePrice END AS discountedPrice FROM gifts g LEFT JOIN promotions p ON p.productno = g.id where `category`='$id'";
}
else if (isset($_POST['btnSearch'])) // search by title
{
    $searchTerm = $_POST['search'];
    $query = "SELECT g.id, g.title, g.description, g.status, g.photo, g.category, g.purchasingPrice, g.purchasingDate, g.qty, g.salePrice, g.remarks, p.discount, CASE WHEN p.discount IS NOT NULL THEN g.salePrice - (g.salePrice * p.discount / 100) ELSE g.salePrice END AS discountedPrice FROM gifts g LEFT JOIN promotions p ON p.productno = g.id where `title`='$searchTerm'";
}
 else 
 {
    $query="SELECT g.id, g.title, g.description, g.status, g.photo, g.category, g.purchasingPrice, g.purchasingDate, g.qty, g.salePrice, g.remarks, p.discount, CASE WHEN p.discount IS NOT NULL THEN g.salePrice - (g.salePrice * p.discount / 100) ELSE g.salePrice END AS discountedPrice FROM gifts g LEFT JOIN promotions p ON p.productno = g.id";
 }



?>
<div class="container mt-4">
    <!-- Category Section -->
    <div class="category-container row">
        <?php
        $result = $con->query("SELECT * FROM `categories` LIMIT 5");
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
        ?>
                <form action="index.php" method="get" class="col-md-2 mb-3">
                    <div class="category-item">
                        <input type="hidden" id="catid" name="catid" value="<?php echo $id; ?>">
                        <button type="submit" name="btncategory" class="btn btn-link p-0">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" class="img-fluid" alt="Category Image">
                        </button>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>

    <!-- Search Section -->
    <form action="index.php" method="post" class="mb-4">
        <div class="search-container">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary" name="btnSearch">Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Product Display Section -->
    <?php
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="card mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" class="card-img" alt="Product Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $row['title']; ?></h3>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <p class="card-text">Sale Price: <?php echo $row['discountedPrice']; ?></p>
                            <p class="card-text">Quantity: <?php echo $row['qty']; ?></p>
                            <a href="viewgift.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                            <a href="addtocart.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>

<?php include 'footer.php'; ?>
