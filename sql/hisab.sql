-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2023 at 07:40 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hisab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'admin@email.com', NULL, '$2y$10$Ma.mSlm3zC.hXKh12GrXl.aOcalzvzgB9TD4AgCnWMuvo4Im.U/tO', NULL, '2022-11-16 04:15:39', '2022-11-20 08:08:59'),
(2, 'Admin2', 'admin2@email.com', NULL, '$2y$10$t8X5buUJN74/gsMjp6vLs.GOp7DIwoYaaFHsnjM2QRtHdlRAJCG7a', NULL, '2022-11-16 07:42:18', '2022-11-20 08:09:28'),
(3, 'demoAdmin', 'demo@email.com', NULL, '$2y$10$SOKoFo9//xa2BNM8BLv9Bef3gbLjmn5QUt.fh50E/j3pIdHF.u.B.', NULL, '2022-11-17 06:40:17', '2022-11-17 06:40:17'),
(4, 'demo2', 'demo2@email.com', NULL, '$2y$10$V4Xg6BWUjHwzf7bNcdfdjeWSu1J4LpbtB2UZd.cQel/p3U9IqtFJG', NULL, '2022-11-17 06:51:56', '2022-11-17 06:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fruit', '2022-11-21 06:40:15', '2022-11-21 06:40:15'),
(2, 'Meat', '2022-11-21 06:41:52', '2022-11-21 06:41:52'),
(3, 'Fish', '2022-11-21 06:41:59', '2022-11-21 06:42:18'),
(4, 'Vegetable', '2022-11-21 07:41:27', '2022-11-21 07:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

DROP TABLE IF EXISTS `costs`;
CREATE TABLE IF NOT EXISTS `costs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cost_category_id` int NOT NULL,
  `amount` int NOT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `date` timestamp NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `cost_category_id`, `amount`, `note`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 30, '30 taka itop only', '2022-12-03 20:21:56', 5, '2022-12-04 08:21:57', '2022-12-04 08:37:17'),
