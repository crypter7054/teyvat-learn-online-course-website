-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 02:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password_admin`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `nama_course` varchar(255) NOT NULL,
  `photo_course` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `videos` int(11) NOT NULL,
  `instructor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_course`, `nama_course`, `photo_course`, `description`, `price`, `category`, `videos`, `instructor`) VALUES
(1, 'Understand Banks & Financial Markets', 'course1.png', 'ini ini deskprisi', 20, 'Finance', 34, 'Aether Teyvat'),
(5, 'Motion Design with Figma and Others', 'course2.jpg', 'blablabla', 111, 'Design', 12, 'James'),
(8, 'The Complete JavaScript Course 2022:', 'course3.jpg', 'blablabal', 322, 'Programming', 11, 'Moriatry'),
(9, 'Blockchain and Bitcoin Fundamentals', 'course4.jpg', 'blabla', 23, 'Finance', 18, 'Hidari'),
(10, 'Personal Financial Well-Being', 'course5.jpg', 'Understanding Your Financial Life', 12, 'Finance', 32, 'Richard Okumoto'),
(11, 'Digital Marketing: How to Generate Sales Leads', 'course6.jpg', 'Learn How To Generate Leads With A Step-By-Step Workbook & Action Plan To Boost Your Sales in 2019', 25, 'Marketing', 43, 'Lawrence'),
(12, 'The Complete 2022 Web Development Bootcamp', 'course7.png', 'Become a Full-Stack Web Developer with just ONE course. HTML, CSS, Javascript, Node, React, MongoDB, Web3 and DApps', 32, 'Programming', 23, 'Angela Yu'),
(13, 'Laravel 9 - Build Complete Inventory Management', 'course8.jpg', 'In This Course, You Will Build Two Different Projects With Laravel 9 including Inventory Management System A-Z', 33, 'Programming', 20, 'Kazi Ariyan'),
(20, 'Tailwind CSS From Scratch | Learn By Projects', 'course9.png', 'Build great looking layouts fast and efficiently using Tailwind CSS utility classes', 45, 'Programming', 23, 'Brad Traversy'),
(21, 'Organize your Personal & Work Life Ease', 'course10.png', 'Learn all that you need to know to get started with the Notion software', 15, 'Self Development', 11, 'Janosch Herman');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id_enroll` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id_enroll`, `id_user`, `id_course`) VALUES
(1, 1, 9),
(2, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fname`, `lname`, `email`, `password`, `photo`) VALUES
(1, 'Yosafat', '.', 'yosafatcrypter@gmail.com', '123', '9cc37ed30024a6654c754d027f002177.jpg'),
(18, 'Clarin', 'Moriatry', 'clarinnn@gmail.com', '123', 'rean.jpg'),
(19, 'Yos', '.', 'test@gmai.com', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id_enroll`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id_enroll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
