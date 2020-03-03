-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 11:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `name` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`name`, `pass`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `branch_info`
--

CREATE TABLE `branch_info` (
  `c_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `b_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `branch_name` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_in_take` int(11) NOT NULL,
  `year_of_start` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accredition_valid_upto` int(4) DEFAULT NULL,
  `NBA_2020` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch_info`
--

INSERT INTO `branch_info` (`c_code`, `b_code`, `branch_name`, `approved_in_take`, `year_of_start`, `accredition_valid_upto`, `NBA_2020`) VALUES
('0', 'CS', 'Computer Science and Engg.-CS', -60, '2030', 2050, 1),
('0', 'IT', 'Information Technology-IT', 73, '6', 24, 0),
('1', 'AR', 'Architecture-AR', 1, '2020', 2021, 1),
('1', 'EC', 'Electronics & Communication-EC', 2, '2133', 2222, 1),
('1', 'Inf', 'Geo-Informatics-GI', 2, '2013', 2020, 0),
('1', 'PET', 'Petroleum Engineering & Technology-PET', 2020, '2030', 2040, 0),
('1014', '', 'Aeronautical Engineering-AE', 67897, '2017', 2000, 0),
('1014', 'AI', 'Agriculture & Irrigation Engineering-AI', 4567, '2000', 2016, 0),
('1014', 'ME', 'Mechanical Engineering-ME', 5678, '2014', 2345, 0),
('1026', '', 'Aeronautical Engineering-AE', 1, '2018', 2022, 1),
('1026', 'AI', 'Agriculture & Irrigation Engineering-AI', 2, '2018', 2022, 1),
('1026', 'CH', 'Chemical Engineering-CH', 2, '2018', 2022, 1),
('1026', 'MS', 'Material Science & Engineering-MS', 1, '2018', 2022, 1),
('1101', 'FT', 'Food Technology-FT', -60, '2020', 2023, 1),
('1101', 'TX', 'Textile Technology-TX', 60, '2020', 2023, 1),
('1106', '', 'Aeronautical Engineering-AE', 12, '2008', 2012, 1),
('1106', 'CS', 'Computer Science and Engg.-CS', 123, '2007', 2011, 1),
('1107', 'CR', 'Ceramic Technology-CR', 60, '2017', 2021, 1),
('1107', 'FT', 'Food Technology-FT', 60, '2017', 2021, 1),
('1110', 'AP', 'Apparel Technology-AP', 60, '2015', 2022, 1),
('1110', 'Med', 'Bio-Medical Engineering-BM', 60, '2012', 2021, 1),
('1112', '', 'Aeronautical Engineering-AE', 60, '2020', 2024, 1),
('1112', 'FT', 'Food Technology-FT', 60, '2020', 2025, 1),
('1113', 'FT', 'Food Technology-FT', 60, '2016', 2020, 1),
('1113', 'IT', 'Information Technology-IT', 60, '2011', 2022, 1),
('1114', 'AU', 'Automobile Engineering-AU', 19, '2008', 2012, 1),
('1114', 'RP', 'Rubber and Plastics Technology-RP', 22, '2007', 2011, 1),
('1116', 'AI', 'Agriculture & Irrigation Engineering-AI', 60, '2006', 2030, 1),
('1118', 'CS', 'Computer Science and Engg.-CS', 60, '2005', 2030, 1),
('1121', 'AI', 'Agriculture & Irrigation Engineering-AI', 34, '2010', 2040, 1),
('1121', 'Tec', 'Industrial Bio-Technology-IB', 50, '2019', 2040, 1),
('1122', '', 'Aeronautical Engineering-AE', 60, '2017', 2021, 1),
('1122', 'CS', 'Computer Science and Engg.-CS', 60, '2018', 2022, 0),
('1123', 'AR', 'Architecture-AR', 60, '2007', 2022, 1),
('1123', 'CS', 'Computer Science and Engg.-CS', 60, '2006', 2021, 1),
('1124', 'CS', 'Computer Science and Engg.-CS', 60, '2018', 2022, 1),
('1126', 'AI', 'Agriculture & Irrigation Engineering-AI', 70, '2010', 2070, 1),
('1126', 'CS', 'Computer Science and Engg.-CS', 65, '2000', 2020, 1),
('1126', 'LE', 'Leather Technology-LE', 45, '2001', 2025, 1),
('1126', 'MN', 'Manufacturing Engineering-MN', 70, '2015', 2070, 1),
('1234', 'CE', 'Civil Engineering-CE', 200, '2020', 2020, 1),
('1234', 'CH', 'Chemical Engineering-CH', 120, '2020', 2021, 1),
('1234', 'IT', 'Information Technology-IT', 2020, '2020', 2020, 1),
('1321', 'CS', 'Computer Science and Engg.-CS', -60, '2020', 2024, 1),
('1516', 'AI', 'Agriculture & Irrigation Engineering-AI', 5, '2341', 2213, 1),
('2', 'CS', 'Computer Science and Engg.-CS', 2017, '2017', 2021, 0),
('2001', 'CS', 'Computer Science and Engg.-CS', 60, '2005', 2021, 1),
('2001', 'EC', 'Electronics & Communication-EC', 60, '2000', 2021, 1),
('2001', 'EE', 'Electrical and Electronics-EE', 60, '1996', 2021, 1),
('2001', 'ME', 'Mechanical Engineering-ME', 60, '2006', 2021, 0),
('2005', '', 'Aeronautical Engineering-AE', -1, '-1', -1, 1),
('2005', 'CS', 'Computer Science and Engg.-CS', 2017, '2017', 2021, 0),
('2005', 'ME', 'Mechanical Engineering-ME', -1, '-1', -1, 1),
('2006', 'PT', 'Printing Technology-PT', 60, '2006', 2024, 1),
('2006', 'RP', 'Rubber and Plastics Technology-RP', 60, '2005', 2026, 1),
('2025', '', 'Aeronautical Engineering-AE', 1, '2016', 1, 1),
('2025', 'Med', 'Bio-Medical Engineering-BM', 2000, '2020', 2015, 1),
('2343', 'CH', 'Chemical Engineering-CH', 60, '2006', 2033, 1),
('2343', 'EE', 'Electrical and Electronics-EE', 60, '2006', 2033, 1),
('2369', 'CS', 'Computer Science and Engg.-CS', 2019, '2000', 2050, 1),
('2603', 'CS', 'Computer Science and Engg.-CS', 4, '2017', 121, 1),
('2615', '', 'Aeronautical Engineering-AE', 2020, '2019', 2021, 1),
('2615', 'CS', 'Computer Science and Engg.-CS', 2019, '2000', 2022, 1),
('3', '', 'Aeronautical Engineering-AE', 155, '3434', 3244, 1),
('3', 'CS', 'Computer Science and Engg.-CS', 1000, '2010', 2025, 1),
('3011', 'CS', 'Computer Science and Engg.-CS', 1, '2017', 2022, 1),
('3011', 'EE', 'Electrical and Electronics-EE', 1, '2017', 2020, 1),
('3019', 'CS', 'Computer Science and Engg.-CS', 60, '2017', 2021, 1),
('3021', '', 'Aeronautical Engineering-AE', 6576, '2000', 2004, 0),
('3021', 'AU', 'Automobile Engineering-AU', 4343, '2000', 2004, 0),
('3464', 'CS', 'Computer Science and Engg.-CS', 2017, '2017', 2021, 0),
('3465', 'AR', 'Architecture-AR', 60, '2010', 2020, 1),
('3465', 'AU', 'Automobile Engineering-AU', 60, '2007', 2023, 1),
('3465', 'CS', 'Computer Science and Engg.-CS', 1, '2017', 2021, 1),
('4020', 'CS', 'Computer Science and Engg.-CS', 1, '1789', 5, 1),
('4020', 'EE', 'Electrical and Electronics-EE', 1, '1789', 5, 1),
('4024', '', 'Aeronautical Engineering-AE', 2, '1', 5, 1),
('4974', '', 'Aeronautical Engineering-AE', 60, '2009', 2023, 1),
('4974', 'CH', 'Chemical Engineering-CH', 60, '2008', 2023, 1),
('5008', 'AI', 'Agriculture & Irrigation Engineering-AI', 60, '2008', 2024, 1),
('5008', 'CE', 'Civil Engineering-CE', 60, '2006', 2023, 1),
('5009', 'CS', 'Computer Science and Engg.-CS', 60, '2008', 2022, 1),
('5009', 'FT', 'Food Technology-FT', 60, '2009', 2023, 1),
('5010', '', 'Aeronautical Engineering-AE', 1999, '2000', 2010, 1),
('5010', 'AU', 'Automobile Engineering-AU', 56, '555', 555, 0),
('5012', '', 'Aeronautical Engineering-AE', 100, '2020', 3000, 1),
('5012', 'MS', 'Material Science & Engineering-MS', 150, '2015', 3000, 1),
('5017', '', 'Aeronautical Engineering-AE', 49, '2020', 3000, 1),
('5017', 'AR', 'Architecture-AR', 49, '2020', 3000, 1),
('5017', 'CS', 'Computer Science and Engg.-CS', 49, '2020', 3000, 1),
('5017', 'Inf', 'Geo-Informatics-GI', 49, '2020', 3000, 1),
('5022', '', 'Aeronautical Engineering-AE', 546, '2020', 2028, 1),
('5022', 'EC', 'Electronics & Communication-EC', 546, '2020', 2028, 0),
('5901', '', 'Aeronautical Engineering-AE', 60, '2020', 2024, 1),
('5901', 'AR', 'Architecture-AR', 30, '2020', 2024, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college_info`
--

CREATE TABLE `college_info` (
  `c_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name_of_college` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_principal` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taluk` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin_code` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anti_ragging_contact_no` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `minority_status` tinyint(1) DEFAULT NULL,
  `autonomous_status` tinyint(1) DEFAULT NULL,
  `dist_from_district_hq` int(11) DEFAULT NULL,
  `nearest_railway` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dist_from_railway` int(11) DEFAULT NULL,
  `transport_facility` tinyint(1) DEFAULT NULL,
  `transport` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_trans_cost` int(11) DEFAULT NULL,
  `max_trans_cost` int(11) DEFAULT NULL,
  `b_accomodation` tinyint(1) DEFAULT NULL,
  `b_hostel_stay_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_type_of_mess` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_mess_bill` int(11) DEFAULT NULL,
  `b_room_rent` int(11) DEFAULT NULL,
  `b_electricity_charges` int(11) DEFAULT NULL,
  `b_caution_deposit` int(11) DEFAULT NULL,
  `b_establishment_charges` int(11) DEFAULT NULL,
  `b_addmission_fees` int(11) DEFAULT NULL,
  `g_accomodation` tinyint(1) DEFAULT NULL,
  `g_hostel_stay_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `g_type_of_mess` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `g_mess_bill` int(11) DEFAULT NULL,
  `g_room_rent` int(11) DEFAULT NULL,
  `g_electricity_charges` int(11) DEFAULT NULL,
  `g_caution_deposit` int(11) DEFAULT NULL,
  `g_establishment_charges` int(11) DEFAULT NULL,
  `g_addmission_fees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `college_info`
--

INSERT INTO `college_info` (`c_code`, `name_of_college`, `name_of_principal`, `address`, `taluk`, `district`, `pin_code`, `phone`, `email`, `website`, `anti_ragging_contact_no`, `bank_account_no`, `bank_name`, `minority_status`, `autonomous_status`, `dist_from_district_hq`, `nearest_railway`, `dist_from_railway`, `transport_facility`, `transport`, `min_trans_cost`, `max_trans_cost`, `b_accomodation`, `b_hostel_stay_type`, `b_type_of_mess`, `b_mess_bill`, `b_room_rent`, `b_electricity_charges`, `b_caution_deposit`, `b_establishment_charges`, `b_addmission_fees`, `g_accomodation`, `g_hostel_stay_type`, `g_type_of_mess`, `g_mess_bill`, `g_room_rent`, `g_electricity_charges`, `g_caution_deposit`, `g_establishment_charges`, `g_addmission_fees`) VALUES
('0001', 'university department of anna university', 'aakash', 'thirumazhapadi', 'Ariyalur', 'Ariyalur', '621851', '7826945004', 'akashpunniyakodi@gmail.com', 'daft.com', '9790123608', '500101011472126', 'city union', 1, 1, 20, 'ariyalur', 13, 0, 'Optional', 1000, 2000, 1, 'Rental', 'Veg', 1500, 500, 200, 20, 100, 5000, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0),
('0002', 'university departments of anna university,chennai-ACT', 'alwarsamy', 'devasamuthiram village krishnagiri', 'Krishnagiri', 'Krishnagiri ', '635001', '8778596434', 'agathiyan.chen2000@gmail.com', 'urhgifuhouthuh', '56468767868', '4354765747456', 'cityunion', 0, 0, 15, 'jolarpettai', 87, 0, 'Optional', 44, 444, 0, 'Rental', 'Veg', 111111, 111111, 111111, 111111, 111111, 11111111, 0, 'Rental', 'Veg', 111111, 11111, 1111111, 111111, 11111, 111111),
('0003', 'university departmentS of anna university,chennai-SAP', 'AJITHKUMAR C', 'GCE Bargur', 'Mettur', 'Salem ', '636404', '9655297038', 'ajithdhoni2017@gmail.com', 'www.gceb.com', '9876542310', '54566545321325156', 'CUB', 1, 1, 12, 'hosur', 10, 1, 'Optional', 100000, 1000000, 1, 'Permanent', 'Both', 1800, 3200, 1000, 12000, 10000, 10000, 1, 'Permanent', 'Veg', 1000, 1000, 1000, 100, 1000, 1000),
('0004', 'university departments of anna university,chennai-MIT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0005', 'faculty of engineering,annamalai university', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1013', 'university college of engineering,villupuram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1014', 'University college of engineering, Tindivanam', 'Days', 'kattinayanapalli', 'Thindivanam', 'Viluppuram', '635001', '9794917686', 'asd.@gamil.com', 'www.asd.com', '9897969590', '234556778990', 'statebank of ndia', 0, 1, 67, 'thirupattur', 34, 0, 'Optional', 0, 0, 0, 'Permanent', 'Veg', 2000, 345, 789, 564, 456, 12000, 0, 'Rental', 'Veg', 2000, 345, 567, 786, 790, 12000),
('1015', 'University college of engineering,arni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1026', 'University college of engineering,kancheepuram', 'EZHILOLI.A', '12.MGR NAGAR,BARGUR,', 'adaladi', 'Ariyalur', '635104', '9587412368', 'dhoni123@gmail.com', 'www.ucek.com', '9523687417', '500123698754125', 'city union bank', 1, 1, 10, 'pachur', 10, 1, 'Optional', 500, 1000, 1, 'Permanent', 'Both', 500, 400, 100, 100, 100, 150, 1, 'Permanent', 'Both', 500, 400, 100, 100, 100, 150),
('1101', 'aalim muhammed salegh college of engineering,muthapudupet', 'Dr s.santhi', 'penniquik nagar,mayiladumparai,theni-625579', 'Andipatti', 'Theni', '625579', '9751461096', 'ganesansangeeth10@gmail.com', 'www.sangi.com', '8940888131', '500101011214721', 'city union bank', 0, 1, 350, 'dindigul', 25, 1, 'Optional', 2000, 5000, 1, 'Rental', 'Non-Veg', 3000, 2000, 500, 1000, 500, 10000, 1, 'Rental', 'Non-Veg', 3000, 2000, 500, 1000, 500, 10000),
('1106', 'jaya engineering college ,thirunindravur', 'sakthi.c', 'gce,bargur', 'adaladi', 'Ariyalur', '635104', '8889987912', 'sakthic@gmail.com', 'www.gcebargur.ac.in', '9999911122', '12345678901234567', 'indian bank', 0, 1, 15, 'jolarpettai', 30, 1, 'Optional', 2400, 2700, 1, 'Permanent', 'Veg', 3000, 400, 500, 1000, 10000, 12000, 1, 'Permanent', 'Veg', 3000, 390, 500, 1500, 14000, 12000),
('1107', 'jaya institute of technology,kanchipadi post', 'dr.sowndarya V', 'baisuhalli,karimangalam,dharmapuri', 'adaladi', 'Ariyalur', '635205', '8940008143', 'sowndaryavinayak@gtmail.com', 'www.sowndaryav.com', '7708198987', '994424239770', 'punjab nmational bank', 1, 0, 46, 'jolarpet', 10, 1, 'Optional', 18, 30, 1, 'Permanent', 'Both', 2000, 400, 100, 1000, 5000, 4000, 1, 'Permanent', 'Both', 2000, 500, 100, 4000, 5000, 4000),
('1110', 'prathyusha engineering college,aranvoyalkuppam', 'sugu', '3/28a ,stadium road .', 'Krishnagiri', 'Krishnagiri ', '635001', '6380452088', 'thangaraj.b2000@gmail.com', 'dean.com', '123456789', '156098437892', 'INDIAN', 1, 1, 23, '45', 23, 1, 'Optional', 50, 100, 1, 'Rental', 'Veg', 1300, 2345, 2309, 123, 23445, 45566, 1, 'Permanent', 'Both', 4565, 345, 2345, 2456, 234, 10000),
('1112', 'R M D engineering college,kavaraipettai', 'Dr.G.Sangeetha ', 'Thathakullanoor(village)', 'Tirupathur', 'Vellore ', '635601', '7825963185', 'santhisa1004@gmail.com', 'www.sans.com', '8940888131', '500101011472145', 'city union bank', 0, 1, 250, 'jolarpettai', 50, 1, 'Optional', 200, 200, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 1, 'Rental', 'Veg', 1800, 600, 300, 500, 400, 4000),
('1113', 'R M K engineering college ,kavaraipettai', 'Vasanth K', 'kavaraipattai,gummidipoondi,thiruvallur-601206', 'Gummidipoondi', 'Thiruvallur ', '601206', '9080392821', 'rmk123@gmail.com', 'rmk.com', '8489982821', '600101011472051', 'City Union Bank', 1, 1, 5, 'thiruvallur', 4, 1, 'Optional', 5000, 8000, 1, 'Permanent', 'Both', 4000, 1500, 150, 2000, 1000, 4000, 1, 'Permanent', 'Both', 4000, 1500, 150, 2000, 1000, 4000),
('1114', 'S A engineering college,thiruverkadu', 'vimala.D', 'department of computer science and engineering,bargur', 'adaladi', 'Ariyalur', '635104', '8874492324', 'vimaladamodaran20700@gmail.com', 'www.gcebargur.ac.in', '', '1453268780123457', 'lakshmi vilas', 0, 1, 15, 'thirupathur', 30, 1, 'Optional', 2400, 2700, 1, 'Rental', 'Veg', 1700, 2000, 300, 10000, 1000, 12000, 1, 'Rental', 'Veg', 1700, 2000, 300, 10000, 1000, 12000),
('1115', 'sri ram engineering college,perumalpattu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1116', 'sri venkateswara college of engineering and technology,thirupachur', 'Mr . Chennaiyan', 'Perumal Kuppam vill and post', 'Uthangarai', 'Krishnagiri ', '604201', '7906432756', 'Chennaiyansmya56@gmail.com', 'www.chennaiyan.com', '8754327954', '35545788754357', 'CUB', 0, 0, 45, 'Thiruppathur', 40, 1, 'Optional', 30000, 35000, 1, 'Permanent', 'Both', 5000, 5000, 1000, 3000, 2000, 70000, 1, 'Permanent', 'Both', 5000, 1000, 2000, 4000, 3000, 40000),
('1118', 'vel tech multi tech dr.rangarajan dr.sakunthala engineering college,a vadi-alamathi road', 'alwarsamy', 'badapalli', 'Uthangarai', 'Krishnagiri ', '635307', '9097654323', 'chennai123@gmail.com', 'www.gceb123.com', '8767896578', '98756374647', 'state bank of indan', 0, 0, 40, 'thirupattur', 30, 0, 'Optional', 1000, 1120, 1, 'Permanent', 'Veg', 1500, 1600, 300, 1000, 2000, 45000, 1, 'Permanent', 'Veg', 1500, 1600, 300, 1000, 2000, 50000),
('1120', 'velammal engineering college,ambattur-redhills road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1121', 'sri venkateswara institute of science and technology,kozhundalur', 'Dr kalaiyarasan', 'kozhundalaur', 'adaladi', 'Ariyalur', '53433', '3534563634', 'kalgak@gmaial.com', 'kalai@kalai.com', '46745643', '347344332189', 'State Bank of India', 0, 1, 345, '33', 0, 1, 'Optional', 23223, 43453, 1, 'Permanent', 'Both', 5645, 3453, 4564, 3242423, 34323, 32434, 1, 'Permanent', 'Veg', 23, 23, 34234, 23424, 3424, 4234234),
('1122', 'vel tech high tech dr.rangarajan dr.sakunthala engineering college,a vadi-alamathi road', 'SIVA P', 'Avadi-Alamathi Road', 'Tiruvallur', 'Chennai', '600062', '8189885740', 'sivaatar1999@gmail.com', 'www.veltech.in', '9626127141', '330345174231256', 'canara bank', 0, 1, 40, 'avadi', 2, 1, 'Compulsory', 5000, 8000, 1, 'Rental', 'Both', 2500, 800, 200, 500, 100, 10000, 1, 'Rental', 'Both', 1500, 2000, 200, 500, 100, 1000),
('1123', 'gojan school of business and technology,alamathi', 'M.SOWMYA', '2/359,N.Dasiripalli,Naduvanapalli', 'Krishnagiri', 'Krishnagiri ', '635121', '6385503772', 'ssowmiya55206@gmail.com', 'www.sl.com', '9047270895', '38537097603', 'CUB', 1, 1, 23, 'BARGUR', 15, 1, 'Optional', 3600, 4000, 0, 'Permanent', 'Veg', 1800, 500, 200, 500, 6000, 12000, 1, 'Permanent', 'Non-Veg', 1800, 500, 200, 500, 6000, 12000),
('1124', 'SAMS college of engineering and technology,pamappakkam', 'SUJAI J', 'Chennapalli, Shoolagiri', 'Hosur', 'Krishnagiri ', '635117', '9677842851', 'j.sujai1999@gmail.com', 'www.google.com', '088786542780', '6629932437', 'Indian bank', 0, 0, 20, 'Hosur', 25, 1, 'Optional', 5000, 5000, 1, 'Rental', 'Veg', 1000, 1000, 100, 200, 200, 5000, 1, 'Rental', 'Veg', 1000, 1000, 100, 2000, 200, 5000),
('1125', 'P M R engineering college,adayalampattu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1126', 'J N N institute of engineering,ushaa garden,kannigaipair village', 'Kumaresan', 'patchur(vill &post)', 'Tirupathur', 'Vellore ', '635203', '8765432098', 'resh05@gmail.com', 'www.reshanj.com', ' 8455667609', '12345677890005', 'Indian bank', 1, 1, 20, 'tirupathur', 30, 1, 'Compulsory', 50000, 75000, 1, 'Permanent', 'Both', 3000, 2500, 500, 100000, 10000, 50000, 1, 'Permanent', 'Both', 2500, 3000, 500, 50000, 10000, 50000),
('1234', 'vvrkusjuWE', 'kishoth', 'jhviuldvliufd', 'Alanthur', 'Perambalur', '621109', '8774937598', 'kmkjoidj', 'www.kmk.com', '08390234', '123445678912', 'cub', 1, 1, 23, 'thirupathur', 35, 1, 'Optional', 5000, 10000, 1, 'Permanent', 'Both', 2000, 1000, 50, 300, 5000, 1200, 1, 'Permanent', 'Non-Veg', 2000, 1000, 200, 120, 60089, 1200),
('1321', 'central institute of plastics engineering and technology(CIPET),guindy', 'prakash m', 'no 82 middle street nadalaganandal , tiruvannamalai dt', 'Tiruvannamalai', 'Thiruvannamalai ', '606804', '8072202481', 'prakashm21600@gmail.com', 'www.prkashgood.com', '6745746678', '50007648675', 'city union bank ', 1, 1, 12, 'jolarpet', 30, 1, 'Optional', 4656, 345389, 1, 'Permanent', 'Veg', 46567, 34545, 6656, 45645, 6456, 5656, 1, 'Permanent', 'Veg', 6456, 56576, 6566, 456456, 6456, 56456),
('1516', 'Thanthai periyar government institute of technology,bagayam', 'alwarsamy', '59a,east street', 'Alandur', 'Perambalur', '654321', '8765432190', 'kishoth@gmail.com', '', '', '465203564335', 'sbi', 1, 1, 34, 'jolar', 3, 1, 'Optional', 100, 2000, 1, 'Permanent', 'Veg', 1500, 200, 400, 1234, 200, 456476, 1, 'Permanent', 'Veg', 4324, 435, 6457547, 67565, 657567, 545643),
('2001', 'Government College Of Engineering Bargur', 'Dr. T. Alwarsamy', 'Kandikuppam, Bargur, Krishnagiri', 'Krishnagiri', 'Krishnagiri ', '635104', '9626236498', 'selvantamil@gmail.com', 'www.gcebargur.com', '9087654321', '698547258963', 'Indian Bank', 0, 1, 15, 'Tiruppatur', 40, 0, 'Optional', 0, 0, 1, 'Permanent', 'Both', 2000, 500, 100, 500, 5000, 5000, 1, 'Permanent', 'Both', 2000, 500, 100, 0, 5000, 5000),
('2005', 'government college of technology(autonomous),thadagam road', 'kavinbro', ' bass nagar,erode', 'adaladi', 'Erode', '-1', '1234567890', 'kavinsg1602@gmailcom', 'http\\\\kavinbro', '04179223862', '1234534124235465476', 'kavinbro', 0, 1, 635601, 'erode', 15, 1, 'Compulsory', 25000, 50000, 1, 'Rental', 'Both', 120000, -1, -1, -1, -1, -1, 1, 'Rental', 'Both', 130000, -1, -1, -1, -1, 150000),
('2006', 'PSG college of technology(autonomous),peelamedu', 'Dr.K.prakashan', '6/10, narayanasmay kovil street,veikalipatty', 'Ambasamuthiram', 'Thirunelveli', '627415', '9952117289', 'ponkumar5287@gmail.com', 'pkarumugam.com', '3654723436', '25717767616349', 'tenkasivaisa', 1, NULL, 2, 'mettur railway station', 7, 1, 'Optional', 8795, 54275, 1, 'Permanent', 'Non-Veg', 1700, 500, 200, 2000, 400, 6000, 1, 'Permanent', 'Veg', 1700, 500, 200, 2000, 600, 6000),
('2007', 'coimbatore institute of technology(autonomous),civil aerodrome post', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2025', 'Anna university regional campous,coimbatore', 'krishna', '374,annai nagar,asiriyar nagar (post)tirupattur dt', 'Tirupattur', 'Vellore ', '635601', '9992554676', 'kichukrishna11@gamil.com', '', '0465182635', '123456878900690', 'cityunion bank', 1, 0, 20000, 'jollarpet', 50000, 1, 'Optional', 2000, 2500, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 1, 'Permanent', 'Veg', 50000, 20000, 14000, 2000, 15000, 100000),
('2343', 'indian institute of handloom technology,foulke`s compound,thillai nagar', 'Dr.Premkumar', 'government college of engineering,Bargur', 'adaladi', 'Ariyalur', '636001', '9576894758', 'fuckoff@hotmail.com', 'www.premniha.com', '9080706050', '589583993839', 'ponkumar International bank', 1, 1, 2, 'Thirupattur Railway junction', 9, 1, NULL, 4499, 6499, 1, 'Permanent', 'Both', 1499, 499, 49, 2499, 99, 6499, 1, 'Permanent', 'Both', 1499, 499, 49, 2499, 99, 6499),
('2369', 'Government college of engineering,chettikkarai post', 'alwarsamy', 'bargur', 'adaladi', 'Ariyalur', '635109', '9864269974', 'alluarjunlucky1234@gmail.com', 'www.anu.com', '9856428649', '564738923451673', 'kfc', 0, 1, 5, 'bargur', 5, 1, 'Optional', 2500, 5000, 1, 'Permanent', 'Both', 1500, 1000, 500, 1000, 600, 7000, 1, 'Permanent', 'Both', 1500, 700, 800, 1000, 500, 7000),
('2602', 'Government college of engineering,bargur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2615', 'Government college of engineering(autonomous),karuppur', 'alwarsamy', 'adaladi(krishnagiri)', 'adaladi', 'Ariyalur', '636011', '9089765421', 'vijayprasad123@gmail.com', 'www.vijay123.com', '9087676543', '1289476547548', 'kfc', 0, 0, 56, 'bargur', 6, 0, 'Optional', 690, 500, 1, 'Permanent', 'Both', 4390, 4000, 5000, 7000, 2000, 100000, 1, 'Permanent', 'Both', 3000, 8000, 600, 4098, 4000, 4900),
('3011', 'University college of engineering,BIT campus', 'Dr.T.Alwarsamy', 'government college of engineering', 'adaladi', 'Ariyalur', '621704', '9034674432', 'yadhu5018@gmail.com', 'www.harshini.com', '8334671551', '4324 5678 9876 ', 'indian bank', 1, 1, 4, 'jolarpet', 2, 1, 'Optional', 25000, 30000, 1, 'Permanent', 'Veg', 1800, 500, 200, 500, 2000, 6000, 1, 'Permanent', 'Veg', 1500, 500, 200, 400, 2000, 6000),
('3016', 'University college of engineering,ariyalur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3018', 'University college of engineering,thirukkuvalai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3019', 'University college of engineering,panruti', 'Farheen Anjum.R', 'no 34 barnakar street  flower garden ', 'Kumbakonam', 'Cuddalore', '607106', '9629573543', 'farheenanjum119@gmail.com', 'www.universitycollegeofengineringpanruti', '9629573543', '5001010110143', 'bargur', 1, 1, 4, 'yes', 3, 1, 'Optional', 4000, 5000, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 1, 'Permanent', 'Both', 1500, 1000, 500, 5000, 500, 7000),
('3021', 'University college of engineering,pattukkottai', 'dkguu', 'dwfyjkloihjgjyu', 'Palayamkottai', 'Cuddalore', '625203', '9876501234', 'vsg123@gmail.com', 'www.ggg.@:/htttp', '5656590909', '65654643643545', 'dgfg', 0, 1, 34, 'jkkgjjykuk', 32, 1, 'Compulsory', 467, 900, 1, 'Permanent', 'Veg', 12000, 1500, 200, 3000, 500, 4500, 1, NULL, NULL, 0, 0, 0, 0, 0, 0),
('3456', 'grgrb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3464', 'Government college of engineering,gandarvakottai road', 'DR.Alwarsamy', 'puduped road tirupattur', 'Tirupattur', 'Vellore ', '635601', '6374991977', 'manojpvkd@gmail.com', 'www.gct.in', '9789105178', '634574732623', 'indian bank', 0, 1, 15, 'hosur', 40, 0, 'Optional', 25000, 30000, 0, 'Permanent', 'Veg', 2500, 4000, 700, 65770, 7700, 65780, 0, 'Permanent', 'Veg', 2500, 4000, 700, 56780, 87980, 67870),
('3465', 'Government college of engineering,srirangam', 'baskar', 'nettur', 'Alangulam', 'Thirunelveli', '627201', '94420232134', 'mayilmurugan1999@gmail.com', 'www.gcebargur.in', '8124237860', '5423676768', 'indianbank', 1, 1, 234, 'jolarpettai', 0, 1, 'Optional', 20000000, 10000000, 1, 'Permanent', 'Veg', 34567, 32345, 2345, 234365, 68784, 55678, 1, 'Permanent', 'Veg', 3453, 4643, 2435, 9786, 6876, 57657),
('4020', 'Anna university regional campus,tirunelveli', 'Dr.T.AlwarSwamy', 'government college of engineering bargur,girls hostel', 'adaladi', 'Ariyalur', '635104', '9872345691', 'jinnallah09@gmail.com', 'www.lavsanu.com', '7896553201', '453612378976', 'federal bank,kolkata', 0, 1, 3, 'jollarpet railway station', 1, 1, 'Optional', 15, 25, 1, 'Rental', 'Both', 1700, 500, 350, 400, 500, 6000, 1, 'Permanent', 'Both', 1600, 500, 350, 500, 350, 6000),
('4023', 'university college of engineering,nagercoil', 's.kalpana', 'Nagercoil estate,konam,kanyakumari district', 'Kumbakonam', 'Kanyakumari', '629004', '9150409510', 'kalpanasen2405@gmail.com', 'www.gcebargur.com', '9150409510', '500101011472149', 'city union bank', 1, 1, 5, 'yes', 5, 1, 'Optional', 4000, 5000, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 1, 'Permanent', 'Veg', 1500, 1000, 500, 5000, 500, 7000),
('4024', 'University v.o.c college of engineering,thoothukudi', 'Ezhumalai', 'Bargur', 'adaladi', 'Thiruvannamalai ', '606601', '00000000000', 'k@gmail.com', 'k.com', '000000000001', '99998787767', 'kotak', 1, 1, 140, 'jolarpettai', 40, 1, 'Optional', 20000, 25000, 1, 'Permanent', 'Veg', 40000, 20000, 222, 2222, 2222, 2225, 1, 'Permanent', 'Veg', 2222, 22222, 222, 2222, 22222, 2222),
('4974', 'Government college of engineering,Tirunalveli district', 'N.MUTHAMIL', '33/13,DR.Ambethkar Nagar', 'adaladi', 'Ariyalur', '627007', '8220329905', 'karsha10@gmail.com', 'www.karsha.com', '9876543210', '0000000223334445', 'Indian Bank', 1, 1, 15, 'thirunelveli ', 10, 1, 'Compulsory', 3500, 4200, 1, 'Permanent', 'Both', 4500, 2500, 300, 20000, 250, 12000, 1, 'Permanent', 'Both', 4500, 2500, 300, 20000, 250, 12000),
('5008', 'thiagarajar college of engineering(autonomous),tirupparamkundram', 'Dr.porkodi', '8/92,karungalipatti(vill),nadupatti(po)', 'adaladi', 'Ariyalur', '635001', '9065703529', 'pk2020dp@gmail.com', 'www.porkodi.com', '7894031274', '6658903256', 'city union bank', 1, 1, 46, 'jollarpatt', 15, 1, 'Optional', 5500, 6800, 1, 'Rental', 'Both', 1500, 800, 200, 150, 1000, 250, 1, 'Permanent', 'Both', 900, 500, 100, 200, 250, 100),
('5009', 'Government college of engineering,Melechokkanathapuram', 'T.Alwarsamy', 'Boothanatham', 'adaladi', 'Ariyalur', '636904', '8838149515', 'navithanagaivanan11@gmail.com', 'www.navipriya.com', '8976546786', '500010675789455', 'CUB', 1, 1, 20, '40', 40, 1, 'Compulsory', 100, 100, 1, 'Permanent', 'Veg', 15000, 12000, 100, 200, 100, 5000, 1, 'Rental', 'Veg', 1500, 1500, 500, 100, 200, 300),
('5010', 'Anna university regional campus,madurai', 'dr.b.lavanya', 'kannyakumari national highway,keelakuikudi,masdurai district', 'Kalkulam', 'Madurai', '625019', '0047878541', 'annauniversityregionalcampus@gmail.com', 'https://annauniversityregionalcampus', '8870594669', '500000014567809504', 'city union bank', 1, 1, 15, 'madhurai', 20, 1, 'Optional', 5000, 10000, 1, 'Permanent', 'Both', 1500, 50, 10, 1000, 500, 6000, 1, 'Permanent', 'Both', 1500, 50, 10, 500, 1000, 6000),
('5012', 'central electrochemical research institute,(CECRI),karaikudi', 'Dr.RAJA MBBS', 'KURUKU THRU ,BARUGUR', 'adaladi', 'Ariyalur', '598654', '6969365242', 'AMBANI999@GMAIL.COM', 'www.thatha.com', '9999933333', '500101011147259368', 'city union bank', 0, 1, 21, 'thirupathur', 20, 1, 'Optional', 300000, 1000000, 0, 'Permanent', 'Veg', 5000, 5000, 600, 100000, 200000, 3000000, 1, 'Permanent', 'Veg', 3000, 3000, 1000, 50000, 300000, 2500000),
('5017', 'University college of engineering,ramanathapuram', 'gdssdgsdgsd', 'gfdshgdfhfdh', 'adaladi', 'Ariyalur', '635104', '6789898923', 'vkirtrojgthrchsaklh@gmail.com', 'www.kirubva.com', '7892345678', '1223443544', 'bank of burada', 1, 1, 120, 'jolarper', 0, 1, 'Optional', 123, 1523, 1, 'Permanent', 'Both', 121354, 12324, 12323, 23435, 2424, 2000, 1, 'Permanent', 'Both', 65465, 5454, 441, 452452, 14214214, 52452),
('5022', 'University college of engineering,dindigul', 'M.Kishore', 'sivakasi', 'Sivakasi', 'Virudhunagar', '626124', '9585470769', 'kishorecraze1@gmail.com', 'www.google.com', '6377634863', '8746294384672345', 'dshdh', 1, 1, 467, 'hgsdy', 47, 1, 'Compulsory', 4673, 8758, 1, 'Permanent', 'Non-Veg', 6788, 566, 6785, 8468, 6485, 4846, 1, 'Permanent', 'Non-Veg', 4687, 468, 486, 376, 884, 8634),
('5901', 'Alagappa chettair government college og engineering and technology(autonomous),karaikudi', 'Nithya', 'kuttaiyur ', 'Mettupalayam', 'Coimbatore ', '641301', '22304534', 'nithyanarayanan10@gmail.com', 'www.nss.com', '7358800303', '1534678967', 'indian', 0, 1, 10, 'mettupalayam', 2, 1, 'Optional', 1000, 2000, 1, 'Rental', 'Veg', 2000, 500, 50, 10000, 1000, 10000, 1, 'Rental', 'Veg', 2000, 1000, 50, 10000, 1000, 10000),
('7777', 'xycffg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district`) VALUES
('Ariyalur'),
('Chennai'),
('Coimbatore '),
('Cuddalore'),
('Dharmapuri'),
('Dindigul'),
('Erode'),
('Kancheepuram'),
('Kanyakumari'),
('Karur'),
('Krishnagiri '),
('Madurai'),
('Nagapattinam '),
('Namakkal'),
('Perambalur'),
('Pudukottai'),
('Ramanathapuram '),
('Salem '),
('Sivagangai '),
('Thanjavur'),
('The Nilgiris '),
('Theni'),
('Thirunelveli'),
('Thiruvallur '),
('Thiruvannamalai '),
('Thiruvarur'),
('Tiruppur'),
('Trichirappalli '),
('Tuticorin'),
('Vellore '),
('Viluppuram'),
('Virudhunagar');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `c_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `b_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `a_no` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `catogory` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nativity` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `community` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caste_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_occupation` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_tn` tinyint(1) DEFAULT NULL,
  `qualifying_exam` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_board` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_of_passing` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_reg_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_group` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eleventh_pass` tinyint(1) DEFAULT NULL,
  `physics_m` int(11) DEFAULT NULL,
  `physics_t` int(11) DEFAULT NULL,
  `chemistry_m` int(11) DEFAULT NULL,
  `chemistry_t` int(11) DEFAULT NULL,
  `maths_m` int(11) DEFAULT NULL,
  `maths_t` int(11) DEFAULT NULL,
  `optional_m` int(11) DEFAULT NULL,
  `optional_t` int(11) DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  `aicte_tfw` tinyint(1) DEFAULT NULL,
  `pms` tinyint(1) DEFAULT NULL,
  `fg` tinyint(1) DEFAULT NULL,
  `fg_district` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Availed_fg` tinyint(1) DEFAULT NULL,
  `approved` int(11) DEFAULT 0,
  `reason` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`c_code`, `b_code`, `a_no`, `catogory`, `name`, `dob`, `gender`, `mobile`, `email`, `nationality`, `nativity`, `religion`, `community`, `caste_name`, `parent_occupation`, `state`, `district`, `hsc_tn`, `qualifying_exam`, `name_of_board`, `year_of_passing`, `hsc_reg_no`, `hsc_group`, `eleventh_pass`, `physics_m`, `physics_t`, `chemistry_m`, `chemistry_t`, `maths_m`, `maths_t`, `optional_m`, `optional_t`, `annual_income`, `aicte_tfw`, `pms`, `fg`, `fg_district`, `Availed_fg`, `approved`, `reason`) VALUES
('1234', 'AE', '101200', 'MIN', 'ponkumar', '2020-02-13', 'MALE', '7845120327', 'baskar@gmail.com', 'OTHERS', 'TN', 'Christian', 'OC', '', 'Professional', 'ARUNACHAL PRADESH', 'ERODE', 0, 'HSC', 'Madhya Pradesh-Madhya Pradesh Board of Secondary Education', '2004', '785689', 'General', 0, 1, 300, 1, 200, 1, 200, 1, 300, 0, NULL, NULL, NULL, '', NULL, 1, ''),
('5009', 'FT', '111131', 'GOVERNMENT', 'Navitha.N', '2000-11-07', 'FEMALE', '8838149515', 'navithanagaivanan@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Professional', 'TAMIL NADU', 'DHARMAPURI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '111124', 'General', 1, 98, 100, 97, 100, 96, 100, 93, 100, 1, 1, 1, 1, 'DHARMAPURI', 1, 0, ''),
('5009', 'CS', '111132', 'MANAGEMENT', 'Navitha.N', '2000-11-07', 'FEMALE', '9500904631', 'navithanagaivanan@gmail.com', 'INDIAN', 'TN', 'Hindu', 'OC', '', 'Agriculture', 'TAMIL NADU', 'DHARMAPURI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '161119', 'General', 1, 95, 100, 92, 100, 95, 100, 92, 100, 0, 0, 0, 0, '', 0, 0, ''),
('1113', 'IT', '117519', 'MANAGEMENT', 'shiva', '2000-04-17', 'FEMALE', '8189888981', 'shivu@gmail.com', 'SRILANKAN_REFUGEE', 'TN', 'Hindu', 'ST', '', 'Small Trade', 'DELHI', 'OTHERS', 0, 'OTHERS', 'Orissa-Orissa Council of Higher Secondary Education', '2017', '134256', 'General', 1, 139, 150, 105, 150, 99, 100, 99, 100, 0, 0, 0, 0, '', 0, 0, ''),
('1234', 'AE', '121212', 'MANAGEMENT', 'ponkumar', '2020-02-19', 'FEMALE', '8989898989', 'kmkishoth1999@gmail.com', 'SRILANKAN_REFUGEE', 'TN', 'Christian', 'BCM', '', 'Business', 'TAMIL NADU', 'MADURAI', 1, 'ISCE', 'Kerala-Kerala Board of Higher Secondary Examination', '2005', '098098', 'General', 0, 2, 100, 2, 100, 1, 150, 1, 150, 0, NULL, NULL, NULL, '', NULL, 1, ''),
('1234', 'AE', '121219', 'MANAGEMENT', 'qqq', '2020-02-06', 'FEMALE', '9090909090', 'kmkishoth1999@gmail.com', 'INDIAN', 'TN', 'Christian', 'BCM', '', 'Professional', 'TAMIL NADU', 'NAMAKKAL', 1, 'ISCE', 'Maharashtra-Maharashtra State Board of Secondary and Higher Secondary Education', '2006', '898981', 'General', 1, 1, 100, 0, 100, 1, 200, 1, 100, 0, NULL, NULL, NULL, '', NULL, 1, ''),
('1234', 'AA', '123413', 'GOVERNMENT', '121', '2020-02-05', 'TRANSGENDER', '1111111111', 'ah@ucuju.com', 'SRILANKAN_REFUGEE', 'TN', 'Sikhism', 'OC', '', 'Industry', 'JHARKHAND', 'NAMAKKAL', 0, 'HSC', 'Nagaland-Nagaland Board of School Education', '2003', '111116', 'General', 0, 1, 100, 1, 100, 1, 100, 1, 150, 1, 0, 1, 1, 'SIVAGANGAI', 1, 2, 'pgi'),
('1234', 'AA', '123419', 'GOVERNMENT', 'ugasgku', '2020-02-01', 'MALE', '1212121212', 'kuas@hfh.com', 'SRILANKAN_REFUGEE', 'TN', 'Hindu', '', '', 'Private Organization', 'JAMMU AND KASHMIR', 'SALEM', 0, 'SSCE/CBSE', 'Madhya Pradesh-Madhya Pradesh Board of Secondary Education', '2005', '131212', 'Vocational', 1, 1, 100, 1, 100, 1, 150, 1, 100, 1, 1, 1, 0, 'PERAMBALUR', 1, 1, ''),
('1234', 'AA', '123450', 'GOVERNMENT', 'xyz', '2020-02-02', 'MALE', '1234567890', '123@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', 'Jangam-139', 'Agriculture', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '123456', 'General', 1, 200, 200, 200, 200, 200, 200, 200, 200, 1, 0, 0, 1, 'KRISHNAGIRI', 1, 1, 'Ok'),
('1234', 'AIE', '123456', 'MANAGEMENT', 'baskar', '2020-02-12', 'MALE', '9789644948', 'bskrslvrj@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', 'Kammalar or Viswakarma-350', 'State Govt.', 'TAMIL NADU', 'SALEM', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '313421', 'General', 1, 55, 100, 100, 100, 55, 150, 398, 400, 1, 1, 1, 1, 'SALEM', 1, 0, ''),
('1234', 'CE', '123457', 'GOVERNMENT', 'fnjsdf', '1987-12-09', 'MALE', '9083392841', 'kmkishoth1999@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Agriculture', 'TAMIL NADU', 'PERAMBALUR', 1, 'HSC', 'All-India Board-Central Board of Secondary Education', '2019', '908762', 'General', 1, 187, 200, 186, 200, 189, 200, 187, 200, 1, 1, 1, 0, 'PERAMBALUR', 1, 1, ''),
('1234', 'AA', '124352', 'GOVERNMENT', 'yfcas', '2020-02-07', 'FEMALE', '1312909090', 'vksak@jyc.com', 'SRILANKAN_REFUGEE', 'TN', 'Hindu', 'SC', 'Adi-Dravida-41', 'Industry', 'HIMACHAL PRADESH', 'MADURAI', 0, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2019', '787878', 'General', 0, 1, 100, 1, 100, 1, 150, 1, 150, 3, 0, 1, 0, 'ARIYALUR', 1, 1, ''),
('1234', 'AA', '124353', 'GOVERNMENT', 'kuvx', '2020-02-12', 'TRANSGENDER', '3242342436', 'syyjf@jvca.com', 'OTHERS', 'TN', 'Christian', 'OC', 'Others-539', 'Professional', 'JHARKHAND', 'PERAMBALUR', 0, 'HSC', 'Manipur-Manipur Council of Higher Secondary Education', '2003', '898989', 'General', 0, 1, 150, 1, 100, 1, 100, 1, 100, 1, 0, 0, 1, 'RAMANATHAPURAM', 0, 1, '                        '),
('2006', 'RP', '154781', 'MANAGEMENT', 'pojibg', '2001-02-21', 'MALE', '1544158454', 'pojbjibm@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'State Govt.', 'TAMIL NADU', 'NAMAKKAL', 1, 'HSC', 'Meghalaya-Meghalaya Board of School Education', '2007', '123542', 'General', 1, 154, 200, 155, 200, 167, 200, 133, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1126', 'AI', '171107', 'MANAGEMENT', 'VARUN S', '1993-10-16', 'MALE', '9765432598', 'varuns16@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Business', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2010', '675321', 'General', 1, 197, 200, 200, 200, 200, 200, 198, 200, 0, 0, 0, 0, '', 0, 0, ''),
('5901', 'AR', '171113', 'GOVERNMENT', 'nithu', '1999-11-10', 'FEMALE', '8248582522', 'nithu@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Others', 'TAMIL NADU', 'COIMBATORE', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '133356', 'General', 1, 180, 200, 170, 200, 185, 200, 189, 200, 1, 1, 0, 1, 'COIMBATORE', 0, 0, ''),
('1234', 'AA', '171115', 'GOVERNMENT', 'Tamiselvan', '2000-05-17', 'MALE', '9626239495', 'ah@ucuju.com', 'SRILANKAN_REFUGEE', 'TN', 'Hindu', 'BC', '', 'Central Govt.', 'JHARKHAND', 'PUDUKOTTAI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '568956', 'General', 1, 192, 200, 178, 200, 186, 200, 199, 200, 1, 0, 0, 0, 'SIVAGANGAI', 0, 1, ''),
('3465', 'AU', '171130', 'GOVERNMENT', 'mubashira', '2020-02-10', 'FEMALE', '7373858837', 'munbghgty@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BCM', '', 'Small Trade', 'HIMACHAL PRADESH', 'PUDUKOTTAI', 1, 'HSC', 'Nagaland-Nagaland Board of School Education', '2005', '171122', 'General', 1, 190, 200, 123, 150, 150, 150, 100, 100, 1, 1, 0, 1, 'SIVAGANGAI', 1, 0, ''),
('5008', 'AI', '171134', 'LAP', 'porkodi.D', '2000-05-23', 'FEMALE', '7094228391', 'porkodi1011@gmail.com', 'INDIAN', 'TN', 'Hindu', 'SC', '', 'Agriculture', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2016', '523891', 'General', 1, 193, 200, 178, 200, 186, 200, 83, 100, 0, 0, 0, 0, '', 0, 0, ''),
('2006', 'PT', '171137', 'MANAGEMENT', 'vasanth', '2000-02-13', 'MALE', '9954787845', 'ponkumar21@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Others', 'TAMIL NADU', 'KARUR', 1, 'HSC', 'Others-Other Boards if any', '2012', '752489', 'General', 1, 167, 200, 174, 200, 182, 200, 114, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1321', 'CS', '171140', 'GOVERNMENT', 'prakash m', '2000-12-21', 'MALE', '8072202481', 'prakashm21600@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Agriculture', 'TAMIL NADU', 'THIRUVANNAMALAI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '386994', 'General', 1, 186, 200, 182, 200, 196, 200, 200, 200, 1, 0, 0, 1, 'THIRUVANNAMALAI', 1, 0, ''),
('2343', 'CH', '171141', 'MANAGEMENT', 'Vasanth kumar.A', '1344-11-22', 'MALE', '9080706050', 'fuckoff@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Business', 'TAMIL NADU', 'DHARMAPURI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '417555', 'General', 1, 187, 200, 178, 200, 187, 200, 177, 200, 0, 0, 0, 0, '', 0, 0, ''),
('5012', 'MS', '171142', 'MANAGEMENT', 'DR.A.RAJA', '1985-11-07', 'MALE', '8656965869', 'DUMMY@GMAIL.COM', 'INDIAN', 'TN', 'Christian', 'SC', '', 'Agriculture', 'TAMIL NADU', 'DHARMAPURI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2015', '659885', 'General', 1, 200, 200, 198, 200, 200, 200, 200, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1101', 'FT', '171143', 'MANAGEMENT', 'PRAVEEN.B', '2000-07-06', 'FEMALE', '9488366672', 'praveensan562@gmail.com', 'INDIAN', 'TN', 'Hindu', 'OC', '', 'Others', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '234567', 'General', 1, 198, 200, 190, 200, 198, 200, 199, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1112', 'FT', '171144', 'MANAGEMENT', 'Santhi S', '2000-04-10', 'FEMALE', '7825963185', 'santhisa1004@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Others', 'TAMIL NADU', 'VELLORE', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '418785', 'General', 1, 195, 200, 193, 200, 181, 200, 185, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1107', 'CR', '171146', 'MANAGEMENT', 'V.SOWNDARYA', '2000-06-28', 'FEMALE', '8940008143', 'sowndaryavinayak@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Agriculture', 'TAMIL NADU', 'DHARMAPURI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '438212', 'General', 1, 189, 200, 188, 200, 194, 200, 182, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1110', 'AP', '171149', 'GOVERNMENT', 'suguna', '2000-04-17', 'FEMALE', '6380452088', 'sugunasugu174@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Agriculture', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '172345', 'General', 1, 190, 200, 192, 200, 189, 200, 187, 200, 1, 1, 0, 0, 'KRISHNAGIRI', 1, 0, ''),
('1113', 'FT', '171152', 'MANAGEMENT', 'prem shiva', '1999-03-02', 'TRANSGENDER', '9080392821', 'ezhi@gmail.com', 'OTHERS', 'OTHERS', 'Hindu', 'OC', '', 'Others', 'JAMMU AND KASHMIR', 'OTHERS', 1, 'HSC', 'Gujarat-Gujarat Secondary & Higher Education Board', '2016', '324387', 'General', 1, 170, 200, 150, 200, 175, 200, 169, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1114', 'RP', '171153', 'MANAGEMENT', 'nithyasri.V', '1990-02-01', 'FEMALE', '9342561174', 'nithuma123@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BCM', '', 'Agriculture', 'TAMIL NADU', 'KANCHIPURAM', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2015', '600401', 'General', 1, 198, 200, 196, 200, 199, 200, 189, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1101', 'FT', '171177', 'MANAGEMENT', 'santhi S', '2000-04-23', 'FEMALE', '9751234590', 'santhi@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Industry', 'TAMIL NADU', 'THENI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '223456', 'General', 1, 178, 200, 189, 200, 198, 200, 190, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1114', 'RP', '171433', 'GOVERNMENT', 'priya.D', '1998-12-09', 'FEMALE', '9987645321', 'priya@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Private Organization', 'TAMIL NADU', 'SALEM', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2014', '198432', 'General', 1, 196, 200, 189, 200, 195, 200, 199, 200, 1, 1, 0, 0, 'SALEM', 0, 0, ''),
('5012', 'MS', '175622', 'GOVERNMENT', 'ROCKET.A', '1968-05-08', 'MALE', '8623596235', 'GOOGLE@GMAIL.COM', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Agriculture', 'TAMIL NADU', 'DHARMAPURI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '1993', '969856', 'General', 1, 198, 200, 200, 200, 200, 200, 200, 200, 4, 0, 0, 1, 'DHARMAPURI', 1, 0, ''),
('1121', 'AI', '181121', 'GOVERNMENT', 'kalai', '1997-06-16', 'MALE', '9344979970', 'CACGHEKALAI@GMAIL.COM', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Agriculture', 'TAMIL NADU', 'CHENNAI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2018', '187212', 'General', 1, 198, 200, 198, 200, 198, 200, 198, 200, 1, 1, 1, 1, 'VELLORE', 1, 0, ''),
('1121', 'AI', '181132', 'MANAGEMENT', 'LAKDFK', '0003-06-02', 'MALE', '9344969440', 'CHK@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Others', 'GOA', 'THANJAVUR', 1, 'HSC', 'Manipur-Manipur Council of Higher Secondary Education', '2004', '545343', 'General', 1, 198, 200, 198, 200, 198, 200, 198, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1234', 'EE', '181190', 'GOVERNMENT', 'ponkumar', '2020-02-12', 'MALE', '7654323456', 'pon@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', 'Vania Chettiar-499', 'Agriculture', 'TAMIL NADU', 'THIRUNELVELI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2018', '234560', 'General', 1, 124, 150, 124, 150, 76, 150, 123, 150, 1, 1, 1, 1, 'COIMBATORE', 1, 1, ''),
('1234', 'AU', '181192', 'GOVERNMENT', 'chennaiyan', '2020-02-19', 'MALE', '6473727569', 'chfjj@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', 'Yadhava-520', 'Others', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2009', '563636', 'General', 1, 12, 100, 34, 100, 45, 100, 56, 100, 1, 1, 1, 0, 'MADURAI', 0, 1, ''),
('1126', 'AI', '181301', 'MANAGEMENT', 'KUMARESAN S', '1991-05-05', 'MALE', '9865437323', 'resh07@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Business', 'TAMIL NADU', 'VELLORE', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2007', '645321', 'General', 1, 196, 200, 195, 200, 200, 200, 197, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1116', 'AI', '181302', 'MANAGEMENT', 'Baskar', '2000-07-24', 'MALE', '7904581963', 'annamalai123@gamil.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Agriculture', 'TAMIL NADU', 'DINDIGUL', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2018', '549605', 'General', 1, 184, 200, 185, 200, 170, 200, 185, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1122', 'CS', '181905', 'MANAGEMENT', 'Vasanth P', '1999-03-02', 'MALE', '8189885740', 'sivaatar1999@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Central Govt.', 'TAMIL NADU', 'CHENNAI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2016', '654321', 'General', 1, 123, 200, 145, 200, 188, 200, 182, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1124', 'CS', '181907', 'MANAGEMENT', 'SUJAI J', '1999-07-08', 'MALE', '9790154738', 'j.sujai1999@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Agriculture', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2016', '185280', 'General', 1, 119, 200, 140, 200, 99, 200, 190, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1106', 'CS', '199001', 'MANAGEMENT', 'sakthi', '2000-01-01', 'MALE', '9999911223', 'sakthic@gmail.com', 'INDIAN', 'OTHERS', 'Hindu', 'OC', '', 'Agriculture', 'Telangana', 'OTHERS', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2016', '171145', 'General', 1, 198, 200, 198, 200, 200, 200, 199, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1106', 'CS', '199002', 'GOVERNMENT', 'babu', '2000-02-02', 'MALE', '9999911222', 'sakthi@gamil.com', 'INDIAN', 'OTHERS', 'Hindu', 'OC', '', 'Agriculture', 'Telangana', 'OTHERS', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2016', '440417', 'General', 1, 198, 200, 198, 200, 188, 200, 199, 200, 1, 0, 0, 0, 'KRISHNAGIRI', 0, 0, ''),
('1118', 'CS', '200719', 'GOVERNMENT', 'chennaiyan', '1999-02-02', 'MALE', '8765435678', 'gpt123@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'State Govt.', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2016', '165788', 'General', 1, 160, 200, 120, 200, 80, 200, 130, 200, 1, 1, 0, 1, 'KRISHNAGIRI', 1, 0, ''),
('1126', 'CS', '234567', 'MANAGEMENT', 'dharani', '2020-02-06', 'MALE', '9789644948', 'baba@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Professional', 'TAMIL NADU', 'SALEM', 1, 'SSCE/CBSE', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2020', '456789', 'General', 1, 156, 200, 134, 200, 123, 200, 143, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1112', 'FT', '321338', 'GOVERNMENT', 'girija p', '1999-05-17', 'FEMALE', '9867565440', 'sdgsdhd@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Agriculture', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '487654', 'General', 1, 190, 200, 192, 200, 190, 200, 160, 200, 1, 1, 0, 1, 'KRISHNAGIRI', 1, 0, ''),
('1234', 'AE', '324132', 'MANAGEMENT', 'ljvujcas', '2020-02-05', 'TRANSGENDER', '5656565646', 'ah@ucuju.com', 'OTHERS', 'TN', 'Christian', 'OC', '', 'Business', 'ANDHRA PRADESH', 'CHENNAI', 1, 'HSC', 'All-India Board-Council for Indian School Certificate Examinations', '2019', '565980', 'Vocational', 1, 3, 150, 3, 150, 2, 100, 3, 150, 1, 0, 1, 0, 'PUDUKOTTAI', 0, 1, 'retegxj'),
('2001', 'EC', '324340', 'NRI', 'ponkumar', '2020-02-13', 'MALE', '9087654321', 'ajithdk121@gmail.com', 'SRILANKAN_REFUGEE', 'OTHERS', 'Christian', 'MBC/DNC', '', 'Professional', 'GUJARAT', 'NAMAKKAL', 1, 'SSCE/CBSE', 'Kerala-Kerala Board of Higher Secondary Examination', '2006', '876543', 'Vocational', 1, -1, 150, -1, 150, -1, 300, 1, 200, 0, NULL, NULL, NULL, '', NULL, 1, ''),
('2369', 'CS', '345678', 'GOVERNMENT', 'LAVS', '2002-05-06', 'FEMALE', '9742673456', 'janu@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Business', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '753256', 'General', 1, 179, 200, 198, 200, 189, 200, 199, 200, 1, 1, 1, 1, 'KRISHNAGIRI', 1, 0, ''),
('3464', 'CS', '412351', 'GOVERNMENT', 'trtsrytd', '2000-05-01', 'MALE', '8870495089', 'sdhsdagas@gmail.com', 'INDIAN', 'TN', 'Hindu', 'SC', '', 'Others', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '565647', 'General', 1, 134, 200, 165, 200, 178, 200, 190, 200, 2, 0, 1, 0, 'KRISHNAGIRI', 0, 0, ''),
('1126', 'CS', '432345', 'MANAGEMENT', 'kesavan', '1996-03-08', 'MALE', '2345678901', 'kesavan2000@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Agriculture', 'TAMIL NADU', 'SALEM', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2015', '345678', 'General', 1, 176, 200, 165, 200, 154, 200, 132, 200, 0, 0, 0, 0, '', 0, 0, ''),
('2369', 'CS', '453678', 'GOVERNMENT', 'janu', '2002-02-24', 'FEMALE', '9637315677', 'lavanyabaskaran@gmail.com', 'INDIAN', 'TN', 'Hindu', 'OC', '', 'Agriculture', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '171112', 'General', 1, 199, 200, 189, 200, 198, 200, 180, 200, 1, 0, 1, 0, 'KRISHNAGIRI', 0, 0, ''),
('1126', 'MN', '456098', 'GOVERNMENT', 'english', '2020-02-13', 'FEMALE', '6756453423', 'dfr@gmail.com', 'INDIAN', 'TN', 'Muslim', 'BCM', '', 'Industry', 'GUJARAT', 'RAMANATHAPURAM', 1, 'HSC', 'Mizoram-Mizoram Board of School Education', '2006', '654008', 'General', 1, 7, 200, 12, 200, 15, 200, 14, 200, 2, 1, 1, 1, 'KARUR', 1, 0, ''),
('4020', 'CS', '456543', 'GOVERNMENT', 'durgs', '2000-07-09', 'FEMALE', '1234567891', 'durgsvalentine14@mail.com', 'INDIAN', 'TN', 'Hindu', 'SC', '', 'Business', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '189234', 'General', 1, 189, 200, 197, 200, 156, 200, 178, 200, 1, 0, 1, 1, 'KRISHNAGIRI', 1, 0, ''),
('3021', 'AU', '456789', 'GOVERNMENT', 'yyy', '1986-01-01', 'FEMALE', '9876012345', 'vgs123@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Others', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '413816', 'General', 1, 150, 200, 100, 200, 100, 200, 100, 200, 1, 0, 0, 1, 'KRISHNAGIRI', 1, 0, ''),
('5017', 'CS', '545854', 'GOVERNMENT', 'tjudhtgj', '2020-06-10', 'MALE', '9944447012', 'vkietdue5ruher@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Professional', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '155425', 'General', 1, 5, 150, 4, 200, 8, 200, 78, 200, 1, 1, 1, 1, 'SALEM', 1, 0, ''),
('2615', 'CS', '566499', 'GOVERNMENT', ' lavanya', '2000-01-02', 'FEMALE', '9087657865', 'janucse@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Business', 'ANDHRA PRADESH', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '562266', 'General', 1, 197, 200, 198, 200, 199, 200, 199, 200, 1, 0, 0, 0, 'KRISHNAGIRI', 0, 0, ''),
('1234', 'AE', '632338', 'LAP', 'ponkumar', '2020-02-19', 'FEMALE', '6789765432', 'chfyr12@gmail.com', 'SRILANKAN_REFUGEE', 'TN', 'Christian', 'BC', 'Asthanthra Golla-525', 'Private Organization', 'DELHI', 'KANCHIPURAM', 0, 'SSCE/CBSE', 'Karnataka-Karnataka Board of the pre-University Education', '2011', '342567', 'General', 0, 123, 150, 145, 150, 134, 150, 132, 150, 1, 0, 0, 0, 'CUDDALORE', 0, 1, ''),
('1126', 'LE', '651230', 'LAP', 'baskar', '2020-02-13', 'MALE', '6757565463', 'abd@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Business', 'GOA', 'ERODE', 1, 'HSC', 'Orissa-Orissa Council of Higher Secondary Education', '2017', '789436', 'General', 1, 5, 200, 5, 100, 7, 200, 6, 200, 0, 0, 0, 0, '', 0, 0, ''),
('5010', 'AU', '654321', 'GOVERNMENT', 'padmapriya.m', '1999-07-01', 'FEMALE', '8765432106', 'priyamani07@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Agriculture', 'TAMIL NADU', 'CHENNAI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '654328', 'General', 1, 148, 200, 189, 200, 186, 200, 179, 200, 1, 1, 0, 0, 'CHENNAI', 1, 0, ''),
('2603', 'CS', '656666', 'GOVERNMENT', 'MR Y', '2000-07-10', 'MALE', '8089067873', 'weteu1000@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Agriculture', 'TAMIL NADU', 'KRISHNAGIRI', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '123425', 'General', 1, 181, 200, 192, 200, 178, 200, 122, 200, 1, 1, 0, 1, 'KRISHNAGIRI', 1, 0, ''),
('1126', 'CS', '656788', 'MANAGEMENT', 'tamilselvi', '2000-02-09', 'FEMALE', '7654324890', 'rthor8761@gmail.com', 'INDIAN', 'TN', 'Hindu', 'SC', '', 'Industry', 'TAMIL NADU', 'SALEM', 1, 'SSCE/CBSE', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2004', '897856', 'General', 1, 143, 200, 156, 200, 123, 200, 167, 200, 0, 0, 0, 0, '', 0, 0, ''),
('2343', 'CH', '675672', 'MANAGEMENT', '48585858', '1999-08-22', 'FEMALE', '9070503010', 'yamuna@gmail.com', 'INDIAN', 'TN', 'Hindu', 'OC', '', 'State Govt.', 'TAMIL NADU', 'VELLORE', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2018', '478932', 'General', 1, 199, 200, 189, 200, 197, 200, 199, 200, 0, 0, 0, 0, '', 0, 0, ''),
('1234', 'CE', '763712', 'MANAGEMENT', 'you', '2020-02-05', 'TRANSGENDER', '1234567890', 'fascgsvh@gmail.com', 'INDIAN', 'TN', 'Hindu', 'MBC/DNC', '', 'Industry', 'DAMAN AND DIU', 'KRISHNAGIRI', 1, 'HSC', 'Goa-Goa Board of Secondary & Higher Secondary Education', '1998', '654789', 'General', 1, 2, 200, 1, 200, 3, 200, 4, 200, 1, 1, 1, 1, 'KRISHNAGIRI', 1, 1, ''),
('5022', 'EC', '777777', 'GOVERNMENT', 'shtyys', '2000-02-24', 'MALE', '9566717171', 'kfjhhgfuY@GMAIL.COM', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'Central Govt.', 'MADHYA PRADESH', 'VIRUDHUNAGAR', 1, 'SSCE/CBSE', 'Madhya Pradesh-Madhya Pradesh Board of Secondary Education', '2017', '267596', 'General', 1, 144, 200, 134, 200, 145, 200, 21, 100, 1, 1, 0, 1, 'VIRUDHUNAGAR', 1, 0, ''),
('5901', 'AR', '777778', 'GOVERNMENT', 'ammuu', '2000-12-03', 'FEMALE', '5678912345', 'ammuu@gmail.com', 'INDIAN', 'TN', 'Hindu', 'BC', '', 'State Govt.', 'TAMIL NADU', 'COIMBATORE', 1, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '456123', 'General', 1, 190, 200, 179, 200, 195, 200, 189, 200, 2, 1, 0, 0, 'COIMBATORE', 0, 0, ''),
('2001', 'CS', '784369', 'GOVERNMENT', 'Baskar S', '2020-02-07', 'TRANSGENDER', '7845125874', 'kmkishoth1999@gmail.com', 'SRILANKAN_REFUGEE', 'TN', 'Christian', 'BCM', '', 'Professional', 'HIMACHAL PRADESH', 'NAMAKKAL', 0, 'ISCE', 'All-India Board-Council for Indian School Certificate Examinations', '2017', '784512', 'General', 1, 78, 100, 78, 150, 78, 150, 78, 150, 1, 0, 0, 0, 'NAGAPATTINAM', 1, 1, ''),
('1516', 'AI', '789051', 'LAP', ' fdbdfvbfdv', '4324-04-09', 'MALE', '9087654321', 'hrbhfbgfrb@gmail.com', 'INDIAN', 'TN', 'Christian', 'BC', '', 'Business', 'ANDHRA PRADESH', 'CHENNAI', 1, 'HSC', 'Maharashtra-Maharashtra State Board of Secondary and Higher Secondary Education', '2007', '675656', 'General', 1, 78, 100, 66, 100, 57, 100, 78, 100, 0, 0, 0, 0, '', 0, 0, ''),
('2005', 'CS', '888888', 'GOVERNMENT', 'whtyuu', '2000-09-09', 'MALE', '8778596434', 'agathiyan.chen2000@gmail.com', 'INDIAN', 'TN', 'Hindu', 'SC', '', 'Others', 'TAMIL NADU', 'KRISHNAGIRI', 0, 'HSC', 'Tamilnadu-Tamilnadu Board of Higher Secondary Education', '2017', '455656', 'General', 1, 200, 200, 200, 200, 200, 200, 200, 200, 1, 0, 0, 0, 'KRISHNAGIRI', 0, 0, ''),
('1234', 'AE', '897390', 'GOVERNMENT', '324135', '2020-02-06', 'FEMALE', '6767676767', 'ah@ucuju.com', 'OTHERS', 'OTHERS', 'Hindu', 'OC', 'Others-539', 'State Govt.', 'Others', 'CHENNAI', 1, 'HSC', 'All-India Board-Central Board of Secondary Education', '2018', '898980', 'General', 1, 1, 100, 1, 150, 1, 100, 2, 150, 1, 0, 0, 0, 'CHENNAI', 0, 1, ''),
('1234', 'AA', '909090', 'MANAGEMENT', 'j', '2020-02-12', 'MALE', '1212121212', 'ah@ucuju.com', 'OTHERS', 'TN', 'Hindu', 'BC', 'C.S.I. formerly S.I.U.C.-308', 'State Govt.', 'Others', 'CHENNAI', 0, 'SSCE/CBSE', 'Madhya Pradesh-Madhya Pradesh Board of Secondary Education', '2004', '121212', 'General', 1, 85, 400, 3, 300, 1, 300, 3, 300, 0, NULL, NULL, NULL, '', NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `taluks`
--

CREATE TABLE `taluks` (
  `taluk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taluks`
--

INSERT INTO `taluks` (`taluk`) VALUES
('adaladi'),
('Agasteeswaram'),
('Alandur'),
('Alangudi'),
('Alangulam'),
('Alanthur'),
('Ambasamuthiram'),
('Ambathur'),
('Ambattur'),
('Ambur'),
('Aminjikarai'),
('Andipatti'),
('Arakonam'),
('Arani'),
('Aranthangi'),
('Aravakurichi'),
('Arcot'),
('Ariyalur'),
('Arupukottai'),
('Attur(Dindigul)'),
('Attur(Salem)'),
('Avadaiyarkoil'),
('Avinashi'),
('Ayanavaram'),
('Bhavani'),
('Bodinayakanur'),
('Chengalpattu'),
('Chengam'),
('Cheyyar'),
('Cheyyur'),
('Chidambaram'),
('Cholinganallur'),
('Coimbatore(North)'),
('Coimbatore(South)'),
('Coonoor'),
('Cuddalore'),
('Denkanikottai'),
('Devakottai'),
('Dharapuram'),
('Dharmapuri'),
('Dindigul'),
('Edapady'),
('Egmore'),
('Erode'),
('Ettayapuram'),
('Gandarvakottai'),
('Gangavalli'),
('Gingee'),
('Gobichettipalayam'),
('Gudalur'),
('Gudiyatham'),
('Guindy'),
('Gummidipoondi'),
('Harur'),
('Hosur'),
('Ilayankudi'),
('Illuppur'),
('Kaaikudi'),
('Kadavur'),
('Kalkulam'),
('Kallakurichi'),
('Kamuthi'),
('Kancheepuram'),
('Kangayam'),
('Kariapattai'),
('Karur'),
('Katpadi'),
('Kattumannarkoil'),
('Kilvelur'),
('Kodaikanal'),
('Kotagiri'),
('Kovilpattai'),
('Krishnagiri'),
('Krishnarayapuram'),
('Kudavasal'),
('Kulathur'),
('Kulithalai'),
('Kumbakonam'),
('Kundah'),
('Kunnam'),
('Kurinjipadi'),
('Kutthalam'),
('Lalgudi'),
('Madathukulam'),
('Madhavaram(Madhavaram)'),
('Madhavaram(Thiruvallur)'),
('Madhuranthangam'),
('Madurai(North)'),
('Madurai(South)'),
('Maduravoyal'),
('Mambalam'),
('Manachanallur'),
('Manamadurai'),
('Manamelkudi'),
('Manapparai'),
('Mannargudi'),
('Mayiladuthurai'),
('Melur'),
('Mettupalayam'),
('Mettur'),
('Mudukulathur'),
('Musiri'),
('Mylapore'),
('Nagapattinam'),
('Namakkal'),
('Nanguneri'),
('Nannilam'),
('Natham'),
('Needamanglam'),
('Nilakottai'),
('Oddanchatram'),
('Omalur'),
('Orathanadu'),
('Ottapidaram'),
('Palakcode'),
('Palani'),
('Palayamkottai'),
('Palladam'),
('Pallipattu'),
('Panruti'),
('Panthalur'),
('Papanasam'),
('Pappireddipatti'),
('Paramakudi'),
('Paramathi Velur'),
('Pattukkottai'),
('Pennagaram'),
('Peraiyur'),
('Perambalur'),
('Perambur'),
('Peravurani'),
('Periyakulam'),
('Perundurai'),
('Pochampalli'),
('Polllachi'),
('Polur'),
('Ponneri'),
('Poonamallee'),
('Pudukkottai'),
('Purasawalkam'),
('Radhapuram'),
('Rajapalayam'),
('Ramanathapuram'),
('Rameswaram'),
('Rasipuram'),
('Salem'),
('Sangagiri'),
('Sankarankovil'),
('Sankarapuram'),
('Sathankulam'),
('Sathur'),
('Sathyamangalam'),
('Sendurai'),
('Shenkottai'),
('Sholinganallur'),
('Sirkali'),
('Sivaganga'),
('Sivagiri'),
('Sivakasi'),
('Sriperumbudur'),
('Srirangam'),
('Srivaikundam'),
('Srivilliputhur'),
('Sulur'),
('Thambaram'),
('Thandarampattu'),
('Thanjavur'),
('Tharangambadi'),
('Theni'),
('Thenkasi'),
('Thindivanam'),
('Thiruchengode'),
('Thirukkuvalai'),
('Thirukoilur'),
('Thirumangalam'),
('Thirumayam'),
('Thiruthuraipoondi'),
('Thiruvaiyaru'),
('Thiruvarur'),
('Thiruverumpur'),
('Thiruvidaimarudur'),
('Thiruvottiyur'),
('Thoothukkudi'),
('Thottiyam'),
('Thovalai'),
('Thuraiyur'),
('Tiruchendur'),
('Tiruchirapalli'),
('Tiruchuli'),
('Tirukalukundram'),
('Tirunelveli'),
('Tirupathur'),
('Tirupattur'),
('Tiruppur North'),
('Tiruppur South'),
('Tiruttani'),
('Tiruvadanai'),
('Tiruvallur'),
('Tiruvannamalai'),
('Titakudi'),
('Tondiarpet'),
('Udayarpalayam'),
('Udhagamandalam'),
('Udumalpet'),
('Ulundurpet'),
('Usilampatti'),
('Uthamapalayam'),
('Uthangarai'),
('Uthiramerur'),
('Uthukkotai'),
('Uthukuli'),
('Vadipatti'),
('Valangaiman'),
('Valapady'),
('Valparai'),
('Vandavasi'),
('Vaniyampadi'),
('Vanur'),
('Vedaranyam'),
('Vedasandur'),
('Veerakeralamputhur'),
('Velachery'),
('Vellore'),
('Veppanthattai'),
('Vilathikulam'),
('Vilavancode'),
('Villupuram'),
('Virudhunagar'),
('Vridachalam'),
('Wallajah'),
('Yercaud');

-- --------------------------------------------------------

--
-- Table structure for table `time_limit`
--

CREATE TABLE `time_limit` (
  `name` varchar(30) NOT NULL,
  `last_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_limit`
--

INSERT INTO `time_limit` (`name`, `last_date`) VALUES
('first_year_submission', '2020-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--
-- Error reading structure for table db_2020.user_login: #1932 - Table 'db_2020.user_login' doesn't exist in engine
-- Error reading data for table db_2020.user_login: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_2020`.`user_login`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch_info`
--
ALTER TABLE `branch_info`
  ADD PRIMARY KEY (`c_code`,`b_code`);

--
-- Indexes for table `college_info`
--
ALTER TABLE `college_info`
  ADD PRIMARY KEY (`c_code`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`a_no`),
  ADD UNIQUE KEY `a_no` (`a_no`),
  ADD UNIQUE KEY `hsc_reg_no` (`hsc_reg_no`);

--
-- Indexes for table `taluks`
--
ALTER TABLE `taluks`
  ADD PRIMARY KEY (`taluk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
