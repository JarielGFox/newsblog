/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `article_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`article_id`,`category_id`),
  KEY `article_category_category_id_foreign` (`category_id`),
  CONSTRAINT `article_category_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `article_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archived` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `article_category` (`article_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL);
INSERT INTO `article_category` (`article_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL);
INSERT INTO `article_category` (`article_id`, `category_id`, `created_at`, `updated_at`) VALUES
(29, 8, NULL, NULL);
INSERT INTO `article_category` (`article_id`, `category_id`, `created_at`, `updated_at`) VALUES
(29, 9, NULL, NULL),
(30, 4, NULL, NULL),
(30, 5, NULL, NULL),
(31, 6, NULL, NULL),
(31, 8, NULL, NULL),
(32, 8, NULL, NULL),
(33, 3, NULL, NULL),
(33, 8, NULL, NULL),
(34, 5, NULL, NULL),
(34, 10, NULL, NULL);

INSERT INTO `articles` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `author`) VALUES
(1, 1, 'Local Dog Becomes Mayor of Small Town', 'In a stunning turn of events, a lovable golden retriever named Max has been elected as the mayor of a small town in rural America. Max\'s platform focused on increasing access to biscuits and providing more belly rubs for all citizens.', 'public/images/dogesuit.jpeg.jpg', '2023-03-16 19:50:50', '2023-03-16 19:50:50', 'Doge');
INSERT INTO `articles` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `author`) VALUES
(29, 1, 'Scientists Discover That Eating Pizza Every Day Can Actually Be Good for You!', 'In a groundbreaking study, scientists have found that eating pizza every day can lead to increased happiness and overall wellbeing. The study\'s lead researcher, Dr. Pepperoni, noted that the study only applies to delicious, cheesy pizza and not to any other types of food.', 'public/images/pizzacartoon.jpg.jpg', '2023-03-16 19:50:50', '2023-03-16 19:50:50', 'Spiffo');
INSERT INTO `articles` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `author`) VALUES
(30, 1, 'Local Woman Wins Nobel Prize for Best Macaroni and Cheese Recipe!', 'A woman from a small town in the Midwest has won the Nobel Prize for her incredible macaroni and cheese recipe. The recipe, which includes a secret blend of cheeses and a dash of magic, has been a hit with both family and friends for years.', 'public/images/macandcheese.png.png', '2023-03-16 19:54:17', '2023-03-16 19:54:17', 'Wild Cat');
INSERT INTO `articles` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `author`) VALUES
(31, 1, 'World\'s First Robot-Created Art Exhibit Opens to Critical Acclaim!', 'In a stunning display of creativity, a group of robots have collaborated to create the world\'s first robot-generated art exhibit. The exhibit, which includes everything from abstract paintings to intricate sculptures, has been hailed as a masterpiece by art critics and enthusiasts alike.', 'public/images/robots-1.jpg.jpg', '2023-03-16 19:56:41', '2023-03-16 19:56:41', 'Mr Robot'),
(32, 1, 'Drinking 10 Cups of Coffee Does Not Actually Increase Productivity', 'In a shocking revelation, a local man has found that drinking 10 cups of coffee a day does not actually make you more productive. In fact, the man reported feeling more jittery and less focused than ever before.', 'public/images/espressodepresso.jpeg.jpg', '2023-03-16 19:59:43', '2023-03-16 19:59:43', 'Your Neighbour'),
(33, 1, 'Scientists Find That Talking to Plants Help Them Grow Faster!', 'In a study that has rocked the scientific community, researchers have found that talking to plants can actually help them grow faster and stronger. The study\'s lead author, Dr. Green Thumb, noted that plants respond best to positive affirmations and kind words.', 'public/images/cabbage-pult.png.adapt.crop16x9.png.png', '2023-03-18 12:09:53', '2023-03-18 12:22:04', 'Dr Green Thumb'),
(34, 1, 'Local Cat Becomes CEO of Major Corporation', 'In a surprising move, a fluffy calico cat has been appointed as the CEO of a major corporation. The cat\'s platform is focused on taking more naps, grooming, and providing free catnip to all employees.', 'public/images/businesscat.jpg.jpg', '2023-03-25 11:19:35', '2023-03-25 11:19:35', 'Mr Catto');

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Crime News', '2023-03-16 14:20:30', '2023-03-16 14:20:30');
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Politics', '2023-03-16 14:20:35', '2023-03-16 14:20:35');
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Environment', '2023-03-16 14:20:40', '2023-03-16 14:20:40');
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'World', '2023-03-16 14:20:48', '2023-03-16 14:20:48'),
(5, 'Culture', '2023-03-16 14:21:00', '2023-03-16 14:21:00'),
(6, 'Tech', '2023-03-16 14:21:05', '2023-03-16 14:21:05'),
(7, 'Sport', '2023-03-16 14:21:11', '2023-03-16 14:21:11'),
(8, 'Science', '2023-03-16 14:21:56', '2023-03-16 14:21:56'),
(9, 'Health', '2023-03-16 14:21:58', '2023-03-16 14:21:58'),
(10, 'Business and Finance', '2023-03-16 14:21:58', '2023-03-16 14:21:58'),
(11, 'Economy', '2023-03-16 14:21:58', '2023-03-16 14:21:58'),
(12, 'TV and Cinema', '2023-03-16 14:21:58', '2023-03-16 14:21:58');



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2023_03_01_175142_create_articles_table', 1),
(19, '2023_03_04_091736_add_image_column_to_articles_table', 1),
(20, '2023_03_06_175325_create_categories_table', 1),
(21, '2023_03_08_190356_edit_articles_table', 1),
(22, '2023_03_08_193531_add_user_column_to_articles_table', 1),
(23, '2023_03_11_084718_create_article_category_table', 1),
(24, '2023_03_18_122923_ticket', 2),
(25, '2023_03_19_192918_add_image_column_to_tickets_table', 3),
(26, '2023_03_21_191057_add_user_column_to_tickets_table', 4),
(27, '2023_03_21_200822_create_options_table', 5);

