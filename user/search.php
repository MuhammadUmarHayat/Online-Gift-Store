<?php include 'header.php';?>
<?php
include 'navbar.php';
include '../config.php';
?>

<style>
    .category-container {
        display: flex;
        flex-wrap: nowrap;
        margin-left: 10px;
        margin-top: 10px;
    }

    .category-item {
        display: inline-block;
        margin-right: 10px;
    }

    .search-container {
        display: flex;
        max-width: 600px;
        width: 100%;
        margin-left: 10px;
        margin-top: 10px;
    }

    .search-input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
        outline: none;
    }

    .search-button {
        background-color: #4caf50;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        outline: none;
    }
</style>

<div class="category-container">
    <?php
    $result = $con->query("SELECT * FROM `categories`");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="category-item">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width="300px" height="150px" />
            </div>
            <?php
        }
    }
    ?>
</div>

<div class="search-container">
    <input type="text" class="search-input" placeholder="Search...">
    <button class="search-button">Search</button>
</div>

<?php include 'footer.php';?>