(2, 1, 20, NULL, '2022-12-04 18:00:00', 5, '2022-12-04 08:56:46', '2022-12-04 08:56:46'),
(3, 3, 10, NULL, '2022-12-04 18:00:00', 5, '2022-12-04 12:23:56', '2022-12-04 12:23:56'),
(4, 2, 10, NULL, '2022-12-04 18:00:00', 5, '2022-12-04 20:24:05', '2022-12-04 20:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `cost_categories`
--

DROP TABLE IF EXISTS `cost_categories`;
CREATE TABLE IF NOT EXISTS `cost_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `cost_categories`
--

INSERT INTO `cost_categories` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Bill', 'my mobile bill', 5, '2022-12-04 07:31:39', '2022-12-04 07:50:11'),
(2, 'Travel expenses', 'Travel expenses', 5, '2022-12-04 12:03:05', '2022-12-04 12:03:05'),
(3, 'Snack', NULL, 5, '2022-12-04 12:03:46', '2022-12-04 12:03:46'),
(4, 'Lunch Bill', NULL, 6, '2022-12-04 18:48:55', '2022-12-04 18:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nid` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nominee_name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nominee_mobile` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `nid`, `address`, `photo`, `email`, `nominee_name`, `nominee_mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Moshab Sharif', '01635169661', '54545454545', 'House-12, Gareeb-E-Nawaz Avenue, Uttara', '01635169661-customer-1668948992.png', 'sharif@email.com', 'nominee', '01635169661', 1, '2022-11-19 00:30:34', '2022-11-20 06:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fake_ids`
--

DROP TABLE IF EXISTS `fake_ids`;
CREATE TABLE IF NOT EXISTS `fake_ids` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `father_name` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `mother_name` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `nid_no` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `signature` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `village` text COLLATE utf8mb3_unicode_ci,
  `road` text COLLATE utf8mb3_unicode_ci,
  `post_office` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `zip_code` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `police_station` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `district` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `blood_group` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `place_of_birth` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_07_131620_create_customers_table', 1),
(6, '2022_11_12_062448_create_warhouses_table', 1),
(7, '2022_11_12_074454_create_units_table', 1),
(8, '2022_11_12_080409_create_categories_table', 1),
(9, '2022_11_14_045725_create_permission_tables', 1),
(10, '2022_11_15_090507_create_admins_table', 1),
(11, '2022_11_18_071237_create_store_ins_table', 2),
(13, '2022_11_20_083502_create_settings_table', 3),
(16, '2022_11_21_124656_create_products_table', 4),
(17, '2022_12_04_130755_create_costs_table', 5),
(18, '2022_12_04_130918_create_cost_categories_table', 5),
(19, '2022_12_04_131237_create_revenue_categories_table', 5),
(20, '2022_12_04_131321_create_revenues_table', 5),
(21, '2023_01_09_214235_create_fake_ids_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 2),
(1, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user.create', 'admin', '2022-11-16 03:59:16', '2022-11-17 07:37:27'),
(2, 'user.view', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(3, 'user.edit', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(4, 'user.delete', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(5, 'role.create', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(6, 'role.view', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(7, 'role.edit', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(8, 'role.delete', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(9, 'Admin Create', 'admin', '2022-11-17 07:40:32', '2022-11-17 07:53:52'),
(10, 'Admin View', 'admin', '2022-11-17 08:18:33', '2022-11-17 08:18:33'),
(11, 'Admin Edit', 'admin', '2022-11-17 08:18:52', '2022-11-17 08:19:46'),
(12, 'Admin Delete', 'admin', '2022-11-17 08:20:07', '2022-11-17 08:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `unit_id` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `stock` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `code`, `name`, `unit_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'M-001', 'Mango Mia', '2', NULL, '2022-11-21 07:24:08', '2022-11-22 06:53:01'),
(2, 4, 'VP-001', 'Potato', '1', NULL, '2022-11-21 07:42:11', '2022-11-21 07:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

DROP TABLE IF EXISTS `revenues`;
CREATE TABLE IF NOT EXISTS `revenues` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `revenue_category_id` int NOT NULL,
  `amount` int NOT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `date` timestamp NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `revenues`
--

INSERT INTO `revenues` (`id`, `revenue_category_id`, `amount`, `note`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 500, NULL, '2022-12-03 18:00:00', 5, '2022-12-04 09:08:32', '2022-12-04 19:45:26'),
(2, 1, 1000, NULL, '2022-05-11 18:00:00', 5, '2022-12-04 18:33:24', '2022-12-04 20:46:12'),
(3, 2, 200, NULL, '2022-12-04 18:00:00', 5, '2022-12-04 19:37:17', '2022-12-04 19:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_categories`
--

DROP TABLE IF EXISTS `revenue_categories`;
CREATE TABLE IF NOT EXISTS `revenue_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `revenue_categories`
--

INSERT INTO `revenue_categories` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Salary (Monthly)', 'My job salary from EIT', 5, '2022-12-04 07:46:48', '2022-12-04 07:50:55'),
(2, 'From Home', 'Money from Father', 5, '2022-12-04 08:51:55', '2022-12-04 08:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16'),
(2, 'user', 'admin', '2022-11-16 03:59:16', '2022-11-16 03:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `welcome_title` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `copyright_name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `copyright_url` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `copyright_year` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `welcome_title`, `logo`, `favicon`, `copyright_name`, `copyright_url`, `copyright_year`, `created_at`, `updated_at`) VALUES
(1, 'আমার হিসাব', 'Hisab Management', 'logo.png', 'favicon.png', 'Essential-Infotech', 'http://essential-infotech.com', '2022', '2022-11-20 08:01:15', '2022-12-04 07:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `store_ins`
--

DROP TABLE IF EXISTS `store_ins`;
CREATE TABLE IF NOT EXISTS `store_ins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `unit_id` int NOT NULL,
  `qty` int NOT NULL,
  `container` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `customer_id` int NOT NULL,
  `warhouse_id` int NOT NULL,
  `price` int NOT NULL,
  `date` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `store_ins`
--

INSERT INTO `store_ins` (`id`, `name`, `unit_id`, `qty`, `container`, `customer_id`, `warhouse_id`, `price`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Misti Alu', 1, 100, 'Bosta', 1, 2, 300, '18/11/2022', '2022-11-19 00:58:11', '2022-11-19 02:31:04'),
(2, 'Gol Alu', 1, 100, 'Bosta', 1, 2, 20, '19/11/2022', '2022-11-19 06:12:45', '2022-11-19 06:12:45'),
(4, 'Orange', 1, 50, 'Bosta', 1, 1, 20, '29/11/2022', '2022-11-19 08:13:24', '2022-11-19 08:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bosta', '2022-11-19 00:43:48', '2022-11-19 00:43:48'),
(2, 'Box', '2022-11-21 07:20:49', '2022-11-21 07:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'user', 'user@email.com', NULL, '$2y$10$Rk9HZHW8Gi3v6R6Xv/s1KOxNyw.hoGSZ/6S5kSkCReDWg/P5HPSEm', NULL, '2022-12-04 06:43:18', '2022-12-04 06:43:18'),
(6, 'user2', 'user2@email.com', NULL, '$2y$10$HXlrODqBKrIi1.C8PyJ8IecEYMLpmWnr0cL.2n9etEwtU2xVhA602', NULL, '2022-12-04 18:37:31', '2022-12-04 18:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `warhouses`
--

DROP TABLE IF EXISTS `warhouses`;
CREATE TABLE IF NOT EXISTS `warhouses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `warhouses`
--

INSERT INTO `warhouses` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Own Warhouse', 'Dhaka', '2022-11-19 00:39:46', '2022-11-19 00:39:46'),
(2, 'Dhaka Warhouse', 'Dhaka', '2022-11-19 00:40:03', '2022-11-19 00:40:03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
