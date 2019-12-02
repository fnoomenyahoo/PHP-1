-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2018 at 02:20 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HospitalID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `PDate` date NOT NULL,
  `Status` enum('Valid','Cancled','Terminated') NOT NULL,
  `PTimen` int(2) NOT NULL,
  `Reminded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `HospitalID`, `patientID`, `PDate`, `Status`, `PTimen`, `Reminded`) VALUES
(11, 7, 4, '2018-05-23', 'Terminated', 7, 1),
(10, 7, 4, '2018-05-23', 'Cancled', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloodtest`
--

DROP TABLE IF EXISTS `bloodtest`;
CREATE TABLE IF NOT EXISTS `bloodtest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HospitalID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `date` date NOT NULL,
  `Status` tinyint(1) DEFAULT '1',
  `Response` varchar(100) DEFAULT ' ',
  `Result` varchar(100) DEFAULT ' ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodtest`
--

INSERT INTO `bloodtest` (`id`, `HospitalID`, `PatientID`, `date`, `Status`, `Response`, `Result`) VALUES
(2, 7, 4, '2018-05-22', 0, 'CBC', '+ 5ml/100');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  `Tel` varchar(20) NOT NULL,
  `Tel2` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `nationalId` varchar(50) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `ContactName` varchar(50) NOT NULL,
  `ContactTel` varchar(20) NOT NULL,
  `openh1` int(2) NOT NULL,
  `openh2` int(2) NOT NULL,
  `offDay` enum('','Friday','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `Description`, `Tel`, `Tel2`, `Address`, `nationalId`, `Fax`, `Email`, `Status`, `ContactName`, `ContactTel`, `openh1`, `openh2`, `offDay`) VALUES
(7, 'hospital 1', '1234', '123', 'isa town', '32436', '123', 'noomenf@gmail.com', 1, 'mohamer', '123', 7, 21, '');

-- --------------------------------------------------------

--
-- Table structure for table `medecine`
--

DROP TABLE IF EXISTS `medecine`;
CREATE TABLE IF NOT EXISTS `medecine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(100) NOT NULL,
  `ExDate` date NOT NULL,
  `Barcode` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medecine`
--

INSERT INTO `medecine` (`id`, `Description`, `ExDate`, `Barcode`) VALUES
(6, 'Adol', '2017-05-30', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `Reciver_Id` int(15) NOT NULL,
  `Sender_Id` int(15) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `sendDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isRead` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `Reciver_Id`, `Sender_Id`, `Subject`, `Message`, `sendDate`, `isRead`) VALUES
(34, 4, 4, '123', '123', '2018-05-22 00:01:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) NOT NULL,
  `Tel` varchar(20) NOT NULL,
  `Tel2` varchar(20) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `nationalId` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Natianlity` varchar(3) NOT NULL,
  `ContactName` varchar(50) NOT NULL,
  `ContactTel` varchar(20) NOT NULL,
  `Assurance` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `FName`, `Tel`, `Tel2`, `Address`, `nationalId`, `Email`, `Status`, `Natianlity`, `ContactName`, `ContactTel`, `Assurance`) VALUES
(4, 'Mohamed ali', '123', '321', 'manam', '987654', 'noomenf@gmail.com', 1, 'BH', 'mohmmed', '122', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

DROP TABLE IF EXISTS `pharmacy`;
CREATE TABLE IF NOT EXISTS `pharmacy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  `Tel` varchar(20) NOT NULL,
  `Tel2` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `nationalId` varchar(50) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `ContactName` varchar(50) NOT NULL,
  `ContactTel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `Description`, `Tel`, `Tel2`, `Address`, `nationalId`, `Fax`, `Email`, `Status`, `ContactName`, `ContactTel`) VALUES
(3, 'pharmcy 1', '331', '112', 'manama', '973234', '333', 'noomenf@gmail.com', 1, 'mohmmed', '122');

-- --------------------------------------------------------

--
-- Table structure for table `prospectionhd`
--

DROP TABLE IF EXISTS `prospectionhd`;
CREATE TABLE IF NOT EXISTS `prospectionhd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HospitalID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `pharmacyID` int(11) NOT NULL,
  `Status` tinyint(2) NOT NULL,
  `EntryDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospectionhd`
--

INSERT INTO `prospectionhd` (`id`, `HospitalID`, `patientID`, `pharmacyID`, `Status`, `EntryDate`) VALUES
(8, 7, 4, 0, 2, '2018-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `prospectiontran`
--

DROP TABLE IF EXISTS `prospectiontran`;
CREATE TABLE IF NOT EXISTS `prospectiontran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prospectionId` int(11) NOT NULL,
  `MedecineId` int(11) NOT NULL,
  `Dose` int(11) NOT NULL,
  `pDays` int(11) NOT NULL,
  `qty` enum('1-0-0','0-0-1','1-0-1','1-1-1','1-1-1-1') NOT NULL,
  `remarq` varchar(100) NOT NULL,
  `Recived` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospectiontran`
--

INSERT INTO `prospectiontran` (`id`, `prospectionId`, `MedecineId`, `Dose`, `pDays`, `qty`, `remarq`, `Recived`) VALUES
(17, 8, 6, 5, 7, '1-0-1', 'after food', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rejected_tasklist`
--

DROP TABLE IF EXISTS `rejected_tasklist`;
CREATE TABLE IF NOT EXISTS `rejected_tasklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Task_Description` varchar(100) NOT NULL,
  `Project_Name` varchar(15) NOT NULL,
  `Assign_To` varchar(15) NOT NULL,
  `Estimated_Time` varchar(10) NOT NULL,
  `DeadLine` date NOT NULL,
  `Completed_Date` date NOT NULL,
  `Severity` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Comments` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Task_Description` varchar(100) NOT NULL,
  `Project_Name` varchar(15) NOT NULL,
  `Assign_To` varchar(50) NOT NULL,
  `Estimated_Time` varchar(20) NOT NULL,
  `Severity` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `Date`, `Task_Description`, `Project_Name`, `Assign_To`, `Estimated_Time`, `Severity`, `Status`) VALUES
(8, '2017-08-20', '1414', 'dddddddd', 'dddddd', 'dd', 'ddd', 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `request_tasklist`
--

DROP TABLE IF EXISTS `request_tasklist`;
CREATE TABLE IF NOT EXISTS `request_tasklist` (
  `Task_No` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Task_Description` varchar(100) NOT NULL,
  `Project_Name` varchar(15) NOT NULL,
  `Estimated_Time` varchar(15) NOT NULL,
  `DeadLine` date NOT NULL,
  `NewDeadLine` date NOT NULL,
  `Completed_Date` date DEFAULT NULL,
  `Severity` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Comments` varchar(150) NOT NULL,
  `Requested_by` varchar(15) NOT NULL,
  `value` varchar(15) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`Task_No`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_tasklist`
--

INSERT INTO `request_tasklist` (`Task_No`, `Date`, `Task_Description`, `Project_Name`, `Estimated_Time`, `DeadLine`, `NewDeadLine`, `Completed_Date`, `Severity`, `Status`, `Comments`, `Requested_by`, `value`) VALUES
(12, '2017-08-14', 'SigCap', 'DocSafe', '5 days', '2017-08-14', '2017-08-24', NULL, 'High', 'Pending', 'Sorry', 'Zainab Jasim', 'Accepted'),
(13, '2017-08-24', 'Image Control', 'EAS', '1 day', '2017-08-25', '2017-08-27', NULL, 'High', 'Pending', 'Sorry', 'Zainab Jasim', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `sickleave`
--

DROP TABLE IF EXISTS `sickleave`;
CREATE TABLE IF NOT EXISTS `sickleave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HospitalID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `date` date NOT NULL,
  `days` int(11) NOT NULL,
  `EntryDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

DROP TABLE IF EXISTS `tasklist`;
CREATE TABLE IF NOT EXISTS `tasklist` (
  `Task_No` int(15) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Task_Description` varchar(100) NOT NULL,
  `Project_Name` varchar(15) NOT NULL,
  `Assign_To` varchar(30) NOT NULL,
  `Estimated_Time` varchar(20) NOT NULL,
  `DeadLine` date DEFAULT NULL,
  `Completed_Date` date DEFAULT NULL,
  `Severity` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Comments` varchar(100) NOT NULL,
  PRIMARY KEY (`Task_No`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`Task_No`, `Date`, `Task_Description`, `Project_Name`, `Assign_To`, `Estimated_Time`, `DeadLine`, `Completed_Date`, `Severity`, `Status`, `Comments`) VALUES
(1, '2017-08-11', 'Photo extractor utility  & Trigger-  shipment preparation and release', 'SigCap', 'Zainab Jasim', '1 week', '2017-08-17', NULL, 'high', 'Completed', ''),
(2, '2017-08-10', 'Webcapture Signatories error', 'SigCap', 'Yusuf Eftikhar Ahmed', '3 days', '2017-08-15', '2017-08-13', 'high', 'Completed', 'fixed the errors'),
(3, '2017-08-10', 'Errors in data insertion ', 'DocSafe', 'Yusuf Eftikhar Ahmed', '1 week', '2017-08-31', NULL, 'high', 'pending', 'chechking'),
(4, '2017-08-10', 'Cannot upload images', 'DocSafe', 'Zainab Jasim', '4 days', '2017-08-30', '2017-08-31', 'high', 'Completed', 'ttttttttttttttttt'),
(5, '2017-08-10', 'Add new feature to the edit menu', 'TAM', 'Yusuf Eftikhar Ahmed', '1 week', '2017-08-17', NULL, 'high', 'pending', ''),
(6, '2017-08-13', 'aaaaa', 'DocSafe', 'Yusuf Eftikhar Ahmed', '5 days', '2017-08-15', NULL, 'High', 'Pending', ''),
(7, '2017-08-14', 'SigCap', 'DocSafe', 'Zainab Jasim', '5 days', '2017-08-23', NULL, 'High', 'Pending', 'sss'),
(8, '2017-08-14', 'SigCap', 'DocSafe', 'test', '5 days', '2017-08-20', NULL, 'High', 'Pending', ''),
(9, '2017-08-22', 'SigCap Crashed', 'SigCap', 'ShakeebTariq', '2 days', '2017-08-24', NULL, 'Normal', 'Pending', ''),
(10, '2017-08-24', 'SigCap Crashed', 'SigCap', 'Shakeeb Tariq', '1 week', '2017-08-31', NULL, 'Normal', 'Pending', ''),
(11, '2017-08-24', 'DocSafe Opening Error ', 'DocSafe', 'Shakeeb Tariq', '2 days', '2017-08-26', NULL, 'High', 'Pending', ''),
(12, '2017-08-24', 'TAS Not working', 'TAS', 'Shakeeb Tariq', '1 day', '2017-08-24', NULL, 'High', 'Pending', ''),
(13, '2017-08-24', 'Image Control', 'EAS', 'Zainab Jasim', '1 day', '2017-08-25', NULL, 'High', 'Pending', ''),
(14, '2017-08-25', 'Does it work?', 'TAS', 'Zainab Jasim', '2 days', '2017-08-27', NULL, 'High', 'Pending', ''),
(15, '2017-08-20', 'tsting edit', 'ddddd', 'Zainab Jassim', '5 days', NULL, NULL, 'dd', 'as', '');

-- --------------------------------------------------------

--
-- Table structure for table `transferpatient`
--

DROP TABLE IF EXISTS `transferpatient`;
CREATE TABLE IF NOT EXISTS `transferpatient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PatientId` int(11) NOT NULL,
  `HospitalOrgId` int(11) NOT NULL,
  `HospitalRecId` int(11) NOT NULL,
  `Information` varchar(200) NOT NULL,
  `EntryDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transferpatient`
--

INSERT INTO `transferpatient` (`id`, `PatientId`, `HospitalOrgId`, `HospitalRecId`, `Information`, `EntryDate`) VALUES
(7, 4, 7, 7, 'kuhijkp[k ;k', '2018-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('Administrator','Pharmacy','Hospital','Patient') NOT NULL DEFAULT 'Patient',
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `F_name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `pwordAccept` tinyint(1) NOT NULL DEFAULT '0',
  `relatedId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`, `Status`, `F_name`, `Email`, `Address`, `Telephone`, `pwordAccept`, `relatedId`) VALUES
(4, 'admin', '46e44aa0bc21d8a826d79344df38be4b', 'Administrator', 1, 'Mohammad', 'noomenf@gmail.com', 'aaaa', '125455', 1, 1),
(28, '1234', '46e44aa0bc21d8a826d79344df38be4b', 'Hospital', 1, 'mohamed', 'noomenf@gmail.com', 'isa town', '123', 1, 7),
(29, '1122', '46e44aa0bc21d8a826d79344df38be4b', 'Pharmacy', 1, 'Ali', 'noomenf@gmail.com', 'manama', '123', 0, 3),
(31, '333', '46e44aa0bc21d8a826d79344df38be4b', 'Patient', 1, 'talal', 'noomenf@gmail.com', 'manama', '123', 0, 4),
(32, 'ph1', '626523f7f6948a38e2f68010cda2268c', 'Pharmacy', 1, '11', 'noomenf@gmail.com', '11', '11', 1, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
