<?php 
$select = $_POST['select'];
$date = $_POST['date'];
$location = $_POST['location'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="Type: $select \nDate: $date \nLocation: $location \nName: $name \nEmail: $email \nMessage: $message";
$recipient = "kobylyukm2000@outlook.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header("Location: ThankYouPage.html");
?>