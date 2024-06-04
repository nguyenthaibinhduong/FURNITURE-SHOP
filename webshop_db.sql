-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2024 lúc 07:24 PM
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
-- Cơ sở dữ liệu: `webshop_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `uploaded` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name`, `title`, `sub_title`, `uploaded`, `image`, `created_at`, `updated_at`) VALUES
(1, 'SALE Giày', 'FLASH SALE', 'Đây là chương trình khuyến mãi chào mừng sinh nhật tháng 5 , khi bạn mua hóa đơn là Giày sẽ được giảm 10% hóa đơn khi nhập mã GIAMGIA10', 0, 'image/banner/1717517851.png', '2024-06-04 09:17:31', '2024-06-04 09:28:49'),
(2, 'Sale mùa hè', 'BLACK FRIDAY 50%', 'Hãy tận hưởng mua sắm cùng các sản phẩm từ thương hiệu mới với giá ưu đãi vào ngày thứ sáu nhập mã FRIDAY50 để giảm 50% tổng giá trị hóa đơn', 0, 'image/banner/1717520609.jpg', '2024-06-04 09:20:40', '2024-06-04 10:03:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Channel', 'channel@gmail.com', '0123566778', 'USA', '2024-06-04 09:12:35', '2024-06-04 09:12:35', NULL),
(2, 'Adidas', 'addidas@gmail.com', '0123456789', 'Germany', '2024-06-04 09:13:17', '2024-06-04 09:13:17', NULL),
(3, 'Nike', 'nike@gmail.com', '0456789321', 'USA', '2024-06-04 09:13:49', '2024-06-04 09:13:49', NULL),
(4, 'McQueen', 'mc@gmail.com', '0987657897', 'England', '2024-06-04 09:14:36', '2024-06-04 09:14:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_products`
--

CREATE TABLE `cart_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GIÀY', 0, '2024-06-04 09:07:49', '2024-06-04 09:07:49', NULL),
(2, 'Giày thể thao', 1, '2024-06-04 09:08:05', '2024-06-04 09:08:05', NULL),
(3, 'Giày Nữ', 1, '2024-06-04 09:08:23', '2024-06-04 09:08:23', NULL),
(4, 'ÁO', 0, '2024-06-04 09:08:53', '2024-06-04 09:10:50', NULL),
(5, 'Áo Nam', 4, '2024-06-04 09:09:07', '2024-06-04 09:11:04', NULL),
(6, 'VÁY', 0, '2024-06-04 09:09:48', '2024-06-04 10:11:34', '2024-06-04 10:11:34'),
(7, 'Áo Nữ', 4, '2024-06-04 09:10:06', '2024-06-04 09:10:06', NULL),
(8, 'Váy Nữ', 6, '2024-06-04 09:11:44', '2024-06-04 09:11:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `expiration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `value`, `expiration_date`, `created_at`, `updated_at`) VALUES
(1, 'GIAMGIA10', '%', 10, '2024-06-30 00:00:00', '2024-06-04 10:16:01', '2024-06-04 10:16:01'),
(2, 'FRIDAY50', '%', 50, '2024-06-30 00:16:00', '2024-06-04 10:16:30', '2024-06-04 10:16:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `phone_number`, `address`, `gender`, `birth_date`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL, '2024-06-04 10:14:23', '2024-06-04 10:14:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_03_161238_create_customers_table', 1),
(5, '2024_06_03_161313_create_categories_table', 1),
(6, '2024_06_03_161405_create_brands_table', 1),
(7, '2024_06_03_161431_create_products_table', 1),
(8, '2024_06_03_161536_create_product_images_table', 1),
(9, '2024_06_03_161622_create_roles_table', 1),
(10, '2024_06_03_161705_create_permissions_table', 1),
(11, '2024_06_03_161813_create_permission_role_table', 1),
(12, '2024_06_03_161837_create_role_user_table', 1),
(13, '2024_06_03_161907_create_counpons_table', 1),
(14, '2024_06_03_161948_create_carts_table', 1),
(15, '2024_06_03_162031_create_cart_products_table', 1),
(16, '2024_06_03_162107_create_order_statuses_table', 1),
(17, '2024_06_03_162131_create_orders_table', 1),
(18, '2024_06_03_162147_create_order_details_table', 1),
(19, '2024_06_04_074911_create_banners_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_tel` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `customer_name`, `customer_email`, `customer_tel`, `customer_address`, `total`, `total_price`, `payment_method`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(3, '503957', 2, 'Nguyễn Thái Bình Dương', 'natteam1998@gmail.com', '0395659769', 'Việt Nam', 9500.00, 4750.00, '1', 4750.00, 1, '2024-06-04 10:21:20', '2024-06-04 10:21:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Giày 1', '2000', 4, 8000.00, '2024-06-04 10:21:20', '2024-06-04 10:21:20'),
(2, 3, 4, 'Giày 3', '1500', 1, 1500.00, '2024-06-04 10:21:20', '2024-06-04 10:21:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đang chờ xử lý', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(2, 'Đã xác nhận', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(3, 'Đang giao hàng', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(4, 'Hoàn thành', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(5, 'Thất bại', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(6, 'Đã hủy', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(7, 'Đã hoàn tiền', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(8, 'Đang chờ thanh toán', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(9, 'Đã trả lại', '2024-06-04 09:07:00', '2024-06-04 09:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `group`, `created_at`, `updated_at`) VALUES
(1, 'create-user', 'Create user', 'User', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(2, 'update-user', 'Update user', 'User', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(3, 'show-user', 'Show user', 'User', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(4, 'delete-user', 'Delete user', 'User', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(5, 'create-role', 'Create Role', 'Role', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(6, 'update-role', 'Update Role', 'Role', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(7, 'show-role', 'Show Role', 'Role', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(8, 'delete-role', 'Delete Role', 'Role', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(9, 'create-category', 'Create category', 'category', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(10, 'update-category', 'Update category', 'category', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(11, 'show-category', 'Show category', 'category', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(12, 'delete-category', 'Delete category', 'category', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(13, 'create-product', 'Create product', 'product', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(14, 'update-product', 'Update product', 'product', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(15, 'show-product', 'Show product', 'product', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(16, 'delete-product', 'Delete product', 'product', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(17, 'create-coupon', 'Create coupon', 'coupon', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(18, 'update-coupon', 'Update coupon', 'coupon', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(19, 'show-coupon', 'Show coupon', 'coupon', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(20, 'delete-coupon', 'Delete coupon', 'coupon', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(21, 'list-order', 'list order', 'orders', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(22, 'update-order-status', 'Update order status', 'orders', '2024-06-04 09:07:00', '2024-06-04 09:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(2, 1, 2, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(3, 1, 3, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(4, 1, 4, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(5, 1, 5, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(6, 1, 6, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(7, 1, 7, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(8, 1, 8, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(9, 1, 9, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(10, 1, 10, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(11, 1, 11, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(12, 1, 12, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(13, 1, 13, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(14, 1, 14, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(15, 1, 15, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(16, 1, 16, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(17, 1, 17, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(18, 1, 18, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(19, 1, 19, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(20, 1, 20, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(21, 1, 21, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(22, 1, 22, '2024-06-04 09:07:00', '2024-06-04 09:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `longdescription` text DEFAULT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `uploaded` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `longdescription`, `price`, `quantity`, `category_id`, `brand_id`, `uploaded`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Giày 1', 'Giày chất lượng cao 100% chính hãng', '<p>M&Ocirc; TẢ SẢN PHẨM : Gi&agrave;y Thể Thao Nam MWC NATT- 5704</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Gi&agrave;y được thiết kế d&aacute;ng buộc d&acirc;y năng động,mặt gi&agrave;y vải dệt d&agrave;y dặn ,viền &eacute;p nhiệt phong c&aacute;ch hiện đại,m&agrave;u sắc khỏe khoắn.</p>\r\n	</li>\r\n	<li>\r\n	<p>Đặc biệt sản phẩm sử dụng chất liệu cao cấp c&oacute; độ bền tối ưu gi&uacute;p bạn thoải m&aacute;i trong mọi ho&agrave;n cảnh.</p>\r\n	</li>\r\n	<li>\r\n	<p>Gi&agrave;y tho&aacute;ng kh&iacute; cả mặt trong lẫn mặt ngo&agrave;i khiến người mang lu&ocirc;n cảm thấy dễ chịu d&ugrave; hoạt động trong thời gian d&agrave;i.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>CHI TIẾT SẢN PHẨM</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Chiều cao : khoảng 3cm</p>\r\n	</li>\r\n	<li>\r\n	<p>Chất liệu : vải dệt</p>\r\n	</li>\r\n	<li>\r\n	<p>Đế : &ecirc;m mềm, độ đ&agrave;n hồi tốt, chống trơn trượt</p>\r\n	</li>\r\n	<li>\r\n	<p>Kiểu d&aacute;ng : gi&agrave;y Sneaker cổ thấp</p>\r\n	</li>\r\n	<li>\r\n	<p>M&agrave;u sắc : X&aacute;m - Đen</p>\r\n	</li>\r\n	<li>\r\n	<p>Size : 39 - 40 - 41 - 42 - 43</p>\r\n	</li>\r\n	<li>\r\n	<p>Xuất xứ : Việt Nam&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Ch&uacute; &yacute; : K&iacute;ch thước so s&aacute;nh một c&aacute;ch cẩn thận,vui l&ograve;ng cho ph&eacute;p sai số 1-3 cm do đo lường thủ c&ocirc;ng</p>\r\n	</li>\r\n	<li>\r\n	<p>Do m&agrave;n h&igrave;nh hiển thị kh&aacute;c nhau v&agrave; &aacute;nh s&aacute;ng kh&aacute;c nhau, h&igrave;nh ảnh c&oacute; thể ch&ecirc;nh lệch 5-&gt;10% m&agrave;u sắc thật của sản phẩm.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cảm ơn bạn đ&atilde; th&ocirc;ng cảm.</p>\r\n	</li>\r\n</ul>', 2000, 100, 2, 2, 0, '2024-06-04 09:26:04', '2024-06-04 09:26:04', NULL),
(2, 'Giày 2', 'Giày chất lượng cao 100% chính hãng', '<p>M&Ocirc; TẢ SẢN PHẨM : Gi&agrave;y Thể Thao Nam MWC NATT- 5704</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Gi&agrave;y được thiết kế d&aacute;ng buộc d&acirc;y năng động,mặt gi&agrave;y vải dệt d&agrave;y dặn ,viền &eacute;p nhiệt phong c&aacute;ch hiện đại,m&agrave;u sắc khỏe khoắn.</p>\r\n	</li>\r\n	<li>\r\n	<p>Đặc biệt sản phẩm sử dụng chất liệu cao cấp c&oacute; độ bền tối ưu gi&uacute;p bạn thoải m&aacute;i trong mọi ho&agrave;n cảnh.</p>\r\n	</li>\r\n	<li>\r\n	<p>Gi&agrave;y tho&aacute;ng kh&iacute; cả mặt trong lẫn mặt ngo&agrave;i khiến người mang lu&ocirc;n cảm thấy dễ chịu d&ugrave; hoạt động trong thời gian d&agrave;i.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>CHI TIẾT SẢN PHẨM</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Chiều cao : khoảng 3cm</p>\r\n	</li>\r\n	<li>\r\n	<p>Chất liệu : vải dệt</p>\r\n	</li>\r\n	<li>\r\n	<p>Đế : &ecirc;m mềm, độ đ&agrave;n hồi tốt, chống trơn trượt</p>\r\n	</li>\r\n	<li>\r\n	<p>Kiểu d&aacute;ng : gi&agrave;y Sneaker cổ thấp</p>\r\n	</li>\r\n	<li>\r\n	<p>M&agrave;u sắc : X&aacute;m - Đen</p>\r\n	</li>\r\n	<li>\r\n	<p>Size : 39 - 40 - 41 - 42 - 43</p>\r\n	</li>\r\n	<li>\r\n	<p>Xuất xứ : Việt Nam&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Ch&uacute; &yacute; : K&iacute;ch thước so s&aacute;nh một c&aacute;ch cẩn thận,vui l&ograve;ng cho ph&eacute;p sai số 1-3 cm do đo lường thủ c&ocirc;ng</p>\r\n	</li>\r\n	<li>\r\n	<p>Do m&agrave;n h&igrave;nh hiển thị kh&aacute;c nhau v&agrave; &aacute;nh s&aacute;ng kh&aacute;c nhau, h&igrave;nh ảnh c&oacute; thể ch&ecirc;nh lệch 5-&gt;10% m&agrave;u sắc thật của sản phẩm.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cảm ơn bạn đ&atilde; th&ocirc;ng cảm.</p>\r\n	</li>\r\n</ul>', 3000, 100, 2, 2, 0, '2024-06-04 09:27:38', '2024-06-04 09:27:38', NULL),
(4, 'Giày 3', NULL, NULL, 1500, 15, 2, 3, 0, '2024-06-04 09:31:21', '2024-06-04 09:31:21', NULL),
(5, 'Giày 4', NULL, NULL, 2400, 150, 2, 3, 0, '2024-06-04 09:32:00', '2024-06-04 09:32:00', NULL),
(6, 'Giày 5', NULL, NULL, 2800, 120, 2, 3, 0, '2024-06-04 09:32:55', '2024-06-04 09:32:55', NULL),
(7, 'Giày 5', NULL, NULL, 2100, 120, 2, 2, 0, '2024-06-04 09:47:43', '2024-06-04 09:47:43', NULL),
(8, 'Áo 1', 'Áo mới 100%', NULL, 1200, 123, 7, 1, 0, '2024-06-04 09:48:36', '2024-06-04 09:48:36', NULL),
(9, 'Áo 12', NULL, NULL, 1250, 100, 5, 3, 0, '2024-06-04 10:09:24', '2024-06-04 10:09:24', NULL),
(10, 'Áo 7', 'Giày được thiết kế dáng buộc dây năng động,mặt giày vải dệt dày dặn ,viền ép nhiệt phong cách hiện đại', '<p>M&Ocirc; TẢ SẢN PHẨM : Gi&agrave;y Thể Thao Nam MWC NATT- 5704</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Gi&agrave;y được thiết kế d&aacute;ng buộc d&acirc;y năng động,mặt gi&agrave;y vải dệt d&agrave;y dặn ,viền &eacute;p nhiệt phong c&aacute;ch hiện đại,m&agrave;u sắc khỏe khoắn.</p>\r\n	</li>\r\n	<li>\r\n	<p>Đặc biệt sản phẩm sử dụng chất liệu cao cấp c&oacute; độ bền tối ưu gi&uacute;p bạn thoải m&aacute;i trong mọi ho&agrave;n cảnh.</p>\r\n	</li>\r\n	<li>\r\n	<p>Gi&agrave;y tho&aacute;ng kh&iacute; cả mặt trong lẫn mặt ngo&agrave;i khiến người mang lu&ocirc;n cảm thấy dễ chịu d&ugrave; hoạt động trong thời gian d&agrave;i.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>CHI TIẾT SẢN PHẨM</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Chiều cao : khoảng 3cm</p>\r\n	</li>\r\n	<li>\r\n	<p>Chất liệu : vải dệt</p>\r\n	</li>\r\n	<li>\r\n	<p>Đế : &ecirc;m mềm, độ đ&agrave;n hồi tốt, chống trơn trượt</p>\r\n	</li>\r\n	<li>\r\n	<p>Kiểu d&aacute;ng : gi&agrave;y Sneaker cổ thấp</p>\r\n	</li>\r\n	<li>\r\n	<p>M&agrave;u sắc : X&aacute;m - Đen</p>\r\n	</li>\r\n	<li>\r\n	<p>Size : 39 - 40 - 41 - 42 - 43</p>\r\n	</li>\r\n	<li>\r\n	<p>Xuất xứ : Việt Nam&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Ch&uacute; &yacute; : K&iacute;ch thước so s&aacute;nh một c&aacute;ch cẩn thận,vui l&ograve;ng cho ph&eacute;p sai số 1-3 cm do đo lường thủ c&ocirc;ng</p>\r\n	</li>\r\n	<li>\r\n	<p>Do m&agrave;n h&igrave;nh hiển thị kh&aacute;c nhau v&agrave; &aacute;nh s&aacute;ng kh&aacute;c nhau, h&igrave;nh ảnh c&oacute; thể ch&ecirc;nh lệch 5-&gt;10% m&agrave;u sắc thật của sản phẩm.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cảm ơn bạn đ&atilde; th&ocirc;ng cảm.</p>\r\n	</li>\r\n</ul>', 1400, 100, 5, 2, 0, '2024-06-04 10:11:23', '2024-06-04 10:11:23', NULL),
(11, 'Áo 13', NULL, NULL, 3000, 4, 7, 1, 0, '2024-06-04 10:12:27', '2024-06-04 10:12:27', NULL),
(12, 'Áo 52', NULL, NULL, 2000, 3, 7, 4, 0, '2024-06-04 10:12:55', '2024-06-04 10:12:55', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `url`, `product_id`, `image_type`, `created_at`, `updated_at`) VALUES
(1, 'image/product/1717518364.png', 1, 0, '2024-06-04 09:26:04', '2024-06-04 09:26:04'),
(2, 'image/product/1717518364_1.jpg', 1, 1, '2024-06-04 09:26:04', '2024-06-04 09:26:04'),
(3, 'image/product/1717518364_2.jpg', 1, 1, '2024-06-04 09:26:04', '2024-06-04 09:26:04'),
(4, 'image/product/1717518364_3.jpg', 1, 1, '2024-06-04 09:26:04', '2024-06-04 09:26:04'),
(5, 'image/product/1717518458.jpg', 2, 0, '2024-06-04 09:27:38', '2024-06-04 09:27:38'),
(6, 'image/product/1717518458_1.jpg', 2, 1, '2024-06-04 09:27:38', '2024-06-04 09:27:38'),
(7, 'image/product/1717518458_2.jpg', 2, 1, '2024-06-04 09:27:38', '2024-06-04 09:27:38'),
(8, 'image/product/1717518681.jpg', 4, 0, '2024-06-04 09:31:21', '2024-06-04 09:31:21'),
(9, 'image/product/1717518720.jpg', 5, 0, '2024-06-04 09:32:00', '2024-06-04 09:32:00'),
(10, 'image/product/1717518775.jpg', 6, 0, '2024-06-04 09:32:55', '2024-06-04 09:32:55'),
(11, 'image/product/1717519663.jpg', 7, 0, '2024-06-04 09:47:43', '2024-06-04 09:47:43'),
(12, 'image/product/1717519716.jpg', 8, 0, '2024-06-04 09:48:36', '2024-06-04 09:48:36'),
(13, 'image/product/1717520964.jpg', 9, 0, '2024-06-04 10:09:24', '2024-06-04 10:09:24'),
(14, 'image/product/1717521083.jpg', 10, 0, '2024-06-04 10:11:23', '2024-06-04 10:11:23'),
(15, 'image/product/1717521147.jpg', 11, 0, '2024-06-04 10:12:27', '2024-06-04 10:12:27'),
(16, 'image/product/1717521175.jpg', 12, 0, '2024-06-04 10:12:55', '2024-06-04 10:12:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `group`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super Admin', 'system', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(2, 'admin', 'Admin', 'system', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(3, 'employee', 'employee', 'system', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(4, 'manager', 'manager', 'system', '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(5, 'user', 'user', 'system', '2024-06-04 09:07:00', '2024-06-04 09:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(2, 2, 5, '2024-06-04 10:14:23', '2024-06-04 10:14:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jTf37cEcbxokyxIA7jKvRX9UCkNOKRydqqO72IH9', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0OToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2luZm9ybWF0aW9uL29yZGVycy1kZXRhaWwvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJzNld4RnRJQ0xIQWQyUTF4Wks1UUNOTHdOdWxFSEFxdTdOS0RpTkxlIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6ODoiZGlzY291bnQiO2k6MDtzOjY6ImNvdXBvbiI7czowOiIiO30=', 1717521748),
('vW8szcuxycetHf01fIK3VC2hUOtA6FNU809Cp0ZU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRTd4N3JXelRKNUF4b3FoNkIweHpYTzhhS1RrSUdPSnFlN1c5dW5rdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb3Vwb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1717521391);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$49FB1COB4mRz8rUPP0tp0.K6qDt1Y5Ep.OuSVsc/hSxFDBz7HPnNK', NULL, '2024-06-04 09:07:00', '2024-06-04 09:07:00'),
(2, 'Nguyễn Thái Bình Dương', 'natteam1998@gmail.com', NULL, '$2y$12$cXhIXY3XbgqLUNbCJqaoce8JQyv6rn/D2hNb4v5E..OUp0n4YFxp.', NULL, '2024-06-04 10:14:23', '2024-06-04 10:14:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_products_user_id_foreign` (`user_id`),
  ADD KEY `cart_products_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_status_foreign` (`status`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `cart_products_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_foreign` FOREIGN KEY (`status`) REFERENCES `order_statuses` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
