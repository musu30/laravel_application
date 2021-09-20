/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.20-MariaDB : Database - news_reader
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`news_reader` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `news_reader`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(39,'2020_11_07_113834_create_delivery_zone_cities_table',1),
(42,'2014_10_12_000000_create_users_table',2),
(43,'2014_10_12_100000_create_password_resets_table',2),
(44,'2019_08_19_000000_create_failed_jobs_table',2),
(45,'2020_11_06_052444_create_meals_types_table',2),
(46,'2020_11_06_061343_create_sessions_table',2),
(47,'2020_11_06_083658_create_packages_table',2),
(48,'2020_11_06_083926_create_package_meals_table',2),
(49,'2020_11_07_090811_create_staff_table',2),
(50,'2020_11_07_101503_create_cities_table',2),
(51,'2020_11_07_102435_add_new_fields_to_users_table',2),
(52,'2020_11_07_113242_create_delivery_zones_table',2),
(53,'2020_11_09_052937_create_extra_meals_table',2),
(54,'2020_11_11_090519_create_pacakage_categories_table',2),
(55,'2020_11_23_060350_create_towns_table',2),
(56,'2020_11_26_063526_create_delivery_zone_towns_table',3),
(57,'2021_01_26_090101_add_category_theme_to_category_table',3),
(58,'2021_01_27_061256_create_packagedays_table',4),
(59,'2021_01_27_065752_create_packageprice_table',4),
(60,'2021_01_27_091938_create_packagefeatures_table',5),
(61,'2021_01_27_111559_create_packageinstruction_table',6),
(62,'2021_01_28_024141_create_exceptions_table',7),
(63,'2021_01_28_040227_create_product_category_table',7),
(66,'2021_01_28_040232_create_products_table',8),
(67,'2021_01_28_040243_create_product_image_table',8),
(68,'2021_05_22_022550_create_order_table',9),
(69,'2021_05_22_022601_create_order_item_table',9),
(70,'2021_05_22_023505_create_order_schedule_table',9);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`last_name`,`email_verified_at`,`password`,`remember_token`,`user_type`,`image_path`,`created_at`,`updated_at`,`status`,`dob`,`gender`) values 
(66,'test','sanoop@gmail.com','tes2',NULL,'$2y$10$AuVfXl3yKvnjpZ9bGKjsgOk4.PUyRFpCInJeeNqODzUYnBwf0u3X.',NULL,NULL,NULL,'2021-09-20 02:47:17','2021-09-20 02:47:17',0,'2021-09-20','female');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
