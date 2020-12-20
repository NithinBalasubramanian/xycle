-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 03:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xycle`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `fields` varchar(100) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `plan`, `fields`, `count`, `status`) VALUES
(4, '1', 'Profile', 1, 1),
(3, '5', 'E-Brochure', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `user_id`, `img`, `field`, `location`, `date`, `status`) VALUES
(1, 'shoes', 'ilEjtL', '1600597093_a.png', 'fashion', 'coimbatore', '20-09-2020', 1),
(3, 'Ecom', 'ilEjtL', '1600607717_a.jpg', '', '', '20-09-2020', 1),
(4, 'Check', 'ilEjtL', '1600608411_a.jpg', 'shoe', '', '20-09-2020', 1),
(5, 'Billing', 'ilEjtL', '1603550413_a.jpg', 'software', 'india', '24-10-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `chat_from` varchar(100) DEFAULT NULL,
  `chat_to` varchar(100) DEFAULT NULL,
  `chat_data` text,
  `chat_attach_doc` varchar(100) DEFAULT NULL,
  `chat_img` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chat_from`, `chat_to`, `chat_data`, `chat_attach_doc`, `chat_img`, `state`, `date`) VALUES
(1, 'ilEjtL', '1RUVgy', 'check1', NULL, NULL, 0, '22-09-2020 16:23'),
(2, '1RUVgy', 'ilEjtL', 'Hello', NULL, NULL, 0, '22-09-2020 16:27'),
(3, '1RUVgy', 'ilEjtL', 'send check', NULL, NULL, 0, '22-09-2020 17:06'),
(4, 'ilEjtL', '1RUVgy', 'how is date going\r\n', NULL, NULL, 0, '22-09-2020 17:13'),
(5, 'ilEjtL', '1RUVgy', 'This is check with a big data sending from admin side', NULL, NULL, 0, '22-09-2020 17:17'),
(6, 'ilEjtL', '1RUVgy', 'did you get me\r\n', NULL, NULL, 0, '22-09-2020 17:28'),
(7, 'ilEjtL', 'pDleTq', 'hello\r\n', NULL, NULL, 0, '22-09-2020 17:37'),
(8, '1RUVgy', 'ilEjtL', 'Ya ok fine\r\n', NULL, NULL, 0, '22-09-2020 17:40'),
(9, '1RUVgy', 'ilEjtL', 'hello', NULL, NULL, 0, '22-09-2020 17:41'),
(10, 'ilEjtL', '1RUVgy', 'ya', NULL, NULL, 0, '22-09-2020 17:47'),
(13, 'ilEjtL', '1RUVgy', '', NULL, '1600791222_chat.jpg', 0, '22-09-2020 18:13'),
(14, 'ilEjtL', '1RUVgy', 'check after img', NULL, '1600791264_chat.jpg', 0, '22-09-2020 18:14'),
(15, '1RUVgy', 'ilEjtL', 'got the image', NULL, NULL, 0, '22-09-2020 18:24'),
(16, 'ilEjtL', '1RUVgy', '', NULL, '1600791945_chat.jpg', 0, '22-09-2020 18:25'),
(17, '1RUVgy', 'ilEjtL', '', NULL, '1600792002_chat.png', 0, '22-09-2020 18:26'),
(18, 'ilEjtL', '1RUVgy', '', '1600792478_chat.pdf', NULL, 0, '22-09-2020 18:34'),
(19, '1RUVgy', 'ilEjtL', 'hi good afternoon', NULL, NULL, 0, '23-09-2020 09:14'),
(20, '1RUVgy', 'ilEjtL', 'checking', NULL, NULL, 0, '23-09-2020 09:15'),
(21, 'ilEjtL', '1RUVgy', 'hello', NULL, NULL, 0, '26-10-2020 10:02'),
(22, 'ilEjtL', '1RUVgy', 'check time', NULL, NULL, 0, '26-10-2020 10:03'),
(23, 'ilEjtL', '1RUVgy', '', NULL, '1603686825_at.jpg', 0, '26-10-2020 10:03'),
(24, 'ilEjtL', 'pDleTq', 'hello there', NULL, NULL, 0, '26-10-2020 10:05');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `own_id` varchar(100) DEFAULT NULL,
  `comment_on` int(11) DEFAULT NULL,
  `comment` text,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `own_id`, `comment_on`, `comment`, `date`) VALUES
