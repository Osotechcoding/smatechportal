<?php


/**
 *
 */
 //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once ("initialize.php");
//Load Composer's autoloader
require ('../vendor/autoload.php');
class OsotechMailer
{
//for smtp details
  public $_Host;
  public $_User;
  public $_Password;
  public $_Port;

  function __construct()
  {
    // code...
  }

  public function SendStudentConfirmationEmail(){
    $mail = new PHPMailer(true);
    try {
      //$email,$Surname,$code,$userType
      //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'osotechsoftware@gmail.com';                     //SMTP username
    $mail->Password   = 'samsonjerry12345!@';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           //ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port       = 587;
    //Recipients
  $mail->setFrom('osotechsoftware@gmail.com', 'SmatechPortal');
  $mail->addAddress('taiwooiza@gmail.com', 'Blessing A. O');     //Add a recipient
  //$mail->addAddress('ellen@example.com');               //Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');

  //Attachments
  //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Admission Confirmation Code';
  $mail->Body    = 'This is Coming from Your Husband <b> I love You!</b>';
  $mail->AltBody = 'This is Coming from Your Husband';

  $mail->send();
  return 'Message has been sent';
    } catch (Exception $e) {
      return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

  }
}

$OsotechMailer = new OsotechMailer();
