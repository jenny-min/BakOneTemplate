<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jennynguyen.92.92@gmail.com';                     //SMTP username
    $mail->Password   = 'oosjbjzuxkzhaedo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('jennynguyen.92.92@gmail.com');
    $mail->addAddress('jennynguyen.92.92@gmail.com');     //Add a recipient
    
    //Content
    $mail->isHTML(true);   
    $name = $_POST ["name"];
    $email = $_POST ["email"];                              //Set email format to HTML
    $message = $_POST ["message"];
    $mail->Subject = 'BakOneTemplate - Customer contact';
    $mail->Body    = "Hi shop owner,
    Customer name: $name <br>
    Customer email: $email <br>
    Message: $message <br>
    ";
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}