-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 10:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_0c827637ba77c621d0421ac8086dc66f', 'i:1;', 1749846776),
('laravel_cache_0c827637ba77c621d0421ac8086dc66f:timer', 'i:1749846776;', 1749846776),
('laravel_cache_2a8cf7f124e661b9a13223eea53ea302', 'i:1;', 1749844317),
('laravel_cache_2a8cf7f124e661b9a13223eea53ea302:timer', 'i:1749844317;', 1749844317),
('laravel_cache_c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1749974020),
('laravel_cache_c525a5357e97fef8d3db25841c86da1a:timer', 'i:1749974020;', 1749974020),
('laravel_cache_d2f1e3e5168c45793bed32847bedd22d', 'i:1;', 1749818258),
('laravel_cache_d2f1e3e5168c45793bed32847bedd22d:timer', 'i:1749818258;', 1749818258),
('laravel_cache_e10fd735ad88f21f45ee9e47870c152d', 'i:1;', 1749846230),
('laravel_cache_e10fd735ad88f21f45ee9e47870c152d:timer', 'i:1749846230;', 1749846230),
('laravel_cache_f41534fa07f4a6bd7f153b42804d59c0', 'i:2;', 1749796359),
('laravel_cache_f41534fa07f4a6bd7f153b42804d59c0:timer', 'i:1749796359;', 1749796359);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `sessionId` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `quantity`, `sessionId`, `product_id`, `created_at`, `updated_at`) VALUES
(117, NULL, 'y6sHJLSNSwGSK5cZQ3rBedp0oJsvZFJofSB4ES58', 1, '2025-06-15 15:11:05', '2025-06-15 15:11:05'),
(156, NULL, 'pMnRzDqA5yMiuGpe0Wa8fz0dTcvdlVLl70ygyASb', 1, '2025-06-16 01:28:18', '2025-06-16 01:28:18'),
(158, NULL, '31NrDr2uXbsjOjEAwpxIguWbxTyWrTYxniziBOMl', 4, '2025-06-16 01:29:11', '2025-06-16 01:29:11'),
(159, NULL, 'pMnRzDqA5yMiuGpe0Wa8fz0dTcvdlVLl70ygyASb', 4, '2025-06-16 01:29:17', '2025-06-16 01:29:17'),
(161, NULL, '31NrDr2uXbsjOjEAwpxIguWbxTyWrTYxniziBOMl', 3, '2025-06-16 01:29:43', '2025-06-16 01:29:43'),
(162, NULL, '31NrDr2uXbsjOjEAwpxIguWbxTyWrTYxniziBOMl', 3, '2025-06-16 01:30:16', '2025-06-16 01:30:16'),
(164, NULL, '31NrDr2uXbsjOjEAwpxIguWbxTyWrTYxniziBOMl', 2, '2025-06-16 01:55:18', '2025-06-16 01:55:18'),
(165, NULL, '31NrDr2uXbsjOjEAwpxIguWbxTyWrTYxniziBOMl', 2, '2025-06-16 01:55:21', '2025-06-16 01:55:21'),
(166, NULL, 'pMnRzDqA5yMiuGpe0Wa8fz0dTcvdlVLl70ygyASb', 1, '2025-06-16 01:58:02', '2025-06-16 01:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `category_name`, `created_at`, `updated_at`) VALUES
(15, 'category_images/684e7ceeea114.png', 'VALORANT', '2025-06-15 01:57:34', '2025-06-15 01:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '0001_01_01_000000_create_users_table', 1),
(12, '0001_01_01_000001_create_cache_table', 1),
(13, '0001_01_01_000002_create_jobs_table', 1),
(14, '2025_05_31_133135_add_two_factor_columns_to_users_table', 1),
(15, '2025_05_31_133158_create_personal_access_tokens_table', 1),
(16, '2025_06_02_064854_create_categories_table', 1),
(17, '2025_06_05_090955_create_products_table', 1),
(18, '2025_06_08_174734_product_images', 1),
(19, '2025_06_10_134427_create_carts_table', 1),
(20, '2025_06_12_131013_create_orders_table', 1),
(21, '2025_06_13_153421_add_payment_status_to_orders_table', 2),
(22, '2025_06_14_090434_add_email_to_orders_table', 3),
(23, '2025_06_14_151838_add_session_id_to_carts_table', 4),
(24, '2025_06_14_152530_add_quantity_to_carts_table', 5),
(25, '2025_06_14_195120_add_image_to_categories_table', 6),
(26, '2025_06_15_170013_add_total_price_orders_table', 7),
(27, '2025_06_15_170510_add_total_price_to_orders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rec_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Cash On Delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `rec_address`, `phone`, `email`, `status`, `product_id`, `total_price`, `payment_status`, `created_at`, `updated_at`) VALUES
(57, 'Raisul', 'Canada NS', '111', 'raisul@gmail.com', 'In Progress', 3, '1140', 'Cash On Delivery', '2025-06-15 15:04:54', '2025-06-15 15:04:54'),
(58, 'Raisul', 'Canada NS', '111', 'raisul@gmail.com', 'In Progress', 1, '1140', 'Cash On Delivery', '2025-06-15 15:04:54', '2025-06-15 15:04:54'),
(59, 'Raisul', 'Canada NS', '111', 'raisul@gmail.com', 'In Progress', 2, '1140', 'Cash On Delivery', '2025-06-15 15:04:54', '2025-06-15 15:04:54'),
(60, 'Raisul', 'Canada NS', '111', 'raisul@gmail.com', 'In Progress', 2, '1140', 'Cash On Delivery', '2025-06-15 15:04:54', '2025-06-15 15:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('user2@gmail.com', '$2y$12$NkUAP8m80djZwVVgYSuUEeZG91MfmJQG6lGcAC41Ggki4Mt8NQRA2', '2025-06-13 00:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Kuronami Vandal', 'Kuronami Vandal Keyring', 'http://127.0.0.1:8000/product_images/684af091b750f.jpg', '300', 'VALORANT', '3', '2025-06-12 09:21:53', '2025-06-16 01:58:02'),
(2, 'Reaver Vandal', 'Reaver Vandal  Keycahin', 'http://127.0.0.1:8000/product_images/684af0b3d80b2.jpeg', '300', 'VALORANT', '0', '2025-06-12 09:22:27', '2025-06-16 01:55:21'),
(3, 'Reaver Karambit Knife', 'Reaver Karambit Knife Keyring', 'http://127.0.0.1:8000/product_images/684af0fbd4e90.JPG', '240', 'VALORANT', '0', '2025-06-12 09:23:39', '2025-06-16 01:30:16'),
(4, 'Prime Knife', 'Prime Knife Keyring', 'http://127.0.0.1:8000/product_images/684af115e59b6.JPG', '240', 'VALORANT', '6', '2025-06-12 09:24:05', '2025-06-16 01:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'product_images/684af091b750f.jpg', '2025-06-12 09:21:53', '2025-06-12 09:21:53'),
(2, 2, 'product_images/684af0b3d80b2.jpeg', '2025-06-12 09:22:27', '2025-06-12 09:22:27'),
(3, 2, 'product_images/684af0b3de2ef.jpeg', '2025-06-12 09:22:27', '2025-06-12 09:22:27'),
(4, 2, 'product_images/684af0b3deee3.jpeg', '2025-06-12 09:22:27', '2025-06-12 09:22:27'),
(5, 3, 'product_images/684af0fbd4e90.JPG', '2025-06-12 09:23:39', '2025-06-12 09:23:39'),
(6, 4, 'product_images/684af115e59b6.JPG', '2025-06-12 09:24:05', '2025-06-12 09:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('31NrDr2uXbsjOjEAwpxIguWbxTyWrTYxniziBOMl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRXo5ZlNaOHZoTmFFbUJMb0xWcE4xRE5sY2VrdWkzbW5sTk5Kd2g3WiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NhcnRfY291bnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1750060521),
('pMnRzDqA5yMiuGpe0Wa8fz0dTcvdlVLl70ygyASb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib253Mk4wYlFqdFc4TVpyam5GemhFajNVVzA5Rnp5QmF6WXhXakpscSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NhcnRfY291bnQiO319', 1750060766);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '+1 (286) 166-8535', 'Canada', NULL, '$2y$12$r/4FfVupxJvTwURi1kvW6O3HeyM6WTNjQNosxCvauavAZWWRMaKiW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-12 09:18:26', '2025-06-12 09:18:26'),
(2, 'user1', 'user1@gmail.com', 'user', '+1 (396) 553-7661', 'Canada', NULL, '$2y$12$XJU9OpUVPNjsSEPy.su/j.tzW8hYcacVIrV6UcG8T7gJx2./cXpoe', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-12 09:19:06', '2025-06-12 09:19:06'),
(3, 'user2', 'user2@gmail.com', 'user', '132-6617', 'Germany', NULL, '$2y$12$LdiAEJTp.SPAeTsunyBkP.Yv46PWczLo.zUGqyl9sVun2202grjie', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-12 09:19:32', '2025-06-12 09:19:32'),
(4, 'user3', 'user3@gmail.com', 'user', '+1 (607) 802-4885', 'USA', NULL, '$2y$12$UXmvjVHnmfa7jUB5XzDQmOuhbCg.iu4GCDqZ68q7tS61BiTbcHVGq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-12 09:19:53', '2025-06-12 09:19:53'),
(5, 'Raisul', 'raisul.mahi.islam@gmail.com', 'user', '01516547422', 'Canada NS', NULL, '$2y$12$oC/HL2moAN7YPASa.dK//uF6pGJ9nG9xm9OBLJTM/0qCws9pofHxe', NULL, NULL, NULL, 'a7PgOYqXMMGapVWZVdN2Aos0PNVnBP6Xfr74FuN7G9viTjJaJUfaFQNv1Mu1', NULL, NULL, '2025-06-13 00:30:24', '2025-06-13 00:31:23'),
(7, 'Raisul', 'raisul@gmail.com', 'user', '+1 (396) 553-7661', 'Canada NS', NULL, '$2y$12$dET.Vh9H00h8J6L2V..mquU3kC5Wh1voiekFo9OxD8HGHcA11VvLG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-13 13:48:39', '2025-06-13 13:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
