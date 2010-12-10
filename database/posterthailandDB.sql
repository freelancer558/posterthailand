/*
SQLyog Ultimate v8.6 Beta2
MySQL - 5.1.49-community : Database - pt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pt` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `pt`;

/*Table structure for table `adsvertisment` */

DROP TABLE IF EXISTS `adsvertisment`;

CREATE TABLE `adsvertisment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(16) NOT NULL COMMENT 'รหัสสินค้า',
  `ads_id` int(11) NOT NULL COMMENT 'รหัสโฆษณา',
  `ads_size` varchar(16) DEFAULT NULL COMMENT 'ขนาดของโฆษณา',
  `ads_place` varchar(32) DEFAULT NULL COMMENT 'ตำแน่งโฆษณา  header,top_page,bigads,specail,suggest,right_w600,right_w125',
  `ads_start` varchar(16) NOT NULL COMMENT 'วันที่เริ่มลงโฆษณา',
  `ads_end` varchar(16) NOT NULL COMMENT 'วันที่สิ้นสุดการลงโฆษณา',
  `ads_status` varchar(20) NOT NULL DEFAULT '1' COMMENT 'สถานะของโฆษณา',
  `ads_img` varchar(255) NOT NULL COMMENT 'รูปภาพของโฆษณา',
  PRIMARY KEY (`id`),
  KEY `FK_pid` (`pid`),
  CONSTRAINT `FK_pid` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `adsvertisment` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_img` varchar(255) DEFAULT NULL,
  `cat_active` tinyint(1) DEFAULT '1' COMMENT '0 = ไม่เปิดใช้งาน , 1 = เปิดใช้งาน',
  `cat_sort` int(2) DEFAULT NULL COMMENT 'เรียงลำดัยหมวดหมู่',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`cat_name`,`cat_img`,`cat_active`,`cat_sort`) values (1,'เครื่องสำอางค์ เสริมความงาม','23112009235911.jpg',1,1),(2,'รถยนต์ ยานพาหนะ','23112009235928.jpg',1,2),(3,'บ้าน อสังหาริมทรัพย์','24112009000156.jpg',1,3),(4,'เสื้อผ้า เครื่องแต่งกาย','24112009000328.jpg',1,4),(5,'คอมพิวเตอร์ อุปกรณ์ไอที','24112009000351.jpg',1,5),(6,'กล้อง อุปกรณ์ถ่ายภาพ','24112009000512.jpg',1,6),(7,'เครื่องใช้ไฟฟ้า อุปกรณ์','24112009001446.jpg',1,7),(8,'สัตว์เลี้ยง อาหารสัตว์ อุปกรณ์','24112009001509.jpg',1,8),(9,'อุตสาหกรรม นำเข้า ส่งออก','24112009001857.jpg',1,9),(10,'บันเทิง การรื่นเริง จัดงาน','24112009001932.jpg',1,10),(11,'เครื่องดนตรี อุปกรณ์','24112009002037.jpg',1,11),(12,'หนังสือ ตำรา การศึกษา','24112009002129.jpg',1,12),(13,'ศิลปะ หัตถกรรม ของพื้นบ้าน','24112009002204.jpg',1,13),(14,'ต้นไม้ ดอกไม้ แต่งสวน','24112009002319.jpg',1,14),(15,'ท่องเที่ยว ที่พัก บริษัททัวร์','24112009002409.jpg',1,15),(16,'อาหาร ร้านอาหาร เครื่องดื่ม','24112009002439.jpg',1,16),(17,'อื่นๆ จิปาถะ ไม่รู้หมวด','24112009002531.jpg',1,17),(18,'ธุรกิจ รับจ้าง ขายตรง','24112009002623.jpg',1,18),(19,'สุขภาพ สปา การแพทย์','24112009002716.jpg',1,19),(20,'เฟอร์นิเจอร์ อุปกรณ์ตกแต่ง','24112009002750.jpg',1,20),(21,'มือถือ อุปกรณ์สื่อสาร','24112009003845.jpg',1,21),(22,'จิวเวลลี่ เครื่องประดับ','24112009003905.jpg',1,22),(23,'งาน หางาน สมัครงาน','24112009002652.jpg',1,23),(24,'แฟชั่น นาฬิกา แว่นตา ดัดฟัน','24112009003924.jpg',1,24),(25,'เกมส์ วีดีโอเกมส์ แผ่นเกมส์','24112009004013.jpg',1,25),(26,'ของเล่น ของสะสม งานอดิเรก','24112009004038.jpg',1,26),(27,'หนัง เพลง DVD VCD','24112009004103.jpg',1,27),(28,'แม่และเด็ก เนอสเซอรี่','24112009004125.jpg',1,28),(29,'อุปกรณ์สำนักงาน','24112009004159.jpg',1,29),(30,'ของที่ระลึก ของฝาก กิ๊ฟชอป','24112009004233.jpg',1,30),(31,'กีฬา กิจกรรม งานเลี้ยง','24112009004304.jpg',1,31),(32,'เกษตรกรรม กสิกรรม','24112009004325.jpg',1,32),(33,'ตั๋ว บัตร คูปอง การ์ด','24112009004350.jpg',1,33);

