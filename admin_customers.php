<?php

include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}

$adminID = $_SESSION['customerID'];

$sql = "SELECT * FROM customer";

$orders = readArray($sql);

//display the message if no order had been found in the db
if (!$orders) {
	$message = "No customers in the list.";
} else {
}

?>
<div id="content">
	<div class="container-title">
		<h3>List of Customers</h3>
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
				<div class="order-item">ID</div>
				<div class="order-item">First Name</div>
				<div class="order-item">Last Name</div>
				<div class="order-item">Phone</div>
				<div class="order-item">Email</div>
				<div class="order-item">Status</div>
				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
			</div>
			<?php foreach ($orders as $order) { ?>
				<?php if ($order['customerID'] != $adminID) { ?>
					<div class="order-row">
						<div class="order-item"><?php echo $order['customerID'] ?></div>
						<div class="order-item"><?php echo $order['firstname'] ?></div>
						<div class="order-item"><?php echo $order['lastname'] ?></div>
						<div class="order-item"><?php echo $order['phone'] ?></div>
						<div class="order-item"><?php echo $order['email'] ?></div>
						<div class="order-item"><?php echo $order['permission'] ?></div>
						<div class="order-item-control"><a href="admin_customer_view.php?id=<?php echo $order['customerID'] ?>">[View]</a></div>
						<div class="order-item-control"><a href="admin_customer_edit.php?id=<?php echo $order['customerID'] ?>">[Edit]</a></div>
						<div class="order-item-control">
							<a href="admin_customer_delete.php?id=<?php echo $order['customerID'] ?>" onclick="return  confirm('Do you want to cancel customer account <?php echo $order['customerID'] ?> Y/N')">[Delete]</a>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	<?php } ?>
</div>


<?php
include "footer.php";
?>