-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2020 lúc 02:27 AM
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
(10, 2, 300000, 385, '2020-08-07 14:43:35', '2020-08-07 18:50:34', 4, 7, 1970000, 1235000, 735000, 2, 7, 8, 2020, '2020-08-07 14:43:35', '2020-08-07 19:13:18'),
(11, 1, 250000, 385, '2020-08-07 14:43:40', '2020-08-07 23:29:21', 8, 46, 2192000, 2192000, 0, 2, 7, 8, 2020, '2020-08-07 14:43:40', '2020-08-07 23:29:31'),
(12, 4, 200000, 385, '2020-08-07 23:31:15', '2020-08-07 23:36:19', 0, 5, 107000, 17000, 90000, 2, 8, 8, 2020, '2020-08-07 23:31:15', '2020-08-07 23:37:01'),
(13, 3, 350000, 385, '2020-08-07 23:40:58', '2020-08-07 23:42:53', 0, 2, 102000, 12000, 90000, 2, 0, 0, 0, '2020-08-07 23:40:58', '2020-08-07 23:43:12'),
(14, 1, 250000, 385, '2020-08-07 23:41:03', '2020-08-07 23:45:42', 0, 4, 167000, 17000, 150000, 2, 0, 0, 0, '2020-08-07 23:41:03', '2020-08-07 23:46:11'),
(15, 1, 250000, 385, '2020-08-07 23:48:21', '2020-08-07 23:58:25', 0, 10, 1282000, 42000, 1240000, 2, 0, 0, 0, '2020-08-07 23:48:21', '2020-08-07 23:58:45'),
(16, 4, 200000, 385, '2020-08-07 23:48:22', '2020-08-07 23:54:19', 0, 6, 170000, 20000, 150000, 2, 0, 0, 0, '2020-08-07 23:48:22', '2020-08-07 23:54:32'),
(17, 1, 250000, 385, '2020-08-07 23:58:54', '2020-08-08 00:00:29', 0, 2, 536000, 8000, 528000, 2, 0, 0, 0, '2020-08-07 23:58:54', '2020-08-08 00:01:19'),
(18, 4, 200000, 385, '2020-08-07 23:58:55', '2020-08-07 23:59:40', 0, 1, 538000, 3000, 535000, 2, 0, 0, 0, '2020-08-07 23:58:55', '2020-08-08 00:00:07'),
(19, 4, 200000, 385, '2020-08-08 13:35:58', '2020-08-08 13:36:45', 0, 1, 412000, 3000, 409000, 2, 0, 0, 0, '2020-08-08 13:35:58', '2020-08-08 13:42:19'),
(20, 4, 200000, 385, '2020-08-08 14:57:49', '2020-08-08 17:23:01', 2, 26, 791000, 487000, 304000, 2, 9, 8, 2020, '2020-08-08 14:57:49', '2020-08-08 17:24:21'),
(21, 1, 250000, 385, '2020-08-08 14:58:31', '2020-08-08 22:07:24', 7, 9, 2655000, 1788000, 867000, 2, 9, 8, 2020, '2020-08-08 14:58:31', '2020-08-08 22:07:31'),
(23, 1, 250000, 385, '2020-08-08 22:48:15', '2020-08-08 23:37:33', 0, 49, NULL, 204000, 0, 1, 9, 8, 2020, '2020-08-08 22:48:15', '2020-08-08 23:37:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
