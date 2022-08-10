<?php

include "session.php";
include "header.php";
include "menu.php";

if ($_SESSION['loggedin']) { //check if the user is logedin
	header("Location: index.php");
}


if (isset($_POST['email']) && isset($_POST['password'])) {

	$email = $_POST['email'];
	$password =  $_POST['password'];

	login($email, $password);  //check if the user in the database with right password

	if ($_SESSION['loggedin']) {  //user is logged in
		header("Location: index.php");
	} else {
		$message = "Invalid Username or Password"; //wrong password or email
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
				<?php if ($message != "") {			
					echo ("<div class='message-box'>");
					echo ("<span>".$message."</span>");
					echo ("</div>");
				} ?>		
	</div>
</div>

<?php

include "footer.php";
?>