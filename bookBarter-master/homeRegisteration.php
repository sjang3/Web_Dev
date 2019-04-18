<?php

include 'accesscontrol.php';

//session_start();

//echo $_SESSION['email'];
//echo $_SESSION['password'];
//echo $_SESSION['studentID'];

?>

<html>
	<head> 

		<style>
		
			.logoutbutton {
  				background-color: #f44336; 
  				border: black;
  				color: white;
  				position: absolute;
 				right: 50px;
 				top: 70px;
  				padding: 15px 32px;
  				text-align: center;
  				border: 5px solid black;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 20px;
  				font-family: "arial black";
				}
				
			.btn {
				background-color: #f44336;
				border: 5px solid black;
				width: 400px;
    			height:200px;
    			font-size: 20px;
  				font-family: "arial black";
				}
				
			.links {
  				height: 700px;
  				width: 50%;
  				background-color: darkgrey;
  				padding: 30px;
  				position: absolute;
 				top: 150px;
 				left: 400px;
				}
				
			.user {
				position: absolute;
				right: 230px;
				top: 100px;
				font-size: 20px;
				font-family: "arial black";
				}
		</style>

	</head>

	<body body bgcolor="#D3D3D3">
		<br />
		<br/>
		<br/>
		<h1 align = center> <font face="arial black"> BookBarter Pages </font></h1>"
		
		<form align="right" name="logout" method="post" action="home.php">
  			<label class="logoutLblPos">
  				<div class ="user" > Hello <?php echo $_SESSION['email'] ?> </div> <button type="submit" name="submit" class= "logoutbutton" value="LogOut">Log Out</button> 
  			</label>
		</form>
		
		<div class="links" align="center">
			<form action="buyBook.php">
    			<input type="submit" class="btn" value="View your wishlist">
			</form>
			<br />
			
			<form action="sellBook.php">
    			<input type="submit" class="btn" value="View your listings">
			</form>
			<br />
	
			<form action="">
    			<input type="submit" class="btn" value="View your cart">
			</form>
			<br />
		</div>
	</body>
</html>	