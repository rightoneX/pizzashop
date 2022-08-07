<?php

include "session.php";
include "header.php";
include "menu.php";

if ($_SESSION['loggedin']) { //user logedin

	$id = $_SESSION['customerID'];
	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$phone =  $_SESSION['phone'];
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
} else {
	header("Location: index.php"); //user is not logedin
}

if (
	isset($_POST['email'])  //customer filled the required data
	&& isset($_POST['fname'])
	&& isset($_POST['lname'])
	&& isset($_POST['phone'])
) {

	if ($password == $_POST['password']) { //check if password entered correctly

		$fname =  $_POST['fname'];
		$lname =  $_POST['lname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password =  $_POST['password'];

		$sql = "UPDATE customer SET firstname = '$fname', lastname = '$lname',phone = '$phone',
		 email = '$email', password = '$password'  WHERE customerID = '$id'";

		if (recordEntry($sql)) {
			$message = "Profile Updated"; //wrong password or email;
		}
	} else {
		$message = "Invelid Password Entred"; //wrong password
	}
}
?>
<div id="body">
	<div class="container-title">
		<h3>Place an order</h3>
	</div>
	<div class="container-form">
		<span class="message-alarm">
			<?php if ($message != "") {
				echo $message;
			} ?>
		</span>
		<form action="order.php" method="post">
			<div class="container">
				<label for="fname"><b>Order for (date & time)</b></label>
				<input type="text" placeholder="Enter First Name" value="<?php echo date('d-m-y h:i'); ?>" name="fname" required>

				<label for="extras"><b>Extras</b></label>
				<input type="text" placeholder="Enter Last Name" name="extras">

				<label for="phone"><b>Phone</b></label>
				<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo ($phone) ?>" title="Please enter valid phone number" placeholder="000-000-0000" name="phone" require>
				<hr>
				<label for="pizza"><b>Pizzas for this order</b></label>			
				<div class="select">
					<select id="standard-select">
						
					<?php   
					$conn = mysqli_connect( "localhost" ,DBUSER ,DBPASSWORD, DBDATABASE);
					// $result = mysqli_query($conn, $sql);
					// $row = mysqli_fetch_assoc($result);

					$sql = "SELECT * FROM pizzashop.fooditems";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value='".$row['itemID']."'>".$row['pizza']."</option>";
					}
					
					?>
						<!-- <option value="Option 1">Option 1</option>
						<option value="Option 2">Option 2</option>
						<option value="Option 3">Option 3</option>
						<option value="Option 4">Option 4</option>
						<option value="Option 5">Option 5</option>
						<option value="Option length">
						Option that has too long of a value to fit
						</option> -->
					</select>
				</div>







				<button type="submit">Place Order</button>

			</div>
		</form>
	</div>
</div>




<?php
include "footer.php";
?>