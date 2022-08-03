<?php

use function PHPSTORM_META\elementType;

session_start();

include "config.php";


function isAdmin() {
 if (($_SESSION['loggedin'] == 1) and ($_SESSION['userid'] == 1)) 
     return TRUE;
 else 
     return FALSE;
}

//function to check if the user is logged else send to the login page 
// function checkUser() {
// return true;
//     $_SESSION['URI'] = '';    
//     if ($_SESSION['loggedin'] == 1)
//        return TRUE;
//     else {
//        $_SESSION['URI'] = 'http://localhost'.$_SERVER['REQUEST_URI']; //save current url for redirect     
//        header('Location: http://localhost/login.php', true, 303);       
//     }       
// }

//just to show we are are logged in
function loginStatus() {
    $un = $_SESSION['username'];
    if ($_SESSION['loggedin'] == 1)     
        echo "<h1>Logged in as $un</h1>";
    else
        if ($un != '') {
            echo "<h1>Logged out</h1>";            
            $_SESSION['username'] = '';
        }    
}


//simple logout function
function logout(){
    unset($_SESSION['loggedin']);
    unset($_SESSION['customerID']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['email']);
    session_destroy();
    header("Location:index.php"); 
}

function login ($email, $password){

    $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";

    $conn = mysqli_connect( "localhost" ,DBUSER ,DBPASSWORD, DBDATABASE);
    $result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    if ($row['email'] === $email && $row['password'] === $password) {

        $_SESSION['loggedin'] = true;     
        $_SESSION['customerID'] = $row['customerID'];  
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];  
    } else {

        $_SESSION['loggedin'] = false;     
        $_SESSION['customerID'] = '';  
        $_SESSION['firstname'] = '';
        $_SESSION['lastname'] = '';
        $_SESSION['email'] = '';  
    }
}

function checkUser($email) {

    $sql = "SELECT * FROM customer WHERE email='$email'";

    $conn = mysqli_connect( "localhost" ,DBUSER ,DBPASSWORD, DBDATABASE);
    $result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    if ($row['email'] === $email ) {   
        return true;   //email in the database
    }else {
       return false; //no email in database 
    }
}

function recordEntry($sql){
    
    $conn = mysqli_connect( "localhost" ,DBUSER ,DBPASSWORD, DBDATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);       
      }

      if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        return true;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
      }
      
      $conn->close();
}
?>