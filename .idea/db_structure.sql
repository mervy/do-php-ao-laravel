-- Database name: do-php-ao-laravel
--
-- Estrutura para tabela `authors`
--

CREATE TABLE `authors` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE,
  `username` varchar(16) NOT NULL UNIQUE,
  `password` varchar(60) NOT NULL,
  `password_hash` varchar(128) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(32) NOT NULL UNIQUE,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Estrutura para tabela `news`
--

CREATE TABLE `news` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `guid` varchar(36) NOT NULL UNIQUE,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('0','1') DEFAULT '0',
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  CONSTRAINT `fk_news_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_news_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Estrutura para tabela `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE,
  `ip_address` varchar(45) NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Estrutura para tabela `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `news_id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  CONSTRAINT `fk_visitors_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

COMMIT;