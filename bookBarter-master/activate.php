
<style>
.emailBox {
width: 80% !important;
}

label {
    /* Other styling... */
    text-align: center;
    clear: both;
    float:center;
    font-family: "arial black";
    margin-right:15px;
}

input {
	width: 15%;
	display: block;
	font-family: "arial black";
	border: 5px solid black;
	height:30px;
	margin: 20px auto;
	
}
.button2{
  background-color: #f44336; 
  border: black;
  color: white;
  border: 5px solid black;
  font-size: 20px;
}

</style>

<body bgcolor="#D3D3D3">
<h3 style="text-align: center"><font face="arial black">Activate your account</font></h3>
	
	 	<form id ="login" action="verification.php" method="post"> 
  		 <label for= "email" >Email: </label>
  		<input type="text" size="40" class="emailBox" name="email">
  		
  		<label for= "password">Password: </label>
  		<input name="password" required="" type="password">
  		
  		  		<label for= "activationCode">Activation Code: </label>
  		<input name="activationCode" required="" type="text">

<br>
	  <button type="submit" name="submit" class="button2">ACTIVATE</button>
   		
   		<!--onclick = "location.reload() -->
        </form>
        
</body>
