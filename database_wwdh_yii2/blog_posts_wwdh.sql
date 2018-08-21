-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Aug 21. 10:37
-- Kiszolgáló verziója: 10.1.28-MariaDB
-- PHP verzió: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `blog_posts_wwdh`
--
CREATE DATABASE IF NOT EXISTS `blog_posts_wwdh` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog_posts_wwdh`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1534672410),
('m130524_201442_init', 1534672413);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `introduction` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attendence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `post`
--

INSERT INTO `post` (`post_id`, `title`, `introduction`, `description`, `user_id`, `date`, `attendence`) VALUES
(1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar, justo in sagittis accumsan, risus ante blandit nisi, at eleifend ipsum sapien ac sapien. Vivamus sagittis justo nibh, in rhoncus mi congue sit amet. Integer neque massa, scelerisque et sem vitae, consequat commodo ligula. Sed malesuada dapibus neque, a facilisis leo feugiat facilisis. Aliquam at nibh odio. Aliquam fringilla mattis mauris. Phasellus iaculis nibh massa, facilisis convallis lorem fermentum a. Pellentesque tincidunt, massa sed vulputate imperdiet, nisl ipsum bibendum nisl, rutrum consequat ligula justo at mi', 1, '2018-08-19 21:02:00', 0),
(4, 'Lorem Ipsum2', 'Sed porta aliquet magna. Quisque nec diam vel augue placerat ornare', 'Sed porta aliquet magna. Quisque nec diam vel augue placerat ornare. Mauris malesuada mi ac est placerat tempor. Fusce non lectus vel ante rhoncus finibus et ut lectus. Sed sed ligula dictum, aliquet diam et, efficitur nisl. Curabitur neque mi, euismod sodales ligula id, laoreet consequat sem. Vestibulum a elementum nunc. Aliquam porta lorem porttitor tincidunt facilisis. Mauris quis ex augue. Duis interdum diam tortor, vel tempor nunc vulputate sit amet. Phasellus id ex sem. ', 1, '2018-08-19 21:18:16', 0),
(5, 'Lorem Ipsum3', 'Phasellus et purus leo.', 'Phasellus et purus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sapien orci, aliquet vel massa non, interdum condimentum felis. Etiam iaculis egestas gravida. Quisque sed lacus ex. Praesent sit amet ornare risus. Vivamus vitae ligula ac ante tristique dictum. ', 2, '2018-08-19 21:20:08', 1),
(6, 'Lorem Ipsum4', 'Integer semper turpis id lacus tristique, nec pellentesque augue efficitur.', 'Integer semper turpis id lacus tristique, nec pellentesque augue efficitur. Suspendisse sed suscipit nisi. Maecenas mattis, ante at posuere ultrices, neque erat venenatis nulla, quis malesuada odio nibh et ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas elementum tellus non felis consequat tincidunt. Quisque dignissim orci at lorem bibendum, eu fermentum mauris ornare. Suspendisse dictum consectetur dolor ut sollicitudin. Cras velit massa, viverra eget iaculis nec, faucibus eu odio. In vitae turpis quis nisl dapibus dapibus in at nunc.', 3, '2018-08-20 10:06:00', 0),
(7, 'Lorem Ipsum5', 'Vivamus non felis ac nunc imperdiet luctus.', 'Vivamus non felis ac nunc imperdiet luctus. Suspendisse eu fringilla enim, in efficitur lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt odio ut lacus laoreet tincidunt. Pellentesque convallis magna sed mi convallis luctus. In et mauris a sapien ultrices egestas at et turpis. Praesent vestibulum, urna eu vestibulum fermentum, velit nunc cursus ipsum, ut lobortis est leo eget metus. Mauris gravida in ipsum ut rhoncus. Proin ac nunc feugiat nisi facilisis sagittis. Maecenas luctus, dolor vestibulum porttitor pharetra, libero eros ornare odio, eu imperdiet neque dolor quis massa. Suspendisse nec suscipit elit. Morbi nisi nisl, consectetur ultricies nisl ut, accumsan mattis elit. Nam rutrum s', 3, '2018-08-20 10:14:16', 0),
(8, 'Lorem Ipsum6', 'Sed ultricies erat arcu, quis posuere ante elementum sed.', 'Sed dapibus cursus arcu, nec vestibulum eros tincidunt eget. Cras scelerisque nulla eget ligula tristique dapibus. Nullam lacinia elit eu turpis mollis posuere. Vivamus semper dui et odio eleifend mollis. Etiam in mauris blandit, vestibulum ipsum nec, placerat turpis. Vivamus rutrum libero quam, et varius ex elementum vulputate. Nam lorem risus, hendrerit non risus ut, euismod ultricies est. Suspendisse potenti. ', 1, '2018-08-20 10:14:41', 1),
(9, 'Lorem Ipsum67', 'Morbi quis ipsum at magna semper dignissim. ', 'Vestibulum eu sapien accumsan massa blandit suscipit. Ut eros sapien, lacinia sed tincidunt non, posuere et ligula. Maecenas sagittis aliquet diam id euismod. Morbi quis ipsum at magna semper dignissim. Nunc hendrerit felis vitae dolor aliquet, vitae mattis ipsum dapibus. In hac habitasse platea dictumst. ', 2, '2018-08-21 07:37:22', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'szentibernadett', '4N0_euOfcgbYHHtm49Tzaqoxtd-xeG2U', '$2y$13$i9j5ZJCjgBEDDMdASCgjZ.agSmttQ4zksozhNslfdQb.IaLJjDTnK', NULL, 'szenti.berni@gmail.com', 10, 1534675889, 1534675889),
(2, 'tesztelek', '6tkpfDFvdNWGo0KYhOdCDE4jfHuF6-dv', '$2y$13$WZhR8hhbXPHiHqoOPIZYR.EipIrScuosxmqYYniXFcBwiJQmmBje.', NULL, 'tesztelek@email.cim', 10, 1534676172, 1534676172),
(3, 'johnsmith', 'WE4DOdPwWmATY9rwf9DX0jlKCO1Q-OgC', '$2y$13$m/4XRjv3zQvQ7Z85oplmiO4.RGKnX7HzrpStvG3CI7S0TqQc1lZVa', NULL, 'johnsmith@email.cim', 10, 1534752189, 1534752189),
(4, 'tesztelek2', 'V-KP7leFLlaDrZSXtmjgHFTNlFmLqkcR', '$2y$13$u.7Hz/AFS3U/RQW4jLpJu.65277F9PPdwAXBzPeQ99ERp1RtQvee2', NULL, 'tesztelek2@email.cim', 10, 1534767750, 1534767750),
(5, 'tesztelek3', 'TEOdhAcCl-U0RK4USli1SSyvzrADy8Kd', '$2y$13$xASscBotzRK1w1MecbGW8uY9eeo3MNxt7AQSXog3RErr3.lcPUuEu', NULL, 'tesztelek3@email.cim', 10, 1534767979, 1534767979);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- A tábla indexei `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
