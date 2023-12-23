<?php include 'header.php';?>
<?php include 'navbar.php';?>

<div class="container mt-4">
    <a class="btn btn-primary mb-3" href="newgift.php">New Gift</a>

    <?php
    include '../config.php';
    $username = $_SESSION['username'];
    $message = "";

    // Get image data from the database
    $result = $con->query("SELECT * FROM `gifts`");
    ?>

    <div class="row">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" class="card-img-top" alt="Gift Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p class="card-text"><?php echo $row['description'] ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Purchasing Price: <?php echo $row['purchasingPrice'] ?></li>
                                <li class="list-group-item">Purchasing Date: <?php echo $row['purchasingDate'] ?></li>
                                <li class="list-group-item">Quantity: <?php echo $row['qty'] ?></li>
                                <li class="list-group-item">Sale Price: <?php echo $row['salePrice'] ?></li>
                            </ul>
                            <div class="mt-3">
                                <a class="btn btn-info mr-2" href="edit_gift.php?id=<?php echo $row['id']; ?>">Edit Details</a>
                                <a class="btn btn-danger" href="delete_gift.php?id=<?php echo $row['id']; ?>">Remove Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo '<div class="col-12 text-center"><p>No gifts found.</p></div>';
        }
        ?>
    </div>
</div>

<?php include 'footer.php';?>
