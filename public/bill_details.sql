-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2020 lúc 02:26 AM
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
(1, 2, 13, 'Thuốc lá Vinataba', 3, 15000, '2020-08-07 23:43:12', '2020-08-07 23:43:12'),
(2, 2, 14, 'Thuốc lá Vinataba', 5, 15000, '2020-08-07 23:46:11', '2020-08-07 23:46:11'),
(3, 1, 16, 'Bia hà nội', 5, 15000, '2020-08-07 23:54:32', '2020-08-07 23:54:32'),
(4, 2, 16, 'Thuốc lá Vinataba', 5, 15000, '2020-08-07 23:54:32', '2020-08-07 23:54:32'),
(5, 1, 15, 'Bia hà nội', 4, 15000, '2020-08-07 23:58:45', '2020-08-07 23:58:45'),
(6, 2, 15, 'Thuốc lá Vinataba', 4, 15000, '2020-08-07 23:58:45', '2020-08-07 23:58:45'),
(7, 3, 15, 'Rượu Vang Chile 168', 5, 224000, '2020-08-07 23:58:45', '2020-08-07 23:58:45'),
(8, 2, 18, 'Thuốc lá Vinataba', 3, 15000, '2020-08-08 00:00:07', '2020-08-08 00:00:07'),
(9, 1, 18, 'Bia hà nội', 6, 15000, '2020-08-08 00:00:07', '2020-08-08 00:00:07'),
(10, 4, 18, 'rượu bình thường', 5, 80000, '2020-08-08 00:00:07', '2020-08-08 00:00:07'),
(11, 4, 17, 'rượu bình thường', 1, 80000, '2020-08-08 00:01:19', '2020-08-08 00:01:19'),
(12, 3, 17, 'Rượu Vang Chile 168', 2, 224000, '2020-08-08 00:01:19', '2020-08-08 00:01:19'),
(13, 2, 19, 'Thuốc lá Vinataba', 3, 15000, '2020-08-08 13:42:19', '2020-08-08 13:42:19'),
(14, 3, 19, 'Rượu Vang Chile 168', 1, 224000, '2020-08-08 13:42:19', '2020-08-08 13:42:19'),
(15, 7, 19, 'Pepsi', 2, 15000, '2020-08-08 13:42:19', '2020-08-08 13:42:19'),
(16, 6, 19, 'Coca cola nước ngọt', 2, 15000, '2020-08-08 13:42:19', '2020-08-08 13:42:19'),
(17, 4, 19, 'rượu bình thường', 1, 80000, '2020-08-08 13:42:19', '2020-08-08 13:42:19'),
(18, 4, 20, 'rượu bình thường', 1, 80000, '2020-08-08 17:24:21', '2020-08-08 17:24:21'),
(19, 3, 20, 'Rượu Vang Chile 168', 1, 224000, '2020-08-08 17:24:21', '2020-08-08 17:24:21'),
(20, 3, 21, 'Rượu Vang Chile 168', 3, 224000, '2020-08-08 22:07:31', '2020-08-08 22:07:31'),
(21, 7, 21, 'Pepsi', 3, 15000, '2020-08-08 22:07:31', '2020-08-08 22:07:31'),
(22, 8, 21, 'Bimbim', 5, 15000, '2020-08-08 22:07:31', '2020-08-08 22:07:31'),
(23, 2, 21, 'Thuốc lá Vinataba', 4, 15000, '2020-08-08 22:07:31', '2020-08-08 22:07:31'),
(24, 5, 21, 'Bia haliken', 1, 15000, '2020-08-08 22:07:31', '2020-08-08 22:07:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
