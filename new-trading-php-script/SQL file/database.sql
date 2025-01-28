-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 18 Kas 2024, 22:45:09
-- Sunucu sürümü: 10.11.9-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `u900696561_sctest65454`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salary_date` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `balance`, `name`, `photo`, `email`, `email_verified_at`, `password`, `salary_date`, `type`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0.00, 'Md Admin', '/public/admin/assets/images/profile/1706650015HOx.png', 'admin@gmail.com', '2023-11-29 18:37:08', '$2a$12$LfGiFApP2NZ5WFtugV0zz./ohDsekoGRaTQ36upAdy.xFMUEv7G4q', '2024-05-03', 'admin', '01600000000', 'sd', 'D9GJvZuGXH4oAPcrMBunmUCpfj48pybdW8P4ZxW8UHctjUfGDxgGCEraX7Rs', '2023-11-28 11:11:57', '2024-10-06 19:35:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_ledgers`
--

CREATE TABLE `admin_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `perticulation` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected','default') NOT NULL DEFAULT 'default',
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bonuses`
--

CREATE TABLE `bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bonus_name` varchar(255) NOT NULL,
  `counter` int(11) DEFAULT 0 COMMENT 'user get service count',
  `set_service_counter` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `winner` int(11) DEFAULT 0,
  `amount` double NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `bonuses`
--

