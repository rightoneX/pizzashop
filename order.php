<?php
include "header.php";
include "config.php";
include "session.php";

include "menu.php";
//----------- page content starts here

// if ($_SESSION['loggedin']) { //check if the email alrady in databasedate('d-m-y h:i')

	//build first selection option of items
	$conn = mysqli_connect("localhost", DBUSER, DBPASSWORD, DBDATABASE);
	$sql = "SELECT * FROM pizzashop.fooditems";
	$result = mysqli_query($conn, $sql);
	do {
		if ($row > 0) {
			$pizza .= "<option value='" . $row['itemID'] . "'>" . $row['pizza'] . "</option>";
		}
	} while ($row = mysqli_fetch_assoc($result));

	//check if the customer enter the data
	if (isset($_POST['datetime'])
		&& isset($_POST['phone']) //customer filled the required data
	) {

		$datatime = $_POST['datetime']; //when to get the order
		$extras = $_POST['extras'];     //additional items
		$phone = $_POST['phone'];       //contact phone  
		$deliverytype = 'p'; //$_POST['deliverytype'];                                              //ToDo
		$deliverytime = '2021-12-18 17:29:36'; //date('d-m-y h:i'); //$_POST['deliverytype'];       //ToDo

		//preparing data for record
		$sql = "INSERT INTO orders (customerID, deliverytype, createtime, deliverytime, description) 
				VALUES ('" . $_SESSION['customerID'] . "' ,'" . $deliverytype . "' ,'" . date('d-m-y h:i') . "','"
			. $deliverytime . "','" . $extras . "')";

		if (recordEntry($sql)) { //record the data to the database
			login($email, $password); //if data recorded, log in and redirect to order page
			header("Location: order.php");
		}

		//build the order lines of product
		$select_1 = $_POST['order 1']; // could be up to 10 pizzas


		// orderlines
		// 	orderlineID
		// 	orderID
		// 	fooditemsID
		// 	createtime

	}
	
	// $message = "Invelid Password Entred"; //wrong password

// } else {

// 	//please login before order
// }
?>

<div id="body">
	<div class="container-title">
		<h3>Place an order</h3>
	</div>
	<!-- sercive data to passing quantity of pizzas to js for building the selection options -->
	<article id="pizza-qty" data-qty="<?php echo (getCount('fooditems')); ?>"></article>

	<div class="container-form">
		<form action="order.php" method="post">
			<div class="container">
				<label for="datetime"><b>Order for (date & time)</b></label>
				<input type="text" placeholder="Enter the date and time" value="<?php echo date('d-m-y h:i'); ?>" name="datetime" required>

				<label for="extras"><b>Extras</b></label>
				<input type="text" placeholder="Enter Extras" name="extras">

				<label for="phone"><b>Phone</b></label>
				<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo ($phone) ?>" title="Please enter valid phone number" placeholder="000-000-0000" name="phone" required>
				<hr>
				<label for="pizza"><b>Pizza 1 for this order</b></label>
				<div class="select">
					<select id="standard-select" name="order 1">
						<?php
						echo ($pizza);
						?>
					</select>
					<div id="container" />
				</div>
				<span class="add-btn" onclick="addFields()">Add</span>
				<button type="submit">Place Order</button>
			</div>
		</form>
		<!-- user message -->
		<?php if ($message != "") {
			echo ($message);
		} ?>
	</div>
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
			select.name = "order " + count;

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