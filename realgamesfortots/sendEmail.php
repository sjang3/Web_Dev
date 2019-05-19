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
		$text_body = "Hello customer service representative,\n\n\n\n";
		$text_body .= "A customer has sent you a messaege:\n\n\n\n";
		$text_body .= "Customer Email: " . $email . "\n\n\n\n"; 
		$text_body .= "Customer Message: " . $message . "\n\n\n\n"; 
		$text_body .= "Please address the customer request in a timely manner.";

		$from = "admin@bookbarter.us";
		//$to = $from;
		$to= "test@yopmail.com";
		
		$message = $text_body;
		$subject = "Message from customer " . $email;
		$to = $email;
		$headers = "MIME-VERSION: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers = "From : <$from> \r\n";

if (mail($to, $subject, $message, $headers))
    {
        echo "Success";
    }
else 
    {
        echo "Failure";
    }

			
	}
?>
