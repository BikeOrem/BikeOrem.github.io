<?php

include('Mail.php');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "timochristensen@gmail.com"; 
$from = "info@bikeorem.org"; 
$subject = "New Message from Web Contact Form";

$message = $name . "(" . $email . ")" . "sent a message via the website contact form: " . $message;

$headers = "From:" . $from;

mail($to,$subject,$message,$headers);

header("Location: https://www.bikeorem.github.io/contact/");

die();

?>