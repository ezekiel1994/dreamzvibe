-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 06:47 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `action` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `username`, `password`, `action`) VALUES
(1, 'admin1', 'admin123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `category_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `category_date`) VALUES
(1, 'trending', '12-10-2018'),
(2, 'latest', '12-10-2018'),
(3, 'sponsored', '12-10-2018'),
(4, 'new release', '11-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `classess`
--

CREATE TABLE `classess` (
  `class_id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classess`
--

INSERT INTO `classess` (`class_id`, `class`) VALUES
(1, 'Hip-Hop'),
(2, 'classic'),
(3, 'Mix-Tape'),
(4, 'Blues'),
(6, 'instrumental');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `comment_user` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` varchar(20) NOT NULL,
  `comment_action` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `item_id`, `comment_user`, `comment`, `comment_date`, `comment_action`) VALUES
(1, '11', 'tosin', 'wow i love this', '2018-11-19 11:36:05', 1),
(2, '11', 'james', 'this is nice', '2018-11-19 11:38:32', 1),
(3, '11', 'micheal', 'fantastic', '2018-12-21 09:49:28', 1),
(4, '4', 'mike', 'nice!', '2018-12-26 06:45:56', 1),
(5, '4', 'john', 'great music, i love it', '2018-12-26 06:47:04', 1),
(6, '2', 'deniz', 'best song', '2018-12-26 09:39:00', 1),
(7, '1', 'kunle', 'my main man', '2019-01-08 05:56:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(100) NOT NULL,
  `item_author` varchar(50) NOT NULL,
  `item_content` text NOT NULL,
  `item_type` int(2) NOT NULL,
  `item_category` int(2) NOT NULL,
  `item_class` int(1) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `item_file` varchar(100) NOT NULL,
  `item_url` varchar(100) NOT NULL,
  `item_date` varchar(40) NOT NULL,
  `item_action` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `post_url` varchar(100) NOT NULL,
  `post_author` varchar(20) NOT NULL,
  `post_date` varchar(20) NOT NULL,
  `post_image` varchar(50) NOT NULL,
  `post_action` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_url`, `post_author`, `post_date`, `post_image`, `post_action`) VALUES
(1, 'new age tech', '<p>&nbsp;</p>\r\n\r\n<h1><a href=\"#\"><strong>Music playlist 2019</strong></a></h1>\r\n\r\n<ol>\r\n	<li>kiss daniel</li>\r\n	<li>davido</li>\r\n	<li>burna boy</li>\r\n	<li>wizkid</li>\r\n	<li>dreamz</li>\r\n</ol>\r\n', 'new-age-tech', 'admin', '2018-12-30 06:17:17', 'post_img/1546100689.jpg', '1'),
(2, 'new age', '<p><a href=\"#\"><strong>ict 2018</strong></a></p>\r\n\r\n<p><em>agenda</em></p>\r\n\r\n<ol>\r\n	<li>computer sales</li>\r\n	<li>repiar</li>\r\n	<li>programing</li>\r\n	<li>debugging</li>\r\n	<li>software</li>\r\n</ol>\r\n', 'new-age', 'admin', '2018-12-30 07:07:51', 'post_img/1546147386.jpg', '1'),
(3, 'new year resolution', '<p><em>my thought for 2019.</em></p>\r\n\r\n<p>its nice to have the feel of a new year. but it is useless not having a structured plan for the year.</p>\r\n\r\n<blockquote>\r\n<p>its nice to have the feel of a new year.</p>\r\n</blockquote>\r\n\r\n<p>but it is useless not having a structured plan for the year. its nice to have the feel of a new year. but it is useless not having a structured plan for the year. its nice to have the feel of a new year. but it is useless not having a structured plan for the year.</p>\r\n', 'new-year-resolution', 'tosin', '2019-01-05 09:08:33', 'post_img/1546675714.png', '1'),
(4, 'how to make money in 2019', '<p>oijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyyoijjkjkkjjjgtgffgtgtyy</p>\r\n', 'how-to-make-money-in-2019', 'denis', '2019-01-12 06:18:14', 'post_img/1547313494.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `comment_id` int(11) NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `comment_user` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` varchar(20) NOT NULL,
  `comment_action` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`comment_id`, `item_id`, `comment_user`, `comment`, `comment_date`, `comment_action`) VALUES
(7, '2', 'ade', 'nice talk', '2019-01-05 06:32:03', 1),
(8, '1', 'vijay', 'im waiting', '2019-01-05 07:06:22', 1),
(9, '3', 'tosin', 'encouraging!', '2019-01-05 09:10:14', 1),
(10, '3', 'denis', 'wow', '2019-01-12 06:15:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_replies`
--

CREATE TABLE `post_replies` (
  `reply_id` int(11) NOT NULL,
  `reply_user` varchar(30) NOT NULL,
  `reply_header_id` varchar(20) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `reply_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_replies`
--

INSERT INTO `post_replies` (`reply_id`, `reply_user`, `reply_header_id`, `reply`, `reply_date`) VALUES
(3, 'yemi', '7', 'true talk', '2019-01-05 07:01:48'),
(4, 'toyin', '9', 'nice one tosin', '2019-01-05 09:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `reply_user` varchar(30) NOT NULL,
  `reply_header_id` varchar(20) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `reply_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `reply_user`, `reply_header_id`, `reply`, `reply_date`) VALUES
(1, 'yemi', '1', 'me too', '2018-12-27 02:50:11'),
(2, 'yuo', '2', 'very nice', '2018-12-27 02:55:11'),
(3, 'tunji', '7', 'his music is trash joh', '2019-01-08 05:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `song_title` varchar(200) NOT NULL,
  `song_author` varchar(200) NOT NULL,
  `song_image_path` varchar(500) NOT NULL,
  `song_path` varchar(500) NOT NULL,
  `song_description` text NOT NULL,
  `song_category` varchar(1) NOT NULL,
  `song_type` int(11) NOT NULL,
  `song_url` varchar(200) NOT NULL,
  `song_date` varchar(25) NOT NULL,
  `song_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_title`, `song_author`, `song_image_path`, `song_path`, `song_description`, `song_category`, `song_type`, `song_url`, `song_date`, `song_action`) VALUES
(1, 'adura elijah', 'jybo', 'song_image_cover/1541800729.jpg', 'songs/adura-elijah.mp3', 'About me\r\nI\'m Al-Amin Sobuj from Bangladesh. I have a lot of experience in Front-end Development. Specialist in Convert PSD to HTML, SASS, Bootstrap, jQuery, UIKIT, Responsive Design & WordPress. I\'m working hard last 6 years. I always give chance to my clients to proof my best.\r\n\r\nAbout gig\r\nWELCOME TO THE BEST â˜…â˜…HAND-CODED WEB DEVELOPMENTâ˜…â˜… SERVICE ON FIVERR\r\n\r\nGet a Perfect, High Fidelity HTML5 website with full responsiveness for your Businesses & personal needs.\r\nI never use ready-made software for custom website itâ€™s all about manual coding with my individual expertise. The final result undergoes different development stages before delivery.\r\n\r\nNOTE: I\'m delivering the best code quality which is easily editable and maintainable in future.The budget & Time depends on page content so I have to see the design first then we will discuss it. \r\n', '1', 1, 'adura-elijah', '2018-11-09 10:58:49', 1),
(2, 'i love  the way you lie', 'yemi adeleke', 'song_image_cover/1541892333.jpg', 'songs/i-love-the-way-you-lie.mp3', 'Farm Management Information Systems (FMIS) in agriculture have evolved from simple farm recordkeeping into sophisticated and complex systems to support production management and meet the increased demands to reduce production costs, comply with agricultural standards, and maintain high product quality and safety. This paper presents advancements in FMIS functionality from both academic and commercial perspectives. The study focuses on open field crop production and centres on farm managers as the primary users and decision makers. Core system architectures and application domains, adoption and profitability, and FMIS', '1', 1, 'i-love-the-way-you-lie', '2018-11-11 12:25:33', 1),
(3, 'this is nigeria', 'falz', 'song_image_cover/1541892381.jpg', 'songs/this-is-nigeria.mp3', 'Farm Management Information Systems (FMIS) in agriculture have evolved from simple farm recordkeeping into sophisticated and complex systems to support production management and meet the increased demands to reduce production costs, comply with agricultural standards, and maintain high product quality and safety. This paper presents advancements in FMIS functionality from both academic and commercial perspectives. The study focuses on open field crop production and centres on farm managers as the primary users and decision makers. Core system architectures and application domains, adoption and profitability, and FMIS', '1', 1, 'this-is-nigeria', '2018-11-11 12:26:21', 1),
(4, 'able GOD', 'chinko ekun ft lil kesh', 'song_image_cover/1541892429.jpg', 'songs/able-god.wma', 'Farm Management Information Systems (FMIS) in agriculture have evolved from simple farm recordkeeping into sophisticated and complex systems to support production management and meet the increased demands to reduce production costs, comply with agricultural standards, and maintain high product quality and safety. This paper presents advancements in FMIS functionality from both academic and commercial perspectives. The study focuses on open field crop production and centres on farm managers as the primary users and decision makers. Core system architectures and application domains, adoption and profitability, and FMIS', '1', 1, 'able-god', '2018-11-11 12:27:09', 1),
(5, 'one ticket', 'kiss daniel ft davido', 'song_image_cover/1541892714.jpg', 'songs/one-ticket.mp3', 'solutions for precision agriculture as the most information-intensive application area were analysed. Our review of commercial solutions involved the analysis of 141 international software packages, categorizing them into 11 functions. Cluster analysis was used to group current commercial FMIS and examine possible avenues of development according to research outcome. Academic FMIS involved more sophisticated systems covering complying to standards applications, automated data', '1', 1, 'one-ticket', '2018-11-11 12:31:53', 1),
(6, 'baba mi', 'frank edward', 'song_image_cover/1541892768.jpg', 'songs/baba-mi.mp3', 'capture as well as interoperability between different software packages. Conversely, commercial FMIS applications targeted everyday farm office tasks related to budgeting and finance, such as recordkeeping, machinery management, and documentation, with emerging trends showing new functions related to traceability, quality assurance and sales.', '3', 1, 'baba-mi', '2018-11-11 12:32:47', 1),
(7, 'money', 'davido', 'song_image_cover/1541892797.jpg', 'songs/money.mp3', 'capture as well as interoperability between different software packages. Conversely, commercial FMIS applications targeted everyday farm office tasks related to budgeting and finance, such as recordkeeping, machinery management, and documentation, with emerging trends showing new functions related to traceability, quality assurance and sales.', '2', 1, 'money', '2018-11-11 12:33:17', 1),
(8, 'fast fast', 'shina pelar', 'song_image_cover/1541892829.jpg', 'songs/fast-fast.mp3', 'capture as well as interoperability between different software packages. Conversely, commercial FMIS applications targeted everyday farm office tasks related to budgeting and finance, such as recordkeeping, machinery management, and documentation, with emerging trends showing new functions related to traceability, quality assurance and sales.', '2', 1, 'fast-fast', '2018-11-11 12:33:49', 1),
(9, 'pay day', 'cynthia morgan', 'song_image_cover/1541892893.jpg', 'songs/pay-day.mp3', 'capture as well as interoperability between different software packages. Conversely, commercial FMIS applications targeted everyday farm office tasks related to budgeting and finance, such as recordkeeping, machinery management, and documentation, with emerging trends showing new functions related to traceability, quality assurance and sales.', '3', 1, 'pay-day', '2018-11-11 12:34:53', 1),
(10, 'genue lie', 'wizkid', 'song_image_cover/1541892948.jpg', 'songs/genue-lie.mp3', 'capture as well as interoperability between different software packages. Conversely, commercial FMIS applications targeted everyday farm office tasks related to budgeting and finance, such as recordkeeping, machinery management, and documentation, with emerging trends showing new functions related to traceability, quality assurance and sales.', '2', 1, 'genue-lie', '2018-11-11 12:35:47', 1),
(11, 'bless up', 'teejay', 'song_image_cover/1542198265.jpg', 'songs/bless-up.mp3', 'Professional and diligent IT specialist with software engineering principles with a track record of excellent response rate at job delivery. Several years of working experience and online presence with leading global IT web communities such as fiverr, git hub, work desk, stackoverflow.\r\nExhibits capabilities of working with different packages for achieving desired results, My dedication to service is exceptional, reliable and unquantifiable. \r\n', '3', 1, 'bless-up', '2018-11-14 01:24:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_date` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_date`) VALUES
(2, 'tosinezekiel2@gmail.com', '08-Jan-2019');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `video_title` varchar(200) NOT NULL,
  `video_author` varchar(200) NOT NULL,
  `video_image_path` varchar(300) NOT NULL,
  `video_path` varchar(300) NOT NULL,
  `video_description` text NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `video_date` varchar(20) NOT NULL,
  `video_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_title`, `video_author`, `video_image_path`, `video_path`, `video_description`, `video_url`, `video_date`, `video_action`) VALUES
(1, 'adura elijah', 'jybo', 'video_image_cover/1541801110.jpg', 'videos/adura-elijah.mp4', 'function title_exist($value){\r\n	global $con;\r\n	$value=clean_up($value);\r\n	return (mysqli_num_rows(mysqli_query($con,\"select song_title from songs where  song_title = \'$value\'\"))>0)?true : false;\r\n}', 'adura-elijah', '2018-11-09 11:05:09', 1),
(2, 'Dangerous', 'meekmill ft junior', 'video_image_cover/1541892206.jpg', 'videos/dangerous.mp4', 'Farm Management Information Systems (FMIS) in agriculture have evolved from simple farm recordkeeping into sophisticated and complex systems to support production management and meet the increased demands to reduce production costs, comply with agricultural standards, and maintain high product quality and safety. This paper presents advancements in FMIS functionality from both academic and commercial perspectives. The study focuses on open field crop production and centres on farm managers as the primary users and decision makers. Core system architectures and application domains, adoption and profitability, and FMIS', 'dangerous', '2018-11-11 12:23:26', 1),
(3, 'payday', 'davido', 'video_image_cover/1541893204.jpg', 'videos/payday.mp4', 'In this chapter the researcher explains the analysis of online apartment management system for students in Nigeria Army Institute of Technology and Environmental Studies, and also the old system. In other to implement an online apartment management system, the processes, analysis, input requirement specification and output requirement specification, and the advantages were employed, using Nigeria', 'payday', '2018-11-11 12:40:04', 1),
(4, 'able GOD', 'chinko ekun ft lil kesh', 'video_image_cover/1541893240.jpg', 'videos/able-god.mp4', 'In this chapter the researcher explains the analysis of online apartment management system for students in Nigeria Army Institute of Technology and Environmental Studies, and also the old system. In other to implement an online apartment management system, the processes, analysis, input requirement specification and output requirement specification, and the advantages were employed, using Nigeria', 'able-god', '2018-11-11 12:40:40', 1),
(5, 'money', 'davido', 'video_image_cover/1541893300.jpg', 'videos/money.mp4', 'In this chapter the researcher explains the analysis of online apartment management system for students in Nigeria Army Institute of Technology and Environmental Studies, and also the old system. In other to implement an online apartment management system, the processes, analysis, input requirement specification and output requirement specification, and the advantages were employed, using Nigeria', 'money', '2018-11-11 12:41:40', 1),
(6, 'love', 'liss daniel', 'video_image_cover/1541893349.jpg', 'videos/love.mp4', 'In this chapter the researcher explains the analysis of online apartment management system for students in Nigeria Army Institute of Technology and Environmental Studies, and also the old system. In other to implement an online apartment management system, the processes, analysis, input requirement specification and output requirement specification, and the advantages were employed, using Nigeria', 'love', '2018-11-11 12:42:29', 1),
(7, 'shower your blessing', 'barry j', 'video_image_cover/1541893500.jpg', 'videos/shower-your-blessing.mp4', 'Knowledge has no limit, relying solely on safe-knowledge that has already been acquire without trying to quest for more could be unwise, therefore, to achieve this work, source by data were collected by the researcher through the following ways.', 'shower-your-blessing', '2018-11-11 12:45:00', 1),
(8, 'aiye', 'chuddy k', 'video_image_cover/1541893538.jpg', 'videos/aiye.mp4', 'Knowledge has no limit, relying solely on safe-knowledge that has already been acquire without trying to quest for more could be unwise, therefore, to achieve this work, source by data were collected by the researcher through the following ways.', 'aiye', '2018-11-11 12:45:37', 1),
(9, 'fun time', 'wizkid', 'video_image_cover/1541893567.jpg', 'videos/fun-time.mp4', 'Knowledge has no limit, relying solely on safe-knowledge that has already been acquire without trying to quest for more could be unwise, therefore, to achieve this work, source by data were collected by the researcher through the following ways.', 'fun-time', '2018-11-11 12:46:07', 1),
(10, 'street love', 'oluwaseun ft oluwatosin', 'video_image_cover/1541893615.jpg', 'videos/street-love.mp4', 'Knowledge has no limit, relying solely on safe-knowledge that has already been acquire without trying to quest for more could be unwise, therefore, to achieve this work, source by data were collected by the researcher through the following ways.', 'street-love', '2018-11-11 12:46:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `comment_id` int(11) NOT NULL,
  `item_id` varchar(20) NOT NULL,
  `comment_user` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` varchar(20) NOT NULL,
  `comment_action` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_comments`
--

INSERT INTO `video_comments` (`comment_id`, `item_id`, `comment_user`, `comment`, `comment_date`, `comment_action`) VALUES
(7, '9', 'mike', 'i love this video', '2019-01-05 05:57:14', 1),
(8, '8', 'tosin', 'my best song', '2019-01-05 06:02:02', 1),
(9, '8', 'tj', 'this song the burst my brain', '2019-01-05 06:03:13', 1),
(10, '7', 'tosin', 'nice vibe', '2019-01-05 08:36:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_replies`
--

CREATE TABLE `video_replies` (
  `reply_id` int(11) NOT NULL,
  `reply_user` varchar(30) NOT NULL,
  `reply_header_id` varchar(20) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `reply_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_replies`
--

INSERT INTO `video_replies` (`reply_id`, `reply_user`, `reply_header_id`, `reply`, `reply_date`) VALUES
(3, 'jones', '7', 'mee too', '2019-01-05 06:01:03'),
(4, 'james', '10', 'john', '2019-01-05 08:36:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `classess`
--
ALTER TABLE `classess`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post_replies`
--
ALTER TABLE `post_replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `video_replies`
--
ALTER TABLE `video_replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classess`
--
ALTER TABLE `classess`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_replies`
--
ALTER TABLE `post_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `video_replies`
--
ALTER TABLE `video_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
