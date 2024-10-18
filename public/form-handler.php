<?php

// $myemail = 'stac1221@gmail.com';
// $name = $_POST['name'];
// $email_address = $_POST['email'];
// $message = $_POST['message'];

// $to = $myemail;
// $email_subject = "Contact form submission: $name";
// $email_body = "You have received a new message. ".
// " Here are the details:\n Name: $name \n ".
// "Email: $email_address\n Message \n $message";
// $headers = "From: $myemail\n";
// $headers .= "Reply-To: $email_address";
// mail($to,$email_subject,$email_body,$headers);
// header('Location: https://glycerintears.com');

$email = '<'.$_POST["email"].'>';
$name = $_POST['name'];
$message = $_POST['message'];
$to = "<stac1221@gmail.com>";
$subject = "Test custom email";
$headers = "From: $email\n";
$message2 = "Name: $name\n
Email Address: $email\n
Message: $message
";

mail($to,$subject,$message2,$headers);
header('Location: https://glycerintears.com/test-email.html');

?>
