<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" type="text/css" href="../mystyles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../mystyles/navbar.css">
    <link rel="stylesheet" type="text/css" href="../mystyles/footer.css">
    <link rel="stylesheet" type="text/css" href="../mystyles/item.css">
</head>

<?php include_once('config.php'); ?>
<body>
    <header>
        <?php include '../include/navbar.php'; ?>
    </header>
    <section>
        <div class="page-content-product">
            <div class="main-product">
                <?php
                $sql = "SELECT * FROM products";
                $result = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col-lg-3 col-sm-6 col-md-3'>";
                        echo "<a class = product-link href='item_details/item_details.php? id=" . $row["product_id"] . "'>";
                        echo "<div>";
                        echo "<h4 class = product-name>" . $row["product_name"] . "</h4>";
                        echo "<img class='product-img' src='" . $row['product_image'] . "'/>";
                        echo "<h4 class = product-price>RM " . $row["product_price"] . "</h4>";
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </div>
    </section>
    <footer>
        <?php include '../include/footer.php'; ?>
    </footer>
</body>

</html>