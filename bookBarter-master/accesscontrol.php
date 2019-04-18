<?php // accesscontrol.php
include_once 'common.php';
session_start();
$uid = isset($_POST['email']) ? $_POST['email'] : $_SESSION['email'];
$pwd = isset($_POST['password']) ? $_POST['password'] : $_SESSION['password'];
$sid = isset($_POST['studentID']) ? $_POST['studentID'] : $_SESSION['studentID'];
//If the email field is not filled.
if(!isset($uid)) {
  ?>
  
  <!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Please Log In for Access </title>
    <meta http-equiv="Content-Type"
      content="text/html; charset=iso-8859-1" />
      
  </head>
  <body>
  <h1> Login Required </h1>
  <p>You must log in to access this area of the site. If you are
     not a registered user, <a href="userRegisteration.php">click here</a>
     to register and create an account!</p>
     
     
  <p><form method="post" action="<?=$_SERVER['PHP_SELF']?>">
    Email: <input type="text" name="email" size="40" /><br />
    Password: <input type="password" name="password" SIZE="40" /><br />
    <input type="submit" value="LOG IN" />
    
  </form></p>
  </body>
  </html>
 
  <?php
  exit;
}
//Assign the user entered credentials as session variables
if (isset($uid)) 
{ 
$_SESSION['email'] = $uid;
} 
if (isset($pwd) )
{ 
$_SESSION['password'] = $pwd;
} 
if (isset($sid) )
{ 
$_SESSION['studentID'] = $sid;
} 

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


//MySQL session
// mySQL server parameters
$servername = "localhost";
$username = "root";
$password = "";
$db = "bookBarter";
 
// create the mySQL connection and connect to it. If connection fails print the error
 
      // $connection = new mysqli($servername, $username, $password, $db);
$dbConnection = mysqli_connect($servername, $username, $password, $db);
// Get the student details from the student_details table based on emaIl & password
$sql = "SELECT * FROM student_details WHERE
        email = '$uid' AND pass = '$pwd'";
             
$result = mysqli_query($dbConnection, $sql);
if (!$result) {
  error('A database error occurred while checking your '.
        'login details.\\nIf this error persists, please '.
        'contact BookBarter@gmail.com.');
}
//This means that the user is not found and hence unsetting the session variables assigned to the user
if (mysqli_num_rows($result) == 0) {
       unset($_SESSION['email']);
       unset($_SESSION['password']);
  ?>
  
  <!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Access Denied </title>
    <meta http-equiv="Content-Type"
      content="text/html; charset=iso-8859-1" />
  </head>
  <body>
  <h1> Access Denied </h1>
  <p>Your user ID or password is incorrect, or you are not a
     registered user on this site. To try logging in again, click
     <a href="<?=$_SERVER['PHP_SELF']?>">here</a>. To register for instant
     access, click <a href="userRegisteration.php">here</a>.</p>
  </body>
  </html>
  <?php
  exit;
}
//$username = mysql_result($result,0,'fullname');
?>