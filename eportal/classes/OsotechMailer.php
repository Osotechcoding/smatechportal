<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
class OsotechMailer
{
  public function generatePasswordResetLink($fullname, $email, $link, $tokenExpire): bool
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
    $phpmailer->addAddress($email, $fullname);
    $phpmailer->Subject = 'Password Reset Link Notification';
    $phpmailer->isHTML(true);         //Set email format to HTML
    $phpmailer->Body    =
      "<b>Hi, $fullname</b>,\r\n  <br> 
    \r\n <p>We received a request to reset the password for your account.</p><br> \r\n
    <p>To reset your password, click the Link below</p> \r\n <a href='" . $link . "'> Reset my Password</a> \r\n <p>Or copy and paste the URL into your broswer:</p>
    \r\n <a>$link</a> <br> \r\n
    <p>This Link will Expire on: " . date("l jS F Y @ h:i:s", strtotime($tokenExpire)) . " GMT</p>
    ";
    $phpmailer->AltBody =
      "<b>Hi, $fullname</b>,\r\n  <br> 
    \r\n <p> We received a request to reset the password for your account.</p><br> \r\n
    <p>To reset your password, click the Link below</p> \r\n <a href='" . $link . "'> Reset my Password</a> \r\n <p>Or copy and paste the URL into your broswer:</p>
    \r\n <a>$link</a> <br> \r\n
    <p>This Link will Expire on: " . date("l jS F Y @ h:i:s", strtotime($tokenExpire)) . " GMT</p>
    ";
    if ($phpmailer->send()) {
      return true;
    } else {
      return false;
    }
  }
}