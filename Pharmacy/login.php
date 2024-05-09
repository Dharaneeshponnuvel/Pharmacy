<?php
include('db.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); 
    
    // Hash the password before comparing (assuming passwords are hashed in the database)
    // Example: $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query to retrieve user information
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        if($row) {
            // Verify the password (assuming passwords are hashed in the database)
            // Example: if(password_verify($password, $row['password'])) {
            if($password == $row['password']) { // For plaintext passwords (not recommended)
                // Set session variables
                $_SESSION['email'] = $email;
                
                // Redirect to the appropriate page
                header("Location: phrmcy.php");
                exit();
            } else {
                // Invalid password
                $error = "Invalid password";
            }
        } else {
            // User not found
            $error = "User not found";
        }
    } else {
        // Error in SQL query
        $error = "Error in SQL query: " . mysqli_error($conn);
    }

    // Redirect back to login page with error message
    header("Location: login.html?error=" . urlencode($error));
}
?>
