-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2025 г., 20:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tgclonelara`
--

-- --------------------------------------------------------

--
-- Структура таблицы `channels`
--

CREATE TABLE `channels` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `owner_id` bigint UNSIGNED NOT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `channels`
--

INSERT INTO `channels` (`id`, `name`, `description`, `owner_id`, `is_private`, `created_at`, `updated_at`) VALUES
(19, 'клуб неудачников', 'мы', 2, 0, '2025-01-22 03:28:56', '2025-01-22 14:10:19'),
(20, 'нинаю', 'вывыфвфы', 2, 0, '2025-01-22 13:47:16', '2025-01-22 13:47:16');

-- --------------------------------------------------------

--
-- Структура таблицы `channel_subscribers`
--

CREATE TABLE `channel_subscribers` (
  `channel_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `channel_subscribers`
--

INSERT INTO `channel_subscribers` (`channel_id`, `user_id`, `created_at`, `updated_at`) VALUES
(19, 2, NULL, NULL),
(20, 1, NULL, NULL),
(20, 2, NULL, NULL),
(20, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `receiver_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `is_read`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Привет', 0, '2025-01-22 02:55:58', '2025-01-22 02:55:58'),
(3, 2, 1, 'Привет', 0, '2025-01-22 02:56:04', '2025-01-22 02:56:04'),
(4, 2, 1, 'пока', 0, '2025-01-22 02:58:12', '2025-01-22 02:58:12'),
(5, 1, 2, 'сама пока', 0, '2025-01-22 02:58:32', '2025-01-22 02:58:32'),
(6, 2, 1, 'ся', 0, '2025-01-22 02:59:19', '2025-01-22 02:59:19'),
(7, 2, 1, 'ся', 0, '2025-01-22 03:00:47', '2025-01-22 03:00:47'),
(8, 2, 1, 'ку', 0, '2025-01-22 03:00:53', '2025-01-22 03:00:53'),
(9, 2, 1, 'ку', 0, '2025-01-22 03:00:55', '2025-01-22 03:00:55'),
(10, 2, 1, 'ав', 0, '2025-01-22 03:04:45', '2025-01-22 03:04:45'),
(11, 2, 1, 'к', 0, '2025-01-22 03:05:16', '2025-01-22 03:05:16'),
(12, 2, 1, 'ыа', 0, '2025-01-22 03:05:29', '2025-01-22 03:05:29'),
(13, 2, 1, 'да', 0, '2025-01-22 03:42:17', '2025-01-22 03:42:17'),
(14, 2, 1, 'да', 0, '2025-01-22 03:42:17', '2025-01-22 03:42:17'),
(15, 2, 1, 'что тебе нужно?', 0, '2025-01-22 03:42:25', '2025-01-22 03:42:25'),
(16, 2, 1, 'что тебе нужно?', 0, '2025-01-22 03:42:25', '2025-01-22 03:42:25'),
(17, 2, 1, 'в', 0, '2025-01-22 03:42:29', '2025-01-22 03:42:29'),
(18, 2, 1, 'в', 0, '2025-01-22 03:42:29', '2025-01-22 03:42:29'),
(19, 2, 1, 'в', 0, '2025-01-22 03:42:49', '2025-01-22 03:42:49'),
(20, 2, 1, 'в', 0, '2025-01-22 03:42:53', '2025-01-22 03:42:53'),
(21, 2, 1, 'что тебе', 0, '2025-01-22 03:44:54', '2025-01-22 03:44:54'),
(22, 2, 1, 'нужно?', 0, '2025-01-22 03:45:01', '2025-01-22 03:45:01'),
(23, 1, 2, '?', 0, '2025-01-22 13:12:39', '2025-01-22 13:12:39'),
(24, 1, 2, 'в', 0, '2025-01-22 13:12:43', '2025-01-22 13:12:43'),
(25, 1, 2, 'пошел в попу тупой', 0, '2025-01-22 13:17:01', '2025-01-22 13:17:01'),
(26, 2, 1, 'r', 0, '2025-01-22 14:07:53', '2025-01-22 14:07:53'),
(27, 1, 3, 'ку', 0, '2025-01-22 15:01:53', '2025-01-22 15:01:53'),
(28, 2, 1, 'ладно', 0, '2025-01-22 15:05:32', '2025-01-22 15:05:32'),
(29, 3, 1, 'да', 0, '2025-01-22 15:43:45', '2025-01-22 15:43:45'),
(30, 3, 1, 'да', 0, '2025-01-22 15:43:45', '2025-01-22 15:43:45'),
(31, 3, 1, 'ку', 0, '2025-01-22 15:43:51', '2025-01-22 15:43:51'),
(32, 3, 1, 'привнт', 0, '2025-01-22 15:43:59', '2025-01-22 15:43:59'),
(33, 2, 1, 'ты где нигга', 0, '2025-01-22 15:45:10', '2025-01-22 15:45:10'),
(34, 1, 3, 'dc', 0, '2025-01-22 15:50:04', '2025-01-22 15:50:04'),
(35, 1, 2, 'нигде', 0, '2025-01-22 15:50:42', '2025-01-22 15:50:42'),
(36, 1, 2, 'чо там', 0, '2025-01-22 15:52:58', '2025-01-22 15:52:58'),
(37, 1, 2, 'ky', 0, '2025-01-22 15:57:59', '2025-01-22 15:57:59'),
(38, 2, 1, 'чо', 0, '2025-01-22 16:05:26', '2025-01-22 16:05:26'),
(39, 2, 1, 'чо надо??', 0, '2025-01-22 16:05:35', '2025-01-22 16:05:35'),
(40, 1, 2, '&', 0, '2025-01-22 16:10:36', '2025-01-22 16:10:36'),
(41, 2, 1, '?', 0, '2025-01-22 16:10:46', '2025-01-22 16:10:46'),
(42, 1, 2, 'зайди алооо', 0, '2025-01-22 17:00:29', '2025-01-22 17:00:29'),
(43, 1, 3, 'ты где', 0, '2025-01-23 13:50:18', '2025-01-23 13:50:18'),
(45, 3, 1, 'да я здесь', 0, '2025-01-23 14:02:35', '2025-01-23 14:02:35');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_22_045044_create_channels_table', 1),
(6, '2025_01_22_045054_create_posts_table', 1),
(7, '2025_01_22_045103_create_messages_table', 1),
(8, '2025_01_22_045112_create_reactions_table', 1),
(9, '2025_01_22_045122_create_channel_subscribers_table', 1),
(10, '2025_01_22_193055_add_last_activity_to_users_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `channel_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reactions`
--

CREATE TABLE `reactions` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`, `last_activity`, `is_online`) VALUES
(1, 'kirik34564', 'avatars/597QrIsR4kAUn4hS13CJJH52grzfrhLxSUoQ5TSh.webp', 'kirik34564@mail.ru', NULL, '$2y$10$VOM7X9OpneyXmBWfbPMZAOg2chR9yrV0YnaopXbr.IwskCqDs1nh6', '2025-01-22 02:14:20', '2025-01-23 14:11:42', '2025-01-23 14:11:42', 1),
(2, 'Zaitova', 'avatars/Lv6mYmf5eRnbhdv5mVyW8cEo2n3TSBZXrXIv5iHX.png', 'makhail1337@mail.ru', NULL, '$2y$10$3.zUF7ySbfUBhCC967ddbOKFIxIgsvbrW9Cc80arxQ.m60DfZRLcC', '2025-01-22 02:43:50', '2025-01-23 13:54:34', '2025-01-23 13:54:34', 1),
(3, 'vladimir222', 'avatars/CycFNfLKuYjWTLSKZeblOiG5EV5kJYL7GYdF6xKL.png', 'masha123@mail.ru', NULL, '$2y$10$0tLwxN6xM.f.eYE5qrC58.L3W2vga8AUMhBJ7u6TRL2CLMowrYyeO', '2025-01-22 03:57:51', '2025-01-23 14:11:34', '2025-01-23 14:11:34', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channels_owner_id_foreign` (`owner_id`);

--
-- Индексы таблицы `channel_subscribers`
--
ALTER TABLE `channel_subscribers`
  ADD PRIMARY KEY (`channel_id`,`user_id`),
  ADD KEY `channel_subscribers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_channel_id_foreign` (`channel_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reactions_post_id_foreign` (`post_id`),
  ADD KEY `reactions_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `channel_subscribers`
--
ALTER TABLE `channel_subscribers`
  ADD CONSTRAINT `channel_subscribers_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`),
  ADD CONSTRAINT `channel_subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `reactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
