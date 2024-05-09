<?php
include "db.php";
session_start();

if (isset($_POST["p_id"]) && isset($_POST["quantity"])) {
    $p_id = $_POST["p_id"];
    $quantity = $_POST["quantity"];

    // Update quantity in the database
    $update_query = "UPDATE quantity SET quantity = $quantity WHERE p_id = $p_id AND email = '{$_SESSION["email"]}'";

    if (mysqli_query($conn, $update_query)) {
        // Quantity updated successfully
        header("Location: Cart.php"); // Redirect back to cart page
        exit;
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
