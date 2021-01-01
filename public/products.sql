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
(3, 385, 'Rượu Vang Chile 168', 224000, 0, '1596198024.png', 10, 12, -2, 0, 0, 1, '2020-07-31 12:20:24', '2020-08-08 22:07:31'),
(4, 385, 'rượu bình thường', 80000, 0, '1596198064.jpg', 10, 8, 2, 0, 0, 1, '2020-07-31 12:21:04', '2020-08-08 17:24:21'),
(5, 385, 'Bia haliken', 15000, 0, '1596198086.jpg', 100, 1, 99, 0, 0, 1, '2020-07-31 12:21:26', '2020-08-08 22:07:31'),
(6, 385, 'Coca cola nước ngọt', 15000, 0, '1596198109.jpg', 100, 2, 98, 0, 0, 1, '2020-07-31 12:21:49', '2020-08-08 13:42:19'),
(7, 385, 'Pepsi', 15000, 0, '1596198131.jpg', 100, 5, 95, 0, 0, 1, '2020-07-31 12:22:11', '2020-08-08 22:07:31'),
(8, 385, 'Bimbim', 15000, 0, '1596198172.jpg', 106, 5, 101, 800000, 0, 1, '2020-07-31 12:22:52', '2020-08-08 22:07:31'),
(15, 385, 'Bia haliken', 20000, 15000, '1596736769.jpg', 16, 0, 0, 250000, 0, 1, '2020-08-06 17:59:29', '2020-08-06 18:34:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
