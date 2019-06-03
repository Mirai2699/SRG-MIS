-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 11:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srg_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `srg_ams_r_time_requirement`
--

CREATE TABLE `srg_ams_r_time_requirement` (
  `TIME_No` int(11) NOT NULL,
  `TIME_Punctual_Ref` time NOT NULL,
  `TIME_OnT_Ref` time NOT NULL,
  `TIME_Grace_Ref` time NOT NULL,
  `TIME_Late_Ref` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_ams_r_time_requirement`
--

INSERT INTO `srg_ams_r_time_requirement` (`TIME_No`, `TIME_Punctual_Ref`, `TIME_OnT_Ref`, `TIME_Grace_Ref`, `TIME_Late_Ref`) VALUES
(1, '07:00:00', '08:00:00', '11:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `srg_ams_t_attendance`
--

CREATE TABLE `srg_ams_t_attendance` (
  `A_No` int(11) NOT NULL,
  `A_Member` varchar(50) NOT NULL,
  `A_Date_Attend` date NOT NULL,
  `A_Status` varchar(20) NOT NULL,
  `A_Remarks` varchar(20) NOT NULL,
  `A_Time_Remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_ams_t_attendance`
--

INSERT INTO `srg_ams_t_attendance` (`A_No`, `A_Member`, `A_Date_Attend`, `A_Status`, `A_Remarks`, `A_Time_Remarks`) VALUES
(1, 'Cristian Balatbat', '2018-07-02', 'Logged-Out', 'PRESENT', 'Late'),
(2, 'Keith Eyvan Alvior', '2018-07-02', 'Logged-Out', 'PRESENT', 'Late'),
(3, 'John Patrick Loyola', '2018-07-02', 'Logged-Out', 'PRESENT', 'Late'),
(4, 'Julie Ann Resnera', '2018-07-02', 'Logged-Out', 'PRESENT', 'Late'),
(5, 'Joshua Miguel Magtibay', '2018-07-02', 'Logged-In', 'PRESENT', 'Late'),
(6, 'Gerard Maglaque', '2018-07-02', 'Logged-Out', 'PRESENT', 'Late'),
(7, 'Cristian Balatbat', '2018-07-04', 'Logged-Out', 'PRESENT', 'Ontime'),
(8, 'Gerard Maglaque', '2018-07-04', 'Logged-Out', 'PRESENT', 'Ontime'),
(9, 'Oliver Gabriel', '2018-07-04', 'Logged-Out', 'PRESENT', 'Ontime'),
(10, 'Joshua Miguel Magtibay', '2018-07-04', 'Logged-In', 'PRESENT', 'Late'),
(11, 'John Patrick Loyola', '2018-07-04', 'Logged-Out', 'PRESENT', 'Late'),
(12, 'Lowell Dave  Agnir', '2018-07-04', 'Logged-Out', 'PRESENT', 'Late'),
(13, 'Keith Eyvan Alvior', '2018-07-04', 'Logged-In', 'PRESENT', 'Late'),
(14, 'Julie Ann Resnera', '2018-07-04', 'Logged-Out', 'PRESENT', 'Late'),
(15, 'Peter John Teneza', '2018-07-04', 'Logged-Out', 'PRESENT', 'Late'),
(16, 'Ma Michaela Alejandria', '2018-07-04', 'Logged-Out', 'PRESENT', 'Late'),
(17, 'Bryan Cortesiano', '2018-07-04', 'Logged-In', 'PRESENT', 'Late'),
(18, 'Oliver Gabriel', '2018-07-06', 'Logged-In', 'PRESENT', 'Late'),
(19, 'Cristian Balatbat', '2018-07-06', 'Logged-In', 'PRESENT', 'Late'),
(20, 'Gerard Maglaque', '2018-07-06', 'Logged-In', 'PRESENT', 'Late'),
(21, 'Bryan Cortesiano', '2018-07-06', 'Logged-In', 'PRESENT', 'Late'),
(22, 'John Patrick Loyola', '2018-07-06', 'Logged-In', 'PRESENT', 'Late'),
(23, 'Joshua Miguel Magtibay', '2018-07-06', 'Logged-In', 'PRESENT', 'Late'),
(24, 'Lowell Dave  Agnir', '2018-07-06', 'Logged-Out', 'PRESENT', 'Late'),
(25, 'Mary Joy Asusula', '2018-07-10', 'Logged-In', 'PRESENT', 'Late'),
(26, 'John Patrick Loyola', '2018-07-24', 'Logged-In', 'PRESENT', 'Late'),
(27, 'Oliver Gabriel', '2018-07-24', 'Logged-In', 'PRESENT', 'Late'),
(28, 'Ma Michaela Alejandria', '2018-07-24', 'Logged-In', 'PRESENT', 'Late'),
(29, 'Lowell Dave  Agnir', '2018-10-04', 'Logged-Out', 'PRESENT', 'Late');

-- --------------------------------------------------------

--
-- Table structure for table `srg_ams_t_time_in`
--

CREATE TABLE `srg_ams_t_time_in` (
  `TI_No` int(11) NOT NULL,
  `TI_Member` varchar(50) NOT NULL,
  `TI_Member_ID` int(11) NOT NULL,
  `TI_Date_In` date NOT NULL,
  `TI_Time_In` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_ams_t_time_in`
--

INSERT INTO `srg_ams_t_time_in` (`TI_No`, `TI_Member`, `TI_Member_ID`, `TI_Date_In`, `TI_Time_In`) VALUES
(1, 'Cristian Balatbat', 1, '2018-07-02', '01:07:57'),
(2, 'Keith Eyvan Alvior', 7, '2018-07-02', '01:08:12'),
(3, 'John Patrick Loyola', 9, '2018-07-02', '01:12:03'),
(4, 'Julie Ann Resnera', 4, '2018-07-02', '01:12:12'),
(5, 'Joshua Miguel Magtibay', 8, '2018-07-02', '01:12:18'),
(6, 'Gerard Maglaque', 5, '2018-07-02', '01:12:26'),
(7, 'Cristian Balatbat', 1, '2018-07-04', '09:56:51'),
(8, 'Gerard Maglaque', 5, '2018-07-04', '09:56:59'),
(10, 'Oliver Gabriel', 10, '2018-07-04', '10:49:51'),
(11, 'Joshua Miguel Magtibay', 8, '2018-07-04', '12:49:58'),
(12, 'John Patrick Loyola', 9, '2018-07-04', '01:16:28'),
(13, 'Lowell Dave  Agnir', 11, '2018-07-04', '01:57:48'),
(14, 'Keith Eyvan Alvior', 7, '2018-07-04', '05:47:36'),
(15, 'Julie Ann Resnera', 4, '2018-07-04', '05:47:51'),
(16, 'Peter John Teneza', 12, '2018-07-04', '05:48:09'),
(17, 'Ma Michaela Alejandria', 2, '2018-07-04', '06:16:48'),
(18, 'Bryan Cortesiano', 3, '2018-07-04', '06:27:29'),
(19, 'Oliver Gabriel', 10, '2018-07-06', '09:35:19'),
(20, 'Cristian Balatbat', 1, '2018-07-06', '09:39:48'),
(21, 'Gerard Maglaque', 5, '2018-07-06', '10:05:37'),
(22, 'Bryan Cortesiano', 3, '2018-07-06', '10:05:56'),
(23, 'John Patrick Loyola', 9, '2018-07-06', '11:58:10'),
(24, 'Joshua Miguel Magtibay', 8, '2018-07-06', '11:58:16'),
(25, 'Lowell Dave  Agnir', 11, '2018-07-06', '11:58:35'),
(26, 'Mary Joy Asusula', 6, '2018-07-10', '04:37:41'),
(27, 'John Patrick Loyola', 9, '2018-07-24', '04:39:28'),
(28, 'Oliver Gabriel', 10, '2018-07-24', '04:39:36'),
(29, 'Ma Michaela Alejandria', 2, '2018-07-24', '04:40:06'),
(30, 'Lowell Dave  Agnir', 11, '2018-10-04', '07:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `srg_ams_t_time_out`
--

CREATE TABLE `srg_ams_t_time_out` (
  `TO_No` int(11) NOT NULL,
  `TO_Member` varchar(50) NOT NULL,
  `TO_Member_ID` int(11) NOT NULL,
  `TO_Date_Out` date NOT NULL,
  `TO_Time_Out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_ams_t_time_out`
--

INSERT INTO `srg_ams_t_time_out` (`TO_No`, `TO_Member`, `TO_Member_ID`, `TO_Date_Out`, `TO_Time_Out`) VALUES
(1, 'Keith Eyvan Alvior', 7, '2018-07-02', '01:08:20'),
(3, 'Gerard Maglaque', 5, '2018-07-04', '06:36:05'),
(4, 'Cristian Balatbat', 1, '2018-07-04', '06:36:17'),
(5, 'Ma Michaela Alejandria', 2, '2018-07-04', '06:39:50'),
(6, 'Oliver Gabriel', 10, '2018-07-04', '06:39:59'),
(7, 'Peter John Teneza', 12, '2018-07-04', '06:40:12'),
(8, 'Lowell Dave  Agnir', 11, '2018-07-04', '06:40:34'),
(9, 'Julie Ann Resnera', 4, '2018-07-04', '06:44:08'),
(10, 'John Patrick Loyola', 9, '2018-07-04', '07:26:57'),
(11, 'Lowell Dave  Agnir', 11, '2018-10-04', '07:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `srg_fms_r_fund`
--

CREATE TABLE `srg_fms_r_fund` (
  `F_ID` int(11) NOT NULL,
  `F_TotalFund` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_fms_r_fund`
--

INSERT INTO `srg_fms_r_fund` (`F_ID`, `F_TotalFund`) VALUES
(1, 1296);

-- --------------------------------------------------------

--
-- Table structure for table `srg_fms_t_deposit`
--

CREATE TABLE `srg_fms_t_deposit` (
  `D_No` int(11) NOT NULL,
  `D_Depositor` varchar(50) NOT NULL,
  `D_Amount` double NOT NULL,
  `D_Date_Deposited` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_fms_t_deposit`
--

INSERT INTO `srg_fms_t_deposit` (`D_No`, `D_Depositor`, `D_Amount`, `D_Date_Deposited`) VALUES
(1, 'Cristian Balatbat', 25, '2018-07-04'),
(2, 'Oliver Gabriel', 25, '2018-07-04'),
(3, 'Joshua Miguel Magtibay', 100, '2018-07-04'),
(4, 'Gerard Maglaque', 25, '2018-07-04'),
(5, 'John Patrick Loyola', 15, '2018-07-04'),
(6, 'Keith Eyvan Alvior', 5, '2018-07-04'),
(7, 'Julie Ann Resnera', 25, '2018-07-04'),
(8, 'Ma Michaela Alejandria', 5, '2018-07-04'),
(9, 'Bryan Cortesiano', 5, '2018-07-04'),
(10, 'Mary Joy Asusula', 25, '2018-07-04'),
(11, 'Bryan Cortesiano', 5, '2018-07-04'),
(12, 'Peter John Teneza', 25, '2018-07-06'),
(13, 'Lowell Dave  Agnir', 10, '2018-07-06'),
(14, 'Bryan Cortesiano', 15, '2018-07-06'),
(15, 'Keith Eyvan Alvior', 20, '2018-07-06'),
(16, 'Ma Michaela Alejandria', 5, '2018-07-06'),
(17, 'Julie Ann Resnera', 10, '2018-07-13'),
(18, 'Keith Eyvan Alvior', 20, '2018-07-13'),
(19, 'Oliver Gabriel', 20, '2018-07-13'),
(20, 'Lowell Dave  Agnir', 25, '2018-07-13'),
(21, 'Ma Michaela Alejandria', 25, '2018-07-13'),
(22, 'Julie Ann Resnera', 20, '2018-07-24'),
(23, 'Lowell Dave  Agnir', 20, '2018-07-24'),
(24, 'Ma Michaela Alejandria', 20, '2018-07-24'),
(25, 'Keith Eyvan Alvior', 20, '2018-07-24'),
(26, 'Gerard Maglaque', 10, '2018-07-24'),
(27, 'Lowell Dave  Agnir', 50, '2018-09-04'),
(28, 'Keith Eyvan Alvior', 50, '2018-09-02'),
(29, 'Oliver Gabriel', 60, '2018-09-06'),
(30, 'Cristian Balatbat', 80, '2018-09-06'),
(31, 'Peter John Teneza', 100, '2018-09-08'),
(32, 'John Patrick Loyola', 100, '2018-09-09'),
(33, 'Julie Ann Resnera', 100, '2018-09-09'),
(34, 'Oliver Gabriel', 20, '2018-10-12'),
(35, 'Lowell Dave  Agnir', 20, '2018-10-13'),
(36, 'Ma Michaela Alejandria', 100, '2018-10-13'),
(37, 'Ma Michaela Alejandria', 10, '2018-10-13'),
(38, 'Julie Ann Resnera', 10, '2018-10-13'),
(39, 'Cristian Balatbat', 100, '2018-11-13'),
(40, 'Joshua Miguel Magtibay', 100, '2018-11-13'),
(41, 'Bryan Cortesiano', 100, '2018-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `srg_fms_t_expenses`
--

CREATE TABLE `srg_fms_t_expenses` (
  `Ex_No` int(11) NOT NULL,
  `Ex_Description` varchar(100) NOT NULL,
  `Ex_Amount` double NOT NULL,
  `Ex_SumBatch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_fms_t_expenses`
--

INSERT INTO `srg_fms_t_expenses` (`Ex_No`, `Ex_Description`, `Ex_Amount`, `Ex_SumBatch`) VALUES
(1, 'Casino Alcohol 70%', 74.25, 1),
(2, 'Glade Air Freshener', 147.25, 1),
(3, 'Kleenex Tissue Paper', 83.75, 1),
(4, 'Plastic Bag x5', 50, 1),
(5, 'Marker', 20, 2),
(6, 'Joylarge', 15, 3),
(7, 'Garbage Bag x 5', 50, 4),
(8, 'Face Mask x 3', 18, 4),
(9, 'Plastic Cups Pack x 1  ', 20, 4),
(10, 'Ethyl Alcohol', 67.75, 5),
(11, 'Tissue (Coreless)', 22.25, 5),
(12, 'Plastic Fork 2-pack 25 Pieces each', 30, 6),
(13, 'Plastic Spoon 1-pack 25 Pieces each', 15, 6),
(14, 'Garbage Bag x 5', 50, 7),
(15, 'Lamination', 120, 8),
(16, 'Downy', 10, 8),
(17, 'Printing', 23, 9),
(18, 'Tissue (Coreless)', 23, 10),
(19, 'alcohol ', 73, 10);

-- --------------------------------------------------------

--
-- Table structure for table `srg_fms_t_expenses_summary`
--

CREATE TABLE `srg_fms_t_expenses_summary` (
  `ES_No` int(11) NOT NULL,
  `ES_EntryNo` int(11) NOT NULL,
  `ES_Description` varchar(100) NOT NULL,
  `ES_TotalAmount` double DEFAULT NULL,
  `ES_DateEntry` date NOT NULL,
  `ES_DateSpent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_fms_t_expenses_summary`
--

INSERT INTO `srg_fms_t_expenses_summary` (`ES_No`, `ES_EntryNo`, `ES_Description`, `ES_TotalAmount`, `ES_DateEntry`, `ES_DateSpent`) VALUES
(1, 1, 'First Prio Goods', 355.25, '2018-07-13', '2018-07-13'),
(2, 2, 'Marker', 20, '2018-07-24', '2018-07-24'),
(3, 3, 'Panglinis ng board', 15, '2018-08-01', '2018-08-01'),
(4, 4, 'Linis University Bilihin', 88, '2018-10-04', '2018-09-17'),
(5, 5, 'Hygiene Supplies', 90, '2018-10-11', '2018-10-08'),
(6, 6, 'Utensils', 45, '2018-11-12', '2018-11-06'),
(7, 7, 'Garbage', 50, '2018-11-13', '2018-11-14'),
(8, 8, 'Before Accre', 130, '2018-11-19', '2018-09-11'),
(9, 9, 'Brochure Printing  ', 23, '2018-11-20', '2018-11-20'),
(10, 10, 'Sanitary Needs', 96, '2018-11-27', '2018-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `srg_fms_t_income`
--

CREATE TABLE `srg_fms_t_income` (
  `IC_No` int(11) NOT NULL,
  `IC_Description` varchar(100) NOT NULL,
  `IC_Amount` double NOT NULL,
  `IC_DateEntry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_fms_t_income`
--

INSERT INTO `srg_fms_t_income` (`IC_No`, `IC_Description`, `IC_Amount`, `IC_DateEntry`) VALUES
(1, 'Food Supplies', 180, '2018-11-17'),
(2, 'Food Supply (Milo)', 8, '2018-11-17'),
(3, 'Papel benta sa junk shop', 390, '2018-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `srg_fms_t_prio_materials`
--

CREATE TABLE `srg_fms_t_prio_materials` (
  `No` int(11) NOT NULL,
  `Description` varchar(70) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Priolevel` varchar(20) NOT NULL,
  `Date_Added` date NOT NULL,
  `Active` varchar(5) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_fms_t_prio_materials`
--

INSERT INTO `srg_fms_t_prio_materials` (`No`, `Description`, `Status`, `Priolevel`, `Date_Added`, `Active`) VALUES
(1, 'Sanitizer', 'ACQUIRED', 'HIGH', '2018-07-02', 'Yes'),
(2, 'Air Freshener', 'ACQUIRED', 'HIGH', '2018-07-02', 'Yes'),
(3, 'Plastic Bag XL', 'ACQUIRED', 'HIGH', '2018-07-04', 'Yes'),
(4, 'Plastic cups', 'ACQUIRED', 'HIGH', '2018-09-06', 'No'),
(5, 'Paper Plates and Utensils', 'ACQUIRED', 'HIGH', '2018-09-06', 'Yes'),
(6, 'Push Pins', 'PENDING', 'HIGH', '2018-09-06', 'Yes'),
(7, 'Plastic Cups', 'PENDING', 'HIGH', '2018-11-13', 'Yes'),
(8, 'Alcohol', 'PENDING', 'HIGH', '2018-11-13', 'Yes'),
(9, 'Humidifier', 'PENDING', 'LOW', '2018-11-13', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `srg_fms_t_reimbursement`
--

CREATE TABLE `srg_fms_t_reimbursement` (
  `R_No` int(11) NOT NULL,
  `R_Date_Entry` date NOT NULL,
  `R_Date_Disbursement` date NOT NULL,
  `R_Date_Paid` date DEFAULT NULL,
  `R_Payee` varchar(50) NOT NULL,
  `R_Desc` varchar(100) NOT NULL,
  `R_Amount` double NOT NULL,
  `R_Status` varchar(20) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_fms_t_reimbursement`
--

INSERT INTO `srg_fms_t_reimbursement` (`R_No`, `R_Date_Entry`, `R_Date_Disbursement`, `R_Date_Paid`, `R_Payee`, `R_Desc`, `R_Amount`, `R_Status`) VALUES
(1, '2018-11-17', '2018-11-17', NULL, 'Ma Michaela Alejandria', 'National Bookstore Expenses (Frames and Photo Paper)', 956.75, 'PENDING'),
(2, '2018-11-17', '2018-11-17', NULL, 'Ma Michaela Alejandria', 'Food Supplies', 356.95, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `srg_ims_r_history`
--

CREATE TABLE `srg_ims_r_history` (
  `History_ID` int(11) NOT NULL,
  `HST_Date_Entry` date NOT NULL,
  `HST_Date_Modified` date DEFAULT NULL,
  `HST_SKU` varchar(100) NOT NULL,
  `HST_Category` varchar(50) NOT NULL,
  `HST_Quantity` int(20) NOT NULL,
  `HST_Mode_Procured` varchar(30) NOT NULL,
  `HST_Supplier` varchar(50) NOT NULL,
  `HST_Trasanct` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_ims_r_history`
--

INSERT INTO `srg_ims_r_history` (`History_ID`, `HST_Date_Entry`, `HST_Date_Modified`, `HST_SKU`, `HST_Category`, `HST_Quantity`, `HST_Mode_Procured`, `HST_Supplier`, `HST_Trasanct`) VALUES
(1, '2018-07-02', '2018-07-02', '', 'Cabinet / Locker', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(2, '2018-07-02', '2018-07-02', '', 'Table', 4, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(3, '2018-07-02', '2018-07-02', '', 'Table', 2, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(4, '2018-07-02', '2018-07-02', '', 'Chair', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(5, '2018-07-02', '2018-07-02', '', 'Screen', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(6, '2018-07-02', '2018-07-02', '', 'Board', 2, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(7, '2018-07-02', '2018-07-02', '', 'Chair / Bench', 14, 'Donation', 'PUPQC Property Custodian', 'ADDED ITEM'),
(8, '2018-07-02', '2018-07-02', '', 'Board', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(9, '2018-07-02', '2018-07-02', '', 'Cable', 4, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(10, '2018-07-02', '2018-07-02', '', 'Cable', 4, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(11, '2018-07-02', '2018-07-02', '', 'Computer Peripheral', 4, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(12, '2018-07-02', '2018-07-02', '', 'Computer Peripheral', 4, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(13, '2018-07-02', '2018-07-02', '', 'Computer Peripheral', 4, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(14, '2018-07-02', '2018-07-02', '', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(15, '2018-07-02', '2018-07-02', '09806780NJ', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(16, '2018-07-02', '2018-07-02', '09806839NJ', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(17, '2018-07-02', '2018-07-02', '09806181NJ', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(18, '2018-07-02', '2018-07-02', '09806905NJ', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(19, '2018-07-02', '2018-07-02', 'SGH210Q7XZ', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(20, '2018-07-02', '2018-07-02', 'ASENFT1000', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(21, '2018-07-02', '2018-07-02', 'ASENFT1000', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(22, '2018-07-02', '2018-07-02', 'ASENFT1000004475', 'Computer Peripheral', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(23, '2018-07-02', '2018-07-02', 'MJ662933', 'Air Conditioner', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(24, '2018-07-02', '2018-07-02', '', 'Electric Fan', 2, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM'),
(25, '2018-07-02', '2018-07-02', '', 'Electric Fan', 1, 'Donation', 'Prof. Rosicar Escober', 'ADDED ITEM');

-- --------------------------------------------------------

--
-- Table structure for table `srg_ims_r_inventory`
--

CREATE TABLE `srg_ims_r_inventory` (
  `Item_No` int(11) NOT NULL,
  `Date_Entry` date NOT NULL,
  `Stock_Key_Unit` varchar(50) DEFAULT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Category` varchar(50) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Mode_Procured` varchar(50) NOT NULL,
  `Supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_ims_r_inventory`
--

INSERT INTO `srg_ims_r_inventory` (`Item_No`, `Date_Entry`, `Stock_Key_Unit`, `Item_Name`, `Item_Category`, `Unit`, `Quantity`, `Mode_Procured`, `Supplier`) VALUES
(1, '2018-07-02', '', 'Steel Locker', 'Cabinet / Locker', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(2, '2018-07-02', '', 'Computer Table', 'Table', 'Piece', 4, 'Donation', 'Prof. Rosicar Escober'),
(3, '2018-07-02', '', 'Round Table', 'Table', 'Piece', 2, 'Donation', 'Prof. Rosicar Escober'),
(4, '2018-07-02', '', 'Bench', 'Chair', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(5, '2018-07-02', '', 'White Projection Screen', 'Screen', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(6, '2018-07-02', '', 'White Board', 'Board', 'Piece', 2, 'Donation', 'Prof. Rosicar Escober'),
(7, '2018-07-02', '', 'Monobloc Chair', 'Chair / Bench', 'Piece', 14, 'Donation', 'PUPQC Property Custodian'),
(8, '2018-07-02', '', 'Cork Board', 'Board', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(9, '2018-07-02', '', 'Power Supply Cable', 'Cable', 'Piece', 4, 'Donation', 'Prof. Rosicar Escober'),
(10, '2018-07-02', '', 'VGA Connector', 'Cable', 'Piece', 4, 'Donation', 'Prof. Rosicar Escober'),
(11, '2018-07-02', '', 'Mouse Pad', 'Computer Peripheral', 'Piece', 4, 'Donation', 'Prof. Rosicar Escober'),
(12, '2018-07-02', '', '80 Int Mouse', 'Computer Peripheral', 'Piece', 4, 'Donation', 'Prof. Rosicar Escober'),
(13, '2018-07-02', '', '80 Int Keyboard', 'Computer Peripheral', 'Piece', 4, 'Donation', 'Prof. Rosicar Escober'),
(14, '2018-07-02', '', 'Monitor HP 2R2440w', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(15, '2018-07-02', '09806780NJ', 'NEC LCD Monitor', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(16, '2018-07-02', '09806839NJ', 'NEC LCD Monitor', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(17, '2018-07-02', '09806181NJ', 'NEC LCD Monitor', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(18, '2018-07-02', '09806905NJ', 'NEC LCD Monitor', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(19, '2018-07-02', 'SGH210Q7XZ', 'Computer System Unit Core i3', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(20, '2018-07-02', 'ASENFT1000', 'Computer System Unit Core i3', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(21, '2018-07-02', 'ASENFT1000', 'Computer System Unit Core i3', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(22, '2018-07-02', 'ASENFT1000004475', 'Computer System Unit Core i3', 'Computer Peripheral', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(23, '2018-07-02', 'MJ662933', 'Aircon Koppel (KWR-12MB4C)', 'Air Conditioner', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober'),
(24, '2018-07-02', '', 'Wall Fan', 'Electric Fan', 'Piece', 2, 'Donation', 'Prof. Rosicar Escober'),
(25, '2018-07-02', '', 'Stand Fan', 'Electric Fan', 'Piece', 1, 'Donation', 'Prof. Rosicar Escober');

-- --------------------------------------------------------

--
-- Table structure for table `srg_ims_r_itemcategory`
--

CREATE TABLE `srg_ims_r_itemcategory` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_ims_r_itemcategory`
--

INSERT INTO `srg_ims_r_itemcategory` (`Category_ID`, `Category_Name`, `Category_Desc`) VALUES
(1, 'Table', 'tables'),
(2, 'Chair / Bench', 'For Sitting'),
(3, 'Paper', 'for writing and printing'),
(4, 'Writing Material', 'for writing and writing again'),
(5, 'CPU', 'Central Processing Unit processes task'),
(6, 'Cabinet / Locker', 'For Organized and Secured Storage'),
(7, 'Computer Peripheral', 'For computer external devices and internal parts'),
(8, 'Board', 'For Posting and Writing'),
(9, 'Screen', 'For Projection'),
(10, 'Cable', 'for electronic connection'),
(11, 'Electric Fan', 'for cooling'),
(12, 'Air Conditioner', 'for cooling');

-- --------------------------------------------------------

--
-- Table structure for table `srg_r_accounts`
--

CREATE TABLE `srg_r_accounts` (
  `ACC_ID` int(10) NOT NULL,
  `ACC_Username` varchar(50) NOT NULL,
  `ACC_Password` varchar(50) NOT NULL,
  `ACC_Ref_Password` varchar(50) DEFAULT NULL,
  `ACC_Type` varchar(30) NOT NULL,
  `ACC_Ref_Member` int(10) NOT NULL,
  `ACC_Status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_r_accounts`
--

INSERT INTO `srg_r_accounts` (`ACC_ID`, `ACC_Username`, `ACC_Password`, `ACC_Ref_Password`, `ACC_Type`, `ACC_Ref_Member`, `ACC_Status`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'SystemAdmin', 14, 'Active'),
(2, 'Michaela_Alejandria', 'michaela', '', 'Project-Manager', 2, 'Active'),
(3, 'Cristian_Balatbat', 'mirai', 'mirai', 'Treasurer', 1, 'Active'),
(4, 'Bryan_Cortesiano', '09127449420094275433', '', 'Member', 3, 'Active'),
(5, 'Julie_Resnera', 'julie', '', 'Member', 4, 'Active'),
(6, 'Lowell_Agnir', 'lowelldave', '', 'Member', 11, 'Active'),
(7, 'Gerard_Maglaque', 'roard', '', 'Member', 5, 'Active'),
(8, 'MaryJoy_Asusula', 'maryjoy', '', 'Member', 6, 'Active'),
(9, 'Oliver_Gabriel', 'oliver', '', 'Member', 10, 'Active'),
(10, 'Peter_Teneza', 'peter', '', 'Member', 12, 'Active'),
(11, 'Patrick_Loyola', 'patrick', '', 'Member', 9, 'Active'),
(12, 'Keith_Alvior', 'keith', '', 'Member', 7, 'Active'),
(13, 'Joshua_Magtibay', 'josh', '', 'Member', 8, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `srg_r_members`
--

CREATE TABLE `srg_r_members` (
  `ID` int(10) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Member_Type` varchar(20) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `Course` varchar(10) DEFAULT NULL,
  `Year` int(5) DEFAULT NULL,
  `Section` int(5) DEFAULT NULL,
  `Generation` varchar(15) DEFAULT NULL,
  `Profile_Picture` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_r_members`
--

INSERT INTO `srg_r_members` (`ID`, `Last_Name`, `First_Name`, `Member_Type`, `Position`, `Course`, `Year`, `Section`, `Generation`, `Profile_Picture`, `Status`) VALUES
(1, 'Balatbat', 'Cristian', 'Student', 'Treasurer', 'BSIT', 4, 1, '7th', 'Cristian.jpg', 'Active'),
(2, 'Alejandria', 'Ma Michaela', 'Student', 'Project Manager', 'BSIT', 4, 1, '7th', 'Michaela.jpg', 'Active'),
(3, 'Cortesiano', 'Bryan', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Bryan.jpg', 'Active'),
(4, 'Resnera', 'Julie Ann', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Julie.jpg', 'Active'),
(5, 'Maglaque', 'Gerard', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Gerard.jpg', 'Active'),
(6, 'Asusula', 'Mary Joy', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Mary.jpg', 'Active'),
(7, 'Alvior', 'Keith Eyvan', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Keith.jpg', 'Active'),
(8, 'Magtibay', 'Joshua Miguel', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Josh.jpg', 'Active'),
(9, 'Loyola', 'John Patrick', 'Student', 'Assistant Project Manager', 'BSIT', 4, 1, '7th', 'Patrick.jpg', 'Active'),
(10, 'Gabriel', 'Oliver', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Oliver.jpg', 'Active'),
(11, 'Agnir', 'Lowell Dave ', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Lowell.jpg', 'Active'),
(12, 'Teneza', 'Peter John', 'Student', 'Member', 'BSIT', 4, 1, '7th', 'Peter.jpg', 'Active'),
(13, 'Monzon', 'Demelyn', 'Professor', 'OSAS Head', NULL, NULL, NULL, NULL, 'default.png', 'Active'),
(14, 'Administrator', '', 'SuperUser', '', 'BSIT', 4, 1, '7th', 'default.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `srg_r_user_log`
--

CREATE TABLE `srg_r_user_log` (
  `UL_ID` int(10) NOT NULL,
  `UL_DateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UL_Username` varchar(50) NOT NULL,
  `UL_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srg_r_user_log`
--

INSERT INTO `srg_r_user_log` (`UL_ID`, `UL_DateTime`, `UL_Username`, `UL_Type`) VALUES
(1, '2018-07-02 11:09:46', 'Admin', 'SystemAdmin'),
(2, '2018-07-02 11:10:27', 'Michaela_Alejandria', 'Project-Manager'),
(3, '2018-07-02 11:15:32', 'Admin', 'SystemAdmin'),
(4, '2018-07-02 11:54:54', 'Michaela_Alejandria', 'Project-Manager'),
(5, '2018-07-02 11:56:14', 'Admin', 'SystemAdmin'),
(6, '2018-07-02 13:08:47', 'Michaela_Alejandria', 'Project-Manager'),
(7, '2018-07-02 13:10:20', 'Cristian_Balatbat', 'Treasurer'),
(8, '2018-07-02 13:11:39', 'Michaela_Alejandria', 'Project-Manager'),
(9, '2018-07-02 13:13:07', 'Michaela_Alejandria', 'Project-Manager'),
(10, '2018-07-03 19:45:57', 'Cristian_Balatbat', 'Treasurer'),
(11, '2018-07-04 09:58:16', 'Cristian_Balatbat', 'Treasurer'),
(12, '2018-07-04 10:37:00', 'Cristian_Balatbat', 'Treasurer'),
(13, '2018-07-04 10:37:28', 'Michaela_Alejandria', 'Project-Manager'),
(14, '2018-07-04 10:46:51', 'Admin', 'SystemAdmin'),
(15, '2018-07-04 12:51:14', 'Cristian_Balatbat', 'Treasurer'),
(16, '2018-07-04 12:53:59', 'Cristian_Balatbat', 'Treasurer'),
(17, '2018-07-04 13:18:16', 'Cristian_Balatbat', 'Treasurer'),
(18, '2018-07-04 13:59:40', 'Michaela_Alejandria', 'Project-Manager'),
(19, '2018-07-04 14:00:54', 'Cristian_Balatbat', 'Treasurer'),
(20, '2018-07-04 17:47:05', 'Michaela_Alejandria', 'Project-Manager'),
(21, '2018-07-04 18:12:25', 'Michaela_Alejandria', 'Project-Manager'),
(22, '2018-07-04 18:14:02', 'Cristian_Balatbat', 'Treasurer'),
(23, '2018-07-04 18:39:00', 'Cristian_Balatbat', 'Treasurer'),
(24, '2018-07-05 13:18:50', 'Cristian_Balatbat', 'Treasurer'),
(25, '2018-07-06 12:20:31', 'Cristian_Balatbat', 'Treasurer'),
(26, '2018-07-06 12:23:31', 'Cristian_Balatbat', 'Treasurer'),
(27, '2018-07-10 17:39:35', 'Cristian_Balatbat', 'Treasurer'),
(28, '2018-07-13 16:35:05', 'Cristian_Balatbat', 'Treasurer'),
(29, '2018-07-13 20:38:35', 'Cristian_Balatbat', 'Treasurer'),
(30, '2018-07-15 11:37:04', 'Cristian_Balatbat', 'Treasurer'),
(31, '2018-07-24 08:24:48', 'Cristian_Balatbat', 'Treasurer'),
(32, '2018-07-24 12:23:19', 'Cristian_Balatbat', 'Treasurer'),
(33, '2018-07-24 12:41:34', 'Cristian_Balatbat', 'Treasurer'),
(34, '2018-07-24 12:43:07', 'Cristian_Balatbat', 'Treasurer'),
(35, '2018-08-01 17:44:19', 'Cristian_Balatbat', 'Treasurer'),
(36, '2018-08-13 00:43:05', 'Cristian_Balatbat', 'Treasurer'),
(37, '2018-08-13 21:50:02', 'Cristian_Balatbat', 'Treasurer'),
(38, '2018-09-06 13:32:27', 'Cristian_Balatbat', 'Treasurer'),
(39, '2018-09-06 20:53:50', 'Cristian_Balatbat', 'Treasurer'),
(40, '2018-09-08 04:08:01', 'Cristian_Balatbat', 'Treasurer'),
(41, '2018-09-08 04:17:14', 'Michaela_Alejandria', 'Project-Manager'),
(42, '2018-09-10 15:34:38', 'Cristian_Balatbat', 'Treasurer'),
(43, '2018-09-10 15:37:19', 'Michaela_Alejandria', 'Project-Manager'),
(44, '2018-09-10 15:37:52', 'Cristian_Balatbat', 'Treasurer'),
(45, '2018-09-10 16:48:19', 'Admin', 'SystemAdmin'),
(46, '2018-09-10 16:49:34', 'Michaela_Alejandria', 'Project-Manager'),
(47, '2018-09-10 17:10:41', 'Admin', 'SystemAdmin'),
(48, '2018-10-04 16:28:06', 'Cristian_Balatbat', 'Treasurer'),
(49, '2018-10-12 04:46:55', 'Cristian_Balatbat', 'Treasurer'),
(50, '2018-10-12 04:51:55', 'Cristian_Balatbat', 'Treasurer'),
(51, '2018-10-12 10:50:24', 'Cristian_Balatbat', 'Treasurer'),
(52, '2018-10-12 12:50:24', 'Cristian_Balatbat', 'Treasurer'),
(53, '2018-10-12 23:46:12', 'Michaela_Alejandria', 'Project-Manager'),
(54, '2018-11-12 19:56:32', 'Cristian_Balatbat', 'Treasurer'),
(55, '2018-11-13 12:55:11', 'Cristian_Balatbat', 'Treasurer'),
(56, '2018-11-13 12:56:59', 'Cristian_Balatbat', 'Treasurer'),
(57, '2018-11-13 14:27:04', 'Cristian_Balatbat', 'Treasurer'),
(58, '2018-11-13 14:27:17', 'Cristian_Balatbat', 'Treasurer'),
(59, '2018-11-17 22:28:18', 'Cristian_Balatbat', 'Treasurer'),
(60, '2018-11-17 23:00:41', 'Cristian_Balatbat', 'Treasurer'),
(61, '2018-11-19 14:21:59', 'Cristian_Balatbat', 'Treasurer'),
(62, '2018-11-19 14:57:19', 'Cristian_Balatbat', 'Treasurer'),
(63, '2018-11-20 18:22:31', 'Cristian_Balatbat', 'Treasurer'),
(64, '2018-11-27 14:01:56', 'Cristian_Balatbat', 'Treasurer'),
(65, '2018-11-27 14:15:35', 'Admin', 'SystemAdmin'),
(66, '2018-11-27 18:23:39', 'Cristian_Balatbat', 'Treasurer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `srg_ams_r_time_requirement`
--
ALTER TABLE `srg_ams_r_time_requirement`
  ADD PRIMARY KEY (`TIME_No`);

--
-- Indexes for table `srg_ams_t_attendance`
--
ALTER TABLE `srg_ams_t_attendance`
  ADD PRIMARY KEY (`A_No`);

--
-- Indexes for table `srg_ams_t_time_in`
--
ALTER TABLE `srg_ams_t_time_in`
  ADD PRIMARY KEY (`TI_No`);

--
-- Indexes for table `srg_ams_t_time_out`
--
ALTER TABLE `srg_ams_t_time_out`
  ADD PRIMARY KEY (`TO_No`);

--
-- Indexes for table `srg_fms_r_fund`
--
ALTER TABLE `srg_fms_r_fund`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `srg_fms_t_deposit`
--
ALTER TABLE `srg_fms_t_deposit`
  ADD PRIMARY KEY (`D_No`);

--
-- Indexes for table `srg_fms_t_expenses`
--
ALTER TABLE `srg_fms_t_expenses`
  ADD PRIMARY KEY (`Ex_No`),
  ADD KEY `Ex_SumBatch` (`Ex_SumBatch`);

--
-- Indexes for table `srg_fms_t_expenses_summary`
--
ALTER TABLE `srg_fms_t_expenses_summary`
  ADD PRIMARY KEY (`ES_No`);

--
-- Indexes for table `srg_fms_t_income`
--
ALTER TABLE `srg_fms_t_income`
  ADD PRIMARY KEY (`IC_No`);

--
-- Indexes for table `srg_fms_t_prio_materials`
--
ALTER TABLE `srg_fms_t_prio_materials`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `srg_fms_t_reimbursement`
--
ALTER TABLE `srg_fms_t_reimbursement`
  ADD PRIMARY KEY (`R_No`);

--
-- Indexes for table `srg_ims_r_history`
--
ALTER TABLE `srg_ims_r_history`
  ADD PRIMARY KEY (`History_ID`);

--
-- Indexes for table `srg_ims_r_inventory`
--
ALTER TABLE `srg_ims_r_inventory`
  ADD PRIMARY KEY (`Item_No`);

--
-- Indexes for table `srg_ims_r_itemcategory`
--
ALTER TABLE `srg_ims_r_itemcategory`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `srg_r_accounts`
--
ALTER TABLE `srg_r_accounts`
  ADD PRIMARY KEY (`ACC_ID`),
  ADD KEY `ACC_Ref_Member` (`ACC_Ref_Member`);

--
-- Indexes for table `srg_r_members`
--
ALTER TABLE `srg_r_members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `srg_r_user_log`
--
ALTER TABLE `srg_r_user_log`
  ADD PRIMARY KEY (`UL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `srg_ams_r_time_requirement`
--
ALTER TABLE `srg_ams_r_time_requirement`
  MODIFY `TIME_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `srg_ams_t_attendance`
--
ALTER TABLE `srg_ams_t_attendance`
  MODIFY `A_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `srg_ams_t_time_in`
--
ALTER TABLE `srg_ams_t_time_in`
  MODIFY `TI_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `srg_ams_t_time_out`
--
ALTER TABLE `srg_ams_t_time_out`
  MODIFY `TO_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `srg_fms_r_fund`
--
ALTER TABLE `srg_fms_r_fund`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `srg_fms_t_deposit`
--
ALTER TABLE `srg_fms_t_deposit`
  MODIFY `D_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `srg_fms_t_expenses`
--
ALTER TABLE `srg_fms_t_expenses`
  MODIFY `Ex_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `srg_fms_t_expenses_summary`
--
ALTER TABLE `srg_fms_t_expenses_summary`
  MODIFY `ES_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `srg_fms_t_income`
--
ALTER TABLE `srg_fms_t_income`
  MODIFY `IC_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `srg_fms_t_prio_materials`
--
ALTER TABLE `srg_fms_t_prio_materials`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `srg_fms_t_reimbursement`
--
ALTER TABLE `srg_fms_t_reimbursement`
  MODIFY `R_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `srg_ims_r_history`
--
ALTER TABLE `srg_ims_r_history`
  MODIFY `History_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `srg_ims_r_inventory`
--
ALTER TABLE `srg_ims_r_inventory`
  MODIFY `Item_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `srg_ims_r_itemcategory`
--
ALTER TABLE `srg_ims_r_itemcategory`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `srg_r_accounts`
--
ALTER TABLE `srg_r_accounts`
  MODIFY `ACC_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `srg_r_members`
--
ALTER TABLE `srg_r_members`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `srg_r_user_log`
--
ALTER TABLE `srg_r_user_log`
  MODIFY `UL_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `srg_fms_t_expenses`
--
ALTER TABLE `srg_fms_t_expenses`
  ADD CONSTRAINT `srg_fms_t_expenses_ibfk_1` FOREIGN KEY (`Ex_SumBatch`) REFERENCES `srg_fms_t_expenses_summary` (`ES_No`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
