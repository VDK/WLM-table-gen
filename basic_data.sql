USE `test`;

/*Table structure for table `_cbs_nr` */

DROP TABLE IF EXISTS `_cbs_nr`;

CREATE TABLE `_cbs_nr` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `gemcode` varchar(255) NOT NULL,
  `provcode` varchar(255) DEFAULT NULL,
  `gemeente` varchar(255) DEFAULT NULL,
  `provincie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=510 DEFAULT CHARSET=latin1;

/*Data for the table `_cbs_nr` */

insert  into `_cbs_nr`(`id`,`gemcode`,`provcode`,`gemeente`,`provincie`) values (1,'0003','20','Appingedam','Groningen'),(2,'0005','20','Bedum','Groningen'),(3,'0007','20','Bellingwedde','Groningen'),(4,'0009','20','Ten Boer','Groningen'),(5,'0010','20','Delfzijl','Groningen'),(6,'0014','20','Groningen','Groningen'),(7,'0015','20','Grootegast','Groningen'),(8,'0017','20','Haren','Groningen'),(9,'0018','20','Hoogezand-Sappemeer','Groningen'),(10,'0022','20','Leek','Groningen'),(11,'0024','20','Loppersum','Groningen'),(12,'0025','20','Marum','Groningen'),(13,'0034','24','Almere','Flevoland'),(14,'0037','20','Stadskanaal','Groningen'),(15,'0040','20','Slochteren','Groningen'),(16,'0047','20','Veendam','Groningen'),(17,'0048','20','Vlagtwedde','Groningen'),(18,'0050','24','Zeewolde','Flevoland'),(19,'0051','21','Skarsterlân','Friesland'),(20,'0053','20','Winsum','Groningen'),(21,'0055','21','Boarnsterhim','Friesland'),(22,'0056','20','Zuidhorn','Groningen'),(23,'0058','21','Dongeradeel','Friesland'),(24,'0059','21','Achtkarspelen','Friesland'),(25,'0060','21','Ameland','Friesland'),(26,'0063','21','het Bildt','Friesland'),(27,'0070','21','Franekeradeel','Friesland'),(28,'0072','21','Harlingen','Friesland'),(29,'0074','21','Heerenveen','Friesland'),(30,'0079','21','Kollumerland en Nieuwkruisland','Friesland'),(31,'0080','21','Leeuwarden','Friesland'),(32,'0081','21','Leeuwarderadeel','Friesland'),(33,'0082','21','Lemsterland','Friesland'),(34,'0085','21','Ooststellingwerf','Friesland'),(35,'0086','21','Opsterland','Friesland'),(36,'0088','21','Schiermonnikoog','Friesland'),(37,'0090','21','Smallingerland','Friesland'),(38,'0093','21','Terschelling','Friesland'),(39,'0096','21','Vlieland','Friesland'),(40,'0098','21','Weststellingwerf','Friesland'),(41,'0106','22','Assen','Drenthe'),(42,'0109','22','Coevorden','Drenthe'),(43,'0114','22','Emmen','Drenthe'),(44,'0118','22','Hoogeveen','Drenthe'),(45,'0119','22','Meppel','Drenthe'),(46,'0140','21','Littenseradiel','Friesland'),(47,'0141','23','Almelo','Overijssel'),(48,'0147','23','Borne','Overijssel'),(49,'0148','23','Dalfsen','Overijssel'),(50,'0150','23','Deventer','Overijssel'),(51,'0153','23','Enschede','Overijssel'),(52,'0158','23','Haaksbergen','Overijssel'),(53,'0160','23','Hardenberg','Overijssel'),(54,'0163','23','Hellendoorn','Overijssel'),(55,'0164','23','Hengelo','Overijssel'),(56,'0166','23','Kampen','Overijssel'),(57,'0168','23','Losser','Overijssel'),(58,'0171','24','Noordoostpolder','Flevoland'),(59,'0173','23','Oldenzaal','Overijssel'),(60,'0175','23','Ommen','Overijssel'),(61,'0177','23','Raalte','Overijssel'),(62,'0180','23','Staphorst','Overijssel'),(63,'0183','23','Tubbergen','Overijssel'),(64,'0184','24','Urk','Flevoland'),(65,'0189','23','Wierden','Overijssel'),(66,'0193','23','Zwolle','Overijssel'),(67,'0196','25','Rijnwaarden','Gelderland'),(68,'0197','25','Aalten','Gelderland'),(69,'0200','25','Apeldoorn','Gelderland'),(70,'0202','25','Arnhem','Gelderland'),(71,'0203','25','Barneveld','Gelderland'),(72,'0209','25','Beuningen','Gelderland'),(73,'0213','25','Brummen','Gelderland'),(74,'0214','25','Buren','Gelderland'),(75,'0216','25','Culemborg','Gelderland'),(76,'0221','25','Doesburg','Gelderland'),(77,'0222','25','Doetinchem','Gelderland'),(78,'0225','25','Druten','Gelderland'),(79,'0226','25','Duiven','Gelderland'),(80,'0228','25','Ede','Gelderland'),(81,'0230','25','Elburg','Gelderland'),(82,'0232','25','Epe','Gelderland'),(83,'0233','25','Ermelo','Gelderland'),(84,'0236','25','Geldermalsen','Gelderland'),(85,'0241','25','Groesbeek','Gelderland'),(86,'0243','25','Harderwijk','Gelderland'),(87,'0244','25','Hattem','Gelderland'),(88,'0246','25','Heerde','Gelderland'),(89,'0252','25','Heumen','Gelderland'),(90,'0262','25','Lochem','Gelderland'),(91,'0263','25','Maasdriel','Gelderland'),(92,'0265','25','Millingen aan de Rijn','Gelderland'),(93,'0267','25','Nijkerk','Gelderland'),(94,'0268','25','Nijmegen','Gelderland'),(95,'0269','25','Oldebroek','Gelderland'),(96,'0273','25','Putten','Gelderland'),(97,'0274','25','Renkum','Gelderland'),(98,'0275','25','Rheden','Gelderland'),(99,'0277','25','Rozendaal','Gelderland'),(100,'0279','25','Scherpenzeel','Gelderland'),(101,'0281','25','Tiel','Gelderland'),(102,'0282','25','Ubbergen','Gelderland'),(103,'0285','25','Voorst','Gelderland'),(104,'0289','25','Wageningen','Gelderland'),(105,'0293','25','Westervoort','Gelderland'),(106,'0294','25','Winterswijk','Gelderland'),(107,'0296','25','Wijchen','Gelderland'),(108,'0297','25','Zaltbommel','Gelderland'),(109,'0299','25','Zevenaar','Gelderland'),(110,'0301','25','Zutphen','Gelderland'),(111,'0302','25','Nunspeet','Gelderland'),(112,'0303','24','Dronten','Flevoland'),(113,'0304','25','Neerijnen','Gelderland'),(114,'0307','26','Amersfoort','Utrecht'),(115,'0308','26','Baarn','Utrecht'),(116,'0310','26','De Bilt','Utrecht'),(117,'0312','26','Bunnik','Utrecht'),(118,'0313','26','Bunschoten','Utrecht'),(119,'0317','26','Eemnes','Utrecht'),(120,'0321','26','Houten','Utrecht'),(121,'0327','26','Leusden','Utrecht'),(122,'0331','26','Lopik','Utrecht'),(123,'0335','26','Montfoort','Utrecht'),(124,'0339','26','Renswoude','Utrecht'),(125,'0340','26','Rhenen','Utrecht'),(126,'0342','26','Soest','Utrecht'),(127,'0344','26','Utrecht','Utrecht'),(128,'0345','26','Veenendaal','Utrecht'),(129,'0351','26','Woudenberg','Utrecht'),(130,'0352','26','Wijk bij Duurstede','Utrecht'),(131,'0353','26','IJsselstein','Utrecht'),(132,'0355','26','Zeist','Utrecht'),(133,'0356','26','Nieuwegein','Utrecht'),(134,'0358','27','Aalsmeer','Noord-Holland'),(135,'0361','27','Alkmaar','Noord-Holland'),(136,'0362','27','Amstelveen','Noord-Holland'),(137,'0363','27','Amsterdam','Noord-Holland'),(138,'0365','27','Graft-De Rijp','Noord-Holland'),(139,'0370','27','Beemster','Noord-Holland'),(140,'0373','27','Bergen (NH.)','Noord-Holland'),(141,'0375','27','Beverwijk','Noord-Holland'),(142,'0376','27','Blaricum','Noord-Holland'),(143,'0377','27','Bloemendaal','Noord-Holland'),(144,'0381','27','Bussum','Noord-Holland'),(145,'0383','27','Castricum','Noord-Holland'),(146,'0384','27','Diemen','Noord-Holland'),(147,'0385','27','Edam-Volendam','Noord-Holland'),(148,'0388','27','Enkhuizen','Noord-Holland'),(149,'0392','27','Haarlem','Noord-Holland'),(150,'0393','27','Haarlemmerliede en Spaarnwoude','Noord-Holland'),(151,'0394','27','Haarlemmermeer','Noord-Holland'),(152,'0396','27','Heemskerk','Noord-Holland'),(153,'0397','27','Heemstede','Noord-Holland'),(154,'0398','27','Heerhugowaard','Noord-Holland'),(155,'0399','27','Heiloo','Noord-Holland'),(156,'0400','27','Den Helder','Noord-Holland'),(157,'0402','27','Hilversum','Noord-Holland'),(158,'0405','27','Hoorn','Noord-Holland'),(159,'0406','27','Huizen','Noord-Holland'),(160,'0415','27','Landsmeer','Noord-Holland'),(161,'0416','27','Langedijk','Noord-Holland'),(162,'0417','27','Laren','Noord-Holland'),(163,'0420','27','Medemblik','Noord-Holland'),(164,'0424','27','Muiden','Noord-Holland'),(165,'0425','27','Naarden','Noord-Holland'),(166,'0431','27','Oostzaan','Noord-Holland'),(167,'0432','27','Opmeer','Noord-Holland'),(168,'0437','27','Ouder-Amstel','Noord-Holland'),(169,'0439','27','Purmerend','Noord-Holland'),(170,'0441','27','Schagen','Noord-Holland'),(171,'0448','27','Texel','Noord-Holland'),(172,'0450','27','Uitgeest','Noord-Holland'),(173,'0451','27','Uithoorn','Noord-Holland'),(174,'0453','27','Velsen','Noord-Holland'),(175,'0457','27','Weesp','Noord-Holland'),(176,'0458','27','Schermer','Noord-Holland'),(177,'0473','27','Zandvoort','Noord-Holland'),(178,'0478','27','Zeevang','Noord-Holland'),(179,'0479','27','Zaanstad','Noord-Holland'),(180,'0482','28','Alblasserdam','Zuid-Holland'),(181,'0484','28','Alphen aan den Rijn','Zuid-Holland'),(182,'0489','28','Barendrecht','Zuid-Holland'),(183,'0491','28','Bergambacht','Zuid-Holland'),(184,'0498','27','Drechterland','Noord-Holland'),(185,'0499','28','Boskoop','Zuid-Holland'),(186,'0501','28','Brielle','Zuid-Holland'),(187,'0502','28','Capelle aan den IJssel','Zuid-Holland'),(188,'0503','28','Delft','Zuid-Holland'),(189,'0505','28','Dordrecht','Zuid-Holland'),(190,'0512','28','Gorinchem','Zuid-Holland'),(191,'0513','28','Gouda','Zuid-Holland'),(192,'0518','28','\'s-Gravenhage','Zuid-Holland'),(193,'0523','28','Hardinxveld-Giessendam','Zuid-Holland'),(194,'0530','28','Hellevoetsluis','Zuid-Holland'),(195,'0531','28','Hendrik-Ido-Ambacht','Zuid-Holland'),(196,'0532','27','Stede Broec','Noord-Holland'),(197,'0534','28','Hillegom','Zuid-Holland'),(198,'0537','28','Katwijk','Zuid-Holland'),(199,'0542','28','Krimpen aan den IJssel','Zuid-Holland'),(200,'0545','28','Leerdam','Zuid-Holland'),(201,'0546','28','Leiden','Zuid-Holland'),(202,'0547','28','Leiderdorp','Zuid-Holland'),(203,'0553','28','Lisse','Zuid-Holland'),(204,'0556','28','Maassluis','Zuid-Holland'),(205,'0568','28','Bernisse','Zuid-Holland'),(206,'0569','28','Nieuwkoop','Zuid-Holland'),(207,'0575','28','Noordwijk','Zuid-Holland'),(208,'0576','28','Noordwijkerhout','Zuid-Holland'),(209,'0579','28','Oegstgeest','Zuid-Holland'),(210,'0584','28','Oud-Beijerland','Zuid-Holland'),(211,'0585','28','Binnenmaas','Zuid-Holland'),(212,'0588','28','Korendijk','Zuid-Holland'),(213,'0589','26','Oudewater','Utrecht'),(214,'0590','28','Papendrecht','Zuid-Holland'),(215,'0597','28','Ridderkerk','Zuid-Holland'),(216,'0599','28','Rotterdam','Zuid-Holland'),(217,'0603','28','Rijswijk','Zuid-Holland'),(218,'0606','28','Schiedam','Zuid-Holland'),(219,'0608','28','Schoonhoven','Zuid-Holland'),(220,'0610','28','Sliedrecht','Zuid-Holland'),(221,'0611','28','Cromstrijen','Zuid-Holland'),(222,'0612','28','Spijkenisse','Zuid-Holland'),(223,'0613','28','Albrandswaard','Zuid-Holland'),(224,'0614','28','Westvoorne','Zuid-Holland'),(225,'0617','28','Strijen','Zuid-Holland'),(226,'0620','26','Vianen','Utrecht'),(227,'0622','28','Vlaardingen','Zuid-Holland'),(228,'0623','28','Vlist','Zuid-Holland'),(229,'0626','28','Voorschoten','Zuid-Holland'),(230,'0627','28','Waddinxveen','Zuid-Holland'),(231,'0629','28','Wassenaar','Zuid-Holland'),(232,'0632','26','Woerden','Utrecht'),(233,'0637','28','Zoetermeer','Zuid-Holland'),(234,'0638','28','Zoeterwoude','Zuid-Holland'),(235,'0642','28','Zwijndrecht','Zuid-Holland'),(236,'0643','28','Nederlek','Zuid-Holland'),(237,'0644','28','Ouderkerk','Zuid-Holland'),(238,'0653','21','Gaasterlân-Sleat','Friesland'),(239,'0654','29','Borsele','Zeeland'),(240,'0664','29','Goes','Zeeland'),(241,'0668','25','West Maas en Waal','Gelderland'),(242,'0677','29','Hulst','Zeeland'),(243,'0678','29','Kapelle','Zeeland'),(244,'0687','29','Middelburg','Zeeland'),(245,'0689','28','Giessenlanden','Zuid-Holland'),(246,'0703','29','Reimerswaal','Zeeland'),(247,'0707','28','Zederik','Zuid-Holland'),(248,'0715','29','Terneuzen','Zeeland'),(249,'0716','29','Tholen','Zeeland'),(250,'0717','29','Veere','Zeeland'),(251,'0718','29','Vlissingen','Zeeland'),(252,'0733','25','Lingewaal','Gelderland'),(253,'0736','26','De Ronde Venen','Utrecht'),(254,'0737','21','Tytsjerksteradiel','Friesland'),(255,'0738','30','Aalburg','Noord-Brabant'),(256,'0743','30','Asten','Noord-Brabant'),(257,'0744','30','Baarle-Nassau','Noord-Brabant'),(258,'0748','30','Bergen op Zoom','Noord-Brabant'),(259,'0753','30','Best','Noord-Brabant'),(260,'0755','30','Boekel','Noord-Brabant'),(261,'0756','30','Boxmeer','Noord-Brabant'),(262,'0757','30','Boxtel','Noord-Brabant'),(263,'0758','30','Breda','Noord-Brabant'),(264,'0762','30','Deurne','Noord-Brabant'),(265,'0765','20','Pekela','Groningen'),(266,'0766','30','Dongen','Noord-Brabant'),(267,'0770','30','Eersel','Noord-Brabant'),(268,'0772','30','Eindhoven','Noord-Brabant'),(269,'0777','30','Etten-Leur','Noord-Brabant'),(270,'0779','30','Geertruidenberg','Noord-Brabant'),(271,'0784','30','Gilze en Rijen','Noord-Brabant'),(272,'0785','30','Goirle','Noord-Brabant'),(273,'0786','30','Grave','Noord-Brabant'),(274,'0788','30','Haaren','Noord-Brabant'),(275,'0794','30','Helmond','Noord-Brabant'),(276,'0796','30','\'s-Hertogenbosch','Noord-Brabant'),(277,'0797','30','Heusden','Noord-Brabant'),(278,'0798','30','Hilvarenbeek','Noord-Brabant'),(279,'0809','30','Loon op Zand','Noord-Brabant'),(280,'0815','30','Mill en Sint Hubert','Noord-Brabant'),(281,'0820','30','Nuenen, Gerwen en Nederwetten','Noord-Brabant'),(282,'0823','30','Oirschot','Noord-Brabant'),(283,'0824','30','Oisterwijk','Noord-Brabant'),(284,'0826','30','Oosterhout','Noord-Brabant'),(285,'0828','30','Oss','Noord-Brabant'),(286,'0840','30','Rucphen','Noord-Brabant'),(287,'0844','30','Schijndel','Noord-Brabant'),(288,'0845','30','Sint-Michielsgestel','Noord-Brabant'),(289,'0846','30','Sint-Oedenrode','Noord-Brabant'),(290,'0847','30','Someren','Noord-Brabant'),(291,'0848','30','Son en Breugel','Noord-Brabant'),(292,'0851','30','Steenbergen','Noord-Brabant'),(293,'0852','27','Waterland','Noord-Holland'),(294,'0855','30','Tilburg','Noord-Brabant'),(295,'0856','30','Uden','Noord-Brabant'),(296,'0858','30','Valkenswaard','Noord-Brabant'),(297,'0860','30','Veghel','Noord-Brabant'),(298,'0861','30','Veldhoven','Noord-Brabant'),(299,'0865','30','Vught','Noord-Brabant'),(300,'0866','30','Waalre','Noord-Brabant'),(301,'0867','30','Waalwijk','Noord-Brabant'),(302,'0870','30','Werkendam','Noord-Brabant'),(303,'0873','30','Woensdrecht','Noord-Brabant'),(304,'0874','30','Woudrichem','Noord-Brabant'),(305,'0879','30','Zundert','Noord-Brabant'),(306,'0880','27','Wormerland','Noord-Holland'),(307,'0881','31','Onderbanken','Limburg'),(308,'0882','31','Landgraaf','Limburg'),(309,'0888','31','Beek','Limburg'),(310,'0889','31','Beesel','Limburg'),(311,'0893','31','Bergen (L.)','Limburg'),(312,'0899','31','Brunssum','Limburg'),(313,'0907','31','Gennep','Limburg'),(314,'0917','31','Heerlen','Limburg'),(315,'0928','31','Kerkrade','Limburg'),(316,'0935','31','Maastricht','Limburg'),(317,'0938','31','Meerssen','Limburg'),(318,'0944','31','Mook en Middelaar','Limburg'),(319,'0946','31','Nederweert','Limburg'),(320,'0951','31','Nuth','Limburg'),(321,'0957','31','Roermond','Limburg'),(322,'0962','31','Schinnen','Limburg'),(323,'0965','31','Simpelveld','Limburg'),(324,'0971','31','Stein','Limburg'),(325,'0981','31','Vaals','Limburg'),(326,'0983','31','Venlo','Limburg'),(327,'0984','31','Venray','Limburg'),(328,'0986','31','Voerendaal','Limburg'),(329,'0988','31','Weert','Limburg'),(330,'0994','31','Valkenburg aan de Geul','Limburg'),(331,'0995','24','Lelystad','Flevoland'),(332,'1507','31','Horst aan de Maas','Limburg'),(333,'1509','25','Oude IJsselstreek','Gelderland'),(334,'1525','28','Teylingen','Zuid-Holland'),(335,'1581','26','Utrechtse Heuvelrug','Utrecht'),(336,'1586','25','Oost Gelre','Gelderland'),(337,'1598','27','Koggenland','Noord-Holland'),(338,'1621','28','Lansingerland','Zuid-Holland'),(339,'1640','31','Leudal','Limburg'),(340,'1641','31','Maasgouw','Limburg'),(341,'1651','20','Eemsmond','Groningen'),(342,'1652','30','Gemert-Bakel','Noord-Brabant'),(343,'1655','30','Halderberge','Noord-Brabant'),(344,'1658','30','Heeze-Leende','Noord-Brabant'),(345,'1659','30','Laarbeek','Noord-Brabant'),(346,'1663','20','De Marne','Groningen'),(347,'1667','30','Reusel-De Mierden','Noord-Brabant'),(348,'1669','31','Roerdalen','Limburg'),(349,'1671','30','Maasdonk','Noord-Brabant'),(350,'1672','28','Rijnwoude','Zuid-Holland'),(351,'1674','30','Roosendaal','Noord-Brabant'),(352,'1676','29','Schouwen-Duiveland','Zeeland'),(353,'1680','22','Aa en Hunze','Drenthe'),(354,'1681','22','Borger-Odoorn','Drenthe'),(355,'1684','30','Cuijk','Noord-Brabant'),(356,'1685','30','Landerd','Noord-Brabant'),(357,'1690','22','De Wolden','Drenthe'),(358,'1695','29','Noord-Beveland','Zeeland'),(359,'1696','27','Wijdemeren','Noord-Holland'),(360,'1699','22','Noordenveld','Drenthe'),(361,'1700','23','Twenterand','Overijssel'),(362,'1701','22','Westerveld','Drenthe'),(363,'1702','30','Sint Anthonis','Noord-Brabant'),(364,'1705','25','Lingewaard','Gelderland'),(365,'1706','30','Cranendonck','Noord-Brabant'),(366,'1708','23','Steenwijkerland','Overijssel'),(367,'1709','30','Moerdijk','Noord-Brabant'),(368,'1711','31','Echt-Susteren','Limburg'),(369,'1714','29','Sluis','Zeeland'),(370,'1719','30','Drimmelen','Noord-Brabant'),(371,'1721','30','Bernheze','Noord-Brabant'),(372,'1722','21','Ferwerderadiel','Friesland'),(373,'1723','30','Alphen-Chaam','Noord-Brabant'),(374,'1724','30','Bergeijk','Noord-Brabant'),(375,'1728','30','Bladel','Noord-Brabant'),(376,'1729','31','Gulpen-Wittem','Limburg'),(377,'1730','22','Tynaarlo','Drenthe'),(378,'1731','22','Midden-Drenthe','Drenthe'),(379,'1734','25','Overbetuwe','Gelderland'),(380,'1735','23','Hof van Twente','Overijssel'),(381,'1740','25','Neder-Betuwe','Gelderland'),(382,'1742','23','Rijssen-Holten','Overijssel'),(383,'1771','30','Geldrop-Mierlo','Noord-Brabant'),(384,'1773','23','Olst-Wijhe','Overijssel'),(385,'1774','23','Dinkelland','Overijssel'),(386,'1783','28','Westland','Zuid-Holland'),(387,'1842','28','Midden-Delfland','Zuid-Holland'),(388,'1859','25','Berkelland','Gelderland'),(389,'1876','25','Bronckhorst','Gelderland'),(390,'1883','31','Sittard-Geleen','Limburg'),(391,'1884','28','Kaag en Braassem','Zuid-Holland'),(392,'1891','21','Dantumadiel','Friesland'),(393,'1892','28','Zuidplas','Zuid-Holland'),(394,'1894','31','Peel en Maas','Limburg'),(395,'1895','20','Oldambt','Groningen'),(396,'1896','23','Zwartewaterland','Overijssel'),(397,'1900','21','Sùdwest-Fryslân','Friesland'),(398,'1901','28','Bodegraven-Reeuwijk','Zuid-Holland'),(399,'1903','31','Eijsden-Margraten','Limburg'),(400,'1904','26','Stichtse Vecht','Utrecht'),(401,'1908','21','Menameradiel','Friesland'),(402,'1911','27','Hollands Kroon','Noord-Holland'),(403,'1916','28','Leidschendam-Voorburg','Zuid-Holland'),(404,'1924','28','Goeree-Overflakkee','Zuid-Holland'),(405,'1926','28','Pijnacker-Nootdorp','Zuid-Holland'),(406,'1927','28','Molenwaard','Zuid-Holland'),(407,'1955','25','Montferland','Gelderland'),(408,'1987','20','Menterwolde','Groningen'),(508,'0518','28','Den Haag','Zuid-Holland'),(509,'0796','30','Den Bosch','Noord-Brabant');

/*Table structure for table `_changes` */

DROP TABLE IF EXISTS `_changes`;

CREATE TABLE `_changes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `replicant` varchar(6) DEFAULT NULL,
  `original` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `_changes` */ 

insert  into `_changes`(`id`,`replicant`,`original`) values (1,'#44#','-'),(2,'#99#','/'),(3,'#22#','é'),(4,'#11#','ë'),(5,'#23#','ö'),(6,'#37#','â');
