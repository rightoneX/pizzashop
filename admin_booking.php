<?php

include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}


$sql = "SELECT * FROM booking";

$orders = readArray($sql);

//display the message if no order had been found in the db
if (!$orders) {
	$message = "No booking yet.";
} else {
}

?>
<div id="content">
	<div class="container-title">
		<h3>Customer booking list</h3>
	</div>
	<?php if (!$orders) { ?>

		<span class="message-alarm">
			<?php if ($message != "") {
				echo $message;
			} ?>
		</span>

	<?php } else { ?>

		<div class="order-table">
			<div class="order-row">
				<div class="order-item">Customer ID</div>
				<div class="order-item">Booking ID</div>
				<div class="order-item">Phone Number</div>
				<div class="order-item">Date</div>
				<div class="order-item">People Qty</div>

				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
			</div>
			<?php foreach ($orders as $order) {  ?>
				<div class="order-row">
					<div class="order-item"><a href="admin_customer_view.php?id=<?php echo $order['customerID'] ?>"> <?php echo $order['customerID'] ?></a></div>
					<div class="order-item"><?php echo $order['bookingID'] ?></div>
					<div class="order-item"><?php echo $order['telephone'] ?></div>
					<div class="order-item"><?php echo $order['bookingdate'] ?></div>
					<div class="order-item"><?php echo $order['people'] ?></div>

					<div class="order-item-control"><a href="my_booking_edit.php?id=<?php echo $order['bookingID'] ?>">[Edit]</a></div>
					<div class="order-item-control">
						<a href="my_booking_delete.php?id=<?php echo $order['bookingID'] ?>" onclick="return  confirm('Do you want to cancel your <?php echo $order['bookingID'] ?> Booking Y/N')">[Cancel]</a>
					</div>
				</div>
			<?php  }  ?>
		</div>

	<?php	} ?>

</div>


<?php
include "footer.php";
?>