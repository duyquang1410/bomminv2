-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 10, 2020 lúc 02:11 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `karaoke`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT 0,
  `payment_id` int(11) DEFAULT 0 COMMENT 'Phiếu thanh toán',
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tên sản phẩm',
  `qty` int(11) DEFAULT NULL COMMENT 'Số lượng',
  `price` int(11) DEFAULT NULL COMMENT 'giá sản phẩm',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `product_id`, `payment_id`, `title`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(25, 4, 24, 'rượu bình thường', 1, 80000, '2020-08-09 01:01:29', '2020-08-09 01:01:29'),
(26, 3, 24, 'Rượu Vang Chile 168', 1, 224000, '2020-08-09 01:01:29', '2020-08-09 01:01:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 2),
(19, '2018_12_17_143447_create_position_table', 2),
(20, '2019_01_13_111444_create_category_products_table', 2),
(21, '2019_01_22_202312_create_suppliers_table', 2),
(22, '2019_01_22_212221_create_units_table', 2),
(23, '2019_01_22_215347_create_products_table', 3),
(24, '2019_01_23_230301_create_product_category_table', 4),
(25, '2019_02_07_151148_create_product_types_table', 5),
(26, '2019_02_13_225642_create_product_type_ids_table', 6),
(27, '2019_02_15_001155_create_pages_table', 7),
(28, '2019_03_16_232501_create_sliders_table', 8),
(29, '2019_03_19_211921_create_customerreviews_table', 9),
(30, '2019_04_13_181041_create_shoppingcart_table', 10),
(31, '2019_04_21_105458_create_customer_users_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `startDate` timestamp NULL DEFAULT NULL,
  `endDate` timestamp NULL DEFAULT NULL,
  `totalTimeHour` int(11) DEFAULT NULL,
  `totalTimeMin` int(11) DEFAULT NULL,
  `totalMoney` int(11) DEFAULT NULL,
  `totalMoneySing` int(11) DEFAULT 0,
  `totalMoneyFood` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `day` int(11) DEFAULT 0,
  `month` int(11) DEFAULT 0,
  `year` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `room_id`, `price`, `user_id`, `startDate`, `endDate`, `totalTimeHour`, `totalTimeMin`, `totalMoney`, `totalMoneySing`, `totalMoneyFood`, `status`, `day`, `month`, `year`, `created_at`, `updated_at`) VALUES
(24, 2, 300000, 385, '2020-08-09 01:01:07', '2020-08-09 01:01:12', 0, 0, 304000, 0, 304000, 2, 9, 8, 2020, '2020-08-09 01:01:07', '2020-08-09 01:01:29'),
(25, 1, 250000, 385, '2020-08-09 15:22:06', '2020-08-09 23:56:48', 8, 34, NULL, 2142000, 0, 1, 10, 8, 2020, '2020-08-09 15:22:06', '2020-08-09 23:56:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL COMMENT 'Giá tiền bán cho khách',
  `priceEntry` int(11) DEFAULT 0 COMMENT 'Giá nhập hàng vào',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL COMMENT 'Tổng số SP',
  `totalSold` int(255) DEFAULT 0 COMMENT 'Đã bán',
  `totalRest` int(255) DEFAULT 0 COMMENT 'Tổng còn lại',
  `totalAmountEntered` int(255) DEFAULT 0 COMMENT 'Tổng tiền nhập',
  `totalProceeds` int(255) DEFAULT 0 COMMENT 'Tổng tiền thu',
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `price`, `priceEntry`, `image`, `total`, `totalSold`, `totalRest`, `totalAmountEntered`, `totalProceeds`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Bia hà nội', 15000, 0, '1596196581.jpg', 50, 23, 27, 150000, 0, 1, '2020-07-31 11:56:21', '2020-08-08 00:00:07'),
(2, 385, 'Thuốc lá Vinataba', 15000, 0, '1596196891.jpg', 30, 27, 3, 0, 0, 1, '2020-07-31 12:01:31', '2020-08-08 22:07:31'),
(3, 385, 'Rượu Vang Chile 168', 224000, 0, '1596198024.png', 10, 13, -3, 0, 0, 1, '2020-07-31 12:20:24', '2020-08-09 01:01:29'),
(4, 385, 'rượu bình thường', 80000, 0, '1596198064.jpg', 10, 9, 1, 0, 0, 1, '2020-07-31 12:21:04', '2020-08-09 01:01:29'),
(5, 385, 'Bia haliken', 15000, 0, '1596198086.jpg', 100, 1, 99, 0, 0, 1, '2020-07-31 12:21:26', '2020-08-08 22:07:31'),
(6, 385, 'Coca cola nước ngọt', 15000, 0, '1596198109.jpg', 100, 2, 98, 0, 0, 1, '2020-07-31 12:21:49', '2020-08-08 13:42:19'),
(7, 385, 'Pepsi', 15000, 0, '1596198131.jpg', 100, 5, 95, 0, 0, 1, '2020-07-31 12:22:11', '2020-08-08 22:07:31'),
(8, 385, 'Bimbim', 15000, 0, '1596198172.jpg', 106, 5, 101, 800000, 0, 1, '2020-07-31 12:22:52', '2020-08-08 22:07:31'),
(15, 385, 'Bia haliken', 20000, 15000, '1596736769.jpg', 16, 0, 0, 250000, 0, 1, '2020-08-06 17:59:29', '2020-08-06 18:34:33'),
(16, 385, 'test', 25000, 20000, NULL, 10, 0, 0, 200000, 0, 1, '2020-08-09 15:39:19', '2020-08-09 15:39:19'),
(17, 385, 'test 131313', 40000, 34000, NULL, 1000, 0, 0, 34000000, 0, 1, '2020-08-09 15:39:51', '2020-08-09 15:39:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Phòng 1', '250000', 1, '2020-07-31 10:48:52', '2020-08-09 15:22:06'),
(2, 'Phòng VIP 1', '300000', 0, '2020-07-31 10:48:52', '2020-08-09 01:01:29'),
(3, 'Phòng VIP 2', '350000', 0, '2020-07-31 10:49:48', '2020-08-07 23:43:12'),
(4, 'Phòng 3', '200000', 0, '2020-07-31 10:49:48', '2020-08-08 17:24:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salarys`
--

CREATE TABLE `salarys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `total_Money` int(11) DEFAULT 0,
  `suggest_Money` int(11) DEFAULT 0,
  `realField_Money` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `salarys`
--

INSERT INTO `salarys` (`id`, `user_id`, `month`, `year`, `total_Money`, `suggest_Money`, `realField_Money`, `status`, `created_at`, `updated_at`) VALUES
(1, 384, 7, 2020, 4325000, 9650000, -5325000, 1, '2020-07-24 17:17:41', '2020-07-27 22:30:12'),
(2, 388, 7, 2020, 334000, 200000, 134000, 0, '2020-07-27 15:07:31', '2020-07-31 06:51:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `code`, `name`, `price`, `note`, `created_at`, `updated_at`) VALUES
(6, 2, 'Đi bay', '200000', NULL, '2020-07-22 14:53:33', '2020-07-30 16:28:05'),
(11, 1, 'Đi hát với khách', '120000', NULL, '2020-07-22 16:42:06', '2020-07-30 16:25:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suggestmoneys`
--

CREATE TABLE `suggestmoneys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `numberMoney` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suggestmoneys`
--

INSERT INTO `suggestmoneys` (`id`, `user_id`, `month`, `year`, `numberMoney`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 384, 7, 2020, 2000000, 'Em muốn tạm ứng 2 triệu', 0, '2020-07-25 06:00:50', '2020-07-25 06:00:50'),
(2, 384, 7, 2020, 200000, 'Em muốn tạm ứng 200 nghìn', 1, '2020-07-25 06:03:41', '2020-07-26 15:24:52'),
(3, 384, 7, 2020, 300000, 'Em muốn tạm ứng 300 nghìn , e cảm ơn nhé', 1, '2020-07-25 06:04:24', '2020-07-26 15:13:18'),
(4, 384, 7, 2020, NULL, NULL, 0, '2020-07-25 14:59:46', '2020-07-25 14:59:46'),
(5, 384, 7, 2020, 150000, 'adadadadd', 1, '2020-07-25 15:07:21', '2020-07-26 12:40:25'),
(6, 384, 7, 2020, 9000000, 'em can tien nên mong a ứng cho em', 1, '2020-07-25 16:16:01', '2020-07-26 15:33:49'),
(7, 388, 7, 2020, 200000, 'Tạm ứng lương', 1, '2020-07-27 15:08:54', '2020-07-27 22:27:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timekeepings`
--

CREATE TABLE `timekeepings` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `checkin` timestamp NULL DEFAULT NULL,
  `checkout` timestamp NULL DEFAULT NULL,
  `hour` int(11) DEFAULT NULL COMMENT 'Tổng giờ chấm công',
  `min` int(11) DEFAULT NULL COMMENT 'phút',
  `totalmoney` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_cv` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ làm việc',
  `service_id` int(255) DEFAULT NULL COMMENT 'Dịch vụ, công việc',
  `price` int(11) DEFAULT NULL,
  `day` int(255) DEFAULT NULL COMMENT 'Ngày chấm công',
  `month` int(11) DEFAULT NULL COMMENT 'Tháng chấm công',
  `year` int(11) DEFAULT NULL COMMENT 'Năm checkin\r\n',
  `status` int(11) DEFAULT 1 COMMENT 'Trạng thái check',
  `adminStatus` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `timekeepings`
--

INSERT INTO `timekeepings` (`id`, `user_id`, `checkin`, `checkout`, `hour`, `min`, `totalmoney`, `address_cv`, `service_id`, `price`, `day`, `month`, `year`, `status`, `adminStatus`, `created_at`, `updated_at`) VALUES
(1, 384, '2020-07-22 18:09:03', '2020-07-23 15:52:35', 21, 43, '4343000', 'adadadad', 11, 200000, 23, 7, 2020, 2, 0, '2020-07-22 18:09:03', '2020-07-23 15:52:35'),
(3, 384, '2020-07-23 16:09:44', '2020-07-23 16:38:25', 0, 29, '121000', NULL, 6, 250000, 23, 7, 2020, 2, 0, '2020-07-23 16:09:44', '2020-07-23 16:38:25'),
(4, 384, '2020-07-23 17:03:33', '2020-07-23 17:03:43', 0, 0, '0', 'âdadadadd', 11, 200000, 24, 7, 2020, 2, 0, '2020-07-23 17:03:33', '2020-07-23 17:03:43'),
(5, 384, '2020-07-23 17:07:34', '2020-07-23 17:09:10', 0, 2, '8000', NULL, 6, 250000, 24, 7, 2020, 2, 0, '2020-07-23 17:07:34', '2020-07-23 17:09:10'),
(6, 384, '2020-07-23 18:21:21', '2020-07-23 19:10:40', 0, 49, '204000', 'quán karaoke Bommin , Hoàng Gia', 6, 250000, 24, 7, 2020, 2, 0, '2020-07-23 18:21:21', '2020-07-23 19:10:40'),
(7, 384, '2020-07-24 15:57:38', '2020-07-24 15:58:16', 0, 1, '4000', NULL, 6, 250000, 24, 7, 2020, 2, 0, '2020-07-24 15:57:38', '2020-07-24 15:58:16'),
(8, 384, '2020-07-24 15:59:04', '2020-07-24 15:59:12', 0, 0, '0', NULL, 6, 250000, 24, 7, 2020, 2, 0, '2020-07-24 15:59:04', '2020-07-24 15:59:12'),
(9, 384, '2020-07-24 16:50:10', '2020-07-24 17:05:37', 0, 0, '0', NULL, 6, 250000, 24, 7, 2020, 2, 0, '2020-07-24 16:50:10', '2020-07-24 17:05:37'),
(10, 384, '2020-07-24 17:16:25', '2020-07-24 17:17:41', 0, 1, '4000', NULL, 6, 250000, 25, 7, 2020, 2, 0, '2020-07-24 17:16:25', '2020-07-24 17:17:41'),
(11, 384, '2020-07-24 17:22:44', '2020-07-24 17:45:28', 0, 23, '96000', NULL, 6, 250000, 25, 7, 2020, 2, 0, '2020-07-24 17:22:44', '2020-07-24 17:45:28'),
(12, 384, '2020-07-24 17:47:56', '2020-07-24 17:53:07', 0, 6, '25000', NULL, 6, 250000, 25, 7, 2020, 2, 0, '2020-07-24 17:47:56', '2020-07-24 17:53:07'),
(13, 384, '2020-07-24 17:53:50', '2020-07-24 17:53:55', 0, 0, '0', NULL, 6, 250000, 25, 7, 2020, 2, 0, '2020-07-24 17:53:50', '2020-07-24 17:53:55'),
(14, 384, '2020-07-24 17:55:43', '2020-07-24 17:55:49', 0, 0, '0', NULL, 11, 200000, 25, 7, 2020, 2, 0, '2020-07-24 17:55:43', '2020-07-24 17:55:49'),
(15, 384, '2020-07-24 17:56:22', '2020-07-24 18:16:45', 0, 20, '83000', NULL, 6, 250000, 25, 7, 2020, 2, 0, '2020-07-24 17:56:22', '2020-07-24 18:16:45'),
(16, 384, '2020-07-24 18:20:14', '2020-07-25 01:08:45', 6, 48, '1700000', NULL, 6, 250000, 25, 7, 2020, 2, 0, '2020-07-24 18:20:14', '2020-07-25 01:08:45'),
(17, 384, '2020-07-24 16:50:10', '2020-07-24 17:05:37', 0, 0, '0', NULL, 6, 250000, 24, 7, 2020, 2, 0, '2020-07-24 16:50:10', '2020-07-24 17:05:37'),
(18, 384, '2020-07-25 06:07:00', '2020-07-25 14:58:54', 8, 51, '2213000', NULL, 6, 250000, 25, 7, NULL, 2, 0, '2020-07-25 06:07:00', '2020-07-25 14:58:54'),
(19, 384, '2020-07-25 16:09:15', '2020-07-25 17:25:11', 0, 0, '0', NULL, 6, 250000, 25, 7, NULL, 2, 0, '2020-07-25 16:09:15', '2020-07-25 17:25:11'),
(20, 384, '2020-07-25 17:36:59', '2020-07-25 17:57:39', 0, 21, '88000', NULL, 6, 250000, 26, 7, NULL, 2, 0, '2020-07-25 17:36:59', '2020-07-25 17:57:39'),
(21, 384, '2020-07-26 02:23:16', '2020-07-26 02:40:56', 0, 17, '57000', 'quán karaoke Bommin , Hoàng Gia', 11, 200000, 26, 7, NULL, 2, 0, '2020-07-26 02:23:16', '2020-07-26 02:40:56'),
(22, 384, '2020-07-26 02:43:52', '2020-07-26 02:46:30', 0, 3, '13000', NULL, 6, 250000, 26, 7, NULL, 2, 0, '2020-07-26 02:43:52', '2020-07-26 02:46:30'),
(23, 384, '2020-07-26 02:49:26', '2020-07-26 03:07:39', 0, 18, '75000', NULL, 6, 250000, 26, 7, NULL, 2, 0, '2020-07-26 02:49:26', '2020-07-26 03:07:39'),
(24, 384, '2020-07-26 15:14:25', '2020-07-26 15:14:30', 0, 0, '0', NULL, 6, 250000, 26, 7, NULL, 2, 0, '2020-07-26 15:14:25', '2020-07-26 15:14:30'),
(25, 388, '2020-07-27 15:03:19', '2020-07-27 15:07:31', 0, 4, '13000', 'quán karaoke Bommin , Hoàng Gia', 11, 200000, 27, 7, NULL, 2, 0, '2020-07-27 15:03:19', '2020-07-27 15:07:31'),
(26, 388, '2020-07-27 15:23:23', '2020-07-27 16:32:30', 1, 9, '288000', NULL, 6, 250000, 27, 7, NULL, 2, 0, '2020-07-27 15:23:23', '2020-07-27 16:32:30'),
(27, 388, '2020-07-27 16:34:06', '2020-07-27 16:36:50', 0, 2, '8000', NULL, 6, 250000, 27, 7, NULL, 2, 0, '2020-07-27 16:34:06', '2020-07-27 16:36:50'),
(28, 388, '2020-07-27 16:38:11', '2020-07-27 16:42:03', 0, 4, '17000', NULL, 6, 250000, 27, 7, NULL, 2, 0, '2020-07-27 16:38:11', '2020-07-27 16:42:03'),
(29, 388, '2020-07-27 17:04:21', '2020-07-27 17:16:23', 0, 12, '50000', NULL, 6, 250000, 28, 7, NULL, 2, 0, '2020-07-27 17:04:21', '2020-07-27 17:16:23'),
(31, 388, '2020-07-30 16:36:18', '2020-07-30 16:43:08', 0, 7, '23000', 'quán karaoke Bommin , Hoàng Gia', 6, 200000, 30, 7, NULL, 2, 2, '2020-07-30 16:36:18', '2020-07-31 06:51:43'),
(32, 388, '2020-07-30 16:44:20', '2020-07-30 17:08:41', 0, 0, '0', 'quán karaoke Bommin , Hoàng Gia', 11, 120000, 30, 7, NULL, 2, 0, '2020-07-30 16:44:20', '2020-07-30 17:08:41'),
(36, 388, '2020-07-31 03:40:38', '2020-07-31 03:43:46', 0, 3, '6000', 'fly hourse', 11, 120000, 31, 7, NULL, 2, 1, '2020-07-31 03:40:38', '2020-07-31 06:37:45'),
(37, 388, '2020-07-31 06:01:58', '2020-07-31 06:10:27', 0, 9, '18000', 'quán karaoke Bommin , Hoàng Gia', 11, 120000, 31, 7, NULL, 2, 1, '2020-07-31 06:01:58', '2020-07-31 06:37:28'),
(39, 388, '2020-07-31 06:50:28', NULL, NULL, NULL, NULL, NULL, 11, NULL, 31, 7, NULL, 1, 0, '2020-07-31 06:50:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Họ và tên',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tên đăng nhập',
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ảnh đại diện',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Email',
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mật khẩu',
  `confirmPassword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nhập lại mật khẩu',
  `role` int(11) DEFAULT 1 COMMENT 'Vai trò',
  `birthday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT 1,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passtext` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zalo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `avatar`, `email`, `phone`, `password`, `confirmPassword`, `role`, `birthday`, `gender`, `address`, `passtext`, `facebook`, `zalo`, `information`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(383, 'Nguyễn Quang test 123', 'quangnd1234', '1596016663.png', NULL, '0982039380', '$2y$10$Mx9TTptYiGEFJqnrg8ESOOiNX0MuXC6j4J2R543TmeCm9HJAsNYri', '$2y$10$zGG2DA6Qs3wJUZTr8W5vveqmhmmJUPwBtYja3CYIwoNH8ql87U/Wm', 2, NULL, 1, 'Hai Bà trưng . hà nội', '123', NULL, NULL, NULL, 1, NULL, '2020-07-19 18:21:03', '2020-07-29 09:57:43'),
(384, 'Nguyễn Duy Quang', 'adminq', '1595183096.jpg', '', '0982039380', '$2y$10$NCBSnNdipwxHZQRmMUHF.O8vOL9XvTgIsj58KpF3dmODiY/GN9c9O', NULL, 2, '14.10.1995', 1, '', '0982039380', '', '', '', 1, 'frNRuzcOaiCmnmqlHfAtuV1H9TNyWUiypnAnE7LYLo2rPGxVeD2SdNCdTj85', '2020-07-19 18:24:56', '2020-07-19 18:24:56'),
(385, 'admin Bom Min', 'bommin', '1595183303.png', NULL, '0982039380', '$2y$10$/kVRuBCVyTbQJUjz/Kh4dOOZQxROyggAI7pdZVWALhHpe2M32b6AK', NULL, 1, '14.10.1995', 1, 'Thái Nguyên', '0982039380', NULL, NULL, NULL, 1, 'N0PKxzeeYHZp8kVS1kJjUo6b4UnNMQyLPwB7t4ahldbHh4wx4pS0NZn9kGUc', '2020-07-19 18:28:23', '2020-07-19 18:28:23'),
(388, 'Trần Diệu Thanh', 'thanh', '1596166931.jpg', NULL, '0982039380', '$2y$10$p/r03MA5KYfKNxX2lbvx4.MN26ys/U8nWMfPtYIwCen.yizPAAWFi', NULL, 2, NULL, 2, 'Hoàng Quốc Việt , Hà Nội', '0982039380', NULL, NULL, NULL, NULL, 'GG7Grax1K8BrOAbe0sJoQvUnNALW8ZjiylSV9O4GaJxaKC4vYZQeXxW2UZEU', '2020-07-27 14:45:31', '2020-07-31 03:42:11'),
(390, 'Nguyễn Văn A', '123', '1596195264.png', NULL, '0982039380', '$2y$10$J7E7/Bj.WkAoKO6AJoWF6un6absEj3zlF.WyJRaPdv1YbHHMXLXSa', NULL, 2, NULL, 1, 'Hoàng Quốc Việt , Hà Nội', '123', NULL, NULL, NULL, 1, NULL, '2020-07-31 11:34:24', '2020-07-31 11:34:24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `salarys`
--
ALTER TABLE `salarys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suggestmoneys`
--
ALTER TABLE `suggestmoneys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `timekeepings`
--
ALTER TABLE `timekeepings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_time` (`user_id`),
  ADD KEY `work_id` (`service_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `salarys`
--
ALTER TABLE `salarys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `suggestmoneys`
--
ALTER TABLE `suggestmoneys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `timekeepings`
--
ALTER TABLE `timekeepings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `timekeepings`
--
ALTER TABLE `timekeepings`
  ADD CONSTRAINT `user_id_time` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
