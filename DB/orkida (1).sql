-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 11:31 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orkida`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `home_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy_en` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `desc_ar`, `desc_en`, `vision_ar`, `vision_en`, `goal_ar`, `goal_en`, `video`, `home_title_ar`, `home_description_ar`, `privacy_ar`, `policy_ar`, `created_at`, `updated_at`, `home_title_en`, `home_description_en`, `privacy_en`, `policy_en`) VALUES
(1, 'cc', 'aaa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, 'title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ads1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `ads1`, `ads2`, `ads3`, `created_at`, `updated_at`) VALUES
(1, 'linkl', 'link2', 'link3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_types`
--

CREATE TABLE `article_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_types`
--

INSERT INTO `article_types` (`id`, `category`, `is_active`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'nnn', 0, 'nn', NULL, NULL),
(2, 'jjj', 1, 'jjj', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewers` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `image`, `meta_title`, `image_alt`, `description_ar`, `sort`, `is_active`, `slug`, `viewers`, `created_at`, `updated_at`, `meta_description`, `article_id`, `keywords`) VALUES
(9, ';;;;k', 'uploads/articles/thumb/1581125852bc556651bdd8432c081c2352e18ddeb4image.png', 'kkk', 'kk', '<p>kkk</p>', 1, 1, 'kkkk', NULL, NULL, NULL, 'kk', 1, ''),
(10, 'kkkk', 'uploads/articles/thumb/1581179346b55b229fe15a0b8429a4af4e3625985fimage.png', 'kk', 'kkk', '<p><img alt=\"\" src=\"http://localhost/orkida/public/storage/uploads/cpanel_1581181264.png\" style=\"height:483px; width:494px\" />kkk<img alt=\"\" src=\"http://localhost/orkida/public/storage/uploads/Capture_1581179306.png\" style=\"height:10px; width:50px\" /></p>', 2, 1, 'kkk', NULL, NULL, NULL, 'kkk', 1, ''),
(11, 'kkk', 'uploads/articles/thumb/1582319939b36adac6cec4df7d096fc121d69591e8image.png', 'kkk', 'kkk', '<p>kkk</p>', 3, 1, 'kk', NULL, NULL, NULL, 'kkk', 2, 'kkk');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'مكافحة الأفات', 'Pest Control', NULL, NULL),
(2, 'حدمات التنظيف', 'Our services', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_valuables`
--

CREATE TABLE `company_valuables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `question_category_id` bigint(20) UNSIGNED NOT NULL,
  `is_common` tinyint(1) NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `description_ar`, `description_en`, `created_at`, `updated_at`, `question_ar`, `question_en`, `is_active`, `question_category_id`, `is_common`, `slug_ar`, `slug_en`) VALUES
(1, '<p>jjjj<img alt=\"\" src=\"http://localhost/orkida/uploads/contents/1_1581282615.png\" style=\"height:75px; width:50px\" /></p>', '<p><img alt=\"\" src=\"http://localhost/orkida/uploads/contents/Admin_1581282638.png\" style=\"height:50px; width:50px\" /></p>', NULL, NULL, 'dfgjjj', 'jjjj', 0, 3, 0, '', ''),
(2, '<p>kkkk</p>', '<p>hhh</p>', NULL, NULL, 'kkk', 'hhh', 1, 3, 0, '', ''),
(3, '<p>jjj</p>', '<p>kkk</p>', NULL, NULL, 'jjj', 'kkk', 1, 3, 1, 'jjj-ssd', 'kkn-ikijh');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_benefit` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `is_benefit`, `created_at`, `updated_at`) VALUES
(1, 'ghjkml,', 1, NULL, NULL),
(2, 'ghjkml,', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `service_id`, `blog_id`, `created_at`, `updated_at`, `tag`) VALUES
(51, 11, NULL, '2020-02-07 22:48:39', '2020-02-07 22:48:39', 'تت'),
(52, 10, NULL, '2020-02-07 23:37:09', '2020-02-07 23:37:09', 'ننن'),
(53, NULL, 9, '2020-02-07 23:37:32', '2020-02-07 23:37:32', 'k'),
(54, 12, NULL, '2020-02-08 14:12:37', '2020-02-08 14:12:37', 'jjj'),
(55, 13, NULL, '2020-02-08 14:27:11', '2020-02-08 14:27:11', 'jj'),
(57, NULL, 10, '2020-02-08 15:03:43', '2020-02-08 15:03:43', 'kkk'),
(58, 14, NULL, '2020-02-18 20:10:30', '2020-02-18 20:10:30', 'kkk'),
(59, NULL, 11, '2020-02-21 19:18:59', '2020-02-21 19:18:59', 'kkk'),
(61, 15, NULL, '2020-02-21 19:27:34', '2020-02-21 19:27:34', 'JJJJ'),
(63, 16, NULL, '2020-02-21 20:17:08', '2020-02-21 20:17:08', 'jjj');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2020_01_17_123358_create_settings_table', 1),
(25, '2020_01_17_123845_create_site_phones_table', 1),
(26, '2020_01_17_124026_create_categories_table', 1),
(27, '2020_01_17_124155_create_services_table', 1),
(28, '2020_01_17_134522_create_service_types_table', 1),
(29, '2020_01_17_134813_create_blogs_table', 1),
(30, '2020_01_17_135205_create_meta_tags_table', 1),
(31, '2020_01_17_135947_create_pest_libraries_table', 1),
(32, '2020_01_17_140835_add_slug_field_pest_libraries_table', 1),
(33, '2020_01_17_140945_create_ads_table', 1),
(34, '2020_01_17_141048_create_about_us_table', 1),
(35, '2020_01_17_141350_create_company_valuables_table', 1),
(36, '2020_01_17_141733_create_sliders_table', 1),
(37, '2020_01_17_141830_create_faqs_table', 1),
(38, '2020_01_17_141921_create_messages_table', 1),
(39, '2020_01_17_142403_create_orders_table', 1),
(40, '2020_01_18_163925_edit_settings_table', 2),
(41, '2020_01_18_165307_increase_lat_lng_length_table', 3),
(42, '2020_01_19_204333_edit_about_us_table', 4),
(43, '2020_01_19_204936_edit_home_description_ar_about_us_table', 5),
(44, '2020_01_19_205424_edit_policy_privacy_about_us_table', 6),
(45, '2020_01_20_203107_edit_services_table', 7),
(46, '2020_01_20_205817_edit_services_add_default_values_table', 8),
(47, '2020_01_20_234535_remove_tag_ar_en_table', 9),
(48, '2020_01_22_194205_edit_viewers_field_accept_null', 10),
(49, '2020_01_22_202915_edit_home_order_field_pests_table', 11),
(50, '2020_02_07_181250_edit_services_table', 12),
(51, '2020_02_07_182637_edit_blogs_table', 13),
(52, '2020_02_07_184152_remove_slug_en_blogs_table', 14),
(53, '2020_02_07_224858_create_article_types_table', 15),
(54, '2020_02_07_232724_change_relation_table', 16),
(55, '2020_02_07_235633_add_sub_service_column_services_table', 17),
(56, '2020_02_08_011348_edit_sliders_table', 18),
(57, '2020_02_08_162216_rename_description_field_blogs_table', 19),
(58, '2020_02_08_190407_rename_description_about_table', 20),
(59, '2020_02_08_190952_rename_description_company_valuables_table', 21),
(60, '2020_02_08_192240_edit_faqs_columns_table', 22),
(61, '2020_02_08_205525_rename_faqs_columns_table', 23),
(62, '2020_02_08_213921_rename_pest_libraries_columns_table', 24),
(63, '2020_02_09_184843_create_question_categories_table', 25),
(65, '2020_02_09_185154_edit_faqs_structure_table', 26),
(66, '2020_02_09_204623_edit_question_categories_structure_table', 27),
(67, '2020_02_09_211651_add_sub_pest_pest_libraries_table', 28),
(69, '2020_02_10_210621_add_is_common_field_faqs_table', 29),
(71, '2020_02_18_205221_create_pest_bites_table', 30),
(72, '2020_02_21_203844_add_keywords_services_table', 31),
(73, '2020_02_21_204414_add_keywords_sbogs_tbale', 31),
(74, '2020_02_21_204437_add_keywords_sp_est_librariestatble', 31),
(75, '2020_02_21_205140_add_knew_column__st_lbites_bale', 32),
(77, '2020_02_21_220340_add_meta_tag_description_services_table', 33),
(78, '2020_02_21_221826_add_meta_tag_description_pest_libraries_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `topic_title`, `message`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'dddd', '010135555', 'sdfh', 'sjk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pest_bites`
--

CREATE TABLE `pest_bites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pest_type_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pest_type_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insect_bites_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `insect_bites_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sting_appearance_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sting_appearance_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pest_bites`
--

INSERT INTO `pest_bites` (`id`, `image`, `pest_type_ar`, `pest_type_en`, `insect_bites_ar`, `insect_bites_en`, `notes_ar`, `notes_en`, `created_at`, `updated_at`, `sting_appearance_ar`, `sting_appearance_en`) VALUES
(1, 'uploads/pest_bites/158231971276e7d2b08c81b3c597e1af120a7a290fimage.png', 'kjkj', 'bb', 'jkjjk', 'bbb', '<p>jkjkj</p>', '<p>bbb</p>', NULL, NULL, 'kjj', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `pest_libraries`
--

CREATE TABLE `pest_libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `home_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_pest` int(11) DEFAULT NULL,
  `keywords_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pest_libraries`
--

INSERT INTO `pest_libraries` (`id`, `name_ar`, `name_en`, `image`, `meta_description_ar`, `image_alt`, `description_ar`, `description_en`, `sort`, `is_active`, `home_order`, `created_at`, `updated_at`, `slug_ar`, `slug_en`, `meta_title_ar`, `sub_pest`, `keywords_ar`, `keywords_en`, `meta_title_en`, `meta_description_en`) VALUES
(1, 'pest1', 'pest1', 'uploads/pest_libraries/158119927108c8ba7d0c7b973ef4ecc1b37644fdd8image.png', 'jjj', 'jjhjj', '<p>pest1</p>', '<p>pest1</p>', 1, 0, 0, NULL, NULL, 'nnn-kkkk', 'mmm-ikii', 'jjj', NULL, '', '', '', ''),
(2, 'pest2', 'pest2', 'uploads/pest_libraries/1581283329c760702ccbef18ab8a13e95443fa1c76image.png', 'jjj', 'jjhjj', '<p>pest2</p>', '<p>pest2</p>', 2, 1, 0, NULL, NULL, 'nnn-kkkk', 'mmm-ikii', 'jjj', 1, '', '', '', ''),
(3, 'll', 'mm', 'uploads/pest_libraries/158232063832351abc5bc6a8ae22328a34c4df4d5fimage.png', 'lllmmm', 'mm', '<p>lll</p>', '<p>mmm</p>', 3, 1, 0, NULL, NULL, 'll', 'mmm', 'm', NULL, 'lll', 'mm', '', ''),
(4, 'aa', 'cc', 'uploads/pest_libraries/1582323874912efbef6aa11099a2cea339dc203382image.png', 'aa', 'aa', '<p>aa</p>', '<p>cc</p>', 4, 1, 0, NULL, NULL, 'aa', 'cc', 'aa', NULL, 'aa', 'cc', 'cc', 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `question_categories`
--

CREATE TABLE `question_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_categories`
--

INSERT INTO `question_categories` (`id`, `category_ar`, `created_at`, `updated_at`, `category_en`) VALUES
(3, 'akk', NULL, NULL, 'bmmmb');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `home_order` int(11) NOT NULL DEFAULT '0',
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_service` int(11) DEFAULT NULL,
  `keywords_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_ar`, `name_en`, `image`, `meta_title_ar`, `meta_description_ar`, `category_id`, `phone`, `sort`, `is_active`, `home_order`, `slug_ar`, `slug_en`, `created_at`, `updated_at`, `description_ar`, `description_en`, `sub_service`, `keywords_ar`, `keywords_en`, `meta_title_en`, `meta_description_en`) VALUES
(10, 'ممم', 'ممم', 'uploads/services/15811258290022c7d4f20897ed44eab8137f01936fimage.png', 'ننن', 'ننن', 1, '5555', 1, 1, 0, 'ممم', 'مم', NULL, NULL, '<p>مممم</p>', '<p>ممم</p>', NULL, '', '', '', ''),
(11, 'bb', 'ننن', 'uploads/services/1581120772b467892c584b14a6347d08105b2d3732image.png', 'تنتن', 'تتت', 1, '4545', 2, 1, 0, 'ممم', 'نمن', NULL, NULL, '<p>ممم</p>', '<p>ننن</p>', NULL, '', '', '', ''),
(12, 'kkkk', 'kkk', 'uploads/services/15811783568dd0b1f9f00a327b4fed1c324c74a942image.png', 'jjj', 'jj', 1, '56566', 3, 1, 0, 'kjjj', 'nkjknjk', NULL, NULL, '<p><img alt=\"\" src=\"http://localhost/orkida/public/storage/uploads/Admin_1581178330.png\" style=\"height:60px; width:60px\" /></p>', '<h3><img alt=\"\" src=\"http://localhost/orkida/public/storage/uploads/1_1581178297.png\" style=\"height:75px; width:50px\" /></h3>', NULL, '', '', '', ''),
(13, 'بب', 'kkk', 'uploads/services/15811792319eae7bf441c9a8dceb1671c26e961171image.png', 'jj', 'jjj', 1, '8488', 4, 1, 0, 'kkk-kkk', 'nn', NULL, NULL, '<p>sfefe<img alt=\"\" src=\"http://localhost/orkida/public/storage/uploads/Admin_1581179193.png\" style=\"height:60px; width:60px\" /></p>', '<p>knjkjn<img alt=\"\" src=\"http://localhost/orkida/public/storage/uploads/logo_1581179219.png\" style=\"height:66px; width:225px\" /></p>', NULL, '', '', '', ''),
(14, 'lll', 'mmm', 'uploads/services/1582063830e49866f4aa778efa3a3e3078d3dbbd0dimage.png', 'kkk', 'kkk', 1, '77878', 5, 1, 0, 'lll', 'ss', NULL, NULL, '<p>llll</p>', '<p>mmmm<img alt=\"\" src=\"http://localhost/orkida/uploads/contents/cpanel_1582063820.png\" style=\"height:196px; width:200px\" /></p>', NULL, '', '', '', ''),
(15, 'kkk', 'MKNJK', 'uploads/services/1582320308e23b2f86723e8858ca0cdcb972e2c3ecimage.png', 'JJJH', 'JHJH', 1, '555', 6, 1, 0, 'KKKK', 'KJKKJ', NULL, NULL, '<p>KKKK</p>', '<p>JKJK</p>', NULL, 'nnnn', 'kl', '', ''),
(16, 'kkk', 'vvv', 'uploads/services/1582323402ffd6f0dd68977ac844ee03936b71b7adimage.png', 'kk', 'kk', 1, '85585', 7, 1, 0, 'kk', 'vvvv', NULL, NULL, '<p>kkk</p>', '<p>vvv</p>', NULL, 'kk', 'vvvv', 'vvv', 'vvv');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `youtube_url`, `facebook_url`, `twitter_url`, `linkedin_url`, `instagram_url`, `pinterest_url`, `logo`, `location_ar`, `location_en`, `site_email`, `created_at`, `updated_at`, `latitude`, `longitude`) VALUES
(1, 'https://www.youtube.com/channel/UC-cm0G4jidDR_AdLUtLXmxg', 'https://www.facebook.com/orkidapest', 'https://twitter.com/OrkidaPest', 'https://www.linkedin.com/in/orkidapest', 'https://www.instagram.com/orkidapest', 'https://www.pinterest.com/orkidapest/pins', 'uploads/logo/1581199570dfbb54c0964d835caa8d8b7119b71090image.png', 'مدينة جدة ، شارع الأمام الشافعي', 'Olaya St, Al Olaya, Riyadh 12251, Saudi Arabia', 'Info@ORkidapest.com', NULL, NULL, 21.576366558705, 39.193434585498);

