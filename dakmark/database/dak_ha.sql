-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 04, 2017 lúc 06:03 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dak_ha`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activation_keys`
--

CREATE TABLE `activation_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `activation_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) NOT NULL,
  `system_id` varchar(15) NOT NULL,
  `title` varchar(200) NOT NULL,
  `en_title` varchar(200) DEFAULT NULL,
  `cat_id` int(10) NOT NULL,
  `introduce` text,
  `en_introduce` text,
  `content` text,
  `en_content` text,
  `thumb` varchar(100) DEFAULT NULL,
  `sort_order` int(5) DEFAULT '10',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` varchar(20) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(15) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `system_id`, `title`, `en_title`, `cat_id`, `introduce`, `en_introduce`, `content`, `en_content`, `thumb`, `sort_order`, `is_show`, `create_time`, `last_update`, `views`) VALUES
(1, 'BLG1', 'Lợi ích của cà phê', NULL, 2, 'kgkghfnnfgn', '3464574736', '<p>sfhndsfwehrnfdb<img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/slide-8(1).jpg\" style=\"height:909px; width:1600px\" /></p>', '<p>647589698567547</p>\r\n\r\n<p><img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/thac-Dray-Sap(1).jpg\" style=\"height:1068px; width:1600px\" /></p>', 'loi-ich-cua-ca-phe.jpg', 10, 1, '2017-08-31 16:06:10', '2017-08-31 16:06:10', 0),
(2, 'BLG2', 'blog test 1', NULL, 3, NULL, NULL, NULL, NULL, 'blog-test-1.jpg', 10, 1, '2017-09-02 06:07:22', '2017-09-02 06:07:22', 0),
(4, 'BLG3', 'bloig test', NULL, 1, NULL, NULL, NULL, NULL, 'bloig-test.jpg', 10, 1, '2017-09-02 06:11:42', '2017-09-02 06:11:42', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_cat`
--

