-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 29, 2019 at 03:43 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment`
--

CREATE TABLE `tbl_assignment` (
  `assignment_id` int(11) NOT NULL,
  `assignment_title` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `assignment_description` text NOT NULL,
  `assignment_attachment` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `assignment_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assignment`
--

INSERT INTO `tbl_assignment` (`assignment_id`, `assignment_title`, `branch_id`, `course_id`, `subject_id`, `assignment_description`, `assignment_attachment`, `is_deleted`, `faculty_id`, `assignment_created_date`) VALUES
(1, 'oops_assignment', 4, 1, 4, 'this is final assignment', '38903b04d50b98038cb94a846587f34c.png', 0, 30, '2018-06-17 00:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(30) NOT NULL,
  `branch_state` varchar(30) NOT NULL,
  `branch_city` varchar(30) NOT NULL,
  `branch_address` text NOT NULL,
  `branch_pincode` int(11) NOT NULL,
  `branch_establish_date` varchar(15) NOT NULL,
  `branch_contact` bigint(12) NOT NULL,
  `branch_email` varchar(50) NOT NULL,
  `branch_image` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `branch_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `map_api` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_state`, `branch_city`, `branch_address`, `branch_pincode`, `branch_establish_date`, `branch_contact`, `branch_email`, `branch_image`, `is_deleted`, `branch_created_date`, `map_api`) VALUES
(4, 'Head_Branch', 'Gujarat', 'Surat', '11,ambanagar,near sosio,circle,udhna.', 395010, '04/25/2010', 9890564567, 'info_udhna_branch@academy.com', '1235502_AR09_HCP_IIM_0033.jpg', 0, '2018-06-13 09:21:17', 'ChIJMRRI7_RN4DsRgd13t5LewJc'),
(5, 'baroda_branch', 'Gujarat', 'Bharuch', '65,trade building,5th floor,near raju chawala', 394312, '02/08/2011', 7890890900, 'info_baroda_branch@academy.com', 'school_building8.jpg', 0, '2018-06-13 09:21:26', 'ChIJOcDvifHH5zsRTonFxaTO_Wg'),
(6, 'bharuch_branch', 'Gujarat', 'Bharuch', '1011,maliba society,near mg road', 394221, '04/06/2012', 9890564567, 'info_bharuch_branch@academy.com', '3d-elevation-500x500.jpg', 0, '2018-06-13 09:21:32', 'ChIJEVM8DO5N4DsRJl_yzfHi1Hs'),
(7, 'ahmedabad_branch', 'Gujarat', 'Surat', '12345,near gandhi road,opp daiict,beside TCS', 395010, '06/11/2013', 9890564567, 'info_ahmedabad_branch@gmail.com', 'school-pic.jpg', 0, '2018-06-13 09:21:40', 'ChIJOcDvifHH5zsRTonFxaTO_Wg'),
(8, 'jamnagar_branch', 'Gujarat', 'Jamnagar', '1245,near amul dairy road', 123456, '05/13/2013', 9890564567, 'info_jamnagar_branch@gmail.com', 'mercedes-benz-pune_011715031745.jpg', 0, '2018-06-13 09:29:06', 'ChIJEVM8DO5N4DsRJl_yzfHi1Hs'),
(9, 'valsad_branch', 'Gujarat', 'Valsad', '12345,opp vr mall,anjana', 12458, '06/01/2016', 978589869, 'info_valsad_branch@academy.com', 'g8.jpg', 0, '2018-06-13 09:29:13', 'ChIJEVM8DO5N4DsRJl_yzfHi1Hs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_duration` int(11) NOT NULL,
  `course_duration_type` varchar(10) NOT NULL,
  `course_des` text NOT NULL,
  `course_fee` double NOT NULL,
  `course_display_pic` text NOT NULL,
  `course_cover_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_duration`, `course_duration_type`, `course_des`, `course_fee`, `course_display_pic`, `course_cover_pic`) VALUES
(1, 'Bsc.IT', 3, 'year', 'A Bachelor of Science in Information Technology, (abbreviated BSIT or B.Sc IT), is a Bachelor\'s degree awarded for an undergraduate course or program in the Information technology field. The degree is normally required in order to work in the Information technology industry.\r\nA Bachelor of Science in Information Technology degree program typically takes three to four years depending on the country. This degree is primarily focused on subjects such as software, databases, and networking. In general, computer science degrees tend to focus on the mathematical and theoretical foundations of computing rather than emphasizing specific technologies. The degree is a Bachelor of Science degree with institutions conferring degrees in the fields of information technology and related fields. This degree is awarded for completing a program of study in the field of software development, software testing, software engineering, web design, databases, programming, computer networking and computer systems.', 52000, 'img31.jpg', 'forums1.jpg'),
(2, 'Msc.IT', 5, 'year', 'A Master of Science in Information Technology (abbreviated M.Sc. IT, MSc IT or MSIT) is a type of postgraduate academic master\'s degree usually offered in a University\'s College of Business and in the recent years in integrated Information Science & Technology colleges. The MSIT degree is designed for those managing information technology, especially the information systems development process. The MSIT degree is functionally equivalent to a Master of Information Systems Management, which is one of several specialized master\'s degree programs recognized by the Association to Advance Collegiate Schools of Business (AACSB). MCA is a three year professional master\'s degree in the field of computer applications, awarded in India.[1] The MCA program is designed for students with variety of undergraduate backgrounds, such as commerce and science, focusing in the field of IT.', 110000, 'courses-img5.jpg', 'course-progress.jpg'),
(3, 'BCA', 3, 'year', 'Bachelor of Computer Applications is a three-year undergraduate degree course in the field of computer applications/computer science.After BCA the students can do further studies as MCA master in computer application.It is a common degree for CS/IT in Indian universities and is an alternative to the engineering counterpart, BE/BTech in Computer Science/IT which takes 4 years. It is a technical degree that prepares students for a career in the field of computer applications and software development.', 45000, 'courses-img6.jpg', 'ourTeacher-banner.jpg'),
(4, 'MCA', 5, 'year', 'Master of Computer Applications (MCA)is a three-year (six semesters) professional Master\'s Degree in computer science awarded in India. The course was designed to meet the growing demand for qualified professionals in the field of Information Technology.', 85000, 'courses-img7.jpg', 'contact-us.jpg'),
(5, 'Artifical_Intellegence', 2, 'year', 'Artificial intelligence (AI) is an area of computer science that emphasizes the creation of intelligent machines that work and react like humans. Some of the activities computers with artificial intelligence are designed for include: Speech recognition.', 60000, 'price-img1.jpg', 'courses-banner.jpg'),
(6, 'Machine_Learning', 1, 'year', 'A definition. Machine learning. Machine learning is an application of artificial intelligence (AI) that provides systems the ability to automatically learn and improve from experience without being explicitly programmed.', 35000, 'price-img4.jpg', 'instructor-profile.jpg'),
(7, 'cloud_computing', 2, 'year', 'In cloud computing, the word \"cloud\" (also phrased as \"the cloud\") is used as a metaphor for \"the Internet,\" so the phrase cloud computing means a type of Internet-based computing, where different services —including servers, storage and applications — are delivered to an organization\'s computers and devices through .', 25000, 'price-img11.jpg', 'aboutUs-banner.jpg'),
(8, 'Computer_Graphics', 1, 'year', 'Computer graphics are pictures and films created using computers. Usually, the term refers to computer-generated image data created with help of specialized graphical hardware and software. It is a vast and recently developed area of computer science. The phrase was coined in 1960, by computer graphics researchers Verne Hudson and William Fetter of Boeing. It is often abbreviated as CG, though sometimes erroneously referred to as computer-generated imagery (CGI).\r\n\r\nSome topics in computer graphics include user interface design, sprite graphics, vector graphics, 3D modeling, shaders, GPU design, implicit surface visualization with ray tracing, and computer vision, among others. The overall methodology depends heavily on the underlying sciences of geometry, optics, and physics.\r\n\r\nComputer graphics is responsible for displaying art and image data effectively and meaningfully to the consumer. It is also used for processing image data received from the physical world. Computer graphics development has had a significant impact on many types of media and has revolutionized animation, movies, advertising, video games, and graphic design in general.', 15000, 'price-img2.jpg', 'register-bannerImg.jpg'),
(9, 'computer_animation', 6, 'month', 'Computer animation is the process used for generating animated images. The more general term computer-generated imagery (CGI) encompasses both static scenes and dynamic images, while computer animation only refers to the moving images. Modern computer animation usually uses 3D computer graphics, although 2D computer graphics are still used for stylistic, low bandwidth, and faster real-time renderings. Sometimes, the target of the animation is the computer itself, but sometimes film as well.', 5000, 'img8.jpg', 'img8.jpg'),
(10, 'mobile_technologies', 6, 'month', 'Mobile technology is the technology used for cellular communication. Mobile code-division multiple access (CDMA) technology has evolved rapidly over the past few years. ... Mobile computing by way of tablet computers are becoming more popular. Tablets are available on the 3G and 4G networks.', 3000, 'img4.jpg', 'img4.jpg'),
(11, 'basic_compter_learning(CCC)', 3, 'month', 'Course on Computer Concepts (CCC) Introduction: This course is designed to aim at imparting a basic level IT Literacy programme for the common man. ... This helps the small business communities, housewives, etc. to maintain their small accounts using the computers and enjoy in the world of Information Technology.', 2000, 'index2-sliderImg31.jpg', 'courses-banner1.jpg'),
(12, 'Tally', 3, 'month', 'Tally.ERP. Tally main product is its enterprise resource planning software called Tally.ERP 9 with single and multi-user licences. For large organisations with many branches, Tally.Server 9 is offered. The software handles accounting, inventory management, tax management, payroll etc.', 3000, 'img12.jpg', 'forums.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(250) NOT NULL,
  `event_color` varchar(50) NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_image` text NOT NULL,
  `event_des` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_name`, `event_color`, `event_start`, `event_end`, `event_image`, `event_des`, `is_deleted`) VALUES
