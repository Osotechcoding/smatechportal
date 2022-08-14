# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `api_user` varchar(50) NOT NULL,
  `api_pass` varchar(50) NOT NULL,
  `api_def` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module` (`module`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table api_module_config (11 records)
#
 
INSERT INTO `api_module_config` VALUES ('1', 'student_registration', 'registration', 'Student Registration', 'Enabling this Will allow old students to Register ion the portal', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('3', 'student_login', 'login', 'Student Login', 'When Enabled, students will be allowed to log in', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('4', 'staff_registration', 'registration', 'Staff Registration', 'When enabled, new Staff can register him or herself', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('6', 'staff_login', 'login', 'Staff Login', 'When enabled, staff will be able to log in', '1', '', '', '') ; 
INSERT INTO `api_module_config` VALUES ('14', 'maintenance_mode', 'main', 'Maintenance Mode', 'When this is turned on, the portal puts itself to maintenence mode', '1', '', '', '') ; 
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
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
 
INSERT INTO `current_session_tbl` VALUES ('1', '2021/2022', '3rd Term') ;
#
# End of data contents of table current_session_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
# --------------------------------------------------------


#
# Delete any existing table `local_govt_tbl`
#

DROP TABLE IF EXISTS `local_govt_tbl`;


#
# Table structure of table `local_govt_tbl`
#

CREATE TABLE `local_govt_tbl` (
  `local_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT NULL,
  `local_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`local_id`)
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table local_govt_tbl (774 records)
#
 
INSERT INTO `local_govt_tbl` VALUES ('1', '1', 'Aba North') ; 
INSERT INTO `local_govt_tbl` VALUES ('2', '1', 'Aba South') ; 
INSERT INTO `local_govt_tbl` VALUES ('3', '1', 'Arochukwu') ; 
INSERT INTO `local_govt_tbl` VALUES ('4', '1', 'Bende') ; 
INSERT INTO `local_govt_tbl` VALUES ('5', '1', 'Ikwuano') ; 
INSERT INTO `local_govt_tbl` VALUES ('6', '1', 'Isiala Ngwa North') ; 
INSERT INTO `local_govt_tbl` VALUES ('7', '1', 'Isiala Ngwa South') ; 
INSERT INTO `local_govt_tbl` VALUES ('8', '1', 'Isuikwuato') ; 
INSERT INTO `local_govt_tbl` VALUES ('9', '1', 'Obi Ngwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('10', '1', 'Ohafia') ; 
INSERT INTO `local_govt_tbl` VALUES ('11', '1', 'Osisioma') ; 
INSERT INTO `local_govt_tbl` VALUES ('12', '1', 'Ugwunagbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('13', '1', 'Ukwa East') ; 
INSERT INTO `local_govt_tbl` VALUES ('14', '1', 'Ukwa West') ; 
INSERT INTO `local_govt_tbl` VALUES ('15', '1', 'Umuahia North') ; 
INSERT INTO `local_govt_tbl` VALUES ('16', '1', 'Umuahia South') ; 
INSERT INTO `local_govt_tbl` VALUES ('17', '1', 'Umu Nneochi') ; 
INSERT INTO `local_govt_tbl` VALUES ('18', '2', 'Demsa') ; 
INSERT INTO `local_govt_tbl` VALUES ('19', '2', 'Fufure') ; 
INSERT INTO `local_govt_tbl` VALUES ('20', '2', 'Ganye') ; 
INSERT INTO `local_govt_tbl` VALUES ('21', '2', 'Gayuk') ; 
INSERT INTO `local_govt_tbl` VALUES ('22', '2', 'Gombi') ; 
INSERT INTO `local_govt_tbl` VALUES ('23', '2', 'Grie') ; 
INSERT INTO `local_govt_tbl` VALUES ('24', '2', 'Hong') ; 
INSERT INTO `local_govt_tbl` VALUES ('25', '2', 'Jada') ; 
INSERT INTO `local_govt_tbl` VALUES ('26', '2', 'Lamurde') ; 
INSERT INTO `local_govt_tbl` VALUES ('27', '2', 'Madagali') ; 
INSERT INTO `local_govt_tbl` VALUES ('28', '2', 'Maiha') ; 
INSERT INTO `local_govt_tbl` VALUES ('29', '2', 'Mayo Belwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('30', '2', 'Michika') ; 
INSERT INTO `local_govt_tbl` VALUES ('31', '2', 'Mubi North') ; 
INSERT INTO `local_govt_tbl` VALUES ('32', '2', 'Mubi South') ; 
INSERT INTO `local_govt_tbl` VALUES ('33', '2', 'Numan') ; 
INSERT INTO `local_govt_tbl` VALUES ('34', '2', 'Shelleng') ; 
INSERT INTO `local_govt_tbl` VALUES ('35', '2', 'Song') ; 
INSERT INTO `local_govt_tbl` VALUES ('36', '2', 'Toungo') ; 
INSERT INTO `local_govt_tbl` VALUES ('37', '2', 'Yola North') ; 
INSERT INTO `local_govt_tbl` VALUES ('38', '2', 'Yola South') ; 
INSERT INTO `local_govt_tbl` VALUES ('39', '3', 'Abak') ; 
INSERT INTO `local_govt_tbl` VALUES ('40', '3', 'Eastern Obolo') ; 
INSERT INTO `local_govt_tbl` VALUES ('41', '3', 'Eket') ; 
INSERT INTO `local_govt_tbl` VALUES ('42', '3', 'Esit Eket') ; 
INSERT INTO `local_govt_tbl` VALUES ('43', '3', 'Essien Udim') ; 
INSERT INTO `local_govt_tbl` VALUES ('44', '3', 'Etim Ekpo') ; 
INSERT INTO `local_govt_tbl` VALUES ('45', '3', 'Etinan') ; 
INSERT INTO `local_govt_tbl` VALUES ('46', '3', 'Ibeno') ; 
INSERT INTO `local_govt_tbl` VALUES ('47', '3', 'Ibesikpo Asutan') ; 
INSERT INTO `local_govt_tbl` VALUES ('48', '3', 'Ibiono-Ibom') ; 
INSERT INTO `local_govt_tbl` VALUES ('49', '3', 'Ika') ; 
INSERT INTO `local_govt_tbl` VALUES ('50', '3', 'Ikono') ; 
INSERT INTO `local_govt_tbl` VALUES ('51', '3', 'Ikot Abasi') ; 
INSERT INTO `local_govt_tbl` VALUES ('52', '3', 'Ikot Ekpene') ; 
INSERT INTO `local_govt_tbl` VALUES ('53', '3', 'Ini') ; 
INSERT INTO `local_govt_tbl` VALUES ('54', '3', 'Itu') ; 
INSERT INTO `local_govt_tbl` VALUES ('55', '3', 'Mbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('56', '3', 'Mkpat-Enin') ; 
INSERT INTO `local_govt_tbl` VALUES ('57', '3', 'Nsit-Atai') ; 
INSERT INTO `local_govt_tbl` VALUES ('58', '3', 'Nsit-Ibom') ; 
INSERT INTO `local_govt_tbl` VALUES ('59', '3', 'Nsit-Ubium') ; 
INSERT INTO `local_govt_tbl` VALUES ('60', '3', 'Obot Akara') ; 
INSERT INTO `local_govt_tbl` VALUES ('61', '3', 'Okobo') ; 
INSERT INTO `local_govt_tbl` VALUES ('62', '3', 'Onna') ; 
INSERT INTO `local_govt_tbl` VALUES ('63', '3', 'Oron') ; 
INSERT INTO `local_govt_tbl` VALUES ('64', '3', 'Oruk Anam') ; 
INSERT INTO `local_govt_tbl` VALUES ('65', '3', 'Udung-Uko') ; 
INSERT INTO `local_govt_tbl` VALUES ('66', '3', 'Ukanafun') ; 
INSERT INTO `local_govt_tbl` VALUES ('67', '3', 'Uruan') ; 
INSERT INTO `local_govt_tbl` VALUES ('68', '3', 'Urue-Offong/Oruko') ; 
INSERT INTO `local_govt_tbl` VALUES ('69', '3', 'Uyo') ; 
INSERT INTO `local_govt_tbl` VALUES ('70', '4', 'Aguata') ; 
INSERT INTO `local_govt_tbl` VALUES ('71', '4', 'Anambra East') ; 
INSERT INTO `local_govt_tbl` VALUES ('72', '4', 'Anambra West') ; 
INSERT INTO `local_govt_tbl` VALUES ('73', '4', 'Anaocha') ; 
INSERT INTO `local_govt_tbl` VALUES ('74', '4', 'Awka North') ; 
INSERT INTO `local_govt_tbl` VALUES ('75', '4', 'Awka South') ; 
INSERT INTO `local_govt_tbl` VALUES ('76', '4', 'Ayamelum') ; 
INSERT INTO `local_govt_tbl` VALUES ('77', '4', 'Dunukofia') ; 
INSERT INTO `local_govt_tbl` VALUES ('78', '4', 'Ekwusigo') ; 
INSERT INTO `local_govt_tbl` VALUES ('79', '4', 'Idemili North') ; 
INSERT INTO `local_govt_tbl` VALUES ('80', '4', 'Idemili South') ; 
INSERT INTO `local_govt_tbl` VALUES ('81', '4', 'Ihiala') ; 
INSERT INTO `local_govt_tbl` VALUES ('82', '4', 'Njikoka') ; 
INSERT INTO `local_govt_tbl` VALUES ('83', '4', 'Nnewi North') ; 
INSERT INTO `local_govt_tbl` VALUES ('84', '4', 'Nnewi South') ; 
INSERT INTO `local_govt_tbl` VALUES ('85', '4', 'Ogbaru') ; 
INSERT INTO `local_govt_tbl` VALUES ('86', '4', 'Onitsha North') ; 
INSERT INTO `local_govt_tbl` VALUES ('87', '4', 'Onitsha South') ; 
INSERT INTO `local_govt_tbl` VALUES ('88', '4', 'Orumba North') ; 
INSERT INTO `local_govt_tbl` VALUES ('89', '4', 'Orumba South') ; 
INSERT INTO `local_govt_tbl` VALUES ('90', '4', 'Oyi') ; 
INSERT INTO `local_govt_tbl` VALUES ('91', '5', 'Alkaleri') ; 
INSERT INTO `local_govt_tbl` VALUES ('92', '5', 'Bauchi') ; 
INSERT INTO `local_govt_tbl` VALUES ('93', '5', 'Bogoro') ; 
INSERT INTO `local_govt_tbl` VALUES ('94', '5', 'Damban') ; 
INSERT INTO `local_govt_tbl` VALUES ('95', '5', 'Darazo') ; 
INSERT INTO `local_govt_tbl` VALUES ('96', '5', 'Dass') ; 
INSERT INTO `local_govt_tbl` VALUES ('97', '5', 'Gamawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('98', '5', 'Ganjuwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('99', '5', 'Giade') ; 
INSERT INTO `local_govt_tbl` VALUES ('100', '5', 'Itas/Gadau') ; 
INSERT INTO `local_govt_tbl` VALUES ('101', '5', 'Jama\'are') ; 
INSERT INTO `local_govt_tbl` VALUES ('102', '5', 'Katagum') ; 
INSERT INTO `local_govt_tbl` VALUES ('103', '5', 'Kirfi') ; 
INSERT INTO `local_govt_tbl` VALUES ('104', '5', 'Misau') ; 
INSERT INTO `local_govt_tbl` VALUES ('105', '5', 'Ningi') ; 
INSERT INTO `local_govt_tbl` VALUES ('106', '5', 'Shira') ; 
INSERT INTO `local_govt_tbl` VALUES ('107', '5', 'Tafawa Balewa') ; 
INSERT INTO `local_govt_tbl` VALUES ('108', '5', 'Toro') ; 
INSERT INTO `local_govt_tbl` VALUES ('109', '5', 'Warji') ; 
INSERT INTO `local_govt_tbl` VALUES ('110', '5', 'Zaki') ; 
INSERT INTO `local_govt_tbl` VALUES ('111', '6', 'Brass') ; 
INSERT INTO `local_govt_tbl` VALUES ('112', '6', 'Ekeremor') ; 
INSERT INTO `local_govt_tbl` VALUES ('113', '6', 'Kolokuma/Opokuma') ; 
INSERT INTO `local_govt_tbl` VALUES ('114', '6', 'Nembe') ; 
INSERT INTO `local_govt_tbl` VALUES ('115', '6', 'Ogbia') ; 
INSERT INTO `local_govt_tbl` VALUES ('116', '6', 'Sagbama') ; 
INSERT INTO `local_govt_tbl` VALUES ('117', '6', 'Southern Ijaw') ; 
INSERT INTO `local_govt_tbl` VALUES ('118', '6', 'Yenagoa') ; 
INSERT INTO `local_govt_tbl` VALUES ('119', '7', 'Agatu') ; 
INSERT INTO `local_govt_tbl` VALUES ('120', '7', 'Apa') ; 
INSERT INTO `local_govt_tbl` VALUES ('121', '7', 'Ado') ; 
INSERT INTO `local_govt_tbl` VALUES ('122', '7', 'Buruku') ; 
INSERT INTO `local_govt_tbl` VALUES ('123', '7', 'Gboko') ; 
INSERT INTO `local_govt_tbl` VALUES ('124', '7', 'Guma') ; 
INSERT INTO `local_govt_tbl` VALUES ('125', '7', 'Gwer East') ; 
INSERT INTO `local_govt_tbl` VALUES ('126', '7', 'Gwer West') ; 
INSERT INTO `local_govt_tbl` VALUES ('127', '7', 'Katsina-Ala') ; 
INSERT INTO `local_govt_tbl` VALUES ('128', '7', 'Konshisha') ; 
INSERT INTO `local_govt_tbl` VALUES ('129', '7', 'Kwande') ; 
INSERT INTO `local_govt_tbl` VALUES ('130', '7', 'Logo') ; 
INSERT INTO `local_govt_tbl` VALUES ('131', '7', 'Makurdi') ; 
INSERT INTO `local_govt_tbl` VALUES ('132', '7', 'Obi') ; 
INSERT INTO `local_govt_tbl` VALUES ('133', '7', 'Ogbadibo') ; 
INSERT INTO `local_govt_tbl` VALUES ('134', '7', 'Ohimini') ; 
INSERT INTO `local_govt_tbl` VALUES ('135', '7', 'Oju') ; 
INSERT INTO `local_govt_tbl` VALUES ('136', '7', 'Okpokwu') ; 
INSERT INTO `local_govt_tbl` VALUES ('137', '7', 'Oturkpo') ; 
INSERT INTO `local_govt_tbl` VALUES ('138', '7', 'Tarka') ; 
INSERT INTO `local_govt_tbl` VALUES ('139', '7', 'Ukum') ; 
INSERT INTO `local_govt_tbl` VALUES ('140', '7', 'Ushongo') ; 
INSERT INTO `local_govt_tbl` VALUES ('141', '7', 'Vandeikya') ; 
INSERT INTO `local_govt_tbl` VALUES ('142', '8', 'Abadam') ; 
INSERT INTO `local_govt_tbl` VALUES ('143', '8', 'Askira/Uba') ; 
INSERT INTO `local_govt_tbl` VALUES ('144', '8', 'Bama') ; 
INSERT INTO `local_govt_tbl` VALUES ('145', '8', 'Bayo') ; 
INSERT INTO `local_govt_tbl` VALUES ('146', '8', 'Biu') ; 
INSERT INTO `local_govt_tbl` VALUES ('147', '8', 'Chibok') ; 
INSERT INTO `local_govt_tbl` VALUES ('148', '8', 'Damboa') ; 
INSERT INTO `local_govt_tbl` VALUES ('149', '8', 'Dikwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('150', '8', 'Gubio') ; 
INSERT INTO `local_govt_tbl` VALUES ('151', '8', 'Guzamala') ; 
INSERT INTO `local_govt_tbl` VALUES ('152', '8', 'Gwoza') ; 
INSERT INTO `local_govt_tbl` VALUES ('153', '8', 'Hawul') ; 
INSERT INTO `local_govt_tbl` VALUES ('154', '8', 'Jere') ; 
INSERT INTO `local_govt_tbl` VALUES ('155', '8', 'Kaga') ; 
INSERT INTO `local_govt_tbl` VALUES ('156', '8', 'Kala/Balge') ; 
INSERT INTO `local_govt_tbl` VALUES ('157', '8', 'Konduga') ; 
INSERT INTO `local_govt_tbl` VALUES ('158', '8', 'Kukawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('159', '8', 'Kwaya Kusar') ; 
INSERT INTO `local_govt_tbl` VALUES ('160', '8', 'Mafa') ; 
INSERT INTO `local_govt_tbl` VALUES ('161', '8', 'Magumeri') ; 
INSERT INTO `local_govt_tbl` VALUES ('162', '8', 'Maiduguri') ; 
INSERT INTO `local_govt_tbl` VALUES ('163', '8', 'Marte') ; 
INSERT INTO `local_govt_tbl` VALUES ('164', '8', 'Mobbar') ; 
INSERT INTO `local_govt_tbl` VALUES ('165', '8', 'Monguno') ; 
INSERT INTO `local_govt_tbl` VALUES ('166', '8', 'Ngala') ; 
INSERT INTO `local_govt_tbl` VALUES ('167', '8', 'Nganzai') ; 
INSERT INTO `local_govt_tbl` VALUES ('168', '8', 'Shani') ; 
INSERT INTO `local_govt_tbl` VALUES ('169', '9', 'Abi') ; 
INSERT INTO `local_govt_tbl` VALUES ('170', '9', 'Akamkpa') ; 
INSERT INTO `local_govt_tbl` VALUES ('171', '9', 'Akpabuyo') ; 
INSERT INTO `local_govt_tbl` VALUES ('172', '9', 'Bakassi') ; 
INSERT INTO `local_govt_tbl` VALUES ('173', '9', 'Bekwarra') ; 
INSERT INTO `local_govt_tbl` VALUES ('174', '9', 'Biase') ; 
INSERT INTO `local_govt_tbl` VALUES ('175', '9', 'Boki') ; 
INSERT INTO `local_govt_tbl` VALUES ('176', '9', 'Calabar Municipal') ; 
INSERT INTO `local_govt_tbl` VALUES ('177', '9', 'Calabar South') ; 
INSERT INTO `local_govt_tbl` VALUES ('178', '9', 'Etung') ; 
INSERT INTO `local_govt_tbl` VALUES ('179', '9', 'Ikom') ; 
INSERT INTO `local_govt_tbl` VALUES ('180', '9', 'Obanliku') ; 
INSERT INTO `local_govt_tbl` VALUES ('181', '9', 'Obubra') ; 
INSERT INTO `local_govt_tbl` VALUES ('182', '9', 'Obudu') ; 
INSERT INTO `local_govt_tbl` VALUES ('183', '9', 'Odukpani') ; 
INSERT INTO `local_govt_tbl` VALUES ('184', '9', 'Ogoja') ; 
INSERT INTO `local_govt_tbl` VALUES ('185', '9', 'Yakuur') ; 
INSERT INTO `local_govt_tbl` VALUES ('186', '9', 'Yala') ; 
INSERT INTO `local_govt_tbl` VALUES ('187', '10', 'Aniocha North') ; 
INSERT INTO `local_govt_tbl` VALUES ('188', '10', 'Aniocha South') ; 
INSERT INTO `local_govt_tbl` VALUES ('189', '10', 'Bomadi') ; 
INSERT INTO `local_govt_tbl` VALUES ('190', '10', 'Burutu') ; 
INSERT INTO `local_govt_tbl` VALUES ('191', '10', 'Ethiope East') ; 
INSERT INTO `local_govt_tbl` VALUES ('192', '10', 'Ethiope West') ; 
INSERT INTO `local_govt_tbl` VALUES ('193', '10', 'Ika North East') ; 
INSERT INTO `local_govt_tbl` VALUES ('194', '10', 'Ika South') ; 
INSERT INTO `local_govt_tbl` VALUES ('195', '10', 'Isoko North') ; 
INSERT INTO `local_govt_tbl` VALUES ('196', '10', 'Isoko South') ; 
INSERT INTO `local_govt_tbl` VALUES ('197', '10', 'Ndokwa East') ; 
INSERT INTO `local_govt_tbl` VALUES ('198', '10', 'Ndokwa West') ; 
INSERT INTO `local_govt_tbl` VALUES ('199', '10', 'Okpe') ; 
INSERT INTO `local_govt_tbl` VALUES ('200', '10', 'Oshimili North') ; 
INSERT INTO `local_govt_tbl` VALUES ('201', '10', 'Oshimili South') ; 
INSERT INTO `local_govt_tbl` VALUES ('202', '10', 'Patani') ; 
INSERT INTO `local_govt_tbl` VALUES ('203', '10', 'Sapele') ; 
INSERT INTO `local_govt_tbl` VALUES ('204', '10', 'Udu') ; 
INSERT INTO `local_govt_tbl` VALUES ('205', '10', 'Ughelli North') ; 
INSERT INTO `local_govt_tbl` VALUES ('206', '10', 'Ughelli South') ; 
INSERT INTO `local_govt_tbl` VALUES ('207', '10', 'Ukwuani') ; 
INSERT INTO `local_govt_tbl` VALUES ('208', '10', 'Uvwie') ; 
INSERT INTO `local_govt_tbl` VALUES ('209', '10', 'Warri North') ; 
INSERT INTO `local_govt_tbl` VALUES ('210', '10', 'Warri South') ; 
INSERT INTO `local_govt_tbl` VALUES ('211', '10', 'Warri South West') ; 
INSERT INTO `local_govt_tbl` VALUES ('212', '11', 'Abakaliki') ; 
INSERT INTO `local_govt_tbl` VALUES ('213', '11', 'Afikpo North') ; 
INSERT INTO `local_govt_tbl` VALUES ('214', '11', 'Afikpo South') ; 
INSERT INTO `local_govt_tbl` VALUES ('215', '11', 'Ebonyi') ; 
INSERT INTO `local_govt_tbl` VALUES ('216', '11', 'Ezza North') ; 
INSERT INTO `local_govt_tbl` VALUES ('217', '11', 'Ezza South') ; 
INSERT INTO `local_govt_tbl` VALUES ('218', '11', 'Ikwo') ; 
INSERT INTO `local_govt_tbl` VALUES ('219', '11', 'Ishielu') ; 
INSERT INTO `local_govt_tbl` VALUES ('220', '11', 'Ivo') ; 
INSERT INTO `local_govt_tbl` VALUES ('221', '11', 'Izzi') ; 
INSERT INTO `local_govt_tbl` VALUES ('222', '11', 'Ohaozara') ; 
INSERT INTO `local_govt_tbl` VALUES ('223', '11', 'Ohaukwu') ; 
INSERT INTO `local_govt_tbl` VALUES ('224', '11', 'Onicha') ; 
INSERT INTO `local_govt_tbl` VALUES ('225', '12', 'Akoko-Edo') ; 
INSERT INTO `local_govt_tbl` VALUES ('226', '12', 'Egor') ; 
INSERT INTO `local_govt_tbl` VALUES ('227', '12', 'Esan Central') ; 
INSERT INTO `local_govt_tbl` VALUES ('228', '12', 'Esan North-East') ; 
INSERT INTO `local_govt_tbl` VALUES ('229', '12', 'Esan South-East') ; 
INSERT INTO `local_govt_tbl` VALUES ('230', '12', 'Esan West') ; 
INSERT INTO `local_govt_tbl` VALUES ('231', '12', 'Etsako Central') ; 
INSERT INTO `local_govt_tbl` VALUES ('232', '12', 'Etsako East') ; 
INSERT INTO `local_govt_tbl` VALUES ('233', '12', 'Etsako West') ; 
INSERT INTO `local_govt_tbl` VALUES ('234', '12', 'Igueben') ; 
INSERT INTO `local_govt_tbl` VALUES ('235', '12', 'Ikpoba Okha') ; 
INSERT INTO `local_govt_tbl` VALUES ('236', '12', 'Orhionmwon') ; 
INSERT INTO `local_govt_tbl` VALUES ('237', '12', 'Oredo') ; 
INSERT INTO `local_govt_tbl` VALUES ('238', '12', 'Ovia North-East') ; 
INSERT INTO `local_govt_tbl` VALUES ('239', '12', 'Ovia South-West') ; 
INSERT INTO `local_govt_tbl` VALUES ('240', '12', 'Owan East') ; 
INSERT INTO `local_govt_tbl` VALUES ('241', '12', 'Owan West') ; 
INSERT INTO `local_govt_tbl` VALUES ('242', '12', 'Uhunmwonde') ; 
INSERT INTO `local_govt_tbl` VALUES ('243', '13', 'Ado Ekiti') ; 
INSERT INTO `local_govt_tbl` VALUES ('244', '13', 'Efon') ; 
INSERT INTO `local_govt_tbl` VALUES ('245', '13', 'Ekiti East') ; 
INSERT INTO `local_govt_tbl` VALUES ('246', '13', 'Ekiti South-West') ; 
INSERT INTO `local_govt_tbl` VALUES ('247', '13', 'Ekiti West') ; 
INSERT INTO `local_govt_tbl` VALUES ('248', '13', 'Emure') ; 
INSERT INTO `local_govt_tbl` VALUES ('249', '13', 'Gbonyin') ; 
INSERT INTO `local_govt_tbl` VALUES ('250', '13', 'Ido Osi') ; 
INSERT INTO `local_govt_tbl` VALUES ('251', '13', 'Ijero') ; 
INSERT INTO `local_govt_tbl` VALUES ('252', '13', 'Ikere') ; 
INSERT INTO `local_govt_tbl` VALUES ('253', '13', 'Ikole') ; 
INSERT INTO `local_govt_tbl` VALUES ('254', '13', 'Ilejemeje') ; 
INSERT INTO `local_govt_tbl` VALUES ('255', '13', 'Irepodun/Ifelodun') ; 
INSERT INTO `local_govt_tbl` VALUES ('256', '13', 'Ise/Orun') ; 
INSERT INTO `local_govt_tbl` VALUES ('257', '13', 'Moba') ; 
INSERT INTO `local_govt_tbl` VALUES ('258', '13', 'Oye') ; 
INSERT INTO `local_govt_tbl` VALUES ('259', '14', 'Aninri') ; 
INSERT INTO `local_govt_tbl` VALUES ('260', '14', 'Awgu') ; 
INSERT INTO `local_govt_tbl` VALUES ('261', '14', 'Enugu East') ; 
INSERT INTO `local_govt_tbl` VALUES ('262', '14', 'Enugu North') ; 
INSERT INTO `local_govt_tbl` VALUES ('263', '14', 'Enugu South') ; 
INSERT INTO `local_govt_tbl` VALUES ('264', '14', 'Ezeagu') ; 
INSERT INTO `local_govt_tbl` VALUES ('265', '14', 'Igbo Etiti') ; 
INSERT INTO `local_govt_tbl` VALUES ('266', '14', 'Igbo Eze North') ; 
INSERT INTO `local_govt_tbl` VALUES ('267', '14', 'Igbo Eze South') ; 
INSERT INTO `local_govt_tbl` VALUES ('268', '14', 'Isi Uzo') ; 
INSERT INTO `local_govt_tbl` VALUES ('269', '14', 'Nkanu East') ; 
INSERT INTO `local_govt_tbl` VALUES ('270', '14', 'Nkanu West') ; 
INSERT INTO `local_govt_tbl` VALUES ('271', '14', 'Nsukka') ; 
INSERT INTO `local_govt_tbl` VALUES ('272', '14', 'Oji River') ; 
INSERT INTO `local_govt_tbl` VALUES ('273', '14', 'Udenu') ; 
INSERT INTO `local_govt_tbl` VALUES ('274', '14', 'Udi') ; 
INSERT INTO `local_govt_tbl` VALUES ('275', '14', 'Uzo Uwani') ; 
INSERT INTO `local_govt_tbl` VALUES ('276', '15', 'Abaji') ; 
INSERT INTO `local_govt_tbl` VALUES ('277', '15', 'Bwari') ; 
INSERT INTO `local_govt_tbl` VALUES ('278', '15', 'Gwagwalada') ; 
INSERT INTO `local_govt_tbl` VALUES ('279', '15', 'Kuje') ; 
INSERT INTO `local_govt_tbl` VALUES ('280', '15', 'Kwali') ; 
INSERT INTO `local_govt_tbl` VALUES ('281', '15', 'Municipal Area Council') ; 
INSERT INTO `local_govt_tbl` VALUES ('282', '16', 'Akko') ; 
INSERT INTO `local_govt_tbl` VALUES ('283', '16', 'Balanga') ; 
INSERT INTO `local_govt_tbl` VALUES ('284', '16', 'Billiri') ; 
INSERT INTO `local_govt_tbl` VALUES ('285', '16', 'Dukku') ; 
INSERT INTO `local_govt_tbl` VALUES ('286', '16', 'Funakaye') ; 
INSERT INTO `local_govt_tbl` VALUES ('287', '16', 'Gombe') ; 
INSERT INTO `local_govt_tbl` VALUES ('288', '16', 'Kaltungo') ; 
INSERT INTO `local_govt_tbl` VALUES ('289', '16', 'Kwami') ; 
INSERT INTO `local_govt_tbl` VALUES ('290', '16', 'Nafada') ; 
INSERT INTO `local_govt_tbl` VALUES ('291', '16', 'Shongom') ; 
INSERT INTO `local_govt_tbl` VALUES ('292', '16', 'Yamaltu/Deba') ; 
INSERT INTO `local_govt_tbl` VALUES ('293', '17', 'Aboh Mbaise') ; 
INSERT INTO `local_govt_tbl` VALUES ('294', '17', 'Ahiazu Mbaise') ; 
INSERT INTO `local_govt_tbl` VALUES ('295', '17', 'Ehime Mbano') ; 
INSERT INTO `local_govt_tbl` VALUES ('296', '17', 'Ezinihitte') ; 
INSERT INTO `local_govt_tbl` VALUES ('297', '17', 'Ideato North') ; 
INSERT INTO `local_govt_tbl` VALUES ('298', '17', 'Ideato South') ; 
INSERT INTO `local_govt_tbl` VALUES ('299', '17', 'Ihitte/Uboma') ; 
INSERT INTO `local_govt_tbl` VALUES ('300', '17', 'Ikeduru') ; 
INSERT INTO `local_govt_tbl` VALUES ('301', '17', 'Isiala Mbano') ; 
INSERT INTO `local_govt_tbl` VALUES ('302', '17', 'Isu') ; 
INSERT INTO `local_govt_tbl` VALUES ('303', '17', 'Mbaitoli') ; 
INSERT INTO `local_govt_tbl` VALUES ('304', '17', 'Ngor Okpala') ; 
INSERT INTO `local_govt_tbl` VALUES ('305', '17', 'Njaba') ; 
INSERT INTO `local_govt_tbl` VALUES ('306', '17', 'Nkwerre') ; 
INSERT INTO `local_govt_tbl` VALUES ('307', '17', 'Nwangele') ; 
INSERT INTO `local_govt_tbl` VALUES ('308', '17', 'Obowo') ; 
INSERT INTO `local_govt_tbl` VALUES ('309', '17', 'Oguta') ; 
INSERT INTO `local_govt_tbl` VALUES ('310', '17', 'Ohaji/Egbema') ; 
INSERT INTO `local_govt_tbl` VALUES ('311', '17', 'Okigwe') ; 
INSERT INTO `local_govt_tbl` VALUES ('312', '17', 'Orlu') ; 
INSERT INTO `local_govt_tbl` VALUES ('313', '17', 'Orsu') ; 
INSERT INTO `local_govt_tbl` VALUES ('314', '17', 'Oru East') ; 
INSERT INTO `local_govt_tbl` VALUES ('315', '17', 'Oru West') ; 
INSERT INTO `local_govt_tbl` VALUES ('316', '17', 'Owerri Municipal') ; 
INSERT INTO `local_govt_tbl` VALUES ('317', '17', 'Owerri North') ; 
INSERT INTO `local_govt_tbl` VALUES ('318', '17', 'Owerri West') ; 
INSERT INTO `local_govt_tbl` VALUES ('319', '17', 'Unuimo') ; 
INSERT INTO `local_govt_tbl` VALUES ('320', '18', 'Auyo') ; 
INSERT INTO `local_govt_tbl` VALUES ('321', '18', 'Babura') ; 
INSERT INTO `local_govt_tbl` VALUES ('322', '18', 'Biriniwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('323', '18', 'Birnin Kudu') ; 
INSERT INTO `local_govt_tbl` VALUES ('324', '18', 'Buji') ; 
INSERT INTO `local_govt_tbl` VALUES ('325', '18', 'Dutse') ; 
INSERT INTO `local_govt_tbl` VALUES ('326', '18', 'Gagarawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('327', '18', 'Garki') ; 
INSERT INTO `local_govt_tbl` VALUES ('328', '18', 'Gumel') ; 
INSERT INTO `local_govt_tbl` VALUES ('329', '18', 'Guri') ; 
INSERT INTO `local_govt_tbl` VALUES ('330', '18', 'Gwaram') ; 
INSERT INTO `local_govt_tbl` VALUES ('331', '18', 'Gwiwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('332', '18', 'Hadejia') ; 
INSERT INTO `local_govt_tbl` VALUES ('333', '18', 'Jahun') ; 
INSERT INTO `local_govt_tbl` VALUES ('334', '18', 'Kafin Hausa') ; 
INSERT INTO `local_govt_tbl` VALUES ('335', '18', 'Kazaure') ; 
INSERT INTO `local_govt_tbl` VALUES ('336', '18', 'Kiri Kasama') ; 
INSERT INTO `local_govt_tbl` VALUES ('337', '18', 'Kiyawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('338', '18', 'Kaugama') ; 
INSERT INTO `local_govt_tbl` VALUES ('339', '18', 'Maigatari') ; 
INSERT INTO `local_govt_tbl` VALUES ('340', '18', 'Malam Madori') ; 
INSERT INTO `local_govt_tbl` VALUES ('341', '18', 'Miga') ; 
INSERT INTO `local_govt_tbl` VALUES ('342', '18', 'Ringim') ; 
INSERT INTO `local_govt_tbl` VALUES ('343', '18', 'Roni') ; 
INSERT INTO `local_govt_tbl` VALUES ('344', '18', 'Sule Tankarkar') ; 
INSERT INTO `local_govt_tbl` VALUES ('345', '18', 'Taura') ; 
INSERT INTO `local_govt_tbl` VALUES ('346', '18', 'Yankwashi') ; 
INSERT INTO `local_govt_tbl` VALUES ('347', '19', 'Birnin Gwari') ; 
INSERT INTO `local_govt_tbl` VALUES ('348', '19', 'Chikun') ; 
INSERT INTO `local_govt_tbl` VALUES ('349', '19', 'Giwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('350', '19', 'Igabi') ; 
INSERT INTO `local_govt_tbl` VALUES ('351', '19', 'Ikara') ; 
INSERT INTO `local_govt_tbl` VALUES ('352', '19', 'Jaba') ; 
INSERT INTO `local_govt_tbl` VALUES ('353', '19', 'Jema\'a') ; 
INSERT INTO `local_govt_tbl` VALUES ('354', '19', 'Kachia') ; 
INSERT INTO `local_govt_tbl` VALUES ('355', '19', 'Kaduna North') ; 
INSERT INTO `local_govt_tbl` VALUES ('356', '19', 'Kaduna South') ; 
INSERT INTO `local_govt_tbl` VALUES ('357', '19', 'Kagarko') ; 
INSERT INTO `local_govt_tbl` VALUES ('358', '19', 'Kajuru') ; 
INSERT INTO `local_govt_tbl` VALUES ('359', '19', 'Kaura') ; 
INSERT INTO `local_govt_tbl` VALUES ('360', '19', 'Kauru') ; 
INSERT INTO `local_govt_tbl` VALUES ('361', '19', 'Kubau') ; 
INSERT INTO `local_govt_tbl` VALUES ('362', '19', 'Kudan') ; 
INSERT INTO `local_govt_tbl` VALUES ('363', '19', 'Lere') ; 
INSERT INTO `local_govt_tbl` VALUES ('364', '19', 'Makarfi') ; 
INSERT INTO `local_govt_tbl` VALUES ('365', '19', 'Sabon Gari') ; 
INSERT INTO `local_govt_tbl` VALUES ('366', '19', 'Sanga') ; 
INSERT INTO `local_govt_tbl` VALUES ('367', '19', 'Soba') ; 
INSERT INTO `local_govt_tbl` VALUES ('368', '19', 'Zangon Kataf') ; 
INSERT INTO `local_govt_tbl` VALUES ('369', '19', 'Zaria') ; 
INSERT INTO `local_govt_tbl` VALUES ('370', '20', 'Ajingi') ; 
INSERT INTO `local_govt_tbl` VALUES ('371', '20', 'Albasu') ; 
INSERT INTO `local_govt_tbl` VALUES ('372', '20', 'Bagwai') ; 
INSERT INTO `local_govt_tbl` VALUES ('373', '20', 'Bebeji') ; 
INSERT INTO `local_govt_tbl` VALUES ('374', '20', 'Bichi') ; 
INSERT INTO `local_govt_tbl` VALUES ('375', '20', 'Bunkure') ; 
INSERT INTO `local_govt_tbl` VALUES ('376', '20', 'Dala') ; 
INSERT INTO `local_govt_tbl` VALUES ('377', '20', 'Dambatta') ; 
INSERT INTO `local_govt_tbl` VALUES ('378', '20', 'Dawakin Kudu') ; 
INSERT INTO `local_govt_tbl` VALUES ('379', '20', 'Dawakin Tofa') ; 
INSERT INTO `local_govt_tbl` VALUES ('380', '20', 'Doguwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('381', '20', 'Fagge') ; 
INSERT INTO `local_govt_tbl` VALUES ('382', '20', 'Gabasawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('383', '20', 'Garko') ; 
INSERT INTO `local_govt_tbl` VALUES ('384', '20', 'Garun Mallam') ; 
INSERT INTO `local_govt_tbl` VALUES ('385', '20', 'Gaya') ; 
INSERT INTO `local_govt_tbl` VALUES ('386', '20', 'Gezawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('387', '20', 'Gwale') ; 
INSERT INTO `local_govt_tbl` VALUES ('388', '20', 'Gwarzo') ; 
INSERT INTO `local_govt_tbl` VALUES ('389', '20', 'Kabo') ; 
INSERT INTO `local_govt_tbl` VALUES ('390', '20', 'Kano Municipal') ; 
INSERT INTO `local_govt_tbl` VALUES ('391', '20', 'Karaye') ; 
INSERT INTO `local_govt_tbl` VALUES ('392', '20', 'Kibiya') ; 
INSERT INTO `local_govt_tbl` VALUES ('393', '20', 'Kiru') ; 
INSERT INTO `local_govt_tbl` VALUES ('394', '20', 'Kumbotso') ; 
INSERT INTO `local_govt_tbl` VALUES ('395', '20', 'Kunchi') ; 
INSERT INTO `local_govt_tbl` VALUES ('396', '20', 'Kura') ; 
INSERT INTO `local_govt_tbl` VALUES ('397', '20', 'Madobi') ; 
INSERT INTO `local_govt_tbl` VALUES ('398', '20', 'Makoda') ; 
INSERT INTO `local_govt_tbl` VALUES ('399', '20', 'Minjibir') ; 
INSERT INTO `local_govt_tbl` VALUES ('400', '20', 'Nasarawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('401', '20', 'Rano') ; 
INSERT INTO `local_govt_tbl` VALUES ('402', '20', 'Rimin Gado') ; 
INSERT INTO `local_govt_tbl` VALUES ('403', '20', 'Rogo') ; 
INSERT INTO `local_govt_tbl` VALUES ('404', '20', 'Shanono') ; 
INSERT INTO `local_govt_tbl` VALUES ('405', '20', 'Sumaila') ; 
INSERT INTO `local_govt_tbl` VALUES ('406', '20', 'Takai') ; 
INSERT INTO `local_govt_tbl` VALUES ('407', '20', 'Tarauni') ; 
INSERT INTO `local_govt_tbl` VALUES ('408', '20', 'Tofa') ; 
INSERT INTO `local_govt_tbl` VALUES ('409', '20', 'Tsanyawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('410', '20', 'Tudun Wada') ; 
INSERT INTO `local_govt_tbl` VALUES ('411', '20', 'Ungogo') ; 
INSERT INTO `local_govt_tbl` VALUES ('412', '20', 'Warawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('413', '20', 'Wudil') ; 
INSERT INTO `local_govt_tbl` VALUES ('414', '21', 'Bakori') ; 
INSERT INTO `local_govt_tbl` VALUES ('415', '21', 'Batagarawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('416', '21', 'Batsari') ; 
INSERT INTO `local_govt_tbl` VALUES ('417', '21', 'Baure') ; 
INSERT INTO `local_govt_tbl` VALUES ('418', '21', 'Bindawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('419', '21', 'Charanchi') ; 
INSERT INTO `local_govt_tbl` VALUES ('420', '21', 'Dandume') ; 
INSERT INTO `local_govt_tbl` VALUES ('421', '21', 'Danja') ; 
INSERT INTO `local_govt_tbl` VALUES ('422', '21', 'Dan Musa') ; 
INSERT INTO `local_govt_tbl` VALUES ('423', '21', 'Daura') ; 
INSERT INTO `local_govt_tbl` VALUES ('424', '21', 'Dutsi') ; 
INSERT INTO `local_govt_tbl` VALUES ('425', '21', 'Dutsin Ma') ; 
INSERT INTO `local_govt_tbl` VALUES ('426', '21', 'Faskari') ; 
INSERT INTO `local_govt_tbl` VALUES ('427', '21', 'Funtua') ; 
INSERT INTO `local_govt_tbl` VALUES ('428', '21', 'Ingawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('429', '21', 'Jibia') ; 
INSERT INTO `local_govt_tbl` VALUES ('430', '21', 'Kafur') ; 
INSERT INTO `local_govt_tbl` VALUES ('431', '21', 'Kaita') ; 
INSERT INTO `local_govt_tbl` VALUES ('432', '21', 'Kankara') ; 
INSERT INTO `local_govt_tbl` VALUES ('433', '21', 'Kankia') ; 
INSERT INTO `local_govt_tbl` VALUES ('434', '21', 'Katsina') ; 
INSERT INTO `local_govt_tbl` VALUES ('435', '21', 'Kurfi') ; 
INSERT INTO `local_govt_tbl` VALUES ('436', '21', 'Kusada') ; 
INSERT INTO `local_govt_tbl` VALUES ('437', '21', 'Mai\'Adua') ; 
INSERT INTO `local_govt_tbl` VALUES ('438', '21', 'Malumfashi') ; 
INSERT INTO `local_govt_tbl` VALUES ('439', '21', 'Mani') ; 
INSERT INTO `local_govt_tbl` VALUES ('440', '21', 'Mashi') ; 
INSERT INTO `local_govt_tbl` VALUES ('441', '21', 'Matazu') ; 
INSERT INTO `local_govt_tbl` VALUES ('442', '21', 'Musawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('443', '21', 'Rimi') ; 
INSERT INTO `local_govt_tbl` VALUES ('444', '21', 'Sabuwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('445', '21', 'Safana') ; 
INSERT INTO `local_govt_tbl` VALUES ('446', '21', 'Sandamu') ; 
INSERT INTO `local_govt_tbl` VALUES ('447', '21', 'Zango') ; 
INSERT INTO `local_govt_tbl` VALUES ('448', '22', 'Aleiro') ; 
INSERT INTO `local_govt_tbl` VALUES ('449', '22', 'Arewa Dandi') ; 
INSERT INTO `local_govt_tbl` VALUES ('450', '22', 'Argungu') ; 
INSERT INTO `local_govt_tbl` VALUES ('451', '22', 'Augie') ; 
INSERT INTO `local_govt_tbl` VALUES ('452', '22', 'Bagudo') ; 
INSERT INTO `local_govt_tbl` VALUES ('453', '22', 'Birnin Kebbi') ; 
INSERT INTO `local_govt_tbl` VALUES ('454', '22', 'Bunza') ; 
INSERT INTO `local_govt_tbl` VALUES ('455', '22', 'Dandi') ; 
INSERT INTO `local_govt_tbl` VALUES ('456', '22', 'Fakai') ; 
INSERT INTO `local_govt_tbl` VALUES ('457', '22', 'Gwandu') ; 
INSERT INTO `local_govt_tbl` VALUES ('458', '22', 'Jega') ; 
INSERT INTO `local_govt_tbl` VALUES ('459', '22', 'Kalgo') ; 
INSERT INTO `local_govt_tbl` VALUES ('460', '22', 'Koko/Besse') ; 
INSERT INTO `local_govt_tbl` VALUES ('461', '22', 'Maiyama') ; 
INSERT INTO `local_govt_tbl` VALUES ('462', '22', 'Ngaski') ; 
INSERT INTO `local_govt_tbl` VALUES ('463', '22', 'Sakaba') ; 
INSERT INTO `local_govt_tbl` VALUES ('464', '22', 'Shanga') ; 
INSERT INTO `local_govt_tbl` VALUES ('465', '22', 'Suru') ; 
INSERT INTO `local_govt_tbl` VALUES ('466', '22', 'Wasagu/Danko') ; 
INSERT INTO `local_govt_tbl` VALUES ('467', '22', 'Yauri') ; 
INSERT INTO `local_govt_tbl` VALUES ('468', '22', 'Zuru') ; 
INSERT INTO `local_govt_tbl` VALUES ('469', '23', 'Adavi') ; 
INSERT INTO `local_govt_tbl` VALUES ('470', '23', 'Ajaokuta') ; 
INSERT INTO `local_govt_tbl` VALUES ('471', '23', 'Ankpa') ; 
INSERT INTO `local_govt_tbl` VALUES ('472', '23', 'Bassa') ; 
INSERT INTO `local_govt_tbl` VALUES ('473', '23', 'Dekina') ; 
INSERT INTO `local_govt_tbl` VALUES ('474', '23', 'Ibaji') ; 
INSERT INTO `local_govt_tbl` VALUES ('475', '23', 'Idah') ; 
INSERT INTO `local_govt_tbl` VALUES ('476', '23', 'Igalamela Odolu') ; 
INSERT INTO `local_govt_tbl` VALUES ('477', '23', 'Ijumu') ; 
INSERT INTO `local_govt_tbl` VALUES ('478', '23', 'Kabba/Bunu') ; 
INSERT INTO `local_govt_tbl` VALUES ('479', '23', 'Kogi') ; 
INSERT INTO `local_govt_tbl` VALUES ('480', '23', 'Lokoja') ; 
INSERT INTO `local_govt_tbl` VALUES ('481', '23', 'Mopa Muro') ; 
INSERT INTO `local_govt_tbl` VALUES ('482', '23', 'Ofu') ; 
INSERT INTO `local_govt_tbl` VALUES ('483', '23', 'Ogori/Magongo') ; 
INSERT INTO `local_govt_tbl` VALUES ('484', '23', 'Okehi') ; 
INSERT INTO `local_govt_tbl` VALUES ('485', '23', 'Okene') ; 
INSERT INTO `local_govt_tbl` VALUES ('486', '23', 'Olamaboro') ; 
INSERT INTO `local_govt_tbl` VALUES ('487', '23', 'Omala') ; 
INSERT INTO `local_govt_tbl` VALUES ('488', '23', 'Yagba East') ; 
INSERT INTO `local_govt_tbl` VALUES ('489', '23', 'Yagba West') ; 
INSERT INTO `local_govt_tbl` VALUES ('490', '24', 'Asa') ; 
INSERT INTO `local_govt_tbl` VALUES ('491', '24', 'Baruten') ; 
INSERT INTO `local_govt_tbl` VALUES ('492', '24', 'Edu') ; 
INSERT INTO `local_govt_tbl` VALUES ('493', '24', 'Ekiti') ; 
INSERT INTO `local_govt_tbl` VALUES ('494', '24', 'Ifelodun') ; 
INSERT INTO `local_govt_tbl` VALUES ('495', '24', 'Ilorin East') ; 
INSERT INTO `local_govt_tbl` VALUES ('496', '24', 'Ilorin South') ; 
INSERT INTO `local_govt_tbl` VALUES ('497', '24', 'Ilorin West') ; 
INSERT INTO `local_govt_tbl` VALUES ('498', '24', 'Irepodun') ; 
INSERT INTO `local_govt_tbl` VALUES ('499', '24', 'Isin') ; 
INSERT INTO `local_govt_tbl` VALUES ('500', '24', 'Kaiama') ; 
INSERT INTO `local_govt_tbl` VALUES ('501', '24', 'Moro') ; 
INSERT INTO `local_govt_tbl` VALUES ('502', '24', 'Offa') ; 
INSERT INTO `local_govt_tbl` VALUES ('503', '24', 'Oke Ero') ; 
INSERT INTO `local_govt_tbl` VALUES ('504', '24', 'Oyun') ; 
INSERT INTO `local_govt_tbl` VALUES ('505', '24', 'Pategi') ; 
INSERT INTO `local_govt_tbl` VALUES ('506', '25', 'Agege') ; 
INSERT INTO `local_govt_tbl` VALUES ('507', '25', 'Ajeromi-Ifelodun') ; 
INSERT INTO `local_govt_tbl` VALUES ('508', '25', 'Alimosho') ; 
INSERT INTO `local_govt_tbl` VALUES ('509', '25', 'Amuwo-Odofin') ; 
INSERT INTO `local_govt_tbl` VALUES ('510', '25', 'Apapa') ; 
INSERT INTO `local_govt_tbl` VALUES ('511', '25', 'Badagry') ; 
INSERT INTO `local_govt_tbl` VALUES ('512', '25', 'Epe') ; 
INSERT INTO `local_govt_tbl` VALUES ('513', '25', 'Eti Osa') ; 
INSERT INTO `local_govt_tbl` VALUES ('514', '25', 'Ibeju-Lekki') ; 
INSERT INTO `local_govt_tbl` VALUES ('515', '25', 'Ifako-Ijaiye') ; 
INSERT INTO `local_govt_tbl` VALUES ('516', '25', 'Ikeja') ; 
INSERT INTO `local_govt_tbl` VALUES ('517', '25', 'Ikorodu') ; 
INSERT INTO `local_govt_tbl` VALUES ('518', '25', 'Kosofe') ; 
INSERT INTO `local_govt_tbl` VALUES ('519', '25', 'Lagos Island') ; 
INSERT INTO `local_govt_tbl` VALUES ('520', '25', 'Lagos Mainland') ; 
INSERT INTO `local_govt_tbl` VALUES ('521', '25', 'Mushin') ; 
INSERT INTO `local_govt_tbl` VALUES ('522', '25', 'Ojo') ; 
INSERT INTO `local_govt_tbl` VALUES ('523', '25', 'Oshodi-Isolo') ; 
INSERT INTO `local_govt_tbl` VALUES ('524', '25', 'Shomolu') ; 
INSERT INTO `local_govt_tbl` VALUES ('525', '25', 'Surulere') ; 
INSERT INTO `local_govt_tbl` VALUES ('526', '26', 'Akwanga') ; 
INSERT INTO `local_govt_tbl` VALUES ('527', '26', 'Awe') ; 
INSERT INTO `local_govt_tbl` VALUES ('528', '26', 'Doma') ; 
INSERT INTO `local_govt_tbl` VALUES ('529', '26', 'Karu') ; 
INSERT INTO `local_govt_tbl` VALUES ('530', '26', 'Keana') ; 
INSERT INTO `local_govt_tbl` VALUES ('531', '26', 'Keffi') ; 
INSERT INTO `local_govt_tbl` VALUES ('532', '26', 'Kokona') ; 
INSERT INTO `local_govt_tbl` VALUES ('533', '26', 'Lafia') ; 
INSERT INTO `local_govt_tbl` VALUES ('534', '26', 'Nasarawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('535', '26', 'Nasarawa Egon') ; 
INSERT INTO `local_govt_tbl` VALUES ('536', '26', 'Obi') ; 
INSERT INTO `local_govt_tbl` VALUES ('537', '26', 'Toto') ; 
INSERT INTO `local_govt_tbl` VALUES ('538', '26', 'Wamba') ; 
INSERT INTO `local_govt_tbl` VALUES ('539', '27', 'Agaie') ; 
INSERT INTO `local_govt_tbl` VALUES ('540', '27', 'Agwara') ; 
INSERT INTO `local_govt_tbl` VALUES ('541', '27', 'Bida') ; 
INSERT INTO `local_govt_tbl` VALUES ('542', '27', 'Borgu') ; 
INSERT INTO `local_govt_tbl` VALUES ('543', '27', 'Bosso') ; 
INSERT INTO `local_govt_tbl` VALUES ('544', '27', 'Chanchaga') ; 
INSERT INTO `local_govt_tbl` VALUES ('545', '27', 'Edati') ; 
INSERT INTO `local_govt_tbl` VALUES ('546', '27', 'Gbako') ; 
INSERT INTO `local_govt_tbl` VALUES ('547', '27', 'Gurara') ; 
INSERT INTO `local_govt_tbl` VALUES ('548', '27', 'Katcha') ; 
INSERT INTO `local_govt_tbl` VALUES ('549', '27', 'Kontagora') ; 
INSERT INTO `local_govt_tbl` VALUES ('550', '27', 'Lapai') ; 
INSERT INTO `local_govt_tbl` VALUES ('551', '27', 'Lavun') ; 
INSERT INTO `local_govt_tbl` VALUES ('552', '27', 'Magama') ; 
INSERT INTO `local_govt_tbl` VALUES ('553', '27', 'Mariga') ; 
INSERT INTO `local_govt_tbl` VALUES ('554', '27', 'Mashegu') ; 
INSERT INTO `local_govt_tbl` VALUES ('555', '27', 'Mokwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('556', '27', 'Moya') ; 
INSERT INTO `local_govt_tbl` VALUES ('557', '27', 'Paikoro') ; 
INSERT INTO `local_govt_tbl` VALUES ('558', '27', 'Rafi') ; 
INSERT INTO `local_govt_tbl` VALUES ('559', '27', 'Rijau') ; 
INSERT INTO `local_govt_tbl` VALUES ('560', '27', 'Shiroro') ; 
INSERT INTO `local_govt_tbl` VALUES ('561', '27', 'Suleja') ; 
INSERT INTO `local_govt_tbl` VALUES ('562', '27', 'Tafa') ; 
INSERT INTO `local_govt_tbl` VALUES ('563', '27', 'Wushishi') ; 
INSERT INTO `local_govt_tbl` VALUES ('564', '28', 'Abeokuta North') ; 
INSERT INTO `local_govt_tbl` VALUES ('565', '28', 'Abeokuta South') ; 
INSERT INTO `local_govt_tbl` VALUES ('566', '28', 'Ado-Odo/Ota') ; 
INSERT INTO `local_govt_tbl` VALUES ('567', '28', 'Egbado North') ; 
INSERT INTO `local_govt_tbl` VALUES ('568', '28', 'Egbado South') ; 
INSERT INTO `local_govt_tbl` VALUES ('569', '28', 'Ewekoro') ; 
INSERT INTO `local_govt_tbl` VALUES ('570', '28', 'Ifo') ; 
INSERT INTO `local_govt_tbl` VALUES ('571', '28', 'Ijebu East') ; 
INSERT INTO `local_govt_tbl` VALUES ('572', '28', 'Ijebu North') ; 
INSERT INTO `local_govt_tbl` VALUES ('573', '28', 'Ijebu North East') ; 
INSERT INTO `local_govt_tbl` VALUES ('574', '28', 'Ijebu Ode') ; 
INSERT INTO `local_govt_tbl` VALUES ('575', '28', 'Ikenne') ; 
INSERT INTO `local_govt_tbl` VALUES ('576', '28', 'Imeko Afon') ; 
INSERT INTO `local_govt_tbl` VALUES ('577', '28', 'Ipokia') ; 
INSERT INTO `local_govt_tbl` VALUES ('578', '28', 'Obafemi Owode') ; 
INSERT INTO `local_govt_tbl` VALUES ('579', '28', 'Odeda') ; 
INSERT INTO `local_govt_tbl` VALUES ('580', '28', 'Odogbolu') ; 
INSERT INTO `local_govt_tbl` VALUES ('581', '28', 'Ogun Waterside') ; 
INSERT INTO `local_govt_tbl` VALUES ('582', '28', 'Remo North') ; 
INSERT INTO `local_govt_tbl` VALUES ('583', '28', 'Shagamu') ; 
INSERT INTO `local_govt_tbl` VALUES ('584', '29', 'Akoko North-East') ; 
INSERT INTO `local_govt_tbl` VALUES ('585', '29', 'Akoko North-West') ; 
INSERT INTO `local_govt_tbl` VALUES ('586', '29', 'Akoko South-West') ; 
INSERT INTO `local_govt_tbl` VALUES ('587', '29', 'Akoko South-East') ; 
INSERT INTO `local_govt_tbl` VALUES ('588', '29', 'Akure North') ; 
INSERT INTO `local_govt_tbl` VALUES ('589', '29', 'Akure South') ; 
INSERT INTO `local_govt_tbl` VALUES ('590', '29', 'Ese Odo') ; 
INSERT INTO `local_govt_tbl` VALUES ('591', '29', 'Idanre') ; 
INSERT INTO `local_govt_tbl` VALUES ('592', '29', 'Ifedore') ; 
INSERT INTO `local_govt_tbl` VALUES ('593', '29', 'Ilaje') ; 
INSERT INTO `local_govt_tbl` VALUES ('594', '29', 'Ile Oluji/Okeigbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('595', '29', 'Irele') ; 
INSERT INTO `local_govt_tbl` VALUES ('596', '29', 'Odigbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('597', '29', 'Okitipupa') ; 
INSERT INTO `local_govt_tbl` VALUES ('598', '29', 'Ondo East') ; 
INSERT INTO `local_govt_tbl` VALUES ('599', '29', 'Ondo West') ; 
INSERT INTO `local_govt_tbl` VALUES ('600', '29', 'Ose') ; 
INSERT INTO `local_govt_tbl` VALUES ('601', '29', 'Owo') ; 
INSERT INTO `local_govt_tbl` VALUES ('602', '30', 'Atakunmosa East') ; 
INSERT INTO `local_govt_tbl` VALUES ('603', '30', 'Atakunmosa West') ; 
INSERT INTO `local_govt_tbl` VALUES ('604', '30', 'Aiyedaade') ; 
INSERT INTO `local_govt_tbl` VALUES ('605', '30', 'Aiyedire') ; 
INSERT INTO `local_govt_tbl` VALUES ('606', '30', 'Boluwaduro') ; 
INSERT INTO `local_govt_tbl` VALUES ('607', '30', 'Boripe') ; 
INSERT INTO `local_govt_tbl` VALUES ('608', '30', 'Ede North') ; 
INSERT INTO `local_govt_tbl` VALUES ('609', '30', 'Ede South') ; 
INSERT INTO `local_govt_tbl` VALUES ('610', '30', 'Ife Central') ; 
INSERT INTO `local_govt_tbl` VALUES ('611', '30', 'Ife East') ; 
INSERT INTO `local_govt_tbl` VALUES ('612', '30', 'Ife North') ; 
INSERT INTO `local_govt_tbl` VALUES ('613', '30', 'Ife South') ; 
INSERT INTO `local_govt_tbl` VALUES ('614', '30', 'Egbedore') ; 
INSERT INTO `local_govt_tbl` VALUES ('615', '30', 'Ejigbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('616', '30', 'Ifedayo') ; 
INSERT INTO `local_govt_tbl` VALUES ('617', '30', 'Ifelodun') ; 
INSERT INTO `local_govt_tbl` VALUES ('618', '30', 'Ila') ; 
INSERT INTO `local_govt_tbl` VALUES ('619', '30', 'Ilesa East') ; 
INSERT INTO `local_govt_tbl` VALUES ('620', '30', 'Ilesa West') ; 
INSERT INTO `local_govt_tbl` VALUES ('621', '30', 'Irepodun') ; 
INSERT INTO `local_govt_tbl` VALUES ('622', '30', 'Irewole') ; 
INSERT INTO `local_govt_tbl` VALUES ('623', '30', 'Isokan') ; 
INSERT INTO `local_govt_tbl` VALUES ('624', '30', 'Iwo') ; 
INSERT INTO `local_govt_tbl` VALUES ('625', '30', 'Obokun') ; 
INSERT INTO `local_govt_tbl` VALUES ('626', '30', 'Odo Otin') ; 
INSERT INTO `local_govt_tbl` VALUES ('627', '30', 'Ola Oluwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('628', '30', 'Olorunda') ; 
INSERT INTO `local_govt_tbl` VALUES ('629', '30', 'Oriade') ; 
INSERT INTO `local_govt_tbl` VALUES ('630', '30', 'Orolu') ; 
INSERT INTO `local_govt_tbl` VALUES ('631', '30', 'Osogbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('632', '31', 'Afijio') ; 
INSERT INTO `local_govt_tbl` VALUES ('633', '31', 'Akinyele') ; 
INSERT INTO `local_govt_tbl` VALUES ('634', '31', 'Atiba') ; 
INSERT INTO `local_govt_tbl` VALUES ('635', '31', 'Atisbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('636', '31', 'Egbeda') ; 
INSERT INTO `local_govt_tbl` VALUES ('637', '31', 'Ibadan North') ; 
INSERT INTO `local_govt_tbl` VALUES ('638', '31', 'Ibadan North-East') ; 
INSERT INTO `local_govt_tbl` VALUES ('639', '31', 'Ibadan North-West') ; 
INSERT INTO `local_govt_tbl` VALUES ('640', '31', 'Ibadan South-East') ; 
INSERT INTO `local_govt_tbl` VALUES ('641', '31', 'Ibadan South-West') ; 
INSERT INTO `local_govt_tbl` VALUES ('642', '31', 'Ibarapa Central') ; 
INSERT INTO `local_govt_tbl` VALUES ('643', '31', 'Ibarapa East') ; 
INSERT INTO `local_govt_tbl` VALUES ('644', '31', 'Ibarapa North') ; 
INSERT INTO `local_govt_tbl` VALUES ('645', '31', 'Ido') ; 
INSERT INTO `local_govt_tbl` VALUES ('646', '31', 'Irepo') ; 
INSERT INTO `local_govt_tbl` VALUES ('647', '31', 'Iseyin') ; 
INSERT INTO `local_govt_tbl` VALUES ('648', '31', 'Itesiwaju') ; 
INSERT INTO `local_govt_tbl` VALUES ('649', '31', 'Iwajowa') ; 
INSERT INTO `local_govt_tbl` VALUES ('650', '31', 'Kajola') ; 
INSERT INTO `local_govt_tbl` VALUES ('651', '31', 'Lagelu') ; 
INSERT INTO `local_govt_tbl` VALUES ('652', '31', 'Ogbomosho North') ; 
INSERT INTO `local_govt_tbl` VALUES ('653', '31', 'Ogbomosho South') ; 
INSERT INTO `local_govt_tbl` VALUES ('654', '31', 'Ogo Oluwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('655', '31', 'Olorunsogo') ; 
INSERT INTO `local_govt_tbl` VALUES ('656', '31', 'Oluyole') ; 
INSERT INTO `local_govt_tbl` VALUES ('657', '31', 'Ona Ara') ; 
INSERT INTO `local_govt_tbl` VALUES ('658', '31', 'Orelope') ; 
INSERT INTO `local_govt_tbl` VALUES ('659', '31', 'Ori Ire') ; 
INSERT INTO `local_govt_tbl` VALUES ('660', '31', 'Oyo') ; 
INSERT INTO `local_govt_tbl` VALUES ('661', '31', 'Oyo East') ; 
INSERT INTO `local_govt_tbl` VALUES ('662', '31', 'Saki East') ; 
INSERT INTO `local_govt_tbl` VALUES ('663', '31', 'Saki West') ; 
INSERT INTO `local_govt_tbl` VALUES ('664', '31', 'Surulere') ; 
INSERT INTO `local_govt_tbl` VALUES ('665', '32', 'Bokkos') ; 
INSERT INTO `local_govt_tbl` VALUES ('666', '32', 'Barkin Ladi') ; 
INSERT INTO `local_govt_tbl` VALUES ('667', '32', 'Bassa') ; 
INSERT INTO `local_govt_tbl` VALUES ('668', '32', 'Jos East') ; 
INSERT INTO `local_govt_tbl` VALUES ('669', '32', 'Jos North') ; 
INSERT INTO `local_govt_tbl` VALUES ('670', '32', 'Jos South') ; 
INSERT INTO `local_govt_tbl` VALUES ('671', '32', 'Kanam') ; 
INSERT INTO `local_govt_tbl` VALUES ('672', '32', 'Kanke') ; 
INSERT INTO `local_govt_tbl` VALUES ('673', '32', 'Langtang South') ; 
INSERT INTO `local_govt_tbl` VALUES ('674', '32', 'Langtang North') ; 
INSERT INTO `local_govt_tbl` VALUES ('675', '32', 'Mangu') ; 
INSERT INTO `local_govt_tbl` VALUES ('676', '32', 'Mikang') ; 
INSERT INTO `local_govt_tbl` VALUES ('677', '32', 'Pankshin') ; 
INSERT INTO `local_govt_tbl` VALUES ('678', '32', 'Qua\'an Pan') ; 
INSERT INTO `local_govt_tbl` VALUES ('679', '32', 'Riyom') ; 
INSERT INTO `local_govt_tbl` VALUES ('680', '32', 'Shendam') ; 
INSERT INTO `local_govt_tbl` VALUES ('681', '32', 'Wase') ; 
INSERT INTO `local_govt_tbl` VALUES ('682', '33', 'Abua/Odual') ; 
INSERT INTO `local_govt_tbl` VALUES ('683', '33', 'Ahoada East') ; 
INSERT INTO `local_govt_tbl` VALUES ('684', '33', 'Ahoada West') ; 
INSERT INTO `local_govt_tbl` VALUES ('685', '33', 'Akuku-Toru') ; 
INSERT INTO `local_govt_tbl` VALUES ('686', '33', 'Andoni') ; 
INSERT INTO `local_govt_tbl` VALUES ('687', '33', 'Asari-Toru') ; 
INSERT INTO `local_govt_tbl` VALUES ('688', '33', 'Bonny') ; 
INSERT INTO `local_govt_tbl` VALUES ('689', '33', 'Degema') ; 
INSERT INTO `local_govt_tbl` VALUES ('690', '33', 'Eleme') ; 
INSERT INTO `local_govt_tbl` VALUES ('691', '33', 'Emuoha') ; 
INSERT INTO `local_govt_tbl` VALUES ('692', '33', 'Etche') ; 
INSERT INTO `local_govt_tbl` VALUES ('693', '33', 'Gokana') ; 
INSERT INTO `local_govt_tbl` VALUES ('694', '33', 'Ikwerre') ; 
INSERT INTO `local_govt_tbl` VALUES ('695', '33', 'Khana') ; 
INSERT INTO `local_govt_tbl` VALUES ('696', '33', 'Obio/Akpor') ; 
INSERT INTO `local_govt_tbl` VALUES ('697', '33', 'Ogba/Egbema/Ndoni') ; 
INSERT INTO `local_govt_tbl` VALUES ('698', '33', 'Ogu/Bolo') ; 
INSERT INTO `local_govt_tbl` VALUES ('699', '33', 'Okrika') ; 
INSERT INTO `local_govt_tbl` VALUES ('700', '33', 'Omuma') ; 
INSERT INTO `local_govt_tbl` VALUES ('701', '33', 'Opobo/Nkoro') ; 
INSERT INTO `local_govt_tbl` VALUES ('702', '33', 'Oyigbo') ; 
INSERT INTO `local_govt_tbl` VALUES ('703', '33', 'Port Harcourt') ; 
INSERT INTO `local_govt_tbl` VALUES ('704', '33', 'Tai') ; 
INSERT INTO `local_govt_tbl` VALUES ('705', '34', 'Binji') ; 
INSERT INTO `local_govt_tbl` VALUES ('706', '34', 'Bodinga') ; 
INSERT INTO `local_govt_tbl` VALUES ('707', '34', 'Dange Shuni') ; 
INSERT INTO `local_govt_tbl` VALUES ('708', '34', 'Gada') ; 
INSERT INTO `local_govt_tbl` VALUES ('709', '34', 'Goronyo') ; 
INSERT INTO `local_govt_tbl` VALUES ('710', '34', 'Gudu') ; 
INSERT INTO `local_govt_tbl` VALUES ('711', '34', 'Gwadabawa') ; 
INSERT INTO `local_govt_tbl` VALUES ('712', '34', 'Illela') ; 
INSERT INTO `local_govt_tbl` VALUES ('713', '34', 'Isa') ; 
INSERT INTO `local_govt_tbl` VALUES ('714', '34', 'Kebbe') ; 
INSERT INTO `local_govt_tbl` VALUES ('715', '34', 'Kware') ; 
INSERT INTO `local_govt_tbl` VALUES ('716', '34', 'Rabah') ; 
INSERT INTO `local_govt_tbl` VALUES ('717', '34', 'Sabon Birni') ; 
INSERT INTO `local_govt_tbl` VALUES ('718', '34', 'Shagari') ; 
INSERT INTO `local_govt_tbl` VALUES ('719', '34', 'Silame') ; 
INSERT INTO `local_govt_tbl` VALUES ('720', '34', 'Sokoto North') ; 
INSERT INTO `local_govt_tbl` VALUES ('721', '34', 'Sokoto South') ; 
INSERT INTO `local_govt_tbl` VALUES ('722', '34', 'Tambuwal') ; 
INSERT INTO `local_govt_tbl` VALUES ('723', '34', 'Tangaza') ; 
INSERT INTO `local_govt_tbl` VALUES ('724', '34', 'Tureta') ; 
INSERT INTO `local_govt_tbl` VALUES ('725', '34', 'Wamako') ; 
INSERT INTO `local_govt_tbl` VALUES ('726', '34', 'Wurno') ; 
INSERT INTO `local_govt_tbl` VALUES ('727', '34', 'Yabo') ; 
INSERT INTO `local_govt_tbl` VALUES ('728', '35', 'Ardo Kola') ; 
INSERT INTO `local_govt_tbl` VALUES ('729', '35', 'Bali') ; 
INSERT INTO `local_govt_tbl` VALUES ('730', '35', 'Donga') ; 
INSERT INTO `local_govt_tbl` VALUES ('731', '35', 'Gashaka') ; 
INSERT INTO `local_govt_tbl` VALUES ('732', '35', 'Gassol') ; 
INSERT INTO `local_govt_tbl` VALUES ('733', '35', 'Ibi') ; 
INSERT INTO `local_govt_tbl` VALUES ('734', '35', 'Jalingo') ; 
INSERT INTO `local_govt_tbl` VALUES ('735', '35', 'Karim Lamido') ; 
INSERT INTO `local_govt_tbl` VALUES ('736', '35', 'Kumi') ; 
INSERT INTO `local_govt_tbl` VALUES ('737', '35', 'Lau') ; 
INSERT INTO `local_govt_tbl` VALUES ('738', '35', 'Sardauna') ; 
INSERT INTO `local_govt_tbl` VALUES ('739', '35', 'Takum') ; 
INSERT INTO `local_govt_tbl` VALUES ('740', '35', 'Ussa') ; 
INSERT INTO `local_govt_tbl` VALUES ('741', '35', 'Wukari') ; 
INSERT INTO `local_govt_tbl` VALUES ('742', '35', 'Yorro') ; 
INSERT INTO `local_govt_tbl` VALUES ('743', '35', 'Zing') ; 
INSERT INTO `local_govt_tbl` VALUES ('744', '36', 'Bade') ; 
INSERT INTO `local_govt_tbl` VALUES ('745', '36', 'Bursari') ; 
INSERT INTO `local_govt_tbl` VALUES ('746', '36', 'Damaturu') ; 
INSERT INTO `local_govt_tbl` VALUES ('747', '36', 'Fika') ; 
INSERT INTO `local_govt_tbl` VALUES ('748', '36', 'Fune') ; 
INSERT INTO `local_govt_tbl` VALUES ('749', '36', 'Geidam') ; 
INSERT INTO `local_govt_tbl` VALUES ('750', '36', 'Gujba') ; 
INSERT INTO `local_govt_tbl` VALUES ('751', '36', 'Gulani') ; 
INSERT INTO `local_govt_tbl` VALUES ('752', '36', 'Jakusko') ; 
INSERT INTO `local_govt_tbl` VALUES ('753', '36', 'Karasuwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('754', '36', 'Machina') ; 
INSERT INTO `local_govt_tbl` VALUES ('755', '36', 'Nangere') ; 
INSERT INTO `local_govt_tbl` VALUES ('756', '36', 'Nguru') ; 
INSERT INTO `local_govt_tbl` VALUES ('757', '36', 'Potiskum') ; 
INSERT INTO `local_govt_tbl` VALUES ('758', '36', 'Tarmuwa') ; 
INSERT INTO `local_govt_tbl` VALUES ('759', '36', 'Yunusari') ; 
INSERT INTO `local_govt_tbl` VALUES ('760', '36', 'Yusufari') ; 
INSERT INTO `local_govt_tbl` VALUES ('761', '37', 'Anka') ; 
INSERT INTO `local_govt_tbl` VALUES ('762', '37', 'Bakura') ; 
INSERT INTO `local_govt_tbl` VALUES ('763', '37', 'Birnin Magaji/Kiyaw') ; 
INSERT INTO `local_govt_tbl` VALUES ('764', '37', 'Bukkuyum') ; 
INSERT INTO `local_govt_tbl` VALUES ('765', '37', 'Bungudu') ; 
INSERT INTO `local_govt_tbl` VALUES ('766', '37', 'Gummi') ; 
INSERT INTO `local_govt_tbl` VALUES ('767', '37', 'Gusau') ; 
INSERT INTO `local_govt_tbl` VALUES ('768', '37', 'Kaura Namoda') ; 
INSERT INTO `local_govt_tbl` VALUES ('769', '37', 'Maradun') ; 
INSERT INTO `local_govt_tbl` VALUES ('770', '37', 'Maru') ; 
INSERT INTO `local_govt_tbl` VALUES ('771', '37', 'Shinkafi') ; 
INSERT INTO `local_govt_tbl` VALUES ('772', '37', 'Talata Mafara') ; 
INSERT INTO `local_govt_tbl` VALUES ('773', '37', 'Chafe') ; 
INSERT INTO `local_govt_tbl` VALUES ('774', '37', 'Zurmi') ;
#
# End of data contents of table local_govt_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table register_exam_subject_tbl (0 records)
#

#
# End of data contents of table register_exam_subject_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------


#
# Delete any existing table `school_oauth_code_tbl`
#

DROP TABLE IF EXISTS `school_oauth_code_tbl`;


#
# Table structure of table `school_oauth_code_tbl`
#

CREATE TABLE `school_oauth_code_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `active_ses` varchar(50) DEFAULT NULL,
  `oauth_code` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table school_oauth_code_tbl (0 records)
