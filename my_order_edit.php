<?php
include "header.php";
include "config.php";
include "session.php";

include "menu.php";
//----------- page content starts here

if (!$_SESSION['loggedin']) { //redirect to the login page is the user is not loged in
	header("Location: login.php");
}

$orderID = $_REQUEST['id'];
$customerID = $_SESSION['customerID'];

if ($_REQUEST['id']) {
	$order = readData("SELECT * FROM orders WHERE orderID = '" . $_REQUEST['id'] . "'");
}

//get list of order items
$sql = "SELECT * FROM orderlines WHERE orderID = '" . $orderID . "'";
$order_items = readArray($sql);


//build first selection option of items
$conn = mysqli_connect("localhost", DBUSER, DBPASSWORD, DBDATABASE);
$sql = "SELECT * FROM pizzashop.fooditems";
$result = mysqli_query($conn, $sql);
do {
	if ($row > 0) {
		$pizza .= "<option value='" . $row['itemID'] . "'>" . $row['pizza'] . "</option>";
	}
} while ($row = mysqli_fetch_assoc($result));


// check if the customer enter the data
if (
	isset($_POST['datetime'])
	&& isset($_POST['phone']) //customer filled the required data
) {

	$datatime = $_POST['datetime']; //when to get the order
	$extras = $_POST['extras'];     //additional items
	$phone = $_POST['phone'];       //contact phone  
	$deliverytype = $_POST['deliverytype']; //$_POST['deliverytype'];                                              //ToDo
	$deliverytime = $_POST['datetime']; //'2021-12-18 17:29:36'; //date('d-m-y h:i'); //$_POST['deliverytype'];       //ToDo

	//update
	$sql = "UPDATE orders SET `deliverytype` = '$deliverytype', `deliverytime` = '$deliverytime', `description` = '$extras' WHERE (`orderID` = '$orderID')";

	updateData($sql);

	$message = "<div class='message-box-done'><span>Your order had been updated</span><br>
	You may check your orders<a href='my_order.php'> here</a></div>";
}
?>

<div id="body">
	<div class="container-title">
		<h3>Edit your order</h3>
	</div>
	<!-- sercive data to passing quantity of pizzas to js for building the selection options -->
	<article id="pizza-qty" data-qty="<?php echo (getCount('fooditems')); ?>"></article>

	<!-- user message -->
	<?php if ($message != "") {
		echo ($message . "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	} else { ?>

		<div class="container-form">
			<form action="my_order_edit.php?id=<?php echo $order['orderID'] ?>" method="post">
				<div class="container">
					<label for="datetime"><b>Order for (date & time)</b></label>
					<input type="datetime-local" placeholder="Enter delivery time" value="<?php echo $order['deliverytime']; ?>" name="datetime" required>

					<label for="extras"><b>Extras</b></label>
					<input type="text" placeholder="Enter Extras" name="extras" value="<?php echo $order['description']; ?>">

					<label for="phone"><b>Phone</b></label>
					<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $_SESSION['phone']; ?>" title="Please enter valid phone number" placeholder="000-000-0000" name="phone" required>

					<label for="phone"><b>Delivery Type</b></label>

					<select id="" name="deliverytype">
						<option value="p" <?php echo ($order['deliverytype'] == 'p' ? 'selected' : ''); ?>>Pickup</option>
						<option value="d" <?php echo ($order['deliverytype'] == 'd' ? 'selected' : ''); ?>>Delivery</option>
					</select>
					<hr>

					<label for="pizza"><b>Pizza 1 for this order</b></label>
					<div class="select">


						<?php foreach ($order_items as $order_item) {  ?>

							<select id="standard-select" name="order_1">
								<option value='<?php echo readItem($order_item['fooditemsID'])['itemID'] ?>'>PIZZA <?php echo readItem($order_item['fooditemsID'])['itemID'] ?></option>
								<?php
								echo ($pizza);
								?>
							</select>
							<div id="container" />


							<!-- <select id="container" name="order_2">	
							<option value='<?php echo readItem($order_item['fooditemsID'])['itemID'] ?>'>PIZZA <?php echo readItem($order_item['fooditemsID'])['itemID'] ?></option>
							<?php
							echo ($pizza);
							?>
						</select> -->

						<?php  }  ?>



					</div>

					<span class="add-btn" onclick="addFields()">Add</span>
					<button type="submit">Update Order</button>
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