<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'team@falanster.by'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Замова з BZH-BZH.BY ад $name";
$email_body = "\r\n"."Дэталі:\r\nІмя: $name\r\nІмэйл: $email_address\r\nТэлефон: $phone\r\nЗмест:\r\n$message";


$headers = "From: falanster.by@gmail.com\r\n";
$headers.= "MIME-Version: 1.0\r\n";
$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers.= "X-Priority: 1\r\n";

//$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>