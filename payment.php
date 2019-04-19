<?php
session_start();

?>

<html>
	<head> </head>
	<body>
	
		<div clas = "logo">
		<!-- Our logo goes here -->
		</div>
		
		<!-- display the users full name as retrieved from the database -->
		<div class ="helloUserName">
			Hello,  <?php echo $_SESSION['customerName'] ?>
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
		
		<div class ="title">
			<h1> You can support us in two ways: </h1>
		</div>
		
		<div class ="subscribe">
			<h3> Subscription </h3>
			
			<p>
			Support us by enrolling in a subscription plan by paying a recurring monthly fee and get priority access to new games a week before others.
			</p>
			
			<br/>
			<h3> $ 3.99/month </h3>
			
			<!--paypal button code for subscription goes here-->
		</div>
		
				<div class ="donate">
			<h3> Donation </h3>
			
			<p>
			Lets be charitable. Please donate so that we can fund our research on developing new and exciting games for all to enjoy
			</p>
			
			<br/>
			<h3> $ 5.99/once </h3>
			
			<!--paypal button code for donation goes here-->
		</div>
	</body>
</html>