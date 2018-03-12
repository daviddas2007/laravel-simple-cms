-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 11:13 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivscms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'david das', 'admin', 'daviddas2007@gmail.com', NULL, '$2y$10$ALI6lzORoBjNTMnvrldRuOlDYCh8DNGx2r3WacZqND44Xdi1oLLcC', 'RvY90yeN8KN73jeuoiT57tMLLAy582Mwcv3Jqbr50yAJxhe6yxBUrCONIVdc', '2017-09-14 04:42:18', '2017-09-14 04:42:18');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_12_052554_create_admins_table', 1),
(4, '2017_05_05_100001_create_menus_table', 2);

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
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `target` enum('_blank','_self') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `uload_folder` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_folder` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `parent_id`, `key`, `url`, `icon`, `permission`, `role`, `name`, `description`, `target`, `order`, `uload_folder`, `slug`, `status`, `user_id`, `user_type`, `upload_folder`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', NULL, NULL, NULL, NULL, 'admin', NULL, NULL, 1, NULL, 'admin', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 'user', NULL, NULL, NULL, NULL, 'User', NULL, NULL, 2, NULL, 'user', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, NULL, 'admin/menu', 'fa fa-bars', NULL, NULL, 'Menu', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(4, 1, NULL, 'admin/pages', 'fa fa-book', NULL, NULL, 'pages', NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(5, 1, NULL, '#', 'fa fa-tv', NULL, NULL, 'Sliders', NULL, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(6, 5, NULL, 'admin/sliders', 'fa fa-circle-o', NULL, NULL, 'Sliders', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(7, 5, NULL, 'admin/sliders/groups', 'fa fa-circle-o', NULL, NULL, 'Groups', NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(8, 5, NULL, 'admin/sliders/settings', 'fa fa-circle-o', NULL, NULL, 'Settings', NULL, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(9, 1, NULL, '#', 'fa fa-cog', NULL, NULL, 'Settings', NULL, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(10, 9, NULL, 'admin/settings/global', 'fa fa-circle-o', NULL, NULL, 'Global', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:18:12'),
(12, 2, NULL, 'uytu', NULL, NULL, NULL, 'utuyt', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0, 'social', NULL, NULL, NULL, NULL, 'Social', NULL, NULL, 3, NULL, 'social', 1, NULL, NULL, NULL, NULL, NULL, '2017-09-15 00:36:13'),
(14, 13, NULL, 'www.twitter.com', 'fa fa-twitter', NULL, NULL, 'Twitter', NULL, '_blank', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-09-18 05:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `heading` varchar(100) DEFAULT NULL,
  `meta_keyword` text,
  `meta_description` text,
  `order` int(10) DEFAULT NULL,
  `status` enum('activate','deactivate') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `title`, `slug`, `content`, `meta_title`, `heading`, `meta_keyword`, `meta_description`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<p>my name id david das</p><p><br></p><p><br></p><p><img src=\"http://localhost:8080/cms/public/uploads/pages/2688f86b18b9a9eeed468a3c965a50c255184.jpg\" style=\"width: 50%;\"><br></p>', 'About Us', 'About Us', 'About Us', 'About Us', NULL, 'activate', '2017-09-14 11:09:13', '2017-09-14 11:09:13'),
(2, 'FAQ', 'faq', '<div class=\"rte col-md-offset-2 col-md-8 col-sm-12 col-sm-offset-0\">    <h4 class=\"p1\">Simple answers to your most common&nbsp;questions</h4><p class=\"p1\"><span class=\"s1\"><b>What\'s included?<br></b></span>Good question! Every theme ships with an example site, compiled CSS and JavaScript, new theme-specific components, a documentation page, a Gulpfile for compiling on your own, and the source Less/Sass and JavaScript files (Less for Bootstrap 3, Sass for Bootstrap 4 – both are included in the download).&nbsp;</p><p class=\"p1\"><span class=\"s1\"><b>What devices and browsers do you support?<br></b></span>We support the latest versions of Safari (OS X and iOS), Chrome, Firefox, and Internet Explorer. Internet Explorer 9-11 are also supported. Opera Mini and Android\'s native Browser are not officially supported.</p><meta charset=\"utf-8\"><p class=\"p1\" id=\"bootstrap4\"><span class=\"s1\"><b>Are the themes Bootstrap 4 yet?!<br></b></span><span>Yes they are! When you download a theme there are 2 main directories, one for the latest stable version of Bootstrap 3, and one for the latest alpha build of Bootstrap 4. We will continue to update BS4&nbsp;themes as new versions of BS4\'s core are released – right now it\'s still in alpha, but we\'ll keep our themes up to date as it advances towards beta.</span></p><meta charset=\"utf-8\"><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z b\"><b>Which license is right for me?</b></span></div><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\">The easiest way to decide which license you need is to ask “Who will have access to the theme’s code?” If the answer is “just me”, “me and my team”, or “me and the client that hired me,” you only need a <a href=\"/pages/our-license\" title=\"Our Licenses\">Multiple Use License</a>. If the answer is any group larger than that, you probably need an <a href=\"/pages/our-license\" title=\"Our Licenses\">Extended License</a>.&nbsp;</span></div><br><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\"></span></div><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\"></span></div><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\"></span></div><div></div><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z b\"><b>What’s an example of a proper use for each license?</b></span></div><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\">Okay, let’s talk about the hypothetical social network startup Happytown. The team at Happytown wants to ship a new feature to show their users personalized stats about their account. Our Dashboard theme seems like a good fit for them. As long as Happytown is hosting the service and not distributing code to their users, they only need a Multiple Use License.&nbsp;</span></div><br><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\"></span></div><div></div><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\">But what if Happytown ships an enterprise version of their social network and distributes the source code from the Dashboard theme to companies? Well, for that they would need an Extended License because that would constitute “redistribution” and (if they were charging for the software) “resale” of our code.</span></div><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\"></span></div><div></div><br><div><span class=\"author-d-gz71zz89zz86zqz85zz83zsyvz122zz73zz79zz80zcs9xg1xz122zocyz76z7jz70zafjz67z8z122zz83zuawz76zz82zz86zz85z04z67z\">For specific questions, always feel free to email us at <a href=\"mailto:%20themes@getbootstrap.com\">themes@getbootstrap.com</a>! We’d be happy to help you decide which license is right for you.&nbsp;</span></div><br><p class=\"p1\"><span class=\"s1\"><b>Can I redownload the themes I buy?<br></b></span>Sure! We email&nbsp;you&nbsp;a link that you can use to download your theme up to 20 times.&nbsp;We limit this to avoid download links being shared publicly. If you end up using all 20, no problem, just send an email to&nbsp;<a href=\"mailto:%20themes@getbootstrap.com\">themes@getbootstrap.com</a> and we\'ll get you squared away.</p><p class=\"p1\"><span class=\"s1\"><b>Can I get a refund?<br></b></span>Sure, just email us at <a href=\"mailto:refunds@getbootstrap.com\"><span class=\"s2\">themes+refunds@getbootstrap.com</span></a> with your invoice number and we\'ll get you sorted out.</p><meta charset=\"utf-8\"><p class=\"p1\"><span class=\"s1\"><b>Are theme updates free or paid for?<br></b></span>All theme updates are free for the life of a theme. We will notify you via the email when updates are available.</p><meta charset=\"utf-8\"><p class=\"p1\"><span class=\"s1\"><b>What do I do when I need&nbsp;help with a theme or have a question?<br></b></span><span>Shoot us an email at&nbsp;</span><a href=\"mailto:%20themes@getbootstrap.com\">themes@getbootstrap.com</a> and&nbsp;we\'ll get you squared away quickly :) We are focused on questions related to Bootstrap Themes though, so please no questions about Bootstrap core or general HTML, CSS, or JavaScript.&nbsp;</p><p class=\"p2\"><strong>I found&nbsp;a bug in&nbsp;Bootstrap itself, what do I do?<br></strong>Please file all Bootstrap related bugs over on the <a href=\"https://github.com/twbs/bootstrap\">Bootstrap issue tracker</a>. Thank you!</p><p class=\"p2\"><strong>What do I do if I found a bug or have other questions about Bootstrap Themes?<br></strong>If you think you\'ve found an issue or have any other questions not covered above, please email us at&nbsp;<a href=\"mailto:%20themes+issues@getbootstrap.com\">themes+issues@getbootstrap.com</a>. Please keep in mind that our current team is quite small and we\'ll do our&nbsp;very best to get back to you ASAP.</p><p class=\"p2\">&nbsp;</p>  </div>', 'FAQ', 'FAQ', 'FAQ', 'FAQ', NULL, 'activate', '2017-09-14 11:10:46', '2017-09-18 10:45:50'),
(3, 'How It Works', 'how-it-works', '<div class=\"entry-content\">								<h1><span style=\"color: #ed8c3b;\">What It Is</span></h1><h2>Our installment loans are a safer alternative to other types of cash advances.</h2><p>Installment loans are a safer alternative to traditional cash advances. Rather than having to repay your entire loan—plus fees and interest—on your next due date, installment loans allow you to customize your payment schedule. It is easy to get dragged into a cycle of high interest and fees. At USA Web Cash, we consider ourselves the alternative to predatory lenders.</p><h2>What is an installment loan?</h2><p>Installment loans allow you to make equal, manageable payments over a series of weeks or months. Our installment loans pay down a portion of the principal balance and interest with each payment. You only pay interest for the time you keep your loan, and there are no prepayment penalties. Our goal is to help you repay your loan and keep you out of the cycle of debt.</p><h1><span style=\"color: #ed8c3b;\">How It Works</span></h1><p>Bills pile up, cars break down, emergencies arise. What do you do when life throws you a curve ball? USA Web Cash is here to offer you a solution. Our installment loans have&nbsp;helped thousands of others in financial binds—&nbsp;and we can help you, too.</p><h2>Getting an installment loan from USA Web Cash is so easy!</h2><ol><li><strong>Apply&nbsp;</strong>Our <a href=\"/apply-now/\"><span style=\"color: #5ca713;\">quick and easy online application</span></a> only takes a few minutes! You can also apply by phone by calling (800) 618-6576.</li><li><strong>Get Approved&nbsp;</strong>Once you submit your application, we will tell you whether you’re approved within minutes.</li><li><strong>Get Your Cash&nbsp;</strong>USA Web Cash offers short-term personal loans up to $4,000.*</li><li><strong>Repay Your Loan&nbsp;</strong>USA Web Cash allows you to create a custom payment schedule that fits your needs. There are no hidden charges or fees with our installment loans—you only pay interest for the time you keep the loan. You can even pay off your loan early with absolutely no penalties! All payments can be made automatically, so you don’t have to mail a check or remember when payments are due.</li></ol><h6><img id=\"chart\" style=\"width: 638px; height: 343px; border-width: 0px; border-style: solid;\" src=\"https://usawebcash.com/wp-content/uploads/2016/10/USA-WEB-CASH-GRAPHICS-02-copy.png\" alt=\"\"></h6><h2>We make repayment work for you.</h2><p>We want your payment schedule to be manageable and tailored to your cash flow. At USA Web Cash you can customize your repayment, creating a schedule that makes sense for&nbsp;<em>you</em>.</p><h1><span style=\"color: #ed8c3b;\">Who It’s For</span></h1><h2>To pre-qualify for an installment loan from USA Web Cash, you must:</h2><ul><li>Have an active bank account that has been open for at least 30 days</li><li>Have a monthly income of at least $1,000 after taxes</li><li>Be at least 18 years of age</li><li>Additional loan requirements vary by state.&nbsp;Please check our&nbsp;<a href=\"/terms-and-rates\" target=\"_self\"><span style=\"color: #5ca713;\">Terms &amp; Rates</span></a>&nbsp;to see if we are licensed to lend in your state.</li></ul><p><span style=\"font-size: 9px;\">*Depending on statutory regulations.</span></p>															</div>', 'How It Works', 'How It Works', 'How It Works', 'How It Works', NULL, 'activate', '2017-09-21 06:15:50', '2017-09-21 06:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `meta_key`, `meta_value`) VALUES
(1, '_token', '9aoof5Zksfe4htVxLWtsN0e0DNTleXawamK9Fjv9'),
(2, 'site_name', 'Content Management System'),
(3, 'site_shortname', 'CMS'),
(4, 'logo_type', 'name'),
(5, 'site_description', 'Welcome to CMS. A powerful content management system!'),
(6, 'site_email', 'daviddas2007@gmail.com'),
(7, 'site_copyright', '<strong>Copyright © 2014-2016 <a href=\"http://ironpowers.tk/\">CMS</a>.</strong> All rights     reserved.'),
(8, 'site_logo', '2e2bb1700ebab2207545b79c95ebe44395289.jpg'),
(9, 'slider_min_width', '1200'),
(10, 'slider_min_height', '500'),
(11, 'slider_image_update', '1'),
(12, 'slider_image_types', 'jpeg,jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slidergroup`
--

CREATE TABLE `tbl_slidergroup` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `thumb_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `status` enum('activate','deactivate') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slidergroup`
--

INSERT INTO `tbl_slidergroup` (`id`, `name`, `slug`, `width`, `height`, `thumb_width`, `thumb_height`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home Slider', 'home-slider', 1200, 500, 100, 100, 'activate', '2017-09-14 11:03:53', '2017-09-19 01:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `description` text,
  `order` int(11) DEFAULT NULL,
  `status` enum('activate','deactivate') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`id`, `title`, `image`, `url`, `group_id`, `description`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cycling', 'c4a51412a64d01b68a1aaebe85da8b9288127.jpg', 'http://www.yahoo.com', 1, 'Checking git settings: OK\r\nChecking http connectivity: OK\r\nChecking disk free space: OK', 2, 'activate', '2017-09-14 11:06:37', '2018-03-12 10:09:30'),
(2, 'sunrise', 'f780d79511013f5250f1d00c7da7a21b93449.jpg', 'http://www.google.com', 1, 'good day', 1, 'activate', '2017-09-14 11:07:26', '2018-03-12 10:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slidergroup`
--
ALTER TABLE `tbl_slidergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_slidergroup`
--
ALTER TABLE `tbl_slidergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
