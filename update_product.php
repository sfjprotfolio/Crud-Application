<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <h2>Update Product</h2>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id=$id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE products SET product_name='$product_name', category='$category', price=$price, quantity=$quantity WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form action="update_product.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        Product Name: <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required><br>
        Category: <input type="text" name="category" value="<?php echo $product['category']; ?>" required><br>
        Price: <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br>
        Quantity: <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br>
        <input type="submit" name="update" value="Update Product">
    </form>

    <a href="index.php">Go to Product List</a>
</body>
</html>
