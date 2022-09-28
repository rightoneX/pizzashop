<?php

include "session.php";
include "header.php";
include "menu.php";



if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}

if ($_REQUEST['id']) {

	$sql = "SELECT * FROM customer WHERE customerID = " . $_REQUEST['id'];

	$row = readData($sql);

	$id = $row['customerID'];
	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$phone =  $row['phone'];
	$email = $row['email'];
	$password = $row['password'];
	$permission = $row['permission'];
} 

// receving updated data and record to the db
if (isset($_POST['email'])  //customer filled the required data
	&& isset($_POST['fname'])
	&& isset($_POST['lname'])
	&& isset($_POST['phone'])
	&& isset($_POST['permission'])) {

	$id =  $_POST['id'];
	$fname =  $_POST['fname'];
	$lname =  $_POST['lname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$permission = $_POST['permission'];

	$sql = "UPDATE customer SET firstname = '$fname', lastname = '$lname',phone = '$phone',
		 email = '$email', password = '$password',  permission = '$permission'  WHERE customerID = '$id'";

	if (recordEntry($sql)) { //all data entered correctly 
		$message = "<div class='message-box-done'><span>Profile Updated</span></div>";
	} else { //wrong password
		$message = "<div class='message-box-alarm'><span>Could Not Update the Profile</span></div>";
	}
}

?>

<div id="body">
	<div class="container-title">
		<h3>Profile</h3>
	</div>
	<div class="container-form">
		<form action="admin_customer_edit.php" method="post">
			<div class="container">
				<label for="fname"><b>Customer ID</b></label>
				<input type="text" placeholder="Customer ID" value="<?php echo ($id) ?>" name="id" readonly>

				<label for="fname"><b>First Name</b></label>
				<input type="text" placeholder="Enter First Name" value="<?php echo ($fname) ?>" name="fname" required>

				<label for="lname"><b>Last Name</b></label>
				<input type="text" placeholder="Enter Last Name" value="<?php echo ($lname) ?>" name="lname" required>

				<label for="phone"><b>Phone</b></label>
				<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo ($phone) ?>" title="Please enter valid phone number" placeholder="000-000-0000" name="phone" require>

				<label for="email"><b>Email</b></label>
				<input type="email" placeholder="Enter Email" value="<?php echo ($email) ?>" name="email" required>

				<label for="psw"><b>Reset Password</b></label>
				<input type="password" placeholder="Enter Password" value="<?php echo ($password) ?>" name="password" required>

				<label for="phone"><b>Account Permission</b></label>

				<select id="" name="permission">
					<option value="admin" <?php echo ($permission == 'admin' ? 'selected' : ''); ?>>Admin</option>
					<option value="customer" <?php echo ($permission == 'customer' ? 'selected' : ''); ?>>Customer</option>
				</select>
				<button type="submit">Update</button>
			</div>
		</form>
		<?php if ($message != "") {
			echo ($message);
		} ?>
	</div>
</div>

<?php
include "footer.php";
?>