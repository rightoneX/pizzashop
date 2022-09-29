<?php

include "session.php";
include "header.php";
include "menu.php";



if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}

if ($_REQUEST['id']) {

	$sql = "SELECT * FROM fooditems WHERE itemID = " . $_REQUEST['id'];

	$row = readData($sql);

	$id = $row['itemID'];
	$pizza = $row['pizza'];
	$description = $row['description'];
	$pizzatype =  $row['pizzatype'];
	$price = $row['price'];
} 

// receving updated data and record to the db
if (isset($_POST['pizza'])  //customer filled the required data
	&& isset($_POST['description'])
	&& isset($_POST['pizzatype'])
	&& isset($_POST['price'])) {

	$id =  $_POST['id'];
	$pizza =  $_POST['pizza'];
	$description =  $_POST['description'];
	$pizzatype = $_POST['pizzatype'];
	$price = $_POST['price'];

	$sql = "UPDATE fooditems SET pizza = '$pizza', description = '$description', pizzatype = '$pizzatype',
		 price = '$price' WHERE itemID = '$id'";

	if (recordEntry($sql)) { //all data entered correctly 
		$message = "<div class='message-box-done'><span>Product Updated</span></div>";
	} else { //wrong password
		$message = "<div class='message-box-alarm'><span>Could Not Update the Product Information</span></div>";
	}
}

?>

<div id="body">
	<div class="container-title">
		<h3>Product</h3>
	</div>
	<div class="container-form">
		<form action="admin_product_edit.php" method="post">
			<div class="container">
				<label for="id"><b>Product ID</b></label>
				<input type="text" placeholder="Product ID" value="<?php echo ($id) ?>" name="id" readonly>

				<label for="pizza"><b>Product Name</b></label>
				<input type="text" placeholder="Enter Name" value="<?php echo ($pizza) ?>" name="pizza" required>

				<label for="description"><b>Description</b></label>
				<input type="text" placeholder="Enter Description" value="<?php echo ($description) ?>" name="description" required>

				<label for="type"><b>Pizza Type</b></label>

				<select id="" name="pizzatype">
					<option value="S" <?php echo ($pizzatype == 'S' ? 'selected' : ''); ?>>Small</option>
					<option value="L" <?php echo ($pizzatype == 'L' ? 'selected' : ''); ?>>Large</option>
					<option value="V" <?php echo ($pizzatype == 'V' ? 'selected' : ''); ?>>Vegetarian</option>
				</select>

				<label for="price"><b>Price</b></label>
				<input type="number" min="1" step="any" placeholder="Enter Price" value="<?php echo ($price) ?>" name="price" required>
	
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