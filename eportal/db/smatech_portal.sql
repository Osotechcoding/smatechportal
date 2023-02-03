-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 08:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smatech_portal`
--
CREATE DATABASE IF NOT EXISTS `smatech_portal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `smatech_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `api_module_config`
--

CREATE TABLE IF NOT EXISTS `api_module_config` (
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_module_config`
--

INSERT INTO `api_module_config` (`id`, `module`, `type`, `description`, `detail`, `status`, `api_user`, `api_pass`, `api_def`) VALUES
(1, 'student_registration', 'registration', 'Student Registration', 'Enabling this will open admission portal for new students to Register on the school portal', 1, '', '', ''),
(2, 'upload_attendance', 'main', 'Student attendance uploading', 'When allowed staff can upload student attendance details', 1, '', '', ''),
(3, 'student_login', 'login', 'Student Login', 'When Enabled, students will be allowed to log in', 1, '', '', ''),
(4, 'staff_registration', 'registration', 'Staff Registration', 'When enabled, new Applicant Staff can submit their CV on the Career Portal', 1, '', '', ''),
(6, 'staff_login', 'login', 'Staff Login', 'When enabled, staff will be able to log in', 1, '', '', ''),
(14, 'maintenance_mode', 'main', 'Maintenance Mode', 'When this is turned on, the portal puts itself to maintenence mode', 1, '', '', ''),
(17, 'result_checking', 'main', 'Student Result Checking Portal Enable/Disable', 'if this is open, the students can check their result else they cant', 1, '', '', ''),
(18, 'student_result_uploading', 'main', 'Staff Result Uploading', 'When enabled, Staff have the privilege to upload result', 1, '', '', ''),
(19, 'result_note', 'main', 'Show result note', 'When enabled, note will show on result', 1, '', '', ''),
(20, 'result_comment', 'main', 'Result Comment', 'when open, result comment will be shown', 1, '', '', ''),
(21, 'card_generator', 'main', 'Card Generator', 'Enabling this Scratch Card can be Generated', 1, '', '', ''),
(22, 'leave_request', 'main', 'Leave Request', 'When enables, Staff Can Apply for a leave', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `current_session_tbl`
--

CREATE TABLE IF NOT EXISTS `current_session_tbl` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `session_desc_name` varchar(20) DEFAULT NULL,
  `term_desc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_session_tbl`
--

INSERT INTO `current_session_tbl` (`id`, `session_desc_name`, `term_desc`) VALUES
(1, '2022/2023', '2nd Term');

-- --------------------------------------------------------

--
-- Table structure for table `local_govt_tbl`
--

CREATE TABLE IF NOT EXISTS `local_govt_tbl` (
  `local_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT NULL,
  `local_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`local_id`)
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `local_govt_tbl`
--

INSERT INTO `local_govt_tbl` (`local_id`, `state_id`, `local_name`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala Ngwa North'),
(7, 1, 'Isiala Ngwa South'),
(8, 1, 'Isuikwuato'),
(9, 1, 'Obi Ngwa'),
(10, 1, 'Ohafia'),
(11, 1, 'Osisioma'),
(12, 1, 'Ugwunagbo'),
(13, 1, 'Ukwa East'),
(14, 1, 'Ukwa West'),
(15, 1, 'Umuahia North'),
(16, 1, 'Umuahia South'),
(17, 1, 'Umu Nneochi'),
(18, 2, 'Demsa'),
(19, 2, 'Fufure'),
(20, 2, 'Ganye'),
(21, 2, 'Gayuk'),
(22, 2, 'Gombi'),
(23, 2, 'Grie'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Lamurde'),
(27, 2, 'Madagali'),
(28, 2, 'Maiha'),
(29, 2, 'Mayo Belwa'),
(30, 2, 'Michika'),
(31, 2, 'Mubi North'),
(32, 2, 'Mubi South'),
(33, 2, 'Numan'),
(34, 2, 'Shelleng'),
(35, 2, 'Song'),
(36, 2, 'Toungo'),
(37, 2, 'Yola North'),
(38, 2, 'Yola South'),
(39, 3, 'Abak'),
(40, 3, 'Eastern Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Esit Eket'),
(43, 3, 'Essien Udim'),
(44, 3, 'Etim Ekpo'),
(45, 3, 'Etinan'),
(46, 3, 'Ibeno'),
(47, 3, 'Ibesikpo Asutan'),
(48, 3, 'Ibiono-Ibom'),
(49, 3, 'Ika'),
(50, 3, 'Ikono'),
(51, 3, 'Ikot Abasi'),
(52, 3, 'Ikot Ekpene'),
(53, 3, 'Ini'),
(54, 3, 'Itu'),
(55, 3, 'Mbo'),
(56, 3, 'Mkpat-Enin'),
(57, 3, 'Nsit-Atai'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oruk Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanafun'),
(67, 3, 'Uruan'),
(68, 3, 'Urue-Offong/Oruko'),
(69, 3, 'Uyo'),
(70, 4, 'Aguata'),
(71, 4, 'Anambra East'),
(72, 4, 'Anambra West'),
(73, 4, 'Anaocha'),
(74, 4, 'Awka North'),
(75, 4, 'Awka South'),
(76, 4, 'Ayamelum'),
(77, 4, 'Dunukofia'),
(78, 4, 'Ekwusigo'),
(79, 4, 'Idemili North'),
(80, 4, 'Idemili South'),
(81, 4, 'Ihiala'),
(82, 4, 'Njikoka'),
(83, 4, 'Nnewi North'),
(84, 4, 'Nnewi South'),
(85, 4, 'Ogbaru'),
(86, 4, 'Onitsha North'),
(87, 4, 'Onitsha South'),
(88, 4, 'Orumba North'),
(89, 4, 'Orumba South'),
(90, 4, 'Oyi'),
(91, 5, 'Alkaleri'),
(92, 5, 'Bauchi'),
(93, 5, 'Bogoro'),
(94, 5, 'Damban'),
(95, 5, 'Darazo'),
(96, 5, 'Dass'),
(97, 5, 'Gamawa'),
(98, 5, 'Ganjuwa'),
(99, 5, 'Giade'),
(100, 5, 'Itas/Gadau'),
(101, 5, 'Jama\'are'),
(102, 5, 'Katagum'),
(103, 5, 'Kirfi'),
(104, 5, 'Misau'),
(105, 5, 'Ningi'),
(106, 5, 'Shira'),
(107, 5, 'Tafawa Balewa'),
(108, 5, 'Toro'),
(109, 5, 'Warji'),
(110, 5, 'Zaki'),
(111, 6, 'Brass'),
(112, 6, 'Ekeremor'),
(113, 6, 'Kolokuma/Opokuma'),
(114, 6, 'Nembe'),
(115, 6, 'Ogbia'),
(116, 6, 'Sagbama'),
(117, 6, 'Southern Ijaw'),
(118, 6, 'Yenagoa'),
(119, 7, 'Agatu'),
(120, 7, 'Apa'),
(121, 7, 'Ado'),
(122, 7, 'Buruku'),
(123, 7, 'Gboko'),
(124, 7, 'Guma'),
(125, 7, 'Gwer East'),
(126, 7, 'Gwer West'),
(127, 7, 'Katsina-Ala'),
(128, 7, 'Konshisha'),
(129, 7, 'Kwande'),
(130, 7, 'Logo'),
(131, 7, 'Makurdi'),
(132, 7, 'Obi'),
(133, 7, 'Ogbadibo'),
(134, 7, 'Ohimini'),
(135, 7, 'Oju'),
(136, 7, 'Okpokwu'),
(137, 7, 'Oturkpo'),
(138, 7, 'Tarka'),
(139, 7, 'Ukum'),
(140, 7, 'Ushongo'),
(141, 7, 'Vandeikya'),
(142, 8, 'Abadam'),
(143, 8, 'Askira/Uba'),
(144, 8, 'Bama'),
(145, 8, 'Bayo'),
(146, 8, 'Biu'),
(147, 8, 'Chibok'),
(148, 8, 'Damboa'),
(149, 8, 'Dikwa'),
(150, 8, 'Gubio'),
(151, 8, 'Guzamala'),
(152, 8, 'Gwoza'),
(153, 8, 'Hawul'),
(154, 8, 'Jere'),
(155, 8, 'Kaga'),
(156, 8, 'Kala/Balge'),
(157, 8, 'Konduga'),
(158, 8, 'Kukawa'),
(159, 8, 'Kwaya Kusar'),
(160, 8, 'Mafa'),
(161, 8, 'Magumeri'),
(162, 8, 'Maiduguri'),
(163, 8, 'Marte'),
(164, 8, 'Mobbar'),
(165, 8, 'Monguno'),
(166, 8, 'Ngala'),
(167, 8, 'Nganzai'),
(168, 8, 'Shani'),
(169, 9, 'Abi'),
(170, 9, 'Akamkpa'),
(171, 9, 'Akpabuyo'),
(172, 9, 'Bakassi'),
(173, 9, 'Bekwarra'),
(174, 9, 'Biase'),
(175, 9, 'Boki'),
(176, 9, 'Calabar Municipal'),
(177, 9, 'Calabar South'),
(178, 9, 'Etung'),
(179, 9, 'Ikom'),
(180, 9, 'Obanliku'),
(181, 9, 'Obubra'),
(182, 9, 'Obudu'),
(183, 9, 'Odukpani'),
(184, 9, 'Ogoja'),
(185, 9, 'Yakuur'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele'),
(204, 10, 'Udu'),
(205, 10, 'Ughelli North'),
(206, 10, 'Ughelli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri North'),
(210, 10, 'Warri South'),
(211, 10, 'Warri South West'),
(212, 11, 'Abakaliki'),
(213, 11, 'Afikpo North'),
(214, 11, 'Afikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'Ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaozara'),
(223, 11, 'Ohaukwu'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko-Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North-East'),
(229, 12, 'Esan South-East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako Central'),
(232, 12, 'Etsako East'),
(233, 12, 'Etsako West'),
(234, 12, 'Igueben'),
(235, 12, 'Ikpoba Okha'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Oredo'),
(238, 12, 'Ovia North-East'),
(239, 12, 'Ovia South-West'),
(240, 12, 'Owan East'),
(241, 12, 'Owan West'),
(242, 12, 'Uhunmwonde'),
(243, 13, 'Ado Ekiti'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti East'),
(246, 13, 'Ekiti South-West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Gbonyin'),
(250, 13, 'Ido Osi'),
(251, 13, 'Ijero'),
(252, 13, 'Ikere'),
(253, 13, 'Ikole'),
(254, 13, 'Ilejemeje'),
(255, 13, 'Irepodun/Ifelodun'),
(256, 13, 'Ise/Orun'),
(257, 13, 'Moba'),
(258, 13, 'Oye'),
(259, 14, 'Aninri'),
(260, 14, 'Awgu'),
(261, 14, 'Enugu East'),
(262, 14, 'Enugu North'),
(263, 14, 'Enugu South'),
(264, 14, 'Ezeagu'),
(265, 14, 'Igbo Etiti'),
(266, 14, 'Igbo Eze North'),
(267, 14, 'Igbo Eze South'),
(268, 14, 'Isi Uzo'),
(269, 14, 'Nkanu East'),
(270, 14, 'Nkanu West'),
(271, 14, 'Nsukka'),
(272, 14, 'Oji River'),
(273, 14, 'Udenu'),
(274, 14, 'Udi'),
(275, 14, 'Uzo Uwani'),
(276, 15, 'Abaji'),
(277, 15, 'Bwari'),
(278, 15, 'Gwagwalada'),
(279, 15, 'Kuje'),
(280, 15, 'Kwali'),
(281, 15, 'Municipal Area Council'),
(282, 16, 'Akko'),
(283, 16, 'Balanga'),
(284, 16, 'Billiri'),
(285, 16, 'Dukku'),
(286, 16, 'Funakaye'),
(287, 16, 'Gombe'),
(288, 16, 'Kaltungo'),
(289, 16, 'Kwami'),
(290, 16, 'Nafada'),
(291, 16, 'Shongom'),
(292, 16, 'Yamaltu/Deba'),
(293, 17, 'Aboh Mbaise'),
(294, 17, 'Ahiazu Mbaise'),
(295, 17, 'Ehime Mbano'),
(296, 17, 'Ezinihitte'),
(297, 17, 'Ideato North'),
(298, 17, 'Ideato South'),
(299, 17, 'Ihitte/Uboma'),
(300, 17, 'Ikeduru'),
(301, 17, 'Isiala Mbano'),
(302, 17, 'Isu'),
(303, 17, 'Mbaitoli'),
(304, 17, 'Ngor Okpala'),
(305, 17, 'Njaba'),
(306, 17, 'Nkwerre'),
(307, 17, 'Nwangele'),
(308, 17, 'Obowo'),
(309, 17, 'Oguta'),
(310, 17, 'Ohaji/Egbema'),
(311, 17, 'Okigwe'),
(312, 17, 'Orlu'),
(313, 17, 'Orsu'),
(314, 17, 'Oru East'),
(315, 17, 'Oru West'),
(316, 17, 'Owerri Municipal'),
(317, 17, 'Owerri North'),
(318, 17, 'Owerri West'),
(319, 17, 'Unuimo'),
(320, 18, 'Auyo'),
(321, 18, 'Babura'),
(322, 18, 'Biriniwa'),
(323, 18, 'Birnin Kudu'),
(324, 18, 'Buji'),
(325, 18, 'Dutse'),
(326, 18, 'Gagarawa'),
(327, 18, 'Garki'),
(328, 18, 'Gumel'),
(329, 18, 'Guri'),
(330, 18, 'Gwaram'),
(331, 18, 'Gwiwa'),
(332, 18, 'Hadejia'),
(333, 18, 'Jahun'),
(334, 18, 'Kafin Hausa'),
(335, 18, 'Kazaure'),
(336, 18, 'Kiri Kasama'),
(337, 18, 'Kiyawa'),
(338, 18, 'Kaugama'),
(339, 18, 'Maigatari'),
(340, 18, 'Malam Madori'),
(341, 18, 'Miga'),
(342, 18, 'Ringim'),
(343, 18, 'Roni'),
(344, 18, 'Sule Tankarkar'),
(345, 18, 'Taura'),
(346, 18, 'Yankwashi'),
(347, 19, 'Birnin Gwari'),
(348, 19, 'Chikun'),
(349, 19, 'Giwa'),
(350, 19, 'Igabi'),
(351, 19, 'Ikara'),
(352, 19, 'Jaba'),
(353, 19, 'Jema\'a'),
(354, 19, 'Kachia'),
(355, 19, 'Kaduna North'),
(356, 19, 'Kaduna South'),
(357, 19, 'Kagarko'),
(358, 19, 'Kajuru'),
(359, 19, 'Kaura'),
(360, 19, 'Kauru'),
(361, 19, 'Kubau'),
(362, 19, 'Kudan'),
(363, 19, 'Lere'),
(364, 19, 'Makarfi'),
(365, 19, 'Sabon Gari'),
(366, 19, 'Sanga'),
(367, 19, 'Soba'),
(368, 19, 'Zangon Kataf'),
(369, 19, 'Zaria'),
(370, 20, 'Ajingi'),
(371, 20, 'Albasu'),
(372, 20, 'Bagwai'),
(373, 20, 'Bebeji'),
(374, 20, 'Bichi'),
(375, 20, 'Bunkure'),
(376, 20, 'Dala'),
(377, 20, 'Dambatta'),
(378, 20, 'Dawakin Kudu'),
(379, 20, 'Dawakin Tofa'),
(380, 20, 'Doguwa'),
(381, 20, 'Fagge'),
(382, 20, 'Gabasawa'),
(383, 20, 'Garko'),
(384, 20, 'Garun Mallam'),
(385, 20, 'Gaya'),
(386, 20, 'Gezawa'),
(387, 20, 'Gwale'),
(388, 20, 'Gwarzo'),
(389, 20, 'Kabo'),
(390, 20, 'Kano Municipal'),
(391, 20, 'Karaye'),
(392, 20, 'Kibiya'),
(393, 20, 'Kiru'),
(394, 20, 'Kumbotso'),
(395, 20, 'Kunchi'),
(396, 20, 'Kura'),
(397, 20, 'Madobi'),
(398, 20, 'Makoda'),
(399, 20, 'Minjibir'),
(400, 20, 'Nasarawa'),
(401, 20, 'Rano'),
(402, 20, 'Rimin Gado'),
(403, 20, 'Rogo'),
(404, 20, 'Shanono'),
(405, 20, 'Sumaila'),
(406, 20, 'Takai'),
(407, 20, 'Tarauni'),
(408, 20, 'Tofa'),
(409, 20, 'Tsanyawa'),
(410, 20, 'Tudun Wada'),
(411, 20, 'Ungogo'),
(412, 20, 'Warawa'),
(413, 20, 'Wudil'),
(414, 21, 'Bakori'),
(415, 21, 'Batagarawa'),
(416, 21, 'Batsari'),
(417, 21, 'Baure'),
(418, 21, 'Bindawa'),
(419, 21, 'Charanchi'),
(420, 21, 'Dandume'),
(421, 21, 'Danja'),
(422, 21, 'Dan Musa'),
(423, 21, 'Daura'),
(424, 21, 'Dutsi'),
(425, 21, 'Dutsin Ma'),
(426, 21, 'Faskari'),
(427, 21, 'Funtua'),
(428, 21, 'Ingawa'),
(429, 21, 'Jibia'),
(430, 21, 'Kafur'),
(431, 21, 'Kaita'),
(432, 21, 'Kankara'),
(433, 21, 'Kankia'),
(434, 21, 'Katsina'),
(435, 21, 'Kurfi'),
(436, 21, 'Kusada'),
(437, 21, 'Mai\'Adua'),
(438, 21, 'Malumfashi'),
(439, 21, 'Mani'),
(440, 21, 'Mashi'),
(441, 21, 'Matazu'),
(442, 21, 'Musawa'),
(443, 21, 'Rimi'),
(444, 21, 'Sabuwa'),
(445, 21, 'Safana'),
(446, 21, 'Sandamu'),
(447, 21, 'Zango'),
(448, 22, 'Aleiro'),
(449, 22, 'Arewa Dandi'),
(450, 22, 'Argungu'),
(451, 22, 'Augie'),
(452, 22, 'Bagudo'),
(453, 22, 'Birnin Kebbi'),
(454, 22, 'Bunza'),
(455, 22, 'Dandi'),
(456, 22, 'Fakai'),
(457, 22, 'Gwandu'),
(458, 22, 'Jega'),
(459, 22, 'Kalgo'),
(460, 22, 'Koko/Besse'),
(461, 22, 'Maiyama'),
(462, 22, 'Ngaski'),
(463, 22, 'Sakaba'),
(464, 22, 'Shanga'),
(465, 22, 'Suru'),
(466, 22, 'Wasagu/Danko'),
(467, 22, 'Yauri'),
(468, 22, 'Zuru'),
(469, 23, 'Adavi'),
(470, 23, 'Ajaokuta'),
(471, 23, 'Ankpa'),
(472, 23, 'Bassa'),
(473, 23, 'Dekina'),
(474, 23, 'Ibaji'),
(475, 23, 'Idah'),
(476, 23, 'Igalamela Odolu'),
(477, 23, 'Ijumu'),
(478, 23, 'Kabba/Bunu'),
(479, 23, 'Kogi'),
(480, 23, 'Lokoja'),
(481, 23, 'Mopa Muro'),
(482, 23, 'Ofu'),
(483, 23, 'Ogori/Magongo'),
(484, 23, 'Okehi'),
(485, 23, 'Okene'),
(486, 23, 'Olamaboro'),
(487, 23, 'Omala'),
(488, 23, 'Yagba East'),
(489, 23, 'Yagba West'),
(490, 24, 'Asa'),
(491, 24, 'Baruten'),
(492, 24, 'Edu'),
(493, 24, 'Ekiti'),
(494, 24, 'Ifelodun'),
(495, 24, 'Ilorin East'),
(496, 24, 'Ilorin South'),
(497, 24, 'Ilorin West'),
(498, 24, 'Irepodun'),
(499, 24, 'Isin'),
(500, 24, 'Kaiama'),
(501, 24, 'Moro'),
(502, 24, 'Offa'),
(503, 24, 'Oke Ero'),
(504, 24, 'Oyun'),
(505, 24, 'Pategi'),
(506, 25, 'Agege'),
(507, 25, 'Ajeromi-Ifelodun'),
(508, 25, 'Alimosho'),
(509, 25, 'Amuwo-Odofin'),
(510, 25, 'Apapa'),
(511, 25, 'Badagry'),
(512, 25, 'Epe'),
(513, 25, 'Eti Osa'),
(514, 25, 'Ibeju-Lekki'),
(515, 25, 'Ifako-Ijaiye'),
(516, 25, 'Ikeja'),
(517, 25, 'Ikorodu'),
(518, 25, 'Kosofe'),
(519, 25, 'Lagos Island'),
(520, 25, 'Lagos Mainland'),
(521, 25, 'Mushin'),
(522, 25, 'Ojo'),
(523, 25, 'Oshodi-Isolo'),
(524, 25, 'Shomolu'),
(525, 25, 'Surulere'),
(526, 26, 'Akwanga'),
(527, 26, 'Awe'),
(528, 26, 'Doma'),
(529, 26, 'Karu'),
(530, 26, 'Keana'),
(531, 26, 'Keffi'),
(532, 26, 'Kokona'),
(533, 26, 'Lafia'),
(534, 26, 'Nasarawa'),
(535, 26, 'Nasarawa Egon'),
(536, 26, 'Obi'),
(537, 26, 'Toto'),
(538, 26, 'Wamba'),
(539, 27, 'Agaie'),
(540, 27, 'Agwara'),
(541, 27, 'Bida'),
(542, 27, 'Borgu'),
(543, 27, 'Bosso'),
(544, 27, 'Chanchaga'),
(545, 27, 'Edati'),
(546, 27, 'Gbako'),
(547, 27, 'Gurara'),
(548, 27, 'Katcha'),
(549, 27, 'Kontagora'),
(550, 27, 'Lapai'),
(551, 27, 'Lavun'),
(552, 27, 'Magama'),
(553, 27, 'Mariga'),
(554, 27, 'Mashegu'),
(555, 27, 'Mokwa'),
(556, 27, 'Moya'),
(557, 27, 'Paikoro'),
(558, 27, 'Rafi'),
(559, 27, 'Rijau'),
(560, 27, 'Shiroro'),
(561, 27, 'Suleja'),
(562, 27, 'Tafa'),
(563, 27, 'Wushishi'),
(564, 28, 'Abeokuta North'),
(565, 28, 'Abeokuta South'),
(566, 28, 'Ado-Odo/Ota'),
(567, 28, 'Egbado North'),
(568, 28, 'Egbado South'),
(569, 28, 'Ewekoro'),
(570, 28, 'Ifo'),
(571, 28, 'Ijebu East'),
(572, 28, 'Ijebu North'),
(573, 28, 'Ijebu North East'),
(574, 28, 'Ijebu Ode'),
(575, 28, 'Ikenne'),
(576, 28, 'Imeko Afon'),
(577, 28, 'Ipokia'),
(578, 28, 'Obafemi Owode'),
(579, 28, 'Odeda'),
(580, 28, 'Odogbolu'),
(581, 28, 'Ogun Waterside'),
(582, 28, 'Remo North'),
(583, 28, 'Shagamu'),
(584, 29, 'Akoko North-East'),
(585, 29, 'Akoko North-West'),
(586, 29, 'Akoko South-West'),
(587, 29, 'Akoko South-East'),
(588, 29, 'Akure North'),
(589, 29, 'Akure South'),
(590, 29, 'Ese Odo'),
(591, 29, 'Idanre'),
(592, 29, 'Ifedore'),
(593, 29, 'Ilaje'),
(594, 29, 'Ile Oluji/Okeigbo'),
(595, 29, 'Irele'),
(596, 29, 'Odigbo'),
(597, 29, 'Okitipupa'),
(598, 29, 'Ondo East'),
(599, 29, 'Ondo West'),
(600, 29, 'Ose'),
(601, 29, 'Owo'),
(602, 30, 'Atakunmosa East'),
(603, 30, 'Atakunmosa West'),
(604, 30, 'Aiyedaade'),
(605, 30, 'Aiyedire'),
(606, 30, 'Boluwaduro'),
(607, 30, 'Boripe'),
(608, 30, 'Ede North'),
(609, 30, 'Ede South'),
(610, 30, 'Ife Central'),
(611, 30, 'Ife East'),
(612, 30, 'Ife North'),
(613, 30, 'Ife South'),
(614, 30, 'Egbedore'),
(615, 30, 'Ejigbo'),
(616, 30, 'Ifedayo'),
(617, 30, 'Ifelodun'),
(618, 30, 'Ila'),
(619, 30, 'Ilesa East'),
(620, 30, 'Ilesa West'),
(621, 30, 'Irepodun'),
(622, 30, 'Irewole'),
(623, 30, 'Isokan'),
(624, 30, 'Iwo'),
(625, 30, 'Obokun'),
(626, 30, 'Odo Otin'),
(627, 30, 'Ola Oluwa'),
(628, 30, 'Olorunda'),
(629, 30, 'Oriade'),
(630, 30, 'Orolu'),
(631, 30, 'Osogbo'),
(632, 31, 'Afijio'),
(633, 31, 'Akinyele'),
(634, 31, 'Atiba'),
(635, 31, 'Atisbo'),
(636, 31, 'Egbeda'),
(637, 31, 'Ibadan North'),
(638, 31, 'Ibadan North-East'),
(639, 31, 'Ibadan North-West'),
(640, 31, 'Ibadan South-East'),
(641, 31, 'Ibadan South-West'),
(642, 31, 'Ibarapa Central'),
(643, 31, 'Ibarapa East'),
(644, 31, 'Ibarapa North'),
(645, 31, 'Ido'),
(646, 31, 'Irepo'),
(647, 31, 'Iseyin'),
(648, 31, 'Itesiwaju'),
(649, 31, 'Iwajowa'),
(650, 31, 'Kajola'),
(651, 31, 'Lagelu'),
(652, 31, 'Ogbomosho North'),
(653, 31, 'Ogbomosho South'),
(654, 31, 'Ogo Oluwa'),
(655, 31, 'Olorunsogo'),
(656, 31, 'Oluyole'),
(657, 31, 'Ona Ara'),
(658, 31, 'Orelope'),
(659, 31, 'Ori Ire'),
(660, 31, 'Oyo'),
(661, 31, 'Oyo East'),
(662, 31, 'Saki East'),
(663, 31, 'Saki West'),
(664, 31, 'Surulere'),
(665, 32, 'Bokkos'),
(666, 32, 'Barkin Ladi'),
(667, 32, 'Bassa'),
(668, 32, 'Jos East'),
(669, 32, 'Jos North'),
(670, 32, 'Jos South'),
(671, 32, 'Kanam'),
(672, 32, 'Kanke'),
(673, 32, 'Langtang South'),
(674, 32, 'Langtang North'),
(675, 32, 'Mangu'),
(676, 32, 'Mikang'),
(677, 32, 'Pankshin'),
(678, 32, 'Qua\'an Pan'),
(679, 32, 'Riyom'),
(680, 32, 'Shendam'),
(681, 32, 'Wase'),
(682, 33, 'Abua/Odual'),
(683, 33, 'Ahoada East'),
(684, 33, 'Ahoada West'),
(685, 33, 'Akuku-Toru'),
(686, 33, 'Andoni'),
(687, 33, 'Asari-Toru'),
(688, 33, 'Bonny'),
(689, 33, 'Degema'),
(690, 33, 'Eleme'),
(691, 33, 'Emuoha'),
(692, 33, 'Etche'),
(693, 33, 'Gokana'),
(694, 33, 'Ikwerre'),
(695, 33, 'Khana'),
(696, 33, 'Obio/Akpor'),
(697, 33, 'Ogba/Egbema/Ndoni'),
(698, 33, 'Ogu/Bolo'),
(699, 33, 'Okrika'),
(700, 33, 'Omuma'),
(701, 33, 'Opobo/Nkoro'),
(702, 33, 'Oyigbo'),
(703, 33, 'Port Harcourt'),
(704, 33, 'Tai'),
(705, 34, 'Binji'),
(706, 34, 'Bodinga'),
(707, 34, 'Dange Shuni'),
(708, 34, 'Gada'),
(709, 34, 'Goronyo'),
(710, 34, 'Gudu'),
(711, 34, 'Gwadabawa'),
(712, 34, 'Illela'),
(713, 34, 'Isa'),
(714, 34, 'Kebbe'),
(715, 34, 'Kware'),
(716, 34, 'Rabah'),
(717, 34, 'Sabon Birni'),
(718, 34, 'Shagari'),
(719, 34, 'Silame'),
(720, 34, 'Sokoto North'),
(721, 34, 'Sokoto South'),
(722, 34, 'Tambuwal'),
(723, 34, 'Tangaza'),
(724, 34, 'Tureta'),
(725, 34, 'Wamako'),
(726, 34, 'Wurno'),
(727, 34, 'Yabo'),
(728, 35, 'Ardo Kola'),
(729, 35, 'Bali'),
(730, 35, 'Donga'),
(731, 35, 'Gashaka'),
(732, 35, 'Gassol'),
(733, 35, 'Ibi'),
(734, 35, 'Jalingo'),
(735, 35, 'Karim Lamido'),
(736, 35, 'Kumi'),
(737, 35, 'Lau'),
(738, 35, 'Sardauna'),
(739, 35, 'Takum'),
(740, 35, 'Ussa'),
(741, 35, 'Wukari'),
(742, 35, 'Yorro'),
(743, 35, 'Zing'),
(744, 36, 'Bade'),
(745, 36, 'Bursari'),
(746, 36, 'Damaturu'),
(747, 36, 'Fika'),
(748, 36, 'Fune'),
(749, 36, 'Geidam'),
(750, 36, 'Gujba'),
(751, 36, 'Gulani'),
(752, 36, 'Jakusko'),
(753, 36, 'Karasuwa'),
(754, 36, 'Machina'),
(755, 36, 'Nangere'),
(756, 36, 'Nguru'),
(757, 36, 'Potiskum'),
(758, 36, 'Tarmuwa'),
(759, 36, 'Yunusari'),
(760, 36, 'Yusufari'),
(761, 37, 'Anka'),
(762, 37, 'Bakura'),
(763, 37, 'Birnin Magaji/Kiyaw'),
(764, 37, 'Bukkuyum'),
(765, 37, 'Bungudu'),
(766, 37, 'Gummi'),
(767, 37, 'Gusau'),
(768, 37, 'Kaura Namoda'),
(769, 37, 'Maradun'),
(770, 37, 'Maru'),
(771, 37, 'Shinkafi'),
(772, 37, 'Talata Mafara'),
(773, 37, 'Chafe'),
(774, 37, 'Zurmi');

-- --------------------------------------------------------

--
-- Table structure for table `register_exam_subject_tbl`
--

CREATE TABLE IF NOT EXISTS `register_exam_subject_tbl` (
  `subId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `std_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stdRegNo` varchar(50) DEFAULT NULL,
  `stdGrade` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `schl_Sess` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`subId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg_pin_history_tbl`
--

CREATE TABLE IF NOT EXISTS `reg_pin_history_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `used_by` varchar(50) DEFAULT NULL,
  `pin_code` varchar(50) DEFAULT NULL,
  `pin_serial` varchar(50) DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `timed` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE IF NOT EXISTS `school_classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_desc` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `capacity` int(5) DEFAULT NULL,
  `class_code` varchar(20) DEFAULT NULL,
  `class_teacher` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_oauth_code_tbl`
--

CREATE TABLE IF NOT EXISTS `school_oauth_code_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `active_ses` varchar(50) DEFAULT NULL,
  `oauth_code` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_offices`
--

CREATE TABLE IF NOT EXISTS `school_offices` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `office_desc` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_offices`
--

INSERT INTO `school_offices` (`id`, `office_desc`, `status`, `created_on`) VALUES
(1, 'Principal', 'Active', '2022-05-15'),
(2, 'Vice Principal', 'Active', '2022-05-15'),
(3, 'Class Teacher', 'Active', '2022-05-15'),
(4, 'Bursar', 'Active', '2022-05-17'),
(5, 'Teacher', 'Active', '2022-05-17'),
(6, 'Receptionist', 'Active', '2022-05-17'),
(7, 'Security', 'Active', '2022-05-17'),
(8, 'Registrar', 'Active', '2022-05-17'),
(9, 'Messenger', 'Inactive', '2022-07-02'),
(10, 'H.M', 'Active', '2022-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE IF NOT EXISTS `school_subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_desc` varchar(225) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `subject_teacher` varchar(225) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `subject_code` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`subject_id`, `subject_desc`, `level`, `subject_teacher`, `status`, `subject_code`, `created_at`) VALUES
(1, 'Mathematics', NULL, '', 'active', 'MTH 201', '2022-06-14'),
(2, 'English Language', NULL, '', 'active', 'ENG20202', '2022-06-14'),
(3, 'Yoruba Language', NULL, '', 'active', 'YOR203', '2022-06-14'),
(4, 'History', NULL, '', 'active', 'HIS204', '2022-06-14'),
(5, 'French', NULL, '', 'active', 'FRE205', '2022-06-14'),
(6, 'Christian Religion Studies', NULL, '', 'active', 'CRS206', '2022-06-14'),
(7, 'PVS', NULL, '', 'active', 'PVS207', '2022-06-14'),
(8, 'National Values', NULL, '', 'active', 'NV208', '2022-06-14'),
(9, 'BST', NULL, '', 'active', 'BST209', '2022-06-14'),
(10, 'Literature-In-English', NULL, '', 'active', 'LIT210', '2022-06-14'),
(11, 'Business Studies', NULL, '', 'active', 'BSS 211', '2022-06-14'),
(12, 'CCA', NULL, '', 'active', 'CCA212', '2022-06-14'),
(13, 'Phonics', NULL, '', 'active', 'PHN213', '2022-06-14'),
(14, 'Music', NULL, '', 'active', 'MSC214', '2022-06-14'),
(15, 'Physics', NULL, '', 'active', 'PHY215', '2022-06-14'),
(16, 'Financial Accounting', NULL, '', 'active', 'FIN216', '2022-06-14'),
(17, 'Chemistry', NULL, '', 'active', 'CHM217', '2022-06-14'),
(18, 'Store Management', NULL, '', 'active', 'SMG218', '2022-06-14'),
(19, 'Office Practice', NULL, '', 'active', 'OFP219', '2022-06-14'),
(20, 'Insurance', NULL, '', 'active', 'INs220', '2022-06-14'),
(21, 'Government', NULL, '', 'active', 'GOV221', '2022-06-14'),
(22, 'Commerce', NULL, '', 'active', 'COM222', '2022-06-14'),
(23, 'Computer', NULL, '', 'active', 'COM223', '2022-06-14'),
(24, 'Economics', NULL, '', 'active', 'ECO224', '2022-06-14'),
(25, 'Biology', NULL, '', 'active', 'BIO225', '2022-06-14'),
(26, 'Agricultural Science', NULL, NULL, 'active', 'AGS226', '2022-06-14'),
(27, 'Further Mathematics', NULL, '', 'active', 'FMT227', '2022-06-14'),
(28, 'Number Work', NULL, '', 'active', 'Nw12', '2022-06-14'),
(29, 'Letter Work', NULL, '', 'active', 'LW13', '2022-06-14'),
(30, 'Basic Science', NULL, '', 'active', 'BS14', '2022-06-14'),
(31, 'Health Habit', NULL, '', 'active', 'HH14', '2022-06-14'),
(32, 'Social Norms', NULL, '', 'active', 'SON15', '2022-06-14'),
(33, 'Civic Education', NULL, NULL, 'active', 'CV16', '2022-06-14'),
(34, 'Poem Reading', NULL, '', 'active', 'POR17', '2022-06-14'),
(35, 'Verbal Aptitude', NULL, NULL, 'active', 'VAP18', '2022-06-14'),
(36, 'Quantitative Aptitude', NULL, '', 'active', 'QUA19', '2022-06-14'),
(37, 'Diction', NULL, '', 'active', 'DIC20', '2022-06-14'),
(38, 'Picture Reading', NULL, '', 'active', 'PICR21', '2022-06-14'),
(39, 'Handwriting', NULL, '', 'active', 'HDW22', '2022-06-14'),
(40, 'Current Affairs', NULL, '', 'active', 'CUA23', '2022-06-14'),
(41, 'Home Economics', NULL, '', 'active', 'HECON24', '2022-06-14'),
(42, 'Spoken English', NULL, '', 'active', 'SPENG25', '2022-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminType`, `adminEmail`, `adminUser`, `adminPass`, `status`, `fullname`, `login_time`, `logout_time`, `token`, `created_at`) VALUES
(1, 'Admin', 'admin@smatech.com', 'Smatech', '$2y$10$y.gA5dihV/vVsrjpH9JFY.FqLxf9n19eOumxg7KU7qblncFh9Kjdq', 0, 'Osotech Software', NULL, NULL, '23456vb8l0mpaxqwe234', '2022-01-26 08:34:42'),
(2, 'Director', 'user@smatech.com', 'Director', '$2y$10$/pdf.OVS0iS8ZYvgVI3Zj.fIZsOnjnxH58VXaqpo06KE8HwbWtIXe', 0, 'Smapp User', NULL, NULL, '3wsxvnmk0oo9673saq12', '2022-05-15 22:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ewallet_pins`
--

CREATE TABLE IF NOT EXISTS `tbl_ewallet_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_pins`
--

CREATE TABLE IF NOT EXISTS `tbl_exam_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg_pins`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `usedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_pins`
--

CREATE TABLE IF NOT EXISTS `tbl_result_pins` (
  `pin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`pin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_pins_history`
--

CREATE TABLE IF NOT EXISTS `tbl_result_pins_history` (
  `pinId` bigint(20) NOT NULL AUTO_INCREMENT,
  `studentRegNo` varchar(20) DEFAULT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `pin_code` varchar(20) DEFAULT NULL,
  `pin_serial` varchar(20) DEFAULT NULL,
  `pin_counter` int(1) NOT NULL DEFAULT 0,
  `used_term` varchar(20) DEFAULT NULL,
  `used_session` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pinId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serial`
--

CREATE TABLE IF NOT EXISTS `tbl_serial` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `serial_key` varchar(225) DEFAULT NULL,
  `activation_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_serial`
--

INSERT INTO `tbl_serial` (`id`, `serial_key`, `activation_date`, `expiry_date`, `user_name`, `user_ip`) VALUES
(1, 'XTAS-KM87-EWA6-09CQ-5J0V', '2022-08-01', '2023-07-01', 'Smatech', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`config_id`, `web_name`, `web_slogan`, `welcome_msg`, `office_email`, `office_address`, `customer_care`, `office_phone`, `day_from`, `day_to`, `time_from`, `time_to`, `web_logo`, `state`, `town`, `country`) VALUES
(1, 'Osotech School Portal', 'All about your Satisfaction', 'Welcome to Osotech School Portal  This is just a demo welcome message to all Users short', 'info@osotechsoftware.com.ng', 'Sango Ota Ogun state', '08000990090', '09098989878', 'Monday', 'Friday', '9:00 am', '5:00 pm', 'logo_16565933324144043.png', 'Ogun State', 'Sango Ota', 'Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `visap_1st_term_result_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_1st_term_result_tbl` (
  `reportId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_2nd_term_result_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_2nd_term_result_tbl` (
  `reportId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_admin_login_token`
--

CREATE TABLE IF NOT EXISTS `visap_admin_login_token` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Token` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_admin_login_token`
--

INSERT INTO `visap_admin_login_token` (`id`, `Name`, `Email`, `Token`) VALUES
(1, 'Smatech', 'admin@smatech.com', 'JBCnY4tTc5VtC96yYIsnVoONjjaDROoMagKJASPPhKUt08VzeJLD02azgxH9Y2ObAsky9LubSi4fcTuJEwYfA2wWwSPhPpgWsrD7b'),
(2, 'Director', 'user@smatech.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `visap_admission_open_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_admission_open_tbl` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_admission_open_tbl`
--

INSERT INTO `visap_admission_open_tbl` (`id`, `admission_desc`, `batch`, `adm_start`, `adm_end`, `interview_date`, `interview_time`, `schl_session`, `note`, `status`) VALUES
(3, 'September Admission', 'Batch A', '2022-08-08', '2022-08-25', '2022-08-29', '09:00:00', '2021/2022', 'A simple, good looking cookie alert for Bootstrap. No dependencies required. We recommend using Bootstrap 4, but Boostrap 3 should work fine as well.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visap_assignment_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_assignment_tbl` (
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
  PRIMARY KEY (`assId`),
  KEY `teacherId` (`teacherId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_bed_payment_history_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_bed_payment_history_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `payment_date` date DEFAULT NULL,
  `receiptNo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_bed_space_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_bed_space_tbl` (
  `bedId` bigint(20) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `bed_space` varchar(50) DEFAULT NULL,
  `is_available` int(1) NOT NULL DEFAULT 1 COMMENT '1= available, 2= is occupied',
  `occupant` bigint(20) DEFAULT NULL,
  `book_duration` varchar(100) DEFAULT NULL,
  `booked_today` date DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `amount_paid` int(11) DEFAULT NULL,
  `approve_booked` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not approved, 1=approved',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not paid, 1=part payment,2=full payment',
  `payment_date` date DEFAULT NULL,
  `school_session` varchar(50) DEFAULT NULL,
  `payment_expire` date DEFAULT NULL,
  PRIMARY KEY (`bedId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_behavioral_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_behavioral_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_blog_post_comments`
--

CREATE TABLE IF NOT EXISTS `visap_blog_post_comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `blogId` int(11) DEFAULT NULL,
  `guestName` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `comment_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_blog_post_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_blog_post_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_bus_expense_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_bus_expense_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverId` int(11) DEFAULT NULL,
  `busId` int(11) DEFAULT NULL,
  `cost_price` int(11) DEFAULT NULL,
  `repair_type` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_bus_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_bus_tbl` (
  `busId` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_desc` varchar(255) NOT NULL,
  `vehicle_plate_no` varchar(50) NOT NULL,
  `vehicle_capacity` int(3) NOT NULL,
  `vehicle_image` varchar(255) NOT NULL,
  `vehicle_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`busId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_career_portal_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_career_portal_tbl` (
  `job_portal_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_name` varchar(255) DEFAULT NULL,
  `applicant_email` varchar(168) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `jobType` varchar(100) DEFAULT NULL,
  `uploaded_cv` varchar(255) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `application_time` time DEFAULT NULL,
  PRIMARY KEY (`job_portal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_classnote_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_classnote_tbl` (
  `noteId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `std_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  PRIMARY KEY (`noteId`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_class_attendance_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_class_attendance_tbl` (
  `attend_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stdReg` varchar(20) DEFAULT NULL,
  `studentGrade` varchar(20) DEFAULT NULL,
  `roll_call` varchar(20) DEFAULT NULL,
  `attendant_date` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_session` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`attend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_class_grade_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_class_grade_tbl` (
  `gradeId` int(11) NOT NULL AUTO_INCREMENT,
  `gradeDesc` varchar(50) DEFAULT NULL,
  `grade_teacher` int(11) DEFAULT NULL,
  `grade_status` enum('pending','active','closed') NOT NULL DEFAULT 'active',
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`gradeId`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_class_grade_tbl`
--

INSERT INTO `visap_class_grade_tbl` (`gradeId`, `gradeDesc`, `grade_teacher`, `grade_status`, `created_at`) VALUES
(1, 'Creche', NULL, 'active', '2022-06-14'),
(2, 'KG 1', NULL, 'active', '2022-06-14'),
(3, 'KG 2', NULL, 'active', '2022-06-14'),
(4, 'Nursery 1', NULL, 'active', '2022-06-14'),
(5, 'Nursery 2', NULL, 'active', '2022-06-14'),
(6, 'Basic 1', NULL, 'active', '2022-06-14'),
(7, 'Basic 2', NULL, 'active', '2022-06-14'),
(8, 'Basic 3', NULL, 'active', '2022-06-14'),
(9, 'Basic 4', NULL, 'active', '2022-06-14'),
(10, 'Basic 5', NULL, 'active', '2022-06-14'),
(11, 'JSS 1A', NULL, 'active', '2022-06-14'),
(12, 'JSS 1B', NULL, 'active', '2022-06-14'),
(13, 'JSS 1C', NULL, 'active', '2022-06-14'),
(14, 'JSS 2A', NULL, 'active', '2022-06-14'),
(15, 'JSS 2B', NULL, 'active', '2022-06-14'),
(16, 'JSS 2C', NULL, 'active', '2022-06-14'),
(24, 'JSS 3A', NULL, 'active', '2023-01-27'),
(25, 'JSS 3B', NULL, 'active', '2023-01-27'),
(26, 'JSS 3C', NULL, 'active', '2023-01-27'),
(27, 'SSS 1A', NULL, 'active', '2023-01-27'),
(28, 'SSS 1B', NULL, 'active', '2023-01-27'),
(29, 'SSS 1C', NULL, 'active', '2023-01-27'),
(30, 'SSS 2A', NULL, 'active', '2023-01-29'),
(31, 'SSS 2B', NULL, 'active', '2023-01-29'),
(32, 'SSS 2C', NULL, 'active', '2023-01-29'),
(33, 'SSS 3A', NULL, 'active', '2023-01-29'),
(34, 'SSS 3B', NULL, 'active', '2023-01-29'),
(35, 'SSS 3C', NULL, 'active', '2023-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `visap_driver_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_driver_tbl` (
  `dId` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(255) DEFAULT NULL,
  `driver_phone` varchar(50) DEFAULT NULL,
  `driver_email` varchar(255) DEFAULT NULL,
  `driver_address` text DEFAULT NULL,
  `driver_license_no` varchar(100) DEFAULT NULL,
  `driver_image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`dId`),
  UNIQUE KEY `driver_email` (`driver_email`),
  KEY `driver_name` (`driver_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_exam_subject_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_exam_subject_tbl` (
  `examId` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(11) DEFAULT NULL,
  `exam_class` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `exam_file` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_session` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`examId`),
  KEY `teacherId` (`teacherId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_feedback_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_feedback_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_phone` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `client_ip_address` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_fee_component_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_fee_component_tbl` (
  `compId` int(11) NOT NULL AUTO_INCREMENT,
  `feeType` varchar(100) DEFAULT NULL,
  `fee_status` enum('Pending','Active') DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`compId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_fee_component_tbl`
--

INSERT INTO `visap_fee_component_tbl` (`compId`, `feeType`, `fee_status`, `date`) VALUES
(1, 'SCHOOL FEE', 'Active', '2023-02-01'),
(2, 'SCHOOL UNIFORM', 'Active', '2023-02-01'),
(3, 'SPORT WEAR', 'Active', '2023-02-01'),
(4, 'CARDIGAN', 'Active', '2023-02-01'),
(5, 'REPORT CARD', 'Active', '2023-02-01'),
(6, 'PTA', 'Active', '2023-02-01'),
(7, 'ADMISSION FORM', 'Active', '2023-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `visap_gallery_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_gallery_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_holiday_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_holiday_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_desc` varchar(255) DEFAULT NULL,
  `declared_by` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `note_msg` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_hostel_rooms_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_hostel_rooms_tbl` (
  `roomId` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) DEFAULT NULL,
  `room_desc` varchar(100) DEFAULT NULL,
  `beds` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`roomId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_hostel_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_hostel_tbl` (
  `hostel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_desc` varchar(255) DEFAULT NULL,
  `hostel_type` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `hostel_master` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`hostel_id`),
  UNIQUE KEY `hostel_desc` (`hostel_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_loan_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_loan_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_messages_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_messages_tbl` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `sender_email` varchar(255) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `cc_email` varchar(255) DEFAULT NULL,
  `bcc_email` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `file_size` varchar(50) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= unread, 1=read',
  `userType` varchar(50) NOT NULL DEFAULT 'admin',
  `msg_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_email`),
  KEY `recipient_id` (`recipient_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_messages_user_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_messages_user_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'admin',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= suspend, 1=active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_notice_board_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_notice_board_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `event_content` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `posted_by` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_offered_subject_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_offered_subject_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_class` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `aca_session` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_parents_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_parents_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `pta_post` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_people_say_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_people_say_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_prefect_title_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_prefect_title_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_psycho_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_psycho_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_registered_subject_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_registered_subject_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_class` varchar(50) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `createdBy` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_result_comment_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_result_comment_tbl` (
  `commentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stdRegNo` varchar(20) DEFAULT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `teacher_comment` text DEFAULT NULL,
  `principal_coment` text DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_Sess` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_result_grading_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_result_grading_tbl` (
  `grading_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_class` varchar(20) NOT NULL,
  `mark_grade` varchar(3) DEFAULT NULL,
  `score_from` int(4) DEFAULT 0,
  `score_to` int(4) DEFAULT NULL,
  `score_remark` varchar(50) DEFAULT NULL,
  `school_ses` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`grading_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_result_grading_tbl`
--

INSERT INTO `visap_result_grading_tbl` (`grading_id`, `grade_class`, `mark_grade`, `score_from`, `score_to`, `score_remark`, `school_ses`) VALUES
(1, 'Pry', 'A', 80, 100, 'Excellence', '2021/2022'),
(2, 'Pry', 'B', 70, 79, 'V.Good', '2021/2022'),
(3, 'Pry', 'C', 60, 69, 'Good', '2021/2022'),
(4, 'Pry', 'D', 50, 59, 'Poor', '2021/2022'),
(5, 'Pry', 'E', 40, 49, 'Fair', '2021/2022'),
(6, 'Pry', 'F', 0, 39, 'Failed', '2021/2022'),
(7, 'Junior', 'A', 80, 100, 'Excellence', '2021/2022'),
(8, 'Junior', 'B', 70, 79, 'V.Good', '2021/2022'),
(9, 'Junior', 'C', 60, 69, 'Good', '2021/2022'),
(10, 'Junior', 'D', 50, 59, 'Poor', '2021/2022'),
(11, 'Junior', 'E', 40, 49, 'Fair', '2021/2022'),
(12, 'Junior', 'F', 1, 39, 'Fail', '2021/2022'),
(13, 'Senior', 'A1', 80, 100, 'Distinctions', '2021/2022'),
(14, 'Senior', 'B2', 75, 79, 'Excellence', '2021/2022'),
(15, 'Senior', 'B3', 70, 74, 'Good', '2021/2022'),
(16, 'Senior', 'C4', 65, 69, 'Credit', '2021/2022'),
(17, 'Senior', 'C5', 60, 64, 'Credit', '2021/2022'),
(18, 'Senior', 'C6', 50, 59, 'Credit', '2021/2022'),
(19, 'Senior', 'D7', 40, 49, 'Pass', '2021/2022'),
(20, 'Senior', 'E8', 30, 39, 'Poor', '2021/2022'),
(21, 'Senior', 'F9', 1, 29, 'Failed', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `visap_routes_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_routes_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_desc` varchar(255) DEFAULT NULL,
  `bus_stops` text DEFAULT NULL,
  `route_price` int(11) DEFAULT NULL,
  `driverId` int(11) DEFAULT NULL,
  `vehicleId` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `route_desc` (`route_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_expense_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_school_expense_tbl` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_desc` text DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `cterm` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_fee_allocation_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_school_fee_allocation_tbl` (
  `faId` int(11) NOT NULL AUTO_INCREMENT,
  `component_id` varchar(50) DEFAULT NULL,
  `gradeDesc` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`faId`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_school_fee_allocation_tbl`
--

INSERT INTO `visap_school_fee_allocation_tbl` (`faId`, `component_id`, `gradeDesc`, `amount`, `created_on`, `updated_at`) VALUES
(1, 'SCHOOL FEE', 'Creche', 16000, '2023-02-01', NULL),
(2, 'SCHOOL FEE', 'KG 1', 16000, '2023-02-01', NULL),
(3, 'SCHOOL FEE', 'KG 2', 16000, '2023-02-01', NULL),
(4, 'SCHOOL FEE', 'Nursery 1', 18000, '2023-02-01', NULL),
(5, 'SCHOOL FEE', 'Nursery 2', 18000, '2023-02-01', NULL),
(6, 'SCHOOL FEE', 'Basic 1', 22000, '2023-02-01', NULL),
(7, 'SCHOOL FEE', 'Basic 2', 22000, '2023-02-01', NULL),
(8, 'SCHOOL FEE', 'Basic 3', 22000, '2023-02-01', NULL),
(9, 'SCHOOL FEE', 'Basic 4', 24000, '2023-02-01', NULL),
(10, 'SCHOOL FEE', 'Basic 5', 24000, '2023-02-01', NULL),
(11, 'SCHOOL FEE', 'JSS 1A', 26000, '2023-02-01', NULL),
(12, 'SCHOOL FEE', 'JSS 2A', 26000, '2023-02-01', NULL),
(13, 'SCHOOL FEE', 'JSS 3A', 27000, '2023-02-01', NULL),
(14, 'SCHOOL FEE', 'SSS 1A', 31000, '2023-02-01', NULL),
(15, 'SCHOOL FEE', 'SSS 2A', 31000, '2023-02-01', NULL),
(16, 'SCHOOL FEE', 'SSS 3A', 33000, '2023-02-01', NULL),
(17, 'SCHOOL UNIFORM', 'Nursery 1', 3200, '2023-02-01', NULL),
(18, 'SCHOOL UNIFORM', 'Basic 1', 3700, '2023-02-01', NULL),
(19, 'SCHOOL UNIFORM', 'JSS 1A', 4500, '2023-02-01', NULL),
(20, 'SCHOOL UNIFORM', 'SSS 1A', 5000, '2023-02-01', NULL),
(21, 'SPORT WEAR', 'Nursery 1', 2500, '2023-02-01', NULL),
(22, 'SPORT WEAR', 'Basic 1', 2500, '2023-02-01', NULL),
(23, 'SPORT WEAR', 'JSS 1A', 3000, '2023-02-01', NULL),
(24, 'CARDIGAN', 'Nursery 1', 3200, '2023-02-01', NULL),
(25, 'CARDIGAN', 'JSS 1A', 3500, '2023-02-01', NULL),
(26, 'REPORT CARD', 'Nursery 1', 600, '2023-02-01', NULL),
(27, 'REPORT CARD', 'Basic 1', 700, '2023-02-01', NULL),
(28, 'PTA', 'Creche', 1000, '2023-02-01', NULL),
(29, 'ADMISSION FORM', 'Nursery 1', 1500, '2023-02-01', NULL),
(30, 'ADMISSION FORM', 'JSS 1A', 2000, '2023-02-01', NULL),
(31, 'ADMISSION FORM', 'JSS 1B', 2000, '2023-02-01', NULL),
(32, 'CARDIGAN', 'JSS 1B', 3500, '2023-02-01', NULL),
(33, 'SCHOOL FEE', 'JSS 1B', 26000, '2023-02-01', NULL),
(34, 'SCHOOL UNIFORM', 'JSS 1B', 4500, '2023-02-01', NULL),
(35, 'SPORT WEAR', 'JSS 1B', 3000, '2023-02-01', NULL),
(36, 'ADMISSION FORM', 'JSS 1C', 2000, '2023-02-01', NULL),
(37, 'CARDIGAN', 'JSS 1C', 3500, '2023-02-01', NULL),
(38, 'SCHOOL FEE', 'JSS 1C', 26000, '2023-02-01', NULL),
(39, 'SCHOOL UNIFORM', 'JSS 1C', 4500, '2023-02-01', NULL),
(40, 'SPORT WEAR', 'JSS 1C', 3000, '2023-02-01', NULL),
(41, 'SCHOOL FEE', 'JSS 2B', 26000, '2023-02-01', NULL),
(42, 'SCHOOL FEE', 'JSS 2C', 26000, '2023-02-01', NULL),
(43, 'SCHOOL FEE', 'JSS 3B', 33000, '2023-02-01', NULL),
(44, 'SCHOOL FEE', 'JSS 3C', 33000, '2023-02-01', NULL),
(45, 'SCHOOL FEE', 'SSS 3B', 27000, '2023-02-02', NULL),
(46, 'SCHOOL FEE', 'SSS 3C', 27000, '2023-02-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_prefect_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_school_prefect_tbl` (
  `prefectId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) DEFAULT NULL,
  `studentGrade` varchar(20) DEFAULT NULL,
  `officeName` varchar(200) DEFAULT NULL,
  `school_session` varchar(50) DEFAULT NULL,
  `activeness` tinyint(1) NOT NULL DEFAULT 1,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`prefectId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_profile`
--

CREATE TABLE IF NOT EXISTS `visap_school_profile` (
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
  `stamp` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `school_barcode` varchar(255) DEFAULT NULL,
  `school_badge` varchar(255) DEFAULT NULL,
  `school_favicon` varchar(25) DEFAULT NULL,
  `default_language` varchar(100) DEFAULT NULL,
  `school_history` text DEFAULT NULL,
  `founded_year` varchar(20) DEFAULT NULL,
  `school_gmail` varchar(100) DEFAULT NULL,
  `school_short_name` varchar(50) DEFAULT NULL,
  `our_mission` text DEFAULT NULL,
  `our_vision` text DEFAULT NULL,
  `our_core_value` text DEFAULT NULL,
  `key_of_success` text DEFAULT NULL,
  `our_philosophy` text DEFAULT NULL,
  `our_principle` text DEFAULT NULL,
  `about_us` mediumtext DEFAULT NULL,
  `principal_welcome` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_school_profile`
--

INSERT INTO `visap_school_profile` (`id`, `school_name`, `govt_approve_number`, `school_address`, `school_slogan`, `school_director`, `director_mobile`, `registrar`, `registrar_mobile`, `principal`, `principal_mobile`, `school_state`, `school_city`, `country`, `postal_code`, `school_email`, `school_phone`, `school_fax`, `website_url`, `website_name`, `school_logo`, `stamp`, `signature`, `school_barcode`, `school_badge`, `school_favicon`, `default_language`, `school_history`, `founded_year`, `school_gmail`, `school_short_name`, `our_mission`, `our_vision`, `our_core_value`, `key_of_success`, `our_philosophy`, `our_principle`, `about_us`, `principal_welcome`) VALUES
(1, 'FLOURISH ACADEMY SANGO OTA', 'C26313', 'Plot 8, Block 5,  Flat ERP Estate', 'Ultimate Excellence', 'Engr Samson Agberayi', '+2348131374443', 'Miss Iremide Agberayi E', '+2348140122566', 'Mrs. Blessing Agberayi T (BSc)', '+2349036583063', 'Lagos State', 'Ikeja', 'Nigeria', 2345, 'info@smatechportal.com', '08131374443', '09036583063', 'www.smatechportal.com', 'www.smatechportal.com', 'logo_16751768556793517.png', NULL, NULL, NULL, NULL, NULL, 'English', 'As the name School management Application  implies, it is the foundation for training children for excellence in academics, spiritual development, growth and sound morals.\r\nWe praise the Lord Almighty for His manifold mercies upon us and for bringing into reality, the SMATECH Website. This webpage is designed to provide you with all available information related to SMATECH. We shall continue to update the information throughout the school year on what we do!\r\n\r\nWe are saddled with the task to provide a world-class Christian-based educational experience with international standards.\r\n\r\nOur culture in SMATECH as reflected in our vision and mission statement is to imbibe the Christian values in our pupils, such that they grow into adulthood in the fear of God and become responsible citizen in the society at large.\r\n\r\nThat is why we are imploring our parents to partner in Christ with us in their homes and be role models to these wonderful children God has given to us. They should help us to check on their children and ensure they are not lazy at completing their school homework/projects. They should instil time management skills in them and ensure they do the right thing at the right time.\r\n\r\nChildren should not always stay glued to the TV watching cartoons and Nollywood movies which are great distractions to their education and future career. Parents should in addition monitor what their children watch and make sure they are not watching pornographic films and cartoons with immoral themes.\r\n\r\nThe decadence in our society and the world at large should strengthen our determination for a lasting change for decency and a corrupt-free society. We must teach and counsel these children and nurture them in the fear of the Lord. So that when they grow old, they will not depart from it.\r\n\r\nWe have so much to do in order to bring into reality the vision for School Management Application. We are resolved by divine injunction to train up these awesome kids in the ways and fear of the Lord. May the Lord help our resolve. Amen!', '2nd May,1998', 'smatechportal@gmail.com', 'SMATECH', 'Our mission is to promote lifelong learning in an open and caring atmosphere that motivates students to be confident and responsible global citizens. As an organization, we will deliver on our promise to all our stakeholders.', 'To lead holistic, inclusive, innovative world class education in Africa.', 'Child Centredness,\r\nRespect,\r\nIntegrity,\r\nExcellence,\r\nEntrepreneurship, \r\nService, Sustainability', 'Our mission is to promote lifelong learning in an open and caring atmosphere that motivates students to be confident and responsible global citizens. As an organization, we will deliver on our promise to all our stakeholders', 'Our mission is to promote lifelong learning in an open and caring atmosphere that motivates students to be confident and responsible global citizens. As an organization, we will deliver on our promise to all our stakeholders', 'A specific Code of Conduct is issued to all Secondary School students and to students in Years 4 to 6 of the Elementary School. The Code of Conduct is an agreement between the student, the student’s family and the school, which must be signed and returned.\r\nIn general we expect our students to be responsible members of the community and ambassadors for Greensprings.\r\nStudents are expected to:\r\nWear the full uniform and to be smartly dressed at all times.', 'A specific Code of Conduct is issued to all Secondary School students and to students in Years 4 to 6 of the Elementary School. The Code of Conduct is an agreement between the student, the student’s family and the school, which must be signed and returned.\r\nIn general we expect our students to be responsible members of the community and ambassadors for \r\nStudents are expected to:\r\nWear the full uniform and to be smartly dressed at all times.', 'School Management Application designed to provide learning in conducive environment for the teaching of students under the direction of qualified teachers. In our school, students progress through a series of school activities.\r\n\r\nThe school was established in the year 2012 and has since increase in population as our aim is to provide competitive and quality education in a conducive environment with all learning aids.\r\n\r\nWe have highly qualified teachers taking all the various subjects from Basic level to secondary level. All subjects are covered and the curriculum of the school is based on the scheme of work from the ministry of education. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages');

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_session_history_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_school_session_history_tbl` (
  `sehisId` int(1) NOT NULL AUTO_INCREMENT,
  `active_session` varchar(50) NOT NULL,
  `active_term` varchar(20) NOT NULL,
  `Days_open` int(3) NOT NULL,
  `Weeks_open` int(3) NOT NULL,
  `term_ended` date NOT NULL,
  `new_term_begins` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`sehisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_session_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_school_session_tbl` (
  `seId` int(1) NOT NULL,
  `active_session` varchar(50) NOT NULL,
  `active_term` enum('1st Term','2nd Term','3rd Term') NOT NULL DEFAULT '1st Term',
  `Days_open` int(3) NOT NULL,
  `Weeks_open` int(3) NOT NULL,
  `term_ended` date NOT NULL,
  `new_term_begins` date NOT NULL,
  PRIMARY KEY (`seId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_school_session_tbl`
--

INSERT INTO `visap_school_session_tbl` (`seId`, `active_session`, `active_term`, `Days_open`, `Weeks_open`, `term_ended`, `new_term_begins`) VALUES
(1, '2022/2023', '2nd Term', 62, 15, '2023-03-24', '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `visap_session_list`
--

CREATE TABLE IF NOT EXISTS `visap_session_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_session_list`
--

INSERT INTO `visap_session_list` (`id`, `session_desc`) VALUES
(1, '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `visap_sliders_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_sliders_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slider_desc` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_sliders_tbl`
--

INSERT INTO `visap_sliders_tbl` (`id`, `title`, `slider_desc`, `image`, `status`, `created_at`) VALUES
(14, 'I am still learning', 'Tell me and I forget. Teach me and I remember. Involve me and I learn', 'SMAPP_63138ef78eca0_.jpg', 1, '2022-09-03'),
(16, 'A little learning is a dangerous thing', 'You don’t understand anything until you learn it more than one way.', 'SMAPP_63138f93d1b64_.jpg', 1, '2022-09-03'),
(22, 'An investment in knowledge pays the best interest', 'Education is the passport to the future, for tomorrow belongs to those who prepare for it today', 'SMAPP_63c1659eaac05_.jpg', 2, '2023-01-13'),
(24, '“Education is the vaccine of violence.”', '“The more that you read, the more things you will know, the more that you learn, the more places you’ll go.”', 'SMAPP_63c168c5a06f9_.jpg', 1, '2023-01-13'),
(25, 'Welcome to BAMIS School', 'Education is what remains after one has forgotten what one has learned in school.', 'smapp_63c558c6ac30c_.jpg', 1, '2023-01-16'),
(26, 'Be Curious, Not Judgmental.', 'Being ignorant is not so much a shame, as being unwilling to learn', 'smapp_63ceee0343a9d_.jpg', 2, '2023-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `visap_social_link_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_social_link_tbl` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `twitter` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `goggle` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `WhatsApp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_social_link_tbl`
--

INSERT INTO `visap_social_link_tbl` (`id`, `twitter`, `youtube`, `facebook`, `goggle`, `instagram`, `linkedin`, `WhatsApp`) VALUES
(1, 'https://www.twitter.com/smatechportal', 'https://youtube.com/smatechportal', 'https://facebook.com/smatechportal', 'https://googleplus.com/smatechportal', 'https://instagram.com/smatechportal', 'https://www.linkedin.com/smatechportal', 'https://wa.me/2348131374443');

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_bank_details_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_staff_bank_details_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_duty_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_staff_duty_tbl` (
  `duty_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) DEFAULT NULL,
  `duty` varchar(255) DEFAULT NULL,
  `duty_week` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`duty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_login_token`
--

CREATE TABLE IF NOT EXISTS `visap_staff_login_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_paid_salary_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_staff_paid_salary_tbl` (
  `salaryId` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `forMonth` varchar(50) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`salaryId`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_payroll_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_staff_payroll_tbl` (
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
  PRIMARY KEY (`payrollId`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_post_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_staff_post_tbl` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `duty` varchar(20) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schlSes` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_staff_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_state_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_state_tbl` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visap_state_tbl`
--

INSERT INTO `visap_state_tbl` (`state_id`, `name`) VALUES
(1, 'Abia State'),
(2, 'Adamawa State'),
(3, 'Akwa Ibom State'),
(4, 'Anambra State'),
(5, 'Bauchi State'),
(6, 'Bayelsa State'),
(7, 'Benue State'),
(8, 'Borno State'),
(9, 'Cross River State'),
(10, 'Delta State'),
(11, 'Ebonyi State'),
(12, 'Edo State'),
(13, 'Ekiti State'),
(14, 'Enugu State'),
(15, 'FCT'),
(16, 'Gombe State'),
(17, 'Imo State'),
(18, 'Jigawa State'),
(19, 'Kaduna State'),
(20, 'Kano State'),
(21, 'Katsina State'),
(22, 'Kebbi State'),
(23, 'Kogi State'),
(24, 'Kwara State'),
(25, 'Lagos State'),
(26, 'Nasarawa State'),
(27, 'Niger State'),
(28, 'Ogun State'),
(29, 'Ondo State'),
(30, 'Osun State'),
(31, 'Oyo State'),
(32, 'Plateau State'),
(33, 'Rivers State'),
(34, 'Sokoto State'),
(35, 'Taraba State'),
(36, 'Yobe State'),
(37, 'Zamfara State');

-- --------------------------------------------------------

--
-- Table structure for table `visap_stdmedical_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_stdmedical_tbl` (
  `medicalId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studId` bigint(20) UNSIGNED NOT NULL,
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
  PRIMARY KEY (`medicalId`),
  KEY `studId` (`studId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_stdpreschlinfo`
--

CREATE TABLE IF NOT EXISTS `visap_stdpreschlinfo` (
  `preId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
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
  PRIMARY KEY (`preId`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_attendance_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_student_attendance_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stdRegNo` varchar(50) DEFAULT NULL,
  `stdGrade` varchar(50) DEFAULT NULL,
  `school_open` int(5) DEFAULT NULL,
  `present` varchar(50) DEFAULT NULL,
  `absent` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `schl_session` varchar(50) DEFAULT NULL,
  `uploaded_by` varchar(200) DEFAULT NULL,
  `uploaded_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_info_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_student_info_tbl` (
  `stdInfoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studentId` bigint(20) UNSIGNED NOT NULL,
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
  PRIMARY KEY (`stdInfoId`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_login_token`
--

CREATE TABLE IF NOT EXISTS `visap_student_login_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_payment_history_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_student_payment_history_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_payment_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_student_payment_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_student_tbl` (
  `stdId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stdRegNo` varchar(20) DEFAULT NULL,
  `stdEmail` varchar(160) DEFAULT NULL,
  `stdUserName` varchar(50) DEFAULT NULL,
  `stdPassword` varchar(255) DEFAULT NULL,
  `studentClass` varchar(50) DEFAULT NULL,
  `stdSurName` varchar(100) DEFAULT NULL,
  `stdFirstName` varchar(50) DEFAULT NULL,
  `stdMiddleName` varchar(50) DEFAULT NULL,
  `stdDob` date DEFAULT NULL,
  `stdGender` varchar(20) DEFAULT NULL,
  `stdAddress` text DEFAULT NULL,
  `stdPhone` varchar(20) DEFAULT NULL,
  `stdAdmStatus` enum('Pending','Active','Expelled','Suspended','Transfered','Graduated','Left') NOT NULL DEFAULT 'Pending',
  `stdApplyDate` date DEFAULT NULL,
  `stdApplyType` enum('Day','Boarding') NOT NULL DEFAULT 'Day',
  `stdPassport` varchar(255) DEFAULT NULL,
  `stdConfToken` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `stdTokenExp` datetime DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `admitted_class` varchar(50) DEFAULT NULL,
  `completed_date` date DEFAULT NULL,
  PRIMARY KEY (`stdId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_testimonial_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_student_testimonial_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `stdRegNo` varchar(50) DEFAULT NULL,
  `admitted_class` varchar(50) DEFAULT NULL,
  `admitted_date` date DEFAULT NULL,
  `class_completed` varchar(50) DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `academic_ability` varchar(100) DEFAULT NULL,
  `sports_ability` varchar(100) DEFAULT NULL,
  `office_held` varchar(50) DEFAULT NULL,
  `school_club` varchar(100) DEFAULT NULL,
  `general_remarks` text DEFAULT NULL,
  `student_character` varchar(255) DEFAULT NULL,
  `subject1` varchar(255) DEFAULT NULL,
  `subject2` varchar(255) DEFAULT NULL,
  `subject3` varchar(255) DEFAULT NULL,
  `subject4` varchar(255) DEFAULT NULL,
  `subject5` varchar(255) DEFAULT NULL,
  `subject6` varchar(255) DEFAULT NULL,
  `subject7` varchar(255) DEFAULT NULL,
  `subject8` varchar(255) DEFAULT NULL,
  `subject9` varchar(255) DEFAULT NULL,
  `subject10` varchar(255) DEFAULT NULL,
  `subject11` varchar(255) DEFAULT NULL,
  `cert_no` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `stdRegNo` (`stdRegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_submitted_class_assignment_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_submitted_class_assignment_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_termly_result_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_termly_result_tbl` (
  `reportId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_upcoming_event_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_upcoming_event_tbl` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visap_virtual_lesson_tbl`
--

CREATE TABLE IF NOT EXISTS `visap_virtual_lesson_tbl` (
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
  PRIMARY KEY (`lectureId`),
  KEY `teacher` (`teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_book`
--

CREATE TABLE IF NOT EXISTS `visitor_book` (
  `visitor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visap_assignment_tbl`
--
ALTER TABLE `visap_assignment_tbl`
  ADD CONSTRAINT `visap_assignment_tbl_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_classnote_tbl`
--
ALTER TABLE `visap_classnote_tbl`
  ADD CONSTRAINT `visap_classnote_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_exam_subject_tbl`
--
ALTER TABLE `visap_exam_subject_tbl`
  ADD CONSTRAINT `visap_exam_subject_tbl_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_staff_bank_details_tbl`
--
ALTER TABLE `visap_staff_bank_details_tbl`
  ADD CONSTRAINT `visap_staff_bank_details_tbl_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_staff_paid_salary_tbl`
--
ALTER TABLE `visap_staff_paid_salary_tbl`
  ADD CONSTRAINT `visap_staff_paid_salary_tbl_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_staff_payroll_tbl`
--
ALTER TABLE `visap_staff_payroll_tbl`
  ADD CONSTRAINT `visap_staff_payroll_tbl_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_staff_post_tbl`
--
ALTER TABLE `visap_staff_post_tbl`
  ADD CONSTRAINT `visap_staff_post_tbl_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_stdmedical_tbl`
--
ALTER TABLE `visap_stdmedical_tbl`
  ADD CONSTRAINT `visap_stdmedical_tbl_ibfk_1` FOREIGN KEY (`studId`) REFERENCES `visap_student_tbl` (`stdId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_stdpreschlinfo`
--
ALTER TABLE `visap_stdpreschlinfo`
  ADD CONSTRAINT `visap_stdpreschlinfo_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `visap_student_tbl` (`stdId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_student_info_tbl`
--
ALTER TABLE `visap_student_info_tbl`
  ADD CONSTRAINT `visap_student_info_tbl_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `visap_student_tbl` (`stdId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visap_virtual_lesson_tbl`
--
ALTER TABLE `visap_virtual_lesson_tbl`
  ADD CONSTRAINT `visap_virtual_lesson_tbl_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `visap_staff_tbl` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
