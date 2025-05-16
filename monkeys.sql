-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 07:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monkeys`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_gallery_images`
--

CREATE TABLE `about_us_gallery_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us_generals`
--

CREATE TABLE `about_us_generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_area_title` varchar(255) DEFAULT NULL,
  `gallery_area_subtitle` text DEFAULT NULL,
  `gallery_third_image` varchar(255) DEFAULT NULL,
  `gallery_second_image` varchar(255) DEFAULT NULL,
  `gallery_first_image` varchar(255) DEFAULT NULL,
  `our_history_title` varchar(255) DEFAULT NULL,
  `our_history_subtitle` text DEFAULT NULL,
  `upgrade_skill_logo` varchar(255) DEFAULT NULL,
  `upgrade_skill_title` varchar(255) DEFAULT NULL,
  `upgrade_skill_subtitle` text DEFAULT NULL,
  `upgrade_skill_button_name` varchar(255) DEFAULT NULL,
  `team_member_logo` varchar(255) DEFAULT NULL,
  `team_member_title` varchar(255) DEFAULT NULL,
  `team_member_subtitle` text DEFAULT NULL,
  `instructor_support_title` varchar(255) DEFAULT NULL,
  `instructor_support_subtitle` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_generals`
--

INSERT INTO `about_us_generals` (`id`, `gallery_area_title`, `gallery_area_subtitle`, `gallery_third_image`, `gallery_second_image`, `gallery_first_image`, `our_history_title`, `our_history_subtitle`, `upgrade_skill_logo`, `upgrade_skill_title`, `upgrade_skill_subtitle`, `upgrade_skill_button_name`, `team_member_logo`, `team_member_title`, `team_member_subtitle`, `instructor_support_title`, `instructor_support_subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Mere Tranquil Existence, That I Neglect My Talents Should', 'Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot, Which Was Created For The Bliss Of Souls Like Mine. I Am So Happy, My Dear Friend, So Absorbed In The Exquisite Sense Of Mere Tranquil Existence', 'uploads_demo/gallery/3.jpg', 'uploads_demo/gallery/2.jpg', 'uploads_demo/gallery/1.jpg', 'Our History', 'Possession Of My Entire Soul, Like These Sweet Mornings Of Spring Which I Enjoy With My Whole Heart. I Am Alone, And Charm Of Existence In This Spot Which', 'uploads_demo/about_us_general/upgrade.jpg', 'Upgrade Your Skills Today For Upgrading Your Life.', 'Noticed by me when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence stalks, and grow familiar with the countless', 'Find Your Course', 'uploads_demo/about_us_general/team-members-heading-img.png', 'Our Passionate Team Members', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', 'Quality Course, Instructor And Support', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 5, 1550.00, '2024-11-20 02:08:40', '2024-11-22 00:18:32'),
(2, 10, 300.00, '2024-11-21 23:11:37', '2024-11-21 23:11:37'),
(3, 11, 330.00, '2024-11-22 00:14:43', '2024-11-22 00:18:32'),
(4, 14, 300.00, '2024-11-22 00:18:32', '2024-11-22 00:18:32'),
(5, 6, 630.00, '2024-11-27 22:13:54', '2024-11-27 22:31:51'),
(6, 17, 300.00, '2024-11-27 22:31:51', '2024-11-27 22:31:51'),
(7, 3, 630.00, '2024-11-28 01:20:54', '2024-11-28 01:26:07'),
(8, 20, 300.00, '2024-11-28 01:26:07', '2024-11-28 01:26:07'),
(9, 7, 630.00, '2024-11-28 01:34:16', '2024-11-28 01:37:51'),
(10, 22, 300.00, '2024-11-28 01:37:51', '2024-11-28 01:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account_name`, `account_number`, `status`, `created_at`, `updated_at`) VALUES
(5, 'State Bank Of India', 'Aasif Ahmed', '987654321', 1, '2025-01-13 01:30:34', '2025-01-13 01:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `qrcode_path` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user_id`, `bank_name`, `account_number`, `ifsc_code`, `qrcode_path`, `created_at`, `updated_at`) VALUES
(7, NULL, NULL, NULL, NULL, 'Commons_QR_code.png', '2024-04-13 23:44:41', '2024-04-13 23:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `page_banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title1`, `title2`, `title3`, `button`, `link`, `image`, `page_banner`, `created_at`, `updated_at`) VALUES
(7, 'Descubre todo un nuevo mundo de diversión', 'No hay nada más emocionante que pasar', 'un día entero en nuestro increíble parque acuático.', 'Sobre Nosotros', 'https://bikebros.net/productbyCategory/7', 'uploads/banners/1737959031-VScjoOqXpk.jpg', NULL, '2024-08-15 06:10:17', '2025-01-27 00:53:51'),
(11, 'Un fin de semana perfecto para niños y adultos', 'Ofrecemos experiencias increíbles y creamos', 'aventuras seguras para ti al mismo tiempo.', 'Sobre Nosotros', 'http://superfastsattaresult.in/', 'uploads/banners/1737959117-DjYeeXGwgT.jpg', NULL, '2024-08-15 13:05:16', '2025-01-27 00:55:17'),
(12, 'Una experiencia que recordarás para siempre', 'Una gran variedad de toboganes de agua, desde los más empinados hasta los más suaves,', 'para todos los gustos. ¡Diversión garantizada!', 'Sobre Nosotros', 'https://desawarkingsatta.com/', 'uploads/banners/1737959193-MYAeDEfAmJ.jpg', NULL, '2025-01-27 00:56:33', '2025-01-27 00:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `like_count` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `details` mediumtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=published, 0=unpublished',
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `uuid`, `user_id`, `like_count`, `title`, `slug`, `short_description`, `details`, `image`, `status`, `blog_category_id`, `meta_title`, `meta_description`, `meta_keywords`, `og_image`, `created_at`, `updated_at`) VALUES
(11, 'cce6855f-3f66-4dfb-affc-a6570ca0d2b2', 1, '3', 'Educación financiera para principiantes', 'Educación financiera para principiantes', '<p><span style=\"color: rgb(161, 161, 161); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(26, 26, 26);\">Todo lo que necesitas saber\" Resumen: Explicar la importancia de la educación finan', '<h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Cómo hacer un presupuesto personal</h1><div class=\"ensear-a-los-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">Enseñar a los lectores a organizar sus ingresos y gastos mensuales para que sepan exactamente a dónde va su dinero y cómo pueden ahorrar.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>¿Qué es un presupuesto y por qué necesitas uno?</li><li>Herramientas y métodos para hacer un presupuesto (hojas de cálculo, apps)</li><li>Cómo categorizar tus gastos</li><li>Consejos para cumplir con tu presupuesto</li></ul></div><h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Diferencia entre activos y pasivos</h1><div class=\"explicar-de-forma-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">Explicar de forma sencilla qué son los activos y los pasivos, y por qué es fundamental entender esta diferencia para mejorar las finanzas.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>¿Qué es un activo?</li><li>¿Qué es un pasivo?</li><li>Ejemplos de activos y pasivos comunes</li><li>Cómo enfocarte en adquirir más activos que pasivos</li></ul></div><h1 class=\"cmo-hacer-un p-2\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; letter-spacing: normal; background-color: rgb(0, 0, 0);\">Consejos para ahorrar</h1><div class=\"maneras-efectivas-de-container p-3 mb-3 rounded\" style=\"color: rgb(255, 255, 255); font-family: &quot;Space Grotesk&quot;, sans-serif; font-size: 16px; letter-spacing: normal; background-color: rgb(0, 0, 0); border-radius: var(--bs-border-radius) !important;\"><p class=\"ensear-a-los\">10 maneras efectivas de ahorrar dinero cada mes. Resumen: Proporcionar estrategias prácticas y fáciles de aplicar para ayudar a los lectores a ahorrar más dinero cada mes.</p><ul class=\"qu-es-un-presupuesto-y-por-qu\" style=\"padding-left: 2rem; margin-bottom: 1rem;\"><li>Automatiza tus ahorros</li><li>Reduce gastos innecesarios</li><li>Establece metas de ahorro a corto y largo plazo</li><li>Aprovecha las ofertas y descuentos</li></ul></div>', 'uploads/blog/1730110708-w8eD870KbA.png', 1, 7, NULL, NULL, NULL, 'uploads/meta/1730110708-g388yjK1aD.png', '2024-03-29 01:52:10', '2024-11-02 02:37:31'),
(14, '6a627ed5-036d-4f00-b618-099706cb8243', 1, '2', 'Título del Blog', 'Título del Blog', '<p><span style=\"color: rgb(237, 237, 237); font-family: &quot;Space Grotesk&quot;; font-size: 20px; letter-spacing: normal; background-color: rgba(26, 26, 26, 0.7);\">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</span></p>', '<p><span style=\"color: rgb(237, 237, 237); font-family: &quot;Space Grotesk&quot;; font-size: 20px; letter-spacing: normal; background-color: rgba(26, 26, 26, 0.7);\">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</span></p>', 'uploads/blog/1730111275-XqCCj9GVJ6.png', 0, 7, NULL, NULL, NULL, 'uploads/meta/1730111275-pvT7orRFsT.png', '2024-10-28 03:50:57', '2024-11-02 02:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `uuid`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '28828707-9415-4068-adef-12641516486a', 'Development', 'development', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(2, 'ebe375f1-0a4a-4b3a-bf56-028824c9507f', 'IT & Software', 'it-software', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(3, '61efe125-6f32-4c7a-b6fe-061a3df3dbd2', 'Data Science', 'data-science', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(5, '911dcac5-1200-4fc4-94f2-2caea6251453', 'Business', 'business', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(7, 'e0637550-8560-4e2d-b4c4-fddc8b7bf1a6', 'Design', 'design', 1, '2022-12-04 17:05:33', '2022-12-04 17:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivate',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `name`, `email`, `comment`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 14, 3, NULL, NULL, 'test', 1, NULL, '2024-11-02 01:38:48', '2024-11-02 01:38:48'),
(5, 14, 3, NULL, NULL, 'cxgvsdfsd', 1, NULL, '2024-11-02 01:45:47', '2024-11-02 01:45:47'),
(6, 14, 3, NULL, NULL, 'blog comment test', 1, NULL, '2024-11-02 02:36:27', '2024-11-02 02:36:27'),
(7, 11, 3, NULL, NULL, 'edu', 1, NULL, '2024-11-02 02:37:09', '2024-11-02 02:37:09'),
(8, 14, 5, NULL, NULL, 'wow', 1, NULL, '2024-11-02 02:55:14', '2024-11-02 02:55:14'),
(9, 14, 5, NULL, NULL, 'reh', 1, 5, '2024-11-02 03:03:41', '2024-11-02 03:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(9, 4, 2, '2024-03-29 00:44:55', '2024-03-29 00:44:55'),
(10, 4, 3, '2024-03-29 00:44:55', '2024-03-29 00:44:55'),
(12, 7, 3, '2024-03-29 01:30:57', '2024-03-29 01:30:57'),
(17, 10, 3, '2024-03-29 01:46:55', '2024-03-29 01:46:55'),
(19, 3, 4, '2024-03-29 05:13:33', '2024-03-29 05:13:33'),
(23, 15, 3, '2024-10-28 03:53:46', '2024-10-28 03:53:46'),
(25, 11, 2, '2024-10-28 04:48:28', '2024-10-28 04:48:28'),
(27, 14, 1, '2024-10-28 05:14:45', '2024-10-28 05:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_feature` varchar(10) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `uuid`, `name`, `image`, `is_feature`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `og_image`, `status`, `created_at`, `updated_at`) VALUES
(30, 'a9cf4942-064e-4b84-8e60-f5d70badf406', 'Tienda General', 'uploads/category/1726331916-0uIksOuW3q.png', 'yes', 'tienda-general', 'Tienda General', 'Tienda General', 'Tienda General', 'uploads/meta/1726331916-f8R4j8V3Fy.png', 1, '2024-09-14 16:38:36', '2024-09-14 16:38:36'),
(31, 'b7ece814-260a-4330-bdc8-e8de6e15fe48', 'Arshcfsd', NULL, 'no', 'Arshcfsd', NULL, NULL, NULL, NULL, 1, '2024-10-30 08:12:33', '2024-10-30 08:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `message`, `is_seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 25, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-08 06:53:24', '2024-04-08 06:53:24', NULL),
(2, 3, 25, 'ret', 0, '2024-04-08 06:55:25', '2024-04-08 06:55:25', NULL),
(3, 3, 25, 'f', 0, '2024-04-08 06:57:24', '2024-04-08 06:57:24', NULL),
(4, 3, 25, 'sd', 0, '2024-04-08 07:02:12', '2024-04-08 07:02:12', NULL),
(5, 3, 25, 'funcking', 0, '2024-04-08 07:02:24', '2024-04-08 07:02:24', NULL),
(6, 3, 25, 'testing 555', 0, '2024-04-08 07:17:49', '2024-04-08 07:17:49', NULL),
(7, 3, 25, 'testing 555', 0, '2024-04-08 07:19:14', '2024-04-08 07:19:14', NULL),
(8, 25, 26, 'hi park', 0, '2024-04-08 09:04:07', '2024-04-08 09:04:07', NULL),
(9, 25, 4, 'how are you alex', 0, '2024-04-08 09:07:35', '2024-04-08 09:07:35', NULL),
(10, 3, 25, 'hey', 0, '2024-04-08 09:08:46', '2024-04-08 09:08:46', NULL),
(11, 3, 25, 'wow', 0, '2024-04-08 09:16:21', '2024-04-08 09:16:21', NULL),
(12, 25, 3, 'sd', 0, '2024-04-08 09:17:32', '2024-04-08 09:17:32', NULL),
(13, 25, 3, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-08 09:17:55', '2024-04-08 09:17:55', NULL),
(14, 3, 25, 'fgdxgfgdf shitttttttttttttttttttttttt', 0, '2024-04-08 09:18:38', '2024-04-08 09:18:38', NULL),
(15, 25, 3, 'cfgdfg', 0, '2024-04-08 09:21:48', '2024-04-08 09:21:48', NULL),
(16, 3, 25, 'eneough', 0, '2024-04-08 09:24:08', '2024-04-08 09:24:08', NULL),
(17, 25, 3, 'aisa', 0, '2024-04-08 09:24:58', '2024-04-08 09:24:58', NULL),
(18, 3, 25, 'image', 0, '2024-04-08 09:25:28', '2024-04-08 09:25:28', NULL),
(19, 3, 1, 'Hey You', 1, '2024-04-08 12:06:11', '2024-04-08 12:06:11', NULL),
(20, 1, 3, 'what', 1, '2024-04-08 12:06:39', '2024-04-08 12:06:39', NULL),
(21, 3, 1, 'you get my idea', 1, '2024-04-08 12:07:46', '2024-04-08 12:07:46', NULL),
(22, 1, 3, 'now looks good', 1, '2024-04-08 12:59:16', '2024-04-08 12:59:16', NULL),
(23, 3, 1, 'yeah', 1, '2024-04-08 12:59:32', '2024-04-08 12:59:32', NULL),
(24, 1, 3, 'df', 1, '2024-04-08 23:06:18', '2024-04-08 23:06:18', NULL),
(25, 1, 3, 'pusher', 1, '2024-04-08 23:16:08', '2024-04-08 23:16:08', NULL),
(26, 3, 1, 'ok', 1, '2024-04-08 23:17:02', '2024-04-08 23:17:02', NULL),
(27, 1, 3, 'dsf', 1, '2024-04-08 23:17:29', '2024-04-08 23:17:29', NULL),
(28, 1, 3, 'cvbc', 1, '2024-04-08 23:19:30', '2024-04-08 23:19:30', NULL),
(29, 3, 1, 'p', 1, '2024-04-08 23:51:31', '2024-04-08 23:51:31', NULL),
(30, 4, 3, 'hi arsh g', 0, '2024-04-08 23:56:22', '2024-04-08 23:56:22', NULL),
(31, 3, 4, 'yes', 0, '2024-04-08 23:56:39', '2024-04-08 23:56:39', NULL),
(32, 3, 4, 'index', 0, '2024-04-09 00:00:42', '2024-04-09 00:00:42', NULL),
(33, 3, 4, 'dfsd', 0, '2024-04-09 00:01:12', '2024-04-09 00:01:12', NULL),
(34, 4, 3, 'dsfsfgfhgh', 0, '2024-04-09 00:01:21', '2024-04-09 00:01:21', NULL),
(35, 4, 3, 'cha', 0, '2024-04-09 00:04:46', '2024-04-09 00:04:46', NULL),
(36, 3, 4, 'okk', 0, '2024-04-09 00:05:27', '2024-04-09 00:05:27', NULL),
(37, 3, 4, 'n', 0, '2024-04-09 00:06:58', '2024-04-09 00:06:58', NULL),
(38, 4, 3, 'what', 0, '2024-04-09 00:07:18', '2024-04-09 00:07:18', NULL),
(39, 4, 3, 'vcc', 0, '2024-04-09 00:09:39', '2024-04-09 00:09:39', NULL),
(40, 3, 4, 'dfgxcvnjhkjhk', 0, '2024-04-09 00:10:00', '2024-04-09 00:10:00', NULL),
(41, 3, 4, 'difficult', 0, '2024-04-09 00:21:07', '2024-04-09 00:21:07', NULL),
(42, 4, 3, 'where', 0, '2024-04-09 00:22:48', '2024-04-09 00:22:48', NULL),
(43, 4, 3, 'df', 0, '2024-04-09 00:32:55', '2024-04-09 00:32:55', NULL),
(44, 3, 4, 'rtyt', 0, '2024-04-09 00:33:14', '2024-04-09 00:33:14', NULL),
(45, 4, 3, 'chat event', 0, '2024-04-09 00:45:07', '2024-04-09 00:45:07', NULL),
(46, 3, 4, 'k', 0, '2024-04-09 00:45:41', '2024-04-09 00:45:41', NULL),
(47, 4, 3, 'pppppp', 0, '2024-04-09 00:57:55', '2024-04-09 00:57:55', NULL),
(48, 4, 3, 'fuck you', 0, '2024-04-09 01:05:15', '2024-04-09 01:05:15', NULL),
(49, 3, 4, 'bitvh', 0, '2024-04-09 01:05:46', '2024-04-09 01:05:46', NULL),
(50, 3, 4, 'testing', 0, '2024-04-09 01:17:36', '2024-04-09 01:17:36', NULL),
(51, 4, 3, 'mfgfdg', 0, '2024-04-09 01:22:27', '2024-04-09 01:22:27', NULL),
(52, 3, 4, 'fdgd', 0, '2024-04-09 01:23:03', '2024-04-09 01:23:03', NULL),
(53, 4, 3, 'testing 5', 0, '2024-04-09 01:23:32', '2024-04-09 01:23:32', NULL),
(54, 3, 4, 'wow it\'s working fine now', 0, '2024-04-09 01:23:51', '2024-04-09 01:23:51', NULL),
(55, 4, 3, 'congrate', 0, '2024-04-09 01:24:29', '2024-04-09 01:24:29', NULL),
(56, 3, 4, 'really', 0, '2024-04-09 01:24:46', '2024-04-09 01:24:46', NULL),
(57, 4, 3, 'something wrog', 0, '2024-04-09 01:26:11', '2024-04-09 01:26:11', NULL),
(58, 3, 4, 'no', 0, '2024-04-09 01:26:48', '2024-04-09 01:26:48', NULL),
(59, 4, 3, 'dfg', 0, '2024-04-09 01:27:17', '2024-04-09 01:27:17', NULL),
(60, 3, 4, 'dsf', 0, '2024-04-09 01:32:31', '2024-04-09 01:32:31', NULL),
(61, 4, 3, 'ghdfghdf', 0, '2024-04-09 01:32:41', '2024-04-09 01:32:41', NULL),
(62, 3, 4, 'hgj', 0, '2024-04-09 01:32:51', '2024-04-09 01:32:51', NULL),
(63, 3, 4, 'jhkhk', 0, '2024-04-09 01:33:02', '2024-04-09 01:33:02', NULL),
(64, 4, 3, 'ds', 0, '2024-04-09 01:37:44', '2024-04-09 01:37:44', NULL),
(65, 3, 4, 'fgh', 0, '2024-04-09 01:37:57', '2024-04-09 01:37:57', NULL),
(66, 4, 3, 'ghh', 0, '2024-04-09 01:38:04', '2024-04-09 01:38:04', NULL),
(67, 3, 4, 'gfh', 0, '2024-04-09 01:38:08', '2024-04-09 01:38:08', NULL),
(68, 3, 4, 'ghj', 0, '2024-04-09 01:38:36', '2024-04-09 01:38:36', NULL),
(69, 3, 4, 'hjgjg', 0, '2024-04-09 01:40:14', '2024-04-09 01:40:14', NULL),
(70, 4, 3, 'dfgdg', 0, '2024-04-09 01:45:02', '2024-04-09 01:45:02', NULL),
(71, 3, 4, 'h', 0, '2024-04-09 01:52:31', '2024-04-09 01:52:31', NULL),
(72, 4, 3, 'sd', 0, '2024-04-09 01:52:39', '2024-04-09 01:52:39', NULL),
(73, 3, 4, 'final', 0, '2024-04-09 02:01:01', '2024-04-09 02:01:01', NULL),
(74, 4, 3, 'testing', 0, '2024-04-09 02:01:10', '2024-04-09 02:01:10', NULL),
(75, 4, 3, 'notify', 0, '2024-04-09 02:31:55', '2024-04-09 02:31:55', NULL),
(76, 4, 3, 'dfsdfsfsdfds', 0, '2024-04-09 02:41:27', '2024-04-09 02:41:27', NULL),
(77, 3, 4, 'what', 0, '2024-04-09 02:41:51', '2024-04-09 02:41:51', NULL),
(78, 4, 3, 'nnnnnnn', 0, '2024-04-09 02:43:52', '2024-04-09 02:43:52', NULL),
(79, 4, 3, 'adm', 0, '2024-04-09 02:50:39', '2024-04-09 02:50:39', NULL),
(80, 3, 4, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-09 03:40:08', '2024-04-09 03:40:08', NULL),
(81, 4, 3, 'done', 0, '2024-04-09 03:40:19', '2024-04-09 03:40:19', NULL),
(82, 3, 4, 'check', 0, '2024-04-09 03:45:25', '2024-04-09 03:45:25', NULL),
(83, 4, 3, 'fgdf', 0, '2024-04-09 03:45:56', '2024-04-09 03:45:56', NULL),
(84, 4, 3, 'fdgfhgfhfh', 0, '2024-04-09 03:45:59', '2024-04-09 03:45:59', NULL),
(85, 4, 3, 'ertete', 0, '2024-04-09 03:46:02', '2024-04-09 03:46:02', NULL),
(86, 4, 3, 'iouo', 0, '2024-04-09 03:59:09', '2024-04-09 03:59:09', NULL),
(87, 4, 3, 'bbhhgjghj', 0, '2024-04-09 03:59:14', '2024-04-09 03:59:14', NULL),
(88, 3, 4, 'fghfdgfd', 0, '2024-04-09 04:00:24', '2024-04-09 04:00:24', NULL),
(89, 3, 4, 'vbnvn', 0, '2024-04-09 04:00:29', '2024-04-09 04:00:29', NULL),
(90, 4, 3, 'vbvzzx', 0, '2024-04-09 04:01:05', '2024-04-09 04:01:05', NULL),
(91, 4, 3, 'weqeqe', 0, '2024-04-09 04:01:10', '2024-04-09 04:01:10', NULL),
(92, 4, 3, 'kj;j;jljkl', 0, '2024-04-09 04:01:15', '2024-04-09 04:01:15', NULL),
(93, 3, 4, 'hey whats up', 0, '2024-04-09 07:38:06', '2024-04-09 07:38:06', NULL),
(94, 4, 3, 'just testing chatting feature', 0, '2024-04-09 07:38:26', '2024-04-09 07:38:26', NULL),
(95, 3, 4, 'yeah it\'s working', 0, '2024-04-09 07:38:50', '2024-04-09 07:38:50', NULL),
(96, 4, 3, 'i know but you need to improve chatting system more', 0, '2024-04-09 07:39:27', '2024-04-09 07:39:27', NULL),
(97, 3, 4, 'yeah i will', 0, '2024-04-09 07:39:50', '2024-04-09 07:39:50', NULL),
(98, 4, 3, 'eneough for now', 0, '2024-04-09 07:40:13', '2024-04-09 07:40:13', NULL),
(99, 3, 4, 'ok', 0, '2024-04-09 07:40:21', '2024-04-09 07:40:21', NULL),
(100, 3, 4, 'hi', 0, '2024-04-09 08:02:14', '2024-04-09 08:02:14', NULL),
(101, 4, 3, 'hi', 0, '2024-04-09 08:02:30', '2024-04-09 08:02:30', NULL),
(102, 4, 3, 'mfgfdg', 0, '2024-04-09 08:02:56', '2024-04-09 08:02:56', NULL),
(103, 3, 4, 'rrr', 0, '2024-04-09 08:10:21', '2024-04-09 08:10:21', NULL),
(104, 4, 3, '3333', 0, '2024-04-09 08:10:34', '2024-04-09 08:10:34', NULL),
(105, 3, 4, 'sd', 0, '2024-04-09 08:10:55', '2024-04-09 08:10:55', NULL),
(106, 3, 4, 'sdfa', 0, '2024-04-09 08:11:04', '2024-04-09 08:11:04', NULL),
(107, 4, 3, 'sdd', 0, '2024-04-09 08:11:18', '2024-04-09 08:11:18', NULL),
(108, 3, 4, 'sdf', 0, '2024-04-09 08:11:29', '2024-04-09 08:11:29', NULL),
(109, 4, 3, 'sd', 0, '2024-04-09 08:12:00', '2024-04-09 08:12:00', NULL),
(110, 3, 4, 'dfghf', 0, '2024-04-09 08:12:43', '2024-04-09 08:12:43', NULL),
(111, 4, 3, '[[[', 0, '2024-04-09 08:12:57', '2024-04-09 08:12:57', NULL),
(112, 3, 4, ']]]', 0, '2024-04-09 08:13:14', '2024-04-09 08:13:14', NULL),
(113, 3, 4, 'n', 0, '2024-04-17 01:54:38', '2024-04-17 01:54:38', NULL),
(114, 4, 3, 'd', 0, '2024-04-17 01:55:10', '2024-04-17 01:55:10', NULL),
(115, 4, 3, 'it is working', 0, '2024-04-17 02:00:33', '2024-04-17 02:00:33', NULL),
(116, 3, 4, 'yeah', 0, '2024-04-17 02:01:08', '2024-04-17 02:01:08', NULL),
(117, 4, 3, 'confuse', 0, '2024-04-17 02:03:13', '2024-04-17 02:03:13', NULL),
(118, 3, 4, 'tell me confesiion you have', 0, '2024-04-17 02:04:11', '2024-04-17 02:04:11', NULL),
(119, 3, 1, 'hi', 1, '2024-04-17 02:53:58', '2024-04-17 02:53:58', NULL),
(120, 28, 28, 'fuck you', 0, '2024-04-17 02:58:24', '2024-04-17 02:58:24', NULL),
(121, 4, 28, 'j', 0, '2024-04-17 03:00:31', '2024-04-17 03:00:31', NULL),
(122, 28, 28, 'y', 0, '2024-04-17 03:01:04', '2024-04-17 03:01:04', NULL),
(123, 28, 4, 'THIS IS TESTING FROM FULL STACK DEV', 0, '2024-04-17 03:02:49', '2024-04-17 03:02:49', NULL),
(124, 4, 28, 'sd', 0, '2024-04-17 03:04:51', '2024-04-17 03:04:51', NULL),
(125, 28, 4, 'f', 0, '2024-04-17 03:05:06', '2024-04-17 03:05:06', NULL),
(126, 4, 28, 'FROM', 0, '2024-04-17 03:10:10', '2024-04-17 03:10:10', NULL),
(127, 4, 1, 'd', 0, '2024-04-17 03:13:08', '2024-04-17 03:13:08', NULL),
(128, 1, 4, 'what happen', 0, '2024-04-17 03:14:12', '2024-04-17 03:14:12', NULL),
(129, 29, 4, 'chatting with mail notification', 0, '2024-04-17 03:22:53', '2024-04-17 03:22:53', NULL),
(130, 29, 4, 'chatting with mail notification', 0, '2024-04-17 03:22:57', '2024-04-17 03:22:57', NULL),
(131, 4, 29, 'yeah', 0, '2024-04-17 03:24:34', '2024-04-17 03:24:34', NULL),
(132, 1, 5, 'zfdzf', 0, '2025-01-21 23:45:30', '2025-01-21 23:45:30', NULL),
(133, 1, 3, 'hello alex', 1, '2025-01-22 00:15:07', '2025-01-22 00:15:07', NULL),
(134, 1, 3, 'hello alex', 1, '2025-01-22 00:15:09', '2025-01-22 00:15:09', NULL),
(135, 1, 5, 'mus', 0, '2025-01-22 00:22:34', '2025-01-22 00:22:34', NULL),
(136, 6, 1, 'hi sir', 1, '2025-01-22 00:24:58', '2025-01-22 00:24:58', NULL),
(137, 1, 6, 'yes tell me', 1, '2025-01-22 00:25:23', '2025-01-22 00:25:23', NULL),
(138, 1, 6, 'is seen is working', 1, '2025-01-22 01:03:51', '2025-01-22 01:03:51', NULL),
(139, 6, 1, 'yeah', 1, '2025-01-22 01:04:29', '2025-01-22 01:04:29', NULL),
(140, 1, 6, 'again', 1, '2025-01-22 01:08:27', '2025-01-22 01:08:27', NULL),
(141, 6, 1, 'yeah h', 1, '2025-01-22 01:09:03', '2025-01-22 01:09:03', NULL),
(142, 1, 6, 'again wow', 1, '2025-01-22 01:09:39', '2025-01-22 01:09:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhanmondi', NULL, NULL),
(2, 1, 'Bannai', NULL, NULL),
(4, 2, 'Zero Point', NULL, NULL),
(5, 3, 'Tomchombridge', NULL, NULL),
(6, 3, 'Cantonment', NULL, NULL),
(7, 4, 'Acton', NULL, NULL),
(8, 4, 'Alamo', NULL, NULL),
(9, 5, 'Albin', NULL, NULL),
(10, 6, 'Bartow', NULL, NULL),
(11, 7, 'Oban', NULL, NULL),
(12, 8, 'Holywood', NULL, NULL),
(13, 9, 'Ely', NULL, NULL),
(14, 1, 'Tejgaon', '2024-06-07 06:12:00', '2024-06-07 06:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

CREATE TABLE `client_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_logos`
--

INSERT INTO `client_logos` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Ovita', 'uploads_demo/client-logo/1.png', '2022-12-04 17:05:33', '2025-01-13 06:31:55'),
(2, 'Vigon', 'uploads_demo/client-logo/2.png', '2022-12-04 17:05:33', '2025-01-13 06:31:55'),
(3, 'Betribe', 'uploads_demo/client-logo/3.png', '2022-12-04 17:05:33', '2025-01-13 06:31:55'),
(4, 'Parsit', 'uploads_demo/client-logo/4.png', '2022-12-04 17:05:33', '2025-01-13 06:31:55'),
(5, 'Karika', 'uploads/client_logo/1736769716IbQJzw0Mp8.jpg', '2022-12-04 17:05:33', '2025-01-13 06:31:55'),
(6, 'd', NULL, '2025-01-13 05:41:26', '2025-01-13 06:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `user_id`, `author`, `email`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'fgdg', 'hrnatrajinfotech@gmail.com', 'dfss', '2025-02-13 21:17:35', '2025-02-13 21:17:35'),
(2, 3, 1, 'fdgd', 'hrnatrajinfotech@gmail.com', 'xcvxvc', '2025-02-13 21:31:38', '2025-02-13 21:31:38'),
(3, 3, 11, 'wow', 'aasifdev5@gmail.com', 'sfsdf', '2025-02-13 21:32:41', '2025-02-13 21:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_us_issue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_issues`
--

CREATE TABLE `contact_us_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_issues`
--

INSERT INTO `contact_us_issues` (`id`, `uuid`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, '7c57e841-fdcb-401f-aaf9-c64b31bd1e3c', 'Withdraw', 1, '2024-03-09 23:39:51', '2024-03-09 23:39:51'),
(4, '1d2a6c9d-d2f8-494a-98a3-53833530945e', 'Refund', 1, '2024-03-09 23:40:12', '2024-03-09 23:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phonecode` varchar(255) NOT NULL,
  `continent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `short_name`, `country_name`, `flag`, `slug`, `phonecode`, `continent`, `created_at`, `updated_at`) VALUES
(1, 'BD', 'Bangladesh', '', 'bangladesh', '+88', 'Asia', NULL, NULL),
(2, 'USA', 'United States', '', 'united-states', '+1', 'North America', NULL, NULL),
(3, 'UK', 'United Kingdom', '', 'united-kingdom', '+44', 'Europe', NULL, NULL),
(7, 'BO', 'Bolivia', 'BO', '', '+591', 'South America', '2025-01-13 01:28:10', '2025-01-13 01:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `currency_placement` varchar(255) NOT NULL DEFAULT 'before' COMMENT 'before, after',
  `current_currency` varchar(255) NOT NULL DEFAULT 'no' COMMENT 'on, off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_code`, `symbol`, `currency_placement`, `current_currency`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'before', 'off', NULL, '2025-05-03 04:29:32'),
(2, 'BDT', '৳', 'before', 'off', NULL, '2025-05-03 04:29:32'),
(3, 'INR', '₹', 'before', 'off', NULL, '2025-05-03 04:29:32'),
(4, 'GBP', '£', 'after', 'off', NULL, '2025-05-03 04:29:32'),
(5, 'MXN', '$', 'before', 'off', NULL, '2025-05-03 04:29:32'),
(6, 'SAR', 'SR', 'before', 'off', NULL, '2025-05-03 04:29:32'),
(7, 'TRY', '₺', 'after', 'off', NULL, '2025-05-03 04:29:32'),
(8, 'ARS', '$', 'before', 'off', NULL, '2025-05-03 04:29:32'),
(9, 'EUR', '€', 'before', 'off', NULL, '2025-05-03 04:29:32'),
(11, 'BS', 'Bs', 'before', 'on', '2024-06-07 04:12:21', '2025-05-03 04:29:32'),
(12, 'Dinars', 'Dinar', 'after', 'off', '2024-06-07 04:20:07', '2025-05-03 04:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_questions`
--

INSERT INTO `faq_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(2, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(3, 'which I enjoy with my whole heart am alone feel?', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a  greater artist than now. When, while the lovely valley with vapour around me, and the meridian.', '2022-12-04 17:05:33', '2022-12-04 17:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `folder_id` bigint(20) UNSIGNED NOT NULL,
  `path` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `extension`, `folder_id`, `path`, `created_at`, `updated_at`) VALUES
(2, 'Screenshot (158).png', NULL, 'png', 1, 'C:\\Users\\Aasif\\Desktop\\New\\public\\uploads/video\\Screenshot (158).png', '2025-01-16 07:45:54', '2025-01-16 07:45:54'),
(3, 'links audiolibros.pdf', NULL, 'pdf', 1, 'C:\\Users\\Aasif\\Desktop\\New\\public\\uploads/video\\links audiolibros.pdf', '2025-01-16 07:48:58', '2025-01-16 07:48:58'),
(4, '1732531639-mS4pBBAF6v.mp3', NULL, 'mp3', 1, 'C:\\Users\\Aasif\\Desktop\\New\\public\\uploads/video\\1732531639-mS4pBBAF6v.mp3', '2025-01-16 08:33:02', '2025-01-16 08:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(1, 'video', 'C:\\Users\\Aasif\\Desktop\\New\\public\\uploads/video', '2025-01-16 06:03:51', '2025-01-16 06:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `title` varchar(191) NOT NULL,
  `subtitle` varchar(191) NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`id`, `uuid`, `title`, `subtitle`, `logo`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(8, '76ac56d7-5987-463c-819c-24353f23acc2', 'sd', 'sdsad', NULL, 'sd', 1, '2024-11-07 05:58:26', '2024-11-07 05:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text NOT NULL,
  `forum_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `total_seen` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `uuid`, `user_id`, `title`, `forum_category_id`, `description`, `status`, `total_seen`, `created_at`, `updated_at`) VALUES
(8, '5f69be7d-e69d-4e23-85e5-d6246890cda7', NULL, 'fdgg', 8, 'dfgg', 1, 1, '2024-11-09 02:56:27', '2024-11-09 02:56:28'),
(9, '73bfcbe9-48a1-4807-8160-793f3811f8af', NULL, 'fdgg', 8, 'dfgg', 1, 5, '2024-11-09 02:57:39', '2024-11-09 03:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `forum_post_comments`
--

CREATE TABLE `forum_post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `forum_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` longtext NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 0=disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) NOT NULL,
  `iso_code` varchar(255) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `rtl` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `default_language` varchar(255) DEFAULT 'off' COMMENT 'on,off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `iso_code`, `flag`, `rtl`, `status`, `default_language`, `created_at`, `updated_at`) VALUES
(2, 'Spanish', 'es', '<i class=\"flag-icon flag-icon-es\"></i>', 0, 1, 'off', '2024-04-03 08:08:17', '2025-05-03 04:29:32'),
(3, 'Portuguese', 'pt', '<i class=\"flag-icon flag-icon-pt\"></i>', 0, 1, 'off', '2024-10-30 05:02:08', '2025-05-03 04:29:32'),
(4, 'English', 'gb', '<i class=\"flag-icon flag-icon-gb\"></i>', 0, 1, 'on', '2024-10-30 05:02:08', '2025-05-03 04:29:32'),
(10, 'Hindi', 'in', 'in', 0, 1, 'off', '2025-01-13 02:33:50', '2025-05-03 04:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT 'default_alias',
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `shortcodes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`shortcodes`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `alias`, `name`, `subject`, `body`, `status`, `shortcodes`, `created_at`, `updated_at`) VALUES
(4, 'employee_leave_notification', 'Employee Leave Notification', 'Leave Request Notification for {employee_name}', '<p>Dear {manager_name},</p>\r\n\r\n<p>We have received a leave request from {employee_name}.</p>\r\n\r\n<p>Here are the details of the request:</p>\r\n\r\n<p>- **Employee Name**: {employee_name}<br />\r\n- **Department**: {department}<br />\r\n- **Leave Type**: {leave_type}<br />\r\n- **Start Date**: {start_date}<br />\r\n- **End Date**: {end_date}<br />\r\n- **Reason**: {leave_reason}</p>\r\n\r\n<p>Please review this request and take the necessary action.</p>\r\n\r\n<p>Kind regards, &nbsp;<br />\r\n{website_name}<br />\r\n&nbsp;</p>', 1, '{\"employee_name\":\"John Doe\",\"manager_name\":\"Jane Smith\",\"department\":\"Sales\",\"leave_type\":\"Annual Leave\",\"start_date\":\"2025-01-20\",\"end_date\":\"2025-01-25\",\"leave_reason\":\"Family trip\",\"website_name\":\"HR Portal\"}', NULL, NULL),
(5, 'password_reset', 'Restablecer Contraseña', 'Notificación de Restablecimiento de Contraseña', '<div class=\"email-container\">\r\n<h2 class=\"email-header\">Notificaci&oacute;n de Restablecimiento de Contrase&ntilde;a</h2>\r\n<p class=\"email-body\">&iexcl;Hola!</p>\r\n<p class=\"email-body\">Est&aacute;s recibiendo este correo electr&oacute;nico porque hemos recibido una solicitud para restablecer la contrase&ntilde;a de tu cuenta.</p>\r\n<p class=\"email-body\">Haz clic en el bot&oacute;n de abajo para restablecer tu contrase&ntilde;a:</p>\r\n<p style=\"text-align: center;\"><a class=\"email-button\" href=\"{{link}}\">Restablecer Contrase&ntilde;a</a></p>\r\n<p class=\"email-body\">Este enlace para restablecer la contrase&ntilde;a caducar&aacute; en 15 minutos. Si no solicitaste un restablecimiento de contrase&ntilde;a, no es necesario que realices ninguna otra acci&oacute;n.</p>\r\n<p class=\"email-body\">Saludos cordiales,</p>\r\n<p class=\"email-body\">El equipo de Negociosgen</p>\r\n<hr style=\"border-top: 1px solid #ddd; margin: 20px 0;\">\r\n<p class=\"email-footer\">Recibiste este correo porque te suscribiste a nuestra lista.<br>Darse de baja de futuros correos o actualizar las preferencias de correo.<br>&copy; 2024 Negociosgen. Todos los derechos reservados.</p>\r\n</div>', 1, '{\r\n\"link\":\"Password reset link\",\r\n\"expiry_time\":\"Link expiry time\",\r\n\"website_name\":\"Your website name\"\r\n}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `benefits` text DEFAULT NULL,
  `duration` varchar(191) NOT NULL DEFAULT '1 year',
  `highlight_color` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `price`, `benefits`, `duration`, `highlight_color`, `created_at`, `updated_at`) VALUES
(1, 'Miembro GEN CLASSIC', '1000', '[\"Acceso por un a\\u00f1o a cursos y coaching virtual.\",\"Acceso a formaci\\u00f3n.\",\"Descuentos y beneficios en empresas nacionales.\",\"Apoyo de l\\u00edderes a nivel nacional.\"]', '1', '#701010', '2025-01-10 05:30:23', '2025-01-10 05:58:03'),
(2, 'Miembro GEN VIP', '3000', '[\"Acceso por un a\\u00f1o a cursos y coaching virtual.\",\"Acceso a formaci\\u00f3n y eventos en vivo (incluye 1 invitado).\",\"Asientos reservados en las primeras filas.\",\"Descuentos y beneficios en empresas nacionales e internacionales.\",\"Tarjeta VIP GEN con beneficios adicionales.\"]', '1', '#cbcd37', '2025-01-10 05:34:21', '2025-01-10 06:00:51'),
(3, 'Miembro GEN GOLD', '5000', '[\"Acceso por un a\\u00f1o a cursos, coaching virtual y acceso libre a coaching en vivo (incluye 2 invitados).\",\"Acceso a formaci\\u00f3n y eventos en vivo (incluye 2 invitados).\",\"Apoyo personalizado de l\\u00edderes nacionales e internacionales.\",\"Tarjeta GOLD GEN con beneficios adicionales.\"]', '1', '#efd006', '2025-01-10 05:35:22', '2025-01-10 06:02:15'),
(4, 'Miembro GEN PLATINUM', '7000', '[\"Acceso por dos a\\u00f1os a cursos, coaching virtual y coaching en vivo (incluye 3 invitados).\",\"Acceso a formaci\\u00f3n y eventos en vivo (incluye 3 invitados).\",\"Asientos reservados en las primeras filas.\",\"Descuentos y beneficios en empresas VIP nacionales e internacionales.\",\"Tarjeta PLATINUM GEN con beneficios exclusivos.\",\"6\"]', '2', '#3da022', '2025-01-10 05:36:25', '2025-01-10 21:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `meta_title` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `uuid`, `slug`, `page_name`, `meta_title`, `meta_description`, `meta_keyword`, `og_image`, `created_at`, `updated_at`) VALUES
(1, '4bcd0b6f-5692-4966-8a4e-8884d72edaa4', 'home', 'Home', 'Home', 'LMSZai Learning management system', 'Lmszai, Lms, Learning, Course', NULL, NULL, '2023-07-18 07:44:59'),
(2, '3c3ef58d-d459-441b-9b90-370f840b2da1', 'course', 'Course List', 'Courses', 'LMSZai Course List', 'Lmszai, Lms, Learning, Course', NULL, NULL, '2023-07-18 07:44:59'),
(5, '62892323-3220-408d-81ea-8875dc1065f4', 'blog', 'Blog List', 'Blog', 'LMSZAI Blog', 'blog, course', NULL, NULL, '2023-07-18 07:44:59'),
(7, '4869c7e6-9635-4203-850a-09a41f4954cc', 'about_us', 'About Us', 'About Us', 'About Us', 'about us', NULL, NULL, '2024-06-07 05:23:20'),
(8, 'b7b70870-0248-4781-a9a3-a76cffefb534', 'contact_us', 'Contact Us', 'Contact Us', 'LMSZAI contact us', 'lmszai, contact us', NULL, NULL, '2023-07-18 07:44:59'),
(9, '07d0a702-7a57-428f-8003-c172679ecbd2', 'support_faq', 'Support Page', 'Support', 'LMSZAI support ticket', 'lmszai, support, ticket', NULL, NULL, '2023-07-18 07:44:59'),
(10, 'f00f9d36-6b9c-47ee-8649-8f50a2f9fe7a', 'privacy_policy', 'Privacy Policy', 'Privacy Policy', 'LMSZAI Privacy Policy', 'lmszai, privacy, policy', NULL, NULL, '2023-07-18 07:44:59'),
(11, 'f74400a5-415f-4604-849e-a03e4896ff99', 'cookie_policy', 'Cookie Policy', 'Cookie Policy', 'LMSZAI Cookie Policy', 'lmszai, cookie, policy', NULL, NULL, '2023-07-18 07:44:59'),
(12, '2e0f0a6e-c573-475c-8913-95e241504c1a', 'faq', 'FAQ', 'FAQ', 'LMSZAI FAQ', 'lmszai, faq', NULL, NULL, '2023-07-18 07:44:59'),
(13, '2e0f0a6e-c573-479c-8913-95e241504c1a', 'terms_and_condition', 'Terms & Conditions', 'Terms & Conditions', 'LMSZAI Terms & Conditions Policy', 'Terms,Conditions', NULL, NULL, '2023-07-18 07:44:59'),
(14, '2e0f0a6e-c573-479c-8913-95e24150000a', 'refund_policy', 'Refund Policy', 'Refund Policy', 'LMSZAI Refund Policy', 'Refund Policies', NULL, NULL, '2023-07-18 07:44:59'),
(51, 'd538d469-265f-44fc-95b9-dc57d10f8c81', 'default', 'Default', 'Demo Title', 'Demo Description', 'Demo Keywords', '', NULL, NULL),
(52, 'a241f1cb-3711-4609-90b2-976cb1ab53f7', 'auth', 'Auth Page', 'Auth Page', 'Auth Page Meta Description', 'Auth Page Meta Keywords', '', NULL, NULL),
(53, '26092a11-6aea-44ce-8880-41b47c692324', 'bundle', 'Bundle List', 'Bundle List', 'Bundle List Page Meta Description', 'Bundle List Page Meta Keywords', '', NULL, NULL),
(54, '42c68cfa-028f-4ffd-b4a0-b8da50978854', 'consultation', 'Consultation List', 'Consultation List', 'Consultation List Page Meta Description', 'Consultation List Page Meta Keywords', '', NULL, NULL),
(55, '857e3c5c-8430-4c5d-b009-e8f7e33dceb0', 'instructor', 'Instructor List', 'Instructor List', 'Instructor List Page Meta Description', 'Instructor List Page Meta Keywords', '', NULL, NULL),
(56, '2f9557c3-c10e-4b47-bf1c-040b6f0182e3', 'saas', 'Saas List', 'Saas List', 'Saas List Page Meta Description', 'Saas List Page Meta Keywords', '', NULL, NULL),
(57, 'b945d05c-d72b-4d1e-838d-f552c769d28f', 'subscription', 'Subscription List', 'Subscription List', 'Subscription List Page Meta Description', 'Subscription List Page Meta Keywords', '', NULL, NULL),
(58, 'a26d5ab1-1fd5-4eeb-9b32-04469f751cbf', 'verify_certificate', 'Verify certificate List', 'Verify certificate List', 'Verify certificate List Page Meta Description', 'Verify certificate List Page Meta Keywords', '', NULL, NULL),
(59, 'e5089c78-bca2-4d57-9cd4-2f3792d09810', 'forum', 'Forum', 'Forum', 'Forum Page Meta Description', 'Forum Page Meta Keywords', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_17_112209_add_socialite_fields_to_users_table', 2),
(6, '2023_12_24_999999_add_active_status_to_users', 3),
(7, '2023_12_24_999999_add_avatar_to_users', 3),
(8, '2023_12_24_999999_add_dark_mode_to_users', 3),
(9, '2023_12_24_999999_add_messenger_color_to_users', 3),
(10, '2023_12_24_999999_create_chatify_favorites_table', 3),
(11, '2023_12_24_999999_create_chatify_messages_table', 3),
(12, '2023_12_25_053745_create_orders_table', 4),
(13, '2023_12_25_104906_create_tasks_table', 5),
(14, '2023_12_25_133036_create_purchases_table', 6),
(15, '2023_12_27_043258_create_balances_table', 7),
(16, '2023_12_27_044127_add_balance_to_users_table', 8),
(17, '2023_12_27_080751_create_payments_table', 9),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 10),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 10),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 10),
(21, '2016_06_01_000004_create_oauth_clients_table', 10),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 10),
(23, '2024_01_10_085202_create_posting_ads_table', 11),
(24, '2024_01_10_121310_create_images_table', 12),
(25, '2024_01_17_071550_create_banners_table', 13),
(26, '2024_01_17_085258_create_ads_table', 14),
(27, '2024_01_17_104036_create_calendars_table', 15),
(28, '2024_01_17_140951_create_credit_reload_promotions_table', 16),
(29, '2024_01_16_172130_create_attentions_table', 17),
(30, '2024_06_09_091155_create_permissions_table', 18),
(31, '2024_06_24_084835_create_product_variations_table', 19),
(32, '2024_11_03_091345_create_courses_table', 20),
(33, '2024_11_03_095819_add_uuid_to_courses_table', 21),
(34, '2024_11_03_100251_add_video_thumbnail_to_courses_table', 22),
(35, '2024_11_05_055606_create_events_table', 23),
(36, '2024_11_24_044400_create_audiobooks_table', 24),
(37, '2024_11_28_032108_create_sales_table', 25),
(38, '2025_01_14_062929_create_mail_templates_table', 26),
(39, '2025_01_16_103920_create_folders_table', 27),
(40, '2025_01_16_103948_create_files_table', 27),
(41, '2025_02_14_014007_create_comments_table', 28),
(42, '2025_02_14_015030_create_reactions_table', 28),
(43, '2025_04_29_060023_create_rooms_table', 29),
(44, '2025_04_29_060027_create_reservations_table', 29),
(45, '2025_04_29_064352_create_room_images_table', 30),
(46, '2025_05_03_075324_create_properties_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `type` enum('text','image','audio','video') NOT NULL DEFAULT 'text',
  `thumbnail` varchar(191) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `file_path` varchar(191) DEFAULT NULL,
  `author` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `type`, `thumbnail`, `content`, `file_path`, `author`, `created_at`, `updated_at`) VALUES
(2, 'fgh', 'image', 'uploads/news/thumbnails/1739415437-AbU1ZLMCtm.jpeg', '<p>fggdfgd</p>', 'uploads/news/image/1734427526-juqv9glYeh.png', 'dtgertdgdte', '2024-12-17 03:47:28', '2025-02-12 21:27:17'),
(3, 'sdada', 'image', 'uploads/news/thumbnails/1739415204-Na7oZ6UoVZ.jpeg', '<p>sdsdfsfsfewe</p>', NULL, 'Warren Buffett', '2025-02-12 21:23:24', '2025-02-12 21:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `sender_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `target_url` varchar(255) DEFAULT NULL,
  `is_seen` varchar(255) NOT NULL DEFAULT 'no' COMMENT 'yes, no',
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=instructor, 3=student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `uuid`, `sender_id`, `user_id`, `text`, `target_url`, `is_seen`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'f23056b9-9731-4a4a-8a68-3678594fdf2f', 25, 25, 'A new member has registered on the platform.', 'http://127.0.0.1:8000/admin/users', 'no', 1, '2025-05-04 03:21:46', '2025-05-04 03:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `our_histories`
--

CREATE TABLE `our_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_histories`
--

INSERT INTO `our_histories` (`id`, `year`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, '1998', 'Mere tranquil existence', 'Possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart am alone', NULL, '2025-01-13 06:33:44'),
(2, '1998', 'Incapable of drawing', 'Exquisite sense of mere tranquil existence that I neglect my talents add should be incapable of drawing', NULL, '2025-01-13 06:33:44'),
(3, '1998', 'Foliage access trees', 'Serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my', NULL, '2025-01-13 06:33:44'),
(4, '1998', 'Among grass trickling', 'Should be incapable of drawing a single stroke at the present moment; and yet I feel that I never', NULL, '2025-01-13 06:33:44'),
(5, '1994', 'born', 'aasif', '2025-01-13 06:33:44', '2025-01-13 06:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(500) NOT NULL,
  `page_slug` varchar(500) NOT NULL,
  `page_content` text NOT NULL,
  `page_order` int(3) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_content`, `page_order`, `status`) VALUES
(2, 'Términos y condiciones test', 'terminos-y-condiciones-test', '<p><strong>Use of this site is provided by Demos subject to the following Terms and Conditions:</strong><br />1. Your use constitutes acceptance of these Terms and Conditions as at the date of your first use of the site.<br />2. Demos reserves the rights to change these Terms and Conditions at any time by posting changes online. Your continued use of this site after changes are posted constitutes your acceptance of this agreement as modified.<br />3. You agree to use this site only for lawful purposes, and in a manner which does not infringe the rights, or restrict, or inhibit the use and enjoyment of the site by any third party.<br />4. This site and the information, names, images, pictures, logos regarding or relating to Demos are provided &ldquo;as is&rdquo; without any representation or endorsement made and without warranty of any kind whether express or implied. In no event will Demos be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from the use or in connection with such use or loss of use of the site, whether in contract or in negligence.<br />5. Demos does not warrant that the functions contained in the material contained in this site will be uninterrupted or error free, that defects will be corrected, or that this site or the server that makes it available are free of viruses or bugs or represents the full functionality, accuracy and reliability of the materials.<br />6. Copyright restrictions: please refer to our Creative Commons license terms governing the use of material on this site.<br />7. Demos takes no responsibility for the content of external Internet Sites.<br />8. Any communication or material that you transmit to, or post on, any public area of the site including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information.<br />9. If there is any conflict between these Terms and Conditions and rules and/or specific terms of use appearing on this site relating to specific material then the latter shall prevail.<br />10. These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.<br />11. If these Terms and Conditions are not accepted in full, the use of this site must be terminated immediately.</p>', 2, 1),
(5, 'Contact', 'contact', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `product_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_details`)),
  `user_id` int(11) DEFAULT NULL,
  `reward_id` int(11) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `payment_receipt` text DEFAULT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `status` enum('initial','pending','success','failed','declined','dispute') DEFAULT 'initial',
  `payer_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `name`, `email`, `product_details`, `user_id`, `reward_id`, `amount`, `payment_receipt`, `accepted`, `status`, `payer_email`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Aasif Ahmed', NULL, NULL, 9, NULL, 1000.00, 'payment_receipt/logo.png', 1, 'initial', 'hrnatrajinffdggbvfdgotech@gmail.com', '2024-11-20 01:08:48', '2024-11-20 01:27:59'),
(2, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/socialandrea.png', 0, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:02:16', '2024-11-20 02:02:16'),
(3, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/image (4).png', 0, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:02:31', '2024-11-20 02:02:31'),
(4, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 198.00, 'payment_receipt/blog.png', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:02:48', '2024-11-20 02:14:25'),
(5, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/pqjvedcnyp9xjpaxk4kv.jpg', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:04:06', '2024-11-20 02:12:09'),
(6, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/pqjvedcnyp9xjpaxk4kv.jpg', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:04:44', '2024-11-20 02:10:32'),
(7, NULL, 'brijlal pawar', NULL, NULL, 11, NULL, 1000.00, 'payment_receipt/image_750x_65cc96e678ac4.png', 1, 'initial', 'brijlalpawar@gmail.com', '2024-11-20 02:06:59', '2024-11-20 02:08:40'),
(8, NULL, 'deepak rathore', NULL, NULL, 12, NULL, 1000.00, 'payment_receipt/Screenshot (129).png', 1, 'initial', 'deepak@gmail.com', '2024-11-21 23:11:21', '2024-11-21 23:11:37'),
(9, NULL, 'heena khan', NULL, NULL, 13, NULL, 1000.00, 'payment_receipt/image (5).png', 1, 'initial', 'heena@gmail.com', '2024-11-21 23:16:25', '2024-11-21 23:16:36'),
(10, NULL, 'akansha sharma', NULL, NULL, 14, NULL, 1000.00, 'payment_receipt/1657090503-9ynVP5V0Tx.jpg', 1, 'initial', 'akansha@gmail.com', '2024-11-22 00:14:03', '2024-11-22 00:14:43'),
(11, NULL, 'malka khan', NULL, NULL, 15, NULL, 1000.00, 'payment_receipt/IMG-20240124-WA0039.jpg', 1, 'initial', 'malkakhan@gmail.com', '2024-11-22 00:17:26', '2024-11-22 00:18:32'),
(12, NULL, 'xvxdffd sdfdfd', NULL, NULL, 16, NULL, 1000.00, 'payment_receipt/Sin título-2.png', 1, 'initial', 'dffffghwerw@gmail.com', '2024-11-27 22:12:41', '2024-11-27 22:13:54'),
(13, NULL, 'dfsfsfsd dfgsdfsf', NULL, NULL, 17, NULL, 1000.00, 'payment_receipt/images.jpg', 1, 'initial', 'dsfdsfxcfg@gmail.com', '2024-11-27 22:27:28', '2024-11-27 22:28:07'),
(14, NULL, 'nivesdk dgnjn', NULL, NULL, 18, NULL, 1000.00, 'payment_receipt/image (1).png', 1, 'initial', 'nbfef@gmail.com', '2024-11-27 22:31:42', '2024-11-27 22:31:51'),
(15, NULL, 'cxvxvxdfgerfsd fghfghfbhdgr', NULL, NULL, 19, NULL, 1000.00, 'payment_receipt/IMG-20240124-WA0040.jpg', 1, 'initial', 'qweqwzdawe@gmail.com', '2024-11-28 01:20:45', '2024-11-28 01:20:54'),
(16, NULL, 'park xzf', NULL, NULL, 20, NULL, 1000.00, 'payment_receipt/IMG-20240124-WA0041-removebg-preview.png', 1, 'initial', 'park@gmail.com', '2024-11-28 01:24:08', '2024-11-28 01:24:14'),
(17, NULL, 'dante tan', NULL, NULL, 21, NULL, 1000.00, 'payment_receipt/english-flag-vector-675964.jpg', 1, 'initial', 'dante@gmail.com', '2024-11-28 01:26:00', '2024-11-28 01:26:07'),
(18, NULL, 'dxzcdzfsa fg', NULL, NULL, 22, NULL, 1000.00, 'payment_receipt/1657090503-9ynVP5V0Tx.jpg', 1, 'initial', 'sdfxcsdfsa@gmail.com', '2024-11-28 01:34:09', '2024-11-28 01:34:16'),
(19, NULL, 'czxc xv', NULL, NULL, 23, NULL, 1000.00, 'payment_receipt/20241115_210616.jpg', 1, 'initial', 'zxc@gmail.com', '2024-11-28 01:35:45', '2024-11-28 01:35:53'),
(20, NULL, 'dgsdff sdfsafaf', NULL, NULL, 24, NULL, 1000.00, 'payment_receipt/logo.png', 1, 'initial', 'sdfzscqwfewqsafrq@gmail.com', '2024-11-28 01:37:45', '2024-11-28 01:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_items`
--

CREATE TABLE `portfolio_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(191) NOT NULL,
  `project_link` varchar(191) DEFAULT NULL,
  `skills` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_items`
--

INSERT INTO `portfolio_items` (`id`, `title`, `description`, `image_url`, `project_link`, `skills`, `created_at`, `updated_at`) VALUES
(1, 'BIKEBROS', 'BIKEBROS is ecommerce platform', 'https://bikebros.net/site_logo/Logo%20bikebros%20negativo%20(1).png', 'https://bikebros.net/', 'Laravel,JavaScript,HTML/CSS,MySQL', '2024-12-09 09:36:51', '2024-12-09 09:36:51'),
(2, 'ACELERA', 'ACELERA is crowdfunding', 'https://acelera.biz/site_logo/logohorizontal.png', 'https://acelera.biz/', 'PHP,Laravel,JavaScript,HTML/CSS,MySQL', '2024-12-09 09:38:26', '2024-12-09 09:38:26'),
(3, 'HIFICLIQ', 'HIFICLIQ is ecommerce shopping platform', 'https://hificliq.com/assets/images/16892345711688970303WhatsApp%20Image%202023-07-10%20at%2011.52.28%20AM.jpeg', 'https://hificliq.com/', 'Laravel,JavaScript,Vue.js', '2024-12-09 09:40:13', '2024-12-09 09:40:13'),
(4, 'Hotel Shree Rajrajeshwar', 'Hotel Shree Rajrajeshwar is hotel and sweet shop', 'https://hotelshreerajrajeshwar.com/assets/images/logoIcon/logo.png', 'https://hotelshreerajrajeshwar.com/', 'PHP,Laravel,JavaScript,HTML/CSS,MySQL', '2024-12-09 09:42:29', '2024-12-09 09:42:29'),
(5, 'Cloud Technologies', 'Cloud Technologies is training & learning center', 'https://cloudstechnologies.in/asset/img/logo/logo.png', 'https://cloudstechnologies.in/', 'PHP,JavaScript,HTML/CSS,MySQL', '2024-12-09 09:45:21', '2024-12-09 09:45:21'),
(6, 'Akingsatta', 'Akingsatta is showing number', 'https://akingsatta.com/satta.png', 'https://akingsatta.com/', 'Laravel,MySQL', '2024-12-09 09:46:55', '2024-12-09 09:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` longtext DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `favorite` tinyint(1) DEFAULT NULL,
  `max_people` int(11) NOT NULL,
  `bedrooms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`bedrooms`)),
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`amenities`)),
  `property_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`property_images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `description`, `thumbnail`, `price`, `duration`, `rating`, `favorite`, `max_people`, `bedrooms`, `amenities`, `property_images`, `created_at`, `updated_at`) VALUES
(1, 'Habitación 01', 'Habitación 01\r\n4 Personas\r\nDesde Bs 21093.00 x hora\r\nEquipamiento ★ 4', 'uploads/property_thumbnails/1746341456-Rqd4omxYXv.jpg', '21093.00', NULL, NULL, NULL, 4, '[{\"title\":\"Bedromm1\",\"description\":\"1 double bed\",\"image\":\"uploads\\/bedrooms\\/1746264108-CUxyD5jKQL.jpg\"},{\"title\":\"bedroom2\",\"description\":\"2 single beds\",\"image\":\"uploads\\/bedrooms\\/1746264108-Ix6qdpd6S4.jpg\"}]', '[\"entertainment\",\"wifi\",\"ac\",\"jacuzzi\",\"playstation\",\"wardrobe\"]', '[\"uploads\\/property_images\\/1746345254-R9B4vPrTrN.jpg\",\"uploads\\/property_images\\/1746345254-iEvd6wxRyO.jpg\",\"uploads\\/property_images\\/1746345254-RddTbhHGzc.jpg\",\"uploads\\/property_images\\/1746345254-yQfjB4aMe4.jpg\",\"uploads\\/property_images\\/1746345254-6uhH150s2c.jpg\",\"uploads\\/property_images\\/1746345254-VBX2bcMjgM.jpg\"]', '2025-05-03 03:30:58', '2025-05-04 06:07:40'),
(4, 'Habitación 04', 'Habitación 04\r\n3 Personas\r\nDesde Bs 11423.00 x hora\r\nEquipamiento ★ 4.2', 'uploads/property_thumbnails/1746340537-OdW3kAuL9U.jpg', '11423.00', NULL, NULL, NULL, 3, '[{\"title\":\"Bedromm1\",\"description\":\"1 double bed\",\"image\":\"uploads\\/bedrooms\\/1746340537-sXG6fVQeU1.jpg\"},{\"title\":\"bedroom2\",\"description\":\"2 single beds\",\"image\":\"uploads\\/bedrooms\\/1746340537-YGOc7xZUBu.jpg\"}]', '[\"entertainment\",\"bed\",\"tv\",\"fridge\",\"microwave\",\"hot_shower\",\"pool\",\"bar\",\"hammocks\"]', '[\"uploads\\/property_images\\/1746345512-DzmVdtne8A.jpg\",\"uploads\\/property_images\\/1746345512-AsUwn1yna6.jpg\",\"uploads\\/property_images\\/1746345512-C4eWPU7ZeE.jpg\",\"uploads\\/property_images\\/1746345512-QjCDwcOgUJ.jpg\",\"uploads\\/property_images\\/1746345512-lS00YbbYZH.jpg\",\"uploads\\/property_images\\/1746345512-qiiDS6GBoI.jpg\"]', '2025-05-03 03:30:58', '2025-05-04 06:22:43'),
(5, 'Habitación 05', 'Habitación 05\r\n5 Personas\r\nDesde Bs 37213.00 x hora\r\nEquipamiento ★ 4.2', 'uploads/property_thumbnails/1746340596-mEeSAcmqSd.jpg', '37213.00', NULL, NULL, NULL, 5, '[{\"title\":\"Bedromm1\",\"description\":\"1 double bed\",\"image\":\"uploads\\/bedrooms\\/1746340596-66sxWwrY5g.jpg\"},{\"title\":\"bedroom2\",\"description\":\"2 single beds\",\"image\":\"uploads\\/bedrooms\\/1746340596-EQjSsPB3H9.jpg\"}]', '[\"entertainment\",\"fully_equipped\",\"bed\",\"wifi\",\"private_bathroom\",\"ac\",\"kitchen\",\"playstation\",\"alexa\",\"heating\"]', '[\"uploads\\/property_images\\/1746345573-siOpR9Zati.jpg\",\"uploads\\/property_images\\/1746345573-6NlxqKJvUn.jpg\",\"uploads\\/property_images\\/1746345573-s9svIDrvwo.jpg\",\"uploads\\/property_images\\/1746345573-dzAFmw9VIu.jpg\",\"uploads\\/property_images\\/1746345573-qumJma3JRd.jpg\"]', '2025-05-03 03:30:58', '2025-05-04 06:09:51'),
(6, 'Habitación 06', 'Habitación 06\r\n5 Personas\r\nDesde Bs 11921.00 x hora\r\nEquipamiento ★ 4.1', 'uploads/property_thumbnails/1746340654-dyrnvMUeLg.jpg', '11921.00', NULL, NULL, NULL, 5, '[{\"title\":\"Bedromm1\",\"description\":\"1 double bed\",\"image\":\"uploads\\/bedrooms\\/1746340654-kgdKsMzwHp.jpg\"},{\"title\":\"bedroom2\",\"description\":\"2 single beds\",\"image\":\"uploads\\/bedrooms\\/1746340654-bXdbOBL7Fo.jpg\"},{\"title\":\"common bedroom\",\"description\":\"double bed\",\"image\":\"uploads\\/bedrooms\\/1746345958-PfcF5doT0H.jpg\"}]', '[\"wifi\",\"private_bathroom\",\"ac\",\"kitchen\",\"chairs\",\"tables\",\"bar\",\"remotes\",\"sound_system\"]', '[\"uploads\\/property_images\\/1746346189-2CjJptfVn2.jpg\",\"uploads\\/property_images\\/1746346189-NsYMrizCM9.jpg\",\"uploads\\/property_images\\/1746346189-kCgvhxxXEr.jpg\",\"uploads\\/property_images\\/1746346189-pyrW4HOAIW.jpg\",\"uploads\\/property_images\\/1746346189-HPrAKGFdhj.jpg\",\"uploads\\/property_images\\/1746346189-Wsz4RgXBdw.jpg\",\"uploads\\/property_images\\/1746346189-wLoOwhOkZF.jpg\",\"uploads\\/property_images\\/1746346189-fJ8CwUPgiO.jpg\",\"uploads\\/property_images\\/1746346189-G6RYuBYgdG.jpg\"]', '2025-05-03 03:30:58', '2025-05-04 06:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('cool','bad','lol','sad') NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `news_id`, `type`, `count`, `created_at`, `updated_at`) VALUES
(1, 3, 'bad', 1, '2025-02-13 20:53:44', '2025-02-13 20:53:44'),
(2, 3, 'cool', 1, '2025-02-13 21:08:25', '2025-02-13 21:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `guests` int(10) UNSIGNED NOT NULL,
  `proof_path` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `user_id`, `full_name`, `email`, `phone`, `date`, `check_in_time`, `check_out_time`, `duration`, `amount`, `guests`, `proof_path`, `payment_status`, `created_at`, `updated_at`) VALUES
(7, 2, '25', 'Aasif Ahmed', 'aasifdev5@gmail.com', '5918878326802', '2025-05-05', '19:00:00', '12:30:00', NULL, NULL, 3, 'uploads/proofs/1746354351-c4B3rn89mA.png', 'confirmed', '2025-05-04 04:55:51', '2025-05-06 00:38:20'),
(8, 4, '25', 'Aasif Ahmed', 'aasifdev5@gmail.com', '5918878326802', '2025-05-07', '20:00:00', '23:00:00', NULL, NULL, 2, 'uploads/proofs/1746354438-cJEQ8uteV7.png', 'confirmed', '2025-05-04 04:57:18', '2025-05-04 04:57:18'),
(16, 2, '26', 'arsh ahmed', 'arstecht2a@gmail.com', '5915919589642080', '2025-05-07', '17:30:00', '18:00:00', NULL, NULL, 3, NULL, 'confirmed', '2025-05-06 02:38:13', '2025-05-06 02:52:37'),
(17, 2, '26', 'arsh ahmed', 'arstecht2a@gmail.com', '5915919589642080', '2025-05-07', '20:30:00', '22:00:00', NULL, NULL, 3, NULL, 'pending', '2025-05-06 02:39:32', '2025-05-06 02:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_key` varchar(255) NOT NULL,
  `option_value` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'ResidentMonkey', '2022-12-04 17:05:33', '2025-04-30 03:27:17'),
(2, 'app_email', 'ResidentMonkey@gmail.com', '2022-12-04 17:05:33', '2025-04-30 03:27:17'),
(3, 'app_contact_number', '+591 45626594', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(4, 'app_location', 'Bolivia', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(5, 'app_date_format', 'd F, Y', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(6, 'app_timezone', 'Asia/Dhaka', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(7, 'allow_preloader', NULL, '2022-12-04 17:05:33', '2025-05-03 04:29:32'),
(8, 'app_preloader', 'uploads/setting/1746266372-WPsGyYoeuC.png', '2022-12-04 17:05:33', '2025-05-03 04:29:32'),
(9, 'app_logo', 'uploads/setting/1746266372-Ra6I8cXfPd.png', '2022-12-04 17:05:33', '2025-05-03 04:29:32'),
(10, 'app_fav_icon', 'uploads/setting/1746003438-hjPBF4naK1.png', '2022-12-04 17:05:33', '2025-04-30 03:27:18'),
(11, 'app_copyright', 'ResidentMonkey', '2022-12-04 17:05:33', '2025-04-30 03:27:17'),
(12, 'app_developed', 'AAsif', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(13, 'og_title', 'LMSZAI - Learning Management System', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(14, 'og_description', 'Learning Management System', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(15, 'zoom_status', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(16, 'bbb_status', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(17, 'jitsi_status', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(18, 'jitsi_server_base_url', 'https://meet.jit.si/', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(19, 'registration_email_verification', '0', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(20, 'footer_quote', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(21, 'paystack_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(22, 'paystack_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(23, 'paystack_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(24, 'PAYSTACK_PUBLIC_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(25, 'PAYSTACK_SECRET_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(26, 'paypal_currency', 'AFA', '2022-12-04 17:05:33', '2024-10-27 01:16:43'),
(27, 'paypal_conversion_rate', '15', '2022-12-04 17:05:33', '2024-10-27 01:16:43'),
(28, 'paypal_status', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(29, 'PAYPAL_MODE', 'sandbox', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(30, 'PAYPAL_CLIENT_ID', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(31, 'PAYPAL_SECRET', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(32, 'stripe_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(33, 'stripe_conversion_rate', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(34, 'stripe_status', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(35, 'STRIPE_MODE', 'sandbox', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(36, 'STRIPE_SECRET_KEY', '', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(37, 'STRIPE_PUBLIC_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(38, 'razorpay_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(39, 'razorpay_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(40, 'razorpay_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(41, 'RAZORPAY_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(42, 'RAZORPAY_SECRET', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(43, 'mollie_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(44, 'mollie_conversion_rate', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(45, 'mollie_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(46, 'MOLLIE_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(47, 'im_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(48, 'im_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(49, 'im_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(50, 'IM_API_KEY', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(51, 'IM_AUTH_TOKEN', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(52, 'IM_URL', 'https://test.instamojo.com/api/1.1/payment-requests/', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(53, 'sslcommerz_currency', 'AFA', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(54, 'sslcommerz_conversion_rate', '1', '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(55, 'sslcommerz_status', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(56, 'sslcommerz_mode', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(57, 'SSLCZ_STORE_ID', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(58, 'SSLCZ_STORE_PASSWD', NULL, '2022-12-04 17:05:33', '2024-06-07 06:34:59'),
(59, 'MAIL_DRIVER', 'smtp', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(60, 'MAIL_HOST', 'smtp.hostinger.com', '2022-12-04 17:05:33', '2025-01-14 01:39:52'),
(61, 'MAIL_PORT', '465', '2022-12-04 17:05:33', '2025-01-14 01:39:52'),
(62, 'MAIL_USERNAME', 'gen@negociosgen.com', '2022-12-04 17:05:33', '2025-01-14 01:39:52'),
(63, 'MAIL_PASSWORD', 'zJ0O8[W5', '2022-12-04 17:05:33', '2025-01-14 01:39:52'),
(64, 'MAIL_ENCRYPTION', 'tls', '2022-12-04 17:05:33', '2024-06-07 06:29:46'),
(65, 'MAIL_FROM_ADDRESS', 'gen@negociosgen.com', '2022-12-04 17:05:33', '2025-01-14 01:39:52'),
(66, 'MAIL_FROM_NAME', 'Negociosgen', '2022-12-04 17:05:33', '2025-01-14 01:39:52'),
(67, 'MAIL_MAILER', 'smtp', '2022-12-04 17:05:33', '2024-10-27 00:59:40'),
(68, 'update', 'Update', '2022-12-04 17:05:33', '2024-03-07 06:41:34'),
(69, 'sign_up_left_text', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(70, 'sign_up_left_image', 'uploads_demo/home/hero-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(71, 'forgot_title', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(72, 'forgot_subtitle', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(73, 'forgot_btn_name', 'Reset', '2022-12-04 17:05:33', '2025-01-13 01:02:41'),
(74, 'facebook_url', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(75, 'twitter_url', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(76, 'linkedin_url', NULL, '2022-12-04 17:05:33', '2024-06-07 01:01:03'),
(77, 'youtube_url', 'https://www.youtube.com/', '2022-12-04 17:05:33', '2025-01-13 01:02:06'),
(78, 'app_instructor_footer_title', 'Join One Of The World’s Largest Learning Marketplaces.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(79, 'app_instructor_footer_subtitle', 'Donald valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my tree', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(80, 'get_in_touch_title', 'get', '2022-12-04 17:05:33', '2025-01-13 05:31:45'),
(81, 'send_us_msg_title', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(82, 'contact_us_location', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(83, 'contact_us_email_one', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(84, 'contact_us_email_two', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(85, 'contact_us_phone_one', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(86, 'contact_us_phone_two', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(87, 'contact_us_map_link', NULL, '2022-12-04 17:05:33', '2024-06-07 08:01:53'),
(88, 'contact_us_description', 'desc', '2022-12-04 17:05:33', '2025-01-13 05:41:10'),
(89, 'faq_title', 'Frequently Ask Questions.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(90, 'faq_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(91, 'faq_image_title', 'Still no luck?', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(92, 'faq_image', 'uploads_demo/setting\\faq-img.jpg', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(93, 'faq_tab_first_title', 'Item Support', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(94, 'faq_tab_first_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(95, 'faq_tab_sec_title', 'Licensing', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(96, 'faq_tab_sec_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(97, 'faq_tab_third_title', 'Your Account', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(98, 'faq_tab_third_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(99, 'faq_tab_four_title', 'Tax & Complications', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(100, 'faq_tab_four_subtitle', 'Ranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that was a greater artist than now. When, while the lovely valley with vapour around me, and the meridian', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(101, 'home_special_feature_first_logo', 'uploads_demo/setting\\feature-icon1.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(102, 'home_special_feature_first_title', 'Learn From Experts', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(103, 'home_special_feature_first_subtitle', 'Mornings of spring which I enjoy with my whole heart about the gen', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(104, 'home_special_feature_second_logo', 'uploads_demo/setting/feature-icon2.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(105, 'home_special_feature_second_title', 'Earn a Certificate', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(106, 'home_special_feature_second_subtitle', 'Mornings of spring which I enjoy with my whole heart about the gen', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(107, 'home_special_feature_third_logo', 'uploads_demo/setting\\feature-icon3.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(108, 'home_special_feature_third_title', '5000+ Courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(109, 'home_special_feature_third_subtitle', 'Serenity has taken possession of my entire soul, like these sweet spring', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(110, 'course_logo', 'uploads_demo/setting/courses-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(111, 'course_title', 'A Broad Selection Of Courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(112, 'course_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(113, 'bundle_course_logo', 'uploads_demo/setting/bundle-courses-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(114, 'bundle_course_title', 'Latest Bundle Courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(115, 'bundle_course_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(116, 'top_category_logo', 'uploads_demo/setting/categories-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(117, 'top_category_title', 'Our Top Categories', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(118, 'top_category_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(119, 'top_instructor_logo', 'uploads_demo/setting\\top-instructor-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(120, 'top_instructor_title', 'Top Rated Courses From Our Top Instructor.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(121, 'top_instructor_subtitle', 'CHOOSE FROM 5,000 ONLINE VIDEO COURSES WITH NEW ADDITIONS', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(122, 'become_instructor_video', 'uploads_demo/setting/test.mp4', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(123, 'become_instructor_video_preview_image', 'uploads_demo/setting/video-poster.jpg', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(124, 'become_instructor_video_logo', 'uploads_demo/setting/top-instructor-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(125, 'become_instructor_video_title', 'We Only Accept Professional Courses Form Professional Instructors', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(126, 'become_instructor_video_subtitle', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(127, 'customer_say_logo', 'uploads_demo/setting/customers-say-heading-img.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(128, 'customer_say_title', 'What Our Valuable Customers Say.', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(129, 'customer_say_first_name', 'DANIEL JHON', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(130, 'customer_say_first_position', 'UI/UX DESIGNER', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(131, 'customer_say_first_comment_title', 'Great instructor, great course', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(132, 'customer_say_first_comment_description', 'Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(133, 'customer_say_first_comment_rating_star', '5', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(134, 'customer_say_second_name', 'NORTH', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(135, 'customer_say_second_position', 'DEVELOPER', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(136, 'customer_say_second_comment_title', 'Awesome course & good response', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(137, 'customer_say_second_comment_description', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(138, 'customer_say_second_comment_rating_star', '4.5', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(139, 'customer_say_third_name', 'HIBRUPATH', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(140, 'customer_say_third_position', 'MARKETER', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(141, 'customer_say_third_comment_title', 'Fantastic course', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(142, 'customer_say_third_comment_description', 'Noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(143, 'customer_say_third_comment_rating_star', '5', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(144, 'achievement_first_logo', 'uploads_demo/setting\\1.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(145, 'achievement_first_title', 'Successfully trained', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(146, 'achievement_first_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(147, 'achievement_second_logo', 'uploads_demo/setting\\2.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(148, 'achievement_second_title', 'Video courses', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(149, 'achievement_second_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(150, 'achievement_third_logo', 'uploads_demo/setting\\3.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(151, 'achievement_third_title', 'Expert instructor', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(152, 'achievement_third_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(153, 'achievement_four_logo', 'uploads_demo/setting\\4.png', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(154, 'achievement_four_title', 'Proudly Received', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(155, 'achievement_four_title', 'Proudly Received', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(156, 'achievement_four_subtitle', '2000+ students', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(157, 'support_faq_title', 's', '2022-12-04 17:05:33', '2025-01-13 01:31:35'),
(158, 'support_faq_subtitle', 'g', '2022-12-04 17:05:33', '2025-01-13 01:31:35'),
(159, 'ticket_title', 'dfgg', '2022-12-04 17:05:33', '2025-01-13 01:31:35'),
(160, 'ticket_subtitle', 'd', '2022-12-04 17:05:33', '2025-01-13 01:31:35'),
(161, 'cookie_button_name', 'Allow cookies', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(162, 'cookie_msg', 'Your experience on this site will be improved by allowing cookies', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(163, 'COOKIE_CONSENT_STATUS', '1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(164, 'platform_charge', '3', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(165, 'sell_commission', '10', '2022-12-04 17:05:33', '2024-10-27 00:11:55'),
(166, 'app_version', '21', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(167, 'current_version', '6.1', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(262, 'currency_id', '11', '2024-03-07 01:46:36', '2024-10-27 00:11:55'),
(263, 'FORCE_HTTPS', 'false', '2024-03-07 01:46:36', '2024-03-07 01:46:36'),
(264, 'language_id', '4', '2024-03-07 01:46:36', '2025-01-27 00:14:39'),
(265, 'TIMEZONE', 'UTC', '2024-03-07 01:46:36', '2025-01-13 01:02:06'),
(266, 'pwa_enable', '0', '2024-03-07 01:46:36', '2024-03-07 01:46:36'),
(267, 'instagram_url', NULL, '2024-03-07 01:46:36', '2024-06-07 01:01:03'),
(268, 'tiktok_url', NULL, '2024-03-07 01:46:36', '2024-06-07 01:01:03'),
(269, 'app_black_logo', 'uploads/setting/1746266372-4ecWbLLxiK.png', '2024-03-07 01:46:37', '2025-05-03 04:29:32'),
(270, 'app_pwa_icon', NULL, '2024-03-07 01:46:37', '2024-03-07 01:46:37'),
(271, 'theme', '1', '2024-03-07 06:41:34', '2024-03-07 06:43:45'),
(272, 'mercado_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(273, 'mercado_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(274, 'mercado_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(275, 'MERCADO_PAGO_CLIENT_ID', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(276, 'MERCADO_PAGO_CLIENT_SECRET', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(277, 'flutterwave_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(278, 'flutterwave_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(279, 'flutterwave_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(280, 'FLW_PUBLIC_KEY', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(281, 'FLW_SECRET_KEY', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(282, 'FLW_SECRET_HASH', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(283, 'coinbase_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(284, 'coinbase_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(285, 'coinbase_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(286, 'coinbase_mode', 'sandbox', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(287, 'coinbase_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(288, 'zitopay_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(289, 'zitopay_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(290, 'zitopay_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(291, 'zitopay_username', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(292, 'iyzipay_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(293, 'iyzipay_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(294, 'iyzipay_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(295, 'iyzipay_mode', 'sandbox', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(296, 'iyzipay_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(297, 'iyzipay_secret', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(298, 'bitpay_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(299, 'bitpay_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(300, 'bitpay_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(301, 'bitpay_mode', 'testnet', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(302, 'bitpay_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(303, 'braintree_currency', 'AFA', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(304, 'braintree_conversion_rate', '1', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(305, 'braintree_status', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(306, 'braintree_test_mode', '0', '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(307, 'braintree_merchant_id', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(308, 'braintree_public_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(309, 'braintree_private_key', NULL, '2024-06-07 06:34:59', '2024-06-07 06:34:59'),
(310, 'app_footer_payment_image', 'uploads/setting/1746003438-kVUMsk0Wxr.png', '2024-10-27 00:11:55', '2025-04-30 03:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactivated',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `image`, `name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Management', 'Management', 1, '2025-01-13 07:19:36', NULL, '2025-01-13 07:19:36'),
(2, NULL, 'Web Development', 'Web Development', 1, NULL, NULL, '2025-01-13 07:10:02'),
(3, NULL, 'Mobile Development', 'Mobile Development', 1, NULL, NULL, '2025-01-13 07:10:02'),
(4, 'uploads/upgrade_skill/1736772002mqiQKWodZL.jpg', 'Mobile App', 'App', 1, NULL, '2025-01-13 07:10:02', '2025-01-13 07:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', NULL, NULL),
(2, 1, 'Khulna', NULL, NULL),
(3, 1, 'Comilla', NULL, NULL),
(4, 2, 'California', NULL, NULL),
(5, 2, 'Texas', NULL, NULL),
(6, 2, 'Florida', NULL, NULL),
(7, 3, 'Argyll', NULL, NULL),
(8, 3, 'Belfast', NULL, NULL),
(9, 3, 'Cambridge', NULL, NULL),
(11, 1, 'Khulna', '2024-06-07 05:59:39', '2024-06-07 06:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `uuid`, `parent_category_id`, `category_id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `og_image`, `created_at`, `updated_at`) VALUES
(44, 'ecf4cc39-3639-49c4-99bd-9994668c41f9', 9, 3, 'freno mt200', 'freno-mt200', 'freno mt200', 'mt200', 'mt200', 'uploads/meta/1719596399-6qvFp0pEZU.jpg', '2024-06-28 17:39:59', '2024-06-28 17:50:38'),
(53, '7de43eb4-f859-416b-b333-cfbe2bbde783', NULL, 52, 'Child preuba', 'Child-preuba', 'Child preuba', 'Child preuba', 'Child preuba', 'uploads/meta/1723257754-lPN8u3HP0x.png', '2024-08-10 02:42:34', '2024-08-10 02:42:34'),
(58, 'fd2d0d76-390e-437b-a41c-2f0bf99524e5', 15, 0, 'Llanta burro', 'Llanta-burro', 'Llanta burro', 'Llanta burro', 'Llanta burro', 'uploads/meta/1723590042-gFjczrYmBf.jpeg', '2024-08-13 23:00:42', '2024-08-13 23:00:42'),
(59, '1108950a-84c7-437a-b2f9-e6732170a88d', 15, 58, 'rombo', 'rombo', 'rombo', 'rombo', 'rombo', NULL, '2024-08-13 23:01:13', '2024-08-13 23:01:13'),
(62, '9ad33cba-9a94-41be-9a22-71718f0613c1', 19, 0, '29deagosto', '29deagosto', '29deagosto', '29deagosto', '29deagosto', 'uploads/meta/1723763227-mrdb40BySs.jpeg', '2024-08-15 23:07:07', '2024-08-15 23:07:07'),
(63, '0ffc23dc-ec92-4649-9786-19b9e18dbc03', 19, 62, '1995', '1995', '1995', '1995', '1995', 'uploads/meta/1723763268-15p211Zh18.jpeg', '2024-08-15 23:07:48', '2024-08-15 23:07:48'),
(64, '415b25ff-d050-4aa6-891d-7d5654845181', 19, 62, '1222', '1222', NULL, NULL, NULL, NULL, '2024-08-15 23:10:39', '2024-08-15 23:10:39'),
(67, 'c5effd9d-9e39-40c1-9ea6-7346c19a9efc', 19, 0, 'subcat', 'subcat', 'subcat', 'subcat', 'subcat', 'uploads/meta/1723780777-1WOw8Ga9bQ.png', '2024-08-16 03:59:37', '2024-08-16 03:59:37'),
(68, '3d2046ed-f4f6-49fb-baf4-0a480b9c639f', 19, 67, 'childcat', 'childcat', 'childcat', 'childcat', 'childcat', NULL, '2024-08-16 04:00:09', '2024-08-16 04:00:09'),
(69, '9290b665-3717-4e39-8794-9bda8ce23b75', 25, 0, 'Arsh', 'Arsh', 'arsh', 'arsh', 'arsh', NULL, '2024-08-16 04:24:59', '2024-09-04 13:20:04'),
(70, '71a5cbfe-c985-43e7-a184-bbfd80858fa5', 19, 0, 'pruebasub3', 'pruebasub3', 'pruebasub3', 'pruebasub3', 'pruebasub3', 'uploads/meta/1723785002-G3aBx6d0FN.png', '2024-08-16 05:10:02', '2024-08-16 05:10:02'),
(71, 'e9c564f2-de7e-4c1d-abcc-d85aff8b4e11', 19, 0, 'Subcat2', 'Subcat2', 'Subcat2', 'Subcat2', 'Subcat2', 'uploads/meta/1723786291-4FqPI5VBKe.png', '2024-08-16 05:31:31', '2024-08-16 05:31:31'),
(72, '39bbb804-8f29-4b8c-8b92-b947dbd8b16e', 19, 71, 'childcat2', 'childcat2', 'childcat2', 'childcat2', 'childcat2', NULL, '2024-08-16 05:32:00', '2024-08-16 05:32:00'),
(73, '29df4a76-42c1-4eaa-b461-85e94ca83919', 19, 0, 'subprueba', 'subprueba', 'subprueba', 'subprueba', 'subprueba', 'uploads/meta/1723810621-HffDFZKf5n.jpg', '2024-08-16 12:17:01', '2024-08-16 12:17:01'),
(74, '69f68086-e711-4618-914b-c99f0aed4592', 19, 73, 'childprueba', 'childprueba', 'childprueba', 'childprueba', 'childprueba', NULL, '2024-08-16 12:17:39', '2024-08-16 12:17:39'),
(75, '00c505c1-87d2-42ad-bbdb-b61719e46c0e', 20, 0, 'Silhouette', 'Silhouette', 'Silhouette', 'Silhouette', 'Silhouette', 'uploads/meta/1723813794-akLzOUDO9e.jpeg', '2024-08-16 13:09:54', '2024-08-16 13:09:54'),
(76, '4763fe5c-db81-49e5-98e9-029ecb4877c7', 20, 75, 'Cameo4', 'Cameo4', 'Cameo4', 'Cameo4', 'Cameo4', NULL, '2024-08-16 13:10:14', '2024-08-16 13:10:14'),
(77, 'dd480a4d-4c22-42a2-8a4a-50e9e7a41251', 21, 0, 'TIENDA 1', 'TIENDA-1', 'TIENDA 1', 'TIENDA 1', 'TIENDA 1', 'uploads/meta/1724342941-s6iAdUfQlA.jpeg', '2024-08-22 16:09:01', '2024-08-22 16:09:01'),
(78, '68feb447-da8e-4313-8241-e9c047757690', 21, 77, 'Neco', 'Neco', 'Neco', 'Neco', 'Neco', NULL, '2024-08-22 16:09:29', '2024-08-22 16:09:29'),
(79, '880fa0f9-80ca-4a2c-acb1-800025cae89b', 22, 0, 'SubCateSep', 'SubCateSep', 'SubCateSep', 'SubCateSep', 'SubCateSep', 'uploads/meta/1725370686-xYsYkp1k8r.jpg', '2024-09-03 13:38:06', '2024-09-03 13:38:06'),
(80, '10e76f81-03c1-4500-9e80-5f29fe090de1', 22, 79, 'Enero', 'Enero', 'Enero', 'Enero', 'Enero', NULL, '2024-09-03 13:39:13', '2024-09-03 13:39:13'),
(81, '80672d94-30e6-48cf-80bf-f9a41d946055', 22, 79, 'Febrero', 'Febrero', 'Febrero', 'Febrero', 'Febrero', NULL, '2024-09-03 13:39:39', '2024-09-03 13:39:39'),
(83, 'd1f657df-8a99-474c-8864-a636655d3102', 9, 69, 'testing cheild', 'testing-cheild', 'testing cheild', 'testing cheild', 'testing cheild', NULL, '2024-09-04 04:42:32', '2024-09-04 04:42:32'),
(86, '51abc97e-cd8e-4a09-bfa9-a39329e2374b', 9, 0, 'subcategory testasd', 'subcategory-testasd', 'subcategory test', 'subcategory test', 'subcategory test', NULL, '2024-09-04 05:18:35', '2024-09-04 05:19:04'),
(87, '9766a727-28de-4ec9-bddf-bbb93367d9be', 9, 86, 'childcategory test final', 'childcategory-test-final', 'childcategory test', 'childcategory test', 'childcategory test', NULL, '2024-09-04 05:24:16', '2024-09-04 05:24:51'),
(88, '46534f41-15b2-4600-9071-d83190c40b6a', 24, 0, 'sdfadsad', 'sdfadsad', 'sdfadsad', 'sdfadsad', 'sdfadsad', NULL, '2024-09-04 13:13:57', '2024-09-04 13:13:57'),
(89, 'f410f72d-b29a-4dcf-a1de-35e67782ae5a', 25, 69, 'asdadsadadsadadsad', 'asdadsadadsadadsad', NULL, NULL, NULL, NULL, '2024-09-04 13:20:56', '2024-09-04 13:20:56'),
(90, '878dbb64-d688-4f81-bfc3-bdd5bf4d7ab3', 26, 0, 'Días', 'Días', 'Días', 'Días', 'Días', 'uploads/meta/1725465943-WVnyJQYVce.jpg', '2024-09-04 16:05:43', '2024-09-04 16:05:43'),
(91, '0c63434d-700b-4f1b-804c-9319cbb368cd', 26, 90, 'Lunes', 'Lunes', 'Lunes', 'Lunes', 'Lunes', NULL, '2024-09-04 16:06:04', '2024-09-04 16:06:04'),
(92, 'f2da7143-9160-4f9e-ace0-d60a8d5a166a', 26, 90, 'Martes', 'Martes', 'Martes', 'Martes', 'Martes', NULL, '2024-09-04 16:06:25', '2024-09-04 16:06:25'),
(93, 'd8328afd-5f0e-451d-8fac-1f8657d43f7b', 26, 90, 'Miercoles', 'Miercoles', 'Miercoles', 'Miercoles', 'Miercoles', NULL, '2024-09-04 16:06:45', '2024-09-04 16:06:45'),
(164, '0e738fca-a05a-45d2-97c7-9a43d6bcaf17', 7, 0, 'Arshfdfrt', 'Arshfdfrt', NULL, NULL, NULL, NULL, '2024-10-30 08:00:02', '2024-10-30 08:03:08'),
(165, 'cdd6cdf7-c206-411a-9d4f-f8e8b7aed740', 14, 0, 'fgsdfsa', 'fgsdfsa', NULL, NULL, NULL, NULL, '2024-10-30 08:01:05', '2024-10-30 08:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_questions`
--

CREATE TABLE `support_ticket_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_ticket_questions`
--

INSERT INTO `support_ticket_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, '¿Cómo me registro en la plataforma?', 'Para registrarte, simplemente haz clic en el botón \"Registrarse\" en la parte superior de la página. Completa los campos con tu información personal y sigue los pasos para activar tu cuenta.', '2022-12-04 17:05:33', '2025-01-13 01:31:54'),
(2, '¿Qué beneficios obtengo al ser miembro?', 'Como miembro, tendrás acceso ilimitado a todos nuestros cursos de desarrollo personal, coaching, entrenamientos y seminarios. Además, podrás generar ingresos extra a través de nuestro sistema de afiliados multinivel y disfrutar de descuentos en diversas empresas asociadas.', '2022-12-04 17:05:33', '2025-01-13 01:31:54'),
(3, '¿Cómo puedo acceder a los cursos y coaching?', 'Una vez que te hayas registrado y activado tu membresía, podrás acceder a todos los cursos y sesiones de coaching directamente desde tu panel de usuario. Los videos estarán disponibles para ver en cualquier momento.', '2022-12-04 17:05:33', '2025-01-13 01:31:54'),
(4, '¿Qué es el sistema de afiliados multinivel?', 'Nuestro sistema de afiliados multinivel te permite ganar comisiones recomendando nuestra plataforma a otras personas. A medida que tus referidos se registran y compran membresías, podrás recibir ganancias en varios niveles de profundidad.', '2022-12-04 17:05:33', '2025-01-13 01:31:54'),
(5, '¿Cómo puedo generar ingresos extra?', 'Puedes generar ingresos extra recomendando la plataforma a otros a través del sistema de marketing multinivel. Además, tendrás acceso a herramientas exclusivas que te ayudarán a promover nuestro contenido y crecer tu red de contactos.', '2022-12-04 17:05:33', '2025-01-13 01:31:54'),
(10, '¿Qué es GEN y cómo funciona?', 'GEN es una plataforma que ofrece cursos especializados en marketing y coaching, junto con un sistema de afiliados multinivel que te permite ganar comisiones promoviendo nuestros productos. Para comenzar, solo tienes que registrarte, acceder a nuestros cursos y empezar a aprender o promover.', '2024-12-02 01:17:55', '2025-01-13 01:31:54'),
(11, '¿Cómo me registro en GEN?', 'Puedes registrarte directamente en nuestra página de registro completando el formulario con tus datos personales. Recibirás un correo de confirmación para activar tu cuenta.', '2024-12-02 01:17:55', '2025-01-13 01:31:54'),
(12, '¿Qué métodos de pago aceptan?', 'Aceptamos pagos con tarjeta de crédito, débito y transferencias bancarias. Además, contamos con opciones de pago mediante plataformas como PayPal y otros servicios locales en Bolivia.', '2024-12-02 01:17:55', '2025-01-13 01:31:54'),
(13, '¿Cómo puedo acceder a los cursos que compré?', 'Una vez completada tu compra, los cursos estarán disponibles en tu cuenta en la sección de \"Mis Cursos\". Solo inicia sesión, selecciona el curso que compraste y comienza a aprender.', '2024-12-02 01:17:55', '2025-01-13 01:31:54'),
(14, '¿Cómo funciona el sistema de afiliados?', 'El sistema de afiliados de GEN te permite ganar comisiones por referir a otros usuarios a nuestros cursos y productos. Puedes compartir tu enlace de afiliado personalizado, y cada vez que alguien realice una compra usando ese enlace, recibirás una comisión.', '2024-12-02 01:17:55', '2025-01-13 01:31:54'),
(15, '¿Puedo solicitar un reembolso?', 'Sí, ofrecemos reembolsos dentro de los primeros 14 días desde la compra del curso, siempre que no hayas completado más del 20% del contenido. Para más detalles, revisa nuestros Términos y Condiciones de Reembolso.', '2024-12-02 01:17:55', '2025-01-13 01:31:54'),
(16, 'test', 'df', '2025-01-13 01:31:54', '2025-01-13 01:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `uuid`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'd45fd1e7-a1e0-4d3f-954d-bd56dc95e48f', 'Design', 'design', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(2, '90bfec22-452f-42f4-b9aa-03c053aecc24', 'Development', 'development', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(3, 'b375ca10-66e9-43c1-8593-a6bdcc8ab3d9', 'IT', 'it', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(4, 'eecd9f5d-f023-4fe2-afcb-23b9ccc558b9', 'Programming', 'programming', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(5, '8f9fbd32-7878-443a-a531-faf1c4428b31', 'Travel', 'travel', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(6, '235b8c44-a340-4929-a48c-6238314d6af4', 'Music', 'music', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(7, '36ec1ef2-5bca-4d06-9446-a5d8ab6abdab', 'Digital marketing', 'digital-marketing', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(8, 'd8dc6caa-b578-49f6-aaca-e25783afe34b', 'Science', 'science', '2022-12-04 17:05:33', '2022-12-04 17:05:33'),
(9, '346c01be-ab53-406f-acc4-73c5fddc0b6f', 'Math', 'math', '2022-12-04 17:05:33', '2022-12-04 17:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `image`, `name`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'uploads_demo/team_member/1.jpg', 'Arnold keens', 'CREATIVE DIRECTOR', '2022-12-04 17:05:33', '2025-01-13 06:32:57'),
(2, 'uploads_demo/team_member/2.jpg', 'James Bond', 'Designer', '2022-12-04 17:05:33', '2025-01-13 06:32:57'),
(3, 'uploads_demo/team_member/3.jpg', 'Ketty Perry', 'Customer Support', '2022-12-04 17:05:33', '2025-01-13 06:32:57'),
(4, 'uploads_demo/team_member/4.jpg', 'Scarlett Johansson', 'CREATIVE DIRECTOR', '2022-12-04 17:05:33', '2025-01-13 06:32:57'),
(5, NULL, 'arsh', 'Full', '2025-01-13 06:32:57', '2025-01-13 06:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(191) NOT NULL,
  `client_role` varchar(191) NOT NULL,
  `client_image_url` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `client_role`, `client_image_url`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Ivan Doe', 'CEO, Proshop', 'uploads/testimonials/1733736829-rCMX2mOAut.png', 'Working with Aasif has been exceptional. His expertise in Laravel development is commendable...', '2024-12-09 09:33:49', '2024-12-09 09:33:49'),
(2, 'Mohammed Alqatqat', 'Marketing Director, Sky Forecasting', 'uploads/testimonials/1733736865-9gLkQycIjq.png', 'Aasif showed exceptional proficiency and professionalism in our Laravel project. His outstanding communication ensured all deadlines were met...', '2024-12-09 09:34:25', '2024-12-09 09:34:25'),
(3, 'Nick Dinucci', 'CTO, Company C', 'uploads/testimonials/1733736905-EItY2LJ41C.png', 'Working with Aasif on Upwork was a truly outstanding experience. Their professionalism, clear communication, and exceptional backend development skills were evident throughout the project...', '2024-12-09 09:35:05', '2024-12-09 09:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=Open, 2=Closed',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priority_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `uuid`, `ticket_number`, `name`, `email`, `subject`, `status`, `user_id`, `department_id`, `related_service_id`, `priority_id`, `created_at`, `updated_at`) VALUES
(12, '430f9845-4c6f-42c5-92cb-e4725b543f76', 'TCK-672F59AF68576', 'aasif', 'aasifdev5@gmail.com', 'i need to know abot gen', 1, 5, 2, 4, 1, '2024-11-09 07:16:39', '2024-11-09 07:16:39'),
(13, 'ed8262de-f76b-4ca9-b999-5f7327c23fad', 'TCK-672F5A7FB7BBA', 'aasif', 'aasifdev5@gmail.com', 'Welcome to Sky Forecasting', 1, 5, 2, 4, 1, '2024-11-09 07:20:07', '2024-11-09 07:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_departments`
--

CREATE TABLE `ticket_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_departments`
--

INSERT INTO `ticket_departments` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(2, '0697c6e0-dfca-45df-aead-3500fe1cbfe3', 'it', '2024-11-07 02:10:04', '2024-11-07 02:10:04'),
(3, '043ebb7e-6573-45f2-a55e-7f6d0e6a249b', 'Arsh', '2025-01-13 01:32:06', '2025-01-13 01:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_admin_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_messages`
--

INSERT INTO `ticket_messages` (`id`, `ticket_id`, `sender_user_id`, `reply_admin_user_id`, `message`, `file`, `created_at`, `updated_at`) VALUES
(5, 6, NULL, 1, 'test', NULL, '2024-11-09 06:34:43', '2024-11-09 06:34:43'),
(6, 12, NULL, 1, 'gen is course lareaning platforma nd mlm', NULL, '2024-11-11 00:55:10', '2024-11-11 00:55:10'),
(7, 12, NULL, 5, 'how can i earn from it', NULL, '2024-11-11 00:56:38', '2024-11-11 00:56:38'),
(8, 12, NULL, 1, 'by refering course', NULL, '2024-11-11 01:27:40', '2024-11-11 01:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(1, '69cbc017-10dd-4d8e-823b-ce097a2dc092', 'Important', '2024-06-07 07:38:48', '2024-06-07 07:38:48'),
(2, '3531867a-fcda-4185-bf5d-8fda554cc86e', 'Important', '2024-06-07 07:39:04', '2024-06-07 07:39:04'),
(3, 'b1ccffbc-01f7-4fbd-bd81-bedb258e3b3f', 'very important', '2024-11-07 02:09:48', '2024-11-07 02:09:48'),
(4, 'f73327ed-90a8-4229-8ee9-278ff0e03f99', 'Arsh', '2025-01-13 01:32:29', '2025-01-13 01:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_related_services`
--

CREATE TABLE `ticket_related_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_related_services`
--

INSERT INTO `ticket_related_services` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(4, '80e3aa9f-69d7-48d3-a39e-8ca644321269', 'sad', '2024-11-07 02:09:27', '2024-11-07 02:09:27'),
(5, '3e0ff5db-5b22-4872-8972-0121ba30b560', 'Arsh', '2025-01-13 01:32:44', '2025-01-13 01:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `profile_photo` varchar(255) DEFAULT NULL,
  `mode` varchar(255) NOT NULL DEFAULT 'light',
  `account_type` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `is_subscribed` tinyint(1) DEFAULT NULL,
  `refer` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT '0',
  `is_online` tinyint(4) DEFAULT 0,
  `last_seen` timestamp NULL DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `role` int(11) DEFAULT 2,
  `permissions` varchar(255) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `custom_password` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(191) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `is_system` tinyint(4) DEFAULT 0,
  `id_number` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `language` varchar(191) NOT NULL DEFAULT '''en''',
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `is_active`, `profile_photo`, `mode`, `account_type`, `balance`, `is_subscribed`, `refer`, `level`, `is_online`, `last_seen`, `birth_date`, `role`, `permissions`, `name`, `email`, `email_verified_at`, `password`, `custom_password`, `mobile_number`, `about`, `city`, `facebook`, `instagram`, `linkedin`, `twitter`, `address`, `status`, `remember_token`, `ip_address`, `is_system`, `id_number`, `country`, `created_by`, `deleted_at`, `language`, `is_super_admin`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '', 'dark', 'admin', NULL, 0, NULL, NULL, 1, '2025-05-13 01:16:23', NULL, 1, NULL, 'SUPER ADMINISTRADOR', 'admin@monkeyresident.com', '2023-03-23 07:45:02', '$2y$10$2Xg3cj6N2RMrVNhMvzL6hu5vkvjZ.zOMsFrTICTE40rT1paV6CtP6', '987654321', '8878326802', NULL, 'bolivia', NULL, NULL, NULL, NULL, 'sdfafa', 1, NULL, '127.0.0.1', 1, '1', '1', NULL, NULL, 'es', 1, '2023-03-23 07:45:02', '2025-05-13 01:16:23'),
(25, NULL, 1, NULL, 'light', 'user', NULL, NULL, NULL, '0', 0, '2025-05-04 01:41:43', NULL, 2, NULL, 'Aasif Ahmed', 'aasifdev5@gmail.com', NULL, '$2y$10$l5ggVnf3OcWjblMDyHXXt.nd5LqlZbnzsHz0ORafPRv2MKeADg5/6', NULL, '5918878326802', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '\'en\'', 0, '2025-05-04 03:21:45', '2025-05-04 05:41:43'),
(26, NULL, 1, NULL, 'light', 'user', NULL, NULL, NULL, '0', 0, NULL, NULL, 2, NULL, 'arsh ahmed', 'arstecht2a@gmail.com', NULL, '$2y$10$4HqUdUVQjD40WY5ULbRIi.4Cul3JJuQaEje1gyxdhk94lS3qgXyMu', NULL, '5915919589642080', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '\'en\'', 0, '2025-05-05 23:28:39', '2025-05-05 23:33:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_gallery_images`
--
ALTER TABLE `about_us_gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_generals`
--
ALTER TABLE `about_us_generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_uuid_unique` (`uuid`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_uuid_unique` (`uuid`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_uuid_unique` (`uuid`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_issues`
--
ALTER TABLE `contact_us_issues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_us_issues_uuid_unique` (`uuid`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_folder_id_foreign` (`folder_id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_categories_uuid_unique` (`uuid`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_posts_uuid_unique` (`uuid`);

--
-- Indexes for table `forum_post_comments`
--
ALTER TABLE `forum_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forum_post_comments_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_unique` (`language`),
  ADD UNIQUE KEY `languages_iso_code_unique` (`iso_code`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_templates_alias_unique` (`alias`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metas_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_uuid_unique` (`uuid`);

--
-- Indexes for table `our_histories`
--
ALTER TABLE `our_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_uuid_unique` (`uuid`);

--
-- Indexes for table `support_ticket_questions`
--
ALTER TABLE `support_ticket_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_uuid_unique` (`uuid`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_departments_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_priorities_uuid_unique` (`uuid`);

--
-- Indexes for table `ticket_related_services`
--
ALTER TABLE `ticket_related_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_related_services_uuid_unique` (`uuid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_name_index` (`name`),
  ADD KEY `users_email_index` (`email`),
  ADD KEY `users_phone_index` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_gallery_images`
--
ALTER TABLE `about_us_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us_generals`
--
ALTER TABLE `about_us_generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us_issues`
--
ALTER TABLE `contact_us_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_post_comments`
--
ALTER TABLE `forum_post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_histories`
--
ALTER TABLE `our_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `portfolio_items`
--
ALTER TABLE `portfolio_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `support_ticket_questions`
--
ALTER TABLE `support_ticket_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_related_services`
--
ALTER TABLE `ticket_related_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_folder_id_foreign` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
