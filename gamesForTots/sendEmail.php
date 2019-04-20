<?php

session_start();

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['customerEmail'])) 
	{
    	$email = $_POST['customerEmail'];
	}

if (isset($_POST['comments'])) 
	{
    	$message = $_POST['comments'];
	}
//execute the function
email($email, $message);

//Function to send the message to customer service
function email($email, $message)
	{
		//import the dependency for the email client
		require '../vendor/autoload.php';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;

		$mail->Username = "mtstCloudExe@gmail.com"; //Username to use for SMTP authentication - use full email address for gmail
		$mail->Password = "Test123#"; //Password to use for SMTP authentication

		$mail->setFrom('mtstCloudExe@gmail.com'); //Set who the message is to be sent from
		$mail->addAddress('mtstCloudExe@gmail.com'); //Set who the message is to be sent to
		$mail->Subject = 'Customer Service Message'; //Set the subject line

		$text_body  = "Hello customer service, \n\n\n\n";
		$text_body .= "See below a message send by one of our customers.\n\n\n\n";
		$text_body .= "Customer email address: " . $email . "\n\n\n\n";
		$text_body .=  $message . "\n\n\n\n";
		$text_body .= "Automated email system";

		$mail->Body = $text_body;

		if ($mail->send()) 
			{
    			echo " Message sent succesfully!";
			}
		else
			{
				echo " Unable to send the message. Please try again!";
			}
			
	}
?>