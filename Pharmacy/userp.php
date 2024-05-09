<?php
include "db.php"; // Include your database connection file
session_start();

// Check if the user is logged in or not
if (!isset($_SESSION['email'])) {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

// Query to select user details from the database
$sql = "SELECT * FROM users WHERE email = '$email'"; // Enclose $email in quotes
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch user details
    $user = mysqli_fetch_assoc($result);

    // Populate form fields with user data
    $username = $user['username'];
    $email = $user['email'];
    $First_Name = $user['First_Name'];
    $Last_Name = $user['Last_Name'];
    $address = $user['address'];
    $pincode = $user['pincode'];
    $phone_number = $user['phone_number'];
    $password = $user['password'];
    $image = $user['image'];
} else {
    // Handle query error, display error message or log it
    echo "Error: " . mysqli_error($conn);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $First_Name = $_POST['firstname'];
    $Last_Name = $_POST['lastname'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $phone_number = $_POST['number'];
    $password = $_POST['password']; 
    $image = $_POST['image'];

    // Update user details in the database
    $update_sql = "UPDATE users SET username = '$username', First_Name = '$First_Name', Last_Name = '$Last_Name', address = '$address', pincode = '$pincode', phone_number = '$phone_number', password = '$password', image='$image' WHERE email = '$email'";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        
    } else {
        echo "Error updating user details: " . mysqli_error($conn);
    }
}

mysqli_close($conn); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="user.css"> <!-- Link your CSS file here -->
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <form id="profileForm" action="#" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" value="<?php echo $First_Name; ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $Last_Name; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
            </div>
            <div class="form-group">
                <label for="pincode">Pincode:</label>
                <input type="text" id="pincode" name="pincode" value="<?php echo $pincode; ?>" required>
            </div>
            <div class="form-group">
                <label for="number">Phone Number:</label>
                <input type="text" id="number" name="number" value="<?php echo $phone_number; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="form-group">
                <label for="pic">Profile Picture:</label>
                <input type="file" id="pic" name="image" value="<?php echo $image; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit">SAVE</button>
            </div>
        </form>
    </div>
</body>
</html>
