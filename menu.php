<!-- menu start -->
<div id="header">
	<div>
		<a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
		<ul id="navigation">
			<li class="menu selected">
				<a href="index.php">Home</a>
			</li>
			<li class="menu">
				<a href="#">Booking</a>
				<ul class="primary">
					<li><a href="booking.php">Place Booking</a></li>
				</ul>
			</li>
			<li class="menu">
				<a href="#">Pizzas</a>
				<ul class="primary">
					<li><a href="product.php">Pizza Menu</a></li>
					<li><a href="order.php">Place Order</a></li>
				</ul>
			</li>
			<li class="menu">
				<a href="#">About</a>
				<ul class="primary">
					<li><a href="about.php">About Us</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="privacy.php">Privacy Policy</a></li>
				</ul>
			</li>

			<?php if ($_SESSION['loggedin'] && $_SESSION['permission'] == 'customer') { //if the user logged in as customer
				echo ("<li class='menu'>
							<a href='#'>My Account</a>
							<ul class='primary'>
								<li><a href='my_order.php'>My Order</a></li><br>
								<li><a href='my_booking.php'>My Booking</a></li><br>
								<li><a href='profile.php'>Profile</a></li><br>
								<li><a href='logout.php'>Logout</a></li>                              
							</ul>
						</li> ");
			} else if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //if the visitor is not registered yet
				echo ("<li class='menu'>
							<a href='login.php'>Login</a>
							<ul class='primary'>
								<li><a href='login.php'>Sign in</a></li><br>
								<li><a href='register.php'>Register</a></li>                              
							</ul>
						</li> ");
			} ?>

			<?php if ($_SESSION['loggedin'] && $_SESSION['permission'] == 'admin') { //if the user logged in as admin
				echo ("<li class='menu'>
					<a href='#'>Admin</a>
					<ul class='primary'>
						<li><a href='admin_booking.php'>Booking</a></li>
						<li><a href='admin_orders.php'>Orders</a></li>
						<li><a href='admin_products.php'>Products</a></li>                            
						<li><a href='admin_customers.php'>Customers</a></li>  
						<li><a href='profile.php'>Profile</a></li><br>
						<li><a href='logout.php'>Logout</a></li>                                    
					</ul>
				</li>");
			} ?>
		</ul>
	</div>
</div>
<!-- menu end -->