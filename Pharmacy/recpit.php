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
    <link rel="stylesheet" type="text/css" href="r.css">
</head>
<body>
<div id="invoice-POS">
    
    <center id="top">
        <div class="logo"></div>
        <div class="info"> 
            <h2>Livya</h2>
        </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
        <div class="info">
            <h2>Contact Info</h2>
            <p> 
                Address : Bandrawest Mumbai,Maharasthra 400050</br>
                Email   : livya@gmail.com</br>
                Phone   : 555-555-5555</br>
            </p>
        </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">
        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="Hours"><h2>Qty</h2></td>
                    <td class="Rate"><h2>Sub Total</h2></td>
                </tr>
                <?php
                // Start the session
                session_start();

                // Check if the user is logged in and email is set in the session
                if(isset($_SESSION['email'])) {
                    $email = $_SESSION['email']; // Get the user's email from the session
                   
                    // Include database connection file
                    include "db.php";

                    // Fetch order details from the database
                    
                    $sql = "SELECT * FROM `order` WHERE email = '$email' AND DATE(date) = CURDATE() AND time >= CURTIME()";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query executed successfully
                    if($result) {
                        // Loop through each row in the result set
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='service'>";
                            echo "<td class='tableitem'><p class='itemtext'>" . $row['name'] . "</p></td>";
                            echo "<td class='tableitem'><p class='itemtext'>" . $row['quantity'] . "</p></td>";
                            echo "<td class='tableitem'><p class='itemtext'>Rs" . $row['price'] * $row['quantity'] . "</p></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Fetch total and tax from the database
                    $sql = "SELECT SUM(price * quantity) AS total FROM `order`WHERE email = '$email' AND DATE(date) = CURDATE() AND time >= CURTIME()";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query executed successfully
                    if($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $total = $row['total'];
                        $tax = 0.1 * $total; // Assuming tax rate is 10%

                        // Display tax and total
                        echo "<tr class='tabletitle'>";
                        echo "<td></td>";
                        echo "<td class='Rate'><h2>Tax</h2></td>";
                        echo "<td class='payment'><h2>Rs" . number_format($tax, 2) . "</h2></td>";
                        echo "</tr>";

                        echo "<tr class='tabletitle'>";
                        echo "<td></td>";
                        echo "<td class='Rate'><h2>Total</h2></td>";
                        echo "<td class='payment'><h2>Rs" . number_format($total + $tax, 2) . "</h2></td>";
                        echo "</tr>";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "User is not logged in"; // You can handle this as per your requirement
                }
                ?>
            </table>
        </div><!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices. 
            </p>
        </div>
    </div><!--End InvoiceBot-->
</div><!--End Invoice-->
</body>
</html>
