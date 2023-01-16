<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
	//development server localhost
	if (!defined("__OSOTECH__DEV_COMPANY__")) {
		define("__OSOTECH__DEV_COMPANY__", "Flat ERP Technologies");
		define("__OSO_HOST__", 'localhost');
		define("__OSO_USER__", 'root');
		define("__OSO_PASS__", 'osotech');
		define("__OSO_DBNAME__", 'smatech_portal');
		define("__OSO_SCHOOL_CODE__", "C24314");
		define("__OSO_DB_DRIVER__", 'mysql');
		define("__OSO_CHARSET__", 'utf8mb4');
		define("__OSO_SERIAL__NUMBER_", "XTAS-KM87-EWA6-09CQ-5J0V");
		define("__OSO__CONTROL__KEY__", "12345");
		define("__OSO__PUBLISH_RESULT__KEY__", "12345678");
		define("__OSO_APP_VERSION__", "version 2.0.5");
		define("__OSO_APP_DEV_YEAR__", "2022");
		define("__OSO_APP_NAME__", "SMAPP");
		define("WEBSITE_HOME_PAGE", "http://localhost/smatechportal/");
		define("APP_ROOT", "http://localhost/smatechportal/eportal/");
	}
}else{
		//deployment or Production server
	if (!defined("__OSOTECH__DEV_COMPANY__")) {
		define("__OSOTECH__DEV_COMPANY__", "Flat ERP Technologies");
		define("__OSO_HOST__", 'localhost');
		define("__OSO_USER__", 'root');
		define("__OSO_PASS__", 'osotech');
		define("__OSO_DBNAME__", 'smatech_portal');
		define("__OSO_SCHOOL_CODE__", "C24314");
		define("__OSO_DB_DRIVER__", 'mysql');
		define("__OSO_CHARSET__", 'utf8mb4');
		define("__OSO_SERIAL__NUMBER_", "XTAS-KM87-EWA6-09CQ-5J0V");
		define("__OSO__CONTROL__KEY__", "12345");
		define("__OSO__PUBLISH_RESULT__KEY__", "12345678");
		define("__OSO_APP_VERSION__", "version 2.0.5");
		define("__OSO_APP_DEV_YEAR__", "2022");
		define("__OSO_APP_NAME__", "SMAPP");
		define("WEBSITE_HOME_PAGE", "https://www.yourwebsite.com");
		define("APP_ROOT", "https://www.eportal.yourwebsite.com");
	}
}

