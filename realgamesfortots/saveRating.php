<?php
session_start();

	//PHP code to fetch customer data from the registeration.html page and add it to the mySQL database
	if (isset($_POST['ratingNumber'])) 
		{
			$gameRating = $_POST['ratingNumber']; //get first name
		}
	
	if (isset($_POST['gameName'])) 
		{
			$gameName = $_POST['gameName']; //get last name
		}
		
	//execute the function to add the rating to the database
  	addRatingtoDB($gameName, $gameRating);
  	
  	//return the average rating for this game
	$avg = getAverageRating($gameName);
	echo round( $avg, 1, PHP_ROUND_HALF_EVEN);
	
	//function to add customer to the database
	function addRatingtoDB($gameName, $gameRating)
		{
			// mySQL server parameters
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "gamesfortotsDB";
			
			//create the connection
			$dbConnection = mysqli_connect($servername, $username, $password, $db);
			
			//query to insert customer to the database
			$sqlStmt = "INSERT INTO gameRating(gameName, ratingNumer) VALUES ('$gameName', '$gameRating')";
			
			if (mysqli_query($dbConnection, $sqlStmt)) 
				{
				//	echo 'Rating saved';
				} 
			else
				{
				//	echo "Failed to save rating";
				}
		}
	
	function getAverageRating($gameName)
		{	
			// mySQL server parameters
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "gamesfortotsDB";

			//create the connection
			$dbConnection = mysqli_connect($servername, $username, $password, $db);
			
    		$sql = "SELECT AVG(ratingNumer) AS totalRating FROM gameRating where gameName ='$gameName'";
    		
			//execute the query and assign the result
			$result = mysqli_query($dbConnection, $sql);

			if (mysqli_num_rows($result) >= 0)
				{
							while ($row = $result->fetch_assoc()) 
								{
									$sum = $row['totalRating'];
								}
				}
			return $sum;
		}
?>