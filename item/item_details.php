<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stylo Product Page</title>
    <?php include_once('../item/config.php'); ?>
    <link rel="stylesheet" type="text/css" href="/Assignment/mystyles/item_details.css">
    <link rel="stylesheet" type="text/css" href="/Assignment/mystyles/navbar.css">
    <link rel="stylesheet" type="text/css" href="/Assignment/mystyles/footer.css">
</head>
<body>
    <header>
        <?php include '../include/navbar.php'; ?>
    </header>
    <section>
        <div class = "item_container">
            <?php
            $product_id = $_GET['id'];
            echo "<h1 style='color: white'>" . $product_id . "</h1>";
            $sql = "SELECT * FROM products WHERE product_id = $product_id";
            $result = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='item_image'>";
                    echo "<img class='item_picture';' src='../" . $row['product_image'] . "' />";
                    echo "</div>";
                    echo "<div class='right-column'>";
                    echo "<div class='item-description'>";
                    echo "<h1 style='color: white'>" . $row["product_name"] . "</h1>";
                    echo "<p style='color:white'>" . $row["product_description"] . "</p>";
                    echo "</div>";
                    echo "<div class='item-price'>";
                    echo "<span style='color:white'>" . "RM " . $row["product_price"] . "</span>";
                    echo "<button onclick='addToCart()' name='add' class='btn btn-success'>Add to cart</button>";
                    echo "<a href='../index.php' name='add' class='btn btn-info'>Back</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </section>
    <footer>
        <?php include '../include/footer.php'; ?>
    </footer>
    <script>
        function addToCart() {
            <?php
                if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
                    $userId = $_SESSION['id'];
                    $insertsql = "INSERT INTO cart VALUES ('0','$product_id','$userId')";
                    if ($mysqli->query($insertsql) === TRUE) {
                        echo "alert('Item added to cart')";
                    } else {
                        echo "Error: " . $insertsql . "<br>" . $mysqli->error;
                    }
                }
                else{
                    echo "alert('Please login to add to cart')";
                }

            ?>
        }
    </script>
</body>

</html>