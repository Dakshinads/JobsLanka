-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 10:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobslanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_job`
--

CREATE TABLE `applied_job` (
  `id` int(11) NOT NULL,
  `job_seeker_id` varchar(12) NOT NULL,
  `job_ref_no` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `password` varchar(35) NOT NULL,
  `website` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `email`, `name`, `phone_no`, `password`, `website`) VALUES
(1, 'info@lolcfinance.com', 'LOLC Holdings PLC', 115715555, 'e10adc3949ba59abbe56e057f20f883e', 'www.lolc.com'),
(2, 'info@cdbfinance.com', 'CDB Bank', 117388388, 'e10adc3949ba59abbe56e057f20f883e', 'www.cdb.com'),
(3, 'info@softlogicfinance.com', 'Softlogic Finance', 115555799, 'e10adc3949ba59abbe56e057f20f883e', 'www.softlogic.com'),
(4, 'info@dominosfinance.com', 'dominosfinance', 117777888, 'e10adc3949ba59abbe56e057f20f883e', 'www.dominos.com'),
(5, 'info@hsbcfinance.com', 'hsbcfinance', 114472200, 'e10adc3949ba59abbe56e057f20f883e', 'www.hsbc.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `job_seeker_id` varchar(12) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(10) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `phone_no`, `message`) VALUES
(1, 'Yasiru', 'samarasekarayasiru@gmail.com', 764529870, 'website phone number not working'),
(2, 'Vihanga', 'vihanga1998@gmail.com', 753284619, 'Cannot change my phone number'),
(3, 'Sahan', '2000sahan@mail.com', 784587962, 'Cannot change my email address?'),
(4, 'Pubudu', 'gayashanpubudu@gmail.com', 784587962, 'Cannot pay for an add online');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_respond`
--

CREATE TABLE `inquiry_respond` (
  `inquiry_id` int(11) NOT NULL,
  `staff_id` varchar(12) NOT NULL,
  `remark` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `interview_timeslot`
--

CREATE TABLE `interview_timeslot` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `employer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_ref_no` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `opening_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `active` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `reason` text DEFAULT NULL,
  `job_category_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `manager_id` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `name`, `description`, `manager_id`) VALUES
(1, 'IT-Software / Internet', NULL, NULL),
(2, 'IT-Hardware / Network / System', NULL, NULL),
(3, 'Sales / Marketing', NULL, NULL),
(4, 'Business Management', NULL, NULL),
(5, 'Banking & Finance', NULL, NULL),
(6, 'Food Industry', NULL, NULL),
(7, 'Media / Communication', NULL, NULL),
(8, 'Engineering / Manufacturing', NULL, NULL),
(9, 'Hotel / Leasure', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_role`
--

CREATE TABLE `job_role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_role`
--

INSERT INTO `job_role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `job_save`
--

CREATE TABLE `job_save` (
  `job_seeker_id` varchar(12) NOT NULL,
  `job_ref_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `nic` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `gender` char(1) NOT NULL,
  `cv` varchar(250) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `location_id` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `name`) VALUES
(10, 'Full time'),
(11, 'Part time');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'Gampaha'),
(2, 'Matara'),
(3, 'Galle'),
(4, 'Hambantota'),
(5, 'Colombo'),
(6, 'Kaluthara'),
(7, 'Kandy'),
(8, 'Matale'),
(9, 'Nuwara Eliya'),
(10, 'Kegalle'),
(11, 'Ratnapura'),
(12, 'Monaragala'),
(13, 'Badulla'),
(14, 'Polonnaruwa'),
(15, 'Anueadhapura'),
(16, 'Puttalam'),
(17, 'Kurunegala'),
(18, 'Trincomalee'),
(19, 'Ampara'),
(20, 'Batticola'),
(21, 'Mullativu'),
(22, 'Vavuniya'),
(23, 'Mannar'),
(24, 'Kilinochchi'),
(25, 'Jaffna');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `nic` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `password` varchar(35) NOT NULL,
  `job_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time_allocate`
--

CREATE TABLE `time_allocate` (
  `applied_job_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `interview_timeslot_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_job_seekerdd` (`job_seeker_id`),
  ADD KEY `f_job_refnodd` (`job_ref_no`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_job_seeker` (`job_seeker_id`),
  ADD KEY `f_employer` (`employer_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_respond`
--
ALTER TABLE `inquiry_respond`
  ADD PRIMARY KEY (`inquiry_id`,`staff_id`),
  ADD KEY `f_staffii` (`staff_id`);

--
-- Indexes for table `interview_timeslot`
--
ALTER TABLE `interview_timeslot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_employer1` (`employer_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_ref_no`),
  ADD KEY `f_categoryj` (`job_category_id`),
  ADD KEY `f_typej` (`job_type_id`),
  ADD KEY `f_locationj` (`location_id`),
  ADD KEY `f_employerj` (`employer_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_manager_id` (`manager_id`);

--
-- Indexes for table `job_role`
--
ALTER TABLE `job_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_save`
--
ALTER TABLE `job_save`
  ADD PRIMARY KEY (`job_seeker_id`,`job_ref_no`),
  ADD KEY `f_job_refnoss` (`job_ref_no`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `f_location` (`location_id`),
  ADD KEY `f_job_category` (`job_category_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `f_job_role` (`job_role_id`);

--
-- Indexes for table `time_allocate`
--
ALTER TABLE `time_allocate`
  ADD PRIMARY KEY (`applied_job_id`,`employer_id`,`interview_timeslot_id`),
  ADD KEY `f_employert` (`employer_id`),
  ADD KEY `f_timeslot` (`interview_timeslot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_job`
--
ALTER TABLE `applied_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interview_timeslot`
--
ALTER TABLE `interview_timeslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_ref_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_role`
--
ALTER TABLE `job_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD CONSTRAINT `f_job_refnodd` FOREIGN KEY (`job_ref_no`) REFERENCES `job` (`job_ref_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_job_seekerdd` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `f_employer` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_job_seeker` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `inquiry_respond`
--
ALTER TABLE `inquiry_respond`
  ADD CONSTRAINT `f_inq` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiry` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_staffii` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `interview_timeslot`
--
ALTER TABLE `interview_timeslot`
  ADD CONSTRAINT `f_employer1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `f_categoryj` FOREIGN KEY (`job_category_id`) REFERENCES `job_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_employerj` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_locationj` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_typej` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `job_category`
--
ALTER TABLE `job_category`
  ADD CONSTRAINT `f_manager_id` FOREIGN KEY (`manager_id`) REFERENCES `staff` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `job_save`
--
ALTER TABLE `job_save`
  ADD CONSTRAINT `f_job_refnoss` FOREIGN KEY (`job_ref_no`) REFERENCES `job` (`job_ref_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_job_seekerss` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seeker` (`nic`) ON UPDATE CASCADE;

--
-- Constraints for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD CONSTRAINT `f_job_category` FOREIGN KEY (`job_category_id`) REFERENCES `job_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_location` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `f_job_role` FOREIGN KEY (`job_role_id`) REFERENCES `job_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `time_allocate`
--
ALTER TABLE `time_allocate`
  ADD CONSTRAINT `f_applied_jobt` FOREIGN KEY (`applied_job_id`) REFERENCES `applied_job` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_employert` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `f_timeslot` FOREIGN KEY (`interview_timeslot_id`) REFERENCES `interview_timeslot` (`id`) ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `updateStatusofJob` ON SCHEDULE EVERY 1 DAY STARTS '2022-09-21 01:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE job SET active = 2 where CURDATE() =closing_date$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
