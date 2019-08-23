-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 11:17 AM
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
(3, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 25, 'barron');

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_five_question`
--

CREATE TABLE `magoosh_level_five_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_five_question`
--

INSERT INTO `magoosh_level_five_question` (`id`, `question`, `answer`) VALUES
(1, 'Perjury means', 'willful FALSE statement unlawful act'),
(2, 'What does Pest means', 'destructive thing or a person who is nuisance'),
(3, 'Colloquial means', 'involving or using conversation.'),
(4, 'Paradigm meaning', 'a model example or pattern'),
(5, 'Tractable stands for', 'easily controlled or guided');

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_five_question_option`
--

CREATE TABLE `magoosh_level_five_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_five_question_option`
--

INSERT INTO `magoosh_level_five_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'involving or using conversation.', 1),
(2, 'easily controlled or guided', 1),
(3, 'willful FALSE statement unlawful act', 1),
(4, 'destructive thing or a person who is nuisance', 1),
(5, 'involving or using conversation.', 2),
(6, 'a model example or pattern', 2),
(7, 'destructive thing or a person who is nuisance', 2),
(8, 'willful FALSE statement unlawful act', 2),
(9, 'willful FALSE statement unlawful act', 3),
(10, 'destructive thing or a person who is nuisance', 3),
(11, 'involving or using conversation.', 3),
(12, 'easily controlled or guided', 3),
(13, 'easily controlled or guided', 4),
(14, 'willful FALSE statement unlawful act', 4),
(15, 'destructive thing or a person who is nuisance', 4),
(16, 'a model example or pattern', 4),
(17, 'easily controlled or guided', 5),
(18, 'involving or using conversation.', 5),
(19, 'willful FALSE statement unlawful act', 5),
(20, 'a model example or pattern', 5);

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_four_question`
--

CREATE TABLE `magoosh_level_four_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_four_question`
--

INSERT INTO `magoosh_level_four_question` (`id`, `question`, `answer`) VALUES
(1, 'What does Extralegal means', 'outside the law'),
(2, 'Ambivalent means', 'having both of two contrary meanings'),
(3, 'Endorse stands for', 'write one\'s name on the back of'),
(4, 'Connoisseur means', 'a person with good judgement (e.g.. in art)'),
(5, 'Parenthesis meaning', 'sentence within another one something separated');

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_four_question_option`
--

CREATE TABLE `magoosh_level_four_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_four_question_option`
--

INSERT INTO `magoosh_level_four_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'having both of two contrary meanings', 1),
(2, 'a person with good judgement (e.g.. in art)', 1),
(3, 'sentence within another one something separated', 1),
(4, 'outside the law', 1),
(5, 'outside the law', 2),
(6, 'having both of two contrary meanings', 2),
(7, 'write one\'s name on the back of', 2),
(8, 'sentence within another one something separated', 2),
(9, 'write one\'s name on the back of', 3),
(10, 'outside the law', 3),
(11, 'a person with good judgement (e.g.. in art)', 3),
(12, 'sentence within another one something separated', 3),
(13, 'a person with good judgement (e.g.. in art)', 4),
(14, 'write one\'s name on the back of', 4),
(15, 'outside the law', 4),
(16, 'having both of two contrary meanings', 4),
(17, 'write one\'s name on the back of', 5),
(18, 'having both of two contrary meanings', 5),
(19, 'sentence within another one something separated', 5),
(20, 'a person with good judgement (e.g.. in art)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_one_question`
--

CREATE TABLE `magoosh_level_one_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_one_question`
--

INSERT INTO `magoosh_level_one_question` (`id`, `question`, `answer`) VALUES
(1, 'What is the meaning of Abstruse', 'Difficult to understand; incomprehensible'),
(2, 'Acrimony means', 'Bitterness and ill will'),
(3, 'Admonish meaning', 'o warn strongly, even to the point of reprimanding'),
(4, 'What is the meaning of Auspicious', 'Favorable, the opposite of sinister'),
(5, 'Banality means', 'A trite or obvious remark');

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_one_question_option`
--

CREATE TABLE `magoosh_level_one_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_one_question_option`
--

INSERT INTO `magoosh_level_one_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'Favorable, the opposite of sinister', 1),
(2, 'Difficult to understand; incomprehensible', 1),
(3, 'A trite or obvious remark', 1),
(4, 'o warn strongly, even to the point of reprimanding', 1),
(5, 'Difficult to understand; incomprehensible', 2),
(6, 'A trite or obvious remark', 2),
(7, 'Favorable, the opposite of sinister', 2),
(8, 'Bitterness and ill will', 2),
(9, 'Difficult to understand; incomprehensible', 3),
(10, 'Bitterness and ill will', 3),
(11, 'o warn strongly, even to the point of reprimanding', 3),
(12, ' Favorable, the opposite of sinister', 3),
(13, 'o warn strongly, even to the point of reprimanding', 4),
(14, 'Bitterness and ill will', 4),
(15, 'A trite or obvious remark', 4),
(16, ' Favorable, the opposite of sinister', 4),
(17, 'Bitterness and ill will', 5),
(18, 'A trite or obvious remark', 5),
(19, 'o warn strongly, even to the point of reprimanding', 5),
(20, 'Difficult to understand; incomprehensible', 5);

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_three_question`
--

CREATE TABLE `magoosh_level_three_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_three_question`
--

INSERT INTO `magoosh_level_three_question` (`id`, `question`, `answer`) VALUES
(1, 'Mischievous meaning', 'harmful; causing mischief'),
(2, 'Misogynist', 'one who hates women/females'),
(3, 'What is the meaning of Pertain', 'belong as a part have reference'),
(4, 'Inclined means', 'directing the mind in a certain direction'),
(5, 'What does Lambaste means', 'attack verbally');

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_three_question_option`
--

