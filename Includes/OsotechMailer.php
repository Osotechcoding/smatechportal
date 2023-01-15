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
  public $FET_ACC_PASS = MAILER_ACC_PASS;
  public $FET_ACC_USER = MAILER_ACC_USER;
  public $FET_EMAIL_SERVER = MAILER_EMAIL_SERVER;
  public $FET_EMAIL_PORT = MAILER_PORT;

  function __construct()
  {
    // code...
  }

  public function SendClientFeedBackEmail($email,$name, $message): bool
  {

    $mail = new PHPMailer(true);
    try {
      //Server settings
      //SMTP::DEBUG_SERVER
      $mail->isSMTP();
      $mail->Host = $this->FET_EMAIL_SERVER; 
      $mail->SMTPAuth = true;
      $mail->Port =      $this->FET_EMAIL_PORT; 
      $mail->Username =  $this->FET_ACC_USER; 
      $mail->Password =  $this->FET_ACC_PASS;
      $mail->setFrom($email, $name);
      $mail->addAddress("osotechcoding@gmail.com","Admin");     //Add a recipient
      $mail->isHTML(true);                                  //Set email 
      $mail->Subject = 'Feedback From ' . $email;
      $mail->Body    = $message;
      $mail->AltBody = $message;
      $mail->send();
      if ($mail->send()) {
        return true;
      } else {
        return false;
      }
      //'Message has been sent';
    } catch (Exception $e) {
      return false; //"Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}