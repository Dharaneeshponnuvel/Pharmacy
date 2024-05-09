<?php
// Include your database connection file
include('db.php');

// Retrieve data from the AJAX request

$name = $_POST['name'];
$p_id = $_POST['p_id'];
$email = $_POST['email'];
$price = $_POST['price'];
$image = $_POST['image'];
$date = $_POST['date']; // Corrected variable name

// Insert order details into corder table
$sqlInsert = "INSERT INTO corder (name, p_id, email, price, image, date) VALUES ('$name', '$p_id', '$email', '$price', '$image', '$date')";

// Delete the order from the order table
$sqlDelete = "DELETE FROM `order` WHERE 
              pid = ? AND 
              date = ? AND 
              image = ? AND 
              price = ? AND 
              email = ?";

// Execute both queries within a transaction
mysqli_begin_transaction($conn);

try {
    // Insert into corder table
    mysqli_query($conn, $sqlInsert);

    // Delete from order table
    mysqli_query($conn, $sqlDelete);

    // Commit the transaction
    mysqli_commit($conn);

    echo "Order taken successfully and deleted from order table.";
} catch (Exception $e) {
    // Rollback the transaction if an error occurred
    mysqli_rollback($conn);
    echo "Error: " . $e->getMessage();
}

// Close the database connection
mysqli_close($conn);
?>
