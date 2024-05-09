<?php
session_start();

// Include your database connection file
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page or display an error message
    header("Location: admin.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Validate the passwords
    if ($newPassword != $confirmPassword) {
        echo "New password and confirm password do not match.";
        exit();
    }

    // Perform additional validation if needed

    // Update the password in the database
    // Replace 'your_username_field' and 'your_password_field' with the actual column names
    $email = $_SESSION['email'];
    $sql = "UPDATE admin SET password = '$newPassword' WHERE email = '$email'";

    // Execute the update query
    if (mysqli_query($conn, $sql)) {
        
        echo '<script>alert("Password updated successfully.");</script>';
        header("Location: dashboard.php");
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
