-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2021 pada 05.38
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(170) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `title`, `slug`, `cover`, `content`, `is_published`, `created_at`, `updated_at`) VALUES
(3, 12, '10 Tips to become web developer', '10-tips-to-become-web-developer', 'cf39502f4900723938e0.jpg', '<p>A <strong>card</strong> is a flexible and extensible content container. It includes options for headers and footers, a wide variety of content, contextual background colors, and powerful display options. If you&Atilde;&cent;&acirc;&#130;&not;&acirc;&#132;&cent;re familiar with Bootstrap 3, cards replace our old panels, wells, and thumbnails. Similar functionality to those components is available as modifier classes for cards.<h2>Example</h2><p>Cards are built with as little markup and styles as possible, but still manage to deliver a ton of control and customization. Built with flexbox, they offer easy alignment and mix well with other Bootstrap components. They have no margin by default, so use spacing utilities as needed.</p><p>Below is an example of a basic card with mixed content and a fixed width. Cards have no fixed width to start, so they&Atilde;&cent;&acirc;&#130;&not;&acirc;&#132;&cent;ll naturally fill the full width of its parent element. This is easily customized with our various sizing options.</p><p>&nbsp;</p></p>\n', 1, '2021-01-23 04:21:32', '2021-01-26 11:46:52'),
(4, 12, 'Fundamentals of javascript', 'fundamentals-of-javascript', '76283fbc3483a40f4c66.jpg', '<p>JavaScript is a programming language that adds interactivity to your website. This happens in games, in the behavior of responses when buttons are pressed or with data entry on forms; with dynamic styling; with animation, etc. This article helps you get started with JavaScript and furthers your understanding of what is possible.<h2>What is JavaScript?</h2><p>JavaScript (\"JS\" for short) is a full-fledged dynamic programming language that can add interactivity to a website. It was invented by Brendan Eich (co-founder of the Mozilla project, the Mozilla Foundation, and the Mozilla Corporation).</p><p>JavaScript is versatile and beginner-friendly. With more experience, you\'ll be able to create games, animated 2D and 3D graphics, comprehensive database-driven apps, and much more!</p><p>JavaScript itself is relatively compact, yet very flexible. Developers have written a variety of tools on top of the core JavaScript language, unlocking a vast amount of functionality with minimum effort. These include:</p><ul><li>Browser Application Programming Interfaces (<a href=\"https://developer.mozilla.org/en-US/docs/Glossary/API\">APIs</a>) built into web browsers, providing functionality such as dynamically creating HTML and setting CSS styles; collecting and manipulating a video stream from a user\'s webcam, or generating 3D graphics and audio samples.</li><li>Third-party APIs that allow developers to incorporate functionality in sites from other content providers, such as Twitter or Facebook.</li><li>Third-party frameworks and libraries that you can apply to HTML to accelerate the work of building sites and applications.</li></ul><p>It\'s outside the scope of this article&acirc;&#128;&#148;as a light introduction to JavaScript&acirc;&#128;&#148;to present the details of how the core JavaScript language is different from the tools listed above. You can learn more in MDN\'s JavaScript learning area, as well as in other parts of MDN.</p><p>The section below introduces some aspects of the core language and offers an opportunity to play with a few browser API features too. Have fun!</p></p>\n', 1, '2021-01-25 20:22:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan', '2021-01-20 17:00:00', '2021-01-20 17:00:00'),
(2, 'Sepak Bola', '2021-01-20 17:00:00', '2021-01-25 06:58:15'),
(3, 'Pendidikan', NULL, NULL),
(8, 'Politik Shit', '2021-01-23 07:50:12', '2021-01-25 06:58:31'),
(11, 'Hello world', '2021-01-23 08:03:28', NULL),
(12, 'Sain & Teknologi', '2021-01-25 20:15:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Ach Jailani', 'achjailani', '$2y$10$lAIedfbkEAc.bnUb4XhRteImCZ7qSdEeOgX718q/uQLECH896eGOy', 'admin'),
(4, 'Wildan Alfarizi', 'wildan', '$2y$10$Mxb1/yHjvYeUDNEBrxexluMMHun9YYeCZv1geeHde5pgC8kY8qyWe', 'admin'),
(5, 'Kim Hyun Jay', 'lee', '$2y$10$dT2nVhgNa4NCdh4.uco7CeuysfeqNXHIKmkhmFW.GyHBhFgpgOxQK', 'admin'),
(8, 'Abd malik', 'malik', '$2y$10$OB8qE9cPZvpb2pemV0wAiONf3j2skddsx3gExqttsjs8th4CGmIce', 'owner'),
(9, 'Hamidi', 'hamidi', '$2y$10$BlfzoY0ngeZaRcJyULypEO/u0iROODlvCYTOD6TtOQHlaRn46T2e.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