#

#
# End of data contents of table school_oauth_code_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
# --------------------------------------------------------


#
# Delete any existing table `school_offices`
#

DROP TABLE IF EXISTS `school_offices`;


#
# Table structure of table `school_offices`
#

CREATE TABLE `school_offices` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `office_desc` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table school_offices (9 records)
#
 
INSERT INTO `school_offices` VALUES ('1', 'Principal', 'Active', '2022-05-15') ; 
INSERT INTO `school_offices` VALUES ('2', 'Vice Principal', 'Active', '2022-05-15') ; 
INSERT INTO `school_offices` VALUES ('3', 'Class Teacher', 'Active', '2022-05-15') ; 
INSERT INTO `school_offices` VALUES ('4', 'Bursar', 'Active', '2022-05-17') ; 
INSERT INTO `school_offices` VALUES ('5', 'Teacher', 'Active', '2022-05-17') ; 
INSERT INTO `school_offices` VALUES ('6', 'Receptionist', 'Active', '2022-05-17') ; 
INSERT INTO `school_offices` VALUES ('7', 'Security', 'Active', '2022-05-17') ; 
INSERT INTO `school_offices` VALUES ('8', 'Registrar', 'Active', '2022-05-17') ; 
INSERT INTO `school_offices` VALUES ('9', 'Messenger', 'Inactive', '2022-07-02') ;
#
# End of data contents of table school_offices
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table school_subjects (42 records)
#
 