INSERT INTO `bonuses` (`id`, `bonus_name`, `counter`, `set_service_counter`, `code`, `winner`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(13, 'bonus', 6, 6, '0000001', 6, 50, 'active', '2024-10-18 16:23:23', '2024-10-18 16:28:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bonus_ledgers`
--

CREATE TABLE `bonus_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bonus_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `bonus_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `checkins`
--

CREATE TABLE `checkins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `token` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `amount` varchar(255) NOT NULL COMMENT 'User Deposit Amount',
  `final_amount` varchar(200) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `status` enum('pending','rejected','approved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` longtext NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `commission` double(20,2) NOT NULL DEFAULT 0.00 COMMENT 'percent',
  `validity` bigint(20) NOT NULL,
  `minimum_invest` double(20,2) NOT NULL DEFAULT 0.00 COMMENT 'amount',
  `status` enum('upcoming','active') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `funds`
--

INSERT INTO `funds` (`id`, `name`, `title`, `photo`, `commission`, `validity`, `minimum_invest`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fund 1', 'Fund oneFund oneFund oneFund one', '/public/upload/fund/1714067352YBp.jpg', 800.00, 5, 500.00, 'active', '2023-06-06 15:38:44', '2024-04-25 23:49:12'),
(18, 'Fund 2', 'Event', '/public/upload/fund/1714067554sbV.jpg', 2500.00, 2, 1500.00, 'active', '2024-03-24 11:28:12', '2024-05-01 07:27:28'),
(19, 'Fund 3', 'Event', '/public/upload/fund/1714067820Ksw.jpg', 3000.00, 1, 2000.00, 'active', '2024-03-24 11:29:44', '2024-05-01 07:25:27'),
(24, 'Fund 3', 'Vip4', '/public/upload/fund/171452681034u.jpg', 7500.00, 1, 5000.00, 'active', '2024-05-01 07:26:51', '2024-05-01 07:26:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fund_invests`
--

CREATE TABLE `fund_invests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fund_id` bigint(20) UNSIGNED NOT NULL,
  `validity_expired` varchar(255) NOT NULL,
  `price` double(20,2) NOT NULL DEFAULT 0.00,
  `return_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lucky_ledgers`
--

CREATE TABLE `lucky_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `draw_id` bigint(20) DEFAULT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `current_date` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `validity` varchar(255) NOT NULL COMMENT 'count days',
  `commission_with_avg_amount` double NOT NULL DEFAULT 0 COMMENT 'user get average amount after validity',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `type` enum('hot','vip') NOT NULL DEFAULT 'hot',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `packages`
--

INSERT INTO `packages` (`id`, `name`, `title`, `photo`, `badge`, `price`, `validity`, `commission_with_avg_amount`, `status`, `type`, `created_at`, `updated_at`) VALUES
(57, 'Pfizer plan 3', 'Vip 3', '/public/upload/package/1731090919eX7.jpg', NULL, 100, '90', 890, 'active', 'hot', '2024-09-30 23:20:32', '2024-11-08 23:36:00'),
(58, 'Pfizer plan 4', 'Vip 4', '/public/upload/package/1731091038WbR.jpg', NULL, 2000, '120', 21600, 'active', 'hot', '2024-09-30 23:32:55', '2024-11-08 23:37:18'),
(59, 'Pfizer plan 5', 'Vip 5', '/public/upload/package/1731091049WEu.png', NULL, 3000, '120', 4500, 'active', 'hot', '2024-09-30 23:35:57', '2024-11-08 23:38:49'),
(60, 'Pfizer plan 6', 'Vip 6', '/public/upload/package/1731091063gHt.jpg', NULL, 5000, '60', 7000, 'active', 'hot', '2024-09-30 23:36:48', '2024-11-08 23:39:09'),
(61, 'Pfizer plan 7', 'Vip 7', '/public/upload/package/1731091078CYV.jpg', NULL, 10000, '120', 15800, 'active', 'hot', '2024-09-30 23:38:30', '2024-11-08 23:40:03'),
(65, 'NUROEV 02', 'NUROEV 02', '/public/upload/package/1731090987Ifr.jpg', NULL, 50, '2', 200, 'active', 'hot', '2024-10-19 05:00:48', '2024-11-08 23:36:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `photo`, `address`, `status`, `created_at`, `updated_at`) VALUES
(22, 'USDT', NULL, '01614536986', 'active', '2024-07-12 02:52:37', '2024-10-19 06:34:06'),
(28, 'TRC20', NULL, '01603709194', 'active', '2024-10-07 19:18:29', '2024-10-08 06:21:47'),
(29, 'bkash', '/public/upload/package/1729339739cLM.jpeg', 'Pc5GzYPM3.txAMnpi87.T5v3i5Q7eAiNWbC9ovdwq', 'active', '2024-10-19 12:08:59', '2024-10-19 12:08:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
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
-- Tablo için tablo yapısı `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `daily_income` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) NOT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'pending',
  `validity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `package_id`, `amount`, `daily_income`, `date`, `status`, `validity`, `created_at`, `updated_at`) VALUES
(1, 3, 65, 1250, 875.00, '2024-11-03 14:42:03', 'active', '2024-11-04 14:42:03', '2024-11-02 13:42:03', '2024-11-02 13:42:03'),
(2, 5, 65, 50, 100.00, '2024-11-10 00:50:10', 'active', '2024-11-11 00:50:10', '2024-11-08 23:50:10', '2024-11-08 23:50:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rebates`
--

CREATE TABLE `rebates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interest_commission1` double NOT NULL,
  `interest_commission2` double NOT NULL,
  `interest_commission3` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `rebates`
--

INSERT INTO `rebates` (`id`, `interest_commission1`, `interest_commission2`, `interest_commission3`, `created_at`, `updated_at`) VALUES
(1, 20, 3, 1, NULL, '2024-10-01 00:26:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_charge` int(11) NOT NULL DEFAULT 0 COMMENT 'percent',
  `minimum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `maximum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `photo` varchar(200) DEFAULT NULL,
  `w_time_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `checkin` double(20,2) NOT NULL DEFAULT 0.00,
  `registration_bonus` double(20,2) NOT NULL DEFAULT 0.00,
  `total_member_register_reword` int(11) NOT NULL DEFAULT 0,
  `total_member_register_reword_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `service` varchar(200) DEFAULT NULL,
  `tgroup` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `withdraw_charge`, `minimum_withdraw`, `maximum_withdraw`, `photo`, `w_time_status`, `checkin`, `registration_bonus`, `total_member_register_reword`, `total_member_register_reword_amount`, `service`, `tgroup`, `created_at`, `updated_at`) VALUES
(1, 7, 200.00, 25000.00, '/public/upload/package/17310912304f2.webp', 'active', 0.00, 50.00, 0, 0.00, 'https://t.me/', 'https://t.me/', '2022-01-18 11:03:22', '2024-11-19 04:43:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invest` double NOT NULL DEFAULT 0,
  `bonus` double NOT NULL DEFAULT 0,
  `team_size` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tasks`
--

INSERT INTO `tasks` (`id`, `invest`, `bonus`, `team_size`, `created_at`, `updated_at`) VALUES
(7, 15000, 300, 50, '2024-05-04 06:55:14', '2024-05-04 06:55:14'),
(8, 55000, 800, 102, '2024-05-04 06:55:37', '2024-05-04 06:55:37'),
(9, 200000, 1500, 150, '2024-05-04 06:56:19', '2024-05-04 06:56:19'),
(10, 400000, 3000, 500, '2024-05-04 06:57:05', '2024-05-04 06:57:05'),
(11, 1000000, 7000, 1500, '2024-05-04 06:57:58', '2024-05-04 06:57:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `task_requests`
--

CREATE TABLE `task_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `team_invest` double NOT NULL DEFAULT 0,
  `team_size` bigint(20) NOT NULL DEFAULT 0,
  `bonus` double NOT NULL DEFAULT 0,
  `status` enum('pending','received','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_by` varchar(255) DEFAULT NULL,
  `ref_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `investor` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(50) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `row_password` varchar(200) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `receive_able_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `rebate_balance` double(20,3) NOT NULL DEFAULT 0.000,
  `photo` varchar(255) DEFAULT NULL,
  `gateway_method` varchar(50) DEFAULT NULL,
  `gateway_number` varchar(50) DEFAULT NULL,
  `withdraw_password` varchar(255) DEFAULT NULL,
  `ifsc` varchar(200) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ban_unban` enum('ban','unban') NOT NULL DEFAULT 'unban',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wallet_address` varchar(255) DEFAULT NULL,
  `active_member` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `ref_by`, `ref_id`, `name`, `investor`, `phone`, `ip`, `username`, `email`, `email_verified_at`, `password`, `row_password`, `type`, `balance`, `receive_able_amount`, `rebate_balance`, `photo`, `gateway_method`, `gateway_number`, `withdraw_password`, `ifsc`, `remember_token`, `status`, `ban_unban`, `created_at`, `updated_at`, `wallet_address`, `active_member`) VALUES
(1, '123456', 'cm666mwo55', 'bkash', 0, '1600208571', '::1', 'uname1600208571', '172933841350@gmail.com', NULL, '$2y$10$67iWumz94sWBc66pN5tee.b5aM7srsGOHH16ra8NAVgwSucfOfKke', '123456', NULL, 750.00, 0.00, 0.000, NULL, 'TRC20', 'jkj202j0,m2j0,20j20,', '123456', NULL, NULL, 'active', 'unban', '2024-10-19 11:46:53', '2024-10-19 12:06:36', NULL, 0),
(2, '81i88871vw', 'qlo45u8912', 'User40', 0, '8373638366', '103.178.191.70', 'uname8373638366', '172934274819@gmail.com', NULL, '$2y$10$mP44/xiPzABSiuNaSmMBu.eYTS8nj8ODh6zsvcgO1cj/198OAWX86', '8373638366', NULL, 50.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'unban', '2024-10-19 16:59:08', '2024-10-19 16:59:08', NULL, 0),
(3, 'agj4011ga0', '9zz73jqf48', 'index.blade.php', 1, '1122222222', '105.112.68.183', 'uname1122222222', '173053681932@gmail.com', NULL, '$2y$10$3EMO20JbHZv4MyHanlDUx.Jic0zREHDRn2SmaxQ63b6Zn0w.zk8L6', NULL, NULL, 3750.00, 0.00, 0.000, NULL, 'bkash', 'admin@gmail.com', '122634', NULL, NULL, 'active', 'unban', '2024-11-02 13:40:19', '2024-11-02 13:42:03', 'TFDFn3QHauXVnosE8EDKCfDiT6nb2zJaD2', 0),
(4, 'kmh442gl6', 'dis56am746', 'User70', 0, '54566363535', '103.178.191.66', 'uname54566363535', '173053905993@gmail.com', NULL, '$2y$10$eTE49ZllnOEFOmsGPS6ozeUlvd.J/oHXBrCPfIp0ejoKBzIsGqawG', NULL, NULL, 50.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'unban', '2024-11-02 14:17:39', '2024-11-02 14:17:39', NULL, 0),
(5, '87mtr93zhh', '49uc962s96', 'User60', 1, '12345678', '103.178.191.66', 'uname12345678', '173082225062@gmail.com', NULL, '$2y$10$U0p2asWPxiGzX.K.XE/Wc.fWocVl0pm.I1qz703ebINOC7lHAultS', NULL, NULL, 0.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'unban', '2024-11-05 20:57:30', '2024-11-08 23:50:10', 'TC3zXaFq9dkbJTGyjGyuxZRYiFTbHuHYZK', 0),
(6, '72c6tlm767', 'qmb75ql03', 'User58', 0, '03000557707', '103.203.46.54', 'uname03000557707', '173105746566@gmail.com', NULL, '$2y$10$.2MlHXWRi8yr4fDjRkCLauOtovkuyHurq3kplMC7ONL5/WfffG8be', NULL, NULL, 50.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'unban', '2024-11-08 14:17:45', '2024-11-08 14:18:23', 'TWRJjnKm6BEhfGtYkHx4mgvfmij1Dxswbw', 0),
(7, '30iybefa2', '52cyr90vtm', 'User62', 0, '65465654', '88.246.194.56', 'uname65465654', '173196987991@gmail.com', NULL, '$2y$10$3TvtJaRIop/L8o2Lew9VXuolD2BYqI1/s1KUq8CiamzPTrcVROdIS', NULL, NULL, 50.00, 0.00, 0.000, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'unban', '2024-11-19 04:44:39', '2024-11-19 04:44:39', NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_ledgers`
--

CREATE TABLE `user_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `get_balance_from_user_id` bigint(20) DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `perticulation` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected','default') NOT NULL DEFAULT 'default',
  `date` varchar(255) DEFAULT NULL,
  `step` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user_ledgers`
--

INSERT INTO `user_ledgers` (`id`, `user_id`, `get_balance_from_user_id`, `reason`, `perticulation`, `amount`, `debit`, `credit`, `status`, `date`, `step`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'rebate', 'Congratulations. you have received registration bonus.', 50, 50, 0, 'approved', '2024-10-19 17:46:53', NULL, '2024-10-19 11:46:53', '2024-10-19 11:46:53'),
(2, 2, NULL, 'rebate', 'Congratulations. you have received registration bonus.', 50, 50, 0, 'approved', '2024-10-19 18:59:08', NULL, '2024-10-19 16:59:08', '2024-10-19 16:59:08'),
(3, 3, NULL, 'rebate', 'Congratulations. you have received registration bonus.', 50, 50, 0, 'approved', '2024-11-02 14:40:19', NULL, '2024-11-02 13:40:19', '2024-11-02 13:40:19'),
(4, 4, NULL, 'rebate', 'Congratulations. you have received registration bonus.', 50, 50, 0, 'approved', '2024-11-02 15:17:39', NULL, '2024-11-02 14:17:39', '2024-11-02 14:17:39'),
(5, 5, NULL, 'rebate', 'Congratulations. you have received registration bonus.', 50, 50, 0, 'approved', '2024-11-05 21:57:30', NULL, '2024-11-05 20:57:30', '2024-11-05 20:57:30'),
(6, 6, NULL, 'rebate', 'Congratulations. you have received registration bonus.', 50, 50, 0, 'approved', '2024-11-08 15:17:45', NULL, '2024-11-08 14:17:45', '2024-11-08 14:17:45'),
(7, 7, NULL, 'rebate', 'Congratulations. you have received registration bonus.', 50, 50, 0, 'approved', '2024-11-19 04:44:39', NULL, '2024-11-19 04:44:39', '2024-11-19 04:44:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vip_sliders`
--

CREATE TABLE `vip_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `page_type` enum('home_page','vip_page') NOT NULL DEFAULT 'home_page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `vip_sliders`
--

INSERT INTO `vip_sliders` (`id`, `photo`, `status`, `page_type`, `created_at`, `updated_at`) VALUES
(18, '/public/upload/slider/17310907386gt.jpg', 'active', 'home_page', '2024-11-08 23:32:18', '2024-11-08 23:32:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `oid` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `final_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','approved','rejected','processing') NOT NULL DEFAULT 'pending' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Tablo için indeksler `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkins_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `fund_invests`
--
ALTER TABLE `fund_invests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_invests_user_id_foreign` (`user_id`),
  ADD KEY `fund_invests_fund_id_foreign` (`fund_id`);

--
-- Tablo için indeksler `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lucky_ledgers_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_package_id_foreign` (`package_id`);

--
-- Tablo için indeksler `rebates`
--
ALTER TABLE `rebates`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `task_requests`
--
ALTER TABLE `task_requests`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `user_ledgers`
--
ALTER TABLE `user_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `vip_sliders`
--
ALTER TABLE `vip_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `fund_invests`
--
ALTER TABLE `fund_invests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Tablo için AUTO_INCREMENT değeri `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `rebates`
--
ALTER TABLE `rebates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `task_requests`
--
ALTER TABLE `task_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `user_ledgers`
--
ALTER TABLE `user_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `vip_sliders`
--
ALTER TABLE `vip_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `checkins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD CONSTRAINT `lucky_ledgers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
