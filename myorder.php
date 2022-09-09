<?php

include "session.php";
include "header.php";
include "menu.php";

// if ($_SESSION['loggedin']) { //don not show this page if user is logged in already
// 	header("Location: index.php");
// }

$customerID = $_SESSION['customerID'];
//getting orders
$sql = "SELECT * FROM orders WHERE customerID = '" . $customerID . "'";

$orders = readData($sql); ///get list of orders




// $result = mysqli_query($connection, $command)

// if (!$result) { die("Query Failed."); }

// $array = $result->fetch_all();

// $result->free();

// mysqli_close($connection);


// $orders[] = mysqli_fetch_array($orders_array);

// $rows = [];
// while($row = mysqli_fetch_array($result))
// {
//     $rows[] = $row;
// }
// $orderID = $orders['orderID'];
// $deliveryType = $orders['deliverytype'];
// $description = $orders['description'];
// $createTime = $orders['createtime'];
// $deliveryTime = $orders['deliverytime'];

// echo '<pre>'; print_r($orders); echo '</pre>';

// echo ($orders['deliverytype']);



// $sql = "SELECT * FROM orderlines WHERE orderID = '".$orderID."'";

//$orderlines = readData($sql); ///get list of orders

// $orderlineID = $orderlines['orderlineID'];
// $fooditemsID = $orderlines['fooditemsID'];
// $lineCreateTime = $orderlines['createtime'];

// $sql = "SELECT * FROM orderlines WHERE orderID = '50'";

// Create connection
// $ $conn = mysqli_connect("localhost", DBUSER, DBPASSWORD, DBDATABASE);

// if ($conn->connect_error) {
// 	die("Connection failed: " . $conn->connect_error);
// } else {
// 	$result = mysqli_query($conn, $sql);

// 	if (mysqli_num_rows($result) > 0) {
// 	// output data of each row
// 		while($row = mysqli_fetch_assoc($result)) {
// 			echo "id: ". $row['fooditemsID']."<br>";
// 		}
// 	} else {
// 	echo "0 results";
// 	}
// }

// $conn->close();



// if ($orders == "") {
// 	$message = "You have no orders yet";
// } else {
// }

?>
<div id="body">
	<div class="container-title">
		<h3>My order</h3>
	</div>
	<!-- <div class="container-form"> -->
	<span class="message-alarm">
		<?php if ($message != "") {
			echo $message;
		} ?>
	</span>
	<div class="order-table">
		<div class="order-row">
			<div class="order-item">Your ID</div>
			<div class="order-item">Order ID</div>
			<div class="order-item">Create Time</div>
			<div class="order-item">Delivery Type</div>
			<div class="order-item">Delivery Time</div>
			<div class="order-item">Description</div>
			<div class="order-item"></div>
			<div class="order-item"></div>
			<div class="order-item"></div>
		</div>
		<?php  foreach ($orders as $order) {  ?>
			<div class="order-row">
				<div class="order-item"><?php echo $customerID ?></div>
				<div class="order-item"><?php echo $order['orderID']?></div>
				<div class="order-item"><?php echo $order['createtime'] ?></div>
				<div class="order-item"><?php if ($order['deliverytype'] == "d") {
											echo "Delivery";
										} else {
											echo "Pickup";
										} ?></div>
				<div class="order-item"><?php echo $order['deliverytime'] ?></div>
				<div class="order-item"><?php echo $order['description'] ?></div>
				<div class="order-item"><a href="">[View]</a></div>
				<div class="order-item"><a href="">[Edit]</a></div>
				<div class="order-item"><a href="">[Delete]</a></div>
			</div>
		<?php  }  ?>
	</div>
</div>

<?php
include "footer.php";
?>