-- --------------------------------------------------------

--
-- Table structure for table `site_phones`
--

CREATE TABLE `site_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_phones`
--

INSERT INTO `site_phones` (`id`, `phone`, `created_at`, `updated_at`) VALUES
(4, '01054548545', '2020-01-18 12:26:10', '2020-01-18 12:26:10'),
(5, '01013696675', '2020-01-18 12:30:12', '2020-01-18 12:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_ar`, `title_en`, `image`, `image_alt`, `created_at`, `updated_at`) VALUES
(4, 'kk', 'kkk', 'uploads/sliders/1581125758860b3f5bd265ea0be9ed7fffe80b5d57image.png', 'k', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Editor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mahmoud', 'mahmoud@orkida.com', NULL, '$2y$10$q1PvNPB3kEQfd9mNnnJji.KU27PZT.bpaBjhl6qf.x3KG.Ny7yfmu', 'Admin', NULL, '2020-01-17 02:21:35', '2020-01-18 16:22:20'),
(2, 'mahmoud', 'alaa@orkida.com', NULL, '$2y$10$kirjIyT2tODNh0byEKONd.lW31v7GOFduoUOLtdich7iWzODbQU6K', 'Admin', NULL, '2020-01-17 02:21:35', '2020-01-22 18:55:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_types`
--
ALTER TABLE `article_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_article_id_foreign` (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_valuables`
--
ALTER TABLE `company_valuables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_question_category_id_foreign` (`question_category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meta_tags_service_id_foreign` (`service_id`),
  ADD KEY `meta_tags_blog_id_foreign` (`blog_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pest_bites`
--
ALTER TABLE `pest_bites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pest_libraries`
--
ALTER TABLE `pest_libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_categories`
--
ALTER TABLE `question_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_types_service_id_foreign` (`service_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_phones`
--
ALTER TABLE `site_phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article_types`
--
ALTER TABLE `article_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_valuables`
--
ALTER TABLE `company_valuables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pest_bites`
--
ALTER TABLE `pest_bites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pest_libraries`
--
ALTER TABLE `pest_libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question_categories`
--
ALTER TABLE `question_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_phones`
--
ALTER TABLE `site_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `article_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_question_category_id_foreign` FOREIGN KEY (`question_category_id`) REFERENCES `question_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD CONSTRAINT `meta_tags_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meta_tags_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_types`
--
ALTER TABLE `service_types`
  ADD CONSTRAINT `service_types_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
