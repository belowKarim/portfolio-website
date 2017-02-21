<?
require("class.phpmailer.php");


	//form validation vars
	$formok = true;
	$errors = array();
	
	//sumbission data
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$date = date('d/m/Y');
	$time = date('H:i:s');
	
	//form data
	$name = $_POST['name'];	
	$email = $_POST['mail'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];


$mail = new PHPMailer();

$mail->IsSMTP();                                 		 // send via SMTP
$mail->Host     = "mail.google.com"; 					 // SMTP server
$mail->SMTPAuth = true;    								 // turn on SMTP authentication
$mail->Username = "fkarif.cse@gmail.com"; 			     // SMTP username
$mail->Password = "MFazlul04kArim06a08";							 // SMTP password

$mail->From     = "fkarif.cse@gmail.com";			 // SMTP username
$mail->AddAddress("fkarif.cse@gmail.com");			  	 // Your Adress
$mail->Subject  =  "New mail from KARIM !";
$mail->IsHTML(true);  
$mail->CharSet = 'UTF-8';
$mail->Body     =  "<p>You have recieved a new message from the enquiries form on your website.</p>
					  <p><strong>Name: </strong> {$name} </p>
					  <p><strong>Email Address: </strong> {$email} </p>
					  <p><strong>Subject: </strong> {$subject} </p>
					  <p><strong>Message: </strong> {$message} </p>
					  <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";

if(!$mail->Send())
{
   echo "Mail Not Sent <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Mail Sent";


?>
