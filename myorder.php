<?php

include "session.php";
include "header.php";
include "menu.php";

if($_SESSION['loggedin']){ //user logedin

	$id = $_SESSION['customerID'];  
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$email = $_SESSION['email'];  
	$password = $_SESSION['password'];  
	} else {
		header("Location: index.php"); //user is not logedin
	}
	  
if (isset($_POST['email'])  //customer filled the required data
	&& isset($_POST['fname'])
	&& isset($_POST['lname'])){

    if($password == $_POST['password']) { //check if password entered correctly

		$fname =  $_POST['fname'];
		$lname =  $_POST['lname'];
		$email = $_POST['email'];
		$password =  $_POST['password'];

		$sql = "UPDATE customer SET firstname = '$fname', lastname = '$lname', email = '$email', password = '$password'  WHERE customerID = '$id'";
		
		if(recordEntry($sql)){
			$message = "Profile Updated"; //wrong password or email;
		}
	} else {		
		$message = "Invelid Password Entred"; //wrong password
	}
}
?>
<div id="body">
<div class="container-title">
		<h3>My Order</h3>
	</div>
	<div class="container-form">
		<span class="message-alarm">
			<?php if ($message != "") {
				echo $message;
			} ?>
		</span>
		<form action="profile.php" method="post">
			<div class="container">
				<label for="fname"><b>First Name</b></label>
				<input type="text" placeholder="Enter First Name" 
				value="<?php echo ($fname) ?>"
				name="fname" required>

				<label for="lname"><b>Last Name</b></label>
				<input type="text" placeholder="Enter Last Name"
				value="<?php echo ($lname) ?>"
				name="lname" required>

				<label for="email"><b>Email</b></label>
				<input type="email" placeholder="Enter Email"
				value="<?php echo ($email) ?>"			
				name="email" required>

				<label for="psw"><b>Enter Current Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<button type="submit">Update</button>

			</div>
		</form>
	</div>
</div>

<?php 
include "footer.php";
?>