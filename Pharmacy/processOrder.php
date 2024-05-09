<?php
include "db.php";
session_start();

// Check if the user is logged in
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Get the user's email from the session
    
    // Fetch cart details from the database for the logged-in user
    $sql = "SELECT * FROM quantity WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Insert order details into the database
    while ($row = mysqli_fetch_assoc($result)) {
        $p_id = $row['p_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $name = $row['name']; // Retrieve the name of the item
        
        // Insert order details into the `orders` table with backticks around the table name
        $insert_query = "INSERT INTO `order` (email, p_id, name, quantity, price) VALUES ('$email', '$p_id', '$name', '$quantity', '$price')";
        if(mysqli_query($conn, $insert_query)) {
            // Order details inserted successfully, you can optionally clear the cart here
            // For example, you can clear the cart after placing the order
            $delete_query = "DELETE FROM quantity WHERE email = '$email'";
            mysqli_query($conn, $delete_query);
            
            // Redirect the user to a thank you page or order confirmation page
            header("Location: recpit.php");
            exit;
        } else {
            echo "Error inserting order details: " . mysqli_error($conn);
        }
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}
?>
