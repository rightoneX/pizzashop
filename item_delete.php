<?php
include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin']) { //don not show this page if user is logged in already
	header("Location: index.php");
}

//deleting order by customer request
$orderID = $_REQUEST['id'];
$itemID = $_REQUEST['item'];

if($_REQUEST['id']) {
   
    $sql = "DELETE FROM orderlines WHERE orderID = '".$orderID."' AND fooditemsID = '".$itemID."'";

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // sql to delete a record
    if ($conn->query($sql) === TRUE) {
      header("Location: my_order_view.php?id=".$orderID);
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
    
}
?>