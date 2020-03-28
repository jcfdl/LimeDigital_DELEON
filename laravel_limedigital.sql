-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2020 at 10:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_limedigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `body`, `status`, `views`, `updated_by`, `deleted_at`, `created_at`, `updated_at`, `media_id`) VALUES
(1, 1, 1, 'First Article', '<p>Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.</p>\r\n<p>To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.</p>\r\n<p>Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.</p>\r\n<p>Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.</p>\r\n<p>Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.</p>\r\n<p><img src=\"uploads/1585205137-image_29009345821585205136644.png.png\" width=\"200\" height=\"200\" /></p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"uploads/1585205137-image_56975005231585205136658.png.png\" width=\"624\" height=\"353\" /></p>\r\n<p>&nbsp;</p>', 1, 0, 1, NULL, '2020-03-26 06:45:39', '2020-03-26 09:55:28', NULL),
(5, 1, 1, 'Third Article', '<p>asda</p>', 1, 0, NULL, NULL, '2020-03-26 10:03:18', '2020-03-26 10:03:18', NULL),
(4, 1, 1, 'Second Article', '<p>asd</p>', 1, 0, NULL, NULL, '2020-03-26 10:02:51', '2020-03-26 10:02:51', NULL),
(6, 1, 1, 'Third Articles', '<p>asdasd</p>', 1, 0, NULL, NULL, '2020-03-26 10:04:20', '2020-03-26 10:04:20', NULL),
(8, 1, 1, 'Yes', NULL, 1, 0, NULL, NULL, '2020-03-26 10:10:19', '2020-03-26 10:10:19', NULL),
(10, 1, 1, 'Last article', '<p>asdad</p>', 1, 0, NULL, NULL, '2020-03-27 04:19:39', '2020-03-27 04:19:39', NULL),
(11, 1, 1, 'asdad', '<p>asdadad</p>\r\n<p><img src=\"uploads/1585307260.jpeg\" alt=\"\" width=\"1360\" height=\"2183\" /></p>', 1, 0, NULL, NULL, '2020-03-27 11:07:45', '2020-03-27 11:07:45', NULL),
(12, 1, 1, 'test', '<p>asda</p>\r\n<p><img src=\"uploads/1585307287.png\" alt=\"\" width=\"457\" height=\"188\" /></p>', 1, 0, NULL, NULL, '2020-03-27 11:08:10', '2020-03-27 11:08:10', NULL),
(13, 1, 1, 'chekc', '<p>asdad</p>', 1, 0, NULL, NULL, '2020-03-28 09:15:51', '2020-03-28 09:15:51', NULL),
(14, 1, 1, '123', '<p>12313</p>', 1, 0, NULL, NULL, '2020-03-28 09:16:41', '2020-03-28 09:16:41', NULL),
(15, 1, 1, 'asda', '<p>12131</p>', 1, 0, NULL, NULL, '2020-03-28 09:18:05', '2020-03-28 09:18:05', NULL),
(16, 1, 1, '123131', '<p>asdada</p>', 1, 0, NULL, NULL, '2020-03-28 09:19:21', '2020-03-28 09:19:21', NULL),
(17, 1, 1, 'asada', '<p>asdada</p>', 1, 0, 1, NULL, '2020-03-28 09:19:45', '2020-03-28 10:24:56', 43);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `description`, `status`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Books', 'asda', 1, 1, NULL, '2020-03-25 16:00:00', '2020-03-27 14:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '/uploads/1585205075-image_61130734761585205075157.png.png', '2020-03-26 06:44:35', '2020-03-26 06:44:35'),
(2, 1, '/uploads/1585205075-image_25038622971585205075172.png.png', '2020-03-26 06:44:35', '2020-03-26 06:44:35'),
(3, 1, '/uploads/1585205137-image_56975005231585205136658.png.png', '2020-03-26 06:45:37', '2020-03-26 06:45:37'),
(4, 1, '/uploads/1585205137-image_29009345821585205136644.png.png', '2020-03-26 06:45:37', '2020-03-26 06:45:37'),
(5, 1, '/uploads/1585293175-83494494_216080399422232_5346558680869371904_n.png.png', '2020-03-27 07:12:55', '2020-03-27 07:12:55'),
(6, 1, '/uploads/1585293690-83494494_216080399422232_5346558680869371904_n.png.png', '2020-03-27 07:21:30', '2020-03-27 07:21:30'),
(7, 1, '/uploads/1585294047-83494494_216080399422232_5346558680869371904_n.png.png', '2020-03-27 07:27:27', '2020-03-27 07:27:27'),
(8, 1, '/uploads/1585294195-83494494_216080399422232_5346558680869371904_n.png', '2020-03-27 07:29:55', '2020-03-27 07:29:55'),
(9, 1, '/uploads/1585294299-83494494_216080399422232_5346558680869371904_n.png', '2020-03-27 07:31:39', '2020-03-27 07:31:39'),
(10, 1, '/uploads/1585294325-blobid0.png', '2020-03-27 07:32:05', '2020-03-27 07:32:05'),
(11, 1, '/uploads/1585294574-83494494_216080399422232_5346558680869371904_n.png', '2020-03-27 07:36:14', '2020-03-27 07:36:14'),
(12, 1, '/uploads/1585294859-blobid0.png', '2020-03-27 07:40:59', '2020-03-27 07:40:59'),
(14, 1, '/uploads/1585302946.png', '2020-03-27 09:55:46', '2020-03-27 09:55:46'),
(15, 1, '/uploads/1585304820.png', '2020-03-27 10:27:00', '2020-03-27 10:27:00'),
(16, 1, '/uploads/1585305010.png', '2020-03-27 10:30:10', '2020-03-27 10:30:10'),
(32, 1, '/uploads/1585375195.blobid0.png', '2020-03-28 05:59:55', '2020-03-28 05:59:55'),
(18, 1, '/uploads/1585305163.png', '2020-03-27 10:32:43', '2020-03-27 10:32:43'),
(29, 1, '/uploads/1585375043.png', '2020-03-28 05:57:23', '2020-03-28 05:57:23'),
(30, 1, '/uploads/1585375084.png', '2020-03-28 05:58:04', '2020-03-28 05:58:04'),
(31, 1, '/uploads/1585375105.jpeg', '2020-03-28 05:58:25', '2020-03-28 05:58:25'),
(24, 1, '/uploads/1585307238.png', '2020-03-27 11:07:18', '2020-03-27 11:07:18'),
(28, 1, '/uploads/1585324722red-car-min.jpg', '2020-03-27 15:58:42', '2020-03-27 15:58:42'),
(27, 1, '/uploads/1585324673red-car-min.jpg', '2020-03-27 15:57:53', '2020-03-27 15:57:53'),
(33, 1, '/uploads/1585375254_blobid0.png', '2020-03-28 06:00:54', '2020-03-28 06:00:54'),
(34, 1, '/uploads/1585375254_blobid1.jpg', '2020-03-28 06:00:54', '2020-03-28 06:00:54'),
(35, 1, '/uploads/1585375285_blobid2.jpg', '2020-03-28 06:01:25', '2020-03-28 06:01:25'),
(36, 1, '/uploads/1585375341_image_80708810571585375341471.jpg', '2020-03-28 06:02:21', '2020-03-28 06:02:21'),
(37, 1, '/uploads/1585375341_image_82870120681585375341474.png', '2020-03-28 06:02:21', '2020-03-28 06:02:21'),
(38, 1, '/uploads/1585375485_image_740648286101585375485288.jpg', '2020-03-28 06:04:45', '2020-03-28 06:04:45'),
(39, 1, '/uploads/1585375485_image_24219803291585375485278.jpg', '2020-03-28 06:04:45', '2020-03-28 06:04:45'),
(40, 1, '/uploads/1585375485_image_104138564111585375485298.jpg', '2020-03-28 06:04:45', '2020-03-28 06:04:45'),
(41, 1, '/uploads/1585387185download (1).png', '2020-03-28 09:19:45', '2020-03-28 09:19:45'),
(42, 1, '/uploads/1585387768download (1).png', '2020-03-28 09:29:28', '2020-03-28 09:29:28'),
(43, 1, '/uploads/1585391096download (1).png', '2020-03-28 10:24:56', '2020-03-28 10:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_03_25_085737_create_articles_table', 2),
(8, '2020_03_25_091230_create_categories_table', 2),
(9, '2020_03_25_091444_create_media_table', 2),
(10, '2020_03_27_233337_add_media_id_to_users_table', 3),
(11, '2020_03_28_170822_add_intro_image_to_articles_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `media_id`) VALUES
(1, 'John', 'john@gmail.com', NULL, '$2y$10$nJBc5KQrF3w6WUZIA.tyE.xSNa005wONvtr4eJFKLV7Irc47Wuj8u', NULL, '2020-03-25 00:34:12', '2020-03-27 15:59:51', 28);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
