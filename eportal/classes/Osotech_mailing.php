<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//require_once 'initialize.php';
//require_once 'Osotech.php';
//Load Composer's autoloader
require_once __DIR__'vendor/autoload.php';

class Osotech_mailing extends Osotech {

    public $response;
    public $_Port               = 587;//465
    public $_CharSet            = 'utf-8';
    public $_Hostname           = 'mail.glorysupremeschool.com';
    public $_Username           = 'admin@glorysupremeschool.com';
    public $_Password           = '@gssota123';
    public $_From_Email             = 'admin@glorysupremeschool.com';
    //For portal attempted hacking reports
    public $_HackReportMail     = 'info.ftchelpdesk@gmail.com';

    public function SendUserConfirmationEmail($user_mail, $user_name, $confirmation_code, $userType) {
        $mailer                 = new PHPMailer();  //new instance of the mailer
        $mailer->IsSMTP(); // telling the class to use SMTP
        $mailer->SMTPDebug  = 0;                     // enables SMTP debug information (for testing), // 1 = errors and messages, // 2 = messages only
        $mailer->SMTPAuth   = true;                  // enable SMTP authentication
        $mailer->CharSet    = 'utf-8';
        $mailer->Host       = $this->_Hostname; // sets the SMTP server
        $mailer->Port       = $this->_Port;                // set the SMTP port for the GMAIL server
        $mailer->Username   = $this->_Username; // SMTP account username
        $mailer->Password   = $this->_Password;        // SMTP account password
        $mailer->AddAddress($user_mail, $reg_user_name);
        $mailer->Subject        = "Your Registration With ".__SCHOOL_NAME__;
        $mailer->setFrom($this->_From_Email);
        $mailer->AddReplyTo($this->_From_Email);

        if ($user == 'student') {  
            $confirm_url = APP_ROOT.'confirmstudentreg?cemail='.$user_mail.'&ccode='.$confirmation_code;
             }
        else if ($user == 'staff') { 
         $confirm_url = APP_ROOT.'confirmstaffreg?cemail='.$user_mail.'&ccode='.$confirmation_code;
          }
        $messageBody = $this->get_html_message_body();

        $mailer->MsgHTML($messageBody); // encoding the message body with html
        try {
            $mailer->Send();
            return true;
        } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function SendResetPasswordLink_viaEmail($user_mail, $user_name, $users_password, $user){
       
    }
    //end of class

    public function mailHackingReport($schoolname, $messageBody)  {
        $mailer                 = new PHPMailer();  //new instance of the mailer
        $mailer->IsSMTP(); // telling the class to use SMTP
        $mailer->SMTPDebug  = 0;                     // enables SMTP debug information (for testing), // 1 = errors and messages, // 2 = messages only
        $mailer->SMTPAuth   = true;                  // enable SMTP authentication
        $mailer->CharSet        = 'utf-8';
        $mailer->Host       = $this->_Hostname; // sets the SMTP server
        $mailer->Port       = $this->_Port;                // set the SMTP port for the GMAIL server
        $mailer->Username   = $this->_Username; // SMTP account username
        $mailer->Password   = $this->_Password;        // SMTP account password
        $mailer->AddAddress($this->_HackReportMail, 'Hacking-Report');
        $mailer->Subject        = $schoolname. ": Hacking Auto Generated Report";
        $mailer->FromName       = $schoolname;
        $mailer->From           = $schoolname;
        $mailer->AddReplyTo($schoolname);

        $mailer->MsgHTML($messageBody); // encoding the message body with html

        if(!$mailer->Send()) {
            return false;
        } else {
            return true;
        }
    }

    public function get_html_message_body(){
        $get_html_message = include("htmlMsg.php");
        return $get_html_message;
    }
    //end of class

    public function submit_contact_message($data){
        $contact_name = self::clean_($data['cname']);
        $cemail =       self::clean_($data['cemail']);
        $msg_subject =  self::clean_($data['msg_subject']);
        $cmessage =     self::clean_($data['cmessage']);
        if (self::isEmptyStr($contact_name)|| self::isEmptyStr($cemail) || self::isEmptyStr($msg_subject) || self::isEmptyStr($cmessage)) {
           $this->response = self::alert_msg("All fileds are required!","danger");
        }elseif (!self::is_Valid_Email($cemail)) {
           $this->response = self::alert_msg("Please enter a valid email address!","danger");
        }else{
            try {
                $mail = new PHPMailer();
          //Server settings
    /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $this->_Hostname;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $this->_Username;                     //SMTP username
    $mail->Password   = $this->_Password;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = $this->_Port;       */                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    
    $mail->setFrom($cemail,ucwords($contact_name));
    $mail->addAddress($this->_From_Email);     //Add a recipient
    $mail->AddReplyTo($this->_From_Email);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $msg_subject;
    $mail->Body    = $cmessage;
    $mail->AltBody =$cmessage; 
            } catch (Exception $e) {
             $this->response = self::alert_msg("Message could not be sent. Mailer Error: {$mail->ErrorInfo}","danger");   
            }
        }

        return $this->response;
         
    }

}
$Osotech_mailing = new Osotech_mailing();
?>