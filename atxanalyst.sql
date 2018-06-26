-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2018 at 02:11 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.2.6-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atxanalyst`
--

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_time_to_call` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `need_call` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `title`, `first_name`, `last_name`, `email`, `phone`, `cell_number`, `best_time_to_call`, `street1`, `street2`, `city`, `state`, `zipcode`, `country`, `position`, `days_available`, `license`, `need_call`, `resume`, `created_at`, `updated_at`, `dnd`) VALUES
(1, 'Mrs.', 'Suzette', 'Nielsen', 'sukie83153@yahoo.com', '(832) 495-9359', '(832) 4959359', NULL, '981 Arbor Way', NULL, 'Conroe', 'TX', '77303', 'United States', 'Speech/Language Pathologist', 'Monday\nTuesday\nWednesday\nThursday\nFriday', 'licensed SLP in TX and LA, teacher\'s certificate, 30+yrs experience in early childhood, schools, in-home services, geriatrics, home health, long-term care, supervision, management etc., multiple certifications to include estim, sent resume to Fred Miller\'s email', NULL, '', '2018-05-29 03:25:42', '2018-06-26 00:05:47', '1'),
(2, 'Mrs.', 'Sabina', 'Duhon', 'sabinapd@yahoo.com', '(713) 4178838', '(713) 4178838', NULL, '24910 Waterstone Estates Circle', 'aaaaa', 'Tomball', 'TX', '77375', 'United States', 'Speech/Language Pathologist', 'MondayTuesdayWednesdayThursdayFridayAny', 'CCCVitalstim Certified', NULL, NULL, '2018-05-29 03:25:42', '2018-06-25 07:44:28', '1'),
(3, 'Ms.', 'Kimberly', 'Sanzo', 'kasanzo@gmail.com', '(860) 521-3606', '(860) 966-5316', NULL, '88 Kimberley Road', NULL, 'Newington', 'CT', '6111', 'United States', 'Speech/Language Pathologist', 'Any', 'State of CT licensure', NULL, '', '2018-05-29 03:25:42', '2018-06-25 07:44:36', '1'),
(4, 'Mrs.', 'Denise', 'Walsh', 'hawgsmc@comcast.net', '(781) 812-1411', '(781) 858-7939', NULL, '25 Wales Avenue', NULL, 'South Weymouth', 'MA', NULL, 'United States', 'Speech/Language Pathologist', 'Any', 'MA license in SLP, DOE certified for Speech Language Pathology and Early Childhood Education, ACE award from ASHA for four years, Stuttering workshop 2013 from American Stuttering Foundation', NULL, '', '2018-05-29 03:25:42', '2018-06-25 04:47:47', '0'),
(5, 'Mrs.', 'Mindy', 'Mendzef', 'mmendzef@almasd.net', '(479) 6320379', '(479) 7191230', NULL, '3425 Golf Course Drive', NULL, 'Alma', 'AR', '72921', 'United States', 'Speech/Language Pathologist', 'Any', 'Arkansas Board of Examiners (ABESPA)\nASHA member with CCC\nDept of Ed Educator\'s License\nArkSHA member', NULL, '', '2018-05-29 03:25:42', '2018-06-25 06:45:31', '0'),
(6, 'Ms.', 'Scheresia', 'Russell', 'scheresiarussell@att.net', '(832) 221-9776', '(832) 221-9776', NULL, '10842 Shannon Mills Lane', NULL, 'Houston', 'TX', '77075', 'United States', 'SLPA', 'Any', 'SLPA, M.Ed., Recently passed SLP certification exam, will be starting CFY soon. ABA training, experience with pediatrics and adults, experienced in working with the ASD population, developmental delay and various Speech/Language disorders.', NULL, '', '2018-05-29 03:25:42', '2018-06-25 06:50:28', '0'),
(7, 'Ms.', 'Dee', 'Daniels', 'dansdee08@yahoo.com', '(972) 9836093', '(972) 9836093', NULL, '2602 Zodiac Dr', NULL, 'garland', 'TX', '75044', 'United States', 'Speech/Language Pathologist', 'Monday\nTuesday\nWednesday\nThursday\nFriday', 'ASHA CCCs and Texas license', NULL, '', '2018-05-29 03:25:42', '2018-06-25 07:41:18', '0'),
(8, 'Mrs.', 'Yvonne', 'Romero', 'yromero@esc19.net', '(915) 5262755', '(915) 5262755', NULL, '3428 Kirkwall', NULL, 'El Paso', 'TX', '79925', 'United States', 'Speech/Language Pathologist', 'Any', 'ASHA, \nATS\nextensive training, coursework in the area of Augmentative Alternative Communication', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(9, 'Ms.', 'Linda', 'Hemmen', 'lhemmen@att.net', '(316) 652-0198', '(316) 652-0198', NULL, '5207 Hollytree Drive Apt. 1223', NULL, 'Tyler', 'TX', '75703', 'United States', 'Speech/Language Pathologist', 'Any', 'TX license.', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(10, 'Dr.', 'Leslie Jr', 'Dalton', 'washdalton@yahoo.com', '(806) 656-0788', '(806) 656-0788', NULL, '2412 15th Av', NULL, 'Canyon', 'TX', '79015', 'United States', 'Speech/Language Pathologist', 'Any', 'CCC-A/SLP TX License in both', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(11, 'Ms.', 'Helene', 'Gereke', 'gerekeh@yahoo.com', '(936) 4443078', '(936) 4443078', NULL, '26 Shellbark Pl', NULL, 'Spring', 'TX', '77382', 'United States', 'Speech/Language Pathologist', 'Monday\nTuesday\nWednesday\nThursday\nFriday', 'Masters Degree in Speech Pathology\nCCC from ASHA\nLicensed in Texas and Alabama\nWorked in Schools and Nursing Homes', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(12, 'Mrs.', 'Monica', 'Silva', 'monica_saenz@msn.com', '(956) 454-2826', '(956) 454-2826', NULL, '1725 Karis Ct.', NULL, 'Harlingen', 'TX', '78550', 'United States', 'Speech/Language Pathologist', 'Any', 'Vital Stim Certified\nDPNS Certified', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(13, 'Mrs.', 'Marlena', 'Hinojosa', 'marlenar05@yahoo.com', '(956) 501-4730', '(956-) 501-4730', NULL, '23271 McGee Ct', NULL, 'Harlingen', 'TX', '78552', 'United States', 'PTA', 'Any', 'PTA license, NDT courses, Kinesiotaping experience, 10 years pediatric experience, some adult, home health and school experience', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(14, 'Ms.', 'Geneva', 'Lopez', 'genevaj3@gmail.com', '(210) 6693605', '(210) 6693605', NULL, '3500 Goliad #175', NULL, 'San Antonio', 'TX', '78223', 'United States', 'Speech/Language Pathologist', 'Tuesday\nWednesday', 'CCC/SLP\n', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(15, 'Ms.', 'Shanieka', 'Carter', 'private_nana@yahoo.com', '(205) 4286134', '(205) 4473451', NULL, '5894 Ridgeline Drive', NULL, 'Bessemer', 'AL', '35022', 'United States', 'Occupational Therapist', 'Monday\nTuesday\nWednesday\nThursday\nFriday\nAny', 'OTR, ALABAMA', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(16, 'Mrs.', 'Julissa', 'Villarreal-Gracia', 'julievillarreal@aol.com', '(956) 655-9359', '(956) 655-9359', NULL, '3309 Southern Breeze Ave.', NULL, 'Edinburg', 'TX', '78541', 'United States', 'Speech/Language Pathologist', 'Any', 'Licenses: Texas State Board of SLP and ASHA\nSkills: Bilingual\nTrainings: numerous CEU\'s in the areas of Autism, Oral-Motor/Feeding, Cleft Palate, and Dyslexia', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(17, 'Dr.', 'Kshamit', 'Trivedi', 'kshamitblue@gmail.com', '(201) 2827384', '(201) 2827384', NULL, '27 spruce street, floor 1', NULL, 'jersey city', 'NJ', '7306', 'United States', 'Physical Therapists', 'Any', 'I am a licensed physical therapist in the state of New York and eligible for New Jersey. I have experience working in out-patient facilities. \n\nI am open to work in all different settings for full time permanent position. \nH1 sponsorship is needed.', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(18, 'Mrs.', 'Dora', 'Vargas-Bustos', 'doeskyslp@yahoo.com', '(956) 501-7845', '(956) 501-7845', NULL, '417 Martha Street', NULL, 'San Juan', 'TX', '78589', 'United States', 'Speech/Language Pathologist', 'Any', 'Licensed Texas State Board of SLP\nCertificate of Clinical competence-ASHA\nDoctoral Level course work in Leadership Studies\nFluent in English/Spanish \nBilingual Assessment/Treatment of Communication Disorders', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(19, 'Mrs.', 'Madalena', 'Mendoza-Gonzales', 'mmgonzales1@yahoo.com', '(956) 781-5616', '(956) 457-7660', NULL, '407 Judean Ln.', NULL, 'San Juan', 'TX', '78589', 'United States', 'Speech/Language Pathologist', 'Monday\nTuesday\nWednesday\nThursday', 'TX License as a Speech Lang. Pathologist\nCertificate of Clinical Competence from ASHA', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', ''),
(20, 'Mrs.', 'Kathy', 'Heinz-Newingham', 'splapath@aol.com', '(217) 556-1225', '(217) 556-1225', NULL, 'rr 3 box 45', NULL, 'Carrollton', 'IL', '62016', 'United States', 'Speech/Language Pathologist', 'Any', 'ASHA CCC, IL State lic, 24 yrs experience', NULL, '', '2018-05-29 03:25:42', '2018-05-29 03:25:42', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_comments`
--

CREATE TABLE `emp_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_comments`
--

INSERT INTO `emp_comments` (`id`, `user_id`, `emp_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'czxczxczxxx', '2018-06-01 11:05:21', '2018-06-01 11:05:21'),
(2, 1, 5, 'czxczxczxxx ffff', '2018-06-01 11:13:02', '2018-06-01 11:13:02'),
(3, 1, 5, 'this is test cacse', '2018-06-01 11:13:21', '2018-06-01 11:13:21'),
(4, 1, 5, 'xxzzc', '2018-06-01 11:15:37', '2018-06-01 11:15:37'),
(5, 1, 5, 'xxzzc this is test', '2018-06-01 11:15:51', '2018-06-01 11:15:51'),
(6, 1, 5, 'test by jitendra for angular', '2018-06-01 11:16:05', '2018-06-01 11:16:05'),
(7, 1, 5, 'xzczcz', '2018-06-01 11:16:38', '2018-06-01 11:16:38'),
(8, 1, 5, 'ghjhj', '2018-06-01 11:32:35', '2018-06-01 11:32:35'),
(9, 1, 17, 'hfghasgzf\nsaakfklaf', '2018-06-01 11:38:01', '2018-06-01 11:38:01'),
(10, 1, 17, 'hfghasgzf\nsaakfklaf sfsafsaf  sdfgv', '2018-06-01 11:38:06', '2018-06-01 11:38:06'),
(11, 1, 17, 'testing by jitendra', '2018-06-01 11:38:19', '2018-06-01 11:38:19'),
(12, 1, 17, 'testing by jitendra testing by jitendra', '2018-06-01 11:38:26', '2018-06-01 11:38:26'),
(13, 1, 17, 'testing by jitendra testing by jitendra testing by jitendra', '2018-06-01 11:38:29', '2018-06-01 11:38:29'),
(14, 1, 1, 'ddddd', '2018-06-01 11:49:32', '2018-06-01 11:49:32'),
(15, 1, 1, 'ddddd dsdddd', '2018-06-01 11:49:36', '2018-06-01 11:49:36'),
(16, 1, 5, 'zcCZCZC', '2018-06-01 11:50:07', '2018-06-01 11:50:07'),
(17, 1, 5, 'zcCZCZC zcczCZCzcsfsdf', '2018-06-01 11:50:12', '2018-06-01 11:50:12'),
(18, 1, 6, 'zczxczxc', '2018-06-01 11:53:51', '2018-06-01 11:53:51'),
(19, 1, 17, 'vnvcnvc', '2018-06-01 12:01:01', '2018-06-01 12:01:01'),
(20, 1, 17, 'vnvcnvc gdfgdf', '2018-06-01 12:01:04', '2018-06-01 12:01:04'),
(21, 1, 5, 'vxcgdgsdf', '2018-06-01 12:04:51', '2018-06-01 12:04:51'),
(22, 1, 4, 'cbcbcb', '2018-06-01 12:05:44', '2018-06-01 12:05:44'),
(23, 1, 4, 'cbcbcb fcxcbcb', '2018-06-01 12:05:48', '2018-06-01 12:05:48'),
(24, 1, 1, 'hdgjkhsdg dfgdj fkghhj \nfdhjfsdlkhjklsf', '2018-06-04 07:06:25', '2018-06-04 07:06:25'),
(25, 1, 1, 'hdgjkhsdg dfgdj fkghhj \nfdhjfsdlkhjklsf sfjashfkjaskf\nsf\nas\nfasfsaf\nsa\nf\nasf\nas', '2018-06-04 07:06:35', '2018-06-04 07:06:35'),
(26, 1, 4, 'dfmddflk', '2018-06-05 11:32:08', '2018-06-05 11:32:08'),
(27, 1, 4, 'dfmddflk\nfddfgd', '2018-06-05 11:32:11', '2018-06-05 11:32:11'),
(28, 1, 4, 'dfmddflk\nfddfgddfbfddf vfdbdfd', '2018-06-05 11:32:14', '2018-06-05 11:32:14'),
(29, 1, 4, 'sahjhasjkhs alsklf;kal; aslflak', '2018-06-05 11:32:28', '2018-06-05 11:32:28'),
(30, 1, 4, 'sahjhasjkhs alsklf;kal; aslflak nxchvj xm, xc,mnvm,xn xcvm,,x', '2018-06-05 11:33:06', '2018-06-05 11:33:06'),
(31, 1, 1, 'djkljslkdj \ndkl;kslgfs', '2018-06-06 08:57:04', '2018-06-06 08:57:04'),
(32, 1, 1, 'djkljslkdj \ndkl;kslgfs', '2018-06-06 09:00:14', '2018-06-06 09:00:14'),
(33, 1, 2, 'cczxc', '2018-06-06 09:08:48', '2018-06-06 09:08:48'),
(34, 1, 2, 'sadasfas', '2018-06-06 09:09:37', '2018-06-06 09:09:37'),
(35, 1, 2, 'xzcvfsd', '2018-06-06 09:26:50', '2018-06-06 09:26:50'),
(36, 1, 2, 'zXXX', '2018-06-06 10:43:08', '2018-06-06 10:43:08'),
(37, 1, 2, 'zXXX  nzbmnabcmnas', '2018-06-06 10:43:15', '2018-06-06 10:43:15'),
(38, 10, 2, 'cvxbzxbz', '2018-06-06 10:47:38', '2018-06-06 10:47:38'),
(39, 10, 2, 'cvxbzxbzvcbvcvcbcbcb cvvcb', '2018-06-06 10:47:57', '2018-06-06 10:47:57'),
(40, 10, 4, 'xcm,nvmx,cn,m', '2018-06-06 11:29:13', '2018-06-06 11:29:13'),
(41, 10, 4, 'sfdansflka afklajlk askjfkl', '2018-06-06 11:29:31', '2018-06-06 11:29:31'),
(42, 10, 4, 'sfdansflka afklajlk askjfkl smnf,man,ms asdna,n ansfank,f', '2018-06-06 11:29:37', '2018-06-06 11:29:37'),
(43, 10, 4, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2018-06-06 11:29:44', '2018-06-06 11:29:44'),
(44, 10, 4, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh \nasssssssssssssssssssssssssssssssss', '2018-06-06 11:29:53', '2018-06-06 11:29:53'),
(45, 10, 4, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh \nasssssssssssssssssssssssssssssssss zxczxczxcz', '2018-06-06 11:29:59', '2018-06-06 11:29:59'),
(46, 10, 4, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh \nasssssssssssssssssssssssssssssssss zxczxczxcz xzn,mcvnzvm,zxnv,mnzm,vnz,mxnvm,zn,vmnz,mxnvzjxkljslkjldfksa', '2018-06-06 11:30:08', '2018-06-06 11:30:08'),
(47, 10, 4, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh \nasssssssssssssssssssssssssssssssss zxczxczxcz xzn,mcvnzvm,zxnv,mnzm,vnz,mxnvm,zn,vmnz,mxnvzjxkljslkjldfksa\nzJChajkshjk sanmfabsmnfas avnas,mcfnjklzjclk zx,mcn,zncz', '2018-06-06 11:30:22', '2018-06-06 11:30:22'),
(48, 10, 4, 'hjjkhkj', '2018-06-06 11:37:37', '2018-06-06 11:37:37'),
(49, 10, 4, 'vbnvbn', '2018-06-06 11:39:59', '2018-06-06 11:39:59'),
(50, 10, 4, 'nbmvbnmvbmvb', '2018-06-06 11:40:27', '2018-06-06 11:40:27'),
(51, 10, 5, 'zxZC', '2018-06-07 05:54:44', '2018-06-07 05:54:44'),
(52, 10, 5, 'zxZC xczxv', '2018-06-07 05:54:51', '2018-06-07 05:54:51'),
(53, 10, 5, 'xzcvzvzvz zxc', '2018-06-07 05:54:59', '2018-06-07 05:54:59'),
(54, 10, 5, 'cxzczc', '2018-06-07 05:58:09', '2018-06-07 05:58:09'),
(55, 10, 5, 'comment ss', '2018-06-07 05:58:43', '2018-06-07 05:58:43'),
(56, 10, 5, 'comment zxczxczc', '2018-06-07 05:58:59', '2018-06-07 05:58:59'),
(57, 10, 5, 'comment zxczxczc zcxzc', '2018-06-07 05:59:11', '2018-06-07 05:59:11'),
(58, 10, 5, 'comment zxczxczc zcxzc jzxkl jclkjzxlkcjz', '2018-06-07 05:59:20', '2018-06-07 05:59:20'),
(59, 10, 5, 'zscdkajlkdja', '2018-06-07 06:05:04', '2018-06-07 06:05:04'),
(60, 10, 5, 'zscdkajlkdja cxx', '2018-06-07 06:05:12', '2018-06-07 06:05:12'),
(61, 10, 5, 'zscdkajlkdja cxx', '2018-06-07 06:05:17', '2018-06-07 06:05:17'),
(62, 10, 4, 'comment zxczxc', '2018-06-08 07:22:46', '2018-06-08 07:22:46'),
(63, 10, 1, 'comment sssssaa', '2018-06-08 07:33:16', '2018-06-08 07:33:16'),
(64, 10, 1, 'comment sssssaa', '2018-06-08 07:33:18', '2018-06-08 07:33:18'),
(65, 10, 1, 'comment sssssaa', '2018-06-08 07:33:19', '2018-06-08 07:33:19'),
(66, 10, 1, 'comment sssssaa', '2018-06-08 07:33:20', '2018-06-08 07:33:20'),
(67, 10, 1, 'comment sssssaa', '2018-06-08 07:33:21', '2018-06-08 07:33:21'),
(68, 10, 1, 'comment sssssaa', '2018-06-08 07:33:22', '2018-06-08 07:33:22'),
(69, 10, 1, 'comment sssssaa', '2018-06-08 07:33:24', '2018-06-08 07:33:24'),
(70, 10, 1, 'comment sssssaa', '2018-06-08 07:33:25', '2018-06-08 07:33:25'),
(71, 10, 1, 'comment sssssaa', '2018-06-08 07:33:27', '2018-06-08 07:33:27'),
(72, 10, 1, 'comment sssssaa', '2018-06-08 07:33:28', '2018-06-08 07:33:28'),
(73, 10, 1, 'comment', '2018-06-08 07:33:52', '2018-06-08 07:33:52'),
(74, 10, 1, 'comment sss', '2018-06-08 07:34:01', '2018-06-08 07:34:01'),
(75, 10, 1, 'commentccc', '2018-06-08 07:39:13', '2018-06-08 07:39:13'),
(76, 10, 1, 'bvnvbnvbnv', '2018-06-08 07:39:49', '2018-06-08 07:39:49'),
(77, 10, 1, 'comment hgjhghjgjk', '2018-06-08 07:40:10', '2018-06-08 07:40:10'),
(78, 10, 1, 'hjkjhjk', '2018-06-08 07:40:51', '2018-06-08 07:40:51'),
(79, 10, 1, 'sdjfklsjdklfslkjflkslkfjskdjflksjdklfjslkdfjlskvjd,mv,,vhjkjhjk', '2018-06-08 07:41:02', '2018-06-08 07:41:02'),
(80, 10, 1, 'ssss', '2018-06-08 07:41:48', '2018-06-08 07:41:48'),
(81, 10, 1, 'vvvv', '2018-06-08 07:44:09', '2018-06-08 07:44:09'),
(82, 10, 1, 'zcxCcz', '2018-06-08 07:53:27', '2018-06-08 07:53:27'),
(83, 10, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-06-08 07:53:38', '2018-06-08 07:53:38'),
(84, 10, 1, 'hgjhhj', '2018-06-08 11:55:27', '2018-06-08 11:55:27'),
(85, 10, 1, 'ghghjghjkjk', '2018-06-08 11:55:40', '2018-06-08 11:55:40'),
(86, 10, 1, 'xxx', '2018-06-08 12:03:49', '2018-06-08 12:03:49'),
(87, 10, 1, 'xxxxx', '2018-06-08 12:04:30', '2018-06-08 12:04:30'),
(88, 10, 1, 'sfhasfkjhs jkvhskjdv hjksdhvkjshdfkjhskdjfhkjsd', '2018-06-08 12:04:38', '2018-06-08 12:04:38'),
(89, 10, 1, 'vbvn', '2018-06-08 12:04:53', '2018-06-08 12:04:53'),
(90, 10, 1, 'dfsfs', '2018-06-08 12:13:32', '2018-06-08 12:13:32'),
(91, 10, 1, 'sdgsgsdg', '2018-06-08 12:13:34', '2018-06-08 12:13:34'),
(92, 10, 1, 'gsdgdsgsdg', '2018-06-08 12:13:37', '2018-06-08 12:13:37'),
(93, 10, 1, 'sdggdsggs', '2018-06-08 12:13:40', '2018-06-08 12:13:40'),
(94, 10, 7, 'gvjnjv', '2018-06-08 12:14:46', '2018-06-08 12:14:46'),
(95, 10, 7, 'gjfjd', '2018-06-08 12:14:48', '2018-06-08 12:14:48'),
(96, 10, 7, 'dgjdgj', '2018-06-08 12:14:50', '2018-06-08 12:14:50'),
(97, 10, 7, 'dgjdj', '2018-06-08 12:14:52', '2018-06-08 12:14:52'),
(98, 10, 7, 'djgdfgjdfgj', '2018-06-08 12:14:55', '2018-06-08 12:14:55'),
(99, 10, 7, 'sdasasdfads', '2018-06-08 12:14:57', '2018-06-08 12:14:57'),
(100, 10, 7, 'adgasdg', '2018-06-08 12:14:59', '2018-06-08 12:14:59'),
(101, 10, 7, 'agdagfadga,mdgn', '2018-06-08 12:15:04', '2018-06-08 12:15:04'),
(102, 10, 7, 'bm,c nbmncvbm,ncvbm,nc,vb', '2018-06-08 12:15:08', '2018-06-08 12:15:08'),
(103, 10, 7, 'dcvgdg', '2018-06-08 12:15:09', '2018-06-08 12:15:09'),
(104, 10, 7, 'dfgdfg', '2018-06-08 12:15:11', '2018-06-08 12:15:11'),
(105, 10, 7, 'dfgfdg', '2018-06-08 12:15:13', '2018-06-08 12:15:13'),
(106, 10, 7, 'dfg', '2018-06-08 12:15:14', '2018-06-08 12:15:14'),
(107, 10, 7, 'dfg', '2018-06-08 12:15:16', '2018-06-08 12:15:16'),
(108, 10, 7, 'dfgdfg', '2018-06-08 12:15:18', '2018-06-08 12:15:18'),
(109, 10, 1, 'xzfzv', '2018-06-12 04:19:20', '2018-06-12 04:19:20'),
(110, 10, 5, 'ghhjghjgj', '2018-06-12 04:22:43', '2018-06-12 04:22:43'),
(111, 10, 13, 'vbbbc', '2018-06-12 07:18:23', '2018-06-12 07:18:23'),
(112, 10, 13, 'vbvbccxx', '2018-06-12 07:18:27', '2018-06-12 07:18:27'),
(113, 2, 2, 'aaaa', '2018-06-15 04:43:18', '2018-06-15 04:43:18'),
(114, 2, 2, 'aaaa', '2018-06-15 04:44:18', '2018-06-15 04:44:18'),
(115, 2, 2, 'aaaa', '2018-06-15 04:44:44', '2018-06-15 04:44:44'),
(116, 2, 2, 'aaaaa', '2018-06-15 04:44:55', '2018-06-15 04:44:55'),
(117, 2, 2, 'aaaaa', '2018-06-15 04:44:58', '2018-06-15 04:44:58'),
(118, 2, 2, 'aaaaa', '2018-06-15 04:45:14', '2018-06-15 04:45:14'),
(119, 2, 2, 'aaaaa', '2018-06-15 04:45:17', '2018-06-15 04:45:17'),
(120, 2, 2, 'aaaaa', '2018-06-15 04:45:18', '2018-06-15 04:45:18'),
(121, 2, 2, 'aaaaaaa', '2018-06-15 04:46:06', '2018-06-15 04:46:06'),
(122, 2, 2, 'aaaaa', '2018-06-15 04:46:19', '2018-06-15 04:46:19'),
(123, 2, 2, 'aaaaa', '2018-06-15 04:52:00', '2018-06-15 04:52:00'),
(124, 2, 2, 'aaaaa', '2018-06-15 04:52:02', '2018-06-15 04:52:02'),
(125, 2, 2, 'aaaaa ffffff', '2018-06-15 04:52:06', '2018-06-15 04:52:06'),
(126, 2, 2, 'aaaa', '2018-06-15 04:55:15', '2018-06-15 04:55:15'),
(127, 2, 2, 'aaaa', '2018-06-15 04:55:20', '2018-06-15 04:55:20'),
(128, 2, 2, 'aaaaaa', '2018-06-15 04:55:48', '2018-06-15 04:55:48'),
(129, 2, 2, 'aaaaa', '2018-06-15 05:01:32', '2018-06-15 05:01:32'),
(130, 2, 2, 'aaaa', '2018-06-15 05:02:41', '2018-06-15 05:02:41'),
(131, 2, 2, 'aaaa', '2018-06-15 05:02:46', '2018-06-15 05:02:46'),
(132, 2, 2, 'ttttt', '2018-06-15 05:02:51', '2018-06-15 05:02:51'),
(133, 2, 2, 'aaaa', '2018-06-15 05:04:04', '2018-06-15 05:04:04'),
(134, 2, 2, 'aaaa', '2018-06-15 05:04:20', '2018-06-15 05:04:20'),
(135, 2, 2, 'aaaa', '2018-06-15 05:04:37', '2018-06-15 05:04:37'),
(136, 2, 2, 'aaaaaa', '2018-06-15 05:05:17', '2018-06-15 05:05:17'),
(137, 2, 2, 'aaaaa', '2018-06-15 05:05:22', '2018-06-15 05:05:22'),
(138, 2, 2, 'aaaaa', '2018-06-15 05:18:27', '2018-06-15 05:18:27'),
(139, 2, 2, 'aaaaa', '2018-06-15 05:18:39', '2018-06-15 05:18:39'),
(140, 2, 2, 'aaaa', '2018-06-15 05:20:44', '2018-06-15 05:20:44'),
(141, 2, 2, 'aaaa', '2018-06-15 05:20:50', '2018-06-15 05:20:50'),
(142, 2, 2, 'tttttt', '2018-06-15 05:20:56', '2018-06-15 05:20:56'),
(143, 2, 2, 'yyyyy', '2018-06-15 05:21:02', '2018-06-15 05:21:02'),
(144, 2, 2, 'aaaa', '2018-06-15 05:21:20', '2018-06-15 05:21:20'),
(145, 2, 2, 'yyyyyyyy', '2018-06-15 05:21:26', '2018-06-15 05:21:26'),
(146, 2, 2, 'aaa', '2018-06-15 05:21:55', '2018-06-15 05:21:55'),
(147, 2, 2, 'aaa', '2018-06-15 05:27:17', '2018-06-15 05:27:17'),
(148, 2, 2, 'aaaaaa', '2018-06-15 05:30:11', '2018-06-15 05:30:11'),
(149, 2, 2, 'lkl', '2018-06-15 05:36:52', '2018-06-15 05:36:52'),
(150, 2, 2, 'ggg', '2018-06-15 05:38:49', '2018-06-15 05:38:49'),
(151, 2, 2, 'ddddddd', '2018-06-15 05:38:58', '2018-06-15 05:38:58'),
(152, 2, 2, 'ssssss', '2018-06-15 05:40:35', '2018-06-15 05:40:35'),
(153, 2, 2, 'rrrrr', '2018-06-15 05:40:58', '2018-06-15 05:40:58'),
(154, 2, 2, 'aaaa', '2018-06-15 05:41:52', '2018-06-15 05:41:52'),
(155, 2, 2, 'eeeeee', '2018-06-15 05:41:58', '2018-06-15 05:41:58'),
(156, 2, 2, 'yyy', '2018-06-15 05:44:09', '2018-06-15 05:44:09'),
(157, 2, 2, 'sss', '2018-06-15 05:44:16', '2018-06-15 05:44:16'),
(158, 2, 2, 'yyyy', '2018-06-15 05:44:19', '2018-06-15 05:44:19'),
(159, 2, 2, 'rrrr', '2018-06-15 05:44:23', '2018-06-15 05:44:23'),
(160, 2, 2, 'sssss', '2018-06-15 05:49:56', '2018-06-15 05:49:56'),
(161, 2, 2, 'yyyyyyyyyyyyyyyyyyyyyy', '2018-06-15 06:07:22', '2018-06-15 06:07:22'),
(162, 2, 1, 'gg', '2018-06-15 07:16:44', '2018-06-15 07:16:44'),
(163, 2, 1, 'ssss', '2018-06-15 07:18:11', '2018-06-15 07:18:11'),
(164, 2, 1, 'zxcjlkzjxlkcjzlkjvclkzjxlvjzkl vx v xlvjklx', '2018-06-15 08:38:58', '2018-06-15 08:38:58'),
(165, 2, 1, 'hjhhkhj', '2018-06-15 09:40:35', '2018-06-15 09:40:35'),
(166, 2, 1, 'hello', '2018-06-21 02:14:48', '2018-06-21 02:14:48'),
(167, 2, 1, 'asdasd', '2018-06-23 05:06:55', '2018-06-23 05:06:55');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(6, '2016_06_01_000004_create_oauth_clients_table', 2),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(9, '2018_05_25_102409_add_is_admin_to_users_table', 3),
(14, '2018_05_28_105019_create_employment_table', 4),
(15, '2018_06_01_161741_create_emp_comments_table', 5),
(16, '2018_06_15_125627_create_system_log_table', 6),
(17, '2018_06_21_103359_create_dnd_table', 7),
(18, '2018_06_21_132031_add_dnd_to_employment_table', 8),
(19, '2018_06_26_055537_drop_dnd_table', 9),
(20, '2018_06_26_055812_drop_dnd_table', 10),
(21, '2018_06_26_055900_drop_dnd_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0e59f62dcd167762539c1457953a385b7bd8cc107324740e5be5d0277dbd99d3c32601b47314f8f6', 10, 3, 'MyApp', '[]', 0, '2018-06-07 05:53:38', '2018-06-07 05:53:38', '2019-06-07 11:23:38'),
('19c40434d98447832c2a193fbc8983df8218aff8a729d55fe7c8e5152513db52c33395319b67a873', 10, 3, 'MyApp', '[]', 0, '2018-06-08 05:29:46', '2018-06-08 05:29:46', '2019-06-08 10:59:46'),
('2a3dae3c2d34cd9f520ad32f6418844ed063c26e9e24684ea200509b528488a9528bcfdaa7dd5352', 11, 3, 'MyApp', '[]', 0, '2018-06-06 05:20:14', '2018-06-06 05:20:14', '2019-06-06 10:50:14'),
('2da4242e66f0eea533a9deeb7fdc2a050cd5a0189bea5e2563fa70da30604c5dec8d4c096d5bfb97', 10, 3, 'MyApp', '[]', 0, '2018-06-08 09:10:59', '2018-06-08 09:10:59', '2019-06-08 14:40:59'),
('2f82aa078b9715d0102ed4f1cf03cab57b169b16e30083271488d7a60b355e04cde26b4238feffe9', 10, 3, 'MyApp', '[]', 0, '2018-06-06 07:27:06', '2018-06-06 07:27:06', '2019-06-06 12:57:06'),
('3f01043939563c6fdfb22bef07998f442c2c5934a534b6801ede3e840d217a648877a976f1d76a6c', 7, 3, 'MyApp', '[]', 0, '2018-06-04 10:50:42', '2018-06-04 10:50:42', '2019-06-04 16:20:42'),
('43a5f268a45334faaae61fb6c01d55bd9a0b12b4830609bb02cc50dbf70e8959b4926bcffecef545', 3, 3, 'MyApp', '[]', 0, '2018-06-04 10:44:47', '2018-06-04 10:44:47', '2019-06-04 16:14:47'),
('4420d0732def138bc2e6eb661e2e37316d303f7a1b17322cdb51e67591a46078a80e94f36dee9bf3', 9, 3, 'MyApp', '[]', 0, '2018-06-04 12:06:39', '2018-06-04 12:06:39', '2019-06-04 17:36:39'),
('5597430d65f23ad4668341eee0cd84993a2fd20b24a643e5dce7f011f739da8bd0b13e3a477efcbb', 11, 3, 'MyApp', '[]', 0, '2018-06-05 10:52:51', '2018-06-05 10:52:51', '2019-06-05 16:22:51'),
('5965497f703790dd47035e42e277b1197c9baa745642c506ccf431e822d3300bb01522bb290a789a', 10, 3, 'MyApp', '[]', 0, '2018-06-12 04:42:41', '2018-06-12 04:42:41', '2019-06-12 10:12:41'),
('5aee1f7367dac4c96613ef6ea0e6905dee64d2877c95004a066084585e8f06cfdfa7967898c1ff68', 2, 3, 'MyApp', '[]', 0, '2018-06-04 07:40:49', '2018-06-04 07:40:49', '2019-06-04 13:10:49'),
('7601de8caf41a7033d2b49ce52dfd79c005d2d47541c42de86ac0462221150027a6e042e72ca7c61', 8, 3, 'MyApp', '[]', 0, '2018-06-04 11:03:03', '2018-06-04 11:03:03', '2019-06-04 16:33:03'),
('8792009ba3f8091076db10826ca7dfd77040fe073267cc321a253709c80a29c5093e416c44445d6a', 10, 3, 'MyApp', '[]', 0, '2018-06-04 12:12:10', '2018-06-04 12:12:10', '2019-06-04 17:42:10'),
('8989e3b34e43c2a48f9e38be33726086166edc1f44c41df81683ea5c7b31b7f7c3626a9466eb9b4e', 10, 3, 'MyApp', '[]', 0, '2018-06-06 06:36:27', '2018-06-06 06:36:27', '2019-06-06 12:06:27'),
('89f822be960c4c98d8035e87c3de635ac15d70fd4d828922177b015d1e784e9e6b289a6bc549f6d1', 10, 3, 'MyApp', '[]', 0, '2018-06-06 07:21:24', '2018-06-06 07:21:24', '2019-06-06 12:51:24'),
('a3965e0fdcd5e5f7e893c5c015f67f93a00eaa0733a5a4b142b87a0cdb0b00bd0c04e5848f530bcb', 10, 3, 'MyApp', '[]', 0, '2018-06-06 07:22:47', '2018-06-06 07:22:47', '2019-06-06 12:52:47'),
('a4440e25b9b3265b272143118f2d128b5598a197f853c9ffd73f154046727ff1b7bdd9281fdfa7cc', 11, 3, 'MyApp', '[]', 0, '2018-06-05 10:51:34', '2018-06-05 10:51:34', '2019-06-05 16:21:34'),
('aa05d7e780c6b56c2efc2f8a7f0863a19593eb04131abc755de2c7e0ecf9a22b56f0e7ce677d9f75', 5, 3, 'MyApp', '[]', 0, '2018-06-04 10:48:09', '2018-06-04 10:48:09', '2019-06-04 16:18:09'),
('bd3751e215be77516a638d7d7f4b97ed7151c3ced829ede65c4f6c6570810868a365a8efb9de3a3e', 10, 3, 'MyApp', '[]', 0, '2018-06-12 04:18:52', '2018-06-12 04:18:52', '2019-06-12 09:48:52'),
('c66b109b3b8b545d41154fe65d7aa6d4ac7ddadbcc003fa4844a801effdd959e422785fe698c25d2', 10, 3, 'MyApp', '[]', 0, '2018-06-06 05:56:52', '2018-06-06 05:56:52', '2019-06-06 11:26:52'),
('c8fb59095e1c1211c27c67bea2a8b1dfa5dbf91f61c9479e4419af773d1d26d528a6a44f450d818b', 10, 3, 'MyApp', '[]', 0, '2018-06-07 05:52:08', '2018-06-07 05:52:08', '2019-06-07 11:22:08'),
('cd03333d793e9f359b781569e7c56b9d37ffb3106bca9650a5d5bb22621390f392478d9df039703b', 6, 3, 'MyApp', '[]', 0, '2018-06-04 10:49:09', '2018-06-04 10:49:09', '2019-06-04 16:19:09'),
('cf80fb178b3605c2c4bfe16f118244e0a8c54486ed6d0c0d0356ffa2a84275bdb2c25085552fd2da', 10, 3, 'MyApp', '[]', 0, '2018-06-06 05:56:02', '2018-06-06 05:56:02', '2019-06-06 11:26:02'),
('d26e6a76710cbcddae902001c9f43ececc31da7d72f8ada5143f77983ec2ffe3dff2e63af0d06a55', 10, 3, 'MyApp', '[]', 0, '2018-06-06 06:05:24', '2018-06-06 06:05:24', '2019-06-06 11:35:24'),
('d28268a6387fcc76aa749d4c0b49210f17e6ef0c04925728c3ac323b72fd3fd1e60479188ce49578', 10, 3, 'MyApp', '[]', 0, '2018-06-08 06:32:45', '2018-06-08 06:32:45', '2019-06-08 12:02:45'),
('d83928e21f4d1f2361cd47e6f6e893c45e335077fbf892519dd517ebf343f0c8817a493b09d8910b', 2, 3, 'MyApp', '[]', 0, '2018-06-04 09:29:07', '2018-06-04 09:29:07', '2019-06-04 14:59:07'),
('d888219cc7282dff92c7c9e1deda10a734f61f6126914392696d848406fa2191d041f42c308d1bed', 4, 3, 'MyApp', '[]', 0, '2018-06-04 10:46:32', '2018-06-04 10:46:32', '2019-06-04 16:16:32'),
('d8ab347e1689dc0bdbe75615debca99fe647accdee0070c6a52d4e08c5bb2fa680e0de927fbad81f', 10, 3, 'MyApp', '[]', 0, '2018-06-06 05:26:38', '2018-06-06 05:26:38', '2019-06-06 10:56:38'),
('de20b0432ad2e4330febf2c2dcea96b2cd293c60e8fb92ca47ea69e5e11cedfae5bd6f3784d39009', 11, 3, 'MyApp', '[]', 0, '2018-06-06 05:24:28', '2018-06-06 05:24:28', '2019-06-06 10:54:28'),
('df206738ea136816c62d31f19ea229cd5188e4e9b3f3bae9699dccfce646939a3ce4739b8d2836e4', 11, 3, 'MyApp', '[]', 0, '2018-06-05 10:29:09', '2018-06-05 10:29:09', '2019-06-05 15:59:09'),
('ec608cbffbcd0b3e3d6cd3850b421de807f642850bc88a469f4d1bbbaaa77c3f3ca8bda553f6c69e', 10, 3, 'MyApp', '[]', 0, '2018-06-06 06:36:13', '2018-06-06 06:36:13', '2019-06-06 12:06:13'),
('ef65f6ea7598c08750d6ba9fde250205d5a5554ec4b19768a2b0e07621d8b3fd77d63ba810540224', 12, 3, 'MyApp', '[]', 0, '2018-06-06 06:31:46', '2018-06-06 06:31:46', '2019-06-06 12:01:46'),
('f76cd7362dcac92c83d948771b02c470098fc5c63aedf7af0d9a0f98c5f8b8e2adf9b1166fc1779e', 10, 3, 'MyApp', '[]', 0, '2018-06-06 07:13:20', '2018-06-06 07:13:20', '2019-06-06 12:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'LLnlBGc773X2kmsz8JVhnz1DpgIvguMEe3ObtX1a', 'http://localhost', 1, 0, 0, '2018-05-24 07:28:40', '2018-05-24 07:28:40'),
(2, NULL, 'Laravel Password Grant Client', '3xlt3RH3qnMC4a3AQnq9nNEgoGp6R3FXG4imMR2E', 'http://localhost', 0, 1, 0, '2018-05-24 07:28:40', '2018-05-24 07:28:40'),
(3, NULL, 'Laravel Personal Access Client', 'iXhvCry2x91noqsWA0ZMdoVMha1hrjeILFI5q05I', 'http://localhost', 1, 0, 0, '2018-06-04 07:16:35', '2018-06-04 07:16:35'),
(4, NULL, 'Laravel Password Grant Client', 'MG6k4FlGXw0Td45cR5FOHaIZMQLCRRayCvv360ln', 'http://localhost', 0, 1, 0, '2018-06-04 07:16:35', '2018-06-04 07:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-05-24 07:28:40', '2018-05-24 07:28:40'),
(2, 3, '2018-06-04 07:16:35', '2018-06-04 07:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_log`
--

INSERT INTO `system_log` (`id`, `user_id`, `name`, `type`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-15 08:35:32', '2018-06-15 08:35:32'),
(2, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-15 08:35:47', '2018-06-15 08:35:47'),
(3, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-15 08:44:53', '2018-06-15 08:44:53'),
(4, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist,city=Aligarh,state=Uttar Pradesh', '2018-06-15 08:45:11', '2018-06-15 08:45:11'),
(5, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-15 09:39:07', '2018-06-15 09:39:07'),
(6, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-15 09:39:13', '2018-06-15 09:39:13'),
(7, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-15 09:40:26', '2018-06-15 09:40:26'),
(8, 2, 'habeeba', 'search', 'search by habeeba=>,state=TX', '2018-06-15 09:42:32', '2018-06-15 09:42:32'),
(9, 2, 'habeeba', 'search', 'search by habeeba=>,state=TX', '2018-06-15 09:42:36', '2018-06-15 09:42:36'),
(10, 2, 'habeeba', 'search', 'search by habeeba=>,state=TX', '2018-06-15 09:42:38', '2018-06-15 09:42:38'),
(11, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-20 08:16:55', '2018-06-20 08:16:55'),
(12, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 01:19:13', '2018-06-21 01:19:13'),
(13, 2, 'habeeba', 'search', 'search by habeeba=>,state=TX', '2018-06-21 01:20:05', '2018-06-21 01:20:05'),
(14, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 01:20:10', '2018-06-21 01:20:10'),
(15, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 01:26:36', '2018-06-21 01:26:36'),
(16, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:26:57', '2018-06-21 01:26:57'),
(17, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 01:27:33', '2018-06-21 01:27:33'),
(18, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 01:29:02', '2018-06-21 01:29:02'),
(19, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:29:18', '2018-06-21 01:29:18'),
(20, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:30:08', '2018-06-21 01:30:08'),
(21, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:30:16', '2018-06-21 01:30:16'),
(22, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:30:30', '2018-06-21 01:30:30'),
(23, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:30:43', '2018-06-21 01:30:43'),
(24, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:30:45', '2018-06-21 01:30:45'),
(25, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:30:53', '2018-06-21 01:30:53'),
(26, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:30:53', '2018-06-21 01:30:53'),
(27, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:09', '2018-06-21 01:31:09'),
(28, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:10', '2018-06-21 01:31:10'),
(29, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:18', '2018-06-21 01:31:18'),
(30, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:19', '2018-06-21 01:31:19'),
(31, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:25', '2018-06-21 01:31:25'),
(32, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:26', '2018-06-21 01:31:26'),
(33, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:27', '2018-06-21 01:31:27'),
(34, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:31:50', '2018-06-21 01:31:50'),
(35, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:11', '2018-06-21 01:32:11'),
(36, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:12', '2018-06-21 01:32:12'),
(37, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:13', '2018-06-21 01:32:13'),
(38, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:26', '2018-06-21 01:32:26'),
(39, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:27', '2018-06-21 01:32:27'),
(40, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:27', '2018-06-21 01:32:27'),
(41, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:28', '2018-06-21 01:32:28'),
(42, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:38', '2018-06-21 01:32:38'),
(43, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:47', '2018-06-21 01:32:47'),
(44, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:32:48', '2018-06-21 01:32:48'),
(45, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:33:09', '2018-06-21 01:33:09'),
(46, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:33:29', '2018-06-21 01:33:29'),
(47, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:33:39', '2018-06-21 01:33:39'),
(48, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:33:40', '2018-06-21 01:33:40'),
(49, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:33:48', '2018-06-21 01:33:48'),
(50, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:00', '2018-06-21 01:34:00'),
(51, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:10', '2018-06-21 01:34:10'),
(52, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:11', '2018-06-21 01:34:11'),
(53, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:11', '2018-06-21 01:34:11'),
(54, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:17', '2018-06-21 01:34:17'),
(55, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:27', '2018-06-21 01:34:27'),
(56, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:33', '2018-06-21 01:34:33'),
(57, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:40', '2018-06-21 01:34:40'),
(58, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:51', '2018-06-21 01:34:51'),
(59, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:53', '2018-06-21 01:34:53'),
(60, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:34:58', '2018-06-21 01:34:58'),
(61, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:35:05', '2018-06-21 01:35:05'),
(62, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:35:24', '2018-06-21 01:35:24'),
(63, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:35:51', '2018-06-21 01:35:51'),
(64, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:35:52', '2018-06-21 01:35:52'),
(65, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:36:17', '2018-06-21 01:36:17'),
(66, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:04', '2018-06-21 01:51:04'),
(67, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:05', '2018-06-21 01:51:05'),
(68, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:15', '2018-06-21 01:51:15'),
(69, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:16', '2018-06-21 01:51:16'),
(70, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:36', '2018-06-21 01:51:36'),
(71, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:37', '2018-06-21 01:51:37'),
(72, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:37', '2018-06-21 01:51:37'),
(73, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:38', '2018-06-21 01:51:38'),
(74, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:38', '2018-06-21 01:51:38'),
(75, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:51', '2018-06-21 01:51:51'),
(76, 12, 'test', 'view', 'viewed by test', '2018-06-21 01:51:52', '2018-06-21 01:51:52'),
(77, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 01:53:08', '2018-06-21 01:53:08'),
(78, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:12:16', '2018-06-21 02:12:16'),
(79, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:12:57', '2018-06-21 02:12:57'),
(80, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:12:58', '2018-06-21 02:12:58'),
(81, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:13:48', '2018-06-21 02:13:48'),
(82, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:14:07', '2018-06-21 02:14:07'),
(83, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:14:22', '2018-06-21 02:14:22'),
(84, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:14:30', '2018-06-21 02:14:30'),
(85, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:15:03', '2018-06-21 02:15:03'),
(86, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:15:56', '2018-06-21 02:15:56'),
(87, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:16:17', '2018-06-21 02:16:17'),
(88, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:16:26', '2018-06-21 02:16:26'),
(89, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:16:27', '2018-06-21 02:16:27'),
(90, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:16:27', '2018-06-21 02:16:27'),
(91, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:30:55', '2018-06-21 02:30:55'),
(92, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:32:16', '2018-06-21 02:32:16'),
(93, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:32:56', '2018-06-21 02:32:56'),
(94, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:40:49', '2018-06-21 02:40:49'),
(95, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:42:16', '2018-06-21 02:42:16'),
(96, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:44:16', '2018-06-21 02:44:16'),
(97, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:45:12', '2018-06-21 02:45:12'),
(98, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 02:45:27', '2018-06-21 02:45:27'),
(99, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 04:41:36', '2018-06-21 04:41:36'),
(100, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 04:42:12', '2018-06-21 04:42:12'),
(101, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 04:42:35', '2018-06-21 04:42:35'),
(102, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 04:55:07', '2018-06-21 04:55:07'),
(103, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 05:51:38', '2018-06-21 05:51:38'),
(104, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:17:57', '2018-06-21 06:17:57'),
(105, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:18:16', '2018-06-21 06:18:16'),
(106, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:18:36', '2018-06-21 06:18:36'),
(107, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:18:37', '2018-06-21 06:18:37'),
(108, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:18:45', '2018-06-21 06:18:45'),
(109, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:19:25', '2018-06-21 06:19:25'),
(110, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:19:43', '2018-06-21 06:19:43'),
(111, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:20:14', '2018-06-21 06:20:14'),
(112, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:20:35', '2018-06-21 06:20:35'),
(113, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:21:19', '2018-06-21 06:21:19'),
(114, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:23:58', '2018-06-21 06:23:58'),
(115, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:24:07', '2018-06-21 06:24:07'),
(116, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:24:23', '2018-06-21 06:24:23'),
(117, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:24:24', '2018-06-21 06:24:24'),
(118, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:24:26', '2018-06-21 06:24:26'),
(119, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:24:57', '2018-06-21 06:24:57'),
(120, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:25:13', '2018-06-21 06:25:13'),
(121, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:27:57', '2018-06-21 06:27:57'),
(122, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 06:28:16', '2018-06-21 06:28:16'),
(123, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 07:55:51', '2018-06-21 07:55:51'),
(124, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 07:58:22', '2018-06-21 07:58:22'),
(125, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 07:59:52', '2018-06-21 07:59:52'),
(126, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 07:59:53', '2018-06-21 07:59:53'),
(127, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 07:59:53', '2018-06-21 07:59:53'),
(128, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:00:48', '2018-06-21 08:00:48'),
(129, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:17:53', '2018-06-21 08:17:53'),
(130, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:22:28', '2018-06-21 08:22:28'),
(131, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:23:20', '2018-06-21 08:23:20'),
(132, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:23:20', '2018-06-21 08:23:20'),
(133, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:23:20', '2018-06-21 08:23:20'),
(134, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:23:47', '2018-06-21 08:23:47'),
(135, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:38:42', '2018-06-21 08:38:42'),
(136, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:38:50', '2018-06-21 08:38:50'),
(137, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:39:08', '2018-06-21 08:39:08'),
(138, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:39:19', '2018-06-21 08:39:19'),
(139, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:39:32', '2018-06-21 08:39:32'),
(140, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:58:09', '2018-06-21 08:58:09'),
(141, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:58:18', '2018-06-21 08:58:18'),
(142, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:58:29', '2018-06-21 08:58:29'),
(143, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:58:30', '2018-06-21 08:58:30'),
(144, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:58:34', '2018-06-21 08:58:34'),
(145, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:58:46', '2018-06-21 08:58:46'),
(146, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 08:58:46', '2018-06-21 08:58:46'),
(147, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:10:46', '2018-06-21 09:10:46'),
(148, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:13:46', '2018-06-21 09:13:46'),
(149, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:13:54', '2018-06-21 09:13:54'),
(150, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:14:04', '2018-06-21 09:14:04'),
(151, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:15:15', '2018-06-21 09:15:15'),
(152, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:15:16', '2018-06-21 09:15:16'),
(153, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:15:17', '2018-06-21 09:15:17'),
(154, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:15:18', '2018-06-21 09:15:18'),
(155, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:15:19', '2018-06-21 09:15:19'),
(156, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:15:25', '2018-06-21 09:15:25'),
(157, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:15:26', '2018-06-21 09:15:26'),
(158, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:16:06', '2018-06-21 09:16:06'),
(159, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:16:13', '2018-06-21 09:16:13'),
(160, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:16:13', '2018-06-21 09:16:13'),
(161, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:16:24', '2018-06-21 09:16:24'),
(162, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:17:08', '2018-06-21 09:17:08'),
(163, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:48:57', '2018-06-21 09:48:57'),
(164, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:49:30', '2018-06-21 09:49:30'),
(165, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:49:51', '2018-06-21 09:49:51'),
(166, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:59:20', '2018-06-21 09:59:20'),
(167, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-21 09:59:22', '2018-06-21 09:59:22'),
(168, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-22 23:48:30', '2018-06-22 23:48:30'),
(169, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:39:24', '2018-06-23 01:39:24'),
(170, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:43:35', '2018-06-23 01:43:35'),
(171, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:44:06', '2018-06-23 01:44:06'),
(172, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:45:04', '2018-06-23 01:45:04'),
(173, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:45:27', '2018-06-23 01:45:27'),
(174, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:45:43', '2018-06-23 01:45:43'),
(175, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:46:21', '2018-06-23 01:46:21'),
(176, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 01:48:17', '2018-06-23 01:48:17'),
(177, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:03:24', '2018-06-23 02:03:24'),
(178, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:03:52', '2018-06-23 02:03:52'),
(179, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:05:46', '2018-06-23 02:05:46'),
(180, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:07:09', '2018-06-23 02:07:09'),
(181, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:22:55', '2018-06-23 02:22:55'),
(182, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:26:26', '2018-06-23 02:26:26'),
(183, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:28:34', '2018-06-23 02:28:34'),
(184, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:29:07', '2018-06-23 02:29:07'),
(185, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:29:54', '2018-06-23 02:29:54'),
(186, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:33:00', '2018-06-23 02:33:00'),
(187, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:33:03', '2018-06-23 02:33:03'),
(188, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:33:10', '2018-06-23 02:33:10'),
(189, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:33:15', '2018-06-23 02:33:15'),
(190, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:34:38', '2018-06-23 02:34:38'),
(191, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:35:57', '2018-06-23 02:35:57'),
(192, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:35:58', '2018-06-23 02:35:58'),
(193, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:36:03', '2018-06-23 02:36:03'),
(194, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:37:21', '2018-06-23 02:37:21'),
(195, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:37:26', '2018-06-23 02:37:26'),
(196, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:37:32', '2018-06-23 02:37:32'),
(197, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:37:34', '2018-06-23 02:37:34'),
(198, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:37:38', '2018-06-23 02:37:38'),
(199, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:38:54', '2018-06-23 02:38:54'),
(200, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:38:55', '2018-06-23 02:38:55'),
(201, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:40:04', '2018-06-23 02:40:04'),
(202, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:41:10', '2018-06-23 02:41:10'),
(203, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:41:17', '2018-06-23 02:41:17'),
(204, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:43:37', '2018-06-23 02:43:37'),
(205, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:46:30', '2018-06-23 02:46:30'),
(206, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 02:57:50', '2018-06-23 02:57:50'),
(207, 12, 'test', 'view', 'viewed by test', '2018-06-23 03:00:41', '2018-06-23 03:00:41'),
(208, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:09:52', '2018-06-23 03:09:52'),
(209, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:09:54', '2018-06-23 03:09:54'),
(210, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:10:19', '2018-06-23 03:10:19'),
(211, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:12:43', '2018-06-23 03:12:43'),
(212, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:13:09', '2018-06-23 03:13:09'),
(213, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:14:08', '2018-06-23 03:14:08'),
(214, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:15:09', '2018-06-23 03:15:09'),
(215, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:16:23', '2018-06-23 03:16:23'),
(216, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:16:39', '2018-06-23 03:16:39'),
(217, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:24:16', '2018-06-23 03:24:16'),
(218, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:46:17', '2018-06-23 03:46:17'),
(219, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:46:24', '2018-06-23 03:46:24'),
(220, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:50:31', '2018-06-23 03:50:31'),
(221, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:55:27', '2018-06-23 03:55:27'),
(222, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 03:55:42', '2018-06-23 03:55:42'),
(223, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:19:21', '2018-06-23 04:19:21'),
(224, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:19:38', '2018-06-23 04:19:38'),
(225, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:20:36', '2018-06-23 04:20:36'),
(226, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:21:19', '2018-06-23 04:21:19'),
(227, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:21:52', '2018-06-23 04:21:52'),
(228, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:22:10', '2018-06-23 04:22:10'),
(229, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:22:13', '2018-06-23 04:22:13'),
(230, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:22:33', '2018-06-23 04:22:33'),
(231, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:22:34', '2018-06-23 04:22:34'),
(232, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:22:42', '2018-06-23 04:22:42'),
(233, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:22:46', '2018-06-23 04:22:46'),
(234, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:22:53', '2018-06-23 04:22:53'),
(235, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:23:02', '2018-06-23 04:23:02'),
(236, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:23:06', '2018-06-23 04:23:06'),
(237, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:25:46', '2018-06-23 04:25:46'),
(238, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:25:53', '2018-06-23 04:25:53'),
(239, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:35:47', '2018-06-23 04:35:47'),
(240, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:35:51', '2018-06-23 04:35:51'),
(241, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:36:12', '2018-06-23 04:36:12'),
(242, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:57:11', '2018-06-23 04:57:11'),
(243, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 04:57:15', '2018-06-23 04:57:15'),
(244, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:06:48', '2018-06-23 05:06:48'),
(245, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:18:09', '2018-06-23 05:18:09'),
(246, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:18:19', '2018-06-23 05:18:19'),
(247, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:22:23', '2018-06-23 05:22:23'),
(248, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:22:27', '2018-06-23 05:22:27'),
(249, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:22:43', '2018-06-23 05:22:43'),
(250, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:22:46', '2018-06-23 05:22:46'),
(251, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:22:48', '2018-06-23 05:22:48'),
(252, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:22:55', '2018-06-23 05:22:55'),
(253, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:22:59', '2018-06-23 05:22:59'),
(254, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:23:05', '2018-06-23 05:23:05'),
(255, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:23:15', '2018-06-23 05:23:15'),
(256, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:23:21', '2018-06-23 05:23:21'),
(257, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:23:52', '2018-06-23 05:23:52'),
(258, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:42:14', '2018-06-23 05:42:14'),
(259, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:42:16', '2018-06-23 05:42:16'),
(260, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:42:18', '2018-06-23 05:42:18'),
(261, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:42:36', '2018-06-23 05:42:36'),
(262, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:42:38', '2018-06-23 05:42:38'),
(263, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:42:41', '2018-06-23 05:42:41'),
(264, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:42:58', '2018-06-23 05:42:58'),
(265, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:43:01', '2018-06-23 05:43:01'),
(266, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 05:43:02', '2018-06-23 05:43:02'),
(267, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:05:51', '2018-06-23 06:05:51'),
(268, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:06:26', '2018-06-23 06:06:26'),
(269, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:08:09', '2018-06-23 06:08:09'),
(270, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:08:21', '2018-06-23 06:08:21'),
(271, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:08:32', '2018-06-23 06:08:32'),
(272, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:13:17', '2018-06-23 06:13:17'),
(273, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:14:49', '2018-06-23 06:14:49'),
(274, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:16:26', '2018-06-23 06:16:26'),
(275, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:18:27', '2018-06-23 06:18:27'),
(276, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:20:35', '2018-06-23 06:20:35'),
(277, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:22:57', '2018-06-23 06:22:57'),
(278, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:25:56', '2018-06-23 06:25:56'),
(279, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:26:18', '2018-06-23 06:26:18'),
(280, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:31:59', '2018-06-23 06:31:59'),
(281, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:32:38', '2018-06-23 06:32:38'),
(282, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:34:37', '2018-06-23 06:34:37'),
(283, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:35:35', '2018-06-23 06:35:35'),
(284, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:36:23', '2018-06-23 06:36:23'),
(285, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:36:57', '2018-06-23 06:36:57'),
(286, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:38:39', '2018-06-23 06:38:39'),
(287, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:41:23', '2018-06-23 06:41:23'),
(288, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:45:50', '2018-06-23 06:45:50'),
(289, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:46:21', '2018-06-23 06:46:21'),
(290, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:48:00', '2018-06-23 06:48:00'),
(291, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:55:31', '2018-06-23 06:55:31'),
(292, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 06:57:22', '2018-06-23 06:57:22'),
(293, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:01:02', '2018-06-23 07:01:02'),
(294, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:01:05', '2018-06-23 07:01:05'),
(295, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:02:56', '2018-06-23 07:02:56'),
(296, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:03:09', '2018-06-23 07:03:09'),
(297, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:09:44', '2018-06-23 07:09:44'),
(298, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:10:59', '2018-06-23 07:10:59'),
(299, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:11:57', '2018-06-23 07:11:57'),
(300, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:12:04', '2018-06-23 07:12:04'),
(301, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:23:40', '2018-06-23 07:23:40'),
(302, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:34:14', '2018-06-23 07:34:14'),
(303, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:36:16', '2018-06-23 07:36:16'),
(304, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:39:15', '2018-06-23 07:39:15'),
(305, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:40:22', '2018-06-23 07:40:22'),
(306, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:40:36', '2018-06-23 07:40:36'),
(307, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:41:14', '2018-06-23 07:41:14'),
(308, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:42:38', '2018-06-23 07:42:38'),
(309, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:42:41', '2018-06-23 07:42:41'),
(310, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:43:08', '2018-06-23 07:43:08'),
(311, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:44:13', '2018-06-23 07:44:13'),
(312, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:46:04', '2018-06-23 07:46:04'),
(313, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:46:16', '2018-06-23 07:46:16'),
(314, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:47:59', '2018-06-23 07:47:59'),
(315, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:48:01', '2018-06-23 07:48:01'),
(316, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:48:04', '2018-06-23 07:48:04'),
(317, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:50:20', '2018-06-23 07:50:20'),
(318, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:50:23', '2018-06-23 07:50:23'),
(319, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-23 07:50:33', '2018-06-23 07:50:33'),
(320, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-24 23:23:47', '2018-06-24 23:23:47'),
(321, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-24 23:25:49', '2018-06-24 23:25:49'),
(322, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-24 23:35:44', '2018-06-24 23:35:44'),
(323, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-24 23:35:46', '2018-06-24 23:35:46'),
(324, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-24 23:35:48', '2018-06-24 23:35:48'),
(325, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-24 23:35:49', '2018-06-24 23:35:49'),
(326, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-24 23:35:50', '2018-06-24 23:35:50'),
(327, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-24 23:35:52', '2018-06-24 23:35:52'),
(328, 2, 'habeeba', 'search', 'search by habeeba=>,postion=Speech/Language Pathologist', '2018-06-24 23:35:54', '2018-06-24 23:35:54'),
(329, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:12:15', '2018-06-25 03:12:15'),
(330, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:14:26', '2018-06-25 03:14:26'),
(331, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:14:59', '2018-06-25 03:14:59'),
(332, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:18:13', '2018-06-25 03:18:13'),
(333, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:18:17', '2018-06-25 03:18:17'),
(334, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:18:42', '2018-06-25 03:18:42'),
(335, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:18:45', '2018-06-25 03:18:45'),
(336, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:20:36', '2018-06-25 03:20:36'),
(337, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:20:38', '2018-06-25 03:20:38'),
(338, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:20:39', '2018-06-25 03:20:39'),
(339, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:20:40', '2018-06-25 03:20:40'),
(340, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:24:22', '2018-06-25 03:24:22'),
(341, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:24:25', '2018-06-25 03:24:25'),
(342, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:24:37', '2018-06-25 03:24:37'),
(343, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:24:40', '2018-06-25 03:24:40'),
(344, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:26:12', '2018-06-25 03:26:12'),
(345, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:26:15', '2018-06-25 03:26:15'),
(346, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:32:50', '2018-06-25 03:32:50'),
(347, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:32:51', '2018-06-25 03:32:51'),
(348, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:33:51', '2018-06-25 03:33:51'),
(349, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:33:53', '2018-06-25 03:33:53'),
(350, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:33:57', '2018-06-25 03:33:57'),
(351, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:34:17', '2018-06-25 03:34:17'),
(352, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:34:20', '2018-06-25 03:34:20'),
(353, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 03:34:46', '2018-06-25 03:34:46'),
(354, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:37:28', '2018-06-25 04:37:28'),
(355, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:37:34', '2018-06-25 04:37:34'),
(356, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:40:24', '2018-06-25 04:40:24'),
(357, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:40:28', '2018-06-25 04:40:28'),
(358, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:40:39', '2018-06-25 04:40:39'),
(359, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:40:50', '2018-06-25 04:40:50'),
(360, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:41:11', '2018-06-25 04:41:11'),
(361, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:41:14', '2018-06-25 04:41:14'),
(362, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:41:48', '2018-06-25 04:41:48'),
(363, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:41:51', '2018-06-25 04:41:51'),
(364, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:44:44', '2018-06-25 04:44:44'),
(365, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:44:46', '2018-06-25 04:44:46'),
(366, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:44:48', '2018-06-25 04:44:48'),
(367, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:44:58', '2018-06-25 04:44:58'),
(368, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:45:08', '2018-06-25 04:45:08'),
(369, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:45:36', '2018-06-25 04:45:36'),
(370, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:45:39', '2018-06-25 04:45:39'),
(371, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:45:50', '2018-06-25 04:45:50'),
(372, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:46:23', '2018-06-25 04:46:23'),
(373, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:47:27', '2018-06-25 04:47:27'),
(374, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:47:35', '2018-06-25 04:47:35'),
(375, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:47:44', '2018-06-25 04:47:44'),
(376, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:47:47', '2018-06-25 04:47:47'),
(377, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 04:47:51', '2018-06-25 04:47:51'),
(378, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:03:56', '2018-06-25 05:03:56'),
(379, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:04:03', '2018-06-25 05:04:03'),
(380, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:04:07', '2018-06-25 05:04:07'),
(381, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:04:10', '2018-06-25 05:04:10'),
(382, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:06:13', '2018-06-25 05:06:13'),
(383, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:07:17', '2018-06-25 05:07:17'),
(384, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:07:35', '2018-06-25 05:07:35'),
(385, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:07:42', '2018-06-25 05:07:42'),
(386, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:07:47', '2018-06-25 05:07:47'),
(387, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:09:19', '2018-06-25 05:09:19'),
(388, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:09:22', '2018-06-25 05:09:22'),
(389, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:09:29', '2018-06-25 05:09:29'),
(390, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:09:43', '2018-06-25 05:09:43'),
(391, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:10:19', '2018-06-25 05:10:19'),
(392, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:10:22', '2018-06-25 05:10:22'),
(393, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:10:25', '2018-06-25 05:10:25'),
(394, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:10:32', '2018-06-25 05:10:32'),
(395, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:10:36', '2018-06-25 05:10:36'),
(396, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:11:37', '2018-06-25 05:11:37'),
(397, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:11:39', '2018-06-25 05:11:39'),
(398, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:11:44', '2018-06-25 05:11:44'),
(399, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:13:05', '2018-06-25 05:13:05'),
(400, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:13:07', '2018-06-25 05:13:07'),
(401, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:13:11', '2018-06-25 05:13:11'),
(402, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:01', '2018-06-25 05:16:01'),
(403, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:03', '2018-06-25 05:16:03'),
(404, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:06', '2018-06-25 05:16:06'),
(405, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:08', '2018-06-25 05:16:08'),
(406, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:10', '2018-06-25 05:16:10'),
(407, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:24', '2018-06-25 05:16:24'),
(408, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:25', '2018-06-25 05:16:25'),
(409, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:45', '2018-06-25 05:16:45'),
(410, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:56', '2018-06-25 05:16:56'),
(411, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:16:58', '2018-06-25 05:16:58'),
(412, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:17:02', '2018-06-25 05:17:02'),
(413, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:17:08', '2018-06-25 05:17:08'),
(414, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:23:27', '2018-06-25 05:23:27'),
(415, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:23:44', '2018-06-25 05:23:44'),
(416, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:23:47', '2018-06-25 05:23:47'),
(417, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:24:04', '2018-06-25 05:24:04'),
(418, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:24:19', '2018-06-25 05:24:19'),
(419, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:24:20', '2018-06-25 05:24:20'),
(420, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:26:38', '2018-06-25 05:26:38'),
(421, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:26:42', '2018-06-25 05:26:42'),
(422, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:26:46', '2018-06-25 05:26:46'),
(423, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:26:47', '2018-06-25 05:26:47'),
(424, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:26:47', '2018-06-25 05:26:47'),
(425, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:27:11', '2018-06-25 05:27:11'),
(426, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:27:12', '2018-06-25 05:27:12'),
(427, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:40:25', '2018-06-25 05:40:25'),
(428, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:40:28', '2018-06-25 05:40:28'),
(429, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:40:37', '2018-06-25 05:40:37'),
(430, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:51:35', '2018-06-25 05:51:35'),
(431, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:51:43', '2018-06-25 05:51:43'),
(432, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 05:51:52', '2018-06-25 05:51:52'),
(433, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:06:48', '2018-06-25 06:06:48'),
(434, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:08:41', '2018-06-25 06:08:41'),
(435, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:08:42', '2018-06-25 06:08:42'),
(436, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:09:23', '2018-06-25 06:09:23'),
(437, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:11:07', '2018-06-25 06:11:07'),
(438, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:32:40', '2018-06-25 06:32:40'),
(439, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:32:59', '2018-06-25 06:32:59'),
(440, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:01', '2018-06-25 06:33:01'),
(441, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:02', '2018-06-25 06:33:02'),
(442, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:36', '2018-06-25 06:33:36'),
(443, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:37', '2018-06-25 06:33:37'),
(444, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:38', '2018-06-25 06:33:38'),
(445, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:39', '2018-06-25 06:33:39'),
(446, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:51', '2018-06-25 06:33:51'),
(447, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:33:59', '2018-06-25 06:33:59'),
(448, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:34:01', '2018-06-25 06:34:01'),
(449, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:34:01', '2018-06-25 06:34:01'),
(450, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:43:21', '2018-06-25 06:43:21'),
(451, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:43:52', '2018-06-25 06:43:52'),
(452, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:44:03', '2018-06-25 06:44:03'),
(453, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:44:45', '2018-06-25 06:44:45'),
(454, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:44:50', '2018-06-25 06:44:50'),
(455, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:45:21', '2018-06-25 06:45:21'),
(456, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:45:23', '2018-06-25 06:45:23'),
(457, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:45:29', '2018-06-25 06:45:29'),
(458, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:45:31', '2018-06-25 06:45:31'),
(459, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:47:32', '2018-06-25 06:47:32'),
(460, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:47:46', '2018-06-25 06:47:46'),
(461, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:48:05', '2018-06-25 06:48:05'),
(462, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:49:35', '2018-06-25 06:49:35'),
(463, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:49:52', '2018-06-25 06:49:52'),
(464, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:49:54', '2018-06-25 06:49:54'),
(465, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:49:55', '2018-06-25 06:49:55'),
(466, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:49:55', '2018-06-25 06:49:55'),
(467, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:49:56', '2018-06-25 06:49:56'),
(468, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:50:07', '2018-06-25 06:50:07'),
(469, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:50:16', '2018-06-25 06:50:16'),
(470, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:50:19', '2018-06-25 06:50:19'),
(471, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:50:26', '2018-06-25 06:50:26'),
(472, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:50:28', '2018-06-25 06:50:28'),
(473, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:52:35', '2018-06-25 06:52:35'),
(474, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:52:45', '2018-06-25 06:52:45'),
(475, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:54:18', '2018-06-25 06:54:18'),
(476, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:54:28', '2018-06-25 06:54:28'),
(477, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:54:41', '2018-06-25 06:54:41'),
(478, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:55:26', '2018-06-25 06:55:26'),
(479, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:57:13', '2018-06-25 06:57:13'),
(480, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:58:03', '2018-06-25 06:58:03'),
(481, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:58:26', '2018-06-25 06:58:26'),
(482, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:58:41', '2018-06-25 06:58:41'),
(483, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 06:59:42', '2018-06-25 06:59:42'),
(484, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:02:02', '2018-06-25 07:02:02'),
(485, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:12:50', '2018-06-25 07:12:50'),
(486, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:13:10', '2018-06-25 07:13:10'),
(487, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:15:55', '2018-06-25 07:15:55'),
(488, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:17:05', '2018-06-25 07:17:05'),
(489, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:29:38', '2018-06-25 07:29:38'),
(490, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:30:59', '2018-06-25 07:30:59'),
(491, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:32:32', '2018-06-25 07:32:32'),
(492, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:33:01', '2018-06-25 07:33:01'),
(493, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:38:55', '2018-06-25 07:38:55'),
(494, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:40:17', '2018-06-25 07:40:17'),
(495, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:40:25', '2018-06-25 07:40:25'),
(496, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:40:29', '2018-06-25 07:40:29'),
(497, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:41:17', '2018-06-25 07:41:17'),
(498, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:41:18', '2018-06-25 07:41:18'),
(499, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:41:23', '2018-06-25 07:41:23'),
(500, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:41:25', '2018-06-25 07:41:25'),
(501, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:41:30', '2018-06-25 07:41:30'),
(502, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:42:08', '2018-06-25 07:42:08'),
(503, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:42:14', '2018-06-25 07:42:14'),
(504, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:42:15', '2018-06-25 07:42:15'),
(505, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:03', '2018-06-25 07:44:03'),
(506, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:05', '2018-06-25 07:44:05'),
(507, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:06', '2018-06-25 07:44:06'),
(508, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:14', '2018-06-25 07:44:14'),
(509, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:27', '2018-06-25 07:44:27'),
(510, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:28', '2018-06-25 07:44:28'),
(511, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:31', '2018-06-25 07:44:31'),
(512, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:32', '2018-06-25 07:44:32'),
(513, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:34', '2018-06-25 07:44:34'),
(514, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:44:36', '2018-06-25 07:44:36'),
(515, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:45:54', '2018-06-25 07:45:54'),
(516, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 07:57:53', '2018-06-25 07:57:53'),
(517, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:04:02', '2018-06-25 08:04:02'),
(518, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:07:58', '2018-06-25 08:07:58'),
(519, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:08:00', '2018-06-25 08:08:00'),
(520, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:08:02', '2018-06-25 08:08:02'),
(521, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:08:03', '2018-06-25 08:08:03'),
(522, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:08:04', '2018-06-25 08:08:04'),
(523, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:08:05', '2018-06-25 08:08:05'),
(524, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:08:06', '2018-06-25 08:08:06'),
(525, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:08:25', '2018-06-25 08:08:25'),
(526, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:09:53', '2018-06-25 08:09:53'),
(527, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:09:54', '2018-06-25 08:09:54'),
(528, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:10:04', '2018-06-25 08:10:04'),
(529, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 08:10:05', '2018-06-25 08:10:05'),
(530, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:37:55', '2018-06-25 23:37:55');
INSERT INTO `system_log` (`id`, `user_id`, `name`, `type`, `comment`, `created_at`, `updated_at`) VALUES
(531, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:37:58', '2018-06-25 23:37:58'),
(532, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:37:59', '2018-06-25 23:37:59'),
(533, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:38:24', '2018-06-25 23:38:24'),
(534, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:38:29', '2018-06-25 23:38:29'),
(535, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:38:45', '2018-06-25 23:38:45'),
(536, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:05', '2018-06-25 23:44:05'),
(537, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:07', '2018-06-25 23:44:07'),
(538, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:28', '2018-06-25 23:44:28'),
(539, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:30', '2018-06-25 23:44:30'),
(540, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:31', '2018-06-25 23:44:31'),
(541, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:32', '2018-06-25 23:44:32'),
(542, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:32', '2018-06-25 23:44:32'),
(543, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:36', '2018-06-25 23:44:36'),
(544, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:44:37', '2018-06-25 23:44:37'),
(545, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:06', '2018-06-25 23:49:06'),
(546, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:09', '2018-06-25 23:49:09'),
(547, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:13', '2018-06-25 23:49:13'),
(548, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:35', '2018-06-25 23:49:35'),
(549, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:44', '2018-06-25 23:49:44'),
(550, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:46', '2018-06-25 23:49:46'),
(551, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:47', '2018-06-25 23:49:47'),
(552, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:47', '2018-06-25 23:49:47'),
(553, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:47', '2018-06-25 23:49:47'),
(554, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:50', '2018-06-25 23:49:50'),
(555, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:49:51', '2018-06-25 23:49:51'),
(556, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:50:46', '2018-06-25 23:50:46'),
(557, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:50:50', '2018-06-25 23:50:50'),
(558, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:27', '2018-06-25 23:51:27'),
(559, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:29', '2018-06-25 23:51:29'),
(560, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:30', '2018-06-25 23:51:30'),
(561, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:50', '2018-06-25 23:51:50'),
(562, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:51', '2018-06-25 23:51:51'),
(563, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:52', '2018-06-25 23:51:52'),
(564, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:57', '2018-06-25 23:51:57'),
(565, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:59', '2018-06-25 23:51:59'),
(566, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:51:59', '2018-06-25 23:51:59'),
(567, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:52:00', '2018-06-25 23:52:00'),
(568, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:52:10', '2018-06-25 23:52:10'),
(569, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:52:11', '2018-06-25 23:52:11'),
(570, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:52:15', '2018-06-25 23:52:15'),
(571, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:52:17', '2018-06-25 23:52:17'),
(572, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-25 23:52:18', '2018-06-25 23:52:18'),
(573, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-26 00:03:20', '2018-06-26 00:03:20'),
(574, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-26 00:03:21', '2018-06-26 00:03:21'),
(575, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-26 00:05:32', '2018-06-26 00:05:32'),
(576, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-26 00:05:33', '2018-06-26 00:05:33'),
(577, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-26 00:05:41', '2018-06-26 00:05:41'),
(578, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-26 00:05:43', '2018-06-26 00:05:43'),
(579, 2, 'habeeba', 'view', 'viewed by habeeba', '2018-06-26 00:05:47', '2018-06-26 00:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `status`) VALUES
(1, 'jitendra', 'jitendra@atxlearning.com', '$2y$10$ebMSPXE6/.YE3auVCW2ct.nbKAmlXZ8u6Yh9ZzCvdJBfZTe33I.P6', '9HCLwXPnyPFadJUB9OFpS8TNTORRD1gL1L4mSB6rVpbejDwO6EqCv0H4BAc4', '2018-05-24 10:35:51', '2018-05-24 10:35:51', 1, 0),
(2, 'habeeba', 'habeeba@atxlearning.com', '$2y$10$ZDk498KnepD3BBn3EqpauOYmoopz2EPLdDSvRmYCFN9bYUtB/ox.i', 'wm9Qi4lDiwbKEGHjzTAe1JhRRlLsf2A4x6K4C4tM7AdSlMDiIHns38VO2Vi2', '2018-06-04 07:08:28', '2018-06-04 07:08:28', 0, 1),
(10, 'jks0586', 'jks0586@gmail.com', '$2y$10$JTzW/2AnPg4AYiFcgAeoS.YNdbZraGK9NkCugQUARom3PYyVxZSUK', NULL, '2018-06-04 12:12:10', '2018-06-06 05:26:16', 0, 1),
(11, 'aaa', 'aaa@aaa.com', '$2y$10$YdHcGJZCl4Mg36Yh7Kwec.2nmI0MXcwNaOXIFvIdEGc.52yOtYD6C', NULL, '2018-06-05 10:29:09', '2018-06-05 10:29:09', 0, 1),
(12, 'test', 'test@gmail.com', '$2y$10$wkYLPPM5hqChqmR0r0.PjubMAY3ArMN7Cl1W9/ty4buo1tgAu96Su', 'CsOM76DHpyplZNAeGgg9xeaewuxyqkioRMhhRaKT6Mgcp1c6nZ0U9wpKN52p', '2018-06-06 06:31:46', '2018-06-06 06:31:46', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employment_email_unique` (`email`);

--
-- Indexes for table `emp_comments`
--
ALTER TABLE `emp_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
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
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `emp_comments`
--
ALTER TABLE `emp_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
