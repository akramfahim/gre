-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 04:17 PM
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
  `levelTwo` varchar(20) DEFAULT NULL,
  `levelThree` varchar(20) DEFAULT NULL,
  `levelFour` varchar(20) DEFAULT NULL,
  `levelFive` varchar(20) DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barron_word_settings`
--

INSERT INTO `barron_word_settings` (`id`, `levelOne`, `levelTwo`, `levelThree`, `levelFour`, `levelFive`, `user_id`) VALUES
(1, 'Completed', NULL, NULL, NULL, NULL, 8),
(2, 'Completed', NULL, NULL, NULL, NULL, 1),
(3, 'Completed', NULL, NULL, NULL, NULL, 2),
(4, 'Completed', NULL, NULL, NULL, NULL, 11),
(5, 'Completed', NULL, NULL, NULL, NULL, 10),
(6, 'Completed', NULL, NULL, NULL, NULL, 19),
(14, 'Completed', 'Completed', NULL, NULL, NULL, 21),
(15, 'Completed', 'Completed', NULL, NULL, NULL, 20),
(20, 'Completed', 'Completed', 'Completed', NULL, NULL, 22),
(28, 'Completed', 'Completed', 'Completed', 'Completed', 'Completed', 24);

-- --------------------------------------------------------

--
-- Table structure for table `level_five_question_barron`
--

CREATE TABLE `level_five_question_barron` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_five_question_barron`
--

INSERT INTO `level_five_question_barron` (`id`, `question`, `answer`) VALUES
(1, 'What does Fidelity means', 'loyalty accuracy'),
(2, 'Paradigm means', 'a model example or pattern'),
(3, 'Suffice meaning', 'be enough'),
(4, 'Vivacious stands for', 'lively high-spirited'),
(5, 'Liberality indicates', 'free giving; generosity');

-- --------------------------------------------------------

--
-- Table structure for table `level_five_question_option_barron`
--

CREATE TABLE `level_five_question_option_barron` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_five_question_option_barron`
--

INSERT INTO `level_five_question_option_barron` (`id`, `option`, `question_id`) VALUES
(1, 'a model example or pattern', 1),
(2, 'be enough', 1),
(3, 'loyalty accuracy', 1),
(4, 'free giving; generosity', 1),
(5, 'loyalty accuracy', 2),
(6, 'be enough', 2),
(7, 'a model example or pattern', 2),
(8, 'lively high-spirited', 2),
(9, 'be enough', 3),
(10, 'lively high-spirited', 3),
(11, 'a model example or pattern', 3),
(12, 'free giving; generosity', 3),
(13, 'loyalty accuracy', 4),
(14, 'be enough', 4),
(15, 'lively high-spirited', 4),
(16, 'free giving; generosity', 4),
(17, 'a model example or pattern', 5),
(18, 'free giving; generosity', 5),
(19, 'lively high-spirited', 5),
(20, 'loyalty accuracy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_five_word_barron`
--

CREATE TABLE `level_five_word_barron` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_five_word_barron`
--

INSERT INTO `level_five_word_barron` (`id`, `word_name`, `description`) VALUES
(1, 'Fidelity', 'loyalty accuracy'),
(2, 'Paradigm', 'a model example or pattern'),
(3, 'Suffice', 'be enough'),
(4, 'Vivacious', 'lively high-spirited'),
(5, 'Liberality', 'free giving; generosity');

-- --------------------------------------------------------

--
-- Table structure for table `level_four_question_barron`
--

CREATE TABLE `level_four_question_barron` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_four_question_barron`
--

INSERT INTO `level_four_question_barron` (`id`, `question`, `answer`) VALUES
(1, 'Sluggard means', 'lazy slow-moving person'),
(2, 'Reiterate stands for', 'say or do again several times'),
(3, 'Eloquence meaning', 'fluent speaking skillful use of language'),
(4, 'What does Steeply means', 'rising or falling sharply'),
(5, 'Turmoil means', 'trouble disturbance');

-- --------------------------------------------------------

--
-- Table structure for table `level_four_question_option_barron`
--