INSERT INTO `options` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Errore generico', '2023-03-18 12:09:53', '2023-03-18 12:09:53');
INSERT INTO `options` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Malfunzionamento', '2023-03-18 12:09:53', '2023-03-18 12:09:53');
INSERT INTO `options` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Visualizzazione', '2023-03-18 12:09:53', '2023-03-18 12:09:53');
INSERT INTO `options` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Registrazione', '2023-03-18 12:09:53', '2023-03-18 12:09:53');





INSERT INTO `tickets` (`id`, `user_id`, `title`, `category`, `status`, `message`, `image`, `archived`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Articolo non salvato', 'Errore tecnico', 'open', 'Non riesco a salvare gli articoli', NULL, 0, '2023-03-18 13:10:23', '2023-03-18 13:10:23');
INSERT INTO `tickets` (`id`, `user_id`, `title`, `category`, `status`, `message`, `image`, `archived`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Accesso fallito a gestione', 'Errore tecnico', 'open', 'Accesso non possibile a gestione utenti', NULL, 0, '2023-03-18 13:10:23', '2023-03-18 13:10:23');
INSERT INTO `tickets` (`id`, `user_id`, `title`, `category`, `status`, `message`, `image`, `archived`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Articolo non cancellato', 'Malfunzionamento', 'closed', 'Non riesco a cancellare gli articoli', NULL, 0, '2023-03-18 13:10:23', '2023-03-18 13:10:23');
INSERT INTO `tickets` (`id`, `user_id`, `title`, `category`, `status`, `message`, `image`, `archived`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Articolo non modificato', 'Malfunzionamento', 'closed', 'Non riesco ad editare gli articoli', NULL, 0, '2023-03-18 13:10:23', '2023-03-18 13:10:23'),
(21, 1, 'STOCAZZO', 'Errore generico', 'open', 'Sai chi ti saluta?', 'public/img/71OvVAX8x3L._SS500_.jpg.jpg', 0, '2023-03-21 19:51:31', '2023-03-21 19:51:31');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Spiffo', 'spiffo@spiffo.com', NULL, '$2y$10$c.6ETJ/1XKZEuV02TfahXeEmw.jpKzZPfN6LxE3MUTATkQRkPl5Pe', NULL, NULL, NULL, NULL, '2023-03-16 14:19:54', '2023-03-16 14:19:54');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;