<?php

include "session.php";
include "header.php";
include "menu.php";


$conn = mysqli_connect("localhost", DBUSER, DBPASSWORD, DBDATABASE);
$sql = "SELECT * FROM pizzashop.fooditems";
$result = mysqli_query($conn, $sql);
$pizza_count = mysqli_fetch_assoc($result);
$pizza = "";

//ToDo  get qty of pizzas and pass it to article

// $result=mysql_query("SELECT count(*) as total from Students");
// $data=mysql_fetch_assoc($result);
// echo $data['total']
do {
	if ($row != '') {
		$pizza .= "<option value='" . $row['itemID'] . "'>" . $row['pizza'] . "</option>";
	}
} while ($row = mysqli_fetch_assoc($result));



// if ($_SESSION['loggedin']) { //user logedin

// 	$id = $_SESSION['customerID'];
// 	$fname = $_SESSION['firstname'];
// 	$lname = $_SESSION['lastname'];
// 	$phone = $_SESSION['phone'];
// 	$email = $_SESSION['email'];
// 	$password = $_SESSION['password'];
// } else {
// 	header("Location: index.php"); //user is not logedin
// }

if (
	isset($_POST['email']) //customer filled the required data
	&& isset($_POST['fname'])
	&& isset($_POST['lname'])
	&& isset($_POST['phone'])
) {

	if ($password == $_POST['password']) { //check if password entered correctly

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "UPDATE customer SET firstname = '$fname', lastname = '$lname',phone = '$phone',
email = '$email', password = '$password' WHERE customerID = '$id'";

		if (recordEntry($sql)) {
			$message = "Profile Updated"; //wrong password or email;
		}
	} else {
		$message = "Invelid Password Entred"; //wrong password
	}
}
?>
<div id="body">
	<div class="container-title">
		<h3>Place an order</h3>
	</div>

	<article id="pizza-qty" data-qty="<?php echo ("4");?>"></article>

	<div class="container-form">
		<form action="order.php" method="post">
			<div class="container">
				<label for="fname"><b>Order for (date & time)</b></label>
				<input type="text" placeholder="Enter First Name" value="<?php echo date('d-m-y h:i'); ?>" name="fname" required>

				<label for="extras"><b>Extras</b></label>
				<input type="text" placeholder="Enter Extras" name="extras">

				<label for="phone"><b>Phone</b></label>
				<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo ($phone) ?>" title="Please enter valid phone number" placeholder="000-000-0000" name="phone" require>
				<hr>
				<label for="pizza"><b>Pizza 1 for this order</b></label>
				<div class="select" >
					<select id="standard-select" name="order 1">
						<?php
							echo ($pizza);
						?>
					</select>

					<div id="container" />
				</div>

				<span class="add-btn" onclick="addFields()">Add</span>
				<!-- <a id="add-btn" href="#">Add</a> -->

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

		count++;
		container.appendChild(document.createTextNode("Pizza " + count + " for this order "));
		// Create an <select> element,
		var select = document.createElement("select");
		select.type = "select";
		select.name = "order " + count;

	    var pizza_gty_db = document.querySelector('#pizza-qty');
		var pizza_qty = pizza_gty_db.dataset.qty;


		//get pizzaz quantity and build options
		for (var i = 1; i <= pizza_qty; i++) {
			var opt = document.createElement('option');
			opt.value = i;
			opt.innerHTML = "PIZZA " + i;
			select.appendChild(opt);
		}
		container.appendChild(select);



	}
</script>

<?php
include "footer.php";
?>