CREATE TABLE `level_four_question_option_barron` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_four_question_option_barron`
--

INSERT INTO `level_four_question_option_barron` (`id`, `option`, `question_id`) VALUES
(1, 'say or do again several times', 1),
(2, 'fluent speaking skillful use of language', 1),
(3, 'lazy slow-moving person', 1),
(4, 'trouble disturbance', 1),
(5, 'say or do again several times', 2),
(6, 'fluent speaking skillful use of language', 2),
(7, 'lazy slow-moving person', 2),
(8, 'rising or falling sharply', 2),
(9, 'trouble disturbance', 3),
(10, 'lazy slow-moving person', 3),
(11, 'say or do again several times', 3),
(12, 'fluent speaking skillful use of language', 3),
(13, 'say or do again several times', 4),
(14, 'rising or falling sharply', 4),
(15, 'trouble disturbance', 4),
(16, 'lazy slow-moving person', 4),
(17, 'lazy slow-moving person', 5),
(18, 'rising or falling sharply', 5),
(19, 'say or do again several times', 5),
(20, 'trouble disturbance', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_four_word_barron`
--

CREATE TABLE `level_four_word_barron` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_four_word_barron`
--

INSERT INTO `level_four_word_barron` (`id`, `word_name`, `description`) VALUES
(1, 'Sluggard', 'lazy slow-moving person'),
(2, 'Reiterate', 'say or do again several times'),
(3, 'Eloquence', 'fluent speaking skillful use of language'),
(4, 'Steeply', 'rising or falling sharply'),
(5, 'Turmoil', 'trouble disturbance');

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
(5, 'Affirmation', 'positive assertion; confirmation; solemn pledge by one who refuses to take an oath; V. affirm; ADJ. affirmative; CF. affirmative action: positive discrimination');

-- --------------------------------------------------------

--
-- Table structure for table `level_three_question_barron`
--

CREATE TABLE `level_three_question_barron` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_three_question_barron`
--

INSERT INTO `level_three_question_barron` (`id`, `question`, `answer`) VALUES
(1, 'What does Amalgamate means', 'mix; combine; unite societies'),
(2, 'What is the meaning of Suffocate', 'cause or have difficulty in breathing'),
(3, 'Drowsiness means ', 'feeling sleepy half asleep'),
(4, 'Combustion meaning', 'process of burning'),
(5, 'Sporadic means', 'happening from time to time');

-- --------------------------------------------------------

--
-- Table structure for table `level_three_question_option_barron`
--

CREATE TABLE `level_three_question_option_barron` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_three_question_option_barron`
--

INSERT INTO `level_three_question_option_barron` (`id`, `option`, `question_id`) VALUES
(6, 'mix; combine; unite societies', 1),
(7, 'happening from time to time', 1),
(8, 'cause or have difficulty in breathing', 1),
(9, 'feeling sleepy half asleep', 1),
(10, 'process of burning', 2),
(11, 'cause or have difficulty in breathing', 2),
(12, 'mix; combine; unite societies', 2),
(13, 'happening from time to time', 2),
(14, 'happening from time to time', 3),
(15, 'process of burning', 3),
(16, 'mix; combine; unite societies', 3),
(17, 'feeling sleepy half asleep', 3),
(18, 'process of burning', 4),
(19, 'cause or have difficulty in breathing', 4),
(20, 'mix; combine; unite societies', 4),
(21, 'happening from time to time', 4),
(22, 'process of burning', 5),
(23, 'feeling sleepy half asleep', 5),
(24, 'cause or have difficulty in breathing', 5),
(25, 'happening from time to time', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_three_word_barron`
--

CREATE TABLE `level_three_word_barron` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_three_word_barron`
--

INSERT INTO `level_three_word_barron` (`id`, `word_name`, `description`) VALUES
(1, 'Amalgamate', 'mix; combine; unite societies'),
(2, 'Drowsiness', 'feeling sleepy half asleep'),
(3, 'Suffocate', 'cause or have difficulty in breathing'),
(4, 'Sporadic', 'happening from time to time'),
(5, 'Combustion', 'process of burning');

-- --------------------------------------------------------

--
-- Table structure for table `level_two_question_barron`
--

CREATE TABLE `level_two_question_barron` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_two_question_barron`
--

INSERT INTO `level_two_question_barron` (`id`, `question`, `answer`) VALUES
(1, 'Introspection Means', 'examining one\'s own thoughts and feelings'),
(2, 'What does Strive means ', 'To make great efforts, to struggle'),
(3, 'Philanthropist stands for', 'one who loves mankind'),
(4, 'What is the meaning of Precursors', 'A person or thing that precedes, as in a process or job'),
(5, 'Ambiguous means', 'Doubtful; uncertain');

