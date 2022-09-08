<?php
include "header.php";
include "config.php";
include "session.php";

include "menu.php";
//----------- page content starts here

?>
<div id="body">
	<div class="header">
		<div>
			<h1>Selected Pizzas</h1>
		</div>
	</div>


	<?php
	if ($_SESSION['loggedin']) {
		echo "<div class='order-pizza-link'>
				<a href='order.php'>Order the Pizza</p>
			 </div>";
	} else {
		echo "<div class='order-pizza-link'>
				<p>Please, log in to <a href='login.php'>Order</h3> the Pizza</p>
			 </div>";
	}
	?>






	<div>
		<ul>
			<li>
				<h1>All Time Classic</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget lacinia sem. Quisque a libero semper.</p>
			</li>
			<li>
				<img src="images/pizza1.jpg" alt="">
				<h2>Pizza 1</h2>
			</li>
			<li>
				<img src="images/pizza2.jpg" alt="">
				<h2>Pizza 2</h2>
			</li>
			<li>
				<img src="images/pizza3.jpg" alt="">
				<h2>Pizza 3</h2>
			</li>
		</ul>
		<ul>
			<li>
				<h1>Specials</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget lacinia sem. Quisque a libero semper.</p>
			</li>
			<li>
				<img src="images/pizza4.jpg" alt="">
				<h2>Pizza 4</h2>
			</li>
			<li>
				<img src="images/pizza5.jpg" alt="">
				<h2>Pizza 5</h2>
			</li>
			<li>
				<img src="images/pizza6.jpg" alt="">
				<h2>Pizza 6</h2>
			</li>
		</ul>
		<ul>
			<li>
				<h1>Meat lovers</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget lacinia sem. Quisque a libero semper.</p>
			</li>
			<li>
				<img src="images/pizza7.jpg" alt="">
				<h2>Pizza 7</h2>
			</li>
			<li>
				<img src="images/pizza8.jpg" alt="">
				<h2>Pizza 8</h2>
			</li>
			<li>
				<img src="images/pizza9.jpg" alt="">
				<h2>Pizza 9</h2>
			</li>
		</ul>
	</div>
</div>
<?php
include "footer.php";
?>