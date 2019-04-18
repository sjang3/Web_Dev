<html>
<?php
	include 'accesscontrol.php';

	//mySQL parameters
	$server ="localhost"; $username ="root"; $password =""; $database = "bookBarter";

	//set the connection
	$dbConnection = mysqli_connect($server, $username, $password, $database);

	$qry = "SELECT * FROM buyBooks WHERE buystudentid ='" . $_SESSION['studentID']. "'";

	//execute the query and assign the result
	$result = mysqli_query($dbConnection, $qry);
?>

<style>
	.logoutbutton 
		{
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

.Addbutton {
  background-color: #f44336; 
  border: black;
  color: white;
  position: absolute;
  border: 5px solid black;
  right: 200px;
  top: 300px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  font-family: "arial black";
}

.user {
position: absolute;
right: 230px;
top: 100px;
font-size: 20px;
font-family: "arial black";
}

.bgModal
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
	height:500px;
	background-color: #D3D3D3;
	border-radius: 4px;
	text-align: center;
	position: relative;
}

input {
	width: 60%;
	display: block;
	font-family: "arial black";
	border: 5px solid black;
	margin: 30px auto;
	
}

.close {
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
<body>
<form align="right" name="logout" method="post" action="homeWL.php">
  <label class="logoutLblPos">
  <div class ="user" > Hello <?php echo $_SESSION['email'] ?> </div> <button type="submit" name="submit" class= "logoutbutton" value="LogOut">Log Out</button> 
  </label>
</form>

<?php

if (mysqli_num_rows($result) >= 0)
{
	echo "<html>";
	echo "<head>";
	echo "</head>";
	echo "<body body bgcolor=\"#D3D3D3\">";
	echo "<br>";
	echo "<br>";
	echo "<h1 align = center> <font face=\"arial black\"> Your Wishlist </font></h1>";
	echo "<br>";
	echo "<br>";
	echo "<h2 align = center> <font face=\"arial black\"> Here you will find all the books that you would like to purchase</font></h2>";
	echo "<table border= '5 px solid black' align= center cellpadding = '10px' style=\"width:60%\" >";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<tr>";
	//echo "<th> Select </th>";
	echo "<th bgcolor=\"#000080\"><font color=\"white\" face=\"arial black\"> ISBN </font></th>";
	echo "<th bgcolor=\"#000080\"><font color=\"white\" face=\"arial black\"> Book Name </font></th>";
	echo "<th bgcolor=\"#000080\"><font color=\"white\" face=\"arial black\"> Book Price </font></th>";
	echo "</tr>";
	
	while ($row = mysqli_fetch_array($result))
	{
		echo "<tr>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">".$row['buyISBN']."</font></td>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">".$row['buyBookName']."</font></td>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">".$row['buyPrice']."</font></td>"; 
		echo "</tr>"; 
	}
	echo "</table>";
}
mysqli_free_result($result);
mysqli_close($dbConnection); 
?>

</style>

<button type="button" class="Addbutton" id="addSell">ADD</button> 

<script>
	//script to open the modal when clicking on the add button
	document.getElementById('addSell').addEventListener('click',
	function() {
	
	document.querySelector('.bgModal').style.display = 'flex';
	});
</script>

<!--modal -->
<!--Modal to blur the background -->
<div class="bgModal" id="bgModal"> 
	<div class="modal-content">
	
	<div class="close"> + </div>
	
	<script>
	//add close function to the modal close button
	document.querySelector('.close').addEventListener('click',
	function() {
	document.querySelector('.bgModal').style.display = 'none';
	window.location.reload();
	});
	</script>
	
	<h3 style="text-align: center class="modal-title"><font face="arial black">Enter the book ISN to search for it.</font></h3>
		<br>
		
	<!-- print the server response -->
	<div class= "return" id="response"> </div>
	
	<form id="searchBook">  
  		<label for= "isbn">ISBN Number: </label>
  		<input type="text" name="isbn">
  		
  		 <label for= "bookName">BookName: </label>
  		 <input type="text" name="bookName">
  		 
  		 <label for= "bookPrice">Price: </label>
  		 <input type="number" min="1" step="any" name="bookPrice">
  		 
   		<input type="submit" name="submit" class="button2" value="ADD"> &nbsp; 
   	<!--	&nbsp;  <button type="submit" name="submit" class="SEARCH">ADD</button> -->
   		
   		<!--onclick = "location.reload() -->
    </form>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
    <script>
		$("#searchBook").submit(function(event)
			{
			event.preventDefault(); //prevent default action 
			var post_url = "buyBookAdd.php"; //get form action url
			var form_data = $(this).serialize(); //Encode form elements for submission
	
			$.post( post_url, form_data, function( response ) 
				{
	  				$("#response").html( response );
				});
			});
			
    </script>
    
	</div>
</div>
</body>
</html>

