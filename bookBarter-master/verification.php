<?php

session_start();
//Assign the user entered credentials as session variables

if (isset($_POST['email'])) 
	{ 
		$_SESSION['email'] = $_POST['email'];
	} 

if (isset($_POST['password'])) 
	{ 
		$_SESSION['password'] = $_POST['password'];
	} 

$email = $_SESSION['email']; 	
$password = $_SESSION['password']; 	

if (isset($_POST['activationCode'])) 
	{
		$activationCode = $_POST ["activationCode"];
	}
 
// mySQL server parameters
$servername = "localhost";
$username = "root";
$password = "";
$db = "bookBarter";
 
$dbConnection2 = mysqli_connect($servername, $username, $password, $db);
 
$hashCodeUserInt = (int)$activationCode;
    
//select hash id from database
$sqlStmt = "SELECT HASH FROM student_details WHERE email='". $email. "'";
$result2 = mysqli_query($dbConnection2, $sqlStmt);
       
while ($row = $result2->fetch_assoc()) 
	{
   		$hashFormDB = $row['HASH']."<br>";
    	$hashFormDBint = (int)$hashFormDB;
    
    	if ($hashFormDBint == $hashCodeUserInt)
    		{
        		$verstat = "YES"; //status to update HASH to
           		$updateActivationInd = "UPDATE student_details SET verifiedInd = '". $verstat. "'" . "WHERE email='". $email. "'";
       
        		if ($dbConnection2->query($updateActivationInd) === TRUE) 
        			{
          				header("Location: homeRegisteration.php");
       	  				exit;  
       				} 
       			else 
       				{
    					echo "Error updating record: " . $dbConnection->error;
       				} 
    		}
	}        
?>