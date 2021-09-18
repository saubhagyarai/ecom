-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 11:43 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guruuniform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'admin@sunbi', NULL, '$2y$10$WzylEL.U4Uhh5cUOFTQUWeWHwLoDRqADQOEWARlBhwugiSgvoKCbq', NULL, '2020-12-14 00:55:04', '2020-12-14 00:55:04'),
(2, 'super admin', 'superadmin@sunbi', NULL, '$2y$10$izZagVa1nyFeE4IL/mjFt.PtUajxS972pj06r1JukDYbLjtWbdpUW', NULL, '2020-12-28 23:39:25', '2020-12-28 23:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `feature` tinyint(1) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `priority`, `feature`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cat 1', 'cat-1', NULL, NULL, 0, '2_1607928035.jpg', '2020-12-14 00:55:35', '2021-02-22 04:13:30'),
(2, 'Cat 2', 'cat-2', NULL, NULL, 0, '4_1607928050.jpg', '2020-12-14 00:55:50', '2020-12-14 00:55:50'),
(3, 'Cat 3', 'cat-3', NULL, 2, 1, '4_1607928061.jpg', '2020-12-14 00:56:01', '2021-02-22 03:53:24'),
(4, 'Child 1', 'child-1', 1, NULL, 0, '012_1607928075.jpg', '2020-12-14 00:56:15', '2021-02-22 01:12:08'),
(5, 'Child 11', 'child-11', 2, NULL, 0, '012_1607928089.jpg', '2020-12-14 00:56:29', '2020-12-14 00:56:29'),
(6, 'Child 2', 'child-2', 1, 1, 1, '5_1607928102.jpg', '2020-12-14 00:56:42', '2021-02-22 03:53:13'),
(7, 'hello', 'hello', NULL, NULL, 0, 'media-share-0-02-05-19485a08ef7a4479960c39c6884140cab2a0396517a263b604151b3195569c8a-4fd7ca29-7d90-4203-bc3d-55f711fe3263_1610091212.jpg', '2021-01-08 01:48:32', '2021-02-22 04:13:04'),
(8, 'Cat 4', 'cat-4', NULL, NULL, 0, '48372091_1657864691035446_8639781144918753280_n_1611136706.jpg', '2021-01-20 04:13:26', '2021-02-22 04:13:12'),
(9, 'Yoho News', 'yoho-news', NULL, 1, 0, '19_1613719568.jpg', '2021-02-19 01:41:08', '2021-02-22 04:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 256, NULL, NULL),
(2, 3, 256, NULL, NULL),
(3, 4, 257, NULL, NULL),
(4, 6, 257, NULL, NULL),
(5, 3, 257, NULL, NULL),
(6, 5, 258, NULL, NULL),
(7, 3, 258, NULL, NULL),
(8, 4, 259, NULL, NULL),
(9, 6, 259, NULL, NULL),
(10, 3, 260, NULL, NULL),
(11, 5, 261, NULL, NULL),
(12, 5, 262, NULL, NULL),
(13, 6, 301, NULL, NULL),
(14, 6, 1, NULL, NULL),
(15, 7, 256, NULL, NULL),
(16, 3, 267, NULL, NULL),
(17, 3, 273, NULL, NULL),
(18, 3, 300, NULL, NULL),
(19, 3, 152, NULL, NULL),
(20, 3, 163, NULL, NULL),
(21, 3, 278, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_02_102018_create_admins_table', 1),
(5, '2020_12_04_074402_create_products_table', 1),
(6, '2020_12_08_104201_create_categories_table', 1),
(7, '2020_12_13_063527_create_category_product', 1),
(11, '2020_12_24_052013_create_orders_table', 2),
(12, '2020_12_28_072048_create_order_product_table', 2),
(13, '2021_02_23_060746_create_settings_table', 3),
(15, '2021_02_24_061240_create_sliders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','processing','completed','decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `grand_total` decimal(10,2) NOT NULL,
  `item_count` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `payment_method` enum('cash_on_delivery','paypal','stripe','card') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_on_delivery',
  `billing_fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `status`, `grand_total`, `item_count`, `is_paid`, `payment_method`, `billing_fullname`, `billing_address`, `billing_address2`, `billing_city`, `billing_email`, `billing_phone`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'GuruOrderNumber-5fe9b59224f2f-updatedaaasdas', 1, 'completed', '61288888.00', 15555, 1, 'cash_on_delivery', 'Herrod Nieves', 'Ratione enim sed cup', 'Qui fugiat fuga Dol', 'Ut eum earum cillum', 'hywulosov@mailinator.com', '+1 (235) 354-3022', 'updated                     Magni ipsum ducimus', '2020-12-28 04:53:10', '2021-01-19 23:20:41'),
(2, 'GuruOrderNumber-5fe9f3eca387c', 1, 'completed', '2360.00', 6, 1, 'cash_on_delivery', 'Dean Tran', 'Voluptatibus placeat', 'Aut corporis alias m', 'Aut nobis ea distinc', 'fohebefa@mailinator.com', '+1 (168) 589-4896', 'Animi architecto qu', '2020-12-28 09:19:12', '2021-01-20 00:05:45'),
(3, 'GuruOrderNumber-5feabe5c54783', 1, 'completed', '1290.00', 4, 1, 'cash_on_delivery', 'Norman Brewer', 'Sed ipsa est offic', 'Ut enim explicabo A', 'Quae culpa sequi dol', 'qojylono@mailinator.com', '+1 (852) 431-6563', 'Temporibus aut illo', '2020-12-28 23:42:56', '2021-01-20 01:49:15'),
(4, 'GuruOrderNumber-5fead8ae0dcfc', 1, 'decline', '1290.00', 4, 0, 'cash_on_delivery', 'Norman Brewer', 'Sed ipsa est offic', 'Ut enim explicabo A', 'Quae culpa sequi dol', 'qojylono@mailinator.com', '+1 (852) 431-6563', 'Temporibus aut illo', '2020-12-29 01:35:14', '2021-01-05 04:36:15'),
(5, 'GuruOrderNumber-5fead910b57ac', 1, 'pending', '1290.00', 4, 0, 'cash_on_delivery', 'Kelsie Wiggins', 'In eos labore fugit', 'Est aliquip iusto l', 'Ut ipsum labore accu', 'zatevipi@mailinator.com', '+1 (995) 968-5735', 'Dolor labore est qua', '2020-12-29 01:36:52', '2020-12-29 01:36:52'),
(6, 'GuruOrderNumber-5feada5f4fcac', 1, 'pending', '3068.00', 8, 0, 'cash_on_delivery', 'Josiah Reese', 'Voluptates et neque', 'Maxime illo vel culp', 'Dolor consectetur s', 'vigeq@mailinator.com', '+1 (755) 272-7965', 'Qui quia dolore inci', '2020-12-29 01:42:27', '2020-12-29 01:42:27'),
(7, 'GuruOrderNumber-5feada69da52b', 1, 'pending', '3068.00', 8, 0, 'cash_on_delivery', 'Josiah Reese', 'Voluptates et neque', 'Maxime illo vel culp', 'Dolor consectetur s', 'vigeq@mailinator.com', '+1 (755) 272-7965', 'Qui quia dolore inci', '2020-12-29 01:42:37', '2020-12-29 01:42:37'),
(8, 'GuruOrderNumber-5feadd2aa738c', 1, 'pending', '1799.00', 5, 0, 'cash_on_delivery', 'Tara Boone', 'Exercitationem qui p', 'Dolores corporis est', 'Ea possimus explica', 'zyreti@mailinator.com', '+1 (456) 494-5211', 'Quia lorem quo autem', '2020-12-29 01:54:22', '2020-12-29 01:54:22'),
(9, 'GuruOrderNumber-5feaddd0345ca', 1, 'pending', '1045.00', 3, 0, 'cash_on_delivery', 'Justina Rios', 'Natus irure aut labo', 'Molestias fuga Cupi', 'Sunt itaque totam mi', 'qynenypata@mailinator.com', '+1 (871) 962-7161', 'Rerum saepe providen', '2020-12-29 01:57:08', '2020-12-29 01:57:08'),
(10, 'GuruOrderNumber-5feadedec1d87', 1, 'completed', '1045.00', 3, 0, 'cash_on_delivery', 'Malcolm Boyle', 'Voluptatum temporibu', 'Reprehenderit tempor', 'Voluptatibus officia', 'dagal@mailinator.com', '+1 (146) 801-9241', 'Quae odit vitae labo', '2020-12-29 02:01:38', '2021-01-20 01:51:44'),
(11, 'GuruOrderNumber-5feae03dbf03a', 1, 'pending', '1045.00', 3, 0, 'cash_on_delivery', 'Malcolm Boyle', 'Voluptatum temporibu', 'Reprehenderit tempor', 'Voluptatibus officia', 'dagal@mailinator.com', '+1 (146) 801-9241', 'Quae odit vitae labo', '2020-12-29 02:07:29', '2020-12-29 02:07:29'),
(12, 'GuruOrderNumber-5ff2a2b6ada4b', 1, 'pending', '2558.00', 5, 0, 'cash_on_delivery', 'Rajah Branch', 'Veritatis veniam do', 'Incidunt placeat s', 'Officia cumque eum c', 'cohixykev@mailinator.com', '+1 (303) 835-8959', 'Delectus modi non i', '2021-01-03 23:23:06', '2021-01-03 23:23:06'),
(13, 'GuruOrderNumber-5ff2a4f6cbd36', 1, 'pending', '2303.00', 4, 0, 'cash_on_delivery', 'Patience Howe', 'Vel odit ut officia', 'Omnis quis ut nisi i', 'Molestiae nisi aliqu', 'cukohipo@mailinator.com', '+1 (687) 596-8985', 'Magna qui perspiciat', '2021-01-03 23:32:42', '2021-01-03 23:32:42'),
(14, 'GuruOrderNumber-5ff2a558a4e01', 1, 'pending', '531.00', 1, 0, 'cash_on_delivery', 'Pearl Tanner', 'Culpa facilis sed d', 'Est eu labore veniam', 'Incididunt et nostru', 'tegarat@mailinator.com', '+1 (855) 237-6077', 'Est tempor et dolor', '2021-01-03 23:34:20', '2021-01-03 23:34:20'),
(15, 'GuruOrderNumber-5ff2a8042cb0a', 1, 'pending', '999.00', 1, 0, 'cash_on_delivery', 'Rhoda Barrett', 'Deserunt quia dolori', 'Dignissimos doloremq', 'Vitae quis laboriosa', 'roguh@mailinator.com', '+1 (382) 725-6052', 'Omnis voluptatem do', '2021-01-03 23:45:44', '2021-01-03 23:45:44'),
(16, 'GuruOrderNumber-5ff3f68659d9f', 1, 'pending', '1754.00', 2, 0, 'cash_on_delivery', 'Cameron Mckay', 'Amet doloribus aut', 'Dolor porro voluptat', 'Commodi elit omnis', 'noxuw@mailinator.com', '+1 (843) 897-6001', 'Quam nulla aut nostr', '2021-01-04 23:32:58', '2021-01-04 23:32:58'),
(17, 'GuruOrderNumber-5ff3f6b88236b', 1, 'pending', '999.00', 1, 0, 'cash_on_delivery', 'Clio Jordan', 'Adipisci nisi exerci', 'Voluptatem qui labo', 'Ut doloremque dolore', 'cosys@mailinator.com', '+1 (576) 844-4353', 'Rem expedita dolorem', '2021-01-04 23:33:48', '2021-01-04 23:33:48'),
(18, 'GuruOrderNumber-5ff3f73381081', 1, 'pending', '1567.00', 5, 0, 'cash_on_delivery', 'Emerson Spence', 'Nulla ullamco cumque', 'Libero unde dolores', 'Id fugiat minus tem', 'puji@mailinator.com', '+1 (369) 132-1153', 'Explicabo Nobis con', '2021-01-04 23:35:51', '2021-01-04 23:35:51'),
(19, 'GuruOrderNumber-5ff3f8885b830', 1, 'pending', '1535.00', 3, 0, 'cash_on_delivery', 'Bo Gregory', 'Quia dolores ullamco', 'Ullam omnis autem ma', 'Dolor natus tempora', 'rive@mailinator.com', '+1 (109) 837-8875', 'Voluptates quibusdam', '2021-01-04 23:41:32', '2021-01-04 23:41:32'),
(20, 'GuruOrderNumber-5ff3f92a0b06a', 1, 'pending', '1037.00', 3, 0, 'cash_on_delivery', 'Ciara Burke', 'Accusantium Nam mini', 'Est quidem modi eni', 'Nulla eligendi ipsam', 'degobevo@mailinator.com', '+1 (722) 536-5435', 'Dignissimos commodi', '2021-01-04 23:44:14', '2021-01-04 23:44:14'),
(21, 'GuruOrderNumber-5ff3f949ebeb1', 1, 'pending', '1037.00', 3, 0, 'cash_on_delivery', 'Ciara Burke', 'Accusantium Nam mini', 'Est quidem modi eni', 'Nulla eligendi ipsam', 'degobevo@mailinator.com', '+1 (722) 536-5435', 'Dignissimos commodi', '2021-01-04 23:44:46', '2021-01-04 23:44:46'),
(22, 'GuruOrderNumber-5ff3fb45ea99b', 1, 'pending', '1037.00', 3, 0, 'cash_on_delivery', 'Ciara Burke', 'Accusantium Nam mini', 'Est quidem modi eni', 'Nulla eligendi ipsam', 'degobevo@mailinator.com', '+1 (722) 536-5435', 'Dignissimos commodi', '2021-01-04 23:53:13', '2021-01-04 23:53:13'),
(23, 'GuruOrderNumber-5ff3fba1010c4', 1, 'pending', '1037.00', 3, 0, 'cash_on_delivery', 'Ciara Burke', 'Accusantium Nam mini', 'Est quidem modi eni', 'Nulla eligendi ipsam', 'degobevo@mailinator.com', '+1 (722) 536-5435', 'Dignissimos commodi', '2021-01-04 23:54:45', '2021-01-04 23:54:45'),
(24, 'GuruOrderNumber-5ff3fc69d0784', 1, 'pending', '1523.00', 4, 0, 'cash_on_delivery', 'Adam Byrd', 'Ut ipsa accusantium', 'Ipsa et qui necessi', 'Maxime vitae omnis n', 'zulimixovu@mailinator.com', '+1 (658) 815-1997', 'Culpa esse ex cons', '2021-01-04 23:58:05', '2021-01-04 23:58:05'),
(25, 'GuruOrderNumber-5ff3fd36a1243', 1, 'pending', '461.00', 2, 0, 'cash_on_delivery', 'Kimberly Calhoun', 'Qui maiores eum atqu', 'Nulla officiis solut', 'Est impedit delenit', 'xexel@mailinator.com', '+1 (509) 871-3245', 'Lorem expedita quia', '2021-01-05 00:01:30', '2021-01-05 00:01:30'),
(26, 'GuruOrderNumber-5ff3fd7d05bd9', 1, 'pending', '1037.00', 3, 0, 'cash_on_delivery', 'Stephen Rodriguez', 'Voluptate doloremque', 'In ullamco debitis n', 'Omnis et rerum conse', 'fycimi@mailinator.com', '+1 (515) 105-4097', 'In non exercitation', '2021-01-05 00:02:41', '2021-01-05 00:02:41'),
(27, 'GuruOrderNumber-5ff3fdd6220ff', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Samson Frederick', 'Et voluptatibus ut o', 'Voluptatem nemo quo', 'Consectetur ad eius', 'nazykawozu@mailinator.com', '+1 (114) 148-9187', 'Animi ullam non eni', '2021-01-05 00:04:10', '2021-01-05 00:04:10'),
(28, 'GuruOrderNumber-5ff3fdf131d35', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Samson Frederick', 'Et voluptatibus ut o', 'Voluptatem nemo quo', 'Consectetur ad eius', 'nazykawozu@mailinator.com', '+1 (114) 148-9187', 'Animi ullam non eni', '2021-01-05 00:04:37', '2021-01-05 00:04:37'),
(29, 'GuruOrderNumber-5ff3fe00c6128', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Samson Frederick', 'Et voluptatibus ut o', 'Voluptatem nemo quo', 'Consectetur ad eius', 'nazykawozu@mailinator.com', '+1 (114) 148-9187', 'Animi ullam non eni', '2021-01-05 00:04:52', '2021-01-05 00:04:52'),
(30, 'GuruOrderNumber-5ff3fe7b6244d', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Samson Frederick', 'Et voluptatibus ut o', 'Voluptatem nemo quo', 'Consectetur ad eius', 'nazykawozu@mailinator.com', '+1 (114) 148-9187', 'Animi ullam non eni', '2021-01-05 00:06:55', '2021-01-05 00:06:55'),
(31, 'GuruOrderNumber-5ff3fe88a4fad', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Samson Frederick', 'Et voluptatibus ut o', 'Voluptatem nemo quo', 'Consectetur ad eius', 'nazykawozu@mailinator.com', '+1 (114) 148-9187', 'Animi ullam non eni', '2021-01-05 00:07:08', '2021-01-05 00:07:08'),
(32, 'GuruOrderNumber-5ff3ff782d5b2', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Samson Frederick', 'Et voluptatibus ut o', 'Voluptatem nemo quo', 'Consectetur ad eius', 'nazykawozu@mailinator.com', '+1 (114) 148-9187', 'Animi ullam non eni', '2021-01-05 00:11:08', '2021-01-05 00:11:08'),
(33, 'GuruOrderNumber-5ff406d0a9f0e', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Orli Rush', 'Fuga Soluta deserun', 'Quisquam voluptatum', 'Repellendus Ut offi', 'derazu@mailinator.com', '+1 (659) 164-4922', 'Sint vel aliquid cul', '2021-01-05 00:42:28', '2021-01-05 00:42:28'),
(34, 'GuruOrderNumber-5ff406f55c6ff', 1, 'pending', '792.00', 2, 0, 'cash_on_delivery', 'Orli Rush', 'Fuga Soluta deserun', 'Quisquam voluptatum', 'Repellendus Ut offi', 'derazu@mailinator.com', '+1 (659) 164-4922', 'Sint vel aliquid cul', '2021-01-05 00:43:05', '2021-01-05 00:43:05'),
(35, 'GuruOrderNumber-5ff44104cfd4e', 1, 'pending', '1267.00', 2, 0, 'cash_on_delivery', 'Glenna Davidson', 'Nisi quod ut et quo', 'Exercitationem qui n', 'Recusandae Ipsum v', 'jidot@mailinator.com', '+1 (495) 257-7618', 'Culpa molestiae dolo', '2021-01-05 04:50:48', '2021-01-05 04:50:48'),
(36, 'GuruOrderNumber-5ff44677d4d9c', 1, 'pending', '1409.00', 4, 0, 'cash_on_delivery', 'Athena Le', 'Mollitia quia quaera', 'Libero ut iure sit', 'Sint ex id nihil e', 'qalalohesi@mailinator.com', '+1 (531) 342-7222', 'Porro deserunt hic e', '2021-01-05 05:14:03', '2021-01-05 05:14:03'),
(37, 'GuruOrderNumber-5ff544c52b874', 1, 'completed', '784.00', 2, 0, 'cash_on_delivery', 'Cassidy Watkins', 'Rerum anim qui incid', 'Dolore iure tempor n', 'Dolores expedita sus', 'sehew@mailinator.com', '+1 (588) 726-8959', 'Porro et et tempora', '2021-01-05 23:19:05', '2021-02-20 23:18:58'),
(38, 'GuruOrderNumber-5ff7fafe97aaf', 1, 'pending', '2621.00', 7, 0, 'cash_on_delivery', 'Eaton Brown', 'Totam et consectetur', 'Ullam ullamco veniam', 'Modi aliquam tempora', 'homiz@mailinator.com', '+1 (696) 256-6248', 'Magnam corrupti deb', '2021-01-08 00:41:06', '2021-01-08 00:41:06'),
(39, 'GuruOrderNumber-6007ba91264f4', 1, 'completed', '1290.00', 4, 0, 'cash_on_delivery', 'Britanni Middleton', 'Animi qui rem offic', 'Deserunt facere sint', 'Ex aliquam voluptati', 'syned@mailinator.com', '+1 (718) 648-8587', 'Necessitatibus qui l', '2021-01-19 23:22:29', '2021-01-20 01:47:25'),
(40, 'GuruOrderNumber-6007cee91b94e', 1, 'pending', '1315.00', 3, 0, 'cash_on_delivery', 'Malachi Crane', 'Aliquam proident in', 'Rerum excepturi sit', 'Ad in natus providen', 'bibopiwopu@mailinator.com', '+1 (617) 123-3314', 'Voluptatibus optio', '2021-01-20 00:49:17', '2021-01-20 00:49:17'),
(41, 'GuruOrderNumber-6007cf25dc0ba', 1, 'completed', '1045.00', 3, 1, 'cash_on_delivery', 'Mara Jordan', 'Quis ipsa consectet', 'Et quos a praesentiu', 'Quia impedit qui it', 'focabebul@mailinator.com', '+1 (587) 496-5238', 'Libero lorem sunt c', '2021-01-20 00:50:17', '2021-02-20 23:40:24'),
(42, 'GuruOrderNumber-6007cf66a6386', 1, 'completed', '2036.00', 4, 0, 'cash_on_delivery', 'Giselle English', 'Veritatis aut numqua', 'In obcaecati nihil e', 'Elit dolorem eos c', 'parykaware@mailinator.com', '+1 (419) 575-9896', 'Enim dolore ea ipsum', '2021-01-20 00:51:22', '2021-02-20 23:16:25'),
(43, 'GuruOrderNumber-6007ddca168a1', 1, 'processing', '2642.00', 4, 0, 'cash_on_delivery', 'Tanek Dale', 'Ullamco explicabo Q', 'Ipsum ut fugiat repr', 'Voluptas saepe autem', 'kefyve@mailinator.com', '+1 (869) 153-1263', 'In dolor eu est qui', '2021-01-20 01:52:46', '2021-01-20 02:08:18'),
(44, 'GuruOrderNumber-602cce0a2d21e', 1, 'completed', '2509.00', 3, 1, 'cash_on_delivery', 'Aretha Miranda', 'Et consequatur Quia', 'Consequuntur animi', 'Dolor dicta eum quis', 'wefyw@mailinator.com', '+1 (691) 603-5661', 'Ullamco est ea vitae', '2021-02-17 02:19:26', '2021-02-19 01:50:31'),
(45, 'GuruOrderNumber-603261bb8738c', 1, 'pending', '1659.00', 4, 0, 'cash_on_delivery', 'Cody Chandler', 'Rem officiis ipsum v', 'Reiciendis possimus', 'Fugiat ipsam enim au', 'myfepepo@mailinator.com', '+1 (561) 772-2219', 'Itaque recusandae P', '2021-02-21 07:50:55', '2021-02-21 07:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 200.00, NULL, NULL),
(2, 1, 6, 3, 755.00, NULL, NULL),
(3, 1, 7, 1, 999.00, NULL, NULL),
(4, 1, 8, 3, 268.00, NULL, NULL),
(5, 1, 5, 1, 132.00, NULL, NULL),
(6, 1, 10, 3, 376.00, NULL, NULL),
(7, 2, 3, 3, 531.00, NULL, NULL),
(8, 2, 4, 2, 253.00, NULL, NULL),
(9, 2, 2, 1, 261.00, NULL, NULL),
(10, 3, 3, 1, 531.00, NULL, NULL),
(11, 3, 4, 3, 253.00, NULL, NULL),
(12, 4, 3, 1, 531.00, NULL, NULL),
(13, 4, 4, 3, 253.00, NULL, NULL),
(14, 5, 3, 1, 531.00, NULL, NULL),
(15, 5, 4, 3, 253.00, NULL, NULL),
(16, 6, 1, 4, 200.00, NULL, NULL),
(17, 6, 2, 1, 261.00, NULL, NULL),
(18, 6, 4, 1, 253.00, NULL, NULL),
(19, 6, 7, 1, 999.00, NULL, NULL),
(20, 6, 6, 1, 755.00, NULL, NULL),
(21, 7, 1, 4, 200.00, NULL, NULL),
(22, 7, 2, 1, 261.00, NULL, NULL),
(23, 7, 4, 1, 253.00, NULL, NULL),
(24, 7, 7, 1, 999.00, NULL, NULL),
(25, 7, 6, 1, 755.00, NULL, NULL),
(26, 8, 1, 4, 200.00, NULL, NULL),
(27, 8, 7, 1, 999.00, NULL, NULL),
(28, 9, 3, 1, 531.00, NULL, NULL),
(29, 9, 4, 1, 253.00, NULL, NULL),
(30, 9, 2, 1, 261.00, NULL, NULL),
(31, 10, 2, 1, 261.00, NULL, NULL),
(32, 10, 3, 1, 531.00, NULL, NULL),
(33, 10, 4, 1, 253.00, NULL, NULL),
(34, 11, 2, 1, 261.00, NULL, NULL),
(35, 11, 3, 1, 531.00, NULL, NULL),
(36, 11, 4, 1, 253.00, NULL, NULL),
(37, 12, 6, 1, 755.00, NULL, NULL),
(38, 12, 7, 1, 999.00, NULL, NULL),
(39, 12, 8, 3, 268.00, NULL, NULL),
(40, 13, 6, 1, 755.00, NULL, NULL),
(41, 13, 7, 1, 999.00, NULL, NULL),
(42, 13, 8, 1, 268.00, NULL, NULL),
(43, 13, 9, 1, 281.00, NULL, NULL),
(44, 14, 3, 1, 531.00, NULL, NULL),
(45, 15, 7, 1, 999.00, NULL, NULL),
(46, 16, 6, 1, 755.00, NULL, NULL),
(47, 16, 7, 1, 999.00, NULL, NULL),
(48, 17, 7, 1, 999.00, NULL, NULL),
(49, 18, 3, 1, 531.00, NULL, NULL),
(50, 18, 4, 1, 253.00, NULL, NULL),
(51, 18, 2, 3, 261.00, NULL, NULL),
(52, 19, 7, 1, 999.00, NULL, NULL),
(53, 19, 8, 2, 268.00, NULL, NULL),
(54, 20, 4, 2, 253.00, NULL, NULL),
(55, 20, 3, 1, 531.00, NULL, NULL),
(56, 21, 4, 2, 253.00, NULL, NULL),
(57, 21, 3, 1, 531.00, NULL, NULL),
(58, 22, 4, 2, 253.00, NULL, NULL),
(59, 22, 3, 1, 531.00, NULL, NULL),
(60, 23, 4, 2, 253.00, NULL, NULL),
(61, 23, 3, 1, 531.00, NULL, NULL),
(62, 24, 1, 1, 200.00, NULL, NULL),
(63, 24, 2, 1, 261.00, NULL, NULL),
(64, 24, 3, 2, 531.00, NULL, NULL),
(65, 25, 1, 1, 200.00, NULL, NULL),
(66, 25, 2, 1, 261.00, NULL, NULL),
(67, 26, 3, 1, 531.00, NULL, NULL),
(68, 26, 4, 2, 253.00, NULL, NULL),
(69, 27, 2, 1, 261.00, NULL, NULL),
(70, 27, 3, 1, 531.00, NULL, NULL),
(71, 28, 2, 1, 261.00, NULL, NULL),
(72, 28, 3, 1, 531.00, NULL, NULL),
(73, 29, 2, 1, 261.00, NULL, NULL),
(74, 29, 3, 1, 531.00, NULL, NULL),
(75, 30, 2, 1, 261.00, NULL, NULL),
(76, 30, 3, 1, 531.00, NULL, NULL),
(77, 31, 2, 1, 261.00, NULL, NULL),
(78, 31, 3, 1, 531.00, NULL, NULL),
(79, 32, 2, 1, 261.00, NULL, NULL),
(80, 32, 3, 1, 531.00, NULL, NULL),
(81, 33, 2, 1, 261.00, NULL, NULL),
(82, 33, 3, 1, 531.00, NULL, NULL),
(83, 34, 2, 1, 261.00, NULL, NULL),
(84, 34, 3, 1, 531.00, NULL, NULL),
(85, 35, 7, 1, 999.00, NULL, NULL),
(86, 35, 8, 1, 268.00, NULL, NULL),
(87, 36, 10, 3, 376.00, NULL, NULL),
(88, 36, 9, 1, 281.00, NULL, NULL),
(89, 37, 3, 1, 531.00, NULL, NULL),
(90, 37, 4, 1, 253.00, NULL, NULL),
(91, 38, 3, 3, 531.00, NULL, NULL),
(92, 38, 4, 2, 253.00, NULL, NULL),
(93, 38, 2, 2, 261.00, NULL, NULL),
(94, 39, 3, 1, 531.00, NULL, NULL),
(95, 39, 4, 3, 253.00, NULL, NULL),
(96, 40, 3, 2, 531.00, NULL, NULL),
(97, 40, 4, 1, 253.00, NULL, NULL),
(98, 41, 3, 1, 531.00, NULL, NULL),
(99, 41, 4, 1, 253.00, NULL, NULL),
(100, 41, 2, 1, 261.00, NULL, NULL),
(101, 42, 3, 1, 531.00, NULL, NULL),
(102, 42, 4, 2, 253.00, NULL, NULL),
(103, 42, 7, 1, 999.00, NULL, NULL),
(104, 43, 7, 2, 999.00, NULL, NULL),
(105, 43, 8, 1, 268.00, NULL, NULL),
(106, 43, 10, 1, 376.00, NULL, NULL),
(107, 44, 6, 2, 755.00, NULL, NULL),
(108, 44, 7, 1, 999.00, NULL, NULL),
(109, 45, 10, 3, 376.00, NULL, NULL),
(110, 45, 3, 1, 531.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `sale_price` int(10) UNSIGNED DEFAULT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `sale_price`, `featured_image`, `stock`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quam et nam eos harum quia ad.', 'quam-et-nam-eos-harum-quia-ad', 399, 200, 'placeholder.jpg', 3, '<p>Voluptas neque voluptate occaecati aut. Repellendus illo aliquam officia consequatur. Quam reiciendis perferendis omnis doloribus cum enim est.</p>', '2020-12-14 00:57:46', '2020-12-16 23:48:05'),
(2, 'Ab quod voluptatum non distinctio ipsum.', 'ab-quod-voluptatum-non-distinctio-ipsum', 261, NULL, 'placeholder.jpg', 5, 'Recusandae consequatur quo saepe dolores aut aut aut. Aut nesciunt aut est eligendi fugit modi eum repudiandae. Error mollitia iusto tempora.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(3, 'Quia ratione deleniti perferendis atque quia.', 'quia-ratione-deleniti-perferendis-atque-quia', 531, NULL, 'placeholder.jpg', 8, 'Id qui voluptatem laudantium blanditiis dolorum est quos. Repellendus ipsam provident et vero dolores. Eveniet consequatur placeat deleniti. Accusamus eaque quasi vel.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(4, 'Vitae consequatur architecto eveniet esse modi eos.', 'vitae-consequatur-architecto-eveniet-esse-modi-eos', 253, NULL, 'placeholder.jpg', 4, 'Iure dolorem non sequi tenetur nobis non. Dolore mollitia et incidunt impedit blanditiis nisi atque. Consequatur repudiandae soluta id aut. Dolore adipisci est consequatur vitae quia.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(5, 'Consequatur amet ipsam sed quis.', 'consequatur-amet-ipsam-sed-quis', 132, NULL, 'placeholder.jpg', 0, 'Voluptas doloribus sit totam placeat iste aut. Praesentium autem maiores ipsam maxime doloribus itaque iste. Similique excepturi et veniam excepturi voluptatem. Sed pariatur omnis qui ullam facere.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(6, 'Odit sint itaque aut.', 'odit-sint-itaque-aut', 755, NULL, 'placeholder.jpg', 5, 'Sed quod qui repudiandae. Soluta voluptas et quasi voluptates ullam. Voluptatibus quod amet aut voluptate reprehenderit. Sunt aut officiis corrupti unde totam illum temporibus.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(7, 'Amet magni impedit sint minima delectus.', 'amet-magni-impedit-sint-minima-delectus', 999, NULL, 'placeholder.jpg', 1, 'Maxime dignissimos quo consequatur ipsam ullam est. Ad dolorum nam repudiandae quaerat quaerat quos adipisci. Voluptates autem et aut deleniti consequuntur tempore dolorem. Omnis molestiae est voluptas voluptatem.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(8, 'Sint harum sit nihil.', 'sint-harum-sit-nihil', 268, NULL, 'placeholder.jpg', 8, 'Laboriosam sapiente non provident incidunt sunt excepturi et. Rem placeat delectus quisquam esse deserunt dolore. Aliquid aut voluptatum ea. Deleniti aut sequi modi dicta.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(9, 'Nesciunt ipsum hic aut nemo veritatis.', 'nesciunt-ipsum-hic-aut-nemo-veritatis', 281, NULL, 'placeholder.jpg', 5, 'Eos hic nesciunt velit aut eum perferendis dicta. Est sequi eum debitis totam fugit delectus maiores. Ipsa voluptas nam dolorum voluptate consequatur modi.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(10, 'Et quos ea inventore quisquam.', 'et-quos-ea-inventore-quisquam', 376, NULL, 'placeholder.jpg', 6, 'Culpa earum iste vel voluptas tenetur distinctio alias. Maxime ad aut corporis tempora quam accusantium. Dolores officia ea tempore quas rerum eos praesentium.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(11, 'Aut minima adipisci illum quia voluptas minima quis esse.', 'aut-minima-adipisci-illum-quia-voluptas-minima-quis-esse', 726, NULL, 'placeholder.jpg', 5, 'Facere molestiae sit ut. Voluptas perspiciatis dolores fuga dicta. Ut aliquam porro fugiat eum id rerum magnam. Cupiditate qui voluptatem perferendis voluptatem sapiente quia.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(12, 'Eos sequi beatae rerum voluptatem quam.', 'eos-sequi-beatae-rerum-voluptatem-quam', 164, NULL, 'placeholder.jpg', 4, 'Porro laborum perspiciatis qui blanditiis libero voluptatem necessitatibus. Numquam aut quisquam at assumenda velit voluptas. Maxime quaerat molestias id.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(13, 'Aperiam ad enim magni et.', 'aperiam-ad-enim-magni-et', 187, NULL, 'placeholder.jpg', 9, 'Sequi vel est cupiditate illum possimus aspernatur. Omnis error et ex quibusdam molestiae. Distinctio dolores et cupiditate eveniet. Eos facilis omnis et blanditiis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(14, 'Enim ducimus non minus autem dolores sit et.', 'enim-ducimus-non-minus-autem-dolores-sit-et', 371, NULL, 'placeholder.jpg', 8, 'Veritatis eos voluptatum aliquid rerum corrupti nihil voluptatem quas. Autem tenetur laborum distinctio. Dolorem laboriosam sed beatae. Officia neque voluptatem officiis ut fugiat magni cum et.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(15, 'Sed facere reprehenderit dignissimos dolorum maiores.', 'sed-facere-reprehenderit-dignissimos-dolorum-maiores', 709, NULL, 'placeholder.jpg', 1, 'Labore blanditiis a qui deleniti aut qui nemo alias. Modi sed velit consequatur blanditiis. Pariatur perferendis error minima qui quae vel. Atque ipsam quod doloribus non. Magni vel neque accusamus voluptas quisquam.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(16, 'Architecto iusto repellat quas perferendis expedita.', 'architecto-iusto-repellat-quas-perferendis-expedita', 708, NULL, 'placeholder.jpg', 6, 'Unde enim dolorem mollitia est quis in. Molestiae nisi amet et ea voluptatem nihil voluptatem.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(17, 'Ex molestiae minus aut ullam molestiae nihil unde enim.', 'ex-molestiae-minus-aut-ullam-molestiae-nihil-unde-enim', 919, NULL, 'placeholder.jpg', 0, 'Omnis sunt corrupti molestias velit ea perferendis molestiae. Ad sit consequuntur dolorem. Dolor placeat quis corrupti ea dolores est. Sit consequatur iusto ut voluptas enim dolores. Ipsa ipsa quaerat similique omnis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(18, 'Odio sit cupiditate quidem ea hic quod qui.', 'odio-sit-cupiditate-quidem-ea-hic-quod-qui', 894, NULL, 'placeholder.jpg', 5, 'Distinctio corrupti fugit dicta saepe nihil aliquid omnis. Nihil atque magni est perferendis cumque blanditiis occaecati. Reprehenderit quos ullam corporis harum modi cupiditate ut.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(19, 'Cupiditate officiis placeat rerum quia repudiandae quia.', 'cupiditate-officiis-placeat-rerum-quia-repudiandae-quia', 143, NULL, 'placeholder.jpg', 5, 'Quidem sequi nulla ullam illum autem vel. Repellendus eos aut dolorum delectus. Ut ratione fugiat voluptatem rerum.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(20, 'Et placeat aut deleniti sit corporis.', 'et-placeat-aut-deleniti-sit-corporis', 197, NULL, 'placeholder.jpg', 1, 'Saepe cum quia est et. Consequuntur quasi similique reprehenderit doloribus aliquid quia. Ducimus in inventore pariatur vel. Quae et ratione ullam hic blanditiis. Dolore et quia eligendi aut dolor veniam eum.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(21, 'Eum dolorem libero aut et dignissimos.', 'eum-dolorem-libero-aut-et-dignissimos', 325, NULL, 'placeholder.jpg', 8, 'Consequatur aliquid ipsa quia esse omnis blanditiis quo. Dolore facilis ipsum dolores a dolor assumenda soluta. Qui rerum quia eum dolor. Et asperiores nulla aut cupiditate nesciunt perspiciatis omnis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(22, 'Quisquam ab nesciunt dolorem numquam quia.', 'quisquam-ab-nesciunt-dolorem-numquam-quia', 733, NULL, 'placeholder.jpg', 0, 'Quisquam debitis laborum deleniti est in reiciendis ducimus aperiam. Voluptatem dignissimos qui aliquid quibusdam labore. Nobis labore rerum sunt enim ducimus. Distinctio et veritatis eius facilis ut quo.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(23, 'Hic vel sed quas voluptatem maxime ut.', 'hic-vel-sed-quas-voluptatem-maxime-ut', 900, NULL, 'placeholder.jpg', 6, 'Velit autem aliquam et. Modi tempore vel molestiae nulla cum. Sed inventore harum quia quibusdam repellat quia occaecati.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(24, 'Quis totam error quia et consequatur nisi inventore.', 'quis-totam-error-quia-et-consequatur-nisi-inventore', 434, NULL, 'placeholder.jpg', 0, 'Earum et excepturi repellat porro. Aut libero est eum doloribus eveniet consequatur. Et qui maxime dolorem. Qui perferendis nemo est neque molestias iste.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(25, 'Facilis nobis nobis et consequatur iste.', 'facilis-nobis-nobis-et-consequatur-iste', 558, NULL, 'placeholder.jpg', 1, 'Accusamus accusantium qui illum. Ad itaque blanditiis sint illo ducimus et. Id aspernatur qui consequatur voluptatem laborum. Nulla et cumque dolores molestias doloribus sapiente eius. Aliquid deserunt tempora est tempora.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(26, 'Quia modi nemo ut optio accusantium porro.', 'quia-modi-nemo-ut-optio-accusantium-porro', 713, NULL, 'placeholder.jpg', 7, 'Ut et et provident expedita accusamus ducimus temporibus. Et quia id natus incidunt. Quasi quibusdam repellat ut deserunt.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(27, 'Qui eum qui est voluptas.', 'qui-eum-qui-est-voluptas', 995, NULL, 'placeholder.jpg', 5, 'Nulla ut aut et et quas provident. Ea ut rerum aut illum fugit corporis culpa. Accusantium corporis quidem non quos cumque optio repellendus. Quisquam eos vel voluptatibus at quia natus et.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(28, 'Voluptatem sint et eveniet vel aut consectetur.', 'voluptatem-sint-et-eveniet-vel-aut-consectetur', 120, NULL, 'placeholder.jpg', 5, 'Inventore qui tempore laboriosam iure minima. Voluptate impedit dolores reiciendis quibusdam. Eum ipsa cumque ut possimus voluptates vel consectetur vel.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(29, 'Quae vero exercitationem rerum.', 'quae-vero-exercitationem-rerum', 787, NULL, 'placeholder.jpg', 2, 'Sed iusto architecto hic aut aut dolor. Qui facere qui sit distinctio minus eveniet quod ipsa. Occaecati quos quis est occaecati.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(30, 'Non porro aut qui atque.', 'non-porro-aut-qui-atque', 305, NULL, 'placeholder.jpg', 7, 'Est dolor doloribus eaque velit ea ut. Non exercitationem culpa minima eum. Dolores quam sed deserunt consectetur.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(31, 'Eos voluptate sapiente odit voluptates aut.', 'eos-voluptate-sapiente-odit-voluptates-aut', 937, NULL, 'placeholder.jpg', 3, 'Nisi aut officiis adipisci inventore recusandae consequuntur. Sit et itaque eum laborum earum modi impedit. Dolore inventore excepturi repellat dolorem est quam non.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(32, 'Esse hic placeat ratione eligendi non sint blanditiis.', 'esse-hic-placeat-ratione-eligendi-non-sint-blanditiis', 844, NULL, 'placeholder.jpg', 1, 'Et tempora delectus magnam. Sed fugiat reiciendis perspiciatis dolores corrupti. Vitae enim aut in in.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(33, 'Nam at voluptates eaque molestiae odit occaecati quis.', 'nam-at-voluptates-eaque-molestiae-odit-occaecati-quis', 260, NULL, 'placeholder.jpg', 4, 'Ab et atque veniam saepe consequatur sed fugit. Vitae voluptas illum assumenda accusantium non voluptate. Et sequi officia aspernatur vero et totam. Et magnam expedita et.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(34, 'Reprehenderit nostrum alias aut quis voluptas corrupti voluptatum.', 'reprehenderit-nostrum-alias-aut-quis-voluptas-corrupti-voluptatum', 623, NULL, 'placeholder.jpg', 8, 'Laboriosam dolorum ut perferendis odit. Facere quae autem deleniti qui ipsa.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(35, 'Distinctio molestias soluta enim aperiam excepturi.', 'distinctio-molestias-soluta-enim-aperiam-excepturi', 394, NULL, 'placeholder.jpg', 6, 'Dolores magnam consectetur vero sint quas eius corporis quia. Amet officia et dolorum ipsam rem iusto. Dolor aut officiis similique doloremque nesciunt eos eos. Asperiores facere iure libero est vel facilis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(36, 'Provident quo et eius cum.', 'provident-quo-et-eius-cum', 686, NULL, 'placeholder.jpg', 4, 'Voluptatem dolorem ut possimus exercitationem ullam cumque id. Eos beatae dolores quidem aperiam veritatis quis. Est id eum et voluptate. Autem in quasi quibusdam necessitatibus ut error sint.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(37, 'Quia sit esse illo nulla animi nisi.', 'quia-sit-esse-illo-nulla-animi-nisi', 995, NULL, 'placeholder.jpg', 2, 'Fugit ut illum dolores ratione doloremque. Aperiam voluptatem minus veniam consequatur sed iste voluptate. Deleniti molestiae quaerat minima porro velit beatae suscipit perspiciatis. Unde qui sint beatae asperiores.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(38, 'Dolores similique placeat numquam mollitia nemo.', 'dolores-similique-placeat-numquam-mollitia-nemo', 845, NULL, 'placeholder.jpg', 6, 'Provident ut ullam aut iusto doloremque perspiciatis. Autem aut voluptate omnis molestiae optio et rem. Eum exercitationem impedit alias qui ad.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(39, 'Nulla ut soluta nulla sunt praesentium et.', 'nulla-ut-soluta-nulla-sunt-praesentium-et', 945, NULL, 'placeholder.jpg', 5, 'Quis laudantium accusantium sed in fugiat rerum. Eos voluptatum officia aut dolorum.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(40, 'Occaecati nobis facere alias sed magnam.', 'occaecati-nobis-facere-alias-sed-magnam', 511, NULL, 'placeholder.jpg', 1, 'Ducimus maxime dolores eum id provident dolor vel. Accusantium aperiam eos quam aspernatur voluptatem ut est. Ea sequi vel iure est. Aut dolores ducimus aspernatur velit vero quas.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(41, 'Aut nam molestiae molestiae velit corrupti ducimus.', 'aut-nam-molestiae-molestiae-velit-corrupti-ducimus', 578, NULL, 'placeholder.jpg', 0, 'Ad fugit vero tenetur maxime nesciunt. Recusandae aspernatur consequuntur placeat facilis quo repellat quasi. Nulla dolores quo velit corrupti quasi vitae aut.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(42, 'Consequatur qui distinctio tempore ut eveniet.', 'consequatur-qui-distinctio-tempore-ut-eveniet', 841, NULL, 'placeholder.jpg', 5, 'Ea sunt qui ea. Hic aut suscipit qui labore necessitatibus repudiandae. Cum provident voluptatem laudantium laudantium consequatur quidem alias dolor. Sunt nam quidem ut. Corrupti eius id qui distinctio sequi dignissimos et.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(43, 'Dolor itaque dicta aliquam libero assumenda voluptatem.', 'dolor-itaque-dicta-aliquam-libero-assumenda-voluptatem', 631, NULL, 'placeholder.jpg', 5, 'Nihil vitae omnis et amet. In placeat dolores vel. Mollitia dolorem voluptatem iure quae aut exercitationem. Dolor voluptas sit odit quis enim odio.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(44, 'Adipisci iusto in omnis ut.', 'adipisci-iusto-in-omnis-ut', 847, NULL, 'placeholder.jpg', 4, 'Omnis rem voluptatem qui sit. Laudantium vel atque molestiae. Repellendus deleniti consectetur sed.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(45, 'Illum quaerat odit quia et.', 'illum-quaerat-odit-quia-et', 226, NULL, 'placeholder.jpg', 3, 'Qui tempore quia iusto eligendi reiciendis quibusdam error. Quaerat error quo aut repellat expedita. Aut ipsa assumenda atque occaecati nemo. Non aperiam sint quae qui atque atque ab. Consequatur occaecati nostrum aliquam voluptatem ut.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(46, 'Omnis voluptatem cum sit ut omnis.', 'omnis-voluptatem-cum-sit-ut-omnis', 221, NULL, 'placeholder.jpg', 0, 'Dolor perspiciatis aut nesciunt aut odit. Iusto quo vero aliquid cum laboriosam dignissimos voluptatibus. Soluta dolorem consequuntur dolor tenetur eius. Assumenda ipsa dolores sint aperiam.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(47, 'Ratione quam ut assumenda soluta officiis a non quia.', 'ratione-quam-ut-assumenda-soluta-officiis-a-non-quia', 511, NULL, 'placeholder.jpg', 4, 'Fugit est id molestiae in sapiente ab tenetur. Iusto voluptatibus ut praesentium error ut. Veniam hic est maiores eaque earum illum in cum. Sed rerum incidunt non iste labore.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(48, 'Et ut tempore est voluptatem voluptatem.', 'et-ut-tempore-est-voluptatem-voluptatem', 128, NULL, 'placeholder.jpg', 2, 'Adipisci aut eius aut quis. Quasi dolor sed laborum id enim sed id. Numquam dolorum et iure quia.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(49, 'Ea saepe reiciendis vel nemo quo consequuntur labore rem.', 'ea-saepe-reiciendis-vel-nemo-quo-consequuntur-labore-rem', 309, NULL, 'placeholder.jpg', 9, 'Repellat vero sed et. Ipsam minus ut dolorem tempora quia quos. Consequatur quia ullam omnis quisquam sit. Eum ut in maiores excepturi.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(50, 'Ut qui aut deserunt fuga hic.', 'ut-qui-aut-deserunt-fuga-hic', 172, NULL, 'placeholder.jpg', 3, 'Laborum quisquam ducimus veniam quisquam error. Est praesentium ut quam ut. Repellat quos doloribus sequi ut aut maxime voluptas quis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(51, 'Odio placeat et necessitatibus ut architecto veniam sapiente.', 'odio-placeat-et-necessitatibus-ut-architecto-veniam-sapiente', 921, NULL, 'placeholder.jpg', 0, 'Quia velit voluptatem est et in. Ipsum eos aut officia quia animi a. Numquam quia cum quisquam odit voluptas odit voluptatibus. Laudantium assumenda id odit excepturi alias id molestias.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(52, 'Rerum est sed odit illo id sed cupiditate qui.', 'rerum-est-sed-odit-illo-id-sed-cupiditate-qui', 104, NULL, 'placeholder.jpg', 7, 'Accusantium accusantium esse animi quasi. Autem id non debitis culpa qui. Amet ut et eum ex.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(53, 'Sit quis minus perspiciatis voluptatibus.', 'sit-quis-minus-perspiciatis-voluptatibus', 527, NULL, 'placeholder.jpg', 3, 'Id voluptatem voluptatem repellat nostrum unde magnam odit earum. Consequuntur nam eum nisi ut eius aspernatur deleniti. Fugiat consequatur sed totam porro omnis natus soluta.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(54, 'Unde qui nemo quidem voluptas reprehenderit.', 'unde-qui-nemo-quidem-voluptas-reprehenderit', 629, NULL, 'placeholder.jpg', 8, 'Veritatis perferendis autem qui eos. Deleniti rerum natus sint. Quam et possimus ut adipisci vitae debitis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(55, 'Quia delectus totam unde et saepe dolores.', 'quia-delectus-totam-unde-et-saepe-dolores', 173, NULL, 'placeholder.jpg', 8, 'Consequatur excepturi quia voluptatem debitis unde. Ut omnis molestiae reprehenderit quis sunt. Quia reprehenderit ea qui. Dolore et nesciunt earum iusto iusto labore.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(56, 'Rerum nihil aut ea eaque consequatur laudantium ut.', 'rerum-nihil-aut-ea-eaque-consequatur-laudantium-ut', 891, NULL, 'placeholder.jpg', 1, 'Sit culpa voluptatum dolores ullam. Ea illum illum ut amet sint qui beatae. Sequi voluptate pariatur neque eaque qui reiciendis nesciunt.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(57, 'Alias aut omnis sunt possimus.', 'alias-aut-omnis-sunt-possimus', 636, NULL, 'placeholder.jpg', 6, 'Aut natus illo aut nam dolores quo recusandae. Voluptas tempore beatae soluta. Nihil voluptates autem voluptas cum.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(58, 'Laborum quo qui sint accusantium dolor.', 'laborum-quo-qui-sint-accusantium-dolor', 675, NULL, 'placeholder.jpg', 8, 'Fuga unde omnis doloribus maxime officia qui id. Distinctio nemo quos perferendis esse dolor sunt similique. Sed beatae magni voluptatem debitis qui molestiae minima. Non non modi suscipit ratione eaque.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(59, 'Explicabo eius illo quia ipsa eaque maxime voluptate.', 'explicabo-eius-illo-quia-ipsa-eaque-maxime-voluptate', 281, NULL, 'placeholder.jpg', 1, 'Laborum similique sint pariatur ut. Molestiae voluptatem non sapiente dolor. Impedit a nulla quam aut iure delectus dolor.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(60, 'Esse pariatur modi omnis nisi consequatur in.', 'esse-pariatur-modi-omnis-nisi-consequatur-in', 544, NULL, 'placeholder.jpg', 5, 'Libero ut temporibus qui distinctio veniam et id. Dicta ullam ab ex eius et quis est. Doloremque animi laborum nostrum sed est cumque.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(61, 'Aliquid ipsum quia reiciendis nesciunt perspiciatis maiores.', 'aliquid-ipsum-quia-reiciendis-nesciunt-perspiciatis-maiores', 529, NULL, 'placeholder.jpg', 1, 'Possimus et praesentium voluptas. Vel tempore repellat est deserunt odio. Incidunt quo animi et dolorem. Sit accusantium aut similique necessitatibus et ab dolorem.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(62, 'Soluta dolore inventore magnam repellendus fugit esse voluptate itaque.', 'soluta-dolore-inventore-magnam-repellendus-fugit-esse-voluptate-itaque', 689, NULL, 'placeholder.jpg', 9, 'Aliquam in ut asperiores necessitatibus. Animi odit amet ex voluptates. Ducimus eaque numquam tempora quidem dolorum. Fugiat dolore quidem esse.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(63, 'Sint sequi delectus delectus quas.', 'sint-sequi-delectus-delectus-quas', 270, NULL, 'placeholder.jpg', 0, 'Beatae rerum et cupiditate. Aliquam deserunt aut sit vero officiis non. Illo saepe est officiis rerum totam ut voluptatem iste.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(64, 'Repellendus quidem labore porro.', 'repellendus-quidem-labore-porro', 511, NULL, 'placeholder.jpg', 1, 'Iusto consequatur dignissimos quae inventore harum. Eligendi et aperiam expedita aliquam corporis sit. Qui nisi esse repudiandae facere aut id.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(65, 'Accusantium non consectetur impedit aut expedita.', 'accusantium-non-consectetur-impedit-aut-expedita', 987, NULL, 'placeholder.jpg', 7, 'Nesciunt dolorem sint dolorem deserunt molestiae dolor voluptatem. A commodi quos dolores enim.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(66, 'Doloremque nobis et esse reiciendis dolore.', 'doloremque-nobis-et-esse-reiciendis-dolore', 427, NULL, 'placeholder.jpg', 1, 'Fugiat animi maiores nam et dolor. Sequi aut ipsum ex est. Ducimus omnis quae quis incidunt maxime atque.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(67, 'Dignissimos aut saepe non quis dolorum.', 'dignissimos-aut-saepe-non-quis-dolorum', 370, NULL, 'placeholder.jpg', 8, 'Enim ut harum aut veniam omnis id. Eum qui laudantium et sequi nam omnis ipsam. Dolores sint repudiandae aut nemo ipsa sit. Cum aspernatur libero deserunt consequuntur maxime ut. Deleniti earum quam commodi ut eligendi.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(68, 'Distinctio totam doloribus ullam labore veritatis.', 'distinctio-totam-doloribus-ullam-labore-veritatis', 114, NULL, 'placeholder.jpg', 9, 'Nobis doloribus cum ut eligendi quas rerum ut. Et quis velit atque explicabo laboriosam quia minus doloribus. Est aut provident quas sit. Perspiciatis magni provident ut aut error optio laboriosam laudantium.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(69, 'Repellendus vel ut cupiditate dolores numquam minus est.', 'repellendus-vel-ut-cupiditate-dolores-numquam-minus-est', 919, NULL, 'placeholder.jpg', 9, 'Laudantium magni illum nihil quibusdam. Eveniet cum officiis omnis doloremque voluptatibus atque. Earum voluptas laborum quae voluptatem architecto consequatur numquam. Doloribus odit perspiciatis consequuntur.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(70, 'Ducimus non tenetur voluptatem quae voluptates amet voluptatibus ducimus.', 'ducimus-non-tenetur-voluptatem-quae-voluptates-amet-voluptatibus-ducimus', 771, NULL, 'placeholder.jpg', 5, 'Reprehenderit excepturi ullam velit et. Ut excepturi omnis fuga similique sed ea sunt doloribus. Assumenda maxime reiciendis qui sit est tempore in.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(71, 'Quas aut et id sint quidem atque.', 'quas-aut-et-id-sint-quidem-atque', 885, NULL, 'placeholder.jpg', 3, 'Et minus error quis magni dolor. Qui recusandae perspiciatis excepturi laboriosam minima quo quia. Et debitis reprehenderit magnam illo. Et hic qui voluptas.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(72, 'Debitis eos enim dolore atque voluptatum animi.', 'debitis-eos-enim-dolore-atque-voluptatum-animi', 172, NULL, 'placeholder.jpg', 3, 'Amet tenetur sed sed animi maxime. Quae rerum minima eum repudiandae commodi facilis totam placeat. Esse tempora amet eaque dolorem voluptas quas fugit.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(73, 'Nisi qui quos laudantium et possimus et reiciendis.', 'nisi-qui-quos-laudantium-et-possimus-et-reiciendis', 363, NULL, 'placeholder.jpg', 1, 'Modi omnis enim velit inventore voluptate. Dolorum est ut harum ut dolorem. Ipsa recusandae non et dolor similique minima.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(74, 'Distinctio rerum rerum consectetur.', 'distinctio-rerum-rerum-consectetur', 969, NULL, 'placeholder.jpg', 7, 'Maxime vel sed facere et vel. Ut vel in amet nisi qui voluptatem dolores. Pariatur odit incidunt sit. Eaque culpa nisi voluptatibus.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(75, 'Quas nostrum aperiam qui temporibus quia qui.', 'quas-nostrum-aperiam-qui-temporibus-quia-qui', 812, NULL, 'placeholder.jpg', 7, 'Excepturi similique sint voluptas totam ad. Voluptatibus velit dolor enim molestias quo facere. Temporibus nostrum aut et quaerat. Ut omnis ea sed necessitatibus.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(76, 'Dolore accusantium fuga cupiditate harum eaque illum.', 'dolore-accusantium-fuga-cupiditate-harum-eaque-illum', 707, NULL, 'placeholder.jpg', 1, 'Possimus nesciunt iusto at ullam soluta ut. Dolorum facere natus ea quia consequatur inventore at. Iure doloremque qui mollitia ea.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(77, 'Reiciendis impedit non animi error possimus quidem quo.', 'reiciendis-impedit-non-animi-error-possimus-quidem-quo', 519, NULL, 'placeholder.jpg', 3, 'Et numquam dolor cumque. Quo minima dolore et dignissimos aut sit.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(78, 'Voluptatum incidunt officia debitis excepturi unde dolorem ut est.', 'voluptatum-incidunt-officia-debitis-excepturi-unde-dolorem-ut-est', 414, NULL, 'placeholder.jpg', 8, 'Harum omnis consectetur et et aliquid fugit. Minus nisi rem deserunt voluptatem ut tempore. Dolor consequatur non totam ipsum necessitatibus. Voluptas fuga recusandae neque officia veniam incidunt autem est.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(79, 'Eveniet voluptatibus quibusdam rerum eaque enim eos.', 'eveniet-voluptatibus-quibusdam-rerum-eaque-enim-eos', 832, NULL, 'placeholder.jpg', 9, 'Sequi rem nobis ipsa eum. Veritatis ut porro odio esse.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(80, 'Accusamus iusto tenetur voluptatem voluptatum exercitationem nesciunt.', 'accusamus-iusto-tenetur-voluptatem-voluptatum-exercitationem-nesciunt', 275, NULL, 'placeholder.jpg', 1, 'Sint et consequatur possimus culpa sed. Alias possimus ducimus assumenda ipsam. Voluptas placeat dicta voluptatibus quia vitae at. Reprehenderit et cumque eos magnam dolor pariatur.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(81, 'Et ratione veritatis maxime quis.', 'et-ratione-veritatis-maxime-quis', 670, NULL, 'placeholder.jpg', 3, 'Qui non dolores atque ipsa. Sequi quis ut rerum. Reiciendis ab error earum ipsa cupiditate. Commodi voluptatibus totam molestiae minima inventore totam dicta ut. Necessitatibus eos iste architecto animi.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(82, 'Ipsum magnam enim sunt.', 'ipsum-magnam-enim-sunt', 185, NULL, 'placeholder.jpg', 7, 'Deserunt corrupti dolores aut. Illum magni dolor voluptate. Repellendus est beatae ab asperiores rerum. Debitis a eos nulla sapiente.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(83, 'Inventore nostrum dolores alias vero ducimus optio ad.', 'inventore-nostrum-dolores-alias-vero-ducimus-optio-ad', 146, NULL, 'placeholder.jpg', 6, 'Qui quia commodi expedita sint aut quis corrupti. Dolorum natus mollitia cumque. Enim voluptas aut dicta omnis consectetur. Sunt dolorum consequatur provident soluta doloribus.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(84, 'Ut esse sit quia quas aspernatur repudiandae aut.', 'ut-esse-sit-quia-quas-aspernatur-repudiandae-aut', 860, NULL, 'placeholder.jpg', 7, 'Ea consectetur quidem quasi optio reiciendis nam. Quas itaque voluptatibus voluptas possimus temporibus et. Ullam quasi voluptas est. Voluptate numquam laborum nemo necessitatibus. Numquam aut earum temporibus earum eos tempora voluptate accusamus.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(85, 'Exercitationem fugiat aut rem eius est.', 'exercitationem-fugiat-aut-rem-eius-est', 362, NULL, 'placeholder.jpg', 7, 'Dolores nihil facilis consequatur error molestias quibusdam repellendus. Eum ab dignissimos quidem commodi. Velit ullam ipsa eos commodi possimus in aspernatur.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(86, 'Quibusdam sapiente minima corrupti omnis voluptates.', 'quibusdam-sapiente-minima-corrupti-omnis-voluptates', 835, NULL, 'placeholder.jpg', 8, 'Explicabo voluptatem ut cum est. Voluptas dolor illum quia nesciunt.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(87, 'Enim excepturi occaecati repellat nisi aut sit vel.', 'enim-excepturi-occaecati-repellat-nisi-aut-sit-vel', 251, NULL, 'placeholder.jpg', 2, 'Labore omnis officiis dignissimos. Tempora corrupti nihil id consequatur est aut ipsa. Culpa minima et natus debitis et atque.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(88, 'Ducimus amet dicta dignissimos aut.', 'ducimus-amet-dicta-dignissimos-aut', 736, NULL, 'placeholder.jpg', 4, 'Sapiente alias molestiae fugiat omnis veritatis ut. Atque sit odit et illo eaque dolorum aliquam. Quia ab rerum nesciunt non ratione est. Iste id eos facere maiores animi qui. Unde est perspiciatis esse eos eius atque nesciunt.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(89, 'Rerum quod est accusantium.', 'rerum-quod-est-accusantium', 836, NULL, 'placeholder.jpg', 5, 'Nobis eius architecto qui iusto sint perspiciatis velit. Dolores sit qui reprehenderit aut debitis eius hic. Ducimus vel fugit sunt. Quos rerum laudantium est aut eaque distinctio.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(90, 'Nulla est quo iste.', 'nulla-est-quo-iste', 587, NULL, 'placeholder.jpg', 6, 'Illo occaecati sed sed quod odit et. Asperiores et et iure autem. Eos fugiat sit quia aspernatur molestias sapiente. Illum delectus deserunt eos.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(91, 'Sit occaecati reprehenderit dolor.', 'sit-occaecati-reprehenderit-dolor', 270, NULL, 'placeholder.jpg', 3, 'Ut vel velit facilis in molestias perferendis. At quisquam ab et ut. Molestiae voluptas adipisci sit eum consectetur voluptatem dicta eius. Aut numquam aut nihil ea cum rem natus.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(92, 'Qui mollitia labore officiis nesciunt quia rerum molestias.', 'qui-mollitia-labore-officiis-nesciunt-quia-rerum-molestias', 734, NULL, 'placeholder.jpg', 8, 'Itaque ipsum adipisci modi possimus assumenda. Deleniti quisquam quia eos atque ex ut et. Ipsam id enim nostrum voluptas quia non totam. Veniam nihil ut eos aut aut quaerat.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(93, 'Est et magnam fugit deleniti totam omnis ea.', 'est-et-magnam-fugit-deleniti-totam-omnis-ea', 102, NULL, 'placeholder.jpg', 9, 'Reiciendis est iste doloribus et. Illum dolor illo non beatae. Sit deserunt et sed nihil quas.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(94, 'Aperiam doloribus iure incidunt exercitationem ex ut.', 'aperiam-doloribus-iure-incidunt-exercitationem-ex-ut', 521, NULL, 'placeholder.jpg', 9, 'Amet et non quos non. Magni illum ex a voluptatem voluptatem ut et quia. Enim sit quae tenetur veniam odit.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(95, 'Deserunt odit id saepe doloribus similique.', 'deserunt-odit-id-saepe-doloribus-similique', 114, NULL, 'placeholder.jpg', 4, 'Reiciendis et quidem voluptatem quia natus nesciunt ea aperiam. Quia recusandae autem inventore natus omnis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(96, 'Aut distinctio ut odit debitis.', 'aut-distinctio-ut-odit-debitis', 919, NULL, 'placeholder.jpg', 8, 'Qui est laudantium nulla. Et quasi sit repudiandae quibusdam perferendis itaque aspernatur. Id laudantium non dolore fugiat.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(97, 'Repudiandae quam vel possimus similique rerum dolor quo.', 'repudiandae-quam-vel-possimus-similique-rerum-dolor-quo', 793, NULL, 'placeholder.jpg', 2, 'Cum omnis ipsam debitis facere perferendis eaque temporibus quidem. Sint itaque quisquam velit. Aut porro omnis maxime pariatur perspiciatis dignissimos molestiae. Occaecati beatae facilis sapiente adipisci molestiae ab magnam temporibus.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(98, 'Temporibus repudiandae et illo illum.', 'temporibus-repudiandae-et-illo-illum', 137, NULL, 'placeholder.jpg', 7, 'Hic illum nostrum qui sunt eius qui. Perspiciatis assumenda quaerat enim quia aliquam neque.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(99, 'Debitis et debitis unde nihil a ea.', 'debitis-et-debitis-unde-nihil-a-ea', 723, NULL, 'placeholder.jpg', 0, 'Adipisci architecto vitae eveniet ipsa modi sint possimus ea. Amet perferendis numquam aperiam delectus quo architecto rerum cupiditate. Nobis eius saepe aspernatur et consequuntur. Commodi atque et quo et veritatis veritatis ea.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(100, 'Quaerat dolorem laborum corporis incidunt ut.', 'quaerat-dolorem-laborum-corporis-incidunt-ut', 814, NULL, 'placeholder.jpg', 9, 'Suscipit commodi iure consequatur voluptatum quia. Quo incidunt omnis dolorem rerum dignissimos. Consequatur voluptas necessitatibus ea magnam rerum consequatur. Voluptatem sed vero dolores qui. Iusto eos repellat et consequuntur.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(101, 'Velit fugit cum qui qui omnis ut.', 'velit-fugit-cum-qui-qui-omnis-ut', 133, NULL, 'placeholder.jpg', 9, 'Non fuga est debitis eos laudantium excepturi. Distinctio et quos ex quibusdam quis velit sit. Recusandae nostrum doloribus quam et. Dolore exercitationem ab voluptatibus mollitia aliquam fugiat voluptatibus reiciendis. Est voluptate fuga ea maxime labore consequatur fuga.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(102, 'Labore ut quasi animi officiis amet.', 'labore-ut-quasi-animi-officiis-amet', 200, NULL, 'placeholder.jpg', 3, 'Tempore quaerat id rerum tempore. Est vel fuga aut voluptates et unde. Assumenda porro aliquam odit saepe.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(103, 'Amet reprehenderit tempora consequatur eum.', 'amet-reprehenderit-tempora-consequatur-eum', 294, NULL, 'placeholder.jpg', 9, 'Ea impedit facilis et aliquam. Assumenda deserunt quasi debitis quasi. Iste qui sit explicabo. Rem ipsam similique minus tempora.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(104, 'Repellat nihil recusandae ut architecto.', 'repellat-nihil-recusandae-ut-architecto', 608, NULL, 'placeholder.jpg', 3, 'Omnis nihil consectetur labore labore. Alias dolores deleniti asperiores laboriosam voluptatibus. A ut corrupti animi. Amet dicta ex nostrum qui qui iusto mollitia dignissimos. Ratione aut velit ducimus assumenda.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(105, 'Quia voluptatibus et sit sint.', 'quia-voluptatibus-et-sit-sint', 792, NULL, 'placeholder.jpg', 0, 'Animi et eligendi voluptatem commodi. Sit saepe magnam quod dicta. Perferendis voluptatem autem corrupti soluta repellat.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(106, 'Rem explicabo odio odio nemo sit.', 'rem-explicabo-odio-odio-nemo-sit', 134, NULL, 'placeholder.jpg', 0, 'Molestias ut placeat quia. Alias eaque non sed animi. Et repellendus harum ab dignissimos ullam et reprehenderit.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(107, 'Autem eum labore rem laboriosam eos.', 'autem-eum-labore-rem-laboriosam-eos', 313, NULL, 'placeholder.jpg', 8, 'Et ut illo quos ab. Officia ex distinctio suscipit quas sunt voluptas. Omnis optio consequatur maiores porro amet et quo. Accusamus labore et ducimus ea. Dicta vero sapiente voluptatibus sit.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(108, 'Deserunt fugiat ea possimus sapiente sapiente blanditiis consequuntur.', 'deserunt-fugiat-ea-possimus-sapiente-sapiente-blanditiis-consequuntur', 361, NULL, 'placeholder.jpg', 7, 'Unde quis nesciunt inventore porro rerum dignissimos. Sit porro doloribus velit earum eligendi eum. Quis quis labore quas qui accusamus et nesciunt.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(109, 'Et optio dolorum et et.', 'et-optio-dolorum-et-et', 315, NULL, 'placeholder.jpg', 3, 'Occaecati aperiam voluptatum quo nesciunt dolore fugit et non. Voluptas quaerat repellendus in architecto. Voluptatem possimus voluptates exercitationem dolorum.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(110, 'Harum enim ut quis quasi facilis neque non.', 'harum-enim-ut-quis-quasi-facilis-neque-non', 811, NULL, 'placeholder.jpg', 1, 'Non et aliquid soluta. Qui aut repellendus et. Nesciunt veniam ullam atque natus ut culpa voluptatem.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(111, 'Velit et incidunt quia id libero vero.', 'velit-et-incidunt-quia-id-libero-vero', 984, NULL, 'placeholder.jpg', 2, 'At consequatur inventore possimus et voluptatum. Asperiores magnam sed aspernatur fuga omnis voluptas rerum optio. Incidunt repellat iste impedit incidunt aut omnis.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(112, 'Ad sequi quia deleniti autem aut.', 'ad-sequi-quia-deleniti-autem-aut', 233, NULL, 'placeholder.jpg', 1, 'Doloremque minima placeat rem explicabo. Deserunt omnis dolorem maxime.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(113, 'Eos itaque quidem sapiente aspernatur.', 'eos-itaque-quidem-sapiente-aspernatur', 116, NULL, 'placeholder.jpg', 4, 'Sed rerum voluptate eos reprehenderit maxime quibusdam quidem. Et consequatur rerum et.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(114, 'Nesciunt eum quam consequatur alias et.', 'nesciunt-eum-quam-consequatur-alias-et', 924, NULL, 'placeholder.jpg', 7, 'Illo et facilis sit nisi aut sed asperiores voluptas. Iusto ut autem perspiciatis exercitationem et in.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(115, 'Repellendus quasi aut quae beatae tempora et.', 'repellendus-quasi-aut-quae-beatae-tempora-et', 254, NULL, 'placeholder.jpg', 8, 'Et possimus beatae qui et rerum dolores. Qui iusto aut aut ullam soluta rerum. Magni quos reprehenderit maiores nisi. Fugit et facere ut nesciunt harum modi. Qui accusantium fuga animi quo.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(116, 'Optio vel voluptatibus eius ducimus unde minima.', 'optio-vel-voluptatibus-eius-ducimus-unde-minima', 168, NULL, 'placeholder.jpg', 5, 'Illo iusto neque veritatis consectetur aut aut assumenda pariatur. Repudiandae tempore quod aut enim aliquam. In quos suscipit doloremque cumque pariatur. Enim odit sed recusandae rerum ipsum.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(117, 'Nam natus beatae nihil et.', 'nam-natus-beatae-nihil-et', 618, NULL, 'placeholder.jpg', 0, 'Dignissimos exercitationem exercitationem quidem amet. Voluptatibus quia et voluptatem tenetur quia et molestias ab. Ut ea sit perspiciatis. Nesciunt omnis distinctio dolore sed sit consequatur.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(118, 'A assumenda id illum.', 'a-assumenda-id-illum', 421, NULL, 'placeholder.jpg', 0, 'Nostrum eum deserunt et ipsum neque ratione. Et neque libero omnis magnam. Excepturi consequatur atque repellat atque saepe aut. Culpa ex corrupti et dolor harum expedita ut reprehenderit.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(119, 'Eaque voluptas rerum similique sed.', 'eaque-voluptas-rerum-similique-sed', 546, NULL, 'placeholder.jpg', 9, 'Non est blanditiis consequatur qui odio ipsa aut. Ipsam cum ab nulla in. Ipsum aut voluptatum placeat totam. Nostrum et tempore laboriosam natus ut. Molestias nobis et voluptates adipisci quo.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(120, 'Rem eaque officiis fugit dolor ipsa vel perferendis.', 'rem-eaque-officiis-fugit-dolor-ipsa-vel-perferendis', 561, NULL, 'placeholder.jpg', 1, 'Consequatur voluptatem maiores esse. Ea ea sed earum laborum non ex. Optio tempore facilis nulla ut atque sit velit ipsum.', '2020-12-14 00:57:46', '2020-12-14 00:57:46'),
(121, 'Molestias culpa a commodi facere.', 'molestias-culpa-a-commodi-facere', 163, NULL, 'placeholder.jpg', 5, 'Quisquam voluptatem hic aut nisi reprehenderit quas deleniti. Nesciunt eveniet deleniti vitae assumenda earum sunt et. Quia incidunt eaque et molestias. Assumenda eum dolorum nisi in unde vero.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(122, 'Voluptate veniam aliquid quaerat hic.', 'voluptate-veniam-aliquid-quaerat-hic', 708, NULL, 'placeholder.jpg', 3, 'Eum nulla animi commodi et amet ut dolore. Sit voluptas aut illo consequatur animi et. Quae perferendis neque veniam enim facere tenetur quasi.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(123, 'Error numquam voluptatem voluptatibus aut velit unde.', 'error-numquam-voluptatem-voluptatibus-aut-velit-unde', 260, NULL, 'placeholder.jpg', 7, 'Ex quisquam saepe sed non sed quibusdam ipsum et. Ut placeat quod iusto quasi necessitatibus. Inventore quas quis reprehenderit voluptas enim. Laudantium dolorum temporibus nihil commodi similique ut.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(124, 'Impedit blanditiis necessitatibus qui nemo.', 'impedit-blanditiis-necessitatibus-qui-nemo', 622, NULL, 'placeholder.jpg', 1, 'Soluta quia sunt ex aut iure. Ea voluptatem omnis nostrum. Nesciunt enim ea et ut eaque qui magnam.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(125, 'Ipsam et eum iure fuga consequuntur amet molestiae.', 'ipsam-et-eum-iure-fuga-consequuntur-amet-molestiae', 949, NULL, 'placeholder.jpg', 7, 'Et incidunt error architecto mollitia aut aperiam iste. Iste et quos quia. Dolor est dolorem et officiis autem doloremque aperiam rerum.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(126, 'Aut repellat nostrum delectus molestiae et.', 'aut-repellat-nostrum-delectus-molestiae-et', 130, NULL, 'placeholder.jpg', 2, 'Modi consequatur quia beatae voluptates quibusdam. Numquam officiis aut tenetur dolorem aliquam nihil inventore. Facilis debitis error libero quos et.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(127, 'Quibusdam numquam dignissimos exercitationem enim et consequatur.', 'quibusdam-numquam-dignissimos-exercitationem-enim-et-consequatur', 645, NULL, 'placeholder.jpg', 4, 'Enim qui error aliquam. Doloremque et odio ipsa consequatur eum iste est aut. Veritatis facere nesciunt molestiae exercitationem aperiam quia.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(128, 'Alias asperiores omnis dolores et quibusdam.', 'alias-asperiores-omnis-dolores-et-quibusdam', 263, NULL, 'placeholder.jpg', 0, 'Natus in fuga molestias quod quod. Et id nihil possimus quia doloribus voluptatem. Provident numquam repudiandae repellat ut. Ipsum repudiandae commodi expedita veniam accusamus facilis.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(129, 'Repudiandae hic harum doloremque.', 'repudiandae-hic-harum-doloremque', 319, NULL, 'placeholder.jpg', 5, 'Ut vel laboriosam est beatae iure. Et at quidem aliquid quisquam nam. Quaerat quae deleniti pariatur omnis rem. Veniam quam et ut ex sint quos sint.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(130, 'Libero atque repellat praesentium eum expedita libero molestiae.', 'libero-atque-repellat-praesentium-eum-expedita-libero-molestiae', 761, NULL, 'placeholder.jpg', 3, 'Sint laborum expedita ipsum quisquam corrupti sit consequatur voluptas. Veritatis qui quae distinctio cum veniam. Exercitationem qui delectus est aliquam impedit vero.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(131, 'Et modi officia reprehenderit quis fuga.', 'et-modi-officia-reprehenderit-quis-fuga', 524, NULL, 'placeholder.jpg', 9, 'Provident aliquid pariatur aut delectus praesentium. Qui placeat distinctio fugit ut. Accusamus et aut aperiam maiores est. Vel doloribus autem sit dolore cum ipsa ipsam.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(132, 'Enim similique impedit aut.', 'enim-similique-impedit-aut', 309, NULL, 'placeholder.jpg', 1, 'Nobis soluta tempora natus. Consequatur consequatur eos quia dolores. Quibusdam molestiae consequatur et est laboriosam. Non saepe suscipit nostrum hic enim quisquam repellat.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(133, 'Atque et voluptas occaecati.', 'atque-et-voluptas-occaecati', 591, NULL, 'placeholder.jpg', 9, 'Itaque nesciunt dolore minima dolores possimus debitis atque. Voluptatum non et exercitationem modi animi voluptas. Similique et velit ipsam nobis.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(134, 'Reprehenderit ut esse ratione veniam qui pariatur illum.', 'reprehenderit-ut-esse-ratione-veniam-qui-pariatur-illum', 350, NULL, 'placeholder.jpg', 7, 'Velit cupiditate dolor et et maiores. Veritatis repudiandae vero maxime quos. Labore qui itaque totam illum quia magnam nobis. Cupiditate velit suscipit est aut quasi sed laudantium.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(135, 'Natus expedita quaerat expedita aut reiciendis velit assumenda voluptatum.', 'natus-expedita-quaerat-expedita-aut-reiciendis-velit-assumenda-voluptatum', 396, NULL, 'placeholder.jpg', 9, 'Vitae nostrum molestiae asperiores dolor illum sunt. Sunt eos minus voluptatibus ad. Velit nihil sed totam reiciendis. Neque fugit vero totam nesciunt et.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(136, 'Eligendi quia illum corrupti et.', 'eligendi-quia-illum-corrupti-et', 107, NULL, 'placeholder.jpg', 8, 'Expedita tempore architecto quia labore. Aut sed quas nostrum vitae occaecati. Eius ipsa sed doloribus veritatis. Saepe omnis facilis dolorum dolorem. Voluptatibus id tempora sed vel nulla.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(137, 'Aliquam quia labore magni incidunt.', 'aliquam-quia-labore-magni-incidunt', 965, NULL, 'placeholder.jpg', 5, 'Quidem enim non voluptatum numquam ea voluptas. Molestiae quia neque ut quam quia ex. Occaecati praesentium at dolore quis est consequatur ipsum. Modi exercitationem magni consequatur nihil. Ea in provident beatae enim rerum et.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(138, 'Quibusdam est facere voluptatem.', 'quibusdam-est-facere-voluptatem', 874, NULL, 'placeholder.jpg', 6, 'Eos totam sunt voluptas. Quisquam veniam tenetur doloribus tempora ea. Aperiam qui fuga consequatur omnis ut.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(139, 'Ullam exercitationem et totam.', 'ullam-exercitationem-et-totam', 674, NULL, 'placeholder.jpg', 0, 'Velit est assumenda voluptate aut. Et neque quo consequatur modi. Expedita mollitia et similique optio explicabo dolor.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(140, 'Occaecati qui enim tempora.', 'occaecati-qui-enim-tempora', 495, NULL, 'placeholder.jpg', 1, 'Voluptates qui occaecati ut voluptatem autem ipsum. Fuga molestiae aut excepturi non iste. Et doloribus quia et et odit commodi. Beatae voluptate debitis voluptas est debitis quo.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(141, 'Neque saepe veniam neque molestias rerum.', 'neque-saepe-veniam-neque-molestias-rerum', 556, NULL, 'placeholder.jpg', 7, 'Praesentium aut maxime facilis libero aut. Laudantium dolore doloribus error perspiciatis commodi earum est facere. Quia ea veniam praesentium odio minus.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(142, 'Nisi ut itaque earum ut.', 'nisi-ut-itaque-earum-ut', 159, NULL, 'placeholder.jpg', 2, 'Nisi eos accusamus quia quia sint. Aliquam recusandae aut repudiandae natus. Praesentium facilis odio et. Officia commodi consequuntur explicabo corporis voluptatibus ex voluptatem.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(143, 'Quia omnis dolorem atque autem neque repellendus.', 'quia-omnis-dolorem-atque-autem-neque-repellendus', 194, NULL, 'placeholder.jpg', 2, 'Aut et ab minus temporibus sunt reprehenderit. Ad adipisci ex saepe illum. Autem placeat molestiae aperiam cupiditate repellendus et.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(144, 'Sunt vitae rem maxime tempore voluptatum cum.', 'sunt-vitae-rem-maxime-tempore-voluptatum-cum', 665, NULL, 'placeholder.jpg', 6, 'Id ut dolorum enim quia non libero. Beatae accusamus dolorem omnis quia inventore quo qui. Quasi blanditiis consequatur aut dolores.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(145, 'Quia unde eaque dicta et dignissimos dolore corrupti.', 'quia-unde-eaque-dicta-et-dignissimos-dolore-corrupti', 711, NULL, 'placeholder.jpg', 9, 'Rem laboriosam itaque dolorem facilis similique fugit eaque perferendis. Autem ipsam qui debitis inventore velit eos tempore. Atque ut doloremque dignissimos autem.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(146, 'Recusandae ducimus voluptatem deleniti assumenda nemo ut neque non.', 'recusandae-ducimus-voluptatem-deleniti-assumenda-nemo-ut-neque-non', 221, NULL, 'placeholder.jpg', 7, 'Eos a aut ipsum debitis ipsum quia animi. Placeat quibusdam illum mollitia doloremque necessitatibus. Omnis voluptatibus esse voluptatem alias ipsum voluptatibus. Totam voluptatem perspiciatis voluptas rerum.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(147, 'Cumque sit error repellat culpa facilis fugiat.', 'cumque-sit-error-repellat-culpa-facilis-fugiat', 964, NULL, 'placeholder.jpg', 1, 'Velit repellat asperiores distinctio qui. Sed dolorem velit quaerat corrupti et tempore. Doloribus praesentium quibusdam rerum nulla.', '2020-12-14 00:57:47', '2020-12-14 00:57:47');
INSERT INTO `products` (`id`, `name`, `slug`, `price`, `sale_price`, `featured_image`, `stock`, `description`, `created_at`, `updated_at`) VALUES
(148, 'Vel voluptatum molestiae quas omnis aperiam nemo.', 'vel-voluptatum-molestiae-quas-omnis-aperiam-nemo', 389, NULL, 'placeholder.jpg', 5, 'Eveniet ipsam similique ullam corporis voluptas. Sit enim perspiciatis aut culpa ullam sint. Exercitationem voluptatum odit dignissimos et veniam veritatis. Temporibus dicta explicabo non laborum.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(149, 'Inventore incidunt fugiat temporibus culpa modi alias sequi.', 'inventore-incidunt-fugiat-temporibus-culpa-modi-alias-sequi', 177, NULL, 'placeholder.jpg', 8, 'Rem voluptatem et libero quasi molestias libero quod. Consequatur ratione a quibusdam id tempora. In molestias laudantium veniam omnis.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(150, 'Quasi neque itaque earum officiis.', 'quasi-neque-itaque-earum-officiis', 525, NULL, 'placeholder.jpg', 8, 'Aut in illum aspernatur aliquam voluptatum quo in. Aut eaque voluptatem eos ad quisquam dignissimos. Culpa sequi aliquid repudiandae est vero aut.', '2020-12-14 00:57:47', '2020-12-14 00:57:47'),
(151, 'Error eius libero est id.', 'error-eius-libero-est-id', 339, NULL, 'placeholder.jpg', 3, 'Fugit unde ut et illo commodi. Beatae tempora delectus harum illum id. Vitae in ullam pariatur quod itaque adipisci. Aliquid facilis quia eum illum explicabo animi. Et tenetur omnis praesentium sed.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(152, 'Soluta molestias sint sequi est dolorum qui enim et.', 'soluta-molestias-sint-sequi-est-dolorum-qui-enim-et', 217, NULL, 'placeholder.jpg', 5, '<p>In neque voluptatem harum et nesciunt. Iure iste et laboriosam delectus quia. Non quia quaerat soluta incidunt similique est consequuntur.</p>', '2020-12-14 01:00:20', '2021-02-22 05:13:32'),
(153, 'Ut sed nobis atque aliquid aut minima.', 'ut-sed-nobis-atque-aliquid-aut-minima', 604, NULL, 'placeholder.jpg', 1, 'Dolore vel esse impedit earum earum. Eveniet enim dolores et quo. Quis et ea soluta dolor.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(154, 'Et sit dolore itaque repudiandae.', 'et-sit-dolore-itaque-repudiandae', 792, NULL, 'placeholder.jpg', 3, 'Est velit eum nisi repellendus aperiam quam. Sequi quos officiis voluptatem rerum officia tenetur dignissimos laborum. Eius totam repellat officiis omnis explicabo placeat nostrum. Non pariatur recusandae voluptatum quam repellat incidunt fuga.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(155, 'Quam voluptatem itaque facilis ratione placeat dolores labore.', 'quam-voluptatem-itaque-facilis-ratione-placeat-dolores-labore', 715, NULL, 'placeholder.jpg', 6, 'Fuga enim et ut ut voluptatibus quas quia. Tenetur mollitia voluptas veritatis nemo.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(156, 'In molestias sed nisi eos.', 'in-molestias-sed-nisi-eos', 949, NULL, 'placeholder.jpg', 4, 'Voluptas et velit corrupti. Vel vel et repellat accusantium. Incidunt facilis illum ad quaerat. Suscipit voluptatibus a quia laborum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(157, 'Adipisci quos cupiditate molestiae commodi laudantium soluta.', 'adipisci-quos-cupiditate-molestiae-commodi-laudantium-soluta', 478, NULL, 'placeholder.jpg', 0, 'Perspiciatis omnis ipsam dolores veniam aliquam cum. Occaecati ipsam corporis voluptatum repellendus et voluptate ut nobis. Dolores aut reiciendis repudiandae laborum ducimus est.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(158, 'Iusto aut et et veniam.', 'iusto-aut-et-et-veniam', 720, NULL, 'placeholder.jpg', 9, 'Reiciendis optio quia doloribus. Sunt necessitatibus eaque facilis porro veniam ut culpa. Natus libero aut ducimus cum est doloribus.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(159, 'Aliquid nostrum dolor enim sed rerum.', 'aliquid-nostrum-dolor-enim-sed-rerum', 142, NULL, 'placeholder.jpg', 6, 'Fugit tempore delectus alias. Non iusto harum quo enim alias quia voluptatem modi. Consequatur minima ut ut veritatis quas.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(160, 'Qui autem eos aut accusamus et.', 'qui-autem-eos-aut-accusamus-et', 563, NULL, 'placeholder.jpg', 3, 'Et quasi sapiente repellat perspiciatis consequatur aliquid. Sit nobis eligendi ipsa. Fuga debitis delectus sit fuga vero dolores. Officia at et ut voluptas non.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(161, 'Dolorem ullam quae et.', 'dolorem-ullam-quae-et', 959, NULL, 'placeholder.jpg', 6, 'Quasi expedita optio perspiciatis vel placeat provident incidunt. Expedita quam quos deleniti labore qui aspernatur quo ab. Sed nobis omnis omnis dolor. Autem et quia debitis. Aut magni magnam aut ad error labore sunt molestiae.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(162, 'Assumenda cumque reprehenderit reiciendis error officiis.', 'assumenda-cumque-reprehenderit-reiciendis-error-officiis', 920, NULL, 'placeholder.jpg', 9, 'Ut aut sunt quam quo. Quae temporibus temporibus ducimus voluptate corrupti nihil. Qui iste enim quos libero rerum consequatur nisi.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(163, 'Nam architecto quod sit impedit ratione aperiam a.', 'nam-architecto-quod-sit-impedit-ratione-aperiam-a', 363, NULL, 'placeholder.jpg', 5, '<p>Eius vel nihil asperiores id facilis fugiat alias. Officiis debitis aut voluptate. Amet beatae ipsa enim corporis.</p>', '2020-12-14 01:00:20', '2021-02-22 05:13:46'),
(164, 'Eos quam aliquid quaerat quod minima.', 'eos-quam-aliquid-quaerat-quod-minima', 367, NULL, 'placeholder.jpg', 0, 'At magni adipisci alias. Atque et blanditiis delectus rerum excepturi vel et. Magni repudiandae quis consequatur nulla voluptates.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(165, 'Vitae dolorum vero distinctio facere totam illum qui.', 'vitae-dolorum-vero-distinctio-facere-totam-illum-qui', 604, NULL, 'placeholder.jpg', 5, 'Veniam omnis quia nobis cum molestias. Aut ad nemo eos qui. Totam aliquam dolor fugiat repellendus.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(166, 'Eos consectetur voluptas tenetur quisquam et.', 'eos-consectetur-voluptas-tenetur-quisquam-et', 240, NULL, 'placeholder.jpg', 2, 'Voluptates aut laboriosam sed ipsam fugit non. Nobis fuga quo ut dolor. Dolorum vitae ut doloremque quidem minima et. Sunt rerum sint quo rerum aspernatur.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(167, 'Aut ad libero aspernatur pariatur quam eos.', 'aut-ad-libero-aspernatur-pariatur-quam-eos', 921, NULL, 'placeholder.jpg', 4, 'Iure soluta ratione voluptas ex expedita. Facilis tempore sit facilis quo et sed nemo quis. Eaque voluptates velit et eius asperiores id cupiditate quia. At nihil similique molestias exercitationem incidunt cum veritatis.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(168, 'Repellat repudiandae corporis molestiae tenetur in.', 'repellat-repudiandae-corporis-molestiae-tenetur-in', 522, NULL, 'placeholder.jpg', 9, 'Consequuntur voluptatem sed quidem. Deserunt et molestiae quam animi esse facere veritatis. Quod at cumque voluptate velit eos amet consequatur. Quia sed nemo omnis officiis at. Nobis corporis aut quam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(169, 'Amet aliquid aliquid occaecati illo.', 'amet-aliquid-aliquid-occaecati-illo', 300, NULL, 'placeholder.jpg', 6, 'Distinctio est eligendi consequatur voluptatem illo sapiente. Odit magnam tempora consequatur voluptas explicabo. Deserunt et dolor dolor itaque. Voluptatem repellendus accusantium voluptas cum fuga rerum vel. Repellendus dicta perferendis distinctio est inventore.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(170, 'Explicabo exercitationem architecto ea minima optio fuga est consequatur.', 'explicabo-exercitationem-architecto-ea-minima-optio-fuga-est-consequatur', 996, NULL, 'placeholder.jpg', 9, 'Cumque similique corrupti non in suscipit ratione. Corrupti nesciunt odit temporibus distinctio. Vel natus cum eveniet quis.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(171, 'Ad eligendi minima qui quia porro quos at quis.', 'ad-eligendi-minima-qui-quia-porro-quos-at-quis', 670, NULL, 'placeholder.jpg', 5, 'Omnis aut et eaque animi nesciunt. Et molestias dolores est corporis delectus est enim quo. Tempora modi et quae atque dicta.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(172, 'Quia aperiam impedit impedit.', 'quia-aperiam-impedit-impedit', 591, NULL, 'placeholder.jpg', 2, 'Qui voluptatibus explicabo eum. Amet quia ad ullam quidem fugit.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(173, 'Aut sint nobis libero voluptas unde molestiae dicta.', 'aut-sint-nobis-libero-voluptas-unde-molestiae-dicta', 657, NULL, 'placeholder.jpg', 4, 'Explicabo veritatis atque aut minima aperiam commodi minus aut. Fuga est omnis magnam esse veritatis et dicta.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(174, 'Et sed aut aut illum vero est quia.', 'et-sed-aut-aut-illum-vero-est-quia', 359, NULL, 'placeholder.jpg', 4, 'Cumque aut aliquam ullam. Voluptatem doloremque porro commodi cumque non debitis. Eum vero veritatis et sint ducimus laborum. Facilis qui consequuntur est rerum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(175, 'Velit est iure impedit non voluptatum.', 'velit-est-iure-impedit-non-voluptatum', 207, NULL, 'placeholder.jpg', 6, 'Sit quasi vero et voluptatem excepturi minus nulla est. Aperiam maiores cupiditate quod ipsum rerum. Repudiandae sunt ratione ad similique quia delectus.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(176, 'Totam at dolore dignissimos at.', 'totam-at-dolore-dignissimos-at', 564, NULL, 'placeholder.jpg', 9, 'Incidunt quo ipsam eaque et laborum est. Molestiae eius consequatur dolores esse rerum illum. Sit nostrum saepe beatae sint et repudiandae et dolor.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(177, 'Soluta est voluptas fugit ut voluptas voluptatem.', 'soluta-est-voluptas-fugit-ut-voluptas-voluptatem', 728, NULL, 'placeholder.jpg', 0, 'Quos magni quod dicta sunt impedit. Soluta dicta reiciendis voluptas fugit laborum. Quos aspernatur voluptatibus non optio quo voluptatem ad. Dolorum doloremque sint soluta tenetur. Qui omnis iusto atque laborum blanditiis numquam rem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(178, 'Qui quaerat et nemo magni consequatur voluptatibus iusto.', 'qui-quaerat-et-nemo-magni-consequatur-voluptatibus-iusto', 107, NULL, 'placeholder.jpg', 7, 'Voluptatibus maxime rerum sunt accusamus quae eaque qui ut. Aut quisquam maiores et quasi. Voluptates quo pariatur optio ea.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(179, 'Dolorem quis sit repudiandae repudiandae dolores odit velit.', 'dolorem-quis-sit-repudiandae-repudiandae-dolores-odit-velit', 812, NULL, 'placeholder.jpg', 6, 'Voluptatibus officia et et saepe sequi. Unde ad eligendi aut laudantium optio. Quis numquam tempore consequatur sint sit animi.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(180, 'Repellendus optio id qui ab numquam.', 'repellendus-optio-id-qui-ab-numquam', 252, NULL, 'placeholder.jpg', 8, 'Quo aut commodi natus autem at voluptatibus laboriosam. Labore quisquam quia quis quia. Dolor porro id et consectetur debitis eum vel. Deserunt aliquid qui dicta et provident.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(181, 'Quam sint voluptates qui inventore.', 'quam-sint-voluptates-qui-inventore', 292, NULL, 'placeholder.jpg', 1, 'Et vel sunt labore optio. Et cumque iure reprehenderit aut qui nihil atque enim.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(182, 'Repudiandae accusamus saepe nobis.', 'repudiandae-accusamus-saepe-nobis', 493, NULL, 'placeholder.jpg', 8, 'Ut corporis totam magni laboriosam. A architecto iste magni magni. Repellat repellendus autem non earum reiciendis esse.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(183, 'Enim quasi qui harum necessitatibus recusandae sed.', 'enim-quasi-qui-harum-necessitatibus-recusandae-sed', 323, NULL, 'placeholder.jpg', 6, 'Corrupti ut rerum laborum rem nam qui. Quia est distinctio doloremque facere sint consequatur at. Alias repellat deserunt animi quia rerum et. Et dolores quia repellat reprehenderit.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(184, 'Aut corrupti quaerat harum sed beatae.', 'aut-corrupti-quaerat-harum-sed-beatae', 960, NULL, 'placeholder.jpg', 6, 'Illum in neque voluptas similique. Expedita consequatur consequatur consectetur. Quaerat dolores vitae corrupti quis aliquid unde id.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(185, 'Omnis ullam nobis numquam sint.', 'omnis-ullam-nobis-numquam-sint', 897, NULL, 'placeholder.jpg', 5, 'Debitis ipsa consequatur vel. Architecto voluptatibus ipsa repellendus et mollitia officia eos ipsa. Aperiam ut molestiae eos adipisci amet eveniet quisquam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(186, 'Voluptatum libero dicta placeat fugit magni numquam unde aliquam.', 'voluptatum-libero-dicta-placeat-fugit-magni-numquam-unde-aliquam', 675, NULL, 'placeholder.jpg', 1, 'In rerum laborum quasi. Maiores omnis ducimus officia voluptas sed expedita. Corrupti aspernatur sint odio modi. Et quod eos ut.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(187, 'Aliquid ea recusandae qui repudiandae quia suscipit.', 'aliquid-ea-recusandae-qui-repudiandae-quia-suscipit', 937, NULL, 'placeholder.jpg', 4, 'Assumenda cupiditate sint reiciendis magni sequi. Nihil praesentium quis architecto doloremque iste quam libero. Earum qui et a dolores nihil.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(188, 'Ut nemo non sit commodi in cumque expedita.', 'ut-nemo-non-sit-commodi-in-cumque-expedita', 412, NULL, 'placeholder.jpg', 1, 'Placeat ratione et odit sunt reprehenderit. Laborum ut aut nemo eligendi vitae. Aut accusantium atque aut earum ut quisquam. Facilis odio quasi cum neque ab et.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(189, 'Vero voluptate iusto eveniet est doloribus.', 'vero-voluptate-iusto-eveniet-est-doloribus', 175, NULL, 'placeholder.jpg', 5, 'Ea sit in et placeat ut blanditiis. Quia expedita aut qui quae et. Voluptas consectetur dignissimos sed impedit tenetur distinctio recusandae. Hic sed minus voluptatem et. Excepturi vero tempore quos architecto pariatur mollitia.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(190, 'At voluptatem fugiat amet optio et voluptatum repellat.', 'at-voluptatem-fugiat-amet-optio-et-voluptatum-repellat', 408, NULL, 'placeholder.jpg', 5, 'Et pariatur est et itaque perferendis magnam nihil. Consequatur sunt nobis tempora dolor ab aperiam. Sed veniam facere eaque id quia.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(191, 'Velit ab quia consequatur fugiat.', 'velit-ab-quia-consequatur-fugiat', 867, NULL, 'placeholder.jpg', 6, 'Saepe amet animi et repellendus est. Molestias tempora dolores eum vel. Omnis dolorem esse repellendus perferendis enim eum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(192, 'Consequatur est libero ut sed.', 'consequatur-est-libero-ut-sed', 287, NULL, 'placeholder.jpg', 2, 'Consequuntur unde itaque qui quas. Voluptates omnis distinctio neque. Asperiores sit voluptatum placeat nihil error provident et. Odio pariatur est eaque voluptatem. Est hic reprehenderit occaecati.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(193, 'Quia ex est sit recusandae exercitationem maiores.', 'quia-ex-est-sit-recusandae-exercitationem-maiores', 972, NULL, 'placeholder.jpg', 1, 'Fugiat culpa aut voluptatum recusandae autem et. Delectus nobis odit animi similique rerum aut doloribus. Nihil corrupti ad nostrum autem et accusamus.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(194, 'Voluptatem sapiente tenetur vel est sequi sed magnam.', 'voluptatem-sapiente-tenetur-vel-est-sequi-sed-magnam', 169, NULL, 'placeholder.jpg', 9, 'Et minima dolore et maxime. Minima asperiores ratione qui voluptate accusamus. Labore repellendus laborum dolor voluptatem id omnis qui. Nobis sint aut nemo vel iure.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(195, 'Saepe rem occaecati enim nulla et consequatur tenetur.', 'saepe-rem-occaecati-enim-nulla-et-consequatur-tenetur', 214, NULL, 'placeholder.jpg', 9, 'Adipisci modi numquam sint voluptate cumque quasi et dignissimos. Ipsam odit est voluptas. Similique enim ipsa ea laudantium id quis. Vel sint in molestiae earum soluta a officia molestiae.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(196, 'Eius quasi ducimus ut est enim dolores.', 'eius-quasi-ducimus-ut-est-enim-dolores', 430, NULL, 'placeholder.jpg', 5, 'Distinctio dolor placeat molestiae eaque aut inventore. Nesciunt laudantium minus sit quia omnis molestiae.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(197, 'Et voluptatibus modi omnis quae laboriosam dolorem.', 'et-voluptatibus-modi-omnis-quae-laboriosam-dolorem', 639, NULL, 'placeholder.jpg', 5, 'Reprehenderit nobis voluptas natus voluptas. Explicabo eligendi dignissimos fugit alias laborum aut voluptatem. Voluptas delectus eveniet sit aspernatur et magnam delectus. Culpa qui quae porro eos quae optio nesciunt.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(198, 'Sit nemo placeat et dolor repellendus magni similique.', 'sit-nemo-placeat-et-dolor-repellendus-magni-similique', 411, NULL, 'placeholder.jpg', 8, 'Quia asperiores est impedit sunt eaque perspiciatis dignissimos aspernatur. Natus assumenda aliquam voluptatum quis dolores accusamus enim. Dignissimos ad necessitatibus quis est dicta quibusdam perspiciatis. Nulla ut aut velit iusto incidunt dolorum reiciendis. Mollitia necessitatibus alias consequatur facilis nostrum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(199, 'Quia quisquam voluptatem perferendis molestias eligendi est.', 'quia-quisquam-voluptatem-perferendis-molestias-eligendi-est', 557, NULL, 'placeholder.jpg', 3, 'Tempore dolores veritatis similique dolor. Praesentium velit quis ut molestiae. Sapiente nesciunt dolores est sit id tempore. Est velit neque aliquid dolore et cupiditate ducimus.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(200, 'Earum inventore magnam dolor.', 'earum-inventore-magnam-dolor', 524, NULL, 'placeholder.jpg', 3, 'Consequatur et velit est velit iste vel dolores. Perspiciatis numquam autem tenetur magni rem. Aut corporis dolores cupiditate voluptatibus nisi ea quidem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(201, 'Ut ex rerum beatae illo suscipit sunt praesentium dignissimos.', 'ut-ex-rerum-beatae-illo-suscipit-sunt-praesentium-dignissimos', 393, NULL, 'placeholder.jpg', 4, 'Quia consequuntur est blanditiis sed maxime enim ut consequatur. Quia eum et autem sit voluptas saepe id. Unde dolor esse est qui.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(202, 'Odio beatae optio neque numquam ut ab voluptatem.', 'odio-beatae-optio-neque-numquam-ut-ab-voluptatem', 692, NULL, 'placeholder.jpg', 2, 'Neque similique voluptas nisi eum sed. Ut ut quod quam inventore. Ea et aut iure repudiandae sunt ut reiciendis. Autem voluptas soluta unde et autem libero nobis. Sed voluptas unde omnis non recusandae dolorum sed id.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(203, 'Porro ea ex quia eos aut sit.', 'porro-ea-ex-quia-eos-aut-sit', 381, NULL, 'placeholder.jpg', 3, 'Magnam doloribus repudiandae ipsam sint quia nostrum. Consequatur autem ipsum perspiciatis nisi. Quam odio itaque at cum ea quas explicabo.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(204, 'Quaerat est sint id itaque assumenda iusto.', 'quaerat-est-sint-id-itaque-assumenda-iusto', 398, NULL, 'placeholder.jpg', 7, 'Sit repellendus numquam molestiae alias. Molestiae aperiam occaecati pariatur nemo. Amet eligendi saepe aut consequatur consequatur omnis ut porro.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(205, 'Ut debitis quia et dolorem doloremque.', 'ut-debitis-quia-et-dolorem-doloremque', 228, NULL, 'placeholder.jpg', 0, 'Molestiae mollitia tempore odit qui amet sed quam. Fugit est consequatur sed esse error est ea. Exercitationem dolor harum eius iste distinctio exercitationem quaerat et.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(206, 'Magnam sed id quia vel aut temporibus voluptatem eos.', 'magnam-sed-id-quia-vel-aut-temporibus-voluptatem-eos', 157, NULL, 'placeholder.jpg', 6, 'Tempore ut quis non magni vel. Rerum sunt magni aut provident ut soluta. Et earum dolor reprehenderit eos. Eligendi quisquam molestias voluptatem et at vel voluptatem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(207, 'Corporis soluta eos reprehenderit ea.', 'corporis-soluta-eos-reprehenderit-ea', 953, NULL, 'placeholder.jpg', 3, 'Aperiam at veniam at veniam ex. Mollitia sapiente rerum perspiciatis nihil.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(208, 'Ratione dolor iusto aut quia officia suscipit omnis blanditiis.', 'ratione-dolor-iusto-aut-quia-officia-suscipit-omnis-blanditiis', 887, NULL, 'placeholder.jpg', 7, 'Officiis repellat occaecati nisi voluptas quae nihil qui. Velit id id blanditiis est amet. Reiciendis pariatur quidem dolorem ut ut.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(209, 'Corrupti rerum doloremque voluptatem velit sint.', 'corrupti-rerum-doloremque-voluptatem-velit-sint', 856, NULL, 'placeholder.jpg', 8, 'Et ut libero nisi non mollitia dolorem exercitationem. Natus unde dolorem eos debitis asperiores. In assumenda sint perspiciatis doloribus. Reiciendis facere deleniti nobis ea odio harum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(210, 'Accusantium deserunt sint quo qui architecto aut enim.', 'accusantium-deserunt-sint-quo-qui-architecto-aut-enim', 342, NULL, 'placeholder.jpg', 9, 'In non ut quo non eveniet ipsam. Consequatur aut deleniti maiores vel et omnis ratione molestiae. Iure ratione sequi commodi dignissimos qui fugit eius. Quia facere vel ipsum non quae.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(211, 'Cumque placeat ut et.', 'cumque-placeat-ut-et', 614, NULL, 'placeholder.jpg', 9, 'Consequuntur ab nemo cumque. Et et voluptates et distinctio aut et rerum nobis. Incidunt consequatur magni ipsam sunt at nisi. Quisquam ut officiis possimus dolores voluptatem. Modi modi occaecati omnis molestiae nulla deserunt odit voluptatem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(212, 'Eaque sunt et voluptatem aperiam facilis.', 'eaque-sunt-et-voluptatem-aperiam-facilis', 533, NULL, 'placeholder.jpg', 7, 'Dolore labore a beatae. Vel distinctio saepe sed aspernatur. Enim iure reiciendis ut ullam. Vero dignissimos reprehenderit enim alias illum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(213, 'Sunt error saepe placeat.', 'sunt-error-saepe-placeat', 746, NULL, 'placeholder.jpg', 4, 'Perferendis est totam excepturi ullam. Dolorum ullam quae aperiam illo. Nostrum consequatur et nam iste culpa nemo neque. Odio omnis quisquam explicabo temporibus explicabo sunt.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(214, 'Quasi quaerat iure cupiditate consequuntur asperiores.', 'quasi-quaerat-iure-cupiditate-consequuntur-asperiores', 807, NULL, 'placeholder.jpg', 1, 'Sit qui corrupti modi et quis ratione. Omnis doloremque esse placeat nobis qui eius qui. Ipsa omnis enim similique minus voluptate et. Placeat cumque provident aut.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(215, 'Illum animi deserunt est eligendi.', 'illum-animi-deserunt-est-eligendi', 700, NULL, 'placeholder.jpg', 4, 'Ut repellat repellendus in dolor impedit dicta omnis. Enim accusantium suscipit error reprehenderit provident. Totam consequatur incidunt porro cupiditate quidem provident.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(216, 'Id in corrupti cumque quis aut.', 'id-in-corrupti-cumque-quis-aut', 834, NULL, 'placeholder.jpg', 1, 'Quidem dicta dolorum ut enim corrupti iure cupiditate. Quis est eligendi dolorum tempore. Rerum deleniti incidunt sed voluptas. Architecto eos minus alias quia consequatur et.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(217, 'Nihil aut iusto ut nesciunt at.', 'nihil-aut-iusto-ut-nesciunt-at', 981, NULL, 'placeholder.jpg', 0, 'Aliquam impedit fugiat voluptatem repellendus et molestias saepe. Rerum suscipit quia et. Nemo adipisci inventore sint maiores quae est doloribus. Aut deserunt quia excepturi inventore et.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(218, 'Consequuntur voluptatem vitae magni qui reiciendis iste.', 'consequuntur-voluptatem-vitae-magni-qui-reiciendis-iste', 327, NULL, 'placeholder.jpg', 7, 'Nisi aliquam voluptatum sed. Odit quidem praesentium eos recusandae facere a aliquam. Et quae ea doloribus fugiat ut occaecati rem officiis.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(219, 'Et dolorem ea officia quo dolore.', 'et-dolorem-ea-officia-quo-dolore', 259, NULL, 'placeholder.jpg', 4, 'Officiis nemo quis rerum non. Dolor est porro nemo qui. Dignissimos tempora beatae magnam reiciendis neque dolore. Excepturi animi ex consequatur maiores. Alias et alias sit minus repellat.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(220, 'Occaecati magnam quas cum fugiat excepturi.', 'occaecati-magnam-quas-cum-fugiat-excepturi', 399, NULL, 'placeholder.jpg', 6, 'Qui harum magnam consequatur quia rem inventore vel. Aliquam quia sint ut ex maxime perspiciatis sit. Dignissimos nihil dolorum in quisquam natus aut et. Iusto vel laudantium cumque assumenda sit nesciunt voluptatem. Non placeat atque corporis quia vel.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(221, 'Voluptatum id velit minus voluptate iusto est laboriosam maiores.', 'voluptatum-id-velit-minus-voluptate-iusto-est-laboriosam-maiores', 897, NULL, 'placeholder.jpg', 8, 'Impedit voluptas ea laborum et. Qui iste eligendi et voluptatem deserunt corporis. Rerum dicta iusto est reiciendis nihil consequatur eveniet. Possimus esse esse amet qui et minima ut.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(222, 'Quis eum eaque quaerat.', 'quis-eum-eaque-quaerat', 463, NULL, 'placeholder.jpg', 2, 'Voluptas blanditiis harum aut et. Odio repellendus eligendi et. Numquam necessitatibus quas minus dolores numquam veritatis dolor dolorum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(223, 'Minus sed laudantium mollitia et saepe.', 'minus-sed-laudantium-mollitia-et-saepe', 465, NULL, 'placeholder.jpg', 6, 'Nihil libero qui facilis quis. Odio veniam eos distinctio sed et consectetur. Ratione minima explicabo perspiciatis beatae voluptates qui. Dolore sequi esse et itaque nihil iste rem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(224, 'In accusantium aut iure.', 'in-accusantium-aut-iure', 399, NULL, 'placeholder.jpg', 4, 'Omnis dolor ut recusandae saepe ratione. Rerum repellendus excepturi distinctio laboriosam soluta adipisci quidem. Velit pariatur qui neque quod. Quo eum earum alias adipisci voluptas excepturi.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(225, 'Et velit voluptas nihil ipsam.', 'et-velit-voluptas-nihil-ipsam', 424, NULL, 'placeholder.jpg', 7, 'Accusamus ut ea enim ullam sapiente quisquam omnis. Consequatur voluptate ad deserunt non quaerat nemo consequatur. Repellendus facilis ducimus aut voluptatem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(226, 'Dolore vel qui aspernatur.', 'dolore-vel-qui-aspernatur', 287, NULL, 'placeholder.jpg', 6, 'Nobis dolor sunt dolorem minus. Totam tenetur aliquid est quia.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(227, 'Dolorem velit a necessitatibus in autem quia ea voluptas.', 'dolorem-velit-a-necessitatibus-in-autem-quia-ea-voluptas', 730, NULL, 'placeholder.jpg', 6, 'Est hic et praesentium ea facilis. Nemo et magnam vel dolore occaecati qui amet. Quia nisi et quia nisi hic voluptatum. Aut delectus labore enim illum magnam cupiditate commodi.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(228, 'Inventore laudantium nam aut molestias nesciunt.', 'inventore-laudantium-nam-aut-molestias-nesciunt', 836, NULL, 'placeholder.jpg', 4, 'Ipsum quos dolorem quia sunt est. Sequi quia voluptatem ut mollitia et nemo. Non eos eum veniam velit. Facere quia et voluptatem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(229, 'Sed sit dicta consequatur architecto.', 'sed-sit-dicta-consequatur-architecto', 442, NULL, 'placeholder.jpg', 0, 'Eum et alias omnis cum expedita ad non. Quidem repellendus quia aliquam sequi dolores. Ut et placeat molestiae quas.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(230, 'Sed minus doloremque facere excepturi in eius quam.', 'sed-minus-doloremque-facere-excepturi-in-eius-quam', 884, NULL, 'placeholder.jpg', 9, 'Corrupti beatae qui qui. Deserunt sit similique numquam quisquam. Optio nesciunt aut voluptatem libero natus.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(231, 'Et dignissimos nesciunt tenetur est repudiandae.', 'et-dignissimos-nesciunt-tenetur-est-repudiandae', 468, NULL, 'placeholder.jpg', 3, 'Quis laborum aut qui distinctio eum distinctio. Non dolore quasi id est ut enim nihil dolores. Odit eveniet nam est neque consequatur voluptas praesentium fugit. Labore id eius eos rem harum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(232, 'Cupiditate est ratione delectus quasi.', 'cupiditate-est-ratione-delectus-quasi', 499, NULL, 'placeholder.jpg', 2, 'Voluptas ad libero impedit facere doloribus consequatur distinctio. Voluptatibus nemo aut aperiam debitis ab et molestiae eos. Veritatis delectus esse culpa sed ad. Exercitationem aperiam eaque vitae provident quos.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(233, 'Ut dolor dicta minima enim quo labore possimus.', 'ut-dolor-dicta-minima-enim-quo-labore-possimus', 697, NULL, 'placeholder.jpg', 3, 'Ipsa hic facilis corrupti magnam. Assumenda est voluptatem optio quisquam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(234, 'Accusantium quaerat laboriosam sed est aut quia.', 'accusantium-quaerat-laboriosam-sed-est-aut-quia', 959, NULL, 'placeholder.jpg', 4, 'Totam iste at commodi ratione quod atque. Tempore aut enim in. Voluptatum necessitatibus dolor qui atque.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(235, 'Sint ipsa autem quo quam.', 'sint-ipsa-autem-quo-quam', 455, NULL, 'placeholder.jpg', 3, 'Omnis culpa sequi illum recusandae voluptas autem laboriosam. Perspiciatis ducimus ut quod dolorem esse sed perferendis. Similique dolores nihil et dolore tempora cum inventore ducimus.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(236, 'Explicabo ipsam vel vel rem ea laboriosam ut.', 'explicabo-ipsam-vel-vel-rem-ea-laboriosam-ut', 927, NULL, 'placeholder.jpg', 4, 'Et laborum ipsam qui rerum. Incidunt voluptatem harum id fugiat. Architecto et quasi qui nihil inventore harum qui. Aut laboriosam eos iure asperiores consectetur et minima.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(237, 'Numquam animi rerum dolor.', 'numquam-animi-rerum-dolor', 661, NULL, 'placeholder.jpg', 1, 'Qui doloribus ut enim quia. Placeat exercitationem sit sint voluptas. Voluptates et quidem in dolores ipsa maxime. Sed saepe vel ipsum ab.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(238, 'Alias fuga veritatis quia sint nam ex aut autem.', 'alias-fuga-veritatis-quia-sint-nam-ex-aut-autem', 197, NULL, 'placeholder.jpg', 4, 'Sint cum et explicabo. Aut non omnis dignissimos sint suscipit. Quaerat qui doloribus odio repudiandae commodi doloremque. Illum porro earum ipsa officia.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(239, 'Sit aliquid corrupti autem corporis cum sint earum.', 'sit-aliquid-corrupti-autem-corporis-cum-sint-earum', 877, NULL, 'placeholder.jpg', 2, 'At ad voluptatem sunt quasi qui et. Alias commodi maxime similique velit. Illum omnis voluptatum laboriosam quod. Explicabo aut in reprehenderit debitis animi magnam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(240, 'Deserunt sunt dolore dolores unde tempora.', 'deserunt-sunt-dolore-dolores-unde-tempora', 187, NULL, 'placeholder.jpg', 4, 'Inventore consequatur ut asperiores esse quae facilis sit. Quidem aut sit autem qui debitis eos.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(241, 'Nisi nihil odio voluptatibus earum veritatis quo id.', 'nisi-nihil-odio-voluptatibus-earum-veritatis-quo-id', 475, NULL, 'placeholder.jpg', 6, 'Et in alias omnis ut illum et facilis. Sequi non magnam similique quaerat expedita ut corporis. Nihil sed consequatur dolorem expedita placeat nihil.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(242, 'Molestiae vitae est accusamus qui cupiditate vitae.', 'molestiae-vitae-est-accusamus-qui-cupiditate-vitae', 591, NULL, 'placeholder.jpg', 8, 'Laudantium dicta a accusantium debitis enim perferendis. Et necessitatibus quia est qui tenetur nostrum accusantium. Eius eos maiores aut omnis. Omnis aperiam natus in id harum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(243, 'Dolorem et voluptas dolor temporibus sed.', 'dolorem-et-voluptas-dolor-temporibus-sed', 253, NULL, 'placeholder.jpg', 3, 'Sint placeat velit rem fugiat sit qui. Nemo ullam ratione temporibus eum. Distinctio nihil facilis enim consectetur commodi rerum aliquam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(244, 'Qui autem consequuntur totam mollitia quia eaque occaecati similique.', 'qui-autem-consequuntur-totam-mollitia-quia-eaque-occaecati-similique', 329, NULL, 'placeholder.jpg', 0, 'Amet animi autem eius quam. Omnis sint ut non fugit. Debitis tenetur dignissimos aut nihil. Cum sunt non voluptas autem quo.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(245, 'Placeat non expedita eius.', 'placeat-non-expedita-eius', 819, NULL, 'placeholder.jpg', 6, 'Consequatur debitis sed rerum voluptatibus reprehenderit ratione quibusdam dolore. Animi et cupiditate voluptas dolores. Fuga esse quasi dignissimos ipsum repellendus neque. Ipsa dolores rerum sapiente in est sed vel.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(246, 'Nobis perspiciatis quas inventore.', 'nobis-perspiciatis-quas-inventore', 531, NULL, 'placeholder.jpg', 4, 'Eligendi libero necessitatibus adipisci quia quis voluptate modi accusamus. Quia omnis aut eveniet maxime et quidem ea. Cum dolorem dolores incidunt autem perspiciatis.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(247, 'Aut quas veritatis blanditiis voluptas aut sunt ut.', 'aut-quas-veritatis-blanditiis-voluptas-aut-sunt-ut', 169, NULL, 'placeholder.jpg', 4, 'Sequi doloremque maxime inventore quos et. Molestiae nulla ut qui doloribus voluptatum ratione. Illum voluptas temporibus sapiente enim neque ut asperiores expedita.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(248, 'Maxime eos ut sunt totam eveniet explicabo qui magnam.', 'maxime-eos-ut-sunt-totam-eveniet-explicabo-qui-magnam', 452, NULL, 'placeholder.jpg', 3, 'Quo iusto in aut quia quam. Nemo omnis ut ea cumque debitis numquam temporibus. Eos est quibusdam perferendis vero nisi culpa molestias. Molestias molestiae eligendi neque. Quasi libero iure quaerat atque sunt harum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(249, 'Repudiandae occaecati quo ut vero sit aut minus.', 'repudiandae-occaecati-quo-ut-vero-sit-aut-minus', 197, NULL, 'placeholder.jpg', 1, 'Quo optio necessitatibus optio omnis expedita facere et. Qui ducimus est reiciendis porro. Nihil voluptas voluptas nemo. Omnis illo inventore voluptate dolores.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(250, 'Quod vel quidem illum nihil a rerum nulla.', 'quod-vel-quidem-illum-nihil-a-rerum-nulla', 909, NULL, 'placeholder.jpg', 4, 'Et quibusdam eligendi eaque ea. Ipsam nisi nostrum fugit velit dicta. Beatae repellat sit animi neque cumque ducimus repellat. Fugiat sunt et sit alias. Quis asperiores doloribus quae aut officia omnis voluptas.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(251, 'Ipsum neque possimus eos optio nemo laudantium sunt unde.', 'ipsum-neque-possimus-eos-optio-nemo-laudantium-sunt-unde', 335, NULL, 'placeholder.jpg', 1, 'Reprehenderit laboriosam ut expedita ut sint omnis. Rerum nisi enim quibusdam vel et quisquam voluptatum dolor. Enim eum magnam ad molestias nobis qui.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(252, 'Praesentium voluptas minus est voluptatem ut voluptas nisi.', 'praesentium-voluptas-minus-est-voluptatem-ut-voluptas-nisi', 403, NULL, 'placeholder.jpg', 7, 'Qui dolores doloribus quis aperiam mollitia. Dolores nam expedita rerum nulla aut autem excepturi cum. Rem dolorem odio quia.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(253, 'Est sit sapiente temporibus nihil ab suscipit quas.', 'est-sit-sapiente-temporibus-nihil-ab-suscipit-quas', 310, NULL, 'placeholder.jpg', 0, 'Molestiae dignissimos iste porro rerum debitis ut tempore. Commodi fuga quis quibusdam dolorum. Velit voluptatibus dolorum nostrum architecto.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(254, 'Tempore omnis et quo in sed qui iusto.', 'tempore-omnis-et-quo-in-sed-qui-iusto', 580, NULL, 'placeholder.jpg', 2, 'Natus voluptatem quo in in repellendus fugiat unde. Quos est laborum nostrum laudantium rem natus id. Voluptatem officiis consequatur modi maxime eaque est recusandae. Perferendis natus veniam officiis maiores et autem exercitationem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(255, 'Minima nesciunt odio molestiae.', 'minima-nesciunt-odio-molestiae', 473, NULL, 'placeholder.jpg', 1, 'Aliquid aut alias autem incidunt. Fugiat veniam pariatur ab aut dignissimos minima. Voluptas totam officia distinctio aut. Qui facere et officia officiis.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(256, 'Illum aut facilis vel consequatur soluta molestiae nemo.', 'illum-aut-facilis-vel-consequatur-soluta-molestiae-nemo', 737, NULL, 'placeholder.jpg', 4, '<p>Amet aut nostrum quia voluptas doloremque est. Ut est omnis assumenda rerum officiis explicabo blanditiis.</p>', '2020-12-14 01:00:20', '2020-12-14 01:12:24'),
(257, 'Reprehenderit a consequatur laborum dolorum.', 'reprehenderit-a-consequatur-laborum-dolorum', 797, NULL, 'placeholder.jpg', 7, '<p>Repudiandae dicta quis molestiae alias consequuntur voluptas. Dolores ab ut et aliquid cupiditate tempore. Exercitationem sit et et autem. Voluptatem sit omnis et impedit.</p>', '2020-12-14 01:00:20', '2020-12-14 01:12:40'),
(258, 'Sit porro est sit odio incidunt nulla impedit.', 'sit-porro-est-sit-odio-incidunt-nulla-impedit', 896, NULL, 'placeholder.jpg', 5, '<p>Saepe sed aut in esse incidunt. Aut maxime enim molestias dolor aspernatur consequatur itaque. Dolorum expedita voluptatem voluptas sequi id aut labore.</p>', '2020-12-14 01:00:20', '2020-12-14 01:13:02'),
(259, 'Autem sunt in eos id ut possimus.', 'autem-sunt-in-eos-id-ut-possimus', 314, NULL, 'placeholder.jpg', 3, '<p>Sit culpa porro voluptate nihil occaecati. Perferendis aperiam est impedit maiores sint tempora. Fuga et autem odio fugiat vero officia mollitia ut. Et eum error excepturi laborum enim.</p>', '2020-12-14 01:00:20', '2020-12-14 01:13:16'),
(260, 'Rem doloremque perferendis quisquam asperiores pariatur ut.', 'rem-doloremque-perferendis-quisquam-asperiores-pariatur-ut', 440, NULL, 'placeholder.jpg', 1, '<p>Non eius est molestiae dolore. Vero ipsam quia voluptatem placeat est quidem aliquid. Voluptas cum eligendi explicabo quidem sed. Voluptates ratione aspernatur et nisi sit neque.</p>', '2020-12-14 01:00:20', '2020-12-14 01:13:26'),
(261, 'Enim nesciunt voluptatum sequi voluptatum facere.', 'enim-nesciunt-voluptatum-sequi-voluptatum-facere', 485, NULL, 'placeholder.jpg', 4, '<p>Aut omnis vitae repellendus suscipit. Accusantium deserunt atque perspiciatis aspernatur. Voluptatem inventore alias eos eos. Molestiae ex magni incidunt sapiente repellendus.</p>', '2020-12-14 01:00:20', '2020-12-14 01:13:38'),
(262, 'Corrupti consequatur at vitae aut.', 'corrupti-consequatur-at-vitae-aut', 303, NULL, 'placeholder.jpg', 2, '<p>In nam laudantium est molestiae. Rerum aut ea alias adipisci omnis est dignissimos. Eius eos et dolorum dolores tempore. Ducimus libero amet saepe et aspernatur ut ut.</p>', '2020-12-14 01:00:20', '2020-12-14 01:14:00'),
(263, 'Dicta eius est earum eligendi et.', 'dicta-eius-est-earum-eligendi-et', 632, NULL, 'placeholder.jpg', 5, 'Rerum occaecati molestiae quis molestias sed. Id ab maxime rem nostrum voluptas. Veniam a consequatur libero voluptatibus repudiandae debitis dolor.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(264, 'Quae soluta sunt delectus ratione facilis voluptas.', 'quae-soluta-sunt-delectus-ratione-facilis-voluptas', 919, NULL, 'placeholder.jpg', 8, 'Aut odio eos id consequatur. Ullam cupiditate id molestiae quia suscipit. Illo molestiae est aperiam nisi. Molestiae placeat aliquam blanditiis neque.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(265, 'Esse non est repudiandae et provident magnam.', 'esse-non-est-repudiandae-et-provident-magnam', 137, NULL, 'placeholder.jpg', 8, 'Iusto sed nulla dolorum nam. Eos aut autem quis blanditiis. Explicabo aliquam aliquam atque eligendi sunt consequatur. Incidunt totam a debitis nostrum qui.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(266, 'In est nostrum officia sed nisi.', 'in-est-nostrum-officia-sed-nisi', 242, NULL, 'placeholder.jpg', 1, 'Quia nostrum illum blanditiis qui culpa neque. Error voluptatem necessitatibus rem ut labore qui ab. Ipsam minus animi ut.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(267, 'Sunt similique nam delectus explicabo saepe.', 'sunt-similique-nam-delectus-explicabo-saepe', 239, NULL, 'placeholder.jpg', 2, '<p>Vel cum magni qui. Corrupti inventore voluptatem delectus molestias minus. Iusto dignissimos explicabo autem impedit velit ut rerum. Vel sunt suscipit qui eveniet.</p>', '2020-12-14 01:00:20', '2021-02-22 05:12:58'),
(268, 'Fugiat sint molestias dolores magni deleniti quia quia.', 'fugiat-sint-molestias-dolores-magni-deleniti-quia-quia', 534, NULL, 'placeholder.jpg', 5, 'Modi ut sapiente placeat et rem id suscipit. Qui est quia consequatur quia ex. Corrupti et minus quo atque vel magni aspernatur. Similique quia impedit velit magnam soluta blanditiis sequi architecto.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(269, 'Voluptas est suscipit tenetur nihil ut hic.', 'voluptas-est-suscipit-tenetur-nihil-ut-hic', 344, NULL, 'placeholder.jpg', 0, 'Officiis in est ullam. Sed recusandae vitae dolores nam eos quia. Quia ut beatae recusandae sed atque qui voluptate. Aspernatur ipsum enim labore suscipit quisquam aut non rerum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(270, 'Eos deleniti vel exercitationem laboriosam aliquid aut qui.', 'eos-deleniti-vel-exercitationem-laboriosam-aliquid-aut-qui', 192, NULL, 'placeholder.jpg', 2, 'Voluptatem reiciendis provident voluptatum nihil. Consequatur molestias quia incidunt nostrum nostrum et voluptatum. Rerum assumenda facere sint expedita. Consequatur ipsam quo necessitatibus nesciunt facilis sit.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(271, 'Eaque modi dicta nulla atque voluptates distinctio.', 'eaque-modi-dicta-nulla-atque-voluptates-distinctio', 769, NULL, 'placeholder.jpg', 9, 'Unde aperiam repellat optio voluptatum. Architecto asperiores qui accusamus voluptatem sit temporibus eaque. Nesciunt explicabo consequatur ullam nesciunt similique amet. Aperiam dolores voluptatem praesentium eum rerum velit qui.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(272, 'Doloremque sit blanditiis nihil nihil accusamus sit est.', 'doloremque-sit-blanditiis-nihil-nihil-accusamus-sit-est', 871, NULL, 'placeholder.jpg', 6, 'Itaque ut ut dignissimos corrupti. Doloribus esse hic eveniet.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(273, 'Blanditiis consequatur ab non autem.', 'blanditiis-consequatur-ab-non-autem', 893, NULL, 'placeholder.jpg', 0, '<p>Sed laudantium deserunt beatae soluta quam. Accusamus temporibus voluptatem alias ipsum sint. Aperiam repellat et voluptas et.</p>', '2020-12-14 01:00:20', '2021-02-22 05:13:10'),
(274, 'Et accusamus est omnis non.', 'et-accusamus-est-omnis-non', 794, NULL, 'placeholder.jpg', 7, 'Laudantium et mollitia omnis nesciunt. Est in explicabo aut occaecati accusantium.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(275, 'Natus sed eum quae animi ut expedita quia.', 'natus-sed-eum-quae-animi-ut-expedita-quia', 559, NULL, 'placeholder.jpg', 6, 'Corporis quo quia at et. Vitae accusantium adipisci dolore quod velit. Hic architecto quo qui ea quo molestiae. In fugiat occaecati sed eaque possimus ipsam sit sit.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(276, 'Delectus eos debitis dolor impedit doloremque aut.', 'delectus-eos-debitis-dolor-impedit-doloremque-aut', 279, NULL, 'placeholder.jpg', 4, 'Enim modi sed ipsa qui ut in commodi. Consequuntur harum autem aliquid odio consequatur eum. In quaerat voluptas rerum et eum accusamus vel.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(277, 'Nihil sed doloribus ratione est quis odio.', 'nihil-sed-doloribus-ratione-est-quis-odio', 942, NULL, 'placeholder.jpg', 1, 'Occaecati possimus hic natus vel eum delectus non veniam. Suscipit quam pariatur quasi. Quod consectetur similique commodi.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(278, 'Et quia cumque voluptas magnam et veniam sapiente quaerat.', 'et-quia-cumque-voluptas-magnam-et-veniam-sapiente-quaerat', 813, NULL, 'placeholder.jpg', 6, '<p>Dignissimos blanditiis et quasi necessitatibus. Est dolores sit consequatur nulla. Voluptatem ex consectetur quasi. Omnis sunt qui sunt magni consequatur.</p>', '2020-12-14 01:00:20', '2021-02-22 05:13:58'),
(279, 'Consequatur voluptatum et laudantium quis.', 'consequatur-voluptatum-et-laudantium-quis', 119, NULL, 'placeholder.jpg', 9, 'Eligendi consectetur eos voluptatem aut et aperiam. Quisquam aliquam quis et nesciunt ipsa expedita repudiandae. Recusandae voluptas aut aliquid sint voluptatibus. Quam dolorem praesentium officia quibusdam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(280, 'Temporibus libero id distinctio.', 'temporibus-libero-id-distinctio', 515, NULL, 'placeholder.jpg', 7, 'Sunt omnis aliquam corrupti neque at sunt. Excepturi fugit et voluptas in. Iusto consequuntur aut odio asperiores.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(281, 'Vel libero ut temporibus odio sed.', 'vel-libero-ut-temporibus-odio-sed', 981, NULL, 'placeholder.jpg', 7, 'Ratione nihil voluptatem perferendis laborum dolore. Eius consequatur suscipit consequatur omnis assumenda. Enim recusandae et molestias et sint aperiam voluptas quia. Et ipsa omnis deleniti maiores aliquid quidem vel ipsum. Eaque nisi quis eos ea exercitationem.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(282, 'Nam dignissimos unde nemo laudantium commodi provident fuga.', 'nam-dignissimos-unde-nemo-laudantium-commodi-provident-fuga', 985, NULL, 'placeholder.jpg', 5, 'Odio in distinctio est cupiditate sequi. Atque rerum voluptates et unde est rem eum reiciendis. Dolores cumque ipsum porro rerum harum aut nam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(283, 'Eos magnam et vel atque et in qui.', 'eos-magnam-et-vel-atque-et-in-qui', 665, NULL, 'placeholder.jpg', 4, 'Est dolorem eveniet ipsa rem enim voluptatibus. Autem incidunt et rerum in hic in sit quae. Quos fuga aperiam earum est quia voluptas. Enim neque molestiae et molestias.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(284, 'Aut dolor veniam aut.', 'aut-dolor-veniam-aut', 808, NULL, 'placeholder.jpg', 5, 'Officiis quae quaerat dignissimos ut aut temporibus enim similique. Molestias ut distinctio consectetur ab aut molestiae. Voluptates consequatur non porro rerum suscipit veniam consequuntur consequatur. Rerum voluptatem aliquam vero vel.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(285, 'Minima quaerat et ullam natus at.', 'minima-quaerat-et-ullam-natus-at', 305, NULL, 'placeholder.jpg', 8, 'Dolore rerum sed voluptatem non voluptates veritatis laudantium. Nihil ducimus eum rerum sit aut. Odio corporis qui repellendus dolore.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(286, 'Qui architecto architecto consequatur et.', 'qui-architecto-architecto-consequatur-et', 983, NULL, 'placeholder.jpg', 4, 'Et at sit commodi dicta. Quod labore quisquam sapiente exercitationem iusto voluptatem et. Alias omnis ipsum fugiat vitae.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(287, 'Excepturi corporis eum mollitia aut ducimus.', 'excepturi-corporis-eum-mollitia-aut-ducimus', 870, NULL, 'placeholder.jpg', 8, 'Expedita repellat molestiae quo voluptas odit provident dolores. Et inventore ut reiciendis exercitationem id minus. Minima consequuntur qui sed minima est cumque et. Nulla ut porro et eum aliquam.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(288, 'Sequi porro maxime sunt sequi voluptate consectetur ut.', 'sequi-porro-maxime-sunt-sequi-voluptate-consectetur-ut', 794, NULL, 'placeholder.jpg', 7, 'Ut rem itaque nostrum et. Numquam corrupti quis sunt voluptatem placeat. Nulla velit maxime quod nisi.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(289, 'Recusandae quos quis dolore voluptatem veniam.', 'recusandae-quos-quis-dolore-voluptatem-veniam', 570, NULL, 'placeholder.jpg', 8, 'Est similique placeat esse id ex error. Et placeat velit praesentium quia. Rem sit eos rerum enim est. Dolorem cum earum ratione magni.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(290, 'Quae impedit sequi qui occaecati optio est excepturi.', 'quae-impedit-sequi-qui-occaecati-optio-est-excepturi', 419, NULL, 'placeholder.jpg', 2, 'Velit praesentium qui quia fugiat ut dolores ducimus. Id veniam ipsam at magni molestiae esse. Ipsam voluptatem quas est quo aperiam. Voluptas animi id animi eveniet odio.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(291, 'Tenetur magni quo omnis natus consequatur.', 'tenetur-magni-quo-omnis-natus-consequatur', 802, NULL, 'placeholder.jpg', 6, 'Non tempora error ut quis voluptas similique. Repudiandae vitae blanditiis inventore non. Quaerat aut accusamus repellendus reiciendis vitae. Labore et tenetur rerum voluptatem nihil rerum.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(292, 'Tenetur vel cumque mollitia quidem sunt.', 'tenetur-vel-cumque-mollitia-quidem-sunt', 676, NULL, 'placeholder.jpg', 8, 'Maxime soluta unde et. Et debitis sunt inventore totam reprehenderit aut occaecati est. Illo tempore itaque facere aperiam et nostrum nobis. Et nemo cupiditate quod.', '2020-12-14 01:00:20', '2020-12-14 01:00:20');
INSERT INTO `products` (`id`, `name`, `slug`, `price`, `sale_price`, `featured_image`, `stock`, `description`, `created_at`, `updated_at`) VALUES
(293, 'Porro iste labore dolores molestiae iste vero commodi exercitationem.', 'porro-iste-labore-dolores-molestiae-iste-vero-commodi-exercitationem', 441, NULL, 'placeholder.jpg', 1, 'Eum aperiam neque explicabo consequatur aut ad. Quibusdam doloribus aperiam autem aut quos iusto tempore. Aut sit mollitia corrupti at.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(294, 'Sunt est facere facere nam quos.', 'sunt-est-facere-facere-nam-quos', 243, NULL, 'placeholder.jpg', 6, 'Aut minus voluptas quis qui eos. Non omnis animi perferendis voluptas. Vitae ut illo iusto et in vero eaque.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(295, 'Doloribus ducimus quae est ullam.', 'doloribus-ducimus-quae-est-ullam', 749, NULL, 'placeholder.jpg', 1, 'Quibusdam atque ipsum est. Neque exercitationem minima ea qui magni est atque. Temporibus voluptatem consequatur necessitatibus et ea delectus. Aut ut iure praesentium aut sit.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(296, 'Et voluptatem ratione minus est.', 'et-voluptatem-ratione-minus-est', 439, NULL, 'placeholder.jpg', 1, 'Eos velit et commodi at voluptatem reiciendis. Quis nihil temporibus voluptas qui. Tempore mollitia reprehenderit aut fuga sed.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(297, 'Fugit enim voluptates facere enim provident nobis.', 'fugit-enim-voluptates-facere-enim-provident-nobis', 663, NULL, 'placeholder.jpg', 0, 'Possimus impedit est aperiam ad deleniti deserunt. Ut officia vel amet beatae voluptas earum. Porro qui et placeat.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(298, 'Vel omnis minima in sapiente.', 'vel-omnis-minima-in-sapiente', 316, NULL, 'placeholder.jpg', 6, 'Repellat similique quos architecto dolore voluptatem sit modi. Cum accusantium qui suscipit et. Dicta non magnam ea eum. Aut dolores tempore iure debitis voluptatibus fugit.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(299, 'Nostrum vel pariatur suscipit quidem omnis qui.', 'nostrum-vel-pariatur-suscipit-quidem-omnis-qui', 654, NULL, 'placeholder.jpg', 9, 'Deserunt excepturi facere velit fuga. Facilis delectus aut est voluptas optio sapiente libero. Natus veniam fuga consectetur pariatur. Necessitatibus aut cum dolore vitae sit officiis odit.', '2020-12-14 01:00:20', '2020-12-14 01:00:20'),
(300, 'Necessitatibus adipisci qui et culpa.', 'necessitatibus-adipisci-qui-et-culpa', 649, NULL, 'placeholder.jpg', 0, '<p>Laudantium unde omnis repellendus. Laborum totam vel quae quis impedit placeat qui. Exercitationem aspernatur qui et accusamus consequatur. Recusandae quod pariatur ullam rerum aut consequuntur.</p>', '2020-12-14 01:00:20', '2021-02-22 05:13:20'),
(301, 'demo cash', 'demo-cash', 123, NULL, 'Screenshot (1)_1613992140.png', NULL, NULL, '2020-12-14 01:42:00', '2021-02-22 05:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci,
  `top_ad1_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_ad1_text` text COLLATE utf8mb4_unicode_ci,
  `top_ad2_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_ad2_text` text COLLATE utf8mb4_unicode_ci,
  `top_ad3_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_ad3_text` text COLLATE utf8mb4_unicode_ci,
  `bottom_ad_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_ad_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `favicon`, `logo`, `phone`, `email`, `address`, `map`, `top_ad1_img`, `top_ad1_text`, `top_ad2_img`, `top_ad2_text`, `top_ad3_img`, `top_ad3_text`, `bottom_ad_img`, `bottom_ad_text`, `created_at`, `updated_at`) VALUES
(1, 'pnglogo_1614096657.png', 'guru_logo_1614160654.png', '123456 updated', 'ab@gmail.com updated', 'ktm updated', '<iframe> updated', 'jkkk_1614096686.jpg', '<h1>20%</h1>\r\n\r\n<h2>&nbsp; &nbsp; &nbsp; &nbsp; Off On All Proudcts</h2>', 'logo_1614096699.jpg', '<p>hello updated</p>', 'classic 5 _1614096714.jpg', '<p>HELLO updated</p>', 'classic 2_1614096730.jpg', '<h3>Get this item now!</h3>\r\n\r\n<h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href=\"https://www.youtube.com/watch?v=ErvgV4P6Fzc&amp;list=RDMMujNeHIo7oTE&amp;index=8\">50% Off</a></h1>', NULL, '2021-02-24 04:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `text`, `image`, `link`, `order`, `created_at`, `updated_at`) VALUES
(1, NULL, 'eg2 (7)_1614151134.jpg', 'https://www.youtube.com/watch?v=uEDhGX-UTeI&list=RDMMuEDhGX-UTeI&start_radio=1', 2, '2021-02-24 01:33:54', '2021-02-24 01:33:54'),
(2, '<h1 style=\"font-style: italic;\">updated</h1>', 'JOEY4886_1614151762.jpg', 'www.youtube.com updated', 1, '2021-02-24 01:44:22', '2021-02-24 04:50:32'),
(3, '<p>updated</p>', '2017-DOCK-By-Ramunas-Manikas-Klaipeda-Lithuania-16_1614151961.jpg', 'https://www.youtube.com/watch?v=uEDhGX-UTeI&list=RDMMuEDhGX-UTeI&start_radio=1 updated', 2, '2021-02-24 01:47:41', '2021-02-24 02:09:36'),
(4, NULL, 'eg1 (7)_1614163202.jpg', 'https://www.youtube.com/watch?v=uEDhGX-UTeI&list=RDMMuEDhGX-UTeI&start_radio=1', 10, '2021-02-24 01:47:59', '2021-02-24 04:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@sunbi', NULL, '$2y$10$Mmmc0JXMmlN8hb3.62.jz.YUz/Y1MWxrSYO1ogDKTFFOwLkqNn0H.', NULL, '2020-12-14 01:58:25', '2020-12-14 01:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
