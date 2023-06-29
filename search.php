<head>
    <title>Search Up</title>
    <link rel="stylesheet" type="text/css" href="mystyles/search">
    <link rel="stylesheet" type="text/css" href="mystyles/navbar.css">
    <link rel="stylesheet" type="text/css" href="mystyles/footer.css">
    <?php include 'include/navbar.php'; ?>
    <?php include 'include/footer.php'; ?>
</head>
<body>
    <section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $query = htmlspecialchars(trim($_POST['query']));

        if(!empty($query)){
        $conn = new mysqli ('localhost', 'root', '', 'uecs2094_website');
        // Check connection
        if ($conn->connect_error) {
            die ("Connection failed : " . $conn->connect_error);
        }
        $sql = "SELECT * FROM products WHERE product_name LIKE '%".$query."%'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) == 0){
            echo "<h1 class = 'result'>No Result Found</h1>";
        }
        else{
            echo "<h1 class = 'result'>Result Found</h1>";
        }
        ?>
        <div class = "table-container">
        <table>
            <tr class = "head">
                <th class = "table-head">Product Name</th>
                <th class = "table-head">Product Price</th>
                <th class = "table-head">Product Description</th>
                <th class = "table-head">Product Image</th>
            </tr>
            <?php

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div></div>
                    <tr class = "content">
                        <td class = "content1"> <?php echo "<a class=product-link href='item/item_details/item_details.php?id=".$row["product_id"]."'>" .$row["product_name"]."</a>"; ?> </td>
                        <td class = "content1"> <?php echo "RM".$row['product_price']; ?> </td>
                        <td class = "content"> <?php echo $row['product_description']; ?> </td>
                        <td class = "content"> <?php echo "<img class = 'content-img' style='width:200px; height:200px;' src='./item/".$row['product_image']."'/>"; ?> </td>
                    </tr>
                    <?php
                }
            }

            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            }
            }
            ?>
            <table>
        </div>
    </section>
</body>
