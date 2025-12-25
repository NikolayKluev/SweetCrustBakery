-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4
-- Время создания: Дек 25 2025 г., 21:32
-- Версия сервера: 8.4.6
-- Версия PHP: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sweet_crust_bakery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'хлеб', NULL, NULL),
(2, 'сдоба', NULL, NULL),
(3, 'торты', NULL, NULL),
(4, 'кондитерские изделия', NULL, NULL),
(5, 'слоеные изделия', NULL, NULL),
(6, 'пирожки', NULL, NULL),
(7, 'пироги', NULL, NULL),
(8, 'напитки', NULL, NULL);

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '2025_11_19_003759_create_categories_table', 1),
(3, '2025_11_19_003834_create_payment_method_table', 1),
(4, '2025_11_19_171536_create_users_table', 1),
(5, '2025_11_19_171606_create_products_table', 1),
(6, '2025_11_19_171718_create_orders_table', 1),
(7, '2025_11_19_171738_create_order_items_table', 1),
(8, '2025_11_19_171843_create_reviews_table', 1),
(9, '2025_11_19_171858_create_promotions_table', 1),
(10, '2025_11_19_171918_create_payments_table', 1),
(11, '2025_11_27_183447_update_users_table', 2),
(12, '2025_11_27_193056_update_users_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('unpaid','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 2, 865.00, 'pending', 'paid', '2025-11-29 16:24:16', '2025-11-29 16:24:16'),
(3, 2, 335.00, 'pending', 'paid', '2025-11-29 16:36:40', '2025-11-29 16:36:40'),
(4, 2, 325.00, 'pending', 'paid', '2025-11-29 16:38:57', '2025-11-29 16:38:57'),
(5, 3, 760.00, 'pending', 'paid', '2025-11-30 12:40:35', '2025-11-30 12:40:35'),
(6, 3, 220.00, 'pending', 'paid', '2025-12-13 13:29:02', '2025-12-13 13:29:02'),
(7, 3, 315.00, 'pending', 'paid', '2025-12-13 14:50:10', '2025-12-13 14:50:10'),
(8, 3, 400.00, 'pending', 'paid', '2025-12-13 14:53:05', '2025-12-13 14:53:05'),
(9, 3, 170.00, 'pending', 'paid', '2025-12-13 15:52:59', '2025-12-13 15:52:59');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 8, 1, 65.00, '2025-11-29 16:24:16', '2025-11-29 16:24:16'),
(2, 2, 9, 1, 800.00, '2025-11-29 16:24:16', '2025-11-29 16:24:16'),
(3, 3, 2, 1, 120.00, '2025-11-29 16:36:40', '2025-11-29 16:36:40'),
(4, 3, 6, 1, 95.00, '2025-11-29 16:36:40', '2025-11-29 16:36:40'),
(5, 3, 11, 1, 120.00, '2025-11-29 16:36:40', '2025-11-29 16:36:40'),
(6, 4, 18, 1, 150.00, '2025-11-29 16:38:57', '2025-11-29 16:38:57'),
(7, 4, 5, 1, 80.00, '2025-11-29 16:38:57', '2025-11-29 16:38:57'),
(8, 4, 6, 1, 95.00, '2025-11-29 16:38:57', '2025-11-29 16:38:57'),
(9, 5, 8, 1, 65.00, '2025-11-30 12:40:35', '2025-11-30 12:40:35'),
(10, 5, 7, 1, 80.00, '2025-11-30 12:40:35', '2025-11-30 12:40:35'),
(11, 5, 14, 1, 75.00, '2025-11-30 12:40:35', '2025-11-30 12:40:35'),
(12, 5, 18, 1, 150.00, '2025-11-30 12:40:35', '2025-11-30 12:40:35'),
(13, 5, 16, 2, 130.00, '2025-11-30 12:40:35', '2025-11-30 12:40:35'),
(14, 5, 17, 1, 130.00, '2025-11-30 12:40:35', '2025-11-30 12:40:35'),
(15, 6, 14, 1, 75.00, '2025-12-13 13:29:02', '2025-12-13 13:29:02'),
(16, 6, 1, 1, 65.00, '2025-12-13 13:29:02', '2025-12-13 13:29:02'),
(17, 6, 7, 1, 80.00, '2025-12-13 13:29:02', '2025-12-13 13:29:02'),
(18, 7, 10, 1, 120.00, '2025-12-13 14:50:10', '2025-12-13 14:50:10'),
(19, 7, 11, 1, 120.00, '2025-12-13 14:50:10', '2025-12-13 14:50:10'),
(20, 7, 14, 1, 75.00, '2025-12-13 14:50:10', '2025-12-13 14:50:10'),
(21, 8, 5, 1, 80.00, '2025-12-13 14:53:05', '2025-12-13 14:53:05'),
(22, 8, 4, 1, 320.00, '2025-12-13 14:53:05', '2025-12-13 14:53:05'),
(23, 9, 6, 1, 95.00, '2025-12-13 15:52:59', '2025-12-13 15:52:59'),
(24, 9, 13, 1, 75.00, '2025-12-13 15:52:59', '2025-12-13 15:52:59');

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method_id` bigint UNSIGNED NOT NULL,
  `status` enum('completed','pending','failed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `payment_method`
--

CREATE TABLE `payment_method` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Ореховое печенье', 'С грецкими орехами', 65.00, 2, 'images/cookie.webp', NULL, NULL),
(2, 'Семечковый хлеб', 'С подсолнечными семечками', 120.00, 1, 'images/bread.webp', NULL, NULL),
(3, 'Шоколадный торт', 'Нежный бисквит с ганашем', 450.00, 3, 'images/cake_shok.jpg', NULL, NULL),
(4, 'Яблочный пирог', 'С корицей и свежими яблоками', 320.00, 7, 'images/pie1.webp', NULL, NULL),
(5, 'Маковая булочка', 'Слоеная с ароматной начинкой', 80.00, 5, 'images/bun1.webp', NULL, NULL),
(6, 'Круассан с миндалем', 'С сахарной пудрой', 95.00, 2, 'images/croissant1.jpg', NULL, NULL),
(7, 'Бриошь с натуральным шоколадом', 'Бриошь – сдобная французская выпечка на основе дрожжевого теста. Ароматная, сдобная булочка с невероятно вкусной начинкой из натурального шоколада.', 80.00, 2, 'images/briosh.webp', NULL, NULL),
(8, 'Багет Бонтэ', 'Воздушное дрожжевое тесто, ароматный нежный мякиш и невероятно хрустящая корочка', 65.00, 1, 'images/baget.webp', NULL, NULL),
(9, 'Торт \"Венецианская карамель\"\r\n', 'Торт из воздушных профитролей с сливочно-заварным кремом на нежном бисквите, покрытый карамелью – невероятное сочетание, тает во рту', 800.00, 3, 'images/tort_caramel.jpg', NULL, NULL),
(10, 'Пирожное \"Чизкейк\"', 'Необычайно популярный сырно-творожный десерт на основе из песочного теста,  украшенный сахарной пудрой и ягодкой черники', 120.00, 4, 'images/cheesecake.webp', NULL, NULL),
(11, 'Пирожное \"Наполеон\"', 'Вкусное и воздушное пирожное. Слоеные коржи, пропитанные нежным масляно-заварным кремом, который тает во рту. Присыпан слоеной крошкой.', 120.00, 4, 'images/napoleon.jpg', NULL, NULL),
(12, 'Слойка конвертик со сливочным кремом', 'Дрожжевое слоеное тесто. Начинка из нежного сливочного крема', 75.00, 5, 'images/sloika_konvert.webp', NULL, NULL),
(13, 'Пирожок с луком и яйцом', 'Сдобное дрожжевое тесто. Воздушные, мягкие, невероятно вкусные пирожки с начинкой из яиц, зеленого лука и с добавлением сливочного масла', 75.00, 6, 'images/pirojok_s_lukom.jpg', NULL, NULL),
(14, 'Пирожок с черникой', 'Сдобное дрожжевое тесто. Воздушные, сладкие, мягкие, невероятно вкусные пирожки с начинкой из натуральной черники', 75.00, 6, 'images/pirojok_s_chernikoi.webp', NULL, NULL),
(15, 'Капучино', 'Кофе', 130.00, 8, 'images/coffee.webp', NULL, NULL),
(16, 'Американо', 'Кофе', 130.00, 8, 'images/coffee.webp', NULL, NULL),
(17, 'Латте', 'Кофе', 130.00, 8, 'images/coffee.webp', NULL, NULL),
(18, 'Пирог с курицей и грибами', 'Воздушное сдобное невероятно вкусное дрожжевое тесто. Начинка из нежного куриного филе и шампиньонов', 150.00, 7, 'images/pirog_s_kuricei.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MGlJZAIMnMtQNFWnVQJlhpGNBlkW51GIe6swnCxS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnhNUmNWN1JYUlU1ZG4wRFJPbVRvVDVaSEV5UG5sa25WQzR1T3V4byI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1765652450);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('customer','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `profile_picture`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(2, 'Nick', 'nick@mail.ru', '89206654433', '$2y$12$3bgwBmNy3FXBq1M7E04Qcu9RU2XN6oDr.DyLAe9iJQ.uQzP8wHt8C', '1764700542_2.webp', 'customer', '2025-11-27 16:42:11', '2025-12-02 15:35:42', 'CjJF83bbHQTZvdpoo9zzGXoByH2YfK4JCQYP53KQfDtAmBNBZHTGgv60Vc4n'),
(3, 'bober', 'bober@mail.ru', '89202774040', '$2y$12$EInrsm2yJaXoy95CDs2HX.dGNUbG9TzXCcW.SNxkPYD88Go6P8LYW', '1764696702_3.jpg', 'customer', '2025-11-30 12:39:42', '2025-12-02 14:32:16', NULL),
(4, 'Maxim', 'max@mail.ru', '89202774020', '$2y$12$tOIg9IxDzIfptscrB3ZSk.6mx38ZO6.Q/Ky3oXr0Bj/S1s6FoZGA6', NULL, 'customer', '2025-12-02 15:33:21', '2025-12-02 15:33:21', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_payment_method_id_foreign` (`payment_method_id`);

--
-- Индексы таблицы `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_order_id_foreign` (`order_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