/*Table structure for table `defaultads` */

DROP TABLE IF EXISTS `defaultads`;

CREATE TABLE `defaultads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_position` varchar(100) DEFAULT NULL,
  `ads_from` varchar(100) DEFAULT NULL,
  `ads_code` text,
  `ads_size` varchar(16) DEFAULT NULL,
  `ads_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `defaultads` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `username` varchar(100) NOT NULL COMMENT 'Member user',
  `password` varchar(100) NOT NULL COMMENT 'Member pass',
  `email` varchar(100) NOT NULL COMMENT 'Member email',
  `poster_name` varchar(100) NOT NULL COMMENT 'Poster name',
  `avartar` varchar(255) DEFAULT NULL COMMENT 'Member picture',
  `fname` varchar(100) DEFAULT NULL COMMENT 'First name',
  `lname` varchar(100) DEFAULT NULL COMMENT 'Last name',
  `sex` varchar(1) DEFAULT NULL COMMENT 'm = male, f = femail',
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL COMMENT 'Address',
  `tumbon` varchar(100) DEFAULT NULL COMMENT 'Locality',
  `amphur` varchar(100) DEFAULT NULL COMMENT 'District',
  `province` varchar(100) DEFAULT NULL COMMENT 'Province',
  `postcode` int(5) DEFAULT NULL COMMENT 'Postcode',
  `mobile_no` varchar(10) DEFAULT NULL COMMENT 'Mobile phone number',
  `phone` varchar(15) DEFAULT NULL COMMENT 'Telephone number',
  `fax` varchar(15) DEFAULT NULL COMMENT 'Fax number',
  `userlevel` varchar(16) DEFAULT 'Member' COMMENT 'สถานะของสมาชิก VIP,Member,Gold,Activated',
  `date_signup` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `members` */

insert  into `members`(`username`,`password`,`email`,`poster_name`,`avartar`,`fname`,`lname`,`sex`,`company_name`,`address`,`tumbon`,`amphur`,`province`,`postcode`,`mobile_no`,`phone`,`fax`,`userlevel`,`date_signup`) values ('tester1','81dc9bdb52d04dc20036dbd8313ed055','tester1@hotmail.com','tester1',NULL,'','','m',NULL,'','','','',0,'','',NULL,'Member','2010-12-04 18:44:49');

/*Table structure for table `product_pic` */

DROP TABLE IF EXISTS `product_pic`;

CREATE TABLE `product_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(16) NOT NULL COMMENT 'รหัสสินค้า',
  `pimg1` varchar(255) DEFAULT NULL COMMENT 'รูปที่1',
  `pimg2` varchar(255) DEFAULT NULL COMMENT 'รูปที่2',
  `pimg3` varchar(255) DEFAULT NULL COMMENT 'รูปที่3',
  `pimg4` varchar(255) DEFAULT NULL COMMENT 'รูปที่4',
  `pimg5` varchar(255) DEFAULT NULL COMMENT 'รูปที่5',
  `pimg6` varchar(255) DEFAULT NULL COMMENT 'รูปที่6',
  PRIMARY KEY (`id`),
  KEY `FK_product_pic` (`pid`),
  CONSTRAINT `FK_product_pic` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `product_pic` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `pid` varchar(16) NOT NULL COMMENT 'รหัสสินค้า',
  `poster` varchar(100) DEFAULT NULL COMMENT 'ผู้ลงประกาศ',
  `cat_id` int(11) DEFAULT NULL COMMENT 'หมวดหมู่สินค้า',
  `subcat_id` int(11) DEFAULT NULL COMMENT 'หมวดหมู่ย่อย',
  `p_title` varchar(255) DEFAULT NULL COMMENT 'หัวข้อประกาศ',
  `p_detail` text COMMENT 'รายละเอียด',
  `p_for` varchar(100) DEFAULT NULL COMMENT 'ความต้องการ',
  `p_website` varchar(255) DEFAULT NULL COMMENT 'เว็บไซต์ที่เกี่ยวข้อง',
  `p_sure_price` int(11) DEFAULT NULL COMMENT 'ราคาแน่นอน',
  `p_price` int(11) DEFAULT NULL COMMENT 'ราคาระหว่าง เท่าไหร่ถึงเท่าไหร่',
  `p_status` varchar(100) DEFAULT NULL COMMENT 'สถานะของสินค้า',
  `p_send` varchar(100) DEFAULT NULL COMMENT 'วิธีส่งสินค้า',
  `p_total` int(11) DEFAULT NULL COMMENT 'จำนวนสินค้าที่มี',
  `p_tag` varchar(255) DEFAULT NULL COMMENT 'tag ของสินค้า',
  `p_place` varchar(100) DEFAULT NULL COMMENT 'สถานที่ขายสินค้า',
  `p_latitude` varchar(100) DEFAULT NULL COMMENT 'Latitude แสดงสถานที่ขายสินค้า',
  `p_longtitude` varchar(100) DEFAULT NULL COMMENT 'Longtitude แสดงถานที่ขายสินค้า',
  `p_zoom` int(2) DEFAULT NULL COMMENT 'สถานะ zoom ของแผนที่',
  `p_warranty` varchar(255) DEFAULT NULL COMMENT 'การรับประกัน',
  `p_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'สร้างวันที่',
  `p_end` varchar(255) DEFAULT NULL COMMENT 'สิ้นสุดวันประกาศ',
  `p_update` varchar(16) DEFAULT NULL COMMENT 'แก้ไขสินค้าล่าสุด',
  `p_chage_place` varchar(16) DEFAULT NULL COMMENT 'เลื่อนลำดับประกาศล่าสุด',
  PRIMARY KEY (`pid`),
  KEY `fk_subcat_id` (`subcat_id`),
  KEY `fk_cat_id` (`cat_id`),
  KEY `fk_poster` (`poster`),
  CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_poster` FOREIGN KEY (`poster`) REFERENCES `members` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_subcat_id` FOREIGN KEY (`subcat_id`) REFERENCES `subcat` (`sub_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `products` */

