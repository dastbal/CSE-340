-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 01:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `phpmotors`
--
-- --------------------------------------------------------
--
-- Table structure for table `carclassification`
--
CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `carclassification`
--
INSERT INTO `carclassification` (`classificationId`, `classificationName`)
VALUES (1, 'SUV'),
  (2, 'Classic'),
  (3, 'Sports'),
  (4, 'Trucks'),
  (5, 'Used');
-- --------------------------------------------------------
--
-- Table structure for table `clients`
--
CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1', '2', '3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `clients`
--
INSERT INTO `clients` (
    `clientId`,
    `clientFirstname`,
    `clientLastname`,
    `clientEmail`,
    `clientPassword`,
    `clientLevel`,
    `comment`
  )
VALUES (
    12,
    'Admin',
    'User',
    'admin@cse340.net',
    '$2y$10$JsZBpmn6nJJ8pPc5P9tfTe/rSmbMCIz1Wtz2Fr8PmlKuGYDKgCbkW',
    '3',
    NULL
  ),
  (
    13,
    'david',
    'steven',
    '1',
    '$2y$10$guq.sn27C2y3ACrdPrL/VOBUXN8D0PUmawVXe/ruEAp2Lmqz4LUHG',
    '1',
    NULL
  ),
  (
    14,
    'jose',
    'lopes',
    'jose@gmail.com',
    '$2y$10$Gig9zQA1MQS3GTkdpCrhjuHejBcbrRKkne3qPDGzqtzDZA2bff/ii',
    '3',
    NULL
  ),
  (
    15,
    'review',
    'r',
    'r@gmail.com',
    '$2y$10$L7OE0CT2/qRsvf6etqnMz.mhMdBP3Kx54wxbxjlxqkbG8Vk8zFYZW',
    '3',
    NULL
  ),
  (
    16,
    'd@.com',
    'David@954',
    'd@s.com',
    '$2y$10$W.lH6a7Clx1plw/5k3swqOeyC0zBIuniOKI94kI8WhnSZ2rQ.l0Hy',
    '3',
    NULL
  ),
  (
    17,
    'David',
    'Balladares',
    'davidxsteven@gmail.com',
    '$2y$10$wnsjIBaOTjJ9o3PzY1X4tuzcg51jO5MeEy62y4APjHwmBYMStzpOu',
    '3',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `images`
--
CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` varchar(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(4) NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `images`
--
INSERT INTO `images` (
    `imgId`,
    `invId`,
    `imgName`,
    `imgPath`,
    `imgDate`,
    `imgPrimary`
  )
VALUES (
    21,
    1,
    'wrangler.jpg',
    '/phpmotors/images/vehicle/wrangler.jpg',
    '2021-07-03 04:36:11',
    1
  ),
  (
    22,
    1,
    'wrangler-tn.jpg',
    '/phpmotors/images/vehicle/wrangler-tn.jpg',
    '2021-07-03 04:36:11',
    1
  ),
  (
    23,
    10,
    'camaro.jpg',
    '/phpmotors/images/vehicle/camaro.jpg',
    '2021-07-03 04:42:20',
    1
  ),
  (
    24,
    10,
    'camaro-tn.jpg',
    '/phpmotors/images/vehicle/camaro-tn.jpg',
    '2021-07-03 04:42:21',
    1
  ),
  (
    25,
    12,
    'hummer.jpg',
    '/phpmotors/images/vehicle/hummer.jpg',
    '2021-07-03 04:43:06',
    1
  ),
  (
    26,
    12,
    'hummer-tn.jpg',
    '/phpmotors/images/vehicle/hummer-tn.jpg',
    '2021-07-03 04:43:06',
    1
  ),
  (
    27,
    24,
    'delorean.jpg',
    '/phpmotors/images/vehicle/delorean.jpg',
    '2021-07-03 04:47:40',
    1
  ),
  (
    28,
    24,
    'delorean-tn.jpg',
    '/phpmotors/images/vehicle/delorean-tn.jpg',
    '2021-07-03 04:47:40',
    1
  ),
  (
    31,
    2,
    'model-t.jpg',
    '/phpmotors/images/vehicle/model-t.jpg',
    '2021-07-03 04:54:19',
    1
  ),
  (
    32,
    2,
    'model-t-tn.jpg',
    '/phpmotors/images/vehicle/model-t-tn.jpg',
    '2021-07-03 04:54:19',
    1
  ),
  (
    33,
    3,
    'adventador.jpg',
    '/phpmotors/images/vehicle/adventador.jpg',
    '2021-07-03 04:55:06',
    1
  ),
  (
    34,
    3,
    'adventador-tn.jpg',
    '/phpmotors/images/vehicle/adventador-tn.jpg',
    '2021-07-03 04:55:06',
    1
  ),
  (
    35,
    4,
    'monster-truck.jpg',
    '/phpmotors/images/vehicle/monster-truck.jpg',
    '2021-07-03 04:55:36',
    1
  ),
  (
    36,
    4,
    'monster-truck-tn.jpg',
    '/phpmotors/images/vehicle/monster-truck-tn.jpg',
    '2021-07-03 04:55:36',
    1
  ),
  (
    37,
    5,
    'mechanic.jpg',
    '/phpmotors/images/vehicle/mechanic.jpg',
    '2021-07-03 04:56:13',
    1
  ),
  (
    38,
    5,
    'mechanic-tn.jpg',
    '/phpmotors/images/vehicle/mechanic-tn.jpg',
    '2021-07-03 04:56:13',
    1
  ),
  (
    39,
    6,
    'bat.jpg',
    '/phpmotors/images/vehicle/bat.jpg',
    '2021-07-03 04:58:08',
    1
  ),
  (
    40,
    6,
    'bat-tn.jpg',
    '/phpmotors/images/vehicle/bat-tn.jpg',
    '2021-07-03 04:58:08',
    1
  ),
  (
    41,
    7,
    'mystery-van.jpg',
    '/phpmotors/images/vehicle/mystery-van.jpg',
    '2021-07-03 04:58:42',
    1
  ),
  (
    42,
    7,
    'mystery-van-tn.jpg',
    '/phpmotors/images/vehicle/mystery-van-tn.jpg',
    '2021-07-03 04:58:42',
    1
  ),
  (
    43,
    9,
    'crwn-vic.jpg',
    '/phpmotors/images/vehicle/crwn-vic.jpg',
    '2021-07-03 04:59:25',
    1
  ),
  (
    44,
    9,
    'crwn-vic-tn.jpg',
    '/phpmotors/images/vehicle/crwn-vic-tn.jpg',
    '2021-07-03 04:59:25',
    1
  ),
  (
    45,
    11,
    'escalade.jpg',
    '/phpmotors/images/vehicle/escalade.jpg',
    '2021-07-03 04:59:54',
    1
  ),
  (
    46,
    11,
    'escalade-tn.jpg',
    '/phpmotors/images/vehicle/escalade-tn.jpg',
    '2021-07-03 04:59:54',
    1
  ),
  (
    47,
    13,
    'aerocar.jpg',
    '/phpmotors/images/vehicle/aerocar.jpg',
    '2021-07-03 05:01:06',
    1
  ),
  (
    48,
    13,
    'aerocar-tn.jpg',
    '/phpmotors/images/vehicle/aerocar-tn.jpg',
    '2021-07-03 05:01:06',
    1
  ),
  (
    49,
    8,
    'fire-truck.jpg',
    '/phpmotors/images/vehicle/fire-truck.jpg',
    '2021-07-03 05:01:56',
    1
  ),
  (
    50,
    8,
    'fire-truck-tn.jpg',
    '/phpmotors/images/vehicle/fire-truck-tn.jpg',
    '2021-07-03 05:01:56',
    1
  ),
  (
    52,
    6,
    'bat1-tn.jpg',
    '/phpmotors/images/vehicle/bat1-tn.jpg',
    '2021-07-03 05:12:41',
    0
  ),
  (
    54,
    6,
    'bat2-tn.jpg',
    '/phpmotors/images/vehicle/bat2-tn.jpg',
    '2021-07-03 05:21:19',
    0
  ),
  (
    55,
    10,
    'camaro1.jpg',
    '/phpmotors/images/vehicle/camaro1.jpg',
    '2021-07-03 05:25:21',
    0
  ),
  (
    56,
    10,
    'camaro1-tn.jpg',
    '/phpmotors/images/vehicle/camaro1-tn.jpg',
    '2021-07-03 05:25:21',
    0
  ),
  (
    57,
    10,
    'camaro2.jpg',
    '/phpmotors/images/vehicle/camaro2.jpg',
    '2021-07-03 05:25:36',
    0
  ),
  (
    58,
    10,
    'camaro2-tn.jpg',
    '/phpmotors/images/vehicle/camaro2-tn.jpg',
    '2021-07-03 05:25:36',
    0
  ),
  (
    60,
    3,
    'adventador1-tn.jpg',
    '/phpmotors/images/vehicle/adventador1-tn.jpg',
    '2021-07-03 05:27:14',
    0
  ),
  (
    62,
    3,
    'adventador2-tn.jpg',
    '/phpmotors/images/vehicle/adventador2-tn.jpg',
    '2021-07-03 05:27:33',
    0
  );
-- --------------------------------------------------------
--
-- Table structure for table `inventory`
--
CREATE TABLE `inventory` (
  `invId` int(11) UNSIGNED NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10, 0) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `inventory`
--
INSERT INTO `inventory` (
    `invId`,
    `invMake`,
    `invModel`,
    `invDescription`,
    `invImage`,
    `invThumbnail`,
    `invPrice`,
    `invStock`,
    `invColor`,
    `classificationId`
  )
VALUES (
    1,
    'Jeep ',
    'Wrangler',
    'The Jeep Wrangler is small and compact with enough power to get you where you want to go. Its great for everyday driving as well as offroading weather that be on the the rocks or in the mud!',
    '/phpmotors/images/vehicle/wrangler.jpg',
    '/phpmotors/images/vehicle/wrangler-tn.jpg',
    '28045',
    4,
    'Orange',
    1
  ),
  (
    2,
    'Ford',
    'Model T',
    'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want as long as it&#39;s black.',
    '/phpmotors/images/vehicle/model-t.jpg',
    '/phpmotors/images/vehicle/model-t-tn.jpg',
    '30000',
    2,
    'Black',
    2
  ),
  (
    3,
    'Lamborghini',
    'Adventador',
    'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ',
    '/phpmotors/images/vehicle/adventador.jpg',
    '/phpmotors/images/vehicle/adventador-tn.jpg',
    '417650',
    1,
    'Blue',
    3
  ),
  (
    4,
    'Monster',
    'Truck',
    'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.',
    '/phpmotors/images/vehicle/monster-truck.jpg',
    '/phpmotors/images/vehicle/monster-truck-tn.jpg',
    '150000',
    3,
    'purple',
    4
  ),
  (
    5,
    'Mechanic',
    'Special',
    'Not sure where this car came from. however with a little tlc it will run as good a new.',
    '/phpmotors/images/vehicle/mechanic.jpg',
    '/phpmotors/images/vehicle/mechanic-tn.jpg',
    '100',
    200,
    'Rust',
    5
  ),
  (
    6,
    'Batmobile',
    'Custom',
    'Ever want to be a super hero? now you can with the batmobile. This car allows you to switch to bike mode allowing you to easily maneuver through trafic during rush hour.',
    '/phpmotors/images/vehicle/bat.jpg',
    '/phpmotors/images/vehicle/bat-tn.jpg',
    '65000',
    2,
    'Black',
    3
  ),
  (
    7,
    'Mystery',
    'Machine',
    'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.',
    '/phpmotors/images/vehicle/mystery-van.jpg',
    '/phpmotors/images/vehicle/mystery-van-tn.jpg',
    '10000',
    12,
    'Green',
    1
  ),
  (
    8,
    'Spartan',
    'Fire Truck',
    'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.',
    '/phpmotors/images/vehicle/fire-truck.jpg',
    '/phpmotors/images/vehicle/fire-truck-tn.jpg',
    '50000',
    2,
    'Red',
    4
  ),
  (
    9,
    'Ford',
    'Crown Victoria',
    'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.',
    '/phpmotors/images/vehicle/crwn-vic.jpg',
    '/phpmotors/images/vehicle/crwn-vic-tn.jpg',
    '10000',
    5,
    'White',
    5
  ),
  (
    10,
    'Chevy',
    'Camaro',
    'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!',
    '/phpmotors/images/vehicle/camaro.jpg',
    '/phpmotors/images/vehicle/camaro-tn.jpg',
    '25000',
    10,
    'Silver',
    3
  ),
  (
    11,
    'Cadilac',
    'Escalade',
    'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.',
    '/phpmotors/images/vehicle/escalade.jpg',
    '/phpmotors/images/vehicle/escalade-tn.jpg',
    '75195',
    4,
    'Black',
    1
  ),
  (
    12,
    'GM',
    'Hummer',
    'Do you have 6 kids and like to go offroading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.',
    '/phpmotors/images/vehicle/hummer.jpg',
    '/phpmotors/images/vehicle/hummer-tn.jpg',
    '58800',
    5,
    'Yellow',
    5
  ),
  (
    13,
    'Aerocar International',
    'Aerocar',
    'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!',
    '/phpmotors/images/vehicle/aerocar.jpg',
    '/phpmotors/images/vehicle/aerocar-tn.jpg',
    '1000000',
    6,
    'Red',
    2
  ),
  (
    14,
    'FBI',
    'Survalence Van',
    'do you like police shows? You\'ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. ',
    '/phpmotors/images/vehicle/fbi.jpg',
    '/phpmotors/images/vehicle/fbi-tn.jpg',
    '20000',
    1,
    'Green',
    1
  ),
  (
    15,
    'Dog ',
    'Car',
    'Do you like dogs? Well this car is for you straight from the 90s from Aspen, Colorado we have the orginal Dog Car complete with fluffy ears.  ',
    '/phpmotors/images/vehicle/dog.png',
    '/phpmotors/images/vehicle/dog-tn.png',
    '35000',
    1,
    'Brown',
    2
  ),
  (
    24,
    'DMC',
    'DeLorean',
    'DMC DeLorean',
    '/phpmotors/images/vehicle/delorean.jpg',
    '/phpmotors/images/vehicle/delorean-tn.jpg',
    '100000',
    1,
    'gray',
    2
  );
-- --------------------------------------------------------
--
-- Table structure for table `reviews`
--
CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `reviews`
--
INSERT INTO `reviews` (
    `reviewId`,
    `reviewText`,
    `reviewDate`,
    `invId`,
    `clientId`
  )
VALUES (
    4,
    'mi first review saved',
    '2021-07-09 22:53:40',
    10,
    15
  ),
  (
    5,
    'me second review',
    '2021-07-09 22:55:31',
    10,
    15
  ),
  (6, 'hola', '2021-07-10 02:03:02', 1, 15),
  (
    7,
    'This car is Amazing',
    '2021-07-10 02:16:48',
    10,
    16
  ),
  (
    8,
    'This car is so fast',
    '2021-07-10 02:50:05',
    3,
    17
  ),
  (
    10,
    'This car can fly',
    '2021-07-10 02:54:11',
    13,
    17
  ),
  (
    12,
    'This is my favorite Car because I like',
    '2021-07-10 05:33:31',
    7,
    17
  ),
  (16, 'I want it.', '2021-07-10 18:45:10', 7, 17),
  (
    19,
    'This is a big car.',
    '2021-07-10 18:56:03',
    4,
    17
  );
--
-- Indexes for dumped tables
--
--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
ADD PRIMARY KEY (`classificationId`);
--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
ADD PRIMARY KEY (`clientId`);
--
-- Indexes for table `images`
--
ALTER TABLE `images`
ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_images` (`invId`);
--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);
--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 19;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 18;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 63;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `invId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 25;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 20;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `images`
--
ALTER TABLE `images`
ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);
--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;