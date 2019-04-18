
<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

function email($email, $firstName, $lastName, $hashCode)
{

require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
// $mail->SMTPDebug = 2;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "mtstCloudExe@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Test123#";

//Set who the message is to be sent from
$mail->setFrom('mtstCloudExe@gmail.com');


//Set who the message is to be sent to
$mail->addAddress($email, $firstName . $lastName);

//Set the subject line
$mail->Subject = 'BookBarter User Registeration Verification';

$text_body  = "Hello " . $firstName . ", \n\n\n\n";
$text_body .= "Thank you for registering at BookBarter.\n\n\n\n";
$text_body .= "Before you can access everything we have to offer, we have to verify your idendity.\n\n\n\n";
$text_body .= "Please enter this code into the verification code text box at BookBarter: " . $hashCode . "\n\n\n\n"; 
$text_body .= "Sincerely, \n\n";
$text_body .= "BookBarter Customer Service team";

$mail->Body = $text_body;


if (!$mail->send()) {
    echo "Mail Sent!";
}
}
?>