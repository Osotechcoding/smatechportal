<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
	if (!defined("__OSOTECH__DEV_COMPANY__")) {
		define("__OSOTECH__DEV_COMPANY__", "Flat ERP Technologies");
		define("__OSO_HOST__", 'localhost');
		define("__OSO_USER__", 'root');
		define("__OSO_PASS__", 'osotech');
		define("__OSO_DBNAME__", 'smatech_portal');
		define("__OSO_DB_DRIVER__", 'mysql');
		define("__OSO_CHARSET__", 'utf8mb4');
		define("__OSO_APP_DEV_YEAR__", "2020");
		define("__OSO_APP_NAME__", "SMATECH");
		define("MAILER_EMAIL_SERVER", "'smtp.mailtrap.io");
		define("MAILER_ACC_USER", "o71f8d31ac958eb");
		define("MAILER_ACC_PASS", "5479f82c1922d6");
		define("MAILER_PORT", 2525);
		define("ADMISSION_PORTAL_ROOT", "http://localhost/smatechportal/admission/");
		define("APP_ROOT", "http://localhost/smatechportal/");
		define("EPORTAL_ROOT", "http://localhost/smatechportal/eportal/");
	}
}else{
	//Production Server 
	if (!defined("__OSOTECH__DEV_COMPANY__")) {
		define("__OSOTECH__DEV_COMPANY__", "Flat ERP Technologies");
		define("__OSO_HOST__", 'localhost');
		define("__OSO_USER__", 'root');
		define("__OSO_PASS__", 'osotech');
		define("__OSO_DBNAME__", 'smatech_portal');
		define("__OSO_DB_DRIVER__", 'mysql');
		define("__OSO_CHARSET__", 'utf8mb4');
		define("__OSO_APP_DEV_YEAR__", "2020");
		define("__OSO_APP_NAME__", "SMATECH");
		define("MAILER_EMAIL_SERVER", "'smtp.mailtrap.io");
		define("MAILER_ACC_USER", "o71f8d31ac958eb");
		define("MAILER_ACC_PASS", "5479f82c1922d6");
		define("MAILER_PORT", 2525);
		define("ADMISSION_PORTAL_ROOT", "http://192.168.1.62:80/smatechportal/admission/");
		define("APP_ROOT", "http://192.168.1.62:80/smatechportal/");
		define("EPORTAL_ROOT", "http://192.168.1.62:80/smatechportal/eportal/");
	}
}
