/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - form_user
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`form_user` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `form_user`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`fullname`) values 
(1,'admin','12345','Ezra Louis L. Bazar');

/*Table structure for table `contact_form` */

DROP TABLE IF EXISTS `contact_form`;

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `contact_form` */

insert  into `contact_form`(`id`,`first_name`,`last_name`,`email`,`message`,`date`) values 
(8,'Ezra','Bazar','theezrabazar@gmail.com','If you are reading this, this means that form validation, recaptcha, sql injection prevention and script injection prevention works perfectly.','2024-05-29 14:27:09');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `project` */

insert  into `project`(`id`,`title`,`description`) values 
(1,'High Altitude','You left a part of me in that mountain, in those lake, in those ruins');

/*Table structure for table `user_photo` */

DROP TABLE IF EXISTS `user_photo`;

CREATE TABLE `user_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_photo` */

insert  into `user_photo`(`id`,`image`,`title`,`description`,`date`) values 
(3,'pic1.jpg','Through The Mountains And Us','As the plains howled, it blew a frigid breeze fading footsteps and a burning gaze. The poet\'s river sang a soft melody for us, Temporarily mending the hidden wound. The space between us is gently dying. If only I could arise from the empty bed and fill the gap on your shoulder as I reach for that last scent of yours.','2024-05-21 20:24:26'),
(4,'pic2.jpg','The War Boy','In discreet glances or in the day when one of us must go, untie your strings to me but remember me in the day of my first hello.\r\nSilence hides the violence in the edges of my heart, as my skin calls for another night of cardinal pleasure, a clandestine art. Bodies and bullets, the silent stare and nostalgic love affair may my name engrave into the heart where I once lived','2024-05-21 20:27:33'),
(5,'pic3.jpg','Sanctuary','A hunt for a cure, an antidote; hide our promises written on our notes. A scout for a sanctuary, a blaze when the night is starry.\r\nThey told us it was wrong; then for you, I would sing my sacred song\r\nClose your eyes, my love; the light will lead us home. The pain and pleasure, the lands we used to roam. My beloved, it is a scout for a sanctuary. But, my beloved, it is our love\r\nwhere no man can bury.','2024-05-21 20:27:46'),
(6,'pic4.jpg','The Secret Language Of The Flowers','His lips reminds me of my mom’s garnet, so precious and polite\r\nfrom them, I learned to speak the secret language of the flowers. Remind me, this man was a stranger, yet I wish to be lost in his sleeve. He wakes up from his majesty, making pearls that I’d dive for.','2024-05-21 20:29:07'),
(7,'pic5.jpg','Gone Too Far','I’ve traveled across the world, weaving stories in the streets— a bittersweet beginning. Years pass like a rolling dice, attempting to leave a legacy. So, if I’ve ever gone too far, will there still be a place for me to go back home? Now that I’m gone too far, will you still love me when I’m no longer the same?','2024-05-21 20:29:30'),
(9,'pic6.jpg','Morning Glory','The war\'s haze has coated the sun, numbing the morning glory\'s luster. What\'s left is the sanctum where we used to meet, and the remembering of our illicit desires. And now the memory haunts wherever I go, rain-soaked, as I hope it washes everything away. Amber and red, the marks you left on me to remember, we left ourselves consumed by it.','2024-05-21 20:30:31'),
(10,'pic7.jpg','Sunlit Sonata','We danced in the shallow waters, with flushed cheeks, leaving everything behind. A wild comfort, as we marked the soft sand with our barefoot imprints.\r\nFreedom is a seagull, moments are sublime, a landscape of our dreams under the August sun. Singing the sunlit sonata, with bees nibbling on nectars.','2024-05-21 20:31:15'),
(11,'pic8.jpg','The Summer When I Was 16','Meet me at the time when you ignited a blaze in me, left me consumed by it, then came back to the scent of my ashes. Fall back into shreds of the dog days, where your lips were as sweet as your mom\'s blueberry pies, where nightshade embedded its seeds underground, and where we got drenched in the cascade\'s clarity.','2024-05-21 20:31:29'),
(13,'pic9.jpg','A Fatal Nightshade, A Kryptonite','In my dreams, there\'s us, drawn by the crimson and gold. When I tried to grip your hand, beakers of flame poured into me. When I woke up, the sky was no longer azure blue, and the pallid moon vanished into opaque darkness.','2024-05-22 00:32:13'),
(14,'pic10.jpg','31 Days Of August','Time flies, and sometimes it freezes\r\nyou cut your hands as you picked some roses open the window, portraits of all the things I can see sweet scent from summer, over the porch sipping a cup of tea.\r\n\r\nFootsteps on the white sand that lead you to me, grasp the light of the sun or embrace the midnight\'s degree.','2024-05-23 00:42:38'),
(15,'pic11.jpg','Ivory','Sapphire seas, mauve sunsets, the bounty of the shore and tides. In his dreams, he believed he wandered to Mykonos.\r\n\r\nIvory reminds me of a close friend; we used to lean into the trunk of an evergreen. Parents asleep, as we count the roving fireflies.\r\n\r\nHe thinks about Clementine so often, where he feels the cosmos could explode. We used to play hide and seek on a stormy night; lightning struck as he hides inside a closet.','2024-05-23 00:42:49'),
(16,'pic12.jpg','Crowns Beneath The Waves','Like the sailor sails into the deep blue sea,\r\nI\'ll patch our crippled boat just to set you free.\r\nLike the old men\'s tulips bloom in the daylight, I will keep your blossom till the death of midnight.','2024-05-23 00:42:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
