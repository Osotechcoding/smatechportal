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
  public $FET_ACC_PASS = MAILER_ACC_PASS;
  public $FET_ACC_USER = MAILER_ACC_USER;
  public $FET_EMAIL_SERVER = MAILER_EMAIL_SERVER;
  public $FET_EMAIL_PORT = MAILER_PORT;

  function __construct()
  {
    // code...
  }

  public function SendStudentConfirmationEmail($studentEmail, $studentSurname, $confirmation_code, $userType)
  {
    $mailer = new PHPMailer(true);
    try {
      //$email,$Surname,$code,$userType
      //Server settings
      //SMTP::DEBUG_SERVER
    
      $mailer->isSMTP();
      $mailer->Host = $this->FET_EMAIL_SERVER; //'smtp.mailtrap.io';
      $mailer->SMTPAuth = true;
      $mailer->Port =      $this->FET_EMAIL_PORT; // 2525
      $mailer->Username =  $this->FET_ACC_USER; //'71f8d31ac958eb';
      $mailer->Password =  $this->FET_ACC_PASS; //'5479f82c1922d6';
      //Recipients
      $mailer->setFrom('osotechcoding@gmail.com', 'Smatech Portal');
      $mailer->addAddress($studentEmail, $studentSurname);     //Add a recipient
      //Content
      $mailer->isHTML(true);                                  //Set email format to HTML
      $mailer->Subject = 'Admission Confirmation Code';
      $mailer->Body    = "Thank you for your registration with Us,<br /> Use this  Confrimation Code <b>$confirmation_code </b> to Activate your new account!";
      $mailer->AltBody =
        "Thank you for your registration with Us,<br /> Use this  Confrimation Code <b>$confirmation_code </b> to Activate your new account!";;
      $mailer->send();
      return 'Message has been sent';
    } catch (Exception $e) {
      return "Message could not be sent. Mailer Error: {$mailer->ErrorInfo}";
    }
  }
/**
 * Undocumented function
 *
 * @param string $email
 * @param string $surname
 * @param string $link
 * @param string $expire_date
 * @param string $schoolName
 * @return boolean
 */
  public function sendAdmissionVerificationEmail($email, $surname,$link, $expire_date,$schoolName): bool
  {
    $mailer = new PHPMailer(true);
    try {
      $megBody ="
    Hello <b>$surname</b> <br>\r\n
    Your admission at <b>$schoolName</b> is just a step away, in order to complete your admission and enroll fully into our school,<br>\r\n you need to verify your email address by clicking the link below: \r\n \r\n<a href='".$link."'> Verify E-mail</a> <br>\r\n
    This above Link expires  on ".date("D jS F Y @ h:i:s a", strtotime($expire_date))."
    <br>
    Kind Regards,<br><b>$schoolName</b>";
      //Server settings
      //SMTP::DEBUG_SERVER
      $mailer->isSMTP();
      $mailer->Host = $this->FET_EMAIL_SERVER; 
      $mailer->SMTPAuth = true;
      $mailer->Port =      $this->FET_EMAIL_PORT;
      $mailer->Username =  $this->FET_ACC_USER; 
      $mailer->Password =  $this->FET_ACC_PASS;
      //Recipients
      $mailer->setFrom('osotechcoding@gmail.com', 'Flat ERP Technologies');
      $mailer->addAddress($email, $surname);     //Add a recipient
      //Content
      $mailer->isHTML(true);                                  //Set email format to HTML
      $mailer->Subject = 'Admission Email Verification';
      $mailer->Body    = $megBody;
      $mailer->AltBody =$megBody;
     if ($mailer->send()){
      return true;
      }else{
        return false;
      }
    } catch (Exception $e) {
      return false;
    }

  }
}