CREATE TABLE `magoosh_level_three_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_three_question_option`
--

INSERT INTO `magoosh_level_three_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'harmful; causing mischief', 1),
(2, 'belong as a part have reference', 1),
(3, 'one who hates women/females', 1),
(4, 'directing the mind in a certain direction', 1),
(5, 'attack verbally', 2),
(6, 'belong as a part have reference', 2),
(7, 'directing the mind in a certain direction', 2),
(8, 'one who hates women/females', 2),
(9, 'harmful; causing mischief', 3),
(10, 'one who hates women/females', 3),
(11, 'attack verbally', 3),
(12, 'belong as a part have reference', 3),
(13, 'attack verbally', 4),
(14, 'harmful; causing mischief', 4),
(15, 'directing the mind in a certain direction', 4),
(16, 'one who hates women/females', 4),
(17, 'directing the mind in a certain direction', 5),
(18, 'belong as a part have reference', 5),
(19, 'harmful; causing mischief', 5),
(20, 'attack verbally', 5);

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_two_question`
--

CREATE TABLE `magoosh_level_two_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_two_question`
--

INSERT INTO `magoosh_level_two_question` (`id`, `question`, `answer`) VALUES
(1, 'Grievous means', 'causing grief or pain; serious dire grave'),
(2, 'What does Hypocrisy means', 'falsely making oneself appear to be good'),
(3, 'Chisel stands for', 'steel tool for shaping materials'),
(4, 'Engulf meaning', 'swallow up'),
(5, 'What is the meaning of Riddle', 'puzzling person or thing');

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_level_two_question_option`
--

CREATE TABLE `magoosh_level_two_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_two_question_option`
--

INSERT INTO `magoosh_level_two_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'swallow up', 1),
(2, 'puzzling person or thing', 1),
(3, 'falsely making oneself appear to be good', 1),
(4, 'causing grief or pain; serious dire grave', 1),
(5, 'swallow up', 2),
(6, 'falsely making oneself appear to be good', 2),
(7, 'steel tool for shaping materials', 2),
(8, 'puzzling person or thing', 2),
(9, 'causing grief or pain; serious dire grave', 3),
(10, 'falsely making oneself appear to be good', 3),
(11, 'swallow up', 3),
(12, 'steel tool for shaping materials', 3),
(13, 'causing grief or pain; serious dire grave', 4),
(14, 'steel tool for shaping materials', 4),
(15, 'swallow up', 4),
(16, 'puzzling person or thing', 4),
(17, 'steel tool for shaping materials', 5),
(18, 'falsely making oneself appear to be good', 5),
(19, 'puzzling person or thing', 5),
(20, 'causing grief or pain; serious dire grave', 5);

