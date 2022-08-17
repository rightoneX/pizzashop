<?php

include "session.php";
include "header.php";
include "menu.php";

// if ($_SESSION['loggedin']) { //don not show this page if user is logged in already
// 	header("Location: index.php");
// }

$customerID = $_SESSION['customerID'];

$sql = "SELECT * FROM orders WHERE customerID = '".$customerID."'";

$results = readData($sql);

echo $results['deliverytype'];
echo $results['description'];
echo $results['createtime'];
echo $results['deliverytime'];
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