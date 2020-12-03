-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 08:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivers_book_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver_info`
--

CREATE TABLE `driver_info` (
  `Driver_ID` bigint(20) NOT NULL,
  `Driver_Name` varchar(100) NOT NULL,
  `Driver_Age` int(11) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Place` varchar(100) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Types` varchar(100) DEFAULT NULL,
  `Profile_Photo` varchar(200) DEFAULT NULL,
  `Adhar_Card` varchar(200) DEFAULT NULL,
  `License` varchar(200) DEFAULT NULL,
  `Working_Status` varchar(20) NOT NULL DEFAULT 'Unengaged',
  `Trips` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_info`
--

INSERT INTO `driver_info` (`Driver_ID`, `Driver_Name`, `Driver_Age`, `Mobile_No`, `Email_ID`, `Place`, `Sex`, `Types`, `Profile_Photo`, `Adhar_Card`, `License`, `Working_Status`, `Trips`) VALUES
(4345562217, 'Harshad Mehta', 45, 6567784439, 'harshad.mehta@gmail.com', ' Jalgaon , Maharashtra', 'Male', '4_Wheels, ', 'ProfilePic/harshad_mehta.jpg', 'Adhar/fess_installment2.PNG', 'License/Screenshot (1).png', 'Unengaged', 1),
(4352617089, 'Ulrich Tidemann', 45, 6574839201, 'ulrich.tidemann@gmail.com', NULL, 'Male', '2_Wheels, 4_Wheels, ', 'ProfilePic/fess_installment2.PNG', 'D:/xamp/htdocs/Adhar/Screenshot (1).png', 'D:/xamp/htdocs/License/2020-10-31.png', 'Unengaged', 0),
(5353535533, 'Bryce Walker', 56, 7575757755, 'bryce.walker6713@gmail.com', NULL, 'Male', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/bryce_walker.jpg', 'E:/xampp/Adhar/IMG_20171104_112540.jpg', 'License/Screenshot (1).png', 'Unengaged', 9),
(5534427111, 'Newmann Harward', 44, 7756649333, 'new.hwd@gmail.com', NULL, 'Male', '4_Wheels, ', 'ProfilePic/2020-10-31.png', 'Adhar/fess_installment2.PNG', 'License/2020-10-31.png', 'Unengaged', 2),
(7701887134, 'Deepali Joshi', 45, 9923009356, 'deepali.deshpande@gmail.com', NULL, 'Female', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/millie_brown.jpg', 'E:/xampp/Adhar/IMG_20170729_182742.jpg', 'E:/xampp/License/2020-10-31.png', 'Unengaged', 13),
(7201710129, 'Clay Jensen', 27, 9945647333, 'clay.jensen1234@gmail.com', NULL, 'Male', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/clay_jensen.jpg', 'E:/xampp/Adhar/_20171105_212049.jpg', 'License/2020-10-31.png', 'Engaged', 2),
(7779797979, 'Jessica Roy', 25, 9991919191, 'jess.roy1234@gmail.com', NULL, 'Female', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/jessica_roy.jpg', 'E:/xampp/Adhar/IMG_20170729_182742.jpg', 'License/Screenshot (1).png', 'Unengaged', 2);

-- --------------------------------------------------------

--
-- Table structure for table `logedinpassengers`
--

CREATE TABLE `logedinpassengers` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logedinpassengers`
--

INSERT INTO `logedinpassengers` (`ID`, `Username`, `Email`, `Mobile`, `Password`) VALUES
(3, 'emma watson', 'emma.watson121@gmail.com', 9945567664, 'emmawatson'),
(4, 'KingOfMirzapur', 'munna.mirzapur@gmail.com', 7789643521, 'munnatripathi'),
(5, 'tonystark', 'tonyStark@gmail.com', 8890866543, 'TonyStark');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_info`
--

CREATE TABLE `passenger_info` (
  `OrderIDs` int(11) NOT NULL,
  `BookingID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Pemail_ID` bigint(20) NOT NULL,
  `Place` varchar(200) NOT NULL,
  `Vehicle_Type` varchar(100) NOT NULL,
  `Vehicle_Name` varchar(100) DEFAULT 'Unknown',
  `Applied` int(11) NOT NULL DEFAULT 0,
  `Ordered` int(11) NOT NULL DEFAULT 0,
  `Driver` varchar(100) NOT NULL,
  `Driver_Alloted` varchar(100) NOT NULL,
  `Driver_Contact` bigint(20) NOT NULL,
  `Start_Journey` date NOT NULL,
  `End_Journey` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger_info`
--

INSERT INTO `passenger_info` (`OrderIDs`, `BookingID`, `Name`, `Pemail_ID`, `Place`, `Vehicle_Type`, `Vehicle_Name`, `Applied`, `Ordered`, `Driver`, `Driver_Alloted`, `Driver_Contact`, `Start_Journey`, `End_Journey`) VALUES
(23, 12065179, 'Emma Watson', 9945567664, ' Bhuj , Gujarat', '4_Wheels', 'Mcloren', 1, 1, 'permanent', 'Jessica Roy', 9991919191, '2020-11-21', '2020-12-06'),
(28, 8585798, 'Munna Tripathi', 7789643521, ' New Delhi , Delhi', '4_Wheels', 'Truck', 1, 1, 'transport', 'Bryce Walker', 7575757755, '2020-11-21', '2020-11-21'),
(54, 837219, 'Anish Shaha', 9489303994, 'Gfhdks', '4_Wheels', '', 1, 1, 'transport', 'Newmann Harward', 7756649333, '2020-11-19', '2020-11-26'),
(61, 530173, 'Anish Shaha', 8890866543, ' Ambad , Maharashtra', '4_Wheels', '', 1, 1, 'temporary', 'Harshad Mehta', 6567784439, '2020-12-02', '2020-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `permanent_info`
--

CREATE TABLE `permanent_info` (
  `Driver_ID` bigint(20) NOT NULL,
  `Driver_Name` varchar(100) NOT NULL,
  `Driver_Age` int(11) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Place` varchar(100) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Types` varchar(100) DEFAULT NULL,
  `Profile_Photo` varchar(200) DEFAULT NULL,
  `Adhar_Card` varchar(200) DEFAULT NULL,
  `License` varchar(200) DEFAULT NULL,
  `Working_Status` varchar(10) NOT NULL DEFAULT 'Unengaged',
  `Trips` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permanent_info`
--

INSERT INTO `permanent_info` (`Driver_ID`, `Driver_Name`, `Driver_Age`, `Mobile_No`, `Email_ID`, `Place`, `Sex`, `Types`, `Profile_Photo`, `Adhar_Card`, `License`, `Working_Status`, `Trips`) VALUES
(4345562217, 'Harshad Mehta', 45, 6567784439, 'harshad.mehta@gmail.com', ' Jalgaon , Maharashtra', 'Male', '4_Wheels, ', 'ProfilePic/harshad_mehta.jpg', 'Adhar/fess_installment2.PNG', 'License/Screenshot (1).png', 'Unengaged', 0),
(5353535533, 'Bryce Walker', 56, 7575757755, 'bryce.walker6713@gmail.com', '0', 'Male', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/bryce_walker.jpg', 'E:/xampp/Adhar/IMG_20171104_112540.jpg', 'License/Screenshot (1).png', 'Unengaged', 5),
(7701887134, 'Deepali Joshi', 45, 9923009356, 'deepali.deshpande@gmail.com', '0', 'Female', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/millie_brown.jpg', 'E:/xampp/Adhar/IMG_20170729_182742.jpg', 'E:/xampp/License/2020-10-31.png', 'Unengaged', 3),
(7201710129, 'Clay Jensen', 27, 9945647333, 'clay.jensen1234@gmail.com', '0', 'Male', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/clay_jensen.jpg', 'E:/xampp/Adhar/_20171105_212049.jpg', 'License/2020-10-31.png', 'Engaged', 2),
(7779797979, 'Jessica Roy', 25, 9991919191, 'jess.roy1234@gmail.com', '0', 'Female', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/jessica_roy.jpg', 'E:/xampp/Adhar/IMG_20170729_182742.jpg', 'License/Screenshot (1).png', 'Unengaged', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transport_info`
--

CREATE TABLE `transport_info` (
  `Driver_ID` bigint(20) NOT NULL,
  `Driver_Name` varchar(100) NOT NULL,
  `Driver_Age` int(11) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Place` varchar(100) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Types` varchar(100) DEFAULT NULL,
  `Profile_Photo` varchar(200) DEFAULT NULL,
  `Adhar_Card` varchar(200) DEFAULT NULL,
  `License` varchar(200) DEFAULT NULL,
  `Working_Status` varchar(10) NOT NULL DEFAULT 'Unengaged',
  `Trips` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_info`
--

INSERT INTO `transport_info` (`Driver_ID`, `Driver_Name`, `Driver_Age`, `Mobile_No`, `Email_ID`, `Place`, `Sex`, `Types`, `Profile_Photo`, `Adhar_Card`, `License`, `Working_Status`, `Trips`) VALUES
(4345562217, 'Harshad Mehta', 45, 6567784439, 'harshad.mehta@gmail.com', ' Jalgaon , Maharashtra', 'Male', '4_Wheels, ', 'ProfilePic/harshad_mehta.jpg', 'Adhar/fess_installment2.PNG', 'License/Screenshot (1).png', 'Unengaged', 0),
(4352617089, 'Ulrich Tidemann', 45, 6574839201, 'ulrich.tidemann@gmail.com', NULL, 'Male', '2_Wheels, 4_Wheels, ', 'D:/xamp/htdocs/ProfilePic/fess_installment2.PNG', 'D:/xamp/htdocs/Adhar/Screenshot (1).png', 'D:/xamp/htdocs/License/2020-10-31.png', 'Unengaged', 0),
(5353535533, 'Bryce Walker', 56, 7575757755, 'bryce.walker6713@gmail.com', NULL, 'Male', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/bryce_walker.jpg', 'E:/xampp/Adhar/IMG_20171104_112540.jpg', 'License/Screenshot (1).png', 'Unengaged', 8),
(5534427111, 'Newmann Harward', 44, 7756649333, 'new.hwd@gmail.com', NULL, 'Male', '4_Wheels, ', 'ProfilePic/2020-10-31.png', 'Adhar/fess_installment2.PNG', 'License/2020-10-31.png', 'Unengaged', 0),
(7779797979, 'Jessica Roy', 25, 9991919191, 'jess.roy1234@gmail.com', NULL, 'Female', '2_Wheels, 3_Wheels, 4_Wheels, ', 'ProfilePic/jessica_roy.jpg', 'E:/xampp/Adhar/IMG_20170729_182742.jpg', 'License/Screenshot (1).png', 'Unengaged', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver_info`
--
ALTER TABLE `driver_info`
  ADD PRIMARY KEY (`Mobile_No`);

--
-- Indexes for table `logedinpassengers`
--
ALTER TABLE `logedinpassengers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD PRIMARY KEY (`OrderIDs`);

--
-- Indexes for table `permanent_info`
--
ALTER TABLE `permanent_info`
  ADD PRIMARY KEY (`Mobile_No`);

--
-- Indexes for table `transport_info`
--
ALTER TABLE `transport_info`
  ADD PRIMARY KEY (`Mobile_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logedinpassengers`
--
ALTER TABLE `logedinpassengers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `OrderIDs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
