-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 05:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gre`
--

-- --------------------------------------------------------

--
-- Table structure for table `barron_word_settings`
--

CREATE TABLE `barron_word_settings` (
  `id` int(11) NOT NULL,
  `levelOne` varchar(20) DEFAULT NULL,
  `LevelTwo` varchar(20) DEFAULT NULL,
  `levelThree` varchar(20) DEFAULT NULL,
  `LevelFour` varchar(20) DEFAULT NULL,
  `levelFive` varchar(20) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barron_word_settings`
--

INSERT INTO `barron_word_settings` (`id`, `levelOne`, `LevelTwo`, `levelThree`, `LevelFour`, `levelFive`, `user_id`) VALUES
(1, 'Completed', NULL, NULL, NULL, NULL, 8),
(2, 'Completed', NULL, NULL, NULL, NULL, 1),
(3, 'Completed', NULL, NULL, NULL, NULL, 2),
(4, 'Completed', NULL, NULL, NULL, NULL, 11),
(5, 'Completed', NULL, NULL, NULL, NULL, 10),
(8, 'Completed', NULL, NULL, NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `level_one_question`
--

CREATE TABLE `level_one_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_one_question`
--

INSERT INTO `level_one_question` (`id`, `question`, `answer`) VALUES
(1, 'What is the Meaning of Aesthetic', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics'),
(2, 'What is the meaning of Adulterate', 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances'),
(3, 'Affirmation means', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination'),
(4, 'Adulation stands for', 'flattery; admiration that is more than is necessary or deserved'),
(5, 'What does Abase mean  ', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect');

-- --------------------------------------------------------

--
-- Table structure for table `level_one_question_option`
--

CREATE TABLE `level_one_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_one_question_option`
--

INSERT INTO `level_one_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 1),
(2, 'flattery; admiration that is more than is necessary or deserved', 1),
(3, 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 1),
(4, 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 1),
(5, 'flattery; admiration that is more than is necessary or deserved', 2),
(6, 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 2),
(7, 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances', 2),
(8, 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 2),
(9, 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 3),
(10, 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 3),
(11, 'enough; abundant; spacious; large in size; Ex. ample opportunity/garden; N. amplitude: quality of being ample; abundance; largeness of space', 3),
(12, 'environment; atmosphere; Ex. restraurant with a pleasant ambience; ADJ. ambient: completely surrounding; Ex. ambient temperature', 3),
(13, 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 4),
(14, 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 4),
(15, 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 4),
(16, 'flattery; admiration that is more than is necessary or deserved', 4),
(17, 'flattery; admiration that is more than is necessary or deserved', 5),
(18, 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 5),
(19, 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances', 5),
(20, 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_one_word_barron`
--

CREATE TABLE `level_one_word_barron` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_one_word_barron`
--

INSERT INTO `level_one_word_barron` (`id`, `word_name`, `description`) VALUES
(1, 'Abase', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect'),
(2, 'Adulation', 'flattery; admiration that is more than is necessary or deserved'),
(3, 'Adulterate', 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances'),
(4, 'Aesthetic', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics'),
(5, 'Affirmation', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination'),
(6, 'Aggrandize', 'make greater; increase in power, wealth, rank, or honor; N. aggrandizement'),
(7, 'Alimony', 'payments made regularly to an ex-spouse after divorce'),
(8, 'Alloy', 'mixture as of metals; something added that lowers in value or purity; V: mix; make less pure; lower in value or quality; spoil; CF. unalloyed: not in mixture with other maetals; pure; complete; unqualified; Ex. unalloyed happiness'),
(9, 'Ambience', 'environment; atmosphere; Ex. restraurant with a pleasant ambience; ADJ. ambient: completely surrounding; Ex. ambient temperature'),
(10, 'Ample', 'enough; abundant; spacious; large in size; Ex. ample opportunity/garden; N. amplitude: quality of being ample; abundance; largeness of space'),
(11, 'Annex', 'attach; add to a large thing; take possession of; incorporate (territory) into a larger existing political unit (by force); N: building added to a large one');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `userType`) VALUES
(1, 'Akram Fahim', 'akram@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Farhan', 'farhan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Juber Ahmed', 'juber@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'Sojib', 'sojib@m.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'Shila', 'Shila@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(6, 'Shuvo', 'Shuvo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(7, 'amran', 'amran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, 'Monir Hussain', 'monir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(9, 'Asif Sobhan', 'asif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(10, 'Arham Fatin', 'fatin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(11, 'Minhaj Mahim', 'mahim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(12, 'Islam Fahim', 'islam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(13, 'Shakib Al Hasan', 'shakib@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(14, 'Tamim ', 'tamim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(15, 'Guptil', 'guptil@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barron_word_settings`
--
ALTER TABLE `barron_word_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `level_one_question`
--
ALTER TABLE `level_one_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_one_question_option`
--
ALTER TABLE `level_one_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `level_one_word_barron`
--
ALTER TABLE `level_one_word_barron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barron_word_settings`
--
ALTER TABLE `barron_word_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `level_one_question`
--
ALTER TABLE `level_one_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_one_question_option`
--
ALTER TABLE `level_one_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `level_one_word_barron`
--
ALTER TABLE `level_one_word_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barron_word_settings`
--
ALTER TABLE `barron_word_settings`
  ADD CONSTRAINT `barron_word_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `level_one_question_option`
--
ALTER TABLE `level_one_question_option`
  ADD CONSTRAINT `level_one_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `level_one_question` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