/*Table structure for table `products_img` */

DROP TABLE IF EXISTS `products_img`;

CREATE TABLE `products_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `img1` varchar(50) DEFAULT NULL,
  `img2` varchar(50) DEFAULT NULL,
  `img3` varchar(50) DEFAULT NULL,
  `img4` varchar(50) DEFAULT NULL,
  `img5` varchar(50) DEFAULT NULL,
  `img6` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `products_img` */

/*Table structure for table `session` */

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `ssid` int(11) NOT NULL AUTO_INCREMENT,
  `ss_user` varchar(100) DEFAULT NULL COMMENT 'Username',
  `session` varchar(100) DEFAULT NULL COMMENT 'Session Saved',
  `ss_endtime` varchar(100) DEFAULT NULL COMMENT 'ระยะเวลาที่ของ Session',
  `ssdate` varchar(20) DEFAULT NULL COMMENT 'Session Date Time',
  PRIMARY KEY (`ssid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `session` */

insert  into `session`(`ssid`,`ss_user`,`session`,`ss_endtime`,`ssdate`) values (1,'tester1','e3dad17172c072437cd2104acd824e47','31536000','1291476799'),(2,'tester1','080281dad55517b81e9462bb8496ce18','31536000','1291518790'),(3,'tester1','0acc9f78e77fc7c1a4238663e79b266b','31536000','1291690267'),(4,'tester1','32ad00ea43617fcf20670516b054ed1a','31536000','1291740000'),(5,'tester1','1db38007dda78dea760d9d4a81ca4b28','31536000','1291811246');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `sid` int(11) NOT NULL,
  `activate` tinyint(1) DEFAULT '0' COMMENT 'ระบบจะส่งอีเมลให้ผู้สมัครต้องยืนยันตัวตนก่อน',
  `admin_email` varchar(100) DEFAULT 'admin@posterthailand.com' COMMENT 'อีเมลของผู้ดูแลระบบ',
  `info_email` varchar(100) DEFAULT 'info@posterthailnad.com' COMMENT 'อีเมลของแจ้งข่าวสารของระบบ',
  `f230` text COMMENT 'กล่อง facebook ขนาดยาว 230px',
  `f340` text COMMENT 'กล่อง facebook ขนาดยาว 340px',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `setting` */

