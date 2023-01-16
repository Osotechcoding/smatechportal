<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once("initialize.php");

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';

class OsotechMailer
{
  //for smtp details
  public function SendClientFeedBackEmail($email,$name, $message): bool
  {
    $mail = new PHPMailer(true);
    try {
      //SMTP::DEBUG_SERVER
      $mail->isSMTP();
      $mail->Host = 'smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Port = 2525;
      $mail->Username = '71f8d31ac958eb';
      $mail->Password = '5479f82c1922d6';
      $mail->setFrom($email, $name);
      $mail->addAddress("osotechcoding@gmail.com","Admin");     //Add a recipient
      $mail->isHTML(true);                                  //Set email 
      $mail->Subject = 'Feedback From ' . $email;
      $mail->Body    = $message;
      $mail->AltBody = $message;
      if ($mail->send()) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      return false; //"Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}