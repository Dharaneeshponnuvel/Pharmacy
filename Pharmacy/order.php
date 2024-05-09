<?php
// Include your database connection file
include('db.php');

// Retrieve orders from the database, including product details
$sql = "SELECT o.*, p.image
        FROM `order` o
        INNER JOIN products p ON o.p_id = p.p_id";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Check if any orders were returned
if (mysqli_num_rows($result) > 0) {
    ?>
  
    <style>
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        /* Style the table header */
        table th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: left;
        }
        /* Style the table body */
        table td {
            padding: 10px;
        }
        /* Style alternating rows */
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        /* Style the action button */
        table button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        /* Style the action button on hover */
        table button:hover {
            background-color: #0056b3;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Product ID</th>
                <th>Email</th>
                <th>Date of order</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
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
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>" alt="Product Image" width="100"></td>
                    <!-- Pass order details to JavaScript function with correct order of arguments -->
                    <td><button onclick="takeOrder('<?php echo $row['name']; ?>', '<?php echo $row['p_id']; ?>', '<?php echo $row['email'];?>','<?php echo $row['price']; ?>','<?php echo $row['image']; ?>','<?php echo $row['date']; ?>')">Take Order</button></td>
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
<script>
    function takeOrder(name, p_id, email, price, image, date) {
        // Send an AJAX request to a PHP script to insert the order details into corder table and delete the order
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_order.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status == 200) {
                alert(xhr.responseText); // Display the response from the PHP script
            } else {
                alert('Error: ' + xhr.status);
            }
        };
        xhr.send('name=' + name + '&p_id=' + p_id + '&email=' + email + '&price=' + price + '&image=' + image + '&date=' + date);
    }
</script>
