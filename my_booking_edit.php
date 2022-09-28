<?php
include "header.php";
include "config.php";
include "session.php";

include "menu.php";
//----------- page content starts here

if (!$_SESSION['loggedin']) { //redirect to the login page if the user is not loged in
	header("Location: login.php");
}

$bookingID = $_REQUEST['id'];


//get booking
$sql = "SELECT * FROM booking WHERE bookingID = '" . $bookingID . "'";
$order = readData($sql);

// check if the customer enter the data
if (isset($_POST['bookingdate'])
	&& isset($_POST['telephone'])
	&& isset($_POST['people'])) {//customer filled the required data

	$bookingdate = $_POST['bookingdate']; 
	$phone = $_POST['telephone'];    
	$people = $_POST['people'];    

	//update
	$sql = "UPDATE booking SET `telephone` = '$phone', `bookingdate` = '$bookingdate', `people` = '$people' WHERE (`bookingID` = '$bookingID')";

	updateData($sql);

	$message = "<div class='message-box-done'><span>Your booking had been updated</span><br>
	You may check your booking<a href='my_booking.php'> here</a></div>";
}
?>

<div id="body">
	<div class="container-title">
		<h3>Edit your booking</h3>
	</div>
	<!-- user message -->
	<?php if ($message != "") {
		echo ($message . "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	} else { ?>

		<div class="container-form">
			<form action="my_booking_edit.php?id=<?php echo $bookingID ?>" method="post">
				<div class="container">
					<label for="datetime"><b>Booking (date & time)</b></label>
					<input type="datetime-local" placeholder="Enter Booking Time" value="<?php echo $order['bookingdate']; ?>" name="bookingdate" required>

					<label for="phone"><b>Phone</b></label>
					<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $order['telephone']; ?>" title="Please enter valid phone number" placeholder="000-000-0000" name="telephone" required>

					<label for="number"><b>Quantity of People</b></label>
					<input type="number" placeholder="1" value="<?php echo $order['people']; ?>" name="people" required>

					<button type="submit">Update Booking</button>
				</div>
			</form>
		</div>

	<?php } ?>

</div>

<script>
	var count = 1;

	function addFields() {
		var number = document.getElementById("standard-select").value;
		var container = document.getElementById("container");
		var pizza_gty_db = document.querySelector('#pizza-qty');
		var pizza_qty = pizza_gty_db.dataset.qty;

		if (count < 10) { //limit for order pizzas
			count++;
			container.appendChild(document.createTextNode("Pizza " + count + " for this order "));
			// Create an <select> element,
			var select = document.createElement("select");
			select.type = "select";
			select.name = "order_" + count;

			//get pizzaz quantity and build options
			for (var i = 1; i <= pizza_qty; i++) {
				var opt = document.createElement('option');
				opt.value = i;
				opt.innerHTML = "PIZZA " + i;
				select.appendChild(opt);
			}
			container.appendChild(select);
		}
	}
</script>

<?php
include "footer.php";
?>