(1, 'ilEjtL', 'ilEjtL', 3, 'Get more information', '01/09/2020'),
(2, 'i1XU3f', 'ilEjtL', 18, 'interested inbox your data', '01/09/2020'),
(3, 'ilEjtL', 'ilEjtL', 18, 'great work\r\n', '01/09/2020'),
(4, 'ilEjtL', 'pDleTq', 17, 'hello', '01/09/2020'),
(5, 'ilEjtL', 'ilEjtL', 3, 'check', '12/09/2020'),
(6, 'ilEjtL', 'ilEjtL', 18, 'check', '12-10-2020'),
(7, 'ilEjtL', 'pDleTq', 17, 'got it', '12-10-2020'),
(8, 'ilEjtL', 'pDleTq', 17, 'great', '12-10-2020'),
(9, 'ilEjtL', 'pDleTq', 17, 'got it now', '12-10-2020'),
(10, 'ilEjtL', 'pDleTq', 17, 'check', '21-10-2020'),
(11, 'ilEjtL', 'pDleTq', 17, 'hello', '21-10-2020'),
(12, 'ilEjtL', 'pDleTq', 17, 'nnn\r\n', '21-10-2020'),
(13, 'ilEjtL', '1RUVgy', 21, 'Get me details @ 8838825568', '25-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `connect`
--

CREATE TABLE `connect` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `connection_id` varchar(100) DEFAULT NULL,
  `confirm` int(11) DEFAULT '0',
  `deny` int(11) DEFAULT '1',
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connect`
--

INSERT INTO `connect` (`id`, `user_id`, `connection_id`, `confirm`, `deny`, `date`) VALUES
(1, 'ilEjtL', 'dOwAzB', 1, 1, '29/08/2020'),
(2, 'ilEjtL', 'pDleTq', 1, 1, '29/08/2020'),
(4, 'i1XU3f', 'dOwAzB', 0, 1, '30/08/2020'),
(5, 'i1XU3f', 'ilEjtL', 0, 1, '30/08/2020'),
(6, 'T6hFtI', 'ilEjtL', 0, 1, '30/08/2020'),
(7, '1RUVgy', 'ilEjtL', 1, 1, '20/09/2020'),
(8, '1RUVgy', 'TDAcPM', 0, 1, '20/09/2020');

-- --------------------------------------------------------

--
-- Table structure for table `ecard`
--

CREATE TABLE `ecard` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `post_type` varchar(100) DEFAULT NULL,
  `look` varchar(100) DEFAULT NULL,
  `buisness_name` varchar(100) DEFAULT NULL,
  `person_name` varchar(100) DEFAULT NULL,
  `profile_img` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `address` text,
  `logo` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `insta` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `watsapp` varchar(100) DEFAULT NULL,
  `promo_video` varchar(100) DEFAULT NULL,
  `meme_img` varchar(100) DEFAULT NULL,
  `meme_top` varchar(100) DEFAULT NULL,
  `meme_bottom` varchar(100) DEFAULT NULL,
  `mode` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `job_profile_id` int(11) DEFAULT NULL,
  `broucher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecard`
--

INSERT INTO `ecard` (`id`, `user_id`, `post_type`, `look`, `buisness_name`, `person_name`, `profile_img`, `designation`, `mobile`, `email`, `website`, `address`, `logo`, `color`, `description`, `status`, `fb`, `twitter`, `youtube`, `insta`, `linkedin`, `watsapp`, `promo_video`, `meme_img`, `meme_top`, `meme_bottom`, `mode`, `date`, `invoice_id`, `job_profile_id`, `broucher_id`) VALUES
(1, 'ilEjtL', 'e_card', 'Landscape', 'pingifinit', 'nithin', '1598082100_ecard.jpg', 'programming', '9876543210', 'nithinmigo1@gmail.com', NULL, 'coimbatore', '1598082100_ecard1.jpg', '#5f0202', 'web developer', 1, 'nithinBalasubramanian', '', '', '', 'nithinbalasubramanian', '8838825568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ilEjtL', 'e_card', 'portrait', 'Pingifinit Software Technologies', 'Nithin Balasubramanian', '1598107866_ecard.jpg', 'Programmer', '+91 8838825568', 'nithinmigo1@gmail.com', 'https://pingifinit.com', 'Coimbatore , Tamil Nadu', '1598082100_ecard1.jpg', '#e10505', 'Web developer e-commerce,ERP software ', 1, 'https://facebook.com/nithin', 'https://twitter.com', 'https://youtube.com', 'https://instagram.com', 'https://linkedin.com/NithinBalasubramanian', '8838825568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'ilEjtL', 'e_card', 'portrait', 'Firewalls', 'Ram kiran', '1598110136_ecard.jpg', 'Sales person', '9987789878', 'pingifinitcheck@gmail.com', 'https://firewalls.com', 'saravapatti,coimbatore', '1598110136_ecard1.jpg', '#16c0ac', '   Sales of frozen foods and vegitable', 1, 'https://facebook.com', '', 'https://youtube.com', 'https://instagram.com', 'https://linkedin.com/NithinBalasubramanian', '88989989098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'TDAcPM', 'e_card', 'portrait', 'Firewalls Networking', 'Kabilash', '1598167340_ecard.jpg', 'Networker', '8838825568', 'pingifinitcheck@gmail.com', 'https://firewalls.in', 'Coimbatore ,Tamil nadu ,India', '1598167340_ecard1.jpg', 'blue', 'Have your network uninterupted and extend you buisness', 1, 'https://facebook.com', '', 'https://youtube.com', '', 'https://linkedin.com', '8838825568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'pDleTq', 'e_card', 'portrait', 'Firewall', 'Kiran kumar', '1598186643_ecard1.jpg', 'programming', '8898898899', 'nithinmigo1@gmail.com', 'https://illam.co.in', 'S.F.No.18/2, K.K.Nagar, Bharathi Nagar,4th Street Extn., Ganapathy, Coimbatore', '1598186643_ecard1.jpg', '#f63513', 'Web application', 1, 'https://facebook.com/nithin', 'https://twitter.com', '', 'https://instagram.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'ilEjtL', 'promo', NULL, 'Firewall', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '  check', NULL, '', '', '', '', '', '', '1598620079_ecard.mp4', NULL, NULL, NULL, NULL, '25-10-2020', NULL, NULL, NULL),
(21, '1RUVgy', 'meme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1603607019_meme.png', 'Banners', 'Digital Banners for rs 100', 'dark', '25-10-2020', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `e_invoice`
--

CREATE TABLE `e_invoice` (
  `id` int(11) NOT NULL,
  `ecard_id` int(11) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `logo_pic` varchar(100) DEFAULT NULL,
  `inv_from` varchar(100) DEFAULT NULL,
  `inv_to` varchar(100) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `payment_terms` varchar(100) DEFAULT NULL,
  `other_charges` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `amount_paid` int(11) DEFAULT NULL,
  `due` int(11) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `from_address` varchar(100) DEFAULT NULL,
  `from_phone` varchar(100) DEFAULT NULL,
  `from_bus_phone` varchar(100) DEFAULT NULL,
  `to_email` varchar(100) DEFAULT NULL,
  `to_address` varchar(100) DEFAULT NULL,
  `to_phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_invoice`
--

INSERT INTO `e_invoice` (`id`, `ecard_id`, `file_name`, `logo_pic`, `inv_from`, `inv_to`, `invoice`, `payment_terms`, `other_charges`, `total`, `amount_paid`, `due`, `from_email`, `from_address`, `from_phone`, `from_bus_phone`, `to_email`, `to_address`, `to_phone`) VALUES
(1, 23, 'check', NULL, 'Pingifinit', 'nithin', '001', 'check', 0, 200001, 10000, 10000, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 24, 'pingif', '1603626183_e_inv_logo.png', 'Pingifinit', 'Nithin', '008', 'check', 0, 21000, 16000, 5000, 'pingifinit@gmail.com', 'coimbatore', '8838825568', '8838825568', 'nihtinmigo1@gmail.com', 'kotagiri', '9751129019'),
(3, 25, 'pingif', '1603626371_e_inv_logo.png', 'Pingifinit', 'Nithin', '010', 'check', 0, 21000, 16000, 5000, 'pingifinit@gmail.com', 'coimbatore', '8838825568', '8838825568', 'nihtinmigo1@gmail.com', 'kotagiri', '9751129019');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `admin` varchar(100) DEFAULT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `group_desc` varchar(100) DEFAULT NULL,
  `group_type` varchar(100) DEFAULT NULL,
  `group_img` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `admin`, `group_name`, `group_desc`, `group_type`, `group_img`, `date`) VALUES
(1, 'ilEjtL', 'Apllication Dev', 'Application developer club', 'public', '1603641938_group_logo.jpg', '25-10-2020'),
(2, 'ilEjtL', 'car lovers', 'car lovers', 'private', '1603642344_group_logo.jpg', '25-10-2020'),
(4, '1RUVgy', 'Website', 'check', 'public', '1603691026_group_logo.png', '26-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `id` int(11) NOT NULL,
  `chat_from` varchar(100) DEFAULT NULL,
  `group_to` varchar(100) DEFAULT NULL,
  `chat` text,
  `chat_img` varchar(100) DEFAULT NULL,
  `chat_attach_doc` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`id`, `chat_from`, `group_to`, `chat`, `chat_img`, `chat_attach_doc`, `state`, `date`) VALUES
(1, 'ilEjtL', '1', 'check group', NULL, NULL, 0, '26-10-2020 10:32'),
(2, 'ilEjtL', '1', 'hello', NULL, NULL, 0, '26-10-2020 10:38'),
(3, 'ilEjtL', '1', '', '1603689029_at.jpg', NULL, 0, '26-10-2020 10:40'),
(4, 'ilEjtL', '1', 'group on', NULL, NULL, 0, '26-10-2020 10:40'),
(5, 'ilEjtL', '2', 'private group', NULL, NULL, 0, '26-10-2020 10:43'),
(6, '1RUVgy', '1', 'got it', NULL, NULL, 0, '26-10-2020 10:57');

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

CREATE TABLE `group_list` (
  `id` int(11) NOT NULL,
  `group_id` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`id`, `group_id`, `user_id`, `status`) VALUES
(1, '1', '1RUVgy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_sub`
--

CREATE TABLE `invoice_sub` (
  `id` int(11) NOT NULL,
  `inv_id` int(11) DEFAULT NULL,
  `item_detail` varchar(100) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_sub`
--

INSERT INTO `invoice_sub` (`id`, `inv_id`, `item_detail`, `rate`, `qty`, `amount`) VALUES
(1, 1, 'billing1', 20000, 1, 20000),
(2, 2, 'software billing', 20000, 1, 20000),
(3, 2, 'banner', 100, 10, 1000),
(4, 3, 'banner', 100, 10, 1000),
(5, 3, 'banner', 100, 10, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `job_profile`
--

CREATE TABLE `job_profile` (
  `id` int(11) NOT NULL,
  `ecart_id` int(11) DEFAULT NULL,
  `header_title` varchar(100) DEFAULT NULL,
  `header_img` varchar(100) DEFAULT NULL,
  `sub_head_id` int(11) DEFAULT NULL,
  `notes` text,
  `terms` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_profile`
--

INSERT INTO `job_profile` (`id`, `ecart_id`, `header_title`, `header_img`, `sub_head_id`, `notes`, `terms`) VALUES
(1, 27, 'check', '1603632315_e_inv_logo.png', NULL, 'notes', 'terms'),
(2, 28, 'Application Developer', '1603632517_e_inv_logo.png', NULL, 'Billing, ERP And Ecom softwaare', 'gst based'),
(3, 29, 'Application Developer', '1603632573_e_inv_logo.png', NULL, 'Billing, ERP And Ecom softwaare', 'gst based'),
(4, 30, 'Application Developer', '1603632615_e_inv_logo.png', NULL, 'Billing, ERP And Ecom softwaare', 'gst based'),
(5, 31, 'Pingifinit', '1603634893_e_inv_logo.png', NULL, 'Billing software', 'GST based'),
(6, 32, 'Testing promo', '1603635422_e_inv_logo.jpg', NULL, 'notes2', 'terms'),
(7, 33, 'Pingif', NULL, NULL, 'Billing software', 'GST based');

-- --------------------------------------------------------

--
-- Table structure for table `job_profile_sub`
--

CREATE TABLE `job_profile_sub` (
  `id` int(11) NOT NULL,
  `sub_heading` varchar(100) DEFAULT NULL,
  `sub_image` varchar(100) DEFAULT NULL,
  `sub_description` text,
  `job_profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_profile_sub`
--

INSERT INTO `job_profile_sub` (`id`, `sub_heading`, `sub_image`, `sub_description`, `job_profile_id`) VALUES
(1, 'billing software', '1603632615_e_inv_logo1.png', 'Billing software', 4),
(2, 'Billling', '1603634893_e_inv_logo1.png', 'Billing software', 5),
(3, 'Invoice design', '1603634893_e_inv_logo2.png', 'invoice design of bill', 5),
(4, 'check_sub', '1603635422_e_inv_logo.jpg', 'This id descibe', 6),
(5, 'second', '1603635422_e_inv_logo.jpg', 'chcek data', 6),
(6, 'Billling', NULL, 'Billing software', 7),
(7, 'Invoice design', NULL, 'invoice design of bill', 7);

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `own_id` varchar(100) DEFAULT NULL,
  `like_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`id`, `user_id`, `own_id`, `like_id`, `date`) VALUES
(1, 'ilEjtL', 'ilEjtL', 18, '01/09/2020'),
(2, 'ilEjtL', 'pDleTq', 17, '01/09/2020'),
(4, 'ilEjtL', 'ilEjtL', 1, '11/09/2020'),
(5, '1RUVgy', 'TDAcPM', 4, '23-09-2020'),
(6, 'ilEjtL', '1RUVgy', 21, '25-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `note_from` varchar(100) DEFAULT NULL,
  `note_to` varchar(100) DEFAULT NULL,
  `note` text,
  `status` int(11) DEFAULT '1',
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `note_from`, `note_to`, `note`, `status`, `date`) VALUES
(1, 'admin', 'ilEjtL', 'Email Verified Successfully', 1, '11-09-2020'),
(2, 'admin', '1RUVgy', 'Email verified Successfully', 1, '20-09-2020'),
(3, 'admin', 'all', 'Check Notification', 1, '21-09-2020'),
(4, 'admin', '1', 'Upgrade your plan', 1, '21-09-2020'),
(5, 'admin', 'R8KQ4k', 'Email verified Successfully', 1, '13-10-2020'),
(6, 'admin', '1RUVgy', 'Password Changed Successfully', 1, '13-10-2020'),
(7, 'admin', '1RUVgy', 'Password Changed Successfully', 1, '21-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `valid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan`, `status`, `amount`, `discount`, `final`, `valid`) VALUES
(2, 'Paid User', 1, 0, 0, 0, ''),
(1, 'new plan', 1, 10000, 3, 123, '2 month'),
(7, 'first', 1, 21, 1, 21, '5 month');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profile_title` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `cover_img` varchar(100) DEFAULT NULL,
  `description` text,
  `designation` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `expertise` varchar(100) DEFAULT NULL,
  `hobbie` varchar(100) DEFAULT NULL,
  `interest` varchar(100) DEFAULT NULL,
  `social` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `insta` varchar(100) DEFAULT NULL,
  `watsapp` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `about` text,
  `school` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `passed_out` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `email`, `profile_title`, `img`, `cover_img`, `description`, `designation`, `company`, `skills`, `expertise`, `hobbie`, `interest`, `social`, `gender`, `name`, `user_name`, `dob`, `type`, `fb`, `twitter`, `insta`, `watsapp`, `youtube`, `linkedin`, `about`, `school`, `college`, `qualification`, `passed_out`) VALUES
(1, 'ilEjtL', NULL, 'Web developer', '1597390906_user.jpg', '1603261519_cover.jpg', 'Web application developer', 'programmer', 'pingifinit', 'coding', '2', NULL, NULL, 'no', 'on', NULL, 'Nithin Migo', '20-06-1997', 'Professional', 'https://facebook.com', 'https://instagram.com', NULL, NULL, NULL, NULL, NULL, 'Viswasanthi vidyalaya matirc school', '', '', '2018'),
(2, 'dOwAzB', NULL, 'Web developer', '1597413738_user.jpg', NULL, 'programming', 'developer', 'pingifinit', 'code', '2', NULL, NULL, 'yes', 'on', NULL, 'Furie', '20-06-1997', 'Professional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'TDAcPM', NULL, 'Software Development', '1598167056_user.jpg', NULL, 'Web application development', 'programming', 'Pingifinit software technology', 'wep development', '1.4', NULL, NULL, 'yes', 'on', NULL, 'Pingifinit', '20-06-1997', 'Professional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'pDleTq', NULL, 'Web developer', '1598185180_user.jpg', NULL, 'Web application developer', 'sales', 'Firewall ', 'programming', '1.5', NULL, NULL, 'yes', 'on', NULL, 'Nithin firewall', '20-06-1997', 'Professional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'i1XU3f', NULL, 'Tester', '1598780006_user.jpg', NULL, 'I tests softwares', 'tester', 'pingifinit', 'web programming', '2', NULL, NULL, 'yes', 'on', NULL, 'Ram kiran', '20-06-1997', 'Business', 'https://facebook.com/nithin', 'https://twitter.com', '', '', '', 'https://linkedin.com/NithinBalasubramanian', NULL, NULL, NULL, NULL, NULL),
(6, 'T6hFtI', NULL, 'Sales manager', NULL, NULL, 'Digital marketing', 'sales person', 'Firewall ', 'digital marketing', '2', NULL, NULL, 'no', 'on', NULL, 'Tom Kiran', '20-06-1997', 'Publicity', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '1RUVgy', NULL, 'Application Developer', '1602576435_user.jpg', '1602576502_cover.jpg', 'generate application development for ios and android', 'programming', 'Firewall ', 'Coding , IOS Development', '3', NULL, NULL, 'no', 'on', NULL, 'Check1', '20-06-1998', 'Professional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'R8KQ4k', '123@gmail.com', 'Web developer', NULL, '1602595964_cover.jpg', 'generate application development for ios and android', '', '', '', '', 'playing music', 'youtuber', NULL, 'male', '123', '123', '20-06-1998', '', NULL, NULL, NULL, NULL, NULL, NULL, 'I tests softwares', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `promote`
--

CREATE TABLE `promote` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `post_id` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `payable_amount` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promote`
--

INSERT INTO `promote` (`id`, `user_id`, `post_id`, `duration`, `state`, `city`, `amount`, `tax`, `payable_amount`, `status`) VALUES
(1, 'ilEjtL', '18', '5', '', 'coimbatore', 2400, 50, 1450, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`id`, `user_id`, `email`, `otp`, `status`, `date`) VALUES
(1, 'ilEjtL', 'nithinmigo1@gmail.com', 335249, 0, '12-10-2020'),
(2, 'ilEjtL', 'nithinmigo1@gmail.com', 742625, 0, '12-10-2020'),
(3, '1RUVgy', 'pingifcheck@gmail.com', 686239, 0, '13-10-2020'),
(4, '1RUVgy', 'pingifcheck@gmail.com', 742936, 0, '21-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `own_id` varchar(100) DEFAULT NULL,
  `saved_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id`, `user_id`, `own_id`, `saved_id`, `date`) VALUES
(1, 'ilEjtL', 'pDleTq', 17, '12/09/2020'),
(2, 'ilEjtL', 'ilEjtL', 18, '12/09/2020'),
(3, '1RUVgy', 'ilEjtL', 18, '20/09/2020'),
(4, '1RUVgy', 'pDleTq', 17, '24-09-2020'),
(5, 'ilEjtL', '1RUVgy', 21, '25-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `shared`
--

CREATE TABLE `shared` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `own_id` varchar(100) DEFAULT NULL,
  `shared_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT 'user',
  `plan_type` int(11) DEFAULT '1',
  `email` varchar(100) DEFAULT NULL,
  `country_code` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `username`, `user_type`, `plan_type`, `email`, `country_code`, `phone`, `pass`, `language`, `city`, `state`, `country`, `zip`, `date`, `status`) VALUES
(1, 'ilEjtL', 'Nithin Migo', 'admin', 2, 'nithinmigo1@gmail.com', '+91', '8838825568', 'cbc88b370e979463dcc7219c0b6bba0e93cfa783', 'english', NULL, NULL, NULL, NULL, '14-08-2020', 1),
(2, 'dOwAzB', 'nithin', 'user', 2, 'pingifinit@gmail.com', '+91', '9751129019', 'c8f9d652275c42fae20d8a6ea294dea9a24b8a2a', 'english', NULL, NULL, NULL, NULL, '14-08-2020', 1),
(3, 'TDAcPM', 'pinfifinit', 'user', 1, 'pingifinitcheck@gmail.com', '+91', '8838825569', '28aab67f576e1d21d840dcdc00fad45f4bd156d1', 'english', NULL, NULL, NULL, NULL, '23-08-2020', 1),
(4, 'pDleTq', 'Firewall', 'user', 1, 'nithinfurie17@gmail.com', '+91', '8838825568', '19e24920b045bc6018eada9a0f0edfb6db7e076b', 'english', NULL, NULL, NULL, NULL, '23-08-2020', 1),
(5, 'eoxKz6', 'Kiran tom', 'user', 1, 'check4@gmail.com', '+91', '7787785767', '996931d9fa0032cb0ae57833a39403b0a13d528e', 'english', NULL, NULL, NULL, NULL, '29-08-2020', 1),
(7, 'i1XU3f', 'Ram Kiran', 'user', 1, '0ramkiran@gmail.com', '+91', '7788787888', 'a5bf1cf8a2cd616a1828d1457c0b1b38ea488d60', 'english', NULL, NULL, NULL, NULL, '30-08-2020', 0),
(8, 'T6hFtI', 'Tom Kiran', 'user', 3, 'kirantom333@gmail.com', '+91', '77879789789', '5a69f9306a1601194c078e345d1a68236813e088', 'english', NULL, NULL, NULL, NULL, '30-08-2020', 0),
(9, '1RUVgy', 'Check1', 'user', 1, 'pingifcheck@gmail.com', '+91', '7787787788', '668729ee1391b21f1bc2dd00e38b3cb05b2746ee', 'english', NULL, NULL, NULL, NULL, '20-09-2020', 1),
(14, 'R8KQ4k', '123', 'user', 1, '123@gmail.com', NULL, '8888888888', '8cb2237d0679ca88db6464eac60da96345513964', 'english', 'kotagiri', 'tamil nadu', 'india', '643217', '13-10-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `user_id`, `email`, `otp`, `status`, `date`) VALUES
(1, 'ilEjtL', 'nithinmigo1@gmail.com', 225644, 1, '14-08-2020'),
(2, '9ElMt5', 'nithinfurie17@gmail.com', 572099, 0, '14-08-2020'),
(3, 'dOwAzB', 'pingifinit@gmail.com', 382680, 1, '14-08-2020'),
(8, 'Qw9loE', 'nithinfurie17@gmail.com', 378854, 0, '23-08-2020'),
(6, 'TDAcPM', 'pingifinitcheck@gmail.com', 193925, 1, '23-08-2020'),
(7, 'HI25R6', 'pingifinitcheck@gmail.com', 823498, 0, '23-08-2020'),
(9, 'pDleTq', 'nithinfurie17@gmail.com', 630946, 1, '23-08-2020'),
(10, 'eoxKz6', 'check4@gmail.com', 209049, 1, '29-08-2020'),
(11, 'nEM0GW', 'check4@gmail.com', 341082, 0, '29-08-2020'),
(12, 'i1XU3f', '0ramkiran@gmail.com', 941445, 1, '30-08-2020'),
(13, 'T6hFtI', 'kirantom333@gmail.com', 222937, 1, '30-08-2020'),
(14, '1RUVgy', 'pingifcheck@gmail.com', 498660, 1, '20-09-2020'),
(15, 'nu7QiL', 'nithin123@gmail.com', 585973, 0, '12-10-2020'),
(16, 'R8KQ4k', '123@gmail.com', 213660, 1, '13-10-2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connect`
--
ALTER TABLE `connect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecard`
--
ALTER TABLE `ecard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_invoice`
--
ALTER TABLE `e_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_list`
--
ALTER TABLE `group_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_sub`
--
ALTER TABLE `invoice_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_profile`
--
ALTER TABLE `job_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_profile_sub`
--
ALTER TABLE `job_profile_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promote`
--
ALTER TABLE `promote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shared`
--
ALTER TABLE `shared`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `connect`
--
ALTER TABLE `connect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ecard`
--
ALTER TABLE `ecard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `e_invoice`
--
ALTER TABLE `e_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group_list`
--
ALTER TABLE `group_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_sub`
--
ALTER TABLE `invoice_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_profile`
--
ALTER TABLE `job_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_profile_sub`
--
ALTER TABLE `job_profile_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `promote`
--
ALTER TABLE `promote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shared`
--
ALTER TABLE `shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
