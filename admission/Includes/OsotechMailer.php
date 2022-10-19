<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once("initialize.php");
//Load Composer's autoloader
require('../vendor/autoload.php');
class OsotechMailer
{
  //for smtp details
  public $_Host;
  public $_User;
  public $_Password;
  public $_Port;
  protected $SIB_API_SEC_KEY = SIB_API_SECRET_KEY;
  protected $SIB_ACC_PASS = SIB_ACC_PASS;
  protected $SIB_ACC_USER = SIB_ACC_USER;
  protected $SIB_EMAIL_SERVER = SIB_EMAIL_SERVER;

  function __construct()
  {
    // code...
  }

  public function SendStudentConfirmationEmail($studentEmail, $studentSurname, $confirmation_code, $userType)
  {
    $mail = new PHPMailer(true);
    try {
      //$email,$Surname,$code,$userType
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
      //Recipients
      $mail->setFrom('osotechcoding@gmail.com', 'Smatech Portal');
      $mail->addAddress($studentEmail, $studentSurname);     //Add a recipient
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Admission Confirmation Code';
      $mail->Body    = "Thank you for your registration with Us,<br /> Use this  Confrimation Code <b>$confirmation_code </b> to Activate your new account!";
      $mail->AltBody =
        "Thank you for your registration with Us,<br /> Use this  Confrimation Code <b>$confirmation_code </b> to Activate your new account!";;
      $mail->send();
      return 'Message has been sent';
    } catch (Exception $e) {
      return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}

$OsotechMailer = new OsotechMailer();