insert  into `setting`(`sid`,`activate`,`admin_email`,`info_email`,`f230`,`f340`) values (1,0,'admin@posterthailand.com','info@posterthailnad.com','<iframe src=\"http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPosterthailand-fanpage%2F178290318853273&amp;width=230&amp;colorscheme=light&amp;connections=9&amp;stream=false&amp;header=false&amp;height=255\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:230px; height:255px;\" allowTransparency=\"true\"></iframe>','<iframe src=\"http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FPosterthailand-fanpage%2F178290318853273&amp;width=340&amp;colorscheme=light&amp;connections=15&amp;stream=true&amp;header=false&amp;height=555\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:340px; height:555px;\" allowTransparency=\"true\"></iframe>');

/*Table structure for table `subcat` */

DROP TABLE IF EXISTS `subcat`;

CREATE TABLE `subcat` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `sub_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `fk_category_id` (`cat_id`),
  CONSTRAINT `fk_category_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=293 DEFAULT CHARSET=utf8;

/*Data for the table `subcat` */

insert  into `subcat`(`sub_id`,`cat_id`,`sub_name`) values (1,1,'เครื่องสำอางค์'),(2,1,'น้ำหอม'),(3,1,'ครีม โลชั่น'),(4,1,'เกี่ยวกับผิวหน้า'),(5,1,'เกี่ยวกับผม'),(6,1,'เกี่ยวกับมือและเล็บ'),(7,1,'เกี่ยวกับความสะอาดร่างกาย'),(8,1,'เสริมความงาม'),(9,1,'อื่นๆ'),(10,2,'สินเชื่อและไฟแนนซ์'),(11,2,'ประกันภัยและพรบ'),(12,2,'ศูนย์บริการ'),(13,2,'จักรยาน'),(14,2,'ประดับยนต์'),(15,2,'เครื่องเสียง'),(16,2,'อะไหล่'),(17,2,'มอเตอร์ไซค์'),(18,2,'รถยนต์'),(19,2,'อื่นๆ'),(20,3,'บ้านเดี่ยว'),(21,3,'ที่ดิน'),(22,3,'คอนโดมิเนียม'),(23,3,'หอพัก'),(24,3,'สำนักงาน'),(25,3,'ร้านค้า พื้นที่ขายของ'),(26,3,'ตึกแถว'),(27,3,'ทาวน์เฮาส์'),(28,3,'โรงงาน โกดัง'),(29,3,'โรงแรม'),(30,3,'อื่นๆ'),(31,4,'กระเป๋า'),(32,4,'เสื้อผ้าบุรุษ'),(33,4,'เสื้อผ้าสตรี'),(34,4,'ชุดชั้นใน'),(35,4,'ชุดนอน'),(36,4,'รองเท้า ถุงเท้า'),(37,4,'เนคไท ผ้าพันคอ'),(38,4,'เด็กชาย'),(39,4,'เด็กหญิง'),(40,4,'เครื่องสำอาง'),(41,4,'น้ำหอม'),(42,4,'อื่นๆ'),(43,5,'PC'),(44,5,'Notebook'),(45,5,'PDA'),(46,5,'Printer Scaner'),(47,5,'Software'),(48,5,'Hardware'),(49,5,'Server'),(50,5,'เว็บไซต์'),(51,5,'โฮสติ้ง'),(52,5,'บริการไอที'),(53,5,'อื่นๆ'),(54,6,'กล้องใช้ฟิล์ม'),(55,6,'กล้องดิจิตอล'),(56,6,'กล้องวีดีโอ'),(57,6,'กล้องวงจรปิด'),(58,6,'กล้องส่องทางไกล'),(59,6,'เมมโมรี่การ์ด'),(60,6,'อุปกรณ์เสริม'),(61,6,'บริการถ่ายภาพ'),(62,6,'อื่นๆ'),(63,7,'ทีวี'),(64,7,'วิทยุ เทป'),(65,7,'เครื่องเสียง'),(66,7,'เครื่องเล่นเพลง หนัง'),(67,7,'เครื่องปรับอากาศ'),(68,7,'เครื่องทำความเย็น'),(69,7,'เครื่องซักผ้า'),(70,7,'เครื่องครัว'),(71,7,'หลอดไฟ โคมไฟ'),(72,7,'เคเบิ้ล จานดาวเทียม'),(73,7,'บริการซ่อม'),(74,7,'อื่นๆ'),(75,8,'สัตว์เลี้ยง'),(76,8,'อาหารสัตว์'),(77,8,'รักษาสัตว์'),(78,8,'กรง ที่อยู่สัตว์'),(79,8,'ตกแต่งขน'),(80,8,'อื่นๆ'),(81,9,'อุตสาหกรรม'),(82,9,'นำเข้า'),(83,9,'ส่งออก'),(84,9,'โรงงาน'),(85,9,'เครื่องจักรกล'),(86,9,'เครื่องมือ'),(87,9,'วัสดุอุปกรณ์ วัตถุดิบ'),(88,9,'อื่นๆ'),(89,10,'ผับ บาร์'),(90,10,'ร้านอาหาร'),(91,10,'คาราโอเกะ'),(92,10,'ไนท์คลับ'),(93,10,'คอนเสิร์ต'),(94,10,'แต่งงาน'),(95,10,'แสดงสินค้า'),(96,10,'ละครเวที'),(97,10,'อื่นๆ'),(98,11,'กีตาร์'),(99,11,'เบส'),(100,11,'กลอง'),(101,11,'อิเล็กโทน'),(102,11,'เครื่องเป่า'),(103,11,'เครื่องสาย'),(104,11,'เครื่องตี'),(105,11,'วงดนตรี'),(106,11,'ห้องซ้อม'),(107,11,'อื่นๆ'),(108,12,'หนังสือ'),(109,12,'ตำราเรียน'),(110,12,'Textbook'),(111,12,'การ์ตูน'),(112,12,'นวนิยาย'),(113,12,'นิตยสาร'),(114,12,'เรียนต่อ'),(115,12,'เตรียมสอบ'),(116,12,'กวดวิชา'),(117,12,'สอนพิเศษ'),(118,12,'สอนภาษา'),(119,12,'อบรม สัมนา'),(120,12,'สถาบัน'),(121,12,'อื่นๆ'),(122,13,'เครื่องสาน'),(123,13,'แก้ว'),(124,13,'โลหะ'),(125,13,'ไม้'),(126,13,'ผ้า'),(127,13,'ดินเผา'),(128,13,'เทียน'),(129,13,'ภาพวาด'),(130,13,'ภาพถ่าย'),(131,13,'รูปปั้น'),(132,13,'เย็บปักถักร้อย'),(133,13,'อื่นๆ'),(134,14,'ต้นไม้'),(135,14,'ร้านต้นไม้้'),(136,14,'ดอกไม้'),(137,14,'ร้านดอกไม้'),(138,14,'ไม้ประดับ'),(139,14,'หญ้า'),(140,14,'กระถาง'),(141,14,'ปุ๋ย เคมี'),(142,14,'อื่นๆ'),(143,15,'จองโรงแรมในประเทศ'),(144,15,'จองโรงแรมต่างประเทศ'),(145,15,'ที่พัก'),(146,15,'บริษัททัวร์'),(147,15,'โปรแกรมทัวร์'),(148,15,'บริการเช่า'),(149,15,'จองตั๋วเครื่องบิน รถ เรือ'),(150,15,'อุปกรณ์ท่องเที่ยว'),(151,15,'อื่นๆ'),(152,16,'อาหาร'),(153,16,'เครื่องดื่ม'),(154,16,'ร้านอาหาร'),(155,16,'ภัตราคาร'),(156,16,'คู่มือทำอาหาร'),(157,16,'อื่นๆ'),(158,17,'กินได้'),(159,17,'กินไม่ได้'),(160,17,'ไม่มีหมวด'),(161,17,'อื่นๆ'),(162,18,'ก่อสร้าง'),(163,18,'กฎหมาย'),(164,18,'งานพิมพ์'),(165,18,'ขายตรง'),(166,18,'รับจ้าง'),(167,18,'รับเหมา'),(168,18,'บัญชี'),(169,18,'งานแปล'),(170,18,'พิมพ์งาน เข้าเล่ม'),(171,18,'งานวิจัย'),(172,18,'อื่นๆ'),(173,19,'สปา'),(174,19,'การนวด'),(175,19,'การรักษาโรค'),(176,19,'เสริมความงาม'),(177,19,'การแพทย์'),(178,19,'อาหารเสริม'),(179,19,'เครื่องสำอางค์'),(180,19,'ศัลยกรรม'),(181,19,'การสักบนร่างกาย'),(182,19,'อื่นๆ'),(183,20,'ห้องครัว'),(184,20,'ห้องนอน'),(185,20,'ห้องรับแขก'),(186,20,'ห้องน้ำ์'),(187,20,'ตกแต่งภายใน'),(188,20,'วัสดุอุปกรณ์'),(189,20,'อื่นๆ'),(190,21,'มือถือ'),(191,21,'PCT'),(192,21,'วิทยุสื่อสาร'),(193,21,'โทรศัพท์บ้าน'),(194,21,'PABX'),(195,21,'ซิมการ์ด บัตรเติมเงิน'),(196,21,'อุปกรณ์เสริม'),(197,21,'บริการ ซ่อม'),(198,21,'อื่นๆ'),(199,22,'จิวเวลลี่'),(200,22,'ทอง'),(201,22,'เพชร'),(202,22,'แหวน'),(203,22,'เพชร'),(204,22,'สร้อย จี้'),(205,22,'ต่างหู ตุ้มหู'),(206,22,'อื่นๆ'),(207,23,'งานประจำ'),(208,23,'งานราชการ'),(209,23,'งานพิเศษ'),(210,23,'รายได้เสริม'),(211,23,'Part Time'),(212,23,'คนหางาน'),(213,23,'Resume'),(214,23,'อื่นๆ'),(215,24,'นาฬิกา'),(216,24,'แว่นตา'),(217,24,'คอนแท็คเลนส์'),(218,24,'ที่ดัดฟัน'),(219,24,'หมวก'),(220,24,'เข็มขัด'),(221,24,'สายรัดข้อมือ ข้อเท้า'),(222,24,'ตกแต่งเล็บ'),(223,24,'ทำผม'),(224,24,'อื่นๆ'),(225,25,'PlayStation'),(226,25,'Nintendo'),(227,25,'XBox'),(228,25,'เกมส์ออนไลน์'),(229,25,'เกมส์คอมพิวเตอร์'),(230,25,'คู่มือ บทสรุป'),(231,25,'อื่นๆ'),(232,26,'พระเครื่อง'),(233,26,'ตุ๊กตา'),(234,26,'ของเก่า'),(235,26,'รถบังคับ'),(236,26,'การ์ด'),(237,26,'โมเดล'),(238,26,'แสตมป์'),(239,26,'เหรียญ'),(240,26,'โปสการ์ด'),(241,26,'อื่นๆ'),(242,27,'หนัง VCD'),(243,27,'หนัง DVD'),(244,27,'เทป'),(245,27,'CD เพลง'),(246,27,'ละคร VCD'),(247,27,'คอนเสิร์ต'),(248,27,'รายการทีวี'),(249,27,'สารคดี'),(250,27,'อื่นๆ'),(251,28,'ของเล่น'),(252,28,'ที่นอน'),(253,28,'อาบน้ำเด็ก'),(254,28,'เฟอร์นิเจอร์เด็ก'),(255,28,'รับเลี้ยงเด็ก'),(256,28,'เสื้อผ้า'),(257,28,'อื่นๆ'),(258,29,'เครื่องเขียน'),(259,29,'เครื่องถ่ายเอกสาร'),(260,29,'โปรเจ็กเตอร์'),(261,29,'แฟกซ์'),(262,29,'โต๊ะ เก้าอี้'),(263,29,'อื่นๆ'),(264,30,'ของที่ระลึก'),(265,30,'ของฝาก'),(266,30,'ของชำร่วย'),(267,30,'สินค้าท้องถิ่น'),(268,30,'ผ้าไหม'),(269,30,'ของกิ๊ฟชอป'),(270,30,'ของพรีเมี่ยม'),(271,30,'กรอบรูป'),(272,30,'อื่นๆ'),(273,31,'กีฬา'),(274,31,'กิจกรรม'),(275,31,'นันทนาการ'),(276,31,'งานเลี้ยง'),(277,31,'อุปกรณ์'),(278,31,'เครื่องออกกำลังกาย'),(279,31,'ฟิตเนส โยคะ'),(280,31,'อื่นๆ'),(281,32,'การเกษตร'),(282,32,'ปลูกพืช'),(283,32,'ทำสวน ทำไร่'),(284,32,'เครื่องจักร'),(285,32,'อุปกรณ์'),(286,32,'อื่นๆ'),(287,33,'ตั๋ว'),(288,33,'บัตร'),(289,33,'คูปอง'),(290,33,'การ์ด'),(291,33,'ใบปลิว'),(292,33,'อื่นๆ');

