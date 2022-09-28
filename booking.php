<?php
include "header.php";
include "config.php";
include "session.php";

include "menu.php";
//----------- page content starts here

if (!$_SESSION['loggedin']) { //redirect to the login page is the user is not loged in
	header("Location: login.php");
}

if (
	isset($_POST['bookingdate'])
	&& isset($_POST['phone'])
) { //customer filled the required data

	$customerID = $_SESSION['customerID'];
	$phone = $_POST['phone'];
	$bookingdate = $_POST['bookingdate'];   //date('d-m-y h:i')
	$people = $_POST['people'];

	//preparing data for record
	$sql = "INSERT INTO booking (customerID, telephone, bookingdate, people) 
				VALUES ('" . $customerID . "' ,'" . $phone  . "' ,'" . $bookingdate . "','" . $people . "')";


	recordEntry($sql);

	$message = "<div class='message-box-done'><span>Your booking had been plased</span><br>
	 You may check your bookings<a href='my_booking.php'> here</a> or place <a href='booking.php'>new booking</a></div>";
}
?>

<div id="body">
	<div class="container-title">
		<h3>Place a Booking</h3>
	</div>
	<!-- user message -->
	<?php if ($message != "") {
		echo ($message);
	} else { ?>
		<div class="container-form">
			<form action="booking.php" method="post">
				<div class="container">
					<label for="datetime"><b>Booking (date & time)</b></label>
					<input type="datetime-local" placeholder="Enter Booking Time" value="<?php echo date('d-m-y h:i'); ?>" name="bookingdate" required>

					<label for="phone"><b>Phone</b></label>
					<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo ($phone) ?>" title="Please enter valid phone number" placeholder="000-000-0000" name="phone" required>


					<label for="number"><b>Quantity of People</b></label>
					<input type="number" placeholder="1" value="<?php echo ($people); ?>" name="people" required>


					<button type="submit">Place Booking</button>
				</div>
			</form>
		</div>
	<?php } ?>
</div>

<?php
include "footer.php";
?>