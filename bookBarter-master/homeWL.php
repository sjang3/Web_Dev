<html>
<head>
</head>

<style>
.logInbutton {
  background-color: #f44336; 
  border: black;
  color: white;
  position: absolute;
  right: 50px;
  top: 75px;
  padding: 15px 32px;
  text-align: center;
  border: 5px solid black;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  font-family: "arial black";
}
.logInbutton:focus{
    background:green;
}
.registerButton {
  background-color: #f44336; 
  border: black;
  color: white;
  position: absolute;
  right: 250px;
  top: 75px;
  padding: 15px 32px;
  text-align: center;
  border: 5px solid black;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  font-family: "arial black";
}
.registerButton:focus{
    background:green;
}
.bgModal1
{
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.7);
position: absolute;
top:0; 
display: flex;
justify-content: center;
align-items: center;
display: none;
}

.bgModal2
{
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.7);
position: absolute;
top:0; 
display: flex;
justify-content: center;
align-items: center;
display: none;
}

.modal-content{
	width: 500px;
	height:900px;
	background-color: #D3D3D3;
	border-radius: 4px;
	text-align: center;
	position: relative;
	overflow: auto;
}

.modal-content2{
	width: 500px;
	height:350px;
	background-color: #D3D3D3;
	border-radius: 4px;
	text-align: center;
	position: relative;
	overflow: auto;
}
input {
	width: 40%;
	display: block;
	font-family: "arial black";
	border: 5px solid black;
	height:30px;
	margin: 20px auto;
	
}
.close1 {
position: absolute;
top: 0;
right: 14px;
font-size: 42px;
transform: rotate(45deg);
}

.close2 {
position: absolute;
top: 0;
right: 14px;
font-size: 42px;
transform: rotate(45deg);
}

.button2{
  background-color: #f44336; 
  border: black;
  color: white;
  border: 5px solid black;
  font-size: 20px;
}
label {
    /* Other styling... */
    text-align: right;
    clear: both;
    float:center;
    font-family: "arial black";
    margin-right:15px;
}
select {
	width: 20%;
	display: block;
	font-family: "arial black";
	border: 5px solid black;
	height:100px;
	margin: 20px auto;
	
}

.emailBox {
width: 80% !important;
}

.return{
	width: 500px;
	height:30px;
	background-color: #33FF96;
	border-radius: 2px;
	text-align: center;
	position: relative;
	font-family: "arial black";
	border: 3px solid black;
}
</style>

<body bgcolor="#D3D3D3">
<form align="right" name="headerForm" action="">
  <label class="logoutLblPos">
  <button type="button" class= "registerButton" id="register">Register</button> 
  <button type="button" class= "logInbutton" id="log in">Log In</button> 
  </label>
</form>

<script>
	//script to open the modal when clicking on the add button
	document.getElementById('register').addEventListener('click',
	function() {
	
	document.querySelector('.bgModal1').style.display = 'flex';
	});
</script>

<script>
	//script to open the modal when clicking on the add button
	document.getElementById('log in').addEventListener('click',
	function() {
	
	document.querySelector('.bgModal2').style.display = 'flex';
	});
</script>


<!--modal -->
<!--Modal to blur the background -->
<div class="bgModal1"> 
	<div class="modal-content">
	<div class="close1"> + </div>
	
	<script>
	//add close function to the modal close button
	document.querySelector('.close1').addEventListener('click',
	function() {
	document.querySelector('.bgModal1').style.display = 'none';
	});
	</script>
	
	
	<h3 style="text-align: center class="modal-title"><font face="arial black">New User Registeration</font></h3>
	<br />
			<!-- print the server response -->
	<div class= "return" id="response"> </div>
	
	
	 	<form id ="registeration"> 
  		<label for= "FirseName">First Name: </label>
  		<input type="text" name="FirseName">
  		
  		 <label for= "LastName">Last Name: </label>
  		<input type="text" name="LastName">
  		
  		 <label for= "Street">Street: </label>
  		<input type="text" name="Street">
  		
  		<label for= "County">County: </label>
  		<input type="text" name="County">
  		<label for="State">State: </label>
				<select name="State" size="4">
					<option>AK</option>
					<option>AL</option>
					<option>AR</option>
					<option>AZ</option>
					<option selected>DE</option>
					<option>FL</option>
					<option>GA</option>
					<option>HI</option>
					<option>IA</option>
					<option>IL</option>
					<option>KS</option>
					<option>KY</option>
					<option>LA</option>
					<option>ME</option>
					<option>MI</option>
					<option>MO</option>
					<option>MS</option>
					<option>MT</option>
					<option>NC</option>
					<option>ND</option>
					<option>NE</option>
					<option>NH</option>
					<option>NJ</option>
					<option>NM</option>
					<option>NV</option>
					<option>OH</option>
					<option>OK</option>
					<option>OR</option>
					<option>PA</option>
					<option>SC</option>
					<option>SD</option>
					<option>TN</option>
					<option>TX</option>
					<option>UT</option>
					<option>VA</option>
					<option>WI</option>
					<option>WV</option>
					<option>WY</option>
				</select> 
			
			<label for= "Zip">Zip: </label>
  		<input type="text" name="Zip">
  		
  		<label for= "email" >Email: </label>
  		<input type="text" size="40" class="emailBox" name="email">
  		
  		<label for= "passwordFiled">Password (8 characters minimum): </label>
  		<input name="passwordFiled" required="" type="password">
  		
  			<label for= "phoneNumber">Phone Number: </label>
  		<input type="text" name="phoneNumber">
<br>
	   <button type="submit" name="submit" class="button2" value="ACTIVATE">REGISTER</button> &nbsp; 
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
    <script>
		$("#registeration").submit(function(event)
			{
			event.preventDefault(); //prevent default action 
			var post_url = "registerationDB.php"; //get form action url
			var form_data = $(this).serialize(); //Encode form elements for submission
	
			$.post( post_url, form_data, function(response, status) 
				{
	  				$("#response").html( response );	
	  				setTimeout(function() { window.location.href = "activate.php"; }, 5000);
				}).fail(function(err, status) {
 					 $("#response").html( err );
				});
			});
			

    </script>
	</div>
</div>

<!--sign-in -->
<!--Modal to blur the background -->
<div class="bgModal2"> 
	<div class="modal-content2">
	<div class="close2"> + </div>
	
	<script>
	//add close function to the modal close button
	document.querySelector('.close2').addEventListener('click',
	function() {
	document.querySelector('.bgModal2').style.display = 'none';
	});
	</script>
	
	
	<h3 style="text-align: center class="modal-title"><font face="arial black">BookBarter Login</font></h3>
	
	 	<form id ="login" action="login.php" method="post"> 
  		 <label for= "email" >Email: </label>
  		<input type="text" size="40" class="emailBox" name="email">
  		
  		<label for= "password">Password: </label>
  		<input name="password" required="" type="password">
<br>
	   <button type="submit" name="submit" class="button2" value="login">LOGIN</button>
   		
   		<!--onclick = "location.reload() -->
        </form>
	</div>
</div>