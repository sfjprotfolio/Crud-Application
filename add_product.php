<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form action="add_product.php" method="post">
        Product Name: <input type="text" name="product_name" required><br>
        Category: <input type="text" name="category" required><br>
        Price: <input type="number" step="0.01" name="price" required><br>
        Quantity: <input type="number" name="quantity" required><br>
        <input type="submit" name="submit" value="Add Product">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $product_name = $_POST['product_name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT INTO products (product_name, category, price, quantity, added_date) VALUES ('$product_name', '$category', $price, $quantity, CURDATE())";

        if ($conn->query($sql) === TRUE) {
            echo "New product added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <a href="index.php">Go to Product List</a>
</body>
</html>
