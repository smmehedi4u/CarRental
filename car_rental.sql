-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2024 at 06:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Civic', 'Honda', 'Ex', 2020, 'suv', 5000.00, 1, 'car_images/oFyW9SFx54mENbRqVPEVgnKy8HS8ddLj9jrSOCFq.jpg', '2024-09-23 12:25:55', '2024-09-24 07:51:10'),
(6, 'Corolla', 'Toyota', 'SE', 2021, 'suv', 6000.00, 1, 'car_images/MLYS2aeYwnBkoZkWqsNNXpM2X29CO3S3ENk5SbOH.jpg', '2024-09-23 12:26:49', '2024-09-24 07:52:35'),
(7, 'Model 3', 'Tesla', 'Long Range', 2022, 'sedan', 7000.00, 1, 'car_images/vuvm1uGgrlOO79nXCbL6Fu1A7SbfpUFOYKf3qVjP.jpg', '2024-09-23 12:28:05', '2024-09-24 07:52:56'),
(8, 'Mustang', 'Ford', 'GT', 2021, 'suv', 5000.00, 1, 'car_images/6JBh5D3YNfJTcUQle8A5oY0tHw8CYXGT8kpdW7km.jpg', '2024-09-23 12:28:54', '2024-09-24 07:53:16'),
(9, 'X5', 'BMW', 'xDrive40i', 2022, 'Sedan', 8000.00, 1, 'car_images/TfI0uw1QHJCCfkc4aTkXEWD8lft8NGNgRTv73H5K.jpg', '2024-09-23 12:29:48', '2024-09-24 07:53:45'),
(10, 'CX-5', 'Mazda', 'Touring', 2019, 'others', 7000.00, 1, 'car_images/qIl73XfG7GFLuPraYCQWOABMJQQhnZkxzuQXSEDj.jpg', '2024-09-23 12:30:37', '2024-09-24 07:54:12'),
(11, 'A4', 'Audi', 'Premium Plus', 2020, 'suv', 6000.00, 1, 'car_images/fGwHqP3LxyB75pB66qWkAhSdQmdsUPwApiIDzgLA.jpg', '2024-09-23 12:31:28', '2024-09-24 09:27:53'),
(12, 'Camry', 'Toyota', 'XLE', 2021, 'sedan', 8000.00, 1, 'car_images/BOJd2WpgOEqlafZSK2MRT6jTU0cxGhzV4OgubXOX.jpg', '2024-09-23 12:32:24', '2024-09-24 09:28:46'),
(13, 'F-150', 'Ford', 'Larient', 2022, 'suv', 9000.00, 1, 'car_images/sRy0fVEEgvfe8p0b9vES6BOhI3WVbH34Unr0BNM5.jpg', '2024-09-23 12:33:11', '2024-09-24 09:26:57'),
(17, 'test car', 'test', 'test', 2022, 'sedan', 5000.00, 1, 'images/x2bDM4UhEH4uQrWbXOpLUDcSh3mBsZI6Q5m1ibDZ.jpg', '2024-09-27 21:50:27', '2024-09-27 21:50:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_18_145946_create_cars_table', 2),
(6, '2024_09_18_150212_create_rentals_table', 2),
(7, '2024_09_21_064319_create_rentals_table', 3),
(8, '2024_09_21_163127_add_phone_and_address_to_users_table', 4);

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
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` enum('Ongoing','Completed','Canceled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(26, 5, 9, '2024-09-28', '2024-09-28', 8000.00, 'Ongoing', '2024-09-27 21:48:50', '2024-09-27 21:49:03');

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
  `usertype` varchar(255) NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `address`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$LTvxQ7NrNHZGrN88rXh/S.kjN4UKeKF8X.wdT2l7zqdT35vqwpXmO', 'admin', NULL, '2024-09-18 07:21:19', '2024-09-18 07:21:19', NULL, NULL),
(2, 'Customer', 'customer@gmail.com', NULL, '$2y$12$UYg4h5cF50PaLgdAFGsqLOnvUVk9b.5K5NrMAYS0HUJvXALfMuPPq', 'customer', NULL, '2024-09-18 07:21:55', '2024-09-18 07:21:55', NULL, NULL),
(4, 'siam', 'siam@gmail.com', NULL, '$2y$12$MqKZeB0YJTR8N4WAib53f.7Eke4DmZvnLGlTdoM7PvsqxYM2GwjEK', 'customer', NULL, '2024-09-21 11:30:33', '2024-09-21 11:30:33', '01876377289392', 'Cuadanga'),
(5, 'Mehedi Hasan', 'hasanrose0823@gmail.com', NULL, '$2y$12$B9B6eRnLOtHaMPhf13Y6c.bb9US8sjZ9aOQ1yLFyOfUKV5/xXSg1G', 'customer', NULL, '2024-09-24 12:06:11', '2024-09-24 12:06:11', '01511715961', 'Daudkandi, Cumilla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
