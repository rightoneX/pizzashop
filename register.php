<?php

include "session.php";
include "header.php";
include "menu.php";

if ($_SESSION['loggedin']) { //check if the user is logedin
	header("Location: index.php");
}

if (
	isset($_POST['email'])
	&& isset($_POST['fname'])
	&& isset($_POST['lname'])
	&& isset($_POST['phone'])
	&& isset($_POST['password'])
) {

	$fname =  $_POST['fname'];
	$lname =  $_POST['lname'];
	$phone =  $_POST['phone'];
	$email = $_POST['email'];
	$password =  $_POST['password'];

	if (checkUser($email)) { //check if the email alrady in database
		$message = "The Email Already Registered"; //wrong password or email
	} else {

		$sql = "INSERT INTO customer (firstname, lastname, phone, email, password) 
		VALUES ('" . $fname . "' ,'" . $lname . "' ,'" . $phone . "','" . $email . "','" . $password . "')";

		if (recordEntry($sql)) {
			login($email, $password);
			header("Location: order.php");
		}
		// ToDo    check if entered data then login to order page

	}
}
?>

<div id="body">
<div class="container-title">
		<h3>Registration New Customer</h3>
	</div>
	<div class="container-form">
		<span class="message-alarm">
			<?php if ($message != "") {
				echo $message;
			} ?>
		</span>
		<form action="register.php" method="post">
			<div class="container">
				<label for="fname"><b>First Name</b></label>
				<input type="text" placeholder="Enter First Name" name="fname" required>

				<label for="lname"><b>Last Name</b></label>
				<input type="text" placeholder="Enter Last Name" name="lname" required>

				<label for="phone"><b>Phone</b></label>
				<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter valid phone number" placeholder="000-000-0000" name="phone" require>

				<label for="email"><b>Email</b></label>
				<input type="email" placeholder="Enter Email" name="email" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<button type="submit">Register</button>
				<p class="text">Already have an account? <a href="login.php">Login</a></p>
			</div>
		</form>
	</div>
</div>

<?php

include "footer.php";
?>