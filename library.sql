-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 05:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Anuj Kumar', 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '2024-02-29 14:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_requests`
--

CREATE TABLE `borrow_requests` (
  `request_id` int(25) NOT NULL,
  `request_name` varchar(52) DEFAULT NULL,
  `requester_email` varchar(25) DEFAULT NULL,
  `book_title` varchar(25) DEFAULT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow_requests`
--

INSERT INTO `borrow_requests` (`request_id`, `request_name`, `requester_email`, `book_title`, `request_date`) VALUES
(79, NULL, 'Borrow request sent succe', NULL, '2024-03-08'),
(80, NULL, 'Borrow request sent succe', NULL, '2024-03-08'),
(81, NULL, 'Borrow request sent succe', NULL, '2024-03-08'),
(82, NULL, 'mrs.khan@gmail.com', NULL, '2024-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Anuj kumar', '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(2, 'Chetan Bhagatt', '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(3, 'Anita Desai', '2022-01-22 07:23:03', '2022-01-22 16:23:41'),
(4, 'HC Verma', '2022-01-22 07:23:03', '2022-01-22 16:23:45'),
(5, 'R.D. Sharma ', '2022-01-22 07:23:03', '2022-01-22 16:23:47'),
(9, 'fwdfrwer', '2022-01-22 07:23:03', '2022-01-22 16:23:55'),
(10, 'Dr. Andy Williams', '2022-01-22 07:15:32', NULL),
(11, 'Kyle Hill', '2022-01-22 07:16:34', NULL),
(12, 'Robert T. Kiyosak', '2022-01-22 07:18:38', NULL),
(13, 'Kelly Barnhill', '2022-01-22 07:21:54', NULL),
(14, 'Herbert Schildt', '2022-01-22 07:23:03', NULL),
(16, 'Jane Austen', '2024-01-05 12:33:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `BookPrice` decimal(10,2) DEFAULT NULL,
  `bookImage` varchar(250) NOT NULL,
  `isIssued` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `Description`, `BookPrice`, `bookImage`, `isIssued`, `RegDate`, `UpdationDate`) VALUES
(1, 'PHP And MySql programming', 5, 1, '222333', 'Introductory textbook covering all the main features of the \'web programming\' languages PHP and MySQL together with detailed examples that will enable readers (whether students on a taught course or independent learners) to use them to create their own ap', 20.00, '1efecc0ca822e40b7b673c0d79ae943f.jpg', 0, '2022-01-22 07:23:03', '2024-03-07 12:49:06'),
(3, 'physics', 6, 4, '1111', 'Written in clear English, The Physics Book is packed with short, pithy explanations that cut through technical language, step-by-step diagrams that untangle knotty theories, memorable quotes, and witty illustrations that play with our understanding of phy', 15.00, 'dd8267b57e0e4feee5911cb1e1a03a79.jpg', 0, '2022-01-22 07:23:03', '2024-03-07 12:51:25'),
(5, 'Murach\'s MySQL', 5, 1, '9350237695', 'It shows how to design a database, including how to use MySQL Workbench to create and implement the design. It even presents a starting set of skills for a database administrator (DBA) if you\'re interested in that career path or if you need to be your own', 455.00, '5939d64655b4d2ae443830d73abc35b6.jpg', 0, '2022-01-21 16:42:11', '2024-03-07 12:52:02'),
(6, 'WordPress for Beginners 2022: A Visual Step-by-Step Guide to Mastering WordPress', 5, 10, 'B019MO3WCM', 'WordPress for Beginners 2022: A Visual Step-by-Step Guide to Mastering WordPress', 100.00, '144ab706ba1cb9f6c23fd6ae9c0502b3.jpg', NULL, '2022-01-22 07:16:07', '2024-03-07 12:52:52'),
(7, 'WordPress Mastery Guide:', 5, 11, 'B09NKWH7NP', 'WordPress Mastery Guide:', 53.00, '90083a56014186e88ffca10286172e64.jpg', NULL, '2022-01-22 07:18:03', '2024-03-07 12:53:06'),
(8, 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not', 8, 12, 'B07C7M8SX9', 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not', 120.00, '52411b2bd2a6b2e0df3eb10943a5b640.jpg', NULL, '2022-01-22 07:20:39', NULL),
(9, 'The Girl Who Drank the Moon', 8, 13, '1848126476', 'The Girl Who Drank the Moon is a 2016 children\'s book by Kelly Barnhill. The book focuses on Luna, who after being raised by a witch named Xan, must figure out how to handle the magical powers she was accidentally given before it is too late. The book rec', 200.00, 'f05cd198ac9335245e1fdffa793207a7.jpg', NULL, '2022-01-22 07:22:33', NULL),
(10, 'C++: The Complete Reference, 4th Edition', 5, 14, '007053246X', 'ABOUT C++ LANGUAGE ', 142.00, '36af5de9012bf8c804e499dc3c3b33a5.jpg', 0, '2022-01-22 07:23:36', '2024-03-07 12:55:00'),
(11, 'ASP.NET Core 5 for Beginners', 9, 11, 'GBSJ36344563', 'ASP.NET Core 5 for Beginners is a comprehensive introduction for those who are new to the framework. This condensed guide takes a practical and engaging approach to cover everything that you need to know to start using ASP.NET Core for building cloud-read', 422.00, 'b1b6788016bbfab12cfd2722604badc9.jpg', 0, '2022-01-22 08:14:21', '2024-03-07 12:55:48'),
(12, 'Pride and Prejudice', 4, 16, '9780140430721', 'Pride and Prejudice follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love', 120.00, '49c439dcbfb19f19941c73e6b1d0ed79.jpg', NULL, '2024-01-05 12:36:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(4, 'Romantic', 1, '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(5, 'Technology', 1, '2022-01-22 07:23:03', '2022-01-22 07:23:03'),
(6, 'Science', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:37'),
(7, 'Management', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:35'),
(8, 'General', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:40'),
(9, 'Programming', 1, '2022-01-22 07:23:03', '2022-01-22 16:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(7, 5, 'SID011', '2022-01-22 05:45:57', '2024-01-08 14:21:59', 1, 123),
(8, 1, 'SID002', '2022-01-22 05:59:17', '2022-01-22 06:18:08', 1, 0),
(9, 10, 'SID009', '2022-01-22 07:38:09', '2022-01-22 07:38:54', 1, 0),
(10, 11, 'SID009', '2022-01-22 08:15:02', '2022-01-22 08:15:23', 1, 0),
(11, 1, 'SID012', '2022-01-22 08:17:15', '2024-01-08 14:21:46', 1, 123),
(12, 10, 'SID012', '2022-01-22 08:18:08', '2022-01-22 08:18:22', 1, 5),
(13, 1, 'SID005', '2024-01-17 06:47:14', '2024-02-20 13:01:44', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID002', 'Anuj kumar', 'anujk@gmail.com', '9865472555', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-01-22 16:25:45'),
(4, 'SID005', 'sdfsd', 'csfsd@dfsfks.com', '8569710025', '92228410fc8b872914e023160cf4ae8f', 1, '2022-01-02 07:23:03', '2022-01-22 16:25:53'),
(8, 'SID009', 'test', 'test@gmail.com', '2359874527', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-01-22 16:25:58'),
(9, 'SID010', 'Amit', 'amit@gmail.com', '8585856224', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-01-22 16:26:02'),
(10, 'SID011', 'Sarita Pandey', 'sarita@gmail.com', '4672423754', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-02 07:23:03', '2022-01-22 16:26:04'),
(11, 'SID012', 'John Doe', 'john@test.com', '1234569870', 'f925916e2754e5e03f75dd58a5733251', 1, '2022-01-22 08:16:18', NULL),
(12, 'SID013', 'pathan taufikkhan', '123@gmail.com', '8980963599', '202cb962ac59075b964b07152d234b70', 1, '2024-01-03 11:07:30', '2024-01-08 14:25:12'),
(14, 'SID014', 'pathan arshiya', 'arsh@gmail.com', '8980963566', '202cb962ac59075b964b07152d234b70', 1, '2024-01-07 07:58:53', NULL),
(15, 'SID015', 'arsh', 'ar@gmail.com', '9879803371', '202cb962ac59075b964b07152d234b70', 1, '2024-01-07 12:16:00', NULL),
(16, 'SID016', 'taufik', 'qwe@gmail.com', '7878787878', '202cb962ac59075b964b07152d234b70', 1, '2024-01-07 12:17:15', NULL),
(17, 'SID017', 'taufik', 'qwe@gmail.com', '7878787878', '202cb962ac59075b964b07152d234b70', 1, '2024-01-07 12:18:08', '2024-03-08 12:58:43'),
(18, 'SID018', 'shifa taufik pathan', 'mrs.khan@gmail.com', '8980963599', '64f173a41d2ffa62f98c0cfec53b43c5', 1, '2024-03-04 06:21:02', '2024-03-07 09:49:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_requests`
--
ALTER TABLE `borrow_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `borrow_requests`
--
ALTER TABLE `borrow_requests`
  MODIFY `request_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
