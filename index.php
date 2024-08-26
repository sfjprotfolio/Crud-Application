<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h2>Product List</h2>
    <table border="1">
        <tr>
            <th><a href="?sort=product_name">Product Name</a></th>
            <th><a href="?sort=category">Category</a></th>
            <th><a href="?sort=price">Price</a></th>
            <th><a href="?sort=quantity">Quantity</a></th>
            <th>Added Date</th>
            <th>Actions</th>
        </tr>

        <?php
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        $sql = "SELECT * FROM products ORDER BY $sort";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['product_name']}</td>";
                echo "<td>{$row['category']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['quantity']}</td>";
                echo "<td>{$row['added_date']}</td>";
                echo "<td><a href='update_product.php?id={$row['id']}'>Edit</a> | <a href='delete_product.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found.</td></tr>";
        }
        ?>

    </table>
    <a href="add_product.php">Add New Product</a>
</body>
</html>