-- --------------------------------------------------------

--
-- Table structure for table `magoosh_word_settings`
--

CREATE TABLE `magoosh_word_settings` (
  `id` int(11) NOT NULL,
  `levelOne` varchar(20) DEFAULT NULL,
  `levelTwo` varchar(20) DEFAULT NULL,
  `levelThree` varchar(20) DEFAULT NULL,
  `levelFour` varchar(20) DEFAULT NULL,
  `levelFive` varchar(20) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_word_settings`
--

INSERT INTO `magoosh_word_settings` (`id`, `levelOne`, `levelTwo`, `levelThree`, `levelFour`, `levelFive`, `user_id`) VALUES
(1, 'Completed', NULL, NULL, NULL, NULL, 1),
(2, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 24);

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_five_question`
--

CREATE TABLE `manhattan_level_five_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_five_question`
--

INSERT INTO `manhattan_level_five_question` (`id`, `question`, `answer`) VALUES
(1, 'Foster means', 'nurture; care for'),
(2, 'Apartheid stands for', 'brutal racial discrimination'),
(3, 'Garrulous refers', 'too talkative'),
(4, 'edify', 'instruct; correct morally'),
(5, 'Evasive meaning', 'tending to evade');

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_five_question_option`
--

CREATE TABLE `manhattan_level_five_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_five_question_option`
--

INSERT INTO `manhattan_level_five_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'brutal racial discrimination', 1),
(2, 'tending to evade', 1),
(3, 'nurture; care for', 1),
(4, 'instruct; correct morally', 1),
(5, 'nurture; care for', 2),
(6, 'instruct; correct morally', 2),
(7, 'too talkative', 2),
(8, 'brutal racial discrimination', 2),
(9, 'too talkative', 3),
(10, 'brutal racial discrimination', 3),
(11, 'nurture; care for', 3),
(12, 'tending to evade', 3),
(13, 'brutal racial discrimination', 4),
(14, 'too talkative', 4),
(15, 'tending to evade', 4),
(16, 'instruct; correct morally', 4),
(17, 'too talkative', 5),
(18, 'instruct; correct morally', 5),
(19, 'tending to evade', 5),
(20, 'nurture; care for', 5);

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_four_question`
--

CREATE TABLE `manhattan_level_four_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_four_question`
--

INSERT INTO `manhattan_level_four_question` (`id`, `question`, `answer`) VALUES
(1, 'Boisterous means', 'noisy; restraint'),
(2, 'Resuscitation meaning', 'coming back to consciousness'),
(3, 'Recitals stands for', 'a number of performance of music'),
(4, 'Treacherous means', 'not to be trusted, perfidious'),
(5, 'Indulgent means', 'inclined to indulge');

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_four_question_option`
--

CREATE TABLE `manhattan_level_four_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_four_question_option`
--

INSERT INTO `manhattan_level_four_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'noisy; restraint', 1),
(2, 'not to be trusted, perfidious', 1),
(3, 'a number of performance of music', 1),
(4, 'not to be trusted, perfidious', 1),
(5, 'not to be trusted, perfidious', 2),
(6, 'coming back to consciousness', 2),
(7, 'noisy; restraint', 2),
(8, 'inclined to indulge', 2),
(9, 'coming back to consciousness', 3),
(10, 'a number of performance of music', 3),
(11, 'inclined to indulge', 3),
(12, 'noisy; restraint', 3),
(13, 'coming back to consciousness', 4),
(14, 'a number of performance of music', 4),
(15, 'inclined to indulge', 4),
(16, 'not to be trusted, perfidious', 4),
(17, 'inclined to indulge', 5),
(18, 'a number of performance of music', 5),
(19, 'noisy; restraint', 5),
(20, 'coming back to consciousness', 5);

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_one_question`
--

CREATE TABLE `manhattan_level_one_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_one_question`
--

