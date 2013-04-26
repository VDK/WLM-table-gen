
USE `test`;

/*Table structure for table `_changes` */

DROP TABLE IF EXISTS `_changes`;

CREATE TABLE `_changes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `replicant` varchar(6) DEFAULT NULL,
  `original` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `_changes` */

insert  into `_changes`(`id`,`replicant`,`original`) values (1,'#44#','-'),(2,'#99#','/'),(3,'#22#','é'),(4,'#11#','ë'),(5,'#23#','ö');
