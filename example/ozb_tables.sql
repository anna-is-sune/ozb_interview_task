-- MySQL dump 10.13  Distrib 8.0.33, for Linux (aarch64)
--
-- Host: localhost    Database: ozb
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
-- MySQL dump 10.13  Distrib 8.0.33, for Linux (aarch64)
--
-- Host: localhost    Database: ozb
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double unsigned NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photos` json NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `deleted_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Sofa',40000,'<div>The Tuscany is a classically styled and timeless curved tub design. Sporting clean flowing lines and featuring a well padded back and seat for comfort and support. The upholstery is finished with stylish piping and the Tuscany boasts quality British construction to ensure years of enjoyment.<br><br></div><h1>Features</h1><ul><li>Soft touch plush velvet fabric upholstery</li><li>Matching pipe detailing</li><li>Timber frame with plywood base</li><li>3 year frame warranty for your peace of mind</li><li>Choice of dark wood or light wood legs</li></ul>','{\"original\": {\"type\": 18, \"width\": 600, \"height\": 600, \"filename\": \"1689544490.webp\", \"file_path\": \"/srv/app/public/asset/product/original/1689544490.webp\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544490.webp\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544490.webp\"}}','2023-07-13 19:13:42','2023-07-16 21:54:50',NULL),(2,'Desk',20000,'<ul><li><strong>Assembly</strong> Ready Assembled</li><li><strong>Product Dimensions</strong>&nbsp;<br>H 72.5/84.5cm x W 83cm x D 53cm<br>Under Desk Space Dimensions: H 71.5cm x W 83cm x D 50cm</li><li><strong>Brand</strong> Dunelm</li><li><strong>Packaging Dimensions</strong>&nbsp;<br>H 5.5cm x W 105cm x D 87cm</li><li><strong>Weight</strong> 6.7kg</li><li><strong>Care Instructions</strong> Wipe clean with a soft cloth</li><li><strong>Composition</strong> Top: MDF, Rustic Wood veneer, Metal frame</li><li><strong>Pack Contents</strong> 1 x Table</li><li><strong>Product Benefits</strong> Compact, Folding</li><li><strong>Finish</strong> Painted</li></ul><div><br></div>','{\"original\": {\"type\": 18, \"width\": 602, \"height\": 602, \"filename\": \"1689544631.webp\", \"file_path\": \"/srv/app/public/asset/product/original/1689544631.webp\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544631.webp\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544631.webp\"}}','2023-07-14 12:53:17','2023-07-16 21:57:11',NULL),(3,'Wardrode',53000,'<div><strong>Features</strong>: Two door wardrobe that has a solid oak hanging rail and two large drawers in the base. The natural oak tops have softly rounded corners that perfectly complement the cream painted body. This is a quality wardrobe that that is built to last and is maintenance free. Supplied with stylish brushed steel handles.<br><br></div><div><strong>Finish</strong>: Light cream painted with natural oak tops.<br><br></div><div><strong>Assembly</strong>: Assembly Required (Delivered in 2 Boxes for easy access).<br><br></div><div><strong>Dimensions: </strong>Height: 1910mm x Width: 1190mm x Depth: 570mm.</div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544642.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544642.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544642.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544642.jpg\"}}','2023-07-14 13:01:03','2023-07-16 21:57:22',NULL),(4,'Double Bed',70000,'<div><strong>Features</strong>: The Rustic Solid Oak 4ft 6in Double Bed is a chunky country styled bed frame that will take centre stage in any bedroom interior. The warm and cosy styling will perfectly compliment both neutral and bold interior decors while its simple slatted head and foot board will look great positioned against a central feature wall for an eye-catching and inviting focal point.<br><br></div><div><strong>Finish</strong>: Medium to Dark oak stain colour with a natural oiled lacquered protective coating to give an attractive satin finish that is very hard wearing and maintenance free.<br><br></div><div><strong>Assembly</strong>: This bed is delivered in sections for easy access into your home and requires simple and minor assembly.<br><br></div><div><strong>Dimensions</strong>: Headboard Height: 1045mm (Footboard Height: 645mm) x Width: 1550mm x Length: 2070mm.</div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544668.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544668.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544668.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544668.jpg\"}}','2023-07-14 13:07:06','2023-07-16 21:57:48',NULL),(5,'Queen Size Bed',80000,'<div><strong>Features</strong>: 5ft King Size Bed Frame. Premium in quality this low foot board bed frame has a vertically slatted head board design finished off with a 40mm thick solid oak top rail. The light oak top rail perfectly complements the inky blue painted bed frame. This bed is built to last, it is very strong and sturdy and uses quality construction methods, the mattress slats are made from solid pine and have a metal central support rail.<br><br></div><div>This bed requires a UK standard 5ft King Size Mattress – Size: Width 150cm x Length 200cm.<br><br></div><div><strong>Finish</strong>: Blue Painted Bed Frame with Light Oak Top Rails.<br><br></div><div><strong>Assembly</strong>: Assembly Required (Delivered in 4 Boxes for easy access).<br><br></div><div><strong>Dimensions: </strong>Height: 1150mm x Width: 1630mm x Length: 2150mm.</div>','{\"original\": {\"type\": 18, \"width\": 900, \"height\": 675, \"filename\": \"1689544685.webp\", \"file_path\": \"/srv/app/public/asset/product/original/1689544685.webp\"}, \"thumbnail\": {\"width\": 200, \"height\": 150.0, \"filename\": \"1689544685.webp\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544685.webp\"}}','2023-07-14 13:14:12','2023-07-16 21:58:06',NULL),(6,'Dinning Table',40000,'<div><strong>Features</strong>: Rustic oak styling , this small oak dining table extends from 1m in length up to 1.4m, allowing you to sit 4 comfortably and up to 6 guests for occasional use. It features an easy to use butterfly leaf extension mechanism. Premium quality construction, this is a very strong and sturdy dining table that is built to last.<br><br></div><div><strong>Finish</strong>: Medium oak colour with a light satin finish lacquer that is hardwearing and maintenance free.<br><br></div><div><strong>Assembly</strong>: Minor Assembly Required: Legs simply need bolting to the table top – Delivered in 2 boxes for easy access.<br><br></div><div><strong>Dimensions</strong>: Height 780mm x Width 750mm x Closed Length 1000mm (Extended Length 1400mm).</div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544712.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544712.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544712.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544712.jpg\"}}','2023-07-14 13:26:11','2023-07-16 21:58:32',NULL),(7,'Armchair',30000,'<ul><li>Light Grey Colour Fabric</li><li>Natural Oak Colour Legs</li><li>Deep Buttoned Upholstery</li><li>Very Comfortable and Supportive</li><li>Sprung and Webbed Base for Comfort</li><li>Anti-Scratch Feet Pads</li><li>Requires Minor Assembly (legs simply bolt on to underframe)</li><li>24hr Next Day Delivery Available</li></ul><div><strong>Dimensions</strong>: H 910 x W 730 x D 800mm (Seat H 450) - See dimensions image for more specific measurements</div><div><br></div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544728.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544728.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544728.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544728.jpg\"}}','2023-07-14 13:42:25','2023-07-16 21:58:48',NULL),(8,'Office Chair',20000,'<ul><li>Black Faux Leather Fabric</li></ul><div>• Chrome Metal Base on Castors<br>• Adjustable Seat Height<br>• Adjustable Seat Tilt Tension<br>• Buttoned Scoop Back Design<br>• Chrome Studs and Ring Handle on Back<br>• Very Supportive Back Rest Design<br>• Sprung and Webbed Base for Comfort<br>• Requires Minor Assembly<br>• 24hr Next Day Delivery Available<br><br></div><div><strong>Dimensions</strong>: W 560 x D 620mm x Back Height 895 – 980mm (Seat H 505 – 590mm) - See dimensions image for additional measurements.</div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544741.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544741.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544741.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544741.jpg\"}}','2023-07-14 13:43:40','2023-07-16 21:59:02',NULL),(9,'Bar Stool',10000,'<ul><li>Silver Crushed Velvet Fabric</li><li>Black Satin Finish Legs</li><li>Buttoned Scoop Back Design</li><li>Chrome Studs &amp; Knocker Ring on Back</li><li>Very Supportive Back Rest Design</li><li>Sprung &amp; Webbed Base for Comfort</li><li>Anti-Scratch Feet Pads</li><li>Requires Minor Assembly (Leg frame screws together and then bolts to underside of seat)</li><li>24hr Next Day Delivery Available</li></ul><div><strong>Dimensions:</strong> Height: 1050mm x Width: 520mm x Depth: 560mm (Seat Height: 680mm).</div><div><br></div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544756.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544756.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544756.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544756.jpg\"}}','2023-07-14 13:44:34','2023-07-16 21:59:16',NULL),(10,'Dinning Table with 8 chairs',120000,'<div><strong>This listing is for the Solid Oak 2m Refectory Dining Table and 8 Solid Oak Ladder Back Dining Chairs.<br></strong><br></div><div><strong>Table Features</strong>: Premium Quality Solid Oak Refectory Dining Table with Natural Oak Finish. Seats 6 to 8 chairs comfortably. The table is very strong and sturdy and has a 40mm thick oak top that sits on two chunky solid oak pedestals with joining stretchers.<br><br></div><div><strong>Chair Features</strong>: The chair is constructed with premium solid oak and the seat pad is made using a dark brown bicast leather to complement the oak frame.<br><br></div><div><strong>Finish</strong>: Table and chairs have a natural oak finish. Chairs have dark brown bicast leather seat pad.<br><br></div><div><strong>Assembly</strong>: Table requires Minor Assembly (simply bolting the pedestal base frame together and then to the underside of the table top). Dining chairs require assembly.<br><br></div><div><strong>Table Dimensions: </strong>Height: 750mm x Width: 1000mm x Length: 2000mm.<br><strong>Chair Dimensions:</strong> Height: 1055mm x Width: 445mm x Depth: 515mm (seat height: 480mm).</div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544769.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544769.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544769.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544769.jpg\"}}','2023-07-14 13:46:02','2023-07-16 21:59:29',NULL),(11,'Dresser',60000,'<div><strong>Features</strong>: Premium quality medium sized glazed dresser that features a sideboard base that has two drawers over a two door cupboard with an internal shelf. The upper dresser top features two glazed doors with internal shelves and two drawers below. The light oak tops perfectly complement the inky blue painted bodies. Traditional quality construction, dovetail joints on drawers and a tapered foot design. Supplied with stylish brushed steel handles.<br><br></div><div><strong>Finish</strong>: Blue Painted Body with Light Oak Top.<br><br></div><div><strong>Assembly</strong>: Very Minor Assembly Required (Top Section just needs securing with a joining bracket to the base) - Delivered in 2 Boxes for easy access.<br><br></div><div><strong>Dimensions: </strong>Height: 2000mm x Width: 1020mm x Depth: 430mm.<br>Base: Height: 860mm x Width: 1020mm x Depth: 430mm.<br>Top: Height: 1140mm x Width: 1020mm x Depth: 340mm.</div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544789.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544789.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544789.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544789.jpg\"}}','2023-07-14 13:47:04','2023-07-16 21:59:49',NULL),(12,'Coffee Table',25000,'<div><strong>Features</strong>: Rustic oak styling , this oak coffee table features a lower shelf that is ideal for storing your books and magazines on. Premium quality with a thick solid oak frame construction, this coffee table is built to last.<br><br></div><div><strong>Finish</strong>: Medium oak colour with a light satin finish lacquer that is hardwearing and maintenance free.<br><br></div><div><strong>Assembly</strong>: Minor Assembly Required.<br><br></div><div><strong>Dimensions</strong>: H 450 x L 1000 x W 600mm.</div>','{\"original\": {\"type\": 2, \"width\": 630, \"height\": 630, \"filename\": \"1689544811.jpg\", \"file_path\": \"/srv/app/public/asset/product/original/1689544811.jpg\"}, \"thumbnail\": {\"width\": 150, \"height\": 150, \"filename\": \"1689544811.jpg\", \"file_path\": \"/srv/app/public/asset/product/thumbnail/1689544811.jpg\"}}','2023-07-14 13:49:47','2023-07-16 22:00:11',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `deleted_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `login_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@ozb.com','[\"ROLE_USER\"]','$2y$13$OFcaqhv.E4i3/5hyE7W0D.MzeCogR8zRdIAPPODPymmD.h/pnl3C2','admin','2023-07-17 07:21:08','2023-07-17 07:21:08',NULL,NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-17 17:41:13
