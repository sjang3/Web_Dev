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
		
		<!--payment button. Opens payment.php -->
		<div class = "payment">
			<form action = "payment.php">
				<button type="submit" name="submit" value="payment">Payment</button> 
			</form>
		<div>
		
		<div class ="title">
			<h1> You can reach out to us by filling out the below form: </h1>
		</div>
		
		<div class ="contactForm">
			<form id="contact">		
				<!--User Email -->
				<label for= "customerEmail" >Your Email: </label>
				<input type="text" size="60" class="emailBox" name="customerEmail">
				
				<br/>
				<br/>
		
				<!--User Password -->
				<label for= "comments">Message: </label>
				<textarea name="comments" maxlength="500" rows = "10"  cols="100">Enter your message for us here!</textarea>

				<br/>
				<br/>
				<button type="submit" name="submit" value="contact">SEND MESSAGE</button> &nbsp;
		</form>
		
		<!-- Display the message send status based on the server response -->
		<div id ="messageStatus"> </div>
		
		 <!-- JavaScript to display the server response without having to reload the page -->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
		 <script>
			$("#contact").submit(function(event)
				{
					event.preventDefault(); //prevent default action 
					var post_url = "sendEmail.php"; //get form action url
					var form_data = $(this).serialize(); //Encode form elements for submission
	
					$.post( post_url, form_data, function(response, status) 
						{
							$("#messageStatus").html( response );	
						}).fail(function(err, status) 
							{
								$("#messageStatus").html( err );
							});
				});
		</script>
	</body>
</html>