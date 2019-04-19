<?php
	
	//PHP code to fetch customer data from the registeration.html page and add it to the mySQL database
	if (isset($_POST['FirstName'])) 
		{
			$fName = $_POST['FirstName']; //get first name
		}
	
	if (isset($_POST['LastName'])) 
		{
			$lName = $_POST['LastName']; //get last name
		}
		
	if (isset($_POST['Age'])) 
		{
			$age = $_POST['Age']; //get age
		}
	
	if (isset($_POST['email'])) 
		{
			$email = $_POST['email']; //get email
		}
	
	if (isset($_POST['passwordField'])) 
		{
			$pass = $_POST['passwordField']; //get password
		}
		
	if (isset($_POST['phoneNumber'])) 
		{
			$phoneNumber = $_POST['phoneNumber']; //get phone number
		}
		
  	//execute the function;
  	addCustomertoDB($fName, $lName, $age, $email, $pass, $phoneNumber);
		
	
	//function to add customer to the database
	function addCustomertoDB($fName, $lName, $age, $email, $pass, $phoneNumber)
		{
			// mySQL server parameters
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "gamesfortotsDB";
			
			//create the connection
			$dbConnection = mysqli_connect($servername, $username, $password, $db);
			
			//query to insert customer to the database
			$sqlStmt = "INSERT INTO customer(FirstName, LastName, Age, email, passwordFiled, phoneNumber) VALUES ('$fName', '$lName', '$age', '$email', '$pass', '$phoneNumber')";
			
			if (mysqli_query($dbConnection, $sqlStmt)) 
				{
					echo "You have been registered successfully";
				} 
			else
				{
					echo "Registeration Failed. Please try again";
				}
		}
?>