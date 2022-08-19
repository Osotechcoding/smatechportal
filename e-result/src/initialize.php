<?php
if (!defined("__OSO_DEV_COMPANY__")) {
    define("__OSO_DEV_COMPANY__", ucwords("osotech software inc"));
    define("__OSO_HOST__",'localhost');
    define("__OSO_USER__",'root');
    define("__OSO_PASS__",'osotech');
    define("__OSO_DBNAME__",'smatech_portal');
    define("__OSO_DB_DRIVER__",'mysql');
      define("__OSO_CHARSET__",'utf8mb4');
  	/*define("__OSO_USER__",'smatechportal_admin');
  	define("__OSO_PASS__",'@smatech');
  	define("__OSO_DBNAME__",'smatech_portal');*/
    define("__OSO_APP_NAME__", strtoupper("smatech"));
    define("APP_ROOT","http://localhost/smatechportal/");
    define("ADMISSION_ROOT","http://localhost/smatechportal/admission/");
    define("RESULT_ROOT","http://localhost/smatechportal/e-result/");
      //define("RESULT_ROOT","https://e-result.smatechportal.com/");
    //define("APP_ROOT","https://smatechportal.com/");
    //define("ADMISSION_ROOT","https://admission.smatechportal.com/");
}
