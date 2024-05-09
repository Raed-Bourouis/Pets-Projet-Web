-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 10:04 PM
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
-- Database: `pets`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopt`
--

CREATE TABLE `adopt` (
  `Id` int(11) NOT NULL,
  `Adult` varchar(255) DEFAULT NULL,
  `ResidenceType` varchar(255) DEFAULT NULL,
  `HomeOwnership` varchar(255) DEFAULT NULL,
  `LandlordPermission` varchar(255) DEFAULT NULL,
  `NumAdults` varchar(255) DEFAULT NULL,
  `NumMinors` varchar(255) DEFAULT NULL,
  `ReasonAdopt` varchar(255) DEFAULT NULL,
  `ObedienceTraining` varchar(255) DEFAULT NULL,
  `PriorPets` varchar(255) DEFAULT NULL,
  `PetCosts` varchar(255) DEFAULT NULL,
  `VetChoice` varchar(255) DEFAULT NULL,
  `VetRecords` varchar(255) DEFAULT NULL,
  `HomeVisit` varchar(255) DEFAULT NULL,
  `AdditionalServices` varchar(255) DEFAULT NULL,
  `Correct` varchar(255) DEFAULT NULL,
  `Petname` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Pcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopt`
--

INSERT INTO `adopt` (`Id`, `Adult`, `ResidenceType`, `HomeOwnership`, `LandlordPermission`, `NumAdults`, `NumMinors`, `ReasonAdopt`, `ObedienceTraining`, `PriorPets`, `PetCosts`, `VetChoice`, `VetRecords`, `HomeVisit`, `AdditionalServices`, `Correct`, `Petname`, `Name`, `Email`, `Phone`, `Address`, `City`, `Pcode`) VALUES
(5, 'Yes', 'Non', 'rent', 'Non', '1', NULL, 'ehgedhdh', 'Non', NULL, 'Non', 'Non', 'Non', 'Non', 'microchipping', 'Yes', 'Islem Nasri', 'Islem Nasri', 'hello@gmail.com', '12346789', 'jjbjarjbar', 'lalalalalejaelojae', '2020'),
(6, 'Yes', 'Non', 'own', 'Non', '1', NULL, 'oikrjn,hl', 'Non', NULL, 'Non', 'Non', 'Non', 'Non', 'azraar', 'Yes', 'Islem Nasri', 'Islem Nasri', 'hello22@gmail.com', '789462698', 'jjbjarjbar', 'lalalalalejaelojae', '2011');

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `id` int(3) NOT NULL,
  `age` int(2) NOT NULL,
  `description` varchar(700) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`id`, `age`, `description`, `image1`, `image2`, `image3`, `nom`) VALUES
