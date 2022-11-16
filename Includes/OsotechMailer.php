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
  public $_Host;
  public $_User;
  public $_Password;
  public $_Port;
  protected $SIB_API_SEC_KEY = SIB_API_SECRET_KEY;
  public $SIB_ACC_PASS = SIB_ACC_PASS;
  public $SIB_ACC_USER = SIB_ACC_USER;
  public $SIB_EMAIL_SERVER = SIB_EMAIL_SERVER;

  function __construct()
  {
    // code...
  }

  public function SendClientFeedBackEmail($email, $message): bool
  {

    $mail = new PHPMailer(true);
    try {
      //Server settings
      //SMTP::DEBUG_SERVER
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = $this->SIB_EMAIL_SERVER;                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $this->SIB_ACC_USER;                     //SMTP username
      $mail->Password   = $this->SIB_ACC_PASS;                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           //ENCRYPTION_SMTPS; //Enable implicit TLS encryption
      $mail->Port       = 587;
      $mail->setFrom("osotechcoding@gmail.com", "Admin");
      $mail->addAddress("info.ftchelpdesk@gmail.com");     //Add a recipient
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

//$OsotechMailer = new OsotechMailer();