INSERT INTO `manhattan_level_one_question` (`id`, `question`, `answer`) VALUES
(1, 'Spear means', 'weapon with a metal point on a long shaft'),
(2, 'Presentiment meaning', 'anticipatory fear; premonition'),
(3, 'Coagulation stands for', 'change to a thick and solid state'),
(4, 'What is the meaning of Brass', 'yellow metal (mixing copper and zinc)'),
(5, 'Malleable', 'yielding easily shaped; moldable; adapting');

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_one_question_option`
--

CREATE TABLE `manhattan_level_one_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_one_question_option`
--

INSERT INTO `manhattan_level_one_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'anticipatory fear; premonition', 1),
(2, 'change to a thick and solid state', 1),
(3, 'weapon with a metal point on a long shaft', 1),
(4, 'yellow metal (mixing copper and zinc)', 1),
(5, 'weapon with a metal point on a long shaft', 2),
(6, 'anticipatory fear; premonition', 2),
(7, 'yielding easily shaped; moldable; adapting', 2),
(8, 'yellow metal (mixing copper and zinc)', 2),
(9, 'anticipatory fear; premonition', 3),
(10, 'change to a thick and solid state', 3),
(11, 'yielding easily shaped; moldable; adapting', 3),
(12, 'weapon with a metal point on a long shaft', 3),
(13, 'anticipatory fear; premonition', 4),
(14, 'change to a thick and solid state', 4),
(15, 'yielding easily shaped; moldable; adapting', 4),
(16, 'yellow metal (mixing copper and zinc)', 4),
(17, 'yielding easily shaped; moldable; adapting', 5),
(18, 'change to a thick and solid state', 5),
(19, 'weapon with a metal point on a long shaft', 5),
(20, 'yellow metal (mixing copper and zinc)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_three_question`
--

CREATE TABLE `manhattan_level_three_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_three_question`
--

INSERT INTO `manhattan_level_three_question` (`id`, `question`, `answer`) VALUES
(1, 'Chortle means', 'loud chuckle of pleasure or amusement'),
(2, 'Pivotal meaning', 'of great importance (others depend on it)'),
(3, 'Repel stands for', 'refuse to accept/cause dislike'),
(4, 'Enigma', 'something that is puzzling'),
(5, 'Buoyant means', 'able to float; light-hearted');

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_three_question_option`
--

CREATE TABLE `manhattan_level_three_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_three_question_option`
--

INSERT INTO `manhattan_level_three_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'of great importance (others depend on it)', 1),
(2, 'something that is puzzling', 1),
(3, 'able to float; light-hearted', 1),
(4, 'loud chuckle of pleasure or amusement', 1),
(5, 'of great importance (others depend on it)', 2),
(6, 'refuse to accept/cause dislike', 2),
(7, 'loud chuckle of pleasure or amusement', 2),
(8, 'able to float; light-hearted', 2),
(9, 'loud chuckle of pleasure or amusement', 3),
(10, 'something that is puzzling', 3),
(11, 'refuse to accept/cause dislike', 3),
(12, 'able to float; light-hearted', 3),
(13, 'of great importance (others depend on it)', 4),
(14, 'refuse to accept/cause dislike', 4),
(15, 'loud chuckle of pleasure or amusement', 4),
(16, 'something that is puzzling', 4),
(17, 'something that is puzzling', 5),
(18, 'of great importance (others depend on it)', 5),
(19, 'refuse to accept/cause dislike', 5),
(20, 'able to float; light-hearted', 5);

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_two_question`
--

CREATE TABLE `manhattan_level_two_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_two_question`
--

INSERT INTO `manhattan_level_two_question` (`id`, `question`, `answer`) VALUES
(1, 'Woo means', 'try to win'),
(2, 'Cordial meaning', 'warm and sincere'),
(3, 'Beguile', 'mislead or delude; cheat; pass time'),
(4, 'Sheath stands for', 'cover for the blade of a weapon or a tool'),
(5, 'what is the meaning of Knit', 'draw together; unite firmly');

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_level_two_question_option`
--

