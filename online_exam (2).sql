-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 11:09 AM
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
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`) VALUES
(1, 'matematik'),
(2, 'programlama'),
(3, 'ingilizca');

-- --------------------------------------------------------

--
-- Table structure for table `ortalama`
--

CREATE TABLE `ortalama` (
  `ort_id` int(11) NOT NULL,
  `ortalama` float NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ortalama`
--

INSERT INTO `ortalama` (`ort_id`, `ortalama`, `exam_id`) VALUES
(8, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_A` varchar(255) NOT NULL,
  `answer_B` varchar(255) NOT NULL,
  `answer_C` varchar(255) NOT NULL,
  `true_answer` varchar(255) NOT NULL,
  `question_score` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `answer_A`, `answer_B`, `answer_C`, `true_answer`, `question_score`, `exam_id`) VALUES
(1, '50 * 10=? bu sorunun dogru cevabi hangisi?', '200', '300', '500', 'C', 20, 1),
(8, '(x+ 5) * 3 = 18   x= ? ', '1', '2', '3', 'A', 20, 1),
(9, '3x + 10 = 100   x=?     x bu denkleme gore degeri kac olur?', '20', '30', '40', 'B', 20, 1),
(10, '(x - 8) * 4 = 80   x= ? ', '24', '28', '19', 'B', 20, 1),
(11, '3y * 6x = 54    buna gore  x + 2y =? ', '15', '17', '18', 'C', 0, 1),
(12, ' one , two ,three, ..........,five , six', 'for', 'four', 'fore', 'B', 20, 3),
(13, 'A ............ is a small portable computer', 'desk', 'folder', 'laptop', 'C', 20, 3),
(14, '............ name is beyan .', 'me', 'my', 'mine', 'B', 20, 3),
(15, 'these are my friends . ................. italian', 'there are ', 'the ', 'their', 'A', 20, 3),
(16, '.............. you a student .', 'am', 'is', 'are', 'C', 20, 3),
(17, 'programlamada  >= sembolu ne anlama geliyor ?', 'daha buyuk ve esit', 'daha kucuk ve esit', 'esit', 'A', 20, 2),
(18, 'x=2 x=4 y=5      z=x+y   print(z) z degeri ekrana kac cikar ?', '7', '9', '5', 'B', 20, 2),
(19, 'printf(\"merhaba dunya\");      bu kodun hangi dil ile yazildi?', 'C', 'java', 'c#', 'A', 20, 2),
(20, 'st = \"hello world \";    x =  5 ;  System.out.println(st + x);  ekrana ne cikacak ?', 'hello', 'error verir', 'hello world5', 'C', 20, 2),
(21, 'x= 10 ;    y= 6;  y =x+y;      printf(x+y); yazilan kodun sonucu nedir ?', '26', '18', '30', 'A', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `right_number` int(11) NOT NULL,
  `wrong_number` int(11) NOT NULL,
  `final_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`user_id`, `exam_id`, `right_number`, `wrong_number`, `final_result`) VALUES
(1, 1, 8, 2, 80),
(9, 1, 2, 3, 40),
(9, 2, 1, 4, 20),
(9, 3, 2, 3, 40),
(11, 1, 0, 5, 0),
(11, 2, 1, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_name`) VALUES
(1, 'ogrenci'),
(2, 'yonetici');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_birthday` date NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `rol_id` int(20) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_name`, `user_email`, `user_password`, `user_birthday`, `user_gender`, `rol_id`, `code`) VALUES
(1, 'beyan', 'bayanrhayyem@gmail.com', 'beyan12345', '1998-10-05', 'kiz', 2, 963631),
(4, ' nura ', 'nura@gmail.com', '627854e83bbf529f36788ed93b684f90', '2013-07-18', 'female', 1, 0),
(5, ' hasan ', 'hasan@gmail.com', 'b16dc6f31cf996efb7c6e498ffcaeac6', '2015-06-04', 'male', 1, 0),
(7, ' nuha ', 'nuha@gmail.com', 'yuuyryr', '2012-02-28', 'femail', 2, 0),
(9, ' fatma ', 'fatma@gmail.com', 'ab515fc8490c32d3077a01f329f2cf4a', '2015-06-04', 'female', 1, 0),
(11, ' bayon ', 'bayon@gmail.com', '0f7af3b31128e2297101bde52c0f0aa6', '2021-11-11', 'female', 1, 0),
(12, ' nnn ', 'nnn@gmail.com', 'f0b9b5d4bc6fc22c407555fc00ceb526', '2021-11-10', 'female', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `ortalama`
--
ALTER TABLE `ortalama`
  ADD PRIMARY KEY (`ort_id`),
  ADD UNIQUE KEY `exam_id` (`exam_id`),
  ADD KEY `exam_id_2` (`exam_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `exam_id` (`exam_id`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ortalama`
--
ALTER TABLE `ortalama`
  MODIFY `ort_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ortalama`
--
ALTER TABLE `ortalama`
  ADD CONSTRAINT `ortalama_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
