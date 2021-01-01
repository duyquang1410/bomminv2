-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 09, 2020 lúc 07:57 PM
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
-- Cơ sở dữ liệu: `edutech`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `total_money` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `customer_id`, `status`, `total_money`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 14, 3, '21400000', 0, '2019-04-15 14:59:21', '2020-01-05 09:11:27'),
(15, 15, 3, '6800000', 0, '2019-04-15 16:12:06', '2019-04-16 16:18:42'),
(16, 16, 2, '9000000', 0, '2019-04-15 16:18:44', '2019-04-16 17:00:46'),
(17, 17, 1, '8800000', 0, '2019-04-16 17:05:15', '2019-04-16 17:05:15'),
(18, 18, 1, '12400000', 0, '2019-04-17 15:07:04', '2019-04-17 18:18:39'),
(19, 19, 1, '15500000', 0, '2019-04-18 14:46:47', '2019-04-18 14:46:47'),
(20, 20, 1, '4500000', 0, '2019-04-19 16:53:11', '2019-04-19 16:53:11'),
(21, 22, 1, '13200000', 4, '2019-04-21 09:07:56', '2019-04-21 09:07:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `name`, `qty`, `price`, `image`, `created_at`, `updated_at`) VALUES
(17, 14, 62, 'Điều hòa Inverter LG V13ENS', 2, '4500000', '1554307741.d6d54d513f554362b59c9f823e2396-2e5c3b90-dc30-4938-9226-1b32ff53b864.jpg', '2019-04-15 14:59:21', '2019-04-15 14:59:21'),
(18, 14, 63, 'Máy lạnh Electrolux ESM09CRF', 3, '3000000', '1554307866.471788b34436eee4398e2a784e71ec.jpg', '2019-04-15 14:59:21', '2019-04-15 14:59:21'),
(19, 14, 67, 'Tủ lạnh Mini Midea HS-122SN', 1, '3400000', '1554308441.big174924tulanhmideahs122ln3.jpg', '2019-04-15 14:59:21', '2019-04-15 14:59:21'),
(20, 15, 67, 'Tủ lạnh Mini Midea HS-122SN', 2, '3400000', '1554308441.big174924tulanhmideahs122ln3.jpg', '2019-04-15 16:12:06', '2019-04-15 16:12:06'),
(21, 16, 62, 'Điều hòa Inverter LG V13ENS', 2, '4500000', '1554307741.d6d54d513f554362b59c9f823e2396-2e5c3b90-dc30-4938-9226-1b32ff53b864.jpg', '2019-04-15 16:18:44', '2019-04-15 16:18:44'),
(22, 17, 67, 'Tủ lạnh Mini Midea HS-122SN', 1, '3400000', '1554308441.big174924tulanhmideahs122ln3.jpg', '2019-04-16 17:05:15', '2019-04-16 17:05:15'),
(23, 17, 68, 'Tủ lạnh Inverter Sharp SJ-X176E-SL', 2, '2700000', '1554308624.ese5687sbthu2751d20161026t1746.jpg', '2019-04-16 17:05:15', '2019-04-16 17:05:15'),
(24, 18, 65, 'Smart Tivi Panasonic 49 inch Full HD', 3, '3000000', '1554308147.0u5564d20170812t103825150085.jpg', '2019-04-17 15:07:04', '2019-04-17 15:07:04'),
(25, 18, 67, 'Tủ lạnh Mini Midea HS-122SN', 1, '3400000', '1554308441.big174924tulanhmideahs122ln3.jpg', '2019-04-17 15:07:04', '2019-04-17 15:07:04'),
(26, 19, 68, 'Tủ lạnh Inverter Sharp SJ-X176E-SL', 1, '2700000', '1554308624.ese5687sbthu2751d20161026t1746.jpg', '2019-04-18 14:46:47', '2019-04-18 14:46:47'),
(27, 19, 70, 'Máy giặt cửa ngang Inverter LG', 2, '6400000', '1554309010.95043744556535u2751d20161122t1.jpg', '2019-04-18 14:46:47', '2019-04-18 14:46:47'),
(28, 19, 64, 'Smart Tivi Sharp 40 inch LC-40LE380X', 1, '0', '1554307977.sharplc60le380xjthzpkfgntgiu55.jpg', '2019-04-18 14:46:47', '2019-04-18 14:46:47'),
(29, 20, 62, 'Điều hòa Inverter LG V13ENS', 1, '4500000', '1554307741.d6d54d513f554362b59c9f823e2396-2e5c3b90-dc30-4938-9226-1b32ff53b864.jpg', '2019-04-19 16:53:12', '2019-04-19 16:53:12'),
(30, 21, 70, 'Máy giặt cửa ngang Inverter LG', 1, '6400000', '1554309010.95043744556535u2751d20161122t1.jpg', '2019-04-21 09:07:57', '2019-04-21 09:07:57'),
(31, 21, 67, 'Tủ lạnh Mini Midea HS-122SN', 2, '3400000', '1554308441.big174924tulanhmideahs122ln3.jpg', '2019-04-21 09:07:57', '2019-04-21 09:07:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `statusOn` int(11) DEFAULT 0,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkVideo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desktopIcon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileIcon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaultImg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkToCategoryId` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `sortOrder` int(11) DEFAULT NULL,
  `delete_at` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `parent_id`, `statusOn`, `type`, `title`, `slug`, `description`, `content`, `image`, `linkVideo`, `desktopIcon`, `mobileIcon`, `defaultImg`, `linkToCategoryId`, `tag`, `status`, `sortOrder`, `delete_at`, `created_at`, `updated_at`) VALUES
(55, 339, 0, 1, 'Course', 'Thiết kế đồ họa , Video', 'thiet-ke-do-hoa-video', NULL, NULL, NULL, NULL, '1588307462.home_icon-1528366098.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:31:02', '2020-05-24 04:15:58'),
(56, 339, 0, 1, 'Course', 'Marketing , Truyền thông', 'marketing-truyen-thong', NULL, NULL, NULL, NULL, '1588307559.home_icon-1528365942.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:32:39', '2020-05-24 04:16:12'),
(57, NULL, 0, 0, 'Course', 'Khóa học', 'khoa-hoc', NULL, NULL, NULL, NULL, '1588316945.home_icon-1538108371.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:33:20', '2020-05-01 07:09:05'),
(59, 339, 57, 1, 'Course', 'Tin  học văn phòng', 'tin-hoc-van-phong', NULL, NULL, NULL, NULL, '1588307670.home_icon-1528366075.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:34:30', '2020-05-24 04:16:22'),
(60, 339, 57, 1, 'Course', 'Kế toán - Tài chính', 'ke-toan-tai-chinh', NULL, NULL, NULL, NULL, '1588316965.home_icon-1528366088.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:34:53', '2020-05-24 04:16:29'),
(61, 339, 57, 1, 'Course', 'Ngoại ngữ', 'ngoai-ngu', NULL, NULL, NULL, NULL, '1588307724.home_icon-1528366138.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:35:24', '2020-05-24 04:16:39'),
(62, 339, 57, 1, 'Course', 'Kỹ năng công việc', 'ky-nang-cong-viec', NULL, NULL, NULL, NULL, '1588316924.home_icon-1528366124.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:36:13', '2020-05-24 04:16:47'),
(64, 339, 57, 1, 'Course', 'Kinh doanh', 'kinh-doanh', NULL, NULL, NULL, NULL, '1588316934.home_icon-1528365934.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:36:49', '2020-05-24 04:17:30'),
(66, 339, 57, 1, 'Course', 'Công nghệ thông tin (IT)', 'cong-nghe-thong-tin-it', NULL, NULL, NULL, NULL, '1588307865.home_icon-1528366107.png', NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 04:37:45', '2020-05-24 04:17:00'),
(67, NULL, 0, 0, 'Article.News', 'testsdsdsdsddd', 'testsdsdsdsddd', NULL, NULL, NULL, NULL, '1588307886.home_icon-1528365912.png', NULL, NULL, NULL, '[null]', 1, NULL, 0, '2020-05-01 04:38:06', '2020-05-03 17:21:49'),
(73, NULL, 67, 0, 'Article.News', 'tétdstdtsdtstdstdtsdtsdtsdt', 'tetdstdtsdtstdstdtsdtsdtsdt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', 1, NULL, 0, '2020-05-01 05:04:02', '2020-05-01 05:04:02'),
(77, NULL, 66, 0, 'Course', 'Mạng máy tính', 'mang-may-tinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', 1, NULL, 0, '2020-05-01 07:11:42', '2020-05-01 07:11:42'),
(79, NULL, 66, 0, 'Course', 'Thiết kế Website', 'thiet-ke-website', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', 1, NULL, 0, '2020-05-01 07:12:14', '2020-05-01 07:12:14'),
(80, 339, 66, 1, 'Course', 'Lập trình Website', 'lap-trinh-website', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"safs\"]', 1, NULL, 0, '2020-05-01 07:12:42', '2020-05-24 04:17:52'),
(83, NULL, 66, 0, 'Article.News', 'Phân tích thiết kế Hệ thống', 'phan-tich-thiet-ke-he-thong', 'Phân tích thiết kế Hệ thống', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', 1, NULL, 0, '2020-05-01 07:13:47', '2020-05-01 07:13:47'),
(84, NULL, 66, 0, 'Course', 'Kiểm thử phần mềm (Tester)', 'kiem-thu-phan-mem-tester', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', 1, NULL, 0, '2020-05-01 07:14:19', '2020-05-01 07:14:19'),
(108, NULL, 73, 0, 'Article.News', 'ssfs', 'ssfs', 'sfsff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[null]', 1, NULL, 0, '2020-05-23 18:19:34', '2020-05-23 18:19:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `contentCmt` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `teacher_id`, `parent_id`, `course_id`, `lesson_id`, `contentCmt`, `status`, `created_at`, `updated_at`) VALUES
(3, 377, 376, 0, 38, 58, 'áasasass', NULL, '2020-06-09 17:09:02', '2020-06-09 17:09:02'),
(4, 377, 376, 0, 38, 58, 'bài giảng hay quá :))', NULL, '2020-06-09 17:09:51', '2020-06-09 17:09:51'),
(5, 377, 376, 0, 38, 58, 'tuyệt vời quá ạ :))', NULL, '2020-06-09 17:10:07', '2020-06-09 17:10:07'),
(6, 377, 376, 0, 38, 58, 'em cảm ơn Cô ạ hi . bài giảng hay quá CÔ', NULL, '2020-06-09 17:12:37', '2020-06-09 17:12:37'),
(7, 377, 376, 0, 38, 58, 'hihih', NULL, '2020-06-09 17:56:44', '2020-06-09 17:56:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Giáo viên',
  `approved` int(11) DEFAULT 0,
  `title` varchar(255) DEFAULT NULL COMMENT 'Tên khóa học',
  `description` text DEFAULT NULL COMMENT 'Mô tả khóa học',
  `content` text DEFAULT NULL COMMENT 'Nội dung',
  `level` varchar(255) DEFAULT NULL COMMENT 'Trình độ',
  `thematicNumber` int(11) DEFAULT NULL COMMENT 'Thời lượng',
  `lessons` int(11) DEFAULT NULL COMMENT 'Số bài học',
  `exercise` int(11) DEFAULT NULL COMMENT 'Bài tập',
  `price` text DEFAULT NULL COMMENT 'Giá',
  `subscribers` int(11) DEFAULT NULL COMMENT 'Người đăng ký',
  `videoTime` text DEFAULT NULL COMMENT 'Thời lượng Video',
  `author` text DEFAULT NULL COMMENT 'Tác giả',
  `job` text DEFAULT NULL COMMENT 'Nghề nghiệp',
  `image` text DEFAULT NULL COMMENT 'ảnh khóa học',
  `linkVideo` text DEFAULT NULL COMMENT 'Link Video Youtube',
  `tag` text DEFAULT NULL COMMENT 'Thẻ tag',
  `file` text DEFAULT NULL COMMENT 'File Tài liệu',
  `status` int(11) DEFAULT 1 COMMENT 'Trạng thái',
  `isFeatured` int(11) DEFAULT 0 COMMENT 'Nổi bật',
  `seoTitle` varchar(255) DEFAULT NULL COMMENT 'SEO Tiêu đề',
  `seoKeywords` text DEFAULT NULL COMMENT 'Từ khóa',
  `seoDescription` text DEFAULT NULL COMMENT 'Mô tả',
  `rewriteURL` text DEFAULT NULL COMMENT 'URL đẹp',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id`, `user_id`, `approved`, `title`, `description`, `content`, `level`, `thematicNumber`, `lessons`, `exercise`, `price`, `subscribers`, `videoTime`, `author`, `job`, `image`, `linkVideo`, `tag`, `file`, `status`, `isFeatured`, `seoTitle`, `seoKeywords`, `seoDescription`, `rewriteURL`, `created_at`, `updated_at`) VALUES
(36, 376, 1, 'Lập trình Web tốc độ cao, thời gian thực với NodeJS', 'Học lập trình Nodejs - Khóa học hướng dẫn Viết Web Server, xây dựng Blog cá nhân, tạo ứng dụng Chat web... với NodeJS', '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', '1', NULL, NULL, 0, '0', 0, '22', 'Giáo viên EduTech', 'Lập trình viên', '1591174668.node-js-la-gi-min.jpg', NULL, 'null', NULL, 1, 0, NULL, NULL, NULL, NULL, '2020-06-03 09:04:32', '2020-06-03 09:04:32'),
(37, 376, 1, 'Học jQuery từ cơ bản đến nâng cao', 'Khóa Học jQuery Từ Cơ Bản Đến Nâng Cao là cách nhanh chóng để vận dụng những tính năng tối ưu của nó vào công việc', '<p>Với sự ph&aacute;t triển nhanh ch&oacute;ng của Internet, người d&ugrave;ng ng&agrave;y c&agrave;ng quan t&acirc;m hơn đến giao diện hay h&igrave;nh thức của một trang web. Nếu như trước đ&acirc;y, quy chuẩn đẹp của một trang web l&agrave; chỉ cần c&oacute; banner, nội dung v&agrave; một &iacute;t footer đơn giản. Nhưng theo thời gian, thị hiếu người đọc cũng thay đổi, một trang web phải c&oacute; banner bắt mắt, nội dung l&ocirc;i cuốn k&egrave;m theo c&aacute;c hiệu ứng lạ mắt mới c&oacute; thể thu h&uacute;t được người đọc d&agrave;i l&acirc;u.&nbsp;</p>\n\n<p>Ch&iacute;nh v&igrave; vậy, c&aacute;c web developers, web designers cần thiết phải n&acirc;ng cao tay nghề. V&agrave; một trong những c&ocirc;ng cụ cần thiết đến từ c&aacute;c thư viện JavaScript mở được quan t&acirc;m nhiều nhất đ&oacute; ch&iacute;nh l&agrave; jQuery, c&ocirc;ng cụ gi&uacute;p tạo ra c&aacute;c hiệu ứng c&oacute; thể tương t&aacute;c trực tiếp với người đọc một c&aacute;ch nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng hơn so với việc sử dụng thuần JavaScript.<br />\n<br />\nBạn muốn t&igrave;m hiểu v&agrave; vận dụng những t&iacute;nh năng tối ưu của jQuery nhưng kh&ocirc;ng biết bắt đầu từ đ&acirc;u v&agrave; thế n&agrave;o?</p>\n\n<p>Kh&oacute;a học &ldquo;j<strong>Query cơ bản đến n&acirc;ng cao&rdquo;</strong>&nbsp;ra đời gi&uacute;p c&aacute;c bạn c&oacute; thể chỉnh sửa giao diện của một website bất k&igrave;; tăng khả năng tương t&aacute;c với người d&ugrave;ng; tạo hiệu ứng động cho nội dung; c&oacute; khả năng tự đọc hiểu c&aacute;c t&agrave;i liệu tự lập tr&igrave;nh jQuery trong suốt kh&oacute;a học n&agrave;y.<br />\n<br />\nVới 5 năm kinh nghiệm giảng dạy, bằng c&aacute;ch học qua trải nghiệm, c&aacute;c hướng dẫn tự l&agrave;m, v&agrave; qua c&aacute;c b&agrave;i tập thực h&agrave;nh tập trung v&agrave;o n&acirc;ng cao, Giảng vi&ecirc;n Nguyễn Đức Việt sẽ gi&uacute;p bạn:</p>\n\n<ul>\n	<li>Sử dụng th&agrave;nh thạo jQuery.</li>\n	<li>C&oacute; thể l&agrave;m lại được hầu hết c&aacute;c hiệu ứng gặp được tr&ecirc;n mạng.</li>\n	<li>C&oacute; khả năng lập tr&igrave;nh v&agrave; quản trị hiệu ứng cho c&aacute;c trang Web phục vụ nhu cầu giải tr&iacute;, kinh doanh, khởi nghiệp.</li>\n	<li>Đọc v&agrave; hiểu c&aacute;c thuật ngữ về jQuery một c&aacute;ch thuần thục.</li>\n	<li>C&aacute;c kĩ thuật check lỗi, t&igrave;m v&agrave; sửa lỗi lập tr&igrave;nh jQuery.</li>\n</ul>', '1', NULL, NULL, 0, '0', 0, '45 giờ', 'Giáo viên EduTech', 'Lập trình viên Web', '1591196191.hoc-jquery-tu-co-ban-den-nang-cao_m_1557996092.jpg', NULL, 'null', NULL, 1, 0, NULL, NULL, NULL, NULL, '2020-06-04 04:32:00', '2020-06-04 04:32:00'),
(38, 376, 1, 'Lập trình C/C++ cho người mới bắt đầu', 'Khóa học lập trình C/C++ cơ bản và nâng cao - trang bị cho học viên các kỹ năng lập trình được minh hoạ cụ thể bằng ngôn ngữ lập trình C/C++ từ cơ bản đến nâng cao', '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', '1', NULL, NULL, 0, '0', 0, '22 giờ', NULL, NULL, '1591250918.c.png', NULL, 'null', NULL, 1, 0, NULL, NULL, NULL, NULL, '2020-06-04 15:53:42', '2020-06-04 15:53:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coursecate`
--

CREATE TABLE `coursecate` (
  `id` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coursecate`
--

INSERT INTO `coursecate` (`id`, `category_id`, `course_id`, `created_at`, `updated_at`) VALUES
(80, 57, 36, '2020-06-03 08:57:48', '2020-06-03 08:57:48'),
(81, 66, 36, '2020-06-03 08:57:48', '2020-06-03 08:57:48'),
(82, 57, 37, '2020-06-03 14:56:31', '2020-06-03 14:56:31'),
(83, 66, 37, '2020-06-03 14:56:31', '2020-06-03 14:56:31'),
(84, 80, 37, '2020-06-03 14:56:31', '2020-06-03 14:56:31'),
(85, 57, 38, '2020-06-04 06:08:38', '2020-06-04 06:08:38'),
(86, 66, 38, '2020-06-04 06:08:38', '2020-06-04 06:08:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `phone`, `address`, `email`, `info`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Duy Quang', '0982039380', 'Số 12 Lê Đức Thọ , Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-13 13:45:08', '2019-04-13 13:45:08'),
(2, 'Nguyễn Duy Quang', '0982039380', 'Số 12 Lê Đức Thọ , Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-13 13:45:43', '2019-04-13 13:45:43'),
(3, 'Nguyễn Văn A', '0982039380', 'Số 1 Hoàng Quốc Việt , HN', 'ndquang1410@gmail.com', NULL, '2019-04-13 13:46:53', '2019-04-13 13:46:53'),
(7, 'Trần Hiền', '0982039380', 'Số 1 Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:55:55', '2019-04-15 14:55:55'),
(8, 'Trần Hiền', '0982039380', 'Số 1 Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:56:08', '2019-04-15 14:56:08'),
(9, 'Trần Hiền', '0982039380', 'Số 1 Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:56:42', '2019-04-15 14:56:42'),
(10, 'Trần Hiền', '0982039380', 'Số 1 Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:56:52', '2019-04-15 14:56:52'),
(11, 'Trần Hiền', '0982039380', 'Số 1 Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:57:27', '2019-04-15 14:57:27'),
(12, 'Trần Hiền', '0982039380', 'Số 1 Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:57:40', '2019-04-15 14:57:40'),
(13, 'Trần Hiền', '0982039380', 'Số 1 Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:57:47', '2019-04-15 14:57:47'),
(14, 'Trần Thu Hiền', '0982039380', 'Số 1 , Hoàng Quốc Việt , HN', 'ndquang1410@gmail.com', NULL, '2019-04-15 14:59:21', '2019-04-15 14:59:21'),
(15, 'Trần Linh', '0982039380', 'Số 1 , Mỹ Đình , Nam Từ Liêm , HN', 'ndquang1410@gmail.com', NULL, '2019-04-15 16:12:05', '2019-04-15 16:12:05'),
(16, 'Nguyễn Kiều Anh', '0982039380', 'Số 12 Mỹ đình , Nam từ Liêm , HN', 'ndquang1410@gmail.com', NULL, '2019-04-15 16:18:43', '2019-04-15 16:18:43'),
(17, 'Nguyễn Ngân', '0982039380', 'Số 1 Hoàng Đạo Thúy , HN', 'ndquang1410@gmail.com', 'Nhận hàng theo địa chỉ cho trước', '2019-04-16 17:05:15', '2019-04-16 17:05:15'),
(18, 'Nguyễn Ngân', '0982039380', 'Số 1 , Viên An , Ứng Hòa , HN', 'ndquang1410@gmail.com', NULL, '2019-04-17 15:07:03', '2019-04-17 15:07:03'),
(19, 'Nguyễn Huyên', '0982039380', 'Số 1 , Nguyễn Văn B, Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-18 14:46:46', '2019-04-18 14:46:46'),
(20, 'Nguyễn Thu Trang', '0982039380', 'Số 111 Hoàng Quốc Việt , Hà Nội', 'ndquang1410@gmail.com', NULL, '2019-04-19 16:53:10', '2019-04-19 16:53:10'),
(21, 'Nguyễn Thu Trang', '0982039380', 'Số 12 , Lê Đức Thọ , Hà Nội', 'ndquang1410@gmail.com', 'Chuyển hàng đến địa chỉ trên', '2019-04-21 09:03:38', '2019-04-21 09:03:38'),
(22, 'Nguyễn Thu Trang', '0982039380', 'Số 1 , Lê Đức Thọ , HN', 'ndquang1410@gmail.com', 'Chuyển hàng đến địa chỉ trên', '2019-04-21 09:07:56', '2019-04-21 09:07:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datatypes`
--

CREATE TABLE `datatypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `datatypes`
--

INSERT INTO `datatypes` (`id`, `user_id`, `title`, `code`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tin tức', 'Article.News', 'Tin tức', '2020-01-04 17:00:00', '2020-01-04 17:00:00'),
(5, 1, 'Sản phẩm', 'Ecommerce.Product', 'Sản phẩm', '2020-01-05 16:06:40', '2020-01-05 16:06:40'),
(7, 1, 'Giới thiệu', 'Introduce', NULL, '2020-02-02 10:58:16', '2020-02-20 17:19:57'),
(8, 1, 'FAQ', 'Article.FAQ', NULL, '2020-02-02 10:58:42', '2020-02-02 10:58:42'),
(9, 1, 'Download', 'Article.Download', NULL, '2020-02-02 10:58:58', '2020-02-02 10:58:58'),
(10, 1, 'Video clip', 'Article.Video', NULL, '2020-02-02 10:59:12', '2020-02-02 10:59:12'),
(11, 1, 'Dự án', 'Article.Project', NULL, '2020-02-02 10:59:27', '2020-02-02 10:59:27'),
(12, 1, 'Thư viện ảnh', 'Article.PhotoAlbum', NULL, '2020-02-02 11:00:01', '2020-02-02 11:00:01'),
(13, 1, 'Nhân sự', 'Article.Person', NULL, '2020-02-02 11:00:17', '2020-02-02 11:00:17'),
(14, 1, 'Bộ sưu tập', 'Article.ProductCollection', NULL, '2020-02-02 11:00:46', '2020-02-02 11:00:46'),
(15, 1, 'PDF', 'Article.PDF', NULL, '2020-02-02 11:01:08', '2020-02-02 11:01:08'),
(16, 1, 'Tuyển dụng', 'Article.Recruitment', NULL, '2020-02-02 11:01:22', '2020-02-02 11:01:22'),
(17, 1, 'Đối tác', 'Article.Partner', NULL, '2020-02-02 11:01:38', '2020-02-02 11:01:38'),
(18, 1, 'Ý kiến khách hàng', 'Article.Testimonial', NULL, '2020-02-02 11:01:52', '2020-02-02 11:01:52'),
(19, 1, 'Đại lý, cửa hàng', 'Article.Agency', NULL, '2020-02-02 11:02:21', '2020-02-02 11:02:21'),
(20, 1, 'Hỗ trợ trực tuyến', 'Decl.OnlineSupport', NULL, '2020-02-02 11:03:10', '2020-02-02 11:03:10'),
(21, 1, 'Văn bản pháp quy', 'Article.LegalDocument', NULL, '2020-02-02 11:04:22', '2020-02-02 11:04:22'),
(22, 1, 'Liên hệ', 'Contact', NULL, '2020-02-02 11:05:26', '2020-02-02 11:05:26'),
(23, 1, 'Khóa học', 'Course', 'Khóa học trực tuyến , Online', '2020-05-01 02:21:25', '2020-05-01 02:21:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `displaytypes`
--

CREATE TABLE `displaytypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `displaytypes`
--

INSERT INTO `displaytypes` (`id`, `user_id`, `title`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mặc định', 'Default', NULL, NULL),
(2, 1, 'Đường dẫn', 'Link', NULL, NULL),
(3, 1, 'Kế thừa', 'Inherit', NULL, NULL),
(4, 1, 'Tùy chỉnh', 'Custom', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `lesson_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `complexity` int(10) UNSIGNED DEFAULT 2,
  `note` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `exercises`
--

INSERT INTO `exercises` (`id`, `course_id`, `lesson_id`, `user_id`, `question`, `answer`, `complexity`, `note`, `status`, `created_at`, `updated_at`) VALUES
(9, 38, 58, 376, 'Viết chương trình  in ra dòng chữ \"Hello world đầu tiên\" bằng C hoặc C++', '<p>C: printf(\"Hello world\");</p><p><br></p><p>C++</p><p><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">#include &lt;iostream.h&gt;</span><br style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\"><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">int main()</span><br style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\"><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">{</span><br style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\"><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">cout &lt;&lt; \"Hello World!\\n\";</span><br style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\"><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">return 0;</span><br style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\"><span style=\"font-family: verdana, arial, helvetica, sans-serif; font-size: 12px;\">}</span><br></p>', 1, NULL, 1, '2020-06-04 15:57:25', '2020-06-04 15:57:25'),
(10, 38, 58, 376, 'Viết chương trình in ra giá trị mà bạn  vừa nhập ,C hoặc C++', '<p>int a;</p><p>print_r(\"Nhập a = \");</p><p>scanf(\"%d\", &amp;a);</p><p>print_f(\"Giá trị bạn vừa nhập là : %d\", a);</p>', 1, NULL, 1, '2020-06-04 15:59:43', '2020-06-04 15:59:43'),
(11, 38, 59, 376, 'Viết chương trình tính tổng của a và b , C/C++', '<p>printf(\"Nhập a , b :&nbsp; \");</p><p>scanf(\"%d%d\", &amp;a, &amp;b);</p><p><br></p><p>printf(\"Tổng của a + b là : %d\", a+b);</p>', 2, NULL, 1, '2020-06-04 16:01:57', '2020-06-04 16:01:57'),
(12, 38, 58, 376, 'Viết chương trình tính Hiệu 2 số a và b , bằng C/C++', '<p>printf(\"Nhập a: \");</p><p>scanf(\"%d\",&amp;a);</p><p>printf(\"Nhập b: \");</p><p>scanf(\"%d\",&amp;b);</p><p><br></p><p>printf(\"Hiệu của a&nbsp; và b là : %d \", a-b);</p>', 2, NULL, 1, '2020-06-05 06:29:45', '2020-06-05 06:29:45'),
(13, 38, 64, 376, 'Viết 1 chương trình bất kỳ , sử dụng cấu trúc if else , C hoặc C++', NULL, 2, NULL, 1, '2020-06-08 06:18:26', '2020-06-08 06:18:26'),
(14, 38, 64, 376, 'Nhập vào 2 số , in ra màn hình số lớn hơn , dùng cấu trúc if else', NULL, 2, NULL, 1, '2020-06-08 06:19:15', '2020-06-08 06:19:15'),
(15, 38, 64, 376, 'Kiểm tra 1 số có phải là số nguyên tố hay không ?', NULL, 2, NULL, 1, '2020-06-08 06:19:52', '2020-06-08 06:19:52'),
(16, 38, 60, 376, 'Khai báo biến trong C hoặc C++', NULL, 2, NULL, 1, '2020-06-08 06:20:26', '2020-06-08 06:20:26'),
(17, 38, 61, 376, 'Liệt kê các cách Khai báo hằng số trong C/C++', NULL, 2, NULL, 1, '2020-06-08 06:20:56', '2020-06-08 06:20:56'),
(18, 38, 62, 376, 'Liệt kê các toán tử trong C/C++', NULL, 2, NULL, 1, '2020-06-08 06:21:20', '2020-06-08 06:21:20'),
(19, 38, 63, 376, 'Viết cấu trúc switch case  với C/C++', NULL, 2, NULL, 1, '2020-06-08 06:21:47', '2020-06-08 06:21:47'),
(20, 38, 63, 376, 'Viết Chương trình nhập ngày là số , in ra ngày là chữ , bằng C/C++', NULL, 2, NULL, 1, '2020-06-08 06:22:33', '2020-06-08 06:22:33'),
(21, 38, 56, 376, 'Bạn hiểu thế nào về Lập trình C,C++', NULL, 2, NULL, 1, '2020-06-08 06:23:32', '2020-06-08 06:23:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `homeworks`
--

CREATE TABLE `homeworks` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `exercises_id` int(11) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `homeworks`
--

INSERT INTO `homeworks` (`id`, `user_id`, `lesson_id`, `exercises_id`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(8, 377, 58, 9, '<p>test câu trả lời&nbsp;</p>', 1, '2020-06-05 03:08:26', '2020-06-05 03:08:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `thematic_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `linkVideo` text DEFAULT NULL,
  `videoLenght` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `seoTitle` text DEFAULT NULL,
  `seoKeywords` text DEFAULT NULL,
  `seoDescription` text DEFAULT NULL,
  `rewriteURL` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `course_id`, `thematic_id`, `title`, `description`, `content`, `linkVideo`, `videoLenght`, `file`, `image`, `status`, `seoTitle`, `seoKeywords`, `seoDescription`, `rewriteURL`, `tags`, `created_at`, `updated_at`) VALUES
(46, 376, 36, 52, 'Bài 1: Cài đặt NodeJS trên Windows', 'Node.js là 1 nền tảng phát triển ứng dụng phía server. Nó sử dụng ngôn ngữ lập trình JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho phép hàng chục nghìn user truy cập cùng lúc và tốc độ thì cực nhanh.', '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '5 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 09:01:51', '2020-06-03 09:01:51'),
(47, 376, 36, 52, 'Bài 2: Cài đặt NodeJS trên Linux - Ubuntu', NULL, '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '5 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 09:02:27', '2020-06-03 09:02:27'),
(48, 376, 36, 52, 'Bài 3: Cài đặt NodeJS trên MacOS', NULL, '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '5 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 09:02:54', '2020-06-03 09:02:54'),
(49, 376, 36, 52, 'Bài 4: Viết ứng dụng Helloworld với NodeJS', NULL, '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 09:03:21', '2020-06-03 09:03:21'),
(50, 376, 36, 53, 'Bài 5: Node module, module.export và require', NULL, '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 09:04:18', '2020-06-03 09:04:18'),
(51, 376, 36, 53, 'Bài 6: Sử dụng NPM để quản lý package và module trong NodeJS', 'Node.js là 1 nền tảng phát triển ứng dụng phía server. Nó sử dụng ngôn ngữ lập trình JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho phép hàng chục nghìn user truy cập cùng lúc và tốc độ thì cực nhanh. ', '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 14:59:28', '2020-06-03 14:59:28'),
(52, 376, 36, 53, 'Bài 7: File System và làm việc với file trong NodeJS', NULL, '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 15:00:01', '2020-06-03 15:00:01'),
(53, 376, 36, 54, 'Bài 8: Asynchronous và Callback function trong NodeJS', NULL, '<p>Với sự ph&aacute;t triển nhanh ch&oacute;ng của Internet, người d&ugrave;ng ng&agrave;y c&agrave;ng quan t&acirc;m hơn đến giao diện hay h&igrave;nh thức của một trang web. Nếu như trước đ&acirc;y, quy chuẩn đẹp của một trang web l&agrave; chỉ cần c&oacute; banner, nội dung v&agrave; một &iacute;t footer đơn giản. Nhưng theo thời gian, thị hiếu người đọc cũng thay đổi, một trang web phải c&oacute; banner bắt mắt, nội dung l&ocirc;i cuốn k&egrave;m theo c&aacute;c hiệu ứng lạ mắt mới c&oacute; thể thu h&uacute;t được người đọc d&agrave;i l&acirc;u.&nbsp;</p>\n\n<p>Ch&iacute;nh v&igrave; vậy, c&aacute;c web developers, web designers cần thiết phải n&acirc;ng cao tay nghề. V&agrave; một trong những c&ocirc;ng cụ cần thiết đến từ c&aacute;c thư viện JavaScript mở được quan t&acirc;m nhiều nhất đ&oacute; ch&iacute;nh l&agrave; jQuery, c&ocirc;ng cụ gi&uacute;p tạo ra c&aacute;c hiệu ứng c&oacute; thể tương t&aacute;c trực tiếp với người đọc một c&aacute;ch nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng hơn so với việc sử dụng thuần JavaScript.<br />\n<br />\nBạn muốn t&igrave;m hiểu v&agrave; vận dụng những t&iacute;nh năng tối ưu của jQuery nhưng kh&ocirc;ng biết bắt đầu từ đ&acirc;u v&agrave; thế n&agrave;o?</p>\n\n<p>Kh&oacute;a học &ldquo;j<strong>Query cơ bản đến n&acirc;ng cao&rdquo;</strong>&nbsp;ra đời gi&uacute;p c&aacute;c bạn c&oacute; thể chỉnh sửa giao diện của một website bất k&igrave;; tăng khả năng tương t&aacute;c với người d&ugrave;ng; tạo hiệu ứng động cho nội dung; c&oacute; khả năng tự đọc hiểu c&aacute;c t&agrave;i liệu tự lập tr&igrave;nh jQuery trong suốt kh&oacute;a học n&agrave;y.<br />\n<br />\nVới 5 năm kinh nghiệm giảng dạy, bằng c&aacute;ch học qua trải nghiệm, c&aacute;c hướng dẫn tự l&agrave;m, v&agrave; qua c&aacute;c b&agrave;i tập thực h&agrave;nh tập trung v&agrave;o n&acirc;ng cao, Giảng vi&ecirc;n Nguyễn Đức Việt sẽ gi&uacute;p bạn:</p>\n\n<ul>\n	<li>Sử dụng th&agrave;nh thạo jQuery.</li>\n	<li>C&oacute; thể l&agrave;m lại được hầu hết c&aacute;c hiệu ứng gặp được tr&ecirc;n mạng.</li>\n	<li>C&oacute; khả năng lập tr&igrave;nh v&agrave; quản trị hiệu ứng cho c&aacute;c trang Web phục vụ nhu cầu giải tr&iacute;, kinh doanh, khởi nghiệp.</li>\n	<li>Đọc v&agrave; hiểu c&aacute;c thuật ngữ về jQuery một c&aacute;ch thuần thục.</li>\n	<li>C&aacute;c kĩ thuật check lỗi, t&igrave;m v&agrave; sửa lỗi lập tr&igrave;nh jQuery.</li>\n</ul>', NULL, '20 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 15:00:41', '2020-06-03 15:00:41'),
(54, 376, 36, 55, 'Bài 9: Asynchronous và cách dùng Promise trong NodeJS', 'Node.js là 1 nền tảng phát triển ứng dụng phía server. Nó sử dụng ngôn ngữ lập trình JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho phép hàng chục nghìn user truy cập cùng lúc và tốc độ thì cực nhanh. ', '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,.</p>', NULL, '20 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 15:01:22', '2020-06-03 15:01:22'),
(55, 376, 36, 55, 'Bài 10: Tạo webserver cơ bản với HTTP module', 'Bài 10: Tạo webserver cơ bản với HTTP module', '<p>Node.js l&agrave; 1 nền tảng ph&aacute;t triển ứng dụng ph&iacute;a server. N&oacute; sử dụng ng&ocirc;n ngữ lập tr&igrave;nh JavaScript. Mỗi kết nối đến sẽ sinh ra 1 sự kiện, cho ph&eacute;p h&agrave;ng chục ngh&igrave;n user truy cập c&ugrave;ng l&uacute;c v&agrave; tốc độ th&igrave; cực nhanh.&nbsp;</p>\n\n<p>NodeJS hiện đang l&agrave; 1 Javascript Engine cực hot, được nhiều người ưa chuộng bởi tốc độ nhanh, nhẹ, đơn giản v&agrave; thư viện hỗ trợ phong ph&uacute;.&nbsp;</p>\n\n<p>Vậy c&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng&nbsp;<em>học Nodejs</em>&nbsp;ngay h&ocirc;m nay để&nbsp;Update xu thế! &nbsp;</p>\n\n<p>Kho&aacute; học &quot;<strong>Lập tr&igrave;nh web với NodeJS</strong>&quot; sẽ hướng dẫn bạn từng bước để x&acirc;y dựng c&aacute;c ứng dụng Web thời gian thực, tốc độ cao: BLOG c&aacute; nh&acirc;n, CHAT nh&oacute;m,..</p>', NULL, '15 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-03 15:02:09', '2020-06-03 15:02:09'),
(56, 376, 38, 57, 'Bài 1: Tổng quan về lập trình', 'Ngôn ngữ C++ được phát triển từ ngôn ngữ C. C++ không phải là ngôn ngữ hướng đối tượng hoàn toàn mà là ngôn ngữ “đa hướng”. Vì C++ hỗ trợ cả lập trình hướng hành động và lập trình hướng đối tượng. Nó là một trong những ngôn ngữ phổ biến để viết các ứng dụng máy tính – và ngôn ngữ thông dụng nhất để lập trình games.  Bạn đang có nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp quá nhiều khóa khăn ? ', '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:48:10', '2020-06-04 15:48:10'),
(57, 376, 38, 57, 'Bài 2: Ngôn ngữ lập trình C/C++', 'Ngôn ngữ C++ được phát triển từ ngôn ngữ C. C++ không phải là ngôn ngữ hướng đối tượng hoàn toàn mà là ngôn ngữ “đa hướng”. Vì C++ hỗ trợ cả lập trình hướng hành động và lập trình hướng đối tượng. Nó là một trong những ngôn ngữ phổ biến để viết các ứng dụng máy tính – và ngôn ngữ thông dụng nhất để lập trình games.  Bạn đang có nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp quá nhiều khóa khăn ? ', '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:48:39', '2020-06-04 15:48:39'),
(58, 376, 38, 57, 'Bài 3: Biểu thức', NULL, '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:49:02', '2020-06-04 15:49:02'),
(59, 376, 38, 57, 'Bài 4: Các kiểu dữ liệu trong C/C++', NULL, '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '5 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:49:34', '2020-06-04 15:49:34'),
(60, 376, 38, 57, 'Bài 5: Sử dụng Biến trong C/C++', NULL, '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '15 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:50:03', '2020-06-04 15:50:03'),
(61, 376, 38, 57, 'Bài 6: Sử dụng Hằng trong C/C++', NULL, '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '14 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:50:26', '2020-06-04 15:50:26'),
(62, 376, 38, 57, 'Bài 7: Các phép toán trong C/C++', NULL, '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:51:38', '2020-06-04 15:51:38'),
(63, 376, 38, 58, 'Bài 8: Khái niệm cấu trúc điều khiển', NULL, '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '8 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:52:40', '2020-06-04 15:52:40'),
(64, 376, 38, 58, 'Bài 9: Sử dụng câu lệnh if, if…else', NULL, '<p>Ng&ocirc;n ngữ C++ được ph&aacute;t triển từ ng&ocirc;n ngữ C. C++ kh&ocirc;ng phải l&agrave; ng&ocirc;n ngữ hướng đối tượng ho&agrave;n to&agrave;n m&agrave; l&agrave; ng&ocirc;n ngữ &ldquo;đa hướng&rdquo;. V&igrave; C++ hỗ trợ cả lập tr&igrave;nh hướng h&agrave;nh động v&agrave; lập tr&igrave;nh hướng đối tượng. N&oacute; l&agrave; một trong những ng&ocirc;n ngữ phổ biến để viết c&aacute;c ứng dụng m&aacute;y t&iacute;nh &ndash; v&agrave; ng&ocirc;n ngữ th&ocirc;ng dụng nhất để lập tr&igrave;nh games. &nbsp;Bạn đang c&oacute; nhu cầu học C/CC++, bạn đang tự học C/C++ nhưng gặp qu&aacute; nhiều kh&oacute;a khăn ?&nbsp;</p>\n\n<p>Kh&oacute;a học&nbsp;<strong>Học&nbsp;C/C++ TỪ A - Z&nbsp;</strong>gi&uacute;p trang bị cho học vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++ từ cơ bản đến n&acirc;ng cao. Kh&oacute;a học bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, c&acirc;u lệnh điều khiển, v&ograve;ng lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; kh&oacute;a học cũng trang bị cho học vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m...</p>\n\n<p>Qua kh&oacute;a học&nbsp;<strong>Học lập tr&igrave;nh C/C++ TỪ A - Z</strong>&nbsp;tại Unica.vn, học vi&ecirc;n c&oacute; thể tự n&acirc;ng cao kỹ năng lập tr&igrave;nh của m&igrave;nh, dễ d&agrave;ng tiếp cận c&aacute;c ng&ocirc;n ngữ cấp cao v&agrave; c&ocirc;ng nghệ mới. Đ&acirc;y l&agrave; kh&oacute;a học tạo tiền đề tốt cho việc tiếp cận phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh cần phải c&oacute; của một lập tr&igrave;nh vi&ecirc;n.</p>', NULL, '10 phút', NULL, NULL, 1, NULL, NULL, NULL, NULL, '[null]', '2020-06-04 15:53:19', '2020-06-04 15:53:19');

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
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `highlights` int(11) NOT NULL DEFAULT 0,
  `title_seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_seo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_seo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_seo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `parent_id`, `name`, `slug`, `description`, `content`, `image`, `tag`, `status`, `highlights`, `title_seo`, `description_seo`, `image_seo`, `tag_seo`, `created_at`, `updated_at`) VALUES
(8, 1, NULL, 'Về chúng tôi', 've-chung-toi', 'Giới thiệu', '<h1>Giới thiệu</h1>\r\n\r\n<p><strong>I. QU&Aacute; TR&Igrave;NH H&Igrave;NH TH&Agrave;NH PH&Aacute;T TRIỂN</strong></p>\r\n\r\n<p>Trong những năm qua, x&atilde; hội ph&aacute;t triển, kinh tế tăng trưởng đồng thời l&agrave; chất lượng cuộc sống của người d&acirc;n ng&agrave;y c&agrave;ng c&agrave;ng được n&acirc;ng cao nhiều trung t&acirc;m thương mại, nh&agrave; cao tầng, biệt thự được mọc ra k&egrave;m theo đấy l&agrave; nhu cầu mua sắm c&aacute;c thiết bị phục vụ nhu cầu cuộc sống h&agrave;ng ng&agrave;y như TV, Tủ lạnh, Điện gia dụng.....</p>\r\n\r\n<p>Thế giới điện tử&nbsp;<strong>Libra Mart&nbsp;</strong>khai trương showroom tại địa chỉ&nbsp;Số 3, L&ecirc; Th&aacute;nh T&ocirc;ng, Q. Ng&ocirc; Quyền, TP. Hải Ph&ograve;ng ch&iacute;nh thức tham gia v&agrave;o lĩnh vực kinh doanh b&aacute;n lẻ điện tử, tạo ra một phong c&aacute;ch mua sắm ho&agrave;n to&agrave;n mới với người d&acirc;n thủ đ&ocirc;, th&ocirc;ng qua cung cấp c&aacute;c sản phẩm v&agrave; dịch vụ tới người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<p>&bull; TẦM NH&Igrave;N :</p>\r\n\r\n<p>C&ocirc;ng ty số 1 tại Việt Nam trong lĩnh vực ph&acirc;n phối, b&aacute;n lẻ c&aacute;c sản phẩm điện tử</p>\r\n\r\n<p>&bull; SỨ MỆNH:</p>\r\n\r\n<p>Với kim chỉ nam l&agrave; &ldquo;Kh&ocirc;ng ngừng ph&aacute;t triển v&igrave; kh&aacute;ch h&agrave;ng&rdquo; v&agrave; l&agrave;m h&agrave;i l&ograve;ng kh&aacute;ch h&agrave;ng bằng c&aacute;ch tạo ra những gi&aacute; trị gia tăng như cung cấp c&aacute;c sản phẩm, dịch vụ tốt nhất.</p>\r\n\r\n<p>&bull; MỤC TI&Ecirc;U CHIẾN LƯỢC:</p>\r\n\r\n<p>1. Tối đa ho&aacute; gi&aacute; trị đầu tư của c&aacute;c cổ đ&ocirc;ng; giữ vững tốc độ tăng trưởng lợi nhuận v&agrave; t&igrave;nh h&igrave;nh t&agrave;i ch&iacute;nh l&agrave;nh mạnh;</p>\r\n\r\n<p>2. Kh&ocirc;ng ngừng n&acirc;ng cao động lực l&agrave;m việc v&agrave; năng lực c&aacute;n bộ;&nbsp;<strong>Libra Mart&nbsp;</strong>phải lu&ocirc;n dẫn đầu ng&agrave;nh điện tử trong việc s&aacute;ng tạo, ph&aacute;t triển ch&iacute;nh s&aacute;ch đ&atilde;i ngộ v&agrave; cơ hội thăng tiến nghề nghiệp cho c&aacute;n bộ của m&igrave;nh;</p>\r\n\r\n<p>3. Duy tr&igrave; sự h&agrave;i l&ograve;ng, trung th&agrave;nh v&agrave; gắn b&oacute; của kh&aacute;ch h&agrave;ng với&nbsp;<strong>Libra Mart</strong>; x&acirc;y dựng&nbsp;<strong>Libra Mart&nbsp;</strong>th&agrave;nh một trong những c&ocirc;ng ty h&agrave;ng đầu Việt Nam c&oacute; chất lượng dịch vụ tốt nhất do kh&aacute;ch h&agrave;ng lựa chọn.</p>\r\n\r\n<p>4. Ph&aacute;t triển&nbsp;<strong>Libra Mart&nbsp;</strong>th&agrave;nh một trong những điện tử h&agrave;ng đầu Việt Nam về: quản l&yacute; tốt nhất, m&ocirc;i trường l&agrave;m việc tốt nhất, văn ho&aacute; doanh nghiệp ch&uacute; trọng kh&aacute;ch h&agrave;ng, th&uacute;c đẩy hợp t&aacute;c v&agrave; s&aacute;ng tạo, linh hoạt nhất khi m&ocirc;i trường kinh doanh thay đổi.</p>\r\n\r\n<p><strong>II. THẾ MẠNH V&Agrave; ĐỊNH HƯỚNG CỦA C&Ocirc;NG TY</strong></p>\r\n\r\n<p>Với kim chỉ nam l&agrave; &ldquo;Kh&ocirc;ng ngừng ph&aacute;t triển v&igrave; kh&aacute;ch h&agrave;ng&rdquo;,&nbsp;<strong>Libra Mart&nbsp;</strong>đ&atilde; quy tụ được Ban L&atilde;nh đạo c&oacute; bề d&agrave;y kinh nghiệm trong c&aacute;c lĩnh vực điện tử kh&ocirc;ng chỉ mạnh về kinh doanh m&agrave; c&ograve;n mạnh về c&ocirc;ng nghệ c&oacute; nhiều tiềm năng ph&aacute;t triển, kết hợp với đội ngũ nh&acirc;n vi&ecirc;n trẻ, năng động v&agrave; chuy&ecirc;n nghiệp tạo l&ecirc;n thế mạnh n&ograve;ng cốt của c&ocirc;ng ty để thực hiện tốt c&aacute;c mục ti&ecirc;u đề ra.</p>\r\n\r\n<p>Hơn nữa, tr&ecirc;n cơ sở nguồn lực của c&ocirc;ng ty v&agrave; nhu cầu của x&atilde; hội,&nbsp;<strong>Libra Mart&nbsp;</strong>lựa chọn ph&aacute;t triển kinh doanh c&aacute;c sản phẩm Điện tử phục vụ nhu cầu thiết yếu của người d&acirc;n với c&aacute;c sản phẩm đa dạng phong ph&uacute; mang lại gi&aacute; trị gia tăng cho người ti&ecirc;u d&ugrave;ng th&ocirc;ng qua c&aacute;c dịch vụ sau b&aacute;n h&agrave;ng.</p>\r\n\r\n<p>Qua qu&aacute; tr&igrave;nh ph&aacute;t triển, b&ecirc;n cạnh việc thiết lập được một hệ thống đối t&aacute;c nước trong nước v&agrave; ngo&agrave;i đến từ c&aacute;c doanh nghiệp lớn của H&agrave;n Quốc, Singapore, Trung Quốc, Nhật Bản, c&oacute; thế mạnh trong c&aacute;c lĩnh vực Điện m&aacute;y, sản phẩm c&ocirc;ng nghệ như: Samsung, Sony, Panasonic, Toshiba, Sharp,... Trong thời gian tới</p>\r\n\r\n<p>C&ocirc;ng ty sẽ đầu tư v&agrave;o c&aacute;c ng&agrave;nh nghề mới như bất động sản, khai th&aacute;c kho&aacute;ng, đầu tư t&agrave;i ch&iacute;nh..</p>\r\n\r\n<p><strong>III. CAM KẾT</strong></p>\r\n\r\n<p><strong>Libra Mart&nbsp;</strong>nỗ lực hướng tới mục ti&ecirc;u ph&aacute;t triển bền vững v&agrave; trở th&agrave;nh thương hiệu h&agrave;ng đầu về cung cấp c&aacute;c sản phẩm Điện tử tại Việt Nam mang tầm cỡ quốc tế. Dựa v&agrave;o nội lực của ch&iacute;nh m&igrave;nh v&agrave; mở rộng hợp t&aacute;c với c&aacute;c đối t&aacute;c trong v&agrave; ngo&agrave;i nước ch&uacute;ng t&ocirc;i cam kết.</p>\r\n\r\n<p>Cam kết với đối t&aacute;c:</p>\r\n\r\n<p>- Trở th&agrave;nh đối t&aacute;c chiến lược trong v&agrave; ngo&agrave;i nước tr&ecirc;n cơ sở &quot;Hợp t&aacute;c, ph&aacute;t triển bền vững&quot; hợp t&aacute;c to&agrave;n diện l&acirc;u d&agrave;i nhằm kịp thời đưa những sản phẩm mới nhất v&agrave; dịch vụ theo c&aacute;c y&ecirc;u cầu đặc th&ugrave; của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Cam kết với kh&aacute;ch h&agrave;ng:</p>\r\n\r\n<p>- Lu&ocirc;n lu&ocirc;n l&agrave;m kh&aacute;ch h&agrave;ng h&agrave;i l&ograve;ng về c&aacute;c sản phẩm v&agrave; dịch vụ do&nbsp;<strong>Libra Mart&nbsp;</strong>cung cấp. Sự th&agrave;nh c&ocirc;ng h&agrave;i l&ograve;ng của kh&aacute;ch h&agrave;ng l&agrave; thước đo uy t&iacute;n hiệu quả của doanh nghiệp.</p>\r\n\r\n<p>- Gi&aacute; cả h&agrave;ng h&oacute;a lu&ocirc;n hợp l&yacute; v&agrave; được cập nhật ch&iacute;nh x&aacute;c, kịp thời nhất để phục vụ kh&aacute;ch h&agrave;ng tốt nhất.</p>\r\n\r\n<p>- Lu&ocirc;n lắng nghe, ph&acirc;n t&iacute;ch v&agrave; học hỏi từ thị trường trong v&agrave; ngo&agrave;i nước. Kh&ocirc;ng bao giờ tự m&atilde;n với th&agrave;nh c&ocirc;ng đ&atilde; c&oacute;.</p>\r\n\r\n<p>- Lu&ocirc;n nh&igrave;n lại m&igrave;nh để ph&aacute;t triển (đạo đức v&agrave; kiến thức chuy&ecirc;n m&ocirc;n). Mỗi nh&acirc;n vi&ecirc;n l&agrave; một thương hiệu c&aacute; nh&acirc;n. Mỗi nh&acirc;n vi&ecirc;n l&agrave; một đại sứ thiện ch&iacute; của&nbsp;<strong>Libra Mart&nbsp;</strong>đối với thế giới b&ecirc;n ngo&agrave;i.</p>', NULL, '[null]', 1, 1, NULL, NULL, NULL, '[\"[\\\"[\\\\\\\"[\\\\\\\\\\\\\\\"[\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"[\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Tags\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"]\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"]\\\\\\\\\\\\\\\"]\\\\\\\"]\\\"]\"]', '2019-04-21 14:51:09', '2019-04-21 14:51:09');

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
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highlights` int(11) DEFAULT 0,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `save` int(11) DEFAULT 1,
  `delete_at` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `description`, `content`, `image`, `tag`, `highlights`, `seo_title`, `seo_description`, `seo_image`, `seo_keyword`, `status`, `save`, `delete_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'Mua điện thoại Honor 8X 64GB chính hãng giá rẻ tại Hoàng Hà Mobile', 'mua-dien-thoai-honor-8x-64gb-chinh-hang-gia-re-tai-hoang-ha-mobile', 'Sở hữu những đặc điểm của một chiếc flagship nhưng Honor 8X lại có giá bán rẻ hơn rất nhiều và chiếc điẹn thoại này chắc chắn sẽ không làm bạn phải thất vọng.', '<h2><strong><strong>Mua điện thoại</strong> Honor 8X 64GB ch&iacute;nh h&atilde;ng gi&aacute; rẻ tại Ho&agrave;ng H&agrave; Mobile</strong></h2>\r\n\r\n<p><strong>Sở hữu những đặc điểm của một chiếc flagship nhưng Honor 8X lại c&oacute; gi&aacute; b&aacute;n rẻ hơn rất nhiều v&agrave; chiếc điẹn thoại n&agrave;y chắc chắn sẽ kh&ocirc;ng l&agrave;m bạn phải thất vọng.</strong></p>\r\n\r\n<h3><strong>Ngoại h&igrave;nh sang trọng</strong></h3>\r\n\r\n<p>Tiếp nối người đ&agrave;n anh Huawei P20 Pro được ra mắt tại thị trường Việt Nam trước đ&oacute;,&nbsp;<a href=\"https://hoanghamobile.com/honor-8x-64gb-chinh-hang-p13471.html\">Honor 8X</a>&nbsp;cũng sở hữu cho m&igrave;nh thiết kế kim loại &ndash; k&iacute;nh sang trọng như xu thế hiện nay. Ở mặt lưng, ch&uacute;ng ta sẽ c&oacute; một mặt k&iacute;nh b&oacute;ng bẩy c&oacute; thể phản chiếu lại &aacute;nh s&aacute;ng hoặc h&igrave;nh ảnh của bạn v&agrave; đ&acirc;y cũng l&agrave; vị tr&iacute; của hai ống k&iacute;nh camera k&eacute;p, đ&egrave;n flash LED, cảm biến v&acirc;n tay v&agrave; c&aacute;c logo Honor, dual flash.</p>\r\n\r\n<p><img alt=\"Thật khó để kiếm được chiếc smartphone nào có thiết kế đẹp như Honor 8X trong phân khúc tầm trung – cận cao cấp\" src=\"https://hoanghamobile.com/Uploads/Originals/2018/10/16/201810161128142104_Honor-8X-1.png\" /></p>\r\n\r\n<p>Ở ph&iacute;a trước, ch&uacute;ng ta sẽ c&oacute; một m&agrave;n h&igrave;nh tai thỏ với k&iacute;ch thước l&ecirc;n tới 6.5 inches, c&aacute;c g&oacute;c cạnh đều được bo cong tr&ograve;n mềm mại cho khả năng cầm nắm thoải m&aacute;i nhất d&ugrave; sử dụng trong thời gian d&agrave;i. D&ugrave; vậy nhưng trọng lượng của m&aacute;y chỉ khoảng 175g m&agrave; th&ocirc;i n&ecirc;n n&oacute; sẽ kh&ocirc;ng g&acirc;y ra cảm gi&aacute;c mỏi tay cho bạn.</p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh sắc n&eacute;t</strong></h3>\r\n\r\n<p>Giống như c&aacute;c smartphone Android hiện nay, Honor 8X c&oacute; một m&agrave;n h&igrave;nh tai thỏ k&iacute;ch thước si&ecirc;u lớn l&ecirc;n tới 6.5 inches, tỷ lệ 19.5:9 cực cao cho nhiều kh&ocirc;ng gian hiển thị nội dung hơn. M&agrave;n h&igrave;nh n&agrave;y c&oacute; độ ph&acirc;n giải FullHD+ (1080 x 2340 pixels) n&ecirc;n trải nghiệm phần nh&igrave;n của bạn ho&agrave;n to&agrave;n được đảm bảo với c&aacute;c h&igrave;nh ảnh v&agrave; thước phim sắc n&eacute;t nhất.</p>\r\n\r\n<h3><strong>Hiệu năng mượt m&agrave;</strong></h3>\r\n\r\n<p>Cung cấp sức mạnh cho Honor 8X l&agrave; vi xử l&yacute; Kirin 710 được sản xuất tr&ecirc;n tiến tr&igrave;nh 12nm. Vi xử l&yacute; n&agrave;y gồm c&oacute; 8 nh&acirc;n với 4 nh&acirc;n Cortex-A73 hiệu năng cao xung nhịp 2.2 GHz v&agrave; 4 nh&acirc;n Cortex-A53 tiết kiệm điện với xung nhịp tối đa l&agrave; 1.7 GHz. Đi k&egrave;m l&agrave; l&otilde;i đồ họa Mali-G51 MP4 sẽ đ&aacute;p ứng &ldquo;ngon l&agrave;nh&rdquo; mọi tựa game m&agrave; bạn chơi hay xử l&yacute; mượt m&agrave; mọi t&aacute;c vụ, ứng dụng m&agrave; bạn d&ugrave;ng chỉ trong nh&aacute;y mắt.</p>\r\n\r\n<p><img alt=\"hiệu năng Honor 8X\" src=\"https://hoanghamobile.com/Uploads/Originals/2018/10/16/201810161128142260_Honor-8X-3.png\" /></p>\r\n\r\n<p>Honor 8X c&oacute; hai t&ugrave;y chọn bộ nhớ RAM l&agrave; 4/6GB cho ph&eacute;p bạn thoải m&aacute;i đa nhiệm &ldquo;tẹt ga&rdquo; lưu trữ mọi dữ liệu với bộ nhớ trong l&ecirc;n tới 64/128GB. Nếu từng đ&oacute; l&agrave; chưa đủ th&igrave; m&aacute;y c&ograve;n hỗ trợ mở rộng bằng thẻ nhớ microSD tối đa 400GB nữa, qu&aacute; tuyệt đ&uacute;ng kh&ocirc;gn n&agrave;o.</p>\r\n\r\n<p>Khi sở hữu sản phẩm n&agrave;y th&igrave; bạn sẽ nhận được ngay hệ điều h&agrave;nh Android 8.1 Oreo tr&ecirc;n nền giao diện EMUI 8.2 mượt m&agrave; với nhiều tiện &iacute;ch v&agrave; ứng dụng được c&agrave;i sẵn. Vi&ecirc;n pin dung lượng 3.750 mAh c&oacute; thể mang tới một ng&agrave;y d&agrave;i sử dụng với đa t&aacute;c vụ hay hai ng&agrave;y với những t&aacute;c vụ cơ bản như nghe &ndash; gọi &ndash; nhắn tin.</p>\r\n\r\n<h3><strong>Nhiếp ảnh chuy&ecirc;n nghiệp như DSLR</strong></h3>\r\n\r\n<p>Nếu y&ecirc;u th&iacute;ch nhiếp ảnh di động hay đơn giản l&agrave; s&aacute;ng tạo với những khoảnh khắc đời thường th&igrave; h&atilde;y d&agrave;nh sự ch&uacute; &yacute; cho Honor 8X bạn nh&eacute;. M&aacute;y được trang bị cụm camera k&eacute;p sau với một cảm biến 20MP, khẩu độ F/1.8 hỗ trợ lấy n&eacute;t tự động PDAF v&agrave; một cảm biến chiều s&acirc;u 2MP, khẩu độ F/2.4 c&oacute; khả năng chụp ảnh x&oacute;a ph&ocirc;ng chuy&ecirc;n nghiệp v&agrave; chụp ảnh thiếu s&aacute;ng đỉnh cao như c&aacute;c m&aacute;y ảnh DSLR chuy&ecirc;n dụng.</p>\r\n\r\n<p><img alt=\"camera Honor 8x\" src=\"https://hoanghamobile.com/Uploads/Originals/2018/10/16/201810161128142260_Honor-8X-4.png\" /></p>\r\n\r\n<p>Ở ph&iacute;a trước, ch&uacute;ng ta sẽ c&oacute; một camera selfie độ ph&acirc;n giải 16MP, khẩu độ F/2.0 t&iacute;ch hợp nhiều chế độ chụp ảnh kh&aacute;c nhau như l&agrave;m đẹp, sticker,&hellip; sẽ rất ph&ugrave; hợp cho c&aacute;c bạn nữ.</p>\r\n\r\n<p><strong>C&aacute;c t&iacute;nh năng bổ trợ</strong></p>\r\n\r\n<p><strong><img alt=\"các tính năng trên Honor 8X\" src=\"https://hoanghamobile.com/Uploads/Originals/2018/10/16/201810161128142260_Honor-8X-5.png\" /></strong></p>\r\n\r\n<p>Về bảo mật, Honor 8X c&oacute; cho m&igrave;nh hai c&ocirc;ng nghệ bảo mật ti&ecirc;n tiến nhất hiện nay cho c&aacute;c smartphone l&agrave; cảm biến v&acirc;n tay một chạm v&agrave; m&aacute;y &eacute;t. Trqu&eacute;t khu&ocirc;n mặt ở ph&iacute;a trước. Về giải tr&iacute; th&igrave; m&aacute;y c&oacute; cho m&igrave;nh cổng tai nghe 3.5mm, loa ngo&agrave;i c&oacute; &acirc;m lượng lớn v&agrave; sắc nong một bộ sản phẩm th&igrave;&nbsp;<a href=\"https://hoanghamobile.com/honor-c2306.html\">Honor</a>&nbsp;cũng tặng k&egrave;m cho bạn một chiếc tai nghe để sử dụng v&agrave; một chiếc ốp lưng silicon gi&uacute;p bạn bảo vệ m&aacute;y tốt nhất.</p>', '1546873465.dien_thoai_cao_c', '[\"DGDGDG,\\u1eea,F,WF,\\u01af,W,\\u01afFW\"]', 1, NULL, NULL, '1546873465.ly-do-my-nu-vung-tau-di-xe-70-ty-khong-so-chong-dai-gia-ngoai-tinh-6-1546352396-627-width640height960.jpg', 'null', 0, 1, 0, '2020-02-25 16:12:37', '2020-05-09 08:52:28'),
(3, 1, 'Những mẫu smartphone bị đánh giá thấp nhất năm 2018', 'nhung-mau-smartphone-bi-danh-gia-thap-nhat-nam-2018', 'Bên cạnh những mẫu điện thoại thông minh tuyệt vời năm 2018 như Galaxy Note 9, Mate 20 Pro hay OnePlus 6T thì vẫn còn một “hàng dài” những smartphone bị đánh giá thấp.', '<h2><strong>BlackBerry Key2</strong></h2>\r\n\r\n<p>D&ugrave; c&oacute; thể BlackBerry do TCL quản l&yacute; kh&ocirc;ng tạo được nhiều dấu ấn như Nokia của HMD Global, nhưng&nbsp;điều đ&oacute; kh&ocirc;ng c&oacute; nghĩa l&agrave; điện thoại của h&atilde;ng kh&ocirc;ng c&oacute; g&igrave; nổi bật. Nổi bật trong thời gian gần đ&acirc;y ch&iacute;nh l&agrave;&nbsp;<a href=\"https://hoanghamobile.com/-blackberry-key-2-chinh-hang-p12773.html\">BlackBerry Key2</a>&nbsp;chạy tr&ecirc;n hệ điều h&agrave;nh Android.</p>\r\n\r\n<p>C&oacute; thể bạn kh&ocirc;ng tin, nhưng vẫn c&oacute; rất nhiều người y&ecirc;u th&iacute;ch b&agrave;n ph&iacute;m vật l&yacute; v&agrave; BlackBerry Key2 cũng sở hữu thiết lập n&agrave;y. B&agrave;n ph&iacute;m n&agrave;y được tối ưu gi&uacute;p người d&ugrave;ng c&oacute; thể g&aacute;n c&aacute;c ứng dụng, qu&eacute;t dấu v&acirc;n tay tại ph&iacute;m c&aacute;ch. BlackBerry cũng ph&aacute;t triển mạnh phần mềm như&nbsp;BlackBerry Hub gi&uacute;p quản l&yacute; th&ocirc;ng b&aacute;o, tin nhắn, quyền ri&ecirc;ng tư v&agrave; bộ bảo mật DTEK.</p>\r\n\r\n<p><img alt=\"smartphone-bi-danh-gia-thap-5 Những mẫu smartphone bị đánh giá thấp nhất năm 2018\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/smartphone-bi-danh-gia-thap-5.jpg\" style=\"height:534px; width:800px\" title=\"\" /></p>\r\n\r\n<p>Mang trong m&igrave;nh &ldquo;nhiều thứ&rdquo; nhưng&nbsp;BlackBerry Key2 vẫn chưa thể hiện được sự &ldquo;s&agrave;nh điệu&rdquo; đ&aacute;ng lẽ ra m&aacute;y phải c&oacute;. Th&ecirc;m v&agrave;o đ&oacute;, hiệu năng cũng chưa thực sự xứng đ&aacute;ng với mức gi&aacute; 650 USD (khoảng 15.6 triệu đồng). Cụ thể, m&aacute;y được trang bị chip&nbsp;Snapdragon 660 tầm trung, RAM 6GB, bộ nhớ trong 64/128GB, camera k&eacute;p 12MP, camera selfie 8MP v&agrave; vi&ecirc;n pin dung lượng 3.500mAh.</p>\r\n\r\n<p>N&oacute;i g&igrave; th&igrave; n&oacute;i, c&oacute; mấy chiếc điện thoại được cung cấp b&agrave;n ph&iacute;m vật l&yacute; đ&uacute;ng kh&ocirc;ng n&agrave;o?</p>\r\n\r\n<h2><strong>LG G7 ThinQ</strong></h2>\r\n\r\n<p>LG đ&atilde; trang bị nhiều thứ đ&aacute;ng mong chờ trong chiếc điện thoại n&agrave;y. Camera phụ g&oacute;c rộng 16MP, hệ thống &acirc;m thanh&nbsp;quad-DAC v&agrave; jack cắm tai nghe 3.5mm. M&aacute;y cũng c&oacute; t&iacute;nh năng chống nước, sạc kh&ocirc;ng d&acirc;y, n&uacute;t gọi trợ l&yacute; ảo, loa BoomBox th&uacute; vị.</p>\r\n\r\n<p><img alt=\"smartphone-bi-danh-gia-thap-4 Những mẫu smartphone bị đánh giá thấp nhất năm 2018\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/smartphone-bi-danh-gia-thap-4.jpg\" style=\"height:534px; width:800px\" title=\"\" /></p>\r\n\r\n<p>C&aacute;c th&ocirc;ng số kĩ thuật đ&aacute;ng ch&uacute; &yacute; bao gồm m&agrave;n h&igrave;nh LCD 6.1 inches, RAM 4/6GB, ROM 64/128GB c&oacute; thể mở rộng. Camera ch&iacute;nh 16MP, camera selfie 8MP. Tuy kh&ocirc;ng c&oacute; những đột ph&aacute; nhưng với mức gi&aacute; dưới 600 USD th&igrave; G7 ThinQ sẽ l&agrave; một sự lựa chọn tuyệt vời.</p>\r\n\r\n<h2><strong>Motorola One Power</strong></h2>\r\n\r\n<p>D&ograve;ng điện thoại Moto gi&aacute; rẻ gần như đ&atilde; &ldquo;lu mờ&rdquo; bởi c&aacute;c sản phẩm đến từ Huawei hay Xiaomi. Tuy nhi&ecirc;n, nếu vẫn muốn đặt niềm tin v&agrave;o Moto th&igrave; bạn c&oacute; thể thử qua chiếc One Power gi&aacute; rẻ.</p>\r\n\r\n<p><img alt=\"smartphone-bi-danh-gia-thap-3 Những mẫu smartphone bị đánh giá thấp nhất năm 2018\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/smartphone-bi-danh-gia-thap-3.jpg\" style=\"height:450px; width:800px\" title=\"\" /></p>\r\n\r\n<p>Nổi bật tr&ecirc;n One Power l&agrave; vi&ecirc;n pin dung lượng khủng 5.000mAh, cho ph&eacute;p sử dụng &ldquo;thả phanh&rdquo; trong 2 ng&agrave;y. M&aacute;y trang bị camera k&eacute;p ph&iacute;a sau 16MP v&agrave; 5MP, camera selfie 12MP với đ&egrave;n flash LED. Kết nối USB-C v&agrave; jack cắm tai nghe 3.5mm. One Power sử dụng chip Snapdragon 636, RAM 3/6GB, bộ nhớ trong 32/64GB c&oacute; thể mở rộng. M&agrave;n h&igrave;nh LCD 6.2 inches độ ph&acirc;n giải FullHD+. Mức gi&aacute; của chiếc điện thoại n&agrave;y chỉ khoảng 226 USD ~ 5.2 triệu đồng.</p>\r\n\r\n<h2><strong>Motorola Moto Z3</strong></h2>\r\n\r\n<p>Flagship n&agrave;y cho cảm gi&aacute;c giống với một chiếc Moto Z2.1 hơn l&agrave; một mẫu m&aacute;y ho&agrave;n to&agrave;n mới khi c&oacute; c&ugrave;ng thiết kế v&agrave; trang bị chip Snapdragon 835, nhưng mẫu điện thoại lại bị đ&aacute;nh gi&aacute; thấp hơn bởi mức gi&aacute; 500 USD.</p>\r\n\r\n<p><img alt=\"smartphone-bi-danh-gia-thap-2 Những mẫu smartphone bị đánh giá thấp nhất năm 2018\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/smartphone-bi-danh-gia-thap-2.jpg\" style=\"height:533px; width:800px\" title=\"\" /></p>\r\n\r\n<p>Moto Z3 sẽ cho người d&ugrave;ng một camera tốt hơn, loa to hơn, gamepad v&agrave; thậm ch&iacute; l&agrave; cả m&aacute;y chiếu nhờ v&agrave; bộ phụ kiện Moto Mod.&nbsp;Kh&ocirc;ng những vậy, Motorola c&ograve;n x&aacute;c nhận rằng&nbsp;Moto Z3 sẽ hỗ trợ mạng 5G nhờ một phụ kiện Moto Mod ri&ecirc;ng v&agrave;o năm 2019.</p>\r\n\r\n<p>M&aacute;y được trang bị RAM 4/6GB, bộ nhớ trong 64/128GB, thiết lập camera k&eacute;p 12MP sau, camera selfie 8MP v&agrave; vi&ecirc;n pin 3.000mAh.</p>\r\n\r\n<h2><strong>Sony Xperia XZ2 Compact</strong></h2>\r\n\r\n<p>Nếu từng c&oacute; một thương hiệu được biết đến với những chiếc smartphone bị đ&aacute;nh gi&aacute; thấp, th&igrave; đ&oacute; sẽ l&agrave; Sony. Nổi tiếng với cảm biến m&aacute;y ảnh nhưng chất lượng camera tr&ecirc;n điện thoại Xperia thường kh&ocirc;ng giữ được phong độ. D&ugrave; vậy nhưng h&atilde;ng vẫn lu&ocirc;n cho ra những chiếc smartphone cao cấp. Nếu bạn đang t&igrave;m kiếm một chiếc điện thoại cao cấp với k&iacute;ch thước nhỏ th&igrave;&nbsp;<a href=\"https://hoanghamobile.com/sony-xperia-xz2-compact-chinh-hang-p12520.html\">Xperia XZ2 Compact</a>&nbsp;sẽ l&agrave; lựa chọn ho&agrave;n hảo</p>\r\n\r\n<p><img alt=\"smartphone-bi-danh-gia-thap-1 Những mẫu smartphone bị đánh giá thấp nhất năm 2018\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/smartphone-bi-danh-gia-thap-1.jpg\" style=\"height:450px; width:800px\" title=\"\" /></p>\r\n\r\n<p>Với trải nghiệm nhiếp ảnh, XZ2 Compact cung cấp một camera đơn 19MP khẩu độ F/ 2.0. N&oacute; c&oacute; khả năng quay video si&ecirc;u chậm 960fps ở độ ph&acirc;n giải 720p hoặc 1080p, thậm ch&iacute; l&agrave; cả chụp dự đo&aacute;n v&agrave; quay video 4K HDR. Ph&iacute;a trước l&agrave; một camera selfie 5MP.</p>\r\n\r\n<p>Sony thường tập trung v&agrave;o đa phương tiện v&agrave; điều n&agrave;y cũng đ&uacute;ng với Xperia XZ2 Compact. M&aacute;y c&oacute; chuyển đổi SDR-to-HDR, loa ph&iacute;a trước, hỗ trợ &acirc;m thanh độ ph&acirc;n giải cao v&agrave; hỗ trợ LDAC cho tai nghe Bluetooth.</p>\r\n\r\n<p>Cấu h&igrave;nh của m&aacute;y bao gồm chip Snapdragon 845, RAM 4GB, bộ nhớ trong 64GB c&oacute; thể mở rộng, pin 2.870mAh, c&oacute; chống nước v&agrave; m&aacute;y qu&eacute;t v&acirc;n tay. Sản phẩm n&agrave;y được b&aacute;n độc quyền v&agrave; c&oacute; gi&aacute; l&agrave; 13.990.000 đồng tại Ho&agrave;ng H&agrave; Mobile.</p>\r\n\r\n<h2><strong>Sony Xperia XZ3</strong></h2>\r\n\r\n<p>Xperia XZ3 l&agrave; một cải tiến của&nbsp;Xperia XZ2, m&aacute;y trang bị m&agrave;n h&igrave;nh OLED 6 inches độ ph&acirc;n giải 1.440p. Camera selfie 13MP, vi&ecirc;n pin dung lượng 3.300mAh hỗ trợ sạc kh&ocirc;ng d&acirc;y.</p>\r\n\r\n<p><img alt=\"smartphone-bi-danh-gia-thap Những mẫu smartphone bị đánh giá thấp nhất năm 2018\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/smartphone-bi-danh-gia-thap.jpg\" style=\"height:500px; width:800px\" title=\"\" /></p>\r\n\r\n<p>T&iacute;nh năng rung th&uacute; vị khi xem phim hay chơi game cũng c&oacute; mặt tr&ecirc;n Xperia XZ3. Đi k&egrave;m l&agrave; chip Snapdragon 845, RAM 4GB, camera ch&iacute;nh 19MP, khẩu độ F/2.0 hỗ trợ quay video si&ecirc;u chậm 960fps. C&oacute; chống nước, USB-C v&agrave; kh&ocirc;ng c&oacute; jack cắm tai nghe.</p>\r\n\r\n<p>Tr&ecirc;n tay đ&acirc;y l&agrave; danh s&aacute;ch những chiếc smartphone bị đ&aacute;nh gi&aacute; thấp nhất trong năm 2018. Nếu c&oacute; th&ecirc;m ứng cử vi&ecirc;n n&agrave;o bạn h&atilde;y để lại &yacute; kiến b&ecirc;n dưới phần b&igrave;nh luận v&agrave; đừng qu&ecirc;n theo d&otilde;i trang tin tức của&nbsp;<a href=\"https://hoanghamobile.com/tin-tuc/category/tin-tuc\">Ho&agrave;ng H&agrave; Mobile</a>&nbsp;nh&eacute;.</p>', '1545580571.smartphone-bi-danh-gia-thap-6-696x392.jpg', '[null]', 1, NULL, NULL, '', 'null', 0, 1, 0, '2020-02-25 16:12:20', '2020-05-09 08:52:28'),
(4, 1, 'Samsung tung quảng cáo One UI thể hiện các tính năng mới', 'samsung-tung-quang-cao-one-ui-the-hien-cac-tinh-nang-moi', 'Giao diện One UI ra mắt vào tháng 11 và mới đây đoạn video quảng cáo One UI đã được đăng tải. Hơn 1 phút video đã thể hiện những tính năng One UI trên hệ điều hành mới nhất.', '<h2><strong>Giao diện One UI</strong></h2>\r\n\r\n<p>Phần mềm&nbsp;<a href=\"https://hoanghamobile.com/tin-tuc/one-ui-la-gi\">One UI</a>&nbsp;được tạo ra k&egrave;m với những tối ưu hướng đến sự tập trung. One UI l&agrave;m nổi bật v&agrave; nhấn mạnh c&aacute;c yếu tố quan trọng nhất trong mỗi tương t&aacute;c được cải thiện r&otilde; r&agrave;ng. C&aacute;c t&ugrave;y chọn sẽ xuất hiện hoặc ẩn đi khi thực hiện một số thao t&aacute;c nhất định t&ugrave;y thuộc v&agrave;o những g&igrave; phần mềm thấy cần thiết đến việc hiển thị.</p>\r\n\r\n<p>Tương tự, c&aacute;c biểu tượng v&agrave; văn bản&nbsp;c&oacute; thể được thu nhỏ hoặc ph&oacute;ng to dựa tr&ecirc;n mức độ ưu ti&ecirc;n của ch&uacute;ng.</p>\r\n\r\n<p><img alt=\"quang-cao-one-ui Samsung tung quảng cáo One UI thể hiện các tính năng mới\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/quang-cao-one-ui.jpg\" style=\"height:450px; width:800px\" title=\"\" /></p>\r\n\r\n<p><a href=\"https://hoanghamobile.com/samsung-c33.html\">Samsung</a>&nbsp;cũng chia menu hiển thị l&agrave;m hai khu vực ri&ecirc;ng. Một l&agrave; khu vực xem, hai l&agrave; khu vực tương t&aacute;c.&nbsp;V&ugrave;ng xem chứa một ti&ecirc;u đề lớn gi&uacute;p bạn c&oacute; thể chứa tất cả th&ocirc;ng tin (như khi b&aacute;o thức tiếp theo xuất hiện trong menu b&aacute;o thức). Trong khi khu vực tương t&aacute;c b&ecirc;n dưới &ndash; c&oacute; thể dễ d&agrave;ng truy cập bằng một tay v&agrave; rất nhiều thao t&aacute;c kh&aacute;c nhau.</p>\r\n\r\n<p>Cũng c&oacute; rất nhiều điều chỉnh về mặt thẩm mỹ, ch&uacute;ng phản ảnh thiết kế khối tr&ecirc;n ch&iacute;nh những sản phẩm gần đ&acirc;y của h&atilde;ng Samsung. One UI l&agrave;m cho phần mềm v&agrave; phần cứng c&oacute; vẻ kết nối v&agrave; ph&ugrave; hợp hơn so với giao diện trước kia.</p>\r\n\r\n<h2><strong>Quảng c&aacute;o One UI</strong></h2>\r\n\r\n<p>Theo đoạn video hơn 1 ph&uacute;t quảng c&aacute;o giao diện One UI th&igrave; sẽ c&oacute; một cải tiến lớn so với giao diện Experience. C&oacute; thể thấy c&aacute;c icon đ&atilde; được thiết kế lại ho&agrave;n to&agrave;n, font chữ cũng c&oacute; những thay đổi. Chưa hết, giao diện của c&aacute;c ứng dụng hệ thống trong giao diện One UI đ&atilde; được thay đổi để tối ưu v&agrave; th&acirc;n thiện hơn, mang đến trải nghiệm người d&ugrave;ng mượt hơn.</p>\r\n\r\n<p><img src=\"https://i.ytimg.com/vi/X3LVk0i6bY4/hqdefault.jpg\" /></p>\r\n\r\n<p>Đoạn video quảng c&aacute;o One UI cũng kh&ocirc;ng qu&ecirc;n &ldquo;khoe&rdquo; chế độ &ldquo;ban đ&ecirc;m&rdquo;, đ&acirc;y l&agrave; chế độ th&uacute; vị gi&uacute;p người d&ugrave;ng thoải m&aacute;i nhất khi sử dụng smartphone trong b&oacute;ng tối. Dự kiến giao diện One UI sẽ sẵn s&agrave;ng tr&ecirc;n chiếc Galaxy S10 v&agrave; cập nhật tr&ecirc;n những flagship trước kia c&ugrave;ng với hệ điều h&agrave;nh Android 9 Pie.</p>\r\n\r\n<p>Để cập nhật những tin tức c&ocirc;ng nghệ mới nhất mỗi ng&agrave;y, bạn đừng qu&ecirc;n theo d&otilde;i trang tin tức của&nbsp;<a href=\"https://hoanghamobile.com/tin-tuc/\">Ho&agrave;ng H&agrave; Mobile</a>&nbsp;nh&eacute;!</p>', '1546872157.1546666503-763-sau-chuoi-ngay-tram-cam-nam-em-giam-can-thanh-cong-dep-bat-ngo-28276690_756878167840960_5524718313351355689_n-1546660032-width650height879.jpg', '[\"Samsung tung qu\\u1ea3ng c\\u00e1o One UI th\\u1ec3 hi\\u1ec7n c\\u00e1c t\\u00ednh n\\u0103ng m\\u1edbi\"]', 1, NULL, NULL, '', '\"null\"', 1, 1, 0, '2019-01-07 07:42:37', '2019-03-11 16:51:03'),
(5, 1, 'Cách bật giao diện tối trên Galaxy Note 9 và Galaxy S9', 'cach-bat-giao-dien-toi-tren-galaxy-note-9-va-galaxy-s9', 'Giao diện One UI mới của Samsung hiện đã cho phép người dùng bật giao diện tối trên Galaxy Note 9 và Galaxy S9. Vậy làm cách nào để bật tính năng này.', '<h2><strong>Giao diện tối của One UI</strong></h2>\r\n\r\n<p>Phần mềm của Samsung từ l&acirc;u đ&atilde; mang đến t&iacute;nh năng thay đổi chủ đề to&agrave;n hệ thống, nhưng chưa c&oacute; chế độ tối hay chế độ ban đ&ecirc;m tr&ecirc;n to&agrave;n hệ thống như nhiều nh&agrave; sản xuất kh&aacute;c. Sự xuất hiện của bản cập nhật Android 9 Pie sẽ mang đến giao diện người d&ugrave;ng mới cho ph&eacute;p bật &ldquo;chế độ ban đ&ecirc;m&rdquo; tr&ecirc;n to&agrave;n bộ hệ thống giao diện. T&iacute;nh năng n&agrave;y cho người d&ugrave;ng sự thoải m&aacute;i tối đa khi sử dụng thiết bị v&agrave;o ban đ&ecirc;m v&agrave; n&oacute; rất th&acirc;n thiện với pin.</p>\r\n\r\n<p><img alt=\"bat-giao-dien-toi-tren-galaxy-note-9-1 Cách bật giao diện tối trên Galaxy Note 9 và Galaxy S9\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/bat-giao-dien-toi-tren-galaxy-note-9-1.jpg\" style=\"height:450px; width:800px\" title=\"\" /></p>\r\n\r\n<h3><strong>C&aacute;ch bật giao diện tối tr&ecirc;n Galaxy Note 9 v&agrave; S9</strong></h3>\r\n\r\n<p>Để bật giao diện tối cho điện thoại&nbsp;<a href=\"https://hoanghamobile.com/galaxy-note-9--c2350.html\">Galaxy Note 9</a>, S9 cần thực hiện c&aacute;c bước sau:</p>\r\n\r\n<ol>\r\n	<li>Mở&nbsp;<strong>C&agrave;i đặt</strong>&nbsp;<strong>(settings)</strong>&nbsp;tr&ecirc;n điện thoại của bạn</li>\r\n	<li>K&eacute;o xuống ph&iacute;a dưới v&agrave; chọn&nbsp;<strong>Hiển thị (Display)</strong></li>\r\n	<li>T&igrave;m chế độ&nbsp;<strong>Ban đ&ecirc;m (Night mode)</strong>&nbsp;v&agrave; nhấn v&agrave;o n&uacute;t&nbsp;<strong>Bật chế độ ngay lập tức (Turn on now)</strong></li>\r\n</ol>\r\n\r\n<p><img alt=\"bat-giao-dien-toi-tren-galaxy-note-9-1-1 Cách bật giao diện tối trên Galaxy Note 9 và Galaxy S9\" src=\"https://hoanghamobile.com/tin-tuc/wp-content/uploads/2018/12/bat-giao-dien-toi-tren-galaxy-note-9-1-1.jpg\" style=\"height:548px; width:800px\" title=\"\" /></p>\r\n\r\n<p>Để đặt cấu h&igrave;nh Chế độ ban đ&ecirc;m, bạn chọn v&agrave;o mục nhập thay v&igrave; chọn chuyển đổi. Ngay l&uacute;c n&agrave;y, kh&ocirc;ng c&oacute; t&ugrave;y chọn cấu h&igrave;nh, bạn c&oacute; thể bật chế độ ban đ&ecirc;m tr&ecirc;n to&agrave;n hệ thống v&agrave;o ban đ&ecirc;m, giống như bạn bật chế độ lọc &aacute;nh s&aacute;ng xanh như h&igrave;nh ảnh hiện tại.</p>\r\n\r\n<p>Để truy cập dễ d&agrave;ng hơn v&agrave;o chế độ ban đ&ecirc;m, bạn c&oacute; thể th&ecirc;m một chuyển đổi nhanh trong phần th&ocirc;ng b&aacute;o.</p>\r\n\r\n<p>Lưu &yacute; rằng, t&iacute;nh năng Dark Mode &ndash; Chế độ ban đ&ecirc;m hiện chưa c&oacute; sẵn tr&ecirc;n c&aacute;c thiết bị Galaxy Note 9 v&agrave; Galaxy S9 do giao diện One UI chưa được ch&iacute;nh thức ph&aacute;t h&agrave;nh. Ch&iacute;nh v&igrave; vậy bạn c&oacute; thể tham khảo trước để biết c&aacute;ch sử dụng cũng như t&aacute;c dụng của n&oacute;.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; c&aacute;ch bật giao diện tối tr&ecirc;n Galaxy Note 9, S9, ch&uacute;c c&aacute;c bạn th&agrave;nh c&ocirc;ng. Đừng qu&ecirc;n theo d&otilde;i&nbsp;<a href=\"https://hoanghamobile.com/tin-tuc\">Ho&agrave;ng H&agrave; Mobile</a>&nbsp;để cập nhật những tin tức c&ocirc;ng nghệ mới mỗi ng&agrave;y nh&eacute;!</p>\r\n\r\n<p><strong>Xem th&ecirc;m:&nbsp;</strong>Vsmart Active 1+ Cấu h&igrave;nh tốt, gi&aacute; ph&aacute; đảo tại Ho&agrave;ng H&agrave; Mobile</p>\r\n\r\n<p><img src=\"https://i.ytimg.com/vi/M2ggBhU8quE/hqdefault.jpg\" /></p>\r\n\r\n<p><strong>C&ugrave;ng&nbsp;<a href=\"http://bit.ly/SubscribeHHChannel\">Follow k&ecirc;nh Youtube</a>&nbsp;của Ho&agrave;ng H&agrave; Mobile để cập nhật những tin tức mới nhất, sinh động nhất nh&eacute;!</strong></p>', '1545580813.bat-giao-dien-toi-tren-galaxy-note-9-2-696x392.jpg', '[\"C\\u00e1ch b\\u1eadt giao di\\u1ec7n t\\u1ed1i tr\\u00ean Galaxy Note 9 v\\u00e0 Galaxy S9\"]', 0, NULL, NULL, '', '\"null\"', 1, 1, 0, '2019-01-03 09:36:13', '2019-01-27 07:40:08'),
(6, 1, 'Mê mẩn diện quần rách, Tâm Tít đích thị là \"nữ hoàng cái bang\" của Vbiz', 'me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz', 'Mê mẩn diện quần rách, Tâm Tít đích thị là \"nữ hoàng cái bang\" của Vbiz', '<h2>T&acirc;m T&iacute;t hiện tại ăn diện &quot;chất chơi&quot; v&agrave; sexy hơn ng&agrave;y c&ograve;n hoạt động showbiz nhiều lần.</h2>\r\n\r\n<p>T&acirc;m T&iacute;t, c&ocirc; n&agrave;ng hotgirl đ&igrave;nh đ&aacute;m một thời, lấy chồng đại gia một c&aacute;i cuộc đời bước sang một trang mới. Kh&ocirc;ng chỉ sắm h&agrave;ng hiệu xa xỉ&nbsp;kh&ocirc;ng ngơi tay, T&acirc;m T&iacute;t cứ ra đường l&agrave; d&aacute;t h&agrave;ng hiệu l&ecirc;n người.</p>\r\n\r\n<p>T&acirc;m T&iacute;t c&ograve;n ng&agrave;y c&agrave;ng son sắc mặn m&agrave;, quyến rũ ngay cả khi đ&atilde; l&agrave; mẹ 2 con. Thậm ch&iacute; nhiều người c&ograve;n nhận x&eacute;t lấy chồng v&agrave; sinh con xong nh&igrave;n c&ocirc; c&ograve;n nhuận sắc hơn cả hồi c&ograve;n son rỗi.</p>\r\n\r\n<p>Gu&nbsp;<a href=\"https://eva.vn/thoi-trang-c36.html\">thời trang</a>&nbsp;của b&agrave; mẹ 2 con cũng ng&agrave;y c&agrave;ng chất ngất, c&ocirc; khoe d&aacute;ng với loạt v&aacute;y &aacute;o thời thượng. Đặc biệt, T&acirc;m T&iacute;t rất hay trưng dụng quần jeans r&aacute;ch - xu hướng thời trang được c&ocirc; ứng dụng nhiều nhất. Đến mức fans cho rằng T&acirc;m T&iacute;t ch&iacute;nh l&agrave; &quot;nữ ho&agrave;ng c&aacute;i bang&quot; mỗi khi diện quần jeans r&aacute;ch c&aacute; t&iacute;nh.</p>\r\n\r\n<p><img alt=\"me man dien quan rach, tam tit dich thi la &amp;#34;nu hoang cai bang&amp;#34; cua vbiz - 1\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-photo-1-1534317699359797699717-crop-15343186528451-1546421508-339-width640height426.jpg\" style=\"height:333px; width:500px\" /></p>\r\n\r\n<p>T&acirc;m T&iacute;t được phong l&agrave; nữ ho&agrave;ng c&aacute;i bang v&igrave; c&ocirc; sở hữu những chiếc quần jeasn r&aacute;ch cực chất. Điển h&igrave;nh l&agrave; item te tua n&agrave;y khi c&ocirc; phối c&ugrave;ng &aacute;o thun ba lỗ, t&uacute;i của Gucci v&agrave; gi&agrave;y b&aacute;nh m&igrave; của&nbsp;Stella McCartney. Set đồ năng động khoẻ khoắn v&agrave; khiến c&ocirc; trẻ hơn chục tuổi.</p>\r\n\r\n<p><img alt=\"me man dien quan rach, tam tit dich thi la &amp;#34;nu hoang cai bang&amp;#34; cua vbiz - 2\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-1-1546421754-376-width519height588.jpg\" style=\"height:566px; width:500px\" /></p>\r\n\r\n<p>Một lần kh&aacute;c cũng với chiếc quần jeas r&aacute;ch kh&ocirc;ng thua k&eacute;m item ở tr&ecirc;n&nbsp;được b&agrave; mẹ 2 con phối hợp với phụ kiện đi k&egrave;m gồm gi&agrave;y Chanel, t&uacute;i v&agrave; thắt lưng Gucci cộng với đ&oacute; l&agrave; chiếc v&ograve;ng tay cực ngầu của Hermes. Tr&ocirc;ng T&acirc;m T&iacute;t cứ như một chiến binh tr&ecirc;n đường phố.&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"360\" id=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" name=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"640\"></iframe></p>\r\n\r\n<p><img alt=\"me man dien quan rach, tam tit dich thi la &amp;#34;nu hoang cai bang&amp;#34; cua vbiz - 3\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-32087084_2111956615498200_3510802298924171264_n-1546421508-432-width720height960.jpg\" style=\"height:667px; width:500px\" /></p>\r\n\r\n<p>Thay đổi mỗi chiếc &aacute;o ba lỗ th&agrave;nh &aacute;o c&uacute;p ngực của Dior cho th&ecirc;m gợi cảm để đi h&aacute;t karaoke c&ugrave;ng &ocirc;ng x&atilde;.</p>\r\n\r\n<p><img alt=\"me man dien quan rach, tam tit dich thi la &amp;#34;nu hoang cai bang&amp;#34; cua vbiz - 4\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-28870726_2038616046165591_5435393201321363509_n-1546421508-593-width719height960.jpg\" style=\"height:667px; width:500px\" /></p>\r\n\r\n<p>Đi du lịch c&ugrave;ng chồng m&agrave; T&acirc;m T&iacute;t vẫn kh&ocirc;ng qu&ecirc;n mang theo quần r&aacute;ch để diện đ&acirc;y n&agrave;y.&nbsp;</p>\r\n\r\n<p><img alt=\"me man dien quan rach, tam tit dich thi la &amp;#34;nu hoang cai bang&amp;#34; cua vbiz - 5\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-2-1546421856-815-width600height600.jpg\" /></p>\r\n\r\n<p>Nếu kh&ocirc;ng diện quần r&aacute;ch th&igrave; b&agrave; mẹ 2 con cũng thả d&aacute;ng với v&aacute;y xuy&ecirc;n thấu cut out n&oacute;ng bỏng mix với mũ s&agrave;nh điệu của Dior.&nbsp;</p>\r\n\r\n<p><img alt=\"me man dien quan rach, tam tit dich thi la &amp;#34;nu hoang cai bang&amp;#34; cua vbiz - 6\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-284291203459277692458794983853155193192448n-153430-1546421800-949-width640height640.jpg\" /></p>\r\n\r\n<p>Ra đường dạo với bạn cũng ăn mặc chuẩn như một fashionista với những m&oacute;n đồ xa hoa từ Hermes, Chanel, Saint Laurent...</p>\r\n\r\n<p><img alt=\"me man dien quan rach, tam tit dich thi la &amp;#34;nu hoang cai bang&amp;#34; cua vbiz - 7\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-3121089817576772176490602549651586594897920n-15343-1546421800-488-width640height640.jpg\" /></p>\r\n\r\n<p>Một lần kh&aacute;c lại khoe ch&acirc;n với quần jeans ống rộng mix k&egrave;m với &aacute;o thun của&nbsp;Balmain. C&oacute; thể n&oacute;i từ khi c&oacute; 2 con, T&acirc;m T&iacute;t ch&iacute;nh thức trở th&agrave;nh b&agrave; mẹ ăn mặc &quot;chặt ch&eacute;m&quot; nhất Vbiz.&nbsp;</p>', '1546447558.me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-32087084_2111956615498200_3510802298924171264_n-1546421508-432-width720height960.jpg', '[\"M\\u00ea m\\u1ea9n di\\u1ec7n qu\\u1ea7n r\\u00e1ch,T\\u00e2m T\\u00edt \\u0111\\u00edch th\\u1ecb l\\u00e0 \\\"n\\u1eef ho\\u00e0ng c\\u00e1i bang\\\" c\\u1ee7a Vbiz\"]', 1, 'Mê mẩn diện quần rách, Tâm Tít đích thị là \"nữ hoàng cái bang\" của Vbiz', 'Tâm Tít, cô nàng hotgirl đình đám một thời, lấy chồng đại gia một cái cuộc đời bước sang một trang mới. Không chỉ sắm hàng hiệu xa xỉ không ngơi tay, Tâm Tít cứ ra đường là dát hàng hiệu lên người.', '1546447558.me-man-dien-quan-rach-tam-tit-dich-thi-la-nu-hoang-cai-bang-cua-vbiz-32087084_2111956615498200_3510802298924171264_n-1546421508-432-width720height960.jpg', '\"M\\u00ea m\\u1ea9n di\\u1ec7n qu\\u1ea7n r\\u00e1ch, T\\u00e2m T\\u00edt \\u0111\\u00edch th\\u1ecb l\\u00e0 \\\"n\\u1eef ho\\u00e0ng c\\u00e1i bang\\\" c\\u1ee7a Vbiz\"', 1, 1, 0, '2019-01-02 09:45:58', '2019-01-17 16:58:53'),
(7, 1, 'Quần rách hở đùi như Tâm Tít, mặc sao không phản cảm?', 'quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam', 'Quần jeans rách là món đồ \"phải có trong tủ\" của nhiều chị em trên toàn thế giới. Hình ảnh con gái mặc quần jeans rách, đi giày thể thao trông rất cá tính, năng động, hoạt bát. Đương nhiên, độ rách của quần phải có điểm dừng, chừng mực, phù hợp hoàn cảnh đi đâu, gặp ai, làm gì...', '<h2>Stylist gợi &yacute; 3 phong c&aacute;ch mặc quần jeans r&aacute;ch c&aacute; t&iacute;nh, năng động m&agrave; kh&ocirc;ng phản cảm.</h2>\r\n\r\n<p><img alt=\"quan rach ho dui nhu tam tit, mac sao khong phan cam? - 1\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-11-02/quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-604-an-nhien1-1541129226-width660height-1541148781-310-width660height603.jpg\" style=\"height:457px; width:500px\" /></p>\r\n\r\n<p>Stylist An Nhi&ecirc;n tư vấn mặc tinh tế loại quần jeans r&aacute;ch.</p>\r\n\r\n<p>Quần jeans r&aacute;ch l&agrave; m&oacute;n đồ &quot;phải c&oacute; trong tủ&quot; của nhiều&nbsp;chị em tr&ecirc;n to&agrave;n thế giới. H&igrave;nh ảnh con g&aacute;i mặc quần jeans r&aacute;ch, đi gi&agrave;y thể thao tr&ocirc;ng rất c&aacute; t&iacute;nh, năng động, hoạt b&aacute;t. Đương nhi&ecirc;n,&nbsp;độ r&aacute;ch của quần phải c&oacute; điểm dừng, chừng mực, ph&ugrave; hợp ho&agrave;n cảnh đi đ&acirc;u, gặp ai, l&agrave;m g&igrave;... Việc mặc quần r&aacute;ch một c&aacute;ch kh&ocirc;ng c&acirc;n nhắc c&oacute; thể&nbsp;khiến bạn tr&ocirc;ng&nbsp;phản cảm ở chốn đ&ocirc;ng người.&nbsp;</p>\r\n\r\n<p>Vậy mặc quần r&aacute;ch c&aacute; t&iacute;nh, s&agrave;nh điệu&nbsp;kh&oacute; hay kh&ocirc;ng? Stylist An Nhi&ecirc;n cho rằng:&nbsp;<em>&quot;Mặc quần jeans r&aacute;ch c&aacute; t&iacute;nh kh&ocirc;ng kh&oacute;, chỉ kh&oacute; ở chỗ&nbsp;bạn l&agrave;m c&aacute;ch n&agrave;o để&nbsp;lựa chọn đ&uacute;ng chiếc quần m&igrave;nh cần. Quần r&aacute;ch c&oacute; nhiều loại.&nbsp;C&aacute;c nh&agrave; mốt đ&atilde; biến tấu ch&uacute;ng th&agrave;nh&nbsp;baggy, skinny, quần ống loe, quần ống su&ocirc;ng với những độ r&aacute;ch lớn nhỏ kh&aacute;c nhau.&nbsp;</em></p>\r\n\r\n<p><em>Bạn phải&nbsp;chắc chắn chiếc quần m&igrave;nh mặc xuất hiện đ&uacute;ng nơi, đ&uacute;ng chỗ. V&agrave; thực tế l&agrave;, nếu bạn kh&ocirc;ng phải những fashionista th&igrave; n&ecirc;n hạn chế loại&nbsp;quần r&aacute;ch qu&aacute; to. V&igrave;&nbsp;c&oacute; thể nếu kh&ocirc;ng&nbsp;phải l&agrave; một chuy&ecirc;n gia ăn mặc, bạn dễ biến ch&uacute;ng th&agrave;nh thảm hoạ. Cuối c&ugrave;ng, h&atilde;y mặc những chiếc quần jeans r&aacute;ch thật ngầu v&agrave; tinh tế.&quot;</em></p>\r\n\r\n<p><img alt=\"quan rach ho dui nhu tam tit, mac sao khong phan cam? - 2\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-11-02/quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-442-3-1541067753-width564height846-1541148781-66-width564height846.jpg\" style=\"height:750px; width:500px\" /></p>\r\n\r\n<p>Phong c&aacute;ch street style của Bella Hadid.</p>\r\n\r\n<p>Sau c&acirc;u khẳng định ph&iacute;a tr&ecirc;n,&nbsp;stylist An Nhi&ecirc;n đưa ra những gợi &yacute; mặc đẹp cho chị em như b&ecirc;n dưới. C&aacute;ch phối quần jeans r&aacute;ch c&ugrave;ng trang phục kh&aacute;c được chia l&agrave;m 3 phong c&aacute;ch chủ đạo:</p>\r\n\r\n<p>Thứ nhất,&nbsp;phong c&aacute;ch thanh lịch c&ugrave;ng jeans r&aacute;ch để đi l&agrave;m. C&ocirc;ng thức cơ bản: Quần jeans r&aacute;ch vừa phải, &ocirc;m + &aacute;o sơ mi, &aacute;o thun + &aacute;o kho&aacute;c blazer (hoặc kho&aacute;c cardigan nhẹ nh&agrave;ng v&agrave;o m&ugrave;a thu đ&ocirc;ng ) + gi&agrave;y cao g&oacute;t hoặc bốt + t&uacute;i x&aacute;ch.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"360\" id=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" name=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"640\"></iframe></p>\r\n\r\n<p><img alt=\"quan rach ho dui nhu tam tit, mac sao khong phan cam? - 3\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-11-02/quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-298----nh-1-1541067666-width660height95-1541148781-266-width660height955.jpg\" /></p>\r\n\r\n<p>Những gợi &yacute; mặc quần jeans r&aacute;ch thanh lịch, c&oacute; thể mặc đi l&agrave;m.</p>\r\n\r\n<p>Ri&ecirc;ng quần jeans r&aacute;ch lớn (v&iacute; dụ như của T&acirc;m T&iacute;t, Vũ Ho&agrave;ng Điệp...), bạn nữ lưu &yacute;&nbsp;chỉ n&ecirc;n mặc đi dạo phố, đi chơi, kh&ocirc;ng n&ecirc;n mặc đi l&agrave;m, đến&nbsp;những nơi trang trọng, nghi&ecirc;m t&uacute;c. V&igrave; như vậy tr&ocirc;ng rất phản cảm. Nếu đến c&ocirc;ng sở, bạn n&ecirc;n chọn quần jeans&nbsp;kiểu skinny &ocirc;m v&agrave; r&aacute;ch nhỏ, phối c&ugrave;ng sơ mi, &aacute;o&nbsp;kho&aacute;c blaze&nbsp;hoặc &aacute;o kho&aacute;c len cadigan mỏng.</p>\r\n\r\n<p><img alt=\"quan rach ho dui nhu tam tit, mac sao khong phan cam? - 4\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-11-02/quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-701-t--m-t--t2-1541068684-width660heigh-1541148781-64-width660height672.jpg\" /></p>\r\n\r\n<p>T&acirc;m T&iacute;t mới đ&acirc;y g&acirc;y ch&uacute; &yacute; khi mặc jeans r&aacute;ch ra phố.</p>\r\n\r\n<p><img alt=\"quan rach ho dui nhu tam tit, mac sao khong phan cam? - 5\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-11-02/quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-102-v---ho--ng---i---p-1541129878-width-1541148781-702-width500height492.jpg\" /></p>\r\n\r\n<p>Quần jeans r&aacute;ch của Vũ Ho&agrave;ng Điệp g&acirc;y tranh c&atilde;i phản cảm ở chốn đ&ocirc;ng người.</p>\r\n\r\n<p>Thứ hai, chọn quần&nbsp;jeans r&aacute;ch kết hợp c&ugrave;ng c&aacute;c layer kh&aacute;c nhau để biến tấu ph&ugrave; hợp với tinh thần&nbsp;street style - ứng dụng khi đi dạo phố, đi chơi, du lịch.&nbsp;Với sự kết hợp n&agrave;y, ta c&oacute; c&ocirc;ng thức cơ bản: Quần jean r&aacute;ch + &aacute;o thun (&aacute;o crop top, &aacute;o 2 d&acirc;y,... ) + kho&aacute;c th&ecirc;m &aacute;o denim, kaki hoặc bomber + gi&agrave;y thể thao hoặc bốt&nbsp;+ phụ kiện k&iacute;nh, mũ...</p>\r\n\r\n<p><img alt=\"quan rach ho dui nhu tam tit, mac sao khong phan cam? - 6\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-11-02/quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-984-5-1541067761-width564height704-1541148782-936-width564height704.jpg\" /></p>\r\n\r\n<p><img alt=\"quan rach ho dui nhu tam tit, mac sao khong phan cam? - 7\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-11-02/quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-953-ho--ng-th--y-linh-1541129796-width5-1541148781-785-width550height550.jpg\" /></p>\r\n\r\n<p>Một v&agrave;i v&iacute; dụ kh&aacute;c cho phong c&aacute;ch mặc quần r&aacute;ch dạo phố.</p>\r\n\r\n<p>Thứ ba, phối quần jeans r&aacute;ch theo phong c&aacute;ch&nbsp;cơ bản. C&ocirc;ng thức đơn giản l&agrave;:&nbsp;Quần jeans r&aacute;ch + &aacute;o thun free size, &aacute;o hoodie, &aacute;o sơ mi hoặc th&ecirc;m phần nữ t&iacute;nh khi mặc c&ugrave;ng sơ mi trễ vai. C&aacute;ch phối n&agrave;y&nbsp;khiến cho chiếc quần r&aacute;ch kh&ocirc;ng c&ograve;n phản cảm m&agrave; thay v&agrave;o đ&oacute; l&agrave; sự linh hoạt, năng động. Bạn c&oacute; thể mặc n&oacute;&nbsp;đi học, đi chơi, đi dạo phố,...</p>', '1546447705.quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-701-t--m-t--t2-1541068684-width660heigh-1541148781-64-width660height672.jpg', '[\"Qu\\u1ea7n r\\u00e1ch h\\u1edf \\u0111\\u00f9i nh\\u01b0 T\\u00e2m T\\u00edt, m\\u1eb7c sao kh\\u00f4ng ph\\u1ea3n c\\u1ea3m?\"]', 1, 'Mê mẩn diện quần rách, Tâm Tít đích thị là \"nữ hoàng cái bang\" của Vbiz', 'Quần jeans rách là món đồ \"phải có trong tủ\" của nhiều chị em trên toàn thế giới. Hình ảnh con gái mặc quần jeans rách, đi giày thể thao trông rất cá tính, năng động, hoạt bát. Đương nhiên, độ rách của quần phải có điểm dừng, chừng mực, phù hợp hoàn cảnh đi đâu, gặp ai, làm gì...', '1546447705.quan-rach-ho-dui-nhu-tam-tit-mac-sao-khong-phan-cam-1541142060-701-t--m-t--t2-1541068684-width660heigh-1541148781-64-width660height672.jpg', '\"Qu\\u1ea7n jeans r\\u00e1ch l\\u00e0 m\\u00f3n \\u0111\\u1ed3 \\\"ph\\u1ea3i c\\u00f3 trong t\\u1ee7\\\" c\\u1ee7a nhi\\u1ec1u ch\\u1ecb em tr\\u00ean to\\u00e0n th\\u1ebf gi\\u1edbi. H\\u00ecnh \\u1ea3nh con g\\u00e1i m\\u1eb7c qu\\u1ea7n jeans r\\u00e1ch, \\u0111i gi\\u00e0y th\\u1ec3 thao tr\\u00f4ng r\\u1ea5t c\\u00e1 t\\u00ednh, n\\u0103ng \\u0111\\u1ed9ng, ho\\u1ea1t b\\u00e1t. \\u0110\\u01b0\\u01a1ng nhi\\u00ean, \\u0111\\u1ed9 r\\u00e1ch c\\u1ee7a qu\\u1ea7n ph\\u1ea3i c\\u00f3 \\u0111i\\u1ec3m d\\u1eebng, ch\\u1eebng m\\u1ef1c, ph\\u00f9 h\\u1ee3p ho\\u00e0n c\\u1ea3nh \\u0111i \\u0111\\u00e2u, g\\u1eb7p ai, l\\u00e0m g\\u00ec...\"', 1, 1, 0, '2019-01-02 09:48:25', '2019-03-11 16:51:03'),
(8, 1, 'Lý do', 'ly-do', 'Đầu tháng 1.2018, Nữ hoàng sắc đẹp toàn cầu 2016 - Ngọc Duyên bất ngờ lên xe hoa cùng ông xã đại gia bất động sản 42 tuổi.', '<h2>Nữ ho&agrave;ng sắc đẹp to&agrave;n cầu - Ngọc Duy&ecirc;n lạc quan đ&oacute;n nhận mọi thứ, d&ugrave; tốt hay xấu.</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngọc Duy&ecirc;n kết h&ocirc;n với đại gia bất động sản hồi đầu năm 2018.</p>\r\n\r\n<p>Đầu th&aacute;ng 1.2018, Nữ ho&agrave;ng sắc đẹp to&agrave;n cầu 2016 - Ngọc Duy&ecirc;n bất ngờ l&ecirc;n xe hoa c&ugrave;ng &ocirc;ng x&atilde; đại gia bất động sản 42 tuổi. Cặp đ&ocirc;i lần lượt tổ chức h&ocirc;n lễ ho&agrave;nh tr&aacute;ng tại Vũng T&agrave;u v&agrave; H&agrave; Nội. N&oacute;i về người đ&agrave;n &ocirc;ng của cuộc đời m&igrave;nh, Ngọc Duy&ecirc;n&nbsp;cho biết, chồng c&ocirc;&nbsp;l&agrave; người rất t&acirc;m l&yacute;, d&ugrave;&nbsp;lớn hơn 18 tuổi nhưng kh&ocirc;ng hề c&oacute; khoảng c&aacute;ch trong chuyện t&igrave;nh cảm.&nbsp;</p>\r\n\r\n<p>Bất ngờ nối tiếp bất ngờ,&nbsp;4 th&aacute;ng sau kết h&ocirc;n, Ngọc Duy&ecirc;n v&agrave; &ocirc;ng x&atilde; doanh nh&acirc;n ch&agrave;o đ&oacute;n con g&aacute;i đầu l&ograve;ng, nặng 2,5kg. Mặc d&ugrave;&nbsp;c&ocirc;ng việc kinh doanh của chồng bận rộn, &iacute;t c&oacute; thời gian b&ecirc;n nhau nhưng c&ocirc; vẫn rất h&agrave;i l&ograve;ng về cuộc sống h&ocirc;n nh&acirc;n:&nbsp;&quot;T&ocirc;i rất hạnh ph&uacute;c. Chồng t&ocirc;i y&ecirc;u thương v&agrave; chu đ&aacute;o lắm. Lấy nhau rồi, cuộc sống kh&ocirc;ng c&oacute; g&igrave; thay đổi, m&agrave; vợ chồng chỉ ng&agrave;y c&agrave;ng hạnh ph&uacute;c v&agrave; y&ecirc;u nhau nhiều hơn th&ocirc;i.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngọc Duy&ecirc;n hiện tại hỗ trợ &ocirc;ng x&atilde; trong việc kinh doanh.</p>\r\n\r\n<p>Chỉ ở nh&agrave; chăm con hơn 3 th&aacute;ng, Ngọc Duy&ecirc;n nhanh ch&oacute;ng quay lại với c&ocirc;ng việc, hỗ trợ chồng trong chuyện kinh doanh. Hiện tại để tiện bề quản l&yacute;, l&agrave;m ăn, hai người chủ yếu sống ở một biệt thự tại S&agrave;i G&ograve;n, di chuyển nhiều giữa 2 miền Nam - Bắc. Cặp đ&ocirc;i thường đi l&agrave;m bằng si&ecirc;u xe trị gi&aacute; 70 tỷ đồng.&nbsp;</p>\r\n\r\n<p>Khi được hỏi v&igrave; sao lấy chồng gi&agrave;u c&oacute;&nbsp;vẫn đi l&agrave;m sớm như vậy, Ngọc Duy&ecirc;n chia sẻ:&nbsp;&quot;T&ocirc;i đi l&agrave;m c&ugrave;ng chồng để c&oacute; thể chia sẻ v&agrave; đồng h&agrave;nh c&ugrave;ng anh ấy trong mọi mặt. T&ocirc;i kiểm so&aacute;t việc marketing v&agrave; kinh doanh của c&ocirc;ng ty anh ấy n&ecirc;n cũng kh&ocirc;ng qu&aacute; vất vả. Hơn thế,&nbsp;l&agrave;m việc cũng l&agrave; niềm vui của t&ocirc;i&nbsp;từ trước tới giờ, gi&uacute;p bản th&acirc;n năng động hơn, mở rộng th&ecirc;m nhiều kiến thức v&agrave; kỹ&nbsp;năng trong cuộc sống&nbsp;v&agrave; x&atilde; hội.&quot;&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"360\" id=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" name=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"640\"></iframe></p>\r\n\r\n<p>Ngọc Duy&ecirc;n&nbsp;phủ nhận chuyện đi l&agrave;m c&ugrave;ng&nbsp;c&ocirc;ng ty với chồng v&igrave; lo ngại chồng ngoại t&igrave;nh, phải k&egrave; k&egrave; kiểm so&aacute;t.&nbsp;L&yacute; do c&ocirc;&nbsp;đưa ra&nbsp;l&agrave;:&nbsp;&quot;Vợ chồng t&ocirc;i lu&ocirc;n chung thủy v&agrave; tin tưởng nhau trong t&igrave;nh y&ecirc;u, n&ecirc;n t&ocirc;i kh&ocirc;ng lo việc đ&oacute;.&quot;</p>\r\n\r\n<p>Sang năm mới 2019, Nữ ho&agrave;ng sắc đẹp to&agrave;n cầu&nbsp;h&eacute; lộ c&oacute; kế hoạch kinh doanh mới, tuy chưa thể bật m&iacute; cụ thể nhưng h&eacute; lộ&nbsp;l&agrave;&nbsp;ph&aacute;t triển một c&ocirc;ng ty quảng c&aacute;o m&agrave; c&ocirc;&nbsp;th&agrave;nh lập ra.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngọc Duy&ecirc;n thon thả sau sinh khiến nhiều người ngưỡng mộ.</p>\r\n\r\n<p>Cũng v&igrave; chuyện nhanh ch&oacute;ng đi l&agrave;m lại, Ngọc Duy&ecirc;n kh&ocirc;ng thể chăm con 24/24. C&ocirc; cho biết:&nbsp;&quot;Em b&eacute; c&oacute; người chăm ở nh&agrave;. T&ocirc;i đi l&agrave;m trưa chạy về nh&agrave; ăn cơm rồi cho em b&eacute; ăn trưa lu&ocirc;n, chơi với con ch&uacute;t rồi lại chạy l&ecirc;n c&ocirc;ng ty l&agrave;m việc. Chiều về lại đưa con đi chơi, được c&aacute;i c&ocirc;ng ty gần nh&agrave; n&ecirc;n cũng tiện.&quot;&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra,&nbsp;vợ chồng c&ocirc; cũng kh&ocirc;ng c&oacute; thời gian tự nấu nướng h&agrave;ng ng&agrave;y như trước, chỉ c&oacute; cuối tuần hay tổ chức BBQ tại nh&agrave; v&agrave; ăn uống c&ugrave;ng nhau.&nbsp;</p>\r\n\r\n<p>Nh&igrave;n lại tổng thể 2 năm qua, từ việc đăng quang Nữ ho&agrave;ng sắc đẹp tới lấy chồng, sinh con, Ngọc Duy&ecirc;n cảm thấy bản th&acirc;n l&agrave; người&nbsp;may mắn v&igrave; mọi chuyện đều diễn ra&nbsp;tốt đẹp. C&ocirc; t&acirc;m sự:&nbsp;&quot;2 năm qua, cuộc sống của t&ocirc;i kh&ocirc;ng phải thay đổi 180 độ m&agrave; l&agrave; mọi thứ đến rất nhanh, như được sắp đặt sẵn. T&ocirc;i kh&ocirc;ng cảm thấy bất an v&igrave; mọi chuyện qu&aacute; ho&agrave;n hảo, t&ocirc;i chỉ lạc quan đ&oacute;n nhận mọi thứ, sống tốt từng giờ&nbsp;từng ph&uacute;t. Mỉm cười v&agrave; lu&ocirc;n suy nghĩ t&iacute;ch cực th&igrave; ng&agrave;y mai sẽ lu&ocirc;n tốt đẹp.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cuối tuần, gia đ&igrave;nh Ngọc Duy&ecirc;n thường tổ chức tiệc BBQ tại nh&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngọc Duy&ecirc;n v&agrave; chồng hiện tại ở trong những biệt thự sang trọng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>H&igrave;nh ảnh &quot;g&aacute;i một con, tr&ocirc;ng m&ograve;n con mắt&quot; của Ngọc Duy&ecirc;n gần đ&acirc;y.</p>', '1546447952.ly-do-my-nu-vung-tau-di-xe-70-ty-khong-so-chong-dai-gia-ngoai-tinh-6-1546352396-627-width640height960.jpg', '[\"L\\u00fd do\"]', 1, 'Lý do', 'Lý do \"mỹ nữ Vũng Tàu đi xe 70 tỷ\" không sợ chồng đại gia ngoại tình', '1546447952.ly-do-my-nu-vung-tau-di-xe-70-ty-khong-so-chong-dai-gia-ngoai-tinh-6-1546352396-627-width640height960.jpg', 'null', 1, 1, 0, '2019-01-06 08:53:00', '2019-01-10 10:26:38');
INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `description`, `content`, `image`, `tag`, `highlights`, `seo_title`, `seo_description`, `seo_image`, `seo_keyword`, `status`, `save`, `delete_at`, `created_at`, `updated_at`) VALUES
(9, 1, '“Nữ tướng” ngành làm đẹp Đỗ Thị Hoài Diễm ngồi “ghế nóng” Hoa hậu Doanh nhân Hoàn vũ 2019', 'nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019', 'Với nhiều năm kinh nghiệm trong ngành làm đẹp, là tên tuổi được nhiều người kính nể, Đỗ Thị Hoài Diễm chính thức nhận lời mời từ ban tổ chức (BTC) Hoa hậu Doanh nhân Hoàn vũ 2019 ngồi vào ghế nóng cuộc thi được tổ chức tại Thái Lan.', '<h2>Với nhiều năm kinh nghiệm trong ng&agrave;nh l&agrave;m đẹp, l&agrave; t&ecirc;n tuổi được nhiều người k&iacute;nh nể, Đỗ Thị Ho&agrave;i Diễm ch&iacute;nh thức nhận lời mời từ ban tổ chức (BTC) Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ 2019 ngồi v&agrave;o ghế n&oacute;ng cuộc thi được tổ chức tại Th&aacute;i Lan.</h2>\r\n\r\n<p>T&ecirc;n tuổi Đỗ Thị Ho&agrave;i Diễm đ&atilde; kh&ocirc;ng c&ograve;n xa lạ trong ng&agrave;nh l&agrave;m đẹp, c&ocirc; từng vinh dự được nhận kỉ niệm chương do Ph&oacute; chủ tịch nước Đặng Thị Ngọc Thịnh trao tặng, người đẹp c&ograve;n l&agrave; nh&agrave; t&agrave;i trợ đồng h&agrave;nh c&ugrave;ng Hoa hậu biển Việt Nam to&agrave;n cầu 2018. B&ecirc;n cạnh đ&oacute;, nữ doanh nh&acirc;n t&agrave;i sắc thường xuy&ecirc;n được t&ocirc;n vinh v&agrave; trao tặng c&aacute;c giải thưởng cho c&aacute;c th&agrave;nh tựu v&agrave; đ&oacute;ng g&oacute;p của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"“nu tuong” nganh lam dep do thi hoai diem ngoi “ghe nong” hoa hau doanh nhan hoan vu 2019 - 1\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-12-28/nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3475-1545983181-79-width660height952.jpg\" style=\"height:721px; width:500px\" /></p>\r\n\r\n<p>Vốn hiền l&agrave;nh, thật th&agrave;, nhẹ nh&agrave;ng từ vẻ bề ngo&agrave;i v&agrave; mạnh mẽ, t&aacute;o bạo, chiến lược trong kinh doanh, Đỗ Thị Ho&agrave;i Diễm đ&atilde; kh&ocirc;ng tiếc tiền đầu tư cho c&ocirc;ng t&aacute;c đ&agrave;o tạo, mời chuy&ecirc;n gia đồng h&agrave;nh để x&acirc;y dựng hệ thống vững mạnh v&agrave; c&oacute; sức lan toả. Hiện nay chị đang l&agrave; Tổng gi&aacute;m đốc c&ocirc;ng ty TNHH đầu tư quốc tế Linh Ng&acirc;n với gần 400 đại l&yacute; thương hiệu nước hoa Onic trong cả nước. Chị cũng l&agrave; người sở hữu c&ocirc;ng nghệ điều trị n&aacute;m ti&ecirc;n tiến hiện nay l&agrave; Dimanlaier tại Việt Nam.</p>\r\n\r\n<p>L&agrave; một người d&agrave;y dặn kinh nghiệm v&agrave; c&oacute; tiếng n&oacute;i trong ng&agrave;nh c&ocirc;ng nghiệp l&agrave;m đẹp, kh&ocirc;ng kh&oacute; hiểu khi BTC Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ lại mời Ho&agrave;i Diễm trở th&agrave;nh một trong những gi&aacute;m khảo quyền lực tại cuộc thi Hoa Hậu Doanh nh&acirc;n Ho&agrave;n vũ 2019.</p>\r\n\r\n<p><img alt=\"“nu tuong” nganh lam dep do thi hoai diem ngoi “ghe nong” hoa hau doanh nhan hoan vu 2019 - 2\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-12-28/nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3478-1545983181-925-width660height990.jpg\" style=\"height:750px; width:500px\" /></p>\r\n\r\n<p>Đ&acirc;y l&agrave; lần đầu ti&ecirc;n nữ doanh nh&acirc;n nhận lời mời ngồi ghế n&oacute;ng tại một cuộc thi nhan sắc. D&ugrave; l&agrave; người c&oacute; nhiều kinh nghiệm v&agrave; th&iacute;ch nghi tốt với những m&ocirc;i trường l&agrave;m việc kh&aacute;c nhau, Đỗ Thị Ho&agrave;i Diễm vẫn kh&ocirc;ng tr&aacute;nh khỏi sự lo lắng, hồi hộp.<em>&nbsp;&ldquo;T&ocirc;i hy vọng với kinh nghiệm của bản th&acirc;n, t&ocirc;i sẽ gi&uacute;p c&aacute;c th&iacute; sinh khắc phục những thiếu s&oacute;t, đưa ra được những lời khuy&ecirc;n hữu &iacute;ch để c&aacute;c em ho&agrave;n thiện bản th&acirc;n. Nh&igrave;n sơ bộ ban đầu, d&agrave;n th&iacute; sinh năm nay nổi trội về ngoại h&igrave;nh v&agrave; tr&iacute; tuệ, t&ocirc;i hy vọng sẽ gi&uacute;p BTC t&igrave;m ra được Hoa hậu xứng đ&aacute;ng nhất&rdquo;</em>, Ho&agrave;i Diễm b&agrave;y tỏ.</p>\r\n\r\n<p><img alt=\"“nu tuong” nganh lam dep do thi hoai diem ngoi “ghe nong” hoa hau doanh nhan hoan vu 2019 - 3\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-12-28/nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3482-1545983181-753-width660height990.jpg\" /></p>\r\n\r\n<p>Đồng h&agrave;nh với nữ tướng Đỗ Thị Ho&agrave;i Diễm tại Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ 2019 l&agrave; d&agrave;n ban gi&aacute;m khảo quyền lực: Đương kim Hoa hậu Đại sứ Qu&yacute; b&agrave; Ho&agrave;n Vũ thế giới 2018 - Hoa hậu Ch&acirc;u Ngọc B&iacute;ch, c&ocirc; đảm nhận vai tr&ograve; Trưởng Ban gi&aacute;m khảo c&ugrave;ng c&aacute;c gương mặt uy t&iacute;n kh&aacute;c như: &Aacute; hậu Doanh nh&acirc;n Ho&agrave;n vũ 2017 Ngọc Quỳnh, &Aacute; kh&ocirc;i Bảo Ch&acirc;u, Ca sĩ Du Thi&ecirc;n, Ca sĩ Thu Trang&hellip;</p>\r\n\r\n<p>B&ecirc;n cạnh c&aacute;c hoạt động kinh doanh, Ho&agrave;i Diễm d&agrave;nh phần lớn thời gian cho c&aacute;c chương tr&igrave;nh thiện nguyện. C&ocirc; hy vọng với những đ&oacute;ng g&oacute;p của m&igrave;nh sẽ gi&uacute;p một phần n&agrave;o đ&oacute;, cải thiện được đời sống của c&aacute;c em.</p>\r\n\r\n<p><img alt=\"“nu tuong” nganh lam dep do thi hoai diem ngoi “ghe nong” hoa hau doanh nhan hoan vu 2019 - 4\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-12-28/nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3483-1545983181-534-width660height990.jpg\" /></p>\r\n\r\n<p>Doanh nh&acirc;n t&agrave;i năng Đỗ Thị Ho&agrave;i Diễm lu&ocirc;n t&iacute;ch cực, lac quan, c&ocirc; l&agrave; một trong những h&igrave;nh mẫu l&yacute; tưởng của phụ nữ hiện đại. Với những g&igrave; đ&atilde; v&agrave; đang l&agrave;m được, Đỗ Thị Ho&agrave;i Diễm được tin tưởng sẽ đưa ra được những lựa chọn x&aacute;c đ&aacute;ng tại Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ 2019.</p>\r\n\r\n<p>Cuộc thi Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ &ndash; Ms Universe Business 2019 nhằm t&ocirc;n vinh nhan sắc, tr&iacute; tuệ, bản lĩnh của c&aacute;c nữ doanh nh&acirc;n, tạo cơ hội cho c&aacute;c nữ l&atilde;nh đạo doanh nghiệp giao lưu, kết nối, quảng b&aacute; doanh nghiệp, học hỏi kinh nghiệm v&agrave; c&ugrave;ng nhau tham gia những hoạt động x&atilde; hội.</p>\r\n\r\n<p><img alt=\"“nu tuong” nganh lam dep do thi hoai diem ngoi “ghe nong” hoa hau doanh nhan hoan vu 2019 - 5\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-12-28/nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3487-1545983181-830-width660height990.jpg\" /></p>\r\n\r\n<p>Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ &ndash; Ms Universe Business 2019 đ&atilde; ch&iacute;nh thức bước v&agrave;o h&agrave;nh tr&igrave;nh đi t&igrave;m gương mặt xứng đ&aacute;ng nhất cho ng&ocirc;i vị cao nhất &ndash; người sẽ l&agrave; niềm tự h&agrave;o cho c&aacute;c nữ doanh nh&acirc;n Việt bởi nhan sắc v&agrave; t&agrave;i năng.</p>\r\n\r\n<p>Được biết, th&iacute; sinh gi&agrave;nh ng&ocirc;i vị cao nhất trong đ&ecirc;m chung kết Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ 2019 sẽ nhận được tổng giải thưởng trị gi&aacute; 1,5 tỷ đồng, vương miện v&agrave; bằng chứng nhận từ ban tổ chức. Ngo&agrave;i ra cuộc thi c&ograve;n trao c&aacute;c danh hiệu &Aacute; hậu 1, &Aacute; hậu 2, &Aacute; hậu 3 v&agrave; c&aacute;c giải thưởng phụ.</p>\r\n\r\n<p><img alt=\"“nu tuong” nganh lam dep do thi hoai diem ngoi “ghe nong” hoa hau doanh nhan hoan vu 2019 - 6\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-12-28/nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3489-1545983181-59-width660height990.jpg\" /></p>\r\n\r\n<p><img alt=\"“nu tuong” nganh lam dep do thi hoai diem ngoi “ghe nong” hoa hau doanh nhan hoan vu 2019 - 7\" src=\"https://cdn.eva.vn/upload/4-2018/images/2018-12-28/nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3490-1545983181-482-width660height990.jpg\" /></p>\r\n\r\n<p>Đ&ecirc;m chung kết v&agrave; đăng quang của cuộc thi Hoa hậu Doanh nh&acirc;n Ho&agrave;n vũ &ndash; Ms Universe Business 2019 sẽ diễn ra v&agrave;o ng&agrave;y 14/03 tại Th&aacute;i Lan.</p>', '1546448218.nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3475-1545983181-79-width660height952.jpg', '[\"\\u201cN\\u1eef t\\u01b0\\u1edbng\\u201d ng\\u00e0nh l\\u00e0m \\u0111\\u1eb9p \\u0110\\u1ed7 Th\\u1ecb Ho\\u00e0i Di\\u1ec5m ng\\u1ed3i \\u201cgh\\u1ebf n\\u00f3ng\\u201d Hoa h\\u1eadu Doanh nh\\u00e2n Ho\\u00e0n v\\u0169 2019\"]', 1, '“Nữ tướng” ngành làm đẹp Đỗ Thị Hoài Diễm ngồi “ghế nóng” Hoa hậu Doanh nhân Hoàn vũ 2019', 'Với nhiều năm kinh nghiệm trong ngành làm đẹp, là tên tuổi được nhiều người kính nể, Đỗ Thị Hoài Diễm chính thức nhận lời mời từ ban tổ chức (BTC) Hoa hậu Doanh nhân Hoàn vũ 2019 ngồi vào ghế nóng cuộc thi được tổ chức tại Thái Lan.', '1546448218.nu-tuong-nganh-lam-dep-do-thi-hoai-diem-ngoi-ghe-nong-hoa-hau-doanh-nhan-hoan-vu-2019-img-3475-1545983181-79-width660height952.jpg', 'null', 0, 1, 0, '2019-01-06 08:53:12', '2019-03-11 16:51:13'),
(10, 1, 'Mặc gì cũng như bà già, học ngay Triệu Vy cách \"cưa sừng làm nghé\" đơn giản như không', 'mac-gi-cung-nhu-ba-gia-hoc-ngay-trieu-vy-cach-cua-sung-lam-nghe-don-gian-nhu-khong', 'Mặc gì cũng như bà già, học ngay Triệu Vy cách \"cưa sừng làm nghé\" đơn giản như không', '<h2>C&aacute;c n&agrave;ng U30, U40 ho&agrave;n to&agrave;n c&oacute; thể học hỏi Triệu Vy với c&ocirc;ng thức mix đồ si&ecirc;u thần th&aacute;nh n&agrave;y.</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tạm dừng</p>\r\n\r\n<p>Thời gian hiện tại0:10</p>\r\n\r\n<p>/</p>\r\n\r\n<p>Độ d&agrave;i1:48</p>\r\n\r\n<p>Đ&atilde; tải: 0%</p>\r\n\r\n<p>Tiến tr&igrave;nh: 0%</p>\r\n\r\n<p>To&agrave;n m&agrave;n h&igrave;nh</p>\r\n\r\n<p>Tắt tiếng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Giảm c&acirc;n đầy ngoạn mục, Triệu Vy cứ mỗi lần xuất hiện l&agrave; một lần khiến người ta xu&yacute;t xoa bởi sắc v&oacute;c qu&aacute; đỗi ho&agrave;n hảo cũng như&nbsp;gu&nbsp;<a href=\"https://eva.vn/thoi-trang-c36.html\">thời trang</a>&nbsp;cực k&igrave; trẻ trung m&agrave; vẫn&nbsp;hợp tuổi.</p>\r\n\r\n<p>Nếu như c&aacute;ch đ&acirc;y một v&agrave;i năm, Triệu Vy trong mắt c&ocirc;ng ch&uacute;ng như một minh tinh đ&atilde; hết thời với th&acirc;n h&igrave;nh ph&igrave; nhi&ecirc;u mất kiểm so&aacute;t c&ugrave;ng gu thời trang gi&agrave; ch&aacute;t ch&uacute;a th&igrave; hiện tại, Triệu Vy đang dần lấy lại phong độ v&agrave; khẳng định một lần nữa danh xưng mỹ nh&acirc;n kh&ocirc;ng tuổi của showbiz xứ Trung. Kh&ocirc;ng chỉ nỗ lực hết m&igrave;nh trong việc lấy lại v&oacute;c d&aacute;ng thon gọn m&agrave; hơn nữa, Triệu Vy c&ograve;n cực k&igrave; đầu tư cho những &ldquo;bộ c&aacute;nh&rdquo; với khả năng &ldquo;hack&rdquo; tuổi si&ecirc;u thần th&aacute;nh. Điển h&igrave;nh như set đồ m&agrave; Triệu Vy mới diện gần đ&acirc;y trong một lần tham dự sự kiện.</p>\r\n\r\n<p><img alt=\"mac gi cung nhu ba gia, hoc ngay trieu vy cach &amp;#34;cua sung lam nghe&amp;#34; don gian nhu khong - 1\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/photo-1-1545908755824628452524--copy--1546403197-843-width600height900.jpeg\" style=\"height:750px; width:500px\" /></p>\r\n\r\n<p>Cứ tưởng &aacute;o hoodie in chữ chỉ d&agrave;nh cho những c&ocirc; n&agrave;ng trẻ tuổi. Thế nhưng Triệu Vy, người đẹp đ&atilde; bước qua ngưỡng tuổi 40 diện l&ecirc;n vẫn đẹp đến bất ngờ.&nbsp;</p>\r\n\r\n<p><img alt=\"mac gi cung nhu ba gia, hoc ngay trieu vy cach &amp;#34;cua sung lam nghe&amp;#34; don gian nhu khong - 2\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/photo-1-15459087593601810295196-1546403338-563-width600height600.jpeg\" style=\"height:500px; width:500px\" /></p>\r\n\r\n<p>Diện cả c&acirc;y đồ đen với &aacute;o hoodie v&agrave; quần jeans r&aacute;ch, tr&ocirc;ng Triệu Vy cực k&igrave; c&aacute; t&iacute;nh,&nbsp;trẻ trung v&agrave; s&agrave;nh điệu. Đặc biệt, m&agrave;u đen khiến set đồ của người đẹp trở n&ecirc;n tinh tế v&agrave; thanh lịch&nbsp;hơn, đ&uacute;ng như những g&igrave; m&agrave; người ta muốn thấy ở những c&ocirc; n&agrave;ng chững tuổi thời hiện đại.</p>\r\n\r\n<p><img alt=\"mac gi cung nhu ba gia, hoc ngay trieu vy cach &amp;#34;cua sung lam nghe&amp;#34; don gian nhu khong - 3\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/48944854_2003480633071331_1918221587979436032_n--copy--1546403197-745-width600height400.jpg\" style=\"height:333px; width:500px\" /></p>\r\n\r\n<p>Kh&ocirc;ng những chẳng bị tố &quot;cưa sừng l&agrave;m ngh&eacute;&quot;, set đồ c&ograve;n gi&uacute;p Triệu Vy &quot;thu hoạch&quot; được cả &quot;rổ&quot; lời khen bởi gu thời trang qu&aacute; đỗi trẻ trung v&agrave; tinh tế.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"360\" id=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" name=\"google_ads_iframe_/214571812/eva.pc.thoi_trang.onpagevideo.640x360_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"640\"></iframe></p>\r\n\r\n<p>N&oacute;i đến đ&acirc;y&nbsp;kh&ocirc;ng biết c&aacute;c n&agrave;ng c&oacute; kịp tinh &yacute; m&agrave; nhận ra tuyệt chi&ecirc;u &ldquo;hack&rdquo; tuổi đẹp thần sầu được Triệu Vy lăng x&ecirc; mệt nghỉ chưa nhỉ? Đ&uacute;ng thế, ấy ch&iacute;nh l&agrave; combo kết hợp giữa &aacute;o nỉ/&aacute;o hoodie c&ugrave;ng một item c&oacute; thiết kế tối giản kh&aacute;c như quần jeans, quần kaki hay ch&acirc;n v&aacute;y với c&aacute;c gam m&agrave;u trung t&iacute;nh, trang nh&atilde; v&agrave; nhẹ nh&agrave;ng. Đừng tưởng những items n&agrave;y chỉ d&agrave;nh cho c&aacute;c c&ocirc; n&agrave;ng tuổi đ&ocirc;i mươi nh&eacute;, bởi lẽ tr&ecirc;n thực tế&nbsp;ch&uacute;ng cũng được coi l&agrave; gợi &yacute; si&ecirc;u ho&agrave;n hảo gi&uacute;p c&aacute;c n&agrave;ng U30, U40 tha hồ m&agrave; &ldquo;hack&rdquo; tuổi đấy!</p>\r\n\r\n<p><strong>&Aacute;o nỉ/&aacute;o hoodie + quần jeans/kaki</strong></p>\r\n\r\n<p><img alt=\"mac gi cung nhu ba gia, hoc ngay trieu vy cach &amp;#34;cua sung lam nghe&amp;#34; don gian nhu khong - 4\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/photo-5-1545908759367834291565--copy--1546403197-432-width600height750.jpg\" /></p>\r\n\r\n<p>&Aacute;o hoodie/&aacute;o nỉ với c&aacute;c thiết kế đơn giản l&agrave; gợi &yacute; cực hay ho&nbsp;d&agrave;nh cho c&aacute;c c&ocirc; g&aacute;i U30, U40.</p>\r\n\r\n<p>C&aacute;c kiểu quần với thiết kế tối giản c&ugrave;ng c&aacute;c gam m&agrave;u cơ bản hay trung t&iacute;nh như quần jeans, quần kaki trắng, đen, x&aacute;m,... dẫu kh&ocirc;ng c&oacute; g&igrave; qu&aacute; đặc biệt nhưng ch&iacute;nh sự &ldquo;kh&ocirc;ng c&oacute; g&igrave; đặc biệt&rdquo; đ&atilde; gi&uacute;p ch&uacute;ng trở th&agrave;nh c&aacute;c items đem theo &ldquo;ph&eacute;p m&agrave;u&rdquo; trẻ h&oacute;a tuyệt vời.</p>\r\n\r\n<p>Hay n&oacute;i đơn giản hơn, đ&acirc;y ch&iacute;nh x&aacute;c l&agrave; những items khiến người diện như trẻ ra cả chục tuổi. Chưa kể đến, kiểu &aacute;o nỉ hay &aacute;o hoodie với thiết kế kh&ocirc;ng qu&aacute; cầu k&igrave; khi kết hợp với c&aacute;c kiểu quần n&agrave;y sẽ tạo n&ecirc;n một set đồ vừa trẻ trung, năng động lại vừa nh&atilde; nhặn, thanh lịch.</p>\r\n\r\n<p><img alt=\"mac gi cung nhu ba gia, hoc ngay trieu vy cach &amp;#34;cua sung lam nghe&amp;#34; don gian nhu khong - 5\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/c8f4da6be071cb8773677eb6a0004678--copy--1546403197-551-width600height450.jpg\" /></p>\r\n\r\n<p>&Aacute;o hoodie/&aacute;o nỉ v&agrave; quần jeans được coi l&agrave; &quot;cặp b&agrave;i tr&ugrave;ng&quot; cho một set đồ &quot;hack&quot; tuổi đẹp thần sầu.</p>\r\n\r\n<p><img alt=\"mac gi cung nhu ba gia, hoc ngay trieu vy cach &amp;#34;cua sung lam nghe&amp;#34; don gian nhu khong - 6\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/mac-gi-cung-nhu-ba-gia-hoc-ngay-trieu-vy-cach-dien-do-cua-sung-lam-nghe-cuc-tinh-te-7b52d81af5c74a6c57d32aa689a1d036--copy--1546406438-987-width600height836.jpg\" /></p>\r\n\r\n<p>C&aacute;c gam m&agrave;u trầm như đen, xanh đen, x&aacute;m,... kh&ocirc;ng những gi&uacute;p che đi c&aacute;c khuyết điểm ở v&oacute;c d&aacute;ng m&agrave; hơn nữa, ch&uacute;ng&nbsp;cũng khiến&nbsp;c&aacute;c n&agrave;ng tr&ocirc;ng trẻ ra cả v&agrave;i tuổi.</p>\r\n\r\n<p><img alt=\"mac gi cung nhu ba gia, hoc ngay trieu vy cach &amp;#34;cua sung lam nghe&amp;#34; don gian nhu khong - 7\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-02/mac-gi-cung-nhu-ba-gia-hoc-ngay-trieu-vy-cach-dien-do-cua-sung-lam-nghe-cuc-tinh-te-401826358070b571a6bf22802666f88a--copy--1546406477-24-width600height892.jpg\" /></p>\r\n\r\n<p>&Aacute;o hoodie + quần kaki cũng l&agrave; một combo cực ph&ugrave; hợp m&agrave; c&aacute;c n&agrave;ng c&oacute; thể thử &aacute;p dụng. Tuy nhi&ecirc;n, nếu kh&ocirc;ng muốn trở n&ecirc;n qu&aacute; l&ograve;e loẹt v&agrave; nổi bật th&igrave;&nbsp;h&atilde;y lựa chọn những chiếc quần kaki t&ocirc;ng m&agrave;u cơ bản v&agrave; nhẹ nh&agrave;ng&nbsp;như đen, trắng, n&acirc;u be,...</p>\r\n\r\n<p><strong>&Aacute;o nỉ/&aacute;o hoodie + ch&acirc;n v&aacute;y</strong></p>\r\n\r\n<p>Nếu kh&ocirc;ng muốn bị g&ograve; b&oacute; với c&aacute;c kiểu quần d&agrave;i &ocirc;m s&aacute;t, c&aacute;c n&agrave;ng cũng ho&agrave;n to&agrave;n c&oacute; thể thế chỗ ch&uacute;ng bằng những thiết kế ch&acirc;n v&aacute;y tối giản. V&iacute; dụ như c&aacute;c kiểu ch&acirc;n v&aacute;y đơn sắc hoặc ch&acirc;n v&aacute;y kẻ d&aacute;ng d&agrave;i qu&aacute; gối. Kh&aacute;c với vẻ năng động của quần jeans hay quần kaki, ch&acirc;n v&aacute;y d&agrave;i khi kết hợp với &aacute;o nỉ/&aacute;o hoodie sẽ tạo n&ecirc;n một set đồ mang đậm n&eacute;t quyến rũ, nữ t&iacute;nh v&agrave; đặc biệt vẫn cực k&igrave; trẻ trung. Tuy nhi&ecirc;n, h&atilde;y ch&uacute; &yacute; tr&aacute;nh xa những kiểu v&aacute;y qu&aacute; d&agrave;i c&aacute;c n&agrave;ng nh&eacute;, bởi lẽ ch&uacute;ng sẽ khiến set đồ tr&ocirc;ng rườm r&agrave; v&agrave; k&eacute;m tinh tế&nbsp;đi&nbsp;rất nhiều.</p>', '1546448543.photo-1-1545908755824628452524--copy--1546403197-843-width600height900.jpeg', '[\"M\\u1eb7c g\\u00ec c\\u0169ng nh\\u01b0 b\\u00e0 gi\\u00e0, h\\u1ecdc ngay Tri\\u1ec7u Vy c\\u00e1ch \\\"c\\u01b0a s\\u1eebng l\\u00e0m ngh\\u00e9\\\" \\u0111\\u01a1n gi\\u1ea3n nh\\u01b0 kh\\u00f4ng\"]', 1, 'Mặc gì cũng như bà già, học ngay Triệu Vy cách \"cưa sừng làm nghé\" đơn giản như không', 'Nếu như cách đây một vài năm, Triệu Vy trong mắt công chúng như một minh tinh đã hết thời với thân hình phì nhiêu mất kiểm soát cùng gu thời trang già chát chúa thì hiện tại, Triệu Vy đang dần lấy lại phong độ và khẳng định một lần nữa danh xưng mỹ nhân không tuổi của showbiz xứ Trung', '1546448543.photo-1-1545908755824628452524--copy--1546403197-843-width600height900.jpeg', '\"M\\u1eb7c g\\u00ec c\\u0169ng nh\\u01b0 b\\u00e0 gi\\u00e0, h\\u1ecdc ngay Tri\\u1ec7u Vy c\\u00e1ch \\\"c\\u01b0a s\\u1eebng l\\u00e0m ngh\\u00e9\\\" \\u0111\\u01a1n gi\\u1ea3n nh\\u01b0 kh\\u00f4ng\"', 1, 2, 0, '2019-01-02 10:02:23', '2019-03-11 16:51:03'),
(11, 1, 'Gạo Nếp Gạo Tẻ: Thúy Diễm xuất hiện xinh đẹp, tự tin để phá cặp Hương - Tường', 'gao-nep-gao-te-thuy-diem-xuat-hien-xinh-dep-tu-tin-de-pha-cap-huong-tuong', 'Ngoài ra, Hương cũng bất ngờ gặp lại mẹ Tường trong không khí căng thẳng. Thật ra trước đây mẹ Tường vốn cảm thấy Hương không xứng đáng với con trai mình, chỉ là vì Tường quá thích cô mà bà đành phải chấp nhận.', '<h2>Hương b&agrave;ng ho&agrave;ng khi tho&aacute;ng nghe được giọng n&oacute;i của Tường trong tập 105 Gạo Nếp Gạo Tẻ.</h2>\r\n\r\n<p>Tạm dừng</p>\r\n\r\n<p>Thời gian hiện tại0:26</p>\r\n\r\n<p>/</p>\r\n\r\n<p>Độ d&agrave;i2:12</p>\r\n\r\n<p>Đ&atilde; tải: 0%</p>\r\n\r\n<p>Tiến tr&igrave;nh: 0%</p>\r\n\r\n<p>To&agrave;n m&agrave;n h&igrave;nh</p>\r\n\r\n<p>Bật &acirc;m thanh</p>\r\n\r\n<p>Gạo Nếp Gạo Tẻ tập 105 - Hương vẫn kh&ocirc;ng ngừng tự dằn vặt bản th&acirc;n khi nhớ về Tường (Nguồn: HTV2)</p>\r\n\r\n<p><em>Tập 105 Gạo Nếp Gạo Tẻ</em>&nbsp;kể với kh&aacute;n giả cuộc sống mới của c&aacute;c con g&aacute;i, con rể cũ nh&agrave; b&agrave; Mai (NSND Hồng V&acirc;n).&nbsp;</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 1\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10504-1546484087-843-width650height366.jpg\" style=\"height:282px; width:500px\" /></p>\r\n\r\n<p>Thời gian tr&ocirc;i qua, giờ đ&acirc;y&nbsp;Hương&nbsp;(L&ecirc; Phương) kh&ocirc;ng chỉ c&oacute; th&ecirc;m b&eacute; M&iacute;t - con của Tường&nbsp;(Thanh Thức)&nbsp;m&agrave; c&ograve;n trở th&agrave;nh người đứng đầu 1 c&ocirc;ng ty. Trong khi&nbsp;đ&oacute;, H&acirc;n&nbsp;(Th&uacute;y Ng&acirc;n) giữ chức&nbsp;gi&aacute;m đốc b&aacute;n h&agrave;ng cho c&ocirc;ng ty chị g&aacute;i, c&ograve;n Minh&nbsp;(Phương Hằng)&nbsp;hạnh ph&uacute;c đề huề khi trở th&agrave;nh mẹ của 2 cặp sinh đ&ocirc;i.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 2\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10503-1546484087-562-width650height404.jpg\" style=\"height:311px; width:500px\" /></p>\r\n\r\n<p>Gia đ&igrave;nh nhỏ của ch&uacute; Quang (Ngọc Thuận)&nbsp;c&oacute; th&ecirc;m 1 c&ocirc; con g&aacute;i đ&aacute;ng y&ecirc;u, xinh xắn. Về ph&iacute;a 2 ch&agrave;ng rể cũ của b&agrave; Mai, Kiệt v&agrave; C&ocirc;ng cũng th&agrave;nh c&ocirc;ng kh&ocirc;ng k&eacute;m. C&ocirc;ng (Ho&agrave;ng Anh)&nbsp;trở th&agrave;nh &ocirc;ng chủ của một n&ocirc;ng trại trồng rau hữu cơ, c&ograve;n Kiệt (Trung Dũng) đ&atilde; ổn định sự nghiệp.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 3\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10501-1546484087-438-width650height366.jpg\" style=\"height:282px; width:500px\" /></p>\r\n\r\n<p>Sự thay đổi v&agrave; trưởng th&agrave;nh của C&ocirc;ng đ&atilde; để lại thiện cảm với b&agrave; Mai, v&igrave; lẽ đ&oacute; m&agrave; b&agrave; lu&ocirc;n t&igrave;m cơ hội để thuyết phục Hương &ldquo;nối lại t&igrave;nh xưa&rdquo;. Về phần C&ocirc;ng, d&ugrave; vẫn c&ograve;n t&igrave;nh cảm với Hương nhưng anh vẫn kh&ocirc;ng d&aacute;m bước qua giới hạn bạn b&egrave;&hellip;</p>\r\n\r\n<p>Điều chưa trọn vẹn duy nhất trong&nbsp;nh&agrave; b&agrave; Mai l&uacute;c n&agrave;y l&agrave;&nbsp;b&agrave; Đ&agrave;o ng&agrave;y c&agrave;ng l&agrave;m căng với vợ chồng ch&uacute; Quang để &eacute;p Trinh (Puka) sinh th&ecirc;m ch&aacute;u trai nối d&otilde;i.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 4\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10507-1546484087-772-width650height434.jpg\" style=\"height:334px; width:500px\" /></p>\r\n\r\n<p>D&ugrave; th&agrave;nh đạt nhưng cả 2 chị em Hương v&agrave; H&acirc;n đều mang trong l&ograve;ng nỗi buồn về chuyện t&igrave;nh cảm khi mất đi hạnh ph&uacute;c với người đ&agrave;n &ocirc;ng m&agrave; m&igrave;nh y&ecirc;u thương. B&eacute; M&iacute;t - con g&aacute;i của Hương - Tường lớn l&ecirc;n v&agrave; tin theo lời kể của mẹ rằng ba đ&atilde; h&oacute;a th&agrave;nh 1 v&igrave; sao tr&ecirc;n bầu trời.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 5\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10514-1546484087-478-width650height366.jpg\" /></p>\r\n\r\n<p>Mẹ con Hương thường c&ugrave;ng nhau ngắm sao v&agrave; nhớ về Tường.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, c&oacute; 1 b&iacute; mật Hương vẫn lu&ocirc;n giấu người nh&agrave;, đ&oacute; l&agrave; c&ocirc; bị chứng mất ngủ kể từ sau khi Tường đột ngột mất đi. Trong giấc&nbsp;mơ, c&ocirc; vẫn thường&nbsp;thấy h&igrave;nh b&oacute;ng anh hiện l&ecirc;n&nbsp;tr&aacute;ch c&ocirc; ng&agrave;y ấy&nbsp;đ&atilde; kh&ocirc;ng đến buổi hẹn.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 6\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10515-1546484087-678-width650height366.jpg\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, Hương cũng bất ngờ gặp lại mẹ Tường trong kh&ocirc;ng kh&iacute; căng thẳng. Thật ra trước đ&acirc;y mẹ Tường vốn cảm thấy Hương kh&ocirc;ng xứng đ&aacute;ng với con trai m&igrave;nh, chỉ l&agrave;&nbsp;v&igrave; Tường qu&aacute; th&iacute;ch c&ocirc; m&agrave; b&agrave; đ&agrave;nh phải chấp nhận.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 7\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10511-1546484087-85-width650height366.jpg\" /></p>\r\n\r\n<p>Kể từ sau sự ra đi của Tường, mẹ Tường lu&ocirc;n tr&aacute;nh mặt Hương. Kể cả khi Hương quỳ gối cầu xin được đến viếng mộ Tường th&igrave; mẹ của anh cũng từ chối.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 8\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10512-1546484087-288-width650height366.jpg\" /></p>\r\n\r\n<p>Th&ecirc;m một điều kh&ocirc;ng may xảy ra với Hương l&agrave; l&ocirc; h&agrave;ng xuất khẩu của c&ocirc;ng ty c&ocirc; bị ph&aacute;t hiện c&oacute; h&agrave;ng cấm. V&agrave; vị luật sư trẻ đang gi&uacute;p Hương giải quyết vấn đề của c&ocirc;ng ty lại l&agrave; người quen th&acirc;n thiết với mẹ Tường - nh&acirc;n vật do Th&uacute;y Diễm thủ vai.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 9\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10509-1546484087-987-width650height366.jpg\" /></p>\r\n\r\n<p>Ơn trời vậy l&agrave; sau h&agrave;ng th&aacute;ng chờ đợi r&ograve;ng r&atilde;, th&igrave; c&ocirc; g&aacute;i bị nghi l&agrave;&nbsp;&quot;tiểu tam&quot; chen ngang Hương - Tường cũng chịu xuất hiện. Chắc chắn với biến cố mới n&agrave;y, mạch phim&nbsp;<em>Gạo Nếp Gạo Tẻ</em>&nbsp;sẽ c&oacute; rất nhiều kịch t&iacute;nh hấp dẫn.</p>\r\n\r\n<p><img alt=\"gao nep gao te: thuy diem xuat hien xinh dep, tu tin de pha cap huong - tuong - 10\" src=\"https://cdn.eva.vn/upload/1-2019/images/2019-01-03/gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10528-1546484363-435-width650height424.jpg\" /></p>\r\n\r\n<p>Lại quay về ph&iacute;a chuyện của&nbsp;H&acirc;n Hoa hậu, c&ocirc; n&agrave;ng &iacute;ch kỷ ng&agrave;y n&agrave;o&nbsp;cũng đ&atilde; thay đổi, kh&ocirc;ng chỉ biết quan t&acirc;m gia đ&igrave;nh m&agrave; c&ograve;n cải thiện mối quan hệ với em g&aacute;i Kiệt. Trong 1 lần đến gi&uacute;p đỡ anh em chồng cũ c&uacute;ng giỗ ba, H&acirc;n bất ngờ chạm mặt Ph&uacute;c. Để tr&aacute;nh hiểu lầm g&acirc;y kh&oacute; xử cho cả ba, c&ocirc; ngay lập tức t&igrave;m c&aacute;ch&nbsp;rời đi.</p>', '1546494557.gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10503-1546484087-562-width650height404.jpg', '[\"G\\u1ea1o N\\u1ebfp G\\u1ea1o T\\u1ebb: Th\\u00fay Di\\u1ec5m xu\\u1ea5t hi\\u1ec7n xinh \\u0111\\u1eb9p,t\\u1ef1 tin \\u0111\\u1ec3 ph\\u00e1 c\\u1eb7p H\\u01b0\\u01a1ng - T\\u01b0\\u1eddng\"]', 1, 'Gạo Nếp Gạo Tẻ: Thúy Diễm xuất hiện xinh đẹp, tự tin để phá cặp Hương - Tường', NULL, '1546494557.gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10503-1546484087-562-width650height404.jpg', '\"null\"', 1, 1, 0, '2019-01-03 10:50:59', '2019-01-10 09:50:24'),
(12, 1, 'Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang?', 'mac-vay-xe-co-chu-v-day-dan-nhu-ky-duyen-lieu-co-pho-phang', 'Váy xẻ cổ chữ V được rất nhiều người đẹp Việt ưa chuộng, gần như ai cũng có vài chiếc trong tủ đồ. Lý do đơn giản là vì chúng đem lại độ gợi cảm cao cho chủ nhân, phù hợp xuất hiện tại nhiều loại sự kiện.', '<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 1\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-741-ky-duyen10-1546581060-width660height584.jpg\" /></p>\r\n\r\n<p>Hoa hậu&nbsp;<a href=\"https://www.24h.com.vn/hoa-hau-nguyen-cao-ky-duyen-c78e3626.html\" title=\"Kỳ Duyên\">Kỳ Duy&ecirc;n</a>&nbsp;xuất hiện gợi cảm trong những thiết kế xẻ cổ chữ V</p>\r\n\r\n<p>V&aacute;y xẻ cổ chữ V được rất nhiều người đẹp Việt ưa chuộng, gần như ai cũng c&oacute; v&agrave;i chiếc trong tủ đồ. L&yacute; do đơn giản l&agrave; v&igrave; ch&uacute;ng đem lại độ gợi cảm cao cho chủ nh&acirc;n, ph&ugrave; hợp xuất hiện tại nhiều loại sự kiện. Tuy nhi&ecirc;n,&nbsp;ch&uacute;ng cũng rất dễ &quot;phản chủ&quot;, nếu kh&ocirc;ng ph&ugrave; hợp d&aacute;ng v&oacute;c sẽ g&acirc;y ra khoảnh khắc k&eacute;m duy&ecirc;n như phải lấy tay che chắn hoặc hớ h&ecirc;nh trước ống k&iacute;nh m&aacute;y quay.&nbsp;</p>\r\n\r\n<p>Vậy d&aacute;ng v&oacute;c như thế n&agrave;o sẽ mặc đẹp nhất loại v&aacute;y xẻ cổ s&acirc;u chữ V? Từ &aacute;nh nh&igrave;n của chuy&ecirc;n gia, stylist Thiều Ngọc cho rằng:&nbsp;<em>&quot;Theo quan điểm của c&aacute; nh&acirc;n t&ocirc;i, người c&oacute; v&ograve;ng 1 nhỏ hoặc vừa mặc v&aacute;y cổ chữ V đẹp v&agrave; tinh tế&nbsp;nhất. C&ograve;n người ngực qu&aacute; khổ th&igrave; kh&ocirc;ng n&ecirc;n mặc xẻ cổ s&acirc;u, dễ bị lộ hoặc g&acirc;y phản cảm. V&iacute; dụ như Kỳ Duy&ecirc;n,&nbsp;<a href=\"https://www.24h.com.vn/mai-phuong-thuy-hoa-hau-viet-nam-2006-c78e1161.html\" title=\"Mai Phương Thúy\">Mai Phương Th&uacute;y</a>&nbsp;đầy đặn mặc vẫn đẹp&nbsp;nhưng kh&ocirc;ng thanh tho&aacute;t&nbsp;bằng Chi Pu, H&agrave; Anh.&quot;</em></p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 2\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-232-mai-p-thuy10-1546582712-width660height688.jpg\" /></p>\r\n\r\n<p>Mai Phương Th&uacute;y c&oacute; lẽ&nbsp;l&agrave; Hoa hậu Việt Nam chăm mặc v&aacute;y xẻ cổ V nhất</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"300\" id=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" name=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"535\"></iframe></p>\r\n\r\n<p>T&ugrave;y thuộc v&agrave;o từng d&aacute;ng người, stylist Thiều Ngọc&nbsp;gợi &yacute; c&aacute;ch mặc ho&agrave;n hảo cho loại v&aacute;y cổ V như sau:&nbsp;<em>&quot;Với người ngực&nbsp;nhỏ chỉ cần d&ugrave;ng &aacute;o l&oacute;t d&aacute;n hoặc miếng d&aacute;n nhỏ. C&ograve;n người c&oacute; v&ograve;ng 1 đầy đặn n&ecirc;n chọn thiết kế cổ V tiết chế, kho&eacute;t vừa phải.</em></p>\r\n\r\n<p><em>Ngo&agrave;i ra, người mặc c&oacute; thể mua th&ecirc;m miếng d&aacute;n viền cổ V, như một dạng băng d&iacute;nh hai mặt chuy&ecirc;n dụng cho thiết kế kho&eacute;t ngực. Nếu phải di chuyển nhiều th&igrave; n&ecirc;n d&ugrave;ng th&ecirc;m phương &aacute;n hỗ trợ như c&agrave;i phụ kiện l&agrave;m điểm kết nối giữ cũng như trang tr&iacute; cho trang phục.&quot;</em></p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 3\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-69-kh--nh-ph----ng-1546566807-width640height960.jpg\" /></p>\r\n\r\n<p>L&agrave; người thường xuy&ecirc;n mặc thiết kế xẻ cổ, &Aacute; hậu Kh&aacute;nh Phương cho biết: &quot;Với loại v&aacute;y n&agrave;y, t&ocirc;i đa phần sử dụng miếng d&aacute;n ngực,&nbsp;tuỳ v&agrave;o từng bộ đồ c&oacute; miếng l&oacute;t sẵn&nbsp;hay kh&ocirc;ng. Nếu v&aacute;y&nbsp;xẻ s&acirc;u hoặc rộng&nbsp;th&igrave; phải lưu &yacute; chọn những bộ đồ vừa người,&nbsp;đ&uacute;ng phom của m&igrave;nh để c&oacute; đường kho&eacute;t xẻ vừa vặn, kh&ocirc;ng bị ph&ocirc;.&quot;</p>\r\n\r\n<p><em><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 4\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-862-h---anh-1546583244-width500height750.jpg\" /></em></p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 5\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-295-huy---n-my-1546583435-width660height921.jpg\" /></p>\r\n\r\n<p>Thiết kế của H&agrave; Anh, Huyền My c&oacute; điểm nối giữa ở phần xẻ n&ecirc;n rất an to&agrave;n khi mặc</p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 6\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-221-chipu-1546583515-width660height991.jpg\" /></p>\r\n\r\n<p>V&aacute;y của Chi Pu được may th&ecirc;m lớp voan mỏng ở giữa d&ugrave; thiết kế đ&atilde; hợp d&aacute;ng người</p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 7\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-490-k----duyen-1546583541-width660height990.jpg\" /></p>\r\n\r\n<p>Chiếc v&aacute;y n&agrave;y của Kỳ Duy&ecirc;n may th&ecirc;m lớp lưới để tiết chế độ xẻ chữ V</p>', '1546667785.1546662301-490-k----duyen-1546583541-width660height990.jpg', '[\"V\\u00e1y x\\u1ebb c\\u1ed5 ch\\u1eef V \\u0111\\u01b0\\u1ee3c r\\u1ea5t nhi\\u1ec1u ng\\u01b0\\u1eddi \\u0111\\u1eb9p Vi\\u1ec7t \\u01b0a chu\\u1ed9ng, g\\u1ea7n nh\\u01b0 ai c\\u0169ng c\\u00f3 v\\u00e0i chi\\u1ebfc trong t\\u1ee7 \\u0111\\u1ed3. L\\u00fd do \\u0111\\u01a1n gi\\u1ea3n l\\u00e0 v\\u00ec ch\\u00fang \\u0111em l\\u1ea1i \\u0111\\u1ed9 g\\u1ee3i c\\u1ea3m cao cho ch\\u1ee7 nh\\u00e2n, ph\\u00f9 h\\u1ee3p xu\\u1ea5t hi\\u1ec7n t\\u1ea1i nhi\\u1ec1u lo\\u1ea1i s\\u1ef1 ki\\u1ec7n.\"]', 1, 'Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang?', 'Váy xẻ cổ chữ V được rất nhiều người đẹp Việt ưa chuộng, gần như ai cũng có vài chiếc trong tủ đồ. Lý do đơn giản là vì chúng đem lại độ gợi cảm cao cho chủ nhân, phù hợp xuất hiện tại nhiều loại sự kiện.', '1546667784.1546662301-490-k----duyen-1546583541-width660height990.jpg', '\"M\\u1eb7c v\\u00e1y x\\u1ebb c\\u1ed5 ch\\u1eef V, \\u0111\\u1ea7y \\u0111\\u1eb7n nh\\u01b0 K\\u1ef3 Duy\\u00ean li\\u1ec7u c\\u00f3 ph\\u00f4 phang?\"', 1, 2, 0, '2019-01-04 22:56:24', '2019-01-10 10:26:22'),
(13, 1, 'Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang?', 'mac-vay-xe-co-chu-v-day-dan-nhu-ky-duyen-lieu-co-pho-phang', 'Váy xẻ cổ chữ V được rất nhiều người đẹp Việt ưa chuộng, gần như ai cũng có vài chiếc trong tủ đồ. Lý do đơn giản là vì chúng đem lại độ gợi cảm cao cho chủ nhân, phù hợp xuất hiện tại nhiều loại sự kiện.', '<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 1\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-741-ky-duyen10-1546581060-width660height584.jpg\" /></p>\r\n\r\n<p>Hoa hậu&nbsp;<a href=\"https://www.24h.com.vn/hoa-hau-nguyen-cao-ky-duyen-c78e3626.html\" title=\"Kỳ Duyên\">Kỳ Duy&ecirc;n</a>&nbsp;xuất hiện gợi cảm trong những thiết kế xẻ cổ chữ V</p>\r\n\r\n<p>V&aacute;y xẻ cổ chữ V được rất nhiều người đẹp Việt ưa chuộng, gần như ai cũng c&oacute; v&agrave;i chiếc trong tủ đồ. L&yacute; do đơn giản l&agrave; v&igrave; ch&uacute;ng đem lại độ gợi cảm cao cho chủ nh&acirc;n, ph&ugrave; hợp xuất hiện tại nhiều loại sự kiện. Tuy nhi&ecirc;n,&nbsp;ch&uacute;ng cũng rất dễ &quot;phản chủ&quot;, nếu kh&ocirc;ng ph&ugrave; hợp d&aacute;ng v&oacute;c sẽ g&acirc;y ra khoảnh khắc k&eacute;m duy&ecirc;n như phải lấy tay che chắn hoặc hớ h&ecirc;nh trước ống k&iacute;nh m&aacute;y quay.&nbsp;</p>\r\n\r\n<p>Vậy d&aacute;ng v&oacute;c như thế n&agrave;o sẽ mặc đẹp nhất loại v&aacute;y xẻ cổ s&acirc;u chữ V? Từ &aacute;nh nh&igrave;n của chuy&ecirc;n gia, stylist Thiều Ngọc cho rằng:&nbsp;<em>&quot;Theo quan điểm của c&aacute; nh&acirc;n t&ocirc;i, người c&oacute; v&ograve;ng 1 nhỏ hoặc vừa mặc v&aacute;y cổ chữ V đẹp v&agrave; tinh tế&nbsp;nhất. C&ograve;n người ngực qu&aacute; khổ th&igrave; kh&ocirc;ng n&ecirc;n mặc xẻ cổ s&acirc;u, dễ bị lộ hoặc g&acirc;y phản cảm. V&iacute; dụ như Kỳ Duy&ecirc;n,&nbsp;<a href=\"https://www.24h.com.vn/mai-phuong-thuy-hoa-hau-viet-nam-2006-c78e1161.html\" title=\"Mai Phương Thúy\">Mai Phương Th&uacute;y</a>&nbsp;đầy đặn mặc vẫn đẹp&nbsp;nhưng kh&ocirc;ng thanh tho&aacute;t&nbsp;bằng Chi Pu, H&agrave; Anh.&quot;</em></p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 2\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-232-mai-p-thuy10-1546582712-width660height688.jpg\" /></p>\r\n\r\n<p>Mai Phương Th&uacute;y c&oacute; lẽ&nbsp;l&agrave; Hoa hậu Việt Nam chăm mặc v&aacute;y xẻ cổ V nhất</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"300\" id=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" name=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"535\"></iframe></p>\r\n\r\n<p>T&ugrave;y thuộc v&agrave;o từng d&aacute;ng người, stylist Thiều Ngọc&nbsp;gợi &yacute; c&aacute;ch mặc ho&agrave;n hảo cho loại v&aacute;y cổ V như sau:&nbsp;<em>&quot;Với người ngực&nbsp;nhỏ chỉ cần d&ugrave;ng &aacute;o l&oacute;t d&aacute;n hoặc miếng d&aacute;n nhỏ. C&ograve;n người c&oacute; v&ograve;ng 1 đầy đặn n&ecirc;n chọn thiết kế cổ V tiết chế, kho&eacute;t vừa phải.</em></p>\r\n\r\n<p><em>Ngo&agrave;i ra, người mặc c&oacute; thể mua th&ecirc;m miếng d&aacute;n viền cổ V, như một dạng băng d&iacute;nh hai mặt chuy&ecirc;n dụng cho thiết kế kho&eacute;t ngực. Nếu phải di chuyển nhiều th&igrave; n&ecirc;n d&ugrave;ng th&ecirc;m phương &aacute;n hỗ trợ như c&agrave;i phụ kiện l&agrave;m điểm kết nối giữ cũng như trang tr&iacute; cho trang phục.&quot;</em></p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 3\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-69-kh--nh-ph----ng-1546566807-width640height960.jpg\" /></p>\r\n\r\n<p>L&agrave; người thường xuy&ecirc;n mặc thiết kế xẻ cổ, &Aacute; hậu Kh&aacute;nh Phương cho biết: &quot;Với loại v&aacute;y n&agrave;y, t&ocirc;i đa phần sử dụng miếng d&aacute;n ngực,&nbsp;tuỳ v&agrave;o từng bộ đồ c&oacute; miếng l&oacute;t sẵn&nbsp;hay kh&ocirc;ng. Nếu v&aacute;y&nbsp;xẻ s&acirc;u hoặc rộng&nbsp;th&igrave; phải lưu &yacute; chọn những bộ đồ vừa người,&nbsp;đ&uacute;ng phom của m&igrave;nh để c&oacute; đường kho&eacute;t xẻ vừa vặn, kh&ocirc;ng bị ph&ocirc;.&quot;</p>\r\n\r\n<p><em><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 4\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-862-h---anh-1546583244-width500height750.jpg\" /></em></p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 5\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-295-huy---n-my-1546583435-width660height921.jpg\" /></p>\r\n\r\n<p>Thiết kế của H&agrave; Anh, Huyền My c&oacute; điểm nối giữa ở phần xẻ n&ecirc;n rất an to&agrave;n khi mặc</p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 6\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-221-chipu-1546583515-width660height991.jpg\" /></p>\r\n\r\n<p>V&aacute;y của Chi Pu được may th&ecirc;m lớp voan mỏng ở giữa d&ugrave; thiết kế đ&atilde; hợp d&aacute;ng người</p>\r\n\r\n<p><img alt=\"Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang? - 7\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546662301-490-k----duyen-1546583541-width660height990.jpg\" /></p>\r\n\r\n<p>Chiếc v&aacute;y n&agrave;y của Kỳ Duy&ecirc;n may th&ecirc;m lớp lưới để tiết chế độ xẻ chữ V</p>', '1546667811.1546662301-490-k----duyen-1546583541-width660height990.jpg', '[\"V\\u00e1y x\\u1ebb c\\u1ed5 ch\\u1eef V \\u0111\\u01b0\\u1ee3c r\\u1ea5t nhi\\u1ec1u ng\\u01b0\\u1eddi \\u0111\\u1eb9p Vi\\u1ec7t \\u01b0a chu\\u1ed9ng,g\\u1ea7n nh\\u01b0 ai c\\u0169ng c\\u00f3 v\\u00e0i chi\\u1ebfc trong t\\u1ee7 \\u0111\\u1ed3. L\\u00fd do \\u0111\\u01a1n gi\\u1ea3n l\\u00e0 v\\u00ec ch\\u00fang \\u0111em l\\u1ea1i \\u0111\\u1ed9 g\\u1ee3i c\\u1ea3m cao cho ch\\u1ee7 nh\\u00e2n,ph\\u00f9 h\\u1ee3p xu\\u1ea5t hi\\u1ec7n t\\u1ea1i nhi\\u1ec1u lo\\u1ea1i s\\u1ef1 ki\\u1ec7n.\"]', 1, 'Mặc váy xẻ cổ chữ V, đầy đặn như Kỳ Duyên liệu có phô phang?', 'Váy xẻ cổ chữ V được rất nhiều người đẹp Việt ưa chuộng, gần như ai cũng có vài chiếc trong tủ đồ. Lý do đơn giản là vì chúng đem lại độ gợi cảm cao cho chủ nhân, phù hợp xuất hiện tại nhiều loại sự kiện.', '1546667811.1546662301-490-k----duyen-1546583541-width660height990.jpg', '\"null\"', 1, 1, 0, '2019-01-04 22:59:48', '2019-01-10 10:26:38'),
(14, 1, 'Kỳ Duyên đọ sắc', 'ky-duyen-do-sac', 'Chiều tối cùng ngày, Kỳ Duyên tiếp tục sánh bước cùng Mai Davika đến dự show diễn của NTK Isabel Marent. Cả hai cùng diện trang phục đồng điệu. Trong khi Kỳ Duyên sang chảnh với bộ suit màu tím, phối cùng giầy của Balenciaga và áo sơ mi của Saint Laurent', '<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 1\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103718-556-ky-duyen--16--1538092696-width640height595.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n rạng rỡ đọ sắc người đẹp Th&aacute;i Lan - Mai Davika</p>\r\n\r\n<p>Ng&agrave;y h&ocirc;m qua (27.9) theo giờ địa phương, Hoa hậu Việt Nam&nbsp;<a href=\"https://www.24h.com.vn/hoa-hau-nguyen-cao-ky-duyen-c78e3626.html\" title=\"Kỳ Duyên\">Kỳ Duy&ecirc;n</a>&nbsp;đ&atilde; c&oacute; mặt tại Paris để tham dự c&aacute;c hoạt động tại Tuần lễ thời trang c&ugrave;ng c&aacute;c ng&ocirc;i sao quốc tế. Tại đ&acirc;y, Hoa hậu Việt Nam&nbsp;đ&atilde; c&oacute; buổi gặp gỡ với NTK Isabel Marent để chia sẻ về phong c&aacute;ch l&agrave;m đẹp c&ugrave;ng c&aacute;c ng&ocirc;i sao, bi&ecirc;n tập vi&ecirc;n, blogger beauty...</p>\r\n\r\n<p>Mỹ nh&acirc;n sinh năm 1996 c&oacute; dịp gặp gỡ với c&aacute;c ng&ocirc;i sao nổi tiếng khu vực Ch&acirc;u &Aacute; như nữ diễn vi&ecirc;n Th&aacute;i Lan Mai Davika Hoorne, nữ diễn vi&ecirc;n Heart Evangelista...</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 2\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103718-951-ky-duyen--1--1538092971-width660height990.jpg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 3\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-682-ky-duyen--5--1538093076-width660height1042.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 4\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-332-ky-duyen--3--1538093256-width660height991.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kỳ Duy&ecirc;n diện trang phục đến từ nh&agrave; mốt Dolce &amp; Gabbana</p>\r\n\r\n<p>Xuất hiện tại sự kiện, Kỳ Duy&ecirc;n diện trang phục đến từ nh&agrave; mốt Dolce &amp; Gabbana. Đi k&egrave;m với clutch của thương hiệu LV v&agrave; mắt k&iacute;nh Miu Miu. Đại diện đến từ Th&aacute;i Lan Mai Davika d&agrave;nh nhiều lời khen ngợi cho&nbsp;<a href=\"https://www.24h.com.vn/hoa-hau-nguyen-cao-ky-duyen-c78e3626.html\" title=\"Hoa hậu Kỳ Duyên\">Hoa hậu Kỳ Duy&ecirc;n</a>. Cả hai vui vẻ chụp h&igrave;nh lưu niệm c&ugrave;ng nhau v&agrave; kh&ocirc;ng ngừng chia sẻ về phong c&aacute;ch l&agrave;m đẹp, thời trang.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; lần đầu ti&ecirc;n Kỳ Duy&ecirc;n gặp Mai Davika ở ngo&agrave;i.&nbsp;N&agrave;ng hậu vốn đ&atilde; rất ấn tượng với thần th&aacute;i, ngoại h&igrave;nh c&ugrave;ng lối diễn xuất của Mai n&ecirc;n việc gặp gỡ lần n&agrave;y v&ocirc; c&ugrave;ng th&iacute;ch th&uacute;.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"300\" id=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" name=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"535\"></iframe></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 6\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-691-ky-duyen--17--1538092558-width660height741.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n v&agrave; diễn vi&ecirc;n&nbsp;Heart Evangelista</p>\r\n\r\n<p>B&ecirc;n cạnh Mai Davika, Kỳ Duy&ecirc;n d&agrave;nh nhiều sự ấn tượng cho nữ diễn vi&ecirc;n Heart đến từ Phillipines, vốn l&agrave; đệ nhất richkid (con nh&agrave; gi&agrave;u)&nbsp;của Ch&acirc;u &Aacute;.&nbsp;Heart l&agrave; kh&aacute;ch mời của c&aacute;c thương hiệu h&agrave;ng đầu thế giới. Diễn vi&ecirc;n khen ngợi Kỳ Duy&ecirc;n xinh đẹp, th&ocirc;ng minh v&agrave; kh&ocirc;ng ngại ngần theo d&otilde;i&nbsp;Kỳ Duy&ecirc;n tr&ecirc;n mạng x&atilde; hội. Trước đ&oacute; Heart được biết đến l&agrave; bạn th&acirc;n của diễn vi&ecirc;n Tăng Thanh H&agrave; v&agrave; l&agrave; người sở hữu BST t&uacute;i Hermes &quot;khủng&quot; nhất Philippines.</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 7\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-586-ky-duyen--11--1538092069-width660height840.jpeg\" /></p>\r\n\r\n<p>Hoa hậu Kỳ Duy&ecirc;n hội ngộ ng&ocirc;i sao h&agrave;ng đầu Th&aacute;i Lan Mai Davika tại Paris Fashion Week</p>\r\n\r\n<p>Chiều tối c&ugrave;ng ng&agrave;y, Kỳ Duy&ecirc;n tiếp tục s&aacute;nh bước c&ugrave;ng Mai Davika đến dự show diễn của NTK Isabel Marent. Cả hai c&ugrave;ng diện trang phục đồng điệu. Trong khi Kỳ Duy&ecirc;n sang chảnh với bộ suit m&agrave;u t&iacute;m, phối c&ugrave;ng giầy của Balenciaga v&agrave; &aacute;o sơ mi của Saint Laurent. Mai Davika diện trang phục m&agrave;u sắc tương đồng với Kỳ Duy&ecirc;n, h&igrave;nh ảnh 2&nbsp;ng&ocirc;i sao 9X đến từ Ch&acirc;u &Aacute; d&agrave;nh được sự ch&uacute; &yacute;&nbsp;đến từ truyền th&ocirc;ng quốc tế. Sở hữu khả năng tiếng Anh tốt, Kỳ Duy&ecirc;n tự tin tr&ograve; chuyện với truyền th&ocirc;ng quốc tế.&nbsp;</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 8\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-232-ky-duyen--12--1538092226-width660height786.jpeg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 9\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-805-ky-duyen--14--1538092240-width660height698.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n v&agrave; Mai Davika vui vẻ chụp ảnh c&ugrave;ng nhau</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 10\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-731-ky-duyen--6--1538093130-width660height918.jpeg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 11\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103720-171-ky-duyen--8--1538093188-width660height1168.jpeg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 12\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103720-273-ky-duyen--15--1538093214-width660height723.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n đ&atilde; c&oacute; một ng&agrave;y bận rộn khi ch&iacute;nh thức bước v&agrave;o những hoạt động đầu ti&ecirc;n tại Paris</p>', '1546668256.1538103718-556-ky-duyen--16--1538092696-width640height595.jpeg', '[\"K\\u1ef3 Duy\\u00ean \\u0111\\u1ecd s\\u1eafc\"]', 1, 'Kỳ Duyên đọ sắc', 'Chiều tối cùng ngày, Kỳ Duyên tiếp tục sánh bước cùng Mai Davika đến dự show diễn của NTK Isabel Marent. Cả hai cùng diện trang phục đồng điệu. Trong khi Kỳ Duyên sang chảnh với bộ suit màu tím, phối cùng giầy của Balenciaga và áo sơ mi của Saint Laurent', '1546668256.1538103718-556-ky-duyen--16--1538092696-width640height595.jpeg', 'null', 1, 1, 0, '2019-01-04 23:07:16', '2019-01-10 09:36:37');
INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `description`, `content`, `image`, `tag`, `highlights`, `seo_title`, `seo_description`, `seo_image`, `seo_keyword`, `status`, `save`, `delete_at`, `created_at`, `updated_at`) VALUES
(15, 1, 'Kỳ Duyên đọ sắc', 'ky-duyen-do-sac', 'Chiều tối cùng ngày, Kỳ Duyên tiếp tục sánh bước cùng Mai Davika đến dự show diễn của NTK Isabel Marent. Cả hai cùng diện trang phục đồng điệu. Trong khi Kỳ Duyên sang chảnh với bộ suit màu tím, phối cùng giầy của Balenciaga và áo sơ mi của Saint Laurent', '<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 1\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103718-556-ky-duyen--16--1538092696-width640height595.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n rạng rỡ đọ sắc người đẹp Th&aacute;i Lan - Mai Davika</p>\r\n\r\n<p>Ng&agrave;y h&ocirc;m qua (27.9) theo giờ địa phương, Hoa hậu Việt Nam&nbsp;<a href=\"https://www.24h.com.vn/hoa-hau-nguyen-cao-ky-duyen-c78e3626.html\" title=\"Kỳ Duyên\">Kỳ Duy&ecirc;n</a>&nbsp;đ&atilde; c&oacute; mặt tại Paris để tham dự c&aacute;c hoạt động tại Tuần lễ thời trang c&ugrave;ng c&aacute;c ng&ocirc;i sao quốc tế. Tại đ&acirc;y, Hoa hậu Việt Nam&nbsp;đ&atilde; c&oacute; buổi gặp gỡ với NTK Isabel Marent để chia sẻ về phong c&aacute;ch l&agrave;m đẹp c&ugrave;ng c&aacute;c ng&ocirc;i sao, bi&ecirc;n tập vi&ecirc;n, blogger beauty...</p>\r\n\r\n<p>Mỹ nh&acirc;n sinh năm 1996 c&oacute; dịp gặp gỡ với c&aacute;c ng&ocirc;i sao nổi tiếng khu vực Ch&acirc;u &Aacute; như nữ diễn vi&ecirc;n Th&aacute;i Lan Mai Davika Hoorne, nữ diễn vi&ecirc;n Heart Evangelista...</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 2\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103718-951-ky-duyen--1--1538092971-width660height990.jpg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 3\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-682-ky-duyen--5--1538093076-width660height1042.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 4\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-332-ky-duyen--3--1538093256-width660height991.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kỳ Duy&ecirc;n diện trang phục đến từ nh&agrave; mốt Dolce &amp; Gabbana</p>\r\n\r\n<p>Xuất hiện tại sự kiện, Kỳ Duy&ecirc;n diện trang phục đến từ nh&agrave; mốt Dolce &amp; Gabbana. Đi k&egrave;m với clutch của thương hiệu LV v&agrave; mắt k&iacute;nh Miu Miu. Đại diện đến từ Th&aacute;i Lan Mai Davika d&agrave;nh nhiều lời khen ngợi cho&nbsp;<a href=\"https://www.24h.com.vn/hoa-hau-nguyen-cao-ky-duyen-c78e3626.html\" title=\"Hoa hậu Kỳ Duyên\">Hoa hậu Kỳ Duy&ecirc;n</a>. Cả hai vui vẻ chụp h&igrave;nh lưu niệm c&ugrave;ng nhau v&agrave; kh&ocirc;ng ngừng chia sẻ về phong c&aacute;ch l&agrave;m đẹp, thời trang.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; lần đầu ti&ecirc;n Kỳ Duy&ecirc;n gặp Mai Davika ở ngo&agrave;i.&nbsp;N&agrave;ng hậu vốn đ&atilde; rất ấn tượng với thần th&aacute;i, ngoại h&igrave;nh c&ugrave;ng lối diễn xuất của Mai n&ecirc;n việc gặp gỡ lần n&agrave;y v&ocirc; c&ugrave;ng th&iacute;ch th&uacute;.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"300\" id=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" name=\"google_ads_iframe_/124557882/24h/vn/desktop/fashion/in_readvideo_article_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"535\"></iframe></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 6\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-691-ky-duyen--17--1538092558-width660height741.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n v&agrave; diễn vi&ecirc;n&nbsp;Heart Evangelista</p>\r\n\r\n<p>B&ecirc;n cạnh Mai Davika, Kỳ Duy&ecirc;n d&agrave;nh nhiều sự ấn tượng cho nữ diễn vi&ecirc;n Heart đến từ Phillipines, vốn l&agrave; đệ nhất richkid (con nh&agrave; gi&agrave;u)&nbsp;của Ch&acirc;u &Aacute;.&nbsp;Heart l&agrave; kh&aacute;ch mời của c&aacute;c thương hiệu h&agrave;ng đầu thế giới. Diễn vi&ecirc;n khen ngợi Kỳ Duy&ecirc;n xinh đẹp, th&ocirc;ng minh v&agrave; kh&ocirc;ng ngại ngần theo d&otilde;i&nbsp;Kỳ Duy&ecirc;n tr&ecirc;n mạng x&atilde; hội. Trước đ&oacute; Heart được biết đến l&agrave; bạn th&acirc;n của diễn vi&ecirc;n Tăng Thanh H&agrave; v&agrave; l&agrave; người sở hữu BST t&uacute;i Hermes &quot;khủng&quot; nhất Philippines.</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 7\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-586-ky-duyen--11--1538092069-width660height840.jpeg\" /></p>\r\n\r\n<p>Hoa hậu Kỳ Duy&ecirc;n hội ngộ ng&ocirc;i sao h&agrave;ng đầu Th&aacute;i Lan Mai Davika tại Paris Fashion Week</p>\r\n\r\n<p>Chiều tối c&ugrave;ng ng&agrave;y, Kỳ Duy&ecirc;n tiếp tục s&aacute;nh bước c&ugrave;ng Mai Davika đến dự show diễn của NTK Isabel Marent. Cả hai c&ugrave;ng diện trang phục đồng điệu. Trong khi Kỳ Duy&ecirc;n sang chảnh với bộ suit m&agrave;u t&iacute;m, phối c&ugrave;ng giầy của Balenciaga v&agrave; &aacute;o sơ mi của Saint Laurent. Mai Davika diện trang phục m&agrave;u sắc tương đồng với Kỳ Duy&ecirc;n, h&igrave;nh ảnh 2&nbsp;ng&ocirc;i sao 9X đến từ Ch&acirc;u &Aacute; d&agrave;nh được sự ch&uacute; &yacute;&nbsp;đến từ truyền th&ocirc;ng quốc tế. Sở hữu khả năng tiếng Anh tốt, Kỳ Duy&ecirc;n tự tin tr&ograve; chuyện với truyền th&ocirc;ng quốc tế.&nbsp;</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 8\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-232-ky-duyen--12--1538092226-width660height786.jpeg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 9\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-805-ky-duyen--14--1538092240-width660height698.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n v&agrave; Mai Davika vui vẻ chụp ảnh c&ugrave;ng nhau</p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 10\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103719-731-ky-duyen--6--1538093130-width660height918.jpeg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 11\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103720-171-ky-duyen--8--1538093188-width660height1168.jpeg\" /></p>\r\n\r\n<p><img alt=\"Kỳ Duyên đọ sắc &quot;ma nữ đẹp nhất Thái Lan&quot; ở Tuần thời trang Paris - 12\" src=\"https://cdn.24h.com.vn/upload/3-2018/images/2018-09-28/1538103720-273-ky-duyen--15--1538093214-width660height723.jpeg\" /></p>\r\n\r\n<p>Kỳ Duy&ecirc;n đ&atilde; c&oacute; một ng&agrave;y bận rộn khi ch&iacute;nh thức bước v&agrave;o những hoạt động đầu ti&ecirc;n tại Paris</p>', '1546668406.1538103718-556-ky-duyen--16--1538092696-width640height595.jpeg', '[\"K\\u1ef3 Duy\\u00ean \\u0111\\u1ecd s\\u1eafc\"]', 0, 'Kỳ Duyên đọ sắc', 'Chiều tối cùng ngày, Kỳ Duyên tiếp tục sánh bước cùng Mai Davika đến dự show diễn của NTK Isabel Marent. Cả hai cùng diện trang phục đồng điệu. Trong khi Kỳ Duyên sang chảnh với bộ suit màu tím, phối cùng giầy của Balenciaga và áo sơ mi của Saint Laurent', '1546668406.1538103718-556-ky-duyen--16--1538092696-width640height595.jpeg', 'null', 1, 1, 0, '2019-01-04 23:07:02', '2019-01-10 10:20:20'),
(16, 1, 'Sau chuỗi ngày trầm cảm, Nam Em giảm cân thành công đẹp bất ngờ', 'sau-chuoi-ngay-tram-cam-nam-em-giam-can-thanh-cong-dep-bat-ngo', 'Dù người hâm mộ còn hoài nghi vì hình ảnh Nam Em đăng tải có sự can thiệp của photoshop, thực chất cô đã giảm 8kg. Đồng thời', '<p><img alt=\"Sau chuỗi ngày trầm cảm, Nam Em giảm cân thành công đẹp bất ngờ - 1\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546666502-270-sau-chuoi-ngay-tram-cam-nam-em-giam-can-thanh-cong-dep-bat-ngo-sau-chuoi-ngay-tang-can-chong-mat-nam-em-da-giam-8-1546660032-width650height974.jpg\" /></p>\r\n\r\n<p>Lấy lại v&oacute;c d&aacute;ng chuẩn mẫu,&nbsp;<a href=\"https://www.24h.com.vn/hoa-khoi-nam-em-c78e3940.html\" title=\"Nam Em\">Nam Em</a>&nbsp;t&iacute;ch cực quay lại hoạt động nghệ thuật.</p>\r\n\r\n<p>Sau thời gian d&agrave;i tăng c&acirc;n kh&ocirc;ng kiểm so&aacute;t v&agrave; nỗ lực luyện tập, ăn ki&ecirc;ng lấy lại v&oacute;c d&aacute;ng... lần n&agrave;y, Nam Em mới th&agrave;nh c&ocirc;ng thực sự. C&ocirc; từng chia sẻ, cơ thể c&ocirc; như một tr&aacute;i b&oacute;ng, nhịn ăn sẽ giảm c&acirc;n nhưng ăn 1 ch&uacute;t rất &iacute;t sẽ lập tức ph&igrave;nh ra căng tr&ograve;n. Nam Em đau đầu, mệt mỏi v&igrave; mỗi chuyện giảm c&acirc;n cũng kh&ocirc;ng xong.</p>\r\n\r\n<p>C&aacute;ch đ&acirc;y 1 th&aacute;ng, khi tr&igrave;nh diễn thời trang tại Đ&agrave; Lạt, mỹ nh&acirc;n sinh năm 1996 c&ograve;n khiến người h&acirc;m mộ bất ngờ v&igrave; gương mặt tr&ograve;n xoe, th&acirc;n h&igrave;nh mũm mĩm. Thế nhưng, sau 1 th&aacute;ng, c&ocirc; đ&atilde; giảm th&agrave;nh c&ocirc;ng 8kg. Chia sẻ th&ecirc;m về điều n&agrave;y, Nam Em n&oacute;i: &quot;<em>Nam Em vẫn biết m&igrave;nh l&agrave; người của c&ocirc;ng ch&uacute;ng, vẫn cần phải giữ h&igrave;nh ảnh đẹp nhất c&oacute; thể trước kh&aacute;n giả. V&igrave; vậy thời gian qua b&ecirc;n cạnh việc sống vui, sống khỏe, Nam Em cũng đ&atilde; c&oacute; sự điều chỉnh ở chế độ ăn uống v&agrave; r&egrave;n luyện thể thao nhiều hơn, nhanh ch&oacute;ng lấy lại v&oacute;c d&aacute;ng ng&agrave;y trước.&quot;</em></p>\r\n\r\n<p><img alt=\"Sau chuỗi ngày trầm cảm, Nam Em giảm cân thành công đẹp bất ngờ - 2\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546666503-90-sau-chuoi-ngay-tram-cam-nam-em-giam-can-thanh-cong-dep-bat-ngo-sau-chuoi-ngay-tang-can-chong-mat-nam-em-da-giam-8-1546660164-width650height974.jpg\" /></p>\r\n\r\n<p>Giữ đ&uacute;ng lời hứa, trong sự kiện mới nhất mỹ nh&acirc;n sinh năm 1996 t&aacute;i xuất với vẻ ngo&agrave;i thanh mảnh v&agrave; xinh đẹp hơn.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"300\" id=\"google_ads_iframe_/124557882/24h/vn/desktop/beauty/in_readvideo_article_0\" name=\"google_ads_iframe_/124557882/24h/vn/desktop/beauty/in_readvideo_article_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"535\"></iframe></p>\r\n\r\n<p>D&ugrave; người h&acirc;m mộ c&ograve;n ho&agrave;i nghi v&igrave; h&igrave;nh ảnh Nam Em đăng tải c&oacute; sự can thiệp của photoshop, thực chất c&ocirc; đ&atilde; giảm 8kg. Đồng thời, người đẹp diện cả c&acirc;y đen n&ecirc;n tạo hiệu ứng thon gọn hơn nữa. Dường như lời tuy&ecirc;n bố&nbsp;&#39;phải đẹp&#39; lại để kh&ocirc;ng bị &#39;chị mập ho&agrave;nh h&agrave;nh&#39; nữa đ&atilde; hiệu nghiệm với c&ocirc; g&aacute;i. Khởi đầu một năm 2019 với sự trở lại mạnh mẽ của Nam Em sau năm 2018 đầy s&oacute;ng gi&oacute;, thị phi.&nbsp;</p>\r\n\r\n<p><img alt=\"Sau chuỗi ngày trầm cảm, Nam Em giảm cân thành công đẹp bất ngờ - 3\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-01-05/1546666503-763-sau-chuoi-ngay-tram-cam-nam-em-giam-can-thanh-cong-dep-bat-ngo-28276690_756878167840960_5524718313351355689_n-1546660032-width650height879.jpg\" /></p>\r\n\r\n<p>Thời gian Nam Em chưa giảm c&acirc;n, xinh đẹp tuyệt trần.</p>', '1546668552.1546666503-763-sau-chuoi-ngay-tram-cam-nam-em-giam-can-thanh-cong-dep-bat-ngo-28276690_756878167840960_5524718313351355689_n-1546660032-width650height879.jpg', 'null', 0, 'Sau chuỗi ngày trầm cảm, Nam Em giảm cân thành công đẹp bất ngờ', 'Dù người hâm mộ còn hoài nghi vì hình ảnh Nam Em đăng tải có sự can thiệp của photoshop, thực chất cô đã giảm 8kg. Đồng thời', '1546668552.1546666503-763-sau-chuoi-ngay-tram-cam-nam-em-giam-can-thanh-cong-dep-bat-ngo-28276690_756878167840960_5524718313351355689_n-1546660032-width650height879.jpg', 'null', 0, 1, 0, '2019-04-06 16:42:36', '2019-04-06 16:42:36'),
(35, 1, 'Thời trang nam abc cao cấp', 'thoi-trang-nam-abc-cao-cap', 'Thời trang nam abc cao cấp', '<p>Thời trang nam abc cao cấp</p>', '1546790286.gao-nep-gao-te-on-troi-cuoi-cung-thuy-diem-cung-chiu-xuat-hien-de-pha-huong---tuong-gngt-10503-1546484087-562-width650height404.jpg', '[null]', 1, NULL, NULL, NULL, 'null', 1, 2, 0, '2019-01-06 08:58:06', '2019-01-10 10:39:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `posts_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `posts_id`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 5, 1, '2018-12-23 09:00:13', '2018-12-23 09:00:13'),
(8, 5, 18, '2018-12-23 09:00:13', '2018-12-23 09:00:13'),
(9, 6, 1, '2018-12-23 09:04:02', '2018-12-23 09:04:02'),
(10, 6, 18, '2018-12-23 09:04:03', '2018-12-23 09:04:03'),
(11, 6, 5, '2019-01-02 09:45:58', '2019-01-02 09:45:58'),
(12, 6, 4, '2019-01-02 09:45:58', '2019-01-02 09:45:58'),
(13, 6, 14, '2019-01-02 09:45:58', '2019-01-02 09:45:58'),
(14, 7, 5, '2019-01-02 09:48:26', '2019-01-02 09:48:26'),
(15, 7, 4, '2019-01-02 09:48:26', '2019-01-02 09:48:26'),
(16, 7, 14, '2019-01-02 09:48:26', '2019-01-02 09:48:26'),
(23, 10, 5, '2019-01-02 10:02:23', '2019-01-02 10:02:23'),
(24, 10, 4, '2019-01-02 10:02:23', '2019-01-02 10:02:23'),
(25, 10, 14, '2019-01-02 10:02:24', '2019-01-02 10:02:24'),
(52, 11, 5, '2019-01-03 10:50:59', '2019-01-03 10:50:59'),
(53, 11, 4, '2019-01-03 10:51:00', '2019-01-03 10:51:00'),
(61, 13, 5, '2019-01-04 22:59:48', '2019-01-04 22:59:48'),
(62, 13, 4, '2019-01-04 22:59:48', '2019-01-04 22:59:48'),
(63, 13, 14, '2019-01-04 22:59:48', '2019-01-04 22:59:48'),
(64, 15, 5, '2019-01-04 23:07:02', '2019-01-04 23:07:02'),
(65, 15, 4, '2019-01-04 23:07:02', '2019-01-04 23:07:02'),
(66, 15, 14, '2019-01-04 23:07:02', '2019-01-04 23:07:02'),
(67, 14, 4, '2019-01-04 23:07:16', '2019-01-04 23:07:16'),
(74, 8, 5, '2019-01-06 08:53:01', '2019-01-06 08:53:01'),
(75, 8, 4, '2019-01-06 08:53:01', '2019-01-06 08:53:01'),
(76, 9, 5, '2019-01-06 08:53:12', '2019-01-06 08:53:12'),
(77, 9, 4, '2019-01-06 08:53:12', '2019-01-06 08:53:12'),
(78, 9, 14, '2019-01-06 08:53:13', '2019-01-06 08:53:13'),
(81, 35, 5, '2019-01-06 08:58:06', '2019-01-06 08:58:06'),
(82, 35, 4, '2019-01-06 08:58:06', '2019-01-06 08:58:06'),
(94, 4, 1, '2019-01-07 07:42:37', '2019-01-07 07:42:37'),
(95, 4, 18, '2019-01-07 07:42:37', '2019-01-07 07:42:37'),
(114, 38, 1, '2019-01-09 10:24:44', '2019-01-09 10:24:44'),
(118, 37, 1, '2019-01-21 18:50:00', '2019-01-21 18:50:00'),
(119, 37, 2, '2019-01-21 18:50:00', '2019-01-21 18:50:00'),
(124, 16, 5, '2019-04-06 16:42:37', '2019-04-06 16:42:37'),
(125, 16, 4, '2019-04-06 16:42:37', '2019-04-06 16:42:37'),
(126, 3, 1, '2020-02-25 16:12:20', '2020-02-25 16:12:20'),
(127, 3, 4, '2020-02-25 16:12:20', '2020-02-25 16:12:20'),
(128, 3, 29, '2020-02-25 16:12:20', '2020-02-25 16:12:20'),
(130, 2, 5, '2020-02-25 16:12:37', '2020-02-25 16:12:37'),
(131, 2, 4, '2020-02-25 16:12:37', '2020-02-25 16:12:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registercouses`
--

CREATE TABLE `registercouses` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `registercouses`
--

INSERT INTO `registercouses` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(7, 376, 36, '2020-06-03 09:04:59', '2020-06-03 09:04:59'),
(8, 377, 36, '2020-06-03 15:31:55', '2020-06-03 15:31:55'),
(9, 377, 38, '2020-06-04 16:02:43', '2020-06-04 16:02:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `orderBy` int(11) DEFAULT NULL,
  `home` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `links`, `image`, `status`, `orderBy`, `home`, `created_at`, `updated_at`) VALUES
(8, 'Thời trang nữ', 'Slider ảnh', NULL, '1552923716.pic1.jpg', 1, NULL, 1, '2019-03-17 07:44:17', '2019-03-18 15:41:56'),
(9, 'Thời trang nam', 'Slider ảnh', NULL, '1552922771.su-kien.jpg', 1, NULL, 1, '2019-03-17 07:47:02', '2019-03-18 15:26:11'),
(10, 'Tin tức', 'Demo  abc', NULL, '1552808863.19399101_1371891462898221_9131674129903276433_n.jpg', 1, NULL, 1, '2019-03-17 07:47:43', '2019-03-17 07:47:43'),
(11, 'demo1 34', 'demo 1 mô tả', NULL, '1552924224.19399101_1371891462898221_9131674129903276433_n.jpg', 1, NULL, 1, '2019-03-18 15:50:24', '2019-03-19 14:02:40'),
(12, 'dmeo 10011', NULL, NULL, '1553004364.su-kien.jpg', 1, NULL, 1, '2019-03-19 14:06:04', '2019-03-19 14:06:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `provinceld` int(11) DEFAULT NULL,
  `districtld` int(11) DEFAULT NULL,
  `wardld` int(11) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `positionLever` text DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `achievement` text DEFAULT NULL,
  `studyProcess` text DEFAULT NULL,
  `exp` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `user_id`, `fullname`, `passport`, `provinceld`, `districtld`, `wardld`, `avatar`, `intro`, `positionLever`, `job`, `achievement`, `studyProcess`, `exp`, `facebook`, `zalo`, `skype`, `created_at`, `updated_at`) VALUES
(102, 377, 'Nguyễn Duy Quang', NULL, NULL, NULL, NULL, '1591173577.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 08:39:37', '2020-06-03 08:45:35'),
(103, 378, 'Nguyễn Thi Thu Hoài', NULL, NULL, NULL, NULL, '1591173987.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 08:46:27', '2020-06-03 08:46:27'),
(104, 379, 'Diệu Thanh', NULL, NULL, NULL, NULL, '1591174109.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 08:48:29', '2020-06-03 08:48:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `approved` int(11) DEFAULT 0,
  `fullname` varchar(255) DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `provinceld` int(11) DEFAULT NULL,
  `districtld` int(11) DEFAULT NULL,
  `wardld` int(11) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `positionLever` text DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `achievement` text DEFAULT NULL,
  `studyProcess` text DEFAULT NULL,
  `exp` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `approved`, `fullname`, `passport`, `provinceld`, `districtld`, `wardld`, `avatar`, `intro`, `positionLever`, `job`, `achievement`, `studyProcess`, `exp`, `facebook`, `zalo`, `skype`, `created_at`, `updated_at`) VALUES
(266, 374, 0, 'Nguyễn Thu GV', NULL, NULL, NULL, NULL, '1591165905.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 06:31:45', '2020-06-03 06:35:34'),
(267, 375, 0, 'Nguyễn ABC', NULL, NULL, NULL, NULL, '1591166382.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 06:39:42', '2020-06-03 08:49:23'),
(268, 376, 1, 'Giáo viên EduTech', NULL, NULL, NULL, NULL, '1591173043.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 08:30:43', '2020-06-03 08:50:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thematics`
--

CREATE TABLE `thematics` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL COMMENT 'Khóa học',
  `title` varchar(255) DEFAULT NULL COMMENT 'Tên chuyên đề',
  `description` text DEFAULT NULL COMMENT 'Mô tả',
  `status` int(11) DEFAULT 1 COMMENT 'Trạng thái',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thematics`
--

INSERT INTO `thematics` (`id`, `user_id`, `course_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(52, 376, 36, 'Phần 1: Giới thiệu và cài đặt môi trường', NULL, 1, '2020-06-03 08:59:18', '2020-06-03 08:59:18'),
(53, 376, 36, 'Phần 2: Làm việc với NodeJS', NULL, 1, '2020-06-03 08:59:31', '2020-06-03 08:59:31'),
(54, 376, 36, 'Phần 3: Làm việc với ExpressJS Framework', NULL, 1, '2020-06-03 08:59:46', '2020-06-03 08:59:46'),
(55, 376, 36, 'Phần 4: Cài đặt và kết nối CSDL MySQL', NULL, 1, '2020-06-03 09:00:18', '2020-06-03 09:00:18'),
(56, 376, 36, 'Phần 5: Xây dựng module Đăng Ký và Đăng nhập', NULL, 1, '2020-06-03 09:00:33', '2020-06-03 09:00:33'),
(57, 376, 38, 'Phần 1: Giới thiệu về lập trình và các khái niệm cơ bản', NULL, 1, '2020-06-04 15:46:53', '2020-06-04 15:46:53'),
(58, 376, 38, 'Phần 2: Cấu trúc điều khiển', NULL, 1, '2020-06-04 15:52:03', '2020-06-04 15:52:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `approve` int(11) DEFAULT 0,
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
  `status` int(11) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `approve`, `fullname`, `username`, `avatar`, `email`, `phone`, `password`, `confirmPassword`, `role`, `birthday`, `gender`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(339, 0, NULL, 'quangnd', NULL, 'quangnd@vhv.vn', NULL, '$2y$10$4y/fts3FzFCVt/oqLs1II.05RKTP5D9A42qcwdNV7B..dM/qmQnLy', '$2y$10$447s8P7VRwapGaWTaRMsEOGkOQrlbiYiYa2BA9Wb6L9bC1WVIMiPm', 10, NULL, 1, NULL, 1, 'MYsVvvu02lCWAr8FcgVAu1Mb0CSDxJOvx0jwsEnwGhPeJTcazxnRnGNd1YZC', '2020-05-21 15:59:57', '2020-05-21 15:59:57'),
(374, 0, 'Nguyễn Thu GV', 'nguyenthu', '1591165905.png', 'nguyenthu@edutech.vn', '0982039382', '$2y$10$CnYIDpkAUm7PjR4DfY8dkO35ReBmgXh2wjoLLmWqTVahZSn/d8aba', '$2y$10$Feo1.2gpOPGdaeMX/yaWnOMOHqn44nWWsEpIv9mcJUC0Z1vNo7t3G', 2, '10.06.1994', 1, '017173970', 1, NULL, '2020-06-03 06:31:45', '2020-06-03 06:31:45'),
(375, 0, 'Nguyễn ABC', 'nguyengv', '1591166382.png', 'abc@edutech.vn', '0982039380', '$2y$10$f6rsyxRxZjkPzErSR0qJzuuy59.plDcTJ3Bq.4ecHZn8una/z2kbu', '$2y$10$wBOJ6vFHTmBH4/4p5Nwdxe0enaUq1/WUq3dvP2jGJP7llGjMFGQwW', 2, '10.06.1994', 1, '017173970', 1, NULL, '2020-06-03 06:39:42', '2020-06-03 08:49:23'),
(376, 1, 'Giáo viên EduTech', 'gvedutech', '1591173043.jpg', 'giaoviena@edutech.vn', '0982039380', '$2y$10$s71EnVlSbwUcUyBq2BuSqO1SNzinmgXULAGnfh5FpaEnxFzczWHVK', '$2y$10$8IjAYzU2239aH6OmMEM.lOMzBQDm6jiINskGwZdPPeQpgfTDwBOdO', 2, '10.06.2020', 1, 'Phạm Văn Đồng , HN', 1, 'kOhNjuMFx2YYq9Ae2EeJyAHgPTZ4WemKiz8E6qryLT1UU2UVUdpccUp8010P', '2020-06-03 08:30:43', '2020-06-03 08:50:20'),
(377, 0, 'Nguyễn Duy Quang', 'quanghs', '1591173577.png', 'ndquang1410@gmail.com', '0982039380', '$2y$10$uVb3qCnaKELfseI63wEpo.pQw908eQdnUdKskoUEvlp2H/hsZnDqi', '$2y$10$d4fsAC3.vb3C/.woMy0F1uxEyqhDSiIxw5NMAIJEZmvMMm83qNxNi', 1, '14.10.1995', 1, '017173970', 1, 'tYxGiOihbMYANFrRbQwqbvEIkxx5CNiouHNU42Tah0a70eW8GKtxcnjbMLuR', '2020-06-03 08:39:37', '2020-06-03 08:41:02'),
(378, 0, 'Nguyễn Thi Thu Hoài', 'hoaihs', '1591173987.png', 'nguyenthuhoai@edutech.vn', '0982039389', '$2y$10$uUoUM3wOK8o02wbSa7eFWOUclDnIDNub27hezUK9gOxaKmoJkzY/.', '$2y$10$7GXz0tHcygkX4ddZ6eppW.rbm5eBPvtv2XAoz6v1e81yz4ux/niKm', 1, '10.06.1994', 2, 'Phạm Văn Đồng , HN', 1, NULL, '2020-06-03 08:46:27', '2020-06-03 08:46:27'),
(379, 0, 'Diệu Thanh', 'thanhhs', '1591174109.jpg', 'dieuthanh@edutech.vn', '0982039345', '$2y$10$AuLYFICbUbAg3cJie0hjq.hVTnKMlnBoVY0YKdOrfc9EXHBqEpCPm', '$2y$10$yHVwgXPKMDs6CrrvltD9nOPD3s1FegOc4eUlwW0cHwXT0uPSV0.tS', 1, '10.06.1994', 2, 'Hai Bà Trưng , HN', 1, NULL, '2020-06-03 08:48:29', '2020-06-03 08:48:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_bill_id_foreign` (`bill_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id_cmt` (`lesson_id`),
  ADD KEY `course_id_cmt` (`course_id`),
  ADD KEY `teacher_id_cmt` (`teacher_id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_user` (`user_id`);

--
-- Chỉ mục cho bảng `coursecate`
--
ALTER TABLE `coursecate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_course` (`category_id`),
  ADD KEY `cate_course1` (`course_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `datatypes`
--
ALTER TABLE `datatypes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `displaytypes`
--
ALTER TABLE `displaytypes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercises_user` (`user_id`);

--
-- Chỉ mục cho bảng `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_user` (`user_id`),
  ADD KEY `lesson_course` (`course_id`),
  ADD KEY `lesson_thematic` (`thematic_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `registercouses`
--
ALTER TABLE `registercouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_register` (`user_id`),
  ADD KEY `course_id_register` (`course_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_student_id` (`user_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_student_id` (`user_id`);

--
-- Chỉ mục cho bảng `thematics`
--
ALTER TABLE `thematics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thematic_user` (`user_id`),
  ADD KEY `thematic_course` (`course_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `coursecate`
--
ALTER TABLE `coursecate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `datatypes`
--
ALTER TABLE `datatypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `displaytypes`
--
ALTER TABLE `displaytypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `registercouses`
--
ALTER TABLE `registercouses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT cho bảng `thematics`
--
ALTER TABLE `thematics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `course_id_cmt` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_id_cmt` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_id_cmt` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `coursecate`
--
ALTER TABLE `coursecate`
  ADD CONSTRAINT `cate_course` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cate_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Các ràng buộc cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lesson_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `lesson_thematic` FOREIGN KEY (`thematic_id`) REFERENCES `thematics` (`id`),
  ADD CONSTRAINT `lesson_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `registercouses`
--
ALTER TABLE `registercouses`
  ADD CONSTRAINT `course_id_register` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `user_id_register` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `user_student_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `thematics`
--
ALTER TABLE `thematics`
  ADD CONSTRAINT `thematic_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `thematic_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
