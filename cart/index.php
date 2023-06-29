<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="../mystyles/cart.css">
    <link rel="stylesheet" type="text/css" href="../mystyles/navbar.css">
    <link rel="stylesheet" type="text/css" href="../mystyles/footer.css">

</head>
<body>
<header>
    <?php include '../include/navbar.php'; ?>
</header>
    <section>
        <div class = cart-container>
            <h1 class = "cart-header">Cart</h1>
            <table class = "cart-table">
                <tr class = "table-head">
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
                <?php

                // Your database credentials
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "uecs2094_website";

                // Create a connection
                $conn = mysqli_connect($host, $username, $password, $database);

                // Check if the connection is successful
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // The user ID whose cart you want to retrieve
                $userID = 1;

                // Check if an item has been removed
                if(isset($_GET['remove'])) {
                    $cartID = $_GET['remove'];
                    $sql = "DELETE FROM cart WHERE cartID = $cartID AND userID = $userID";
                    mysqli_query($conn, $sql);
                }

                // Query to retrieve the cart items of the user
                $sql = "SELECT cart.cartID, products.product_id, products.product_name, products.product_price
                FROM cart
                INNER JOIN products ON cart.itemID = products.product_id
                WHERE cart.userID = $userID";


                $result = mysqli_query($conn, $sql);

                $totalPrice = 0;

                // Check if the query is successful
                if ($result) {
                    // Display the cart items
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class = 'content'>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td> RM " . $row["product_price"] . "</td>";
                        echo "<td><a  href='?remove=" . $row['cartID'] . "'>Remove</a></td>";
                        echo "</tr>";

                        // Add the price of the item to the total price
                        $totalPrice += $row["product_price"];
                    }
                } else {
                    echo "<tr class = 'content'><td colspan='2'>No items in cart</td></tr>";
                }

                // Display the total price

                echo "<tr class = 'totalprice'>
                        <td>Total Price:</td>
                        <td> RM" . $totalPrice . "</td>
                        <td> <a href='payment.php' >Check Out</a> </td>
                       </tr>";

                // Close the connection
                mysqli_close($conn);

                ?>
            </table>
        </div>
    </section>
<footer>
    <?php include '../include/footer.php'; ?>
</footer>
</body>
</html>
