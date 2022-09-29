<?php

include "session.php";
include "header.php";
include "menu.php";



if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}

// receving data and record to the db
if (isset($_POST['pizza'])  //customer filled the required data
	&& isset($_POST['description'])
	&& isset($_POST['pizzatype'])
	&& isset($_POST['price'])) {

	$pizza =  $_POST['pizza'];
	$description =  $_POST['description'];
	$pizzatype = $_POST['pizzatype'];
	$price = $_POST['price'];

	$sql = "INSERT INTO fooditems (pizza, description, pizzatype, price) VALUES ('" . $pizza . "' ,'" . $description . "' ,'" . $pizzatype . "','" . $price . "')";

	if(recordEntry($sql)) { //record the data to the database
		$message = "<div class='message-box-done'><span>New product had been added</span></div>";
		header("Location: admin_products.php");
	} else {
		$message = "<div class='message-box-done'><span>Could Not create new product</span></div>";
	}
}
?>

<div id="body">
	<div class="container-title">
		<h3>New Product</h3>
	</div>
	<div class="container-form">
		<form action="admin_product_add.php" method="post">
			<div class="container">

				<label for="pizza"><b>Product Name</b></label>
				<input type="text" placeholder="Enter Name" value="" name="pizza" required>

				<label for="description"><b>Description</b></label>
				<input type="text" placeholder="Enter Description" value="" name="description" required>

				<label for="type"><b>Pizza Type</b></label>

				<select id="" name="pizzatype">
					<option value="S">Small</option>
					<option value="L">Large</option>
					<option value="V">Vegetarian</option>
				</select>

				<label for="price"><b>Price</b></label>
				<input type="number" min="1" step="any" placeholder="Enter Price" value="" name="price" required>

				<button type="submit">Create</button>
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