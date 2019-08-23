-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 08:38 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(191) NOT NULL,
  `type` varchar(11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `user_id`, `score`, `type`, `date`) VALUES
(10, 25, 1, 'mcq', '2019-08-22 18:48:57.561920'),
(11, 25, 0, 'rearrange', '2019-08-22 18:49:28.661625'),
(12, 25, 0, 'fill', '2019-08-23 08:15:20.704697');

-- --------------------------------------------------------

--
-- Table structure for table `level_settings`
--

CREATE TABLE `level_settings` (
  `id` int(11) NOT NULL,
  `level_One` varchar(191) NOT NULL,
  `level_Two` varchar(191) NOT NULL,
  `level_Three` varchar(191) NOT NULL,
  `level_Four` varchar(191) NOT NULL,
  `level_Five` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_settings`
--

INSERT INTO `level_settings` (`id`, `level_One`, `level_Two`, `level_Three`, `level_Four`, `level_Five`, `user_id`, `type`) VALUES
(1, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 24, 'barron'),
(3, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 25, 'barron'),
(4, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 25, 'magoosh'),
(5, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 25, 'manhattan');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(191) NOT NULL,
  `answer` varchar(191) NOT NULL,
  `option1` varchar(191) NOT NULL,
  `option2` varchar(191) NOT NULL,
  `option3` varchar(191) NOT NULL,
  `option4` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `option4`, `level`, `type`) VALUES
(1, 'What is the Meaning of Aesthetic', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 'flattery; admiration that is more than is necessary or deserved', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 'one', 'barron'),
(2, 'What is the meaning of Adulterate', 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances', 'flattery; admiration that is more than is necessary or deserved', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 'one', 'barron'),
(3, 'Affirmation means', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 'enough; abundant; spacious; large in size; Ex. ample opportunity/garden; N. amplitude: quality of being ample; abundance; largeness of space', 'environment; atmosphere; Ex. restraurant with a pleasant ambience; ADJ. ambient: completely surrounding; Ex. ambient temperature', 'one', 'barron'),
(4, 'Adulation stands for', 'flattery; admiration that is more than is necessary or deserved', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 'flattery; admiration that is more than is necessary or deserved', 'one', 'barron'),
(5, 'What does Abase mean  ', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 'flattery; admiration that is more than is necessary or deserved', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 'one', 'barron'),
(6, 'Introspection Means', 'examining one\'s own thoughts and feelings', 'one who loves mankind', 'examining one\'s own thoughts and feelings', 'To make great efforts, to struggle', 'Doubtful; uncertain', 'two', 'barron'),
(7, 'What does Strive means ', 'To make great efforts, to struggle', 'one who loves mankind', 'examining one\'s own thoughts and feelings', 'To make great efforts, to struggle', 'A person or thing that precedes, as in a process or job', 'two', 'barron'),
(8, 'Philanthropist stands for', 'one who loves mankind', 'A person or thing that precedes, as in a process or job', 'one who loves mankind', 'Doubtful; uncertain', 'examining one\'s own thoughts and feelings', 'two', 'barron'),
(9, 'What is the meaning of Precursors', 'A person or thing that precedes, as in a process or job', 'examining one\'s own thoughts and feelings', 'Doubtful; uncertain', 'A person or thing that precedes, as in a process or job', 'one who loves mankind', 'two', 'barron'),
(10, 'Ambiguous means', 'Doubtful; uncertain', 'examining one\'s own thoughts and feelings', 'To make great efforts, to struggle', 'A person or thing that precedes, as in a process or job', 'Doubtful; uncertain', 'two', 'barron'),
(11, 'What does Amalgamate means', 'mix; combine; unite societies', 'mix; combine; unite societies', 'happening from time to time', 'cause or have difficulty in breathing', 'feeling sleepy half asleep', 'three', 'barron'),
(12, 'What is the meaning of Suffocate', 'cause or have difficulty in breathing', 'cause or have difficulty in breathing', 'mix; combine; unite societies', 'feeling sleepy half asleep', 'happening from time to time', 'three', 'barron'),
(13, 'Drowsiness means ', 'feeling sleepy half asleep', 'happening from time to time', 'process of burning', 'mix; combine; unite societies', 'feeling sleepy half asleep', 'three', 'barron'),
(14, 'Combustion meaning', 'process of burning', 'mix; combine; unite societies', 'happening from time to time', 'process of burning', 'feeling sleepy half asleep', 'three', 'barron'),
(15, 'Sporadic means', 'happening from time to time', 'feeling sleepy half asleep', 'cause or have difficulty in breathing', 'process of burning', 'happening from time to time', 'three', 'barron'),
(16, 'Sluggard means', 'lazy slow-moving person', 'say or do again several times', 'lazy slow-moving person', 'rising or falling sharply', 'fluent speaking skillful use of language', 'four', 'barron'),
(17, 'Reiterate stands for', 'say or do again several times', 'fluent speaking skillful use of language', 'rising or falling sharply', 'say or do again several times', 'trouble disturbance', 'four', 'barron'),
(18, 'Eloquence meaning', 'fluent speaking skillful use of language', 'lazy slow-moving person', 'fluent speaking skillful use of language', 'rising or falling sharply', 'trouble disturbance', 'four', 'barron'),
(19, 'What does Steeply means', 'rising or falling sharply', 'rising or falling sharply', 'trouble disturbance', 'lazy slow-moving person', 'fluent speaking skillful use of language', 'four', 'barron'),
(20, 'Turmoil means', 'trouble disturbance', 'rising or falling sharply', 'fluent speaking skillful use of language', 'trouble disturbance', 'lazy slow-moving person', 'four', 'barron'),
(21, 'What does Fidelity means', 'loyalty accuracy', 'Paradigm means', 'loyalty accuracy', 'a model example or pattern', 'be enough', 'five', 'barron'),
(22, 'Paradigm means', 'a model example or pattern', 'loyalty accuracy', 'be enough', 'a model example or pattern', 'free giving; generosity', 'five', 'barron'),
(23, 'Suffice meaning', 'be enough                     			                     			', 'be enough                                                                ', 'a model example or pattern                                                                ', 'lively high-spirited                                                                ', 'free giving; generosity                                                                ', 'five', 'barron'),
(24, 'Vivacious stands for', 'lively high-spirited', 'a model example or pattern', 'lively high-spirited', 'be enough', 'free giving; generosity', 'five', 'barron'),
(25, 'Liberality indicates', 'free giving; generosity', 'a model example or pattern', 'free giving; generosity', 'lively high-spirited', 'loyalty accuracy', 'five', 'barron'),
(26, 'What is the meaning of Abstruse', 'Difficult to understand; incomprehensible', 'A trite or obvious remark', 'Bitterness and ill will', 'Favorable, the opposite of sinister', 'Difficult to understand; incomprehensible', 'one', 'magoosh'),
(27, 'Acrimony means', 'Bitterness and ill will', 'Favorable, the opposite of sinister', 'Difficult to understand; incomprehensible', 'Bitterness and ill will', 'A trite or obvious remark', 'one', 'magoosh'),
(28, 'Admonish meaning', 'o warn strongly, even to the point of reprimanding', 'Favorable, the opposite of sinister', 'A trite or obvious remark', 'Difficult to understand; incomprehensible', 'o warn strongly, even to the point of reprimanding', 'one', 'magoosh'),
(29, 'What is the meaning of Auspicious', 'Favorable, the opposite of sinister', 'Favorable, the opposite of sinister', 'o warn strongly, even to the point of reprimanding', 'A trite or obvious remark', 'Difficult to understand; incomprehensible', 'one', 'magoosh'),
(30, 'Banality means', 'A trite or obvious remark', 'Favorable, the opposite of sinister', 'o warn strongly, even to the point of reprimanding', 'A trite or obvious remark', 'Difficult to understand; incomprehensible', 'one', 'magoosh'),
(31, 'Grievous means', 'causing grief or pain; serious dire grave', 'causing grief or pain; serious dire grave', 'falsely making oneself appear to be good', 'swallow up', 'puzzling person or thing', 'two', 'magoosh'),
(32, 'What does Hypocrisy means', 'falsely making oneself appear to be good', 'puzzling person or thing', 'causing grief or pain; serious dire grave', 'falsely making oneself appear to be good', 'puzzling person or thing', 'two', 'magoosh'),
(33, 'Chisel stands for', 'puzzling person or thing', 'puzzling person or thing', 'swallow up', 'causing grief or pain; serious dire grave', 'falsely making oneself appear to be good', 'two', 'magoosh'),
(34, 'Engulf meaning', 'swallow up', 'swallow up', 'puzzling person or thing', 'falsely making oneself appear to be good', 'causing grief or pain; serious dire grave', 'two', 'magoosh'),
(35, 'What is the meaning of Riddle', 'puzzling person or thing', 'causing grief or pain; serious dire grave', 'falsely making oneself appear to be good', 'puzzling person or thing', 'puzzling person or thing', 'two', 'magoosh'),
(36, 'Mischievous meaning', 'harmful; causing mischief', 'harmful; causing mischief', 'one who hates women/females', 'belong as a part have reference', 'directing the mind in a certain direction', 'three', 'magoosh'),
(37, 'Misogynist', 'one who hates women/females', 'harmful; causing mischief', 'belong as a part have reference', 'one who hates women/females', 'directing the mind in a certain direction', 'three', 'magoosh'),
(38, 'What is the meaning of Pertain', 'belong as a part have reference', 'one who hates women/females', 'directing the mind in a certain direction', 'harmful; causing mischief', 'belong as a part have reference', 'three', 'magoosh'),
(39, 'Inclined means', 'directing the mind in a certain direction', 'directing the mind in a certain direction', 'harmful; causing mischief', 'belong as a part have reference', 'one who hates women/females', 'three', 'magoosh'),
(40, 'What does Lambaste means', 'attack verbally', 'directing the mind in a certain direction', 'attack verbally', 'one who hates women/females', 'harmful; causing mischief', 'three', 'magoosh'),
(41, 'What does Extralegal means', 'outside the law', 'having both of two contrary meanings', 'outside the law', 'write one\'s name on the back of', 'sentence within another one something separated', 'four', 'magoosh'),
(42, 'Ambivalent means', 'having both of two contrary meanings', 'sentence within another one something separated', 'a person with good judgement (e.g.. in art)', 'write one\'s name on the back of', 'having both of two contrary meanings', 'four', 'magoosh'),
(43, 'Endorse stands for', 'write one\'s name on the back of', 'sentence within another one something separated', 'write one\'s name on the back of', 'a person with good judgement (e.g.. in art)', 'having both of two contrary meanings', 'four', 'magoosh'),
(44, 'Connoisseur means', '', 'sentence within another one something separated', 'having both of two contrary meanings', 'write one\'s name on the back of', 'a person with good judgement (e.g.. in art)', 'four', 'magoosh'),
(45, 'Parenthesis meaning', 'sentence within another one something separated', 'having both of two contrary meanings', 'write one\'s name on the back of', 'sentence within another one something separated', 'a person with good judgement (e.g.. in art)', 'four', 'magoosh'),
(46, 'Perjury means', 'willful FALSE statement unlawful act', 'destructive thing or a person who is nuisance', 'involving or using conversation.', 'easily controlled or guided', 'willful FALSE statement unlawful act', 'five', 'magoosh'),
(47, 'What does Pest means', 'destructive thing or a person who is nuisance', 'destructive thing or a person who is nuisance', 'willful FALSE statement unlawful act', 'easily controlled or guided', 'involving or using conversation.', 'five', 'magoosh'),
(48, 'Colloquial means', 'involving or using conversation.', 'willful FALSE statement unlawful act', 'easily controlled or guided', 'destructive thing or a person who is nuisance', 'involving or using conversation.', 'five', 'magoosh'),
(49, 'Paradigm meaning', 'involving or using conversation.', 'easily controlled or guided', 'willful FALSE statement unlawful act', 'destructive thing or a person who is nuisance', 'involving or using conversation.', 'five', 'magoosh'),
(50, 'Tractable stands for', 'easily controlled or guided', 'involving or using conversation.', 'destructive thing or a person who is nuisance', 'willful FALSE statement unlawful act', 'easily controlled or guided', 'five', 'magoosh'),
(51, 'What is the meaning of Abstruse', 'Difficult to understand; incomprehensible', 'A trite or obvious remark', 'Difficult to understand; incomprehensible', 'Bitterness and ill will', 'o warn strongly, even to the point of reprimanding', 'one', 'manhattan'),
(52, 'Acrimony means', 'Bitterness and ill will', 'Bitterness and ill will', 'o warn strongly, even to the point of reprimanding', 'A trite or obvious remark', 'Difficult to understand; incomprehensible', 'one', 'manhattan'),
(53, 'Admonish meaning', 'o warn strongly, even to the point of reprimanding', 'o warn strongly, even to the point of reprimanding', 'Bitterness and ill will', 'Difficult to understand; incomprehensible', 'A trite or obvious remark', 'one', 'manhattan'),
(54, 'What is the meaning of Auspicious', 'Favorable, the opposite of sinister', 'A trite or obvious remark', 'Favorable, the opposite of sinister', 'Difficult to understand; incomprehensible', 'A trite or obvious remark', 'one', 'manhattan'),
(55, 'Banality means', 'A trite or obvious remark', 'A trite or obvious remark', 'o warn strongly, even to the point of reprimanding', 'Bitterness and ill will', 'Difficult to understand; incomprehensible', 'one', 'manhattan'),
(56, 'Woo means', 'try to win', 'draw together; unite firmly', 'cover for the blade of a weapon or a tool', 'try to win', 'mislead or delude; cheat; pass time', 'two', 'manhattan'),
(57, 'Cordial meaning', 'warm and sincere', 'try to win', 'warm and sincere', 'draw together; unite firmly', 'cover for the blade of a weapon or a tool', 'two', 'manhattan'),
(58, 'Beguile', 'mislead or delude; cheat; pass time', 'cover for the blade of a weapon or a tool', 'mislead or delude; cheat; pass time', 'warm and sincere', 'draw together; unite firmly', 'two', 'manhattan'),
(59, 'Sheath stands for', 'cover for the blade of a weapon or a tool', 'cover for the blade of a weapon or a tool', 'try to win', 'draw together; unite firmly', 'warm and sincere', 'two', 'manhattan'),
(60, 'what is the meaning of Knit', 'draw together; unite firmly', 'try to win', 'draw together; unite firmly', 'warm and sincere', 'cover for the blade of a weapon or a tool', 'two', 'manhattan'),
(61, 'Chortle means', 'loud chuckle of pleasure or amusement', 'of great importance (others depend on it)', 'loud chuckle of pleasure or amusement', 'something that is puzzling', 'refuse to accept/cause dislike', 'three', 'manhattan'),
(62, 'Pivotal meaning', 'of great importance (others depend on it)', 'loud chuckle of pleasure or amusement', 'refuse to accept/cause dislike', 'of great importance (others depend on it)', 'something that is puzzling', 'three', 'manhattan'),
(63, 'Repel stands for', 'refuse to accept/cause dislike', 'refuse to accept/cause dislike', 'loud chuckle of pleasure or amusement', 'of great importance (others depend on it)', 'something that is puzzling', 'three', 'manhattan'),
(64, 'Enigma', 'something that is puzzling', 'of great importance (others depend on it)', 'refuse to accept/cause dislike', 'something that is puzzling', 'loud chuckle of pleasure or amusement', 'three', 'manhattan'),
(65, 'Buoyant means', 'able to float; light-hearted', 'loud chuckle of pleasure or amusement', 'of great importance (others depend on it)', 'refuse to accept/cause dislike', 'able to float; light-hearted', 'three', 'manhattan'),
(66, 'Boisterous means', 'noisy; restraint', 'inclined to indulge', 'noisy; restraint', 'a number of performance of music', 'coming back to consciousness', 'four', 'manhattan'),
(67, 'Resuscitation meaning', 'coming back to consciousness', 'noisy; restraint', 'inclined to indulge', 'coming back to consciousness', 'a number of performance of music', 'four', 'manhattan'),
(68, 'Recitals stands for', 'a number of performance of music', 'inclined to indulge', 'noisy; restraint', 'coming back to consciousness', 'a number of performance of music', 'four', 'manhattan'),
(69, 'Treacherous means', 'not to be trusted, perfidious', 'noisy; restraint', 'inclined to indulge', 'coming back to consciousness', 'not to be trusted, perfidious', 'four', 'manhattan'),
(70, 'Indulgent means', 'inclined to indulge', 'noisy; restraint', 'coming back to consciousness', 'not to be trusted, perfidious', 'inclined to indulge', 'four', 'manhattan'),
(71, 'Perjury means', 'willful FALSE statement unlawful act', 'a model example or pattern', 'destructive thing or a person who is nuisance', 'involving or using conversation.', 'willful FALSE statement unlawful act', 'five', 'manhattan'),
(72, 'What does Pest means', 'destructive thing or a person who is nuisance', 'willful FALSE statement unlawful act', 'involving or using conversation.', 'destructive thing or a person who is nuisance', 'a model example or pattern', 'five', 'manhattan'),
(73, 'Colloquial means', 'involving or using conversation.', 'involving or using conversation.', 'destructive thing or a person who is nuisance', 'destructive thing or a person who is nuisance', 'willful FALSE statement unlawful act', 'five', 'manhattan'),
(74, 'Paradigm meaning', 'a model example or pattern', 'involving or using conversation.', 'willful FALSE statement unlawful act', 'destructive thing or a person who is nuisance', 'a model example or pattern', 'five', 'manhattan'),
(75, 'Tractable stands for', 'easily controlled or guided', 'destructive thing or a person who is nuisance', 'willful FALSE statement unlawful act', 'easily controlled or guided', 'involving or using conversation.', 'five', 'manhattan');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `barron` varchar(20) DEFAULT NULL,
  `magoosh` varchar(20) DEFAULT NULL,
  `manhattan` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `barron`, `magoosh`, `manhattan`, `user_id`) VALUES
(1, 'Completed', NULL, NULL, 24),
(2, NULL, 'Completed', NULL, 1),
(3, 'Completed', 'Completed', 'Completed', 25);

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
(1, 'Akram Fahim', 'akram@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
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
(15, 'Guptil', 'guptil@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(16, 'Md Kamal', 'kamal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(17, 'Ahmed', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(18, 'Begum', 'Begum@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(19, 'Akbor Miah', 'akbor@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(20, 'Amjad', 'amjad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(21, 'Arham', 'arham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(22, 'Anika', 'anika@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(23, 'masum', 'masum@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(24, 'Mujakkir', 'mujakkir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(25, 'farhan', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(26, 'farhan', 'asad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `word_table`
--

CREATE TABLE `word_table` (
  `id` int(11) NOT NULL,
  `word` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word_table`
--

INSERT INTO `word_table` (`id`, `word`, `description`, `type`, `level`) VALUES
(1, 'Abase', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 'barron', 'one'),
(2, 'Adulation', 'flattery; admiration that is more than is necessary or deserved', 'barron', 'one'),
(3, 'Adulterate', 'make impure or of poorer quality by adding inferior or tainted(contaminated) substances', 'barron', 'one'),
(4, 'Aesthetic', 'artistic; dealing with or capable of appreciating the beautiful (of a person or building); CF. aesthete; CF. aesthetics', 'barron', 'one'),
(5, 'Affirmation', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination', 'barron', 'one'),
(7, 'Introspection', 'examining one\'s own thoughts and feelings', 'barron', 'two'),
(8, 'Philanthropist', 'one who loves mankind', 'barron', 'two'),
(9, 'Strive', 'To make great efforts, to struggle', 'barron', 'two'),
(10, 'Precursors', 'A person or thing that precedes, as in a process or job', 'barron', 'two'),
(11, 'Ambiguous', 'Make worse; irritate', 'barron', 'two'),
(12, 'Amalgamate', 'mix; combine; unite societies', 'barron', 'three'),
(13, 'Drowsiness', 'feeling sleepy half asleep', 'barron', 'three'),
(14, 'Suffocate', 'cause or have difficulty in breathing', 'barron', 'three'),
(15, 'Sporadic', 'happening from time to time', 'barron', 'three'),
(16, 'Combustion', 'process of burning', 'barron', 'three'),
(17, 'Sluggard', 'lazy slow-moving person', 'barron', 'four'),
(18, 'Reiterate', 'say or do again several times', 'barron', 'four'),
(19, 'Eloquence', 'fluent speaking skillful use of language', 'barron', 'four'),
(20, 'Steeply', 'rising or falling sharply', 'barron', 'four'),
(21, 'Turmoil', 'trouble disturbance', 'barron', 'four'),
(22, 'Fidelity', 'loyalty accuracy', 'barron', 'five'),
(23, 'Paradigm', 'a model example or pattern', 'barron', 'five'),
(24, 'Suffice', 'be enough', 'barron', 'five'),
(25, 'Vivacious', 'lively high-spirited', 'barron', 'five'),
(26, 'Liberality', 'free giving; generosity', 'barron', 'five'),
(28, 'Abstruse', 'Difficult to understand; incomprehensible', 'magoosh', 'one'),
(29, 'Acrimony', 'Bitterness and ill will', 'magoosh', 'one'),
(30, 'Admonish', 'o warn strongly, even to the point of reprimanding', 'magoosh', 'one'),
(31, 'Auspicious', ' Favorable, the opposite of sinister', 'magoosh', 'one'),
(32, 'banality', 'A trite or obvious remark', 'magoosh', 'one'),
(33, 'Grievous', 'causing grief or pain; serious dire grave', 'magoosh', 'two'),
(34, 'Hypocrisy', 'falsely making oneself appear to be good', 'magoosh', 'two'),
(35, 'Chisel', 'steel tool for shaping materials', 'magoosh', 'two'),
(36, 'Engulf', 'swallow up', 'magoosh', 'two'),
(37, 'Riddle', 'puzzling person or thing', 'magoosh', 'two'),
(38, 'mischievous', 'harmful; causing mischief', 'magoosh', 'three'),
(39, 'Misogynist', 'one who hates women/females', 'magoosh', 'three'),
(40, 'Pertain', 'belong as a part have reference', 'magoosh', 'three'),
(41, 'Inclined', 'directing the mind in a certain direction', 'magoosh', 'three'),
(42, 'Lambaste', 'attack verbally', 'magoosh', 'three'),
(43, 'Extralegal', 'outside the law', 'magoosh', 'four'),
(44, 'Ambivalent', 'having both of two contrary meanings', 'magoosh', 'four'),
(45, 'Endorse', 'write one\'s name on the back of', 'magoosh', 'four'),
(46, 'Connoisseur', 'a person with good judgement (e.g.. in art)', 'magoosh', 'four'),
(47, 'Parenthesis', 'sentence within another one something separated', 'magoosh', 'four'),
(48, 'Perjury', 'willful FALSE statement unlawful act', 'magoosh', 'five'),
(49, 'Pest', 'destructive thing or a person who is nuisance', 'magoosh', 'five'),
(50, 'Colloquial', 'involving or using conversation.', 'magoosh', 'five'),
(51, 'Paradigm', 'a model example or pattern', 'magoosh', 'five'),
(52, 'Tractable', 'easily controlled or guided', 'magoosh', 'five'),
(53, 'Spear', 'weapon with a metal point on a long shaft', 'manhattan', 'one'),
(54, 'Presentiment', 'anticipatory fear; premonition', 'manhattan', 'one'),
(55, 'Coagulation', 'change to a thick and solid state', 'manhattan', 'one'),
(56, 'Brass', 'yellow metal (mixing copper and zinc)', 'manhattan', 'one'),
(57, 'Malleable', 'yielding easily shaped; moldable; adapting', 'manhattan', 'one'),
(58, 'Woo', 'try to win', 'manhattan', 'two'),
(59, 'Cordial', 'warm and sincere', 'manhattan', 'two'),
(60, 'Beguile', 'mislead or delude; cheat; pass time', 'manhattan', 'two'),
(61, 'Sheath', 'cover for the blade of a weapon or a tool', 'manhattan', 'two'),
(62, 'Knit', 'draw together; unite firmly', 'manhattan', 'two'),
(63, 'chortle', 'loud chuckle of pleasure or amusement', 'manhattan', 'three'),
(64, 'Pivotal', 'of great importance (others depend on it)', 'manhattan', 'three'),
(65, 'Repel', 'refuse to accept/cause dislike', 'manhattan', 'three'),
(66, 'Enigma', 'something that is puzzling', 'manhattan', 'three'),
(67, 'Buoyant', 'able to float; light-hearted', 'manhattan', 'three'),
(68, 'Boisterous', 'noisy; restraint', 'manhattan', 'four'),
(69, 'Resuscitation', 'coming back to consciousness', 'manhattan', 'four'),
(70, 'Recitals', 'a number of performance of music', 'manhattan', 'four'),
(71, 'Treacherous', 'not to be trusted, perfidious', 'manhattan', 'four'),
(72, 'Indulgent', 'inclined to indulge', 'manhattan', 'four'),
(73, 'Foster', 'nurture; care for', 'manhattan', 'five'),
(74, 'Apartheid', 'brutal racial discrimination', 'manhattan', 'five'),
(75, 'Garrulous', 'too talkative', 'manhattan', 'five'),
(76, 'Edify', 'instruct; correct morally', 'manhattan', 'five'),
(77, 'Evasive', 'tending to evade', 'manhattan', 'five');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_settings`
--
ALTER TABLE `level_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word_table`
--
ALTER TABLE `word_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `level_settings`
--
ALTER TABLE `level_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `word_table`
--
ALTER TABLE `word_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
