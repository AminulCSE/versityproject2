-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2021 at 05:43 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `varsityproject2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'public/frontend/images/banner/1691868275940888.JPG', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'public/frontend/images/blog/1690851942890958.jpg', 'বাসায় ছোট বাগান করাবাসায় ছোট', 'বাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করা', 1, 1, '2021-02-05 04:47:50', '2021-02-05 04:47:50'),
(6, 'public/frontend/images/blog/1690913241849862.jpg', 'বাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায়', 'বাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করাবাসায় ছোট বাগান করা', 1, 1, '2021-02-05 21:02:10', '2021-02-05 21:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ফলের চারা', 'ফলের-চারা', 1, NULL, NULL),
(2, 'ফুলের চারা', 'ফুলের-চারা', 1, NULL, NULL),
(3, 'সবজি চারা', 'সবজি-চারা', 1, NULL, NULL),
(7, 'অন্যান্য', 'অন্যান্য', 1, NULL, NULL),
(5, 'ঔষধি চারা', 'ঔষধি-চারা', 1, NULL, NULL),
(31, 'মসলা চারা', 'মসলা-চারা', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Aminul islam peal', 'pealrana63@gmail.com', '01787377982', '3', '45sdfsdf', '2021-02-19 05:39:26', '2021-02-19 05:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

DROP TABLE IF EXISTS `logos`;
CREATE TABLE IF NOT EXISTS `logos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'public/frontend/images/logo/1692122614912948.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_10_004950_create_categories_table', 1),
(5, '2020_12_10_020017_create_sliders_table', 1),
(6, '2020_12_11_062658_create_products_table', 1),
(7, '2020_12_13_165945_create_sub_categories_table', 1),
(8, '2020_12_14_011711_create_banners_table', 1),
(9, '2021_01_03_020715_create_blogs_table', 1),
(15, '2021_01_20_030413_create_orders_table', 4),
(11, '2021_01_15_051823_create_logos_table', 2),
(12, '2021_01_17_023707_create_shippings_table', 3),
(13, '2021_01_17_023933_create_payments_table', 3),
(14, '2021_01_17_024111_create_order_details_table', 3),
(16, '2021_01_26_023921_create_wishlists_table', 5),
(17, '2021_01_29_033241_create_our_services_table', 6),
(18, '2018_06_30_113500_create_comments_table', 7),
(19, '2021_02_14_014811_create_social_media_table', 7),
(20, '2021_02_16_131228_create_contacts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_no` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `verify_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending and 1=approved',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `user_id`, `verify_code`, `created_at`, `updated_at`, `status`, `name`, `email`, `phone`, `amount`, `address`, `transaction_id`, `currency`) VALUES
(230, 3, 1, 0, NULL, NULL, 'verified', 'Aminul islam peal', 'giftzone121@gmail.com', '01787377982', 25, 'Kishoreganj, Gochihata, Danapatoly, শহর Kishoreganj, জিপ কোড 2331', '608ce6ef31f78', 'BDT'),
(231, 4, 1, 0, NULL, NULL, 'verified', 'Aminul islam peal', 'giftzone121@gmail.com', '01787377982', 800, 'Kishoreganj, Gochihata, Danapatoly, শহর Kishoreganj, জিপ কোড 2331', '608d3b851b90f', 'BDT'),
(229, 2, 10, 0, NULL, NULL, 'verified', 'Aminul islam peal', 'pealrana63@gmail.com', '01787377982', 1550, 'Kishoreganj, Gochihata, Danapatoly, শহর Kishoreganj, জিপ কোড 2331', '608cdff1ca73d', 'BDT'),
(228, 1, 10, 0, NULL, NULL, 'verified', 'Aminul islam peal', 'pealrana63@gmail.com', '01787377982', 1200, 'Kishoreganj, Gochihata, Danapatoly, শহর Kishoreganj, জিপ কোড 2331', '6047a8ce4b939', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `created_at`, `updated_at`, `order_id`, `product_id`, `size`, `qty`) VALUES
(167, '2021-04-30 23:28:19', '2021-04-30 23:28:19', 230, 10, '250 inch', 1),
(168, '2021-05-01 05:29:15', '2021-05-01 05:29:15', 231, 9, '২-৬ ফিট', 2),
(166, '2021-04-30 22:58:29', '2021-04-30 22:58:29', 229, 11, '২-৫ ফিট', 3),
(165, '2021-04-30 22:58:29', '2021-04-30 22:58:29', 229, 9, '২-৬ ফিট', 2),
(164, '2021-03-09 10:56:58', '2021-03-09 10:56:58', 228, 9, '২-৬ ফিট', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_infos`
--

DROP TABLE IF EXISTS `order_infos`;
CREATE TABLE IF NOT EXISTS `order_infos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'user_id=customer_id',
  `shipping_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending and 1=approved',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

DROP TABLE IF EXISTS `our_services`;
CREATE TABLE IF NOT EXISTS `our_services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, '\"নগরধারা\"  সকল রকম চারা গাছ পাওয়ার সবচেয়ে বিশ্বস্ত প্রতিষ্ঠান।', 'আমরা সকলেই জানি, সুন্দর পরিবেশের জন্য গাছের গুরুত্ব অপরিসীম। তাই আমাদের চারপাশে সুন্দর পরিবেশ তৈরি করতে অবশ্যই বেশি বেশি গাছ লাগাতে হবে। \r\n\r\nআর এই গাছ গুলো যদি হয় ফুল & ফলের চারা তাহলে কেমন হয় বলুন ত?\r\n\r\nএটা কিন্তু খুবি ভাল হয়। কারণ, একটি ফুল & ফল গাছ যেমন অক্সিজেন,  ছায়া, সূভাস দিয়ে পরিবেশ সুন্দর রাখে ঠিক তেমনি ফল দিয়ে পরিবারের খাদ্য চাহিদা মেটায়। এমনকি ফল হল আত্নত্রিপ্তির অন্যতম কারন।\r\n\r\nতাছাড়া সবজি, ঔষধি, বনজ চারা গুলি দিয়েও আমরা আমাদের পরিকল্পনা অনুযায়ি আমাদের বাগান সাজাতে পারি।\r\nতৈরি করতে পারি নিজ নিজ বাগান বাড়ি যা থাকবে প্রায় সকল রকম গাছে পরিপূর্ণ।\r\n\r\nএকটি বাগান তৈরি করতে শুধু যে ভূমিয় প্রয়োজন এমন কিন্তু না। আমরা যারা শহরে বাস করি তারা চাইলে খুব সহযেই কিন্তু বাসার ছাদে আমাদের প্রিয় বাগান গড়ে তুলতে পারি। যা নিজ বাসার সৌন্দর্য বাড়ানোর পাশাপাশি শহরের পরিবেশ ঠিক রাখতেও বড় ভূমিকা পালন করবে।\r\n\r\nআর এই বাগান প্রস্তুত করার শুরু থেকে শেষ পর্যন্ত সব সময় পাশে পাবেন \"নগরধারা\" কে।\r\n\r\nপরিচালনায় আছি আমরা তিন বন্ধু পিয়াল, রানা & শাহিন।\r\n\r\n আমাদের কাছে আপনারা পাচ্ছেন প্রায় সকল রকম ফল, ফুল, বনজ, ঔষধি, সবজি চারা।  এর প্রত্যেকটি চারা গুনগত মান সম্পুর্ন।  আমরা সব সময় কম দামে সেরা চারা গুলোই গ্রাহকদের প্রদান করে থাকি। \r\n\r\nআমাদের স্লুগান হচ্ছে\r\n🌱🌱গাছ লাগান\r\n          নগর বাচান🌱🌱', 'public/frontend/images/ourservice/1691868315495585.jpg', 1, '2021-01-29 10:47:03', '2021-01-29 10:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `created_at`, `updated_at`, `payment_method`, `transaction_no`) VALUES
(89, '2021-02-28 20:37:00', '2021-02-28 20:37:00', 'Bkash', 'sd45sfgvdfhgdf');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_slug`, `product_code`, `category_id`, `price`, `description`, `size`, `image1`, `image2`, `image3`, `status`, `created_at`, `updated_at`) VALUES
(9, 'মাল্টার চারা', 'মাল্টার_চারা', '611903899', 1, 400, 'কয়েক বছর আগেও লাভজনক মাল্টার আবাদ নিয়ে শঙ্কায় ছিলেন ঝিনাইদহের কৃষকরা। এখন সে শঙ্কা কাটিয়ে লাভের মুখ দেখতে শুরু করেছেন তারা। কম জায়গায় এবং অল্প পুঁজিতে লাভ বেশি হওয়ায় মাল্টার বাণিজ্যিক আবাদের দিকে ঝুঁকছে বেকার যুবকরা।\r\n\r\nকৃষি বিভাগ জানিয়েছে, জেলায় এ বছর ৬৩ হেক্টর জমিতে মাল্টার আবাদ হয়েছে। আগামীতে মাল্টা চাষের পরিধি বাড়াতে তারা কৃষকদের উদ্বুদ্ধ করার পাশাপাশি নিয়মিত পরামর্শ দিয়ে যাচ্ছেন।', '২-৬ ফিট', 'public/frontend/images/product/1691869789858091.jpg', NULL, NULL, 1, NULL, NULL),
(8, 'আপেল চারা', 'আপেল_চারা', '611763245', 1, 300, 'আপেল এক প্রকারের ফল। এটি রোসাসি (Rosaceae) পরিবারের ম্যালিয়াস ডমেস্টিকা (Malus domestica ) প্রজাতিভুক্ত। আপেল মূলত তার মিষ্টি স্বাদের জন্য জনপ্রিয়। সারা পৃথিবীব্যাপী আপেলের চাষ হয়ে থাকে এবং সবচেয়ে বেশি চাষকৃত প্রজাতি হচ্ছে জেনাস ম্যলুস (genus Malus)১ । মধ্য এশিয়াকে আপেলের উৎপত্তিস্থল মনেকরা হয়, যেখানে এখনও তার পূর্বতন বুনো প্রজাতি ম্যলুস সিভেরসিকে (Malus sieversii) দেখতে পাওয়া যায়। হাজার হাজার বছর ধরে এশিয়া এবং ইউরোপ জুড়ে আপেলের চাষ হয়ে আসছে এবং ইউরোপীয় বসতি স্থাপনকারীদের মাধ্যমে লাতিন আমেরিকায় এর পদার্পণ হয়। অনেক সংস্কৃতিতে আপেলের ধর্মীয় এবং পৌরাণিক তাৎপর্য আছে, এদের মধ্যে নর্স, গ্রীক এবং ইউরোপীয়ান খ্রিস্টীয় ঐতিহ্য অন্যতম। সাধারণত আপেলের জাতগুলি মূলের কলমের মাধ্যমে তৈরি করা হয়, যা ফলস্বরূপ গাছের আকার নিয়ন্ত্রণ করে। আপেলের প্রায় ৭,৫০০ টির বেশি পরিচিত জাত রয়েছে', '২-৫ ফিট', 'public/frontend/images/product/1691869433971976.jpg', NULL, NULL, 1, NULL, NULL),
(10, 'লেবু', 'লেবু', '611904056', 1, 25, 'অনেকেই স্বপ্ন দেখছেন কিভাবে #উদ্যোক্তা হবেন, কি নিয়ে কাজ করবেন??\r\nতাদের স্বপ্ন পুরণের লক্ষে আমি আমার বাস্তব অভিজ্ঞতা আপনাদের কাছে তুলে ধরছি। \r\n✅আমি প্রথমে ছোট স্বপ্ন নিয়ে #সীডলেস চায়না3 ১২ মাসি লেবুর একটা বাগান করি।\r\nকলম মাটিতে লাগানোর ২ সপ্তাহের মধ্যে নতুন ডাল পালা আসা শুরু করল, তার মধ্য দিয়ে আমার স্বপ্ন ও বাস্তবে রুপ নিতে থাকল। দ্রুত গাছ বাড়তে থাকায় আমি প্রায় ৪ মাসে ফুল এবং ৬ মাস পর থেকেই #লেবু পাওয়া শুরু করেছিলাম। ৬ মাসে প্রায় ৯৫% গাছে ফল চলে আসল এবং যার ফলন দিন দিন বাড়তে থাকল। বাজারে প্রচুর চাহিদা থাকায় ভাল দাম ও পেলাম। একই ভাবে শুধু আমি না আমার সখিপুরে  আর কিছু মানুষ আছেন যারা সীডলেস লেবু চাষ করে নিজেদের ভাগ্য পরিবর্তন করেছেন।\r\nআর এই সফলতার গল্প #বাংলাভিশন সহ বেশ কিছু টেলিভিশন চ্যানেলের মাধ্যমে সারা বাংলাদেশে ছড়িয়ে পরে।\r\n✅বেকার তরুণদের জন্য সীডলেস #চায়না3 ১২ মাসি লেবুর চাষ কেন উত্তম❓\r\n✅সীডলেস চায়না3 ১২ মাসি লেবুর বৈশিষ্ট কি❓\r\n⏩একটি গাছে একই সময়ে ফুল, খাওয়ার অর্ধ উপযুক্ত, উপযুক্ত, পাকা ফল থাকবে।\r\n⏩৪ থেকে ৬ মাস এর মধ্যে লেবু পাওয়া যায়।\r\n⏩সীডলেস লেবুতে বিচি থাকেনা।\r\n⏩দেশি লেবুর থেকে সীডলেস লেবু আকারে একটু বড়।\r\n⏩এক থোকায় ৫ থেকে ১০ টি লেবু ধরে।\r\n⏩গাছ ভর্তি লেবু থাকে।\r\n⏩সারা বছর লেবু ধরে।\r\n⏩সুন্দর ঘ্রাণ ও প্রচুর রস হয় তাই বাজারে চাহিদা বেশি।\r\n⏩১০ থেকে ১৫ বছর পর্যন্ত ফলন পাওয়া যায়।\r\n⏩প্রজেক্ট খরচ খুবি কম। ১০০ চারার ছোট বাগানের জন্য ৩ থেকে ৪ হাজার টাকা যথেষ্ট।\r\n✅✅ইনকামের মূল উৎস হল লেবু এবং কলম চারা বিক্রয়।\r\n✅চারার জন্য যোগাযোগঃ\r\n👮মোঃ আব্দুল্লাহ আল শাহিন\r\n#চারার_দামঃ মাত্র ২৫ টাকা পিস', '250 inch', 'public/frontend/images/product/1691870010613950.JPG', NULL, NULL, 1, '2021-02-16 18:00:00', NULL),
(11, 'থাই পেয়ারা', 'থাই_পেয়ারা', '613149636', 1, 250, 'ছবিতে #থাই_পেয়ারা।\r\n#ছাদ_বাগানের জন্য খুবই উপযোগী।\r\n#পেয়ারা আমাদের দেশে একটি অতি পরিচিত ও জনপ্রিয় ফল। এটি একটি দ্রুত বর্ধণশীল ১২ মাসি ফল। আমাদের দেশে কম বেশী সব অঞ্চলে এ ফলের চাষ করা হয়। পেয়ারার মধ্যে থাই পেয়ারা খেতে খুবই মজাদার ও সুস্বাদু।\r\nপেয়ারার পুষ্টিগুণঃ\r\nপেয়ারা ভিটামিন ´সি´ সমৃদ্ধ একটি ফল। এ ছাড়া পেয়ারাতে প্রচুর পরিমান ভিটামিন-বি ও প্রয়োজনীয় খনিজ পদার্থ যেমন- ক্যালশিয়াম ও আয়রণ রয়েছে। পেয়ারা কাঁচা ও পাকা উভয় অবস্থায় খাওয়া যায়। এছাড়া পেয়ারায় যথেষ্ট পরিমাণে পেকটিন থাকায় এ থেকে সহজেই জ্যাম, জেলী, চাটনী ইত্যাদি মুখরোচক খাবার তৈরী করা যায়।এছাড়া, পিয়ারা পাতার মধ্যে ও রয়েছে নানা রকম পুষ্টিগুন।\r\nউপরে উল্লেক্ষিত লক্ষ্য উদেশ্য কে সামনে রেখে Nagardhara-নগরধারা মাধ্যমে আমরা কাজ করে যাচ্ছি বিভিন্ন ধরনের ফলের চারা গাছ নিয়ে।\r\nযেমন,আম,লিচু,পেয়ারা,আতা,চেরি,লটকন,,মাল্টা,নারকেল,চালতা,আমড়া,সফেদা ইত্যাদি।স্বপ্ন দেখি আমাদের  হাত ধরে  এই   ইট পাথরের শহড়ের প্রতিটি ছাদ ,বসত বাড়ির আঙ্গিনা ফুলে ফলে, পাখির কল কাকলিতে মুখরিত হয়ে উঠবে।\r\n✅\" গাছ লাগান, নগর বাঁচান\"\r\n  নগরধারা।\r\n✅মূল্যঃ ২৫০৳ পিস (ফল সহ)', '২-৫ ফিট', 'public/frontend/images/product/1691870303525773.jpg', NULL, NULL, 1, '2021-02-12 17:07:15', NULL),
(12, 'চায়না থ্রি লিচু', 'চায়না_থ্রি_লিচু', '613161600', 1, 350, 'চায়না ৩ (ইংরেজি: China 3) লিচু ফলের একটি প্রকারভেদ হল চায়না ৩।[১][২] বিজ্ঞানীরা নানা জাতের লিচু উদ্ভাবন করেছেন, তার মধ্যে \'চায়না ৩\' জাত রয়েছে।[৩][৪][৫] চায়না-৩ লিচুটি বারি লিচু-৩ নামেও পরিচিত। এটি একটি নাবী (সবশেষে পাওয়া যায়) জাতের লিচু এবং লিচুর সকল জাতের মধ্যে আকার, কোষের গড়ন এবং স্বাদের বিচারে বর্তমানে এটিই বাংলাদেশের সবচেয়ে উন্নত জাত।[৬][৭] দেশের উত্তারাঞ্চলে এ জাতটি চাষের জন্য বিশেষ উপযোগী।', '২-৬ ফিট', 'public/frontend/images/product/1691870520429474.jpg', NULL, NULL, 1, '2021-02-12 20:26:39', NULL),
(13, 'গাইবান্ধা কৃষি বিভাগের উপ পরিচালক', 'গাইবান্ধা_কৃষি_বিভাগের_উপ_পরিচালক', '613161644', 3, 1500, 'আজাদুল ইসলাম বলেন, এক বিঘা জমিতে প্রায় ১০০ লেবু গাছ রয়েছে। এটি থেকে বছরজুড়েই ফল আসে। তবে মে-জুন মাসে এর ভরা মৌসুম। এ দুই মাসে প্রচুর পরিমাণ লেবু উৎপাদন হয়। গড়ে বার্ষিক ৬০ থেকে ৬৫ হাজার টাকা লেবু বিক্রি করা হচ্ছে । খরচ হয় প্রায় ১২ থেকে ১৫ হাজার টাকা।', '23 inch', 'public/frontend/images/product/1691522583003770.jpg', NULL, NULL, 1, '2021-02-12 20:27:23', NULL),
(14, 'ভিয়েতনাম নারকেল', 'ভিয়েতনাম_নারকেল', '613161717', 1, 1000, 'নারিকেল বাংলাদেশের অন্যতম প্রধান অর্থকরী ফসল। ব্যবহার বৈচিত্র্যে এটি একটি অতুলনীয় উদ্ভিদ। তবে আমাদের দেশে বর্তমানে যে প্রচলিত নারিকেলগুলো রয়েছে তা থেকে ফলন পেতে স্বাভাবিকভাবে ৭ থেকে ৮ বছর সময় লাগে। তাই নারিকেলের ফলন যাতে তাড়াতাড়ি পাওয়া যায় তাই নতুন এ ‘ডিজে সম্পূর্ণ ডোয়ার্ফ (খাটো)’ জাতের নারিকেল আবাদের ব্যাপারে জোর দেয়া হচ্ছে। নতুন জাতের এ নারিকেল গাছ থেকে যথাযথ পরিচর্যা করলে ২৮ মাসেই ফলন আসবে। ফলনের পরিমাণ আমাদের দেশের জাতের থেকে প্রায় তিনগুণ। উপযুক্ত পরিচর্যা করলে প্রতি বছর প্রায় ২৫০টি নারিকেল পাওয়া যায়। উন্নত এ জাতের সম্প্রসারণ করা গেলে আমাদের দেশের নারিকেলের উৎপাদন প্রায় ৩ গুণ বৃদ্ধি পাবে।', '২-৬ ফিট', 'public/frontend/images/product/1691522660340159.jpg', NULL, NULL, 1, '2021-02-12 20:28:37', NULL),
(15, '১২ মাসি আমড়া', '১২_মাসি_আমড়া', '613401831', 1, 300, 'আমড়া ইংরেজিতে Hog Plum একপ্রকার ফল যা মাঝারি আকারের পর্ণমোচী বৃক্ষে ফলে। বৈজ্ঞানিক নাম Spondias pinnaata Kurz \r\nফল ভিটামিন-সি-সমৃদ্ধ (প্রতি ১০০ গ্রাম আমড়ায় ২০ মিলিগ্রাম পাওয়া যায়)।\r\nকোষ্ঠকাঠিন্য দূর করে ওজন কমাতে সহায়তা করে।\r\nরক্তের কোলেস্টেরলের মাত্রা কমায়।\r\nঅ্যান্টি-অক্সিডেন্টজাতীয় উপাদান থাকায় আমড়া বার্ধক্যকে প্রতিহত করে।\r\nআমড়াতে প্রচুর আয়রন থাকায় রক্তসল্পতা দূর করতে বেশ কার্যকর।\r\nআমড়া খেলে মুখের অরুচিভাব দূর হয়।', '২-৬ ফিট', 'public/frontend/images/product/1691870678969017.jpg', NULL, NULL, 1, '2021-02-15 15:10:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `name`, `email`, `mobile_no`, `address`, `created_at`, `updated_at`) VALUES
(66, 10, 'Aminul islam peal', 'pealrana63@gmail.com', '01785266455', 'asfdasdf', '2021-04-01 22:44:36', '2021-04-01 22:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'চারাগাছ উৎপাদন থেকে শুরু করে', 'চারাগাছ উৎপাদন থেকে শুরু করে চারাগাছ উৎপাদন থেকে শুরু করে', 'public/frontend/images/slider/1687918739797176.jpg', '1', '2021-01-03 19:45:50', '2021-01-03 19:45:50'),
(2, 'বাসায় ছোট বাগান করা প্রবণতা', 'বাসায় ছোট বাগান করা প্রবণতা বাড়ছে বলে জানিয়েছে রয়্যাল হর্টিকালচারাল সোসাইটি (আরএইচএস), যা ২০১৮ সালের তুলনায় ২০১৯ সালের শেষ ছয়মাসে প্রায় ৬০শতাংশ বেড়েছে।', 'public/frontend/images/slider/1687918783030567.jpg', '1', '2021-01-03 19:46:31', '2021-01-03 19:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

DROP TABLE IF EXISTS `social_media`;
CREATE TABLE IF NOT EXISTS `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'আম', 1, NULL, NULL),
(3, 1, 'জাম', 1, NULL, NULL),
(4, 1, 'কমলা', 1, NULL, NULL),
(5, 1, 'মালটা', 1, NULL, NULL),
(6, 1, 'চায়না 3 লিচু', 1, NULL, NULL),
(7, 2, 'গোলাপ', 1, NULL, NULL),
(8, 2, 'রেইন লিলিঁ', 1, NULL, NULL),
(9, 2, 'জবা', 1, NULL, NULL),
(10, 2, 'বেলী', 1, NULL, NULL),
(11, 1, 'আমড়া', 1, NULL, NULL),
(12, 1, 'সফেদা', 1, NULL, NULL),
(13, 1, 'সুইট লেমন', 1, NULL, NULL),
(14, 1, 'আপেল কুল', 1, NULL, NULL),
(15, 1, 'বল সুন্দরী কুল', 1, NULL, NULL),
(16, 1, 'কাশমেরি কুল', 1, NULL, NULL),
(17, 1, 'আঙ্গুর', 1, NULL, NULL),
(18, 1, 'চেরী ফল', 1, NULL, NULL),
(19, 1, 'শরিফা', 1, NULL, NULL),
(20, 1, 'থাই পেয়ারা', 1, NULL, NULL),
(21, 1, 'পলি পেয়ারা', 1, NULL, NULL),
(22, 1, 'মাধবী পেয়ারা', 1, NULL, NULL),
(23, 1, 'সীডলেস লেবু', 1, NULL, NULL),
(24, 1, 'আমরুপালী', 1, NULL, NULL),
(25, 1, 'বেন্যানা মেঙ্গ', 1, NULL, NULL),
(26, 1, 'কাটিমন বারোমাসি আম', 1, NULL, NULL),
(27, 1, 'ডালিম', 1, NULL, NULL),
(28, 1, 'থাই জামবুরা', 1, NULL, NULL),
(29, 1, 'লটকন', 1, NULL, NULL),
(30, 1, 'কামরাঙ্গা', 1, NULL, NULL),
(31, 1, 'পেপেঁ', 1, NULL, NULL),
(32, 1, 'ড্রাগন', 1, NULL, NULL),
(33, 1, 'অরবরই', 1, NULL, NULL),
(34, 31, 'তেজপাতা', 1, NULL, NULL),
(35, 31, 'দারচিনি', 1, NULL, NULL),
(36, 31, 'এলাচ', 1, NULL, NULL),
(37, 3, 'লাউ', 1, NULL, NULL),
(38, 3, 'মিষ্টি কুমড়া', 1, NULL, NULL),
(39, 3, 'কুমড়া', 1, NULL, NULL),
(40, 3, 'সিম', 1, NULL, NULL),
(41, 3, 'টমেটো', 1, NULL, NULL),
(42, 3, 'কপি', 1, NULL, NULL),
(43, 3, 'বেগুন', 1, NULL, NULL),
(44, 3, 'করলা', 1, NULL, NULL),
(45, 3, 'ঝিঙ্গা', 1, NULL, NULL),
(46, 3, 'ঢেড়স', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `image`, `email_verified_at`, `is_admin`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'public/frontend/images/user/1688555102960385.jpg', '2021-02-15 18:00:00', 1, '$2y$10$TIyuPxlUI2VczhZuyTiNWOv3.zXEbK0Q7Pb6j1cS7YIKSOcAW8HRa', 1, NULL, '2021-01-03 19:40:50', '2021-01-10 20:09:49'),
(13, 'test', 'test@gmail.com', NULL, NULL, NULL, 0, '$2y$10$iOoNj8lLPzcfgmelYcW6cuGC4o/slqJdJFomoH7tI.7fxEXxpBleG', 0, NULL, '2021-02-19 05:44:44', '2021-02-19 05:44:44'),
(4, 'Rakib মিয়া', 'rakib@gmail.com', '01787377982', 'public/frontend/images/user/1690005276406783.png', '2021-02-08 18:00:00', 0, '$2y$10$Kmf3Ma90vypTg6Lb6k/5Uu7MOQ6roHoypRG9TZ/xn.PRER/4whtKO', 1, NULL, '2021-01-04 11:16:33', '2021-01-16 20:14:56'),
(9, 'Khan', 'khan@gmail.com', NULL, 'public/frontend/images/user/1691492307709003.jpg', NULL, 0, '$2y$10$fBHjJ9aunpY1uBo5..5R2.AuRb3UmP9du20z0VsYP7fA20dZldzTy', 1, NULL, '2021-02-12 06:24:53', '2021-02-12 06:24:53'),
(5, 'Mofiz uddin', 'mofiz@gmail.com', '01584825245', 'public/frontend/images/user/1689693024191701.png', NULL, 0, '$2y$10$qyjvLBLckkSWhRl43vqY2eByCwlHFEB/oRr1fvK1aczy9SwS49sxa', 1, NULL, '2021-01-23 09:46:53', '2021-01-23 09:46:53'),
(10, 'Aminul islam peal', 'pealrana63@gmail.com', '0176546565465', 'public/frontend/images/user/1691547086113492.jpg', '2021-02-19 06:56:16', 0, '$2y$10$cUGqAgdAw7m3Yw1bHXIMfOATPCACPu9ZNMOMndq49zFWh3XI/c/FG', 1, 'Zy4JCPH6opoOcPo2OxqZyuAQW9jkhI7Z6O1dqLFIJNW9jklr1OgS5vllp1JP', '2021-02-12 20:56:26', '2021-04-30 22:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(40, 10, 10, NULL, NULL),
(37, 10, 11, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