-- --------------------------------------------------------

--
-- Table structure for table `level_two_question_option_barron`
--

CREATE TABLE `level_two_question_option_barron` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_two_question_option_barron`
--

INSERT INTO `level_two_question_option_barron` (`id`, `option`, `question_id`) VALUES
(1, 'one who loves mankind', 1),
(2, 'examining one\'s own thoughts and feelings', 1),
(3, 'To make great efforts, to struggle', 1),
(4, 'Doubtful; uncertain', 1),
(5, 'one who loves mankind', 2),
(6, 'examining one\'s own thoughts and feelings', 2),
(7, 'To make great efforts, to struggle', 2),
(8, 'A person or thing that precedes, as in a process or job', 2),
(9, 'A person or thing that precedes, as in a process or job', 3),
(10, 'Doubtful; uncertain', 3),
(11, 'examining one\'s own thoughts and feelings', 3),
(12, 'one who loves mankind', 3),
(13, 'A person or thing that precedes, as in a process or job', 4),
(14, 'one who loves mankind', 4),
(15, 'To make great efforts, to struggle', 4),
(16, 'Doubtful; uncertain', 4),
(17, 'examining one\'s own thoughts and feelings', 5),
(18, 'To make great efforts, to struggle', 5),
(19, 'A person or thing that precedes, as in a process or job', 5),
(20, 'Doubtful; uncertain', 5);

-- --------------------------------------------------------

--
-- Table structure for table `level_two_word_barron`
--

CREATE TABLE `level_two_word_barron` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_two_word_barron`
--

INSERT INTO `level_two_word_barron` (`id`, `word_name`, `description`) VALUES
(1, 'Introspection', 'examining one\'s own thoughts and feelings'),
(2, 'Philanthropist', 'one who loves mankind'),
(3, 'Strive', 'To make great efforts, to struggle'),
(4, 'Precursors', 'A person or thing that precedes, as in a process or job'),
(5, 'Ambiguous', 'Doubtful; uncertain'),
(6, 'Aggravate', 'Make worse; irritate');

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
-- Table structure for table `magoosh_level_five_word`
--

CREATE TABLE `magoosh_level_five_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_five_word`
--

INSERT INTO `magoosh_level_five_word` (`id`, `word_name`, `description`) VALUES
(1, 'Perjury', 'willful FALSE statement unlawful act'),
(2, 'Pest', 'destructive thing or a person who is nuisance'),
(3, 'Colloquial', 'involving or using conversation.'),
(4, 'Paradigm', 'a model example or pattern'),
(5, 'Tractable', 'easily controlled or guided');

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
-- Table structure for table `magoosh_level_four_word`
--

CREATE TABLE `magoosh_level_four_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_four_word`
--

INSERT INTO `magoosh_level_four_word` (`id`, `word_name`, `description`) VALUES
(1, 'Extralegal', 'outside the law'),
(2, 'Ambivalent', 'having both of two contrary meanings'),
(3, 'Endorse', 'write one\'s name on the back of'),
(4, 'Connoisseur', 'a person with good judgement (e.g.. in art)'),
(5, 'Parenthesis', 'sentence within another one something separated');

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
-- Table structure for table `magoosh_level_one_word`
--

CREATE TABLE `magoosh_level_one_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_one_word`
--

INSERT INTO `magoosh_level_one_word` (`id`, `word_name`, `description`) VALUES
(1, 'Abstruse', 'Difficult to understand; incomprehensible'),
(2, 'Acrimony', 'Bitterness and ill will'),
(3, 'Admonish(verb)', 'o warn strongly, even to the point of reprimanding'),
(4, 'Auspicious(adjective)', ' Favorable, the opposite of sinister'),
(5, 'banality(noun)', 'A trite or obvious remark');

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
-- Table structure for table `magoosh_level_three_word`
--

CREATE TABLE `magoosh_level_three_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_three_word`
--

INSERT INTO `magoosh_level_three_word` (`id`, `word_name`, `description`) VALUES
(1, 'mischievous', 'harmful; causing mischief'),
(2, 'Misogynist', 'one who hates women/females'),
(3, 'Pertain', 'belong as a part have reference'),
(4, 'Inclined', 'directing the mind in a certain direction'),
(5, 'Lambaste', 'attack verbally');

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
-- Table structure for table `magoosh_level_two_word`
--

