<?php
// Include your database connection file
include('db.php');

// Retrieve orders from the corder table
$sql = "SELECT * FROM corder";
$result = mysqli_query($conn, $sql);

// Check if any orders were returned
if (mysqli_num_rows($result) > 0) {
    ?>
    <style>
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

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table img {
    display: block;
    max-width: 100px;
    height: auto;
    margin: 0 auto;
}

        </style>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Product ID</th>
                <th>Email</th>
                <th>Price</th>
                <th>Image</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data for each order
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>" alt="Product Image" width="100"></td>
                    <td><?php echo $row['date']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No orders found.";
}

// Close the database connection
mysqli_close($conn);
?>
