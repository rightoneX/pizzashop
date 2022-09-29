<?php

include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}


$sql = "SELECT * FROM orders";

$orders = readArray($sql);

//display the message if no order had been found in the db
if (!$orders) {
	$message = "No orders had been found yet";
} else {
}

?>
<div id="content">
	<div class="container-title">
		<h3>My order</h3>
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
				<div class="order-item">First Name</div>
				<div class="order-item">Last Name</div>
				<div class="order-item">Phone</div>
				<div class="order-item">Order ID</div>
				<div class="order-item">Order Time</div>
				<div class="order-item">Delivery Type</div>
				<div class="order-item">Delivery Time</div>
				<div class="order-item-description">Extras</div>
				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
			</div>
			<?php foreach ($orders as $order) {  ?>
				<div class="order-row">
					<div class="order-item"><a href="admin_customer_view.php?id=<?php echo $order['customerID'] ?>">
						<?php echo readUser($order['customerID'])['firstname']?></a></div>
					<div class="order-item"><a href="admin_customer_view.php?id=<?php echo $order['customerID'] ?>">
						<?php echo readUser($order['customerID'])['lastname']?></a></div>
					<div class="order-item"><?php echo readUser($order['customerID'])['phone']?></div>
					<div class="order-item"><?php echo $order['orderID'] ?></div>					
					<div class="order-item"><?php echo $order['createtime'] ?></div>
					<div class="order-item"><?php echo ($order['deliverytype'] == "d" ? 'Delivery' : 'Pickup'); ?></div>
					<div class="order-item"><?php echo $order['deliverytime'] ?></div>
					<div class="order-item-description"><?php echo $order['description'] ?></div>
					<div class="order-item-control"><a href="admin_order_view.php?id=<?php echo $order['orderID'] ?>">[View]</a></div>
					<div class="order-item-control"><a href="admin_order_edit.php?id=<?php echo $order['orderID'] ?>">[Edit]</a></div>
					<div class="order-item-control">
						<a href="admin_order_delete.php?id=<?php echo $order['orderID'] ?>" onclick="return  confirm('Do you want to cancel this <?php echo $order['orderID'] ?> Order Y/N')">[Cancel]</a>
					</div>
				</div>
			<?php  }  ?>
		</div>

	<?php	} ?>

</div>


<?php
include "footer.php";
?>