(6, 'Talent Connect', '#FF0000', '2018-06-13 12:00:00', '2018-06-14 08:00:00', 'img21.jpg', 'Individuals looking to be hired, or to hire, gather at Talent Connect to understand the methods used for hiring practices from exprets.', 1),
(7, 'Talent Connect', '#0071c5', '2018-06-07 00:00:00', '2018-06-08 12:00:00', 'img32.jpg', 'Individuals looking to be hired, or to hire, gather at Talent Connect to understand the methods used for hiring practices from exprets.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 0),
(8, 'AIGA Conference', '#FF0000', '2018-06-11 00:00:00', '2018-06-14 00:00:00', 'img62.jpg', 'One of the biggest events of the year for creatives. Thousands of attendees gather to see industry leaders face off on round tables, and Q&As.', 0),
(9, 'B2B Marketing Forum', '#0071c5', '2018-06-25 00:00:00', '2018-06-30 12:00:00', 'img51.jpg', 'The B2B Marketing Forum brings insights from the industry leaders on how marketers can be more effective.', 0),
(10, 'Blended Learning and Online Learning Symposium', '#40E0D0', '2018-05-09 00:00:00', '2018-05-17 00:00:00', 'img33.jpg', 'The leading event for K-12 academic development in online, blended learning for educators, policy makers, and researchers.', 0),
(11, 'EuroSTAR Software Testing Conference', '#008000', '2018-07-11 12:00:00', '2018-07-12 12:00:00', 'img41.jpg', 'The conference features one day of full-day tutorials (Monday), a half-day of tutorials (Tuesday morning) and two and a half days of conference track sessions including workshops and advanced technical sessions.', 0),
(12, 'Momentum', '#FFD700', '2018-07-20 00:00:00', '2018-07-21 00:00:00', 'img10.jpg', 'Discover the true stories behind the make or break moments of the world’s most successful individuals and companies.\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty_branch_course`
--

CREATE TABLE `tbl_faculty_branch_course` (
  `faculty_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty_branch_course`
--

INSERT INTO `tbl_faculty_branch_course` (`faculty_id`, `branch_id`, `course_id`, `subject_id`) VALUES
(30, 4, 1, 4),
(31, 4, 2, 11),
(32, 4, 4, 22),
(33, 4, 3, 17),
(34, 6, 1, 4),
(35, 6, 2, 11),
(36, 6, 3, 17),
(37, 4, 5, 27),
(38, 4, 6, 36),
(39, 4, 7, 40),
(40, 4, 8, 45),
(41, 4, 9, 54),
(42, 4, 10, 50),
(43, 4, 11, 59),
(44, 4, 12, 63),
(45, 6, 4, 22),
(46, 6, 5, 27),
(47, 6, 6, 36),
(48, 6, 7, 40),
(49, 6, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(125, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 66.0.3359.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'Windows 10', '2018-06-13 14:44:54'),
(126, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 66.0.3359.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'Windows 10', '2018-06-13 15:53:25'),
(127, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 66.0.3359.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'Windows 10', '2018-06-13 16:00:50'),
(128, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 66.0.3359.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'Windows 10', '2018-06-13 19:30:50'),
(129, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 66.0.3359.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'Windows 10', '2018-06-14 04:13:27'),
(130, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 10:48:32'),
(131, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 11:01:23'),
(132, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 14:43:08'),
(133, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 15:05:47'),
(134, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 15:09:18'),
(136, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 17:19:38'),
(137, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 17:32:31'),
(138, 24, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"nayan patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-14 19:56:31'),
(139, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-15 08:04:18'),
(140, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-15 08:12:08'),
(141, 30, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"kashypi patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-15 08:18:10'),
(142, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-15 12:18:20'),
(143, 31, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"sahil patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-15 14:48:39'),
(144, 24, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"nayan patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 08:42:26'),
(145, 31, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"sahil patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 08:43:09'),
(146, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 15:49:13'),
(147, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 15:59:34'),
(148, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 16:04:38'),
(149, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 16:14:30'),
(150, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 17:20:45'),
(151, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 17:21:02'),
(152, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 17:25:00'),
(153, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 17:26:34'),
(154, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 17:27:14'),
(155, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-16 17:44:45'),
(156, 30, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"kashypi patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-17 05:32:19'),
(157, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-17 06:23:32'),
(158, 22, '{\"role\":\"2\",\"roletext\":\"admin\",\"username\":\"samir rana\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-17 06:24:27'),
(159, 30, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"kashypi patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-17 07:50:11'),
(160, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-18 07:46:38'),
(161, 30, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"kashypi patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-18 07:53:37'),
(162, 30, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"kashypi patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-18 11:35:06'),
(163, 21, '{\"role\":\"1\",\"roletext\":\"super_admin\",\"username\":\"Patel Yash\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-18 11:41:47'),
(164, 30, '{\"role\":\"3\",\"roletext\":\"faculty\",\"username\":\"kashypi patel\"}', '::1', 'Chrome 67.0.3396.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 'Windows 10', '2018-06-21 19:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_admin`
--

CREATE TABLE `tbl_master_admin` (
  `master_admin_id` int(11) NOT NULL,
  `master_admin_name` varchar(30) NOT NULL,
  `master_admin_gender` varchar(8) NOT NULL,
  `master_admin_role_id` int(11) NOT NULL,
  `master_admin_branch` int(11) NOT NULL,
  `master_admin_state` varchar(30) NOT NULL,
  `master_admin_city` varchar(30) NOT NULL,
  `master_admin_address` text NOT NULL,
  `master_admin_dob` varchar(15) NOT NULL,
  `master_admin_join_date` varchar(15) NOT NULL,
  `master_admin_contact` bigint(12) NOT NULL,
  `master_admin_email` varchar(50) NOT NULL,
  `master_admin_password` text NOT NULL,
  `master_admin_image` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `master_admin_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `master_admin_updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_admin`
--

INSERT INTO `tbl_master_admin` (`master_admin_id`, `master_admin_name`, `master_admin_gender`, `master_admin_role_id`, `master_admin_branch`, `master_admin_state`, `master_admin_city`, `master_admin_address`, `master_admin_dob`, `master_admin_join_date`, `master_admin_contact`, `master_admin_email`, `master_admin_password`, `master_admin_image`, `is_deleted`, `master_admin_created_date`, `master_admin_updated_date`) VALUES
(21, 'Patel Yash', 'male', 1, 4, 'Gujarat', 'Surat', '1011,palitana nagar,surat', '01/04/1997', '04/25/2010', 9725831111, 'patelyash2504@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'img2.jpg', 0, '2018-06-13 14:00:37', '0000-00-00 00:00:00'),
(22, 'samir rana', 'male', 2, 4, 'Gujarat', 'Surat', '11,ambanagar,near sosio,circle,udhna.', '07/12/1995', '06/22/2010', 7890078900, 'samirrana1011@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'member-img5.jpg', 0, '2018-06-14 09:12:22', '0000-00-00 00:00:00'),
(24, 'nayan patel', 'male', 2, 6, 'Gujarat', 'Bharuch', '555,lal bag,near vesu', '10/19/1999', '02/06/2012', 9090909088, 'nayanpatel111@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'member-img6.jpg', 0, '2018-06-14 09:12:28', '0000-00-00 00:00:00'),
(25, 'ravi patel', 'male', 2, 7, 'Gujarat', 'Ahmedabad', '22,haridham,near trade market,gopipura', '07/14/1999', '02/01/2012', 8989898990, 'ravip11@gmil.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'image.jpg', 0, '2018-06-14 09:12:31', '0000-00-00 00:00:00'),
(26, 'swati patel', 'female', 2, 8, 'Gujarat', 'Jamnagar', '67,umanagar,rampura', '10/27/1999', '07/11/2012', 7890078900, 'swati90@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'profile-felicity-lawrence.jpg', 0, '2018-06-14 09:12:33', '0000-00-00 00:00:00'),
(27, 'kasu patel', 'female', 2, 5, 'Gujarat', 'Vadodara', '78,om building,3rd floor', '06/10/1997', '06/16/2010', 6789009876, 'kasu789@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'fP4ir4M5_400x400.jpg', 0, '2018-06-14 09:12:36', '0000-00-00 00:00:00'),
(28, 'kasu patel', 'female', 2, 5, 'Gujarat', 'Vadodara', '78,om building,3rd floor', '06/10/1997', '06/16/2010', 6789009876, 'kasu789@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'fP4ir4M5_400x4001.jpg', 1, '2018-06-14 09:12:39', '0000-00-00 00:00:00'),
(29, 'rohit rana', 'male', 2, 9, 'Gujarat', 'Surat', '33,ichchhapur nagar', '07/01/1995', '09/15/2014', 9087654325, 'rohit1234@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images.jpg', 0, '2018-06-14 09:12:42', '0000-00-00 00:00:00'),
(30, 'kashypi patel', 'female', 3, 4, 'Gujarat', 'Surat', '11,madob,near parvat  patia', '06/06/1994', '03/02/2012', 9089966789, 'kasyupp123@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'member-img4.jpg', 0, '2018-06-15 02:42:56', '0000-00-00 00:00:00'),
(31, 'sahil patel', 'male', 3, 4, 'Gujarat', 'Surat', '11,kolapur, near bhagar', '08/09/1996', '07/14/2011', 7890098765, 'sahil111@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(1).jpg', 0, '2018-06-15 02:43:01', '0000-00-00 00:00:00'),
(32, 'mahesh babu', 'male', 3, 4, 'Gujarat', 'Abrama', '1011,mahrathi nagar,kapodra', '01/01/1990', '10/10/2010', 925869858, 'samirrana1011@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(6).jpg', 0, '2018-06-15 02:43:05', '0000-00-00 00:00:00'),
(33, 'suresh rana', 'male', 3, 4, 'Gujarat', 'Advana', 'surat sahera,near ao road', '10/10/1996', '10/05/2012', 4561254789, 'samirrana10111@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(4).jpg', 0, '2018-06-17 02:13:37', '0000-00-00 00:00:00'),
(34, 'vishal rana', 'male', 3, 5, 'Gujarat', 'Surat', '666,sampura,ramnagar', '12/20/1996', '10/18/2011', 9012345678, 'vishal1111@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(6)1.jpg', 0, '2018-06-16 10:50:25', '0000-00-00 00:00:00'),
(35, 'nimesh patel', 'male', 3, 6, 'Gujarat', 'Surat', '56,yogichok,punagam', '07/08/1998', '08/24/2011', 7890890909, 'patelyash250@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(4)1.jpg', 0, '2018-06-17 02:11:03', '0000-00-00 00:00:00'),
(36, 'vikku patil', 'female', 3, 6, 'Gujarat', 'Surat', '67,kalanagar,,udhna', '01/04/1990', '04/21/2011', 6789009876, 'patelyash250411@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(5).jpg', 0, '2018-06-17 02:11:11', '0000-00-00 00:00:00'),
(37, 'Athira T', 'female', 3, 4, 'Gujarat', 'Surat', '33,raju nagar', '07/24/1998', '12/25/1997', 7890909090, 'patelyash24@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'avliafap_r61PONH.jpg', 0, '2018-06-17 02:11:18', '0000-00-00 00:00:00'),
(38, 'Ahmad Mehdi Mirza', 'male', 3, 4, 'Gujarat', 'Surat', '55,tamilnagar,surat', '06/18/1995', '03/17/2010', 6789009876, 'patelya2123504@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'John-Nichools-e1310028041379.jpg', 0, '2018-06-17 02:13:54', '0000-00-00 00:00:00'),
(39, 'Ajay S', 'male', 3, 4, 'Gujarat', 'Surat', '890,RR building,ground', '08/04/1999', '12/22/2011', 908765432, 'pyash2504@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(1)1.jpg', 0, '2018-06-17 02:11:32', '0000-00-00 00:00:00'),
(40, 'Akshaya M R', 'female', 3, 4, 'Gujarat', 'Bharuch', '1011,maliba society,near mg road', '06/24/1997', '02/16/1999', 4567890456, 'patash2504@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(2).jpg', 0, '2018-06-17 02:11:39', '0000-00-00 00:00:00'),
(41, 'Amit C Kinjawadekar', 'male', 3, 4, 'Gujarat', 'Surat', '44,udaypur', '04/26/1995', '06/04/2011', 8956767665, 'patelya04@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'Prof__che_chi-ming.jpg', 0, '2018-06-17 02:11:46', '0000-00-00 00:00:00'),
(42, 'Arun Natarajan Hariharan', 'male', 3, 4, 'Gujarat', 'Surat', '55,majura', '04/19/2011', '11/19/1992', 9876543210, 'patelyash250664@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'download.jpg', 0, '2018-06-17 02:11:52', '0000-00-00 00:00:00'),
(43, 'Arunabha Bandyopadhyay', 'female', 3, 4, 'Gujarat', 'Surat', '65,trade building,5th floor.', '04/29/1993', '07/30/2010', 9089908908, 'pate@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'fP4ir4M5_400x400.jpg', 0, '2018-06-17 02:12:00', '0000-00-00 00:00:00'),
(44, 'Awani Milind Kulkarni', 'female', 3, 4, 'Gujarat', 'Surat', '09,feta trade,near vesu', '10/10/1994', '10/27/2011', 7654321890, 'pat099@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'profile-felicity-lawrence.jpg', 0, '2018-06-17 02:12:14', '0000-00-00 00:00:00'),
(45, 'Sneha B', 'female', 3, 6, 'Gujarat', 'Surat', 'punagam', '06/27/1990', '06/27/2011', 9089089089, 'patelyash2504918@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'profile-felicity-lawrence1.jpg', 0, '2018-06-17 02:12:21', '0000-00-00 00:00:00'),
(46, 'Charline Stella Samuel', 'female', 3, 6, 'Gujarat', 'Surat', '789,amba nagar', '08/24/1995', '12/30/2011', 7890098789, 'patelyash200504@gmail.com', 'ba6562f29d5e6f42cfbf557aa08eb687', 'images_(2)1.jpg', 0, '2018-06-17 02:12:45', '0000-00-00 00:00:00'),
(47, 'Danny W L Pinto', 'male', 3, 6, 'Gujarat', 'Bharuch', '65,trade building,5th floor.', '09/28/1990', '08/08/2011', 7867890908, 'patelyash2777504@gmail.com', '$2y$10$EXnMzIdAdOI5uE3gEKVzxuY2/ibMCjXWGIyfaPB61umMxAnnFiAQG', 'images.jpg', 0, '2018-06-17 02:14:35', '0000-00-00 00:00:00'),
(48, 'Debraj Chakraborty', 'male', 3, 6, 'Gujarat', 'Bharuch', '1011,maliba society,near mg road', '06/19/1992', '09/21/2011', 9087098709, 'patelyagsh2504@gmail.com', '$2y$10$6f9ohAjMbnfdES0sVcK6JOqEVnUaOVNvSemi3UPHn6tkcYe4t243C', 'image.png', 0, '2018-06-17 02:14:41', '0000-00-00 00:00:00'),
(49, 'priya parekh', 'female', 3, 5, 'Gujarat', 'Surat', 'punagam', '07/12/2000', '12/06/2010', 9090909090, 'pateeelyash2504@gmail.com', '6db76861293f35c777e808293cb60502', 'fP4ir4M5_400x4002.jpg', 0, '2018-06-17 02:14:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online_test`
--

CREATE TABLE `tbl_online_test` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `number_of_que` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_online_test`
--

INSERT INTO `tbl_online_test` (`test_id`, `test_name`, `course_id`, `subject_id`, `number_of_que`, `faculty_id`) VALUES
(2, 'communication_Test', 1, 4, 5, 30),
(3, 'language_c', 1, 5, 5, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online_user`
--

CREATE TABLE `tbl_online_user` (
  `online_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `right_ans` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_bank`
--

CREATE TABLE `tbl_question_bank` (
  `que_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `op1` varchar(300) NOT NULL,
  `op2` varchar(300) NOT NULL,
  `op3` varchar(300) NOT NULL,
  `op4` varchar(300) NOT NULL,
  `ans` varchar(3) NOT NULL,
  `que_mark` int(11) NOT NULL,
  `que_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question_bank`
--

INSERT INTO `tbl_question_bank` (`que_id`, `course_id`, `chapter_id`, `question`, `op1`, `op2`, `op3`, `op4`, `ans`, `que_mark`, `que_time`) VALUES
(1, 1, 4, ' Communication is a non-stop______________.', 'Paper', ' process', ' programme ', 'plan', '2', 1, 60),
(2, 1, 4, 'Communication is a part of ________ skills.', 'Soft', 'hard', 'rough', 'short', '1', 2, 120),
(3, 1, 4, 'The _______________ is the person who transmits the message', 'Receiver', 'driver', 'sender', 'cleaner', '3', 3, 180),
(4, 1, 4, ' Message is any signal that triggers the response of a _________', 'Receiver', 'driver', 'sender', 'cleaner', '1', 4, 240),
(5, 1, 4, 'The response to a sender\'s message is called _________', ' Food bank ', 'feedback', 'food', 'back', '2', 5, 300),
(6, 1, 4, '___________ context refers to the relationship between the sender and the receiver ', 'Social', 'physical', 'cultural', 'chronological', '1', 1, 60),
(7, 1, 4, '___________ context refers to the similarity of backgrounds between the sender and the receiver.', 'Physical', 'social', 'chronological', 'cultural', '4', 2, 120),
(8, 1, 4, '_________ refers to all these factors that disrupt the communication.', 'Nonsense', 'noise', 'nowhere', 'nobody', '2', 3, 180),
(9, 1, 4, 'Environmental barriers are the same as ______ noise.', 'Physiological', 'psychological', 'physical', 'sociological', '3', 4, 240),
(10, 1, 4, ' Our dress code is an example of _____________ communication.', 'Verbal', 'nonverbal', 'written', 'spoken', '2', 5, 300),
(11, 1, 5, 'What is the output of the below code snippet?  #include<stdio.h>  main()  {     int a = 5, b = 3, c = 4;         printf(\"a = %d, b = %d\\n\", a, b, c); }', 'a=5, b=3', 'a=5, b=3, c=0', 'a=5, b=3, 0', 'compile error', '1', 1, 60),
(12, 1, 5, 'Special symbol permitted with in the identifier name.', '$', '@', '_', '.', '3', 2, 120),
(13, 1, 5, 'For the below definition what is the data type of ‘PI’  #define PI 3.141', 'Its float', ' Its double', 'There is no type associated with PI, as it’s just a text substitution', 'Syntax error, semi colon is missing with the definition of PI', '3', 3, 180),
(14, 1, 5, 'What is the output of the following program?  #include<stdio.h>  void main() {    char *s = \"C++\";        printf(\"%s \", s);    s++;    printf(\"%s\", s); }', 'C++ C++', 'C++ ++', '++ ++', 'Compile error', '2', 4, 240),
(15, 1, 5, 'In C, what are the various types of real data type (floating point data type)?', 'Float, long double', ' long double, short int', 'float, double, long double', 'short int, double, long int, float', '3', 5, 300),
(16, 1, 5, 'Which header file can be used to define input/output function prototypes and macros?', 'math.h', ' memory.h', 'stdio.h', ' dos.h', '3', 1, 60),
(17, 1, 5, 'In DOS, how many bytes exist for near, far and huge pointers?', ' Near: 2, far: 4, huge: 7', ' near: 4, far: 2, huge: 8', ' near: 2, far: 4, huge: 4', 'near: 4, far: 0, huge: 0', '3', 2, 120);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role`) VALUES
(1, 'super_admin'),
(2, 'admin'),
(3, 'faculty'),
(4, 'students');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT '0',
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `status` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `mobile`, `picture_url`, `created`, `modified`, `password`, `is_verified`, `token`, `status`) VALUES
(1, 'google', '109546853626477862403', 'yash', 'patel', 'patelyash2504@gmail.com', '', 'https://lh6.googleusercontent.com/-FBS_LJhriaw/AAAAAAAAAAI/AAAAAAAAAAc/GaenfNxU-LM/photo.jpg', '2018-06-15 08:04:57', '2018-06-18 11:34:16', '', 0, '', b'00'),
(2, '', '', 'ys', 'ptl', 'patelyash250498@gmail.com', '', '', '2018-06-15 05:06:55', '2018-06-15 05:06:55', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '6a80110494efc0799685b7508f5a748f', b'00'),
(3, '', '', 'ravi', 'patil', 'ptlravi123@gmail.com', '', '', '2018-05-15 07:52:33', '2018-06-15 07:52:33', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'b3743e4216e4b5422448b237059db66e', b'00'),
(4, '', '', 'tanay', 'patel', 'pateltanay11@gmail.com', '', '', '2018-04-15 07:53:31', '2018-06-15 07:53:31', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'c63cdcc8bfbd9a8130a1a7a9c62fc9df', b'00'),
(5, '', '', 'kashyap', 'rana', 'ranak2504@gmail.com', '', '', '2018-06-15 07:58:25', '2018-06-15 07:58:25', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'e845f677e934a800eb20b879cc779417', b'00'),
(6, '', '', 'rohan', 'patel', 'patelrr@gmail.com', '', '', '2017-06-15 07:59:47', '2018-06-15 07:59:47', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'c434a1dd896cad56f31b17f0ba047a6e', b'00'),
(7, '', '', 'vishal', 'misra', 'misravishal11@gmail.com', '', '', '2017-04-15 08:00:55', '2018-06-15 08:00:55', 'ba6562f29d5e6f42cfbf557aa08eb687', 1, '29cd649c83641bc154191d39910cae8e', b'00'),
(8, '', '', 'gautam', 'ray', 'gautam66@gmail.com', '', '', '2017-06-15 08:01:36', '2018-06-15 08:01:36', 'ba6562f29d5e6f42cfbf557aa08eb687', 1, '60f7df71a281d5fbc4d57b2dcaa79b8f', b'00'),
(9, '', '', 'rohit', 'patel', 'rohit1234@gmail.com', '', '', '2017-06-15 08:02:21', '2018-06-15 08:02:21', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '0b5065042983c671fd94d65014e4060f', b'00'),
(10, '', '', 'fiza', 'moyam', 'fiza1232@gmail.com', '', '', '2016-06-15 08:04:16', '2018-06-15 08:04:16', 'ba6562f29d5e6f42cfbf557aa08eb687', 1, '247abad552a496cbf1ac7d17067575fd', b'00'),
(11, '', '', 'swati', 'patel', 'swati890@gmail.com', '', '', '2016-06-15 08:05:00', '2018-06-15 08:05:00', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '2f9a8209f63590544460c1e93cf92f5b', b'00'),
(12, '', '', 'yash', 'roy', 'roy90@gmail.com', '', '', '2016-06-15 08:05:44', '2018-06-15 08:05:44', 'ba6562f29d5e6f42cfbf557aa08eb687', 1, '8e7b4b0810b0bb35963cae1e874d0b87', b'00'),
(13, '', '', 'sam', 'patel', 'samp90@gmail.com', '', '', '2016-06-15 08:06:36', '2018-06-15 08:06:36', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '8809a77db31f1c38b1545a4ee9ff958f', b'00'),
(14, '', '', 'kasu', 'patel', 'kasu1234@gmail.com', '', '', '2016-06-15 08:07:21', '2018-06-15 08:07:21', 'ba6562f29d5e6f42cfbf557aa08eb687', 1, '649ed7cb594b1f39aa77fc52bd9adf38', b'00'),
(15, '', '', 'shreya', 'mistry', 'shreya1234@gmail.com', '', '', '2017-06-15 08:08:17', '2018-06-15 08:08:17', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'f61f5563541dbd635850e342eb24d018', b'00'),
(16, '', '', 'jay', 'patel', 'jay12@gmail.com', '', '', '2015-06-15 08:09:14', '2018-06-15 08:09:14', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'd065f610121ed574065f962cce839af5', b'00'),
(17, '', '', 'shivu', 'patel', 'shivup@gmail.com', '', '', '2015-06-15 08:10:06', '2018-06-15 08:10:06', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'df26fbf3a0f443e3e4130d4af8999746', b'00'),
(18, '', '', 'piyu', 'patel', 'piyu11@gmail.com', '', '', '2015-06-15 08:11:45', '2018-06-15 08:11:45', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, 'c4e8fc6e780574b1c54a3f19e149ee66', b'00'),
(19, '', '', 'payal', 'joshi', 'payal78@gmail.com', '', '', '2013-06-15 08:13:18', '2018-06-15 08:13:18', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '91a3a00d40fdcc514a6d414de81d4213', b'00'),
(20, '', '', 'heer', 'ray', 'heer1@gmail.com', '', '', '2013-06-15 08:18:10', '2018-06-15 08:18:10', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '06896d230ba8a29f5bb7377f78a959cb', b'00'),
(21, '', '', 'veena', 'patel', 'veeena890@gmail.com', '', '', '2012-06-15 08:19:00', '2018-06-15 08:19:00', 'ba6562f29d5e6f42cfbf557aa08eb687', 1, 'd6f87c422b2ab39781976a5d21628813', b'00'),
(22, '', '', 'uma', 'roy', 'umaroy11@gmail.com', '', '', '2012-06-15 08:19:55', '2018-06-15 08:19:55', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '38f21a1e792cdba79048c98bb69b4198', b'00'),
(23, '', '', 'ram', 'patil', 'ram900@gmail.com', '', '', '2012-06-15 08:20:35', '2018-06-15 08:20:35', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '93c2c90ea36e471c9d344b6a81223a36', b'01'),
(24, '', '', 'fagu', 'patel', 'fagupp@gmail.com', '', '', '2011-06-15 08:21:44', '2018-06-15 08:21:44', 'ba6562f29d5e6f42cfbf557aa08eb687', 0, '325f94d7ec470fef23b6a960c9c105f2', b'00'),
(25, '', '', 'prexa', 'patel', 'prexa11@gmail.com', '', '', '2010-06-15 08:23:42', '2018-06-15 08:23:42', 'ba6562f29d5e6f42cfbf557aa08eb687', 1, '9b9eae71b4570e1f1badc47b68e82e3e', b'00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_branch_course`
--

CREATE TABLE `tbl_student_branch_course` (
  `student_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_branch_course`
--

INSERT INTO `tbl_student_branch_course` (`student_id`, `branch_id`, `course_id`, `purchase_date`) VALUES
(1, 4, 1, '2018-06-15 02:37:55'),
(1, 4, 3, '2018-06-17 01:38:38'),
(1, 6, 5, '2018-06-16 10:44:06'),
(2, 4, 1, '2018-06-15 03:10:15'),
(3, 4, 1, '2017-06-15 05:57:47'),
(3, 5, 2, '2018-06-16 10:24:28'),
(9, 5, 1, '2018-06-16 10:27:16'),
(9, 4, 2, '2016-06-16 10:31:04'),
(23, 7, 1, '2018-06-16 10:39:01'),
(23, 7, 5, '2018-06-16 10:37:50'),
(23, 4, 6, '2018-06-16 11:55:43'),
(24, 4, 1, '2016-06-16 10:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `course_id`) VALUES
(4, 'communication_skills', 1),
(5, 'Problem_solving_methodologies_&_programming_in_C', 1),
(6, 'Foundation_of_information_Technology', 1),
(7, 'Foundation_of_mathematics_&_statistics', 1),
(8, 'Advance_and_data_structure', 1),
(9, 'Dbms ', 1),
(10, 'Computer_organization_&_architechture', 1),
(11, 'Object_oriented_Programming', 2),
(12, 'Computer_Networks', 2),
(13, 'Logic_Discrete_Mathematical_Structures', 2),
(14, 'Operating_Systems', 2),
(15, 'SW_Engineering', 2),
(16, 'Introduction_to_Digital_electronics', 2),
(17, 'Introduction_to_Information_theory ', 3),
(18, 'Mathematics_I', 3),
(19, 'Digital_Computer_Fundamentals', 3),
(20, 'Introduction_to_Programming', 3),
(21, 'Design_and_analysis_of_algorithms', 3),
(22, 'SQL_2', 4),
(23, 'Visual_Basic_6', 4),
(24, 'Internet_Security', 4),
(25, 'E_Commerce', 4),
(26, 'Database_concepts_and_Systems', 4),
(27, 'Natural_Language_Generation', 5),
(28, 'Speech_Recognition', 5),
(29, 'Virtual_Agents', 5),
(30, 'AI_optimized_Hardware', 5),
(31, 'Decision_Management', 5),
(32, 'Deep_Learning_Platforms', 5),
(33, 'Biometrics', 5),
(34, 'Robotic_Process_Automation', 5),
(35, 'Text_Analytics_and_NLP', 5),
(36, 'Assessing_and_Comparing_Classification ', 6),
(37, 'Data_Mining', 6),
(38, 'Neural_networks', 6),
(39, 'Regression', 6),
(40, 'Energy_optimisation', 7),
(41, 'Data_recovery_and_backup', 7),
(42, 'Privacy_in_multi_tenancy_clouds', 7),
(43, 'Cloud_cryptography', 7),
(44, 'Cloud_access_control_and_key_management', 7),
(45, '2D_computer_graphics', 8),
(46, '2D_geometric_model', 8),
(47, '3D_computer_graphics', 8),
(48, '3D_projection', 8),
(49, 'Anti_aliasing', 8),
(50, 'Mobilephone_generations', 10),
(51, '4G_networking', 10),
(52, 'Channel_hogging_and_file_sharing', 10),
(53, 'Operating_systems', 10),
(54, 'Artist_Driven_animation', 9),
(55, 'Data_Driven_animation', 9),
(56, 'Physically_based_animation', 9),
(57, 'Character_animation', 9),
(58, 'Passive_animation', 9),
(59, 'MS_Office', 11),
(60, 'Notepad', 11),
(61, 'Paint', 11),
(62, 'Internet_learning', 11),
(63, 'Tax_Management', 12),
(64, 'Manage_banking_with_ease_with_bank_reconciliation', 12),
(65, 'Accounting_with_each_type_of_transaction ', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_syllabus`
--

CREATE TABLE `tbl_syllabus` (
  `syllabus_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `syllabus_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_syllabus`
--

INSERT INTO `tbl_syllabus` (`syllabus_id`, `course_id`, `subject_id`, `syllabus_content`) VALUES
(1, 1, 4, 'The ability to convey information to another effectively and efficiently. Business managers with good verbal, non verbal and written communication skills help facilitate the sharing of information between people within a company for its commercial benefit.'),
(2, 1, 5, 'C is a high-level and general-purpose programming language that is ideal for developing firmware or portable applications. Originally intended for writing system software, C was developed at Bell Labs by Dennis Ritchie for the Unix Operating System in the early 1970s.'),
(3, 1, 6, 'Duties of an information technology specialist can include network management, software development and database administration. IT specialists may also provide technical support to a business or an organization\'s employees and train non-technical workers on the business\'s information systems.'),
(4, 1, 7, 'Mathematics  is the study of such topics as quantity, structure, space, and change. It has no generally accepted definition. Mathematicians seek and use patterns to formulate new conjectures; they resolve the truth or falsity of conjectures by mathematical proof.'),
(5, 1, 8, 'A data structure is a specialized format for organizing and storing data. General data structure types include the array, the file, the record, the table, the tree, and so on. Any data structure is designed to organize data to suit a specific purpose so that it can be accessed and worked with in appropriate ways.'),
(6, 1, 9, 'A database-management system (DBMS) is a computer-software application that interacts with end-users, other applications, and the database itself to capture and analyze data. A general-purpose DBMS allows the definition, creation, querying, update, and administration of databases.'),
(7, 1, 10, 'In computer engineering, computer architecture is a set of rules and methods that describe the functionality, organization, and implementation of computer systems. Some definitions of architecture define it as describing the capabilities and programming model of a computer but not a particular implementation.'),
(8, 2, 11, 'Object-oriented programming (OOP) is a software programming model constructed around objects. This model compartmentalizes data into objects (data fields) and describes object contents and behavior through the declaration of classes (methods).'),
(9, 2, 12, 'A computer network is a set of computers connected together for the purpose of sharing resources. The most common resource shared today is connection to the Internet. Other shared resources can include a printer or a file server. The Internet itself can be considered a computer network.'),
(10, 2, 13, 'Define the basic logical structure of a computer. The basic logical structure of a computer are as follows: - The BIOS ( basic input output system ) responsible for booting up the computer. - CPU ( central processing unit ) the brains of the computer executes the processes.'),
(11, 2, 14, 'An operating system (OS), in its most general sense, is software that allows a user to run other applications on a computing device. While it is possible for a software application to interface directly with hardware, the vast majority of applications are written for an OS, which allows them to take advantage of common libraries and not worry about specific hardware details.'),
(12, 2, 15, 'The application of a systematic, disciplined, quantifiable approach to the development, operation, and maintenance of software\"—IEEE Standard Glossary of Software Engineering Terminology. \"an engineering discipline that is concerned with all aspects of software production'),
(13, 2, 16, 'Digital electronics or digital (electronic) circuits are electronics that handle digital signals – discrete bands of analog levels – rather than by continuous ranges as used in analog electronics. All levels within a band of values represent the same information state.'),
(14, 3, 17, 'the mathematical study of the coding of information in the form of sequences of symbols, impulses, etc. and of how rapidly such information can be transmitted, for example through computer circuits or telecommunications channels.'),
(15, 3, 18, 'the abstract science of number, quantity, and space, either as abstract concepts ( pure mathematics ), or as applied to other disciplines such as physics and engineering ( applied mathematics ).'),
(16, 3, 19, 'Digital Fundamentals by Thomas L. Floyd This bestseller provides thorough, up-to-date coverage of digital fundamentals, from basic concepts to microprocessors, programmable logic, and digital signal processing.'),
(17, 3, 20, 'A programming language is a formal language that specifies a set of instructions that can be used to produce various kinds of output. Programming languages generally consist of instructions for a computer. Programming languages can be used to create programs that implement specific algorithms.'),
(18, 3, 21, 'Algorithm design is a specific method to create a mathematical process in problem solving processes. Applied algorithm design is algorithm engineering. Algorithm design is identified and incorporated into many solution theories of operation research, such as dynamic programming and divide-and-conquer.'),
(19, 4, 22, 'This definition is part of our Essential Guide: Relational database management system guide: RDBMS still on top. Contributor(s): Jessica Sirkin. SQL (Structured Query Language) is a standardized programming language used for managing relational databases and performing various operations on the data in them.'),
(20, 4, 23, 'Visual Basic (VB) is a well-known programming language created and developed by Microsoft. VB is characterized by its simple format, which is easy to understand. Beginning programmers often consider VB the starting point in software development.'),
(21, 4, 24, 'Internet security is defined as a process to create rules and actions to take to protect against attacks over the Internet. An example of Internet security is an online system that prevents credit card numbers from being stolen on a shopping website.'),
(22, 4, 25, 'commercial transactions conducted electronically on the Internet.'),
(23, 4, 26, 'A database is a collection of information that is organized so that it can be easily accessed, managed and updated.\r\n\r\nData is organized into rows, columns and tables, and it is indexed to make it easier to find relevant information. Data gets updated, expanded and deleted as new information is added. Databases process workloads to create and update themselves, querying the data they contain and running applications against it.'),
(24, 5, 27, 'the application of computational techniques to the analysis and synthesis of natural language and speech.'),
(25, 5, 28, 'the process of enabling a computer to identify and respond to the sounds produced in human speech.'),
(26, 5, 29, 'A Virtual Agent is an computer generated, animated, artificial intelligence virtual character (usually with anthropomorphic appearance) that serves as an online customer service representative. It leads a intelligent conversation with users, responds to their questions and performs adequate non-verbal behavior.'),
(27, 5, 30, '1 : a branch of computer science dealing with the simulation of intelligent behavior in computers. 2 : the capability of a machine to imitate intelligent human behavior.'),
(28, 5, 31, 'The thought process of selecting a logical choice from the available options.\r\nWhen trying to make a good decision, a person must weight the positives and negatives of each option, and consider all the alternatives. For effective decision making, a person must be able to forecast the outcome of each option as well, and based on all these items, determine which option is the best for that particular situation.'),
(29, 5, 32, 'Deep learning architectures such as deep neural networks, deep belief networks and recurrent neural networks have been applied to fields including computer vision, speech recognition, natural language processing, audio recognition, social network filtering, machine translation, bioinformatics and drug design, where they have produced results comparable to and in some cases superior[4] to human experts'),
(30, 5, 33, 'relating to or involving the application of statistical analysis to biological data.\r\n'),
(31, 5, 34, 'the branch of technology that deals with the design, construction, operation, and application of robots.'),
(32, 5, 35, 'Set of rules and techniques proposed for modifying behavior in achieving self improvement, self management, and more effective interpersonal communications. Based on certain assumptions about how language and movements of eyes and body affect brain (neurological) functions, NLP is similar to self-hypnosis. Its basic premise is that to achieve any kind of success one must create rich imagery of the goal, and must imitate (model) and internalize the appropriate behavioral patterns. Its name is derived from how senses filter and process experience before storing it in brain (neuro), how one uses words and symbols to create mental pictures (linguistic), and how desired habits and attitudes become ingrained (programming).'),
(33, 6, 36, 'Formative Assessment. This occurs in the short term, as learners are in the process of making meaning of new content and of integrating it into what they already know. ... Formative Assessment is the most powerful type of assessment for improving student understanding and performance.'),
(34, 6, 37, 'the practice of examining large pre-existing databases in order to generate new information.\r\n'),
(35, 6, 38, 'In information technology, a neural network is a system of hardware and/or software patterned after the operation of neurons in the human brain. Neural networks -- also called artificial neural networks -- are a variety of deep learning technologies. Commercial applications of these technologies generally focus on solving complex signal processing or pattern recognition problems. Examples of significant commercial applications since 2000 include handwriting recognition for check processing, speech-to-text transcription, oil-exploration data analysis, weather prediction and facial recognition.'),
(36, 6, 39, 'A technique for determining the statistical relationship between two or more variables where a change in a dependent variable is associated with, and depends on, a change in one or more independent variables.'),
(37, 7, 40, 'In the field of computational chemistry, energy minimization (also called energy optimization, geometry minimization, or geometry optimization) is the process of finding an arrangement in space of a collection of atoms where, according to some computational model of chemical bonding, the net inter-atomic force on each atom is acceptably close to zero and the position on the potential energy surface (PES) is a stationary point (described later). The collection of atoms might be a single molecule, an ion, a condensed phase, a transition state or even a collection of any of these. The computational model of chemical bonding might, for example, be quantum mechanics.'),
(38, 7, 41, 'Backup and recovery refers to the process of backing up data in case of a loss and setting up systems that allow that data recovery due to data loss. ... Data from an earlier time may only be recovered if it has been backed up. Data backup is a form of disaster recovery and should be part of any disaster recovery plan.'),
(39, 7, 42, 'Despite the evidence, many businesses still worry that storing data in the Cloud is not secure. That’s one of the main concerns our MSP partners hear when talking to their customers. For any company accustomed to traditional on-premise storage sitting safely behind a firewall (if configured and working properly), sending critical data to the cloud can sound like a HUGE security risk.  This fear that’s been hanging around since the earliest days of the cloud is especially pronounced for small businesses and for those less technically savvy.'),
(40, 7, 43, 'A Definition of Cryptography in the Cloud. Cryptography in the cloud employs encryption techniques to secure data that will be used or stored in the cloud. It allows users to conveniently and securely access shared cloud services, as any data that is hosted by cloud providers is protected with encryption.'),
(41, 7, 44, 'Managing data access control in an authorized and authenticated way is still one of the key challenge in cloud security. In a complex environment like cloud, data owner and Cloud Service Provider (CSP) need to monitor continuously who is accessing which data in order to prevent unauthorized access. Moreover, it should be pre-defined that who can perform which operation on particular data, which can reduce unauthorized access to a great extent. In this regard, user\'s access to any data, application and services reside in cloud should be controlled, managed dynamically and monitored continuously. Most of cases the traditional system is not efficient enough to cope up with dynamic cloud environment, due to high dynamicity, data virtualization and multi-tenancy, higher scalability and higher degree of integrity.'),
(42, 8, 45, '2D computer graphics. 2D computer graphics is the computer-based generation of digital images—mostly from two-dimensional models (such as 2D geometric models, text, and digital images) and by techniques specific to them.'),
(43, 8, 46, '2D geometric model. A 2D geometric model is a geometric model of an object as a two-dimensional figure, usually on the Euclidean or Cartesian plane. ... They are an essential tool of 2D computer graphics and often used as components of 3D geometric models, e.g. to describe the decals to be applied to a car model.'),
(44, 8, 47, '3D computer graphics or three-dimensional computer graphics, (in contrast to 2D computer graphics) are graphics that use a three-dimensional representation of geometric data (often Cartesian) that is stored in the computer for the purposes of performing calculations and rendering 2D images.'),
(45, 8, 48, 'Orthographic projection. When the human eye looks at a scene, objects in the distance appear smaller than objects close by. ... Orthographic projections are a small set of transforms often used to show profile, detail or precise measurements of a three dimensional object.'),
(46, 8, 49, 'Antialiasing is a technique used in digital imaging to reduce the visual defects that occur when high-resolution images are presented in a lower resolution. Aliasing manifests itself as jagged or stair-stepped lines (otherwise known as jaggies) on edges and objects that should otherwise be smooth.'),
(47, 9, 54, 'Animation is the graphic art which occurs in time. Whereas a static image (such\r\nas a Picasso or a complex graph) may convey complex information through a single\r\npicture, animation conveys equivalently complex information through a sequence of\r\nimages seen in time. It is characteristic of this medium, as opposed to static imagery,\r\nthat the actual graphical information at any given instant is relatively slight. The\r\nsource of information for the viewer of animation is implicit in picture change: change in\r\nrelative position, shape, and dynamics. Therefore, a computer is ideally suited to\r\nmaking animation\' \'possible\" through the fluid refinement of these changes.'),
(48, 9, 55, 'Data-driven animations are created using live data collected from various data sources that drive animations in your composition. You can use data from multiple data sources. The data can be static or time-varying. You can import the data into your After Effects project and use it as input that can animate graphs, characters, control visual effects and movie titles, and other motion graphics.'),
(49, 9, 56, 'Physically based animation is an area of interest within computer graphics concerned with the simulation of physically plausible behaviors at interactive rates. Advances in physically based animation are often motivated by the need to include complex, physically inspired behaviors in video games, interactive simulations, and movies. Although off-line simulation methods exist to solve most all of the problems studied in physically-based animation, these methods are intended for applications that necessitate physical accuracy and slow, detailed computations. In contrast to methods common in offline simulation, techniques in physically based animation are concerned with physical plausibility, numerical stability, and visual appeal over physical accuracy.'),
(50, 9, 57, 'Character animation is a specialized area of the animation process, which involves bringing animated characters to life. The role of a Character Animator is analogous to that of a film or stage actor, and character animators are often said to be \"actors with a pencil\" (or a mouse). Character animators breathe life in their characters, creating the illusion of thought, emotion and personality. Character animation is often distinguished from creature animation, which involves bringing photo-realistic animals and creatures to life.'),
(51, 9, 58, 'Active and Passive Sentences. A sentence is written in active voice when the subject of the sentence performs the action in the sentence. e.g. The girl was washing the dog. A sentence is written in passive voice when the subject of the sentence has an action done to it by someone or something else.'),
(52, 10, 50, '1G or (1-G) refers to the first generation of wireless telephone technology (mobile telecommunications). These are the analog telecommunications standards that were introduced in 1979 and the early to mid-1980s and continued until being replaced by 2G digital telecommunications.\r\n'),
(53, 10, 51, '4G is the fourth generation of broadband cellular network technology, succeeding 3G. ... Potential and current applications include amended mobile web access, IP telephony, gaming services, high-definition mobile TV, video conferencing, and 3D television.\r\n'),
(54, 10, 52, 'Mobile technology is the technology used for cellular communication. Mobile code-division multiple access (CDMA) technology has evolved rapidly over the past few years. Since the start of this millennium, a standard mobile device has gone from being no more than a simple two-way pager to being a mobile phone, GPS navigation device, an embedded web browser and instant messaging client, and a handheld game console. Many experts believe that the future of computer technology rests in mobile computing with wireless networking. Mobile computing by way of tablet computers are becoming more popular. Tablets are available on the 3G and 4G networks.'),
(55, 10, 53, 'Operating system. An operating system (OS) is system software that manages computer hardware and software resources and provides common services for computer programs.\r\n'),
(56, 11, 59, 'Microsoft Office. Suite of products developed by Microsoft Corporation that includes Microsoft Word, Excel, Access, Publisher, PowerPoint, and Outlook. Each program serves a different purpose and is compatible with other programs included in the package.'),
(57, 11, 60, 'Notepad is a simple text editor for Microsoft Windows and a basic text-editing program which enables computer users to create documents. It was first released as a mouse-based MS-DOS program in 1983, and has been included in all versions of Microsoft Windows since Windows 1.0 in 1985.\r\n'),
(58, 11, 61, 'Paint is any liquid, liquefiable, or mastic composition that, after application to a substrate in a thin layer, converts to a solid film. It is most commonly used to protect, color, or provide texture to objects. ... Paint is typically stored, sold, and applied as a liquid, but most types dry into a solid.\r\n'),
(59, 11, 62, 'It includes learning with the assistance of the Internet and a personal computer. The term e-learning, or electronic learning, often is used interchangeably with online learning. ... Your courses will be broken up into modules that contain the learning content and activities you will have to complete.\r\n'),
(60, 12, 63, 'Tax Manager Responsibilities. Include: Delivering a full range of tax services in compliance with laws and regulations within timeframe. Building relationships and interacting with clients to provide excellent planning, consulting and expertise.\r\n'),
(61, 12, 64, 'In bookkeeping, a bank reconciliation statement is a process that explains the difference on a specified date between the bank balance shown in an organization\'s bank statement, as supplied by the bank, and the corresponding amount shown in the organization\'s own accounting records'),
(62, 12, 65, 'There are four main types of financial transactions that occur in a business. These four types of financial transactions are sales, purchases, receipts, and payments. ... The receipt transaction is recorded in the journal for the seller as a debit to cash and a credit to accounts receivable.\r\n'),
(64, 11, 60, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_rank`
--

CREATE TABLE `tbl_test_rank` (
  `rank_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_test_rank`
--

INSERT INTO `tbl_test_rank` (`rank_id`, `student_id`, `test_id`, `percentage`) VALUES
(1, 1, 3, 20),
(2, 1, 3, 93.3333),
(3, 2, 3, 66.6667),
(4, 1, 2, 33.3333),
(5, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `user_id`, `status`, `timestamp`) VALUES
('152903015143043', 1, 'success', '2018-06-15 02:37:54'),
('152903215152476', 2, 'success', '2017-06-15 03:10:15'),
('152904221881325', 3, 'success', '2017-06-15 05:57:47'),
('152914461292770', 3, 'success', '2017-06-16 10:24:28'),
('15291447716914', 9, 'success', '2018-06-16 10:27:16'),
('152914501237092', 9, 'success', '2016-06-16 10:31:04'),
('152914517923387', 24, 'success', '2015-06-16 10:34:03'),
('152914542831165', 23, 'success', '2015-06-16 10:37:50'),
('152914550778018', 23, 'success', '2014-06-16 10:39:01'),
('152914565097083', 23, 'success', '2013-06-16 10:41:32'),
('152914579515409', 1, 'success', '2018-06-16 10:44:06'),
('152919939386322', 1, 'success', '2018-06-17 01:38:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `assign_branch` (`branch_id`),
  ADD KEY `assign_course` (`course_id`),
  ADD KEY `assign_subject` (`subject_id`),
  ADD KEY `assign_faculty` (`faculty_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_faculty_branch_course`
--
ALTER TABLE `tbl_faculty_branch_course`
  ADD PRIMARY KEY (`faculty_id`,`branch_id`,`course_id`,`subject_id`),
  ADD KEY `fbc_branch` (`branch_id`),
  ADD KEY `fbc_course` (`course_id`),
  ADD KEY `fbc_subject` (`subject_id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ll_user` (`userId`);

--
-- Indexes for table `tbl_master_admin`
--
ALTER TABLE `tbl_master_admin`
  ADD PRIMARY KEY (`master_admin_id`),
  ADD KEY `ma_role` (`master_admin_role_id`),
  ADD KEY `ma_branch` (`master_admin_branch`);

--
-- Indexes for table `tbl_online_test`
--
ALTER TABLE `tbl_online_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `ot_course` (`course_id`),
  ADD KEY `ot_subject` (`subject_id`),
  ADD KEY `ot_faculty` (`faculty_id`);

--
-- Indexes for table `tbl_online_user`
--
ALTER TABLE `tbl_online_user`
  ADD PRIMARY KEY (`online_user_id`),
  ADD KEY `ou_user` (`user_id`),
  ADD KEY `ou_test` (`test_id`);

--
-- Indexes for table `tbl_question_bank`
--
ALTER TABLE `tbl_question_bank`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `qb_course` (`course_id`),
  ADD KEY `qb_subject` (`chapter_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_student_branch_course`
--
ALTER TABLE `tbl_student_branch_course`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `sbc_course` (`course_id`),
  ADD KEY `sbc_branch` (`branch_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `s_course` (`course_id`);

--
-- Indexes for table `tbl_syllabus`
--
ALTER TABLE `tbl_syllabus`
  ADD PRIMARY KEY (`syllabus_id`),
  ADD KEY `sy_course` (`course_id`),
  ADD KEY `sy_subject` (`subject_id`);

--
-- Indexes for table `tbl_test_rank`
--
ALTER TABLE `tbl_test_rank`
  ADD PRIMARY KEY (`rank_id`),
  ADD KEY `tr_test` (`test_id`),
  ADD KEY `tr_student` (`student_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `t_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tbl_master_admin`
--
ALTER TABLE `tbl_master_admin`
  MODIFY `master_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_online_test`
--
ALTER TABLE `tbl_online_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_online_user`
--
ALTER TABLE `tbl_online_user`
  MODIFY `online_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_question_bank`
--
ALTER TABLE `tbl_question_bank`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_syllabus`
--
ALTER TABLE `tbl_syllabus`
  MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_test_rank`
--
ALTER TABLE `tbl_test_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD CONSTRAINT `assign_branch` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_master_admin` (`master_admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_faculty_branch_course`
--
ALTER TABLE `tbl_faculty_branch_course`
  ADD CONSTRAINT `fbc_branch` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fbc_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fbc_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_master_admin` (`master_admin_id`),
  ADD CONSTRAINT `fbc_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD CONSTRAINT `ll_user` FOREIGN KEY (`userId`) REFERENCES `tbl_master_admin` (`master_admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_master_admin`
--
ALTER TABLE `tbl_master_admin`
  ADD CONSTRAINT `ma_branch` FOREIGN KEY (`master_admin_branch`) REFERENCES `tbl_branch` (`branch_id`),
  ADD CONSTRAINT `ma_role` FOREIGN KEY (`master_admin_role_id`) REFERENCES `tbl_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_online_test`
--
ALTER TABLE `tbl_online_test`
  ADD CONSTRAINT `ot_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ot_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_master_admin` (`master_admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ot_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_online_user`
--
ALTER TABLE `tbl_online_user`
  ADD CONSTRAINT `ou_test` FOREIGN KEY (`test_id`) REFERENCES `tbl_online_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ou_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_question_bank`
--
ALTER TABLE `tbl_question_bank`
  ADD CONSTRAINT `qb_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qb_subject` FOREIGN KEY (`chapter_id`) REFERENCES `tbl_subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student_branch_course`
--
ALTER TABLE `tbl_student_branch_course`
  ADD CONSTRAINT `sbc_branch` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`),
  ADD CONSTRAINT `sbc_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sbc_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `s_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_syllabus`
--
ALTER TABLE `tbl_syllabus`
  ADD CONSTRAINT `sy_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sy_subject` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_test_rank`
--
ALTER TABLE `tbl_test_rank`
  ADD CONSTRAINT `tr_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`),
  ADD CONSTRAINT `tr_test` FOREIGN KEY (`test_id`) REFERENCES `tbl_online_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `t_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
