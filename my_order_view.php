<?php

include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin']) { //don not show this page if user is logged in already
	header("Location: index.php");
}

//deleting order by customer request

if ($_REQUEST['id']) {

	$customerID = $_SESSION['customerID'];

	$orderID = $_REQUEST['id'];

	$sql = "SELECT * FROM orderlines WHERE orderID = '" . $orderID . "'";

	$orders = readArray($sql);
}
//display the message if no order had been found in the db
if (!$orders) {
	$message = "You have no orders yet. Please order <a href ='order.php'>the Pizza</a>";
} else {
}

?>
<div id="content">
	<div class="container-title">
		<h3>Order Item List</h3>
	</div>
	<?php if (!$orders) { ?>

		<span class="message-alarm">
			<?php if ($message != "") {
				echo $message;
			} ?>
		</span>
<!-- $order['fooditemsID']  -->
	<?php } else { ?>
		<div class="order-table">
			<div class="order-row">
				<div class="order-item">Name</div>
				<div class="order-item-description">Description</div>
				<div class="order-item">Size</div>
				<div class="order-item">Price</div>
				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
			</div>
			<?php foreach ($orders as $order) {  ?>
				<div class="order-row">
					<div class="order-item"><?php echo readItem($order['fooditemsID'])['pizza']?></div>
					<div class="order-item-description"><?php echo readItem($order['fooditemsID'])['description']?></div>
					<div class="order-item"><?php echo (readItem($order['fooditemsID'])['pizzatype'] == "L" ? 'Large' : 'Small'); ?></div>
					<div class="order-item"><?php echo '$'.readItem($order['fooditemsID'])['price']?></div>
					<div class="order-item-control"><a href="">[View]</a></div>
					<div class="order-item-control"><a href="order_edit.php?id=<?php echo $order['orderID'] ?>">[Edit]</a></div>
					<div class="order-item-control">
						<a href="item_delete.php?id=<?php echo $orderID.'&item='.readItem($order['fooditemsID'])['itemID'] ?>" 
						onclick="return  confirm('Do you want to remove item <?php echo readItem($order['fooditemsID'])['itemID'] ?> from your Order Y/N')">[Remove]</a>
					</div>
				</div>
			<?php  }  ?>
		</div>

	<?php	} ?>

</div>


<?php
include "footer.php";
?>