<?php // accesscontrol.php
include_once 'common.php';

session_start();

//Assign the user entered credentials as session variables

if (isset($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
}

if (isset($_POST['password'])) {
    $_SESSION['password'] = $_POST['password'];
}

$_SESSION['studentID'] = '';



getStudentIDfromEmail();


function getStudentIDfromEmail()
{
    
    //mySQL parameters
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "bookBarter";
    
    //set the connection
    $dbConnection = mysqli_connect($server, $username, $password, $database);
    
    
    $stdIDfromDB = "SELECT student_id FROM student_details WHERE email='" . $_SESSION['email'] . "'";
    
    //execute the query and assign the result
    $result = mysqli_query($dbConnection, $stdIDfromDB);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['studentID'] = $row['student_id'];
            // echo  $_SESSION['studentID'];
        }
        mysqli_free_result($result);
        mysqli_close($dbConnection);
    }
}

?>

    <?php

//MySQL session
// mySQL server parameters
$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "bookBarter";

// create the mySQL connection and connect to it. If connection fails print the error

// $connection = new mysqli($servername, $username, $password, $db);
$dbConnection = mysqli_connect($servername, $username, $password, $db);

if (isset($_SESSION['email'])) {
    $uid = $_SESSION['email'];
}

if (isset($_SESSION['password'])) {
    $pwd = $_SESSION['password'];
}

// Get the student details from the student_details table based on emaIl & password
$sql = "SELECT pass, verifiedInd FromDB FROM student_details WHERE
        email = '$uid' LIMIT 1";

$result = mysqli_query($dbConnection, $sql);

while ($row = $result->fetch_assoc()) {
    $passFromDB   = $row['pass'];
    $verIndFromDB = (string) $row['verifiedInd'];
    $verInd       = (string) 'YES';
    
    if (($verIndFromDB == $verIndFromDB) && ($pwd == $passFromDB)) {
        header("Location: homeLogin.php");
        exit;
    }
    
    else {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['studentID']);
        error('Login Failed');
    }
    
}
?>
   
  </body>
  </html>