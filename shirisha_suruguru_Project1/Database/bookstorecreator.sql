-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 04:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstorecreator`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_Id` int(11) NOT NULL,
  `Book_Name` varchar(50) NOT NULL,
  `Book_Cost` float NOT NULL,
  `Book_Description` varchar(100) NOT NULL,
  `Book_Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Id`, `Book_Name`, `Book_Cost`, `Book_Description`, `Book_Image`) VALUES
(1, 'The Science of Getting Rich', 20, 'Holds the secret to a life of wealth', 'book1.jpg'),
(2, 'Charlottes web', 30, 'Winter of the newery honor', 'book2.jpg'),
(3, 'Rules for knight', 40, 'The story takes place in the 15th century and is written in the form of a letter from the novel\'s pr', 'book3.jpg'),
(4, 'The worlds greatest book', 50, 'The resulting book, Rules for a Knight — in reality, a work of fiction — began over a decade ago.', 'book4.jpg'),
(5, 'Shoot like a girl', 15, 'A prequel novella to girl with a gun', 'book5.jpg'),
(6, 'Lord of the files', 25, 'This is a book summary of Rules for a Knight by Ethan Hawke. Read this Rules for a Knight summary to', 'book6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_inventory`
--

CREATE TABLE `book_inventory` (
  `Book_Id` int(11) NOT NULL,
  `Inventory_Id` int(11) NOT NULL,
  `Number_Of_Copies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_inventory`
--

INSERT INTO `book_inventory` (`Book_Id`, `Inventory_Id`, `Number_Of_Copies`) VALUES
(1, 1, 4),
(2, 2, 12),
(3, 3, 15),
(4, 4, 32),
(5, 5, 23),
(6, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `Book_Id` int(11) NOT NULL,
  `Buyer_Id` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Payment_Options` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`Book_Id`, `Buyer_Id`, `First_Name`, `Last_Name`, `Payment_Options`) VALUES
(1, 0, 'shirisha ', 'suruguru', '0'),
(1, 0, 'shirisha ', 'suruguru', '0'),
(1, 0, 'shirisha ', 'suruguru', '0'),
(2, 0, 'dsa', 'ad', '0'),
(1, 0, 'shirisha ', 'x', '0'),
(1, 0, 'shirisha ', 'xa', 'credit'),
(1, 0, 'dsa', 'ss', 'credit'),
(1, 0, 'dsaaa', 'aa', 'credit'),
(1, 0, 'dsaaa', 'aa', 'credit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_Id`);

--
-- Indexes for table `book_inventory`
--
ALTER TABLE `book_inventory`
  ADD PRIMARY KEY (`Inventory_Id`),
  ADD KEY `book_inventory_ibfk_1` (`Book_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_inventory`
--
ALTER TABLE `book_inventory`
  MODIFY `Inventory_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_inventory`
--
ALTER TABLE `book_inventory`
  ADD CONSTRAINT `book_inventory_ibfk_1` FOREIGN KEY (`Book_Id`) REFERENCES `books` (`Book_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
