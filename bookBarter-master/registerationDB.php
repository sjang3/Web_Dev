<?php
 
// get all variable data from the form in registeration.php
if (isset($_POST['FirseName'])) 
{ 
$firstName = $_POST["FirseName"];
}

if (isset($_POST['LastName'])) 
{
$lastName = $_POST["LastName"];
}

if (isset($_POST['Street'])) 
{
$street = $_POST["Street"];
}

if (isset($_POST['County'])) 
{
$county = $_POST["County"];
}

if (isset($_POST['State'])) 
{
$state = $_POST["State"];
}

if (isset($_POST['Zip'])) 
{
$zip = $_POST["Zip"];
}

if (isset($_POST['email'])) 
{
$email = $_POST["email"];
}

if (isset($_POST['passwordFiled'])) 
{
$UserPass = $_POST["passwordFiled"];
}

if (isset($_POST['phoneNumber'])) 
{
$phone = $_POST["phoneNumber"];
}

 
// mySQL server parameters
$servername = "localhost";
$username = "root";
$password = "";
$db = "bookBarter";
 
// create the mySQL connection and connect to it. If connection fails print the error
 
      // $connection = new mysqli($servername, $username, $password, $db);
$dbConnection = mysqli_connect($servername, $username, $password, $db);
 
//generate ahsh code that is going to be emailed to the user
       $hashCode = rand(10000,99999);
    
       //insert into registeration table querey
       $sqlStmt = "INSERT INTO student_details (first_name, last_name, street, city, state, zip, email, pass, phone, hash, verifiedInd)
VALUES ('$firstName', '$lastName', '$street', '$county', '$state', '$zip', '$email', '$UserPass', '$phone', '$hashCode', 'NO')";
      
      
if (mysqli_query($dbConnection, $sqlStmt)) {
//execute the email() function from sendEmail.php 
	include 'sendEmail.php';

    echo "Registeration Successful" . email($email, $firstName, $lastName,$hashCode);
} 

//include 'sendEmail.php';
//email($email, $firstName, $lastName,$hashCode);
      

             
?>