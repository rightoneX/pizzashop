<?php
include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}

//deleting customer 

if($_REQUEST['id']) {
   
    $sql = "DELETE FROM fooditems WHERE itemID = ".$_REQUEST['id'];

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // sql to delete a record
    if ($conn->query($sql) === TRUE) {
      header("Location: admin_products.php");
    } else {
      // echo "Error deleting record: " . $conn->error;

      echo "<div class='message-box-alarm'><span>Could Not Delete the Product as this product had been ordered by clients</span></div>";
      include "footer.php";
    }
    $conn->close();
    
}else {
    header("Location: index.php");
}

?>