(106, 3, 'Max is a bundle of energy and enthusiasm, always ready for adventure.\r\n                        Whether it\'s chasing balls in the backyard or going for long hikes in the great outdoors, Max is\r\n                        your go-to buddy for all things active.\r\n                        His playful demeanor and boundless spirit make him the perfect companion for anyone with an\r\n                        active lifestyle. With Max by your side,\r\n                        every day is an opportunity for fun and excitement.', 'max.png', 'max2.jpg', 'max3.jpeg', 'MAX'),
(107, 2, 'Introducing Luna, the epitome of feline grace and charm. With her sleek black fur and mesmerizing\r\n                        green eyes, Luna is a true beauty. But don\'t let her elegance fool you—this kitty has a playful\r\n                        side too! She enjoys chasing feather toys and lounging in sunny spots by the window. Luna is\r\n                        also incredibly affectionate, always seeking out head scratches and chin rubs from her human\r\n                        companions. If you\'re searching for a sophisticated yet sweet addition to your family, look no\r\n                        further than Luna. She\'ll enchant you with her purrs and steal your heart with her gentle\r\n         ', 'luna.png', 'luna2.png', 'luna3.jpg', 'LUNA'),
(108, 8, 'Bella is the epitome of sweetness and gentleness, with a heart as big as her fluffy golden coat.\r\n                        She thrives on love and affection, always eager to snuggle up on the couch for a cozy cuddle\r\n                        session. Bella\'s loyalty knows no bounds, and she\'ll stick by your side through thick and thin.\r\n                        Whether you\'re looking for a faithful friend to share your quiet moments with or a loving\r\n                        presence to greet you at the end of a long day,\r\n                        Bella is the perfect addition to your family.', 'bella.png', 'bella2.jpg', 'bella3.jpg', 'BELLA'),
(109, 1, 'Meet Sunny, the sunshine of our aviary! This vibrant yellow canary is a bundle of energy and joy,\r\n                        spreading cheer wherever he goes. With his melodious chirps and graceful flight, Sunny is a\r\n                        delight to behold. He loves perching on your shoulder and singing along to your favorite tunes.\r\n                        Sunny is also a curious explorer, always eager to investigate new toys and treats. Whether\r\n                        you\'re a seasoned bird enthusiast or a first-time owner, Sunny is sure to brighten your days\r\n                        with his chirpy personality and warm presence.\r\n                        Adopt Sunny today and let your ho', 'sunny1.png', 'sunny2.png', 'sunny3.jpg', 'SUNNY');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zip` varchar(20) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `CardNumber` varchar(50) DEFAULT NULL,
  `ExpirationDate` varchar(10) DEFAULT NULL,
  `CVV` varchar(10) DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `FullName`, `Email`, `Address`, `City`, `State`, `Zip`, `Country`, `Phone`, `PaymentMethod`, `Amount`, `CardNumber`, `ExpirationDate`, `CVV`, `OrderDate`) VALUES
(1, 'John Doe', 'john@example.com', '123 Main St', 'Anytown', 'CA', '12345', 'USA', '123-456-7890', 'card', 50.00, '1234 5678 9012 3456', '12/24', '123', '2024-05-07 23:58:40'),
(2, 'Alice Smith', 'alice@example.com', '456 Elm St', 'Othertown', 'NY', '54321', 'USA', '987-654-3210', 'cash_on_delivery', 75.00, '', '', '', '2024-05-07 23:58:40'),
(3, 'Mohamed Ahmed', 'mohamed@example.com', '789 Tunis St', 'Tunis', '', '1000', 'Tunisia', '123-456-7890', 'cash', 100.00, '', '', '', '2024-05-07 23:58:40'),
(4, 'Fatima Ben Ali', 'fatima@example.com', '10 Rue de la Liberté', 'Sousse', '', '4000', 'Tunisia', '987-654-3210', 'card', 120.00, '5432 1098 7654 3210', '09/25', '789', '2024-05-07 23:58:40'),
(5, 'Ahmed Othmani', 'ahmed@example.com', '15 Avenue Habib Bourguiba', 'Bizerte', '', '7000', 'Tunisia', '234-567-8901', 'cash_on_delivery', 90.00, '', '', '', '2024-05-07 23:58:40'),
(6, 'Nadia Ben Mustapha', 'nadia@example.com', '20 Rue Ali Belhouane', 'Monastir', '', '5000', 'Tunisia', '345-678-9012', 'card', 80.00, '8765 4321 0987 6543', '03/26', '234', '2024-05-07 23:58:40'),
(7, 'Hassan Gharbi', 'hassan@example.com', '30 Rue Habib Thameur', 'Mahdia', '', '5100', 'Tunisia', '456-789-0123', 'cash_on_delivery', 110.00, '', '', '', '2024-05-07 23:58:40'),
(8, 'Sara Khemiri', 'sara@example.com', '40 Avenue Farhat Hached', 'Nabeul', '', '8000', 'Tunisia', '567-890-1234', 'card', 95.00, '', '', '', '2024-05-07 23:58:40'),
(9, 'Islem Nasri', 'islemnasri20020627@gmail.com', '50 Rue de la République', 'Manouba', '', '2010', 'Tunisia', '123-456-7890', 'cash_on_delivery', 150.00, '', '', '', '2024-05-07 23:59:05'),
(10, 'Raed Bourouis', 'raed.bourouis@ensi-uma.tn', 'Sfax', 'Skhira', 'Sfax', '3050', 'Tunisia', '+21629082907', 'cash', 22.98, '', '', '', '2024-05-08 18:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `productPage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Name`, `Description`, `Price`, `Image`, `productPage`) VALUES
(1, 'Delicious Dog Food', 'Healthy and nutritious food for your dog.', '19.99', '../assets/product-1.png', 'productpage1.html'),
(2, 'Nutritious Cat Food', 'Rich in essential nutrients for your cat\'s health.', '14.99', '../assets/product-2.png', 'productpage2.html'),
(3, 'Healthy Bird Feed', 'A balanced diet for your pet bird\'s well-being.', '9.99', '../assets/product-3.png', 'productpage3.html'),
(4, 'Fresh Fish Food', 'High-quality food to keep your fish healthy and vibrant.', '7.99', '../assets/product-4.png', 'productpage4.html'),
(5, 'Fresh Fish Food', 'High-quality food to keep your fish healthy and vibrant.', '7.99', '../assets/product-4.png', 'productpage4.html'),
(6, 'Fresh Fish Food', 'High-quality food to keep your fish healthy and vibrant.', '7.99', '../assets/product-4.png', 'productpage4.html'),
(7, 'Fresh Fish Food', 'High-quality food to keep your fish healthy and vibrant.', '7.99', '../assets/product-4.png', 'productpage4.html'),
(8, 'Fresh Fish Food', 'High-quality food to keep your fish healthy and vibrant.', '7.99', '../assets/product-4.png', 'productpage4.html'),
(9, 'Fresh Fish Food', 'High-quality food to keep your fish healthy and vibrant.', '7.99', '../assets/product-4.png', 'productpage4.html');

-- --------------------------------------------------------

--
-- Table structure for table `surrender`
--

CREATE TABLE `surrender` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `AnimalName` varchar(255) DEFAULT NULL,
  `AnimalType` varchar(255) DEFAULT NULL,
  `Breed` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Vaccinated` varchar(255) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surrender`
--

INSERT INTO `surrender` (`Id`, `Name`, `Email`, `Phone`, `AnimalName`, `AnimalType`, `Breed`, `Gender`, `Vaccinated`, `Reason`) VALUES
(1, 'Islem Nasri', 'islemnasri71@gmail.com', '93218324', 'aeae', 'aeae', 'aeae', 'male', 'Yes', 'aeaeae');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `date_naiss` date NOT NULL,
  `role` varchar(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `pwd`, `email`, `phone`, `adresse`, `date_naiss`, `role`) VALUES
(1, 'Rayen Jenhani', '12345678', 'rayenne901@gmail.com', '+21690133343', 'Nabeul', '2002-05-25', '1'),
(5, 'Raed Bourouis', 'raedraed', 'raed.bourwis@gmail.com', '+21629082907', 'Sfax', '2003-02-18', '1'),
(14, 'raed', '123456789', 'raed.bourouis@ensi-uma.tn', '+21629052904', 'Sfax', '2024-05-23', '2');

-- --------------------------------------------------------

--
-- Table structure for table `vetforms`
--

CREATE TABLE `vetforms` (
  `fullName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `legalWork` varchar(200) NOT NULL,
  `yearsExperience` int(11) NOT NULL,
  `previousVolunteer` varchar(200) NOT NULL,
  `availability` varchar(200) NOT NULL,
  `specificExperience` varchar(200) NOT NULL,
  `Roles` varchar(200) NOT NULL,
  `otherSpecifyInput` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vetforms`
--

INSERT INTO `vetforms` (`fullName`, `email`, `phone`, `address`, `age`, `legalWork`, `yearsExperience`, `previousVolunteer`, `availability`, `specificExperience`, `Roles`, `otherSpecifyInput`) VALUES
('John Doe', 'john.doe@example.com', '+99999999999', '123 Main St, City, Country', 35, 'Yes', 10, 'Animal Shelter', 'Weekends', 'Surgery', 'Routine Medical Care', ''),
('Jane Smith', 'jane.smith@example.com', '+99999999999', '456 Elm St, City, Country', 28, 'Yes', 5, 'Local Clinic', 'Weekdays', 'Exotic Animals', 'Surgical Procedures', ''),
('Alice Johnson', 'alice.johnson@example.com', '+99999999999', '789 Oak St, City, Country', 42, 'Yes', 15, 'None', 'Flexible', 'Emergency Medicine', 'Emergency Care', ''),
('Bob Brown', 'bob.brown@example.com', '+99999999999', '321 Pine St, City, Country', 50, 'Yes', 20, 'Wildlife Rescue', 'Weekends', 'Rehabilitation', 'Behavioral Consultations and Training', ''),
('Sarah Lee', 'sarah.lee@example.com', '+99999999999', '987 Maple St, City, Country', 32, 'Yes', 8, 'Local Shelter', 'Weekends', 'Nutrition', 'Outreach and Education Programs', '');

-- --------------------------------------------------------

--
-- Table structure for table `volunteersforms`
--

CREATE TABLE `volunteersforms` (
  `fullName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `legalWork` varchar(200) NOT NULL,
  `previousVolunteer` varchar(200) NOT NULL,
  `whyInterested` varchar(200) NOT NULL,
  `availability` varchar(200) NOT NULL,
  `animalAbuseOrNeglect` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `skillsOrQualities` varchar(200) NOT NULL,
  `additionalTraining` varchar(200) NOT NULL,
  `Roles` varchar(200) NOT NULL,
  `otherSpecifyInput` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteersforms`
--

INSERT INTO `volunteersforms` (`fullName`, `email`, `phone`, `address`, `age`, `legalWork`, `previousVolunteer`, `whyInterested`, `availability`, `animalAbuseOrNeglect`, `experience`, `skillsOrQualities`, `additionalTraining`, `Roles`, `otherSpecifyInput`) VALUES
('Alice Adams', 'alice.adams@example.com', '+99999999999', '123 Main St, City, Country', 30, 'Yes', 'Animal Shelter', 'Love animals and want to give back to the community', 'Weekends', 'No', 'None', 'Compassion, patience, attention to detail', 'First aid training', 'Animal Care', 'N/A'),
('Bob Brown', 'bob.brown@example.com', '+99999999999', '456 Elm St, City, Country', 25, 'No', 'None', 'Passionate about animal welfare', 'Evenings', 'No', 'None', 'Strong work ethic, team player', 'None', 'Outreach and Education Programs', 'N/A'),
('Charlie Clark', 'charlie.clark@example.com', '+99999999999', '789 Oak St, City, Country', 35, 'Yes', 'Wildlife Rescue', 'Want to make a difference in wildlife conservation', 'Flexible', 'No', 'None', 'Good communication skills, problem-solving abilities', 'None', 'Wildlife Rehabilitation', 'N/A'),
('Diana Davis', 'diana.davis@example.com', '+99999999999', '321 Pine St, City, Country', 40, 'Yes', 'Local Clinic', 'Interested in learning more about veterinary care', 'Weekdays', 'No', 'None', 'Willingness to learn, empathy', 'Veterinary assistant training', 'Veterinary Assistance', 'N/A'),
('Eve Evans', 'eve.evans@example.com', '+99999999999', '987 Maple St, City, Country', 20, 'No', 'None', 'Love working with animals and want to help', 'Weekends', 'No', 'None', 'Enthusiastic, quick learner', 'None', 'Animal Care', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopt`
--
ALTER TABLE `adopt`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `surrender`
--
ALTER TABLE `surrender`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopt`
--
ALTER TABLE `adopt`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surrender`
--
ALTER TABLE `surrender`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