CREATE TABLE `magoosh_level_two_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magoosh_level_two_word`
--

INSERT INTO `magoosh_level_two_word` (`id`, `word_name`, `description`) VALUES
(1, 'Grievous', 'causing grief or pain; serious dire grave'),
(2, 'Hypocrisy', 'falsely making oneself appear to be good'),
(3, 'Chisel', 'steel tool for shaping materials'),
(4, 'Engulf', 'swallow up'),
(5, 'Riddle', 'puzzling person or thing');

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
-- Table structure for table `manhattan_level_five_word`
--

CREATE TABLE `manhattan_level_five_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_five_word`
--

INSERT INTO `manhattan_level_five_word` (`id`, `word_name`, `description`) VALUES
(1, 'Foster', 'nurture; care for'),
(2, 'Apartheid', 'brutal racial discrimination'),
(3, 'Garrulous', 'too talkative'),
(4, 'Edify', 'instruct; correct morally'),
(5, 'Evasive', 'tending to evade');

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
-- Table structure for table `manhattan_level_four_word`
--

CREATE TABLE `manhattan_level_four_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_four_word`
--

INSERT INTO `manhattan_level_four_word` (`id`, `word_name`, `description`) VALUES
(1, 'Boisterous', 'noisy; restraint'),
(2, 'Resuscitation', 'coming back to consciousness'),
(3, 'Recitals', 'a number of performance of music'),
(4, 'Treacherous', 'not to be trusted, perfidious'),
(5, 'Indulgent', 'inclined to indulge');

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
-- Table structure for table `manhattan_level_one_word`
--

CREATE TABLE `manhattan_level_one_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_one_word`
--

INSERT INTO `manhattan_level_one_word` (`id`, `word_name`, `description`) VALUES
(1, 'Spear', 'weapon with a metal point on a long shaft'),
(2, 'Presentiment', 'anticipatory fear; premonition'),
(3, 'Coagulation', 'change to a thick and solid state'),
(4, 'Brass', 'yellow metal (mixing copper and zinc)'),
(5, 'Malleable', 'yielding easily shaped; moldable; adapting');

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
-- Table structure for table `manhattan_level_three_word`
--

CREATE TABLE `manhattan_level_three_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_three_word`
--

INSERT INTO `manhattan_level_three_word` (`id`, `word_name`, `description`) VALUES
(1, 'chortle', 'loud chuckle of pleasure or amusement'),
(2, 'Pivotal', 'of great importance (others depend on it)'),
(3, 'Repel', 'refuse to accept/cause dislike'),
(4, 'Enigma', 'something that is puzzling'),
(5, 'Buoyant', 'able to float; light-hearted');

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
-- Table structure for table `manhattan_level_two_word`
--

