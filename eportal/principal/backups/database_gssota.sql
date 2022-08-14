# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------


#
# Delete any existing table `api_module_config`
#

DROP TABLE IF EXISTS `api_module_config`;


#
# Table structure of table `api_module_config`
#

CREATE TABLE `api_module_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `api_user` varchar(50) NOT NULL,
  `api_pass` varchar(50) NOT NULL,
  `api_def` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module` (`module`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table api_module_config (20 records)
#
 
INSERT INTO `api_module_config` VALUES ('1', 'student_registration', 'registration', 'Student Registration', 'Enabling this Will allow old students to Register ion the portal', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('2', 'student_discussion', 'main', 'Student Discussions', 'When enables, students can post and chat with themselves', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('3', 'student_login', 'login', 'Student Login', 'When Enabled, students will be allowed to log in', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('4', 'staff_registration', 'registration', 'Staff Registration', 'When enabled, new Staff can register him or herself', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('5', 'staff_discussion', 'main', 'Staff Discussion', 'When enabled, staff will be allowed to post and chat with themselves', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('6', 'staff_login', 'login', 'Staff Login', 'When enabled, staff will be able to log in', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('8', 'paypal_api', 'main', 'Paypal API', '', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('9', 'sms_api', 'api', 'Bulk SMS API', '<a href="http://sms.ifihear.com">GET API </a>', '1', 'jostinexcel2015', 'jostinexcel2015', 'sms.hypertera.ng') ; 
INSERT INTO `api_module_config` VALUES ('10', 'google_map', 'api', 'Google Map API', 'API to show your location in your website, copy your map url and paste it inside definitions', '1', '', '', 'http://') ; 
INSERT INTO `api_module_config` VALUES ('11', 'smtp', 'api', 'SMTP Details', 'Simple Mail Transfer Protocol: enable you to send email: Instruction the API definition = SMTP serve', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('13', 'facebook_app', 'api', 'Facebook APP', 'API definition is serving as the app url', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('14', 'maintenance_mode', 'main', 'Maintenance Mode', 'When this is turned on, the portal puts itself to maintenence mode', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('15', 'parent_login', 'login', 'Parent Login ', 'When this is enabled, parents can log in', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('16', 'parent_registration', 'registration', 'Parent Registration', 'When this is Enabled, new Parents can register', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('17', 'result_checking', 'main', 'Student Result Checking Portal Enable/Disable', 'if this is open, the students can check their result else they cant', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('18', 'student_result_uploading', 'main', 'Staff Result Uploading', 'When enabled, Staff have the privilege to upload result', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('19', 'result_note', 'main', 'Show result note', 'When enabled, note will show on result', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('20', 'result_comment', 'main', 'Result Comment', 'when open, result comment will be shown', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('21', 'card_generator', 'main', 'Card Generator', 'Enabling this Scratch Card can be Generated', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('22', 'leave_request', 'main', 'Leave Request', 'When enables, Staff Can Apply for a leave', '1', '', '', '') ;
#
# End of data contents of table api_module_config
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------


#
# Delete any existing table `current_session_tbl`
#

DROP TABLE IF EXISTS `current_session_tbl`;


#
# Table structure of table `current_session_tbl`
#

CREATE TABLE `current_session_tbl` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `session_desc_name` varchar(20) DEFAULT NULL,
  `term_desc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table current_session_tbl (1 records)
#
 
INSERT INTO `current_session_tbl` VALUES ('1', '2020/2021', '1st Term') ;
#
# End of data contents of table current_session_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------


#
# Delete any existing table `reg_pin_history_tbl`
#

DROP TABLE IF EXISTS `reg_pin_history_tbl`;


#
# Table structure of table `reg_pin_history_tbl`
#

CREATE TABLE `reg_pin_history_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `used_by` varchar(50) DEFAULT NULL,
  `pin_code` varchar(50) DEFAULT NULL,
  `pin_serial` varchar(50) DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `timed` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table reg_pin_history_tbl (0 records)
#

#
# End of data contents of table reg_pin_history_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------


#
# Delete any existing table `register_exam_subject_tbl`
#

DROP TABLE IF EXISTS `register_exam_subject_tbl`;


#
# Table structure of table `register_exam_subject_tbl`
#

CREATE TABLE `register_exam_subject_tbl` (
  `subId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `std_id` bigint(20) unsigned DEFAULT NULL,
  `stdRegNo` varchar(50) DEFAULT NULL,
  `stdGrade` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `schl_Sess` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`subId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table register_exam_subject_tbl (1 records)
#
 
INSERT INTO `register_exam_subject_tbl` VALUES ('6', '1', 'GSSOTA/00001', 'JSS1', 'Mathematics', '2021/2022', '2022-04-25') ;
#
# End of data contents of table register_exam_subject_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------


#
# Delete any existing table `school_classes`
#

DROP TABLE IF EXISTS `school_classes`;


#
# Table structure of table `school_classes`
#

CREATE TABLE `school_classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_desc` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `capacity` int(5) DEFAULT NULL,
  `class_code` varchar(20) DEFAULT NULL,
  `class_teacher` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table school_classes (0 records)
#

#
# End of data contents of table school_classes
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------


#
# Delete any existing table `school_subjects`
#

DROP TABLE IF EXISTS `school_subjects`;


#
# Table structure of table `school_subjects`
#

CREATE TABLE `school_subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_desc` varchar(225) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `subject_teacher` varchar(225) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `subject_code` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table school_subjects (6 records)
#
 
INSERT INTO `school_subjects` VALUES ('1', 'Mathematics', NULL, NULL, 'active', 'MATH101', '2022-04-19') ; 
INSERT INTO `school_subjects` VALUES ('2', 'English Language', NULL, NULL, 'active', 'ENG101', '2022-04-19') ; 
INSERT INTO `school_subjects` VALUES ('3', 'Biology', NULL, NULL, 'active', 'BIO3392', '2022-04-19') ; 
INSERT INTO `school_subjects` VALUES ('5', 'Agricultural Science', NULL, NULL, 'inactive', 'AGRSC203', '2022-04-19') ; 
INSERT INTO `school_subjects` VALUES ('6', 'Economics', NULL, NULL, 'active', 'ECON0913', '2022-04-19') ; 
INSERT INTO `school_subjects` VALUES ('9', 'Physics', NULL, '1', 'active', 'PHY3648', '2022-04-29') ;
#
# End of data contents of table school_subjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------


#
# Delete any existing table `tbl_admin`
#

DROP TABLE IF EXISTS `tbl_admin`;


#
# Table structure of table `tbl_admin`
#

CREATE TABLE `tbl_admin` (
  `adminId` int(1) NOT NULL AUTO_INCREMENT,
  `adminEmail` varchar(225) DEFAULT NULL,
  `adminUser` varchar(50) DEFAULT NULL,
  `adminPass` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `fullname` varchar(225) DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_admin (1 records)
#
 
INSERT INTO `tbl_admin` VALUES ('1', 'admin@gmail.com', 'osotech', '$2y$10$VkgBIuaSc7VPXyFZWDkQZOfWT1rKjFjA2RbEniv3COJ6Q8AFkyIji', '0', 'Osotech Software', NULL, NULL, '23456vb8l0mpaxqwe234', '2022-01-26 08:34:42') ;
#
# End of data contents of table tbl_admin
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------


#
# Delete any existing table `tbl_ewallet_pins`
#

DROP TABLE IF EXISTS `tbl_ewallet_pins`;


#
# Table structure of table `tbl_ewallet_pins`
#

CREATE TABLE `tbl_ewallet_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_ewallet_pins (0 records)
#

#
# End of data contents of table tbl_ewallet_pins
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------


#
# Delete any existing table `tbl_exam_pins`
#

DROP TABLE IF EXISTS `tbl_exam_pins`;


#
# Table structure of table `tbl_exam_pins`
#

CREATE TABLE `tbl_exam_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_exam_pins (30 records)
#
 
INSERT INTO `tbl_exam_pins` VALUES ('1', '6645210213753', 'WXVE01402347A5', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('2', '1123536947520', 'WXVE7021354430', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('3', '2096758132413', 'WXVE070316494A', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('4', '8146092533271', 'WXVE3381BA8DE4', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('5', '1733194052652', 'WXVE8BD3E10134', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('6', '1525336427019', 'WXVE0237453401', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('7', '5663521034172', 'WXVE503B021447', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('8', '3166155403722', 'WXVE180F413D3E', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('9', '4938231760521', 'WXVE037A015442', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('10', '3921427856103', 'WXVE051012BF73', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('11', '0241572393516', 'WXVE18D1B0E1F4', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('12', '5753631126240', 'WXVEC413607A94', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('13', '7142256931503', 'WXVEB701013F25', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('14', '0141232955763', 'WXVE2144B10735', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('15', '5162506214337', 'WXVE520017434A', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('16', '4165320792813', 'WXVE9A6147403C', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('17', '3139045162782', 'WXVE74021430B5', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('18', '1204352367159', 'WXVEF210134B50', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('19', '0312651473592', 'WXVE1251B1430F', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('20', '3216475265031', 'WXVE0EDF811334', 'Examination Pins', '2000', '0', '2022-03-19') ; 
INSERT INTO `tbl_exam_pins` VALUES ('21', '7163240355216', 'WXVEBF3411DE01', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('22', '2350673421165', 'WXVEBA8A873E3D', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('23', '1564520637231', 'WXVEE8D4F13101', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('24', '2410625315637', 'WXVE3540471203', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('25', '5745019236123', 'WXVE7241B0513F', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('26', '5532126301746', 'WXVE388EAAB37D', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('27', '3532466107215', 'WXVE11214FB350', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('28', '6501392174352', 'WXVE8DA8B14E33', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('29', '1692240137358', 'WXVE43EA1D3B88', 'Examination Pins', '1000', '0', '2022-03-21') ; 
INSERT INTO `tbl_exam_pins` VALUES ('30', '3652501614237', 'WXVE064710A349', 'Examination Pins', '1000', '0', '2022-03-21') ;
#
# End of data contents of table tbl_exam_pins
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------


#
# Delete any existing table `tbl_reg_pins`
#

DROP TABLE IF EXISTS `tbl_reg_pins`;


#
# Table structure of table `tbl_reg_pins`
#

CREATE TABLE `tbl_reg_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_reg_pins (50 records)
#
 
INSERT INTO `tbl_reg_pins` VALUES ('1', '192636435127850', 'WXVA0314470A', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('2', '227856604533911', 'WXVAD101E348', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('3', '146307525628931', 'WXVA8ADB8733', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('4', '623836521975014', 'WXVA1411D0EF', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('5', '861620455139723', 'WXVA81E1F04D', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('6', '793865120462315', 'WXVA833D8BEA', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('7', '263850257916143', 'WXVA3701B251', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('8', '682456523171390', 'WXVA04F6AC93', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('9', '635284726191503', 'WXVA04423701', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('10', '812356145096273', 'WXVA1B573210', 'Registration Pins', '5000', '0', '2022-03-14') ; 
INSERT INTO `tbl_reg_pins` VALUES ('11', '155383794260126', 'WXVA3ED18304', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('12', '351465892106723', 'WXVA387A38BA', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('13', '023235185679614', 'WXVA3BDA8783', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('14', '357914366821250', 'WXVA9A443160', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('15', '413986703561522', 'WXVA031F1B41', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('16', '529847631230651', 'WXVA014E1DF8', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('17', '256721406383591', 'WXVAB3215701', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('18', '601312325657948', 'WXVA5B1F1203', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('19', '129576602413385', 'WXVA411F350B', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('20', '233816012756459', 'WXVA51B3F012', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('21', '651632713825409', 'WXVA78DA3B83', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('22', '236271439058561', 'WXVA13F7052B', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('23', '523516813620794', 'WXVA883BAE3D', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('24', '971324253568106', 'WXVA24051074', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('25', '220633514965871', 'WXVA42341570', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('26', '360154765138292', 'WXVA46341A90', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('27', '493352718260156', 'WXVA01407423', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('28', '829065346211753', 'WXVA81D3104E', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('29', '132803916725654', 'WXVA33E80D14', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('30', '265276905381143', 'WXVAB78AA833', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('31', '510168976325342', 'WXVAB31025F7', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('32', '297823131556604', 'WXVAE11D041F', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('33', '022541356971836', 'WXVABA8337D8', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('34', '862579511323064', 'WXVAE4B3D318', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('35', '486597250113362', 'WXVA111FB430', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('36', '961032264537815', 'WXVA114BFE01', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('37', '306819552743216', 'WXVA721530B1', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('38', '710396522451386', 'WXVA0A49C63F', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('39', '687219532035614', 'WXVA1371B025', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('40', '750231582391466', 'WXVA83E4BD13', 'Registration Pins', '6000', '0', '2022-04-20') ; 
INSERT INTO `tbl_reg_pins` VALUES ('41', '543191022768653', 'WXVA94063A14', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('42', '873263190452516', 'WXVA1F32B051', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('43', '262538137605419', 'WXVA1E83B3DA', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('44', '061452521789363', 'WXVA14310B1F', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('45', '947611525363820', 'WXVADE048113', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('46', '635976381412025', 'WXVA45210407', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('47', '064722138516935', 'WXVA338DB7A8', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('48', '365121847590263', 'WXVA81AD33BE', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('49', '618752365320941', 'WXVA0A644139', 'Registration Pins', '15000', '0', '2022-04-25') ; 
INSERT INTO `tbl_reg_pins` VALUES ('50', '381329216706545', 'WXVA30741A40', 'Registration Pins', '15000', '0', '2022-04-25') ;
#
# End of data contents of table tbl_reg_pins
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------


#
# Delete any existing table `tbl_result_pins`
#

DROP TABLE IF EXISTS `tbl_result_pins`;


#
# Table structure of table `tbl_result_pins`
#

CREATE TABLE `tbl_result_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_result_pins (10 records)
#
 
INSERT INTO `tbl_result_pins` VALUES ('1', '31520721663459', 'WXVR0963C41A4', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('2', '41638157229530', 'WXVR407315042', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('3', '83426719031525', 'WXVRB011053F2', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('4', '47921533665021', 'WXVRD33A78A8B', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('5', '27801563594321', 'WXVR9416C034A', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('6', '96210783554132', 'WXVRF25B73101', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('7', '42072351936815', 'WXVR138D34E01', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('8', '62295105341783', 'WXVR543120740', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('9', '22639140557163', 'WXVR27010443A', 'Result Checker Pins', '500', '0', '2022-03-16') ; 
INSERT INTO `tbl_result_pins` VALUES ('10', '36312597481025', 'WXVR37F21B150', 'Result Checker Pins', '500', '0', '2022-03-16') ;
#
# End of data contents of table tbl_result_pins
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------


#
# Delete any existing table `tbl_serial`
#

DROP TABLE IF EXISTS `tbl_serial`;


#
# Table structure of table `tbl_serial`
#

CREATE TABLE `tbl_serial` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `serial_key` varchar(225) DEFAULT NULL,
  `activation_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_serial (0 records)
#

#
# End of data contents of table tbl_serial
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------


#
# Delete any existing table `tbl_settings`
#

DROP TABLE IF EXISTS `tbl_settings`;


#
# Table structure of table `tbl_settings`
#

CREATE TABLE `tbl_settings` (
  `config_id` int(1) NOT NULL,
  `web_name` varchar(255) DEFAULT NULL,
  `web_slogan` varchar(255) DEFAULT NULL,
  `welcome_msg` text DEFAULT NULL,
  `office_email` varchar(255) DEFAULT NULL,
  `office_address` text DEFAULT NULL,
  `customer_care` varchar(50) DEFAULT NULL,
  `office_phone` varchar(50) DEFAULT NULL,
  `day_from` varchar(255) DEFAULT NULL,
  `day_to` varchar(50) DEFAULT NULL,
  `time_from` varchar(50) DEFAULT NULL,
  `time_to` varchar(50) DEFAULT NULL,
  `web_logo` varchar(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_settings (1 records)
#
 
INSERT INTO `tbl_settings` VALUES ('1', 'Osotech School Portal', 'All about your Satisfaction', 'Welcome to Osotech School Portal  This is just a demo welcome message to all Users short', 'info@osotechsoftware.com.ng', 'Sango Ota Ogun state', '08000990090', '09098989878', 'Monday', 'Friday', '9:00 am', '5:00 pm', 'logo_04040fedb9.png', 'Ogun State', 'Sango Ota', 'Nigeria') ;
#
# End of data contents of table tbl_settings
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_class_grade_tbl`
#

DROP TABLE IF EXISTS `visap_class_grade_tbl`;


#
# Table structure of table `visap_class_grade_tbl`
#

CREATE TABLE `visap_class_grade_tbl` (
  `gradeId` int(11) NOT NULL AUTO_INCREMENT,
  `gradeDesc` varchar(50) DEFAULT NULL,
  `grade_division` varchar(2) DEFAULT NULL,
  `grade_dept` varchar(50) DEFAULT NULL,
  `grade_teacher` int(11) DEFAULT NULL,
  `grade_status` enum('pending','active','closed') NOT NULL DEFAULT 'active',
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`gradeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_class_grade_tbl (3 records)
#
 
INSERT INTO `visap_class_grade_tbl` VALUES ('3', 'BASIC I', 'A', 'none', NULL, 'active', '2022-04-20') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('4', 'BASIC II', 'A', 'none', NULL, 'pending', '2022-04-20') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('6', 'KG1', 'A', 'none', NULL, 'active', '2022-04-29') ;
#
# End of data contents of table visap_class_grade_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_classnote_tbl`
#

DROP TABLE IF EXISTS `visap_classnote_tbl`;


#
# Table structure of table `visap_classnote_tbl`
#

CREATE TABLE `visap_classnote_tbl` (
  `noteId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `std_id` bigint(20) unsigned DEFAULT NULL,
  `reg_number` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `subjectId` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `subtopic` varchar(255) DEFAULT NULL,
  `note_content` text DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`noteId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_classnote_tbl (1 records)
#
 
INSERT INTO `visap_classnote_tbl` VALUES ('1', '1', 'GSSOTA/00001', 'JSS1', '5', 'Noun', 'Type of Nouns', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit suscipit quis debitis fuga doloremque modi fugiat illum odio laboriosam sit eum, temporibus consectetur iste nesciunt aliquid ipsum porro? Sequi quidem, labore magnam aut voluptas ipsum ea! Fugit voluptatibus temporibus ipsam laudantium tempora saepe repellendus ab ducimus iusto corporis, quae. Dolore commodi molestiae explicabo nesciunt quisquam sit, adipisci nisi unde? Odit commodi saepe temporibus nesciunt accusamus. Dolorum autem reprehenderit eveniet ex voluptas repellat architecto nam minima quam ipsum. Illo, tenetur, voluptas. Earum optio iste vitae atque voluptas, blanditiis, ex minima rerum omnis. Deleniti iure id et obcaecati dignissimos maiores vitae velit<br></p>', '1', '1st Term', '2021/2022', '2022-04-09') ;
#
# End of data contents of table visap_classnote_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_fee_component_tbl`
#

DROP TABLE IF EXISTS `visap_fee_component_tbl`;


#
# Table structure of table `visap_fee_component_tbl`
#

CREATE TABLE `visap_fee_component_tbl` (
  `compId` int(11) NOT NULL AUTO_INCREMENT,
  `feeType` varchar(100) DEFAULT NULL,
  `fee_status` enum('Pending','Active') DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`compId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_fee_component_tbl (3 records)
#
 
INSERT INTO `visap_fee_component_tbl` VALUES ('1', 'TUITION', 'Active', '2022-04-29') ; 
INSERT INTO `visap_fee_component_tbl` VALUES ('2', 'MUSIC', 'Active', '2022-04-29') ; 
INSERT INTO `visap_fee_component_tbl` VALUES ('3', 'ICT', 'Active', '2022-05-02') ;
#
# End of data contents of table visap_fee_component_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_loan_tbl`
#

DROP TABLE IF EXISTS `visap_loan_tbl`;


#
# Table structure of table `visap_loan_tbl`
#

CREATE TABLE `visap_loan_tbl` (
  `loanId` int(11) NOT NULL AUTO_INCREMENT,
  `staffName` varchar(255) NOT NULL,
  `capitalAmount` float DEFAULT NULL,
  `interesetRate` float DEFAULT NULL,
  `paybackYears` float DEFAULT NULL,
  `monthlyPayment` float DEFAULT NULL,
  `totalPayment` float DEFAULT NULL,
  `totalInterest` float DEFAULT NULL,
  `loanStatus` tinyint(1) NOT NULL DEFAULT 0,
  `cterm` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `submitted_date` date DEFAULT NULL,
  `returnedAmount` float DEFAULT NULL,
  `due` float DEFAULT NULL,
  PRIMARY KEY (`loanId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_loan_tbl (1 records)
#
 
INSERT INTO `visap_loan_tbl` VALUES ('1', 'Mr Adeola Ademola', '100000', '3', '1', '8469.37', '101632', '1632.44', '1', '1st Term', '2020/2021', '2022-04-29', '0', '101632') ;
#
# End of data contents of table visap_loan_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_result_grading_tbl`
#

DROP TABLE IF EXISTS `visap_result_grading_tbl`;


#
# Table structure of table `visap_result_grading_tbl`
#

CREATE TABLE `visap_result_grading_tbl` (
  `grading_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_class` varchar(20) NOT NULL,
  `mark_grade` varchar(3) DEFAULT NULL,
  `score_from` int(4) DEFAULT 0,
  `score_to` int(4) DEFAULT NULL,
  `score_remark` varchar(50) DEFAULT NULL,
  `school_ses` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`grading_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_result_grading_tbl (21 records)
#
 
INSERT INTO `visap_result_grading_tbl` VALUES ('1', 'Pry', 'A', '77', '100', 'Excellence', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('2', 'Pry', 'B', '65', '69', 'V.Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('3', 'Pry', 'C', '55', '59', 'Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('4', 'Pry', 'D', '45', '49', 'Poor', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('5', 'Pry', 'E', '35', '39', 'Fair', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('6', 'Pry', 'F', '10', '28', 'Failed', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('7', 'Junior', 'A', '70', '100', 'Excellence', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('8', 'Junior', 'B', '60', '69', 'V.Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('9', 'Junior', 'C', '50', '59', 'Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('10', 'Junior', 'D', '40', '49', 'Poor', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('11', 'Junior', 'E', '30', '39', 'Fair', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('12', 'Junior', 'F', '5', '29', 'Fail', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('13', 'Senior', 'A1', '90', '100', 'Distinction', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('14', 'Senior', 'B2', '77', '79', 'Excellence', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('15', 'Senior', 'B3', '69', '74', 'Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('16', 'Senior', 'C4', '65', '69', 'Credit', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('17', 'Senior', 'C5', '61', '64', 'Credit', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('18', 'Senior', 'C6', '55', '59', 'Pass', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('19', 'Senior', 'D7', '40', '49', 'Pass', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('20', 'Senior', 'E8', '35', '39', 'Poor', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('21', 'Senior', 'F9', '10', '29', 'Failed', '2021/2022') ;
#
# End of data contents of table visap_result_grading_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_school_expense_tbl`
#

DROP TABLE IF EXISTS `visap_school_expense_tbl`;


#
# Table structure of table `visap_school_expense_tbl`
#

CREATE TABLE `visap_school_expense_tbl` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_desc` text DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `cterm` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_expense_tbl (0 records)
#

#
# End of data contents of table visap_school_expense_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_school_fee_allocation_tbl`
#

DROP TABLE IF EXISTS `visap_school_fee_allocation_tbl`;


#
# Table structure of table `visap_school_fee_allocation_tbl`
#

CREATE TABLE `visap_school_fee_allocation_tbl` (
  `faId` int(11) NOT NULL AUTO_INCREMENT,
  `component_id` varchar(50) DEFAULT NULL,
  `gradeDesc` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`faId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_fee_allocation_tbl (3 records)
#
 
INSERT INTO `visap_school_fee_allocation_tbl` VALUES ('1', 'TUITION', 'BASIC I', '20000', '2022-04-29', NULL) ; 
INSERT INTO `visap_school_fee_allocation_tbl` VALUES ('2', 'MUSIC', 'BASIC I', '7000', '2022-04-29', NULL) ; 
INSERT INTO `visap_school_fee_allocation_tbl` VALUES ('3', 'ICT', 'BASIC I', '40000', '2022-05-02', NULL) ;
#
# End of data contents of table visap_school_fee_allocation_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_school_session_history_tbl`
#

DROP TABLE IF EXISTS `visap_school_session_history_tbl`;


#
# Table structure of table `visap_school_session_history_tbl`
#

CREATE TABLE `visap_school_session_history_tbl` (
  `sehisId` int(1) NOT NULL AUTO_INCREMENT,
  `active_session` varchar(50) NOT NULL,
  `active_term` varchar(20) NOT NULL,
  `Days_open` int(3) NOT NULL,
  `Weeks_open` int(3) NOT NULL,
  `term_ended` date NOT NULL,
  `new_term_begins` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`sehisId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_session_history_tbl (1 records)
#
 
INSERT INTO `visap_school_session_history_tbl` VALUES ('1', '2020/2021', '1st Term', '46', '12', '2022-03-11', '2022-05-16', '2022-04-25') ;
#
# End of data contents of table visap_school_session_history_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_school_session_tbl`
#

DROP TABLE IF EXISTS `visap_school_session_tbl`;


#
# Table structure of table `visap_school_session_tbl`
#

CREATE TABLE `visap_school_session_tbl` (
  `seId` int(1) NOT NULL,
  `active_session` varchar(50) NOT NULL,
  `active_term` enum('1st Term','2nd Term','3rd Term') NOT NULL DEFAULT '1st Term',
  `Days_open` int(3) NOT NULL,
  `Weeks_open` int(3) NOT NULL,
  `term_ended` date NOT NULL,
  `new_term_begins` date NOT NULL,
  PRIMARY KEY (`seId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_session_tbl (1 records)
#
 
INSERT INTO `visap_school_session_tbl` VALUES ('1', '2020/2021', '1st Term', '46', '12', '2022-03-11', '2022-05-16') ;
#
# End of data contents of table visap_school_session_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------


#
# Delete any existing table `visap_session_list`
#

DROP TABLE IF EXISTS `visap_session_list`;


#
# Table structure of table `visap_session_list`
#

CREATE TABLE `visap_session_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_session_list (1 records)
#
 
INSERT INTO `visap_session_list` VALUES ('1', '2020/2021') ;
#
# End of data contents of table visap_session_list
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_staff_bank_details_tbl`
#

DROP TABLE IF EXISTS `visap_staff_bank_details_tbl`;


#
# Table structure of table `visap_staff_bank_details_tbl`
#

CREATE TABLE `visap_staff_bank_details_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_bank_details_tbl (1 records)
#
 
INSERT INTO `visap_staff_bank_details_tbl` VALUES ('1', '1', 'First Bank Plc', 'Agberayi Samson Idowu', 'Saving', '3107991990', '2022-05-02') ;
#
# End of data contents of table visap_staff_bank_details_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_staff_duty_tbl`
#

DROP TABLE IF EXISTS `visap_staff_duty_tbl`;


#
# Table structure of table `visap_staff_duty_tbl`
#

CREATE TABLE `visap_staff_duty_tbl` (
  `duty_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) DEFAULT NULL,
  `duty` varchar(255) DEFAULT NULL,
  `duty_week` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`duty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_duty_tbl (0 records)
#

#
# End of data contents of table visap_staff_duty_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_staff_paid_salary_tbl`
#

DROP TABLE IF EXISTS `visap_staff_paid_salary_tbl`;


#
# Table structure of table `visap_staff_paid_salary_tbl`
#

CREATE TABLE `visap_staff_paid_salary_tbl` (
  `salaryId` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `forMonth` varchar(50) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `bank_status` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`salaryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_paid_salary_tbl (0 records)
#

#
# End of data contents of table visap_staff_paid_salary_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_staff_payroll_tbl`
#

DROP TABLE IF EXISTS `visap_staff_payroll_tbl`;


#
# Table structure of table `visap_staff_payroll_tbl`
#

CREATE TABLE `visap_staff_payroll_tbl` (
  `payrollId` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `rent_alawi` float DEFAULT NULL,
  `transport_alawi` float DEFAULT NULL,
  `cloth_alawi` float DEFAULT NULL,
  `med_alawi` float DEFAULT NULL,
  `tds` float DEFAULT NULL,
  `net_salary` float DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`payrollId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_payroll_tbl (1 records)
#
 
INSERT INTO `visap_staff_payroll_tbl` VALUES ('1', '1', '35000', '2000', '3000', '5000', '1000', '2000', '44000', '2022-04-30') ;
#
# End of data contents of table visap_staff_payroll_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_staff_tbl`
#

DROP TABLE IF EXISTS `visap_staff_tbl`;


#
# Table structure of table `visap_staff_tbl`
#

CREATE TABLE `visap_staff_tbl` (
  `staffId` int(11) NOT NULL AUTO_INCREMENT,
  `staffRegNo` varchar(50) DEFAULT NULL,
  `staffGrade` varchar(50) DEFAULT NULL,
  `staffRole` enum('Principal','Teacher','Bursar','Receptionist') NOT NULL DEFAULT 'Teacher',
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `staffEmail` varchar(160) NOT NULL,
  `staffPass` varchar(255) DEFAULT NULL,
  `staffUser` varchar(50) DEFAULT NULL,
  `staffDob` date DEFAULT NULL,
  `staffEducation` varchar(100) DEFAULT NULL,
  `staffPhone` varchar(50) DEFAULT NULL,
  `staffCourse` varchar(255) DEFAULT NULL,
  `staffAddress` text DEFAULT NULL,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `staffToken` varchar(100) DEFAULT NULL,
  `tokenExpire` datetime DEFAULT NULL,
  `staffPassport` varchar(255) DEFAULT NULL,
  `staffGender` enum('Male','Female','Other') DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `portalEmail` varchar(100) DEFAULT NULL,
  `jobStatus` tinyint(1) NOT NULL DEFAULT 0,
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `staffType` enum('Teaching','Non-Teaching') DEFAULT NULL,
  `appliedDate` date DEFAULT NULL,
  PRIMARY KEY (`staffId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_tbl (1 records)
#
 
INSERT INTO `visap_staff_tbl` VALUES ('1', 'GSS/STA/0001', 'BASIC I', 'Principal', 'Oiza B', 'Agberayi', 'staff@gmail.com', '$2y$10$Eov/d7JF5duy0zczFy6CD.U8S/fJEYnXvMviM5FFKr8aJbCF.l.aK', 'oiza', '1999-08-11', 'BSc English', '09036533063', 'English Langugae', 'Sango Ota, Ogun state', '233233dfffdf', NULL, '2022-05-02 14:48:49', NULL, 'Female', 'Married', 'oiza@gssota.com', '1', '0', 'Teaching', '2022-05-01') ;
#
# End of data contents of table visap_staff_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_stdmedical_tbl`
#

DROP TABLE IF EXISTS `visap_stdmedical_tbl`;


#
# Table structure of table `visap_stdmedical_tbl`
#

CREATE TABLE `visap_stdmedical_tbl` (
  `medicalId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `studId` bigint(20) unsigned NOT NULL,
  `stdHospitalName` varchar(255) DEFAULT NULL,
  `stdHospitalOwner` varchar(255) DEFAULT NULL,
  `stdHospitalPhone` varchar(20) DEFAULT NULL,
  `stdRegDate` date DEFAULT NULL,
  `stdHospitalAddress` text DEFAULT NULL,
  `stdBlood` varchar(20) DEFAULT NULL,
  `stdGenotype` varchar(5) DEFAULT NULL,
  `stdSickness` varchar(100) DEFAULT NULL,
  `stdFamilySickness` varchar(100) DEFAULT NULL,
  `stdIsHospitalized` tinyint(1) DEFAULT NULL COMMENT '0=No, 1=Yes',
  `stdSurgical` tinyint(1) DEFAULT NULL COMMENT '0=No, 1=Yes',
  `stdLastScanedReport` varchar(255) DEFAULT NULL,
  `stdBcertificate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`medicalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_stdmedical_tbl (0 records)
#

#
# End of data contents of table visap_stdmedical_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------


#
# Delete any existing table `visap_stdpreschlinfo`
#

DROP TABLE IF EXISTS `visap_stdpreschlinfo`;


#
# Table structure of table `visap_stdpreschlinfo`
#

CREATE TABLE `visap_stdpreschlinfo` (
  `preId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) unsigned NOT NULL,
  `stdSchoolName` varchar(255) DEFAULT NULL,
  `stdDirectorName` varchar(100) DEFAULT NULL,
  `stdSchoolPhone` varchar(20) DEFAULT NULL,
  `stdSchLocation` text DEFAULT NULL,
  `stdSchoolType` varchar(50) DEFAULT NULL,
  `stdSchlCat` varchar(50) DEFAULT NULL,
  `stdSchlEduLevel` varchar(50) DEFAULT NULL,
  `stdPresentClass` varchar(50) DEFAULT NULL,
  `stdReasonInPreClass` text DEFAULT NULL,
  `stdLastReportSheet` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`preId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_stdpreschlinfo (0 records)
#

#
# End of data contents of table visap_stdpreschlinfo
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_info_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_student_info_tbl`
#

DROP TABLE IF EXISTS `visap_student_info_tbl`;


#
# Table structure of table `visap_student_info_tbl`
#

CREATE TABLE `visap_student_info_tbl` (
  `stdInfoId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `studentId` bigint(20) unsigned NOT NULL,
  `stdBirthCert` varchar(50) DEFAULT NULL,
  `stdCountry` varchar(50) DEFAULT NULL,
  `stdSOR` varchar(100) DEFAULT NULL,
  `stdLGA` varchar(100) DEFAULT NULL,
  `stdHomeTown` varchar(50) DEFAULT NULL,
  `stdReligion` varchar(50) DEFAULT NULL,
  `stdDisability` varchar(50) DEFAULT NULL,
  `stdPermaAdd` text DEFAULT NULL,
  `stdMGTitle` varchar(50) DEFAULT NULL COMMENT 'MG= Male Guardian ',
  `stdMGName` varchar(255) DEFAULT NULL,
  `stdMGRelationship` varchar(50) DEFAULT NULL,
  `stdMGPhone` varchar(20) DEFAULT NULL,
  `stdMGEmail` varchar(100) DEFAULT NULL,
  `stdMGOccupation` varchar(255) DEFAULT NULL,
  `stdMGAddress` text DEFAULT NULL,
  `stdFGTitle` varchar(50) DEFAULT NULL COMMENT 'FG = Female Guardian',
  `stdFGName` varchar(255) DEFAULT NULL,
  `stdFGRelationship` varchar(50) DEFAULT NULL,
  `stdFGPhone` varchar(20) DEFAULT NULL,
  `stdFGEmail` varchar(100) DEFAULT NULL,
  `stdFGOccupation` varchar(255) DEFAULT NULL,
  `stdFGAddress` text DEFAULT NULL,
  PRIMARY KEY (`stdInfoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_info_tbl (0 records)
#

#
# End of data contents of table visap_student_info_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_info_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_history_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_student_payment_history_tbl`
#

DROP TABLE IF EXISTS `visap_student_payment_history_tbl`;


#
# Table structure of table `visap_student_payment_history_tbl`
#

CREATE TABLE `visap_student_payment_history_tbl` (
  `phId` bigint(20) NOT NULL AUTO_INCREMENT,
  `std_id` bigint(20) NOT NULL,
  `stdAdmNo` varchar(50) NOT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `component_fee` varchar(100) DEFAULT NULL,
  `total_fee` double DEFAULT NULL,
  `fee_paid` double DEFAULT NULL,
  `fee_due` double DEFAULT NULL,
  `payment_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=not paid,1=not cleared,2=cleared',
  `payment_date` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `sch_session` varchar(20) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `teller` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `collectedBy` varchar(100) DEFAULT NULL,
  `today_date` date DEFAULT NULL,
  PRIMARY KEY (`phId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_payment_history_tbl (1 records)
#
 
INSERT INTO `visap_student_payment_history_tbl` VALUES ('1', '1', 'GSS/STD/0001', 'BASIC I', 'MUSIC', '7000', '4000', '3000', '1', '2022-04-29', '1st Term', '2020/2021', 'Cash', NULL, NULL, '1', '2022-04-29') ;
#
# End of data contents of table visap_student_payment_history_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_info_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_student_payment_tbl`
#

DROP TABLE IF EXISTS `visap_student_payment_tbl`;


#
# Table structure of table `visap_student_payment_tbl`
#

CREATE TABLE `visap_student_payment_tbl` (
  `paymentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `std_id` bigint(20) NOT NULL,
  `stdAdmNo` varchar(50) NOT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `component_fee` varchar(100) DEFAULT NULL,
  `total_fee` double DEFAULT NULL,
  `fee_paid` double DEFAULT NULL,
  `fee_due` double DEFAULT NULL,
  `payment_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=not paid,1=not cleared,2=cleared',
  `payment_date` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `sch_session` varchar(20) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `teller` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `collectedBy` varchar(100) DEFAULT NULL,
  `today_date` date DEFAULT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_payment_tbl (1 records)
#
 
INSERT INTO `visap_student_payment_tbl` VALUES ('1', '1', 'GSS/STD/0001', 'BASIC I', 'MUSIC', '7000', '4000', '3000', '1', '2022-04-29', '1st Term', '2020/2021', 'Cash', NULL, NULL, '1', '2022-04-29') ;
#
# End of data contents of table visap_student_payment_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_info_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_student_tbl`
#

DROP TABLE IF EXISTS `visap_student_tbl`;


#
# Table structure of table `visap_student_tbl`
#

CREATE TABLE `visap_student_tbl` (
  `stdId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stdRegNo` varchar(20) DEFAULT NULL,
  `stdEmail` varchar(160) DEFAULT NULL,
  `stdUserName` varchar(50) DEFAULT NULL,
  `stdPassword` varchar(255) DEFAULT NULL,
  `studentClass` varchar(50) DEFAULT NULL,
  `stdSurName` varchar(100) DEFAULT NULL,
  `stdFirstName` varchar(50) DEFAULT NULL,
  `stdMiddleName` varchar(50) NOT NULL,
  `stdDob` date DEFAULT NULL,
  `stdGender` varchar(20) DEFAULT NULL,
  `stdAddress` text DEFAULT NULL,
  `stdPhone` varchar(20) DEFAULT NULL,
  `stdAdmStatus` enum('Pending','Active','Expelled','Suspended','Transfered','Graduated') NOT NULL DEFAULT 'Pending',
  `stdApplyDate` date DEFAULT NULL,
  `stdApplyType` enum('Day','Boarding') NOT NULL DEFAULT 'Day',
  `stdPassport` varchar(255) DEFAULT NULL,
  `stdConfToken` varchar(255) DEFAULT NULL,
  `stdTokenExp` datetime DEFAULT NULL,
  PRIMARY KEY (`stdId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_tbl (1 records)
#
 
INSERT INTO `visap_student_tbl` VALUES ('1', 'GSS/STD/0001', 'student@gssota.com', 'Student', 'student', 'BASIC I', 'Glory', 'Supreme', 'Joy', '2001-08-04', 'Male', 'Sample address', '08131364443', 'Active', '2022-04-22', 'Day', NULL, '09876l4xa31', '2022-04-22 15:37:07') ;
#
# End of data contents of table visap_student_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_info_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_termly_result_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_termly_result_tbl`
#

DROP TABLE IF EXISTS `visap_termly_result_tbl`;


#
# Table structure of table `visap_termly_result_tbl`
#

CREATE TABLE `visap_termly_result_tbl` (
  `reportId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `studentId` bigint(20) unsigned DEFAULT NULL,
  `stdRegCode` varchar(50) DEFAULT NULL,
  `studentGrade` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `aca_session` varchar(50) DEFAULT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `ca` int(3) DEFAULT NULL,
  `test1` int(3) DEFAULT NULL,
  `test2` int(3) DEFAULT NULL,
  `exam` int(3) DEFAULT NULL,
  `overallMark` int(4) DEFAULT NULL,
  `subjectRank` int(4) DEFAULT NULL,
  `uploadedTime` time DEFAULT NULL,
  `uploadedDate` date DEFAULT NULL,
  `rStatus` smallint(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`reportId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_termly_result_tbl (0 records)
#

#
# End of data contents of table visap_termly_result_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_info_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_termly_result_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_virtual_lesson_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_virtual_lesson_tbl`
#

DROP TABLE IF EXISTS `visap_virtual_lesson_tbl`;


#
# Table structure of table `visap_virtual_lesson_tbl`
#

CREATE TABLE `visap_virtual_lesson_tbl` (
  `lectureId` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_file` varchar(255) DEFAULT NULL,
  `lesson_topic` varchar(255) DEFAULT NULL,
  `lesson_grade` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `teacher` int(11) DEFAULT NULL,
  `file_type` varchar(10) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `uploaded_date` date DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`lectureId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_virtual_lesson_tbl (1 records)
#
 
INSERT INTO `visap_virtual_lesson_tbl` VALUES ('2', '20220429626bdf00d153e9635165123.mp3', 'Sample', 'BASIC I', 'Biology', '1', 'audio/mp3', 'sample two', '2023-02-18', '2022-04-29', '0') ;
#
# End of data contents of table visap_virtual_lesson_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Tuesday 3. May 2022 11:09 WAT
# Hostname: localhost
# Database: `gssota`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `reg_pin_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `register_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_classes`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_subjects`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_admin`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_ewallet_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_exam_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_reg_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_result_pins`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_grading_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_expense_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_fee_allocation_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_session_list`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdmedical_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_stdpreschlinfo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_info_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_history_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_payment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_student_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_termly_result_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_virtual_lesson_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visitor_book`
# --------------------------------------------------------


#
# Delete any existing table `visitor_book`
#

DROP TABLE IF EXISTS `visitor_book`;


#
# Table structure of table `visitor_book`
#

CREATE TABLE `visitor_book` (
  `visitor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_phone` varchar(50) DEFAULT NULL,
  `visitor_address` text DEFAULT NULL,
  `whom_to_see` varchar(255) DEFAULT NULL,
  `purpose_of_visit` text DEFAULT NULL,
  `checkIn_time` datetime DEFAULT NULL,
  `checkOut_time` datetime DEFAULT NULL,
  `NIN_number` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `cterm` varchar(50) DEFAULT NULL,
  `cses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visitor_book (5 records)
#
 
INSERT INTO `visitor_book` VALUES ('1', 'Agberayi Samson Idowu', '08121218887', 'Sango Ota Ogun State', 'Principal', 'Official', '2022-03-18 10:25:30', '2022-03-18 10:31:26', '08122769098', '1', '2022-03-18', 'First Term', '2021/2022') ; 
INSERT INTO `visitor_book` VALUES ('2', 'OJO ADE', '09087654321', 'SANGO', 'MRS ADEFUNKE', 'FAMILY MATTER', '2022-03-21 10:50:36', '2022-03-21 10:51:02', '09897654321', '1', '2022-03-21', 'First Term', '2021/2022') ; 
INSERT INTO `visitor_book` VALUES ('3', 'sam', '789075665', 'cddss', 'Principal', 'official', '2022-03-25 01:53:14', '2022-03-25 13:53:44', '343445434434', '1', '2022-03-25', 'First Term', '2021/2022') ; 
INSERT INTO `visitor_book` VALUES ('4', 'MR AJAO', '5995476956', 'SANGO OTA', 'HM', 'OFFICIAL', '2022-03-25 02:19:43', '2022-03-25 14:20:35', '4545454545554', '1', '2022-03-25', 'First Term', '2021/2022') ; 
INSERT INTO `visitor_book` VALUES ('5', 'Samson Adeosun B', '08131374443', 'Sango Ota, Ijoko road, Ogun State', 'Senior Prefect Boy', 'Personal', '2022-05-02 11:23:11', '2022-05-02 23:27:00', '090989876543', '1', '2022-05-02', 'First Term', '2021/2022') ;
#
# End of data contents of table visitor_book
# --------------------------------------------------------