CREATE TABLE `blog_cat` (
  `id` int(10) NOT NULL,
  `system_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `en_name` varchar(50) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `sort_order` int(5) DEFAULT '1',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `is_show_nav` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `blog_cat`
--

INSERT INTO `blog_cat` (`id`, `system_id`, `name`, `en_name`, `parent_id`, `icon`, `sort_order`, `is_show`, `is_show_nav`) VALUES
(1, 'BCAT1', 'Thế giới cà phê', 'Coffee world', 0, '', NULL, 1, 1),
(2, 'BCAT2', 'Cà phê và sức khỏe', NULL, 1, '', NULL, 1, 0),
(3, 'BCAT3', 'Cà phê và Ẩm thực', NULL, 1, '', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookaddress`
--

CREATE TABLE `bookaddress` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` text COLLATE utf8mb4_unicode_ci,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `productname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `productname`, `size`, `color`, `quantity`, `unitprice`, `total`, `image`, `url`, `shop_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ao dai ', 'XL', 'Vàng', 10, '5000.00', '50000.00', 'http://aodaixuan.vn/adxadmin/webroot/upload/image/images/ao-dai-hong-phan-theu-151116-850/ao-dai-hong-phan-theu-151116.jpg', 'http://aodaixuan.vn/', 1, 2, '2017-08-16 05:50:50', '2017-08-16 05:50:52'),
(2, 'product test 1', 'M', 'Đỏ', 5, '6000.00', '30000.00', '#', '#', 1, 1, NULL, NULL),
(3, 'product test 1', 'M', 'Đỏ', 5, '6000.00', '30000.00', 'http://aodaixuan.vn/adxadmin/webroot/upload/image/images/160613/160613-02.jpg', '#', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_22_082103_create_activation_keys_table', 1),
(4, '2017_07_23_080906_entrust_setup_tables', 1),
(5, '2017_07_27_013959_create_shoppingcart_table', 1),
(6, '2017_07_27_014323_create_products_table', 1),
(7, '2017_07_28_061232_create_address_table', 1),
(8, '2017_08_09_013918_create_rates_table', 1),
(9, '2017_08_10_092904_create_shops_table', 1),
(10, '2017_08_10_094550_create_orders_table', 1),
(11, '2017_08_10_094616_create_order_details_table', 1),
(12, '2017_08_10_094626_create_order_shops_table', 1),
(13, '2017_08_16_032933_create_cart_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `navigator`
--

CREATE TABLE `navigator` (
  `id` int(10) NOT NULL,
  `system_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `en_name` varchar(50) DEFAULT NULL,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `sort_order` int(5) DEFAULT '1',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `navigator`
--

INSERT INTO `navigator` (`id`, `system_id`, `name`, `en_name`, `parent_id`, `sort_order`, `is_show`, `type`) VALUES
(1, 'NAV1', 'Giới thiệu', 'Introduce', 0, 1, 1, 'NAV'),
(2, 'BCAT1', 'Thế giới cà phê', 'Coffee world', 0, 1, 1, 'BCAT'),
(6, 'PCAT10', 'Danh mục test', NULL, 0, 1, 1, 'PCAT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `productname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usercreated` int(10) UNSIGNED NOT NULL,
  `userupdated` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `freight1` decimal(12,2) NOT NULL,
  `freight2` decimal(12,2) NOT NULL,
  `service` decimal(12,2) NOT NULL,
  `deposit` decimal(12,2) NOT NULL,
  `totalamount` decimal(12,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `shippeddate` datetime NOT NULL,
  `shipaddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipdistrict` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipcity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipphone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usercreated` int(10) UNSIGNED NOT NULL,
  `userupdated` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `freight1`, `freight2`, `service`, `deposit`, `totalamount`, `status`, `shippeddate`, `shipaddress`, `shipdistrict`, `shipcity`, `shipphone`, `note`, `feedback`, `user_id`, `created_at`, `updated_at`, `usercreated`, `userupdated`) VALUES
(1, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 1, '2017-08-11 09:41:58', '2017-08-11 09:41:56', 1, 1),
(13, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-06 07:01:27', '2017-08-14 07:01:36', 2, 2),
(14, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 3, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-07 07:01:37', '2017-08-14 07:01:46', 2, 2),
(15, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-08 07:01:43', '2017-08-14 07:01:47', 2, 2),
(16, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-08 07:01:49', '2017-08-14 07:02:02', 2, 2),
(17, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-09 07:02:03', '2017-08-14 07:02:21', 2, 2),
(18, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 2, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-09 07:02:09', '2017-08-14 07:02:20', 2, 2),
(19, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 4, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-10 07:02:15', '2017-08-14 07:02:22', 2, 2),
(20, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-11 07:02:25', '2017-08-14 07:03:05', 2, 2),
(21, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-11 07:02:29', '2017-08-14 07:03:03', 2, 2),
(22, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 4, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-12 07:02:33', '2017-08-14 07:03:04', 2, 2),
(23, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-12 07:02:37', '2017-08-14 07:03:08', 2, 2),
(24, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 3, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-14 07:02:45', '2017-08-14 07:03:09', 2, 2),
(25, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-14 07:02:51', '2017-08-14 07:03:01', 2, 2),
(26, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-15 07:02:56', '2017-08-14 07:02:59', 2, 2),
(27, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-16 07:02:58', '2017-08-14 07:03:00', 2, 2),
(28, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-17 07:45:08', '2017-08-14 07:45:13', 2, 2),
(29, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-17 07:45:09', '2017-08-14 07:45:14', 2, 2),
(30, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 1, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-18 07:45:10', '2017-08-14 07:45:15', 2, 2),
(31, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 2, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-19 07:45:11', '2017-08-14 07:45:15', 2, 2),
(32, '1357.00', '2468.00', '12345.00', '123456.00', '1234567.00', 2, '2017-12-12 00:00:00', '02 Quang Trung', 'Hai Chau', 'Da Nang', '+84 989 183 193', 'note', 'feedback', 2, '2017-08-20 07:45:12', '2017-08-14 07:45:16', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordershops`
--

CREATE TABLE `ordershops` (
  `id` int(10) UNSIGNED NOT NULL,
  `freight1` decimal(12,2) NOT NULL,
  `freight2` decimal(12,2) NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `landingcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `orderdate` datetime NOT NULL,
  `shippeddate` datetime NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usercreated` int(10) UNSIGNED NOT NULL,
  `userupdated` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'Xem danh sách quyền', 'Xem danh sách quyền', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(2, 'role-show', 'Hiển thị chi tiết quyền', 'Hiển thị chi tiết quyền', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(3, 'role-create', 'Tạo mới quyền', 'Tạo mới quyền', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(4, 'role-edit', 'Chỉnh sửa quyền', 'Chỉnh sửa quyền', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(5, 'role-delete', 'Xóa quyền', 'Xóa quyền', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(6, 'user-list', 'Xem danh sách tài khoản  người dùng', 'Xem danh sách tài khoản người dùng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(7, 'user-show', 'Hiển thị chi tiết tài khoản  người dùng', 'Hiển thị chi tiết tài khoản  người dùng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(8, 'user-create', 'Tạo mới tài khoản  người dùng', 'Tạo mới tài khoản  người dùng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(9, 'user-edit', 'Chỉnh sửa tài khoản người dùng', 'Chỉnh sửa tài khoản  người dùng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(10, 'user-delete', 'Xóa tài khoản người dùng', 'Xóa tài khoản người dùng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(11, 'order-list', 'Xem danh sách đơn đặt hàng', 'Xem danh sách đơn đặt hàng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(12, 'order-show', 'Hiển thị chi tiết đơn đặt hàng', 'Hiển thị chi tiết đơn đặt hàng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(13, 'order-create', 'Tạo mới đơn đặt hàng', 'Tạo mới đơn đặt hàng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(14, 'order-edit', 'Chỉnh sửa đơn đặt hàngg', 'Chỉnh sửa đơn đặt hàng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(15, 'order-delete', 'Xóa đơn đặt hàng', 'Xóa đơn đặt hàng', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(16, 'rate-list', 'Xem danh sách tỷ giá', 'Xem danh sách tỷ giá', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(17, 'rate-show', 'Hiển thị chi tiết tỷ giá', 'Hiển thị chi tiết tỷ giá', '2017-08-11 00:42:10', '2017-08-11 00:42:10'),
(18, 'rate-create', 'Tạo mới tỷ giá', 'Tạo mới tỷ giá', '2017-08-11 00:42:11', '2017-08-11 00:42:11'),
(19, 'rate-edit', 'Chỉnh sửa tỷ giá', 'Chỉnh sửa tỷ giá', '2017-08-11 00:42:11', '2017-08-11 00:42:11'),
(20, 'rate-delete', 'Xóa tỷ giá', 'Xóa tỷ giá', '2017-08-11 00:42:11', '2017-08-11 00:42:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `system_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(10) NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci,
  `en_introduce` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `en_description` text COLLATE utf8mb4_unicode_ci,
  `default_price` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `promote_price` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `promote_begin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promote_end` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_promote` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `rates` float NOT NULL DEFAULT '0',
  `create_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `system_id`, `product_code`, `name`, `en_name`, `cat_id`, `introduce`, `en_introduce`, `description`, `en_description`, `default_price`, `promote_price`, `promote_begin`, `promote_end`, `thumb`, `is_show`, `is_new`, `is_hot`, `is_promote`, `views`, `rates`, `create_time`, `last_update`) VALUES
(9, 'PRD1', 'PRD12', 'Cà phê phin 1', NULL, 9, 'Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog', NULL, '<p>rdtjrdjrjrjrjj</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/slide-8.jpg\" style=\"height:909px; width:1600px\" /></p>', NULL, '120000', '99000', '09/01/2017', '09/30/2017', 'thac-dray-sap.jpg', 1, 1, 0, 1, 0, 0, '2017-08-27 11:03:27', '2017-08-27 11:03:27'),
(10, 'PRD10', NULL, 'Cà phê phin 2', NULL, 9, 'Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog', NULL, '<p>c&agrave; ph&ecirc; phin&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/coffee.jpg\" style=\"height:183px; width:275px\" /></p>', NULL, '', '', NULL, NULL, 'ca-phe-phin-2.jpg', 1, 1, 0, 0, 0, 0, '2017-09-03 15:40:50', '2017-09-03 15:40:50'),
(11, 'PRD11', NULL, 'Cà phê gói', NULL, 9, 'Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog', NULL, '<p><img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/coffee2.jpg\" style=\"height:400px; width:600px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>c&agrave; ph&ecirc; hương vị s&ocirc; c&ocirc; la</p>', NULL, '', '', NULL, NULL, 'ca-phe-goi.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 15:42:30', '2017-09-03 15:42:30'),
(12, 'PRD12', NULL, 'Ly cà phê', NULL, 11, NULL, NULL, '<p><img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/coffee(1).jpg\" style=\"height:183px; width:275px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ly c&agrave; ph&ecirc;&nbsp;</p>', NULL, '', '', NULL, NULL, 'ly-ca-phe.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 15:56:21', '2017-09-03 15:56:21'),
(13, 'PRD13', NULL, 'Muỗng cà phê', NULL, 11, NULL, NULL, NULL, NULL, '', '', NULL, NULL, 'muong-ca-phe.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 15:56:54', '2017-09-03 15:56:54'),
(14, 'PRD14', NULL, 'Máy pha cà phê', NULL, 11, 'Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog', NULL, NULL, NULL, '', '', NULL, NULL, 'may-pha-ca-phe.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 15:57:50', '2017-09-03 15:57:50'),
(15, 'PRD15', 'PRD10', 'Cà phê hòa tan 1', NULL, 9, 'Được tuyển chọn từ những hạt cà phê tốt nhất trên vùng đất Buôn Mê Thuột trứ danh và xử lý bằng công nghệ hiện đại châu Âu kết hợp với kinh nghiệm dày dạn hơn 20 năm nghiên cứu của TNI… Chúng tôi trân trọng tạo nên sản phẩm cà phê hòa tan cao cấp KING COFFEE 3in1. Với vị đậm đà và hương cà phê nổi bật, KING COFFEE 3in1 sẽ đánh thức sự hứng khởi trong bạn, đem đến ngày làm việc thật tỉnh táo và thành công.', NULL, '<p><img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/5000060_-356595f12208.jpg\" style=\"height:460px; width:460px\" /></p>\r\n\r\n<p>1 sản phẩm của Dak ha</p>', NULL, '150000', '', NULL, NULL, 'ca-phe-hoa-tan-1.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 15:59:35', '2017-09-03 15:59:35'),
(16, 'PRD16', 'PRD11', 'Cà phê hòa tan 2', NULL, 9, 'NESCAFE là một trong những thương hiệu cà phê hàng đầu trên toàn thế giới với lịch sử phát triên lâu đời. NESCAFE luôn nhận được sự tín nhiệm và tin yêu của người tiêu dùng trên toàn thế giới bởi chúng tôi cùng chia sẻ một tình yêu và niềm say mê cà phê để đem đến những ly cà phê thơm ngon cho bạn những giây phút thưởng thức cà phê tuyệt vời.', NULL, NULL, NULL, '90000', '', NULL, NULL, 'ca-phe-hoa-tan-2.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 16:01:43', '2017-09-03 16:01:43'),
(17, 'PRD17', NULL, 'Cà phê Sài Gòn', NULL, 9, 'Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog', NULL, '<p><img alt=\"\" src=\"/public/assets/ckfinder/userfiles/images/travel_for_children__coffee__1.jpg\" style=\"height:465px; width:700px\" /></p>\r\n\r\n<p>&nbsp;</p>', NULL, '', '', NULL, NULL, 'ca-phe-sai-gon.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 16:02:39', '2017-09-03 16:02:39'),
(18, 'PRD18', NULL, 'Cà phê sữa', NULL, 9, 'Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog', NULL, NULL, NULL, '', '', NULL, NULL, 'ca-phe-sua.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 16:04:15', '2017-09-03 16:04:15'),
(19, 'PRD19', NULL, 'Cà phê Socola', NULL, 9, 'Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog Nội dung giới thiệu blog', NULL, NULL, NULL, '', '', NULL, NULL, 'ca-phe-socola.jpg', 1, 0, 0, 0, 0, 0, '2017-09-03 16:04:43', '2017-09-03 16:04:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_cat`
--

CREATE TABLE `product_cat` (
  `id` int(10) NOT NULL,
  `system_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `en_name` varchar(50) DEFAULT NULL,
  `parent_id` int(10) DEFAULT '0',
  `icon` varchar(50) DEFAULT NULL,
  `sort_order` tinyint(5) DEFAULT '1',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `is_show_nav` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_cat`
--

INSERT INTO `product_cat` (`id`, `system_id`, `name`, `en_name`, `parent_id`, `icon`, `sort_order`, `is_show`, `is_show_nav`) VALUES
(9, 'PCAT1', 'Cà phê', 'Coffee', 0, '', 1, 1, 0),
(11, 'PCAT10', 'Dụng cụ pha cà phê', NULL, 0, '', 2, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rates`
--

INSERT INTO `rates` (`id`, `rate`, `created_at`, `updated_at`, `user_id`) VALUES
(1, '123.00', '2017-08-11 02:29:21', '2017-08-11 02:29:21', 1),
(2, '1234.00', '2017-08-11 02:29:24', '2017-08-11 02:29:24', 1),
(3, '12345.00', '2017-08-11 02:29:28', '2017-08-11 02:29:28', 1),
(4, '123456.00', '2017-08-11 02:29:32', '2017-08-11 02:29:32', 1),
(5, '1234567.00', '2017-08-11 02:29:36', '2017-08-11 02:29:36', 1),
(6, '12345678.00', '2017-08-11 02:29:40', '2017-08-11 02:29:40', 1),
(7, '4000.00', '2017-08-13 23:17:34', '2017-08-13 23:17:34', 2),
(8, '12345.99', '2017-08-16 20:59:13', '2017-08-16 20:59:13', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'Tài khoản quản trị hệ thống!', '2017-08-11 00:42:11', '2017-08-11 00:42:11'),
(2, 'manager', 'Quản Lý', 'Tài khoản quản lý!', '2017-08-11 00:42:11', '2017-08-11 00:42:11'),
(3, 'normal', 'Bình Thường', 'Tài khoản thường!', '2017-08-11 00:42:11', '2017-08-11 00:42:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seo`
--

CREATE TABLE `seo` (
  `id` int(10) NOT NULL,
  `system_id` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `en_seo_title` varchar(100) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `seo`
--

INSERT INTO `seo` (`id`, `system_id`, `name`, `slug`, `seo_title`, `en_seo_title`, `keyword`, `description`, `type`) VALUES
(3, 'PCAT1', 'Cà phê', 'ca-phe', 'Cà phê', 'Coffee', 'cà phê,', 'Cà phê nguyên chất', 'PCAT'),
(6, 'PRD1', 'Cà phê phin 1', 'ca-phe-phin-1', 'Cà phê phin 1', NULL, NULL, NULL, 'PRODUCT'),
(8, 'NAV1', 'Giới thiệu', 'gioi-thieu', 'Giới thiệu', NULL, NULL, NULL, 'NAVIGATOR'),
(9, 'BCAT1', 'Thế giới cà phê', 'the-gioi-ca-phe', 'Thế giới cà phê', NULL, NULL, NULL, 'BCAT'),
(10, 'BCAT2', 'Cà phê và sức khỏe', 'ca-phe-va-suc-khoe', 'Cà phê và sức khỏe', NULL, NULL, NULL, 'BCAT'),
(11, 'BCAT3', 'Cà phê và Ẩm thực', 'ca-phe-va-am-thuc', 'Cà phê và Ẩm thực', NULL, NULL, NULL, 'BCAT'),
(16, 'BLG1', 'Lợi ích của cà phê', 'loi-ich-cua-ca-phe', 'Lợi ích của cà phê', NULL, NULL, NULL, 'BLOG'),
(17, 'BLG2', 'blog test 1', 'blog-test-1', 'blog test 1', NULL, NULL, NULL, 'BLOG'),
(19, 'BLG3', 'bloig test', 'bloig-test', 'blog test', NULL, NULL, NULL, 'BLOG'),
(20, 'PRD10', 'Cà phê phin 2', 'ca-phe-phin-2', 'Cà phê phin 2', NULL, NULL, NULL, 'PRODUCT'),
(21, 'PRD11', 'Cà phê gói', 'ca-phe-goi', 'Cà phê gói', NULL, NULL, NULL, 'PRODUCT'),
(22, 'PCAT10', 'Dụng cụ pha cà phê', 'dung-cu-pha-ca-phe', 'Dụng cụ pha cà phê', NULL, NULL, NULL, 'PCAT'),
(23, 'PRD12', 'Ly cà phê', 'ly-ca-phe', 'Ly cà phê', NULL, NULL, NULL, 'PRODUCT'),
(24, 'PRD13', 'Muỗng cà phê', 'muong-ca-phe', 'Muỗng cà phê', NULL, NULL, NULL, 'PRODUCT'),
(25, 'PRD14', 'Máy pha cà phê', 'may-pha-ca-phe', 'Máy pha cà phê', NULL, NULL, NULL, 'PRODUCT'),
(26, 'PRD15', 'Cà phê hòa tan 1', 'ca-phe-hoa-tan-1', 'Cà phê hòa tan 1', NULL, NULL, NULL, 'PRODUCT'),
(27, 'PRD16', 'Cà phê hòa tan 2', 'ca-phe-hoa-tan-2', 'Cà phê hòa tan 2', NULL, NULL, NULL, 'PRODUCT'),
(28, 'PRD17', 'Cà phê Sài Gòn', 'ca-phe-sai-gon', 'Cà phê Sài Gòn', NULL, NULL, NULL, 'PRODUCT'),
(29, 'PRD18', 'Cà phê sữa', 'ca-phe-sua', 'Cà phê sữa', NULL, NULL, NULL, 'PRODUCT'),
(30, 'PRD19', 'Cà phê Socola', 'ca-phe-socola', 'Cà phê Socola', NULL, NULL, NULL, 'PRODUCT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shops`
--

INSERT INTO `shops` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'shop1', '2017-08-16 05:50:16', '2017-08-16 05:50:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `en_title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `en_description` varchar(255) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `sort_order` int(5) DEFAULT '1',
  `image` varchar(150) NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `title`, `en_title`, `description`, `en_description`, `url`, `sort_order`, `image`, `is_show`) VALUES
(2, 'test', NULL, NULL, NULL, NULL, NULL, 'test.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `phone`, `password`, `remember_token`, `activated`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Groot', 'Em là', 'admin@admin.com', '+84 123 456 789', '$2y$10$zRFih.UH5.0a8lA2A/1Rne7g44NysKyZAvZ.DovdOCYad46O/gPge', 'HrIjB7tLuvg22wGqZrbtCRyqELJ3JLzpN6D4Lf23FDY1r8WxjZYWGPSlcUd2', 1, '2017-08-11 00:42:12', '2017-08-11 00:42:12'),
(2, 'tuanlm', 'Tuan', 'Le Minh', 'tuanlm@jcs-corp.com', '+84 989 183 193', '$2y$10$2jC9IOz1vyDBu0ppK.rYGO0ocFOtO8X4XotsKjaHtRLb94aW7xEQG', 'svRFYvBAlzPFHdCCte3Gb8rVs1fPyMzdMwcqaX6Ni3VbOWcCSscZlCBlFkTF', 1, '2017-08-13 23:17:00', '2017-08-16 01:50:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activation_keys`
--
ALTER TABLE `activation_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activation_keys_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_cat`
--
ALTER TABLE `blog_cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bookaddress`
--
ALTER TABLE `bookaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookaddress_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_shop_id_foreign` (`shop_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `navigator`
--
ALTER TABLE `navigator`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetails_order_id_foreign` (`order_id`),
  ADD KEY `orderdetails_shop_id_foreign` (`shop_id`),
  ADD KEY `orderdetails_usercreated_foreign` (`usercreated`),
  ADD KEY `orderdetails_userupdated_foreign` (`userupdated`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_usercreated_foreign` (`usercreated`),
  ADD KEY `orders_userupdated_foreign` (`userupdated`);

--
-- Chỉ mục cho bảng `ordershops`
--
ALTER TABLE `ordershops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordershops_shop_id_foreign` (`shop_id`),
  ADD KEY `ordershops_usercreated_foreign` (`usercreated`),
  ADD KEY `ordershops_userupdated_foreign` (`userupdated`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_image_unique` (`thumb`);

--
-- Chỉ mục cho bảng `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `activation_keys`
--
ALTER TABLE `activation_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `blog_cat`
--
ALTER TABLE `blog_cat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `bookaddress`
--
ALTER TABLE `bookaddress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `navigator`
--
ALTER TABLE `navigator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT cho bảng `ordershops`
--
ALTER TABLE `ordershops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `activation_keys`
--
ALTER TABLE `activation_keys`
  ADD CONSTRAINT `activation_keys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `bookaddress`
--
ALTER TABLE `bookaddress`
  ADD CONSTRAINT `bookaddress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_userupdated_foreign` FOREIGN KEY (`userupdated`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_userupdated_foreign` FOREIGN KEY (`userupdated`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ordershops`
--
ALTER TABLE `ordershops`
  ADD CONSTRAINT `ordershops_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordershops_usercreated_foreign` FOREIGN KEY (`usercreated`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordershops_userupdated_foreign` FOREIGN KEY (`userupdated`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
