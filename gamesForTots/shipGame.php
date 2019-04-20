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
		
		<!--paypal payment button. Opens payment.php -->
		<div class = "payment">
			<form action = "payment.php">
				<button type="submit" name="submit" value="payment">Payments</button>  <!-- This link takes to the payment options page -->
			</form>
		<div>
		
		<div class = "embeddedGame">
			<!-- embedd the HTML game here -->
			<iframe src="\phaser-3.16.2\FirstGame\ShipGame.html" name="bestgameever" width="800" height="600" frameborder="0" scrolling="no">   
			<p>Your browser does not support iframes.</p> ></iframe>
			
		<!-- embedd the rating system here -->
		</div>
		
		<!-- Twitter share button -->
		<div id="twitter_share">
    		<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="Go check out this amazing game I found..." data-show-count="false">Tweet</a>
    		<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		
		<!-- facebook comment box-Ship game only -->
		<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=2212809772366987&autoLogAppEvents=1"></script>
		<div class="fb-comments" data-href="http://gamesfortots.us/Kentico12/Game/MergeIt/Game.aspx" data-numposts="20">
		</div>
		
	</body>
</html>