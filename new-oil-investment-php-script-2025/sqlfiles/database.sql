-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2024 at 02:05 PM
-- Server version: 10.6.20-MariaDB-cll-lve-log
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nijauwgr_miner00002`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `balance`, `name`, `photo`, `email`, `email_verified_at`, `password`, `salary_date`, `type`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0.00, 'Admin', '/public/admin/assets/images/profile/1732703750dOZ.jpg', 'admin@gmail.com', '2023-11-29 18:37:08', '$2y$10$K3UH8YE1/R0R4djv2vQqS.1pDC1ziuW1Qr545kuOe3gwOj1/Kf97G', '2024-10-20', 'admin', '22222222222', 'Pakistan From Lahore', NULL, '2023-11-28 11:11:57', '2024-11-27 21:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `admin_ledgers`
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
-- Table structure for table `bank_lists`
--

CREATE TABLE `bank_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `bank_code` varchar(255) NOT NULL,
  `gtr_bank_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `method_code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `open_deposit` tinyint(1) NOT NULL DEFAULT 1,
  `open_payout` tinyint(1) NOT NULL DEFAULT 1,
  `rate` decimal(3,2) NOT NULL DEFAULT 1.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_lists`
--

INSERT INTO `bank_lists` (`id`, `country`, `currency`, `bank_code`, `gtr_bank_code`, `name`, `method_code`, `status`, `open_deposit`, `open_payout`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'US', 'USDT', 'trc20', 'trc20', 'USDT TRC20', 'oxapay', 1, 1, 1, 1.00, '2024-09-15 21:00:00', '2024-09-15 21:00:00'),
(2, 'US', 'USDT', 'bep20', 'bep20', 'USDT BEP20', 'oxapay', 1, 1, 1, 1.00, '2024-09-15 21:00:00', '2024-09-15 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
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

-- --------------------------------------------------------

--
-- Table structure for table `bonus_ledgers`
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

--
-- Dumping data for table `bonus_ledgers`
--

INSERT INTO `bonus_ledgers` (`id`, `user_id`, `bonus_id`, `amount`, `bonus_code`, `created_at`, `updated_at`) VALUES
(2, 21, 1, 3.00, '123456', '2024-02-19 23:07:23', '2024-02-19 23:07:23'),
(3, 36, 1, 2.00, '123456', '2024-04-28 11:31:17', '2024-04-28 11:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
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

--
-- Dumping data for table `checkins`
--

INSERT INTO `checkins` (`id`, `user_id`, `date`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-12-06 00:24:28', 16.00, 'active', '2024-12-05 21:24:28', '2024-12-05 21:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
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
-- Table structure for table `crypto_wallets`
--

CREATE TABLE `crypto_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `order_id` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `crypto_wallets`
--