CREATE TABLE `manhattan_level_two_question_option` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_two_question_option`
--

INSERT INTO `manhattan_level_two_question_option` (`id`, `option`, `question_id`) VALUES
(1, 'cover for the blade of a weapon or a tool', 1),
(2, 'mislead or delude; cheat; pass time', 1),
(3, 'try to win', 1),
(4, 'draw together; unite firmly', 1),
(5, 'draw together; unite firmly', 2),
(6, 'warm and sincere', 2),
(7, 'try to win', 2),
(8, 'mislead or delude; cheat; pass time', 2),
(9, 'draw together; unite firmly', 3),
(10, 'warm and sincere', 3),
(11, 'cover for the blade of a weapon or a tool', 3),
(12, 'mislead or delude; cheat; pass time', 3),
(13, 'warm and sincere', 4),
(14, 'cover for the blade of a weapon or a tool', 4),
(15, 'try to win', 4),
(16, 'mislead or delude; cheat; pass time', 4),
(17, 'warm and sincere', 5),
(18, 'draw together; unite firmly', 5),
(19, 'cover for the blade of a weapon or a tool', 5),
(20, 'try to win', 5);

-- --------------------------------------------------------

--
-- Table structure for table `manhattan_word_settings`
--

CREATE TABLE `manhattan_word_settings` (
  `id` int(11) NOT NULL,
  `levelOne` varchar(20) DEFAULT NULL,
  `levelTwo` varchar(20) DEFAULT NULL,
  `levelThree` varchar(20) DEFAULT NULL,
  `levelFour` varchar(20) DEFAULT NULL,
  `levelFive` varchar(20) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_word_settings`
--

