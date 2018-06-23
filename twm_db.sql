/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 5.7.19 : Database - twm_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`twm_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `twm_db`;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kat_nama` varchar(30) DEFAULT NULL,
  `kat_parent` int(11) DEFAULT NULL,
  `kat_link` varchar(30) DEFAULT NULL,
  `kat_urutan` int(11) DEFAULT '99',
  `kat_show` smallint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`kat_nama`,`kat_parent`,`kat_link`,`kat_urutan`,`kat_show`) values 
(1,'Kategori',NULL,NULL,99,0),
(2,'Kategori Satu',1,'#',1,1),
(3,'Kategori Dua',1,'#',2,1),
(4,'Kategori Tiga',1,'tiga',3,1),
(5,'Anaknya Satu 1',2,'assatu',1,1),
(6,'Anaknya Satu 2',2,'asdua',2,1),
(7,'Anaknya Dua',3,'adsatu',1,1);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` int(10) unsigned NOT NULL,
  `produk_nama` varchar(50) DEFAULT NULL,
  `produk_harga` double DEFAULT NULL,
  `produk_satuan` varchar(30) DEFAULT NULL,
  `produk_desc` text,
  `produk_status` smallint(1) DEFAULT '1',
  `produk_img` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id`,`kategori_id`,`produk_nama`,`produk_harga`,`produk_satuan`,`produk_desc`,`produk_status`,`produk_img`) values 
(1,4,'produk 1 c',15000,'pc','produk 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_1.jpg'),
(2,5,'produk 2',30000,'pc','produk 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_2.jpg'),
(3,6,'produk 3',5000,'pc','produk 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_3.jpg'),
(4,7,'Tempat tisu',7500,'pc','produk 4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_4.jpg'),
(5,4,'produk 5',10000,'pc','produk 5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_5.jpg'),
(6,5,'produk 6',50000,'pc','produk 6 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_6.jpg'),
(7,6,'produk 7',30000,'pc','produk 7 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_7.jpg'),
(8,7,'produk 8',15000,'pc','produk 8 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_8.jpg'),
(9,4,'produk 9',10000,'pc','produk 9 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_9.jpg'),
(10,5,'produk 10',9000,'pc','produk 10 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper tempor quam, at suscipit lacus commodo ac. Phasellus eget aliquet odio. Proin efficitur suscipit justo vel maximus. Fusce eget lobortis ex, tristique pharetra ligula. Pellentesque a laoreet magna. Praesent faucibus urna tortor, sit amet consequat ante lobortis eu. Nulla eu hendrerit dolor. Proin faucibus pulvinar orci eget blandit. Aliquam ultricies augue eget mollis sollicitudin. Morbi hendrerit lacus id nulla vestibulum, in volutpat libero tristique. Aenean suscipit sapien sit amet diam rhoncus, vel fermentum purus rutrum. Donec sodales nibh at elit pellentesque, non ornare nibh laoreet. Phasellus ut pellentesque lacus. Sed vitae volutpat nunc.',1,'p_10.jpg');

/*Table structure for table `twm_menu` */

DROP TABLE IF EXISTS `twm_menu`;

CREATE TABLE `twm_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) DEFAULT NULL,
  `menu_parent` int(11) DEFAULT NULL,
  `menu_link` varchar(50) DEFAULT NULL,
  `menu_status` smallint(1) DEFAULT NULL,
  `menu_urutan` int(11) DEFAULT NULL,
  `menu_show` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `twm_menu` */

insert  into `twm_menu`(`id`,`menu_name`,`menu_parent`,`menu_link`,`menu_status`,`menu_urutan`,`menu_show`) values 
(1,'root',NULL,NULL,1,NULL,0),
(2,'Home',1,'',1,1,1),
(3,'Contact',1,'contact',1,4,1),
(4,'About',1,'about',1,5,1),
(5,'Test',1,'#',1,3,1),
(6,'Testing',5,'antest',1,1,1),
(7,'Testingting',5,'antest2',1,2,1),
(8,'Cart',1,'cart',1,2,1);

/*Table structure for table `twm_pref` */

DROP TABLE IF EXISTS `twm_pref`;

CREATE TABLE `twm_pref` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pref_name` varchar(100) DEFAULT NULL,
  `pref_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `twm_pref` */

insert  into `twm_pref`(`id`,`pref_name`,`pref_value`) values 
(1,'title','Service Worker'),
(2,'nama_toko','Ini Judul'),
(3,'no_telp','0891 0111 2131'),
(4,'kelompok','Kelompok XXY');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