INSERT INTO `crypto_wallets` (`id`, `user_id`, `currency`, `network`, `address`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'USDT', 'trc20', '0xD7957Ffd4Eb0B74eb443DEMOB2D3b0658bftrc20', '1733414896', 'approved', '2024-12-05 19:08:16', '2024-12-05 19:08:16'),
(2, 1, 'USDT', 'bep20', '0xD7957Ffd4Eb0B74eb443DEMOB2D3b0658bfbep20', '1733423614', 'approved', '2024-12-05 21:33:34', '2024-12-05 21:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL COMMENT 'User Number',
  `amount` varchar(255) NOT NULL COMMENT 'User Deposit Amount',
  `charge_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `final_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) NOT NULL,
  `feedback` text DEFAULT NULL,
  `data` text DEFAULT NULL,
  `status` enum('pending','rejected','approved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `lucky_ledgers`
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_16_074227_create_admins_table', 1),
(6, '2023_03_17_123007_create_packages_table', 2),
(8, '2023_03_27_103153_create_payment_methods_table', 3),
(10, '2023_03_28_074201_create_deposits_table', 4),
(11, '2023_03_28_142734_create_user_ledgers_table', 5),
(12, '2023_03_28_142802_create_admin_ledgers_table', 6),
(13, '2023_03_30_071745_create_vip_sliders_table', 7),
(14, '2023_03_30_150139_create_settings_table', 8),
(15, '2023_04_01_185541_create_bonuses_table', 9),
(16, '2023_04_01_205009_create_bonus_ledgers_table', 10),
(17, '2023_04_05_203304_create_purchases_table', 11),
(18, '2023_04_09_200835_create_minings_table', 12),
(19, '2023_05_05_092841_create_drows_table', 13),
(20, '2023_05_05_111428_create_lucky_ledgers_table', 14),
(21, '2023_05_05_161904_create_icons_table', 15),
(22, '2023_05_09_214610_create_hiru_notices_table', 16),
(23, '2023_06_06_210226_create_funds_table', 17),
(24, '2023_06_06_222047_create_fund_invests_table', 18),
(25, '2023_06_11_113547_create_checkins_table', 19),
(26, '2023_06_23_193458_create_improvments_table', 20),
(27, '2023_06_24_083626_create_commissions_table', 21),
(28, '2023_12_14_221116_create_tasks_table', 22),
(29, '2024_01_31_034808_create_rebates_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `tab` enum('vip','fixed','event') NOT NULL DEFAULT 'vip',
  `label` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `validity` varchar(255) NOT NULL COMMENT 'count days',
  `commission_with_avg_amount` double NOT NULL DEFAULT 0 COMMENT 'user get average amount after validity',
  `ref1` double(20,2) NOT NULL DEFAULT 0.00,
  `ref2` double(20,2) NOT NULL DEFAULT 0.00,
  `ref3` double(20,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_default` enum('1','0') NOT NULL DEFAULT '0',
  `desc` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_id`, `tab`, `label`, `name`, `photo`, `price`, `validity`, `commission_with_avg_amount`, `ref1`, `ref2`, `ref3`, `status`, `is_default`, `desc`, `created_at`, `updated_at`) VALUES
(1, NULL, 'vip', 'Jejwj', 'Nexus 1', '/public/upload/package/1733265454WpQ.png', 600, '90', 3150, 6.00, 3.00, 1.00, 'active', '0', NULL, '2024-10-17 07:15:54', '2024-11-27 21:37:04'),
(2, NULL, 'vip', 'Bahw', 'Nexus 2', '/public/upload/package/1733265454WpQ.png', 1200, '90', 6300, 6.00, 3.00, 1.00, 'active', '0', NULL, '2024-10-19 21:01:07', '2024-11-27 21:39:22'),
(3, NULL, 'vip', 'Nsnw', 'Nexus 3', '/public/upload/package/1733265454WpQ.png', 3000, '90', 15840, 6.00, 3.00, 1.00, 'active', '0', NULL, '2024-10-19 21:01:59', '2024-11-27 21:39:33'),
(4, NULL, 'vip', 'J', 'Nexus 4', '/public/upload/package/1733265454WpQ.png', 5000, '90', 26460, 6.00, 3.00, 1.00, 'active', '0', NULL, '2024-10-19 21:02:51', '2024-11-27 21:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `settings` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `text`, `tag`, `photo`, `address`, `settings`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Oxapay', 'Channel 1', 'oxapay', '/public/upload/setting/1714242234PPN.png', '01614536986', '{\"secret_key\":{\"title\":\"Merchant ID\",\"validate\":true,\"value\":\"0000000\"},\"payin_key\":{\"title\":\"Payment key\",\"validate\":true,\"value\":\"xxxxxxxxxxxxxxxxxxxxxxxxxx\"},\"payout_key\":{\"title\":\"Payout key\",\"validate\":true,\"value\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxx\"}}', 'active', '2024-07-12 02:52:37', '2024-12-05 15:18:03');

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
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tab` varchar(20) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `daily_income` double(20,2) NOT NULL DEFAULT 0.00,
  `hourly` decimal(20,4) NOT NULL DEFAULT 0.0000,
  `return_total` double(20,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'pending',
  `validity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `tab`, `user_id`, `package_id`, `amount`, `daily_income`, `hourly`, `return_total`, `date`, `note`, `status`, `validity`, `created_at`, `updated_at`) VALUES
(1, 'vip', 1, 1, 600, 35.00, 1.4583, 3150.00, '2024-12-07 00:46:07', NULL, 'active', '2025-03-06 00:46:07', '2024-12-05 21:46:07', '2024-12-05 21:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `rebates`
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
-- Dumping data for table `rebates`
--

INSERT INTO `rebates` (`id`, `interest_commission1`, `interest_commission2`, `interest_commission3`, `created_at`, `updated_at`) VALUES
(1, 6, 3, 1, NULL, '2024-02-06 03:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auto_deposit` tinyint(1) DEFAULT 0,
  `auto_transfer` tinyint(1) NOT NULL DEFAULT 0,
  `auto_transfer_default` varchar(255) DEFAULT NULL,
  `withdraw_charge` int(11) NOT NULL DEFAULT 0 COMMENT 'percent',
  `minimum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `maximum_withdraw` double(20,2) NOT NULL DEFAULT 0.00,
  `w_time_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `checkin` double(20,2) NOT NULL DEFAULT 0.00,
  `registration_bonus` double(20,2) NOT NULL DEFAULT 0.00,
  `total_member_register_reword` int(11) NOT NULL DEFAULT 0,
  `total_member_register_reword_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `auto_deposit`, `auto_transfer`, `auto_transfer_default`, `withdraw_charge`, `minimum_withdraw`, `maximum_withdraw`, `w_time_status`, `checkin`, `registration_bonus`, `total_member_register_reword`, `total_member_register_reword_amount`, `created_at`, `updated_at`, `telegram`) VALUES
(1, 1, 0, 'oxapay', 2, 250.00, 50000.00, 'active', 0.00, 50.00, 0, 0.00, '2022-01-18 11:03:22', '2024-12-05 21:54:12', 'https://demo.net');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_by` varchar(255) DEFAULT NULL,
  `ref_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `phone_code` varchar(20) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `package_tab` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `deposit_balance` double(20,2) NOT NULL DEFAULT 0.00,
  `receive_able_amount` double(20,2) NOT NULL DEFAULT 0.00,
  `checkin` double(20,2) NOT NULL DEFAULT 0.00,
  `reword_balance` double(20,2) NOT NULL DEFAULT 0.00,
  `invest_cumulative_balance_received` double(20,2) NOT NULL DEFAULT 0.00,
  `invest_cumulative_balance` double(20,2) NOT NULL DEFAULT 0.00,
  `interest_cumulative_balance_received` double(20,2) NOT NULL DEFAULT 0.00,
  `interest_cumulative_balance` double(20,2) NOT NULL DEFAULT 0.00,
  `photo` varchar(255) DEFAULT NULL,
  `gateway_method` varchar(50) DEFAULT NULL,
  `gateway_number` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ban_unban` enum('ban','unban') NOT NULL DEFAULT 'unban',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ref_by`, `ref_id`, `name`, `realname`, `phone_code`, `phone`, `ip`, `username`, `package_tab`, `email`, `email_verified_at`, `password`, `type`, `balance`, `deposit_balance`, `receive_able_amount`, `checkin`, `reword_balance`, `invest_cumulative_balance_received`, `invest_cumulative_balance`, `interest_cumulative_balance_received`, `interest_cumulative_balance`, `photo`, `gateway_method`, `gateway_number`, `remember_token`, `status`, `ban_unban`, `created_at`, `updated_at`) VALUES
(1, '927033947', 'rq13268am', 'USDT TRC20', NULL, '+880', '7000000000', '127.0.0.1', 'uname7000000000', 'vip', 'user155721733414846@gmail.com', NULL, '$2y$10$DYxCn9roQtZF9cyFb7KhC.wxstFNYShl4tpvYWtbA.z6gus5kd07u', NULL, 49000.00, 199400.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 'trc20', 'fgfgsdfgsdfsdfsggg', NULL, 'active', 'unban', '2024-12-05 19:07:26', '2024-12-05 21:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_ledgers`
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
-- Dumping data for table `user_ledgers`
--

INSERT INTO `user_ledgers` (`id`, `user_id`, `get_balance_from_user_id`, `reason`, `perticulation`, `amount`, `debit`, `credit`, `status`, `date`, `step`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'withdraw_request', 'Your withdraw request has been approved', 1000, 980, 0, 'approved', '06-12-2024 00:50', NULL, '2024-12-05 21:50:23', '2024-12-05 21:50:23'),
(2, 1, NULL, 'withdraw_request', 'Your withdraw request status is pending please wait for admin approval or communication with us.', 1000, 980, 0, 'pending', '06-12-2024 00:55', NULL, '2024-12-05 21:55:10', '2024-12-05 21:55:10'),
(3, 1, NULL, 'withdraw_request', 'Your withdraw request status is pending please wait for admin approval or communication with us.', 1000, 980, 0, 'pending', '06-12-2024 00:56', NULL, '2024-12-05 21:56:28', '2024-12-05 21:56:28'),
(4, 1, NULL, 'withdraw_approved', 'Your withdraw already approved. thanks for withdraw in our Miner', 1000, 980, 0, 'approved', '06-12-2024 00:56', NULL, '2024-12-05 21:56:46', '2024-12-05 21:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `vip_sliders`
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
-- Dumping data for table `vip_sliders`
--

INSERT INTO `vip_sliders` (`id`, `photo`, `status`, `page_type`, `created_at`, `updated_at`) VALUES
(11, '/upload/slider/1688711605xsK.jpg', 'active', 'home_page', '2023-07-05 01:06:16', '2023-07-07 04:33:25'),
(12, '/upload/slider/1688711639ObA.jpg', 'active', 'home_page', '2023-07-05 01:06:35', '2023-07-07 04:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `oid` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `currency` varchar(40) NOT NULL,
  `rate` decimal(20,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `trx` varchar(40) DEFAULT NULL,
  `order_id` text DEFAULT NULL,
  `final_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `after_charge` decimal(20,2) NOT NULL DEFAULT 0.00,
  `withdraw_information` text DEFAULT NULL,
  `account_info` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending' COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `method_name`, `oid`, `number`, `amount`, `currency`, `rate`, `charge`, `trx`, `order_id`, `final_amount`, `after_charge`, `withdraw_information`, `account_info`, `status`, `admin_feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 'trc20', 'W-293909838678644558', 'fgfgsdfgsdfsdfsggg', 1000.00, 'USD', 0.00, 20.00, 'W-293909838678644558', '1733424623', 980.00, 0.00, NULL, '{\"bank_account\":\"fgfgsdfgsdfsdfsggg\",\"full_name\":\"USDT TRC20\",\"bank_name\":\"USDT TRC20\",\"bank_code\":\"trc20\",\"swift_code\":\"trc20\"}', 'approved', NULL, '2024-12-05 21:50:23', '2024-12-05 21:50:23'),
(2, 1, 'trc20', 'W-29295472424332737', 'fgfgsdfgsdfsdfsggg', 1000.00, 'USD', 0.00, 20.00, 'W-29295472424332737', 'W-29295472424332737', 980.00, 0.00, NULL, '{\"bank_account\":\"fgfgsdfgsdfsdfsggg\",\"full_name\":\"USDT TRC20\",\"bank_name\":\"USDT TRC20\",\"bank_code\":\"trc20\",\"swift_code\":\"trc20\"}', 'rejected', NULL, '2024-12-05 21:55:10', '2024-12-05 21:55:21'),
(3, 1, 'trc20', 'W-85878768144230257', 'fgfgsdfgsdfsdfsggg', 1000.00, 'USD', 0.00, 20.00, 'W-85878768144230257', 'W-85878768144230257', 980.00, 0.00, NULL, '{\"bank_account\":\"fgfgsdfgsdfsdfsggg\",\"full_name\":\"USDT TRC20\",\"bank_name\":\"USDT TRC20\",\"bank_code\":\"trc20\",\"swift_code\":\"trc20\"}', 'approved', '----', '2024-12-05 21:56:28', '2024-12-05 21:56:46');

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
-- Indexes for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_lists`
--
ALTER TABLE `bank_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkins_user_id_foreign` (`user_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypto_wallets`
--
ALTER TABLE `crypto_wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usdts_user_id_foreign` (`user_id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lucky_ledgers_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_package_id_foreign` (`package_id`);

--
-- Indexes for table `rebates`
--
ALTER TABLE `rebates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_lists`
--
ALTER TABLE `bank_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bonus_ledgers`
--
ALTER TABLE `bonus_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crypto_wallets`
--
ALTER TABLE `crypto_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rebates`
--
ALTER TABLE `rebates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_ledgers`
--
ALTER TABLE `user_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vip_sliders`
--
ALTER TABLE `vip_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `checkins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lucky_ledgers`
--
ALTER TABLE `lucky_ledgers`
  ADD CONSTRAINT `lucky_ledgers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
