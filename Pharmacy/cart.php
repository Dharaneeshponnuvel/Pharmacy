<?php 
include "db.php";
session_start();

// Check if the user is logged in
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Get the user's email from the session
    
    // Fetch cart details from the database for the logged-in user
    $sql = "SELECT * FROM quantity WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if 'del' parameter is set in URL
    if(isset($_GET["del"])) {
        $del_id = $_GET["del"];
        // Perform deletion query
        $delete_query = "DELETE FROM quantity WHERE p_id = $del_id AND email = '$email'";
        if(mysqli_query($conn, $delete_query)) {
            // Item deleted successfully, redirect to viewCart.php
            header("Location: Cart.php");
            exit;
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    
<div class="container">
    <div class="row">
        <h1>Cart Items</h1>
        <hr>
        <a href='phrmcy.php'>Home</a>
        
        <table class='table'> 
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
            <?php 
            $total = 0; // Initialize total amount
            while ($row = mysqli_fetch_assoc($result)) {
                $amt = $row["quantity"] * $row["price"]; // Calculate total amount for each item
                $total += $amt; // Add to total amount
                echo "
                    <tr>
                        <td>{$row["name"]}</td>
                        <td>
                            <form class='quantity-form'>
                                <input type='hidden' name='p_id' value='{$row["p_id"]}'>
                                <input type='number' name='quantity' value='{$row["quantity"]}' min='1'>
                                <button type='button' class='update-quantity-btn'>Update</button>
                            </form>
                        </td>
                        <td>{$row["price"]}</td>
                        <td>{$amt}</td>
                        <td><a href='Cart.php?del={$row["p_id"]}'>Remove</a></td>
                    </tr>
                ";
            }
            // Output total row
            echo "
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>{$total}</td>
                </tr>";
            ?>
        </table>
        <button type="button" class="btn btn-primary" id="order-btn">Order Now</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.update-quantity-btn').click(function(e) {
            e.preventDefault();
            var form = $(this).closest('.quantity-form');
            var p_id = form.find('input[name="p_id"]').val();
            var quantity = form.find('input[name="quantity"]').val();
            $.post('updateQuantity.php', {
                p_id: p_id,
                quantity: quantity
            }, function(data) {
                window.location.reload(); // Refresh the page after updating quantity
            });
        });
    });
    $('#order-btn').click(function() {
    // Redirect to the processOrder.php to handle order processing
    window.location.href = 'processOrder.php';
});
</script>

</body>
</html>
