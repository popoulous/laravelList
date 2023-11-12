-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2023. Nov 12. 18:24
-- Kiszolgáló verziója: 10.3.39-MariaDB-0+deb10u1
-- PHP verzió: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `laravellist`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_11_12_085711_todos', 1),
(3, '2023_11_12_124630_users', 2),
(4, '2023_11_12_124706_todo2users', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `todo2users`
--

CREATE TABLE `todo2users` (
  `userid` int(11) NOT NULL,
  `todoid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `todo2users`
--

INSERT INTO `todo2users` (`userid`, `todoid`) VALUES
(24, 49),
(25, 49),
(27, 46),
(13, 50),
(12, 50),
(11, 50),
(5, 50),
(25, 51),
(5, 51),
(28, 52),
(13, 52),
(12, 52);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `todos`
--

CREATE TABLE `todos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `todos`
--

INSERT INTO `todos` (`id`, `name`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'fgdfg', 'Folyamatban', 'fdhgdfhfdh', '2023-11-12 08:39:18', '2023-11-12 08:39:18'),
(6, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(3, 'fgdhdfgh', 'Kész', 'dhdhdfh', '2023-11-12 08:50:10', '2023-11-12 08:50:10'),
(5, 'tfdgfdg', 'Folyamatban', 'hdfhdfh', '2023-11-12 11:00:18', '2023-11-12 11:00:18'),
(7, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(8, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(9, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(10, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(11, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(12, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(13, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(14, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(15, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:49', '2023-11-12 11:02:49'),
(16, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(17, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(18, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(19, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(20, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(21, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(22, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(23, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(24, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(25, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(26, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(27, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(28, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(29, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(30, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(31, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(32, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(33, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(34, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(35, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(36, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(37, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(38, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(39, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(40, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(41, 'vnbcvbvn', 'Folyamatban', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:18:58'),
(42, 'vnbcvbvn', 'Kész', 'bvmvbmbgfhfg', '2023-11-12 11:02:50', '2023-11-12 11:24:43'),
(43, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(44, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(45, 'vnbcvbvn', 'Fejlesztésre vár', 'bvmvbmb', '2023-11-12 11:02:50', '2023-11-12 11:02:50'),
(46, 'vnbcvbvn', 'Kész', 'bvmvbmbghhj', '2023-11-12 11:02:50', '2023-11-12 16:08:33'),
(47, 'fsgdfgsf', 'Folyamatban', 'fdjhgdhdfhfd', '2023-11-12 13:25:28', '2023-11-12 13:25:28'),
(48, 'jhgjgfhfdgsf', 'Kész', 'ghfkjgkdggfs', '2023-11-12 13:30:32', '2023-11-12 15:37:58'),
(49, 'jhgjgfhfdgsf', 'Fejlesztésre vár', 'ghfkjgkdggfs', '2023-11-12 13:31:14', '2023-11-12 13:31:14'),
(50, 'fsdgffsgd', 'Fejlesztésre vár', 'fdhfshfdhfdgdfg', '2023-11-12 14:27:04', '2023-11-12 15:31:14'),
(51, 'hdhhffh', 'Folyamatban', 'módosítvaghjghj', '2023-11-12 15:06:44', '2023-11-12 15:30:10'),
(52, 'fgdgfg', 'Folyamatban', 'hdfhdfh', '2023-11-12 15:59:27', '2023-11-12 15:59:27');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(8, 'fdfg', 'gfsgfs@gfgf.hu', '2023-11-12 12:55:43', '2023-11-12 12:55:43'),
(7, 'fgsgfsg', 'gfsgdfg@fgfdsg.hu', '2023-11-12 12:55:09', '2023-11-12 12:55:09'),
(6, 'fgsgfsg', 'gfsgdfg@fgfdsg.hu', '2023-11-12 12:54:57', '2023-11-12 12:54:57'),
(5, 'gfdgdgffgfg', 'fhdfhf@fgggdfg.hu', '2023-11-12 12:42:09', '2023-11-12 12:42:09'),
(9, 'fdfg', 'gfsgfs@gfgf.hu', '2023-11-12 12:55:57', '2023-11-12 12:55:57'),
(10, 'gdhhgfdhgf', 'gfsgfs@gfdg.hu', '2023-11-12 12:58:17', '2023-11-12 12:58:17'),
(11, 'gsfgsfdgsf', 'gsfgf@gfsdgfdg.hu', '2023-11-12 13:02:46', '2023-11-12 13:02:46'),
(12, 'gsfgsfdgsf', 'gsfgf@gfsdgfdg.hu', '2023-11-12 13:02:59', '2023-11-12 13:02:59'),
(13, 'sfgsfdgsd', 'gsgds@sdfgsdf.hu', '2023-11-12 13:04:36', '2023-11-12 13:04:36'),
(14, 'cgxsfgfsdg', 'sfd@gfsdgdf.gh', '2023-11-12 13:15:12', '2023-11-12 13:15:12'),
(15, 'cgxsfgfsdg', 'sfd@gfsdgdf.gh', '2023-11-12 13:15:27', '2023-11-12 13:15:27'),
(16, 'sdfsdf', 'gfsdg@fgdfg.fdg', '2023-11-12 13:16:07', '2023-11-12 13:16:07'),
(17, 'sdfsdfgg', 'gfsggdg@fgdfg.fdg', '2023-11-12 13:16:43', '2023-11-12 13:16:43'),
(18, 'sdgdsgsdfg', 'fsdfdsf@gfsgfs.hu', '2023-11-12 13:17:39', '2023-11-12 13:17:39'),
(19, 'dgfdgdfg', 'dfsfds@fsgfsg.hu', '2023-11-12 13:21:12', '2023-11-12 13:21:12'),
(20, 'thfdggdhfdgh', 'gfdgdfg@dgffg.hu', '2023-11-12 13:22:21', '2023-11-12 13:22:21'),
(21, 'sgshjdfhdf', 'gfdgdfg@dgfhfdg.hu', '2023-11-12 13:22:31', '2023-11-12 13:22:31'),
(22, 'fgdfgdfghdsgf', 'gfdfghfdh@fdgfgfg.hu', '2023-11-12 13:23:14', '2023-11-12 13:23:14'),
(23, 'fhgjgfhdf', 'fdhadgfdhy@fdghdfgh.hu', '2023-11-12 13:23:22', '2023-11-12 13:23:22'),
(24, 'gdfgdfggfd', 'gfdgdg@fsdgfdg.hu', '2023-11-12 13:30:17', '2023-11-12 13:30:17'),
(25, 'fgdhdfgh', 'dfghgdfg@jrzjzr.hu', '2023-11-12 13:30:26', '2023-11-12 13:30:26'),
(26, 'dfhdhjfh', 'teszt@teszt.hu', '2023-11-12 15:06:40', '2023-11-12 15:06:40'),
(27, 'Galambos Tamás', 'galambostamas93@gmail.com', '2023-11-12 15:38:47', '2023-11-12 15:38:47'),
(28, 'fsghdfg', 'gfdgfd@fsdgfd.hu', '2023-11-12 15:59:41', '2023-11-12 15:59:41');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `todo2users`
--
ALTER TABLE `todo2users`
  ADD KEY `UserID` (`userid`),
  ADD KEY `TodoID` (`todoid`);

--
-- A tábla indexei `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
