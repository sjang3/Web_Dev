<?php
//AJITH KEERIKKATTIL 4/19

//set up a session
session_start();

//Assign the user entered email as a session variable
if (isset($_POST['email'])) 
	{
    	$_SESSION['email'] = $_POST['email'];
	}

//Assign the user entered password as a session variable
if (isset($_POST['passwordField'])) 
	{
    	$_SESSION['password'] = $_POST['passwordField'];
	}

if (isset($_SESSION['email'])) 
	{
    	$loginEmail = $_SESSION['email'];
	}

if (isset($_SESSION['password'])) 
	{
    	$loginPassword = $_SESSION['password'];
	}
//execute the function
checkCredentials($loginEmail,$loginPassword);

//check the mySQL server for credentials match
function checkCredentials($loginEmail, $loginPassword)
	{
    	// mySQL server parameters
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "gamesfortotsDB";
    
    	$dbConnection = mysqli_connect($servername, $username, $password, $db);
    
		//get the password associated with the email
		$sql = "SELECT passwordFiled FROM customer WHERE email ='$loginEmail' LIMIT 1";

		$result = mysqli_query($dbConnection, $sql);

		while ($row = $result->fetch_assoc()) 
			{
    			$passFromDB   = $row['passwordFiled']; //password that is stored in the database

    			if (($loginPassword == $passFromDB)) 
    				{
    					echo 'Success';
        				//header("Location: homePostLogin.php");  //if credentials correct, open the homePostLogin page
        				exit;
    				}
    			else 
    				{
        				unset($_SESSION['email']);  //unset the session variable-email
        				unset($_SESSION['password']); //unset the session variable-password
        				echo 'Login Failed. Please try again!';
   					}
			}
	}
?>