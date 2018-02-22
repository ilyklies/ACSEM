-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 07:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_acsem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `AdminID` varchar(15) NOT NULL,
  `Afname` text NOT NULL,
  `Amname` text NOT NULL,
  `Alname` text NOT NULL,
  `Bdate` text NOT NULL,
  `Gender` text NOT NULL,
  `Aphoto` text NOT NULL,
  `Ausername` varchar(30) NOT NULL,
  `Apassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`AdminID`, `Afname`, `Amname`, `Alname`, `Bdate`, `Gender`, `Aphoto`, `Ausername`, `Apassword`) VALUES
('2014-211606', 'Hans Edwin Dale', 'Malolotskie', 'Pactol', '03/11/1995', 'Male', 'hans.jpg', 'ilyklies', 'ilyklies'),
('2014-999888', 'Admin', 'This', 'Admin', '07/12/1990', 'Male', 'user8-128x128.jpg', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `DepID` varchar(15) NOT NULL,
  `Depcode` text NOT NULL,
  `Depdes` text NOT NULL,
  `Deplogo` text NOT NULL,
  `Depcover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`DepID`, `Depcode`, `Depdes`, `Deplogo`, `Depcover`) VALUES
('1000-Dep', 'CCSE', 'College of Computer Studies And Engineering', 'ccse.png', 'purple.jpg'),
('1001-Dep', 'CBA', 'College of Business Administration', 'cba.png', 'yellow.jpg'),
('1002-Dep', 'CTHM', 'College of Tourism and Hospitality Management', 'cthm.jpg', 'red.jpg'),
('1003-Dep', 'SHS-11', 'Senior High School Grade 11', 'logo-default.png', 'grey.jpg'),
('1004-Dep', 'SHS-12', 'Senior High School Grade 12', 'logo-default1.png', 'grey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_edepartments`
--

CREATE TABLE `tbl_edepartments` (
  `EventID` varchar(15) NOT NULL,
  `DepID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_edepartments`
--

INSERT INTO `tbl_edepartments` (`EventID`, `DepID`) VALUES
('1000-Event', '1000-Dep'),
('1000-Event', '1001-Dep'),
('1000-Event', '1002-Dep'),
('1000-Event', '1003-Dep'),
('1000-Event', '1004-Dep');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_efacilitators`
--

CREATE TABLE `tbl_efacilitators` (
  `EventID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `FacilitatorID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_efacilitators`
--

INSERT INTO `tbl_efacilitators` (`EventID`, `SportsID`, `FacilitatorID`) VALUES
('1000-Event', '1000-Sports', '10000-2'),
('1000-Event', '1001-Sports', '10000-18'),
('1000-Event', '1002-Sports', '10000-13'),
('1000-Event', '1003-Sports', '2014-849123'),
('1000-Event', '1004-Sports', '10000-3'),
('1000-Event', '1005-Sports', '2013-456789'),
('1000-Event', '1006-Sports', '10000-1'),
('1000-Event', '1007-Sports', '2014-2110606'),
('1000-Event', '1008-Sports', '10000-19'),
('1000-Event', '1009-Sports', '10000-17'),
('1000-Event', '1010-Sports', '10000-16'),
('1000-Event', '1011-Sports', '10000-21'),
('1000-Event', '1012-Sports', '10000-15'),
('1000-Event', '1013-Sports', '10000-12'),
('1000-Event', '1014-Sports', '10000-14'),
('1000-Event', '1015-Sports', '10000-20'),
('1000-Event', '1016-Sports', '10000-8'),
('1000-Event', '1017-Sports', '10000-9'),
('1000-Event', '1020-Sports', '10000-6'),
('1000-Event', '1021-Sports', '10000-7'),
('1000-Event', '1022-Sports', '10000-4'),
('1000-Event', '1023-Sports', '10000-10'),
('1000-Event', '1024-Sports', '10000-11'),
('1000-Event', 'TBD', '10000-22'),
('1000-Event', 'TBD', '10000-23'),
('1000-Event', 'TBD', '10000-24'),
('1000-Event', 'TBD', '10000-5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_esplayers`
--

CREATE TABLE `tbl_esplayers` (
  `EventID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `DepID` varchar(15) NOT NULL,
  `StudID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_esplaying`
--

CREATE TABLE `tbl_esplaying` (
  `MatchID` varchar(15) NOT NULL,
  `StudID` varchar(15) NOT NULL,
  `GameSet` varchar(15) NOT NULL,
  `Depcode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_esports`
--

CREATE TABLE `tbl_esports` (
  `EventID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `Elimination` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_esports`
--

INSERT INTO `tbl_esports` (`EventID`, `SportsID`, `Elimination`) VALUES
('1000-Event', '1000-Sports', 'Double Elimination'),
('1000-Event', '1001-Sports', 'Round Robin'),
('1000-Event', '1002-Sports', 'Round Robin'),
('1000-Event', '1003-Sports', 'Double Elimination'),
('1000-Event', '1004-Sports', 'Double Elimination'),
('1000-Event', '1005-Sports', 'Double Elimination'),
('1000-Event', '1006-Sports', 'Double Elimination'),
('1000-Event', '1007-Sports', 'Double Elimination'),
('1000-Event', '1008-Sports', 'Round Robin'),
('1000-Event', '1009-Sports', 'Round Robin'),
('1000-Event', '1010-Sports', 'Round Robin'),
('1000-Event', '1011-Sports', 'Round Robin'),
('1000-Event', '1012-Sports', 'Round Robin'),
('1000-Event', '1013-Sports', 'Round Robin'),
('1000-Event', '1014-Sports', 'Round Robin'),
('1000-Event', '1015-Sports', 'Round Robin'),
('1000-Event', '1016-Sports', 'Round Robin'),
('1000-Event', '1017-Sports', 'Round Robin'),
('1000-Event', '1018-Sports', 'TBD'),
('1000-Event', '1019-Sports', 'TBD'),
('1000-Event', '1020-Sports', 'Round Robin'),
('1000-Event', '1021-Sports', 'Round Robin'),
('1000-Event', '1022-Sports', 'Double Elimination'),
('1000-Event', '1023-Sports', 'Round Robin'),
('1000-Event', '1024-Sports', 'Round Robin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `EventID` varchar(15) NOT NULL,
  `EventName` text NOT NULL,
  `EventDescription` text NOT NULL,
  `EventStart` text NOT NULL,
  `EventEnd` text NOT NULL,
  `Eventphoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`EventID`, `EventName`, `EventDescription`, `EventStart`, `EventEnd`, `Eventphoto`) VALUES
('1000-Event', 'PADULA 2018', 'TBD', '02/05/2018', '02/11/2018', 'Padula2k18.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facilitator`
--

CREATE TABLE `tbl_facilitator` (
  `FacilitatorID` varchar(15) NOT NULL,
  `Ffname` text NOT NULL,
  `Fmname` text NOT NULL,
  `Flname` text NOT NULL,
  `Fbdate` text NOT NULL,
  `Fgender` text NOT NULL,
  `Fphoto` text NOT NULL,
  `Fusername` varchar(30) NOT NULL,
  `Fpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_facilitator`
--

INSERT INTO `tbl_facilitator` (`FacilitatorID`, `Ffname`, `Fmname`, `Flname`, `Fbdate`, `Fgender`, `Fphoto`, `Fusername`, `Fpassword`) VALUES
('10000-1', 'Hans Dale', 'Malolot', 'Pactol-2nd', '03/11/1994', 'Male', 'people.png', 'ilyklies1', 'ilyklies1'),
('10000-10', 'Account', 'Type', 'Facilitator 7A', '01/28/2018', 'Male', '', 'account7a', 'account7a'),
('10000-11', 'Account', 'Type', 'Facilitator 7B', '01/29/2018', 'Male', '', 'account7b', 'account7b'),
('10000-12', 'Account', 'Type', 'Facilitator 8A', '01/30/2018', 'Female', '', 'account8a', 'account8a'),
('10000-13', 'Account', 'Type', 'Facilitator 8B', '01/31/2018', 'Male', '', 'account8b', 'account8b'),
('10000-14', 'Account', 'Type', 'Facilitator 9A', '01/31/2018', 'Male', '', 'account9a', 'account9a'),
('10000-15', 'Account', 'Type', 'Facilitator 9B', '02/02/2018', 'Male', '', 'account9b', 'account9b'),
('10000-16', 'Account', 'Type', 'Facilitator 10A', '02/01/2018', 'Male', '', 'account10a', 'account10a'),
('10000-17', 'Account', 'Type', 'Facilitator 10B', '02/03/2018', 'Male', '', 'account10b', 'account10b'),
('10000-18', 'Account', 'Type', 'Facilitator 11A', '01/31/2018', 'Female', '', 'account11a', 'account11a'),
('10000-19', 'Account', 'Type', 'Facilitator 11B', '02/03/2018', 'Male', '', 'account11b', 'account11b'),
('10000-2', 'Amiel', 'Amiel', 'Moreno', '01/03/1994', 'Male', '23658337_1499044166880029_3189642878827596246_n.jpg', 'amiel1', 'amiel1'),
('10000-20', 'Account', 'Type', 'Facilitator 12A', '02/04/2018', 'Male', '', 'account12a', 'account12a'),
('10000-21', 'Account', 'Type', 'Facilitator 12B', '02/04/2018', 'Male', '', 'account12b', 'account12b'),
('10000-22', 'Account', 'Type', 'Facilitator 13A', '02/05/2018', 'Male', '', 'account13a', 'account13a'),
('10000-23', 'Account', 'Type', 'Facilitator 13B', '02/06/2018', 'Male', '', 'account13b', 'account13b'),
('10000-24', 'Account', 'Type', 'Facilitator 13C', '02/07/2018', 'Male', '', 'account13c', 'account13c'),
('10000-3', 'Hanna Jane', 'Rubio', 'Rubio - 2nd', '01/15/1998', 'Female', 'avatar3.png', 'hanna1', 'hanna1'),
('10000-4', 'Account', 'Type', 'Facilitator 4A', '02/14/2018', 'Male', '', 'ilyklies', 'ilyklies'),
('10000-5', 'Account', 'Type', 'Facilitator 4B', '02/13/2018', 'Male', '', 'account4b', 'account4b'),
('10000-6', 'Account', 'Type', 'Facilitator 5A', '02/12/2018', 'Male', '', 'account5a', 'account5a'),
('10000-7', 'Account', 'Type', 'Facilitator 5B', '01/29/2018', 'Male', '', 'account5b', 'account5b'),
('10000-8', 'Account', 'Type', 'Facilitator 6A', '01/30/2018', 'Male', '', 'account6a', 'account6a'),
('10000-9', 'Account', 'Type', 'Facilitator 6B', '01/28/2018', 'Male', '', 'account6b', 'account6b'),
('2013-456789', 'Hanna Jane', 'Rubio', 'Rubio', '10/23/1997', 'Female', 'avatar3.png', 'hanna', 'hanna'),
('2014-2110606', 'Hans Edwin  Dale', 'Malolot', 'Pactol', '03/11/1995', 'Male', 'avatar5.png', 'ilyklies', 'ilyklies'),
('2014-849123', 'Amiel', 'Amiel', 'Moreno-2nd', '05/12/1993', 'Male', 'avatar04.png', 'amiel', 'amiel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gameplay`
--

CREATE TABLE `tbl_gameplay` (
  `GameID` varchar(15) NOT NULL,
  `MatchID` varchar(15) NOT NULL,
  `TeamAscore` varchar(15) NOT NULL,
  `TeamBscore` varchar(15) NOT NULL,
  `GameSet` varchar(30) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `TeamAstat` varchar(15) NOT NULL,
  `TeamBstat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gameplay`
--

INSERT INTO `tbl_gameplay` (`GameID`, `MatchID`, `TeamAscore`, `TeamBscore`, `GameSet`, `Status`, `TeamAstat`, `TeamBstat`) VALUES
('1000-Game', '1000-Match', '12', '28', 'Game', 'Done', '0', '1'),
('1002-Game', '1001-Match', '24', '11', 'Game', 'Done', '1', '0'),
('1003-Game', '1008-Match', '50', '69', 'Game', 'Done', '0', '1'),
('1004-Game', '1009-Match', '66', '33', 'Game', 'Done', '1', '0'),
('1005-Game', '1028-Match', '2', '4', 'Game', 'Done', '0', '1'),
('1006-Game', '1029-Match', '0', '3', 'Game', 'Done', '0', '1'),
('1007-Game', '1036-Match', '2', '5', 'Game', 'Done', '0', '1'),
('1008-Game', '1037-Match', '4', '7', 'Game', 'Done', '0', '1'),
('1009-Game', '1016-Match', '16', '25', 'Set 1', 'Done', '0', '1'),
('1010-Game', '1016-Match', '18', '25', 'Set 2', 'Done', '0', '1'),
('1011-Game', '1017-Match', '25', '18', 'Set 1', 'Done', '1', '0'),
('1012-Game', '1017-Match', '22', '25', 'Set 2', 'Done', '0', '1'),
('1013-Game', '1017-Match', '25', '10', 'Set 3', 'Done', '1', '0'),
('1014-Game', '1002-Match', '31', '8', 'Game', 'Done', '1', '0'),
('1015-Game', '1003-Match', '11', '21', 'Game', 'Done', '0', '1'),
('1016-Game', '1010-Match', '42', '52', 'Game', 'Done', '0', '1'),
('1017-Game', '1030-Match', '2', '1', 'Game', 'Done', '1', '0'),
('1018-Game', '1031-Match', '6', '5', 'Game', 'Done', '1', '0'),
('1019-Game', '1038-Match', '4', '0', 'Game', 'Done', '1', '0'),
('1020-Game', '1039-Match', '1', '6', 'Game', 'Done', '0', '1'),
('1021-Game', '1011-Match', '51', '31', 'Game', 'Done', '1', '0'),
('1022-Game', '1040-Match', '9', '8', 'Game', 'Done', '1', '0'),
('1023-Game', '1041-Match', '1', '5', 'Game', 'Done', '0', '1'),
('1024-Game', '1004-Match', '14', '26', 'Game', 'Done', '0', '1'),
('1025-Game', '1005-Match', '13', '25', 'Game', 'Done', '0', '1'),
('1026-Game', '1012-Match', '42', '52', 'Game', 'Done', '0', '1'),
('1027-Game', '1013-Match', '59', '69', 'Game', 'Done', '0', '1'),
('1028-Game', '1032-Match', '5', '1', 'Game', 'Done', '1', '0'),
('1029-Game', '1018-Match', '25', '18', 'Set 1', 'Done', '1', '0'),
('1030-Game', '1018-Match', '15', '25', 'Set 2', 'Done', '0', '1'),
('1031-Game', '1018-Match', '23', '25', 'Set 3', 'Done', '0', '1'),
('1039-Game', '1033-Match', '1', '3', 'Game', 'Done', '0', '1'),
('1042-Game', '1042-Match', '6', '5', 'Game', 'Done', '1', '0'),
('1043-Game', '1043-Match', '2', '3', 'Game', 'Done', '0', '1'),
('1044-Game', '1044-Match', '2', '1', 'Game', 'Done', '1', '0'),
('1045-Game', '1034-Match', '3', '1', 'Game', 'Done', '1', '0'),
('1046-Game', '1035-Match', '2', '1', 'Game', 'Done', '1', '0'),
('1047-Game', '1006-Match', '14', '11', 'Game', 'Done', '1', '0'),
('1048-Game', '1014-Match', '41', '49', 'Game', 'Done', '0', '1'),
('1049-Game', '1022-Match', '18', '25', 'Set 1', 'Done', '0', '1'),
('1050-Game', '1022-Match', '25', '27', 'Set 2', 'Done', '0', '1'),
('1051-Game', '1023-Match', '25', '22', 'Set 1', 'Done', '1', '0'),
('1052-Game', '1023-Match', '25', '18', 'Set 2', 'Done', '1', '0'),
('1071-Game', '1007-Match', '15', '11', 'Game', 'Done', '1', '0'),
('1072-Game', '1015-Match', '57', '48', 'Game', 'Done', '1', '0'),
('1073-Game', '1024-Match', '17', '25', 'Set 1', 'Done', '0', '1'),
('1074-Game', '1024-Match', '15', '25', 'Set 2', 'Done', '0', '1'),
('1075-Game', '1025-Match', '16', '25', 'Set 1', 'Done', '0', '1'),
('1076-Game', '1025-Match', '22', '25', 'Set 2', 'Done', '0', '1'),
('1077-Game', '1026-Match', '25', '20', 'Set 1', 'Done', '1', '0'),
('1078-Game', '1026-Match', '25', '14', 'Set 2', 'Done', '1', '0'),
('1079-Game', '1027-Match', '20', '25', 'Set 1', 'Done', '0', '1'),
('1080-Game', '1027-Match', '25', '22', 'Set 2', 'Done', '1', '0'),
('1081-Game', '1027-Match', '26', '24', 'Set 3', 'Done', '1', '0'),
('1082-Game', '1048-Match', '25', '17', 'Set 1', 'Done', '1', '0'),
('1083-Game', '1048-Match', '25', '21', 'Set 2', 'Done', '1', '0'),
('1084-Game', '1049-Match', '25', '20', 'Set 1', 'Done', '1', '0'),
('1085-Game', '1049-Match', '21', '25', 'Set 2', 'Done', '0', '1'),
('1086-Game', '1049-Match', '20', '25', 'Set 3', 'Done', '0', '1'),
('1087-Game', '1050-Match', '20', '25', 'Set 1', 'Done', '0', '1'),
('1088-Game', '1050-Match', '25', '21', 'Set 2', 'Done', '1', '0'),
('1089-Game', '1050-Match', '25', '20', 'Set 3', 'Done', '1', '0'),
('1090-Game', '1019-Match', '13', '25', 'Set 1', 'Done', '0', '1'),
('1091-Game', '1019-Match', '24', '26', 'Set 2', 'Done', '0', '1'),
('1092-Game', '1020-Match', '19', '25', 'Set 1', 'Done', '0', '1'),
('1093-Game', '1020-Match', '22', '25', 'Set 2', 'Done', '0', '1'),
('1094-Game', '1021-Match', '25', '19', 'Set 1', 'Done', '1', '0'),
('1095-Game', '1021-Match', '12', '25', 'Set 2', 'Done', '0', '1'),
('1096-Game', '1021-Match', '25', '14', 'Set 3', 'Done', '1', '0'),
('1097-Game', '1051-Match', '16', '25', 'Set 1', 'Done', '0', '1'),
('1098-Game', '1051-Match', '20', '25', 'Set 2', 'Done', '0', '1'),
('1099-Game', '1052-Match', '25', '20', 'Set 1', 'Done', '1', '0'),
('1100-Game', '1052-Match', '25', '10', 'Set 2', 'Done', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_points`
--

CREATE TABLE `tbl_points` (
  `ID` int(15) NOT NULL,
  `EventID` varchar(15) NOT NULL,
  `MatchID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `Depcode` varchar(15) NOT NULL,
  `Points` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_points`
--

INSERT INTO `tbl_points` (`ID`, `EventID`, `MatchID`, `SportsID`, `Depcode`, `Points`) VALUES
(1, '1000-Event', '1000-Match', '1003-Sports', 'CTHM', 1),
(2, '1000-Event', '1000-Match', '1003-Sports', 'CBA', 2),
(3, '1000-Event', '1001-Match', '1003-Sports', 'CCSE', 2),
(4, '1000-Event', '1001-Match', '1003-Sports', 'SHS-11', 1),
(5, '1000-Event', '1008-Match', '1000-Sports', 'CTHM', 1),
(6, '1000-Event', '1008-Match', '1000-Sports', 'CBA', 2),
(7, '1000-Event', '1009-Match', '1000-Sports', 'CCSE', 2),
(8, '1000-Event', '1009-Match', '1000-Sports', 'SHS-11', 1),
(9, '1000-Event', '1028-Match', '1007-Sports', 'CTHM', 1),
(10, '1000-Event', '1028-Match', '1007-Sports', 'CBA', 2),
(11, '1000-Event', '1029-Match', '1007-Sports', 'CCSE', 1),
(12, '1000-Event', '1029-Match', '1007-Sports', 'SHS-11', 2),
(13, '1000-Event', '1036-Match', '1006-Sports', 'CTHM', 1),
(14, '1000-Event', '1036-Match', '1006-Sports', 'CBA', 2),
(15, '1000-Event', '1037-Match', '1006-Sports', 'CCSE', 1),
(16, '1000-Event', '1037-Match', '1006-Sports', 'SHS-11', 2),
(17, '1000-Event', '1016-Match', '1005-Sports', 'CTHM', 1),
(18, '1000-Event', '1016-Match', '1005-Sports', 'CBA', 2),
(19, '1000-Event', '1017-Match', '1005-Sports', 'CCSE', 2),
(20, '1000-Event', '1017-Match', '1005-Sports', 'SHS-11', 1),
(21, '1000-Event', '1002-Match', '1003-Sports', 'SHS-12', 2),
(22, '1000-Event', '1002-Match', '1003-Sports', 'CBA', 1),
(23, '1000-Event', '1003-Match', '1003-Sports', 'CTHM', 1),
(24, '1000-Event', '1003-Match', '1003-Sports', 'SHS-11', 2),
(25, '1000-Event', '1010-Match', '1000-Sports', 'SHS-12', 1),
(26, '1000-Event', '1010-Match', '1000-Sports', 'CBA', 2),
(27, '1000-Event', '1030-Match', '1007-Sports', 'SHS-12', 2),
(28, '1000-Event', '1030-Match', '1007-Sports', 'CBA', 1),
(31, '1000-Event', '1031-Match', '1007-Sports', 'CTHM', 2),
(32, '1000-Event', '1031-Match', '1007-Sports', 'CCSE', 1),
(33, '1000-Event', '1038-Match', '1006-Sports', 'SHS-12', 2),
(34, '1000-Event', '1038-Match', '1006-Sports', 'CBA', 1),
(35, '1000-Event', '1039-Match', '1006-Sports', 'CTHM', 1),
(36, '1000-Event', '1039-Match', '1006-Sports', 'CCSE', 2),
(37, '1000-Event', '1011-Match', '1000-Sports', 'CTHM', 2),
(38, '1000-Event', '1011-Match', '1000-Sports', 'SHS-11', 1),
(39, '1000-Event', '1040-Match', '1006-Sports', 'SHS-11', 2),
(40, '1000-Event', '1040-Match', '1006-Sports', 'SHS-12', 1),
(41, '1000-Event', '1041-Match', '1006-Sports', 'CBA', 1),
(42, '1000-Event', '1041-Match', '1006-Sports', 'CCSE', 2),
(43, '1000-Event', '1004-Match', '1003-Sports', 'CCSE', 1),
(44, '1000-Event', '1004-Match', '1003-Sports', 'SHS-12', 2),
(45, '1000-Event', '1005-Match', '1003-Sports', 'CBA', 1),
(46, '1000-Event', '1005-Match', '1003-Sports', 'SHS-11', 2),
(47, '1000-Event', '1012-Match', '1000-Sports', 'CCSE', 1),
(48, '1000-Event', '1012-Match', '1000-Sports', 'CBA', 2),
(49, '1000-Event', '1013-Match', '1000-Sports', 'SHS-12', 1),
(50, '1000-Event', '1013-Match', '1000-Sports', 'CTHM', 2),
(51, '1000-Event', '1032-Match', '1007-Sports', 'SHS-11', 2),
(52, '1000-Event', '1032-Match', '1007-Sports', 'SHS-12', 1),
(53, '1000-Event', '1018-Match', '1005-Sports', 'SHS-12', 1),
(54, '1000-Event', '1018-Match', '1005-Sports', 'CBA', 2),
(55, '1000-Event', '1019-Match', '1005-Sports', 'CTHM', 1),
(56, '1000-Event', '1019-Match', '1005-Sports', 'SHS-11', 2),
(57, '1000-Event', '1020-Match', '1005-Sports', 'CCSE', 1),
(58, '1000-Event', '1020-Match', '1005-Sports', 'CBA', 2),
(59, '1000-Event', '1021-Match', '1005-Sports', 'SHS-12', 2),
(60, '1000-Event', '1021-Match', '1005-Sports', 'SHS-11', 1),
(61, '1000-Event', '1033-Match', '1007-Sports', 'CBA', 1),
(62, '1000-Event', '1033-Match', '1007-Sports', 'CTHM', 2),
(63, '1000-Event', '1034-Match', '1007-Sports', 'SHS-12', 2),
(64, '1000-Event', '1034-Match', '1007-Sports', 'CTHM', 1),
(65, '1000-Event', '1035-Match', '1007-Sports', 'SHS-11', 2),
(66, '1000-Event', '1035-Match', '1007-Sports', 'SHS-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `EventID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `Depcode` varchar(15) NOT NULL,
  `Rank` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rank`
--

INSERT INTO `tbl_rank` (`EventID`, `SportsID`, `Depcode`, `Rank`) VALUES
('1000-Event', '1000-Sports', 'CBA', '5'),
('1000-Event', '1000-Sports', 'CCSE', '3'),
('1000-Event', '1000-Sports', 'CTHM', '4'),
('1000-Event', '1000-Sports', 'SHS-11', '1'),
('1000-Event', '1000-Sports', 'SHS-12', '2'),
('1000-Event', '1003-Sports', 'CBA', '2'),
('1000-Event', '1003-Sports', 'CCSE', '4'),
('1000-Event', '1003-Sports', 'CTHM', '1'),
('1000-Event', '1003-Sports', 'SHS-11', '3'),
('1000-Event', '1003-Sports', 'SHS-12', '5'),
('1000-Event', '1004-Sports', 'CBA', '5'),
('1000-Event', '1004-Sports', 'CCSE', '4'),
('1000-Event', '1004-Sports', 'CTHM', '1'),
('1000-Event', '1004-Sports', 'SHS-11', '2'),
('1000-Event', '1004-Sports', 'SHS-12', '3'),
('1000-Event', '1005-Sports', 'CBA', '5'),
('1000-Event', '1005-Sports', 'CCSE', '3'),
('1000-Event', '1005-Sports', 'CTHM', '1'),
('1000-Event', '1005-Sports', 'SHS-11', '2'),
('1000-Event', '1005-Sports', 'SHS-12', '4'),
('1000-Event', '1006-Sports', 'CBA', '2'),
('1000-Event', '1006-Sports', 'CCSE', '3'),
('1000-Event', '1006-Sports', 'CTHM', '1'),
('1000-Event', '1006-Sports', 'SHS-11', '5'),
('1000-Event', '1006-Sports', 'SHS-12', '4'),
('1000-Event', '1007-Sports', 'CBA', '2'),
('1000-Event', '1007-Sports', 'CCSE', '1'),
('1000-Event', '1007-Sports', 'CTHM', '3'),
('1000-Event', '1007-Sports', 'SHS-11', '5'),
('1000-Event', '1007-Sports', 'SHS-12', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `MatchID` varchar(15) NOT NULL,
  `EventID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `Venue` varchar(30) NOT NULL,
  `Dates` varchar(15) NOT NULL,
  `StartTime` varchar(15) NOT NULL,
  `EndTime` varchar(15) NOT NULL,
  `TeamA` varchar(50) NOT NULL,
  `TeamB` varchar(50) NOT NULL,
  `MatchNo` int(20) NOT NULL,
  `Winner` varchar(20) NOT NULL,
  `Losser` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`MatchID`, `EventID`, `SportsID`, `Venue`, `Dates`, `StartTime`, `EndTime`, `TeamA`, `TeamB`, `MatchNo`, `Winner`, `Losser`, `Status`) VALUES
('1000-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/05/2018', '01:00 PM', '01:30 PM', 'CTHM', 'CBA', 1, 'CBA', 'CTHM', 'Done'),
('1001-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/05/2018', '01:30 PM', '02:00 PM', 'CCSE', 'SHS-11', 2, 'CCSE', 'SHS-11', 'Done'),
('1002-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/06/2018', '01:00 PM', '01:30 PM', 'SHS-12', 'CBA', 3, 'SHS-12', 'CBA', 'Done'),
('1003-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/06/2018', '01:30 PM', '02:00 PM', 'CTHM', 'SHS-11', 4, 'SHS-11', 'CTHM', 'Done'),
('1004-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/07/2018', '01:00 PM', '01:30 PM', 'CCSE', 'SHS-12', 5, 'SHS-12', 'CCSE', 'Done'),
('1005-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/07/2018', '01:30 PM', '02:00 PM', 'CBA', 'SHS-11', 6, 'SHS-11', 'CBA', 'Done'),
('1006-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/08/2018', '01:00 PM', '01:30 PM', 'CCSE', 'SHS-11', 7, 'CCSE', 'SHS-11', 'Done'),
('1007-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/09/2018', '09:30 AM', '10:00 AM', 'SHS-12', 'CCSE', 8, 'SHS-12', 'CCSE', 'Done'),
('1008-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/05/2018', '02:00 PM', '03:00 PM', 'CTHM', 'CBA', 1, 'CBA', 'CTHM', 'Done'),
('1009-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/05/2018', '03:00 PM', '04:00 PM', 'CCSE', 'SHS-11', 2, 'CCSE', 'SHS-11', 'Done'),
('1010-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/06/2018', '02:00 PM', '03:00 PM', 'SHS-12', 'CBA', 3, 'CBA', 'SHS-12', 'Done'),
('1011-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/06/2018', '03:00 PM', '04:00 PM', 'CTHM', 'SHS-11', 4, 'CTHM', 'SHS-11', 'Done'),
('1012-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/07/2018', '02:00 PM', '03:00 PM', 'CCSE', 'CBA', 5, 'CBA', 'CCSE', 'Done'),
('1013-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/07/2018', '03:00 PM', '04:00 PM', 'SHS-12', 'CTHM', 6, 'CTHM', 'SHS-12', 'Done'),
('1014-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/08/2018', '01:30 PM', '02:30 PM', 'CCSE', 'CTHM', 7, 'CTHM', 'CCSE', 'Done'),
('1015-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/09/2018', '10:00 AM', '11:00 AM', 'CBA', 'CTHM', 8, 'CBA', 'CTHM', 'Done'),
('1016-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/06/2018', '07:30 AM', '08:00 AM', 'CTHM', 'CBA', 1, 'CBA', 'CTHM', 'Done'),
('1017-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/06/2018', '08:00 AM', '08:30 AM', 'CCSE', 'SHS-11', 2, 'CCSE', 'SHS-11', 'Done'),
('1018-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/07/2018', '07:30 AM', '08:00 AM', 'SHS-12', 'CBA', 3, 'CBA', 'SHS-12', 'Done'),
('1019-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/07/2018', '08:00 AM', '08:30 AM', 'CTHM', 'SHS-11', 4, 'SHS-11', 'CTHM', 'Done'),
('1020-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/08/2018', '07:30 AM', '08:00 AM', 'CCSE', 'CBA', 5, 'CBA', 'CCSE', 'Done'),
('1021-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/08/2018', '08:00 AM', '08:30 AM', 'SHS-12', 'SHS-11', 6, 'SHS-12', 'SHS-11', 'Done'),
('1022-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/06/2018', '08:30 AM', '09:00 AM', 'CTHM', 'CBA', 1, 'CBA', 'CTHM', 'Done'),
('1023-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/06/2018', '09:00 AM', '09:30 AM', 'CCSE', 'SHS-11', 2, 'CCSE', 'SHS-11', 'Done'),
('1024-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/07/2018', '08:30 AM', '09:00 AM', 'SHS-12', 'CBA', 3, 'CBA', 'SHS-12', 'Done'),
('1025-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/07/2018', '09:00 AM', '09:30 AM', 'CTHM', 'SHS-11', 4, 'SHS-11', 'CTHM', 'Done'),
('1026-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/08/2018', '08:30 AM', '09:00 AM', 'CCSE', 'CBA', 5, 'CCSE', 'CBA', 'Done'),
('1027-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/08/2018', '09:00 AM', '09:30 AM', 'SHS-12', 'SHS-11', 6, 'SHS-12', 'SHS-11', 'Done'),
('1028-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/05/2018', '04:00 PM', '04:30 PM', 'CTHM', 'CBA', 1, 'CBA', 'CTHM', 'Done'),
('1029-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/05/2018', '04:30 PM', '05:00 PM', 'CCSE', 'SHS-11', 2, 'SHS-11', 'CCSE', 'Done'),
('1030-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/06/2018', '04:00 PM', '04:30 PM', 'SHS-12', 'CBA', 3, 'SHS-12', 'CBA', 'Done'),
('1031-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/06/2018', '04:30 PM', '05:00 PM', 'CTHM', 'CCSE', 4, 'CTHM', 'CCSE', 'Done'),
('1032-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/07/2018', '04:00 PM', '04:30 PM', 'SHS-11', 'SHS-12', 5, 'SHS-11', 'SHS-12', 'Done'),
('1033-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/07/2018', '04:30 PM', '05:00 PM', 'CBA', 'CTHM', 6, 'CTHM', 'CBA', 'Done'),
('1034-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/08/2018', '10:00 AM', '10:30 AM', 'SHS-12', 'CTHM', 7, 'SHS-12', 'CTHM', 'Done'),
('1035-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/08/2018', '03:00 PM', '03:30 PM', 'SHS-11', 'SHS-12', 8, 'SHS-11', 'SHS-12', 'Done'),
('1036-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/05/2018', '05:00 PM', '05:30 PM', 'CTHM', 'CBA', 1, 'CBA', 'CTHM', 'Done'),
('1037-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/05/2018', '05:30 PM', '06:00 PM', 'CCSE', 'SHS-11', 2, 'SHS-11', 'CCSE', 'Done'),
('1038-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/06/2018', '05:00 PM', '05:30 PM', 'SHS-12', 'CBA', 3, 'SHS-12', 'CBA', 'Done'),
('1039-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/06/2018', '05:30 PM', '06:00 PM', 'CTHM', 'CCSE', 4, 'CCSE', 'CTHM', 'Done'),
('1040-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/07/2018', '05:00 PM', '05:30 PM', 'SHS-11', 'SHS-12', 5, 'SHS-11', 'SHS-12', 'Done'),
('1041-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/07/2018', '05:30 PM', '06:00 PM', 'CBA', 'CCSE', 6, 'CCSE', 'CBA', 'Done'),
('1042-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/08/2018', '10:30 AM', '11:00 AM', 'SHS-12', 'CCSE', 7, 'SHS-12', 'CCSE', 'Done'),
('1043-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/08/2018', '03:30 PM', '04:00 PM', 'SHS-11', 'SHS-12', 8, 'SHS-12', 'SHS-11', 'Done'),
('1044-Match', '1000-Event', '1006-Sports', 'Gym Court', '02/08/2018', '04:00 PM', '04:30 AM', 'SHS-11', 'SHS-12', 9, 'SHS-11', 'SHS-12', 'Done'),
('1045-Match', '1000-Event', '1007-Sports', 'Gym Court', '02/08/2018', '03:30 PM', '04:00 PM', 'Twice To Beat A', 'Twice To Beat B', 9, '', '', ''),
('1046-Match', '1000-Event', '1003-Sports', 'Gym Court', '02/09/2018', '10:00 AM', '10:30 AM', 'Twice To Beat A', 'Twice To Beat B', 9, '', '', ''),
('1047-Match', '1000-Event', '1000-Sports', 'Gym Court', '02/09/2018', '11:00 AM', '11:30 AM', 'Twice To Beat A', 'Twice To Beat B', 9, '', '', ''),
('1048-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/08/2018', '08:00 AM', '08:45 AM', 'CBA', 'SHS-12', 7, 'CBA', 'SHS-12', 'Done'),
('1049-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/09/2018', '09:30 AM', '10:30 AM', 'CCSE', 'CBA', 8, 'CBA', 'CCSE', 'Done'),
('1050-Match', '1000-Event', '1004-Sports', 'Gym Court', '02/09/2018', '08:30 AM', '09:00 AM', 'CBA', 'CCSE', 9, 'CBA', 'CCSE', 'Done'),
('1051-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/08/2018', '09:00 AM', '09:30 AM', 'CCSE', 'SHS-12', 7, 'SHS-12', 'CCSE', 'Done'),
('1052-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/09/2018', '08:00 AM', '08:30 AM', 'CBA', 'SHS-12', 8, 'CBA', 'SHS-12', 'Done'),
('1053-Match', '1000-Event', '1005-Sports', 'Gym Court', '02/09/2018', '08:30 AM', '09:00 AM', 'Twice To Beat A', 'Twice To Beat B', 9, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sportpoints`
--

CREATE TABLE `tbl_sportpoints` (
  `EventID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `Depcode` varchar(15) NOT NULL,
  `Points` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sportpoints`
--

INSERT INTO `tbl_sportpoints` (`EventID`, `SportsID`, `Depcode`, `Points`) VALUES
('1000-Event', '1000-Sports', 'CBA', 50),
('1000-Event', '1000-Sports', 'CCSE', 30),
('1000-Event', '1000-Sports', 'CTHM', 40),
('1000-Event', '1000-Sports', 'SHS-11', 10),
('1000-Event', '1000-Sports', 'SHS-12', 20),
('1000-Event', '1003-Sports', 'CBA', 20),
('1000-Event', '1003-Sports', 'CCSE', 40),
('1000-Event', '1003-Sports', 'CTHM', 10),
('1000-Event', '1003-Sports', 'SHS-11', 30),
('1000-Event', '1003-Sports', 'SHS-12', 50),
('1000-Event', '1004-Sports', 'CBA', 50),
('1000-Event', '1004-Sports', 'CCSE', 40),
('1000-Event', '1004-Sports', 'CTHM', 10),
('1000-Event', '1004-Sports', 'SHS-11', 20),
('1000-Event', '1004-Sports', 'SHS-12', 30),
('1000-Event', '1005-Sports', 'CBA', 50),
('1000-Event', '1005-Sports', 'CCSE', 30),
('1000-Event', '1005-Sports', 'CTHM', 10),
('1000-Event', '1005-Sports', 'SHS-11', 20),
('1000-Event', '1005-Sports', 'SHS-12', 40),
('1000-Event', '1006-Sports', 'CBA', 20),
('1000-Event', '1006-Sports', 'CCSE', 30),
('1000-Event', '1006-Sports', 'CTHM', 10),
('1000-Event', '1006-Sports', 'SHS-11', 50),
('1000-Event', '1006-Sports', 'SHS-12', 40),
('1000-Event', '1007-Sports', 'CBA', 20),
('1000-Event', '1007-Sports', 'CCSE', 10),
('1000-Event', '1007-Sports', 'CTHM', 30),
('1000-Event', '1007-Sports', 'SHS-11', 50),
('1000-Event', '1007-Sports', 'SHS-12', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sportreport`
--

CREATE TABLE `tbl_sportreport` (
  `EventID` varchar(15) NOT NULL,
  `SportsID` varchar(15) NOT NULL,
  `FCname` varchar(50) NOT NULL,
  `Fstatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sportreport`
--

INSERT INTO `tbl_sportreport` (`EventID`, `SportsID`, `FCname`, `Fstatus`) VALUES
('1000-Event', '1000-Sports', 'Amiel Moreno', 'Verified'),
('1000-Event', '1003-Sports', 'Amiel Moreno-2nd', 'Verified'),
('1000-Event', '1004-Sports', 'Hanna Jane Rubio - 2nd', 'Verified'),
('1000-Event', '1005-Sports', 'Hanna Jane Rubio', 'Verified'),
('1000-Event', '1006-Sports', 'Hans Dale Pactol-2nd', 'Verified'),
('1000-Event', '1007-Sports', 'Hans Edwin  Dale Pactol', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sports`
--

CREATE TABLE `tbl_sports` (
  `SportsID` varchar(15) NOT NULL,
  `SportsName` text NOT NULL,
  `SportsRules` text NOT NULL,
  `SportsCategory` text NOT NULL,
  `SportsType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sports`
--

INSERT INTO `tbl_sports` (`SportsID`, `SportsName`, `SportsRules`, `SportsCategory`, `SportsType`) VALUES
('1000-Sports', 'Basketball Men', '5 vs 5 ', 'Men', 'Team'),
('1001-Sports', 'Table Tennis Men Singles', 'TBD', 'Men', 'Single/Paired'),
('1002-Sports', 'Badminton Women Singles', 'TBD', 'Women', 'Single/Paired'),
('1003-Sports', 'Basketball Women', 'TBD', 'Women', 'Team'),
('1004-Sports', 'Valleyball Men', 'TBD', 'Men', 'Team'),
('1005-Sports', 'Valleyball Women', 'TBD', 'Women', 'Team'),
('1006-Sports', 'Footsal Men', 'TBD', 'Men', 'Team'),
('1007-Sports', 'Footsal Women', 'TBD', 'Women', 'Team'),
('1008-Sports', 'Table Tennis Women Singles', 'TBD', 'Women', 'Single/Paired'),
('1009-Sports', 'Table Tennis Women Doubles', 'TBD', 'Women', 'Single/Paired'),
('1010-Sports', 'Table Tennis Men Doubles', 'TBD', 'Men', 'Single/Paired'),
('1011-Sports', 'Table Tennis Mix Doubles', 'TBD', 'Mix', 'Single/Paired'),
('1012-Sports', 'Badminton Women Doubles', 'TBD', 'Women', 'Single/Paired'),
('1013-Sports', 'Badminton Men Singles', 'TBD', 'Men', 'Single/Paired'),
('1014-Sports', 'Badminton Men Doubles', 'TBD', 'Men', 'Single/Paired'),
('1015-Sports', 'Badminton Mix Doubles', 'TBD', 'Mix', 'Single/Paired'),
('1016-Sports', 'Sipak Takraw Men', 'TBD', 'Men', 'Team'),
('1017-Sports', 'Sipak Takraw Women', 'TBD', 'Women', 'Team'),
('1018-Sports', 'Running Men', 'TBD', 'Men', 'Single/Paired'),
('1019-Sports', 'Running Women', 'TBD', 'Women', 'Single/Paired'),
('1020-Sports', 'Dart Men', 'TBD', 'Men', 'Single/Paired'),
('1021-Sports', 'Dart Women', 'TBD', 'Women', 'Single/Paired'),
('1022-Sports', 'Ultimate Frisbee Mix', 'TBF', 'Mix', 'Team'),
('1023-Sports', 'Chess Men', 'TBD', 'Men', 'Single/Paired'),
('1024-Sports', 'Chess Women', 'TBD', 'Women', 'Single/Paired');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `StudID` varchar(15) NOT NULL,
  `Sfname` text NOT NULL,
  `Smname` text NOT NULL,
  `Slname` text NOT NULL,
  `Sgender` text NOT NULL,
  `DepID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`AdminID`,`Ausername`,`Apassword`),
  ADD UNIQUE KEY `Ausername` (`Ausername`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`DepID`),
  ADD UNIQUE KEY `DepID` (`DepID`);

--
-- Indexes for table `tbl_edepartments`
--
ALTER TABLE `tbl_edepartments`
  ADD PRIMARY KEY (`EventID`,`DepID`);

--
-- Indexes for table `tbl_efacilitators`
--
ALTER TABLE `tbl_efacilitators`
  ADD PRIMARY KEY (`EventID`,`SportsID`,`FacilitatorID`);

--
-- Indexes for table `tbl_esplayers`
--
ALTER TABLE `tbl_esplayers`
  ADD PRIMARY KEY (`EventID`,`SportsID`,`DepID`,`StudID`);

--
-- Indexes for table `tbl_esplaying`
--
ALTER TABLE `tbl_esplaying`
  ADD PRIMARY KEY (`MatchID`,`StudID`);

--
-- Indexes for table `tbl_esports`
--
ALTER TABLE `tbl_esports`
  ADD PRIMARY KEY (`EventID`,`SportsID`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`EventID`),
  ADD UNIQUE KEY `EventID` (`EventID`);

--
-- Indexes for table `tbl_facilitator`
--
ALTER TABLE `tbl_facilitator`
  ADD PRIMARY KEY (`FacilitatorID`),
  ADD UNIQUE KEY `FacilitatorID` (`FacilitatorID`);

--
-- Indexes for table `tbl_gameplay`
--
ALTER TABLE `tbl_gameplay`
  ADD PRIMARY KEY (`GameID`,`MatchID`);

--
-- Indexes for table `tbl_points`
--
ALTER TABLE `tbl_points`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`EventID`,`SportsID`,`Depcode`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`MatchID`,`EventID`,`SportsID`,`MatchNo`);

--
-- Indexes for table `tbl_sportpoints`
--
ALTER TABLE `tbl_sportpoints`
  ADD PRIMARY KEY (`EventID`,`SportsID`,`Depcode`);

--
-- Indexes for table `tbl_sportreport`
--
ALTER TABLE `tbl_sportreport`
  ADD PRIMARY KEY (`EventID`,`SportsID`,`FCname`);

--
-- Indexes for table `tbl_sports`
--
ALTER TABLE `tbl_sports`
  ADD PRIMARY KEY (`SportsID`),
  ADD UNIQUE KEY `SportsID` (`SportsID`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`StudID`),
  ADD UNIQUE KEY `StudID` (`StudID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_points`
--
ALTER TABLE `tbl_points`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