CREATE TABLE `manhattan_level_two_word` (
  `id` int(11) NOT NULL,
  `word_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manhattan_level_two_word`
--

INSERT INTO `manhattan_level_two_word` (`id`, `word_name`, `description`) VALUES
(1, 'Woo', 'try to win'),
(2, 'Cordial', 'warm and sincere'),
(3, 'Beguile', 'mislead or delude; cheat; pass time'),
(4, 'Sheath', 'cover for the blade of a weapon or a tool'),
(5, 'Knit', 'draw together; unite firmly');

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
(2, NULL, 'Completed', NULL, 1);

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
(24, 'Mujakkir', 'mujakkir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

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
-- Indexes for table `level_five_question_barron`
--
ALTER TABLE `level_five_question_barron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_five_question_option_barron`
--
ALTER TABLE `level_five_question_option_barron`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `level_five_word_barron`
--
ALTER TABLE `level_five_word_barron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_four_question_barron`
--
ALTER TABLE `level_four_question_barron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_four_question_option_barron`
--
ALTER TABLE `level_four_question_option_barron`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `level_four_word_barron`
--
ALTER TABLE `level_four_word_barron`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `level_three_question_barron`
--
ALTER TABLE `level_three_question_barron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_three_question_option_barron`
--
ALTER TABLE `level_three_question_option_barron`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `level_three_word_barron`
--
ALTER TABLE `level_three_word_barron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_two_question_barron`
--
ALTER TABLE `level_two_question_barron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_two_question_option_barron`
--
ALTER TABLE `level_two_question_option_barron`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `level_two_word_barron`
--
ALTER TABLE `level_two_word_barron`
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
-- Indexes for table `magoosh_level_five_word`
--
ALTER TABLE `magoosh_level_five_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `magoosh_level_four_word`
--
ALTER TABLE `magoosh_level_four_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `magoosh_level_one_word`
--
ALTER TABLE `magoosh_level_one_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `magoosh_level_three_word`
--
ALTER TABLE `magoosh_level_three_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `magoosh_level_two_word`
--
ALTER TABLE `magoosh_level_two_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `manhattan_level_five_word`
--
ALTER TABLE `manhattan_level_five_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `manhattan_level_four_word`
--
ALTER TABLE `manhattan_level_four_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `manhattan_level_one_word`
--
ALTER TABLE `manhattan_level_one_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `manhattan_level_three_word`
--
ALTER TABLE `manhattan_level_three_word`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `manhattan_level_two_word`
--
ALTER TABLE `manhattan_level_two_word`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manhattan_word_settings`
--
ALTER TABLE `manhattan_word_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barron_word_settings`
--
ALTER TABLE `barron_word_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `level_five_question_barron`
--
ALTER TABLE `level_five_question_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_five_question_option_barron`
--
ALTER TABLE `level_five_question_option_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `level_five_word_barron`
--
ALTER TABLE `level_five_word_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_four_question_barron`
--
ALTER TABLE `level_four_question_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_four_question_option_barron`
--
ALTER TABLE `level_four_question_option_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `level_four_word_barron`
--
ALTER TABLE `level_four_word_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_three_question_barron`
--
ALTER TABLE `level_three_question_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_three_question_option_barron`
--
ALTER TABLE `level_three_question_option_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `level_three_word_barron`
--
ALTER TABLE `level_three_word_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_two_question_barron`
--
ALTER TABLE `level_two_question_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_two_question_option_barron`
--
ALTER TABLE `level_two_question_option_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `level_two_word_barron`
--
ALTER TABLE `level_two_word_barron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- AUTO_INCREMENT for table `magoosh_level_five_word`
--
ALTER TABLE `magoosh_level_five_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `magoosh_level_four_word`
--
ALTER TABLE `magoosh_level_four_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `magoosh_level_one_word`
--
ALTER TABLE `magoosh_level_one_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `magoosh_level_three_question`
--
ALTER TABLE `magoosh_level_three_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `magoosh_level_three_question_option`
--
ALTER TABLE `magoosh_level_three_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `magoosh_level_three_word`
--
ALTER TABLE `magoosh_level_three_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `magoosh_level_two_word`
--
ALTER TABLE `magoosh_level_two_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `manhattan_level_five_word`
--
ALTER TABLE `manhattan_level_five_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `manhattan_level_four_word`
--
ALTER TABLE `manhattan_level_four_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `manhattan_level_one_question`
--
ALTER TABLE `manhattan_level_one_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `manhattan_level_one_question_option`
--
ALTER TABLE `manhattan_level_one_question_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `manhattan_level_one_word`
--
ALTER TABLE `manhattan_level_one_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `manhattan_level_three_word`
--
ALTER TABLE `manhattan_level_three_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `manhattan_level_two_word`
--
ALTER TABLE `manhattan_level_two_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `manhattan_word_settings`
--
ALTER TABLE `manhattan_word_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barron_word_settings`
--
ALTER TABLE `barron_word_settings`
  ADD CONSTRAINT `barron_word_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `level_five_question_option_barron`
--
ALTER TABLE `level_five_question_option_barron`
  ADD CONSTRAINT `level_five_question_option_barron_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `level_five_question_barron` (`id`);

--
-- Constraints for table `level_four_question_option_barron`
--
ALTER TABLE `level_four_question_option_barron`
  ADD CONSTRAINT `level_four_question_option_barron_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `level_four_question_barron` (`id`);

--
-- Constraints for table `level_one_question_option`
--
ALTER TABLE `level_one_question_option`
  ADD CONSTRAINT `level_one_question_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `level_one_question` (`id`);

--
-- Constraints for table `level_three_question_option_barron`
--
ALTER TABLE `level_three_question_option_barron`
  ADD CONSTRAINT `level_three_question_option_barron_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `level_three_question_barron` (`id`);

--
-- Constraints for table `level_two_question_option_barron`
--
ALTER TABLE `level_two_question_option_barron`
  ADD CONSTRAINT `level_two_question_option_barron_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `level_two_question_barron` (`id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
