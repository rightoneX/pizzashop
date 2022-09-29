<?php

session_start(); // use function PHPSTORM_META\elementType;

include "config.php"; //get database settings

function logout()
{ //logout function
    unset($_SESSION['loggedin']);
    unset($_SESSION['customerID']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['phone']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['permission']);
    session_destroy();
    header("Location:index.php");
}

function login($email, $password)
{ //get user information and set the 'loggedin' status

    $sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['email'] === $email && $row['password'] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['customerID'] = $row['customerID'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['permission'] = $row['permission'];
    } else {
        $_SESSION['loggedin'] = false;
        $_SESSION['customerID'] = '';
        $_SESSION['firstname'] = '';
        $_SESSION['lastname'] = '';
        $_SESSION['phone'] = '';
        $_SESSION['email'] = '';
        $_SESSION['password'] = '';
        $_SESSION['permission'] = '';
    }
}

function checkUser($email)
{ //check if email already exist in the system

    $sql = "SELECT * FROM customer WHERE email='$email'";

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['email'] === $email) {
        return true; //email in the database
    } else {
        return false; //no email in database 
    }
}

function readUser($customerID)
{ //read data from database based on enquire 

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "SELECT * FROM customer WHERE customerID = '" . $customerID . "'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $conn->close();
        return $row;
    }
    $conn->close();
    return null;
}

function recordEntry($sql)
{  //enter data to the database

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

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

function readData($sql)
{ //read data from database based on enquire 

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $conn->close();
        return $row;
    }
    $conn->close();
    return null;
}

function updateData($sql)
{ //read data from database based on enquire 

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = mysqli_query($conn, $sql);
        $conn->close();
        return true;
    }
    $conn->close();
    return false;
}

function readItem($itemID)
{ //read data from database based on enquire 

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "SELECT * FROM fooditems WHERE itemID = '" . $itemID . "'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $conn->close();
        return $row;
    }
    $conn->close();
    return null;
}

function readArray($sql)
{ //read array data from database based on enquire 

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $rows[] = $row;
        }
        $conn->close();
        return $rows;
    }
    $conn->close();
    return null;
}

function getCount($db)
{

    $sql = "SELECT count(*) as total from " . $db . ";";
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($result);
        $data = mysqli_fetch_assoc($result);
        $conn->close();
        return $data['total'];
    }
    $conn->close();
    return 0;
}

