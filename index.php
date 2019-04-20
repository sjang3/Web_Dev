<html>
<head>
  <link rel="stylesheet" type="text/css" href="rating_style.css">
  <script>
  
   function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById(cname+"rating").innerHTML=ab;

      for(var i=ab;i>=1;i--)
      {
         document.getElementById(cname+i).src="star2.png";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById(cname+j).src="star1.png";
      }
   }

</script>
  
</head>

<body>

<h1>Star Rating System Using PHP and JavaScript</h1>

<?php
// mySQL server parameters
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "gamesfortotsDB";

			//create the connection
			$dbConnection = mysqli_connect($servername, $username, $password, $db);
    		$sql = "SELECT ratingNumer FROM gameRating";
    		
    		$result = mysqli_query($dbConnection, $sql);
    	//	echo mysql_num_rows($result);
    	
    	$total = 3; $averageRating = 5;
    	
    		//$total=mysql_num_rows($result);
  
  //  while($row=mysql_fetch_array($result))
   // {
	//  $rating[]=$ratingNumer;	  
 //   }
  //  $averageRating=(array_sum($rating)/$total);  
?>

		<form method="post" action="saveRating.php">
  			<p id="total_votes">Total Votes:<?php echo $total;?></p>
	  			<p>PHP (<?php echo $averageRating;?>)</p>
				<select name="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>
	  			
  			<input type="hidden" name="rating" id="rating" value="0">
  			<input type="hidden" name="gameName" id="gameName" value="ShipGame">
  			<button type="submit" name="submit" value="rate">RATE</button> &nbsp;
		</form> 

</body>
</html>