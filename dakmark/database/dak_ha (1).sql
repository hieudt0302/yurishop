-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 27, 2017 lúc 05:31 AM
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
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `sort_order` int(5) NOT NULL DEFAULT '1',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `navigator`
--

INSERT INTO `navigator` (`id`, `system_id`, `name`, `parent_id`, `sort_order`, `is_show`, `type`) VALUES
(1, 'PCAT10', 'Dụng cụ pha cà phê', 0, 1, 1, 2);

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
  `product_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_price` decimal(20,0) NOT NULL,
  `promote_price` decimal(20,0) NOT NULL,
  `promote_start` int(20) NOT NULL,
  `promote_end` int(20) NOT NULL,
  `thumb` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `is_new` tinyint(1) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `is_sell` tinyint(1) NOT NULL,
  `is_promote` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL,
  `rates` int(2) NOT NULL,
  `create_time` int(20) DEFAULT NULL,
  `modify_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `system_id`, `product_code`, `name`, `cat_id`, `description`, `default_price`, `promote_price`, `promote_start`, `promote_end`, `thumb`, `is_show`, `is_new`, `is_hot`, `is_sell`, `is_promote`, `views`, `rates`, `create_time`, `modify_time`) VALUES
(1, '', '', 'Playstation 4', 0, 'description goes here', '400', '0', 0, 0, 'ps4.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(2, '', '', 'Xbox One', 0, 'description goes here', '450', '0', 0, 0, 'xbox-one.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(3, '', '', 'Apple Macbook Pro', 0, 'description goes here', '2300', '0', 0, 0, 'macbook-pro.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(4, '', '', 'Apple iPad Retina', 0, 'description goes here', '800', '0', 0, 0, 'ipad-retina.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(5, '', '', 'Acoustic Guitar', 0, 'description goes here', '700', '0', 0, 0, 'acoustic.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(6, '', '', 'Electric Guitar', 0, 'description goes here', '900', '0', 0, 0, 'electric.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(7, '', '', 'Headphones', 0, 'description goes here', '100', '0', 0, 0, 'headphones.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(8, '', '', 'Speakers', 0, 'description goes here', '500', '0', 0, 0, 'speakers.jpg', 1, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_cat`
--

CREATE TABLE `product_cat` (
  `id` int(10) NOT NULL,
  `system_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `en_name` varchar(50) DEFAULT NULL,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `icon` varchar(50) DEFAULT NULL,
  `sort_order` tinyint(5) NOT NULL DEFAULT '1',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `is_show_nav` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_cat`
--

INSERT INTO `product_cat` (`id`, `system_id`, `name`, `en_name`, `parent_id`, `icon`, `sort_order`, `is_show`, `is_show_nav`) VALUES
(9, 'PCAT1', 'Cà phê', 'Coffee', 0, '', 1, 1, 0),
(10, 'PCAT10', 'Dụng cụ pha cà phê', NULL, 0, '', 2, 1, 1),
(11, 'PCAT11', 'Capucchino', 'Capucchino', 9, '', 1, 1, 0);

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
  `slug` varchar(100) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `en_seo_title` varchar(100) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `seo`
--

INSERT INTO `seo` (`id`, `system_id`, `slug`, `seo_title`, `en_seo_title`, `keyword`, `description`, `type`) VALUES
(3, 'PCAT1', 'ca-phe', 'Cà phê', 'Coffee', 'cà phê,', 'Cà phê nguyên chất', 1),
(4, 'PCAT10', 'dung-cu-pha-ca-phe', 'Dụng cụ pha cà phê', 'Coffee instruments', NULL, NULL, 1),
(5, 'PCAT11', 'capucchino', 'Capucchino', NULL, 'cà phê Ý, Capucchino', NULL, 1);

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
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `navigator`
--
ALTER TABLE `navigator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
