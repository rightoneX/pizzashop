<!-- menu start -->
<div id="header">
	<div>
		<a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
		<ul id="navigation">
			<li class="menu selected">
				<a href="index.php">Home</a>
			</li>
			<li class="menu">
				<a href="">Pizzas</a>
				<ul class="primary">
					<li><a href="product.php">Pizza Menu</a></li>
					<li><a href="order.php">Place Order</a></li>
				</ul>
			</li>
			<li class="menu">
				<a href="">About</a>
				<ul class="primary">
					<li><a href="about.php">About Us</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="terms.php">Terms of Use</a></li>
					<li><a href="privacy.php">Privacy Policy</a></li>
				</ul>
			</li>
			<li class="menu">		
				<?php if ($_SESSION['loggedin'] == true) {
				echo ("<a href=''>My Account</a>
					<ul class='primary'>
						<li><a href='order.php'>My Order</a></li><br>
						<li><a href='profile.php'>Profile</a></li><br>
						<li><a href='logout.php'>Logout</a></li>                              
					</ul>");
				} else {
				echo ("<a href='login.php'>Login</a>
					<ul class='primary'>
						<li><a href='login.php'>Sign in</a></li><br>
						<li><a href='register.php'>Register</a></li>                              
					</ul> ");
				}
				?>
			</li>
			<!-- <li class="menu">
						<a href="admin.php">Admin</a>
						<ul class="secondary">
							<li><a href="admin-reservations.php">Reservations</a></li>
							<li><a href="admin-orders.php">Orders</a></li>
							<li><a href="admin-products.php">Products</a></li>                            
							<li><a href="admin-customers.php">Customers</a></li>                                                        
						</ul>
					</li> -->
		</ul>
	</div>
</div>
<!-- menu end -->