<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
  if (!defined("__OSO_DEV_COMPANY__")) {
    define("__OSO_DEV_COMPANY__", ucwords("Flat ERP Technologies"));
    define("__OSO_HOST__", 'localhost');
    define("__OSO_USER__", 'root');
    define("__OSO_PASS__", 'osotech');
    define("__OSO_DBNAME__", 'smatech_portal');
    define("__OSO_DB_DRIVER__", 'mysql');
    define("__OSO_CHARSET__", 'utf8mb4');
    define("OSO_DOCUMENTATION_ROOT", 'http://localhost/smatechportal/documentation/v1/');
    define("__OSO_APP_NAME__", strtoupper("smatech"));
    define("MAILER_EMAIL_SERVER", "'smtp.mailtrap.io");
    define("MAILER_ACC_USER", "o71f8d31ac958eb");
    define("MAILER_ACC_PASS", "5479f82c1922d6");
    define("MAILER_PORT", 2525);
    define("APP_ROOT", "http://localhost/smatechportal/");
    define("ADMISSION_ROOT", "http://localhost/smatechportal/admission/");
    define("RESULT_ROOT", "http://localhost/smatechportal/e-result/");
    define("EPORTAL_ROOT", "http://localhost/smatechportal/eportal/");
  }
}else{
  if (!defined("__OSO_DEV_COMPANY__")) {
    define("__OSO_DEV_COMPANY__", ucwords("Flat ERP Technologies"));
    define("__OSO_HOST__", 'localhost');
    define("__OSO_USER__", 'root');
    define("__OSO_PASS__", 'osotech');
    define("__OSO_DBNAME__", 'smatech_portal');
    define("__OSO_DB_DRIVER__", 'mysql');
    define("__OSO_CHARSET__", 'utf8mb4');
    define("OSO_DOCUMENTATION_ROOT", 'https://www.flaterptech.com/docs/v1/');
    define("__OSO_APP_NAME__", strtoupper("smatech"));
    define("MAILER_EMAIL_SERVER", "'smtp.mailtrap.io");
    define("MAILER_ACC_USER", "o71f8d31ac958eb");
    define("MAILER_ACC_PASS", "5479f82c1922d6");
    define("MAILER_PORT", 2525);
    define("APP_ROOT", "https://www.flaterptech.com");
    define("ADMISSION_ROOT", "https://www.admission.flaterptech.com");
    define("RESULT_ROOT", "https://www.e-result.flaterptech.com");
    define("EPORTAL_ROOT", "https://www.eportal.flaterptech.com");
  }
}

