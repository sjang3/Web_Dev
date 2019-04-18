<?php include 'accesscontrol.php';
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
  top: 75px;
  padding: 15px 32px;
  text-align: center;
  border: 5px solid black;
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

.links {
  				height: 360px;
  				width: 45%;
  				background-color: darkgrey;
  				padding: 30px;
  				position: absolute;
 				top: 190px;
 				left: 400px;
				}
        </style>
        
    </head>

<body bgcolor="#D3D3D3">
    
 <form align="right" name="logout" method="post" action="homeWL.php">
  <label class="logoutLblPos">
  <div class ="user" > Hello <?php echo $_SESSION['email'] ?> </div> <button type="submit" name="submit" class= "logoutbutton" value="LogOut">Log Out</button> 
  </label>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 align = center> <font face="arial black"> Your Payment Confirmation </font></h1>
<br>
<br>


<?php
  
$pp_hostname = "www.sandbox.paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox
  
  
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';
  
$tx_token = $_GET['tx'];
$auth_token = "1xlkQDMogFcRJgf5pCsr--tMq9c6c9mmN9Gn_Y5GbBl1t5gqwiRnUCWfs5W";
$req .= "&tx=$tx_token&at=$auth_token";
  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//if your server does not bundled with default verisign certificates.
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
$res = curl_exec($ch);
curl_close($ch);
  
if(!$res){
    //HTTP ERROR
}else{
     // parse the data
    $lines = explode("\n", $res);
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
        for ($i=1; $i<count($lines);$i++){
        list($key,$val) = explode("=", $lines[$i]);
        $keyarray[urldecode($key)] = urldecode($val);
    }
    // check the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment
    $transactionCode = $keyarray['txn_id'];
    $transactionDate = $keyarray["payment_date"];
    $firstname = $keyarray['first_name'];
    $lastname = $keyarray['last_name'];
    $itemname = $keyarray['item_name'];
    $amount = $keyarray['payment_gross'];
    $paymentStatus = $keyarray["payment_status"];
    
    echo "<div class=\"links\" align=\"center\">"; 
    echo "<table border= '5 px solid black' align= center cellpadding = '10px' style=\"width:60%\" >";
	echo "<br>";
	echo "<br>";
	echo "<br>";
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">Transaction ID</font></td>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">$transactionCode</font></td>"; 
		echo "</tr>"; 
		
			echo "</tr>";
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">Transaction Date</font></td>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">$transactionDate</font></td>"; 
		echo "</tr>"; 
		
		echo "</tr>";
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">Buyer Name</font></td>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">$firstname $lastname</font></td>"; 
		echo "</tr>"; 
		
		echo "</tr>";
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">Amount charged</font></td>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">$amount</font></td>"; 
		echo "</tr>"; 
		
		echo "</tr>";
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">Payment Status</font></td>"; 
		echo "<td bgcolor=\"#FFFFFF\"><font color=\"black\" face=\"arial black\">$paymentStatus</font></td>"; 
		echo "</tr>"; 

	echo "</table>";
	echo " </div>";
    }
    else if (strcmp ($lines[0], "FAIL") == 0) {
        // log for manual investigation
    }
}
  
?>
</body>
</html>