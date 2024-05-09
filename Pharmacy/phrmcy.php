<?php
// Connect to your database
include('db.php');
session_start();
$_SESSION['email'];
// Query to fetch product details from the database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livya Store - Explore Our Products</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="welcome-message">
                <p>Welcome to Livya Store!</p>
              <p> Enjoy exploring our products.</p>
            </div>
            <div class="logo">
              <!--logo -->  <img src="template-logo-hands-with-nature-medicine-perfect-for-logo-pharmacy-free-vector.jpg" alt="Livya Store Logo">
            </div>
            <div class="search-bar-container">
                <input type="text" class="search-bar" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>
        </div>
        <ul class="navigation">
            <li><a href="userp.php">Profile</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <!-- Counter to display the number of items in the cart with inline CSS -->
            <?php
$email = $_SESSION['email']; // Assuming you have stored the user's email in the session
$sql = "SELECT count(email) AS total_count FROM quantity WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$cart_total_count = $row['total_count'];
?>
<div id="cart-counter" style="color: red;"><?php echo $row['total_count']; ?></div>


            <li><a href="./cart.php">Cart</a></li>
            <li><a href="./logout.php">Logout</a></li>

        </ul>
        
    </div>

    <!-- Main Content -->
    <div class="container">
        <header>
            <h1>Explore Our Products</h1>
        </header>
        
       <?php
         $sql = "SELECT * FROM products";
          $result = mysqli_query($conn, $sql);

          // Check if any rows were returned
           if (mysqli_num_rows($result) > 0) {
          // Output data for each row
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form method="post" action="addToCart.php">
        <div class="products">
            <!-- Product 1 -->
            <div class="product">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 1">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn" type="submit">Add to Cart</button>
                </div>
            </div>
    </form>
            <?php  $sql = "SELECT * FROM products where p_id=2";
               $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
           <form method="post" action="addToCart.php">
            <div class="product">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 2">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn" type="submit">Add to Cart</button>
                </div>
           

             
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=3";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
           <form method="post" action="addToCart.php">
            <!-- Add 8 more products -->
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 3">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
               
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=4";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
         <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>"alt="Medicine 4">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=5";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
          <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 5">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn" type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=6";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
          <form method="post" action="addToCart.php">
            <div class="product" >
                <img src="<?php echo $row['image']; ?>"alt="Medicine 6">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn" type="submit">Add to Cart</button>
                </div>
            </div>
            </form>        
            <?php 
                   $sql = "SELECT * FROM products where p_id=7";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
          <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 7">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=8";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
          <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 8">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=9";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
          <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 9">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=10";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
          <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>" alt="Medicine 10">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn" type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=11";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
         <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>"alt="Medicine 11">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=12";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
         <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>"alt="Medicine 12">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=13";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
         <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>"alt="Medicine 13">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=14";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
         <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>"alt="Medicine 14">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
            <?php 
                   $sql = "SELECT * FROM products where p_id=15";
                   $result = mysqli_query($conn, $sql);

// Check if any rows were returned
                        if (mysqli_num_rows($result) > 0) {
    // Output data for each row
                       while ($row = mysqli_fetch_assoc($result)) {
                 
        ?>
         <form method="post" action="addToCart.php">
            <div class="product" action="addToCart.php">
                <img src="<?php echo $row['image']; ?>"alt="Medicine 15">
                <div class="product-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: Rs<?php echo $row['price']; ?></p>
                    <p>Manufacture Date: <?php echo $row['Manufacture_date']; ?></p>
                    <p>Expiry Date: <?php echo $row['Expiry_date']; ?></p>
                    <p><input type="hidden"  name="name" value="<?php echo $row['name']; ?>" class="form-control"></p>
	                <p><input type="hidden"  name="price" value="<?php echo $row['price']; ?>" class="form-control"></p>
                    <p><input type="hidden"  name="p_id" value="<?php echo $row['p_id']; ?>" class="form-control"></p>
                    <button class="add-to-cart-btn"type="submit">Add to Cart</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
<script>
function addToCart(p_id, name, price) {
    // Send an AJAX request to addToCart.php
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText); // Show response from addToCart.php
        }
    };
    xhttp.open("POST", "addToCart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("p_id=" + p_id + "&name=" + name + "&price=" + price);
}
</script>
<?php
                   }
                        } else {
    // No products found
                       echo "No products found.";
                       }

// Close database connection
                           
                        ?>
 <?php
                   }
                        } else {
    // No products found
                       echo "No products found.";
                       }

// Close database connection
                           
                        ?>
<?php
                   }
                        } else {
    // No products found
                       echo "No products found.";
                       }

// Close database connection
                           
                        ?>
                        <?php
                   }
                        } else {
    // No products found
                       echo "No products found.";
                       }
    //Close database connection

                           ?>
 <?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
          
            ?>
 <?php
                   }
                        } else {
    // No products found
                       echo "No products found.";
                       }

// Close database connection
                           
                        ?>
 <?php
                   }
                        } else {
    // No products found
                       echo "No products found.";
                       }

// Close database connection
                           
                        ?>                       
 <?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
           
 ?>
<?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
           
            ?>
<?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
         
 ?>
<?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
            
 ?>
<?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
           
 ?>
<?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
           
 ?>
 <?php
                 
                }
            } else {
                // No products found
                echo "No products found.";
            }
            
            // Close database connection
            
 ?>

  <?php
                   }
                        } else {
                       echo "No products found.";
                       }
                            mysqli_close($conn);
                        ?>