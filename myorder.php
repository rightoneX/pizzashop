<?php

include "session.php";
include "header.php";
include "menu.php";

// if ($_SESSION['loggedin']) { //don not show this page if user is logged in already
// 	header("Location: index.php");
// }

$customerID = $_SESSION['customerID'];

$sql = "SELECT * FROM orders WHERE customerID = '".$customerID."'";

$orders = readData($sql); ///get list of orders

$orderID = $orders['orderID'];
$deliveryType = $orders['deliverytype'];
$description = $orders['description'];
$createTime = $orders['createtime'];
$deliveryTime = $orders['deliverytime'];

$sql = "SELECT * FROM orderlines WHERE orderID = '".$orderID."'";

//$orderlines = readData($sql); ///get list of orders

// $orderlineID = $orderlines['orderlineID'];
// $fooditemsID = $orderlines['fooditemsID'];
// $lineCreateTime = $orderlines['createtime'];

$sql = "SELECT * FROM orderlines WHERE orderID = '50'";

// Create connection
$ $conn = mysqli_connect("localhost", DBUSER, DBPASSWORD, DBDATABASE);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "id: ". $row['fooditemsID']."<br>";
		}
	} else {
	echo "0 results";
	}
}

$conn->close();



// if ($results) {
// 	$message = "Profile Updated"; //wrong password or email;

// 	foreach($results as $result) {
// 		echo $result['deliverytype'], '<br>';
// 	}
// }else 
// {
// 	$message = "Invelid Password Entred"; //wrong password
// }

?>
<div id="body">
	<div class="container-title">
		<h3>My order</h3>
	</div>
	<div class="container-form">
		<span class="message-alarm">
			<?php if ($message != "") {
				echo $message;
			} ?>
		</span>

		<form action="order.php" method="post">
			<div class="container">
				<label for="fname"><b>Order for (date & time)</b></label>
				<input type="text" placeholder="Enter First Name" value="<?php echo date('d-m-y h:i'); ?>" name="fname" required>

				<label for="extras"><b>Extras</b></label>
				<input type="text" placeholder="Enter Extras" name="extras">


				<button type="submit">Place Order</button>
			</div>
		</form>
	</div>
</div>

<?php
include "footer.php";
?>