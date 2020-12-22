-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 08:44 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, 'Saurav Khatiwada', 'admin@claybrook.com', '$2y$10$HuvTjVQrYZJtOwTGaal6SOhWemcL4eC6BuiwdOBafkxSgCx5NzYbm');

-- --------------------------------------------------------

--
-- Table structure for table `amphibian`
--

CREATE TABLE `amphibian` (
  `animal_id` int(11) NOT NULL,
  `rep_type` varchar(255) NOT NULL,
  `clutch_size` double NOT NULL,
  `num_offspring` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amphibian`
--

INSERT INTO `amphibian` (`animal_id`, `rep_type`, `clutch_size`, `num_offspring`) VALUES
(30, 'hkhkj', 89, 89);

-- --------------------------------------------------------

--
-- Table structure for table `animalimages`
--

CREATE TABLE `animalimages` (
  `img_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `archive_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animalimages`
--

INSERT INTO `animalimages` (`img_id`, `animal_id`, `img`, `archive_status`) VALUES
(3, 26, 'cuba-8234.jpg', 'No'),
(4, 26, 'Krachan.jpg', 'No'),
(5, 28, 'Elephant.jpg', 'No'),
(6, 28, 'Two_Elephants.jpg', 'No'),
(7, 27, 'snake-close-up_1600.jpg', 'No'),
(8, 29, '1200px-Chaetodon_ephippium_PLW_edit.jpg', 'No'),
(9, 29, '1280-487343280-angelfish.jpg', 'No'),
(13, 30, 'rqoDpnCCrdpGFHM6qky3rS-1200-80.jpg', 'No'),
(16, 27, 'snake-mamba-green-mamba-toxic-38268.jpeg', 'No'),
(17, 30, 'GettyImages-175174320-581251b65f9b58564ccaffe2.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `species_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `avg_lifespan` varchar(255) NOT NULL,
  `species_category` int(11) NOT NULL,
  `dietary_req` varchar(255) NOT NULL,
  `natural_habitat` varchar(255) NOT NULL,
  `pop_dist` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `archived` enum('Yes','No') NOT NULL DEFAULT 'No',
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `nick_name`, `species_name`, `dob`, `gender`, `avg_lifespan`, `species_category`, `dietary_req`, `natural_habitat`, `pop_dist`, `join_date`, `height`, `weight`, `description`, `archived`, `location_id`) VALUES
(26, 'Birds', 'Eagle', '2020-04-28', 'F', '10 years', 7, 'Insects', 'Trees', 'Around', '2020-04-27', 64, 52, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'No', 1),
(27, 'Reptile', 'Snakey', '2020-04-21', 'M', 'xna,n', 6, 'nasmn', 's,an,', 'ns,an', '2020-05-04', 145, 5485, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'No', 1),
(28, 'Mammal', 'mams', '2020-04-13', 'M', 'jdslk', 5, 'kjlsadslk', 'dksa;', 'k;lda', '2020-04-29', 45, 545, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'No', 1),
(29, 'Fish', 'hkhjk', '2020-04-29', 'M', 'hkh', 3, 'kjlsadslk', 'utytu', 'lhlk', '2020-04-30', 45, 79, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'No', 3),
(30, 'Amphibian', 'jgjk', '2020-04-05', 'M', 'jjgyjgq2', 4, 'yoi', 'hjgj', 'hkjk', '2020-04-21', 89, 45, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `animal_of_the_week`
--

CREATE TABLE `animal_of_the_week` (
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_of_the_week`
--

INSERT INTO `animal_of_the_week` (`animal_id`) VALUES
(26);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `a_id` int(11) NOT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `applicant_email` varchar(255) NOT NULL,
  `applicant_number` varchar(255) NOT NULL,
  `applicant_cv` varchar(255) NOT NULL,
  `v_id` int(11) NOT NULL,
  `application_status` enum('Accepted','Rejected','Onprocess') NOT NULL DEFAULT 'Onprocess'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`a_id`, `applicant_name`, `applicant_email`, `applicant_number`, `applicant_cv`, `v_id`, `application_status`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '98600986564', 'cv.csv', 1, 'Accepted'),
(2, 'nfsdnfq', 'klsnklfn', 'kskfsfs', 'cv.csv', 15, 'Accepted'),
(3, 'skljsd', 'kljslkd', 'kjklsd', 'cv.csv', 17, 'Rejected'),
(6, 'riwpeirpw', 'jdasj@gmail.coj', 'fdapdoaispod', 'cv.csv', 1, 'Rejected'),
(7, 'JOhn Dow', 'johndoe@gamial.com', '565656', 'cv.csv', 1, 'Onprocess');

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `animal_id` int(11) NOT NULL,
  `nest_const` varchar(255) NOT NULL,
  `clutch_size` int(11) NOT NULL,
  `wingspan` double NOT NULL,
  `flying_ability` enum('Yes','No') NOT NULL,
  `color_variant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`animal_id`, `nest_const`, `clutch_size`, `wingspan`, `flying_ability`, `color_variant`) VALUES
(26, 'Fire', 87, 26, 'Yes', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE `classification` (
  `classif_id` int(11) NOT NULL,
  `classif_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`classif_id`, `classif_name`) VALUES
(3, 'Fish'),
(4, 'Amphibian'),
(5, 'Mammals'),
(6, 'Reptiles'),
(7, 'Birds');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(11) NOT NULL,
  `e_title` varchar(255) NOT NULL,
  `e_description` longtext NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `archive_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `e_title`, `e_description`, `date`, `image`, `archive_status`) VALUES
(5, 'Event 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-06-09', 'PeacockWide.jpg', 'No'),
(6, 'Event 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-06-16', 'PeacockWide.jpg', 'No'),
(7, 'Event 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-06-17', 'PeacockWide.jpg', 'No'),
(8, 'Event 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-06-16', 'PeacockWide.jpg', 'No'),
(9, 'Event 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-06-17', 'PeacockWide.jpg', 'No'),
(10, 'Event 6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-06-30', 'PeacockWide.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `read_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `message`, `date`, `read_status`) VALUES
(1, 'Over Khanal', 'over@g,aill.com', 'ajsdklajlkda', '2020-07-22', 'Yes'),
(2, 'Ghover khanal', 'jdsaj@gmail.com', 'ljhalkhdasd\r\n\r\n', '2020-07-28', 'Yes'),
(3, 'jdaksj', 'jljlk@gmail.com', 'sdoapidpoas', '2020-07-03', 'No'),
(5, 'dskfosko', 'oikdsopp@gmail.cpm', '[padp[a', '2020-07-03', 'No'),
(6, 'Kabir Khatwiada', 'jdsakj@gmail.com', 'k;kda;dk;a', '2020-07-03', 'Yes'),
(7, 'Ok Ok', 'ok@gmail.com', 'ksd;sada', '2020-07-05', 'Yes'),
(8, 'ska;ad;', 'ksal@gmail.com', 'kdsa;lda', '2020-07-05', 'No'),
(9, 'ska;ad;', 'ksal@gmail.com', 'kdsa;lda', '2020-07-05', 'No'),
(10, 'l;skda;l', 'poo@hi.cm', 'kdsa;ldas', '2020-07-05', 'Yes'),
(11, 'djsaldj', 'soobash@mgpil.com', 'jlkjelkjlkaes', '2020-07-05', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `animal_id` int(11) NOT NULL,
  `body_temp` double NOT NULL,
  `water_type` varchar(255) NOT NULL,
  `color_variant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`animal_id`, `body_temp`, `water_type`, `color_variant`) VALUES
(29, 45, '78', 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `archive_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `archive_status`) VALUES
(1, 'Aviary', 'No'),
(2, 'Hothouse', 'No'),
(3, 'Aquarium', 'No'),
(4, 'Cages/Compound/Mental Hospital', 'Yes'),
(5, 'Purgotary', 'No'),
(6, 'Random', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `mammals`
--

CREATE TABLE `mammals` (
  `animal_id` int(11) NOT NULL,
  `gast_period` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `avg_btemp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mammals`
--

INSERT INTO `mammals` (`animal_id`, `gast_period`, `category`, `avg_btemp`) VALUES
(28, '293', 'random', 89);

-- --------------------------------------------------------

--
-- Table structure for table `reptiles`
--

CREATE TABLE `reptiles` (
  `animal_id` int(11) NOT NULL,
  `rep_type` varchar(255) NOT NULL,
  `clutch_size` double NOT NULL,
  `num_offspring` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reptiles`
--

INSERT INTO `reptiles` (`animal_id`, `rep_type`, `clutch_size`, `num_offspring`) VALUES
(27, 'random', 78, 88);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sp_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `com_address` varchar(255) NOT NULL,
  `com_contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '1',
  `signed_status` enum('Yes','No') NOT NULL DEFAULT 'No',
  `archived_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sp_id`, `company_name`, `client_name`, `com_address`, `com_contact`, `email`, `password`, `signed_status`, `archived_status`) VALUES
(4, 'lkmklds', 'Kabir Khatiwada', 'skldjskld', 'dksdks', 'kabir@gmail.com', '$2y$10$AAb8ktuu/sKFBNOd/pWgReOSUf8vdcT.jSda1f6i5vAJHwHSQK6GG', 'Yes', 'No'),
(5, 'dsds', 'Sponsor', 'kdjklsj', '6698676', 'sponsor@claybrook.com', '$2y$10$AAb8ktuu/sKFBNOd/pWgReOSUf8vdcT.jSda1f6i5vAJHwHSQK6GG', 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship_price`
--

CREATE TABLE `sponsorship_price` (
  `sp_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `sponsor_band` enum('A','B','C','D','E') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsorship_price`
--

INSERT INTO `sponsorship_price` (`sp_id`, `animal_id`, `sponsor_band`) VALUES
(6, 26, 'A'),
(7, 27, 'B'),
(8, 28, 'C'),
(9, 29, 'D'),
(10, 30, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_animals`
--

CREATE TABLE `sponsor_animals` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `started_from` date NOT NULL,
  `valid_till` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `redirect_link` varchar(255) NOT NULL,
  `approved_status` enum('Yes','No','OnProgress') NOT NULL DEFAULT 'OnProgress',
  `complete_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor_animals`
--

INSERT INTO `sponsor_animals` (`id`, `animal_id`, `sp_id`, `started_from`, `valid_till`, `image`, `redirect_link`, `approved_status`, `complete_status`) VALUES
(2, 27, 5, '2020-06-06', '2021-06-06', 'zoologo.jpg', 'https://en.wikipedia.org/wiki/Northampton', 'Yes', 'No'),
(3, 26, 5, '2020-06-09', '2020-06-16', 'zoologo.jpg', 'www.kl.com', 'No', 'No'),
(4, 26, 5, '2020-06-21', '2020-06-30', 'EUGyqoWU0AAmay4.jpg', 'www.ok.com', 'OnProgress', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('Manager','Zoo Keeper') NOT NULL,
  `archive_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `name`, `email`, `password`, `type`, `archive_status`) VALUES
(2, 'Zookeeper', 'zookeeper@claybrook.com', '$2y$10$PnHm4DzjOQDB1dN/cKbI0OwoFqIm/fk6AXD07sZgqxoSe7Jyuv/yG', 'Zoo Keeper', 'No'),
(3, 'Kabir Khatiwada', 'kabir@claybrook.com', '$2y$10$mXXDkVOMwfaMPmVlmObvYeOV59YXDwsnYxdJ4Q2x6NkIG2bpHeEc6', 'Manager', 'No'),
(4, 'Over', 'over@claybrook.com', '$2y$10$mXXDkVOMwfaMPmVlmObvYeOV59YXDwsnYxdJ4Q2x6NkIG2bpHeEc6', 'Manager', 'No'),
(5, 'John Doe', 'johndoezookeeper@claybrook.com', '$2y$10$p9/rwuxvVvpT3c.ux0rusO2slfRRIvudcvnLdk7xx..F31KEF55Pu', 'Zoo Keeper', 'No'),
(6, 'Zoo Manager', 'manager@claybrook.com', '$2y$10$/jhMRoi68/bO2sUMU9f.GelhYsucs24EmiKr4Xls8uaiP.zqMGN5a', 'Manager', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_booking`
--

CREATE TABLE `ticket_booking` (
  `id` int(11) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `no_child_tickets` int(11) DEFAULT NULL,
  `no_adult_tickets` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_booking`
--

INSERT INTO `ticket_booking` (`id`, `buyer_email`, `no_child_tickets`, `no_adult_tickets`, `date`) VALUES
(18, 'travis@gmail.com', 5, 6, '2020-07-23'),
(23, 'florida@gmail.com', 0, 10, '2020-07-22'),
(24, 'hsakjdha@gmail.com', 1, 0, '2020-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `v_id` int(11) NOT NULL,
  `v_position` varchar(255) NOT NULL,
  `v_description` longtext NOT NULL,
  `v_type` enum('Temporary','Permanent') NOT NULL,
  `v_valid_from` date NOT NULL,
  `v_valid_till` date NOT NULL,
  `archive_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`v_id`, `v_position`, `v_description`, `v_type`, `v_valid_from`, `v_valid_till`, `archive_status`) VALUES
(1, 'What position', 'jdiosajdoiaso', 'Permanent', '2020-04-14', '2020-04-16', 'No'),
(15, 'nsajkadna', 'kjsdhask', 'Temporary', '2020-04-13', '2020-04-20', 'No'),
(16, 'sfdsk', 'kdaskl', 'Temporary', '2020-04-13', '2020-04-20', 'Yes'),
(17, 'djalk', 'kjklawj', 'Temporary', '2020-04-21', '2020-04-20', 'No'),
(19, 'Experiment', 'Yes you can!dsk', 'Permanent', '2020-04-16', '2020-04-30', 'No'),
(20, 'clkl;k', 'KDAKS;L', 'Permanent', '2020-04-14', '2020-04-22', 'No'),
(21, 'random', 'random', 'Permanent', '2020-07-21', '2020-07-30', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `w_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `w_condition` longtext NOT NULL,
  `w_severity` enum('1','2','3','4','5') NOT NULL,
  `complete_status` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`w_id`, `animal_id`, `w_condition`, `w_severity`, `complete_status`) VALUES
(6, 28, 'Thhuslk;l', '3', 'Yes'),
(7, 28, 'Losjka', '5', 'Yes'),
(8, 29, 'NO IQ', '5', 'Yes'),
(10, 28, 'khkj', '1', 'Yes'),
(11, 26, 'random', '3', 'Yes'),
(12, 26, 'kkslfks;ldf', '1', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `amphibian`
--
ALTER TABLE `amphibian`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `animalimages`
--
ALTER TABLE `animalimages`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `animals_ibfk_2` (`location_id`),
  ADD KEY `animals_ibfk_3` (`species_category`);

--
-- Indexes for table `animal_of_the_week`
--
ALTER TABLE `animal_of_the_week`
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `applications_ibfk_1` (`v_id`);

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`classif_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `mammals`
--
ALTER TABLE `mammals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `reptiles`
--
ALTER TABLE `reptiles`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `sponsorship_price`
--
ALTER TABLE `sponsorship_price`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `sponsorship_price_ibfk_1` (`animal_id`);

--
-- Indexes for table `sponsor_animals`
--
ALTER TABLE `sponsor_animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `sp_id` (`sp_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `watchlist_ibfk_1` (`animal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amphibian`
--
ALTER TABLE `amphibian`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `animalimages`
--
ALTER TABLE `animalimages`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `birds`
--
ALTER TABLE `birds`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `classification`
--
ALTER TABLE `classification`
  MODIFY `classif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fish`
--
ALTER TABLE `fish`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mammals`
--
ALTER TABLE `mammals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reptiles`
--
ALTER TABLE `reptiles`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsorship_price`
--
ALTER TABLE `sponsorship_price`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sponsor_animals`
--
ALTER TABLE `sponsor_animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amphibian`
--
ALTER TABLE `amphibian`
  ADD CONSTRAINT `amphibian_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animalimages`
--
ALTER TABLE `animalimages`
  ADD CONSTRAINT `animalimages_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animals_ibfk_3` FOREIGN KEY (`species_category`) REFERENCES `classification` (`classif_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animal_of_the_week`
--
ALTER TABLE `animal_of_the_week`
  ADD CONSTRAINT `animal_of_the_week_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vacancies` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `birds`
--
ALTER TABLE `birds`
  ADD CONSTRAINT `birds_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fish`
--
ALTER TABLE `fish`
  ADD CONSTRAINT `fish_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mammals`
--
ALTER TABLE `mammals`
  ADD CONSTRAINT `mammals_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reptiles`
--
ALTER TABLE `reptiles`
  ADD CONSTRAINT `reptiles_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsorship_price`
--
ALTER TABLE `sponsorship_price`
  ADD CONSTRAINT `sponsorship_price_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsor_animals`
--
ALTER TABLE `sponsor_animals`
  ADD CONSTRAINT `sponsor_animals_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sponsor_animals_ibfk_2` FOREIGN KEY (`sp_id`) REFERENCES `sponsors` (`sp_id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