/*Table structure for table `systememails` */

DROP TABLE IF EXISTS `systememails`;

CREATE TABLE `systememails` (
  `systememail_id` int(9) NOT NULL AUTO_INCREMENT,
  `systememail_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `systememail_title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `systememail_subject` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `systememail_body` text COLLATE utf8_unicode_ci,
  `systememail_vars` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `systememail_desc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`systememail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `systememails` */

insert  into `systememails`(`systememail_id`,`systememail_name`,`systememail_title`,`systememail_subject`,`systememail_body`,`systememail_vars`,`systememail_desc`) values (1,'invitecode','Invite code E-mail','You have received an invitation to join our social network!','<p>Hello,%s<br /><br />You have been invited by %s to join our social network. To join, please follow the link below and enter your invite code.<br /><br />%s<br /><br />Invite Code: %s<br /><br />Best Regards,<br />Social Network Administration<br /><br />----------------------------------------<br />%s</p>','[displayname],[email],[message],[code],[link]',''),(2,'invite','Invitation E-mail','You have received an invitation to join our social network.','<p>Hello,%s<br /><br />You have been invited by %s to join our social network. To join, please follow the link below:<br />%s<br /><br />Best Regards,<br />Social Network Administration<br /><br />----------------------------------------<br />%s</p>','[displayname],[link],[message]',''),(3,'verification','Verification E-mail','Social Network - Email Verification','<p>Hello %s,<br /><br />Thank you for joining our social network. To verify your email address and continue, please click the following link:<br />%s<br /><br />Best Regards,<br />Social Network Administration</p>','[displayname],[link]',''),(4,'newpassword','New Password E-mail','Social Network - Login Details','<p>Hello ,%s<br /><br />Thank you for joining our social network. Click the following link and enter your information below to login:<br /><br />[link]<br /><br />Username: %s<br />Password: %s<br /><br />Best Regards,<br />Social Network Administration</p>','[displayname],[username],[password]',''),(5,'welcome','Welcome E-mail','Welcome to the social network','<p>Hello ,%s<br /><br />Thank you for joining our social network. Click the following link and enter your information below to login:<br /><br />%s<br /><br />Username: %s<br />Password: %s<br /><br />Best Regards,<br />Social Network Administration</p>','[displayname],[link],[usernamel],[password]',''),(6,'lostpassword','Lost Password E-mail','Social Network - Lost Password','<p>Hello %s,<br /><br />You have requested to reset your password because you have forgotten your password. If you did not request this, please ignore it. It will expire in 24 hours.To reset your password, please click the following link:<br /><br />%s<br /><br />Best Regards,<br />Social Network Administration</p>','[displayname],[link]',''),(7,'friendrequest','Friend Request E-mail','[friendname] has added you as a friend.','<p>Hello %s,<br /><br />%s  has added you as a friend. Please click the following link to login and confirm this friendship request:<br /><br />%s<br /><br />Best Regards,<br />Social Network Administration</p>','[displayname],[friendname],[link]',''),(8,'from','From Address','administrator','alum9.info@gmail.com','[email]','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
