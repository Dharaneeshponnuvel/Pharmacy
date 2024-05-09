<?php
session_start();

// Include the database connection file
include('db.php');

// Debugging: Print out $_POST for inspection
var_dump($_POST);

// Check if the user is logged in
if(isset($_SESSION['email'])) {
    // Get the product details from the POST request
    if(isset($_POST['p_id']) && isset($_POST['name']) && isset($_POST['price'])) {
        // Prepare the SQL statement with placeholders
        $insertQuery = "INSERT INTO quantity (p_id, name, price, email) VALUES (?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $insertQuery);
        
        if($stmt) {
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "isds", $_POST['p_id'], $_POST['name'], $_POST['price'], $_SESSION['email']);
            
            // Execute the statement
            if(mysqli_stmt_execute($stmt)) {
                // Insert successful
                echo "Product inserted successfully.";
                
                // Redirect to a page after successful insertion
                header("Location: Cart.php");
                exit;
            } else {
                echo "Error adding product to cart: " . mysqli_stmt_error($stmt);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } else {
        echo "Incomplete product details.";
    }
} else {
    echo "User not logged in.";
}

// Close the database connection
mysqli_close($conn);
?>
