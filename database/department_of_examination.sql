-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 11:13 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `department_of_examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Imila', 'imilamaheshan30@gmail.com', '$2y$10$coalGfG.N5lyQserv4D7fuwYSF3aKrZt5ykxtPxNd1O5Cb6Du9lXu', '2021-06-05 09:53:27', '2021-06-05 09:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `al_paper_details`
--

CREATE TABLE `al_paper_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bundle_number` int(11) NOT NULL,
  `paper_quntity` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `distric` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writing_place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `exam_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'al',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `al_paper_details`
--

INSERT INTO `al_paper_details` (`id`, `bundle_number`, `paper_quntity`, `year`, `distric`, `writing_place`, `medium`, `subject`, `is_complete`, `exam_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1300, 2020, 'Colombo', 'Royal College', 'Sinhala', 'Chemistry', 0, 'al', '2021-06-05 14:00:19', '2021-06-06 03:20:05'),
(2, 2, 1500, 2020, 'Colombo', 'Visakha Vidyalaya', 'Sinhala', 'Chemistry', 0, 'al', '2021-06-05 14:00:43', '2021-06-05 14:00:43'),
(3, 3, 800, 2020, 'Gampaha', 'Bandaranayake College', 'Tamil', 'Physics', 0, 'al', '2021-06-05 14:01:24', '2021-06-05 14:01:24'),
(4, 4, 900, 2020, 'Gampaha', 'Bandaranayake College', 'Sinhala', 'Chemistry', 0, 'al', '2021-06-05 14:02:20', '2021-06-05 14:02:20'),
(5, 5, 1500, 2020, 'Kandy', 'Sivananda Tamil Vidyalaya', 'Tamil', 'Physics', 0, 'al', '2021-06-05 14:02:54', '2021-06-05 14:02:54'),
(6, 6, 600, 2020, 'Matara', 'Rahula College', 'English', 'Combined Mathematics', 0, 'al', '2021-06-05 14:04:07', '2021-06-05 14:04:07'),
(7, 7, 2300, 2020, 'Galle', 'Richmond College', 'English', 'Combined Mathematics', 0, 'al', '2021-06-05 14:04:35', '2021-06-05 14:04:35'),
(8, 8, 1200, 2020, 'Kurunegala', 'Maliyadeva Model School', 'Sinhala', 'Business Studies', 0, 'al', '2021-06-05 14:05:51', '2021-06-05 14:05:51'),
(9, 9, 2370, 2020, 'Kurunegala', 'Wayamba Royal College', 'Tamil', 'Accounting', 0, 'al', '2021-06-05 14:13:30', '2021-06-05 14:13:30'),
(10, 10, 3200, 2020, 'Ratnapura', 'Tamil Maha Vidyalayam', 'Tamil', 'Information Technology', 0, 'al', '2021-06-05 14:14:07', '2021-06-05 14:14:07'),
(11, 11, 500, 2020, 'Jaffna', 'Hindu College', 'Tamil', 'Economics', 0, 'al', '2021-06-05 14:15:07', '2021-06-05 14:15:07'),
(12, 12, 1400, 2020, 'Anuradhapura', 'Central College', 'Sinhala', 'Accounting', 0, 'al', '2021-06-05 14:16:04', '2021-06-05 14:16:04'),
(13, 13, 2220, 2020, 'Badulla', 'Uva Science College', 'English', 'Geography', 0, 'al', '2021-06-05 14:17:41', '2021-06-05 14:17:41'),
(14, 14, 1300, 2020, 'Batticaloa', 'Puliyadimunai Government Mixed Tamil School', 'Tamil', 'Physics', 0, 'al', '2021-06-05 14:18:25', '2021-06-05 14:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `marking_places_als`
--

CREATE TABLE `marking_places_als` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distric` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_quntity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marking_places_als`
--

INSERT INTO `marking_places_als` (`id`, `distric`, `place`, `medium`, `subject`, `paper_quntity`, `year`, `is_complete`, `created_at`, `updated_at`) VALUES
(1, 'Ratnapura', 'Ferguson High School', 'Sinhala', 'Chemistry', '2000', 2020, 0, '2021-06-05 14:20:04', '2021-06-05 14:20:04'),
(2, 'Ratnapura', 'Sumana Balika Vidyalaya', 'Sinhala', 'Physics', '3000', 2020, 0, '2021-06-05 14:23:56', '2021-06-05 14:23:56'),
(3, 'Colombo', 'Kotahena Government Tamil School', 'Tamil', 'Physics', '1000', 2020, 0, '2021-06-05 14:24:26', '2021-06-05 14:24:26'),
(4, 'Matara', 'Siddartha College', 'Sinhala', 'Business Studies', '1300', 2020, 0, '2021-06-05 14:25:51', '2021-06-05 14:25:51'),
(5, 'Jaffna', 'Central College', 'Tamil', 'Economics', '3000', 2020, 0, '2021-06-05 14:26:17', '2021-06-05 14:26:17'),
(6, 'Hambantota', 'Vijayaba National College', 'English', 'Geography', '3000', 2020, 0, '2021-06-05 14:26:44', '2021-06-05 14:26:44'),
(7, 'Ampara', 'Saraswathy Central College', 'Tamil', 'Economics', '3000', 2020, 0, '2021-06-05 14:27:08', '2021-06-05 14:27:08'),
(8, 'Matara', 'Rahula College', 'Sinhala', 'Chemistry', '4000', 2020, 0, '2021-06-05 14:27:40', '2021-06-05 14:27:40'),
(9, 'Kandy', 'Girls High School', 'Sinhala', 'Chemistry', '4000', 2020, 0, '2021-06-05 14:27:58', '2021-06-05 14:27:58'),
(10, 'Kandy', 'Richmond College', 'Tamil', 'Physics', '4000', 2020, 0, '2021-06-05 14:28:21', '2021-06-05 14:28:21'),
(11, 'Gampaha', 'Bandaranayake College', 'Tamil', 'Economics', '4000', 2020, 0, '2021-06-05 14:28:48', '2021-06-05 14:28:48'),
(12, 'Colombo', 'Nalanda College', 'Sinhala', 'Combined Mathematics', '4500', 2020, 0, '2021-06-05 14:29:11', '2021-06-05 14:29:11'),
(13, 'Gampaha', 'St. Marys College', 'Sinhala', 'Chemistry', '4500', 2020, 0, '2021-06-05 14:29:52', '2021-06-05 14:29:52'),
(14, 'Kurunegala', 'St. Anne\'s College', 'Sinhala', 'Chemistry', '4000', 2020, 0, '2021-06-05 14:30:09', '2021-06-05 14:30:09'),
(15, 'Colombo', 'Catholic Tamil School', 'Sinhala', 'Accounting', '4500', 2020, 0, '2021-06-05 14:30:36', '2021-06-05 14:30:36'),
(16, 'Matara', 'Aninkanda Tamil College', 'Tamil', 'Accounting', '3000', 2020, 0, '2021-06-05 14:31:00', '2021-06-05 14:31:00'),
(17, 'Kalutara', 'Amupitiya National School', 'Tamil', 'Information Technology', '4500', 2020, 0, '2021-06-05 14:31:20', '2021-06-05 14:31:20'),
(18, 'Galle', 'St. Aloysius\' College', 'Tamil', 'Information Technology', '4200', 2020, 0, '2021-06-05 14:32:24', '2021-06-05 14:32:24'),
(19, 'Colombo', 'Saraswathy Central College', 'Tamil', 'Information Technology', '5000', 2020, 0, '2021-06-05 14:32:43', '2021-06-05 14:32:43'),
(20, 'Jaffna', 'St. John\'s College', 'Tamil', 'Physics', '4000', 2020, 0, '2021-06-05 14:33:05', '2021-06-05 14:33:05'),
(21, 'Jaffna', 'St. Patrick\'s College', 'English', 'Geography', '5000', 2020, 0, '2021-06-05 14:33:33', '2021-06-05 14:33:33'),
(22, 'Ampara', 'Central College', 'Sinhala', 'Accounting', '4000', 2020, 0, '2021-06-05 14:33:53', '2021-06-05 14:33:53'),
(23, 'Badulla', 'Uva Science College', 'Tamil', 'Economics', '4000', 2020, 0, '2021-06-05 14:34:21', '2021-06-05 14:34:21'),
(24, 'Kegalle', 'St.Mary\'s college', 'Tamil', 'Economics', '5000', 2020, 0, '2021-06-05 14:34:40', '2021-06-05 14:34:40'),
(25, 'Galle', 'Gamini Central College', 'Sinhala', 'Business Studies', '5000', 2020, 0, '2021-06-05 14:35:01', '2021-06-05 14:35:01'),
(26, 'Kandy', 'Mahamaya College', 'English', 'Combined Mathematics', '1000', 2020, 0, '2021-06-05 14:35:21', '2021-06-05 14:35:21'),
(27, 'Kandy', 'Al Nasser College', 'Tamil', 'Physics', '2000', 2020, 0, '2021-06-05 14:40:49', '2021-06-05 14:40:49'),
(28, 'Colombo', 'Al Nasser College', 'Tamil', 'Physics', '3000', 2020, 0, '2021-06-05 14:41:29', '2021-06-05 14:41:29'),
(29, 'Gampaha', 'Bandaranayake College', 'English', 'Combined Mathematics', '1000', 2020, 0, '2021-06-05 14:42:19', '2021-06-05 14:42:19'),
(30, 'Colombo', 'Royal College', 'English', 'Combined Mathematics', '1200', 2020, 0, '2021-06-05 14:42:57', '2021-06-05 14:42:57'),
(31, 'Kandy', 'D. S. Senanayaka College', 'English', 'Mathematics', '2500', 2020, 0, '2021-06-05 14:45:36', '2021-06-05 14:45:36'),
(32, 'Gampaha', 'Boys High School', 'English', 'Combined Mathematics', '2800', 2020, 0, '2021-06-05 14:46:24', '2021-06-05 14:46:24'),
(33, 'Galle', 'Sumangala Model School', 'Tamil', 'Information Technology', '4000', 2020, 0, '2021-06-05 14:47:59', '2021-06-05 14:47:59'),
(34, 'Colombo', 'Wehalla Vidyalaya', 'English', 'Combined Mathematics', '5000', 2020, 0, '2021-06-05 14:49:03', '2021-06-05 14:49:03'),
(35, 'Galle', 'Amarasuriya Vidyalaya', 'Tamil', 'Information Technology', '5000', 2020, 0, '2021-06-05 14:49:55', '2021-06-05 14:49:55'),
(36, 'Kandy', 'Kundasale National School', 'Tamil', 'Information Technology', '4000', 2020, 0, '2021-06-05 14:51:01', '2021-06-05 14:51:01'),
(37, 'Gampaha', 'Christ King College', 'Tamil', 'Information Technology', '5000', 2020, 0, '2021-06-05 14:52:06', '2021-06-05 14:52:06'),
(38, 'Badulla', 'Bandarawela Central College', 'Sinhala', 'Accounting', '5000', 2020, 0, '2021-06-05 14:52:40', '2021-06-05 14:52:40'),
(39, 'Nuwara Eliya', 'Central College', 'Tamil', 'Physics', '6000', 2020, 0, '2021-06-05 14:54:04', '2021-06-05 14:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `marking_places_ols`
--

CREATE TABLE `marking_places_ols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distric` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_quntity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marking_places_ols`
--

INSERT INTO `marking_places_ols` (`id`, `distric`, `place`, `medium`, `subject`, `paper_quntity`, `year`, `is_complete`, `created_at`, `updated_at`) VALUES
(1, 'Ratnapura', 'Ferguson High School', 'Sinhala', 'Mathematics', '2000', 2020, 0, '2021-06-05 12:51:38', '2021-06-06 03:23:50'),
(2, 'Ratnapura', 'Sumana Balika Vidyalaya', 'Sinhala', 'Science', '3000', 2020, 0, '2021-06-05 12:52:32', '2021-06-05 12:52:32'),
(3, 'Colombo', 'Kotahena Government Tamil School', 'Tamil', 'Science', '1000', 2020, 0, '2021-06-05 12:53:29', '2021-06-05 12:53:29'),
(4, 'Matara', 'Siddartha College', 'Sinhala', 'Sinhala', '1300', 2020, 0, '2021-06-05 12:55:02', '2021-06-05 12:55:02'),
(5, 'Jaffna', 'Holy Family Convent', 'Tamil', 'Tamil', '3200', 2020, 0, '2021-06-05 12:58:21', '2021-06-06 03:17:45'),
(6, 'Hambantota', 'Vijayaba National College', 'English', 'English Literature', '3000', 2020, 0, '2021-06-05 13:01:08', '2021-06-05 13:01:08'),
(7, 'Badulla', 'Saraswathy Central College', 'Tamil', 'Science', '3000', 2020, 0, '2021-06-05 13:07:52', '2021-06-05 13:07:52'),
(8, 'Matara', 'Rahula College', 'Sinhala', 'Mathematics', '4000', 2020, 0, '2021-06-05 13:11:12', '2021-06-06 03:21:36'),
(9, 'Kandy', 'Girls High School', 'Sinhala', 'Mathematics', '4000', 2020, 0, '2021-06-05 13:16:02', '2021-06-06 03:23:49'),
(10, 'Kandy', 'Richmond College', 'Tamil', 'Science', '3000', 2020, 0, '2021-06-05 13:18:38', '2021-06-05 13:18:38'),
(11, 'Gampaha', 'Bandaranayake College', 'Tamil', 'Science', '4000', 2020, 0, '2021-06-05 13:19:16', '2021-06-05 13:19:16'),
(12, 'Colombo', 'Nalanda College', 'English', 'English', '4500', 2020, 0, '2021-06-05 13:20:14', '2021-06-05 13:20:14'),
(13, 'Gampaha', 'St. Marys College', 'Sinhala', 'Mathematics', '4000', 2020, 0, '2021-06-05 13:23:10', '2021-06-05 13:23:10'),
(14, 'Kurunegala', 'St. Anne\'s College', 'Sinhala', 'Mathematics', '4000', 2020, 0, '2021-06-05 13:24:53', '2021-06-05 13:24:53'),
(15, 'Colombo', 'Catholic Tamil School', 'Tamil', 'History', '4500', 2020, 0, '2021-06-05 13:26:45', '2021-06-05 13:26:45'),
(16, 'Matara', 'Aninkanda Tamil College', 'Tamil', 'History', '3000', 2020, 0, '2021-06-05 13:28:56', '2021-06-05 13:28:56'),
(17, 'Kandy', 'Amupitiya National School', 'Tamil', 'Information Technology', '4500', 2020, 0, '2021-06-05 13:30:47', '2021-06-05 13:30:47'),
(18, 'Galle', 'St. Aloysius\' College', 'Tamil', 'Information Technology', '3400', 2020, 0, '2021-06-05 13:32:01', '2021-06-05 13:32:01'),
(19, 'Colombo', 'Saraswathy Central College', 'Tamil', 'Information Technology', '5000', 2020, 0, '2021-06-05 13:35:20', '2021-06-05 13:35:20'),
(20, 'Jaffna', 'St. John\'s College', 'Tamil', 'Science', '4000', 2020, 0, '2021-06-05 13:37:55', '2021-06-05 13:37:55'),
(21, 'Jaffna', 'St. Patrick\'s College', 'English', 'English Literature', '5000', 2020, 0, '2021-06-05 13:38:43', '2021-06-05 13:38:43'),
(22, 'Ampara', 'Central College', 'Sinhala', 'History', '4000', 2020, 0, '2021-06-05 13:39:23', '2021-06-05 13:39:23'),
(23, 'Badulla', 'Uva Science College', 'Tamil', 'Tamil', '4000', 2020, 0, '2021-06-05 13:46:34', '2021-06-05 13:46:34'),
(24, 'Kegalle', 'St.Mary\'s college', 'Tamil', 'Tamil', '5000', 2020, 0, '2021-06-05 13:47:31', '2021-06-05 13:47:31'),
(25, 'Galle', 'Gamini Central College', 'Sinhala', 'Sinhala', '5000', 2020, 0, '2021-06-05 13:48:56', '2021-06-05 13:48:56'),
(26, 'Kandy', 'Mahamaya College', 'English', 'English', '1000', 2020, 0, '2021-06-05 13:51:00', '2021-06-05 13:51:00'),
(27, 'Colombo', 'Al Nasser College', 'Tamil', 'Physics', '2000', 2020, 0, '2021-06-05 14:39:14', '2021-06-05 14:39:14');

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
(5, '2020_10_04_101927_create_marking_places_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(9, '2014_10_12_100000_create_password_resets_table', 2),
(10, '2020_10_04_095053_create_ol_paper_details_table', 2),
(11, '2020_10_04_100722_create_al_paper_details_table', 2),
(12, '2021_05_10_133324_create_marking_places_ols_table', 2),
(13, '2021_05_10_133422_create_marking_places_als_table', 2),
(14, '2021_05_30_153158_create_admin_logins_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ol_paper_details`
--

CREATE TABLE `ol_paper_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bundle_number` int(11) NOT NULL,
  `paper_quntity` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `distric` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writing_place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `exam_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ol',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ol_paper_details`
--

INSERT INTO `ol_paper_details` (`id`, `bundle_number`, `paper_quntity`, `year`, `distric`, `writing_place`, `medium`, `subject`, `is_complete`, `exam_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1200, 2020, 'Colombo', 'Royal College', 'Sinhala', 'Mathematics', 0, 'ol', '2021-06-05 10:02:11', '2021-06-05 13:59:34'),
(2, 2, 1500, 2020, 'Colombo', 'Visakha Vidyalaya', 'Sinhala', 'Mathematics', 0, 'ol', '2021-06-05 10:03:09', '2021-06-06 03:23:25'),
(3, 3, 800, 2020, 'Gampaha', 'Bandaranayake College', 'Tamil', 'Science', 0, 'ol', '2021-06-05 10:04:02', '2021-06-05 10:04:02'),
(4, 4, 800, 2020, 'Gampaha', 'Bandaranayake College', 'Sinhala', 'Mathematics', 0, 'ol', '2021-06-05 10:04:37', '2021-06-05 14:01:44'),
(5, 5, 1300, 2020, 'Kandy', 'Sivananda Tamil Vidyalaya', 'Tamil', 'Science', 0, 'ol', '2021-06-05 10:06:15', '2021-06-05 10:06:15'),
(6, 6, 600, 2020, 'Matara', 'Rahula College', 'English', 'English', 0, 'ol', '2021-06-05 10:07:09', '2021-06-05 10:07:09'),
(7, 7, 2300, 2020, 'Galle', 'Richmond College', 'English', 'English', 0, 'ol', '2021-06-05 10:08:15', '2021-06-05 10:08:15'),
(8, 8, 1200, 2020, 'Kurunegala', 'Maliyadeva Model School', 'Sinhala', 'Sinhala', 0, 'ol', '2021-06-05 10:09:30', '2021-06-05 10:09:30'),
(9, 9, 2370, 2020, 'Kurunegala', 'Wayamba Royal College', 'Tamil', 'History', 0, 'ol', '2021-06-05 10:12:06', '2021-06-05 10:12:06'),
(10, 10, 3200, 2020, 'Ratnapura', 'Tamil Maha Vidyalayam', 'Tamil', 'Information Technology', 0, 'ol', '2021-06-05 10:14:29', '2021-06-05 10:14:29'),
(11, 11, 500, 2020, 'Jaffna', 'Hindu College', 'Tamil', 'Tamil', 0, 'ol', '2021-06-05 10:16:13', '2021-06-05 10:16:13'),
(12, 12, 1400, 2020, 'Anuradhapura', 'Central College', 'Sinhala', 'History', 0, 'ol', '2021-06-05 10:16:44', '2021-06-05 10:16:44'),
(13, 13, 2220, 2020, 'Badulla', 'Uva Science College', 'English', 'English Literature', 0, 'ol', '2021-06-05 10:17:25', '2021-06-05 10:17:25'),
(14, 14, 1230, 2020, 'Batticaloa', 'Puliyadimunai Government Mixed Tamil School', 'Tamil', 'Science', 0, 'ol', '2021-06-05 10:18:28', '2021-06-05 10:18:28');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrew Stephan', 'ablackhat894@gmail.com', NULL, '$2y$10$K3YS5K2niNyBU7ngEyBAseLzRAoWjv6x1oLlcTwy7ouHOM4qrxiOW', 1, NULL, '2021-06-05 09:54:38', '2021-06-05 09:55:06'),
(2, 'Mark O\' Neil', 'markad12@gmail.com', NULL, '$2y$10$8Th9COqmuRZEpwFg9eoDs.W8i/0mF2rjV6n1ROWp7agIEN0EnU5Iy', 1, NULL, '2021-06-05 09:56:07', '2021-06-05 09:57:24'),
(3, 'Rahul', 'rahul1234@gmail.com', NULL, '$2y$10$SsNgzO7FCglZEoaBdf33ZeNtfO86.Ah2ZBbw0zC.Em5jJ8GELNihW', 0, NULL, '2021-06-05 09:57:01', '2021-06-05 09:57:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `al_paper_details`
--
ALTER TABLE `al_paper_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marking_places_als`
--
ALTER TABLE `marking_places_als`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marking_places_ols`
--
ALTER TABLE `marking_places_ols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ol_paper_details`
--
ALTER TABLE `ol_paper_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `al_paper_details`
--
ALTER TABLE `al_paper_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `marking_places_als`
--
ALTER TABLE `marking_places_als`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `marking_places_ols`
--
ALTER TABLE `marking_places_ols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ol_paper_details`
--
ALTER TABLE `ol_paper_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
