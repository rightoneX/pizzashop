DROP TABLE IF EXISTS `fooditems`;
CREATE TABLE `fooditems` (
  `itemID` int unsigned NOT NULL AUTO_INCREMENT,
  `pizza` varchar(15) NOT NULL,
  `description` text,
  `pizzatype` char(1) DEFAULT 'S',
  `price` float NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customerID` int unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '.',
  `permission` varchar(45) DEFAULT 'customer',
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `bookingID` int unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int unsigned NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `bookingdate` datetime DEFAULT NULL,
  `people` int DEFAULT '1',
  PRIMARY KEY (`bookingID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `customer` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) on delete cascade
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderID` int unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int unsigned NOT NULL,
  `deliverytype` varchar(1) NOT NULL DEFAULT 'P',
  `createtime` timestamp NOT NULL,
  `deliverytime` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `customerID` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) on delete cascade
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `orderlines`;
CREATE TABLE `orderlines` (
  `orderlineID` int unsigned NOT NULL AUTO_INCREMENT,
  `orderID` int unsigned NOT NULL,
  `fooditemsID` int unsigned NOT NULL,
  `createtime` timestamp NOT NULL,
  PRIMARY KEY (`orderlineID`),
  KEY `orderID` (`orderID`),
  KEY `itemID` (`fooditemsID`),
  CONSTRAINT `itemID` FOREIGN KEY (`fooditemsID`) REFERENCES `fooditems` (`itemID`),
  CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) on delete cascade
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (1,"PIZZA 1","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing","S",10);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (2,"PIZZA 2","Lorem ipsum dolor sit amet, consectetuer","S",10);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (3,"PIZZA 3","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur","S",6);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (4,"PIZZA 4","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam","S",6);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (5,"PIZZA 5","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.","S",8);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (6,"PIZZA 6","Lorem ipsum dolor sit amet, consectetuer adipiscing","S",7);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (7,"PIZZA 7","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.","S",8);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (8,"PIZZA 8","Lorem ipsum dolor sit amet,","S",9);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (9,"PIZZA 9","Lorem ipsum dolor sit","V",9);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (10,"PIZZA 10","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer","V",6);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (11,"PIZZA 11","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur","V",6);
INSERT INTO `fooditems` (`itemID`,`pizza`,`description`,`pizzatype`,`price`) VALUES (12,"PIZZA 12","Lorem","V",7);
