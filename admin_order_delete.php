<?php
include "session.php";
include "header.php";
include "menu.php";

if (!$_SESSION['loggedin'] && $_SESSION['permission'] != 'admin') { //don not show this page if user is logged and does not have admin rights
	header("Location: index.php");
}


//deleting order by customer request

if($_REQUEST['id']) {
   
    $sql = "DELETE FROM orders WHERE orderID = ".$_REQUEST['id'];

    // $result = readData($sql);

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // sql to delete a record
    if ($conn->query($sql) === TRUE) {
      header("Location: admin_orders.php");
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
    
}else {
    header("Location: index.php");
}
?>