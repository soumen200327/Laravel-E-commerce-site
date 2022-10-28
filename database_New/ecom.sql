-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 12:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'simran@gmail.com', '$2y$10$JROaQ7BXeR9N.UJpQ82Eoepaly.mCCL/Pftfsorx/e3xgmprdV6Qm', '2021-01-15 21:27:18', '2022-09-17 13:29:26'),
(2, 'soumen@gmail.com', '$2y$10$tL8I67GUjW2vXpR/2C9AGOdl5NzAeVDJZTsmzTcpPJq6V2mMdxngO', '2022-09-12 15:05:09', '2022-09-17 13:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_home` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `is_home`, `created_at`, `updated_at`) VALUES
(1, 'Nike', '1613553930.jpg', 1, 1, '2021-02-17 03:55:30', '2021-02-17 03:55:30'),
(2, 'Adidas', '1613553941.jpg', 1, 1, '2021-02-17 03:55:41', '2021-02-17 03:55:41'),
(3, 'Peter England', '1613554893.jpg', 1, 1, '2021-02-17 04:11:33', '2021-02-17 04:11:33'),
(4, 'java', '1663400647.png', 1, 1, '2022-09-17 14:44:07', '2022-09-17 14:44:07'),
(5, 'Recat', '1663400666.png', 1, 1, '2022-09-17 14:44:26', '2022-09-17 14:44:26'),
(6, 'Css', '1663400703.png', 1, 1, '2022-09-17 14:44:48', '2022-09-17 14:45:03'),
(7, 'Jquary', '1663400723.png', 1, 1, '2022-09-17 14:45:23', '2022-09-17 14:45:23'),
(8, 'Wordpress', '1663400758.png', 1, 1, '2022-09-17 14:45:58', '2022-09-17 14:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('Reg','Not-Reg') NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_type`, `product_id`, `product_attr_id`, `qty`, `added_on`) VALUES
(71, 759042827, 'Not-Reg', 2, 3, 1, '2022-09-30 06:25:26'),
(83, 963593744, 'Not-Reg', 1, 1, 1, '2022-10-05 06:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `parent_category_id`, `category_image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'man', 0, '1613552454.jpg', 1, 1, '2021-02-17 03:30:54', '2022-10-17 13:46:49'),
(2, 'Woman', 'woman', 0, '1613553509.jpg', 1, 1, '2021-02-17 03:31:24', '2022-10-17 13:48:12'),
(3, 'Kids', 'kids', 0, '1613552512.jpg', 1, 1, '2021-02-17 03:31:52', '2021-02-17 03:31:52'),
(4, 'Bag', 'bag', 2, '1613553407.jpg', 1, 1, '2021-02-17 03:46:07', '2021-02-22 02:42:42'),
(5, 'Shoes', 'shoes', 3, NULL, 0, 1, '2021-02-17 04:24:40', '2021-02-17 04:24:40'),
(6, 'Casual', 'Casual', 1, NULL, 0, 1, '2022-09-18 21:17:37', '2022-09-18 22:57:22'),
(7, 'Digital', 'Digital', 0, NULL, 0, 1, '2022-09-18 21:18:46', '2022-09-18 22:56:40'),
(8, 'Sports', 'Sports', 0, NULL, 0, 1, '2022-09-18 21:19:55', '2022-09-18 22:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', 1, '2021-01-25 21:12:11', '2021-01-28 05:15:28'),
(2, 'Red', 1, '2021-01-25 21:12:22', '2021-01-28 04:02:42'),
(3, 'White', 1, '2021-02-17 04:01:35', '2021-02-17 04:01:35'),
(4, 'Cream', 1, '2021-02-24 00:57:35', '2021-02-24 00:57:35'),
(5, 'Green', 1, '2021-02-24 00:57:45', '2021-02-24 00:57:45'),
(6, 'Purple', 1, '2021-02-24 00:57:57', '2021-02-24 00:57:57'),
(7, 'Blue', 1, '2021-02-24 01:00:15', '2021-02-24 01:00:15'),
(8, 'Yellow', 1, '2021-02-24 01:06:42', '2021-02-24 01:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Value','Per') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int(11) NOT NULL,
  `is_one_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `type`, `min_order_amt`, `is_one_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jan Coupon', 'Jan2021', '140', 'Value', 0, 0, 1, '2021-01-20 04:43:32', '2022-09-17 14:48:02'),
(4, 'New Coupon', 'New', '15', 'Per', 500, 0, 1, '2021-02-05 02:32:37', '2021-02-05 02:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_verify` int(11) NOT NULL,
  `rand_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forget_password` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `zip`, `company`, `gstin`, `status`, `is_verify`, `rand_id`, `created_at`, `updated_at`, `forget_password`) VALUES
(1, 'Soumen Sarkar', 'soumen@gmail.com', '9999999999', 'soumen12345', 'Joypur,krishnagar,nadia', 'West Bangla', 'West Bangla', '741102', 'My Company Name', 'ABCDEGGST', 0, 0, '', '2021-02-08 08:14:02', '2022-09-17 14:10:59', NULL),
(2, 'Simran Singh', 'simran@gmail.com', '9090909090', 'simran12345', 'kolkata,uttarpara', 'West bangal', 'West bangal', 'N/A', 'MY company', 'ABCE#$GST', 1, 0, '', '2022-09-12 15:05:09', '2022-09-12 15:05:09', NULL),
(65, 'soumen sarkar', 'soumensarkar2003278@gmail.com', '8910987185', '1234567890', 'Joypur,krishnagar,nadia', 'West Bangla', 'West Bangla', '741102', NULL, 'ABCE#$GST', 1, 1, ' ', '2022-09-29 16:46:06', '2022-09-29 16:46:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_txt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `image`, `btn_txt`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(5, '1663393544.jpg', NULL, NULL, 1, '2022-09-17 12:45:44', '2022-09-17 12:45:44'),
(6, '1663394128.jpg', NULL, NULL, 1, '2022-09-17 12:55:28', '2022-09-17 12:55:28'),
(8, '1663394150.jpg', NULL, NULL, 1, '2022-09-17 12:55:50', '2022-09-17 12:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_01_15_211334_create_admins_table', 1),
(4, '2021_01_15_215552_create_categories_table', 2),
(5, '2021_01_20_095632_create_coupons_table', 3),
(10, '2021_01_21_115714_create_ajaxes_table', 4),
(12, '2021_01_26_021550_create_sizes_table', 5),
(13, '2021_01_26_023140_create_colors_table', 6),
(14, '2021_01_28_104722_create_products_table', 7),
(15, '2021_02_03_114909_create_brands_table', 8),
(16, '2021_02_05_082218_create_taxes_table', 9),
(17, '2021_02_08_081113_create_customers_table', 10),
(18, '2021_02_17_200040_create_home_banners_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(500) NOT NULL,
  `coupon_code` varchar(55) DEFAULT NULL,
  `coupon_value` int(11) DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `payment_type` enum('COD','Gateway') NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `total_amount` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `email`, `mobile`, `address`, `city`, `state`, `pincode`, `coupon_code`, `coupon_value`, `order_status`, `payment_type`, `payment_status`, `payment_id`, `total_amount`, `added_on`) VALUES
(19, 65, 'soumen sarkar', 'soumensarkar2003278@gmail.com', '8910987185', 'Joypur,krishnagar,nadia', 'West Bangla', 'West Bangla', '741102', NULL, 0, 2, 'Gateway', 'Success', NULL, 2747, '2022-10-05 04:23:01'),
(20, 65, 'soumen sarkar', 'soumensarkar2003278@gmail.com', '8910987185', 'Joypur,krishnagar,nadia', 'West Bangla', 'West Bangla', '741102', NULL, 0, 1, 'COD', 'Fail', NULL, 749, '2022-10-05 04:32:53'),
(21, 65, 'soumen sarkar', 'soumensarkar2003278@gmail.com', '8910987185', 'Joypur,krishnagar,nadia', 'West Bangla', 'West Bangla', '741102', NULL, 0, 1, 'COD', 'Pending', NULL, 799, '2022-10-16 11:23:05'),
(22, 65, 'soumen sarkar', 'soumensarkar2003278@gmail.com', '8910987185', 'Joypur,krishnagar,nadia', 'West Bangla', 'West Bangla', '741102', NULL, 0, 1, 'COD', 'Pending', NULL, 799, '2022-10-16 02:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `products_attr_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `orders_id`, `product_id`, `products_attr_id`, `price`, `qty`) VALUES
(19, 19, 1, 1, 799, 1),
(20, 19, 1, 2, 749, 1),
(21, 19, 2, 3, 1199, 1),
(22, 20, 1, 6, 749, 1),
(23, 21, 1, 1, 799, 1),
(24, 22, 1, 1, 799, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`) VALUES
(1, 'Placed'),
(2, 'On The Way'),
(3, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technical_specification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uses` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `is_promo` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_discounted` int(11) NOT NULL,
  `is_tranding` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `slug`, `brand`, `model`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warranty`, `lead_time`, `tax_id`, `is_promo`, `is_featured`, `is_discounted`, `is_tranding`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Polo T Shirt', '4997922202.png', 'polo-t-shirt', '1', 'Polo T Shirt - Nike', '<p>100% Original Products</p>\r\n\r\n<p>Free Delivery on order above Rs.&nbsp;799</p>\r\n\r\n<p>Pay on delivery might be available</p>\r\n\r\n<p>Easy 30 days returns and exchanges</p>\r\n\r\n<p>Try &amp; Buy might be available</p>', NULL, 'Polo T Shirt, Polo T Shirt - Nike', NULL, 'T Shirt For Man', 'Easy 30 days returns and exchanges', 'Same day delivery', 1, 0, 1, 1, 1, 1, '2021-02-17 04:00:59', '2022-10-16 21:42:28'),
(2, 1, 'Peter England Blue Shirt', '1613555081.png', 'peter-england-blue-shirt', '3', 'Peter England Blue Shirt', '<p>Make an impression in this blue check shirt, tailored in Super Slim Fit from Peter England Jeans by Peter England.</p>', '<p>Brand : Peter England<br />\r\nSubbrand : Peter England Jeans<br />\r\nFit : Super Slim Fit<br />\r\nPattern : Check<br />\r\nOccasion : Casual<br />\r\nColor : Blue<br />\r\nMaterial : 100% Cotton<br />\r\nSleeves : Full Sleeves<br />\r\nCuffs : Regular Cuff<br />\r\nCollar : Regular Collar<br />\r\nProduct Type : Shirt<br />\r\nBrand Fit : Super Slim Fit</p>', 'Brand : Peter England\r\nSubbrand : Peter England Jeans\r\nFit : Super Slim Fit\r\nPattern : Check\r\nOccasion : Casual\r\nColor : Blue\r\nMaterial : 100% Cotton\r\nSleeves : Full Sleeves\r\nCuffs : Regular Cuff\r\nCollar : Regular Collar\r\nProduct Type : Shirt\r\nBrand Fit : Super Slim Fit', NULL, 'N/A', 'N/A', 'Delivery in 3 days', 1, 0, 1, 0, 1, 1, '2021-02-17 04:14:41', '2022-09-30 11:43:21'),
(3, 2, 'Black Printed Sweatshirt', '1613555334.jpg', 'women-black-printed-as-sweatshirt', '1', 'Women Black Printed AS W NK ICNCLSH MIDLAYER Sweatshirt', '<p>100% Original Products</p>\r\n\r\n<p>Free Delivery on order above Rs.&nbsp;799</p>\r\n\r\n<p>Pay on delivery might be available</p>\r\n\r\n<p>Easy 15 days returns and exchanges</p>\r\n\r\n<p>Try &amp; Buy might be available</p>', '<p>Black printed sweatshirt<br />\r\nhas a mock collar<br />\r\nlong sleeves<br />\r\nhalf zipper closure<br />\r\nstraight hem</p>', 'N/A', NULL, 'N/A', '6 months against manufacturing defects (not valid on products with more than 20% discount)', NULL, 1, 0, 0, 0, 1, 1, '2021-02-17 04:18:54', '2022-09-30 11:43:24'),
(4, 3, 'Boy\'s Thrum K Running Shoes', '1613555948.jpg', 'boys-thrum-running-shoes', '2', 'Adidas Boy\'s Thrum K Running Shoes', '<p>Closure: Lace-Up<br />\r\nShoe Width: Regular<br />\r\nOuter Material: Synthetic<br />\r\nClosure Type: Lace-Up<br />\r\nToe Style: Round Toe<br />\r\nWarranty Type: Manufacturer &amp; Seller<br />\r\nWarranty Description: 90 days</p>', '<p><strong>Package Dimensions</strong> : 26.8 x 18.4 x 10.8 cm; 470 Grams<br />\r\n<strong>Date First Available</strong> : 18 December 2019<br />\r\n<strong>Manufacturer </strong>: ADIDAS<br />\r\n<strong>ASIN </strong>: B082WTQMLF<br />\r\n<strong>Item model number :</strong> CM6326<br />\r\n<strong>Department </strong>: Boys<br />\r\n<strong>Manufacturer </strong>: ADIDAS<br />\r\n<strong>Item Weight</strong> : 470 g<br />\r\n<strong>Package Dimensions : 26.8 x 18.4 x 10.8 cm; 470 Grams<br />\r\nDate First Available : 18 December 2019<br />\r\nManufacturer : ADIDAS<br />\r\nASIN : B082WTQMLF<br />\r\nItem model number : CM6326<br />\r\nDepartment : Boys<br />\r\nManufacturer : ADIDAS<br />\r\nItem Weight : 470 g<br />\r\nGeneric Name : Running Shoes</strong> : Running Shoes</p>', 'N/A', '<p>N/A</p>', 'N/A', '90 days', NULL, 1, 0, 1, 0, 0, 1, '2021-02-17 04:29:08', '2021-02-23 02:18:33'),
(5, 1, 'Shirt', '1663507128.jpg', 'Shirt12344', '1', 'Shirt600', '<p>No</p>', '<p>THIS SHIRT IS Comfortable And Very Shine</p>', 'No', '<p>No</p>', '500', '7 Days', '3-4 Days', 2, 1, 1, 1, 1, 1, '2022-09-18 20:18:48', '2022-09-18 20:18:48'),
(6, 1, 'Casual Shirt', '1664000277.jpg', 'Regular Fit Checkered Spread Collar Casual Shirt123', '2', '111', '<ul>\r\n	<li>Additional Flat INR 5000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 100000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 75000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 50000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 30000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>10% Instant Discount up to INR 2000 on SBI Credit Card EMI Trxn. Min purchase value INR 5000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>10% Instant Discount up to INR 1750 on SBI Credit Card Non-EMI Trxn. Min purchase value INR 5000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n</ul>', '<ul>\r\n	<li>Additional Flat INR 5000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 100000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 75000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 50000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 30000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>10% Instant Discount up to INR 2000 on SBI Credit Card EMI Trxn. Min purchase value INR 5000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>10% Instant Discount up to INR 1750 on SBI Credit Card Non-EMI Trxn. Min purchase value INR 5000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n</ul>', 'Additional Flat INR 5000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 100000 Here\'s how\r\nAdditional Flat INR 1000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 75000 Here\'s how\r\nAdditional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 50000 Here\'s how\r\nAdditional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 30000 Here\'s how\r\n10% Instant Discount up to INR 2000 on SBI Credit Card EMI Trxn. Min purchase value INR 5000 Here\'s how\r\n10% Instant Discount up to INR 1750 on SBI Credit Card Non-EMI Trxn. Min purchase value INR 5000 Here\'s how', '<ul>\r\n	<li>Additional Flat INR 5000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 100000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 75000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 50000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>Additional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 30000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>10% Instant Discount up to INR 2000 on SBI Credit Card EMI Trxn. Min purchase value INR 5000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n	<li>10% Instant Discount up to INR 1750 on SBI Credit Card Non-EMI Trxn. Min purchase value INR 5000&nbsp;<a href=\"javascript:void(0)\">Here&#39;s how</a></li>\r\n</ul>', 'Additional Flat INR 5000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 100000 Here\'s how\r\nAdditional Flat INR 1000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 75000 Here\'s how\r\nAdditional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 50000 Here\'s how\r\nAdditional Flat INR 1500 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 30000 Here\'s how\r\n10% Instant Discount up to INR 2000 on SBI Credit Card EMI Trxn. Min purchase value INR 5000 Here\'s how\r\n10% Instant Discount up to INR 1750 on SBI Credit Card Non-EMI Trxn. Min purchase value INR 5000 Here\'s how', 'Additional Flat INR 5000 Instant Discount on SBI Credit Card Trxn. Min purchase value INR 100000 Here\'s', '2-5day', 1, 0, 1, 0, 0, 1, '2022-09-24 13:05:15', '2022-09-24 13:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `products_attr`
--

CREATE TABLE `products_attr` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `attr_image` varchar(255) DEFAULT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_attr`
--

INSERT INTO `products_attr` (`id`, `products_id`, `sku`, `attr_image`, `mrp`, `price`, `qty`, `size_id`, `color_id`) VALUES
(1, 1, '111', '705130315.jpg', 999, 799, 5, 2, 1),
(2, 1, '112', '509937030.jpg', 999, 749, 3, 1, 7),
(3, 2, '124', '499793402.png', 1499, 1199, 3, 1, 1),
(4, 3, '116', '608075258.jpg', 349, 241, 18, 1, 1),
(5, 4, '121', '115102277.jpg', 900, 400, 5, 0, 0),
(6, 1, '113', '216831743.jpg', 999, 749, 23, 3, 8),
(7, 1, '114', '436707592.jpg', 999, 749, 31, 2, 5),
(8, 5, '4567', '974925312.jpg', 500, 399, 500, 2, 3),
(9, 6, 'Fit Casual Shirt', '535585170.jpg', 2000, 609, 12, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `products_id`, `images`) VALUES
(1, 1, '334424773.jpg'),
(5, 1, '546654238.jpg'),
(6, 1, '476621397.jpg'),
(7, 5, '702741840.jpg'),
(8, 6, '706532656.jpg'),
(9, 6, '898021424.jpg'),
(10, 6, '926216734.jpg'),
(11, 6, '533474386.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XXL', 1, '2021-01-25 20:56:46', '2021-01-28 05:15:24'),
(2, 'XL', 1, '2021-02-24 00:58:04', '2021-02-24 00:58:04'),
(3, 'L', 1, '2021-02-24 00:58:08', '2021-02-24 00:58:08'),
(4, 'M', 1, '2021-02-24 00:58:13', '2021-02-24 00:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `taxs`
--

CREATE TABLE `taxs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxs`
--

INSERT INTO `taxs` (`id`, `tax_desc`, `tax_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GST 12%', '12', 1, '2021-02-05 03:05:43', '2021-02-05 03:05:55'),
(2, 'GST 17%', '17', 1, '2022-09-18 19:59:25', '2022-09-18 19:59:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attr`
--
ALTER TABLE `products_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxs`
--
ALTER TABLE `taxs`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_attr`
--
ALTER TABLE `products_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taxs`
--
ALTER TABLE `taxs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
