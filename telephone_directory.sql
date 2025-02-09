-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2025 at 06:19 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telephone_directory`
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
('roshanindap@gmail.com|42.111.106.2', 'i:3;', 1739043982),
('roshanindap@gmail.com|42.111.106.2:timer', 'i:1739043982;', 1739043982);

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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `landline_number` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_number`, `landline_number`, `notes`, `photo`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 1, 'roshan', 'ramchandra', 'indap', 'roshanindap@gmail.com', '9619429254', NULL, 'Software developer', 'contacts/ahUcHpqt5D88FIypdllNhChsqSpxB2PPTAaFH6Qh.png', 2, '2025-02-08 18:51:31', '2025-02-09 15:03:41'),
(2, 1, 'Jane', 'B', 'Smith', 'jane.smith@example.com', '2345678901', '1987654321', 'Sample note for Jane Smith.', 'contacts/5BQp3SAS4ju55a3hJxqDV59zhrqndmLyYyld2Fw1.jpg', 1, '2025-02-09 15:47:56', '2025-02-09 15:03:36'),
(3, 1, 'Robert', 'C', 'Johnson', 'robert.johnson@example.com', '3456789012', '2876543210', 'Sample note for Robert Johnson.', 'contacts/UmEFBdiL7UAI3ZiNCLzLQ5y1M25jo1MMOQx8Nrrx.jpg', 1, '2025-02-09 15:47:56', '2025-02-09 15:03:40'),
(4, 1, 'Emily', 'F', 'Wilson', 'emily.wilson@example.com', '6789012345', '5543210987', 'Sample note for Emily Wilson.', 'contacts/UU3SrfAzpGiMJ6mufrFpGYqBYKqzIkQrGOtLSgjG.jpg', 0, '2025-02-09 15:47:56', '2025-02-09 14:58:53'),
(5, 1, 'David', 'E', 'Taylor', 'david.taylor@example.com', '5678901234', '4654321098', 'Sample note for David Taylor.', 'contacts/RcawNnxlfwzbtCCEeuUl2OxmMXuq9v5G1nZNALG5.jpg', 3, '2025-02-09 15:47:56', '2025-02-09 15:08:16'),
(6, 1, 'Michael', 'G', 'Moore', 'michael.moore@example.com', '7890123456', '6432109876', 'Sample note for Michael Moore.', 'contacts/Pz1BGzwD8ESvdkU4O7nV92OB2PmFJ2Y3QdScQ6Lm.jpg', 1, '2025-02-09 15:47:56', '2025-02-09 15:03:37'),
(7, 1, 'Sophia', 'B', 'Lee', 'sophia.lee@example.com', '8901234567', '7321098765', 'Sample note for Sophia Lee.', 'contacts/4UbUgjIAAtUzQzwZJneM09TZVLoaFjb1dS8Wi8hX.jpg', 1, '2025-02-09 15:47:56', '2025-02-09 15:06:11'),
(8, 1, 'William', 'I', 'Harris', 'william.harris@example.com', '9012345678', '8210987654', 'Sample note for William Harris.', 'contacts/XJ2Xhb40dDE0piweIJX9rl8qyPdUh7GJANnVRaqH.jpg', 1, '2025-02-09 15:47:56', '2025-02-09 15:03:44'),
(9, 1, 'Olivia', 'J', 'Clark', 'olivia.clark@example.com', '0123456789', '9109876543', 'Sample note for Olivia Clark.', 'contacts/gGfSOYc4i1jyL2V6Z5tAdVTwIOPV1YCK2giaDA8K.jpg', 2, '2025-02-09 15:47:56', '2025-02-09 15:03:38'),
(10, 1, 'Alice', 'D', 'Brown', 'alice.brown@example.com', '4567890123', '3765432109', 'Sample note for Alice Brown.', 'contacts/dLvXsolf4mH1Yd2iJQtoFCtcJuWyByRVJXkcpsxA.jpg', 4, '2025-02-09 15:47:56', '2025-02-09 15:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact_views`
--

CREATE TABLE `contact_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `view_date` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_views`
--

INSERT INTO `contact_views` (`id`, `contact_id`, `view_date`, `views`, `created_at`, `updated_at`) VALUES
(6, 1, '2025-02-09', 2, '2025-02-09 14:56:13', '2025-02-09 15:03:41'),
(7, 9, '2025-02-09', 2, '2025-02-09 15:00:58', '2025-02-09 15:03:38'),
(8, 2, '2025-02-09', 1, '2025-02-09 15:03:36', '2025-02-09 15:03:36'),
(9, 6, '2025-02-09', 1, '2025-02-09 15:03:37', '2025-02-09 15:03:37'),
(10, 3, '2025-02-09', 1, '2025-02-09 15:03:40', '2025-02-09 15:03:40'),
(11, 7, '2025-02-09', 1, '2025-02-09 15:03:42', '2025-02-09 15:03:42'),
(12, 8, '2025-02-09', 1, '2025-02-09 15:03:44', '2025-02-09 15:03:44'),
(13, 5, '2025-02-09', 3, '2025-02-09 15:07:53', '2025-02-09 15:08:16'),
(14, 10, '2025-02-09', 4, '2025-02-09 15:32:11', '2025-02-09 15:33:10');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_07_082343_create_contacts_table', 1),
(5, '2025_02_07_161135_create_contact_views_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('DwmKwMBiYplDRqosKGVa5jLjmzqRwlfF5aW3hYyx', 1, '139.5.44.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaVZhdkF6UzlFc3BNRjdlcVdqODJ3aURXMjVwNVdYUGU0SHQ0SUdwRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vZWNvbW1lcmNlLmtzaGVlcmRoZW51LmNvbS9jb250YWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM5MTExODM4O319', 1739117307),
('Q9JzF6KEem4YvTRPQgVXoNV7vxSiHxL2ivLwQ5pu', NULL, '139.5.44.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT0EzaXlBZFhnQmpIYTRWTzY3V2pVMlU3RjRFS1A2UDcxeHd2bmpzTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vZWNvbW1lcmNlLmtzaGVlcmRoZW51LmNvbS9sb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDM6Imh0dHBzOi8vZWNvbW1lcmNlLmtzaGVlcmRoZW51LmNvbS9hbmFseXRpY3MiO319', 1739121526),
('UvmlUntJZoBSqxKmB004OFkOhOKK0PTfVwIayfgj', 1, '139.5.44.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia29iS1BiZFM2ckZNVk44SWo4Sm9xTkxPVXNwTjBsaVRqUlhualRoViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vZWNvbW1lcmNlLmtzaGVlcmRoZW51LmNvbS9jb250YWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM5MTIwMzc5O319', 1739120801);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'roshanindap', 'roshan@software.com', NULL, '$2y$12$WkZSc07uwkNBFosE0uYmwuVi5TGB6gKgfARuP0PBbQenJjhiFjsve', NULL, '2025-02-08 18:46:56', '2025-02-08 18:46:56');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_views`
--
ALTER TABLE `contact_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_views_contact_id_foreign` (`contact_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contact_views`
--
ALTER TABLE `contact_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_views`
--
ALTER TABLE `contact_views`
  ADD CONSTRAINT `contact_views_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
