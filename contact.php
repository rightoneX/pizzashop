<?php
include "header.php";
include "config.php";
include "session.php";

include "menu.php";
//----------- page content starts here

if (
	isset($_POST['name']) &&
	isset($_POST['email']) &&
	isset($_POST['subject']) &&
	isset($_POST['message'])) {
		
	$name =  $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message_body = $_POST['message'];

	$to = "enquiry@pizzashop.co.nz"; // compnay email 
	$headers = "From:$email \r\n";
	$headers .= "Reply-To: $visitor_email \r\n";

	mail($to, $subject, $message_body, $headers);

	$message = "<div class='message-box-done'><span>You Mail Sent." . $first_name . ", we will contact you shortly.<br>
	Thank you</span></div>";
}
?>
<div id="body" class="contact">
	<div class="header">
		<div>
			<h1>Contact</h1>
		</div>
	</div>
	<div class="body">
		<div>
			<div>
				<img src="images/check-in.png" alt="">
				<h1>Waipukurau Corner Pizzeria, 1 Main Street,Waipukurau, 4000</h1>
				<p>If you're having problems editing this website template, then don't hesitate to ask for help on the Forums.</p>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="contact">
			<h1>INQUIRY FORM</h1>
			<form action="contact.php" method="POST">
				<input type="text" name="name" placeholder="Your Name" required>
				<input type="email" name="email" placeholder="Your Email" required>
				<input type="text" name="subject" placeholder="Subject" required>
				<textarea name="message" cols="50" rows="7" placeholder="Share your thoughts" required></textarea>
				<input type="submit" value="submit" id="submit">
			</form>
			<div></div>
			<?php if ($message != "") {
				echo ($message);
			} ?>
		</div>
		<div class="section">
			<h1>WE’D LOVE TO HEAR FROM YOU.</h1>
			<p>If you're having problems finding us, then don't hesitate to ask for help on Facebook.</p>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>