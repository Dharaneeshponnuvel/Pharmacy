<?php
// Include your database connection file
include('db.php');

// Retrieve products from the database
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Check if any products were returned
if (mysqli_num_rows($result) > 0) {
    ?>
     <style>
        body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    width: 80%;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

    </style>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data for each product
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><img src="<?php echo $row['image']; ?>" alt="Product Image" width="100"></td>
                    <td><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No products found.";
}

// Close the database connection
mysqli_close($conn);
?>
