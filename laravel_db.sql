-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 06:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` int(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `title`, `descriptions`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Special Price', 'New Event Special Discount Price', 'sX5oq7rvm6VAeGiehE4GIEMpcsSjIYFzzQIdItCa.jpg', '2023-07-11 01:30:59', '2023-07-11 01:30:59', NULL),
(9, 'New Item', 'New Item Camera', 'hMdw5XTy4DoLiqKv48BEaLTvqiUUiUsYcHY2VQsn.jpg', '2023-07-11 01:31:18', '2023-07-11 01:31:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_equipment` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `descriptions`, `img`, `created_at`, `updated_at`) VALUES
(7, 'Camera', 'Camera Category', '8wskwx0K7ncewtaMOTiIoJ2srEn3LrnV5RLv93Pz.jpg', '2023-07-11 02:36:38', '2023-07-11 02:36:38'),
(8, 'Lens', 'Lens Category', 'Z1kyl9E6zn7g2QKHu00d6nEuJFZXn0TSRhoGisn5.jpg', '2023-07-11 02:38:58', '2023-07-11 02:38:58'),
(9, 'Drone', 'Drone Category', 'zxxGIOiUB9490V6zH9vAA1Tm8WF9Zit6rXfXe3vQ.jpg', '2023-07-11 02:39:18', '2023-07-11 02:39:18'),
(10, 'Stabilizer', 'Stabilizer Category', 'aJe9X23hSFNlWGH0CbaKc4gcmGU13Ed0gXJPBzSI.jpg', '2023-07-11 02:39:39', '2023-07-11 02:39:39'),
(11, 'Accessoris', 'Accessoris Category', 'yfHIlOjL0YJnNaFDLzLRSn5vLL2xkIvhbspz1e7t.jpg', '2023-07-11 02:40:20', '2023-07-11 02:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(20) NOT NULL,
  `id_category` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(20) NOT NULL,
  `sold` int(20) DEFAULT NULL,
  `cost` int(20) NOT NULL,
  `descriptions` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `id_category`, `name`, `stock`, `sold`, `cost`, `descriptions`, `created_at`, `updated_at`) VALUES
(9, 7, 'Sony A7III Body Only Black', 2, NULL, 35490000, 'New Camera', '2023-07-12 06:50:30', '2023-07-12 06:50:30'),
(10, 9, 'DJI Phantom 4', 2, NULL, 12000000, 'DJI DRONE CAMERA', '2023-09-29 03:50:51', '2023-09-29 03:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_equipment`
--

CREATE TABLE `img_equipment` (
  `id` int(20) NOT NULL,
  `id_equipment` int(20) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_equipment`
--

INSERT INTO `img_equipment` (`id`, `id_equipment`, `img`, `created_at`, `updated_at`) VALUES
(14, 9, 'CTqCRS1zH97Slm0vuBJyfMLX3bDZrs6aZsWsHCIU.jpg', '2023-07-12 06:50:30', '2023-07-12 06:50:30'),
(15, 9, 'FYsj1FD818HUmKRpJzEe8nr2YhWnKuqVvW1iHJX2.jpg', '2023-07-12 06:50:30', '2023-07-12 06:50:30'),
(16, 9, 'di9UZPtuV3g6UMEEkMCxNDWxzLIUnOEGmNsWB963.jpg', '2023-07-12 06:50:30', '2023-07-12 06:50:30'),
(17, 10, 'tzzyNqpBXC4dMqdzdNqZMDM6UmGZC2VqWA40B4f2.png', '2023-09-29 03:50:51', '2023-09-29 03:50:51'),
(18, 10, '1OHdRvU2gHKF8yL8ycUa0bE6gsOt95v91lxBxCpp.png', '2023-09-29 03:50:51', '2023-09-29 03:50:51'),
(19, 10, 'zqbS8I7vclwflH2rkcpBWAhaBtIQ3WjpJtRkXLJN.png', '2023-09-29 03:50:51', '2023-09-29 03:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `descriptions`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Roles Admin', '2023-05-23 08:22:45', NULL, NULL),
(2, 'user', 'Roles Users', '2023-05-23 08:23:18', NULL, NULL),
(4, 'rendal', 'Rendal Role', '2023-05-27 03:11:37', '2023-05-27 03:11:37', NULL),
(5, 'seller', 'Seller Role', '2023-05-29 04:21:31', '2023-05-29 04:21:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `id_equipment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_state` int(11) NOT NULL,
  `zip_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `id_state`, `zip_code`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 'Deran Deriyana F', 'deran.deriyana@gmail.com', NULL, '$2y$10$Oo5ryVRTVTbbuibGpe/4M.TcaRQCu5nhloSxJ4ATHNI0PjL3Q50GG', '', '', 0, '', '', 'o1sYcYtrL5If9B9Kr8QQn4bjCSvffQ6Zp6OM1q32fT0oAO0b3z05Kpg330JY', '2023-05-04 23:44:25', '2023-05-04 23:44:25'),
(23, 2, 'Zefanya Erina Nurazyka', 'zefanya.erina@gmail.com', NULL, '$2y$10$WVrubEf9pl3XILFUcTaHRed5lMXKQcHGUbehgbYMnahlbQQnIhhxq', '', '', 0, '', '', NULL, '2023-09-28 21:14:53', '2023-09-28 21:14:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_equipment` (`id_equipment`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `img_equipment`
--
ALTER TABLE `img_equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipment` (`id_equipment`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `id_equipment` (`id_equipment`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_equipment`
--
ALTER TABLE `img_equipment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_equipment`) REFERENCES `equipment` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `equipment` (`id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `img_equipment`
--
ALTER TABLE `img_equipment`
  ADD CONSTRAINT `img_equipment_ibfk_1` FOREIGN KEY (`id_equipment`) REFERENCES `equipment` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_equipment`) REFERENCES `equipment` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `equipment` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