INSERT INTO `manhattan_word_settings` (`id`, `levelOne`, `levelTwo`, `levelThree`, `levelFour`, `levelFive`, `user_id`) VALUES
(1, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 1);

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
(23, 'Suffice meaning', 'be enough', 'be enough', 'a model example or pattern', 'lively high-spirited', 'free giving; generosity', 'five', 'barron'),
(24, 'Vivacious stands for', 'lively high-spirited', 'a model example or pattern', 'lively high-spirited', 'be enough', 'free giving; generosity', 'five', 'barron'),
(25, 'Liberality indicates', 'free giving; generosity', 'a model example or pattern', 'free giving; generosity', 'lively high-spirited', 'loyalty accuracy', 'five', 'barron');

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
(3, 'Completed', 'Completed', NULL, 25);

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
(25, 'farhan', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

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
-- Indexes for table `magoosh_level_five_question`
--
ALTER TABLE `magoosh_level_five_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magoosh_level_five_question_option`
--
ALTER TABLE `magoosh_level_five_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `magoosh_level_four_question`
--
ALTER TABLE `magoosh_level_four_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magoosh_level_four_question_option`
--
ALTER TABLE `magoosh_level_four_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `magoosh_level_one_question`
--
ALTER TABLE `magoosh_level_one_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magoosh_level_one_question_option`
--
ALTER TABLE `magoosh_level_one_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `magoosh_level_three_question`
--
ALTER TABLE `magoosh_level_three_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magoosh_level_three_question_option`
--
ALTER TABLE `magoosh_level_three_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `magoosh_level_two_question`
--
ALTER TABLE `magoosh_level_two_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magoosh_level_two_question_option`
--
ALTER TABLE `magoosh_level_two_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `magoosh_word_settings`
--
ALTER TABLE `magoosh_word_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `manhattan_level_five_question`
--
ALTER TABLE `manhattan_level_five_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manhattan_level_five_question_option`
--
ALTER TABLE `manhattan_level_five_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `manhattan_level_four_question`
--
ALTER TABLE `manhattan_level_four_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manhattan_level_four_question_option`
--
ALTER TABLE `manhattan_level_four_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `manhattan_level_one_question`
--
ALTER TABLE `manhattan_level_one_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manhattan_level_one_question_option`
--
ALTER TABLE `manhattan_level_one_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `manhattan_level_three_question`
--
ALTER TABLE `manhattan_level_three_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manhattan_level_three_question_option`
--
ALTER TABLE `manhattan_level_three_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `manhattan_level_two_question`
--
ALTER TABLE `manhattan_level_two_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manhattan_level_two_question_option`
--
ALTER TABLE `manhattan_level_two_question_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `manhattan_word_settings`
--
ALTER TABLE `manhattan_word_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `magoosh_level_five_question`
--
ALTER TABLE `magoosh_level_five_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magoosh_level_five_question_option`
--
ALTER TABLE `magoosh_level_five_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `magoosh_level_four_question`
--
ALTER TABLE `magoosh_level_four_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magoosh_level_four_question_option`
--
ALTER TABLE `magoosh_level_four_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `magoosh_level_one_question`
--
ALTER TABLE `magoosh_level_one_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magoosh_level_one_question_option`
--
ALTER TABLE `magoosh_level_one_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `magoosh_level_three_question`
--
ALTER TABLE `magoosh_level_three_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magoosh_level_three_question_option`
--
ALTER TABLE `magoosh_level_three_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `magoosh_level_two_question`
--
ALTER TABLE `magoosh_level_two_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magoosh_level_two_question_option`
--
ALTER TABLE `magoosh_level_two_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `magoosh_word_settings`
--
ALTER TABLE `magoosh_word_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manhattan_level_five_question`
--
ALTER TABLE `manhattan_level_five_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manhattan_level_five_question_option`
--
ALTER TABLE `manhattan_level_five_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manhattan_level_four_question`
--
ALTER TABLE `manhattan_level_four_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manhattan_level_four_question_option`
--
ALTER TABLE `manhattan_level_four_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manhattan_level_one_question`
--
ALTER TABLE `manhattan_level_one_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manhattan_level_one_question_option`
--
ALTER TABLE `manhattan_level_one_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manhattan_level_three_question`
--
ALTER TABLE `manhattan_level_three_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manhattan_level_three_question_option`
--
ALTER TABLE `manhattan_level_three_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manhattan_level_two_question`
--
ALTER TABLE `manhattan_level_two_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manhattan_level_two_question_option`
--
ALTER TABLE `manhattan_level_two_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manhattan_word_settings`
--
ALTER TABLE `manhattan_word_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `word_table`
--
ALTER TABLE `word_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `magoosh_level_five_question_option`
--
ALTER TABLE `magoosh_level_five_question_option`
  ADD CONSTRAINT `magoosh_level_five_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `magoosh_level_five_question` (`id`);

--
-- Constraints for table `magoosh_level_four_question_option`
--
ALTER TABLE `magoosh_level_four_question_option`
  ADD CONSTRAINT `magoosh_level_four_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `magoosh_level_four_question` (`id`);

--
-- Constraints for table `magoosh_level_one_question_option`
--
ALTER TABLE `magoosh_level_one_question_option`
  ADD CONSTRAINT `magoosh_level_one_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `magoosh_level_one_question` (`id`);

--
-- Constraints for table `magoosh_level_three_question_option`
--
ALTER TABLE `magoosh_level_three_question_option`
  ADD CONSTRAINT `magoosh_level_three_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `magoosh_level_three_question` (`id`);

--
-- Constraints for table `magoosh_level_two_question_option`
--
ALTER TABLE `magoosh_level_two_question_option`
  ADD CONSTRAINT `magoosh_level_two_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `magoosh_level_two_question` (`id`);

--
-- Constraints for table `manhattan_level_five_question_option`
--
ALTER TABLE `manhattan_level_five_question_option`
  ADD CONSTRAINT `manhattan_level_five_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `manhattan_level_five_question` (`id`);

--
-- Constraints for table `manhattan_level_four_question_option`
--
ALTER TABLE `manhattan_level_four_question_option`
  ADD CONSTRAINT `manhattan_level_four_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `manhattan_level_four_question` (`id`);

--
-- Constraints for table `manhattan_level_one_question_option`
--
ALTER TABLE `manhattan_level_one_question_option`
  ADD CONSTRAINT `manhattan_level_one_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `manhattan_level_one_question` (`id`);

--
-- Constraints for table `manhattan_level_three_question_option`
--
ALTER TABLE `manhattan_level_three_question_option`
  ADD CONSTRAINT `manhattan_level_three_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `manhattan_level_three_question` (`id`);

--
-- Constraints for table `manhattan_level_two_question_option`
--
ALTER TABLE `manhattan_level_two_question_option`
  ADD CONSTRAINT `manhattan_level_two_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `manhattan_level_two_question` (`id`);

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
