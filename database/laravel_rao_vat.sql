-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2016 at 04:07 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_rao_vat`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `order`, `active`, `created_at`, `updated_at`) VALUES
(6, 'Màu sắc', 2, 1, '2016-04-08 07:49:20', '2016-04-08 07:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product_category`
--

CREATE TABLE `attribute_product_category` (
  `product_category_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_product_category`
--

INSERT INTO `attribute_product_category` (`product_category_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(20, 6, '2016-04-04 08:43:10', '2016-04-04 08:43:10'),
(23, 6, '2016-04-04 08:43:10', '2016-04-04 08:43:10'),
(24, 6, '2016-04-04 08:43:10', '2016-04-04 08:43:10'),
(25, 6, '2016-04-04 08:43:10', '2016-04-04 08:43:10'),
(48, 6, '2016-04-04 08:43:10', '2016-04-04 08:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(7, 6, 'Màu trắng', 1, '2016-04-08 07:49:20', '2016-04-08 07:49:20'),
(8, 6, 'Màu Gold', 2, '2016-04-08 07:49:20', '2016-04-08 07:49:20'),
(9, 6, 'Màu đen', 3, '2016-04-08 07:49:20', '2016-04-08 07:49:20'),
(10, 6, 'Màu đỏ', 4, '2016-04-08 07:49:20', '2016-04-08 07:49:20'),
(11, 6, 'Màu Hồng', 5, '2016-04-08 07:49:20', '2016-04-08 07:49:20'),
(12, 6, 'Màu xanh', 7, '2016-04-08 07:49:20', '2016-04-08 07:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `classifieds`
--

CREATE TABLE `classifieds` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `view_counter` int(11) NOT NULL DEFAULT '0',
  `image` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classifieds`
--

INSERT INTO `classifieds` (`id`, `user_id`, `slug`, `address`, `price`, `code`, `name`, `view_counter`, `image`, `mobile`, `email`, `content`, `publish`, `home`, `created_at`, `updated_at`) VALUES
(1, NULL, 'dien-thoai160429114347', 'Dong Khe, Ngo Quyen', 5200000, '160429114347', 'Điện thoại', 4, '/2016/04/image5722e683374e9.jpeg', '01287351609', 'tranviettrung92@gmail.com', '<p>Điện thoại</p>\r\n', 1, 1, '2016-04-29 04:43:47', '2016-05-11 02:55:59'),
(2, NULL, 'dien-thoai160510082625', 'Dong Khe, Ngo Quyen', 5000000, '160510082625', 'Điện thoại', 1, '/2016/05/image573138c15229d.jpeg', '+841287351609', 'tranviettrung92@gmail.com', '<p>Điện thoại</p>\r\n', 1, 1, '2016-05-10 01:26:25', '2016-05-10 01:26:31'),
(3, NULL, 'kia160510082816', 'Dong Khe, Ngo Quyen', 0, '160510082816', 'kia', 1, '/2016/05/image573139309c0c6.jpeg', '', '', '<p>kia</p>\r\n', 1, 1, '2016-05-10 01:28:16', '2016-05-10 01:32:58'),
(7, NULL, 'test-160510085158', 'Dong Khe, Ngo Quyen', 1200000, '160510085158', 'test', 0, '/2016/05/image57313ebe7c435.jpeg', '', '', '<p>test</p>\r\n', 1, 1, '2016-05-10 01:51:58', '2016-05-10 01:51:58'),
(8, NULL, 'test-160511094027', 'Dong Khe, Ngo Quyen', 250000, '160511094027', 'test', 1, NULL, '', '', '<p>test</p>\r\n', 1, 1, '2016-05-11 02:40:27', '2016-05-11 02:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `classified_categories`
--

CREATE TABLE `classified_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(225) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classified_categories`
--

INSERT INTO `classified_categories` (`id`, `parent_id`, `icon`, `name`, `slug`, `order`, `image`, `system`, `active`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(29, NULL, '/2016/04/image571cd5e6015ed.png', 'Mua bán', 'mua-ban', 1, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 03:13:22', '2016-04-24 14:19:18'),
(31, NULL, '/2016/04/image571ae938af6d0.png', 'Vcare Food Online', 'vcare-food-online', 3, '/2016/04/image571ae93842e55.jpeg', 0, 1, NULL, NULL, NULL, '2016-04-23 03:17:12', '2016-04-23 05:04:21'),
(33, 29, '/2016/04/image5722ca839a292.png', 'Vé máy bay', 've-may-bay', 5, '/2016/04/image5722ca8372faf.jpeg', 0, 1, NULL, NULL, NULL, '2016-04-23 05:00:31', '2016-04-29 02:44:19'),
(34, 29, NULL, 'Nail Supply', 'nail-supply', 6, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:02:13', '2016-04-23 05:02:13'),
(35, 29, NULL, 'Chợ đồ cũ', 'cho-do-cu', 7, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:02:21', '2016-04-23 05:02:21'),
(36, 31, NULL, 'Gia vị', 'gia-vi', 8, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:04:33', '2016-04-23 05:04:33'),
(37, 31, NULL, 'Rau tươi', 'rau-tuoi', 9, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:04:40', '2016-04-23 05:04:40'),
(38, 31, NULL, 'Đồ khô', 'do-kho', 10, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:04:48', '2016-04-23 05:04:48'),
(39, 31, NULL, 'Mì', 'mi', 11, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:04:54', '2016-04-23 05:04:54'),
(40, 31, NULL, 'Gạo', 'gao', 12, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:00', '2016-04-23 05:05:00'),
(41, 31, NULL, 'Nước sốt', 'nuoc-sot', 13, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:07', '2016-04-23 05:05:07'),
(42, 31, NULL, 'Dầu ăn', 'dau-an', 14, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:13', '2016-04-23 05:05:13'),
(43, 31, NULL, 'Bánh kẹo', 'banh-keo', 15, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:22', '2016-04-23 05:05:22'),
(44, 31, NULL, 'Đồ hộp', 'do-hop', 16, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:30', '2016-04-23 05:05:30'),
(45, 31, NULL, 'Rượu beer', 'ruou-beer', 17, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:41', '2016-04-23 05:05:41'),
(46, 31, NULL, 'Nước ngọt', 'nuoc-ngot', 18, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:47', '2016-04-23 05:05:47'),
(47, 31, NULL, 'Trà', 'tra', 19, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:05:54', '2016-04-23 05:05:54'),
(48, NULL, '/2016/04/image571ba6e1006ee.png', 'Tìm nhà', 'tim-nha', 20, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:06:01', '2016-04-23 16:46:25'),
(50, 48, NULL, 'Tìm nhà', 'tim-nha-2', 21, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:06:29', '2016-04-23 05:06:29'),
(51, NULL, NULL, 'Chuyển đồ', 'chuyen-do', 22, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:07:21', '2016-04-23 05:07:21'),
(52, 51, NULL, 'UK về Việt Nam', 'uk-ve-viet-nam', 23, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:07:33', '2016-04-23 05:07:33'),
(53, 51, NULL, 'Việt Nam sang UK', 'viet-nam-sang-uk', 24, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:07:42', '2016-04-23 05:07:42'),
(55, NULL, NULL, 'Taxi', 'taxi', 25, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:08:35', '2016-04-23 05:08:35'),
(56, 55, NULL, 'Taxi', 'taxi-2', 26, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:08:46', '2016-04-23 05:08:46'),
(57, NULL, NULL, 'Chuyển nhà', 'chuyen-nha', 27, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:08:54', '2016-04-23 05:08:54'),
(58, 57, NULL, 'Chuyển nhà', 'chuyen-nha-2', 28, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:09:03', '2016-04-23 05:09:03'),
(59, NULL, NULL, 'Trông trẻ', 'trong-tre', 29, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:09:14', '2016-04-23 05:09:14'),
(60, 59, NULL, 'Trông trẻ', 'trong-tre-2', 30, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 05:09:24', '2016-04-23 05:09:24'),
(62, 29, NULL, 'Bảo hiểm xe', 'bao-hiem-xe', 31, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:24:54', '2016-04-23 16:24:54'),
(63, NULL, NULL, 'Sửa nhà', 'sua-nha', 32, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:25:17', '2016-04-23 16:25:17'),
(64, 63, NULL, 'Sửa nhà', 'sua-nha-2', 33, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:25:36', '2016-04-23 16:25:36'),
(65, 63, NULL, 'Lắp camera', 'lap-camera', 34, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:25:45', '2016-04-23 16:25:45'),
(66, NULL, NULL, 'Chụp ảnh cưới', 'chup-anh-cuoi', 35, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:27:26', '2016-04-23 16:27:26'),
(67, NULL, NULL, 'Du lịch-Ăn chơi', 'du-lich-an-choi', 36, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:27:34', '2016-04-23 16:27:34'),
(68, 67, NULL, 'Du lịch', 'du-lich', 37, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:27:42', '2016-04-23 16:27:42'),
(69, 67, NULL, 'Ăn chơi', 'an-choi', 38, NULL, 0, 1, NULL, NULL, NULL, '2016-04-23 16:27:50', '2016-04-23 16:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `classified_classified_category`
--

CREATE TABLE `classified_classified_category` (
  `classified_id` int(11) NOT NULL,
  `classified_category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classified_classified_category`
--

INSERT INTO `classified_classified_category` (`classified_id`, `classified_category_id`, `created_at`, `updated_at`) VALUES
(1, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `company`, `address`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Ha Van Do', 'xichlaigantoi@gmail.com', '01674597189', NULL, NULL, 'fadsfasdf', '2016-03-18 08:55:22', '2016-03-18 08:55:22'),
(4, 'ửqwer', 'rqwer@gmail.com', NULL, NULL, '', '', '2016-03-26 03:08:21', '2016-03-26 03:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_album_id` int(11) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_album_id`, `link`, `active`, `path`, `name`, `order`, `created_at`, `updated_at`) VALUES
(9, 14, NULL, NULL, '/2016/03/image56e26d64f1d5a.png', NULL, 0, '2016-03-11 07:01:58', '2016-03-11 07:01:58'),
(10, 14, NULL, NULL, '/2016/03/image56e26d66360c0.jpeg', NULL, 0, '2016-03-11 07:01:58', '2016-03-11 07:01:58'),
(11, 14, NULL, NULL, '/2016/03/image56e26d666ba6c.jpeg', NULL, 0, '2016-03-11 07:01:58', '2016-03-11 07:01:58'),
(12, 15, NULL, NULL, '/2016/03/image56e26d8aacd5f.gif', NULL, 0, '2016-03-11 07:02:35', '2016-03-11 07:02:35'),
(13, 15, NULL, NULL, '/2016/03/image56e26d8adf6bd.jpeg', NULL, 0, '2016-03-11 07:02:35', '2016-03-11 07:02:35'),
(14, 15, NULL, NULL, '/2016/03/image56e26d8b1f5b2.jpeg', NULL, 0, '2016-03-11 07:02:36', '2016-03-11 07:02:36'),
(15, 15, NULL, NULL, '/2016/03/image56e26d8b57f4f.jpeg', NULL, 0, '2016-03-11 07:02:36', '2016-03-11 07:02:36'),
(16, 16, NULL, NULL, '/2016/03/image56e271f61719c.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(17, 16, NULL, NULL, '/2016/03/image56e271f656212.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(18, 16, NULL, NULL, '/2016/03/image56e271f67645b.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(19, 16, NULL, NULL, '/2016/03/image56e271f6a661d.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(20, 16, NULL, NULL, '/2016/03/image56e271f6e30e0.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(21, 16, NULL, NULL, '/2016/03/image56e271f72c75e.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(22, 16, NULL, NULL, '/2016/03/image56e271f769a8a.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(23, 16, NULL, NULL, '/2016/03/image56e271f797d91.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(24, 16, NULL, NULL, '/2016/03/image56e271f7c308a.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(25, 16, NULL, NULL, '/2016/03/image56e271f7ecc9f.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(26, 16, NULL, NULL, '/2016/03/image56e271f83a5fd.png', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(27, 16, NULL, NULL, '/2016/03/image56e271f8ceaff.jpeg', NULL, 0, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(44, 18, NULL, NULL, '/2016/03/image56e276e46acfc.jpeg', NULL, 0, '2016-03-11 07:42:29', '2016-03-11 07:42:29'),
(45, 18, NULL, NULL, '/2016/03/image56e276e523197.jpeg', NULL, 0, '2016-03-11 07:42:29', '2016-03-11 07:42:29'),
(46, 19, NULL, NULL, '/2016/03/image56e286acc72ff.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:50'),
(47, 19, NULL, NULL, '/2016/03/image56e286ad89228.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:51'),
(48, 19, NULL, NULL, '/2016/03/image56e286adcdf4f.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:51'),
(49, 19, NULL, NULL, '/2016/03/image56e286adf129d.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:51'),
(50, 19, NULL, NULL, '/2016/03/image56e286ae3563d.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:51'),
(51, 19, NULL, NULL, '/2016/03/image56e286ae78f5c.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:51'),
(52, 19, NULL, NULL, '/2016/03/image56e286aec2dc2.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:51'),
(53, 19, NULL, NULL, '/2016/03/image56e286af13f3d.jpeg', '', 0, '2016-03-11 08:49:51', '2016-03-14 03:23:51'),
(54, 20, NULL, NULL, '/2016/03/image56e2870b3cd75.jpeg', NULL, 0, '2016-03-11 08:51:24', '2016-03-11 08:51:24'),
(55, 20, NULL, NULL, '/2016/03/image56e2870b6da63.jpeg', NULL, 0, '2016-03-11 08:51:24', '2016-03-11 08:51:24'),
(56, 20, NULL, NULL, '/2016/03/image56e2870bac7d1.png', NULL, 0, '2016-03-11 08:51:24', '2016-03-11 08:51:24'),
(59, 30, NULL, NULL, '/2016/03/image56ea2cfd32437.jpeg', '', 0, '2016-03-17 04:05:17', '2016-03-17 08:03:44'),
(60, 28, NULL, NULL, '/2016/03/image56ea2d0f63d58.jpeg', '', 0, '2016-03-17 04:05:35', '2016-03-17 08:03:54'),
(61, 27, NULL, NULL, '/2016/03/image56ea2d1eeeb92.jpeg', '', 0, '2016-03-17 04:05:51', '2016-03-17 08:04:05'),
(66, 39, '/', 1, '/2016/04/image571cd05a8730a.png', 'logo', 7, '2016-03-18 14:01:34', '2016-04-24 13:55:39'),
(67, 39, 'http://loduc.dev/page/tinh-hinh-giao-thong-hien-nay', 1, '/2016/03/image56ec0a521d660.jpeg', 'giao thông', 6, '2016-03-18 14:01:54', '2016-03-18 16:17:07'),
(68, 39, 'banner 1', 1, '/2016/03/image56ec0abdbdd66.jpeg', 'banner 1', 8, '2016-03-18 14:03:42', '2016-03-18 14:54:09'),
(72, 43, NULL, NULL, '/2016/03/image56ecfcb385320.jpeg', '', 0, '2016-03-19 07:16:03', '2016-03-19 07:16:35'),
(73, 43, NULL, NULL, '/2016/03/image56ecfcd395c1a.jpeg', NULL, 0, '2016-03-19 07:16:35', '2016-03-19 07:16:35'),
(74, 46, NULL, NULL, '/2016/03/image56ed00c6000c1.jpeg', NULL, 0, '2016-03-19 07:33:26', '2016-03-19 07:33:26'),
(75, 38, '/', 1, '/2016/04/image571c8f99ba254.jpeg', 'Ảnh 1', 1, '2016-04-24 07:32:15', '2016-04-24 09:19:22'),
(76, 38, '/', 1, '/2016/04/image571c8f8d0094f.jpeg', 'Ảnh 2', 2, '2016-04-24 07:32:46', '2016-04-24 09:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `image_albums`
--

CREATE TABLE `image_albums` (
  `id` int(11) NOT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_albums`
--

INSERT INTO `image_albums` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(14, NULL, NULL, '2016-03-11 07:01:58', '2016-03-11 07:01:58'),
(15, NULL, NULL, '2016-03-11 07:02:35', '2016-03-11 07:02:35'),
(16, NULL, NULL, '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(17, NULL, NULL, '2016-03-11 07:22:12', '2016-03-11 07:22:12'),
(18, NULL, NULL, '2016-03-11 07:42:29', '2016-03-11 07:42:29'),
(19, NULL, NULL, '2016-03-11 08:49:51', '2016-03-11 08:49:51'),
(20, NULL, NULL, '2016-03-11 08:51:24', '2016-03-11 08:51:24'),
(21, NULL, NULL, '2016-03-14 03:25:35', '2016-03-14 03:25:35'),
(22, NULL, NULL, '2016-03-15 04:53:37', '2016-03-15 04:53:37'),
(23, NULL, NULL, '2016-03-15 04:54:52', '2016-03-15 04:54:52'),
(24, NULL, NULL, '2016-03-15 04:57:15', '2016-03-15 04:57:15'),
(25, NULL, NULL, '2016-03-15 05:00:06', '2016-03-15 05:00:06'),
(26, NULL, NULL, '2016-03-15 05:01:15', '2016-03-15 05:01:15'),
(27, NULL, NULL, '2016-03-15 06:49:01', '2016-03-15 06:49:01'),
(28, NULL, NULL, '2016-03-15 06:51:11', '2016-03-15 06:51:11'),
(29, NULL, NULL, '2016-03-16 06:54:10', '2016-03-16 06:54:10'),
(30, NULL, NULL, '2016-03-17 02:49:56', '2016-03-17 02:49:56'),
(31, NULL, NULL, '2016-03-17 02:52:05', '2016-03-17 02:52:05'),
(32, NULL, NULL, '2016-03-17 02:53:58', '2016-03-17 02:53:58'),
(33, NULL, NULL, '2016-03-17 02:54:16', '2016-03-17 02:54:16'),
(34, NULL, NULL, '2016-03-17 02:55:01', '2016-03-17 02:55:01'),
(35, NULL, NULL, '2016-03-17 03:20:30', '2016-03-17 03:20:30'),
(36, NULL, NULL, '2016-03-18 09:15:37', '2016-03-18 09:15:37'),
(37, NULL, NULL, '2016-03-18 09:17:11', '2016-03-18 09:17:11'),
(38, 'slide', 'slide', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'banner', 'banner', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, NULL, NULL, '2016-03-19 02:31:39', '2016-03-19 02:31:39'),
(41, NULL, NULL, '2016-03-19 02:47:52', '2016-03-19 02:47:52'),
(42, NULL, NULL, '2016-03-19 02:48:35', '2016-03-19 02:48:35'),
(43, NULL, NULL, '2016-03-19 02:49:11', '2016-03-19 02:49:11'),
(44, NULL, NULL, '2016-03-19 07:19:33', '2016-03-19 07:19:33'),
(45, NULL, NULL, '2016-03-19 07:32:44', '2016-03-19 07:32:44'),
(46, NULL, NULL, '2016-03-19 07:33:26', '2016-03-19 07:33:26'),
(47, NULL, NULL, '2016-03-21 07:39:59', '2016-03-21 07:39:59'),
(48, NULL, NULL, '2016-03-21 15:16:42', '2016-03-21 15:16:42'),
(49, NULL, NULL, '2016-03-21 15:17:42', '2016-03-21 15:17:42'),
(50, NULL, NULL, '2016-03-21 15:19:12', '2016-03-21 15:19:12'),
(51, NULL, NULL, '2016-03-24 07:26:14', '2016-03-24 07:26:14'),
(52, NULL, NULL, '2016-03-24 07:32:38', '2016-03-24 07:32:38'),
(53, NULL, NULL, '2016-03-24 07:52:34', '2016-03-24 07:52:34'),
(54, NULL, NULL, '2016-03-25 08:06:41', '2016-03-25 08:06:41'),
(55, NULL, NULL, '2016-03-25 08:23:24', '2016-03-25 08:23:24'),
(56, NULL, NULL, '2016-03-25 08:30:27', '2016-03-25 08:30:27'),
(57, NULL, NULL, '2016-03-25 08:37:36', '2016-03-25 08:37:36'),
(58, NULL, NULL, '2016-03-25 09:20:41', '2016-03-25 09:20:41'),
(59, NULL, NULL, '2016-03-26 01:15:30', '2016-03-26 01:15:30'),
(60, NULL, NULL, '2016-03-26 03:36:20', '2016-03-26 03:36:20'),
(61, NULL, NULL, '2016-04-04 09:51:03', '2016-04-04 09:51:03'),
(62, NULL, NULL, '2016-04-04 09:51:51', '2016-04-04 09:51:51'),
(63, NULL, NULL, '2016-04-04 09:53:36', '2016-04-04 09:53:36'),
(64, NULL, NULL, '2016-04-04 09:54:37', '2016-04-04 09:54:37'),
(65, NULL, NULL, '2016-04-04 09:55:08', '2016-04-04 09:55:08'),
(66, NULL, NULL, '2016-04-04 09:57:19', '2016-04-04 09:57:19'),
(67, NULL, NULL, '2016-04-04 09:58:23', '2016-04-04 09:58:23'),
(68, NULL, NULL, '2016-04-04 11:20:42', '2016-04-04 11:20:42'),
(69, NULL, NULL, '2016-04-05 03:39:05', '2016-04-05 03:39:05'),
(70, NULL, NULL, '2016-04-05 03:44:56', '2016-04-05 03:44:56'),
(71, NULL, NULL, '2016-04-05 09:41:19', '2016-04-05 09:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `lang` varchar(64) COLLATE utf8_bin NOT NULL,
  `order` int(10) DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `lang`, `order`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', 'vi', 1, 1, '0000-00-00 00:00:00', '2016-03-24 02:12:59'),
(2, 'English', 'en', 2, 1, '0000-00-00 00:00:00', '2016-03-24 02:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `site_title` text COLLATE utf8_bin NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` text COLLATE utf8_bin,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `cover_image`, `slug`, `name`, `active`, `description`, `language_id`, `site_title`, `meta_title`, `meta_keyword`, `meta_description`, `order`, `created_at`, `updated_at`) VALUES
(45, '/2016/04/image57036f1fb68e6.jpeg', 'hang-apple', 'hãng apple', 1, 'asusasusádf', NULL, '', '2345', '2345', '2345ádf', 5, '2016-04-05 09:31:26', '2016-04-05 09:31:26'),
(46, '/2016/04/image57038618a0128.jpeg', 'hang-asus', 'hãng asus', 1, '', NULL, '', '', '', '', 6, '2016-04-05 09:32:08', '2016-04-05 09:32:08'),
(47, '/2016/04/image5704b5afbb7f6.jpeg', 'hang-canon', 'hang canon', 1, 'hang canonhang canon', NULL, '', '', '', '', 7, '2016-04-06 07:10:08', '2016-04-06 07:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_product_category`
--

CREATE TABLE `manufacture_product_category` (
  `manufacture_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufacture_product_category`
--

INSERT INTO `manufacture_product_category` (`manufacture_id`, `product_category_id`, `created_at`, `updated_at`) VALUES
(45, 20, '2016-04-05 07:54:08', '2016-04-05 07:54:08'),
(45, 50, '2016-04-05 07:54:08', '2016-04-05 07:54:08'),
(46, 20, '2016-04-05 09:32:08', '2016-04-05 09:32:08'),
(46, 50, '2016-04-05 09:32:08', '2016-04-05 09:32:08'),
(46, 51, '2016-04-05 09:32:08', '2016-04-05 09:32:08'),
(47, 55, '2016-04-06 07:07:28', '2016-04-06 07:07:28'),
(47, 56, '2016-04-06 07:07:28', '2016-04-06 07:07:28'),
(47, 57, '2016-04-06 07:07:28', '2016-04-06 07:07:28'),
(47, 58, '2016-04-06 07:07:28', '2016-04-06 07:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `order` int(11) DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `description` text COLLATE utf8_bin,
  `address` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `blocked` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `member_group_id` int(11) NOT NULL DEFAULT '0',
  `payments` text COLLATE utf8_bin NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `member_groups`
--

CREATE TABLE `member_groups` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `order` tinyint(4) NOT NULL DEFAULT '0',
  `discount` decimal(5,2) NOT NULL DEFAULT '0.00',
  `payments` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `member_groups`
--

INSERT INTO `member_groups` (`id`, `type`, `name`, `active`, `order`, `discount`, `payments`, `created_at`, `updated_at`) VALUES
(7, 0, 'Thành viên quen thuộc', 1, 1, '0.00', '', '2016-04-07 02:16:42', '2016-04-07 02:18:18'),
(8, 0, 'khách vang lai', 1, 1, '0.00', '', '2016-04-07 02:18:06', '2016-04-07 02:18:30'),
(5, 0, 'thành viên linh tinh', 1, 3, '0.00', '', '2016-04-07 02:04:21', '2016-04-07 02:12:26'),
(6, 0, 'Thành viên thường', 1, 2, '0.00', '', '2016-04-07 02:16:15', '2016-04-07 02:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `image_album_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `brief` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `view_counter` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(225) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `image_album_id`, `created_by`, `language_id`, `title`, `featured`, `link`, `slug`, `brief`, `cover_image`, `content`, `publish`, `order`, `view_counter`, `meta_title`, `meta_keyword`, `meta_description`, `published_at`, `created_at`, `updated_at`) VALUES
(20, 37, 2, NULL, 'tình hình giao thông hiện nay', 1, NULL, 'tinh-hinh-giao-thong-hien-nay', 'tình hình giao thông hiện nay', '/2016/03/image56ebc797e525f.jpeg', '<p>t&igrave;nh h&igrave;nh giao th&ocirc;ng hiện nayt&igrave;nh h&igrave;nh giao th&ocirc;ng hiện nayt&igrave;nh h&igrave;nh giao th&ocirc;ng hiện nay</p>\r\n', 1, 6, 0, NULL, NULL, NULL, '2016-03-18 10:24:47', '2016-03-18 09:17:12', '2016-03-18 10:24:47'),
(21, 40, 2, 1, 'Tập trung vào người dùng và mọi thứ khác sẽ theo sau đó', NULL, NULL, 'tap-trung-vao-nguoi-dung-va-moi-thu-khac-se-theo-sau-do', 'Sứ mệnh của Google là sắp xếp thông tin của thế giới và làm cho thông tin này trở nên hữu dụng và có thể truy cập trên toàn cầu.', '/2016/03/image56ecba8f4dc52.jpeg', '<h3>&nbsp;</h3>\r\n\r\n<p>Đọc kỹ c&aacute;c&nbsp;<a href="https://www.google.com/press/">tin tức mới nhất</a>&nbsp;của ch&uacute;ng t&ocirc;i, duyệt qua&nbsp;<a href="https://www.google.com/press/blog-directory.html">thư mục blog</a>&nbsp;của ch&uacute;ng t&ocirc;i hoặc chọn theo d&otilde;i một số&nbsp;<a href="https://www.google.com/press/google-directory.html">trang Google+</a>&nbsp;để biết c&aacute;c cập nhật về những sản phẩm v&agrave; s&aacute;ng kiến kh&aacute;c nhau.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bạn đ&atilde; bao giờ tự hỏi&nbsp;<a href="https://www.google.com/about/careers/lifeatgoogle/">cuộc sống ở Google</a>&nbsp;diễn ra như thế n&agrave;o hoặc bạn c&oacute; thể mong đợi nhận được những&nbsp;<a href="https://www.google.com/about/careers/lifeatgoogle/benefits/">ph&uacute;c lợi</a>&nbsp;g&igrave; với tư c&aacute;ch l&agrave; nh&acirc;n vi&ecirc;n Google chưa? H&atilde;y&nbsp;<a href="https://www.google.com/about/careers/search">t&igrave;m kiếm việc l&agrave;m</a>&nbsp;tại Google hoặc xem một trong c&aacute;c&nbsp;<a href="https://www.google.com/about/careers/locations/">vị tr&iacute;</a>&nbsp;tr&ecirc;n to&agrave;n thế giới của ch&uacute;ng t&ocirc;i</p>\r\n', 1, 7, 0, '', '', '', '2016-03-25 09:25:00', '2016-03-19 02:31:39', '2016-03-25 09:25:17'),
(22, 47, 2, 1, 'dịch vụ của chúng tôiádf', NULL, NULL, 'dich-vu-cua-chung-toiadf', 'dịch vụ của chúng tôi', '/2016/03/image56efa56572b69.jpeg', '<p>dịch vụ của ch&uacute;ng t&ocirc;idịch vụ của ch&uacute;ng t&ocirc;idịch vụ của ch&uacute;ng t&ocirc;idịch vụ của ch&uacute;ng t&ocirc;i</p>\r\n', 1, 8, 0, '', '', '', '2016-03-23 15:17:09', '2016-03-21 07:40:01', '2016-03-23 15:17:09'),
(23, 51, 2, NULL, '134234234', NULL, NULL, '134234234', '234234234', '/2016/03/image56f396970912a.jpeg', '<p>fsdfgsdfgsfdgsfgsdfgsfdg</p>\r\n', 1, 9, 0, NULL, NULL, NULL, '2016-03-24 07:26:00', '2016-03-24 07:26:15', '2016-03-24 07:26:15'),
(24, 52, 2, NULL, 'qưerqwe', NULL, NULL, 'querqwe', 'qưerqweqưerqweqưerqweqưerqweqưerqwe', '/2016/03/image56f39816927e2.jpeg', '<p>qưerqweqưerqweqưerqweqưerqweqưerqweqưerqwe</p>\r\n', 1, 10, 0, NULL, NULL, NULL, '2016-03-24 07:32:00', '2016-03-24 07:32:38', '2016-03-24 07:32:38'),
(25, 53, 2, NULL, 'adfadsfasdfads', NULL, NULL, 'adfadsfasdfads', 'fadfassdfadf', '/2016/03/image56f39cc27a744.jpeg', '<p>adfasdfadsfadsfafsdaf</p>\r\n', 1, 11, 0, NULL, NULL, NULL, '2016-03-24 07:52:00', '2016-03-24 07:52:34', '2016-03-24 07:52:34'),
(26, 54, 2, NULL, 'thông báo về phí sinh hoạt của trẻ', 1, NULL, 'thong-bao-ve-phi-sinh-hoat-cua-tre', 'thông báo về phí sinh hoạt của trẻ', '/2016/03/image56f4f191cf2fb.jpeg', '<p>th&ocirc;ng b&aacute;o về ph&iacute; sinh hoạt của trẻth&ocirc;ng b&aacute;o về ph&iacute; sinh hoạt của trẻth&ocirc;ng b&aacute;o về ph&iacute; sinh hoạt của trẻ</p>\r\n', 1, 12, 0, NULL, NULL, NULL, '2016-03-25 08:07:23', '2016-03-25 08:06:43', '2016-03-25 08:07:23'),
(27, 55, 2, 1, 'sinh nhat cua be Nguyen Thuy Link', 1, NULL, 'sinh-nhat-cua-be-nguyen-thuy-link', 'sinh nhat cua be Nguyen Thuy Link', '/2016/03/image56f4f57c589df.jpeg', '<p>sinh nhat cua be Nguyen Thuy Linksinh nhat cua be Nguyen Thuy Linksinh nhat cua be Nguyen Thuy Link</p>\r\n', 1, 13, 0, '', '', '', '2016-03-25 08:23:40', '2016-03-25 08:23:24', '2016-03-25 08:23:40'),
(28, 56, 2, NULL, 'danh cho cha me cua be', 1, NULL, 'danh-cho-cha-me-cua-be', 'danh cho cha me cua be', '/2016/03/image56f4f72419714.jpeg', '<p>danh cho cha me cua bedanh cho cha me cua bedanh cho cha me cua bedanh cho cha me cua be</p>\r\n', 1, 14, 0, NULL, NULL, NULL, '2016-03-25 08:31:23', '2016-03-25 08:30:28', '2016-03-25 08:31:23'),
(29, 57, 2, 1, 'Tôi có thể nhờ người khác đón con nếu bậ', 1, NULL, 'toi-co-the-nho-nguoi-khac-don-con-neu-ba', 'Tôi có thể nhờ người khác đón con nếu bận không', '/2016/03/image56f4f8d0cf35f.jpeg', '<p>T&ocirc;i c&oacute; thể nhờ người kh&aacute;c đ&oacute;n con nếu bận kh&ocirc;ng?T&ocirc;i c&oacute; thể nhờ người kh&aacute;c đ&oacute;n con nếu bận kh&ocirc;ng?T&ocirc;i c&oacute; thể nhờ người kh&aacute;c đ&oacute;n con nếu bận kh&ocirc;ng?T&ocirc;i c&oacute; thể nhờ người kh&aacute;c đ&oacute;n con nếu bận kh&ocirc;ng?</p>\r\n', 1, 15, 0, '', '', '', '2016-03-25 08:37:00', '2016-03-25 08:37:37', '2016-03-26 04:18:46'),
(30, 58, 2, 1, 'Giới thiệu về chính sách của công ty', NULL, NULL, 'gioi-thieu-ve-chinh-sach-cua-cong-ty', 'Giới thiệu về chính sách của công tyGiới thiệu về chính sách của công ty', '/2016/03/image56f502e97ab28.jpeg', '<p>Giới thiệu về ch&iacute;nh s&aacute;ch của c&ocirc;ng tyGiới thiệu về ch&iacute;nh s&aacute;ch của c&ocirc;ng tyGiới thiệu về ch&iacute;nh s&aacute;ch của c&ocirc;ng tyGiới thiệu về ch&iacute;nh s&aacute;ch của c&ocirc;ng ty</p>\r\n', 1, 16, 0, '', '', '', '2016-03-25 09:25:37', '2016-03-25 09:20:41', '2016-03-25 09:25:37'),
(31, 59, 2, NULL, 'sdfffffffffffsd', 1, NULL, 'sdfffffffffffsd', 'sdfsdfsdf', '/2016/03/image56f5e2b263daf.jpeg', '<p>sdfsdfsd</p>\r\n', 1, 17, 0, NULL, NULL, NULL, '2016-03-26 01:16:08', '2016-03-26 01:15:31', '2016-03-26 01:16:08'),
(32, 60, 2, 1, 'Lớp Suối 2A1 (24 - 36 tháng)', NULL, NULL, 'lop-suoi-2a1-werwew', 'Lớp Suối 2A1 (24 - 36 tháng)Lớp Suối 2A1 (24 - 36 tháng)', '/2016/03/image56f603b466210.jpeg', '<ul>\r\n	<li><a href="http://mamnonhaiphuong.com/23P193NP2IT/Tin-tuc/Lop-Suoi-2A1-24--36-thang-.aspx">Lớp Suối 2A1 (24 - 36 th&aacute;ng)</a></li>\r\n	<li><a href="http://mamnonhaiphuong.com/23P193NP2IT/Tin-tuc/Lop-Suoi-2A1-24--36-thang-.aspx">Lớp Suối 2A1 (24 - 36 th&aacute;ng)</a></li>\r\n	<li><a href="http://mamnonhaiphuong.com/23P193NP2IT/Tin-tuc/Lop-Suoi-2A1-24--36-thang-.aspx">Lớp Suối 2A1 (24 - 36 th&aacute;ng)</a></li>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', 1, 18, 0, '', '', '', '2016-03-26 03:53:45', '2016-03-26 03:36:20', '2016-03-26 03:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `page_categories`
--

CREATE TABLE `page_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(225) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_categories`
--

INSERT INTO `page_categories` (`id`, `parent_id`, `created_by`, `language_id`, `name`, `slug`, `active`, `meta_title`, `meta_keyword`, `meta_description`, `order`, `description`, `cover_image`, `created_at`, `updated_at`) VALUES
(26, NULL, 2, NULL, 'Tin tức', 'article', 1, NULL, NULL, NULL, 0, NULL, NULL, '2016-03-09 11:28:48', '2016-03-09 11:28:48'),
(27, NULL, 2, NULL, 'Dịch vụ', 'service', 1, NULL, NULL, NULL, 0, NULL, NULL, '2016-03-09 11:30:12', '2016-03-09 11:30:12'),
(28, NULL, 2, NULL, 'Giới thiệu tổ chức', 'about', 1, NULL, NULL, NULL, 0, NULL, NULL, '2016-03-09 11:31:13', '2016-03-09 11:31:13'),
(29, NULL, 2, 1, 'Thông báo', 'notify', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, NULL, 2, 1, 'Khoa hoc', 'courses', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, NULL, 2, 1, 'Blog', 'blog', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 28, 2, NULL, 'Giới thiệu công ty', 'gioi-thieu-cong-ty', 1, '', '', '', NULL, NULL, NULL, '2016-03-16 06:53:14', '2016-03-16 06:53:14'),
(52, 26, 2, 1, 'Dành cho bé', 'danh-cho-be', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 07:59:34', '2016-03-25 07:59:34'),
(53, 29, 2, 1, 'Phí sinh hoạt trẻ', 'phi-sinh-hoat-tre', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:05:34', '2016-03-25 08:05:34'),
(54, 52, 2, 1, 'Họat động học Khối nhà trẻ - Lớp Suối A', 'hoat-dong-hoc-khoi-nha-tre---lop-suoi-a', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:12:39', '2016-03-25 08:12:39'),
(55, 52, 2, 1, 'Thực đơn tháng 2 của bé nhà trẻ', 'thuc-don-thang-2-cua-be-nha-tre', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:12:58', '2016-03-25 08:12:58'),
(56, 52, 2, 1, 'Mừng sinh nhật các bé tháng 3', 'mung-sinh-nhat-cac-be-thang-3', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:13:12', '2016-03-25 08:13:12'),
(57, 52, 2, 1, 'Bé học - Bé chơi', 'be-hoc---be-choi', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:13:21', '2016-03-25 08:13:21'),
(58, 52, 2, 1, 'Bạn thân của bé', 'ban-than-cua-be', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:13:31', '2016-03-25 08:13:31'),
(59, 52, 2, 1, 'Tủ sách kiến thức', 'tu-sach-kien-thuc', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:13:47', '2016-03-25 08:13:47'),
(60, 52, 2, 1, 'Bé làm ca sỹ', 'be-lam-ca-sy', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:13:55', '2016-03-25 08:13:55'),
(61, 52, 2, 1, 'Phát triển nhận thức', 'phat-trien-nhan-thuc', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:14:13', '2016-03-25 08:14:13'),
(62, 26, 2, 1, 'Dành cho cha mẹ', 'danh-cho-cha-me', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:28:14', '2016-03-25 08:28:14'),
(63, 62, 2, 1, 'Khéo tay hay làm', 'kheo-tay-hay-lam', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:28:30', '2016-03-25 08:28:30'),
(64, 62, 2, 1, 'Dinh dưỡng cho bé', 'dinh-duong-cho-be', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:28:39', '2016-03-25 08:28:39'),
(67, 27, 2, 1, 'Câu hỏi thường gặp', 'cau-hoi-thuong-gap', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 08:32:43', '2016-03-25 08:32:43'),
(68, 28, 2, 1, 'Giới thiệu chung', 'gioi-thieu-chung', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 09:23:42', '2016-03-25 09:23:42'),
(69, 28, 2, 1, 'Cơ cấu nhân sự', 'co-cau-nhan-su', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 09:23:48', '2016-03-25 09:23:48'),
(70, 28, 2, 1, 'Cơ sở vật chất', 'co-so-vat-chat', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 09:23:54', '2016-03-25 09:23:54'),
(71, 28, 2, 1, 'Chương trình giáo dục', 'chuong-trinh-giao-duc', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 09:24:01', '2016-03-25 09:24:01'),
(72, 28, 2, 1, 'Chế độ dinh dưỡng', 'che-do-dinh-duong', 1, '', '', '', NULL, NULL, NULL, '2016-03-25 09:24:09', '2016-03-25 09:24:09'),
(73, 28, 2, 1, 'Lớp cho bé', 'lop-cho-be', 1, '', '', '', NULL, NULL, NULL, '2016-03-26 03:35:55', '2016-03-26 03:35:55'),
(75, 29, 2, 1, 'Thông tin tuyển sinh', 'thong-tin-tuyen-sinh', 1, '', '', '', NULL, NULL, NULL, '2016-03-26 04:06:58', '2016-03-26 04:06:58'),
(76, 29, 2, 1, 'Khai giảng lớp học mới', 'khai-giang-lop-hoc-moi', 1, '', '', '', NULL, NULL, NULL, '2016-03-26 04:07:50', '2016-03-26 04:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `page_page_category`
--

CREATE TABLE `page_page_category` (
  `page_id` int(11) NOT NULL,
  `page_category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_page_category`
--

INSERT INTO `page_page_category` (`page_id`, `page_category_id`, `created_at`, `updated_at`) VALUES
(21, 68, '2016-03-25 09:25:09', '2016-03-25 09:25:09'),
(26, 53, '2016-03-25 08:06:43', '2016-03-25 08:06:43'),
(27, 56, '2016-03-25 08:23:34', '2016-03-25 08:23:34'),
(28, 63, '2016-03-25 08:30:28', '2016-03-25 08:30:28'),
(29, 67, '2016-03-25 08:37:37', '2016-03-25 08:37:37'),
(30, 68, '2016-03-25 09:25:37', '2016-03-25 09:25:37'),
(31, 53, '2016-03-26 01:15:31', '2016-03-26 01:15:31'),
(32, 73, '2016-03-26 03:53:45', '2016-03-26 03:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `page_tag`
--

CREATE TABLE `page_tag` (
  `page_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_tag`
--

INSERT INTO `page_tag` (`page_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(20, 24, '2016-03-18 09:17:12', '2016-03-18 09:17:12'),
(21, 24, '2016-03-19 02:31:40', '2016-03-19 02:31:40'),
(22, 24, '2016-03-21 07:40:01', '2016-03-21 07:40:01'),
(23, 24, '2016-03-24 07:26:16', '2016-03-24 07:26:16'),
(24, 24, '2016-03-24 07:32:39', '2016-03-24 07:32:39'),
(25, 24, '2016-03-24 07:52:34', '2016-03-24 07:52:34'),
(26, 24, '2016-03-25 08:06:43', '2016-03-25 08:06:43'),
(27, 24, '2016-03-25 08:23:24', '2016-03-25 08:23:24'),
(28, 24, '2016-03-25 08:30:28', '2016-03-25 08:30:28'),
(29, 24, '2016-03-25 08:37:37', '2016-03-25 08:37:37'),
(30, 24, '2016-03-25 09:20:42', '2016-03-25 09:20:42'),
(31, 24, '2016-03-26 01:15:31', '2016-03-26 01:15:31'),
(32, 24, '2016-03-26 03:36:20', '2016-03-26 03:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `permission_group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `route_name`, `permission_group_id`, `created_at`, `updated_at`) VALUES
(1, 'Xem danh sách người dùng', 'admin.user.index', 1, '2016-02-25 06:14:53', '2016-02-25 06:14:56'),
(2, 'Thêm người dùng mới', 'admin.user.create|admin.user.store', 1, '2016-02-25 06:18:01', '2016-02-25 06:18:03'),
(6, 'Sửa thông tin người dùng', 'admin.user.edit|admin.user.update|admin.user.toggle', 1, '2016-02-25 06:22:03', '2016-02-25 06:22:05'),
(10, 'Xóa người dùng', 'admin.user.destroy', 1, '2016-02-25 06:22:46', '2016-02-25 06:22:48'),
(11, 'Xem danh sách các nhóm', 'admin.role.index', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Thêm nhóm mới', 'admin.role.create|admin.role.store', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Sửa nhóm', 'admin.role.edit|admin.role.update', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Xóa nhóm', 'admin.role.destroy', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Người dùng', 'user', '2016-02-25 06:14:22', '2016-02-25 06:14:28'),
(2, 'Nhóm người dùng', 'role', '2016-02-25 06:24:54', '2016-02-25 06:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(5, 1, '2016-02-25 15:16:05', '2016-02-25 15:16:05'),
(5, 2, '2016-02-25 15:16:05', '2016-02-25 15:16:05'),
(5, 6, '2016-02-25 15:16:05', '2016-02-25 15:16:05'),
(5, 10, '2016-03-12 04:13:50', '2016-03-12 04:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image_album_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `manufacture_id` int(11) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `total` int(200) DEFAULT NULL,
  `brief` varchar(255) NOT NULL,
  `view_counter` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `options` text,
  `order` int(11) DEFAULT NULL,
  `price_new` decimal(11,0) DEFAULT NULL,
  `price_old` decimal(10,0) DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(225) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `publish` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image_album_id`, `created_by`, `title`, `language_id`, `manufacture_id`, `featured`, `total`, `brief`, `view_counter`, `slug`, `options`, `order`, `price_new`, `price_old`, `cover_image`, `meta_title`, `meta_keyword`, `meta_description`, `content`, `published_at`, `publish`, `created_at`, `updated_at`) VALUES
(88, 28, 2, 'Khuôn vật liệu bằng Gang', 1, NULL, 1, 0, 'Khuôn vật liệu bằng GangKhuôn vật liệu bằng Gang', NULL, 'khuon-vat-lieu-bang-gang', 'a:1:{s:5:"fasdf";s:4:"fsdf";}', 2, '123123123', '123123123', '/2016/03/image56ea2d0f2da1b.jpeg', '', '', '', '<h2>Khu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng GangKhu&ocirc;n vật liệu bằng Gang</h2>\r\n', '2016-03-19 02:49:00', 1, '2016-03-15 06:51:11', '2016-04-04 11:42:31'),
(89, 30, 2, 'Samsung Galaxy J3', NULL, NULL, 1, 0, 'Màn hình: Super AMOLED, 5", HD\r\nCPU: 4 nhân 32-bit, 1.3 GHz\r\nRAM/ROM: 1.5GB/8GB\r\nHệ điều hành: Android 5.1 (Lollipop)\r\nCamera: sau 8.0 MP/trước 5.0 MP\r\nPin: 2600mAh\r\n ', NULL, 'samsung-galaxy-j3', 'a:0:{}', 3, '3123000', '0', '/2016/03/image56ea1b5441420.jpeg', '', '', '', '<ul>\r\n	<li><strong>M&agrave;n h&igrave;nh:</strong>&nbsp;Super AMOLED, 5&quot;, HD</li>\r\n	<li><strong>CPU:&nbsp;</strong>4 nh&acirc;n 32-bit, 1.3 GHz</li>\r\n	<li><strong>RAM/ROM:</strong>&nbsp;1.5GB/8GB</li>\r\n	<li><strong>Hệ điều h&agrave;nh:&nbsp;</strong>Android 5.1 (Lollipop)</li>\r\n	<li><strong>Camera:</strong>&nbsp;sau 8.0 MP/trước 5.0 MP</li>\r\n	<li><strong>Pin:&nbsp;</strong>2600mAh</li>\r\n</ul>\r\n', '2016-03-19 02:49:00', 1, '2016-03-17 02:49:57', '2016-03-21 15:43:54'),
(90, 31, 2, 'Samsung Galaxy J6', NULL, NULL, 1, 23, 'Màn hình: Super AMOLED, 5", HD\r\nCPU: 4 nhân 32-bit, 1.3 GHz\r\nRAM/ROM: 1.5GB/8GB\r\nHệ điều hành: Android 5.1 (Lollipop)\r\nCamera: sau 8.0 MP/trước 5.0 MP\r\nPin: 2600mAh\r\n ', NULL, 'samsung-galaxy-j6', 'a:3:{s:10:"Màn hình";s:30:"IPS LCD, 5.5",1080x1920 pixels";s:3:"CPU";s:34:"Intel Atom Z3560, 4 nhân, 1.8 GHz";s:7:"RAM/ROM";s:8:"2GB/32GB";}', 4, '3123000', '0', '/2016/03/image56ea1bd51c3d1.jpeg', '', '', '', '<ul>\r\n	<li><strong>M&agrave;n h&igrave;nh:</strong>&nbsp;Super AMOLED, 5&quot;, HD</li>\r\n	<li><strong>CPU:&nbsp;</strong>4 nh&acirc;n 32-bit, 1.3 GHz</li>\r\n	<li><strong>RAM/ROM:</strong>&nbsp;1.5GB/8GB</li>\r\n	<li><strong>Hệ điều h&agrave;nh:&nbsp;</strong>Android 5.1 (Lollipop)</li>\r\n	<li><strong>Camera:</strong>&nbsp;sau 8.0 MP/trước 5.0 MP</li>\r\n	<li><strong>Pin:&nbsp;</strong>2600mAh</li>\r\n</ul>\r\n', '2016-03-18 10:31:00', 1, '2016-03-17 02:52:05', '2016-03-19 02:27:23'),
(91, 41, 2, 'Samsung Galaxy J3', NULL, NULL, 1, 2, 'Màn hình: Super AMOLED, 5", HD\r\nCPU: 4 nhân 32-bit, 1.3 GHz\r\nRAM/ROM: 1.5GB/8GB\r\nHệ điều hành: Android 5.1 (Lollipop)\r\nCamera: sau 8.0 MP/trước 5.0 MP\r\nPin: 2600mAh', NULL, 'samsung-galaxy-j3s', 'a:1:{s:10:"Màn hình";s:2:"12";}', 5, '23000000', NULL, '/2016/03/image56ecbdd87420a.jpeg', NULL, NULL, NULL, '<ul>\r\n	<li><strong>M&agrave;n h&igrave;nh:</strong>&nbsp;Super AMOLED, 5&quot;, HD</li>\r\n	<li><strong>CPU:&nbsp;</strong>4 nh&acirc;n 32-bit, 1.3 GHz</li>\r\n	<li><strong>RAM/ROM:</strong>&nbsp;1.5GB/8GB</li>\r\n	<li><strong>Hệ điều h&agrave;nh:&nbsp;</strong>Android 5.1 (Lollipop)</li>\r\n	<li><strong>Camera:</strong>&nbsp;sau 8.0 MP/trước 5.0 MP</li>\r\n	<li><strong>Pin:&nbsp;</strong>2600mAh</li>\r\n</ul>\r\n', '2016-03-19 02:49:22', 1, '2016-03-19 02:47:53', '2016-03-19 02:49:22'),
(92, 42, 2, 'Nokia N105 Dual SIM', 1, NULL, 1, 0, 'Nokia N105 Dual SIMNokia N105 Dual SIMNokia N105 Dual SIMNokia N105 Dual SIM', NULL, 'nokia-n105-dual-sim', 'a:0:{}', 6, '0', '0', '/2016/03/image56ecbe0337b07.jpeg', '', '', '', '<ul>\r\n	<li><strong>M&agrave;n h&igrave;nh:</strong>&nbsp;QCIF, 1.4&quot;,128 x 128 Pixels</li>\r\n	<li><strong>SIM:</strong>&nbsp;2 SIM 2 s&oacute;ng</li>\r\n	<li><strong>Bộ nhớ ROM:</strong>&nbsp;8MB</li>\r\n	<li><strong>Danh bạ:&nbsp;</strong>2000 số</li>\r\n	<li><strong>Jack tai nghe:</strong>&nbsp;3.5 mm</li>\r\n	<li><strong>Pin</strong>:<strong>&nbsp;</strong><strong>Nokia BL-5CB&nbsp;</strong>&nbsp;800 mAh</li>\r\n</ul>\r\n', '2016-03-23 15:17:01', 1, '2016-03-19 02:48:35', '2016-03-23 15:17:01'),
(93, 68, 2, 'sản phẩm chính hãng', 1, NULL, NULL, 6, 'sản phẩm chính hãng', NULL, 'san-pham-chinh-hang', 'a:2:{i:234;s:9:"523452345";i:2;s:2:"23";}', 7, '2000000', '1000000', '/2016/04/image57024e0a7f48d.jpeg', '', '', '', '<p>sản phẩm ch&iacute;nh h&atilde;ngsản phẩm ch&iacute;nh h&atilde;ngsản phẩm ch&iacute;nh h&atilde;ng</p>\r\n', '2016-04-05 02:56:00', 1, '2016-04-04 11:20:43', '2016-04-05 03:20:36'),
(94, 69, 2, 'đồng hồ cccc', 1, NULL, NULL, 24, 'đồng hồ cccc', NULL, 'dong-ho-cccc', 'a:1:{i:23;s:5:"12312";}', 8, '0', '0', '/2016/04/image57033359a0610.jpeg', '', '', '', '<p>đồng hồ ccccđồng hồ cccc</p>\r\n', '2016-04-05 03:39:37', 1, '2016-04-05 03:39:06', '2016-04-05 03:39:37'),
(95, 70, 2, 'Sản phẩm công nghiệp đúc: Nhu cầu lớn hiện nay 10000', 1, 0, NULL, 35, 'Sản phẩm công nghiệp đúc: Nhu cầu lớn hiện nay 10000', NULL, 'san-pham-cong-nghiep-ducnhu-cau-lon-hien-nay-10000', 'a:0:{}', 9, '3000000', '4000000', '/2016/04/image570334b884905.jpeg', '', '', '', '<p>Sản phẩm c&ocirc;ng nghiệp đ&uacute;c: Nhu cầu lớn hiện nay 10000Sản phẩm c&ocirc;ng nghiệp đ&uacute;c: Nhu cầu lớn hiện nay 10000Sản phẩm c&ocirc;ng nghiệp đ&uacute;c: Nhu cầu lớn hiện nay 10000</p>\r\n', '2016-04-05 03:45:00', 1, '2016-04-05 03:44:56', '2016-04-08 07:01:25'),
(96, 71, 2, 'Sản phẩm công nghiệp u cầu lớn hiện nay', 1, 45, NULL, 52, 'Sản phẩm công nghiệp u cầu lớn hiện nay', NULL, 'san-pham-cong-nghiep-u-cau-lon-hien-nay', 'a:0:{}', 10, '1000000', '2000000', '/2016/04/image57075ae162a0e.jpeg', '', '', '', '<p>Sản phẩm c&ocirc;ng nghiệp u cầu lớn hiện naySản phẩm c&ocirc;ng nghiệp u cầu lớn hiện naySản phẩm c&ocirc;ng nghiệp u cầu lớn hiện nay</p>\r\n', '2016-04-08 07:16:49', 1, '2016-04-05 09:41:20', '2016-04-08 07:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `count_buy` int(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `amount_prefix` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_id`, `value_id`, `quantity`, `count_buy`, `amount`, `amount_prefix`, `created_at`, `updated_at`) VALUES
(327, 93, 6, 5, 2, 0, '2.00', '0', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(326, 93, 6, 4, 1, 0, '1.00', '0', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(325, 93, 6, 3, 3, 0, '3.00', '0', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(328, 94, 6, 3, 1, 0, '1.00', '0', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(329, 94, 6, 4, 23, 0, '23.00', '0', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(338, 95, 6, 5, 23, 0, '23.00', '0', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(337, 95, 6, 4, 12, 0, '312.00', '0', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(339, 96, 6, 3, 52, 0, '3453452.00', '0', '2016-04-08 07:16:49', '2016-04-08 07:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(225) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `language_id`, `name`, `slug`, `order`, `cover_image`, `description`, `active`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(20, NULL, 1, 'Điện thoại', 'dien-thoai', 7, '', '', 1, '', '', '', '2016-03-02 09:00:00', '2016-03-23 15:16:51'),
(23, 20, NULL, 'sam sung', 'sam-sung', 8, '', NULL, 1, '', '', '', '2016-03-02 09:00:41', '2016-03-12 01:43:24'),
(24, 20, NULL, 'iphone', 'iphone', 0, '', NULL, 1, '', '', '', '2016-03-02 09:00:49', '2016-03-10 02:55:29'),
(25, 20, NULL, 'microsoft', 'microsoft', 0, '', NULL, 1, '', '', '', '2016-03-02 09:01:14', '2016-03-10 02:55:32'),
(48, 20, NULL, 'Nokia', 'nokia', 3, '/2016/03/image56de80e3824bd.jpeg', 'nokia', 1, 'nokia', 'nokia', 'nokia', '2016-03-08 07:36:03', '2016-03-08 07:36:03'),
(50, NULL, NULL, 'máy tính', 'may-tinh', 7, '/2016/03/image56e270e0b4964.jpeg', '', 1, '', '', '', '2016-03-11 07:16:48', '2016-03-15 07:17:09'),
(51, 50, NULL, 'asus', 'asus', 8, '0', '', 1, '', '', '', '2016-03-11 07:16:57', '2016-03-15 07:17:10'),
(52, 50, NULL, 'del', 'del', 9, '0', '', 1, '', '', '', '2016-03-11 07:17:23', '2016-03-15 07:17:11'),
(53, 50, NULL, 'samsung', 'samsung', 10, '0', '', 1, '', '', '', '2016-03-11 07:17:43', '2016-03-15 07:17:12'),
(54, 50, NULL, 'lenovo', 'lenovo', 11, '0', '', 1, '', '', '', '2016-03-11 07:17:51', '2016-03-15 07:17:12'),
(55, NULL, NULL, 'Máy văn phòng', 'may-van-phong', 12, '/2016/03/image56e393d783be7.jpeg', '', 1, '', '', '', '2016-03-12 03:58:15', '2016-03-14 15:25:42'),
(56, 55, NULL, 'photocopy', 'photocopy', 13, '0', '', 1, '', '', '', '2016-03-12 03:58:42', '2016-03-15 07:17:14'),
(57, 55, NULL, 'Máy in', 'may-in', 14, '0', '', 1, '', '', '', '2016-03-12 03:58:51', '2016-03-15 07:17:14'),
(58, 55, NULL, 'thiết bị in ấn', 'thiet-bi-in-an', 15, '0', '', 1, '', '', '', '2016-03-15 07:16:57', '2016-03-15 07:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `name`, `product_category_id`, `language_id`, `parent_id`, `order`, `active`, `type`, `created_at`, `updated_at`) VALUES
(12, 'CẤU HÌNH', 20, NULL, NULL, 4, 1, 0, '2016-03-05 04:17:27', '2016-03-12 01:51:11'),
(13, 'CHỤP HÌNH VÀ QUAY PHIM', 20, NULL, NULL, 3, 1, 0, '2016-03-05 04:17:35', '2016-03-10 09:37:16'),
(14, 'KẾT NỐI VÀ CỔNG GIAO TIẾP', 20, NULL, NULL, 4, 1, 0, '2016-03-05 04:17:44', '2016-03-10 09:37:17'),
(15, 'GIẢI TRÍ VÀ ỨNG DỤNG', 20, NULL, NULL, 5, 1, 0, '2016-03-05 04:18:14', '2016-03-10 09:37:18'),
(19, ' Hệ điều hành', 20, NULL, 12, 9, 1, 0, '2016-03-07 02:56:25', '2016-03-10 09:37:14'),
(20, 'Ram', 20, NULL, 12, 10, 1, 0, '2016-03-07 02:56:36', '2016-03-10 09:37:15'),
(21, 'Bộ vi xử lý', 20, NULL, 12, 11, 1, 0, '2016-03-07 02:56:47', '2016-03-10 09:37:15'),
(34, '3G', 20, NULL, 14, 24, 1, 0, '2016-03-07 08:25:11', '2016-03-10 09:37:18'),
(35, 'Xem phim', 20, NULL, 15, 25, 1, 0, '2016-03-07 08:25:23', '2016-03-10 09:37:19'),
(45, 'camera', 20, NULL, 13, 28, 1, 0, '2016-03-10 02:53:45', '2016-03-10 09:37:17'),
(46, 'HIỂN THỊ', 50, NULL, NULL, 29, 0, 0, '2016-03-12 03:56:53', '2016-03-12 03:56:53'),
(47, 'CẤU HÌNH', 50, NULL, NULL, 30, 0, 0, '2016-03-12 03:56:59', '2016-03-12 03:56:59'),
(48, ' Kích cỡ', 50, NULL, 46, 31, 0, 0, '2016-03-12 03:57:07', '2016-03-12 03:57:07'),
(49, 'Loại màn hình', 50, NULL, 46, 32, 0, 0, '2016-03-12 03:57:19', '2016-03-12 03:57:19'),
(50, 'Hệ điều hành', 50, NULL, 47, 33, 0, 0, '2016-03-12 03:57:29', '2016-03-12 03:57:29'),
(51, 'Ram', 50, 1, 47, 234, 1, 0, '2016-03-12 03:57:37', '2016-03-24 02:23:18'),
(52, 'thuộc tính nhỏ', 20, 2, 15, 32, 1, 0, '2016-03-24 02:16:51', '2016-03-24 02:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_option_values`
--

CREATE TABLE `product_option_values` (
  `product_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_option_values`
--

INSERT INTO `product_option_values` (`product_id`, `product_option_id`, `value`, `created_at`, `updated_at`) VALUES
(91, 19, '', '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(91, 20, '', '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(91, 21, '', '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(91, 34, '', '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(91, 35, '', '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(91, 45, '', '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(90, 19, '', '2016-03-21 15:43:46', '2016-03-21 15:43:46'),
(90, 20, '', '2016-03-21 15:43:46', '2016-03-21 15:43:46'),
(90, 21, '', '2016-03-21 15:43:46', '2016-03-21 15:43:46'),
(90, 34, '', '2016-03-21 15:43:46', '2016-03-21 15:43:46'),
(90, 35, '', '2016-03-21 15:43:46', '2016-03-21 15:43:46'),
(90, 45, '', '2016-03-21 15:43:46', '2016-03-21 15:43:46'),
(89, 19, '', '2016-03-21 15:43:54', '2016-03-21 15:43:54'),
(89, 20, '', '2016-03-21 15:43:54', '2016-03-21 15:43:54'),
(89, 21, '', '2016-03-21 15:43:54', '2016-03-21 15:43:54'),
(89, 34, '', '2016-03-21 15:43:54', '2016-03-21 15:43:54'),
(89, 35, '', '2016-03-21 15:43:54', '2016-03-21 15:43:54'),
(89, 45, '', '2016-03-21 15:43:55', '2016-03-21 15:43:55'),
(92, 19, '', '2016-03-23 15:17:01', '2016-03-23 15:17:01'),
(92, 20, '', '2016-03-23 15:17:01', '2016-03-23 15:17:01'),
(92, 21, '', '2016-03-23 15:17:01', '2016-03-23 15:17:01'),
(92, 34, '', '2016-03-23 15:17:01', '2016-03-23 15:17:01'),
(92, 35, '', '2016-03-23 15:17:01', '2016-03-23 15:17:01'),
(92, 45, '', '2016-03-23 15:17:01', '2016-03-23 15:17:01'),
(88, 19, '', '2016-04-04 11:42:31', '2016-04-04 11:42:31'),
(88, 20, '', '2016-04-04 11:42:31', '2016-04-04 11:42:31'),
(88, 21, '', '2016-04-04 11:42:31', '2016-04-04 11:42:31'),
(88, 34, '', '2016-04-04 11:42:31', '2016-04-04 11:42:31'),
(88, 35, '', '2016-04-04 11:42:31', '2016-04-04 11:42:31'),
(88, 45, '', '2016-04-04 11:42:31', '2016-04-04 11:42:31'),
(88, 52, '', '2016-04-04 11:42:31', '2016-04-04 11:42:31'),
(93, 19, '1231123', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(93, 20, '123123', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(93, 21, '123', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(93, 34, '123', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(93, 35, '12312312312123', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(93, 45, '123', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(93, 52, '123123', '2016-04-05 03:23:06', '2016-04-05 03:23:06'),
(94, 19, '', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(94, 20, '', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(94, 21, '', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(94, 34, '', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(94, 35, '', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(94, 45, '', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(94, 52, '', '2016-04-05 03:39:37', '2016-04-05 03:39:37'),
(95, 19, '', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(95, 20, '', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(95, 21, '', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(95, 34, '', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(95, 35, '', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(95, 45, '', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(95, 52, '', '2016-04-08 07:01:26', '2016-04-08 07:01:26'),
(96, 19, '', '2016-04-08 07:16:49', '2016-04-08 07:16:49'),
(96, 20, '', '2016-04-08 07:16:49', '2016-04-08 07:16:49'),
(96, 21, '', '2016-04-08 07:16:49', '2016-04-08 07:16:49'),
(96, 34, '', '2016-04-08 07:16:49', '2016-04-08 07:16:49'),
(96, 35, '', '2016-04-08 07:16:49', '2016-04-08 07:16:49'),
(96, 45, '', '2016-04-08 07:16:49', '2016-04-08 07:16:49'),
(96, 52, '', '2016-04-08 07:16:49', '2016-04-08 07:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_product_category`
--

CREATE TABLE `product_product_category` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_product_category`
--

INSERT INTO `product_product_category` (`product_id`, `product_category_id`, `created_at`, `updated_at`) VALUES
(88, 23, '2016-03-17 08:03:54', '2016-03-17 08:03:54'),
(89, 20, '2016-03-21 15:43:54', '2016-03-21 15:43:54'),
(90, 20, '2016-03-21 15:43:46', '2016-03-21 15:43:46'),
(91, 20, '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(92, 20, '2016-03-19 02:48:35', '2016-03-19 02:48:35'),
(93, 20, '2016-04-04 11:20:43', '2016-04-04 11:20:43'),
(94, 20, '2016-04-05 03:39:06', '2016-04-05 03:39:06'),
(95, 20, '2016-04-05 03:44:57', '2016-04-05 03:44:57'),
(96, 20, '2016-04-05 09:41:20', '2016-04-05 09:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(88, 24, '2016-03-15 06:51:11', '2016-03-15 06:51:11'),
(89, 12, '2016-03-19 02:27:39', '2016-03-19 02:27:39'),
(89, 13, '2016-03-19 02:27:39', '2016-03-19 02:27:39'),
(90, 12, '2016-03-19 02:27:23', '2016-03-19 02:27:23'),
(90, 13, '2016-03-19 02:27:23', '2016-03-19 02:27:23'),
(90, 28, '2016-03-17 02:52:05', '2016-03-17 02:52:05'),
(91, 12, '2016-03-19 02:47:53', '2016-03-19 02:47:53'),
(92, 29, '2016-03-19 02:48:35', '2016-03-19 02:48:35'),
(93, 31, '2016-04-04 11:20:43', '2016-04-04 11:20:43'),
(94, 24, '2016-04-05 03:39:06', '2016-04-05 03:39:06'),
(95, 24, '2016-04-05 03:44:57', '2016-04-05 03:44:57'),
(96, 24, '2016-04-05 09:41:20', '2016-04-05 09:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 'Thành Phố', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(2, 'Hà Giang', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(4, 'Cao Bằng', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(6, 'Bắc Kạn', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(8, 'Tuyên Quang', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(10, 'Lào Cai', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(11, 'Điện Biên', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(12, 'Lai Châu', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(14, 'Sơn La', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(15, 'Yên Bái', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(17, 'Hòa Bình', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(19, 'Thái Nguyên', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(20, 'Lạng Sơn', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(22, 'Quảng Ninh', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(24, 'Bắc Giang', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(25, 'Phú Thọ', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(26, 'Vĩnh Phúc', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(27, 'Bắc Ninh', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(30, 'Hải Dương', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(31, 'Hải Phòng', 'Thành Phố', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(33, 'Hưng Yên', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(34, 'Thái Bình', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(35, 'Hà Nam', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(36, 'Nam Định', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(37, 'Ninh Bình', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(38, 'Thanh Hóa', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(40, 'Nghệ An', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(42, 'Hà Tĩnh', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(44, 'Quảng Bình', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(45, 'Quảng Trị', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(46, 'Thừa Thiên Huế', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(48, 'Đà Nẵng', 'Thành Phố', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(49, 'Quảng Nam', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(51, 'Quảng Ngãi', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(52, 'Bình Định', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(54, 'Phú Yên', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(56, 'Khánh Hòa', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(58, 'Ninh Thuận', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(60, 'Bình Thuận', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(62, 'Kon Tum', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(64, 'Gia Lai', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(66, 'Đắk Lắk', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(67, 'Đắk Nông', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(68, 'Lâm Đồng', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(70, 'Bình Phước', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(72, 'Tây Ninh', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(74, 'Bình Dương', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(75, 'Đồng Nai', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(79, 'Hồ Chí Minh', 'Thành Phố', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(80, 'Long An', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(82, 'Tiền Giang', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(83, 'Bến Tre', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(84, 'Trà Vinh', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(86, 'Vĩnh Long', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(87, 'Đồng Tháp', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(89, 'An Giang', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(91, 'Kiên Giang', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(92, 'Cần Thơ', 'Thành Phố', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(93, 'Hậu Giang', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(94, 'Sóc Trăng', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(95, 'Bạc Liêu', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01'),
(96, 'Cà Mau', 'Tỉnh', '2016-04-22 07:40:01', '2016-04-22 07:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `admin`, `super_admin`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 1, 1, 1, '2016-02-19 07:10:19', '2016-02-19 07:10:19'),
(2, 'User', 'user', 0, 0, 1, '2016-02-19 07:10:59', '2016-02-25 07:32:32'),
(5, 'Quản lý', 'quan-ly', 1, 0, 1, '2016-02-25 15:16:05', '2016-03-12 04:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2016-02-22 19:24:59', '2016-02-22 19:24:59'),
(9, 2, '2016-03-12 01:16:57', '2016-03-12 01:16:57'),
(11, 2, '2016-04-26 07:10:45', '2016-04-26 07:10:45'),
(16, 2, '2016-05-03 04:27:15', '2016-05-03 04:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `system_setting_group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `system_setting_group_id`, `name`, `slug`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tiêu đề website', 'website-title', 'Vietcareplus', '2016-03-14 02:47:29', '2016-04-25 07:18:32'),
(2, 1, 'Tên khách hàng', 'customer-name', 'Vietcareplus', '2016-03-14 02:50:40', '2016-04-25 07:18:42'),
(3, 1, 'Tên công ty', 'company-name', 'Vietcareplus', '2016-03-14 02:51:11', '2016-04-25 07:18:38'),
(6, 1, 'Địa chỉ', 'address', 'Hải Phòng', '2016-03-14 02:51:59', '2016-03-19 01:32:33'),
(7, 1, 'tel', 'tel', '0986986986', '2016-03-14 02:52:25', '2016-03-19 01:33:51'),
(8, 1, 'mobile', 'mobile', '0986391393', '2016-03-14 02:52:43', '2016-03-19 01:32:53'),
(9, 1, 'email', 'email', 'info@loductrangan.com', '2016-03-14 02:53:22', '2016-03-19 01:33:05'),
(10, 2, 'Thẻ tiêu đề', 'meta-title', 'Lò đúc Trành An', '2016-03-14 02:54:11', '2016-03-17 06:51:06'),
(11, 2, 'Thẻ từ khóa', 'meta-keyword', 'lò đúc, tràng an, ', '0000-00-00 00:00:00', '2016-03-17 07:15:03'),
(12, 2, 'Thẻ miêu tả', 'meta-description', 'Lò đúc tràng an', '0000-00-00 00:00:00', '2016-03-17 07:15:12'),
(13, 2, 'Thẻ Robots', 'meta-robots', 'noodp,noydir', '0000-00-00 00:00:00', '2016-03-23 07:11:47'),
(14, 2, 'Thẻ Author', 'meta-author', 'hoster.vn', '0000-00-00 00:00:00', '2016-03-23 07:11:58'),
(15, 2, 'Thẻ Revisit-After', 'meta-revisit-after', '7 days', '0000-00-00 00:00:00', '2016-03-23 07:19:41'),
(16, 2, 'Thẻ Copyright', 'meta-copyright', 'Copy rights (c). All rights Reseverd | 2016', '0000-00-00 00:00:00', '2016-03-23 07:20:31'),
(17, 3, 'Thẻ og:title', 'og-title', 'Lò đúc Tràng An', '0000-00-00 00:00:00', '2016-03-23 07:25:56'),
(18, 3, 'Thẻ og:description', 'og-description', 'Lò đúc Tràng An', '0000-00-00 00:00:00', '2016-03-23 07:25:58'),
(19, 3, ' Thẻ og:type', 'og-type', 'website', '0000-00-00 00:00:00', '2016-03-23 07:26:15'),
(20, 3, 'Thẻ og:url', 'og-url', 'loductrangan.hoster.vn', '0000-00-00 00:00:00', '2016-03-23 07:26:33'),
(21, 3, 'Thẻ og:image', 'og-image', '/2016/04/image571f37649462f.jpeg', '0000-00-00 00:00:00', '2016-04-26 09:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `system_setting_groups`
--

CREATE TABLE `system_setting_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_setting_groups`
--

INSERT INTO `system_setting_groups` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Thông tin website', 'website-info', '2016-03-14 02:44:34', '2016-03-14 02:44:34'),
(2, 'SEO', 'seo', '2016-03-14 02:46:08', '2016-03-14 02:46:08'),
(3, 'Facebook', 'facebook', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trung Quốc', '2016-03-01 02:08:52', '2016-03-01 02:08:52'),
(2, 'Nguyễn Phú Trọng', '2016-03-01 02:09:39', '2016-03-01 02:09:39'),
(3, 'da', '2016-03-01 02:13:22', '2016-03-01 02:13:22'),
(4, 'Trung Đông', '2016-03-01 02:49:54', '2016-03-01 02:49:54'),
(5, 'dầu mỏ', '2016-03-01 02:49:54', '2016-03-01 02:49:54'),
(6, 'Apple', '2016-03-01 03:39:10', '2016-03-01 03:39:10'),
(7, 'Thẩm Phán Orenstein', '2016-03-01 03:39:10', '2016-03-01 03:39:10'),
(8, 'Sony', '2016-03-01 03:43:07', '2016-03-01 03:43:07'),
(9, 'Facebook', '2016-03-01 03:45:08', '2016-03-01 03:45:08'),
(10, 'Mark Zuckerberg', '2016-03-01 03:45:08', '2016-03-01 03:45:08'),
(11, 'Thông tư 91/2015', '2016-03-01 03:46:14', '2016-03-01 03:46:14'),
(12, 'Samsung', '2016-03-10 04:34:32', '2016-03-10 04:34:32'),
(13, 'Galaxy', '2016-03-10 04:34:32', '2016-03-10 04:34:32'),
(14, 'Snapchat', '2016-03-10 04:40:39', '2016-03-10 04:40:39'),
(15, 'iFix', '2016-03-10 07:10:17', '2016-03-10 07:10:17'),
(16, 'Galaxy S7', '2016-03-10 07:10:17', '2016-03-10 07:10:17'),
(17, 'teardown', '2016-03-10 07:10:17', '2016-03-10 07:10:17'),
(18, 'Điện thoại nắp gập', '2016-03-11 01:41:25', '2016-03-11 01:41:25'),
(19, 'Android N', '2016-03-11 07:01:59', '2016-03-11 07:01:59'),
(20, '3G', '2016-03-11 07:01:59', '2016-03-11 07:01:59'),
(21, 'asdasd', '2016-03-11 07:02:36', '2016-03-11 07:02:36'),
(22, 'fsdfsdf', '2016-03-11 07:21:29', '2016-03-11 07:21:29'),
(23, 'sdasd', '2016-03-11 07:22:13', '2016-03-11 07:22:13'),
(24, '', '2016-03-11 08:49:52', '2016-03-11 08:49:52'),
(25, 'sạc điện thoại ', '2016-03-11 08:51:24', '2016-03-11 08:51:24'),
(26, 'appple', '2016-03-14 03:23:51', '2016-03-14 03:23:51'),
(27, 'website', '2016-03-14 03:25:36', '2016-03-14 03:25:36'),
(28, 'asus', '2016-03-17 02:52:05', '2016-03-17 02:52:05'),
(29, 'Nokia ', '2016-03-19 02:48:35', '2016-03-19 02:48:35'),
(30, 'OPPO', '2016-03-19 02:49:12', '2016-03-19 02:49:12'),
(31, 'sản phẩm', '2016-04-04 11:20:43', '2016-04-04 11:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL COMMENT 'Real name of user',
  `email` varchar(255) NOT NULL COMMENT 'User''s email',
  `password` varchar(60) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL COMMENT 'User image path',
  `date_of_birth` date NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1 = Male\n0 = Female',
  `phone` varchar(45) DEFAULT NULL,
  `active` tinyint(1) NOT NULL COMMENT '1 = Active\n0 = Inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `confirmation_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `date_of_birth`, `gender`, `phone`, `active`, `remember_token`, `confirmation_token`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', 'admin@admin.com', '$2y$10$Ibgc/5OPQwaLVz9mgGgh0OjSD0YBiehtmRqwNMpbyMdbXDKM2kaDG', '/2016/03/image56f38be40be83.jpeg', '1992-09-12', 0, '01287351609', 1, 'C60KjGwcPSkDrvHPPbFAG8b9dVDxQq38URXFTYKfXSdOdMQs8IqQqtxGwudE', NULL, '2016-02-22 19:24:59', '2016-04-28 01:14:31'),
(9, 'Obama', 'obama@gmail.com', '$2y$10$qJ6MW8YfJB/BpUantrPYE.f/M3Bdx9oG/pF5c4nsIKRSi2dO0dt0q', '/2016/03/image56e36e08cd8fc.jpeg', '1991-12-12', 1, '01287351609', 1, NULL, NULL, '2016-03-12 01:16:57', '2016-03-12 02:20:05'),
(11, 'Đồng Xuân Cường', 'cuong@gmail.com', '$2y$10$7.x1WoseCnVROPwowJ05O.BYS6tshNlavUuSFAocWEKgka4rSGpR6', '/2016/04/image572041f336deb.jpeg', '1992-09-12', 1, '01287351609', 1, 'AEVTlNc6pHt4lpCa3A9KOs8qR95SPMvzzGfOjti6p1ugO01nENipjSJcg88d', NULL, '2016-04-26 07:10:45', '2016-04-28 08:57:01'),
(16, 'Trần Việt Trung', 'tranviettrung92@gmail.com', '$2y$10$999DGHq0irU/TL/UKEQwVup75Fvg7mXb1hR1GwZ1aBijqelZIkA2e', NULL, '1992-09-12', 1, '01287351609', 1, '4YJc8zM2egTZBilmkCk7WnEIN35WUdJ24Tm4LTQVjcgOm7c9wvmHbNqMJPv7', NULL, '2016-05-03 04:27:15', '2016-05-03 04:27:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_product_category`
--
ALTER TABLE `attribute_product_category`
  ADD KEY `attribute_id` (`attribute_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `classifieds`
--
ALTER TABLE `classifieds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD KEY `fk_classifieds_users1_idx` (`user_id`);

--
-- Indexes for table `classified_categories`
--
ALTER TABLE `classified_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD KEY `fk_classified_categories_classified_categories1_idx` (`parent_id`);

--
-- Indexes for table `classified_classified_category`
--
ALTER TABLE `classified_classified_category`
  ADD PRIMARY KEY (`classified_id`,`classified_category_id`),
  ADD KEY `fk_classifieds_has_classifieds_categories_classifieds_categ_idx` (`classified_category_id`),
  ADD KEY `fk_classifieds_has_classifieds_categories_classifieds1_idx` (`classified_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_image_albums1_idx` (`image_album_id`);

--
-- Indexes for table `image_albums`
--
ALTER TABLE `image_albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture_product_category`
--
ALTER TABLE `manufacture_product_category`
  ADD PRIMARY KEY (`manufacture_id`,`product_category_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `member_groups`
--
ALTER TABLE `member_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`,`brief`),
  ADD UNIQUE KEY `cover_image_UNIQUE` (`cover_image`),
  ADD KEY `fk_posts_users1_idx` (`created_by`),
  ADD KEY `fk_pages_image_albums1_idx` (`image_album_id`);

--
-- Indexes for table `page_categories`
--
ALTER TABLE `page_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD KEY `fk_page_categories_page_categories1_idx` (`parent_id`),
  ADD KEY `fk_page_categories_users1_idx` (`created_by`);

--
-- Indexes for table `page_page_category`
--
ALTER TABLE `page_page_category`
  ADD PRIMARY KEY (`page_id`,`page_category_id`),
  ADD KEY `fk_pages_has_page_categories_page_categories1_idx` (`page_category_id`),
  ADD KEY `fk_pages_has_page_categories_pages1_idx` (`page_id`);

--
-- Indexes for table `page_tag`
--
ALTER TABLE `page_tag`
  ADD PRIMARY KEY (`page_id`,`tag_id`),
  ADD KEY `fk_pages_has_tags_tags1_idx` (`tag_id`),
  ADD KEY `fk_pages_has_tags_pages1_idx` (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `action_UNIQUE` (`route_name`),
  ADD KEY `fk_permisions_permission_group1_idx` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `fk_roles_has_permisions_permisions1_idx` (`permission_id`),
  ADD KEY `fk_roles_has_permisions_roles1_idx` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cover_image_UNIQUE` (`cover_image`),
  ADD KEY `fk_posts_users1_idx` (`created_by`),
  ADD KEY `image_album_id` (`image_album_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_id_2` (`product_id`),
  ADD KEY `attribute_id_2` (`attribute_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD KEY `fk_page_categories_page_categories1_idx` (`parent_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `product_category_id_2` (`product_category_id`);

--
-- Indexes for table `product_option_values`
--
ALTER TABLE `product_option_values`
  ADD KEY `product_option_id` (`product_option_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_product_category`
--
ALTER TABLE `product_product_category`
  ADD PRIMARY KEY (`product_id`,`product_category_id`),
  ADD KEY `fk_pages_has_page_categories_page_categories1_idx` (`product_category_id`),
  ADD KEY `fk_pages_has_page_categories_pages1_idx` (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `fk_pages_has_tags_tags1_idx` (`tag_id`),
  ADD KEY `fk_pages_has_tags_pages1_idx` (`product_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `fk_users_has_roles_roles1_idx` (`role_id`),
  ADD KEY `fk_users_has_roles_users_idx` (`user_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`),
  ADD KEY `fk_system_settings_system_setting_groups1_idx` (`system_setting_group_id`);

--
-- Indexes for table `system_setting_groups`
--
ALTER TABLE `system_setting_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `avatar_UNIQUE` (`avatar`),
  ADD UNIQUE KEY `confirmation_code_UNIQUE` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `classifieds`
--
ALTER TABLE `classifieds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `classified_categories`
--
ALTER TABLE `classified_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `image_albums`
--
ALTER TABLE `image_albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `member_groups`
--
ALTER TABLE `member_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `page_categories`
--
ALTER TABLE `page_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `system_setting_groups`
--
ALTER TABLE `system_setting_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_product_category`
--
ALTER TABLE `attribute_product_category`
  ADD CONSTRAINT `attribute_product_category_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `attribute_product_category_ibfk_2` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `classifieds`
--
ALTER TABLE `classifieds`
  ADD CONSTRAINT `fk_classifieds_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `classified_categories`
--
ALTER TABLE `classified_categories`
  ADD CONSTRAINT `fk_classified_categories_classified_categories1` FOREIGN KEY (`parent_id`) REFERENCES `classified_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `classified_classified_category`
--
ALTER TABLE `classified_classified_category`
  ADD CONSTRAINT `fk_classifieds_has_classifieds_categories_classifieds1` FOREIGN KEY (`classified_id`) REFERENCES `classifieds` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classifieds_has_classifieds_categories_classifieds_categor1` FOREIGN KEY (`classified_category_id`) REFERENCES `classified_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_image_albums1` FOREIGN KEY (`image_album_id`) REFERENCES `image_albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_image_albums1` FOREIGN KEY (`image_album_id`) REFERENCES `image_albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_posts_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `page_categories`
--
ALTER TABLE `page_categories`
  ADD CONSTRAINT `fk_page_categories_page_categories1` FOREIGN KEY (`parent_id`) REFERENCES `page_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_page_categories_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `page_page_category`
--
ALTER TABLE `page_page_category`
  ADD CONSTRAINT `fk_pages_has_page_categories_page_categories1` FOREIGN KEY (`page_category_id`) REFERENCES `page_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pages_has_page_categories_pages1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `page_tag`
--
ALTER TABLE `page_tag`
  ADD CONSTRAINT `fk_pages_has_tags_pages1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pages_has_tags_tags1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_permisions_permission_group1` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `fk_roles_has_permisions_permisions1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roles_has_permisions_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`image_album_id`) REFERENCES `image_albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product_option_values`
--
ALTER TABLE `product_option_values`
  ADD CONSTRAINT `product_option_values_ibfk_1` FOREIGN KEY (`product_option_id`) REFERENCES `product_options` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_option_values_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product_product_category`
--
ALTER TABLE `product_product_category`
  ADD CONSTRAINT `product_product_category_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_product_category_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_users_has_roles_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_roles_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD CONSTRAINT `fk_system_settings_system_setting_groups1` FOREIGN KEY (`system_setting_group_id`) REFERENCES `system_setting_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
