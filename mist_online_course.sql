-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 02:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mist_online_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_registration`
--

CREATE TABLE IF NOT EXISTS `course_registration` (
`id` int(20) NOT NULL,
  `fullname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mothername` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `appoinment` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gpa` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `board` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `courses` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `information` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contactnumber` int(14) NOT NULL,
  `payment` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bankdraftimage` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pictureid` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regdate` date NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_registration`
--

INSERT INTO `course_registration` (`id`, `fullname`, `fathername`, `mothername`, `email`, `address`, `organization`, `appoinment`, `degree`, `gpa`, `board`, `year`, `courses`, `information`, `contactnumber`, `payment`, `bankdraftimage`, `pictureid`, `code`, `regdate`, `active`) VALUES
(1, 'Jagobandhu Some', 'Sukumar Some', 'Swapna Rani some', 'jagobandhusome@gmail.com', 'Jagobandhu Some, C/O: S.M Humayun Kobir (Bokul), Senior Scientific officer\r\nSPARRSO(Bangladesh Space Research and remote sensing organization), Agarga', 'MIST', 'Sub Assistant Engineer', 'Dipolma in Engineeri', '3.36', 'Jessore', 2007, '', 'Nothing ', 2147483647, 'BA-727', '', '', '74a49c698dbd3c12e36b0b287447d833f74f3937ff132ebff7054baa18623c35a705bb18b82e2ac0384b5127db97016e63609f712bc90e3506cfbea97599f46f', '0000-00-00', 0),
(2, 'Jagobandhu Some', 'Sukumar Some', 'Swapna Rani some', 'jagobandhusome@gmail.com', 'Jagobandhu Some, C/O: S.M Humayun Kobir (Bokul), Senior Scientific officer\r\nSPARRSO(Bangladesh Space Research and remote sensing organization), Agarga', 'MIST', 'Sub Assistant Engineer', 'Dipolma in Engineeri', '3.36', 'Jessore', 2007, '', 'Nothing ', 2147483647, 'BA-727', '', '', '5ef620ffb2ed44b40530c0a880fe6b809bf7cc9ce9f589eb2514bf42cec94ade4491c61da816544aebf1054da3d894fdfa218a9bdf73625cbaa1ea0126a47b71', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_registration`
--
ALTER TABLE `course_registration`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_registration`
--
ALTER TABLE `course_registration`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
