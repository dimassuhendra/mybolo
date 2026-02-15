-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2026 at 12:05 PM
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
-- Database: `mybolo_company`
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
-- Table structure for table `hero_sliders`
--

CREATE TABLE `hero_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sliders`
--

INSERT INTO `hero_sliders` (`id`, `image_path`, `title`, `subtitle`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'sliders/tsHZKyFkRUu8zkgNmgOrsyJNjUrzzt9yzHELp3bP.png', 'Koneksi Tanpa Batass,', 'Teknologi Arindama Andra menyediakan solusi High-Speed Internet terbaik untuk bisnis dan rumah Anda.', 1, 1, '2026-02-01 07:59:09', '2026-02-01 09:20:20'),
(2, 'sliders/BV8M9p117YUWqIobvFoB9MSpKm8qH6YtvyR7YeZL.png', 'Keamanan Tanpa Celah', 'Sistem Keamanan CCTV dan Pelacakan GPS terbaik untuk melindungi aset berharga Anda.', 2, 1, '2026-02-01 07:59:09', '2026-02-01 09:24:10'),
(3, 'sliders/gIshrt1PwCDQ2kDrUhkL3yQE5CWIdNYIkQNFNlfr.png', 'dsadasd', 'dasdasd', 3, 0, '2026-02-01 09:54:57', '2026-02-01 09:54:57');

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
(4, '2026_02_01_044033_create_hero_sliders_table', 1),
(5, '2026_02_01_044050_create_services_table', 1),
(6, '2026_02_01_044107_create_testimonials_table', 1),
(7, '2026_02_01_044126_create_partners_table', 1),
(9, '2026_02_01_044205_create_settings_table', 1),
(10, '2026_02_01_044156_create_teams_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo_path`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'PGN', 'partners/xN43hYKmtctGCsilSytqPqdODnsjztTKDz4GTAVI.png', 1, 1, '2026-02-01 07:59:09', '2026-02-02 01:17:11'),
(2, 'Greenet', 'partners/iWZS2g8KzIZV2r94ikhgrQBabRtVYNd9Y2EtcnFC.png', 1, 2, '2026-02-01 07:59:09', '2026-02-02 01:17:02'),
(3, 'CGS', 'partners/k3WLh9vvL4Fr0xjQEdYbDDj3conxlF4vaNF7zIFd.jpg', 1, 3, '2026-02-01 07:59:09', '2026-02-02 01:16:01'),
(4, 'Lintasarta', 'partners/iUt8AY9V7LMCta2pglwwsev5emtSnki1t1YGepCX.png', 1, 4, '2026-02-01 07:59:09', '2026-02-02 01:16:37'),
(5, 'Telkom', 'partners/q7VMU7I1LJvxF3ivGVz8YyuXLuRCsh34Hv8smKEn.png', 1, 5, '2026-02-01 07:59:09', '2026-02-02 01:16:49'),
(6, 'Varnion', 'partners/qPVwhVtDwSj0918YaktUF9RfthNFdgF3AZzkqWUT.png', 1, 6, '2026-02-01 07:59:09', '2026-02-02 01:17:20');

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`features`)),
  `wa_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `image_path`, `file_path`, `short_description`, `features`, `wa_link`, `created_at`, `updated_at`) VALUES
(1, 'Internet Managed Service', 'fa-wifi', 'services/qp63MtsdY4pAQKvhET6rh0VXXBnFDOSF9j11MfgR.jpg', NULL, 'Koneksi stabil tanpa buffering untuk bisnis Andaa.', '[\"Gratis instalasi\"]', NULL, '2026-02-01 07:59:09', '2026-02-04 23:33:30'),
(2, 'Security System', 'fa-video', 'services/tWYsPh4lKiZsHWnZ0koE2uTJVnbauMdt42LATmGI.jpg', 'https://www.youtube.com/watch?v=CJ3dAAna7jQ&pp=ygUUdmlkZW8gc2luZW1hdGlrIGNjdHbSBwkJkQoBhyohjO8%3D', 'Pantau keamanan aset Anda dari mana saja, kapan saja.', '[null]', NULL, '2026-02-01 07:59:09', '2026-02-04 23:30:25'),
(3, 'GPS Tracking', 'fa-location-crosshairs', 'services/afvK27pz70DgkdLehhqSTtGmu8R7W1JgDMCpoObx.jpg', '', 'Kendali penuh atas armada dan kendaraan operasional.', '[\"GPS\"]', NULL, '2026-02-01 07:59:09', '2026-02-02 07:56:01');

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
('BzyO6NJNvSEIwd54CHCoD0fE2yMfwdEfPB05Rtc3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFdUdFNSdjhNUW82WFF3bTNvR2llNWR4QUpTd2U2dmlVSlZndXVNSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771134673),
('vvCMw4Iuyh25r1L4uvL3Jx0lX1Ir14PB3x1wWPGF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRldiUHhSejBLRzlzOEN0RTQ1UEpyNXJoZ2FndXRObG1ET3VSTnliQyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771065603);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'PT. Teknologi Arindama Andra', '2026-02-01 07:59:09', '2026-02-02 05:22:17'),
(2, 'address', 'Jl. Ikan Kakap No. 64-66 Teluk Betung, Kota Bandar Lampung', '2026-02-01 07:59:09', '2026-02-02 05:22:17'),
(3, 'phone', '0721-5602633', '2026-02-01 07:59:09', '2026-02-02 05:22:18'),
(4, 'email', 'support@lintasteknologi.id', '2026-02-01 07:59:09', '2026-02-02 05:22:18'),
(5, 'working_hours', 'Senin - Jumat: 08:00 - 17:00', '2026-02-01 07:59:09', '2026-02-02 05:22:18'),
(6, 'maps_url', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3971.790356292719!2d105.26082707498428!3d-5.448764994530698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNcKwMjYnNTUuNiJTIDEwNcKwMTUnNDguMyJF!5e0!3m2!1sid!2sid!4v1769832804035!5m2!1sid!2sid', '2026-02-01 07:59:09', '2026-02-02 05:22:18'),
(7, 'whatsapp', '82340336561', '2026-02-01 07:59:09', '2026-02-02 05:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `quote` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `role`, `icon`, `image_path`, `quote`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Mei Yung', 'General Manager', 'fa-user', 'teams/rFcAcmO9fRC5N0df9WimRnITJ4wOYAfZcfLwYuww.png', 'Leading the company with 15+ years of experience in technology business management.', 1, '2026-02-02 20:51:08', '2026-02-02 20:59:02'),
(2, 'Mr. Jay', 'IT Manager', 'fa-user', 'teams/jMlkU07MK0yNZT4AbXdsOuWu98lj1mhX8kmGHjnf.png', 'Oversees all technical operations and ensures system reliability and security.', 2, '2026-02-02 20:59:42', NULL),
(3, 'Mr. Chandra', 'CCTV Specialist', 'fa-user', 'teams/uPx4kKGe8pnWdMUKmlAxbpHgql3c4MWLj52NqsI3.png', 'Expert in surveillance systems with certifications in security technology.', 3, '2026-02-02 21:00:33', NULL),
(4, 'Mr. Ridik', 'Network Specialist', 'fa-user', 'teams/irdNJYq6XYyxZmqpjx4c9meagCA1CfTmJuyVZJlu.jpg', 'Designs and implements robust network infrastructure for optimal performance.', 4, '2026-02-02 21:01:39', NULL),
(5, 'Mrs. Warty', 'Sales Manager', 'fa-user', 'teams/j56Kn77KzIwWuhY2pqYftTkpKZdrWDirLtGkq2Er.png', 'Develops business relationships and ensures customer satisfaction.', 5, '2026-02-02 21:03:10', NULL),
(6, 'Mrs. Venyca', 'Business Operation Team', 'fa-user', 'teams/aWoRqByHBPMccmJpa6cCc39NapAnHYw54I4q1wdN.png', 'Execution—turning vision into reality by aligning strategy with seamless day-to-day operations.', 6, '2026-02-02 21:04:04', NULL),
(7, 'Mr. Gerry', 'GPS Specialist', 'fa-user', 'teams/RSGzhRHTEdS2JffdphCeRoxJuYIuWYT6yf6rPwf4.png', 'Develops business relationships and ensures customer satisfaction.', 7, '2026-02-02 21:05:06', NULL),
(8, 'Mrs. Danti', 'Purchasing & Procurement', 'fa-user', 'teams/80NGDVRmMAIkV2ZIWgZFfw9K9wRRFonx0uh5Zqq9.png', 'Far beyond simply buying goods, they are gatekeepers of cost efficiency, quality control, and supply chain reliability.', 8, '2026-02-02 21:05:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `stars` int(11) NOT NULL DEFAULT 5,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `source` enum('public','internal') NOT NULL DEFAULT 'internal',
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `position`, `body`, `stars`, `status`, `is_featured`, `source`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Hotel Golden Tulip Springhill Lampung', 'Client', 'PT. Teknologi Arindama Andra provided us with a seamless Network installation across our hotel property. Their professionalism and after-sales support are exceptional.', 5, 'approved', 0, 'internal', NULL, '2026-02-01 07:59:09', '2026-02-02 21:30:49'),
(3, 'Wisma Eskole', 'Client', '\"The support and better internet connection and CCTV Services. The expertise of their team is proven, and the fast connectivity is especially helpful during major events.\"', 5, 'approved', 0, 'internal', NULL, '2026-02-01 07:59:09', '2026-02-02 21:30:34'),
(4, 'Azana Boutique Hotel Lampung', 'Client', '\"Reliable internet connectivity with minimal downtime. Their technical team is always responsive whenever we need assistance.\"', 5, 'approved', 0, 'internal', NULL, '2026-02-01 07:59:09', '2026-02-02 21:31:19'),
(5, 'PT. Sinar Jaya Agro Investama', 'Client', '\"We\'ve been using their services for 2 years now for internet services. Consistent quality and excellent customer service.\"', 5, 'approved', 0, 'internal', NULL, '2026-02-01 07:59:09', '2026-02-02 21:31:58'),
(6, 'PT. Asia Makmur', 'Client', '\"The Network services in our factory has greatly enhanced our security measures. The connection remains stable and optimal, with a support team that is always on standby and responds quickly.\"', 5, 'approved', 0, 'internal', NULL, '2026-02-01 07:59:09', '2026-02-02 21:32:29'),
(10, 'El\'s Coffee Roastery', 'Client', '\"The The Best Solution in IT Technology Service.\"', 5, 'approved', 0, 'internal', NULL, '2026-02-02 21:32:58', NULL);

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
(1, 'Admin MyBolo', 'admin@mybolo.com', '2026-01-31 22:09:22', '$2y$12$Wy1zRhTakWlaeG2HDMU5TelBQQQPRhf8ji6ujzUR3o4eK11Ijybtu', 'mwcn2J06e4', '2026-01-31 22:09:22', '2026-01-31 22:09:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_sliders`
--
ALTER TABLE `hero_sliders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_sliders`
--
ALTER TABLE `hero_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
