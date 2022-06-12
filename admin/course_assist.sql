-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2022 at 03:18 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_assist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(254) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_reg_date` datetime NOT NULL,
  `user_password` varchar(254) NOT NULL,
  `user_pass_reset_code` varchar(254) NOT NULL,
  `user_group` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`userid`, `user_email`, `user_name`, `user_reg_date`, `user_password`, `user_pass_reset_code`, `user_group`, `user_status`) VALUES
(3, 'admin@gmail.com', 'student', '2022-04-29 00:17:26', '674cb2c913592c74dc0cd550da31fe30ed94bd5cfe39f870bb544ebc6c789b49', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coditions`
--

DROP TABLE IF EXISTS `coditions`;
CREATE TABLE IF NOT EXISTS `coditions` (
  `codition_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `c_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_code_cc_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`) USING BTREE,
  KEY `fk_course_course_code1` (`course_code_cc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_cat`
--

DROP TABLE IF EXISTS `course_cat`;
CREATE TABLE IF NOT EXISTS `course_cat` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_code`
--

DROP TABLE IF EXISTS `course_code`;
CREATE TABLE IF NOT EXISTS `course_code` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_type_type_id` int(11) DEFAULT NULL,
  `credit_creditid` int(11) NOT NULL,
  `course_cat_category_id` int(11) NOT NULL,
  `level_idlevel` int(11) NOT NULL,
  PRIMARY KEY (`cc_id`),
  KEY `fk_course_code_course_type1` (`course_type_type_id`),
  KEY `fk_course_code_credit1` (`credit_creditid`),
  KEY `fk_course_code_course_cat1` (`course_cat_category_id`),
  KEY `fk_course_code_level1` (`level_idlevel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

DROP TABLE IF EXISTS `course_type`;
CREATE TABLE IF NOT EXISTS `course_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

DROP TABLE IF EXISTS `credit`;
CREATE TABLE IF NOT EXISTS `credit` (
  `creditid` int(11) NOT NULL AUTO_INCREMENT,
  `credit` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`creditid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faculty_f_id` int(11) NOT NULL,
  `d_status` int(11) NOT NULL,
  PRIMARY KEY (`d_id`) USING BTREE,
  KEY `fk_department_faculty1` (`faculty_f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `faculty_f_id`, `d_status`) VALUES
(1, 'test', 1, 1),
(2, 'test two', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faculty_status` int(11) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `faculty_status`) VALUES
(1, 'test', 0),
(2, 'test two', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `idlevel` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idlevel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progarm`
--

DROP TABLE IF EXISTS `progarm`;
CREATE TABLE IF NOT EXISTS `progarm` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `total_credit` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `program_status` int(11) NOT NULL,
  PRIMARY KEY (`program_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `progarm`
--

INSERT INTO `progarm` (`program_id`, `program_name`, `total_credit`, `department_id`, `program_status`) VALUES
(1, 'test', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `r_id` int(11) NOT NULL,
  `student_s_id` int(11) NOT NULL,
  `course_code_cc_id` int(11) NOT NULL,
  `grade_grade_id` int(11) NOT NULL,
  PRIMARY KEY (`r_id`) USING BTREE,
  KEY `fk_result_student1` (`student_s_id`),
  KEY `fk_result_course_code1` (`course_code_cc_id`),
  KEY `fk_result_grade1` (`grade_grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `progarm_p_id` int(11) DEFAULT NULL,
  `progarm_department_d_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_course_code1` FOREIGN KEY (`course_code_cc_id`) REFERENCES `course_code` (`cc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course_code`
--
ALTER TABLE `course_code`
  ADD CONSTRAINT `fk_course_code_course_cat1` FOREIGN KEY (`course_cat_category_id`) REFERENCES `course_cat` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course_code_course_type1` FOREIGN KEY (`course_type_type_id`) REFERENCES `course_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course_code_credit1` FOREIGN KEY (`credit_creditid`) REFERENCES `credit` (`creditid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course_code_level1` FOREIGN KEY (`level_idlevel`) REFERENCES `level` (`idlevel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_department_faculty1` FOREIGN KEY (`faculty_f_id`) REFERENCES `faculty` (`f_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `progarm`
--
ALTER TABLE `progarm`
  ADD CONSTRAINT `progarm_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_result_course_code1` FOREIGN KEY (`course_code_cc_id`) REFERENCES `course_code` (`cc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_result_grade1` FOREIGN KEY (`grade_grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_result_student1` FOREIGN KEY (`student_s_id`) REFERENCES `student` (`s_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
