/*
SQLyog Ultimate v11.52 (32 bit)
MySQL - 5.7.13 : Database - gallery
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gallery` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gallery`;

/*Table structure for table `admin_category` */

DROP TABLE IF EXISTS `admin_category`;

CREATE TABLE `admin_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `admin_category` */

insert  into `admin_category`(`id`,`name`,`sort_order`,`status`,`url`) values (21,'Главная',1,1,'/admin'),(22,'Галерея',2,1,'/admin/gallery'),(23,'Управления категориями',3,1,'/admin/category'),(24,'Загрузка изображений',4,1,'/admin/upload'),(25,'Logout',5,1,'/user/logout');

/*Table structure for table `attempts` */

DROP TABLE IF EXISTS `attempts`;

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `attempts` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `sort_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`parent_id`,`sort_order`,`status`,`url`) values (1,'Главная',0,1,1,''),(3,'Услуги',0,3,1,'#'),(4,'Портфолио',0,4,1,'portfolio'),(8,'Контакты',0,8,1,'contact'),(9,'Все',4,8,0,'all'),(10,'Свадьба',4,10,1,'wedding'),(11,'Студия',4,11,1,'studio'),(12,'Прогулка',4,12,1,'stroll'),(13,'Видео',4,13,1,'video'),(20,'Весна',4,14,1,NULL),(21,'Авиация',4,15,1,NULL),(22,'test1',4,1,0,NULL);

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  UNIQUE KEY `setting` (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `config` */

insert  into `config`(`setting`,`value`) values ('attack_mitigation_time','+30 minutes'),('attempts_before_ban','30'),('attempts_before_verify','5'),('bcrypt_cost','10'),('cookie_domain',NULL),('cookie_forget','+30 minutes'),('cookie_http','0'),('cookie_name','authID'),('cookie_path','/'),('cookie_remember','+30 day'),('cookie_secure','0'),('emailmessage_suppress_activation','0'),('emailmessage_suppress_reset','0'),('password_min_score','0'),('site_activation_page','user/activate'),('site_email','no-reply@phpauth.cuonic.com'),('site_key','fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),('site_name','Photogallery'),('site_password_reset_page','user/reset'),('site_timezone','Europe/Kiev'),('site_url','http://photogallery'),('smtp','0'),('smtp_auth','1'),('smtp_host','smtp.yandex.ua'),('smtp_password','your_password'),('smtp_port','465'),('smtp_security','ssl'),('smtp_username','bugaydima@yandex.ua'),('table_attempts','attempts'),('table_requests','requests'),('table_sessions','sessions'),('table_users','users'),('verify_email_max_length','100'),('verify_email_min_length','5'),('verify_email_use_banlist','1'),('verify_password_min_length','3');

/*Table structure for table `photos` */

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `photos` */

insert  into `photos`(`id`,`name`,`category_id`,`status`) values (1,'11111.jpg',21,1),(2,'2.jpg',12,1),(3,'3.jpg',10,1),(4,'4.jpg',10,1),(5,'5.jpg',11,1),(6,'6.jpg',12,1),(7,'7.jpg',11,1),(8,'8.jpg',11,1),(9,'9.jpg',11,1),(10,'10.jpg',12,1),(11,'11.jpg',12,1),(12,'12.jpg',12,1),(13,'13.jpg',12,1),(14,'14.jpg',12,1),(15,'15.jpg',12,1),(16,'16.jpg',12,1),(17,'17.jpg',12,1),(18,'18.jpg',12,1),(20,'20.jpg',12,1),(21,'21.jpg',12,1),(22,'22.jpg',12,1),(23,'23.jpg',12,1),(24,'24.jpg',12,1),(25,'25.jpg',12,1),(27,'26.jpg',12,1),(32,'desktopwallpapers.org.ua-33186.jpg',20,1),(33,'desktopwallpapers.org.ua-33298.jpg',20,1),(34,'desktopwallpapers.org.ua-33299.jpg',20,1),(35,'desktopwallpapers.org.ua-33300.jpg',20,1),(36,'desktopwallpapers.org.ua-33301.jpg',20,1),(37,'desktopwallpapers.org.ua-39482.jpg',20,1),(38,'desktopwallpapers.org.ua-45140.jpg',21,1),(39,'desktopwallpapers.org.ua-45447.jpg',21,1),(40,'desktopwallpapers.org.ua-45867.jpg',21,1),(41,'desktopwallpapers.org.ua-45986.jpg',21,1),(42,'desktopwallpapers.org.ua-46009.jpg',21,1),(43,'desktopwallpapers.org.ua-46032.jpg',21,1),(44,'desktopwallpapers.org.ua-46055.jpg',21,1),(45,'QQ.jpg',22,1),(46,'desktopwallpapers.org.ua-46314.jpg',21,1),(47,'desktopwallpapers.org.ua-46335.jpg',21,1),(48,'desktopwallpapers.org.ua-46549.jpg',21,1),(49,'desktopwallpapers.org.ua-46754.jpg',21,1);

/*Table structure for table `requests` */

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `requests` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`uid`,`hash`,`expiredate`,`ip`,`agent`,`cookie_crc`) values (2,18,'4a002ffd4b3a35c0e13cf442d12cead1a58cc4b1','2016-08-28 23:33:48','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0','2a4eb5ca0b3487c1b8b4f0029a229b83a1afe1c4'),(4,19,'da74e31ecc991a1d01c7b65c7c585a437296369a','2016-08-30 00:47:15','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0','788ed86f0adce49c4ccfba954ef3fe945211186f');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`username`,`role`,`isactive`,`dt`) values (19,'bugaydima@yandex.ru','$2y$10$hwnuOchixHKY0byED6qIt./FbCRXloMFcnqRYvDLSJCyiHKnhz6bm','Dima','admin',1,'2016-07-30 00:11:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
