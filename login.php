<?php
include "header.php";
include "checksession.php";
include "menu.php";
echo "logedin status " . $_SESSION['loggedin'];
//----------- page content starts here

?>

<div id="body">
	<!-- <div class="header">
		<div>
			<h1>Privacy and Terms and Conditions</h1>
		</div>
	</div> -->
	<!-- <div class="body">
		<img src="images/bg-header-about.jpg" alt="">
	</div> -->
	<div class="container-form">
		<div class="container-login">
			<form action="login.php" method="post">
				<div class="form-control">
					<input type="text" required>
					<label>Email</label>
				</div>
				<div class="form-control">
					<input type="password" required>
					<label>Password</label>
				</div>
				<input class="btn" type="submit">
				<p class="text">Don't have an account? <a href="register.php">Register</a></p>
			</form>
		</div>
	</div>
</div>


<?php
//----------- page content ends here
include "footer.php";
?>