-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 21-Jul-2020 às 01:08
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `subtitle`, `image`, `image_mobile`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', 'disam_home_05-19-07-2020(01-15-46).jpg', 'disam_home_11-19-07-2020(01-19-15).jpg', 1, NULL, '2020-07-19 02:19:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `category_blog`
--

CREATE TABLE `category_blog` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category_blog`
--

INSERT INTO `category_blog` (`id`, `category`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Móveis planejados', 'moveis-planejados', 1, '2019-11-29 13:30:04', '2019-11-29 16:30:04', '0000-00-00 00:00:00'),
(2, 'Notícias', 'noticias', 1, '2016-06-02 23:15:34', '2016-06-03 06:15:34', '0000-00-00 00:00:00'),
(3, 'Tendências', 'tendencias', 1, '2019-08-12 18:10:45', '2019-08-12 18:10:45', '0000-00-00 00:00:00'),
(4, 'Negócios', 'negocios', 1, '2019-08-12 18:10:54', '2019-08-12 18:10:54', '0000-00-00 00:00:00'),
(7, 'Teste Wagner', 'teste-wagner', 0, '2019-11-29 13:31:52', '2019-11-29 16:31:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_newsletters`
--

CREATE TABLE `email_newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `email_newsletters`
--

INSERT INTO `email_newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'wagner.abr@hotmail.com', '2020-02-13 22:47:16', '2020-02-13 22:47:16'),
(2, 'wagnerabr.2011@gmail.com', '2020-02-13 23:21:05', '2020-02-13 23:21:05'),
(3, 'wagner@bitpix.com.br', '2020-02-13 23:25:00', '2020-02-13 23:25:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2019_10_04_195138_create_banners_table', 1),
('2019_10_07_123731_create_environments_table', 2),
('2019_10_07_175519_create_projects_table', 3),
('2019_10_07_181633_create_posts_table', 4),
('2019_10_07_182443_create_categories_table', 5),
('2019_10_07_184020_create_settings_table', 5),
('2019_10_07_190803_create_permissions_table', 6),
('2019_10_07_194053_add_architect_to_environments_table', 7),
('2019_10_09_185958_add_short_description_to_environments_table', 8),
('2019_10_18_165204_add_image_mobile_to_banners_table', 9),
('2019_12_04_131016_add_imagem_to_environments_table', 10),
('2019_12_04_135653_add_slug_status_to_environments_table', 11),
('2019_12_04_181726_add_slug_to_projects_table', 12),
('2020_02_13_170713_create_email_newsletters_table', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_blog`
--

CREATE TABLE `post_blog` (
  `id` int(11) NOT NULL,
  `id_category_blog` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `photos` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post_blog`
--

INSERT INTO `post_blog` (`id`, `id_category_blog`, `title`, `text`, `meta_description`, `author`, `photos`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(183, 7, 'Teste post ', '<p>Praesent gravida semper dolor tristique viverra. Phasellus orci ipsum, euismod sit amet posuere sed, laoreet commodo odio. Mauris sed dictum diam, non congue quam. Proin vel facilisis dolor. In iaculis id justo et faucibus. Nunc fermentum lectus turpis, a fermentum ex dignissim nec. Proin vitae magna non magna rhoncus blandit eget eget ex. Proin in felis mauris. Morbi a sagittis magna.</p>\r\n\r\n<p>In hac habitasse platea dictumst. Sed blandit quis velit quis tincidunt. Vivamus vel est mi. Sed non rutrum metus. Nullam at condimentum purus, id volutpat lacus. Proin congue massa eget lacus interdum ullamcorper. Aliquam malesuada lobortis lorem, id egestas neque scelerisque vitae.</p>\r\n\r\n<p>Donec sodales porta felis, non congue lectus volutpat in. Integer quis eros nunc. Sed velit orci, scelerisque sit amet nisi vel, consectetur euismod tellus. Quisque molestie, tortor vitae tempus tincidunt, dui risus hendrerit turpis, quis eleifend nisi nibh eget nisi. Pellentesque ultricies urna ut nibh efficitur, nec porttitor lectus lobortis. Aliquam posuere sagittis nunc a rutrum. Duis suscipit aliquam enim sed euismod. Fusce leo mauris, vehicula id eleifend a, pharetra eu urna. Vestibulum sed turpis a quam suscipit rhoncus convallis ac eros. Mauris gravida iaculis mauris, molestie maximus ligula aliquet eget.</p>\r\n', 'Teste meta description', 'Wagner ', '48673897507_f109b8b1b6_z-04-12-2019(13-51-03).jpg', 'teste-post', 1, '2020-03-23 21:11:41', '2020-03-24 00:11:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wagner', 'wagner.abr@hotmail.com', '$2y$10$Y2oGj5vOby20JOgZQd2seuJKMjaHLArX7SCDe/snWAqh2afN0u4qq', 'bl1wWbva3Rg9RHcsVXLsOImSzh8MqPwGLlEjEWYu1wSrHAfsvQSvlYnLWLhf', '2017-08-31 21:39:54', '2019-11-29 00:24:18'),
(2, 'Dra. Juliana', 'contato@mediconaesteticadrajulianamartines.com', '$2y$10$spwjk5SKz.cHB0BPa0uVEef1uch3crCL/j4ZkCaWCh.cQYMxxXbAm', '2jVk8H3W2pbm0xHqVGyTNSWkMLEF0XGyuvKfGtPeT85p87PR3gBu2sERnN7R', '2020-03-19 16:20:55', '2020-04-09 20:44:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_blog`
--
ALTER TABLE `category_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_newsletters`
--
ALTER TABLE `email_newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_blog`
--
ALTER TABLE `post_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idcategory_blog_idx` (`id_category_blog`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_blog`
--
ALTER TABLE `category_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_newsletters`
--
ALTER TABLE `email_newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_blog`
--
ALTER TABLE `post_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
