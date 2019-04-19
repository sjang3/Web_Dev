<?php
session_start();
$_SESSION['customerName'];

if (isset($_SESSION['email'])) 
	{
    	$loginEmail = $_SESSION['email'];
	}

$customerName = getName($loginEmail); //get the users firstname and lastname using his email address

//function to get customers first name and last name based on his email address
function getName($loginEmail)
	{
		//mySQL parameters
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "gamesfortotsDB";
    
    	//set the connection
    	$dbConnection = mysqli_connect($servername, $username, $password, $db);
    
    
    	$stmt = "SELECT FirstName, LastName FROM customer WHERE email='$loginEmail'";
    
    	//execute the query and assign the result
    	$result = mysqli_query($dbConnection, $stmt);
    
    	if (mysqli_num_rows($result) > 0) 
    	{
        	while ($row = mysqli_fetch_array($result)) 
        		{
            		$_SESSION['customerName'] = $row['FirstName']. ' ' . $row['LastName'];
        		}
        
        		mysqli_free_result($result);
        		mysqli_close($dbConnection);
    	}
    	
    	return $_SESSION['customerName'];
	}
?>

<html>
	<!-- Home Page. Post Login -->
	<head> </head>

	<body>
	
		<!-- display the users full name as retrieved from the database -->
		<div class ="helloUserName">
			Hello,  <?php echo $customerName ?>
		</div>
		
		<!--signOut button. Opens homePreLogin.html -->
		<div class = "logOut">
			<form action = "homePreLogin.html">
				<button type="submit" name="submit" value="LogOut">Log Out</button> 
			</form>
		<div>
		
		<!--home button. Opens homePostLogin.html -->
		<div class = "home">
			<form action = "homePostLogin.php">
				<button type="submit" name="submit" value="Home">Home</button> 
			</form>
		<div>
				
		<!--contact button. Opens contactUs.php -->
		<div class = "contactUs">
			<form action = "contactUs.php">
				<button type="submit" name="submit" value="contactUs">Contact Us</button> 
			</form>
		<div>
		
		<!--paypal payment button. Opens payment.php -->
		<div class = "payment">
			<form action = "payment.php">
				<button type="submit" name="submit" value="payment">Payments</button>  <!-- This link takes to the payment options page -->
			</form>
		<div>
		
		<div class = "gameHistory">
		<!-- Add the clickable image icons of the the gamed the logged in user has played -->
		<!--Create a table row in the database called playerHistory with the gameID (foreign key from games table) and customerID (foreign key from customer table) 
		when the customer starts playing a game. Then use PHP to pull the list of games played by his customerID everytime the user navigates to this page and display the corresponding
		clickable image icon -->
		</div>
		
		<div class = "advertisement">
		<!-- Advertisement goes here -->
		</div>
		
	</body>
</html>