INSERT INTO `school_subjects` VALUES ('1', 'Mathematics', NULL, '', 'active', 'MTH 201', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('2', 'English Language', NULL, '', 'active', 'ENG20202', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('3', 'Yoruba Language', NULL, '', 'active', 'YOR203', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('4', 'History', NULL, '', 'active', 'HIS204', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('5', 'French', NULL, '', 'active', 'FRE205', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('6', 'Christian Religion Studies', NULL, '', 'active', 'CRS206', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('7', 'PVS', NULL, '', 'active', 'PVS207', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('8', 'National Values', NULL, '', 'active', 'NV208', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('9', 'BST', NULL, '', 'active', 'BST209', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('10', 'Literature-In-English', NULL, '', 'active', 'LIT210', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('11', 'Business Studies', NULL, '', 'active', 'BSS 211', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('12', 'CCA', NULL, '', 'active', 'CCA212', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('13', 'Phonics', NULL, '', 'active', 'PHN213', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('14', 'Music', NULL, '', 'active', 'MSC214', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('15', 'Physics', NULL, '', 'active', 'PHY215', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('16', 'Financial Accounting', NULL, '', 'active', 'FIN216', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('17', 'Chemistry', NULL, '', 'active', 'CHM217', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('18', 'Store Management', NULL, '', 'active', 'SMG218', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('19', 'Office Practice', NULL, '', 'active', 'OFP219', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('20', 'Insurance', NULL, '', 'active', 'INs220', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('21', 'Government', NULL, '', 'active', 'GOV221', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('22', 'Commerce', NULL, '', 'active', 'COM222', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('23', 'Computer', NULL, '', 'active', 'COM223', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('24', 'Economics', NULL, '', 'active', 'ECO224', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('25', 'Biology', NULL, '', 'active', 'BIO225', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('26', 'Agricultural Science', NULL, NULL, 'active', 'AGS226', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('27', 'Further Mathematics', NULL, '', 'active', 'FMT227', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('28', 'Number Work', NULL, '', 'active', 'Nw12', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('29', 'Letter Work', NULL, '', 'active', 'LW13', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('30', 'Basic Science', NULL, '', 'active', 'BS14', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('31', 'Health Habit', NULL, '', 'active', 'HH14', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('32', 'Social Norms', NULL, '', 'active', 'SON15', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('33', 'Civic Education', NULL, NULL, 'active', 'CV16', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('34', 'Poem Reading', NULL, '', 'active', 'POR17', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('35', 'Verbal Aptitude', NULL, NULL, 'active', 'VAP18', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('36', 'Quantitative Aptitude', NULL, '', 'active', 'QUA19', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('37', 'Diction', NULL, '', 'active', 'DIC20', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('38', 'Picture Reading', NULL, '', 'active', 'PICR21', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('39', 'Handwriting', NULL, '', 'active', 'HDW22', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('40', 'Current Affairs', NULL, '', 'active', 'CUA23', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('41', 'Home Economics', NULL, '', 'active', 'HECON24', '2022-06-14') ; 
INSERT INTO `school_subjects` VALUES ('42', 'Spoken English', NULL, '', 'active', 'SPENG25', '2022-06-14') ;
#
# End of data contents of table school_subjects
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
  `adminType` enum('Admin','Director') NOT NULL DEFAULT 'Director',
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_admin (2 records)
#
 
INSERT INTO `tbl_admin` VALUES ('1', 'Admin', 'admin@smatech.com', 'SMATech', '$2y$10$y.gA5dihV/vVsrjpH9JFY.FqLxf9n19eOumxg7KU7qblncFh9Kjdq', '0', 'Osotech Software', NULL, NULL, '23456vb8l0mpaxqwe234', '2022-01-26 08:34:42') ; 
INSERT INTO `tbl_admin` VALUES ('2', 'Director', 'user@smatech.com', 'Director', '$2y$10$/pdf.OVS0iS8ZYvgVI3Zj.fIZsOnjnxH58VXaqpo06KE8HwbWtIXe', '1', 'Smapp User', NULL, NULL, '3wsxvnmk0oo9673saq12', '2022-05-15 22:17:37') ;
#
# End of data contents of table tbl_admin
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_exam_pins (0 records)
#

#
# End of data contents of table tbl_exam_pins
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
  `usedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_reg_pins (7 records)
#
 
INSERT INTO `tbl_reg_pins` VALUES ('1', '4750213198326', 'SMA84E1D3', 'Registration Pins', '5000', '0', '2022-08-05', NULL) ; 
INSERT INTO `tbl_reg_pins` VALUES ('2', '0733922156814', 'SMA114BF0', 'Registration Pins', '5000', '0', '2022-08-05', NULL) ; 
INSERT INTO `tbl_reg_pins` VALUES ('3', '0732386119452', 'SMA8A37B3', 'Registration Pins', '5000', '0', '2022-08-05', NULL) ; 
INSERT INTO `tbl_reg_pins` VALUES ('4', '6112932784530', 'SMA034A14', 'Registration Pins', '5000', '0', '2022-08-05', NULL) ; 
INSERT INTO `tbl_reg_pins` VALUES ('5', '3908622451137', 'SMA312057', 'Registration Pins', '5000', '0', '2022-08-05', NULL) ; 
INSERT INTO `tbl_reg_pins` VALUES ('6', '6214620135573', 'SMA378AB3', 'Registration Pins', '5000', '0', '2022-08-05', NULL) ; 
INSERT INTO `tbl_reg_pins` VALUES ('7', '3804612193572', 'SMA144370', 'Registration Pins', '5000', '0', '2022-08-05', NULL) ;
#
# End of data contents of table tbl_reg_pins
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Data contents of table tbl_result_pins (9 records)
#
 
INSERT INTO `tbl_result_pins` VALUES ('2', '612353419027', 'SMR387BA', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('3', '512420657163', 'SMR1401F', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('4', '127616350542', 'SMRC96FA', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('5', '253051421766', 'SMRF5B13', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('6', '106532527641', 'SMR11B3F', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('7', '322851340679', 'SMRE83D3', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('8', '261251043753', 'SMRF011B', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('9', '143659017322', 'SMR41704', 'Result Checker Pins', '200', '0', '2022-08-05') ; 
INSERT INTO `tbl_result_pins` VALUES ('10', '330556421172', 'SMR69AFC', 'Result Checker Pins', '200', '0', '2022-08-05') ;
#
# End of data contents of table tbl_result_pins
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------


#
# Delete any existing table `tbl_result_pins_history`
#

DROP TABLE IF EXISTS `tbl_result_pins_history`;


#
# Table structure of table `tbl_result_pins_history`
#

CREATE TABLE `tbl_result_pins_history` (
  `pinId` bigint(20) NOT NULL AUTO_INCREMENT,
  `studentRegNo` varchar(20) DEFAULT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `pin_code` varchar(20) DEFAULT NULL,
  `pin_serial` varchar(20) DEFAULT NULL,
  `pin_counter` int(1) NOT NULL DEFAULT 0,
  `used_term` varchar(20) DEFAULT NULL,
  `used_session` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pinId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_result_pins_history (0 records)
#

#
# End of data contents of table tbl_result_pins_history
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table tbl_serial (1 records)
#
 
INSERT INTO `tbl_serial` VALUES ('1', 'XTAS-KM87-EWA6-09CQ-5J0V', '2022-08-01', '2023-07-01', 'Smatech', '::1') ;
#
# End of data contents of table tbl_serial
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
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
 
INSERT INTO `tbl_settings` VALUES ('1', 'Osotech School Portal', 'All about your Satisfaction', 'Welcome to Osotech School Portal  This is just a demo welcome message to all Users short', 'info@osotechsoftware.com.ng', 'Sango Ota Ogun state', '08000990090', '09098989878', 'Monday', 'Friday', '9:00 am', '5:00 pm', 'logo_16565933324144043.png', 'Ogun State', 'Sango Ota', 'Nigeria') ;
#
# End of data contents of table tbl_settings
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------


#
# Delete any existing table `visap_admin_login_token`
#

DROP TABLE IF EXISTS `visap_admin_login_token`;


#
# Table structure of table `visap_admin_login_token`
#

CREATE TABLE `visap_admin_login_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Token` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_admin_login_token (1 records)
#
 
INSERT INTO `visap_admin_login_token` VALUES ('6', 'SMATech', 'admin@smatech.com', 'bpPealxlsiowDGzu8hDMytdZnNYzQJgGIhpe2qEq') ;
#
# End of data contents of table visap_admin_login_token
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_admission_open_tbl`
#

DROP TABLE IF EXISTS `visap_admission_open_tbl`;


#
# Table structure of table `visap_admission_open_tbl`
#

CREATE TABLE `visap_admission_open_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_desc` text DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `adm_start` date DEFAULT NULL,
  `adm_end` date DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `interview_time` time DEFAULT NULL,
  `schl_session` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_admission_open_tbl (1 records)
#
 
INSERT INTO `visap_admission_open_tbl` VALUES ('3', 'September Admission', 'Batch A', '2022-08-08', '2022-08-25', '2022-08-29', '09:00:00', '2021/2022', 'A simple, good looking cookie alert for Bootstrap. No dependencies required. We recommend using Bootstrap 4, but Boostrap 3 should work fine as well.', '1') ;
#
# End of data contents of table visap_admission_open_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_assignment_tbl`
#

DROP TABLE IF EXISTS `visap_assignment_tbl`;


#
# Table structure of table `visap_assignment_tbl`
#

CREATE TABLE `visap_assignment_tbl` (
  `assId` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `ass_content` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `download_counter` int(11) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `schl_session` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`assId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_assignment_tbl (0 records)
#

#
# End of data contents of table visap_assignment_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_behavioral_tbl`
#

DROP TABLE IF EXISTS `visap_behavioral_tbl`;


#
# Table structure of table `visap_behavioral_tbl`
#

CREATE TABLE `visap_behavioral_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) DEFAULT NULL,
  `reg_number` varchar(20) DEFAULT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `session` varchar(30) DEFAULT NULL,
  `punctuality` int(2) DEFAULT NULL,
  `neatness` int(2) DEFAULT NULL,
  `honesty` int(2) DEFAULT NULL,
  `self_control` int(2) DEFAULT NULL,
  `attentiveness` int(2) DEFAULT NULL,
  `leadership` int(2) DEFAULT NULL,
  `class_teacher` varchar(200) DEFAULT NULL,
  `uploaded_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_behavioral_tbl (0 records)
#

#
# End of data contents of table visap_behavioral_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------


#
# Delete any existing table `visap_blog_post_comments`
#

DROP TABLE IF EXISTS `visap_blog_post_comments`;


#
# Table structure of table `visap_blog_post_comments`
#

CREATE TABLE `visap_blog_post_comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `blogId` int(11) DEFAULT NULL,
  `guestName` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `comment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_blog_post_comments (0 records)
#

#
# End of data contents of table visap_blog_post_comments
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_blog_post_tbl`
#

DROP TABLE IF EXISTS `visap_blog_post_tbl`;


#
# Table structure of table `visap_blog_post_tbl`
#

CREATE TABLE `visap_blog_post_tbl` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `blog_title` text DEFAULT NULL,
  `blog_content` mediumtext DEFAULT NULL,
  `blog_image` text DEFAULT NULL,
  `blog_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `total_view` int(11) DEFAULT NULL,
  `total_comment` int(11) DEFAULT NULL,
  `blog_time` time DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_blog_post_tbl (0 records)
#

#
# End of data contents of table visap_blog_post_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_class_attendance_tbl`
#

DROP TABLE IF EXISTS `visap_class_attendance_tbl`;


#
# Table structure of table `visap_class_attendance_tbl`
#

CREATE TABLE `visap_class_attendance_tbl` (
  `attend_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stdReg` varchar(20) DEFAULT NULL,
  `studentGrade` varchar(20) DEFAULT NULL,
  `roll_call` varchar(20) DEFAULT NULL,
  `attendant_date` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_session` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`attend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_class_attendance_tbl (0 records)
#

#
# End of data contents of table visap_class_attendance_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_class_grade_tbl (23 records)
#
 
INSERT INTO `visap_class_grade_tbl` VALUES ('1', 'Preparatory', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('2', 'Creche', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('3', 'KG 1', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('4', 'KG 2', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('5', 'Nursery 1', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('6', 'Nursery 2', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('7', 'Basic 1', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('8', 'Basic 2', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('9', 'Basic 3', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('10', 'Basic 4', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('11', 'Basic 5', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('12', 'JSS 1', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('13', 'JSS 2', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('14', 'JSS 3', 'A', 'none', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('15', 'SSS 1', 'A', 'science', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('16', 'SSS 1', 'B', 'art', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('17', 'SSS 1', 'C', 'commercial', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('18', 'SSS 2', 'A', 'science', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('19', 'SSS 2', 'B', 'art', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('20', 'SSS 2', 'C', 'commercial', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('21', 'SSS 3', 'A', 'science', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('22', 'SSS 3', 'B', 'art', NULL, 'active', '2022-06-14') ; 
INSERT INTO `visap_class_grade_tbl` VALUES ('23', 'SSS 3', 'C', 'commercial', NULL, 'active', '2022-06-14') ;
#
# End of data contents of table visap_class_grade_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_classnote_tbl (0 records)
#

#
# End of data contents of table visap_classnote_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_exam_subject_tbl`
#

DROP TABLE IF EXISTS `visap_exam_subject_tbl`;


#
# Table structure of table `visap_exam_subject_tbl`
#

CREATE TABLE `visap_exam_subject_tbl` (
  `examId` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(11) DEFAULT NULL,
  `exam_class` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `exam_file` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_session` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`examId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_exam_subject_tbl (0 records)
#

#
# End of data contents of table visap_exam_subject_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_fee_component_tbl (0 records)
#

#
# End of data contents of table visap_fee_component_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_gallery_tbl`
#

DROP TABLE IF EXISTS `visap_gallery_tbl`;


#
# Table structure of table `visap_gallery_tbl`
#

CREATE TABLE `visap_gallery_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_gallery_tbl (0 records)
#

#
# End of data contents of table visap_gallery_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_holiday_tbl`
#

DROP TABLE IF EXISTS `visap_holiday_tbl`;


#
# Table structure of table `visap_holiday_tbl`
#

CREATE TABLE `visap_holiday_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_desc` varchar(255) DEFAULT NULL,
  `declared_by` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `note_msg` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_holiday_tbl (0 records)
#

#
# End of data contents of table visap_holiday_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_loan_tbl (0 records)
#

#
# End of data contents of table visap_loan_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_notice_board_tbl`
#

DROP TABLE IF EXISTS `visap_notice_board_tbl`;


#
# Table structure of table `visap_notice_board_tbl`
#

CREATE TABLE `visap_notice_board_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `event_content` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `posted_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_notice_board_tbl (0 records)
#

#
# End of data contents of table visap_notice_board_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_offered_subject_tbl`
#

DROP TABLE IF EXISTS `visap_offered_subject_tbl`;


#
# Table structure of table `visap_offered_subject_tbl`
#

CREATE TABLE `visap_offered_subject_tbl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_class` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `aca_session` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_offered_subject_tbl (0 records)
#

#
# End of data contents of table visap_offered_subject_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_people_say_tbl`
#

DROP TABLE IF EXISTS `visap_people_say_tbl`;


#
# Table structure of table `visap_people_say_tbl`
#

CREATE TABLE `visap_people_say_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_people_say_tbl (2 records)
#
 
INSERT INTO `visap_people_say_tbl` VALUES ('2', 'Mrs Agberqayi Blessing', 'sample of the content', 'SMATech_testi_62e6709cc9e2d.jpg', 'Trader', '2022-07-31') ; 
INSERT INTO `visap_people_say_tbl` VALUES ('4', 'Engr. Dapo Abiodun', 'This is the best school so far', 'SMATech_testi_62e6979cac0a2.png', 'Politician', '2022-07-31') ;
#
# End of data contents of table visap_people_say_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_prefect_title_tbl`
#

DROP TABLE IF EXISTS `visap_prefect_title_tbl`;


#
# Table structure of table `visap_prefect_title_tbl`
#

CREATE TABLE `visap_prefect_title_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_prefect_title_tbl (0 records)
#

#
# End of data contents of table visap_prefect_title_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_psycho_tbl`
#

DROP TABLE IF EXISTS `visap_psycho_tbl`;


#
# Table structure of table `visap_psycho_tbl`
#

CREATE TABLE `visap_psycho_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) DEFAULT NULL,
  `reg_number` varchar(50) DEFAULT NULL,
  `student_class` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `Handwriting` int(2) DEFAULT NULL,
  `Sports` int(2) DEFAULT NULL,
  `Fluency` int(2) DEFAULT NULL,
  `Handlingtools` int(2) DEFAULT NULL,
  `Drawing` int(2) DEFAULT NULL,
  `crafts` int(2) DEFAULT NULL,
  `class_teacher` varchar(100) DEFAULT NULL,
  `uploaded_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_psycho_tbl (0 records)
#

#
# End of data contents of table visap_psycho_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_registered_subject_tbl`
#

DROP TABLE IF EXISTS `visap_registered_subject_tbl`;


#
# Table structure of table `visap_registered_subject_tbl`
#

CREATE TABLE `visap_registered_subject_tbl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_class` varchar(50) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `createdBy` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_registered_subject_tbl (0 records)
#

#
# End of data contents of table visap_registered_subject_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_result_comment_tbl`
#

DROP TABLE IF EXISTS `visap_result_comment_tbl`;


#
# Table structure of table `visap_result_comment_tbl`
#

CREATE TABLE `visap_result_comment_tbl` (
  `commentId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stdRegNo` varchar(20) DEFAULT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `teacher_comment` text DEFAULT NULL,
  `principal_coment` text DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_Sess` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_result_comment_tbl (0 records)
#

#
# End of data contents of table visap_result_comment_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
 
INSERT INTO `visap_result_grading_tbl` VALUES ('1', 'Pry', 'A', '89', '100', 'Excellence', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('2', 'Pry', 'B', '79', '88', 'V.Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('3', 'Pry', 'C', '50', '59', 'Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('4', 'Pry', 'D', '40', '49', 'Poor', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('5', 'Pry', 'E', '30', '39', 'Fair', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('6', 'Pry', 'F', '1', '29', 'Failed', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('7', 'Junior', 'A', '80', '100', 'Excellence', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('8', 'Junior', 'B', '70', '79', 'V.Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('9', 'Junior', 'C', '60', '69', 'Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('10', 'Junior', 'D', '50', '59', 'Poor', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('11', 'Junior', 'E', '40', '49', 'Fair', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('12', 'Junior', 'F', '1', '39', 'Fail', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('13', 'Senior', 'A1', '80', '100', 'Distinctions', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('14', 'Senior', 'B2', '75', '79', 'Excellence', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('15', 'Senior', 'B3', '70', '74', 'Good', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('16', 'Senior', 'C4', '65', '69', 'Credit', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('17', 'Senior', 'C5', '60', '64', 'Credit', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('18', 'Senior', 'C6', '50', '59', 'Pass', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('19', 'Senior', 'D7', '40', '49', 'Pass', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('20', 'Senior', 'E8', '30', '39', 'Poor', '2021/2022') ; 
INSERT INTO `visap_result_grading_tbl` VALUES ('21', 'Senior', 'F9', '1', '29', 'Failed', '2021/2022') ;
#
# End of data contents of table visap_result_grading_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_fee_allocation_tbl (0 records)
#

#
# End of data contents of table visap_school_fee_allocation_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_school_prefect_tbl`
#

DROP TABLE IF EXISTS `visap_school_prefect_tbl`;


#
# Table structure of table `visap_school_prefect_tbl`
#

CREATE TABLE `visap_school_prefect_tbl` (
  `prefectId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) DEFAULT NULL,
  `studentGrade` varchar(20) DEFAULT NULL,
  `officeName` varchar(200) DEFAULT NULL,
  `school_session` varchar(50) DEFAULT NULL,
  `activeness` tinyint(1) NOT NULL DEFAULT 1,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`prefectId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_prefect_tbl (0 records)
#

#
# End of data contents of table visap_school_prefect_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
# --------------------------------------------------------


#
# Delete any existing table `visap_school_profile`
#

DROP TABLE IF EXISTS `visap_school_profile`;


#
# Table structure of table `visap_school_profile`
#

CREATE TABLE `visap_school_profile` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) DEFAULT NULL,
  `govt_approve_number` varchar(20) DEFAULT NULL,
  `school_address` text DEFAULT NULL,
  `school_slogan` varchar(255) DEFAULT NULL,
  `school_director` varchar(100) DEFAULT NULL,
  `director_mobile` varchar(20) DEFAULT NULL,
  `registrar` varchar(100) DEFAULT NULL,
  `registrar_mobile` varchar(20) DEFAULT NULL,
  `principal` varchar(100) DEFAULT NULL,
  `principal_mobile` varchar(20) DEFAULT NULL,
  `school_state` varchar(50) DEFAULT NULL,
  `school_city` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `school_email` varchar(100) DEFAULT NULL,
  `school_phone` varchar(15) DEFAULT NULL,
  `school_fax` varchar(15) DEFAULT NULL,
  `website_url` text DEFAULT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `school_barcode` varchar(255) DEFAULT NULL,
  `school_badge` varchar(255) DEFAULT NULL,
  `school_favicon` varchar(25) DEFAULT NULL,
  `default_language` varchar(100) DEFAULT NULL,
  `school_history` text DEFAULT NULL,
  `founded_year` varchar(20) DEFAULT NULL,
  `school_gmail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_profile (1 records)
#
 
INSERT INTO `visap_school_profile` VALUES ('1', 'School Management Application', 'C26313', 'Plot 8,Block2, Smatech  Avenue, Lagos', 'Education Is Without Bias', 'Engr. Samson Idowu A', '+2348131374443', 'Miss Iremide Agberayi E', '+2348140122566', 'Mrs. Blessing Agberayi T (BSc)', '+2349036583063', 'Osun State', 'Ifelodun', 'Nigeria', '2345', 'info@smatech.com', '08131374443', '09036583063', 'www.smatech.com', 'www.julitschools.com', NULL, NULL, NULL, NULL, 'English', 'Smatech  designed to provide learning in conducive environment for the teaching of students under the direction of qualified teachers. In our school, students progress through a series of school activities.

The school was established in the year 2012 and has since increase in population as our aim is to provide competitive and quality education in a conducive environment with all learning aids.

We have highly qualified teachers taking all the various subjects from Basic level to secondary level. All subjects are covered and the curriculum of the school is based on the scheme of work from the ministry of education.', '2nd May,1998', 'smatech@gmail.com') ;
#
# End of data contents of table visap_school_profile
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_school_session_history_tbl (2 records)
#
 
INSERT INTO `visap_school_session_history_tbl` VALUES ('1', '2021/2022', '1st Term', '70', '16', '2022-08-27', '2022-09-05', '2022-07-26') ; 
INSERT INTO `visap_school_session_history_tbl` VALUES ('2', '2021/2022', '2nd Term', '62', '14', '2022-04-16', '2022-05-09', '2022-07-26') ;
#
# End of data contents of table visap_school_session_history_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
 
INSERT INTO `visap_school_session_tbl` VALUES ('1', '2021/2022', '3rd Term', '59', '13', '2022-07-29', '2022-09-19') ;
#
# End of data contents of table visap_school_session_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_session_list (1 records)
#
 
INSERT INTO `visap_session_list` VALUES ('1', '2021/2022') ;
#
# End of data contents of table visap_session_list
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_sliders_tbl`
#

DROP TABLE IF EXISTS `visap_sliders_tbl`;


#
# Table structure of table `visap_sliders_tbl`
#

CREATE TABLE `visap_sliders_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slider_desc` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_sliders_tbl (4 records)
#
 
INSERT INTO `visap_sliders_tbl` VALUES ('1', 'Abolarin', 'This will be the content', 'SMApp_62d689d859c7b_.jpg', '1', '2022-07-19') ; 
INSERT INTO `visap_sliders_tbl` VALUES ('2', 'Anotheer Topic', 'Sample caption', 'SMApp_62d68a0d12de3_.jpg', '1', '2022-07-19') ; 
INSERT INTO `visap_sliders_tbl` VALUES ('3', 'School Name', 'This is just the Content', 'SMApp_62d72257774f6_.jpg', '1', '2022-07-19') ; 
INSERT INTO `visap_sliders_tbl` VALUES ('4', 'Abolarin The King', 'HRM Kabiyesi Oba Abolarin And His Chiefs', 'SMApp_62dc7b2fc5dbc_.jpg', '1', '2022-07-23') ;
#
# End of data contents of table visap_sliders_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_social_link_tbl`
#

DROP TABLE IF EXISTS `visap_social_link_tbl`;


#
# Table structure of table `visap_social_link_tbl`
#

CREATE TABLE `visap_social_link_tbl` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `twitter` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `goggle` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_social_link_tbl (1 records)
#
 
INSERT INTO `visap_social_link_tbl` VALUES ('1', 'https://www.twitter.com/abolarincollege', 'https://youtube.com/abolarincollege', 'https://facebook.com/abolarincollege', 'https://googleplus.com/abolarincollege', 'https://instagram.com/abolarincollege', 'https://www.linkedin.com/abolarincollege') ;
#
# End of data contents of table visap_social_link_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_bank_details_tbl (0 records)
#

#
# End of data contents of table visap_staff_bank_details_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_duty_tbl (0 records)
#

#
# End of data contents of table visap_staff_duty_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------


#
# Delete any existing table `visap_staff_login_token`
#

DROP TABLE IF EXISTS `visap_staff_login_token`;


#
# Table structure of table `visap_staff_login_token`
#

CREATE TABLE `visap_staff_login_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_login_token (1 records)
#
 
INSERT INTO `visap_staff_login_token` VALUES ('1', 'oiza', 'oizablessing@gmail.com', 'OLey69O3ZNkh8Eftd8fRKyeodGQCVm') ;
#
# End of data contents of table visap_staff_login_token
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_payroll_tbl (0 records)
#

#
# End of data contents of table visap_staff_payroll_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_staff_post_tbl`
#

DROP TABLE IF EXISTS `visap_staff_post_tbl`;


#
# Table structure of table `visap_staff_post_tbl`
#

CREATE TABLE `visap_staff_post_tbl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `duty` varchar(20) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schlSes` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_post_tbl (0 records)
#

#
# End of data contents of table visap_staff_post_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
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
  `staffRole` varchar(100) DEFAULT NULL,
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
  `staffAssignedClass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`staffId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_staff_tbl (0 records)
#

#
# End of data contents of table visap_staff_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_state_tbl`
#

DROP TABLE IF EXISTS `visap_state_tbl`;


#
# Table structure of table `visap_state_tbl`
#

CREATE TABLE `visap_state_tbl` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_state_tbl (37 records)
#
 
INSERT INTO `visap_state_tbl` VALUES ('1', 'Abia State') ; 
INSERT INTO `visap_state_tbl` VALUES ('2', 'Adamawa State') ; 
INSERT INTO `visap_state_tbl` VALUES ('3', 'Akwa Ibom State') ; 
INSERT INTO `visap_state_tbl` VALUES ('4', 'Anambra State') ; 
INSERT INTO `visap_state_tbl` VALUES ('5', 'Bauchi State') ; 
INSERT INTO `visap_state_tbl` VALUES ('6', 'Bayelsa State') ; 
INSERT INTO `visap_state_tbl` VALUES ('7', 'Benue State') ; 
INSERT INTO `visap_state_tbl` VALUES ('8', 'Borno State') ; 
INSERT INTO `visap_state_tbl` VALUES ('9', 'Cross River State') ; 
INSERT INTO `visap_state_tbl` VALUES ('10', 'Delta State') ; 
INSERT INTO `visap_state_tbl` VALUES ('11', 'Ebonyi State') ; 
INSERT INTO `visap_state_tbl` VALUES ('12', 'Edo State') ; 
INSERT INTO `visap_state_tbl` VALUES ('13', 'Ekiti State') ; 
INSERT INTO `visap_state_tbl` VALUES ('14', 'Enugu State') ; 
INSERT INTO `visap_state_tbl` VALUES ('15', 'FCT') ; 
INSERT INTO `visap_state_tbl` VALUES ('16', 'Gombe State') ; 
INSERT INTO `visap_state_tbl` VALUES ('17', 'Imo State') ; 
INSERT INTO `visap_state_tbl` VALUES ('18', 'Jigawa State') ; 
INSERT INTO `visap_state_tbl` VALUES ('19', 'Kaduna State') ; 
INSERT INTO `visap_state_tbl` VALUES ('20', 'Kano State') ; 
INSERT INTO `visap_state_tbl` VALUES ('21', 'Katsina State') ; 
INSERT INTO `visap_state_tbl` VALUES ('22', 'Kebbi State') ; 
INSERT INTO `visap_state_tbl` VALUES ('23', 'Kogi State') ; 
INSERT INTO `visap_state_tbl` VALUES ('24', 'Kwara State') ; 
INSERT INTO `visap_state_tbl` VALUES ('25', 'Lagos State') ; 
INSERT INTO `visap_state_tbl` VALUES ('26', 'Nasarawa State') ; 
INSERT INTO `visap_state_tbl` VALUES ('27', 'Niger State') ; 
INSERT INTO `visap_state_tbl` VALUES ('28', 'Ogun State') ; 
INSERT INTO `visap_state_tbl` VALUES ('29', 'Ondo State') ; 
INSERT INTO `visap_state_tbl` VALUES ('30', 'Osun State') ; 
INSERT INTO `visap_state_tbl` VALUES ('31', 'Oyo State') ; 
INSERT INTO `visap_state_tbl` VALUES ('32', 'Plateau State') ; 
INSERT INTO `visap_state_tbl` VALUES ('33', 'Rivers State') ; 
INSERT INTO `visap_state_tbl` VALUES ('34', 'Sokoto State') ; 
INSERT INTO `visap_state_tbl` VALUES ('35', 'Taraba State') ; 
INSERT INTO `visap_state_tbl` VALUES ('36', 'Yobe State') ; 
INSERT INTO `visap_state_tbl` VALUES ('37', 'Zamfara State') ;
#
# End of data contents of table visap_state_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
  `stdIsHospitalized` varchar(100) DEFAULT NULL COMMENT '0=No, 1=Yes',
  `stdSurgical` varchar(100) DEFAULT NULL COMMENT '0=No, 1=Yes',
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
# --------------------------------------------------------


#
# Delete any existing table `visap_student_login_token`
#

DROP TABLE IF EXISTS `visap_student_login_token`;


#
# Table structure of table `visap_student_login_token`
#

CREATE TABLE `visap_student_login_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_login_token (0 records)
#

#
# End of data contents of table visap_student_login_token
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_payment_history_tbl (0 records)
#

#
# End of data contents of table visap_student_payment_history_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_payment_tbl (0 records)
#

#
# End of data contents of table visap_student_payment_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`stdId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_student_tbl (0 records)
#

#
# End of data contents of table visap_student_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
# Table: `visap_submitted_class_assignment_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_submitted_class_assignment_tbl`
#

DROP TABLE IF EXISTS `visap_submitted_class_assignment_tbl`;


#
# Table structure of table `visap_submitted_class_assignment_tbl`
#

CREATE TABLE `visap_submitted_class_assignment_tbl` (
  `aId` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `tId` int(11) DEFAULT NULL,
  `stdRegno` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `score` int(3) DEFAULT 0,
  `term` varchar(20) DEFAULT NULL,
  `school_session` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=not seen,1=seen',
  `Submitted_at` date DEFAULT NULL,
  `note_to_student` text DEFAULT NULL,
  PRIMARY KEY (`aId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_submitted_class_assignment_tbl (0 records)
#

#
# End of data contents of table visap_submitted_class_assignment_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
# Table: `visap_submitted_class_assignment_tbl`
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
  `mark_average` double NOT NULL DEFAULT 0,
  `uploadedTime` time DEFAULT NULL,
  `uploadedDate` date DEFAULT NULL,
  `rStatus` smallint(1) NOT NULL DEFAULT 2,
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
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
# Table: `visap_submitted_class_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_termly_result_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_upcoming_event_tbl`
# --------------------------------------------------------


#
# Delete any existing table `visap_upcoming_event_tbl`
#

DROP TABLE IF EXISTS `visap_upcoming_event_tbl`;


#
# Table structure of table `visap_upcoming_event_tbl`
#

CREATE TABLE `visap_upcoming_event_tbl` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(2) DEFAULT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_detail` longtext DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `eorganizer` varchar(255) DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `etime` time DEFAULT NULL,
  `evenue` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_upcoming_event_tbl (0 records)
#

#
# End of data contents of table visap_upcoming_event_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
# Table: `visap_submitted_class_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_termly_result_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_upcoming_event_tbl`
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
  `file_type` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `uploaded_date` date DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`lectureId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visap_virtual_lesson_tbl (0 records)
#

#
# End of data contents of table visap_virtual_lesson_tbl
# --------------------------------------------------------

# WordPress : buffernow.com MySQL database backup
#
# Generated: Saturday 6. August 2022 19:13 WAT
# Hostname: localhost
# Database: `diamond_portal`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `api_module_config`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `current_session_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `local_govt_tbl`
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
# Table: `school_oauth_code_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `school_offices`
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
# Table: `tbl_result_pins_history`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_serial`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_settings`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admin_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_admission_open_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_behavioral_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_blog_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_attendance_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_class_grade_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_classnote_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_exam_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_fee_component_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_gallery_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_holiday_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_loan_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_notice_board_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_offered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_people_say_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_prefect_title_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_psycho_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_registered_subject_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_result_comment_tbl`
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
# Table: `visap_school_prefect_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_school_profile`
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
# Table: `visap_sliders_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_social_link_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_bank_details_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_duty_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_login_token`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_paid_salary_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_payroll_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_post_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_staff_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_state_tbl`
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
# Table: `visap_student_login_token`
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
# Table: `visap_submitted_class_assignment_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_termly_result_tbl`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `visap_upcoming_event_tbl`
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
  `NIN_number` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `cterm` varchar(50) DEFAULT NULL,
  `cses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

#
# Data contents of table visitor_book (0 records)
#

#
# End of data contents of table visitor_book
# --------------------------------------------------------

