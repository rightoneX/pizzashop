<?php

include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}


$itemID = $_REQUEST['id'];

//get customer
$sql = "SELECT * FROM fooditems WHERE itemID = '" . $itemID . "'";

$row = readData($sql);

//display the message if no order had been found in the db
if (!$row) {
	$message = "No record had been found.";
} else {
	$message = null;
}
?>

<div id="content">
	<div class="container-title">
		<h3>Product Information</h3>
	</div>
	<?php if (!$row) { ?>

		<span class="message-alarm">
			<?php if ($message != "") {
				echo $message;
			} ?>
		</span>

	<?php } else { ?>

		<div class="order-table">
			<div class="order-row">
				<div class="order-item">ID</div>
				<div class="order-item">Name</div>
				<div class="order-item">Description</div>
				<div class="order-item">Type</div>
				<div class="order-item">Price</div>
				<div class="order-item-control"></div>
				<div class="order-item-control"></div>
			</div>

			<div class="order-row">
				<div class="order-item"><?php echo $row['itemID'] ?></div>
				<div class="order-item"><?php echo $row['pizza'] ?></div>
				<div class="order-item"><?php echo $row['description'] ?></div>
				<div class="order-item"><?php echo $row['pizzatype'] ?></div>
				<div class="order-item"><?php echo $row['price'] ?></div>
				<div class="order-item-control"><a href="admin_product_edit.php?id=<?php echo $row['itemID'] ?>">[Edit]</a></div>
				<div class="order-item-control">
					<a href="admin_product_delete.php?id=<?php echo $row['itemID'] ?>" onclick="return  confirm('Do you want to remove this product <?php echo $row['itemID'] ?> Y/N')">[Delete]</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<?php
include "footer.php";
?>