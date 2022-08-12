<?php
include "session.php";
include "header.php";
include "menu.php";

if ($_SESSION['loggedin']) { //don not show this page if user is logged in already
	header("Location: index.php");
}

if (isset($_POST['email']) && isset($_POST['password'])) {

	login($_POST['email'], $_POST['password']);  //getting user data if it is exist and set the 'loggedin' 

	if ($_SESSION['loggedin']) {  //user is in database

		if ($_SESSION['permission'] == 'admin') { //check if the user is admin 
			header("Location: admin-orders.php");
		} else {
			header("Location: index.php");
		}
	} else {  //wrong password or email
		$message = "<div class='message-box-alarm'><span>Invalid Username or Password</span></div>";
	}
}
?>

<div id="body">
	<div class="container-title">
		<h3>Login</h3>
	</div>
	<div class="container-form">
		<form action="login.php" method="post">
			<div class="container">

				<label for="email"><b>Email</b></label>
				<input type="email" placeholder="Enter Email" name="email" required>

				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<button type="submit">Login</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
				<p class="text">Don't have an account? <a href="register.php">Register</a></p>
			</div>
		</form>
		<!-- user message -->
		<?php if ($message != "") {
			echo ($message);
		} ?>
	</div>
</div>

<?php
include "footer.php";
?>