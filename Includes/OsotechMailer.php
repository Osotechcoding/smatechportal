<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once("initialize.php");
//Load Composer's autoloader
require_once('../vendor/autoload.php');
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

  public function SendClientFeedBackEmail($email, $name, $message)
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
      $mail->setFrom($email, $name);
      $mail->addAddress($this->SIB_ACC_USER, 'Smatech Admin');     //Add a recipient
      $mail->isHTML(true);                                  //Set email 
      $mail->Subject = 'New Feedback From ' . $name;
      $mail->Body    = $message;
      $mail->AltBody = $message;
      $mail->send();
      return 'Message has been sent';
    } catch (Exception $e) {
      return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}

$OsotechMailer = new OsotechMailer();