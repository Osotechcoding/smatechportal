<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
class OsotechMailer
{
  public function generatePasswordResetLink($full_name, $email, $link, $tokenExpire): bool
  {
    $phpmailer = new PHPMailer(true);
    $phpmailer->SMTPDebug = 0;
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '71f8d31ac958eb';
    $phpmailer->Password = '5479f82c1922d6';
    $phpmailer->setFrom('admin@smatech.com', 'Admin');
    $phpmailer->addAddress($email, $full_name);
    $phpmailer->Subject = 'Password Reset Link Notification';
    $phpmailer->isHTML(true);         //Set email format to HTML
    $phpmailer->Body    =
      "<b>Hi, $full_name</b>,\r\n  <br> 
     <p>We received a request to reset the password for your account.</p> \r\n
    <p>Click the Link below</p> \r\n <a href='" . $link . "'> Reset my Password</a> \r\n <p>Or copy and paste this URL into your broswer:</p>
    \r\n <a href='" . $link . "'>$link</a> <br> \r\n
    <p>This Link will Expire on: " . date("l jS F Y @ h:i:s A", strtotime($tokenExpire)) . " GMT</p>
    ";
    $phpmailer->AltBody =
      "<b>Hi, $full_name</b>,\r\n  <br> 
     <p>We received a request to reset the password for your account.</p> \r\n
    <p>Click the Link below</p> \r\n <a href='" . $link . "'> Reset my Password</a> \r\n <p>Or copy and paste this URL into your broswer:</p>
    \r\n <a href='" . $link . "'>$link</a> <br> \r\n
    <p>This Link will Expire on: " . date("l jS F Y @ h:i:s A", strtotime($tokenExpire)) . " GMT</p>
    ";
    if ($phpmailer->send()) {
      $response = true;
    } else {
      $response = false;
    }

    return  $response;
  }

  public function sendExternalMessageToUsers($senderEMail, $senderName, $subject, $cc, $bcc, $message, $receiverEmail, $receiverName, $attachment)
  {
    $phpmailer = new PHPMailer(true);
    $phpmailer->SMTPDebug = 0;
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '71f8d31ac958eb';
    $phpmailer->Password = '5479f82c1922d6';
    $phpmailer->setFrom($senderEMail, $senderName);
    $phpmailer->addAddress($receiverEmail, $receiverName);
    $phpmailer->Subject = $subject;
    $phpmailer->addReplyTo($senderEMail, $senderName);
    $phpmailer->addCC($cc);
    $phpmailer->addBCC($bcc);
    //Add Attachments
    $phpmailer->addAttachment($attachment);  //'/tmp/image.jpg', 'new.jpg'
    $phpmailer->isHTML(true);  //Set email format to HTML
    $phpmailer->Body    = $message;
    $phpmailer->AltBody = $message;
    if ($phpmailer->send()) {
      $response = true;
    } else {
      $response = false;
    }
    return  $response;
  }

  public function sendMessageToStudentUsers($senderEMail, $senderName, $subject, $cc, $bcc, $message, $receiverEmail, $receiverName, $attachment)
  {
    $phpmailer = new PHPMailer(true);
    $phpmailer->SMTPDebug = 0;
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '71f8d31ac958eb';
    $phpmailer->Password = '5479f82c1922d6';
    $phpmailer->setFrom($senderEMail, $senderName);
    $phpmailer->addAddress($receiverEmail, $receiverName);
    $phpmailer->Subject = $subject;
    $phpmailer->addReplyTo($senderEMail, $senderName);
    $phpmailer->addCC($cc);
    $phpmailer->addBCC($bcc);
    //Add Attachments
    $phpmailer->addAttachment($attachment);  //'/tmp/image.jpg', 'new.jpg'
    $phpmailer->isHTML(true);  //Set email format to HTML
    $phpmailer->Body    = $message;
    $phpmailer->AltBody = $message;
    if ($phpmailer->send()) {
      $response = true;
    } else {
      $response = false;
    }
    return  $response;
  }
}