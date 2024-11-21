-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 10:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(2) NOT NULL,
  `uid` int(2) NOT NULL,
  `pid` int(2) NOT NULL,
  `book_start` date NOT NULL,
  `book_end` date NOT NULL,
  `guests` int(2) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `time_booked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `uid`, `pid`, `book_start`, `book_end`, `guests`, `totalprice`, `time_booked`) VALUES
(12, 1, 1, '2024-04-19', '2024-04-20', 5, 15000.00, '2024-04-18 01:47:05'),
(13, 2, 3, '2024-04-20', '2024-04-21', 2, 30000.00, '2024-04-19 15:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pimage1` varchar(255) NOT NULL,
  `pimage2` varchar(255) NOT NULL,
  `pimage3` varchar(255) NOT NULL,
  `pimage4` varchar(255) NOT NULL,
  `pimage5` varchar(255) NOT NULL,
  `is_booked` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `location`, `description`, `price`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `pimage5`, `is_booked`) VALUES
(1, 'Tranquil Blue Haven', 'Miami, Florida', 'Welcome to Tranquil Blue Haven!\r\n\r\nNestled amidst lush greenery and enveloped in serene tranquility, Tranquil Blue Haven offers a cozy escape from the hustle and bustle of everyday life. This charming house rental boasts a bedroom, a spacious living area, and a fully equipped kitchen, perfect for a peaceful getaway or a small family retreat. Step outside onto the private garden, where you can unwind amidst the soothing sounds of nature or enjoy al fresco dining under the sun. With easy access to nearby hiking trails and scenic attractions, Tranquil Blue Haven promises a rejuvenating stay in the heart of nature\'s embrace. \r\n\r\nBook your peaceful retreat today and discover the beauty of relaxation.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings and Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials (Utensils and Glassware)\r\n✔ Instructions and Guides\r\n✔ First aid kits\r\n✔ Fire extinguishers\r\n✔ Free Wi-Fi\r\n✔ Netflix\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedrooms\r\n✔ Clean Bathroom\r\n✔ Living Room\r\n✔ Dining Area\r\n✔ Kitchen\r\n✔ Wi-Fi Access\r\n✔ Air-conditioning', 15000.00, 'H-1.jpg', 'BR-1.jpg', 'LR-1.jpg', 'CR-1.jpg', 'CR-2.jpg', 1),
(2, 'Cozy Corner Residence', 'Notting Hill, London', 'Welcome to Cozy Corner Residence!\r\n\r\nDiscover comfort and leisure at Cozy Corner Residence. This inviting retreat features a cozy bedroom, a well-appointed living room, a fully equipped kitchen, and a modern bathroom. But the real gem is the dedicated billiards room, perfect for friendly games or solo practice. With a private patio for outdoor relaxation and the many tourist attractions just steps away, your getaway awaits at Cozy Corner Residence! \r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings and Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Free Wi-Fi and Netflix\r\n✔ Board Games\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedrooms (Queen-Sized Beds)\r\n✔ Clean Bathroom\r\n✔ Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Billiard Table\r\n✔ Air-Conditioning', 25000.00, 'H-2.jpg', 'BR-2.jpg', 'LR-2.jpg', 'K-2.jpg', 'Billiards.jpg', 0),
(3, 'Meadowview Manor', 'Bern, Switzerland', 'Welcome to Meadowview Manor!\r\n\r\nEmbrace the serenity of Meadowview Manor, nestled amidst rolling hills and verdant forests. Inside, find comfort in the cozy living spaces, warmed by a crackling fireplace and adorned with rustic charm. Fully equipped kitchen facilities and tranquil bedrooms ensure a restful stay. Outside, the estate\'s expansive grounds invite leisurely exploration, offering panoramic views and secluded corners for contemplation. Whether lounging on the veranda or wandering winding pathways, every moment at Meadowview Manor is a journey into rustic tranquility.\r\n\r\nEscape the hustle and bustle of everyday life and immerse yourself in the timeless allure of Meadowview Manor. Book your stay today and embark on a retreat to rejuvenate mind, body, and soul amidst nature\'s embrace.\r\n\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedrooms (Queen-Sized Beds)\r\n✔ Clean Bathroom\r\n✔ Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Fire place', 30000.00, 'H-3.jpg', 'BR-3.jpg', 'LR-3.jpg', 'K-3.jpg', 'CR-3.jpg', 1),
(4, 'Serenity Sanctuary', 'Los Angeles, California', 'Welcome to Serenity Villa!\r\n\r\nThis place is a luxurious retreat nestled in the heart of Los Angeles. This elegant abode offers a seamless blend of sophistication and relaxation, complete with a sparkling pool for your enjoyment. Step inside to discover tastefully appointed living spaces adorned with timeless decor and modern amenities. From the spacious living area to the cozy bedrooms, every corner of Serenity Villa exudes warmth and elegance.\r\n\r\nIndulge in the ultimate luxury experience at Serenity Villa. Book your stay today and immerse yourself in the tranquility and sophistication of this exquisite retreat.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ Board Games\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Smoke Detectors\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedrooms (Queen-Sized Beds)\r\n✔ Clean Bathroom\r\n✔ Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Swimming Pool\r\n✔ Air-Conditioning', 30000.00, 'H-4.jpg', 'BR-4.jpg', 'LR-4.jpg', 'K-4.jpg', 'CR-4.jpg', 0),
(5, 'Vista Villa', 'Toronto, Canada', 'Welcome to Vista Villa!\r\n\r\nVista Villa is a place where relaxation meets luxury in Toronto. This charming retreat boasts cozy interiors and a sprawling pool for your enjoyment. Step inside to find inviting living spaces adorned with rustic charm and modern comforts. Whether you\'re lounging in the cozy living room or preparing meals in the fully equipped kitchen, Vista Villa offers a warm and welcoming perfect for your getaway with family or friends.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedrooms (Queen-Sized Beds)\r\n✔ Clean Bathroom\r\n✔ Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Grilling Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Swimming Pool', 25000.00, 'H-5.jpeg', 'BR-5.jpg', 'LR-K-5.jpg', 'LR-5.jpg', 'CR-5.jpg', 0),
(6, 'Sweet Escape', 'Queenstown, New Zealand', 'Welcome to Sweet Escape!\r\n\r\nSweet Escape is a luxurious getaway in Queenstown, New Zealand. This exquisite retreat offers a perfect combination of elegance and entertainment, boasting a private pool and an array of amenities. Step inside to discover beautifully appointed living spaces, where modern design meets comfort. From the spacious living area to the cozy bedrooms, Sweet Escape exudes sophistication and style. Outside, a sparkling pool beckons, surrounded by lush landscaping and ample seating areas. Dive in for a refreshing swim or unwind with a cocktail by the poolside.\r\n\r\nExperience the ultimate retreat at Sweet Escape! Book your stay today and indulge in luxury living with all the comforts of home and more.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔  Pool Toys\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 1 Bedroom (King-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Swimming Pool', 32000.00, 'H-6.jpg', 'BR-6.jpg', 'CR-6.jpg', 'K-6.jpg', 'LR-6.jpg', 0),
(7, 'Azure Springs Retreat', 'Brooklyn, New York', 'Welcome to Azure Springs Retreat!\r\n\r\nAzure Springs Retreat is a paradise nestled in Brooklyn, New York. This enchanting retreat offers the perfect blend of luxury and relaxation, promising an unforgettable tropical getaway. Step into a world of tranquility as you explore the lush surroundings and elegant accommodations. Azure Springs Retreat provides a haven for every traveler seeking serenity and comfort. Whether you\'re seeking relaxation or excitement, Azure Springs Retreat offers something for everyone.\r\n\r\nEscape to paradise at Azure Springs Retreat and immerse yourself in the beauty of modern living. Book your stay today and experience the ultimate getaway in style and comfort.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ Pool Toys\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 1 Bedroom (King-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Large Swimming Pool\r\n✔ Pet Friendly', 30000.00, 'H-7.jpg', 'BR-7.jpg', 'CR-7.jpg', 'K-7.jpg', 'LR-7.jpg', 0),
(8, 'Harmony Hideaway', 'Tuscany, Italy', 'Welcome to Harmony Hideaway!\r\n\r\nThis place is a cozy retreat nestled in the heart of Tuscany, Italy. This simple yet charming house offers a serene escape from the hustle and bustle of everyday life. Step inside to find a warm and inviting interior, where simplicity meets comfort. The living area invites you to unwind with its comfortable furnishings and rustic decor, creating a cozy atmosphere for relaxation.\r\n\r\nEscape to simplicity at Harmony Hideaway. Book your stay today and embark on a journey of relaxation and rejuvenation amidst the natural splendor of your surroundings.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedrooms (1 Queen-Sized, 1 Twin XL)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Wi-Fi Access', 15000.00, 'H-8.jpg', 'LR-8.jpg', 'BR-8.jpg', 'CR-8.jpg', 'K-8.jpg', 0),
(9, 'Pineview Cabin', 'Hokkaido, Japan', 'Welcome to Pineview Cabin!\r\n\r\nPineview Cabin is a rustic retreat nestled in the heart of wilderness. This cozy haven offers a serene escape from the modern world, inviting you to unwind and reconnect with nature. Step inside to discover a warm and inviting interior, where the scent of wood and the crackling of the fireplace create a cozy ambiance. The living area beckons with comfortable furnishings, perfect for relaxation or sharing stories around the fire.\r\n\r\nOutside, the cabin\'s surroundings beckon with their natural beauty, offering opportunities for hiking, birdwatching, or simply fishing. Whether you\'re enjoying a cup of coffee on the porch or stargazing by the fire pit, Pineview Cabin provides the perfect setting for moments of peace and reflection.\r\n\r\nEscape to rustic charm at Pineview Cabin and immerse yourself in the beauty of nature\'s embrace. Book your stay today and embark on a journey of relaxation and discovery in the wilderness.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ First-Aid Kits\r\n✔ Campfire wood\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 1 Bedroom (Queen-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area', 10000.00, 'H-9.jpg', 'BR-9.jpg', 'CR-9.jpg', 'CAMPFIRE.jpg', 'K-9.jpg', 0),
(10, 'Comfort Cove Retreat', 'Paris, France', 'Welcome to Comfort Cove Retreat!\r\n\r\nThis place is where luxury and functionality converge seamlessly. This modern abode offers a perfect blend of comfort and style in every corner. It features an inviting living room and dining area, a well-equipped kitchen, a tranquil bedroom retreat with serene views, an indoor gym for fitness enthusiasts, and a meticulously designed relaxing bathroom. \r\n\r\nComfort Cove Retreat isn\'t just a house. It\'s a haven where every detail is crafted to elevate daily living. What are you waiting for? Book now!\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n✔ Board Games\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedrooms (Queen-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Indoor Gym', 25000.00, 'H-10.jpg', 'LR-10.jpg', 'CR-10.jpg', 'BR-10.jpg', 'GYM.jpg', 0),
(11, 'Ivory Retreat', 'Cebu, Philippines', 'Welcome to Ivory Retreat!\r\n\r\n It is a cozy retreat filled with warmth and comfort. As you step inside, you\'re welcomed by a spacious living room, bathed in natural light and boasting ample space for relaxation and gatherings. The atmosphere is inviting, perfect for cozying up with loved ones or hosting intimate get-togethers. Throughout the house, comfort is key. The living spaces are adorned with plush furnishings and tasteful décor, creating a welcoming ambiance that feels like home. Whether lounging in the living room, preparing meals in the kitchen, or unwinding in the bedroom, every corner exudes a sense of comfort and tranquility.\r\n\r\nIvory Retreat may not be the grandest, but it\'s filled with warmth and charm—a true sanctuary where every part of the house is designed to make you feel right at home.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Cooking Ingredients\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 1 Bedroom (King-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Picnic ', 15000.00, 'H-11.jpg', 'BR-11.jpg', 'LR-11.jpg', 'K-11.jpg', 'CR-11.jpg', 0),
(12, 'White Haven Villa', 'Barcelona, Spain', 'Welcome to White Haven Villa!\r\n\r\nWhite Haven Villa is where tranquility meets contemporary charm in a symphony of white hues and subtle elegance. Nestled amid verdant landscapes, this unique retreat offers a sanctuary for the soul. Step through the door to discover a fusion of modern design and timeless sophistication. From the airy living spaces bathed in natural light to the secluded outdoor oasis, every corner of White Haven Villa beckons you to unwind and embrace the beauty of simplicity. Whether you\'re savoring moments of quiet reflection or hosting gatherings under the stars, this villa promises an unforgettable escape where serenity reigns supreme. Welcome to your own slice of paradise at White Haven Villa.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n✔ Reading Books\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedroom (Queen-Sized Bed)\r\n✔ Clean Bathroom\r\n✔  Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Garage', 25000.00, 'H-12.jpg', 'LR-12.jpg', 'BR-12.jpg', 'CR-12.jpg', 'K-12.jpg', 0),
(13, 'Cape Breeze ', 'Cape Town, South Africa', 'Welcome to Cape Breeze!\r\n\r\nIntroducing Cape Breeze, a cozy coastal retreat in the heart of Cape Town. This charming and humble abode offers a perfect blend of comfort and serenity, where gentle breezes and ocean views greet you. Step inside to discover light-filled spaces adorned with coastal-inspired décor, inviting you to relax and unwind. Whether you\'re lounging in the airy living area or enjoying alfresco dining on the sun-drenched patio, Cape Breeze provides an idyllic escape for your Cape Town adventure. Welcome to your sanctuary at Cape Breeze.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 1 Bedroom (Queen-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Wi-Fi Access\r\n✔ Air-Conditioning', 8000.00, 'H-13.jpg', 'LR-13.jpg', 'BR-13.jpg', 'CR-13.jpg', 'K-13.jpg', 0),
(14, 'Celestial Solitude Villa', 'Manila, Philippines', 'Welcome to Celestial Solitude Villa!\r\n\r\nThis is a hidden gem that  offers a unique retreat nestled in nature\'s embrace. With elegant interiors and spacious living areas, this sanctuary invites guests to unwind in tranquility. The highlight is a shimmering pool, creating an oasis for relaxation. Each room provides a haven for rest, with thoughtful accents adding to the ambiance. At Celestial Solitude Villa, guests embark on a serene journey, where earthly cares fade away, leaving only the peaceful beauty of the surroundings.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 1 Bedroom (King-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Pet Friendly\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Swimming Pool', 20000.00, 'H-14.jpg', 'LR-14.jpg', 'BR-14.jpg', 'CR-14.jpg', 'K-14.jpg', 0),
(15, 'Radiant Reverie Villa', 'Seoul, South Korea', 'Welcome to Radiant Reverie Villa!\r\n\r\nRadiant Reverie Villa is a haven of tranquility and relaxation set against a backdrop of natural beauty. This enchanting retreat offers a blend of modern elegance and serene charm, inviting guests to indulge in moments of rejuvenation and bliss. It has a shimmering pool which invites you to immerse yourself in its refreshing waters and soak up the sun\'s warm rays. Furthermore, it has a private sauna where you can unwind and rejuvenate your body and mind in soothing warmth. Whether you\'re lounging by the pool, unwinding in the sauna, or enjoying the peaceful ambiance of the indoor living spaces, Radiant Reverie Villa promises an unforgettable escape, where every moment is a celebration of tranquility and serenity. Welcome to your radiant retreat.\r\n\r\n=========== INCLUSIONS ===========\r\n✔ Beddings And Linens\r\n✔ Bathroom Supplies\r\n✔ Cleaning Supplies\r\n✔ Kitchen Essentials\r\n✔ Kitchen Appliances\r\n✔ Free Wi-Fi And Netflix\r\n✔ Pool Toys\r\n✔ First-Aid Kits\r\n✔ Fire Extinguishers\r\n✔ Barbeque Grill\r\n✔ Wine\r\n\r\n=========ACCOMODATIONS =========\r\n✔ 2 Bedroom (Queen-Sized Bed)\r\n✔ Clean Bathroom\r\n✔ Large Living Room\r\n✔ Kitchen\r\n✔ Dining Area\r\n✔ Fast Wi-Fi\r\n✔ Air-Conditioning\r\n✔ Swimming Pool\r\n✔ Sauna', 28000.00, 'H-15.jpg', 'B-15.jpg', 'CR-15.jpg', 'K-15.jpg', 'SAUNA.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fName` varchar(128) NOT NULL,
  `lName` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `profilePic` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fName`, `lName`, `email`, `password_hash`, `phone_num`, `profilePic`, `admin`) VALUES
(1, 'Admin', 'Account', 'adminarea@yahoo.com', '$2y$10$OWD0LrjxqCia26ChpbBakOK.7XAcqAHqszNEBpbN1VeAzv8MTQW8C', '09123456789', 'Account_66180a04604d81.29454569.jpg', 1),
(2, 'Almina', 'Tanglao', 'atanglao@gmail.com', '$2y$10$v9bh./ET1h/HStqwcColm.84xl0bjciU.kI0mh2/4oYcfcgS/L2n2', '09123456789', 'Tanglao_6615341b4427f9.73907516.jpg', 0),
(3, 'Reuel', 'Sundiam', 'rcgs_21@yahoo.com', '$2y$10$gZYBjkPpMFI0LT9JsIhOhOhLJN13TuXbgtxqP8C/z/m6x1PpOTE/W', '09123456789', 'default.jpg', 0),
(4, 'Ethan', 'Gonzales', 'ejgonzales@gmail.com', '$2y$10$jzGl/shBSw7xykZgJpQdr.4kBb87qStXkOWdTUcnjmzDNrFuLZsJG', '09123456789', 'default.jpg', 0),
(5, 'Abby', 'Dizon', 'acdizon@gmail.com', '$2y$10$jzGl/shBSw7xykZgJpQdr.4kBb87qStXkOWdTUcnjmzDNrFuLZsJG', '09123456789', 'default.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`) USING BTREE;

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `property` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
