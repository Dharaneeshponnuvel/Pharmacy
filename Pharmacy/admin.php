<?php
include('db.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); 

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        if($row) {
 
            if($password == $row['password']) { // For plaintext passwords (not recommended)
                // Set session variables
                $_SESSION['email'] = $email;
                
                // Redirect to the appropriate page
                header("Location: dashboard.php");
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
    header("Location: admin.php?error=" . urlencode($error));
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Adimn Login</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="main">
        <h3>Enter your login credentials</h3>
        <form action="" method="POST">
            <label for="username">User Email:</label>
            <input type="text" id="username" name="email" placeholder="Enter your Email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">Submit</button>
            </div>

            <?php
            // Display error message if login fails
            if (isset($error)) {
                echo "<div class='error'>$error</div>";
            }
            ?>
        </form>
    </div>
</body>

</html>
