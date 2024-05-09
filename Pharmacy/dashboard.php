<?php
// Connect to your database
include('db.php');
session_start();

// Query to fetch product details from the database
?>

<!DOCTYPE html>
<html>

<head>
    <title>Adimn dashboard</title>
    <link rel="stylesheet" href="d.css">
</head>

<body>
<div class="app">
	<header class="app-header">
		<div class="app-header-logo">
			<div class="logo">
				<span class="logo-icon">
					<img src="th.jpg" />
				</span>
				<h1 class="logo-title">
					<span>Livya</span>
					<span>Pharmacy</span>
				</h1>
			</div>
		</div>
		<div class="app-header-navigation">
			<div class="tabs">
				
			</div>
		</div>
        <?php
         $sql = "SELECT * FROM admin";
          $result = mysqli_query($conn, $sql);

          // Check if any rows were returned
           if (mysqli_num_rows($result) > 0) {
          // Output data for each row
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
		<div class="app-header-actions">
			<button class="user-profile">
				<span><?php echo $row['name']; ?></span>
				<span>
					<img src="<?php echo $row['image']; ?>" />
				</span>
			</button>
			
		</div>
		<div class="app-header-mobile">
			<button class="icon-button large">
				<i class="ph-list"></i>
			</button>
		</div>

	</header>
	<div class="app-body">
		<div class="app-body-navigation">
			<nav class="navigation">
				<a href="#">
					<i class="ph-browsers"></i>
					<span>Dashboard</span>
				</a>
				<a href="order.php">
					<i class="ph-check-square"></i>
					<span>Orders</span>
				</a>
				<a href="products.php">
					<i class="ph-swap"></i>
					<span>products</span>
				</a>
				<a href="corder.php">
					<i class="ph-file-text"></i>
					<span>Completed Orders</span>
				</a>
				<a href="chagepassword.php">
					<i class="ph-globe"></i>
					<span>Change Password</span>
				</a>
				<a href="adminlogout.php">
					<i class="ph-clipboard-text"></i>
					<span>LogOut</span>
				</a>
			</nav>
			<footer class="footer">
				<h1>Livya<small>©</small></h1>
				<div>
					Livya ©<br />
					All Rights Reserved 2021
				</div>
			</footer>
		</div>
		<div class="app-body-main-content">
			<section class="service-section">
				<h2>Service</h2>
				<div class="service-section-header">
					<div class="search-field">
						<i class="ph-magnifying-glass"></i>
						<input type="text" placeholder="Account number">
					</div>
					<div class="dropdown-field">
						<select>
							<option>Home</option>
							<option>Work</option>
						</select>
						<i class="ph-caret-down"></i>
					</div>
					<button class="flat-button">
						Search
					</button>
				</div>
				<div class="mobile-only">
					<button class="flat-button">
						Toggle search
					</button>
				</div>
                <?php
         $sql = "SELECT count(email) as email FROM users";
          $result = mysqli_query($conn, $sql);

          // Check if any rows were returned
           if (mysqli_num_rows($result) > 0) {
          // Output data for each row
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
				<div class="tiles">
					<article class="tile">
						<div class="tile-header">
							<i class="ph-lightning-light"></i>
							<h3>
								<span><?php echo $row['email']; ?></span>
								<span>N0.of. users</span>
							</h3>
						</div>
						<a href="#">
							
							<span class="icon-button">
								<i class="ph-caret-right-bold"></i>
							</span>
						</a>
					</article>
                    <?php
// Perform database query to get the count of orders
$sql = "SELECT COUNT(*) AS order_count FROM `order`"; // Enclose ORDER in backticks
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Output data for each row
        while ($row = mysqli_fetch_assoc($result)) {
?>
					<article class="tile">
						<div class="tile-header">
							<i class="ph-fire-simple-light"></i>
							<h3>
								<span><?php echo $row['order_count']; ?></span>
								<span>Orders</span>
							</h3>
						</div>
						<a href="#">
							
							<span class="icon-button">
								<i class="ph-caret-right-bold"></i>
							</span>
						</a>
					</article>
                    <?php
// Perform database query to get the count of orders
$sql = "SELECT SUM(price) AS price FROM `order`"; // Enclose ORDER in backticks
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Output data for each row
        while ($row = mysqli_fetch_assoc($result)) {
?>
					<article class="tile">
						<div class="tile-header">
							<i class="ph-file-light"></i>
							<h3>
								<span>$<?php echo $row['price']; ?></span>
								<span>Amount</span>
							</h3>
						</div>
						<a href="#">
						
							<span class="icon-button">
								<i class="ph-caret-right-bold"></i>
							</span>
						</a>
					</article>
				</div>
				
			</section>
			<section class="transfer-section">
				<div class="transfer-section-header">
					<h2>Latest Order</h2>
					<div class="filter-options">
						
						<button class="icon-button">
							<i class="ph-funnel"></i>
						</button>
						<button class="icon-button">
							<i class="ph-plus"></i>
						</button>
					</div>
				</div>
                <?php
                  $sql = "SELECT o.*, p.image
                  FROM `order` AS o
                  JOIN products AS p ON o.p_id = p.p_id
                  ORDER BY o.date DESC
                  LIMIT 1";
          
          $result = mysqli_query($conn, $sql);
          
          // Check if any rows were returned
          if (mysqli_num_rows($result) > 0) {
              // Output data for each row
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
				<div class="transfers">
					<div class="transfer">
						<div class="transfer-logo">
							<img src="<?php echo $row['image']; ?>" />
						</div>
						<dl class="transfer-details">
							<div>
								<dt><?php echo $row['name']; ?></dt>
								
							</div>
							<div>
								<dt><?php echo $row['p_id']; ?></dt>
								
							</div>
							<div>
								<dt><?php echo $row['date']; ?></dt>
								<dd>Date payment</dd>
							</div>
						</dl>
						<div class="transfer-number">
							 $ <?php echo $row['price']; ?>
						</div>
					</div>
              
                    <?php
                  $sql = "SELECT o.*, p.image
                  FROM `order` AS o
                  JOIN products AS p ON o.p_id = p.p_id
                  ORDER BY o.date DESC
                  LIMIT 1,1";
          
          $result = mysqli_query($conn, $sql);
          
          // Check if any rows were returned
          if (mysqli_num_rows($result) > 0) {
              // Output data for each row
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
					<div class="transfer">
						<div class="transfer-logo">
							<img src="<?php echo $row['image']; ?>" />
						</div>
						<dl class="transfer-details">
							<div>
								<dt><?php echo $row['name']; ?></dt>
								
							</div>
							<div>
								<dt><?php echo $row['p_id']; ?></dt>
								
							</div>
							<div>
								<dt><?php echo $row['date']; ?></dt>
								<dd>Date payment</dd>
							</div>
						</dl>
						<div class="transfer-number">
							 $ <?php echo $row['price']; ?>
						</div>
					</div>
                    <?php
                  $sql = "SELECT o.*, p.image
                  FROM `order` AS o
                  JOIN products AS p ON o.p_id = p.p_id
                  ORDER BY o.date DESC
                  LIMIT 2,1";
          
          $result = mysqli_query($conn, $sql);
          
          // Check if any rows were returned
          if (mysqli_num_rows($result) > 0) {
              // Output data for each row
              while ($row = mysqli_fetch_assoc($result)) {
          ?>
					<div class="transfer">
						<div class="transfer-logo">
							<img src="<?php echo $row['image']; ?>" />
						</div>
						<dl class="transfer-details">
							<div>
								<dt><?php echo $row['name']; ?></dt>
								
							</div>
							<div>
								<dt><?php echo $row['p_id']; ?></dt>
								
							</div>
							<div>
								<dt><?php echo $row['date']; ?></dt>
								<dd>Date payment</dd>
							</div>
						</dl>
						<div class="transfer-number">
                        $ <?php echo $row['price']; ?>
						</div>
					</div>
				</div>
			</section>
		</div>
		
		
		</div>
	</div>
</div>
</body>
<?php
                   }
                
            }else {
                       echo "No products found.";
                       }
                         
                        ?>
<?php
                   }
                
            }else {
                       echo "No products found.";
                       }
                         
                        ?>
<?php
                   }
                
            }else {
                       echo "No products found.";
                       }
                         
                        ?>
<?php
                   }
                }
            }else {
                       echo "No products found.";
                       }
                         
                        ?>
<?php
                   }
                        } else {
                       echo "No products found.";
                       }
                         
                        ?>
<?php
                   }
                }
            }else {
                       echo "No products found.";
                       }
                         
                        ?>
<?php
                   }
                        } else {
                       echo "No products found.";
                       }
                            mysqli_close($conn);
                        ?>