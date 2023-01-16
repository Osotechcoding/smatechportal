<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    if (!defined("__OSOTECH__DEV_COMPANY__")) {
        define("__OSOTECH__DEV_COMPANY__", ucwords("Flat ERP Technologies"));
        define("__OSO_HOST__",'localhost');
        define("__OSO_USER__",'root');
        define("__OSO_PASS__",'osotech');
        define("__OSO_DBNAME__",'smatech_portal');
        define("__OSO_DB_DRIVER__",'mysql');
        define("__OSO_CHARSET__",'utf8mb4');
        define("__OSO_APP_NAME__", strtoupper("smatech"));
        define("APP_ROOT","http://localhost/smatechportal/");
        define("EPORTAL_ROOT","http://localhost/smatechportal/eportal/");
        define("ADMISSION_ROOT","http://localhost/smatechportal/admission/");
        define("RESULT_ROOT","http://localhost/smatechportal/e-result/");
    }
}else {
    if (!defined("__OSOTECH__DEV_COMPANY__")) {
        define("__OSOTECH__DEV_COMPANY__", ucwords("Flat ERP Technologies"));
        define("__OSO_HOST__",'localhost');
        define("__OSO_USER__",'root');
        define("__OSO_PASS__",'osotech');
        define("__OSO_DBNAME__",'smatech_portal');
        define("__OSO_DB_DRIVER__",'mysql');
        define("__OSO_CHARSET__",'utf8mb4');
        define("__OSO_APP_NAME__", strtoupper("smatech"));
        define("APP_ROOT","https://www.yourwebsite.com");
        define("EPORTAL_ROOT","https://www.eportal.yourwebsite.com");
        define("ADMISSION_ROOT","https://www.admission.yourwebsite.com");
        define("RESULT_ROOT","https://www.e-result.yourwebsite.com");
    }
}

