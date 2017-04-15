<?php
require 'mail/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.ninajaorganizer.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ninja999group@ninajaorganizer.com';                   // SMTP username
$mail->Password = "ninja999";               // SMTP password
                      // Enable encryption, 'ssl' also accepted
$mail->Port = 25;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('ninja999group@ninajaorganizer.com', 'Ninja Ninja');     //Set who the message is to be sent from
  // Add a recipient
$mail->addAddress("ninja999group@gmail.com");               // Name is optional

$mail->Subject = 'TEST';
$mail->Body    = "TEST TEST MAIL";
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   header('location:login_i.php?success=1');
}
 
echo 'Message has been sent';
?>