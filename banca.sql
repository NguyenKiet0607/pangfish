-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2024 lúc 05:49 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banca`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(191) NOT NULL,
  `coin` int(11) NOT NULL DEFAULT 0,
  `total_credit` int(11) NOT NULL DEFAULT 0,
  `tenant_code` varchar(50) DEFAULT NULL,
  `role` tinyint(4) NOT NULL COMMENT '1: superadmin, 2: admin, 3: develop',
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `email`, `username`, `coin`, `total_credit`, `tenant_code`, `role`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin@gmail.com', 'superadmin', 0, 0, NULL, 1, '$2y$12$0Z/Osb7qlJII2c0nj6kjpOVhXSiRK.fOsWd0o7w4VLJInLGAdeWai', 1, NULL, NULL, NULL),
(2, 'admin@gmail.com', 'admin', 0, 0, NULL, 2, '$2y$12$MDPv4OjElnl5QGS0GfZhx.VQQbG4y1y8bNeIjg9nE6ZgWGGDx4PtC', 1, NULL, NULL, NULL),
(3, 'develop@gmail.com', 'develop', 0, 0, NULL, 3, '$2y$12$54eM0JAPGYOFol5mAXcIuOcXVgg/SWoEgu7dVu7ZupWzSstC1Jq.G', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `codes`
--

CREATE TABLE `codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: inactive, 1: active',
  `use_by` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(64) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `priority` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL DEFAULT 0,
  `workplace` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: all, 1: web, 2: app',
  `round_start` time DEFAULT NULL,
  `round_end` time DEFAULT NULL,
  `round_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `games`
--

INSERT INTO `games` (`id`, `name`, `image_url`, `parent_id`, `priority`, `slug`, `percent`, `workplace`, `round_start`, `round_end`, `round_count`, `created_at`, `updated_at`) VALUES
(1, 'PG2 Điện Tử', 'pg.png', 0, 44, 'pg2-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(2, 'CQ9 Điện tử', 'cq9.png', 0, 44, 'cq9-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(3, 'JDB Điện Tử', 'jdb.png', 0, 43, 'jili-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(4, 'PP Điện tử', 'pp.png', 0, 43, 'pp-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(5, 'FC Điện tử', 'fc.png', 0, 42, 'fc-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(6, 'B Điện tử', 'b.png', 0, 42, 'b-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(7, 'Jili Điện tử', 'jl.png', 0, 41, 'jili-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(8, 'KA Điện tử', 'ka.png', 0, 41, 'ka-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(9, 'Askeme Điện tử', 'askme.png', 0, 40, 'askme-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(10, 'BG Điện tử', 'bg.png', 0, 40, 'bg-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(11, 'RTG Điện tử', 'RTG.png', 0, 39, 'rtg-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(12, 'Rich 88 Điện tử', 'R88.png', 0, 39, 'r88-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(13, 'VA Điện tử', 'va.png', 0, 38, 'va-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(14, 'NS Điện tử', 'ns.png', 0, 38, 'ns-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(15, 'MG Điện tử', 'mg.png', 0, 37, 'mg-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(16, 'YB Điện tử', 'yb.png', 0, 37, 'yb-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(17, 'BNG Điện tử', 'bng.png', 0, 36, 'bng-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(18, 'Gem Điện tử', 'gem.png', 0, 36, 'gem-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(19, 'VA Điện tử', 'va.png', 0, 35, 'va-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(20, 'T1 Điện tử', 't1.png', 0, 35, 't1-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(21, 'AFB Điện tử', 'afb.png', 0, 34, 'afb-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(22, 'NS Điện tử', 'ns.png', 0, 33, 'ns-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(23, 'MW Điện tử', 'mw.png', 0, 32, 'mw-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(24, 'YB Điện tử', 'yb.png', 0, 31, 'yb-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(25, 'Askme Điện tử', 'askme.png', 0, 30, 'askme-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(26, 'RTG Điện tử', 'rtg.png', 0, 29, 'rtg-dien-tu', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(27, 'Jili bắn cá', 'jili.png', 0, 28, 'jili-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(28, 'BG bắn cá', 'bg.png', 0, 27, 'bg-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(29, 'TP bắn cá', 'tp.png', 0, 26, 'tp-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(30, 'JDB bắn cá', 'jdb.png', 0, 25, 'jdb-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(31, 'KA bắn cá', 'ka.png', 0, 24, 'ka-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(32, 'FC bắn cá', 'fc.png', 0, 23, 'fc-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(33, 'PS bắn cá', 'ps.png', 0, 22, 'ps-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(34, 'MG bắn cá', 'mg.png', 0, 21, 'mg-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(35, 'R88 bắn cá', 'r88.png', 0, 20, 'r88-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(36, 'FTG bắn cá', 'ftg.png', 0, 19, 'ftg-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(37, 'VA bắn cá', 'va.png', 0, 18, 'va-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(38, 'RTG bắn cá', 'rtg.png', 0, 17, 'rtg-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(39, 'YB bắn cá', 'yb.png', 0, 16, 'yb-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(40, 'Askme bắn cá', 'askme.png', 0, 15, 'askme-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(41, 'NS bắn cá', 'ns.png', 0, 14, 'ns-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(42, 'BSP bắn cá', 'bsp.png', 0, 13, 'bsp-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(43, 'RG bắn cá', 'rg.png', 0, 12, 'rg-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(44, 'CQ9 bắn cá', 'cq9.png', 0, 11, 'cq9-ban-ca', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41'),
(45, 'Kho báu Aztec', 'cq9.png', 1, 15, 'kho-bau-aztec', 0, 0, NULL, NULL, NULL, '2024-11-01 04:37:41', '2024-11-01 04:37:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_10_155611_create_admins_table', 1),
(6, '2024_05_10_155645_create_games_table', 1),
(7, '2024_05_13_151648_create_codes_table', 1),
(8, '2024_05_15_141434_edit_users_table', 1),
(9, '2024_05_15_151500_edit_admins_table', 1),
(10, '2024_05_16_142821_add_workplace_to_games_table', 1),
(11, '2024_05_30_161913_edit_type_phone_in_users_table', 1),
(12, '2024_06_06_125933_add_last_login_in_users_table', 1),
(13, '2024_06_06_162541_add_ip_to_user_table', 1),
(14, '2024_06_06_162541_add_total_credit_to_admins_table', 1),
(15, '2024_06_06_162541_add_total_credit_to_user_table', 1),
(16, '2024_06_06_175933_add_use_by_in_code_table', 1),
(17, '2024_08_03_164130_add_round_to_games_table', 1),
(18, '2024_08_15_134240_add_expired_time_to_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(50) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `coin` int(11) NOT NULL DEFAULT 0,
  `expired_time` int(11) NOT NULL DEFAULT 0,
  `total_credit` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(20) DEFAULT NULL,
  `phone_zalo` varchar(20) DEFAULT NULL,
  `tenant_code` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `ip` varchar(191) NOT NULL DEFAULT '0',
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `staff_id`, `name`, `coin`, `expired_time`, `total_credit`, `phone`, `phone_zalo`, `tenant_code`, `status`, `last_login`, `ip`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test_tool', NULL, 'User Test Tool', 0, 0, 0, '0123456789', NULL, NULL, 1, '2024-11-01 11:38:50', '127.0.0.1', '$2y$12$ssA2egVCGXQ64lMXpwlbaOEOXVWemsXANTDW4XK4vFfNdM5U2RsEK', '2024-11-01 04:37:41', '2024-11-01 04:38:50', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codes_code_unique` (`code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `codes`
--
ALTER TABLE `codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
