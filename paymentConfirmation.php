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
		
		<div class = "pdt">
			<!-- execute the papyPal payment data transfer function -->
			<?php pdtreturn() ?>
		</div>
	</body>
</html>

<?php
//function that gets the transaction details from paypal and display it in paymentConfirmation.php
function pdtreturn()
{
	$pp_hostname = "www.sandbox.paypal.com"; 
  
  	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-synch';
  
	$tx_token = $_GET['tx']; //get the transaction code from paypal AUTO-RETURN URL
	$auth_token = ""; //enter your merchant accounts access token
	$req .= "&tx=$tx_token&at=$auth_token";
  
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));

	$response = curl_exec($ch);
	curl_close($ch);
  
	if(!$response)
		{
    		echo 'Unable to get transaction data from PayPal. Sorry!';
		}
	else
		{
     		// parse the data
    		$lines = explode("\n", $response);
    		$keyarray = array();
    
    		if (strcmp ($lines[0], "SUCCESS") == 0) 
    			{
        			for ($i=1; $i<count($lines);$i++)
        				{
        					list($key,$val) = explode("=", $lines[$i]);
        					$keyarray[urldecode($key)] = urldecode($val);
    					}

					//get these fields from the array returned by payPal ADT
    				$transactionCode = $keyarray['txn_id'];
    				$transactionDate = $keyarray["payment_date"];
    				$firstname = $keyarray['first_name'];
   					$lastname = $keyarray['last_name'];
    				$amount = $keyarray['payment_gross'];
    				$paymentStatus = $keyarray["payment_status"];
    				
    				echo 'Transaction Code:' . $transactionCode;
    				echo 'Transaction Date:' . $transactionDate;
    				echo 'Customer Name:' . $$firstname . ' '. $lastname;
    				echo 'Transaction Amount:' . $amount;
    				echo 'Payment Status:' . $paymentStatus;
    				    
    			}
   		 else if (strcmp ($lines[0], "FAIL") == 0) 
   		 	{
        
    		}
		}
}
?>