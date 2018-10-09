-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 09 2018 г., 10:44
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orbeli_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(53, '2014_10_12_000000_create_users_table', 1),
(54, '2014_10_12_100000_create_password_resets_table', 1),
(55, '2018_10_06_141550_create_post_type_table', 2),
(56, '2018_10_06_140054_create_tags_table', 3),
(57, '2018_10_06_134002_create_post_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `post_typ` int(10) UNSIGNED NOT NULL,
  `tag1` int(10) UNSIGNED NOT NULL,
  `tag2` int(10) UNSIGNED NOT NULL,
  `tag3` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `short_text`, `long_text`, `name`, `img`, `date`, `post_typ`, `tag1`, `tag2`, `tag3`, `created_at`, `updated_at`) VALUES
(1, 'Ջորջ Բալանդիերի', 'Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն', 'Ըստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտությունԸստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտությունԸստ Ջորջ Բալանդիերի, քաղաքական մարդաբանությունը ձգտում է գտնել գիտություն', 'Պ.ՊՈՂՈՍՅԱՆ', 'images/blog-img21.jpg', '2018-10-08', 1, 3, 5, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `post_type`
--

CREATE TABLE `post_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_type`
--

INSERT INTO `post_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Քաղաքականություն', NULL, NULL),
(2, 'Տնտեսություն', NULL, NULL),
(3, 'Անվտանգություն', NULL, NULL),
(4, 'Միջազգային', NULL, NULL),
(5, 'Տարածաշրջանային', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_typ` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`, `post_typ`, `created_at`, `updated_at`) VALUES
(3, 'Տար', 2, NULL, NULL),
(4, 'շրջան', 1, NULL, NULL),
(5, 'Երևան', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
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
-- Индексы сохранённых таблиц
--

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
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_post_typ_foreign` (`post_typ`),
  ADD KEY `posts_tag1_foreign` (`tag1`),
  ADD KEY `posts_tag2_foreign` (`tag2`),
  ADD KEY `posts_tag3_foreign` (`tag3`);

--
-- Индексы таблицы `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_post_typ_foreign` (`post_typ`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_post_typ_foreign` FOREIGN KEY (`post_typ`) REFERENCES `post_type` (`id`),
  ADD CONSTRAINT `posts_tag1_foreign` FOREIGN KEY (`tag1`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `posts_tag2_foreign` FOREIGN KEY (`tag2`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `posts_tag3_foreign` FOREIGN KEY (`tag3`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_post_typ_foreign` FOREIGN KEY (`post_typ`) REFERENCES `post_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
