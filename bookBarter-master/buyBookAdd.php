<?php
//session_start();

include 'accesscontrol.php';


if (isset($_POST['isbn'])) 
	{ 
		$buyISBN = $_POST['isbn'];
	}
	
if (isset($_POST['bookName'])) 
	{ 
		$buyBookName = $_POST['bookName'];
	}
	
if (isset($_POST['bookPrice'])) 
	{ 
		$buyprice = $_POST['bookPrice'];
	}

//execute the function
insertToBuy($buyISBN, $buyBookName, $buyprice);

function insertToBuy($buyISBN, $buyBookName, $buyprice)
	{
		//mySQL parameters
		$server ="localhost"; $username ="root"; $password =""; $database = "bookBarter";

		//set the connection
		$dbConnection = mysqli_connect($server, $username, $password, $database);

		$sqlStmt = "INSERT INTO buyBooks(buyISBN, buyBookName, buyPrice, buystudentid)
					VALUES('" .$buyISBN . "', '" .$buyBookName . "', '" . $buyprice . "', '" .$_SESSION['studentID']. "')";
      
      
		if (mysqli_query($dbConnection, $sqlStmt)) 
			{
    			echo "Book Added to your wish list";
			} 
		else 
			{
				echo "Error adding book. Try Again!";
			}

		mysqli_close($dbConnection); 
	}

?>