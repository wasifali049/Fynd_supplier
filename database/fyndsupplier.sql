-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 10:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyndsupplier`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` tinytext NOT NULL,
  `password_plane` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `password`, `password_plane`, `created_at`, `updated_at`) VALUES
(34, 'admin', 'admin@test.com', '$2y$10$vlIL0ONGE7SLGixeagZAEuH8gDnQJa.MU5Y7MtkgcZ4wYtE6Xm6BO', '123456', '2022-09-05 07:14:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `slug` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `uid`, `image`, `title`, `meta_description`, `meta_keyword`, `slug`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 29, '1773water.png', 'Water treatment chemical manufacturers and suppliers in Qatar', 'Qatar is a country on the northeastern coast of the Arabian Peninsula. Its economy is largely based on oil and gas production. There are many water treatment chemical manufacturers and suppliers in Doha, Qatar. There are many Qatari chemical manufacturers, traders and suppliers supporting local oil and gas industries. ', 'Water treatment chemical manufacturers and suppliers in Qatar, Drilling chemical manufacturers and suppliers in Doha, Cementing chemical manufacturers and suppliers in Qatar, Water treatment chemical manufacturers and suppliers in Doha, Qatari water treatment chemical manufacturers and suppliers, ', 'water-treatment-chemical-manufacturers-and-suppliers-in-qatar', '<p dir=\"ltr\">Qatar is a country on the northeastern coast of the Arabian Peninsula. Its economy is largely based on oil and gas production. According to a report Qatar&rsquo;s&nbsp; Water treatment chemical industry is expected to grow at a fast speed. There are many water treatment chemical manufacturers and suppliers in Doha, Qatar.&nbsp;</p>\r\n<p dir=\"ltr\">According to WHO (World Health Organization) Qatar generated a total volume of 442 million m3 of household wastewater in 2020.&nbsp;</p>\r\n<p dir=\"ltr\">Some water treatment chemicals are -&nbsp;</p>\r\n<p dir=\"ltr\">Algaecides - These are used to kill phytoplankton &amp; are applied to reduce large bloom.&nbsp; One common algaecide is copper sulphate which is highly soluble in water.&nbsp;</p>\r\n<p dir=\"ltr\">Antifoams - Antifoam powder covers a group of products based on modified polydimethylsiloxane. The products vary in their basic properties, but as a group they introduce excellent antifoaming in a wide range of applications and conditions.</p>\r\n<p dir=\"ltr\">The antifoams are chemically inert and do not react with the medium that is defoamed. They are odourless, tasteless, non-volatile, non-toxic and they do not corrode materials. The only disadvantage of the powdery product is that it cannot be used in watery solutions.</p>\r\n<p dir=\"ltr\">Corrosion inhibitors - Corrosion is a general term that indicates the conversion of a metal into a soluble compound.</p>\r\n<p dir=\"ltr\">Corrosion can lead to failure of critical parts of boiler systems, deposition of corrosion products in critical heat exchange areas, and overall efficiency loss.</p>\r\n<p dir=\"ltr\">That is why corrosion inhibitors are often applied. Inhibitors are chemicals that react with a metallic surface, giving the surface a certain level of protection. Inhibitors often work by adsorbing themselves on the metallic surface, protecting the metallic surface by forming a film.</p>\r\n<p dir=\"ltr\">You can&nbsp; refer this list of water treatment chemicals in Qatar -&nbsp;</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Dewchem : It was established in 2004. With years of knowledge they provide a wide range of products. They are committed to provide quality, reliable &amp; trusted service to their customers.&nbsp; Here is the contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.dewchem.com/about.html\">https://www.dewchem.com/about.html</a></p>\r\n<p dir=\"ltr\">Contact No : 97 444988032</p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Wolgan : Wolgan is one of the reputed companies in Qatar that serves exceptional services in the water treatment chemical industry.&nbsp; Get in touch with them from here -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://wolgan.qa/contact-us-2/\">https://wolgan.qa/contact-us-2/</a></p>\r\n<p dir=\"ltr\">Contact No : 974 44429818</p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Zealiche Water Technologies : It was formed in 2018. They have a wide range of products. Here is the contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.zealiche.com/index.php\">https://www.zealiche.com/index.php</a></p>\r\n<p dir=\"ltr\">Contact No : 974 44326092</p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Next Water Solution : It offers an extensive range of water treatment chemicals like algaecides, biocides, coagulants, flocculants etc. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.nextwaters.com/home/offerings.php#water-treatment-chemicals\">http://www.nextwaters.com/home/offerings.php#water-treatment-chemicals</a></p>\r\n<p dir=\"ltr\">Contact No : 974 66242877</p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Wind Flow Trading &amp; Contracting : They provide services at competitive prices &amp; delivered on time. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.windflowqatar.com/services.html\">http://www.windflowqatar.com/services.html</a></p>\r\n<p dir=\"ltr\">Contact No : 974 33021868<strong><br></strong></p>\r\n<p dir=\"ltr\">There are many companies in this field. Have a look -&nbsp;</p>\r\n<p dir=\"ltr\">Britannic Water Treatment Co. - <a href=\"http://www.britannicwater.com/\">http://www.britannicwater.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 974 44600212</p>\r\n<p dir=\"ltr\">Watermaster Qatar - <a href=\"http://www.watermaster.me/\">http://www.watermaster.me/</a></p>\r\n<p dir=\"ltr\">Contact No : 974 44442494</p>\r\n<p dir=\"ltr\">Veolia Water Technologies - <a href=\"https://www.veoliawatertechnologies.com/en\">https://www.veoliawatertechnologies.com/en</a></p>\r\n<p dir=\"ltr\">Contact No : 974 44553296</p>\r\n<p dir=\"ltr\">&amp; many more.</p>\r\n<p>To find chemical manufacturers and suppliers in Qatar, you can search in fyndsupplier.com network database. You can search and find water treatment chemical suppliers from Qatar ad connect with them directly on their email/Whatsapp.</p>\r\n<p>If you need any support then you can contact customer support at infoATfyndsupplier.com or Whatsapp +47 94432969.&nbsp;</p>\r\n<p><video style=\"display: table; margin-left: auto; margin-right: auto;\" controls=\"controls\" width=\"300\" height=\"150\">\r\n<source src=\"https://www.youtube.com/shorts/1jenPmYBdCc\"></video></p>', '2023-08-01 17:45:16', NULL, '2023-09-14 10:21:07', 34),
(3, 29, '3858cementing.jpg', 'Cementing Chemical Manufacturers and Suppliers in UAE ', 'A cement is a binder, a chemical substance used for construction that sets, hardens & adheres to other materials to bind them together. China is the largest cement producer of the world. China consistently has produced more cement than any other country in the world for the past 18 years. \r\n', 'Cementing chemical suppliers in Dubai. Cementing Chemicals manufacturers in UAE, Cementing chemical suppliers in Abu Dhabi, Emirati chemical manufacturers and suppliers ', 'cementing-chemical-manufacturers-and-suppliers-in-uae-', '<p dir=\"ltr\">A cement is a binder, a chemical substance used for construction that sets, hardens &amp; adheres to other materials to bind them together. China is the largest cement producer of the world. China consistently has produced more cement than any other country in the world for the past 18 years.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Cementing chemicals are raw materials that possess excellent setting &amp; hardening properties when mixed to a paste with water. Chemicals used to form cement are mentioned below -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Lime : Lime is calcium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Deficiency in lime reduces the strength of the property to the cement</p>\r\n<p dir=\"ltr\">Deficiency in lime causes the cement to set quickly&nbsp;</p>\r\n<p dir=\"ltr\">Excess lime makes cement unsound.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Silica : Silica is Silicon dioxide&nbsp;</p>\r\n<p dir=\"ltr\">It impacts strength to cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Alumina :&nbsp; Alumina is Aluminium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Excess Alumina weakens the cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Magnesia : Magnesia is magnesium oxide&nbsp;</p>\r\n<p dir=\"ltr\">It shouldn&rsquo;t be present more than 2% in the cement</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Iron Oxide : It impacts colour to the cement</p>\r\n<p dir=\"ltr\">It acts as a flux&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">Calcium Sulphate : It slows down the setting action of cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Sulphur Trioxide &amp; Alkaline&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">The global construction Chemical market was $49.9B in 2022 &amp; expected to reach $88.1B by 2032. UAE construction chemical market is expected to grow at a CAGR of 7% by 2026.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Union Cement Company is the first cement producing company&nbsp; established in the UAE. The UAE has the 2nd largest cement sector in the Gulf cooperation council. Here is the list of some cementing chemical&nbsp; manufacturers&nbsp; in UAE -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Corrotech Construction Chemicals : It is a renowned name in the construction chemical industry from 1982. Connect with them -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.mctuae.com/about-us/mct-group-of-companies/\">https://www.mctuae.com/about-us/mct-group-of-companies/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 48112100&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Mapei Construction Chemicals : It&rsquo;s among the leading manufacturers of construction chemicals. They offer high quality products to their customers. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.mapei.com/ae/en/contact-us\">https://www.mapei.com/ae/en/contact-us</a></p>\r\n<p dir=\"ltr\">Contact No : 971 48156666</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Accord Chemical Industry : They are expert Chemists of construction chemicals. They manufacture &amp; supply construction chemicals to the middle east region. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.accochemae.com/\">http://www.accochemae.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 525090977</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Eurobuild Construction Chemicals : It&rsquo;s one of the leading internationally construction&nbsp; chemical manufacturers in the UAE. They have valuable clients across UAE like - Mall of Emirates- Dubai, Crowne Plaza Hotel-Dubai, Grand Hyatt-Dubai &amp; many more. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.eurobuild.ae/Profile.html\">https://www.eurobuild.ae/Profile.html</a></p>\r\n<p dir=\"ltr\">Contact No : 971 67671425</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Winchem Middle East chemical industries : They manufacture a wide variety of construction chemicals. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.winchemme.com/about-us.html\">https://www.winchemme.com/about-us.html</a></p>\r\n<p dir=\"ltr\">Contact No : 971 566767505</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Many more can be added to this list -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Envirocon Construction - <a href=\"https://www.enviroconcp.com/\">https://www.enviroconcp.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 25503473</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Matex Construction Chemicals - <a href=\"http://www.matex-global.com/\">http://www.matex-global.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 43334140&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Danube Construction Chemicals - <a href=\"https://www.aldanube.com/\">https://www.aldanube.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 562867845&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Emirates Specialities Co. - <a href=\"http://www.esco.ae/\">http://www.esco.ae/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 26784800&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">PAC Technologies - <a href=\"http://www.pactechnologies-ae.com/\">http://www.pactechnologies-ae.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 47706646</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">To know more follow fyndsupplier&rsquo;s daily update.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Cementing chemical industry is growing due to increasing demand for buildings, housing complexes etc.&nbsp; The UAE construction chemical market is thriving continuously.</p>\r\n<p>To find chemical manufacturers and suppliers in UAE, you can search in fyndsupplier.com network database. You can search and find water treatment chemical suppliers from UAE ad connect with them directly on their email/Whatsapp.</p>\r\n<p>If you need any support then you can contact customer support at infoATfyndsupplier.com or Whatsapp +47 94432969.&nbsp;</p>', '2023-08-01 17:50:12', NULL, '2023-09-13 22:20:29', 34),
(4, 29, '6055a3fba24566a661f61f97e6e43379d00b.jpg', 'Chemical manufacturers & suppliers in UAE ', 'The UAE has emerged as a leader in the chemical industry, with a thriving market and world-class infrastructure. There are many chemical manufacturers, traders, distributors and suppliers in the UAE. ', 'UAE chemical industry\r\nPetrochemicals\r\nChemical manufacturing\r\nGulf Cooperation Council (GCC)\r\nChemical exports\r\nIndustrial growth\r\nAdvanced materials\r\nOil and gas sector\r\nIndustrial diversification\r\nTechnological advancements\r\nEnvironmental sustainability\r\nRegulatory framework\r\nResearch and development\r\nInvestment opportunities\r\nSupply chain management\r\nMarket trends\r\nInnovation in chemicals\r\nEmployment opportunities\r\nMiddle East chemical market\r\nInfrastructure development.\r\n\r\n\r\n\r\n', 'chemical-manufacturers-suppliers-in-uae-', '<p>&nbsp;</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Global Chemical Company : It&rsquo;s a chemical manufacturing company located in Abu Dhabi, UAE. Here is the contact information -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.globalchemical.biz/\">http://www.globalchemical.biz/</a></p>\r\n<p dir=\"ltr\">Contact No : 97125502040</p>\r\n<p dir=\"ltr\">Products, they deal with - Sulphonated Asphalt Product</p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Drilling &amp; Completion Fluids</p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stimulation Additives&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Corrosion Inhibitor Intensifier etc.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Corrotech Construction Chemicals : It&rsquo;s a leading manufacturer &amp;&nbsp; supplier of&nbsp; construction chemicals . Contact information -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.mctuae.com/\">http://www.mctuae.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 504507658</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Sichem LLC : It manufactures oilfield chemicals, they have been in this industry since 1989. Contact information -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.sichem.ae/\">http://www.sichem.ae/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 25559104</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">IFFCO Chemicals : It was formed in October, 2014. They provide services in the UAE, GCC, Levant, Africa &amp; the Indian subcontinent. Their products are - Architectural coatings, industrial coatings, wood coatings, Road markings, waterproofing etc. Here is the contact information -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <span style=\"background-color: rgb(255, 255, 255);\"><a style=\"background-color: rgb(255, 255, 255);\" href=\"http://www.iffcochemicals.com/\" aria-invalid=\"true\">http://www.iffcochemicals.com/</a></span></p>\r\n<p dir=\"ltr\">Contact No : 971 65263922</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Trice Chemicals IND LLC : It&rsquo;s a renowned chemical manufacturer &amp; trader in the UAE since 2002. They deal with cleaning chemicals, industrial chemicals, speciality chemicals, pharmaceuticals etc.&nbsp; Contact Details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.tricechemicals.com/\">https://www.tricechemicals.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 72589345</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"6\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Hanza Chemical Industries : It&rsquo;s a manufacturer of raw materials of paints, construction chemicals etc. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://hanza-chem.com/\">https://hanza-chem.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 25500408</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p>To find chemical manufacturers and suppliers in UAE, you can search in fyndsupplier.com network database. You can search and find chemical suppliers from UAE ad connect with them directly on their email/Whatsapp.</p>\r\n<p>If you need any support then you can contact customer support at infoATfyndsupplier.com or Whatsapp +47 94432969.&nbsp;</p>\r\n<p><strong id=\"docs-internal-guid-d1c2f793-7fff-5e9e-7a0c-59525aa06d4f\">&nbsp;<video style=\"display: table; margin-left: auto; margin-right: auto;\" controls=\"controls\" width=\"300\" height=\"150\">\r\n<source src=\"https://www.youtube.com/shorts/5N-LlmOmWKs\"></video></strong></p>', '2023-08-03 11:39:56', NULL, '2023-09-14 10:19:03', 34),
(5, 29, '4023portland-cement-manufacturing-process.jpg', 'Cementing Chemical Industry in UAE ', 'A cement is a binder, a chemical substance used for construction that sets, hardens & adheres to other materials to bind them together.', 'Cementing chemical industry\r\nUAE cement industry\r\nCementing additives\r\nOil and gas sector\r\nConstruction chemicals\r\nCementing technology\r\nCement production\r\nCementing process\r\nWell cementing\r\nCementing operations\r\nCementing equipment\r\nCementing best practices\r\nOil well cement\r\nCementing challenges\r\nCementing solutions\r\nCementing chemicals market\r\nEnvironmental considerations in cementing\r\nCementing safety measures\r\nCementing job design\r\nCementing service providers in UAE', 'cementing-chemical-industry-in-uae-', '<p>&nbsp;</p>\r\n<p dir=\"ltr\">A cement is a binder, a chemical substance used for construction that sets, hardens &amp; adheres to other materials to bind them together. China is the largest cement producer of the world. China consistently has produced more cement than any other country in the world for the past 18 years.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Cementing chemicals are raw materials that possess excellent setting &amp; hardening properties when mixed to a paste with water. Chemicals used to form cement are mentioned below -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Lime : Lime is calcium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Deficiency in lime reduces the strength of the property to the cement</p>\r\n<p dir=\"ltr\">Deficiency in lime causes the cement to set quickly&nbsp;</p>\r\n<p dir=\"ltr\">Excess lime makes cement unsound.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Silica : Silica is Silicon dioxide&nbsp;</p>\r\n<p dir=\"ltr\">It impacts strength to cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Alumina :&nbsp; Alumina is Aluminium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Excess Alumina weakens the cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Magnesia : Magnesia is magnesium oxide&nbsp;</p>\r\n<p dir=\"ltr\">It shouldn&rsquo;t be present more than 2% in the cement</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Iron Oxide : It impacts colour to the cement</p>\r\n<p dir=\"ltr\">It acts as a flux&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">Calcium Sulphate : It slows down the setting action of cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Sulphur Trioxide &amp; Alkaline&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">The global construction Chemical market was $49.9B in 2022 &amp; expected to reach $88.1B by 2032. UAE construction chemical market is expected to grow at a CAGR of 7% by 2026.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Union Cement Company is the first cement producing company&nbsp; established in the UAE. The UAE has the 2nd largest cement sector in the Gulf cooperation council. Here is the list of some cementing chemical&nbsp; manufacturers&nbsp; in UAE -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Corrotech Construction Chemicals : It is a renowned name in the construction chemical industry from 1982. Connect with them -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.mctuae.com/about-us/mct-group-of-companies/\">https://www.mctuae.com/about-us/mct-group-of-companies/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 48112100&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Mapei Construction Chemicals : It&rsquo;s among the leading manufacturers of construction chemicals. They offer high quality products to their customers. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.mapei.com/ae/en/contact-us\">https://www.mapei.com/ae/en/contact-us</a></p>\r\n<p dir=\"ltr\">Contact No : 971 48156666</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Accord Chemical Industry : They are expert Chemists of construction chemicals. They manufacture &amp; supply construction chemicals to the middle east region. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.accochemae.com/\">http://www.accochemae.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 525090977</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Eurobuild Construction Chemicals : It&rsquo;s one of the leading internationally construction&nbsp; chemical manufacturers in the UAE. They have valuable clients across UAE like - Mall of Emirates- Dubai, Crowne Plaza Hotel-Dubai, Grand Hyatt-Dubai &amp; many more. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.eurobuild.ae/Profile.html\">https://www.eurobuild.ae/Profile.html</a></p>\r\n<p dir=\"ltr\">Contact No : 971 67671425</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Winchem Middle East chemical industries : They manufacture a wide variety of construction chemicals. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.winchemme.com/about-us.html\">https://www.winchemme.com/about-us.html</a></p>\r\n<p dir=\"ltr\">Contact No : 971 566767505</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Many more can be added to this list -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Envirocon Construction - <a href=\"https://www.enviroconcp.com/\">https://www.enviroconcp.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 25503473</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Matex Construction Chemicals - <a href=\"http://www.matex-global.com/\">http://www.matex-global.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 43334140&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Danube Construction Chemicals - <a href=\"https://www.aldanube.com/\">https://www.aldanube.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 562867845&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Emirates Specialities Co. - <a href=\"http://www.esco.ae/\">http://www.esco.ae/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 26784800&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">PAC Technologies - <a href=\"http://www.pactechnologies-ae.com/\">http://www.pactechnologies-ae.com/</a></p>\r\n<p dir=\"ltr\">Contact No - +971 47706646</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">To know more follow fyndsupplier&rsquo;s daily update.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Cementing chemical industry is growing due to increasing demand for buildings, housing complexes etc.&nbsp; The UAE construction chemical market is thriving continuously.&nbsp;</p>', '2023-08-03 11:48:39', NULL, '2023-08-03 11:55:49', 34),
(6, 29, '34771627982059_164_Water-Treatment-Banner.jpg', 'Water Treatment Chemical manufacturers & suppliers in UAE ', 'Chemical treatments utilize the additives of chemicals to make industrial water suitable for use.', 'water treatment chemicals. Water treatment in UAE\r\nWater purification\r\nWater desalination\r\nReverse osmosis\r\nWater treatment chemicals\r\nWater quality standards\r\nIndustrial wastewater treatment\r\nMunicipal water treatment\r\nDrinking water treatment\r\nWater disinfection\r\nWater filtration\r\nChemical coagulants\r\nFlocculants\r\npH balancing chemicals\r\nCorrosion inhibitors\r\nScale inhibitors\r\nDisinfectants\r\nUAE water resources\r\nWater sustainability in UAE', 'water-treatment-chemical-manufacturers-suppliers-in-uae-', '<p dir=\"ltr\">What is the water treatment chemical industry?&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Chemical treatments utilize the additives of chemicals to make industrial water suitable for use. There are many uses of water in the industry, in most cases the water also needs treatment to reuse.&nbsp;</p>\r\n<p dir=\"ltr\">Some water treatment chemicals &amp; their uses -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Algaecides - These are used to kill phytoplankton &amp; are applied to reduce large bloom.&nbsp; One common algaecide is copper sulphate which is highly soluble in water.</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Antifoams - Antifoam powder covers a group of products based on modified polydimethylsiloxane. The products vary in their basic properties, but as a group they introduce excellent antifoaming in a wide range of applications and conditions.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">The antifoams are chemically inert and do not react with the medium that is defoamed. They are odourless, tasteless, non-volatile, non-toxic and they do not corrode materials. The only disadvantage of the powdery product is that it cannot be used in watery solutions.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Corrosion inhibitors - Corrosion is a general term that indicates the conversion of a metal into a soluble compound.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Corrosion can lead to failure of critical parts of boiler systems, deposition of corrosion products in critical heat exchange areas, and overall efficiency loss.</p>\r\n<p dir=\"ltr\">That is why corrosion inhibitors are often applied. Inhibitors are chemicals that react with a metallic surface, giving the surface a certain level of protection. Inhibitors often work by adsorbing themselves on the metallic surface, protecting the metallic surface by forming a film.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">In 2020 UAE had more than 75 municipal wastewater treatment plants with a capacity to treat over 2 billion liters/day. UAE heavily rely on rain water falling in the Hajar mountains for day to day use. The UAE water treatment chemical market is expected to grow at a CAGR of 5.9% during 2020-2027. Reasons for increasing demand for wastewater treatment - government regulations &amp; initiative, high capital investment.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here is the list of water treatment chemicals manufacturers &amp; suppliers in UAE -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Green Water Treatment Solutions - They are one of the best companies that provide water treatment chemicals to UAE, Oman, Bahrain, Qatar &amp; other countries as well. They help you to become greener, cleaner &amp; more cost efficient. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.greenwts.com/contact-us/\">https://www.greenwts.com/contact-us/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 25526112</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">AL KAFAAH - It&rsquo;s a global leader in supplying water treatment chemicals for 35 years. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.alkafaahgroup.com/\">https://www.alkafaahgroup.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 67499626</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Water Bird Water Treatment Chemicals - Water Bird has become the one stop solution for water treatment chemical manufacturing &amp; supplying. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.waterbirdwtc.com/about/\">https://www.waterbirdwtc.com/about/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 25534651</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Aquachem Industries - This was established in 2005 in Abu Dhabi, gradually it expanded its operation in other countries. Through their expertise they become a player in this industry. They are focused on delivering the best service to its customers. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.aquachemme.com/contact-us/\">http://www.aquachemme.com/contact-us/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 25506855</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Eflochem Chemicals - It&rsquo;s a leading chemical manufacturing company &amp; has been in business for decades. They offer a wide range of chemicals. They have certified products in the company. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <span style=\"background-color: rgb(255, 255, 255);\"><a style=\"background-color: rgb(255, 255, 255);\" href=\"https://eflochem.com/\" aria-invalid=\"true\">https://eflochem.com/</a></span></p>\r\n<p dir=\"ltr\">Contact No : 971 43412404</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Many players are there in the game, here are few in the above mentioned list.&nbsp;</p>', '2023-08-03 11:54:00', NULL, NULL, NULL),
(7, 29, '2040liq-waste.jpg', 'Water Treatment Chemical Industry in Oman ', 'Chemical treatments utilize the additives of chemicals to make industrial water suitable for use.', 'Water treatment chemical industry\r\nWater treatment in Oman\r\nWater purification\r\nWater desalination\r\nReverse osmosis\r\nWater treatment chemicals\r\nWater quality standards\r\nIndustrial wastewater treatment\r\nMunicipal water treatment\r\nDrinking water treatment\r\nWater disinfection\r\nWater filtration\r\nChemical coagulants\r\nFlocculants\r\npH balancing chemicals\r\nCorrosion inhibitors\r\nScale inhibitors\r\nDisinfectants\r\nOman water resources\r\nWater sustainability in Oman\r\n', 'water-treatment-chemical-industry-in-oman-', '<p dir=\"ltr\">What is the water treatment chemical industry?&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Chemical treatments utilize the additives of chemicals to make industrial water suitable for use. There are many uses of water in the industry, in most cases the water also needs treatment to reuse.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Industrial water treatment manages 4 main problems - scaling, corrosion, microbiological activity &amp; disposal of residual wastewater.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Chemicals used in industrial wastewater treatment are -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Chlorine Dioxide&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Muriatic Acid&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Soda Ash</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Algicide&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Chlorine&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Sodium Bicarbonate&nbsp;</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">The methods of Water Treatment -&nbsp;</p>\r\n<ul>\r\n<li dir=\"ltr\" role=\"checkbox\" aria-checked=\"false\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Screening</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"checkbox\" aria-checked=\"false\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Aeration</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"checkbox\" aria-checked=\"false\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Coagulation &amp; flocculation&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"checkbox\" aria-checked=\"false\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Sedimentation</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"checkbox\" aria-checked=\"false\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Filtration</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"checkbox\" aria-checked=\"false\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Chlorination&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"checkbox\" aria-checked=\"false\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Supplementary Treatment&nbsp;</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">The global water treatment market is expected to reach $42.2 billion by 2027. Rising scarcity of freshwater is the biggest reason for growth of this market.</p>\r\n<p dir=\"ltr\">&nbsp;Corrosion Inhibitors to be the fastest growing segment amongst types in the water treatment chemicals market.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Asia Pacific is the fastest growing region in the global water treatment chemical market. Oman&rsquo;s water treatment chemical industry is expected to grow at a CAGR of 5.2% during 2020-2026.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Have a look to the list of water treatment chemical manufacturers &amp; suppliers of Oman -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Green Water Treatment Solutions - This is an international brand who provide high quality services. They create commercial, technical &amp; competency value for their clients. It&rsquo;s an ISO certified company. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://greenwts.com/about/\">https://greenwts.com/about/</a></p>\r\n<p dir=\"ltr\">Contact No : +971 25526112</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Oman Water Treatment Co. - This Omani company is committed to the enhancement &amp; promotion of value they provide. They hold a variety of stock with an adequate availability of chemicals. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.owatco.com/contact.html\">https://www.owatco.com/contact.html</a></p>\r\n<p dir=\"ltr\">Contact No : 968 24446514</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">UV Water Systems - It\'s been serving the nation since 2010 with a mission to help people by providing&nbsp; innovative, cost effective &amp; customized water treatment solutions. They have products like - calcium chloride, caustic soda flakes, chlorine powder, citric acid, sodium bisulphate etc. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://uvwater.biz/\">https://uvwater.biz/</a></p>\r\n<p dir=\"ltr\">Contact No : 968 24727232</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Metito&nbsp; - Metito is a global leader &amp; provider of choice for sustainable water management solutions with over 60 years of experience. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.metito.com/\">https://www.metito.com/</a></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Muscat Chemical - They manufacture &amp; supply a wide range of chemicals to the world. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://muscatchemical.com/about-us\">http://muscatchemical.com/about-us</a></p>\r\n<p dir=\"ltr\">Contact No : 968 93960629</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">There are many leaders in this field, these are few of them. You can find others\' names in their business directory.&nbsp;</p>\r\n<p><strong id=\"docs-internal-guid-0dbb6a6d-7fff-8fc2-ab9e-780b58e11232\"><br><br><br><br><br></strong></p>', '2023-08-03 12:03:45', NULL, NULL, NULL),
(8, 29, '4385waste-water-treatment.jpg', 'Chemical manufacturers & suppliers in Saudi Arabia ', 'Saudi Arabia (officially kingdom of Saudi Arabia) is a country in West Asia. ', 'Saudi Arabia chemical industry\r\nPetrochemicals\r\nChemical manufacturing\r\nGulf Cooperation Council (GCC)\r\nChemical exports\r\nIndustrial growth\r\nAdvanced materials\r\nOil and gas sector\r\nIndustrial diversification\r\nTechnological advancements\r\nEnvironmental sustainability\r\nRegulatory framework\r\nResearch and development\r\nInvestment opportunities\r\nSupply chain management\r\nMarket trends\r\nInnovation in chemicals\r\nEmployment opportunities\r\nMiddle East chemical market\r\nInfrastructure development.\r\n\r\n\r\n\r\n', 'chemical-manufacturers-suppliers-in-saudi-arabia-', '<p dir=\"ltr\">&nbsp;Saudi Arabia (officially kingdom of Saudi Arabia) is a country in West Asia. It&rsquo;s bordered by the red sea in the west, Jordan, Iraq &amp; Kuwait to the north, the Persian Gulf, Qatar &amp; UAE to the east &amp; Yemen to the south.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">It has the world&rsquo;s 2nd largest petroleum reserves &amp; 5th largest natural gas reserves in the country. It&rsquo;s also the largest exporter of petroleum in the world. 67% of export earnings comes from the oil industry. The oil industry contributes about 45 % to Saudi&rsquo;s GDP.&nbsp;&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Saudi Arabia is one of the world&rsquo;s largest chemical manufacturers &amp; suppliers. Saudi Arabia oil field chemical market size was $928.27 million in 2022 and expected to grow at a CAGR of 4.81%.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here you can find some manufacturers &amp; suppliers details of Saudi Arabia.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Al Tawun Solyman Services (FZE) : They are&nbsp; manufacturers &amp; suppliers of chemicals used in pharma, cosmetic, paints &amp; food industry. They are leading distributors in the middle east region. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://solymanservices.com/\">http://solymanservices.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 065572266</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&nbsp;MES ENVIROTECH FZC : They are serving the industries like construction, mining &amp; minerals, environmental &amp; pollution control, chemical &amp; petrochemical treatment etc. They have been in this industry for 30 years, dealing with 600+ customers from 7 countries. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.mes-envirotech.com/\">http://www.mes-envirotech.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 509518808</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Trent International LLC : Trent international is a professional company of manufacturing &amp; marketing of hygiene &amp; cleaning chemicals. It was established in 2006. They have 100+ products in this category. With this product range they served dairies, poultry farms to the hospitality &amp; healthcare, bakeries plants, petroleum &amp; ,marine industries etc. They have personal care, housekeeping, floor care, and industrial cleaning chemical products.&nbsp; Contact them -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.trentinternational.com/\">http://www.trentinternational.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 6 743 2900</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Obegi Chemicals LLC : For more than 100 years, Obegi chemicals has been a leader in chemical distribution across the Middle east, North &amp; East Africa. They have core values like - doing business with ethics, putting relationships before short term profit, bringing the human part in them while dealing with others. They serve in agro chemicals, construction chemicals, oil &amp; gas, personal care, pharma, ink, household care, nutrition industries. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.obegichem.com/\">http://www.obegichem.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 44518555</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Arabian Minerals &amp; Chemical Co.Ltd : They are one of the leading suppliers of minerals &amp; chemicals for the oil &amp; gas industry. They ensure quality, safety &amp; timely delivery. In the product range they have - Barite, Bentonite, calcium carbonate &amp; AMC lubricant. Contact here -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://amccksa.com/\">https://amccksa.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 966 13 8472187</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">The list is not finished here, take a look at this also :&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\">Adwan Chemical Industries Co. Ltd : <a href=\"http://www.adwanchem.com/\">http://www.adwanchem.com/</a></li>\r\n</ul>\r\n<p dir=\"ltr\">Contact No : 966 138121615</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\">Performance Minerals Factory Co. Ltd. : <a href=\"http://www.performance-minerals.com/index.html\">http://www.performance-minerals.com/index.html</a></li>\r\n</ul>\r\n<p dir=\"ltr\">Contact No : 966 138022743</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\">Fouz Chemical Company : <a href=\"http://www.fouz.com.sa/\">http://www.fouz.com.sa/</a>&nbsp;</li>\r\n</ul>\r\n<p dir=\"ltr\">Contact No : 966 138353300</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\">StonCor Middle East LLC : <a href=\"http://www.stoncor-me.com/\">http://www.stoncor-me.com/</a></li>\r\n</ul>\r\n<p dir=\"ltr\">Contact No : 971 43470460</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\">Delmon Chemical Industries : <a href=\"http://www.delmon.com.sa/\">http://www.delmon.com.sa/</a></li>\r\n</ul>\r\n<p dir=\"ltr\">Contact No : 966 138121771&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">You can also prefer their business directory to contact more suppliers.&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">The Saudi Arabia chemical industry is not built in a day or a year, it takes a lot of hard work, patience, and perfect strategy. Based on its successful history, Saudi Arabia is continuing to expand its gas production &amp; supply. Despite strong competition with neighboring countries it has a huge potential to grow as a world leader in the near future.&nbsp;</p>\r\n<p><strong id=\"docs-internal-guid-a60bc7ca-7fff-3c5a-c934-f13101e369b4\"><br><br></strong></p>', '2023-08-03 12:09:34', NULL, NULL, NULL);
INSERT INTO `blog` (`id`, `uid`, `image`, `title`, `meta_description`, `meta_keyword`, `slug`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(9, 29, '2132research-test-tub-670px.jpg', 'Kuwait chemical suppliers & manufacturers', 'Chemical production is one of the key players of Kuwaitâ€™s economic growth.', 'Kuwait chemical industry\r\nPetrochemicals\r\nChemical manufacturing\r\nGulf Cooperation Council (GCC)\r\nChemical exports\r\nIndustrial growth\r\nAdvanced materials\r\nOil and gas sector\r\nIndustrial diversification\r\nTechnological advancements\r\nEnvironmental sustainability\r\nRegulatory framework\r\nResearch and development\r\nInvestment opportunities\r\nSupply chain management\r\nMarket trends\r\nInnovation in chemicals\r\nEmployment opportunities\r\nMiddle East chemical market\r\nInfrastructure development.\r\n\r\n\r\n\r\n', 'kuwait-chemical-suppliers-manufacturers', '<p dir=\"ltr\">Chemical production is one of the key players of Kuwait&rsquo;s economic growth. The Kuwait &amp; Iraq oilfield chemical market size growth is expected to be $706.1 million by 2027. Kuwait is one of the wealthiest economies in the Middle East with HUG oil and gas production activities. Top notch oil and gas exploration and production companies such as KOC, KNPC, and KUFPEC are operating to support the oil and gas production business. In addition, there are several oil and gas service companies and chemical traders and wholesalers to support oilfield chemical supply in the local market&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Drilling mud chemicals, refinery chemicals, water treatment chemicals, production chemicals. Stimulation chemicals etc. are primarily imported from India, China, Turkey to support local demand for oilfield chemicals in Kuwait.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">However, for service companies in the region,&nbsp; like NESR, Taqa, Oilserv, and NIMR, procurement of chemicals is carried out often on an ad-hoc basis to make them competitive to win orders from end users. They often search chemical suppliers from the local market in Kuwait or internationally to find a trusted supplier who can offer them compulsive price, quality and on-time delivery.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Petrochemical&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Kuwait produces a wide range of chemicals especially in the petrochemical sector. Kuwait&rsquo;s petrochemicals mostly exported to India &amp; China. With the help of experience &amp; technology Kuwait\'s petrochemical industry will be in a strong position in the upcoming decade.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Oilfield chemicals&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Not only in the petrochemical industry Kuwait has played a significant role in oilfield chemicals also.Their manufacturers produce chemicals used in drilling fluids, corrosion inhibition etc. They contribute well to the oil &amp; gas industry.&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">Here are few names that contribute to this growing industry&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Al sanea chemical products factory - It has been in the industry since 1977. It produces household maintenance chemicals, industrial cleaners, oilfield, water treatment chemicals etc. Contact details :&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://alsanea.com/\">https://alsanea.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 00965 &ndash; 24747623</p>\r\n<p><strong><br><br></strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Al barrack chemicals &amp; plastic company - This company was established in 1997. It has become the main distributor of cleaning, chemical products &amp; machineries to over 1000 laundries in Kuwait &amp; other GCC countries. Contact details :&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://albarrakchem.com/about-us/\">https://albarrakchem.com/about-us/</a></p>\r\n<p dir=\"ltr\">Contact No : 0096524676671</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Equate petrochemical company - Equate is the 2nd largest producer of ethylene glycol in the world. It provides everyday consumable products &amp; contributes to sustaining a better world. Contact details :&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.equate.com/\">https://www.equate.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 965 1898888</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">United oil projects co. - This company is a member of the KIPCO group. Its available products are decorative paints, industrial paints, auto refinishes paints, wood coatings etc. Here is the details of their contact :&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.uopkt.com/\">https://www.uopkt.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 965 23263297&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Kuwait polyurethane industry - It has started in 1999 &amp; now become one of the leading rigid PU system house in MENA region by offering quality products &amp; services at the shortest time. To smoothly serve the customers they set up warehouses in other countries also. Their products are polyurethane, trading machine &amp; spare parts, sandwich panels etc. Contact details :&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://kuwaitpolyurethane.com/\">https://kuwaitpolyurethane.com/</a></p>\r\n<p dir=\"ltr\">Contact No : 00965 23261210</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here are some add ons in this list which you can prefer for your requirements -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">1. Kuwait Aromatics Company (KARO)</p>\r\n<p dir=\"ltr\">Address: P.O. Box 21707, Safat 13078, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.karo.com.kw</p>\r\n<p dir=\"ltr\">Products: Aromatics, Paraxylene, Benzene</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">2. Kuwait National Petroleum Company (KNPC)</p>\r\n<p dir=\"ltr\">Address: P.O. Box 70, Ahmadi 61001, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.knpc.com</p>\r\n<p dir=\"ltr\">Products: Petroleum, Petrochemicals, LPG, Gasoline</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">3. Al-Rashed International Trading Company (ATIC)</p>\r\n<p dir=\"ltr\">Address: P.O. Box 1421, Safat 13015, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.atic-kw.com</p>\r\n<p dir=\"ltr\">Products: Industrial Chemicals, Fertilizers, Insecticides, Solvents</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">4. Al Ghanim Industries</p>\r\n<p dir=\"ltr\">Address: P.O. Box 223, Safat 13003, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.ghanim.com</p>\r\n<p dir=\"ltr\">Products: Chemicals, Paints, Coatings, Adhesives</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">5. Kuwait Chlorine Industries (KCI)</p>\r\n<p dir=\"ltr\">Address: P.O. Box 3136, Safat 13032, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.kuwaitchlorine.com</p>\r\n<p dir=\"ltr\">Products: Caustic Soda, Sodium Hypochlorite, Hydrochloric Acid, Sodium Hydroxide</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">6. United Industries Company (UIC)</p>\r\n<p dir=\"ltr\">Address: P.O. Box 15545, Kuwait City 00801, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.uic.com.kw</p>\r\n<p dir=\"ltr\">Products: Acrylic Resins, Adhesives, Sealants, Water-Based Polymer Emulsions</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">7. Al Khiran International Trading Company (KITCO)</p>\r\n<p dir=\"ltr\">Address: P.O. Box 1386, Safat 13014, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.kitco-kw.com</p>\r\n<p dir=\"ltr\">Products: Solvents, Paints, Coatings, Lubricants</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">8. Al Julaiah Trading &amp; Contracting Company (JTC)</p>\r\n<p dir=\"ltr\">Address: P.O. Box 1493, Safat 13015, Kuwait</p>\r\n<p dir=\"ltr\">Website: www.jtc-kw.com</p>\r\n<p dir=\"ltr\">Products: Chem</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">There is a never ending list.This country&rsquo;s chemical suppliers &amp; manufacturers provide valuable products &amp; services to a broad spectrum of industries and also contribute to the country\'s&nbsp; development. Kuwait established them as a hub of excellence in the global chemical market. To know more about Kuwait oilfield chemical manufacturing companies, you can find local business directories.&nbsp;</p>\r\n<p><video style=\"display: table; margin-left: auto; margin-right: auto;\" controls=\"controls\" width=\"300\" height=\"150\">\r\n<source src=\"https://www.youtube.com/shorts/7MQSIh-svaA\"></video></p>', '2023-08-03 12:15:03', NULL, '2023-09-14 10:15:37', 34),
(11, 29, '5875liq-waste.jpg', 'Water Treatment Chemical Manufacturer, Exporter & Supplier in Kuwait ', 'There are many water treatment chemical manufacturers & suppliers.', 'Water treatment chemical industry\r\nWater treatment in Kuwait\r\nWater purification\r\nWater desalination\r\nReverse osmosis\r\nWater treatment chemicals\r\nWater quality standards\r\nIndustrial wastewater treatment\r\nMunicipal water treatment\r\nDrinking water treatment\r\nWater disinfection\r\nWater filtration\r\nChemical coagulants\r\nFlocculants\r\npH balancing chemicals\r\nCorrosion inhibitors\r\nScale inhibitors\r\nDisinfectants\r\nUAE water resources\r\nWater sustainability in Kuwait \r\n', 'water-treatment-chemical-manufacturer-exporter-supplier-in-kuwait-', '<p dir=\"ltr\"><img src=\"https://lh6.googleusercontent.com/Qfl2ePLno76ZjdeeVfFfxpC6n9oLFHKGlJnguzsTbpq8upEu-0tJft8LFYWSFlQVdUo2nCpwSZWsqlwWgQKWZ0ElAjj4IYeNVqpOGCGn1aE7xGel6zIXBVkKu2l8ZXDKEWS7z_PXLgaqXt4uiQYXrtM\" width=\"559\" height=\"368\"></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">There are many water treatment chemical manufacturers &amp; suppliers. Here is the list of few :&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Enviroblend Group General Trading &amp; Contracting : This company started its operation in 2000. They covered the market world wide. They deliver superior quality water treatment chemicals &amp; other services also.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Hydrochem : As we know it in<img src=\"https://lh3.googleusercontent.com/hcEyf01wOSEJ9qztugrlZY5y0xDsKoQ3QnZ1F7r7OLPVad0yDpIKIwuh-bEb2eyb097olcLhD9OSzQf7SqPPs3_ERNZHg-pdwKafgGxJPXTF5xvGCmX5kdb9VKsk76_f0VsUspnN-k_xVZpQDRrR4iE\" width=\"624\" height=\"292\"> their name, they provide water treatment chemicals. This company was established in the 1990s. Since then they have been one of Kuwait\'s premier chemical suppliers.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Al Sanea Chemical Products Factory : It&rsquo;s a chemical manufacturing company, set up in 1977. They manufacture &amp; supply over 100s of chemicals globally, water treatment chemicals are one of those.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Al Khamsan Company : This is a marketer &amp; supplier of chemicals in Kuwait. They determine customer needs &amp; provide a complete &amp; efficient solution. <img src=\"https://lh6.googleusercontent.com/pS45THmYBd6BnbgYo2l2-nz7M02s3wXZydxMqw5NNew0NcA2vo4LqB-7XBJ2VPxtH9ndLrBZnemedmbPRp8NU4qTvVIZmgtDTaVIe6YT0zPHcX4tu9IN4f1Ax9SJ4lkaiUsuFZXV0y_88c98aHLNpbc\" width=\"633\" height=\"290\"></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">These are some chemical companies who manufacture &amp; supply water treatment chemicals across Kuwait as well as the world. You can contact them &amp; order your required chemicals.&nbsp;</p>\r\n<p><strong id=\"docs-internal-guid-a0fac31e-7fff-19c6-6ba2-7d84dd3947ee\"><br><br><br><br><video style=\"display: table; margin-left: auto; margin-right: auto;\" controls=\"controls\" width=\"300\" height=\"150\">\r\n<source src=\"https://www.youtube.com/shorts/7MQSIh-svaA\"></video><br></strong></p>', '2023-08-03 12:21:10', NULL, '2023-09-14 10:16:31', 34),
(12, 29, '3364oil-field-chemicals-grey-box.jpg', 'Oilfield chemical industry in Saudi Arabia ', 'The chemical industry comprises the companies that develop & produce industrial, specialty & other chemicals.', 'Oil field chemical industry\r\nOilfield chemicals\r\nDrilling fluids\r\nProduction chemicals\r\nEnhanced oil recovery (EOR)\r\nCorrosion inhibitors\r\nScale inhibitors\r\nBiocides\r\nDemulsifiers\r\nFriction reducers\r\nSurfactants\r\nEmulsifiers\r\nParaffin inhibitors\r\nAsphaltene inhibitors\r\nSand control chemicals\r\nOilfield chemical suppliers\r\nOilfield chemical applications\r\nEnvironmental impact of oilfield chemicals\r\nSafety considerations in handling oilfield chemicals\r\nOilfield chemical market trends\r\nSaudi Arabia', 'oilfield-chemical-industry-in-saudi-arabia-', '<p dir=\"ltr\">The chemical industry comprises the companies that develop &amp; produce industrial, specialty &amp; other chemicals. Central to the modern world economy, it converts raw materials into industrial &amp; consumer products.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Chemical industry is a vast industry that incorporates all different types of product producing industries whose generation is based on heavy use of chemicals. The aim of this industry is industrial &amp; agricultural growth of the country. The products of chemical industry can divided into 3 parts -</p>\r\n<p dir=\"ltr\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Basic chemicals&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Specialty chemicals &amp;</p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consumer chemicals&nbsp;&nbsp;</p>\r\n<p dir=\"ltr\">Basic chemicals are petrochemicals, polymers &amp; inorganics. These chemicals are produced in large quantities.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Oilfield chemicals market is worth $18B now &amp; expected to reach $29.27B by 2029.&nbsp; Saudi Arabia is one of the world&rsquo;s largest net exporters of petrochemicals &amp; the centre of over 17% of the world&rsquo;s proven oil reserves. It will increase its oil production by 13 million barrels per day in 2027. Saudi Arabia&rsquo;s revenue forecast in 2028 is $1232.68 million.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Oilfield chemicals are - xanthan gum, anionic polyacrylamide &amp; petroleum sulfonate.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here is the list of these chemical manufacturers &amp; suppliers in Saudi Arabia -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Oilfield Production Chemical Factory - They are experts in oilfield chemical manufacturing. They have won the trust &amp; confidence of their customers by consistently offering them quality products. Contact them -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.oilfield.com.sa/about.html\">http://www.oilfield.com.sa/about.html</a></p>\r\n<p dir=\"ltr\">Contact No : 966 138340884</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Gulf Chemicals &amp; Industrial Oils - It&rsquo;s one of the largest manufacturers of different types of oilfield chemicals. The company supplies its products to almost all&nbsp; regions of the Middle east &amp; Indian subcontinent. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.gcir.com.sa/\">http://www.gcir.com.sa/</a></p>\r\n<p dir=\"ltr\">Contact No : 966 0138121022</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Energy, Industry Equipment Factory - EIEF has an extensive drilling fluids manufacturing facility located in Dammam 2nd industrial city. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.eief.com.sa/contact.html\">http://www.eief.com.sa/contact.html</a></p>\r\n<p dir=\"ltr\">Contact No : 966 138323350</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Performance Minerals Factory Co. - It was established in 2013 &amp; is a 100% wholly owned Saudi company. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.performance-minerals.com/contact.html\">http://www.performance-minerals.com/contact.html</a></p>\r\n<p dir=\"ltr\">Contact No : 966 138022743</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Arabian Minerals &amp; Chemical Co. ltd. - It&rsquo;s a Saudi Arabian chemical manufacturing company supporting the oil &amp; gas industry for over 45 years. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://amccksa.com/contact-us/\">https://amccksa.com/contact-us/</a></p>\r\n<p dir=\"ltr\">Contact No : 966 138472187</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Many more can be added to this list, take a look -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Reda Gulf For Energy Factory - <a href=\"http://www.redaoilfield.com/\">http://www.redaoilfield.com/</a></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Contact - +966 138127775</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Adwan Chemical Industries - <a href=\"http://www.adwanchem.com/\">http://www.adwanchem.com/</a></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Contact - +966 138121615&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Polymers oil &amp; gas factory - <a href=\"http://www.polymers.com.sa/index.html\">http://www.polymers.com.sa/index.html</a></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Contact - 966 538885872</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Fouz Chemical Company - <a href=\"http://www.fouz.com.sa/\">http://www.fouz.com.sa/</a></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Contact - +966 138353300&nbsp;&nbsp;</p>\r\n<p><strong id=\"docs-internal-guid-60b20889-7fff-7f93-0054-af2b6204d625\"><br><br><br><br><br></strong></p>', '2023-08-03 12:26:23', NULL, NULL, NULL),
(13, 29, '3498united_arab_emirates_map.jpg', 'Oil field chemical industry - UAE ', 'Oilfield chemicals are chemical components of various compounds that are applied in oil & gas extraction operations.', 'Oil field chemical industry\r\nOilfield chemicals\r\nDrilling fluids\r\nProduction chemicals\r\nEnhanced oil recovery (EOR)\r\nCorrosion inhibitors\r\nScale inhibitors\r\nBiocides\r\nDemulsifiers\r\nFriction reducers\r\nSurfactants\r\nEmulsifiers\r\nParaffin inhibitors\r\nAsphaltene inhibitors\r\nSand control chemicals\r\nOilfield chemical suppliers\r\nOilfield chemical applications\r\nEnvironmental impact of oilfield chemicals\r\nSafety considerations in handling oilfield chemicals\r\nOilfield chemical market trends\r\n', 'oil-field-chemical-industry---uae-', '<p dir=\"ltr\">Oilfield chemicals are chemical components of various compounds that are applied in oil &amp; gas extraction operations. Most of these compounds contain active ingredients dissolved in a solvent or co-solvent. They are used in the production process to inhibit corrosion, hydrate formation &amp; scale deposition.&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Oilfield chemicals are used in drilling, stimulation, production,&nbsp; cementing, enhanced oil recovery etc.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">The middle east oil field chemical market &nbsp; will grow at a rate of 4.5% by 2028. The UAE oilfield chemical market is expected to grow at a CAGR of 4.2%.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here is a list of oilfield manufacturing companies in UAE&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">VPM oilfield specialty chemicals - It&rsquo;s a renowned name in the oilfield industry. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://vpm-oilfield.ae/\">https://vpm-oilfield.ae/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 25139022</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Al Moghera LLC - They have been ruling this industry for 32 years.&nbsp; They manufacture a range of high quality cost effective materials.&nbsp; Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.almoghera.com/Products.aspx\">https://www.almoghera.com/Products.aspx</a></p>\r\n<p dir=\"ltr\">Contact No : 971 025515454</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Clariant -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Contact No : 971 25549299</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">JPS oilfield chemistry -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Contact No : 971 508266415</p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Elkem oilfield chemicals - It&rsquo;s one of the world&rsquo;s leading providers of oilfield chemicals. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.elkem.com/contact/\">https://www.elkem.com/contact/</a></p>\r\n<p dir=\"ltr\">Contact No : 971 48876069&nbsp;</p>\r\n<p><strong>&nbsp;<video style=\"display: table; margin-left: auto; margin-right: auto;\" controls=\"controls\" width=\"300\" height=\"150\">\r\n<source src=\"https://www.youtube.com/shorts/5N-LlmOmWKs\"></video></strong></p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p>&nbsp;</p>', '2023-08-03 12:30:19', NULL, '2023-09-14 10:18:06', 34),
(14, 29, '3114petrochemicals-saudi-arabia.jpg', 'Cementing Chemical industry in Saudi Arabia ', 'Cementing chemicals are raw materials that possess excellent setting & hardening properties when mixed to a paste with water. ', 'Cementing chemical industry\r\nSaudi Arabia cement industry\r\nCementing additives\r\nOil and gas sector\r\nConstruction chemicals\r\nCementing technology\r\nCement production\r\nCementing process\r\nWell cementing\r\nCementing operations\r\nCementing equipment\r\nCementing best practices\r\nOil well cement\r\nCementing challenges\r\nCementing solutions\r\nCementing chemicals market\r\nEnvironmental considerations in cementing\r\nCementing safety measures\r\nCementing job design\r\nCementing service providers in Saudi Arabia\r\n\r\n\r\n\r\n', 'cementing-chemical-industry-in-saudi-arabia-', '<p dir=\"ltr\">A cement is a binder, a chemical substance used for construction that sets, hardens &amp; adheres to other materials to bind them together. China is the largest cement producer of the world. China consistently has produced more cement than any other country in the world for the past 18 years.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Cementing chemicals are raw materials that possess excellent setting &amp; hardening properties when mixed to a paste with water. Chemicals used to form cement are mentioned below -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Lime : Lime is calcium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Deficiency in lime reduces the strength of the property to the cement</p>\r\n<p dir=\"ltr\">Deficiency in lime causes the cement to set quickly&nbsp;</p>\r\n<p dir=\"ltr\">Excess lime makes cement unsound.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Silica : Silica is Silicon dioxide&nbsp;</p>\r\n<p dir=\"ltr\">It impacts strength to cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Alumina :&nbsp; Alumina is Aluminium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Excess Alumina weakens the cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Magnesia : Magnesia is magnesium oxide&nbsp;</p>\r\n<p dir=\"ltr\">It shouldn&rsquo;t be present more than 2% in the cement</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Iron Oxide : It impacts colour to the cement</p>\r\n<p dir=\"ltr\">It acts as a flux&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">Calcium Sulphate : It slows down the setting action of cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Sulphur Trioxide &amp; Alkaline&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">The global construction Chemical market was $49.9B in 2022 &amp; expected to reach $88.1B by 2032. Saudi Arabia\'s construction chemical market is expected to grow at a CAGR of 6% by 2032.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Saudi Arabia\'s construction chemical market is expected to reach $1426.8 million by 2028. The growth drivers of this industry in UAE are - expanding construction industry, rising government spending on ultra modern infrastructure, surging demand for sustainable construction materials, raw material price fluctuations etc.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here is the list of companies that manufacture &amp; supply cementing chemical -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Al-Jouf cement factory - One of the best companies in Saudi Arabia. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://joufcem.com.sa/Ar/ContactUs.aspx\">http://joufcem.com.sa/Ar/ContactUs.aspx</a></p>\r\n<p dir=\"ltr\">Contact No : 966 920020208</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Saudi Readymix - It&rsquo;s a leading producer &amp; supplier of cementing chemicals. It was established in 1978. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.saudireadymix.com/contact_us/\">http://www.saudireadymix.com/contact_us/</a></p>\r\n<p dir=\"ltr\">Contact No : 966 920000209</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Najran Cement - It&rsquo;s one of the best chemical manufacturing companies in Saudi Arabia.&nbsp; Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://najrancement.com/main/\">http://najrancement.com/main/</a></p>\r\n<p dir=\"ltr\">Contact No : 966 175299990</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Sika GCC - It was established in 1910. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://gcc.sika.com/en/construction/concrete/cement-additives.html\">https://gcc.sika.com/en/construction/concrete/cement-additives.html</a></p>\r\n<p dir=\"ltr\">Contact No : 966 126927079</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Arabian minerals &amp; chemical Co. - Quality products &amp; timely delivery is their main priority from 40 years of service. They deal with products like - Barite, bentonite, calcium carbonate etc.&nbsp; Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://amccksa.com/products/\">https://amccksa.com/products/</a></p>\r\n<p dir=\"ltr\">Contact No : 966 138472187</p>\r\n<p><strong id=\"docs-internal-guid-e0ff91ad-7fff-5cd6-1f38-b193c9cad0fb\"><video style=\"display: table; margin-left: auto; margin-right: auto;\" controls=\"controls\" width=\"300\" height=\"150\">\r\n<source src=\"https://www.youtube.com/shorts/7iv4ivv5EnA\"></video><br><br><br><br></strong></p>', '2023-08-03 12:35:00', NULL, '2023-09-14 10:14:23', 34),
(15, 29, '4664oil-field-chemicals-grey-box.jpg', 'Oilfield chemical industry in Kuwait ', 'The chemical industry comprises the companies that develop & produce industrial, specialty & other chemicals.', 'Oil field chemical industry\r\nOilfield chemicals\r\nDrilling fluids\r\nProduction chemicals\r\nEnhanced oil recovery (EOR)\r\nCorrosion inhibitors\r\nScale inhibitors\r\nBiocides\r\nDemulsifiers\r\nFriction reducers\r\nSurfactants\r\nEmulsifiers\r\nParaffin inhibitors\r\nAsphaltene inhibitors\r\nSand control chemicals\r\nOilfield chemical suppliers\r\nOilfield chemical applications\r\nEnvironmental impact of oilfield chemicals\r\nSafety considerations in handling oilfield chemicals\r\nOilfield chemical market trends\r\n', 'oilfield-chemical-industry-in-kuwait-', '<p dir=\"ltr\">The chemical industry comprises the companies that develop &amp; produce industrial, specialty &amp; other chemicals. Central to the modern world economy, it converts raw materials into industrial &amp; consumer products.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Chemical industry is a vast industry that incorporates all different types of product producing industries whose generation is based on heavy use of chemicals. The aim of this industry is industrial &amp; agricultural growth of the country. The products of chemical industry can divided into 3 parts - Basic chemicals&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Specialty chemicals &amp;</p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consumer chemicals&nbsp;&nbsp;</p>\r\n<p dir=\"ltr\">Basic chemicals are petrochemicals, polymers &amp; inorganics. These chemicals are produced in large quantities.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Oilfield chemicals market is worth $18B now &amp; expected to reach $29.27B by 2029. The Kuwait oilfield chemical market is expected to reach&nbsp; $706.1m by 2027.&nbsp;&nbsp;&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Oilfield chemicals are - xanthan gum, anionic polyacrylamide &amp; petroleum sulfonate.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here is the list of these chemical manufacturers &amp; suppliers in Kuwait -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">United Oil Projects - This Kuwait chemical manufacturing company established in 2005. They deal with various ranges of products.Contact details -</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.uopkt.com/products/category\">https://www.uopkt.com/products/category</a></p>\r\n<p dir=\"ltr\">Contact No : 965 23263297</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Al Khamsan Company - It&rsquo;s a marketer&nbsp; &amp; supplier of chemicals in Kuwait.&nbsp; It offers an extensive range of products as well as tailor made solutions to cover every specific application. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://alkhamsanco.com/about-us/\">http://alkhamsanco.com/about-us/</a></p>\r\n<p dir=\"ltr\">Contact No : 965 24330440</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Petrochemical Industries Company - PIC is a subsidiary of the Kuwait petroleum corporation &amp; is a petroleum industry leader in Kuwait. They have more than 50 years of experience in this industry.&nbsp; Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://www.pic.com.kw/\">https://www.pic.com.kw/</a></p>\r\n<p dir=\"ltr\">Contact No : 965 23851000</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Many names are there in this list, few of them are mentioned above.&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>', '2023-08-03 12:38:55', NULL, NULL, NULL),
(16, 29, '12713176691-1024674025.jpg', 'Cementing chemical industry in Oman', 'Cementing chemicals are raw materials that possess excellent setting & hardening properties when mixed to a paste with water.', 'Cementing chemical industry\r\nOman cement industry\r\nCementing additives\r\nOil and gas sector\r\nConstruction chemicals\r\nCementing technology\r\nCement production\r\nCementing process\r\nWell cementing\r\nCementing operations\r\nCementing equipment\r\nCementing best practices\r\nOil well cement\r\nCementing challenges\r\nCementing solutions\r\nCementing chemicals market\r\nEnvironmental considerations in cementing\r\nCementing safety measures\r\n\r\nCementing service providers in Oman\r\n\r\n\r\n\r\n', 'cementing-chemical-industry-in-oman', '<p dir=\"ltr\">A cement is a binder, a chemical substance used for construction that sets, hardens &amp; adheres to other materials to bind them together. China is the largest cement producer of the world. China consistently has produced more cement than any other country in the world for the past 18 years.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Cementing chemicals are raw materials that possess excellent setting &amp; hardening properties when mixed to a paste with water. Chemicals used to form cement are mentioned below -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Lime : Lime is calcium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Deficiency in lime reduces the strength of the property to the cement</p>\r\n<p dir=\"ltr\">Deficiency in lime causes the cement to set quickly&nbsp;</p>\r\n<p dir=\"ltr\">Excess lime makes cement unsound.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Silica : Silica is Silicon dioxide&nbsp;</p>\r\n<p dir=\"ltr\">It impacts strength to cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Alumina :&nbsp; Alumina is Aluminium oxide&nbsp;</p>\r\n<p dir=\"ltr\">Excess Alumina weakens the cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Magnesia : Magnesia is magnesium oxide&nbsp;</p>\r\n<p dir=\"ltr\">It shouldn&rsquo;t be present more than 2% in the cement</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Iron Oxide : It impacts colour to the cement</p>\r\n<p dir=\"ltr\">It acts as a flux&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">Calcium Sulphate : It slows down the setting action of cement&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Sulphur Trioxide &amp; Alkaline&nbsp;</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\">The global construction Chemical market was $49.9B in 2022 &amp; expected to reach $88.1B by 2032.&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Oman cementing chemical industry value is $558.2m &amp; expected to reach $620.9m by 2027.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">The 4 key products of this industry are portland cement, blended cement, specialty cement &amp; green cement.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here are some key players of cementing chemical in Oman -&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">ELMRR Construction Chemicals - ELMRR manufactures a broad range of construction chemicals. Their products are available all over Oman with a wide network of distributors. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://www.elmrr.com/about-us.php\">http://www.elmrr.com/about-us.php</a></p>\r\n<p dir=\"ltr\">Contact No : 968 24446914</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">National Cement PROD &amp; TRAD Co. - It was established in 1975. The company has been able to win the loyalty of its customers by providing quality products at rock bottom price. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://ncptoman.com/AboutUs.aspx?cms=iQRpheuphYtJ6pyXUGiNqiQQw2RhEtKe\">http://ncptoman.com/AboutUs.aspx?cms=iQRpheuphYtJ6pyXUGiNqiQQw2RhEtKe</a></p>\r\n<p dir=\"ltr\">Contact No : 24426838&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Al Barami group of companies - Their main priority is their client&rsquo;s needs.Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"https://albaramigroup.com/overview\">https://albaramigroup.com/overview</a></p>\r\n<p dir=\"ltr\">Contact No : 968 24583900</p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Oman Chlorine - This was established in 1998. This is located at the Sohar industrial estate in Oman. Contact details -&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website : <a href=\"http://omanchlorine.com/company-profile.php\">http://omanchlorine.com/company-profile.php</a></p>\r\n<p dir=\"ltr\">Contact No : 968 24695839&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">The list does not end here, you can prefer the Oman business directory to know more.&nbsp;&nbsp;&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">The chemical industry of the Middle East region is the main contributor to its countries GDP.This region is diversifying into the production of value added chemicals, extending beyond its traditional petrochemicals.&nbsp;&nbsp;&nbsp;</p>\r\n<p><iframe style=\"display: table; margin-left: auto; margin-right: auto;\" src=\"https://www.youtube.com/embed/siifgR7NO3M\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '2023-08-03 12:45:42', NULL, '2023-09-14 10:12:16', 34);
INSERT INTO `blog` (`id`, `uid`, `image`, `title`, `meta_description`, `meta_keyword`, `slug`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(19, 29, '5274find supplier.jpg', 'How to find a trusted chemical manufacturer and supplier online? ', 'Finding a trusted chemical manufacturer and supplier online is a challenging task. Fyndsupplier helps chemical buyers to connect DIRECTLY with 5000+ verified chemical manufacturers and suppliers to purchase quality chemicals at the MOST competitive price. ', 'Stimulation Chemical supplier,\r\nProduction Chemical supplier,\r\nMud Chemical supplier, \r\nWater Treatment Chemical supplier, 		\r\nCement Additives supplier, 		\r\nWell Completion Fluids,\r\nUtility Chemical supplier, \r\nRefineries Chemical supplier, 		\r\nIndustrial Chemical supplier,\r\ntop chemical supplier,\r\nbest chemical supplier,\r\nfind verified chemical supplier,\r\ntop chemical supplier,\r\nfind chemical supplier,\r\nfyndsupplier	,					\r\nchemical manufacturer and supplier online,\r\nverified chemical manufacturers and suppliers, \r\npurchase quality chemicals at the MOST competitive price', 'find-chemical-supplier-finding-the-right-one-for-your-chemical-purchase-need', '<p class=\"MsoNormal\">Are you in need of a reliable and reputable chemical manufacturer and supplier? &nbsp;fyndsupplier<strong> </strong>will guide you on how to find the RIGHT chemical manufacturer and supplier that meets your specific needs. By following these steps, you can ensure that you choose a supplier who provides high-quality products, excellent customer service, and competitive pricing.</p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 14pt;\"><strong>Research and Evaluation</strong></span></p>\r\n<p class=\"MsoNormal\"><strong>Identify your Requirements</strong></p>\r\n<p class=\"MsoNormal\">Before diving into the search for a chemical supplier, it is essential to clearly identify your requirements. Document the chemical specification which you need and find the category of that particular chemical,</p>\r\n<p><strong>Top Chemical Categories</strong></p>\r\n<ol>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Stimulation Chemicals</a></li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Production Chemicals</a></li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Mud Chemicals</a></li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Water Treatment Chemicals</a></li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Cement Additives</a></li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Well Completion Fluids</a></li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Utility Chemicals</a></li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Refineries Chemicals</a></li>\r\n<li class=\"MsoNormal\"><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Industrial Chemicals</a></li>\r\n<li class=\"MsoNormal\"><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">Petrochemicals</a><span style=\"mso-tab-count: 6;\"><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\">&nbsp; </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></li>\r\n</ol>\r\n<p class=\"MsoNormal\">the quantity required, and any additional purchase term you may require, such as delivery time, payment term, lead time, transporation time, packaging, denstination, and target price. This step will help you narrow down your options and find a chemical manufacturer and supplier that aligns with your needs.</p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 14pt;\"><strong>Searching Online Directories</strong></span></p>\r\n<p class=\"MsoNormal\">One of the most efficient ways to search online for a chemical manufacturer and supplier is by using online directories. These platforms provide a comprehensive list of chemical manufacturers and suppliers, allowing you to filter and narrow down your options based on your specific, and purchase terms. Some popular online directories include:</p>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\"><strong>Chemical Suppliers Directory</strong></li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">Alibaba.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">TradeIndia.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">Exportersindia.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">made-in-china.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">eChemi.com</li>\r\n<li><a href=\"../supplier\" target=\"_blank\" rel=\"noopener\"><strong>Fyndsupplier.com</strong></a></li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">chemarc.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">worldofchemicals.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">carbanio.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">knowde.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">chemondis.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">chemsec.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">chemcentral.com</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">chemicalmarket.net</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l1 level1 lfo1; tab-stops: list 36.0pt;\">chemdirect.com</li>\r\n</ul>\r\n<p class=\"MsoNormal\">By utilizing these directories, you can easily find chemical manufacturers and suppliers that specialize in your required chemicals, and procurement terms to ensure your procurement success.</p>\r\n<p class=\"MsoNormal\"><strong>Evaluate Supplier Credentials (Due Diligence of Chemical Manufacturers and Suppliers)</strong></p>\r\n<p class=\"MsoNormal\">Once you have compiled a list of potential chemical manufacturers and suppliers, it\'s time to evaluate their credentials or perform due diligence. Look for suppliers with relevant industry certifications and accreditations, such as ISO 9001, NSF, or REACH compliance. These certifications indicate that the supplier adheres to strict quality standards and regulations.<span style=\"font-size: 7.0pt; line-height: 115%; font-family: \'Segoe UI\',\'sans-serif\'; color: white;\"> </span>Ensure the supplier meets all necessary certifications and complies with industry regulations.</p>\r\n<p class=\"MsoNormal\"><strong>Consider Supplier Experience</strong></p>\r\n<p class=\"MsoNormal\">Experience plays a vital role in the chemical industry. Look for suppliers with a proven track record and years of experience in the field. An experienced supplier is more likely to understand your specific needs and provide reliable, high-quality products.</p>\r\n<p class=\"MsoNormal\"><strong>Check for Quality Assurance or Third Party Inspection (TPI) Option</strong></p>\r\n<p class=\"MsoNormal\">When it comes to chemicals, quality is non-negotiable. Ensure that the suppliers you are considering have a robust quality assurance program in place or ready to get done third party inspection (TPI). This includes thorough laboratory testing and analysis of their chemicals to guarantee their purity, potency, and safety.<span style=\"font-size: 7.0pt; line-height: 115%; font-family: \'Segoe UI\',\'sans-serif\'; color: white;\"> </span>Look for suppliers who have stringent quality control processes in place to ensure the consistency and purity of their chemicals.</p>\r\n<ul style=\"margin-top: 0cm;\" type=\"disc\">\r\n<li class=\"MsoNormal\" style=\"mso-list: l0 level1 lfo2; tab-stops: list 36.0pt;\">Documentations: Check suppliers business documentation including their business email, MSDS, TDS and Company website etc.</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l0 level1 lfo2; tab-stops: list 36.0pt;\">Delivery options: Assess their delivery capabilities and ensure they can meet your requirements in terms of timing and quantity.</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l0 level1 lfo2; tab-stops: list 36.0pt;\">Payment term: check witht supplier about available and comfortable payment term. Avoid 100% advance payment term with first time supplier. LC at sight is the more reliable payment term.&nbsp;</li>\r\n<li class=\"MsoNormal\" style=\"mso-list: l0 level1 lfo2; tab-stops: list 36.0pt;\">TPI of Production and Warehouse: Arrange for a professional third party who can visit the supplier\'s warehouse of production facility to check the real existance of supplier in discussion</li>\r\n</ul>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 14pt;\"><strong>Communication and Collaboration</strong></span></p>\r\n<p class=\"MsoNormal\"><strong>Contact Potential Suppliers</strong></p>\r\n<p class=\"MsoNormal\">Once you have identified a chemical supplier who matches your chemical specification and procurement term then you start your first level of discussion through email/ phone or WhatsApp. &nbsp;Contact them via email or phone to discuss your requirements in detail. Always discussion final offer through official email (not gmail/yahoo/hotmail etc). During these conversations, pay attention to how responsive and knowledgeable the supplier\'s representative is. Check their website and email as aligned with their domain name.&nbsp;</p>\r\n<p class=\"MsoNormal\">Do a WhatsApp live video call to see the production facility and warehouse rather than simply beilieving in pre-recorded video. Check the name of the supplier through export house data to see if they have track record of exporting chemicals.&nbsp;</p>\r\n<p class=\"MsoNormal\"><strong>Request Samples and Documentation (TDS, COA, MSDS)</strong></p>\r\n<p class=\"MsoNormal\">To assess the quality of the supplier\'s products, request samples and relevant documentation such as certificates of analysis (COA) or material safety data sheets (MSDS) or Technical Data sheet (TDS). Be care with certification/laboratory who is verifying the COA and not the supplier itself is testing party. &nbsp;This will give you a firsthand look at the quality and consistency of credentil of chemical supplier.</p>\r\n<p class=\"MsoNormal\"><strong>Compare Pricing and Terms</strong></p>\r\n<p class=\"MsoNormal\">Althrough chemical price should not be the sole determining factor, it is ONE of the MOST important factor which play an important role in chemical procurement, particularly for small service companies. &nbsp;Chemical price often becomes the make and break for a chemical procurement deal. Avoid many traders in-between and prefer to discuss with end buyers if possible. It is essential to compare pricing and terms among different suppliers to find the one who matches the target price. Consider factors such as minimum order quantities, payment terms, and any additional fees associated with shipping or special requests. Opt for a supplier who offers competitive pricing without compromising on quality.</p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 14pt;\"><strong>Final Decision and Collaboration</strong></span></p>\r\n<p class=\"MsoNormal\"><strong>Independent Customers Reference&nbsp;</strong></p>\r\n<p class=\"MsoNormal\">Before making your final decision, take the time to ask them about their previous customers and their contact to call indpdently to check about their quality and professional business practices. &nbsp;Often first time suppliers avoid to give contact of their customers but convince them to get atleast two indpendent customer contacts. This will provide valuable insights into the supplier\'s reputation, customer service, and product quality. Additionally, ask the supplier for references from their existing partner/customer in your own region to gain a better understanding of their reliability.</p>\r\n<p class=\"MsoNormal\"><strong>Secure a Trial Order</strong></p>\r\n<p class=\"MsoNormal\">To further ensure the compatibility between your business and the supplier, consider placing a trial order. This will allow you to assess the supplier\'s delivery time, packaging, and overall service. If time permit, then order a minimum quality to check everything in black and white. &nbsp;If the trial order meets your expectations, you can move forward with a long-term partnership or else drop to proceed for big orders.&nbsp;</p>\r\n<p class=\"MsoNormal\"><strong>Establish a Long-Term Relationship</strong></p>\r\n<p class=\"MsoNormal\">Once you have found the perfect chemical supplier, it is essential to establish a strong and long-term relationship. Regularly communicate your needs, provide feedback on their products and services, and maintain open lines of communication. This will help foster a mutually beneficial partnership and ensure a consistent supply of high-quality chemicals for your business.</p>\r\n<p class=\"MsoNormal\">Finding a reliable chemical supplier requires thorough research and evaluation. By utilizing online directories, leveraging search engines, attending industry events, seeking recommendations, and evaluating credentials, you can streamline your search process and choose a supplier that best fits your needs. Remember, taking the time to find the right supplier is crucial for the success of your business.<strong>&nbsp;</strong></p>\r\n<p class=\"MsoNormal\"><a href=\"../\" target=\"_blank\" rel=\"noopener\">fyndsupplier.com</a> is ONE of trusted online source of global chemical buyers, suppliers for easy safe and cost-effective chemical procurements. It helps you to connect with multiple buyers and suppliers under single domain. all suppliers and buyers are verified so Identify suppliers and partner as per your need. And save time &amp; resources.</p>\r\n<p class=\"MsoNormal\"><strong>Expand your business today. Find a trusted and verifed chemical suppliers for your chemical procurement needs. You can reach customer care of fyndsupplier at ANY TIME though their website or calling them on their WhatsApp +47 94432969</strong></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><iframe style=\"display: table; margin-left: auto; margin-right: auto;\" src=\"https://www.youtube.com/embed/WgbyUJDDJ7g\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>', '2023-09-13 18:25:21', NULL, '2023-09-14 10:03:50', 34),
(20, 29, '5179target price.png', 'How to FIND a chemical manufacturer and supplier to procure at the TARGET PRICE?', 'In an ideal world of procurement of chemicals, chemical QUALITY and specification should be the MOST important priority to make or break a procurement deal. However,Â  In the real and practical world,Â  most of the deal discussion goes after PRICE.Â ', 'negotiate chemical price, how to meet chemical supplier with meet target price, negotiate price with suppliers, find chemical suppliers, fynd supplier, fyndsupplier.com ,  fyndsuylier, ', 'how-to-find-a-chemical-manufacturer-and-supplier-to-procure-at-the-target-price-', '<p dir=\"ltr\">In an ideal world of procurement of chemicals, chemical QUALITY and specification should be the MOST important priority to make or break a procurement deal.</p>\r\n<p dir=\"ltr\"><strong>The general procure to procure chemicals is like:</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Chemical buyer prepare specification of chemical he/she want to procure</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Buyer send this specification as inquiry to existing vendors who they know already</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Buyers in the mean try to approach new suppliers or traders or WhatsApp group or other networks where there is any probability to connect with a supplier who can match the chemical specification.&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Once chemical buyer identified a supplier to match chemical specification, the next immediate discussion is about TARGET PRICE</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Once the price is settled down, discussions happen about lead time, delivery time, payment term, packaging and other needs related to successful procurement.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Certainly chemical specification and quality are TWO most important factors to choose a chemical to procure or not. However,&nbsp; In the real and practical world,&nbsp; most of the deal discussion goes after PRICE.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Once a chemical buyer has identified a chemical supplier with a reputed track record, or if buying from an existing supplier, and they are sure about material quality and specification match then the discussion goes ONLY after price.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Price is a discussion in the chemical procurement world, like price discussion in a vegetable shop which we do regularly if we go to vegetable shop to purchase verbiage for our home.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">In the price proposal and quote comparison, if you are getting very low price with any NEW supplier then that can be RED FLAG to avoid offer which looks &ldquo;Too good to be true&rdquo;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">If you are the business, you should have an ideal price of material and if you find someone offering more than 20% off in price then that can be a TRAP. Discuss your concern and access his price offer as it might be a lucrative scammer deal.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Along with price, discuss payment terms. Always choose a payment term which is trustable and mutually agreed. With a new supplier who you have not done business with in the past, preferably choose LC at sight to avoid advance payment. Before payment, do thorough due diligence of suppliers including sending any cost-effective local freelancer or third party inspection company, based on deal value.&nbsp;</p>\r\n<p><strong>&nbsp;</strong><strong>BEST PRACTISES TO NEGOTIATE PRICE</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Here are few practical advices for negotiation of chemical prices with chemical suppliers:&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Try to get as many quotes as possible to find one which can get closest to your target price.&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">It\'s always challenging to meet target price but based on other procurement priority, we can optimise our price match requirements.&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Negotiate with the supplier NOT only on price but on other terms including PAYMENT TERM.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Be careful with price offers which seems &ldquo;too good to be true&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Once you settle with specification and target price, discuss payment terms. LC is always adding some bucks as bank fee but still safer to pay than advance.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">At the end, use your common sense to access the offer by the supplier and careful analysis before making any penny as advance payment. Unless you are sure of the quality, specification and track record of the supplier, don\'t make any payment. In the real world, once the price goes out of your account, it will be impossible to bring back, so better show thorough review before making payment.&nbsp;</p>\r\n<p dir=\"ltr\">Some chemical buyers call it a RISK to make advance payment but I say that its worth it to access carefully before taking risk. Even if you have no choice to avoid this risk then try to take &ldquo;calculated risk&rdquo; but not &ldquo;blind risk&rdquo;.&nbsp;</p>\r\n<p dir=\"ltr\"><strong>Fyndsupplier.com has been an excellent chemical buyers and suppliers network which makes maximum care in verifying suppliers. There is high chance to meet a trusted supplier on fyndsupplier than anywhere else online. If you have any doubt about supplier credibility found on fyndsupplier, you can discuss with customer support at fyndsupplier to check the credibility or pride any better and mutually agreeable deal with supplier.&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong>If you have any further quality and need any advice then feel free to connect.&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong>Good luck</strong></p>\r\n<p><strong id=\"docs-internal-guid-d51ec6e7-7fff-c696-903b-bcff9dce97d8\">&nbsp;</strong></p>', '2023-09-15 09:11:47', NULL, '2023-09-16 19:29:23', 34),
(21, 29, '1962surplus chemicals.jpeg', 'GREAT OFFES on Surplus Chemicals - Globally', 'Here is a list of Surplus chemicals available for September 2023. If you need then please contact. Fyndsupplier.com is a global network for chemical manufacturers and buyers, connect chemical buyers with suppliers for easy safe and cost-effective chemical procurement. ', 'Chemicals manufacturers and suppliers, surplus chemicals, chemical supplier, oilfield chemicals, API grade chemicals, Speciality Chemicals ', 'great-offes-on-surplus-chemicals---globally', '<p>Here is a list of Surplus chemicals available for September 2023. If you need then please contact. Fyndsupplier.com is a global network for chemical manufacturers and buyers, connect chemical buyers with suppliers for easy safe and cost-effective chemical procurement.&nbsp;</p>\r\n<table style=\"height: 1772px;\" border=\"0\" width=\"1302\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"width: 538px;\" width=\"629\"><col style=\"width: 764px;\" width=\"673\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 25px;\">\r\n<td class=\"xl299\" style=\"height: 25px;\" width=\"629\" height=\"25\">Product name</td>\r\n<td class=\"xl300\" style=\"height: 25px;\" width=\"673\">Description</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl295\" style=\"height: 22px;\" height=\"21\">Polymers, Resins, Adhesives, Dye Stuff</td>\r\n<td class=\"xl297\" style=\"height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Alkyl-Phenolic Resin F 1024, 60 % in solvent naphtha</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">109800 kg, SI Group, France, 900 kg IBC, manuf. 2021 and 2022, expired</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Dyneon PFA 6503 PAZ, fluorothermoplastic powder</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">2275 kg, 3M, electrostatic powder coatings</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Dyneon PFA 6900 GZ,&nbsp; Modified PTFE Dispersion, 50 % in water</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">6120 kg, 3 M, 2 lots, metal coatings</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Dyneon TFM 5001 GZ, Modified PTFE Dispersion, 58 % in water</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">25000 kg, 3 M, 1500 kg IBC, manuf. 2021, expired, 8 lots, metal coatings</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Ebecryl 4155, Aliphatic urethane acrylate</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">3960 kg, Allnex, moisture curing UV-coatings</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">ICS-171, Vinyltrimethoxysilane, VTMO</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">9500 kg, Integrated Chemicals, 950 kg IBC, manuf. 2022 / 2, expiry 2023 / 12</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">ICS-570,, 3-Methacryloxypropyltrimethoxysilane</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">8000 kg, Integrated Chemicals, 1000 kg IBC, manuf. 2022 / 2, expiry 2023 / 12</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Inoflon AD 9500, PTFE, 60 % in water</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">10500 kg, 1000 kg IBC, manuf. 2021, 3 lots, Gujarat Fluorochemicals, metal coatings&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Joncryl 612, acrylic resin</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">100000 kg, BASF, 20.4 kg paper bag, manuf. 2022 / 7, expiry 2025 / 7, solvent-based lacquers</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Laromer PE 44 F, <span class=\"font0\">liquid polyester-modified acrylic resin</span></td>\r\n<td class=\"xl301\" style=\"height: 22px;\">1540 kg, BASF, UV curable coatings for wood, plastic</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Lupranol 2046, offspec Hydroxyl and viscosity, trifunctional polyether polyol</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">21961 kg, BASF, 1000 kg IBC, manuf. 2022 / 6, PU</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Lupranol 3202/1, offspec water, polyether polyol based on amine</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">6840 kg, BASF, 190 kg drum, manuf. 2019, PU</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Lupraphen 5608/1, offspec Hazen, difunctional, aliphatic polyester polyol</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">8000 kg, BASF, 200 kg drum, manuf. 2022 / 2, PU</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">Lupraphen 7800/1, offspec acid number, difunctional, aromatic-aliphatic polyester polyol</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">13460 kg, BASF, 1000 kg IBC, manuf. 2023 / 3, PU</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">Lupraphen 7900/1, offspec Hydroxyl and viscosity, difunctional, aromatic-aliphatic polyester polyol</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">10900 kg, BASF, 1000 kg IBC, manuf. 2023 / 3, PU</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Magonarez PF-014-AC, Acrylic resin, 40 % in water</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">9000 kg, Magonarez, Italy, interior wood applications</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Omnirad 754,&nbsp; Irgacure 754, Blend&nbsp;</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">240 kg, IGM Resins, photo polymerization of unsaturated prepolymers</td>\r\n</tr>\r\n<tr style=\"height: 83px;\">\r\n<td style=\"height: 83px;\" align=\"left\" valign=\"top\" height=\"19\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td width=\"0\" height=\"0\">&nbsp;</td>\r\n<td width=\"32\">&nbsp;</td>\r\n<td width=\"596\">&nbsp;</td>\r\n<td width=\"34\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td height=\"34\">&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><map name=\"MicrosoftOfficeMap0\"></map><img width=\"24\" height=\"26\" border=\"0\"></td>\r\n<td>&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><map name=\"MicrosoftOfficeMap1\"></map><img width=\"26\" height=\"26\" border=\"0\"></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl302\" width=\"629\" height=\"19\">Pluriol A 10 R, Allylalcohol ethoxylated</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl301\" style=\"height: 83px;\">15000 kg, BASF, 1000 kg IBC, manuf. 2023 / 1, expiry 2025 / 1</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Pluriol A 1020 E, Methyl polyethylene glycol, offspec diol content</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">14000 kg, BASF, 200 kg drum, manuf. 2023</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Printex 45 Powder, Carbon Black, Pigment Black 7</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">3675 kg, Orion, 20 kg bag, manuf. 2022 / 1</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Prussian blue, Ferric hexacyanoferrate</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">5000 kg, China, 200 kg drum, pigment</td>\r\n</tr>\r\n<tr style=\"height: 68px;\">\r\n<td style=\"height: 68px;\" align=\"left\" valign=\"top\" height=\"19\"><img width=\"2\" height=\"2\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"629\" height=\"19\">Sofiplus HZ 01ST, HFFR (Halogen Free, Flame Retardant) cross linked polyolefin (XLPO)&nbsp; compound</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl296\" style=\"height: 68px;\">25000 kg, Carbopol, Bigbag, manuf. 2023 / 1, cable insulation</td>\r\n</tr>\r\n<tr style=\"height: 117px;\">\r\n<td style=\"height: 117px;\" align=\"left\" valign=\"top\" height=\"20\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td width=\"0\" height=\"0\">&nbsp;</td>\r\n<td width=\"2\">&nbsp;</td>\r\n<td width=\"194\">&nbsp;</td>\r\n<td width=\"3\">&nbsp;</td>\r\n<td width=\"209\">&nbsp;</td>\r\n<td width=\"2\">&nbsp;</td>\r\n<td width=\"218\">&nbsp;</td>\r\n<td width=\"34\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td height=\"21\">&nbsp;</td>\r\n<td colspan=\"6\">&nbsp;</td>\r\n<td rowspan=\"3\" align=\"left\" valign=\"top\"><img width=\"26\" height=\"25\"></td>\r\n</tr>\r\n<tr>\r\n<td height=\"1\">&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><img width=\"2\" height=\"1\"></td>\r\n<td>&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAACCAYAAAB/qH1jAAAAAXNSR0IArs4c6QAAAIRlWElmTU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAACWAAAAAQAAAJYAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAASgAwAEAAAAAQAAAAIAAAAAOHp9SAAAAAlwSFlzAAAXEgAAFxIBZ5/SUgAAABxJREFUCB1jYACC////cwGxPIgNBkCOCRDPB3EA2e0M8XrluHcAAAAASUVORK5CYII=\" alt=\"srsProxyImg\" width=\"2\" height=\"1\"></td>\r\n<td>&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><img width=\"2\" height=\"1\"></td>\r\n</tr>\r\n<tr>\r\n<td height=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"629\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl298\" style=\"height: 117px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl295\" style=\"height: 22px;\" height=\"21\">Fine Chemicals and Commodities</td>\r\n<td class=\"xl297\" style=\"height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">Cyclohexane carboxylic acid</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">16000 kg, Hunan Shuangyang, 200 kg drum, manuf. 2021 / 4, expired 2022 / 4, 2 lots, Ciclopirox, Praziquantel</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Aniline, Hazen slightly offspec</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">370000 kg, BASF, bulk tank, manuf 2023</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">N-(2-Hydroxyethyl)aniline, 2-Anilinoethanol</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">4180 kg, BASF, 220 kg drum, manuf. 2021, expired, 3 lots, radical curing adhesives, radical polymerization, PU foams</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">N,N-Di-(2-Hydroxyethyl)aniline, N-Phenyldiethanolamine, N-Phenyl-2,2\'-iminodiethanol</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">5060 kg, BASF, 220 kg drum, manuf. 2021 / 6, expired, radical polymerization unsaturated polyesters, epoxy reactions.</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Sodium Ethylate 21 %, methanol offspec, sodium ethanolate, sodium ethoxide</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">22920 kg, BASF, Bulk</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Sodium Ethylate crystals, water offspec, sodium ethanolate, sodium ethoxide</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">11200 kg, BASF, 100 kg drum, 3 lots</td>\r\n</tr>\r\n<tr style=\"height: 46px;\">\r\n<td style=\"height: 46px;\" align=\"left\" valign=\"top\" height=\"19\"><img width=\"2\" height=\"2\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"629\" height=\"19\">Sodium Methylate crystals, sodium methanolate, sodium methoxide</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl296\" style=\"height: 46px;\">12000 kg, BASF, 100 kg drum, 2 lots</td>\r\n</tr>\r\n<tr style=\"height: 23px;\">\r\n<td class=\"xl294\" style=\"height: 23px;\" height=\"23\">&nbsp;</td>\r\n<td class=\"xl296\" style=\"height: 23px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl295\" style=\"height: 22px;\" height=\"21\">Salts, Oxides, Inorganic Chemicals</td>\r\n<td class=\"xl297\" style=\"height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Sipernat D17, hydrophobic precipitated silica</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">1485 kg, Evonik, 15 kg bag, manuf. 2021 / 10, expiry 2023 / 10</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Sulfuric acid 71-75 %, offspec dark brown (TOC 3000 ppm), EU only</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">2000 mt, Germany, bulk</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"20\">&nbsp;</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl295\" style=\"height: 22px;\" height=\"21\">Detergents and Special Applications</td>\r\n<td class=\"xl297\" style=\"height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">Armohib CI-219, imidazoline reaction product of tall oil fatty acid and diethylenetriamine</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">6286 kg, Nouryon, 900 kg IBC, manuf. 2021 / 3, expiry 2024 / 3, Surfactant, Lubrication, Corrosion Inhibitor&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">Dehypon E 126 BZT, modified fatty alcohol polyglycol ether, 22EO&nbsp; with Benzotriazole</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">31350 kg, BASF, 950 kg IBC, manuf. 2022 / 6, expiry 2024 / 6, 3 lots, rinse aid dishwashers</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Disponil APE, Tris(2-hydroxyethyl)methylammonium methyl sulfate</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">3920 kg, BASF, 140 kg drum, manuf. 2022 / 4, expiry 2024 / 4, for leather</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Disponil FEP 3825 PN, Tridecyl alcohol ethoxylated phosphate, potassium salt&nbsp;</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">45590 kg, BASF, 1000 kg IBC, emulsifier for emulsion polymerization, cleaners</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Emulan TO 3070, Isotridecanol ethoxylate, (30 EO), 70 % in water</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">13000 kg, BASF, 200 kg drum, expiry 2024 / 1</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Hallcomid M-8-10, N, N Dimethyl Octanamide + N,N Dimethyl Decanamide</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">60000 kg, Stepan and China, 850 kg IBC, earliest manuf. 2022 / 5, expiry 2024 / 8, dispersant</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Kost Chill EG HD Heat Transfer Fluid, Ethylene glycol</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">42680 L, Kost, US, 1041 L IBC</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl302\" style=\"height: 44px;\" height=\"19\">Methyldiethanolamine 34 %, in water, used for carbon dioxide washing, Additive 2.1 % Piperazine, minor impurities mono- and diformylpiperazine</td>\r\n<td class=\"xl301\" style=\"height: 44px;\">350 mt, BASF, bulk, carbon dioxide washing</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Phospholan PHB 14, Polyethylene glycol phenyl ether phosphate</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">31400 kg, Nouryon, 200 kg drum, manuf. 2022 / 10, 3 lots</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Plantatex HCC, Ethylenglycoldistearate and Glycosurfactants, 39 % in water</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">18000 kg, BASF, 1000 kg IBC, manuf. 2022 / 11, expiry 2023 / 11, textile care</td>\r\n</tr>\r\n<tr style=\"height: 44px;\">\r\n<td class=\"xl294\" style=\"height: 44px;\" height=\"19\">Pluriol E 8000 fused, Polyethyleneglycol 8000, PEG 8000, offspec Viscosity, <br>Hydroxyl value</td>\r\n<td class=\"xl296\" style=\"height: 44px;\">94000 kg, bulk or drums or IBC, manuf. 2023 / 6, 2 lots&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Pluriol P 4000, Polypropyleneglycol</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">4000 kg, BASF, 200 kg drum, manuf. 2022 / 11, expiry 2024 / 11</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Radia 8120 , Soybean oil, epoxidized</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">30200 kg, Oleon, 1000 kg IBC, manuf. 2021, expiry 2025, 3 lots</td>\r\n</tr>\r\n<tr style=\"height: 68px;\">\r\n<td style=\"height: 68px;\" align=\"left\" valign=\"top\" height=\"19\"><img width=\"2\" height=\"2\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"629\" height=\"19\">Tamol DLX Solution, Formaldehyde-Phenol-Dihydroxyphenyl sulfone polymer, 40 % in water</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl296\" style=\"height: 68px;\">1000 mt / y, BASF, bulk, dispersing agent</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Thickener 8760, Sterocoll 8760</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">16000 kg, BASF, 1000 kg IBC, expired 2022 / 11, paper production</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"20\">&nbsp;</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl295\" style=\"height: 22px;\" height=\"21\">API and Excipients, Food, Feed, Agrochemicals</td>\r\n<td class=\"xl297\" style=\"height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">Librel Mg, Magnesium disodium ethylenediaminetetraacetate</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">7000 kg, BASF, 700 kg bigbag, manuf. 2018 / 3, expiry 2025 / 3, 3 lots</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl294\" style=\"height: 22px;\" height=\"19\">Phytosterols TG, ADM (85%)</td>\r\n<td class=\"xl296\" style=\"height: 22px;\">21000 kg, ADM, Archer Daniel Midlands, US, big bag,&nbsp; manuf. 2018, expired 2023, many lots</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td class=\"xl302\" style=\"height: 22px;\" height=\"19\">PRUV, Sodium Stearyl Fumarate</td>\r\n<td class=\"xl301\" style=\"height: 22px;\">8250 kg, JRS Pharma, Spain, cardbox, manuf. 2022 / 3, expiry 2025 / 3</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2023-09-21 11:03:21', NULL, NULL, NULL);
INSERT INTO `blog` (`id`, `uid`, `image`, `title`, `meta_description`, `meta_keyword`, `slug`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(22, 108, '4109surplus .jpeg', 'Surplus Chemicals - Globally - August 2023', 'There is a list of surplus chemicals available with us to supply. These chemicals are from reputed chemical manufacturers and suppliers form multiple origins. ', 'Polymers, Resin, Adhesive, Dyes, chemical manufacturers and suppliers, fine chemicals, commodity chemicals manufacturers and suppliers, speciality chemicals manufacturers and suppliers. ', 'surplus-chemicals---globally---august-2023', '<p>Fyndsupplier.com being a network of chemical manufacturers, suppliers, traders, distributors and buyers, helps buyers to procure quality chemicals at the MOST competitive prices. We connect chemical suppliers with buyers DIRECTLY.&nbsp;</p>\r\n<p>Here are list of surplus chemicals from August 2023</p>\r\n<table style=\"width: 1304px;\" border=\"0\" width=\"1304\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"width: 503px;\" width=\"631\"><col style=\"width: 461px;\" width=\"673\"><col style=\"width: 167px;\"><col style=\"width: 22px;\"><col style=\"width: 11px;\"><col style=\"width: 11px;\"><col style=\"width: 43px;\"><col style=\"width: 84px;\"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td class=\"xl299\" width=\"631\" height=\"25\">Product name</td>\r\n<td class=\"xl300\" style=\"width: 336.5px;\" width=\"673\">Description</td>\r\n<td style=\"width: 168.25px;\">&nbsp;</td>\r\n<td style=\"width: 21.03125px;\">&nbsp;</td>\r\n<td style=\"width: 10.515625px;\">&nbsp;</td>\r\n<td style=\"width: 10.515625px;\">&nbsp;</td>\r\n<td style=\"width: 42.0625px;\">&nbsp;</td>\r\n<td style=\"width: 84.125px;\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl295\" height=\"21\">Polymers, Resins, Adhesives, Dye Stuff</td>\r\n<td class=\"xl297\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Alkyl-Phenolic Resin F 1024, 60 % in solvent naphtha</td>\r\n<td class=\"xl296\">109800 kg, SI Group, France, 900 kg IBC, manuf. 2021 and 2022, expired</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Citrofol B1, Tributyl citrate</td>\r\n<td class=\"xl296\">6000 kg, Jungbunzlauer, Germany, IBC. Plasticizer</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">DCC Yellow GPC, Pigment Yellow 97</td>\r\n<td class=\"xl301\">1260 kg, DCL, Canada, expired</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">ICS-171, Vinyltrimethoxysilane, VTMO</td>\r\n<td class=\"xl301\">9500 kg, Integrated Chemicals, 950 kg IBC, manuf. 2022 / 2, expiry 2023 / 12</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">ICS-570,, 3-Methacryloxypropyltrimethoxysilane</td>\r\n<td class=\"xl301\">8000 kg, Integrated Chemicals, 1000 kg IBC, manuf. 2022 / 2, expiry 2023 / 12</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Lupranol 2046, offspec Hydroxyl and viscosity, trifunctional polyether polyol</td>\r\n<td class=\"xl296\">21961 kg, BASF, 1000 kg IBC, manuf. 2022 / 6, PU</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Lupranol 3202/1, offspec water, polyether polyol based on amine</td>\r\n<td class=\"xl296\">6840 kg, BASF, 190 kg drum, manuf. 2019, PU</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Lupraphen 5608/1, offspec Hazen, difunctional, aliphatic polyester polyol</td>\r\n<td class=\"xl296\">8000 kg, BASF, 200 kg drum, manuf. 2022 / 2, PU</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Lupraphen 7800/1, offspec acid number, difunctional, aromatic-aliphatic polyester polyol</td>\r\n<td class=\"xl296\">13460 kg, BASF, 1000 kg IBC, manuf. 2023 / 3, PU</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Lupraphen 7900/1, offspec Hydroxyl and viscosity, difunctional, aromatic-aliphatic polyester polyol</td>\r\n<td class=\"xl296\">10900 kg, BASF, 1000 kg IBC, manuf. 2023 / 3, PU</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">PHBV ENMAT Y1000, PHB-PHV-Copolymer, Poly (hydroxybutyrate-hydroxyvalerate)</td>\r\n<td class=\"xl296\">20000 kg, Tianan, injection molding, thermoforming, blown films, extrusions</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">PLA Ingeo 4060D, Polylactide</td>\r\n<td class=\"xl296\">15000 kg, Natureworks, extrusion</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\" height=\"19\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td width=\"0\" height=\"0\">&nbsp;</td>\r\n<td width=\"32\">&nbsp;</td>\r\n<td width=\"598\">&nbsp;</td>\r\n<td width=\"33\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td height=\"32\">&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><map name=\"MicrosoftOfficeMap0\"></map><img width=\"24\" height=\"24\" border=\"0\"></td>\r\n<td>&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><map name=\"MicrosoftOfficeMap1\"></map><img width=\"25\" height=\"24\" border=\"0\"></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"631\" height=\"19\">PLA Luminy L 130, high heat, medium flow Polylactide</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl296\">10000 kg, Total Corbion,&nbsp; injection molding, fiber spinning</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">PLA Luminy LX 175, high viscosity, low flow, amorphous, transparent Polylactide</td>\r\n<td class=\"xl296\">5000 kg, Total Corbion, film extrusion, thermoforming, fiber spinning</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">PLA Luminy LX 930, medium viscosity, medium flow, fiber-grade Polylactide</td>\r\n<td class=\"xl296\">20000 kg, Total Corbion, extrusion spinning, component in sheath-core</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Pluriol A 1020 E, Methyl polyethylene glycol, offspec diol content</td>\r\n<td class=\"xl301\">14000 kg, BASF, 200 kg drum, manuf. 2023</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Printex 45 Powder, Carbon Black, Pigment Black 7</td>\r\n<td class=\"xl301\">3675 kg, Orion, 20 kg bag, manuf. 2022 / 1</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Prussian blue, Ferric hexacyanoferrate</td>\r\n<td class=\"xl296\">5000 kg, China, 200 kg drum, pigment</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Sofiplus HZ 01ST, HFFR (Halogen Free, Flame Retardant) cross linked polyolefin (XLPO)&nbsp; compound</td>\r\n<td class=\"xl301\">25000 kg, Carbopol, Bigbag, manuf. 2023 / 1, cable insulation</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\" height=\"20\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td width=\"0\" height=\"0\">&nbsp;</td>\r\n<td width=\"2\">&nbsp;</td>\r\n<td width=\"194\">&nbsp;</td>\r\n<td width=\"3\">&nbsp;</td>\r\n<td width=\"209\">&nbsp;</td>\r\n<td width=\"2\">&nbsp;</td>\r\n<td width=\"220\">&nbsp;</td>\r\n<td width=\"2\">&nbsp;</td>\r\n<td width=\"31\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td height=\"2\">&nbsp;</td>\r\n<td colspan=\"6\">&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><img width=\"2\" height=\"2\"></td>\r\n</tr>\r\n<tr>\r\n<td height=\"17\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td height=\"21\">&nbsp;</td>\r\n<td colspan=\"6\">&nbsp;</td>\r\n<td colspan=\"2\" rowspan=\"3\" align=\"left\" valign=\"top\"><img width=\"25\" height=\"26\"></td>\r\n</tr>\r\n<tr>\r\n<td height=\"3\">&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><img width=\"2\" height=\"2\"></td>\r\n<td>&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAAXNSR0IArs4c6QAAAIRlWElmTU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAACWAAAAAQAAAJYAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAASgAwAEAAAAAQAAAAQAAAAAtzqI6AAAAAlwSFlzAAAXEgAAFxIBZ5/SUgAAACNJREFUCB1jYMAG/v//LwrE9nA5EAeI94MEmKCir4H0ARAbAMzKDvSO74ydAAAAAElFTkSuQmCC\" alt=\"srsProxyImg\" width=\"2\" height=\"2\"></td>\r\n<td>&nbsp;</td>\r\n<td align=\"left\" valign=\"top\"><img width=\"2\" height=\"2\"></td>\r\n</tr>\r\n<tr>\r\n<td height=\"11\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"631\" height=\"20\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl298\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl295\" height=\"21\">Fine Chemicals and Commodities</td>\r\n<td class=\"xl297\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">4-Amino-2-nitrotoluene, 2-Nitro-4-toluidine, Fast Scarlet G Base</td>\r\n<td class=\"xl296\">4233 kg, Saltigo, metal drum, manuf. 2008</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Cyclohexane carboxylic acid</td>\r\n<td class=\"xl296\">16000 kg, Hunan Shuangyang, 200 kg drum, manuf. 2021 / 4, expired 2022 / 4, 2 lots, Ciclopirox, Praziquantel</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Morpholine, 99 %, no sales in Europe</td>\r\n<td class=\"xl301\">86400 kg, BASF, Germany, 200 kg metal drum, manuf. 2023 / 6, 4 lots</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Pyrrolidine, Apha 500 offspec</td>\r\n<td class=\"xl296\">10000 kg, BASF, Bulk</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Sodium Ethylate 21 %, methanol offspec, sodium ethanolate, sodium ethoxide</td>\r\n<td class=\"xl296\">22920 kg, BASF, Bulk</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Sodium Ethylate crystals, water offspec, sodium ethanolate, sodium ethoxide</td>\r\n<td class=\"xl296\">11200 kg, BASF, 100 kg drum, 3 lots</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Sodium Methylate 30 %, sodium methanolate, sodium methoxide</td>\r\n<td class=\"xl296\">184000 kg, BASF, 900 kg IBC</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Sodium Methylate crystals, sodium methanolate, sodium methoxide</td>\r\n<td class=\"xl296\">12000 kg, BASF, 100 kg drum, 2 lots</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\" height=\"23\"><img width=\"2\" height=\"1\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"631\" height=\"23\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl296\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl295\" height=\"21\">Salts, Oxides, Inorganic Chemicals</td>\r\n<td class=\"xl297\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Sipernat D17, hydrophobic precipitated silica</td>\r\n<td class=\"xl296\">1485 kg, Evonik, 15 kg bag, manuf. 2021 / 10, expiry 2023 / 10</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Sulfuric acid 71-75 %, offspec dark brown (TOC 3000 ppm), EU only</td>\r\n<td class=\"xl296\">2000 mt, Germany, bulk</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"20\">&nbsp;</td>\r\n<td class=\"xl296\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl295\" height=\"21\">Detergents and Special Applications</td>\r\n<td class=\"xl297\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Dehypon E 126 BZT, modified fatty alcohol polyglycol ether, 22EO&nbsp; with Benzotriazole</td>\r\n<td class=\"xl296\">31350 kg, BASF, 950 kg IBC, manuf. 2022 / 6, expiry 2024 / 6, 3 lots, rinse aid dishwashers</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Disponil APE, Tris(2-hydroxyethyl)methylammonium methyl sulfate</td>\r\n<td class=\"xl296\">3920 kg, BASF, 140 kg drum, manuf. 2022 / 4, expiry 2024 / 4, for leather</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Disponil FEP 3825 PN, Tridecyl alcohol ethoxylated phosphate, potassium salt&nbsp;</td>\r\n<td class=\"xl296\">45590 kg, BASF, 1000 kg IBC, emulsifier for emulsion polymerization, cleaners</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Thickener 8760, Sterocoll 8760</td>\r\n<td class=\"xl301\">16000 kg, BASF, 1000 kg IBC, expired 2022 / 11, paper production</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Armohib CI-219, imidazoline reaction product of tall oil fatty acid and diethylenetriamine</td>\r\n<td class=\"xl301\">6286 kg, Nouryon, 900 kg IBC, manuf. 2021 / 3, expiry 2024 / 3, Surfactant, Lubrication, Corrosion Inhibitor&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Emulan TO 3070, Isotridecanol ethoxylate, (30 EO), 70 % in water</td>\r\n<td class=\"xl301\">13000 kg, BASF, 200 kg drum, expiry 2024 / 1</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Phospholan PHB 14, Polyethylene glycol phenyl ether phosphate</td>\r\n<td class=\"xl301\">31400 kg, Nouryon, 200 kg drum, manuf. 2022 / 10, 3 lots</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Pluriol P 4000, Polypropyleneglycol</td>\r\n<td class=\"xl301\">4000 kg, BASF, 200 kg drum, manuf. 2022 / 11, expiry 2024 / 11</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Pluriol E 8000 fused, Polyethyleneglycol 8000, PEG 8000, offspec Viscosity, <br>Hydroxyl value</td>\r\n<td class=\"xl301\">94000 kg, bulk or drums or IBC, manuf. 2023 / 6, 2 lots&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align=\"left\" valign=\"top\" height=\"19\"><img width=\"2\" height=\"2\">\r\n<table cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"xl294\" width=\"631\" height=\"19\">Tamol DLX Solution, Formaldehyde-Phenol-Dihydroxyphenyl sulfone polymer, 40 % in water</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td class=\"xl296\">1000 mt / y, BASF, bulk, dispersing agent</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"20\">&nbsp;</td>\r\n<td class=\"xl296\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl295\" height=\"21\">API and Excipients, Food, Feed, Agrochemicals</td>\r\n<td class=\"xl297\">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Ac-Di-Sol SD-711, Croscarmellose Sodium, Sodium carboxymethyl cellulose</td>\r\n<td class=\"xl301\">18900 kg, Dupont, 450 kg bigbag, manuf. 2022 / 2, expiry 2025 / 2</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Aerosil 200 Pharma, Silicon dioxide</td>\r\n<td class=\"xl301\">5400 kg, Evonik, 10 kg bag, manuf. 2022 / 8, expiry 2024 / 7</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">AGNIQUE MBL 510H, emulsifier blend</td>\r\n<td class=\"xl296\">27000 kg, BASF, hydrophilic emulsifier for agro formulations</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">AGNIQUE MBL 530B</td>\r\n<td class=\"xl296\">23000 kg, BASF, emulsifier for agro formulations</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Avicel PH-102, Cellulose microcrystalline</td>\r\n<td class=\"xl301\">103500 kg, Dupont, 450 kg bigbag, manuf. 2022 / 5, expiry 2026 / 5</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">DODINE 400SC (Dodine, 400 g/L)</td>\r\n<td class=\"xl296\">20000 kg, Agrokemia, fungicide</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">FlowLac 90 MS, Lactose Monohydrate</td>\r\n<td class=\"xl301\">65250 kg, Meggle, 750 kg bigbag, manuf. 2022 / 4, expiry 2024 / 4</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">FlowLac 90 MS, Lactose Monohydrate</td>\r\n<td class=\"xl301\">19200 kg, Meggle, cardbox, manuf. 2021 / 8, expiry 2023 / 8</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Librel Mg, Magnesium disodium ethylenediaminetetraacetate</td>\r\n<td class=\"xl301\">7000 kg, BASF, 700 kg bigbag, manuf. 2018 / 3, expiry 2025 / 3, 3 lots</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">Palm Mix unsat., sat., Palm oil, hydrogenated</td>\r\n<td class=\"xl301\">50000 kg, BASF, bulk tank, manuf. 2023 / 7&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">Phytosterols TG, ADM (85%)</td>\r\n<td class=\"xl296\">21000 kg, ADM, Archer Daniel Midlands, US, big bag,&nbsp; manuf. 2018, expired 2023, many lots</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl302\" height=\"19\">PRUV, Sodium Stearyl Fumarate</td>\r\n<td class=\"xl301\">8250 kg, JRS Pharma, Spain, cardbox, manuf. 2022 / 3, expiry 2025 / 3</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"xl294\" height=\"19\">QUIZALOFOP-TEFURYL</td>\r\n<td class=\"xl296\">20000 kg, herbicide</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>If you require any of these chemicals then please contact fyndsupplier customer support.&nbsp;</p>', '2023-09-21 21:42:44', NULL, '2023-09-21 21:47:41', 34),
(23, 29, '4495AceticAcid.webp', 'TOP 10 ACETIC ACID MANUFACTURER & SUPPLIER ', 'A new way of efficient, profitable, and hassle-free business networking and acetic acid chemical procurement.  to connect with 1000+ verified Acetic Acid chemical suppliers globly sign up now !\r\n', 'Stimulation Chemicals, Production Chemicals, Mud Chemicals, Water Treatment Chemicals, Cement Additives		Well Completion Fluids, Utility Chemicals, Refineries Chemicals, Industrial Chemicals, acetic acid supplier, top acetic acid supplier, verified acetic acid supplier, acetic acid supplier contact details, order acetic acid, buy acetic acid , acetic acid supplier in India , acetic acid supplier in Oman, acetic acid supplier in china, acetic acid buyer			\r\n', 'top-10-manufacturer-supplier-of-acetic-acid-', '<p><strong>We will Transform the way you do business in the chemical industry with our professional and verified <a href=\"../supplier\">ACETIC ACID chemical Suppliers</a> and Buyers on&nbsp;<a href=\"../\">fyndsupplier.com</a> . Seamlessly connect with industry leaders, streamline your procurement, and boost your sales.</strong></p>\r\n<p dir=\"ltr\"><strong>Acetic Acid</strong></p>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Definition, uses, manufacturers &amp; suppliers from the world)</p>\r\n<p dir=\"ltr\">Acetic acid is also known as ethanoic acid. It&rsquo;s an acidic, colorless liquid &amp; organic compound.&nbsp; The chemical formula of this is CH3COOH.&nbsp;</p>\r\n<p dir=\"ltr\">Acetic acid is used in the preparation of metal acetates, printing processes, vinyl acetate, and making photographic films and textiles. It is also used in the medical field &ndash; acetic acid injection used to treat cancer since 1800s, also used for cervical cancer screening.&nbsp;</p>\r\n<p dir=\"ltr\">China is the leading producer of acetic acid in the world.&nbsp;</p>\r\n<p dir=\"ltr\">The global acetic acid market size was $19.76 billion in 2022 &amp; expected to be $32.65 billion by 2032.&nbsp;&nbsp;</p>\r\n<p dir=\"ltr\">Here are the <a href=\"../chemical-all\">top 10 manufacturers &amp; suppliers of acetic acid across</a> the world. &ndash;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Pure Chemical</strong>s &ndash; With 41 years of experience they deliver excellent results. They have specialty chemicals, lab, textile, oilfield &amp; leather chemicals etc. They are leading multinational &amp; domestic petrochemical companies as distributors.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://www.pure-chemical.com/\">https://www.pure-chemical.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 91 73388205509</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Kakadiya Chemicals &ndash;</strong> This Gujarat-based chemical manufacturer, supplier and exporter Company was established in 1998 It has acetic acid, hydrogen peroxide, ferric chloride, industrial dyes, nitric acid, phosphoric acid etc. in their product list.&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://www.kakdiyachemicals.com/\">https://www.kakdiyachemicals.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 8048113518</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Vizag Chemicals &ndash; </strong>It&rsquo;s a chemical manufacturing company, especially for the marine industry, they are in this business for 12 years.&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"http://www.vizagchemical.com/\">http://www.vizagchemical.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 7399940888</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Finar Chemicals &ndash;</strong> They supply pharmaceuticals, laboratory chemicals, food-grade additives etc. They have a customer base across 50 countries.&nbsp;&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://www.finarchemicals.com/aboutus\">https://www.finarchemicals.com/aboutus</a></p>\r\n<p dir=\"ltr\">Call - 91 - 2717 &ndash; 616717</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Sheetal Chemicals &ndash;</strong> It&rsquo;s a trustworthy chemical distributor in India &amp; international market since 1997. They have products like Ammonium Molybdate, Benzaldehyde, Benzoic acid, Benzophenone, Boric Acid Powder etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://sheetalchemicals.com/\">https://sheetalchemicals.com/</a></p>\r\n<p dir=\"ltr\">Call - 91-022-28058587</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"6\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Siag Chemicals &ndash;</strong> They have 50+ years of experience &amp; diversified product range.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://www.siagchemicals.com/index.pl/Home\">https://www.siagchemicals.com/index.pl/Home</a></p>\r\n<p dir=\"ltr\">Call - (+20) 01005386813</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"7\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Innova Corporate &ndash; </strong>It&rsquo;s a renowned name in the water treatment chemical industry &amp; also provides Effluent Treatment plant chemicals, Reverse Osmosis Plant Chemicals, Swimming Pool Chemicals, DM Plant Chemicals, Sewage Treatment Plant Chemicals etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"http://www.innovawatertreatment.com/Egypt/index.html\">http://www.innovawatertreatment.com/Egypt/index.html</a></p>\r\n<p dir=\"ltr\">Call - +91 9911981992</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"8\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Echemi &ndash;</strong> It&rsquo;s a chemical supply chain service company in Hong Kong. They supply chemicals as well as provide a market analysis of 500+ raw materials on a weekly basis. Their products are Propylene Glycol, Dimethyl Carbonate, Adipic Acid etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://www.echemi.com/\">https://www.echemi.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 86 53255729510</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"9\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Univer Solutions &ndash; </strong>They have captured the market in various industries like beauty &amp; personal care, food ingredients, pharmaceutical industries, home care &amp; cleaning products etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://discover.univarsolutions.com/en-fr/\">https://discover.univarsolutions.com/en-fr/</a></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"10\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Servochem &ndash;</strong> With 40 years of excellence they offer technical service, blending &amp; toiling service, drumming facility, storage facility, chemical distribution etc.&nbsp; In chemical distribution, they provide water treatment, petrochemicals, oil &amp; gas, construction &amp; specialty chemicals.&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://www.servochem.com/\">https://www.servochem.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 971 43331693</p>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\"><strong>If you don&rsquo;t have the clarity yet, choose us to fulfill your needs:&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong>Fyndsupplier - <a href=\"../\">https://fyndsupplier.com/</a></strong></p>\r\n<p><strong><br>Our platform uncovers hidden opportunities, streamlines sourcing, and supercharges your sales efforts. Whether you\'re a supplier looking for <a href=\"../supplier\">Acetic Acid buyers </a>or a buyer seeking reliable suppliers for <a href=\"../supplier\">Acetic Acid buyers</a>, www.<a href=\"../\">fyndsupplier.com</a> is your gateway to success.&nbsp;</strong></p>\r\n<p><strong>Join <a href=\"../\">fyndsupplier</a> today and experience a new way of efficient, profitable, and hassle-free business networking. &nbsp;to connect with 1000+ verified <a href=\"../chemical-all\">Acetic Acid chemical suppliers</a> globally. Here you can easily reach suppliers across the world &amp; compare prices according to your budget sign up now !</strong></p>\r\n<h3><strong>Visit our website <a href=\"../\">fyndsupplier.com</a> or contact us at WHATSAPP &nbsp;+91 8882335624</strong></h3>', '2023-09-22 10:52:54', NULL, '2023-09-22 19:41:41', 34);
INSERT INTO `blog` (`id`, `uid`, `image`, `title`, `meta_description`, `meta_keyword`, `slug`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(24, 29, '5851Barium Sulphate supplier buyer.webp', 'TOP 10 BARIUM SULPHATEÂ Â MANUFACTURER & SUPPLIER ', 'Connecting you with a verified network ok Barium Sulphate buyer suppliers from various industries and regions. This extensive network increases your chances of finding the ideal Barium Sulphate   buyer or supplier to meet your specific business goals.\r\n', 'barium sulphate supplier, top barium sulphate supplier, verified barium sulphate supplier, barium sulphate supplier contact details, order barium sulphate, buy barium sulphate, barium sulphate supplier in India, barium sulphate supplier in Oman, barium sulphate supplier in china, barium sulphate buyer,Stimulation Chemicals, Production Chemicals, Mud Chemicals, Water Treatment Chemicals, Cement Additives Well Completion Fluids, Utility Chemicals, Refineries Chemicals, Industrial Chemicals', 'top-10-barium-sulphate-manufacturer-supplier-of-', '<p class=\"MsoNormal\" style=\"text-align: center; line-height: normal;\" align=\"center\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><strong>Fyndsupplier</strong> your gateway to a robust network of industry leaders<strong> <a href=\"../supplier\">Barium Sulphate buyer and suppliers</a></strong>, ensuring that you can source or provide <strong>high-purity</strong> Barium Sulphate efficiently and with confidence. Whether you\'re a manufacturer seeking a consistent and <a href=\"../supplier\"><strong>reputable supplier</strong></a> or a supplier want to expand your reach and collaborate with quality-conscious <strong>verified buyers</strong>, fyndsupplier.com offers the ideal place for your requirements.</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Definition, uses, manufacturers &amp; suppliers from the world)</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\"><strong>Barium sulphate </strong>(BaSo4) is an inorganic compound &amp; a white crystalline solid that is odorless &amp; insoluble in water.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">&nbsp;Barium sulphate is used in drilling fluids &amp; also used medical field to diagnose or find problems in the esophagus, stomach &amp; bowels.&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">&nbsp;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">The global barium sulphate market size is $1434.5 million in 2023 &amp; expected to be $2381.5 million in 2033.&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"text-decoration: underline;\"><strong><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black; text-decoration: underline;\">Here are the top 10 manufacturers &amp; suppliers of <a href=\"../chemical-all\">barium sulphate</a> across the world. &ndash;</span></strong></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 18.0pt; text-indent: -18.0pt; line-height: normal; mso-list: l1 level1 lfo1; tab-stops: list 36.0pt; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">1.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\"> &nbsp;</span></span></span><span style=\"color: black;\">Britex Enterprise </span></strong><span style=\"color: black;\"><strong>&ndash; </strong>This Delhi based company is a reputable manufacturer, exporter &amp; supplier of mineral powders.&nbsp; They also have whiting chalk powder, fine particle calcium, limestone powder etc.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website - </span><a href=\"https://www.britexenterprises.net/\"><span style=\"color: blue;\">https://www.britexenterprises.net/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; +91-9311580480</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l5 level1 lfo2; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">2.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style=\"color: black;\">Chaitanya Chemicals &ndash;</span><span style=\"color: black;\"> They have 30 years of experience &amp; have customers over 15 countries. It&rsquo;s based on Andhra Pradesh.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website &ndash;</span><span style=\"color: black;\"> </span><a href=\"http://www.chaitanyachemicals.com/\"><span style=\"color: blue;\">http://www.chaitanyachemicals.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 91 9397819303</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l0 level1 lfo3; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">3.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\">&nbsp;</span></span></span><span style=\"color: black;\">Amgeen Minerals </span></strong><span style=\"color: black;\"><strong>&ndash;</strong> It&rsquo;s one of the manufacturer &amp; distributor of industrial minerals &amp; chemicals. With 50 years of experience they supply high quality Calcium Carbonate, Dolomite, Kaolins, Barytes, Soapstone, China Clay etc.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website &ndash; </span><a href=\"https://www.amgeenminerals.com/\"><span style=\"color: blue;\">https://www.amgeenminerals.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 8045800128</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l8 level1 lfo4; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">4.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\">&nbsp;</span></span></span><span style=\"color: black;\">Ennore India Chemicals &ndash;</span></strong><span style=\"color: black;\"> With 12 years of experience they have more than 15 international business partners to grow this business. They specialized in marine chemicals.&nbsp;&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website - </span><a href=\"http://ennoreindiachemicals.com/\"><span style=\"color: blue;\">http://ennoreindiachemicals.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 7399940666</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l9 level1 lfo5; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">5.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\"> &nbsp;</span></span></span><span style=\"color: black;\">Brenntag </span></strong><span style=\"color: black;\"><strong>&ndash; </strong>They deal with specialty &amp; industrial chemicals. They serve in 72 countries worldwide.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website - </span><a href=\"https://www.brenntag.com/en-in/\"><span style=\"color: blue;\">https://www.brenntag.com/en-in/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 91 124 452 5600</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l4 level1 lfo6; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">6.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\"> I</span></span></span><span style=\"color: black;\">nnova Corporate </span></strong><span style=\"color: black;\"><strong>&ndash;</strong> This is a ISO certified company started in 2005. They deal with Water Treatment, Effluent Treatment, Sewage Treatment Plant, R.O. Plant, DM Plant Chemicals, Decolouring Agent, Activated Carbon etc.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website &ndash; </span><a href=\"http://www.innovacorporate.com/index.html\"><span style=\"color: blue;\">http://www.innovacorporate.com/index.html</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 91 9911981992</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l6 level1 lfo7; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">7.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\">&nbsp;</span></span></span><span style=\"color: black;\">Nike Fine Chemicals &ndash;</span></strong><span style=\"color: black;\"> It&rsquo;s a manufacturer &amp; distributor of laboratory chemicals, industrial chemical, and solvent &amp; laboratory instruments. This ISO certified company exports their products to Zambia, Kenya, Ethiopia, Egypt and Sri Lanka, Bhutan, Bangladesh, Nepal &amp; many other countries.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website &ndash; </span><a href=\"https://www.nikechemicalindia.com/\" aria-invalid=\"true\"><span style=\"color: blue;\">https://www.nikechemicalindia.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 9997778090</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l7 level1 lfo8; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">8.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\"> </span></span></span><span style=\"color: black;\">Chemi Enterprises &ndash;</span></strong><span style=\"color: black;\"><strong> </strong>It was established in 1989. They offer Lithophone Chemicals, <a href=\"../chemical-all\">Barium Stearate</a> Chemicals and Barite Oil Drilling Chemicals etc. They continuously grow their business with skilled professionals and well-equipped infrastructure.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website &ndash; </span><a href=\"https://www.chemienterprises.in/\"><span style=\"color: blue;\">https://www.chemienterprises.in/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 8048951645</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l3 level1 lfo9; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">9.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\"> </span></span></span><span style=\"color: black;\">Astrra Chemicals&nbsp;</span></strong><span style=\"color: black;\"><strong>&ndash; </strong>This Chennai based company was established in 1992 &amp; is a manufacturer, supplier, whole seller, exporter etc.&nbsp; They manufacture construction, antioxidants &amp; aromatic chemicals.&nbsp;&nbsp;&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website &ndash; </span><a href=\"https://astrrachemicals.com/\"><span style=\"color: blue;\">https://astrrachemicals.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 9940423947</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><br style=\"mso-special-character: line-break;\"><!-- [if !supportLineBreakNewLine]--><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 0cm; text-indent: 0cm; line-height: normal; mso-list: l2 level1 lfo10; vertical-align: baseline;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLists]--><strong><span style=\"color: black;\"><span style=\"mso-list: Ignore;\">10.<span style=\"font-style: normal; font-variant: normal; font-stretch: normal; line-height: normal;\">&nbsp;</span></span></span><!--[endif]--></strong><span style=\"color: black;\"><strong>CDH &ndash; </strong>They are serving the industry with the largest range of laboratory fine chemicals. They are manufacturing nearly 9000 products with ISO, GMP, CE certifications.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">Website &ndash; </span><a href=\"https://www.cdhfinechemical.com/\"><span style=\"color: blue;\">https://www.cdhfinechemical.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 91 1149404040</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">You can also prefer these &ndash;&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">&bull;</span><span style=\"color: black;\"><span style=\"mso-tab-count: 1;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span style=\"color: black;\">Arasuri Enterprise &ndash; </span><a href=\"https://www.aarasurienterprise.com/\"><span style=\"color: blue;\">https://www.aarasurienterprise.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call - 9727508652</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">&bull;</span><span style=\"color: black;\"><span style=\"mso-tab-count: 1;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span style=\"color: black;\">Kanha Bio Fuel &amp; Minerals &ndash; </span><a href=\"https://www.kanhabio.com/\"><span style=\"color: blue;\">https://www.kanhabio.com/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 8048954548</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><span style=\"color: black;\">&bull;</span><span style=\"color: black;\"><span style=\"mso-tab-count: 1;\"> &nbsp;</span></span><span style=\"color: black;\">Alpha Chemika &ndash; </span><a href=\"https://www.alphachemika.co/\"><span style=\"color: blue;\">https://www.alphachemika.co/</span></a></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Call &ndash; 91 9820385757</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-bottom: .0001pt; line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: center; line-height: normal;\" align=\"center\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\">fyndsupplier.com promotes a global reach, connecting you with a diverse range of potential<a href=\"../inquiry-all\"> Barium Sulphate buyer </a>suppliers from various industries and regions. This extensive network increases your chances of finding the ideal <a href=\"../supplier\">Barium Sulphate<span style=\"mso-spacerun: yes;\">&nbsp;</span>buyer</a> or supplier to meet your specific business goals.</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif; color: black;\">Here you can easily reach suppliers across the world &amp; compare prices according to your budget.&nbsp; <a href=\"../\">Signup</a> now <span style=\"mso-spacerun: yes;\">&nbsp;</span>or contact us on <a href=\"http://wa.me/918882335624\">Whatsapp &ndash; 47 94432969</a>.&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; line-height: 115%; font-family: \'Times New Roman\',\'serif\'; mso-fareast-font-family: \'Times New Roman\'; mso-fareast-language: EN-IN;\"><br><br><br><br><br style=\"mso-special-character: line-break;\"><span style=\"font-size: 18pt; font-family: \'times new roman\', times, serif;\"><!-- [if !supportLineBreakNewLine]--></span><br style=\"mso-special-character: line-break;\"><!--[endif]--></span></p>', '2023-09-23 10:22:09', NULL, '2023-09-26 20:10:38', 34),
(25, 29, '6375Bentonite.webp', 'TOP 10 BENTONITE MANUFACTURER & SUPPLIER ', 'Your go-to source for insightful information and updates in the world of Bentonite trade. Whether you\'re a buyer looking to source high-quality Bentonite or a supplier seeking to connect with potential customers, this blog is your helpful source to make some decision', 'bentonite supplier, top Bentonite supplier, verified Bentonite supplier, Bentonite supplier contact details, order Bentonite, buy Bentonite chemical online, Bentonite supplier in India, Bentonite supplier in Oman, Bentonite supplier in China, Bentonite buyer, Stimulation Chemicals, Production Chemicals, Mud Chemicals, Water Treatment Chemicals, Cement Additives Well Completion Fluids, Utility Chemicals, Refineries Chemicals, Industrial Chemicals', 'top-10-manufacturer-supplier-of-bentonite-', '<p dir=\"ltr\">We make it simple and safe. Our platform has many<strong> trusted partners in the <a href=\"../chemical-all\">Bentonite</a> industry</strong>. You can easily find the right match for your needs, whether you\'re buying or selling Bentonite. We care about your safety and privacy, so you are connecting with a verified and trusted<a href=\"../supplier\"> <strong>Bentonite buyer and supplie</strong></a><strong>r.</strong> Plus, we provide useful information to help you make smart choices. <a href=\"../\">Join us now</a> to boost your business relationships.</p>\r\n<h3 dir=\"ltr\">Bentonite&nbsp;&nbsp;</h3>\r\n<p dir=\"ltr\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Definition, uses, manufacturers &amp; suppliers from the world)</p>\r\n<p dir=\"ltr\">Bentonite is highly absorbent swelling clay which is a valuable binding, sealing, absorbing &amp; lubricating agent in a huge variety of applications.&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;Bentonite is used in drilling mud as a binder, purifier, absorbent &amp; carrier for fertilizers or pesticides. &nbsp;&nbsp;</p>\r\n<p dir=\"ltr\">United States is the largest producer of bentonite in the world.&nbsp;&nbsp;</p>\r\n<p dir=\"ltr\">The global bentonite market size was $1796.00 million in 2021 &amp; expected to be $3414.63 million in 2023. Vietnam is the top importer of bentonite followed by China &amp; Malaysia.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\"><strong>Here are the top 10 manufacturers &amp; suppliers of bentonite across the world. &ndash;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Swell well minechem pvt ltd. &ndash; </strong>This is an ISO certified company. They have their own mine &amp; production house. They are largest high quality bentonite producer in India.&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"https://www.swellwell.com/\">https://www.swellwell.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; +91 9712950165</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Elements India &ndash;</strong> This Gujarat based company manufactures various bentonite clay based products, these are used in oil/gas well drilling, iron ore pelletization, as a foundry etc.&nbsp; &nbsp;Website &ndash; <a href=\"https://elementsindia.com/\">https://elementsindia.com/</a></p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Organic Chemicals &ndash;</strong> It&rsquo;s one of the fastest growing Pharmaceutical Drug Intermediates, Specialty Chemicals manufacturing Company in India. They acquired the Indian &amp; international both market.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"http://www.organicgroup.co.in/index.html\">http://www.organicgroup.co.in/index.html</a></p>\r\n<p dir=\"ltr\">Call &ndash; 91 02527-272164</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Balaji minechem &ndash;</strong> This Company was established in 2011. They manufacture &amp; export Silica Sand, Calcined Kaolin Powder, Hydrous Kaolin Powder, raw salt, coarse salt, de-icing salt, tablet salt, China Clay, Bentonite Powder etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"https://www.balajiminechem.com/index.html\">https://www.balajiminechem.com/index.html</a></p>\r\n<p dir=\"ltr\">Call &ndash; +91 97271 29949</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>TMM India &ndash; </strong>Tanvi mines &amp; minerals is the manufacturer &amp; exporter of quartz granuels &amp; powder. They also have other products for various industries like metal industry, oil &amp; gas industry, paints &amp; coatings, glass manufacturing, pesticide coating, water filteration etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website - <a href=\"http://www.tmmindia.com/index.html\">http://www.tmmindia.com/index.html</a></p>\r\n<p dir=\"ltr\">Call &ndash; +91-8619061727</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"6\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Adinath Industries &ndash;</strong> It was established in 2008 &amp; a leading manufacturer, exporter &amp; supplier of processed refractories &amp; mineral powder for construction sector.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"https://www.adinathindustries.net/\">https://www.adinathindustries.net/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 9829081096</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"7\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>SEPICO &ndash; </strong>Saudi Emirates Pulverization Industries is a leading producer &amp; supplier of essential chemicals of drilling operations. Their products are bentonite, barite, hematite, Gilsonite, salt, potassium chloride, marble chips etc. They supply their products to middle east, Africa &amp; Asia.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"https://www.sepico.com/law/\">https://www.sepico.com/law/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 971 6 7652889&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"8\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Luminerals &ndash; </strong>They are working as a commercial company since 2009. They supply high quality minerals &amp; chemical products like glass beads, drilling glass beads, sodium carbonate, sodium silicate, bitumen etc.&nbsp;&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"https://luminerals.com/\">https://luminerals.com/</a></p>\r\n<p dir=\"ltr\">Call - +971527237368&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"9\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Orange Chemicals &nbsp; &ndash;</strong> It&rsquo;s a one stop solution for water treatment chemicals, oil drilling chemicals, food additives, fertilizer chemicals etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"http://orangechemicalsgroup.com/index.php\">http://orangechemicalsgroup.com/index.php</a></p>\r\n<p dir=\"ltr\">Call &ndash; 971 568819798</p>\r\n<ol start=\"10\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>RX Chemicals &ndash;</strong> They are the largest degreasing chemical manufacturer in Maharashtra. They have sea solvent cleaner, air cooler chemical, citric acid, chlorine liquid, construction chemical etc.&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"http://rxchemicals.com/\">http://rxchemicals.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 91 9152606051</p>\r\n<p dir=\"ltr\">You can also prefer these &ndash;&nbsp;</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Arasuri Enterprise&nbsp; &ndash; <a href=\"https://www.aarasurienterprise.com/\">https://www.aarasurienterprise.com/</a></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Call - 9727508652</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Kanha Bio Fuel &amp; Minerals &ndash; https://www.kanhabio.com/</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Call &ndash; 8048954548</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Alpha Chemika &ndash; <a href=\"https://www.alphachemika.co/\">https://www.alphachemika.co/</a></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Call &ndash; 91 9820385757</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p>Our extensive database offers a diverse network of verified and trusted partners in the <strong>Bentonite <a href=\"../inquiry-all\">chemical buyer and suppliers </a></strong>industry, ensuring that you connect with reliable <a href=\"../supplier\">Bentonite buyer and suppliers</a>. With user-friendly search and <a href=\"../\">direct chat and contact</a> option,&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>you can easily pinpoint the ideal match for your specific needs, whether you\'re buying or supplying <a href=\"../chemical-all\">Bentonite</a>.&nbsp;<br><a href=\"../inquiry-all\">Join us </a>today to elevate your Bentonite business collaborations.</p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\">If you don&rsquo;t have the clarity yet, choose us to fulfill your needs:&nbsp;</p>\r\n<p dir=\"ltr\">Fyndsupplier - <a href=\"../\">https://fyndsupplier.com/</a></p>\r\n<p dir=\"ltr\">Here you can easily reach suppliers across the world &amp; compare prices according to your budget.&nbsp; Visit our website or <a href=\"http://wa.me/918882335624\">contact us on &ndash; 47 94432969.&nbsp;</a></p>\r\n<p>&nbsp;</p>', '2023-09-24 11:15:37', NULL, '2023-09-26 12:47:10', 34);
INSERT INTO `blog` (`id`, `uid`, `image`, `title`, `meta_description`, `meta_keyword`, `slug`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(26, 29, '1482Global Chemical Market Trends and Forecast.webp', 'Chemical Market Trends and Forecast also Challenges and Opportunities in Chemical Industry.', 'Several key trends are expected to shape the chemical market in the coming years. FyndSupplier is the optimal choice for finding chemical buyers and suppliers due to its industry specialization, extensive network, and commitment to quality assurance. ', 'find chemical supplier online,top chemical supplier, FyndSupplier, acetic acid supplier, bentonite supplier, Stimulation Chemicals, Production Chemicals, Mud Chemicals, Water Treatment Chemicals, Cement Additives Well Completion Fluids, Utility Chemicals, Refineries Chemicals, Industrial Chemicals, top chemical supplier in india,  top chemical supplier in gulf, chemical supplier qatar, chemical supplier kuwait , chemical supplier uae, verified chemical supplier china, top chines chemical supplier', 'chemical-market-trends-and-forecast-also-challenges-and-opportunities-in-chemical-industry-', '<p><span style=\"font-size: 14pt; font-family: \'times new roman\', times, serif;\">The global chemical industry is a cornerstone of modern economies, serving as the backbone for numerous sectors, from manufacturing to agriculture. As we move further into the 21st century, the chemical market continues to evolve, influenced by a multitude of factors, including economic shifts, technological advancements, New Govt. policies and changing consumer preferences. To navigate this complex landscape successfully, both&nbsp;<a href=\"../supplier\">buyers and suppliers</a> need a keen understanding of the fast-changing trends and future forecasts within the chemical market. Not just in single chemical sector but all chemical categories - Stimulation Chemicals, Production Chemicals, Mud Chemicals, <a href=\"../chemical-all\">Water Treatment Chemicals</a>, Cement Additives Well Completion Fluids, Utility Chemicals, Refineries Chemicals,<a href=\"../chemical-all\"> Industrial Chemicals</a> etc.</span></p>\r\n<h2><span style=\"font-family: \'times new roman\', times, serif; font-size: 24pt;\">Current Chemical Market Status</span></h2>\r\n<p><span style=\"font-size: 14pt; font-family: \'times new roman\', times, serif;\">Before we explore the future, let\'s see where the chemical industry stands today:. As of 2021-2022, the industry faced significant challenges stemming from the COVID-19 pandemic, which disrupted supply chains, altered demand patterns, and strained logistics. However, it also highlighted the industry\'s resilience and adaptability as it swiftly adjusted to meet new demands, such as the production of hand sanitizers and personal protective equipment (PPE).</span></p>\r\n<p><br><span style=\"font-size: 14pt; font-family: \'times new roman\', times, serif;\"><strong><span style=\"font-size: 18pt;\">1. Economic Recovery:</span> </strong>The chemical industry has shown signs of recovery as economies around the world rebound from the pandemic. This rebound is driven by increased demand for chemicals in various sectors, including automotive, construction, and electronics.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">2. Sustainability and Green Chemistry:</span> </strong>Environmental concerns and regulatory pressures continue to push the industry toward greener and more sustainable practices. Companies are investing in research and development to create eco-friendly products and processes.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">3. Supply Chain Resilience: </span></strong>The pandemic exposed vulnerabilities in global supply chains. As a result, many chemical companies are reevaluating their supply chain strategies to enhance resilience and reduce the risk of future disruptions.</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"font-family: \'times new roman\', times, serif; font-size: 24pt;\">Key Trends Shaping the Chemical Industry\'s Future</span></strong></p>\r\n<p><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">As we look ahead, several key trends are expected to shape the chemical market in the coming years.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><span style=\"font-size: 18pt;\"><strong>1. Sustainable Chemistry:</strong></span> Sustainability will remain a focal point for the industry. This includes reducing carbon emissions, using renewable resources, and adopting circular economy principles. Green chemistry initiatives will gain momentum.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">2. Digital Transformation:</span></strong> The integration of digital technologies, such as artificial intelligence (AI) and the Internet of Things (IoT), will optimize manufacturing processes, supply chain management, and product development.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">3. Bio-Based Materials:</span> </strong>The development of bio-based chemicals will increase, driven by the desire for renewable feedstocks and reduced environmental impact. These materials will find applications in a wide range of industries.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><span style=\"font-size: 18pt;\"><strong>4. <a href=\"../\">Specialty Chemicals</a>:</strong></span> Demand for specialty chemicals, which find use in niche applications, is expected to grow. These chemicals often command higher margins due to their specialized nature.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">5. Regulatory Changes:</span></strong> New regulations addressing safety, environmental impact, and product labeling will continue to shape the industry. Companies will need to stay compliant and adapt to changing standards.</span></p>\r\n<p>&nbsp;</p>\r\n<h1><span style=\"font-size: 24pt;\"><strong><span style=\"font-family: \'times new roman\', times, serif;\">Regional Perspectives</span></strong></span></h1>\r\n<p><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">Market trends can vary significantly by region. Here are some regional insights:</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><span style=\"font-size: 18pt;\"><strong>1. Asia-Pacific (APAC):</strong></span> APAC is expected to remain a key player in the global chemical industry, with China and <a href=\"../\">India</a> driving growth. Increasing urbanization, industrialization, and a growing middle class contribute to rising chemical demand.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><span style=\"font-size: 18pt;\"><strong>2. North America:</strong></span> The North American chemical industry is benefiting from the shale gas boom, which has led to abundant and cost-effective feedstocks. This region is also at the forefront of sustainability initiatives.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">3. Europe:</span></strong> Europe has been a leader in promoting sustainable practices. The European Green Deal, with its emphasis on carbon neutrality, will drive significant changes in the chemical industry.</span></p>\r\n<p><br><strong><span style=\"font-family: \'times new roman\', times, serif; font-size: 24pt;\">Challenges and Opportunities</span></strong><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">As with any industry, the chemical sector faces its share of challenges and opportunities.</span></p>\r\n<p><br><span style=\"font-size: 24pt;\"><strong><span style=\"font-family: \'times new roman\', times, serif;\">Challenges:</span></strong></span></p>\r\n<p><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">1. Environmental Concerns:</span></strong> Meeting sustainability goals while maintaining profitability is a delicate balance.<a href=\"../supplier\"> Chemical companies </a>must invest in eco-friendly technologies and processes, which can be costly.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><span style=\"font-size: 18pt;\"><strong>2. Supply Chain Disruptions:</strong></span> The pandemic highlighted the fragility of global supply chains. Companies must invest in strategies to mitigate future disruptions.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><span style=\"font-size: 18pt;\"><strong>3. Regulatory Complexity: </strong></span>Compliance with a myriad of regulations across different regions can be challenging and costly.</span></p>\r\n<p><br><span style=\"font-size: 24pt;\"><strong><span style=\"font-family: \'times new roman\', times, serif;\">Opportunities:</span></strong></span><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">1. Innovation: </span></strong>The push for sustainability and digitalization offers ample opportunities for innovation. Companies that can develop and implement cutting-edge solutions will thrive.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">2. Market Expansion:</span></strong> Growing middle-class populations in emerging economies will continue to drive<a href=\"../inquiry-all\"> chemical demand</a>.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><strong><span style=\"font-size: 18pt;\">3. Collaboration: </span></strong>Collaborative efforts between industry players, governments, and other stakeholders can lead to mutually beneficial outcomes, such as sustainable supply chains.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">As a <a href=\"../\">trusted platform</a>, we also adopting these changes and providing safe gateway for every buyer and supplier to grow in their business.</span><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\"><a href=\"../\">FyndSupplier </a>is the optimal choice for finding chemical buyers and suppliers due to its industry specialization, extensive network, and commitment to quality assurance. With a user-friendly interface and latest updated verified buyers/supplier those updating daily their buy and supply requirement. FyndSupplier\'s exclusive focus on the chemical sector ensures a deep understanding of industry offering a reliable platform for trusted and<a href=\"../supplier\"> verified buyers and supplier.</a></span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">The chemical market is in a state of flux, driven by economic, technological, and environmental factors. Sustainability, digitalization, and regulatory changes are reshaping the chemical industry. To succeed in this evolving landscape, every chemical buyer and supplier must remain adaptable, forward-thinking, and responsive to market dynamics.</span></p>\r\n<p><br><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">By staying informed about current trends and future forecasts, industry participants can position themselves strategically to thrive in an ever-changing chemical market. As we move forward, it\'s clear that innovation, sustainability, and collaboration will be key drivers of success in the every chemical industry.</span></p>\r\n<p><span style=\"font-size: 14pt;\"><span style=\"font-family: \'times new roman\', times, serif;\"><a href=\"../\"><strong><span style=\"font-size: 18pt;\">Sign up Now</span></strong></a> to stay updated with the<a href=\"../inquiry-all\"><strong> latest offer and enquries </strong></a>from verified buyers/supplier around the globe.&nbsp;</span></span><br><strong><span style=\"font-family: \'times new roman\', times, serif; font-size: 18pt;\">www.fyndsupplier.com &nbsp;</span></strong></p>\r\n<p><span style=\"font-family: \'times new roman\', times, serif; font-size: 14pt;\">or Request to Join our</span><strong><span style=\"font-family: \'times new roman\', times, serif; font-size: 18pt;\"> <a href=\"http://wa.me/918882335624\">Whatsapp Group - 47 94432969.&nbsp;</a></span></strong></p>\r\n<p>&nbsp;</p>', '2023-09-25 11:27:58', NULL, '2023-09-25 11:33:20', 34),
(28, 29, '2420BenzeneandToluene.webp', 'TOP 10 BENZENE & TOLUENE MANUFACTURER & SUPPLIER', 'Your one-stop destination for the Benzene and Toluene chemical sourcing needs. Our platform seamlessly connects Benzene and Toluene buyers and suppliers, facilitating transparent, efficient way.', 'Benzene supplier, top Toluene sulphate supplier, verified Benzene supplier, Toluene supplier contact details, order Benzene, buy Toluen sulphate, Benzene supplier in India, Benzene supplier in Oman, Benzene  supplier in china, Benzene  buyer,Stimulation Chemicals, Production Chemicals, Mud Chemicals, Water Treatment Chemicals, Cement Additives Well Completion Fluids, Utility Chemicals, Refineries Chemicals, Industrial Chemicals', 'top-10-benzene-toluene-manufacturer-suppliers', '<p>Your one-stop destination for the <a href=\"../chemical-all\">Benzene and Toluene chemical</a> sourcing needs. Our platform seamlessly connects Benzene and Toluene buyers and suppliers, facilitating transparent, efficient way.&nbsp;also <a href=\"../inquiry-all\">latest offer and requirement of Benzene and Toluene</a> in market.</p>\r\n<p><strong>Benzene and Toluene Buyers</strong> gain access to an extensive catalog of high-quality chemicals from trusted suppliers worldwide. and<strong> Suppliers benefit</strong> from a global reach, expanding their customer base and increasing visibility.</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 18pt;\"><strong>Benzene &amp; Toluene&nbsp;&nbsp;&nbsp;</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;&nbsp;(Definition, uses, manufacturers &amp; suppliers from the world)</strong></p>\r\n<p dir=\"ltr\">Benzene &amp; Toluene are 2 related organic compounds. Toluene is a derivative of benzene. The difference between these 2 is presence of methyl group, toluene has this but benzene has no methyl groups in it.</p>\r\n<p dir=\"ltr\">&nbsp;Benzene &amp; Toluene are used as solvents &amp; feed stocks by the chemical industry.&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;The global benzene &amp; toluene market size was $22.09 billion in 2021 &amp; expected to reach at $35.23 billion in 2030.&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp; Here are the top 10 manufacturers &amp; suppliers of benzene &amp; toluene across the world. &ndash;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Mangalore Refinery &amp; Petrocheicals ltd.&nbsp; &ndash;</strong> They produce petroleum products like naptha, LPG, Motor Spirit, High-Speed Diesel, Kerosene, Sulphur, Xylene, pet coke etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website -&nbsp;<a href=\"https://www.mrpl.co.in/\">https://www.mrpl.co.in/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 91 8242270400</p>\r\n<ol start=\"2\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Fischer Chemic ltd &ndash; </strong>It was established in 1993. It&rsquo;s a Maharashtra based company.&nbsp;&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash;&nbsp;<a href=\"https://www.fischerchemic.in/index.html\">https://www.fischerchemic.in/index.html</a></p>\r\n<p dir=\"ltr\">Call &ndash; 8655550209&nbsp;</p>\r\n<ol start=\"3\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Shri Laxmi Enterprises -&nbsp;</strong> &nbsp;They manufacture, export &amp; supply industrial chemicals like toluene chemicals, xylene chemicals, acetone chemicals, acetonitrile chemicals, ethyl acetate, isopropyl alcohol etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash;&nbsp;<a href=\"https://www.shreelaxmienterprises428.com/\">https://www.shreelaxmienterprises428.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 8048773263&nbsp;</p>\r\n<ol start=\"4\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Apurv Chemicals &ndash;</strong> It was established in 1996. They are regularly supplying to 300 industries &amp; some govt. institutions also.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash; <a href=\"http://www.apurvchemicals.com/index.php\">http://www.apurvchemicals.com/index.php</a></p>\r\n<p>&nbsp;</p>\r\n<ol start=\"5\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Blinkex Overseas &ndash; </strong>They have expertise in exporting products like organic chemicals, surgical products &amp; essential oils.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website -&nbsp;<a href=\"https://blinkexoverseas.com/\">https://blinkexoverseas.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; +91 7397822826</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"6\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Filtron Environtech &ndash; </strong>This Hyderabad based company manufacture &amp; export industrial chemicals - Water Treatment Chemicals, Waste Water Treatment Chemicals, Sewage Treatment Chemicals etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash;<a href=\"http://www.waterchemicalsindia.com/Hyderabad/index.html\">http://www.waterchemicalsindia.com/Hyderabad/index.html</a></p>\r\n<p dir=\"ltr\">Call &ndash; +91 7827649429</p>\r\n<ol start=\"7\">\r\n<li dir=\"ltr\" aria-level=\"1\"><strong>Bhagya Laxmi Chemicals &ndash;</strong> It was established in 2016. They are the whole seller, supplier &amp; trader of Isopropyl Alcohol, Solvent Chemical, Normal Butanol, Ethyl Chemical etc.&nbsp;</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash;&nbsp;<a href=\"https://www.bhagyalaxmichemicals.com/profile.html\">https://www.bhagyalaxmichemicals.com/profile.html</a></p>\r\n<p dir=\"ltr\">Call &ndash; 8048608534</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol start=\"8\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Ramya Group &ndash; </strong>They have industrial, laboratory, water treatment, FMCG chemicals, minerals, solvents, agri chemicals, food preservatives,&nbsp; glycerin, specialty chemicals etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash;&nbsp;<a href=\"https://www.ramyagroup.com/about-us.html\">https://www.ramyagroup.com/about-us.html</a></p>\r\n<p dir=\"ltr\">Call &ndash; 8047631081</p>\r\n<ol start=\"9\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>JK Chemicals &nbsp;&nbsp;&nbsp;</strong>&ndash; It&rsquo;s a fastest growing company &amp; distributor of raw materials, Chemicals, Solvents, Drug intermediates etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash;&nbsp;<a href=\"http://www.jkchemicals.in/index.php\">http://www.jkchemicals.in/index.php</a></p>\r\n<p dir=\"ltr\">Call &ndash; +91 9949607779</p>\r\n<ol start=\"10\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Balaji Amines &ndash;</strong> They deal with amines, derivatives, specialty chemicals, pharma products. This ISO certified company specialized in manufacturing Methylamines, Ethylamines, and Derivatives of Specialty Chemicals etc.&nbsp;</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Website &ndash;&nbsp;<a href=\"http://www.balajiamines.com/\">http://www.balajiamines.com/</a></p>\r\n<p dir=\"ltr\">Call &ndash; 91 2172451500</p>\r\n<p dir=\"ltr\"><strong>You can also prefer these &ndash;&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" style=\"font-weight: bold;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Jai Bharat Group &ndash; <a href=\"https://www.jbgc.com/\">https://www.jbgc.com/</a></strong></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-weight: bold;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Call - 98135 17352</strong></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-weight: bold;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Premcem Gums - <a href=\"https://www.premcemgums.com/\">https://www.premcemgums.com/</a></strong></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-weight: bold;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Call &ndash;+91 2221026196</strong></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-weight: bold;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Supreme Gums - <a href=\"https://www.supremegums.com/\">https://www.supremegums.com/</a></strong></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-weight: bold;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Call - +91 1412770741</strong></p>\r\n</li>\r\n</ul>\r\n<p><strong><br><br></strong></p>\r\n<p dir=\"ltr\"><strong>If you don&rsquo;t have the clarity yet, choose us to fulfill your needs:&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong>Fyndsupplier - <a href=\"../\">https://fyndsupplier.com/</a></strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>Join&nbsp;<a href=\"../\">fyndsupplier</a> today and experience a new way of efficient, profitable, and hassle-free business networking. &nbsp;to connect with 1000+ verified <a href=\"../supplier\">Benzene and Toluene</a> <a href=\"../chemical-all\">&nbsp;suppliers</a> globally. Here you can easily reach suppliers across the world &amp; compare prices according to your budget &nbsp;<span style=\"font-size: 18pt;\"><a href=\"../\">Sign Up Now !</a></span></strong></p>\r\n<h3><strong>Visit our website&nbsp;<a href=\"../\">fyndsupplier.com</a>&nbsp;or contact us at <a href=\"http://wa.me/918882335624\">WHATSAPP &nbsp;+91 8882335624</a></strong></h3>\r\n<p>&nbsp;</p>', '2023-09-26 13:35:37', NULL, '2023-09-26 13:36:02', 34);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_title`
--

CREATE TABLE `blog_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_title`
--

INSERT INTO `blog_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Blogs and Help', NULL, NULL, '2023-08-01 17:45:47', 35);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_alignment`
--

CREATE TABLE `buyer_alignment` (
  `id` int(11) NOT NULL,
  `box1` int(11) NOT NULL,
  `box2` int(11) NOT NULL,
  `box3` int(11) NOT NULL,
  `box4` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyer_alignment`
--

INSERT INTO `buyer_alignment` (`id`, `box1`, `box2`, `box3`, `box4`, `created_at`, `updated_at`) VALUES
(1, 39, 54, 60, 38, '2023-06-25 21:55:47', '2023-06-25 23:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_title`
--

CREATE TABLE `buyer_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `cover` tinytext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyer_title`
--

INSERT INTO `buyer_title` (`id`, `title`, `cover`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Top Chemicals Buyers', '5750buy.jpg', NULL, NULL, '2023-06-25 23:28:38', 35);

-- --------------------------------------------------------

--
-- Table structure for table `chemical`
--

CREATE TABLE `chemical` (
  `id` int(11) NOT NULL,
  `chemical_photo` tinytext CHARACTER SET latin1 NOT NULL,
  `chemical_name` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chemical`
--

INSERT INTO `chemical` (`id`, `chemical_photo`, `chemical_name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(33, 'product.png', 'Zinc carbonate H2S scavenger (ZnCO3)', 1, NULL, NULL, NULL, NULL),
(34, 'product.png', 'Zinc bromide brine 19.2 ppg', 1, NULL, NULL, NULL, NULL),
(35, 'product.png', 'XC polymer', 1, NULL, NULL, NULL, NULL),
(36, 'product.png', 'Wyoming Bentonite', 1, NULL, NULL, NULL, NULL),
(37, 'product.png', 'Wetting Agent for low oil:water ratio (60:40 to 50:50) reversible-invert emulsion system (300 F)', 1, NULL, NULL, NULL, NULL),
(38, 'product.png', 'Well-bore clean-up fluid for filter cake removal', 1, NULL, NULL, NULL, NULL),
(39, 'product.png', 'Well-bore and Filter cake clean-up systems (all components to be quoted separately)', 1, NULL, NULL, NULL, NULL),
(40, 'product.png', 'Well cleaning Surfactant', 1, NULL, NULL, NULL, NULL),
(41, 'product.png', 'Well Bore Strengthener-Non Invasive Fluid INSH 7000', 1, NULL, NULL, NULL, NULL),
(42, 'product.png', 'Weighting material for drilling', 1, NULL, NULL, NULL, NULL),
(43, 'product.png', 'Water activity control agent', 1, NULL, NULL, NULL, NULL),
(44, 'product.png', 'Viscosity Index Improvers', 1, NULL, NULL, NULL, NULL),
(45, 'product.png', 'TSP', 1, NULL, NULL, NULL, NULL),
(46, 'product.png', 'Tri N butyle Phosphate', 1, NULL, NULL, NULL, NULL),
(47, 'product.png', 'Treated Hectorite HT viscosifier', 1, NULL, NULL, NULL, NULL),
(48, 'product.png', 'TKPP', 1, NULL, NULL, NULL, NULL),
(49, 'product.png', 'Titanium Dioxide', 1, NULL, NULL, NULL, NULL),
(50, 'product.png', 'TCP', 1, NULL, NULL, NULL, NULL),
(51, 'product.png', 'Synthetic Graphite', 1, NULL, NULL, NULL, NULL),
(52, 'product.png', 'Synergistic polymer', 1, NULL, NULL, NULL, NULL),
(53, 'product.png', 'Surfactant-solvent micro-emulsion system to enhance flow of reservoir fluid', 1, NULL, NULL, NULL, NULL),
(54, 'product.png', 'Surfactant wash for displacing OBM', 1, NULL, NULL, NULL, NULL),
(55, 'product.png', 'Surfactant concentrated for displacing OBM', 1, NULL, NULL, NULL, NULL),
(56, 'product.png', 'Sulphonate Asphalt', 1, NULL, NULL, NULL, NULL),
(57, 'product.png', 'Sulfonated polystyrene-maleic anhydride copolymer', 1, NULL, NULL, NULL, NULL),
(58, 'product.png', 'Sulfonated Phenol-formaldehyde Resin', 1, NULL, NULL, NULL, NULL),
(59, 'product.png', 'Sulfonated Lignite', 1, NULL, NULL, NULL, NULL),
(60, 'product.png', 'Sulfonated asphalt', 1, NULL, NULL, NULL, NULL),
(61, 'product.png', 'STPP', 1, NULL, NULL, NULL, NULL),
(62, 'product.png', 'Stearate Defoamer', 1, NULL, NULL, NULL, NULL),
(63, 'product.png', 'Spotting Fluids (Non-weighted/weighted)', 1, NULL, NULL, NULL, NULL),
(64, 'product.png', 'Sponge /foam Sized LCM for total losses', 1, NULL, NULL, NULL, NULL),
(65, 'product.png', 'Specialised squeezing plug LCM (all components to be quoted separately)', 1, NULL, NULL, NULL, NULL),
(66, 'product.png', 'Soluble H2S Scavenger (WBM)', 1, NULL, NULL, NULL, NULL),
(67, 'product.png', 'Sodium Sulfite Catalyzed', 1, NULL, NULL, NULL, NULL),
(68, 'product.png', 'Sodium Silicate', 1, NULL, NULL, NULL, NULL),
(69, 'product.png', 'Sodium Polyacrylate KOL-PAAS', 1, NULL, NULL, NULL, NULL),
(70, 'product.png', 'Sodium monomorillonite', 1, NULL, NULL, NULL, NULL),
(71, 'product.png', 'Sodium Hydroxide', 1, NULL, NULL, NULL, NULL),
(72, 'product.png', 'Sodium Erythorbate', 1, NULL, NULL, NULL, NULL),
(73, 'product.png', 'Sodium Dichomate', 1, NULL, NULL, NULL, NULL),
(74, 'product.png', 'Sodium Bicarbonate', 1, NULL, NULL, NULL, NULL),
(75, 'product.png', 'Soda Ash', 1, NULL, NULL, NULL, NULL),
(76, 'product.png', 'SM-64S(salt mixture)', 1, NULL, NULL, NULL, NULL),
(77, 'product.png', 'Sized multi PSD 1 sack LCM blend of particulates and fibres, fully soluble in 15% HCl', 1, NULL, NULL, NULL, NULL),
(78, 'product.png', 'Sized multi PSD 1 sack LCM blend of particulates and fibres', 1, NULL, NULL, NULL, NULL),
(79, 'product.png', 'Sintered Bauxite', 1, NULL, NULL, NULL, NULL),
(80, 'product.png', 'Silicon Based Defoamer', 1, NULL, NULL, NULL, NULL),
(81, 'product.png', 'Shreaded Fibrous Materials', 1, NULL, NULL, NULL, NULL),
(82, 'product.png', 'SHMP', 1, NULL, NULL, NULL, NULL),
(83, 'product.png', 'Shale stabilizer and inhibitor system', 1, NULL, NULL, NULL, NULL),
(84, 'product.png', 'Shale stabiliser', 1, NULL, NULL, NULL, NULL),
(85, 'product.png', 'Shale inhibitors and stabilizers', 1, NULL, NULL, NULL, NULL),
(86, 'product.png', 'Sepiolite(hydrous magnesium silicate)', 1, NULL, NULL, NULL, NULL),
(87, 'product.png', 'Sepiolite', 1, NULL, NULL, NULL, NULL),
(88, 'product.png', 'Sebacic Acid', 1, NULL, NULL, NULL, NULL),
(89, 'product.png', 'ROP -enhancing antiaccretion additive', 1, NULL, NULL, NULL, NULL),
(90, 'product.png', 'ROD Lubricant', 1, NULL, NULL, NULL, NULL),
(91, 'product.png', 'Rig Wash (Degreaser)', 1, NULL, NULL, NULL, NULL),
(92, 'product.png', 'Rig cleaning agent (Using Oil Based Mud)', 1, NULL, NULL, NULL, NULL),
(93, 'product.png', 'Rheology modifier for flat rheology / gels - Alternate', 1, NULL, NULL, NULL, NULL),
(94, 'product.png', 'Rheology modifier (low End)', 1, NULL, NULL, NULL, NULL),
(95, 'product.png', 'Rheology modifier - Alternate', 1, NULL, NULL, NULL, NULL),
(96, 'product.png', 'Rheliant system invert emulsion system surfactant', 1, NULL, NULL, NULL, NULL),
(97, 'product.png', 'Resinous chlorinated alkanes', 1, NULL, NULL, NULL, NULL),
(98, 'product.png', 'Resinated Lignite H.T.(>350°F)', 1, NULL, NULL, NULL, NULL),
(99, 'product.png', 'Reservoir compatible self degrading LCM pill', 1, NULL, NULL, NULL, NULL),
(100, 'product.png', 'Refined vegetable oil ester based lubricant', 1, NULL, NULL, NULL, NULL),
(101, 'product.png', 'Quartz', 1, NULL, NULL, NULL, NULL),
(102, 'product.png', 'Propylene Pentamer', 1, NULL, NULL, NULL, NULL),
(103, 'product.png', 'Proppant and gravel pack material', 1, NULL, NULL, NULL, NULL),
(104, 'product.png', 'Pre Gelatinized Starch(PGS)', 1, NULL, NULL, NULL, NULL),
(105, 'product.png', 'PPD', 1, NULL, NULL, NULL, NULL),
(106, 'product.png', 'PPA 85-115%', 1, NULL, NULL, NULL, NULL),
(107, 'product.png', 'Potato Starch pregelatinised', 1, NULL, NULL, NULL, NULL),
(108, 'product.png', 'Potassium Metaborate', 1, NULL, NULL, NULL, NULL),
(109, 'product.png', 'Potassium Lignite', 1, NULL, NULL, NULL, NULL),
(110, 'product.png', 'Potassium Humate', 1, NULL, NULL, NULL, NULL),
(111, 'product.png', 'Potassium formate conc liquor - 1.57 SG (13.1 ppg)', 1, NULL, NULL, NULL, NULL),
(112, 'product.png', 'Potassium Di Chromate', 1, NULL, NULL, NULL, NULL),
(113, 'product.png', 'Potassium Chrome Lignite', 1, NULL, NULL, NULL, NULL),
(114, 'product.png', 'Potassium aluminate', 1, NULL, NULL, NULL, NULL),
(115, 'product.png', 'Potassium Acetate', 1, NULL, NULL, NULL, NULL),
(116, 'product.png', 'Polyol', 1, NULL, NULL, NULL, NULL),
(117, 'product.png', 'Polymer temperature stabilizer', 1, NULL, NULL, NULL, NULL),
(118, 'product.png', 'Polymaleic Acid', 1, NULL, NULL, NULL, NULL),
(119, 'product.png', 'Polyhydroxyl alcohol', 1, NULL, NULL, NULL, NULL),
(120, 'product.png', 'Polyether defoamer', 1, NULL, NULL, NULL, NULL),
(121, 'product.png', 'Polyanionic Cellulose KOL-PAC LV', 1, NULL, NULL, NULL, NULL),
(122, 'product.png', 'Polyanionic Cellulose KOL-PAC HV', 1, NULL, NULL, NULL, NULL),
(123, 'product.png', 'Polyamine Shale Inhibitor', 1, NULL, NULL, NULL, NULL),
(124, 'product.png', 'Polyacrylamide swellable LCM', 1, NULL, NULL, NULL, NULL),
(125, 'product.png', 'Pipe freeing agent for NAF', 1, NULL, NULL, NULL, NULL),
(126, 'product.png', 'Pipe freeing agent - weightable', 1, NULL, NULL, NULL, NULL),
(127, 'product.png', 'Pipe freeing agent - non-weightable', 1, NULL, NULL, NULL, NULL),
(128, 'product.png', 'PHPA sticks', 1, NULL, NULL, NULL, NULL),
(129, 'product.png', 'PHPA POWDER ADDRILL PAB', 1, NULL, NULL, NULL, NULL),
(130, 'product.png', 'PHPA powder (100%)', 1, NULL, NULL, NULL, NULL),
(131, 'product.png', 'Phosphonic acid salt', 1, NULL, NULL, NULL, NULL),
(132, 'product.png', 'Peracetic acid', 1, NULL, NULL, NULL, NULL),
(133, 'product.png', 'Pecan Shell (Fine, Coarse)', 1, NULL, NULL, NULL, NULL),
(134, 'product.png', 'Partially hyrolysed polyacrylamide PHPA', 1, NULL, NULL, NULL, NULL),
(135, 'product.png', 'Para Formaldehyde', 1, NULL, NULL, NULL, NULL),
(136, 'product.png', 'Pac Regular and LV', 1, NULL, NULL, NULL, NULL),
(137, 'product.png', 'PAC R 85%', 1, NULL, NULL, NULL, NULL),
(138, 'product.png', 'PAC LV Premium 95%', 1, NULL, NULL, NULL, NULL),
(139, 'product.png', 'PAC LV 65%', 1, NULL, NULL, NULL, NULL),
(140, 'product.png', 'Oxidant breaker', 1, NULL, NULL, NULL, NULL),
(142, 'product.png', 'Oxalic Acid', 1, NULL, NULL, NULL, NULL),
(143, 'product.png', 'Organophylic Lignite H.T. (Amine-Treated Lignite)', 1, NULL, NULL, NULL, NULL),
(144, 'product.png', 'Organophylic Bentonite (Clay)', 1, NULL, NULL, NULL, NULL),
(145, 'product.png', 'Organophilic treated bridging CaCO3 50 microns', 1, NULL, NULL, NULL, NULL),
(146, 'product.png', 'Organophilic treated bridging CaCO3 10 microns & 25 microns', 1, NULL, NULL, NULL, NULL),
(147, 'product.png', 'Organophilic Lignite', 1, NULL, NULL, NULL, NULL),
(148, 'product.png', 'Organophilic Clay - High yield', 1, NULL, NULL, NULL, NULL),
(149, 'product.png', 'Organophilic Clay', 1, NULL, NULL, NULL, NULL),
(150, 'product.png', 'Organophilic – Heigh Yield', 1, NULL, NULL, NULL, NULL),
(151, 'product.png', 'Oleic Acid', 1, NULL, NULL, NULL, NULL),
(152, 'product.png', 'Oil field biocide', 1, NULL, NULL, NULL, NULL),
(153, 'product.png', 'Oil Based Mud Lubricant', 1, NULL, NULL, NULL, NULL),
(154, 'product.png', 'Oil based Extreme Pressure Lubricant', 1, NULL, NULL, NULL, NULL),
(155, 'product.png', 'OBM Wetting Agent', 1, NULL, NULL, NULL, NULL),
(156, 'product.png', 'OBM thinner', 1, NULL, NULL, NULL, NULL),
(157, 'product.png', 'OBM Secondary Emulsifier', 1, NULL, NULL, NULL, NULL),
(159, 'product.png', 'OBM Rheology Modifier', 1, NULL, NULL, NULL, NULL),
(160, 'product.png', 'OBM Primary emulsifier', 1, NULL, NULL, NULL, NULL),
(161, 'product.png', 'OBM Lube (Strata Lube)', 1, NULL, NULL, NULL, NULL),
(162, 'product.png', 'OBM Filtrate reducer', 1, NULL, NULL, NULL, NULL),
(163, 'product.png', 'Nonyl phenol ethoxylate', 1, NULL, NULL, NULL, NULL),
(164, 'product.png', 'Nonyl phenol', 1, NULL, NULL, NULL, NULL),
(165, 'product.png', 'Non-solid completion brine', 1, NULL, NULL, NULL, NULL),
(166, 'product.png', 'Non treated Bentonite (API 13 A, Section-10)', 1, NULL, NULL, NULL, NULL),
(167, 'product.png', 'Nanoscopic surfactant-solvent solution for modifying reservoir wettability and enhance reservoir fluid flowback', 1, NULL, NULL, NULL, NULL),
(168, 'product.png', 'Nano-silica compound for shale stabilisation', 1, NULL, NULL, NULL, NULL),
(169, 'product.png', 'N-propyl zirconate', 1, NULL, NULL, NULL, NULL),
(170, 'product.png', 'N-isopropyl acrylamide', 1, NULL, NULL, NULL, NULL),
(171, 'product.png', 'n-Alkyl dimethyl benzyl ammonium chloride', 1, NULL, NULL, NULL, NULL),
(172, 'product.png', 'Mullite', 1, NULL, NULL, NULL, NULL),
(173, 'product.png', 'Mud Detergent (Non ionioc surfactant)', 1, NULL, NULL, NULL, NULL),
(174, 'product.png', 'Molybdenum disulfide', 1, NULL, NULL, NULL, NULL),
(175, 'product.png', 'Modified Gaur Gum', 1, NULL, NULL, NULL, NULL),
(176, 'product.png', 'MMO Viscosifier', 1, NULL, NULL, NULL, NULL),
(177, 'product.png', 'Micronised Ilmenite', 1, NULL, NULL, NULL, NULL),
(179, 'product.png', 'Micronised barite, minimum 4.2 SG, d50<6 microns, d90<25 microns', 1, NULL, NULL, NULL, NULL),
(180, 'product.png', 'Mica Medium, Coarse', 1, NULL, NULL, NULL, NULL),
(181, 'product.png', 'Mica Fine', 1, NULL, NULL, NULL, NULL),
(182, 'product.png', 'Metallic stearates', 1, NULL, NULL, NULL, NULL),
(183, 'product.png', 'Melamine', 1, NULL, NULL, NULL, NULL),
(184, 'product.png', 'Megnesium peroxide', 1, NULL, NULL, NULL, NULL),
(185, 'product.png', 'MCA Flakes', 1, NULL, NULL, NULL, NULL),
(186, 'product.png', 'Maleic Anhydride', 1, NULL, NULL, NULL, NULL),
(187, 'product.png', 'Magma Fiber Coarse/fine', 1, NULL, NULL, NULL, NULL),
(188, 'product.png', 'Lubricant/ROP Enhancer', 1, NULL, NULL, NULL, NULL),
(189, 'product.png', 'Lubra Glide - Fine', 1, NULL, NULL, NULL, NULL),
(190, 'product.png', 'Lubra Glide - Coarse', 1, NULL, NULL, NULL, NULL),
(191, 'product.png', 'Lube EP (low Calcium mud)', 1, NULL, NULL, NULL, NULL),
(192, 'product.png', 'Low-toxicity mineral oil', 1, NULL, NULL, NULL, NULL),
(193, 'product.png', 'Low cost Surfactant', 1, NULL, NULL, NULL, NULL),
(194, 'product.png', 'Lost Circulation Material-Single Sack for heavy losses', 1, NULL, NULL, NULL, NULL),
(195, 'product.png', 'Lost circulation material', 1, NULL, NULL, NULL, NULL),
(196, 'product.png', 'Liquid HEC (for 250 bbl pill)', 1, NULL, NULL, NULL, NULL),
(197, 'product.png', 'Liquid Gilsonite (Glycol base)', 1, NULL, NULL, NULL, NULL),
(198, 'product.png', 'Liquid chloinated alkanes', 1, NULL, NULL, NULL, NULL),
(199, 'product.png', 'Linseed Oil', 1, NULL, NULL, NULL, NULL),
(200, 'product.png', 'LCM Cellulose fibers, Medium', 1, NULL, NULL, NULL, NULL),
(201, 'product.png', 'LCM Cellulose fibers, Fine', 1, NULL, NULL, NULL, NULL),
(202, 'product.png', 'LCM Cellulose fibers, Coarse', 1, NULL, NULL, NULL, NULL),
(203, 'product.png', 'LCM Cellulose fibers for OBM Medium', 1, NULL, NULL, NULL, NULL),
(204, 'product.png', 'LCM Cellulose fibers for OBM Fine', 1, NULL, NULL, NULL, NULL),
(205, 'product.png', 'LCM Cellulose fibers for OBM Coarse', 1, NULL, NULL, NULL, NULL),
(206, 'product.png', 'LCM and Formation Strengthening Products', 1, NULL, NULL, NULL, NULL),
(207, 'product.png', 'LCM – Bit Balling preventer', 1, NULL, NULL, NULL, NULL),
(208, 'product.png', 'Lauramine oxide', 1, NULL, NULL, NULL, NULL),
(209, 'product.png', 'Kwik Seal Medium', 1, NULL, NULL, NULL, NULL),
(210, 'product.png', 'Kwik Seal Coarse', 1, NULL, NULL, NULL, NULL),
(211, 'product.png', 'K2', 1, NULL, NULL, NULL, NULL),
(212, 'product.png', 'Itaconic acid', 1, NULL, NULL, NULL, NULL),
(213, 'product.png', 'Isodecyl methacrylate', 1, NULL, NULL, NULL, NULL),
(214, 'product.png', 'Ironite sponge', 1, NULL, NULL, NULL, NULL),
(215, 'product.png', 'Iron EDTA', 1, NULL, NULL, NULL, NULL),
(216, 'product.png', 'Intermediate strength proppant (Different mesh size 16/30, 20/40, 30/50, 30/60)', 1, NULL, NULL, NULL, NULL),
(217, 'product.png', 'Imidazolidine Corrosion', 1, NULL, NULL, NULL, NULL),
(218, 'product.png', 'Hydroxy ehtyle cellulose', 1, NULL, NULL, NULL, NULL),
(219, 'product.png', 'Hydrobromic Acid', 1, NULL, NULL, NULL, NULL),
(220, 'product.png', 'Hydration suppressant', 1, NULL, NULL, NULL, NULL),
(221, 'product.png', 'Hydrate Lime for Drilling Fluids', 1, NULL, NULL, NULL, NULL),
(222, 'product.png', 'Humalite', 1, NULL, NULL, NULL, NULL),
(223, 'product.png', 'HTZ fluid thinner', 1, NULL, NULL, NULL, NULL),
(224, 'product.png', 'HTHP Thinner', 1, NULL, NULL, NULL, NULL),
(225, 'product.png', 'HTHP Fluid Loss for OBM; asphaltite material', 1, NULL, NULL, NULL, NULL),
(226, 'product.png', 'HT viscosifier and fluid loss control (>400 F)', 1, NULL, NULL, NULL, NULL),
(227, 'product.png', 'HT Viscosifier and fluid loss Control', 1, NULL, NULL, NULL, NULL),
(228, 'product.png', 'HT viscosifier (>400 F)', 1, NULL, NULL, NULL, NULL),
(229, 'product.png', 'HT Thinner - Drillthin or equivalent', 1, NULL, NULL, NULL, NULL),
(230, 'product.png', 'Hordaresin', 1, NULL, NULL, NULL, NULL),
(231, 'product.png', 'Hindered phenols', 1, NULL, NULL, NULL, NULL),
(232, 'product.png', 'High temperature shale stabiliser', 1, NULL, NULL, NULL, NULL),
(233, 'product.png', 'High Performance Lubricant for NAF', 1, NULL, NULL, NULL, NULL),
(234, 'product.png', 'High fluid loss, high solids, defluidizing LCM pill providing compressive strength and >95% degradable in 15%', 1, NULL, NULL, NULL, NULL),
(235, 'product.png', 'High fluid loss, high solids, defluidizing LCM pill providing compressive strength', 1, NULL, NULL, NULL, NULL),
(236, 'product.png', 'High flash point oil based mud emulsifer', 1, NULL, NULL, NULL, NULL),
(237, 'product.png', 'Hexylene glycol', 1, NULL, NULL, NULL, NULL),
(238, 'product.png', 'Hexamethylene tetramine', 1, NULL, NULL, NULL, NULL),
(239, 'product.png', 'Hexamethylene diamine', 1, NULL, NULL, NULL, NULL),
(240, 'product.png', 'Hemicellulase enzyme', 1, NULL, NULL, NULL, NULL),
(241, 'product.png', 'Hematite for Drilling Fluids', 1, NULL, NULL, NULL, NULL),
(242, 'product.png', 'H2S Scavengers', 1, NULL, NULL, NULL, NULL),
(243, 'product.png', 'Guar gum splits', 1, NULL, NULL, NULL, NULL),
(244, 'product.png', 'Guar gum', 1, NULL, NULL, NULL, NULL),
(245, 'product.png', 'Granular isothiasolin', 1, NULL, NULL, NULL, NULL),
(246, 'product.png', 'Glyoxal', 1, NULL, NULL, NULL, NULL),
(247, 'product.png', 'Glycol MC', 1, NULL, NULL, NULL, NULL),
(248, 'product.png', 'Glutaraldehyde', 1, NULL, NULL, NULL, NULL),
(249, 'product.png', 'Glass bubbles for low density fluids', 1, NULL, NULL, NULL, NULL),
(250, 'product.png', 'Gaur slurry', 1, NULL, NULL, NULL, NULL),
(251, 'product.png', 'Gaur Gum', 1, NULL, NULL, NULL, NULL),
(252, 'product.png', 'Formamide', 1, NULL, NULL, NULL, NULL),
(253, 'product.png', 'Formaldehyde', 1, NULL, NULL, NULL, NULL),
(254, 'product.png', 'Fly ash', 1, NULL, NULL, NULL, NULL),
(255, 'product.png', 'Filtercake breaker system, organic acid based, including all components', 1, NULL, NULL, NULL, NULL),
(256, 'product.png', 'Filter cake solvent wash for OBM displacement', 1, NULL, NULL, NULL, NULL),
(257, 'product.png', 'Extreme Pressure torque reducer', 1, NULL, NULL, NULL, NULL),
(258, 'product.png', 'Extreme Pressure Lubricant Ester Based', 1, NULL, NULL, NULL, NULL),
(259, 'product.png', 'Extreme Pressure Lubricant', 1, NULL, NULL, NULL, NULL),
(260, 'product.png', 'Extreme High Performance Lubricant WBM - 2 (film stifness > 20000psi)', 1, NULL, NULL, NULL, NULL),
(261, 'product.png', 'Extreme High Performance Lubricant WBM - 1 ( film stifness > 25000psi)', 1, NULL, NULL, NULL, NULL),
(262, 'product.png', 'Extra High yield bentonite', 1, NULL, NULL, NULL, NULL),
(263, 'product.png', 'Ethylenediaminetetraacetate', 1, NULL, NULL, NULL, NULL),
(264, 'product.png', 'EP Lubricant', 1, NULL, NULL, NULL, NULL),
(265, 'product.png', 'Emulsifier for low oil:water ratio (60:40 to 50:50) reversible-invert emulsion system (300 F)', 1, NULL, NULL, NULL, NULL),
(266, 'product.png', 'Emulsifier (Non Aquepus drilling Fluid)', 1, NULL, NULL, NULL, NULL),
(267, 'product.png', 'Economy lightweight ceramic', 1, NULL, NULL, NULL, NULL),
(268, 'product.png', 'Eco frendly defoamer', 1, NULL, NULL, NULL, NULL),
(269, 'product.png', 'Drispac SL - Pure grade Degree of subs >0.95', 1, NULL, NULL, NULL, NULL),
(270, 'product.png', 'Drispac Reg - Pure grade Degree of subs >0.95', 1, NULL, NULL, NULL, NULL),
(271, 'product.png', 'Drilling detergent', 1, NULL, NULL, NULL, NULL),
(272, 'product.png', 'Drilling Detergent', 1, NULL, NULL, NULL, NULL),
(273, 'product.png', 'Dodecenyl succinic anhydride', 1, NULL, NULL, NULL, NULL),
(274, 'product.png', 'Direct Drill Extender', 1, NULL, NULL, NULL, NULL),
(275, 'product.png', 'Dimethyl formamide', 1, NULL, NULL, NULL, NULL),
(276, 'product.png', 'Diethylenetriamine', 1, NULL, NULL, NULL, NULL),
(277, 'product.png', 'Diesel Slurry', 1, NULL, NULL, NULL, NULL),
(278, 'product.png', 'Didecyl dimethyl Ammonium chloride', 1, NULL, NULL, NULL, NULL),
(279, 'product.png', 'Dibromoacetronitrile', 1, NULL, NULL, NULL, NULL),
(280, 'product.png', 'Dibasic ester', 1, NULL, NULL, NULL, NULL),
(281, 'product.png', 'Diaceal LCM', 1, NULL, NULL, NULL, NULL),
(282, 'product.png', 'di-iso propanol amine.', 1, NULL, NULL, NULL, NULL),
(283, 'product.png', 'Dextro-Sorbitol', 1, NULL, NULL, NULL, NULL),
(284, 'product.png', 'Defoamer far Drilling Fluids', 1, NULL, NULL, NULL, NULL),
(285, 'product.png', 'Defoamer (Solid –Stearate)', 1, NULL, NULL, NULL, NULL),
(286, 'product.png', 'Dedeccylbenzenesulfonic acid', 1, NULL, NULL, NULL, NULL),
(287, 'product.png', 'D-Limonene', 1, NULL, NULL, NULL, NULL),
(288, 'product.png', 'Cupric Chloride dihydrate', 1, NULL, NULL, NULL, NULL),
(289, 'product.png', 'Crystalline silica quartz', 1, NULL, NULL, NULL, NULL),
(290, 'product.png', 'Crystalline silica', 1, NULL, NULL, NULL, NULL),
(291, 'product.png', 'Crude Glycerine', 1, NULL, NULL, NULL, NULL),
(292, 'product.png', 'Croscarmellose sodium', 1, NULL, NULL, NULL, NULL),
(293, 'product.png', 'Cotton seed hulls', 1, NULL, NULL, NULL, NULL),
(294, 'product.png', 'Corundum', 1, NULL, NULL, NULL, NULL),
(295, 'product.png', 'Corrosion inhibitors, Biocides, H2S Scavengers & Oxygen scavengers', 1, NULL, NULL, NULL, NULL),
(296, 'product.png', 'Corrosion inhibitor - oxygen scavenger - biocide (COB)', 1, NULL, NULL, NULL, NULL),
(297, 'product.png', 'Conc colloidal suspension technology', 1, NULL, NULL, NULL, NULL),
(298, 'product.png', 'Cold weather emulsifier', 1, NULL, NULL, NULL, NULL),
(299, 'product.png', 'CMC LV', 1, NULL, NULL, NULL, NULL),
(300, 'product.png', 'CMC HV', 1, NULL, NULL, NULL, NULL),
(301, 'product.png', 'Clouding glycol (high CP) (gallon)', 1, NULL, NULL, NULL, NULL),
(302, 'product.png', 'Citrus Peels extract', 1, NULL, NULL, NULL, NULL),
(303, 'product.png', 'Cinnamaldehyde', 1, NULL, NULL, NULL, NULL),
(304, 'product.png', 'Chrome Lignosulfonate', 1, NULL, NULL, NULL, NULL),
(305, 'product.png', 'Chrome free lignosulphonate', 1, NULL, NULL, NULL, NULL),
(306, 'product.png', 'Chrome Free Lignosulphonate', 1, NULL, NULL, NULL, NULL),
(307, 'product.png', 'Chrome Free Lignosulfonate (CFL)', 1, NULL, NULL, NULL, NULL),
(309, 'product.png', 'Choline Chloride', 1, NULL, NULL, NULL, NULL),
(310, 'product.png', 'Chlorous Acid, sodium salt', 1, NULL, NULL, NULL, NULL),
(311, 'product.png', 'Chemcide', 1, NULL, NULL, NULL, NULL),
(312, 'product.png', 'Cesium Formate', 1, NULL, NULL, NULL, NULL),
(313, 'product.png', 'Cesium formate', 1, NULL, NULL, NULL, NULL),
(314, 'product.png', 'Caustic soda beads', 1, NULL, NULL, NULL, NULL),
(315, 'product.png', 'Castor oil', 1, NULL, NULL, NULL, NULL),
(316, 'product.png', 'Carboxy methyl cellulose', 1, NULL, NULL, NULL, NULL),
(317, 'product.png', 'Calcium chloride 94-97% Big Bags', 1, NULL, NULL, NULL, NULL),
(318, 'product.png', 'Calcium Chloride', 1, NULL, NULL, NULL, NULL),
(319, 'product.png', 'Calcium carbonate flakes Medium', 1, NULL, NULL, NULL, NULL),
(320, 'product.png', 'Calcium carbonate flakes Fine', 1, NULL, NULL, NULL, NULL),
(321, 'product.png', 'Calcium carbonate flakes Coarse', 1, NULL, NULL, NULL, NULL),
(322, 'product.png', 'Calcium Carbonate (Coarse/Medium/Fine)', 1, NULL, NULL, NULL, NULL),
(323, 'product.png', 'Calcium Bromide', 1, NULL, NULL, NULL, NULL),
(324, 'product.png', 'Calcium chlorate', 1, NULL, NULL, NULL, NULL),
(326, 'product.png', 'Bronopol', 1, NULL, NULL, NULL, NULL),
(327, 'product.png', 'Bromide', 1, NULL, NULL, NULL, NULL),
(328, 'product.png', 'Brines', 1, NULL, NULL, NULL, NULL),
(329, 'product.png', 'Brine-solution filming amine', 1, NULL, NULL, NULL, NULL),
(330, 'product.png', 'Boron Trioxide', 1, NULL, NULL, NULL, NULL),
(331, 'product.png', 'Boric Acid', 1, NULL, NULL, NULL, NULL),
(332, 'product.png', 'Borate LCM plug (all components to be separately quoted)', 1, NULL, NULL, NULL, NULL),
(333, 'product.png', 'Black powder', 1, NULL, NULL, NULL, NULL),
(334, 'product.png', 'Biocide aldyide type', 1, NULL, NULL, NULL, NULL),
(335, 'product.png', 'Bicontinuous emulsified based OBM displacing fluid for tubulars (EGMBE+SURFACTANT+WETTING AGEN', 1, NULL, NULL, NULL, NULL),
(336, 'product.png', 'Benzyl Chloride', 1, NULL, NULL, NULL, NULL),
(337, 'product.png', 'Benzotriazole', 1, NULL, NULL, NULL, NULL),
(338, 'product.png', 'Benzoic acid (bridging agents)', 1, NULL, NULL, NULL, NULL),
(340, 'product.png', 'Bentonite', 1, NULL, NULL, NULL, NULL),
(341, 'product.png', 'Basic zinc carbonate H2S scavenger (ZnO + ZnCO3)', 1, NULL, NULL, NULL, NULL),
(342, 'product.png', 'Basic zinc carbonate H2S scavenger', 1, NULL, NULL, NULL, NULL),
(343, 'product.png', 'Barium sulfate', 1, NULL, NULL, NULL, NULL),
(344, 'product.png', 'Barites', 1, NULL, NULL, NULL, NULL),
(345, 'product.png', 'Bactericide forDrilling Fluids', 1, NULL, NULL, NULL, NULL),
(346, 'product.png', 'Asphaltic Shale Stabilizer', 1, NULL, NULL, NULL, NULL),
(347, 'product.png', 'Anti-Bit Balling Stick', 1, NULL, NULL, NULL, NULL),
(348, 'product.png', 'Ammonium bisulfite', 1, NULL, NULL, NULL, NULL),
(349, 'product.png', 'Aluminium complex for shale stabilisation.', 1, NULL, NULL, NULL, NULL),
(350, 'product.png', 'Alcohol Based Defoamer', 1, NULL, NULL, NULL, NULL),
(351, 'product.png', 'Acid soluble fibres for reservoirs Medium, Coarse', 1, NULL, NULL, NULL, NULL),
(352, 'product.png', 'Acid soluble fibres for reservoirs Fine', 1, NULL, NULL, NULL, NULL),
(353, 'product.png', 'Acid gases inhibitor', 1, NULL, NULL, NULL, NULL),
(355, 'product.png', 'Citric Acid', 1, NULL, NULL, NULL, NULL),
(356, 'product.png', 'Phosphoric Acid', 1, NULL, NULL, NULL, NULL),
(357, 'product.png', 'Hydrochloric Acid', 1, NULL, NULL, NULL, NULL),
(358, 'product.png', 'Baryte ', 1, NULL, NULL, NULL, NULL),
(359, 'product.png', 'Calcium carbonate', 1, NULL, NULL, NULL, NULL),
(360, 'product.png', 'Hematite ', 1, NULL, NULL, NULL, NULL),
(361, 'product.png', 'Mica', 1, NULL, NULL, NULL, NULL),
(387, '', 'lignite', 0, NULL, NULL, NULL, NULL),
(388, '', 'Resinated Lignite H.T.(>350ï¿½F)', 0, NULL, NULL, NULL, NULL),
(389, '', 'Propylene Glycol', 0, NULL, NULL, NULL, NULL),
(390, '', 'Propylene Carbonate', 0, NULL, NULL, NULL, NULL),
(391, '', 'Ethylene Glycol', 0, NULL, NULL, NULL, NULL),
(392, '', 'Fluis Loss Control Additive Well Cementing', 0, NULL, NULL, NULL, NULL),
(393, '', 'Viscoelastic Surfactant', 0, NULL, NULL, NULL, NULL),
(394, '', 'Retarder Well Cementing', 0, NULL, NULL, NULL, NULL),
(395, '', 'Viscosifier and Gelling Agent Liquid Grade', 0, NULL, NULL, NULL, NULL),
(396, '', 'Emulsifier OBM Based Drilling Fluids', 0, NULL, NULL, NULL, NULL),
(397, '', 'Synthetic Gelling Agent for Fracturing', 0, NULL, NULL, NULL, NULL),
(398, '', 'Well Cementing Specialty Chemicals and Additives', 0, NULL, NULL, NULL, NULL),
(399, '', 'Dissolvable Plugs for Liner and Filter, Well Completion', 0, NULL, NULL, NULL, NULL),
(400, '', 'P&P Dissolvable Plugs for Fracturing', 0, NULL, NULL, NULL, NULL),
(401, '', 'HEC', 0, NULL, NULL, NULL, NULL),
(402, '', 'Ethyl cellulose', 0, NULL, NULL, NULL, NULL),
(403, '', 'CMC', 0, NULL, NULL, NULL, NULL),
(404, '', 'Zinc Sulphate', 0, NULL, NULL, NULL, NULL),
(405, '', 'Copper Sulphate', 0, NULL, NULL, NULL, NULL),
(406, '', 'Manginess Sulphate', 0, NULL, NULL, NULL, NULL),
(407, '', 'sodium sulfide', 0, NULL, NULL, NULL, NULL),
(408, '', 'complex sodium disilicate - best stpp substitute', 0, NULL, NULL, NULL, NULL),
(409, '', 'modified sodium disilicate -- best builder for detergent powder', 0, NULL, NULL, NULL, NULL),
(410, '', 'zeolite 4a detergent grade', 0, NULL, NULL, NULL, NULL),
(411, '', 'CMC Sodium Detergent Grade', 0, NULL, NULL, NULL, NULL),
(412, '', 'Colorful Granulated Speckle', 0, NULL, NULL, NULL, NULL),
(413, '', 'Star-Shaped Speckle for detergent powder making', 0, NULL, NULL, NULL, NULL),
(414, '', 'CBS-X,    CBS-351', 0, NULL, NULL, NULL, NULL),
(415, '', 'DMS-X -- low price optical brightener for detergent making', 0, NULL, NULL, NULL, NULL),
(416, '', 'Needle-shaped Speckle for detergent powder making', 0, NULL, NULL, NULL, NULL),
(417, '', 'XANTHAN GUM', 0, NULL, NULL, NULL, NULL),
(418, '', 'PAM', 0, NULL, NULL, NULL, NULL),
(419, '', 'SODIUM FORMATE', 0, NULL, NULL, NULL, NULL),
(420, '', 'Gelatine', 0, NULL, NULL, NULL, NULL),
(421, '', 'Benzyl alcohol', 0, NULL, NULL, NULL, NULL),
(422, '', 'Sodium Thiosulphate', 0, NULL, NULL, NULL, NULL),
(423, '', 'Acetic Acid', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chemical_alignment`
--

CREATE TABLE `chemical_alignment` (
  `id` int(11) NOT NULL,
  `box1` int(11) NOT NULL,
  `box2` int(11) NOT NULL,
  `box3` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chemical_alignment`
--

INSERT INTO `chemical_alignment` (`id`, `box1`, `box2`, `box3`, `created_at`, `updated_at`) VALUES
(1, 22, 30, 35, '2023-06-25 21:55:47', '2023-08-17 09:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `chemical_title`
--

CREATE TABLE `chemical_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chemical_title`
--

INSERT INTO `chemical_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Supplier\'s Chemicals', NULL, NULL, '2023-06-29 12:28:05', 35);

-- --------------------------------------------------------

--
-- Table structure for table `contact_inquiry`
--

CREATE TABLE `contact_inquiry` (
  `id` int(11) NOT NULL,
  `contact_to` int(11) NOT NULL,
  `contact_from` int(11) NOT NULL,
  `to_number` varchar(200) NOT NULL,
  `from_number` varchar(200) NOT NULL,
  `type` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_inquiry`
--

INSERT INTO `contact_inquiry` (`id`, `contact_to`, `contact_from`, `to_number`, `from_number`, `type`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(11, 12, 12, '919978805350', '919978805350', 'buyer', '2023-08-03 17:52:52', 0, '0000-00-00 00:00:00', 0),
(12, 12, 12, '919978805350', '919978805350', 'buyer', '2023-08-03 17:53:16', 0, '0000-00-00 00:00:00', 0),
(13, 12, 12, '919978805350', '919978805350', 'buyer', '2023-08-03 17:54:18', 0, '0000-00-00 00:00:00', 0),
(14, 12, 12, '919978805350', '919978805350', 'buyer', '2023-08-03 17:55:34', 0, '0000-00-00 00:00:00', 0),
(15, 10, 12, '919326966409', '919978805350', 'supplier', '2023-08-03 17:57:06', 0, '0000-00-00 00:00:00', 0),
(16, 10, 12, '919326966409', '919978805350', 'supplier', '2023-08-03 17:57:08', 0, '0000-00-00 00:00:00', 0),
(48, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:46:26', 0, '0000-00-00 00:00:00', 0),
(49, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:46:32', 0, '0000-00-00 00:00:00', 0),
(50, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:46:37', 0, '0000-00-00 00:00:00', 0),
(51, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:47:00', 0, '0000-00-00 00:00:00', 0),
(52, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:47:42', 0, '0000-00-00 00:00:00', 0),
(53, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:47:44', 0, '0000-00-00 00:00:00', 0),
(54, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:47:45', 0, '0000-00-00 00:00:00', 0),
(55, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 11:47:47', 0, '0000-00-00 00:00:00', 0),
(57, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 12:05:11', 0, '0000-00-00 00:00:00', 0),
(58, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 12:06:13', 0, '0000-00-00 00:00:00', 0),
(59, 13, 21, '96879049019', '8618630128887', 'buyer', '2023-08-08 12:06:14', 0, '0000-00-00 00:00:00', 0),
(68, 10, 26, '919326966409', '917905001303', 'supplier', '2023-08-09 09:25:34', 0, '0000-00-00 00:00:00', 0),
(69, 19, 26, '8613569005336', '917905001303', 'supplier', '2023-08-09 09:25:52', 0, '0000-00-00 00:00:00', 0),
(70, 3, 26, '989903334102', '917905001303', 'supplier', '2023-08-09 09:26:14', 0, '0000-00-00 00:00:00', 0),
(75, 22, 26, '8618563075368', '917905001303', 'supplier', '2023-08-09 09:32:15', 0, '0000-00-00 00:00:00', 0),
(76, 22, 26, '8618563075368', '917905001303', 'supplier', '2023-08-09 09:32:29', 0, '0000-00-00 00:00:00', 0),
(86, 13, 26, '96879049019', '917905001303', 'share chat', '2023-08-09 09:53:33', 0, '0000-00-00 00:00:00', 0),
(108, 10, 37, '919326966409', '917506086942', 'supplier', '2023-08-12 11:52:13', NULL, NULL, NULL),
(109, 10, 37, '919326966409', '917506086942', 'supplier', '2023-08-12 11:52:15', NULL, NULL, NULL),
(110, 39, 39, '919928488170', '919928488170', 'supplier', '2023-08-12 13:11:20', NULL, NULL, NULL),
(111, 32, 42, '971566659790', '8615022619141', 'share chat', '2023-08-13 10:06:35', NULL, NULL, NULL),
(112, 32, 25, '971566659790', '8618332173585', 'buyer', '2023-08-14 11:50:23', NULL, NULL, NULL),
(113, 32, 25, '971566659790', '8618332173585', 'buyer', '2023-08-14 12:22:09', NULL, NULL, NULL),
(114, 32, 25, '971566659790', '8618332173585', 'buyer', '2023-08-14 12:45:11', NULL, NULL, NULL),
(115, 32, 25, '971566659790', '8618332173585', 'buyer', '2023-08-14 12:49:09', NULL, NULL, NULL),
(137, 54, 54, '918155066066', '918155066066', 'share chat', '2023-08-25 15:17:13', NULL, NULL, NULL),
(138, 54, 54, '918155066066', '918155066066', 'share chat', '2023-08-25 15:17:16', NULL, NULL, NULL),
(139, 54, 54, '918155066066', '918155066066', 'group chat', '2023-08-25 15:27:35', NULL, NULL, NULL),
(140, 54, 54, '918155066066', '918155066066', 'share chat', '2023-08-25 15:27:39', NULL, NULL, NULL),
(141, 54, 54, '918155066066', '918155066066', 'share chat', '2023-08-25 15:27:40', NULL, NULL, NULL),
(142, 54, 54, '918155066066', '918155066066', 'group chat', '2023-08-25 15:27:42', NULL, NULL, NULL),
(143, 54, 54, '918155066066', '918155066066', 'share chat', '2023-08-25 15:27:45', NULL, NULL, NULL),
(144, 54, 54, '918155066066', '918155066066', 'share chat', '2023-08-25 15:27:49', NULL, NULL, NULL),
(145, 54, 54, '918155066066', '918155066066', 'share chat', '2023-08-25 15:27:53', NULL, NULL, NULL),
(146, 50, 69, '966507036438', '966591317733', 'share chat', '2023-09-10 21:09:20', NULL, NULL, NULL),
(147, 50, 29, '966507036438', '4794432969', 'share chat', '2023-09-12 18:08:08', NULL, NULL, NULL),
(148, 50, 29, '966507036438', '4794432969', 'supplier', '2023-09-12 18:10:37', NULL, NULL, NULL),
(149, 50, 29, '966507036438', '4794432969', 'supplier', '2023-09-12 18:11:58', NULL, NULL, NULL),
(150, 50, 29, '966507036438', '4794432969', 'supplier', '2023-09-12 18:12:00', NULL, NULL, NULL),
(151, 26, 71, '917905001303', '8613012487607', 'share chat', '2023-09-18 06:13:22', NULL, NULL, NULL),
(152, 12, 119, '919978805350', '919554806711', 'buyer', '2023-09-21 11:11:12', NULL, NULL, NULL),
(153, 108, 119, '918882335624', '919554806711', 'buyer', '2023-09-21 11:14:18', NULL, NULL, NULL),
(154, 12, 120, '919978805350', '91982421806', 'buyer', '2023-09-21 19:30:13', NULL, NULL, NULL),
(155, 26, 122, '917905001303', '9710566449676', 'buyer', '2023-09-22 12:24:36', NULL, NULL, NULL),
(156, 26, 122, '917905001303', '9710566449676', 'buyer', '2023-09-22 12:24:40', NULL, NULL, NULL),
(157, 26, 122, '917905001303', '9710566449676', 'buyer', '2023-09-22 12:24:44', NULL, NULL, NULL),
(158, 106, 122, '966 537040220', '9710566449676', 'buyer', '2023-09-22 12:24:51', NULL, NULL, NULL),
(159, 106, 122, '966 537040220', '9710566449676', 'buyer', '2023-09-22 12:24:54', NULL, NULL, NULL),
(160, 106, 122, '966 537040220', '9710566449676', 'buyer', '2023-09-22 12:25:15', NULL, NULL, NULL),
(161, 106, 122, '966 537040220', '9710566449676', 'buyer', '2023-09-22 12:25:16', NULL, NULL, NULL),
(162, 108, 127, '918882335624', '971504035250', 'buyer', '2023-09-26 13:17:55', NULL, NULL, NULL),
(163, 13, 127, '96879049019', '971504035250', 'buyer', '2023-09-26 13:18:57', NULL, NULL, NULL),
(164, 108, 127, '918882335624', '971504035250', 'buyer', '2023-09-26 13:19:14', NULL, NULL, NULL),
(165, 123, 128, '919313698897', '919712921285', 'buyer', '2023-09-26 13:29:53', NULL, NULL, NULL),
(166, 108, 21, '918882335624', '8618630128887', 'buyer', '2023-09-26 13:52:57', NULL, NULL, NULL),
(167, 108, 21, '918882335624', '8618630128887', 'buyer', '2023-09-26 13:53:09', NULL, NULL, NULL),
(168, 108, 21, '918882335624', '8618630128887', 'buyer', '2023-09-26 13:53:18', NULL, NULL, NULL),
(169, 108, 21, '918882335624', '8618630128887', 'share chat', '2023-09-26 13:58:15', NULL, NULL, NULL),
(170, 108, 21, '918882335624', '8618630128887', 'share chat', '2023-09-26 14:00:11', NULL, NULL, NULL),
(171, 29, 21, '4794432969', '8618630128887', 'supplier', '2023-09-26 14:35:00', NULL, NULL, NULL),
(172, 108, 129, '918882335624', '919971047303', 'buyer', '2023-09-26 21:58:03', NULL, NULL, NULL),
(173, 106, 129, '966 537040220', '919971047303', 'buyer', '2023-09-26 22:00:11', NULL, NULL, NULL),
(174, 123, 130, '919313698897', '12819224860', 'share chat', '2023-09-27 07:04:05', NULL, NULL, NULL),
(175, 123, 130, '919313698897', '12819224860', 'share chat', '2023-09-27 07:04:07', NULL, NULL, NULL),
(176, 32, 135, '971566659790', '971586678649', 'buyer', '2023-09-28 13:06:25', NULL, NULL, NULL),
(177, 29, 137, '4794432969', '380507460258', 'supplier', '2023-09-28 16:42:17', NULL, NULL, NULL),
(179, 130, 143, '12819224860', '918770188541', 'share chat', '2023-09-30 09:29:56', NULL, NULL, NULL),
(180, 108, 127, '918882335624', '971504035250', 'buyer', '2023-09-30 18:43:32', NULL, NULL, NULL),
(181, 108, 127, '918882335624', '971504035250', 'supplier', '2023-09-30 18:49:37', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) CHARACTER SET latin1 NOT NULL,
  `name` varchar(80) CHARACTER SET latin1 NOT NULL,
  `nicename` varchar(80) CHARACTER SET latin1 NOT NULL,
  `iso3` char(3) CHARACTER SET latin1 DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(24, 'What is Fyndsupplier.com ?', 'Fyndsupplier.com is a global network for chemical buyers and supplier, connect chemical buyers with verified chemical suppliers and manufacturers, DIRECTLY for easy safe and cost-effective chemical procurement. ', '0000-00-00 00:00:00', 0, '2023-09-14 18:35:24', 0),
(25, 'Why chose us?', '1. Instant & Direct contact with suppliers.\r\n2. VERIFIED chemical suppliers ONLY\r\n3. Comprehensive database to find Local supplier.', '2023-03-31 07:17:31', 1, '2023-09-14 18:36:55', 0),
(26, 'What are key benefits for chemical buyers and suppliers?', 'Buyers: expand your suppliers network to 500+ to maximise your chance to meet the ONE who can offer your required chemical, target price and delivery terms; \r\nSupplier: maximise your market reach to magnify your sales .', '2023-03-31 07:15:29', 1, '2023-09-14 18:37:56', 0),
(27, 'Why trust a supplier found HERE?', 'We do a thorough due diligence of suppliers before on-boarding them.', '2023-03-31 07:17:46', 1, '2023-09-14 18:38:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq_title`
--

CREATE TABLE `faq_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_title`
--

INSERT INTO `faq_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'FAQ', NULL, NULL, '2023-06-23 18:04:19', 35);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `image`, `name`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, '1680Ali Shandy fyndsupplier.jpg', 'Ali Shendy (Drilling Fluid Specialist, Qatar Petroleum)', 'I have been associated this portal and its business activities since few years and impressed to see the work which they are doing through fyndsupplier to support suppliers and buyers of oilfield chemical for gulf market', '0000-00-00 00:00:00', 0, '2023-06-28 11:07:56', 0),
(4, '6687Ipek fyndsupplier.png', 'Ipek Degirmencioglu, (Marketing & Sales Manager, Denkim, Turkey)', 'With the support of Rameshwar, we close a good successful deal to sale PAC LV to one of this client. It was great experience to work and will continue in future', '0000-00-00 00:00:00', 0, '2023-06-28 11:12:01', 0),
(5, '1568Sikandar fyndsupplier.jpg', 'Sikandar Alam, (CEO, Universal Drilling Fluids,India)', 'We got order through them for Mutual Solvent (Butyl Glycol) in Qatar and we successfully deliver material with 100% client satisfaction', '0000-00-00 00:00:00', 0, '2023-06-28 11:12:44', 0),
(2, '3076Ardalan fyndsupplier.png', 'Ardalan Khurshid ( Supply Chain Manager, Zarawa Company, Iraq)', 'With the support fyndsupplier and its group, we procured cable and other  items including chemicals from India. It has been great experience associating with fyndsupplier and their customer support. ', '0000-00-00 00:00:00', 0, '2023-06-28 11:14:28', 0),
(6, '4818Punit fyndsupplier.jpg', 'Punit Ghoghari (Trader, Tej Suppliers & Engineering, India)', 'I was able to find two orders through this portal and its group and was successfully closed. We will continue doing it and hopefully will receive more orders regularly', '0000-00-00 00:00:00', 0, '2023-06-28 11:15:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_title`
--

CREATE TABLE `feedback_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback_title`
--

INSERT INTO `feedback_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Feedback', NULL, NULL, '2023-06-25 21:36:50', 35);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `logo` tinytext DEFAULT NULL,
  `about` tinytext DEFAULT NULL,
  `heading1` tinytext DEFAULT NULL,
  `link1` tinytext DEFAULT NULL,
  `text1` tinytext DEFAULT NULL,
  `link2` tinytext DEFAULT NULL,
  `text2` tinytext DEFAULT NULL,
  `link3` tinytext DEFAULT NULL,
  `text3` tinytext DEFAULT NULL,
  `email` tinytext DEFAULT NULL,
  `heading2` tinytext DEFAULT NULL,
  `link4` tinytext DEFAULT NULL,
  `text4` tinytext DEFAULT NULL,
  `link5` tinytext DEFAULT NULL,
  `text5` tinytext DEFAULT NULL,
  `link6` tinytext DEFAULT NULL,
  `text6` tinytext DEFAULT NULL,
  `link7` tinytext DEFAULT NULL,
  `text7` tinytext DEFAULT NULL,
  `link8` tinytext DEFAULT NULL,
  `text8` tinytext DEFAULT NULL,
  `link9` tinytext DEFAULT NULL,
  `text9` tinytext DEFAULT NULL,
  `heading3` tinytext DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `copyright` tinytext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `logo`, `about`, `heading1`, `link1`, `text1`, `link2`, `text2`, `link3`, `text3`, `email`, `heading2`, `link4`, `text4`, `link5`, `text5`, `link6`, `text6`, `link7`, `text7`, `link8`, `text8`, `link9`, `text9`, `heading3`, `address`, `copyright`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'footer-logo.png', 'A global chemical buyers and suppliers network, simplifies chemical procurement 10X, and make instant and direct contact between buyers and VERIFIED suppliers for easy safe and cost-effective procurement. ', 'NAVIGATION', './about', 'ABOUT US', './contact', 'CONTACT US', './faq', 'FAQ', 'info@fyndsupplier.com', 'RESOURCE', './blog-all', 'BLOG & HELP', './chemical-glossary', 'CHEMICAL GLOSSARY', './privacy-policy', 'PRIVACY POLICY', './terms-of-use', 'TERMS-OF-USE', './supplier', 'LIST OF SUPPLIER', './chemical-all', 'LIST OF CHEMICAL', 'LOCATION', '214 Union Street, Aberdeen AB11 5AP Scotland, United Kingdom', '@ 2023 fyndsupplier.com', '2022-09-07 07:06:42', 34, '2023-08-04 21:48:56', 34);

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`id`, `uid`, `message`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 10, 'Hello buyers, do check my company profile on here to know more about the range of Drilling Fluids we manufacture. Should you have an interest in any of the listed products, please contact us. Thank you!', '2023-07-30 12:24:05', NULL, NULL, NULL),
(3, 12, '<b>Quotation</b><br><b>Email:</b> info@fyndsupplier.com<br><b>Chemical required:</b> Acetonitrile<br><b>Target Price:</b> NA<br><b>Details:</b> Require\r\nAcetonitrile : 5000kgs\r\nChloro Acetile Chloride ( CAC) : 10000kg\r\nThionyl Chloride : 2600kg\r\nMethane Sufonyl Chloride (MSC) : 3200kgs\r\nMono Methyl Amine Solution 40%(MMA) : 3500kg\r\nPhenol (Molten) 99% : 1000kgs', '2023-08-01 16:40:46', NULL, NULL, NULL),
(4, 12, '<b>Quotation</b><br><b>Email:</b> info@fyndsupplier.com<br><b>Chemical required:</b> Acid gases inhibitor<br><b>Target Price:</b> NA<br><b>Details:</b> Chloro Acetile Chloride ( CAC) : 10000kg\r\nThionyl Chloride : 2600kg\r\nMethane Sufonyl Chloride (MSC) : 3200kgs\r\nMono Methyl Amine Solution 40%(MMA) : 3500kg\r\nPhenol (Molten) 99% : 1000kgs', '2023-08-01 16:43:49', NULL, NULL, NULL),
(5, 13, '<b>Quotation</b><br><b>Email:</b> info@fyndsupplier.com<br><b>Chemical required:</b> Sulphonate Asphalt<br><b>Target Price:</b> $450/MT <br><b>Details:</b> Sulphonate Asphalt required  in Oman. QTY - 500MT/Year. Target Price - $450/MT. ', '2023-08-03 17:44:43', NULL, NULL, NULL),
(27, 32, '<b>Quotation</b><br><b>Email:</b> info@fyndsupplier.com<br><b>Chemical required:</b> Sulfanoted styrene maleic acid polymer<br><b>Target Price:</b> NA<br><b>Details:</b> Required in UAE ', '2023-08-11 13:07:38', NULL, NULL, NULL),
(28, 39, 'Kindly share if anyone has the requirement for Guar Gum Powder.', '2023-08-12 13:15:39', NULL, NULL, NULL),
(29, 44, 'If someone needs propylene carbonate, you can contact me', '2023-08-21 08:29:26', NULL, NULL, NULL),
(30, 51, 'We,Tianpu chemical are the largest HEC.EC manufacturer in China, a state-owned enterprise with an annual output of 6000T HEC,1000T EC. We also work with a wide range of oil service companies, such as Baker Hughes, OGDCL, Halliburton and so on,If you need HEC.EC, pls contact me', '2023-08-24 07:48:48', NULL, NULL, NULL),
(31, 54, 'Todayâ€™s ready to dispatch Products List...  Aluminium Sulphate (Non Ferric Alum) Powder & Lumps - VIVAN Make  âšª Ammonium Sulphate â€“ Technical Grade  Ammonium Sulphate â€“ Pure Grade âšª Ammonium Sulphate â€“ By product GradeSodium Sulphate - UPL, Indofil, Deepak, Coromandel and Byproduct  âšª Calcium chloride - Powder & Pills Calcium chloride - Powder 88 to 90% âšª Sodium Metabisulphite â€“ 65% SO2 Sodium Sulphite - 90% & 96% âšª Sulphamic Acid â€“ Technical De-Scalent and crystal Grade Magnesium Sulphite Hepta Crystal Technical Grade  Feel free to contact us for your requirement   VIVAN INDUSTRIES Ankleshwar-393002,  Website:  http://www.vivanindustries.in/  Jayesh Gheewala +91 81550 66066', '2023-08-25 15:16:58', NULL, '2023-09-12 08:56:34', 0),
(32, 50, 'good day , we do have Mono Ethylene Glycol ', '2023-08-28 15:14:00', NULL, NULL, NULL),
(44, 106, '<b>Quotation</b><br><b>Email:</b> info@fyndsupplier.com<br><b>Chemical required:</b> Sludge Remover<br><b>Target Price:</b> NA<br><b>Details:</b> I am looking to procure Sludge Remover from ChampionX for a client in Saudi Arabia. Destination: Dammam, Saudi Arabai, Qty: 1FCL. ONLY ChampionX brand acceptable. For other you can contact.', '2023-09-14 17:25:02', NULL, NULL, NULL),
(46, 104, 'hi sir, does anyone need detergent raw materials? we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.   We have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008. my mobile/whatsapp/wechat: 0086-18852572628, billnai@csdschina.com', '2023-09-15 08:52:00', NULL, NULL, NULL),
(47, 71, 'Hello, I am Miranda, a sodium sulfide and sodium hydrogen sulfide raw plant seller in China. Does your company need these two products?', '2023-09-18 06:15:49', NULL, NULL, NULL),
(50, 108, '<b>Quotation</b><br><b>Email:</b> info@fyndsupplier.com<br><b>Chemical required:</b> ethyl acetate<br><b>Target Price:</b> On Request<br><b>Details:</b> Do you have Ethyl Acetate. Required 3FCL 40ft container to Algeria. ', '2023-09-20 17:51:16', NULL, NULL, NULL),
(51, 108, '<b>Quotation</b><br><b>Email:</b> rameshwar@wesmartyinfotech.com<br><b>Chemical required:</b> Urea<br><b>Target Price:</b> On Request<br><b>Details:</b> Requirement of Urea prilled or granular .\r\n35,000 MT immediately for first week of October 2023. Cif or fob basis\r\nPayment -- Buyer is ready to provide LC from Standard Chattered Bank UAE or any Major bank.', '2023-09-22 12:15:50', NULL, NULL, NULL),
(52, 123, '<b>Quotation</b><br><b>Email:</b> rameshwar@wesmartyinfotech.com<br><b>Chemical required:</b> Calcium carbonate<br><b>Target Price:</b> NA<br><b>Details:</b> Urgent Requirement(today)\r\n\r\nProduct name - Calcium Carbonate -Limestone\r\n\r\nMesh size -250\r\nPurity -92%\r\nLimestone - 97% Caco3\r\n\r\nQty - 10 mt \r\n Near to Gujarat preferable ', '2023-09-26 12:48:09', NULL, NULL, NULL),
(53, 108, '<b>Quotation</b><br><b>Email:</b> info@fyndsupplier.com<br><b>Chemical required:</b> Xanthan Gum<br><b>Target Price:</b> On Request<br><b>Details:</b> Please find the RFQ for  8000 bag of Xanthan Gum. Packing required: 25 Kg bags must be pelletized . Kindly provide details on availability, pricing ( CIF Sohar Port) , and delivery lead time. Viscosity must be (1200-1700) . ', '2023-09-26 12:50:28', NULL, NULL, NULL),
(56, 130, '<b>Quotation</b><br><b>Email:</b> setor.k.sorkpor@afriquesc.com<br><b>Chemical required:</b> Bentonite<br><b>Target Price:</b> 95<br><b>Details:</b> Please provide competitive quote', '2023-09-28 23:43:06', NULL, NULL, NULL),
(57, 130, '<b>Quotation</b><br><b>Email:</b> setor.k.sorkpor@afriquesc.com<br><b>Chemical required:</b> Calcium chloride 94-97% Big Bags<br><b>Target Price:</b> N/a<br><b>Details:</b> Urgent need for \r\nLime hydrated. Safe carb. Sodium silicate. Mutual solvent. Ammonium chloride', '2023-09-28 23:43:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `head_script`
--

CREATE TABLE `head_script` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `head_script`
--

INSERT INTO `head_script` (`id`, `content`) VALUES
(1, '<!-- Google tag (gtag.js) -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-V08207EVKS\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-V08207EVKS\');\r\n</script>');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `id` int(11) NOT NULL,
  `banner` varchar(200) NOT NULL,
  `title1` text DEFAULT NULL,
  `title2` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`id`, `banner`, `title1`, `title2`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(9, '2197Serving the industry since 2009-min.png', 'SERVING THE INDUSTRY ', 'SINCE 2009', '2023-03-25 14:04:35', NULL, NULL, NULL),
(11, '1893Global Chemical Buyers &amp; Suppliers Network (2).png', 'Want to have these benefits?', 'Contact us - 47 944 32 969', '2023-06-25 19:31:38', NULL, NULL, NULL),
(13, '2484www.fyndsupplier.com-min.png', 'GLOBAL NETWORK OF CHEMICAL BUYERS & SELLERS ', 'JOIN OUR NEWTWORK OF 500+ USERS', '2023-06-28 21:27:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_banner_title`
--

CREATE TABLE `home_banner_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_banner_title`
--

INSERT INTO `home_banner_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Chemical Buying & Selling', NULL, NULL, '2023-07-06 12:17:26', 35);

-- --------------------------------------------------------

--
-- Table structure for table `home_head_script`
--

CREATE TABLE `home_head_script` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_head_script`
--

INSERT INTO `home_head_script` (`id`, `content`) VALUES
(1, '<!-- Google tag (gtag.js) -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-V08207EVKS\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-V08207EVKS\');\r\n</script>');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `main_chemical_id` int(11) NOT NULL,
  `chemical_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `min_order_quantity` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `density` text NOT NULL,
  `product_info` text NOT NULL,
  `manufacturer_details` text DEFAULT NULL,
  `product_specification` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `supplier_id`, `buyer_id`, `main_chemical_id`, `chemical_id`, `product_name`, `min_order_quantity`, `price`, `density`, `product_info`, `manufacturer_details`, `product_specification`, `created_at`, `created_by`, `updated_at`, `updated_by`, `comment`) VALUES
(13, 44, 108, 391, 35, 'Ethylene Glycol', '1', 'On Request', 'India ', 'Do you supply TEG for India?', 'We are an innovative company specializing in the chemical field. Since establish in 2009, We have a complete technical R&D, quality assurance, and sales service system, and products have been exported to more than 190 countries.We are highly appreciated and trusted by domestic and overseas customers.', 'Drum', '2023-09-28 15:09:21', NULL, NULL, NULL, 'Do you supply TEG for India?');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_offer`
--

CREATE TABLE `inquiry_offer` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `chemical` text NOT NULL,
  `email` text NOT NULL,
  `target_offer_price` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `min_order_quantity` varchar(20) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `rfq` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiry_offer`
--

INSERT INTO `inquiry_offer` (`id`, `image`, `uid`, `mobile`, `chemical`, `email`, `target_offer_price`, `details`, `min_order_quantity`, `type`, `rfq`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(7, NULL, 12, '919978805350', 'Acetonitrile', 'info@fyndsupplier.com', 'NA', 'Require\r\nAcetonitrile : 5000kgs\r\nDestination: India', '1', 'inquiry', '776825', 1, '2023-08-01 16:40:40', NULL, '2023-08-01 16:41:47', 34),
(8, NULL, 12, '919978805350', 'Chloro Acetile Chloride (CAC)', 'info@fyndsupplier.com', 'NA', 'Chloro Acetile Chloride ( CAC) : 10000kg\r\nThionyl Chloride : 2600kg\r\nMethane Sufonyl Chloride (MSC) : 3200kgs\r\nMono Methyl Amine Solution 40%(MMA) : 3500kg\r\nPhenol (Molten) 99% : 1000kgs', '1', 'inquiry', '497963', 1, '2023-08-01 16:43:45', NULL, '2023-08-01 16:44:34', 34),
(9, NULL, 13, '96879049019', 'Sulphonate Asphalt', 'info@fyndsupplier.com', '$450/MT ', 'Sulphonate Asphalt required  in Oman. QTY - 500MT/Year. Target Price - $450/MT. ', '1 FCL ', 'inquiry', '275365', 1, '2023-08-03 17:44:37', NULL, '2023-08-03 17:44:43', NULL),
(10, NULL, 12, '919978805350', 'Dimethyl formamide', 'ambslifescience.mkt@gmail.com', '800$/MT', 'need 50 MT Dimethyl formamide (DMF) to kandla port, gujarat, India.', NULL, 'inquiry', '519994', 0, '2023-08-03 18:12:50', NULL, NULL, NULL),
(22, '5453magnesium sulphate.jpg', 22, '8618563075368', 'Magnesium sulfate heptahydrate 0.1-1mm', 'info@fyndsupplier.com', ' FOB Qingdao Port $80/MT', 'Packing capacity: 27T/1*20GP\r\nPacking: 25kg\r\nOffer validity: 7 days', '54T', 'offer', '311426', 1, '2023-08-08 12:23:31', NULL, '0000-00-00 00:00:00', NULL),
(23, '1409images (2).jpg', 22, '8618563075368', 'Magnesium sulfate heptahydrate 2-4mm', 'info@fyndsupplier.com', 'FOB Qingdao Port $88/MT', 'Packing capacity: 27T/1*20GP\r\nPacking: 25kg\r\nOffer validity: 7 days', '27T', 'offer', '887601', 1, '2023-08-08 12:28:08', NULL, '0000-00-00 00:00:00', NULL),
(38, NULL, 32, '971566659790', 'Sulfanoted styrene maleic acid polymer', 'info@fyndsupplier.com', 'NA', 'Required in UAE ', '210 kg', 'inquiry', '848527', 1, '2023-08-11 13:07:31', NULL, '2023-08-11 13:07:38', NULL),
(41, NULL, 26, '917905001303', 'Basic zinc carbonate H2S scavenger', 'rajeshchauhan.niit@gmail.com', '5', 'final test ', NULL, 'inquiry', '204322', 1, '2023-08-17 09:27:34', NULL, '2023-09-14 17:19:17', NULL),
(43, '4378HECäº§å“æˆå“åŒ…è£…ç…§ç‰‡ï¼ˆæ­£é¢1ï¼‰.JPG', 51, '8615196066587', 'HEC', '15196066587@163.com', '6200', 'Hi,All,We,Tianpu chemical are the largest HEC.EC manufacturer in China, a state-owned enterprise with an annual output of 6000T HEC,1000T EC. We also work with a wide range of oil service companies, such as Baker Hughes, OGDCL, Halliburton and so on,If you need HEC.EC, pls contact me', '1', 'offer', '427478', 1, '2023-08-24 07:14:31', NULL, '2023-09-14 17:31:13', NULL),
(59, 'product.png', 70, '917383243436', 'Phosphoric Acid', 'info@fyndsupplier.com', 'On Request', 'Fresh stock of phosphoric acid ( GACL) is available with us.\r\n\r\nPACKING: 50 KG Carbo packing', '1', 'offer', '647578', 1, '2023-09-11 11:43:50', NULL, '2023-09-11 11:44:21', NULL),
(60, 'product.png', 72, '917778814849', 'Glycerin', 'info@fyndsupplier.com', 'On Request', 'Glycerine 99.7%  available in drum packing .  send  inquiry if required', '1', 'offer', '655358', 1, '2023-09-12 23:03:52', NULL, '2023-09-12 23:04:32', NULL),
(62, NULL, 106, '966 537040220', 'Sludge Remover', 'info@fyndsupplier.com', 'NA', 'I am looking to procure Sludge Remover from ChampionX for a client in Saudi Arabia. Destination: Dammam, Saudi Arabai, Qty: 1FCL. ONLY ChampionX brand acceptable. For other you can contact.', '1FCL', 'inquiry', '701800', 1, '2023-09-14 17:24:58', NULL, '2023-09-14 17:25:02', NULL),
(63, '15461.jpg', 104, '8618852572628', 'STPP', 'billnai@csdschina.com', '4-600', 'Commodity: Complex Sodium Disilicate\r\nApplication: replace STPP in detergent powder making \r\nItem                Type   	Type 1	Type 2\r\nAppearance 	white small granule, free flowing	white fine powder\r\nBulk density	0.48g/cm3	0.68g/cm3\r\n20FT Container	13 mts	20 mts\r\n40HQ Container	26 mts	26-30 mts\r\nPreferred technology	Drying mixing, Post-spraying	Pre-spray\r\nSpecification and COA\r\nItem 	Standard	Test result\r\nCalcium exchange capacity 	>=400 mgCaCO3/gCSDS	441.06\r\nHumidity:	<=5%	2.5\r\nPH value:	<=12	11.27\r\nSiO2:	>=20%	23.08\r\nWhiteness:	>=85%	87.99\r\nBulk Density	0.40-0.85	Conform\r\nPacking: 25kgs in plastic woven bag with inner plastic film bag \r\nUnit price: usd575/mt FOB Shanghai, China \r\nAdvantage: \r\n1. completely friendly to environment \r\n2. excellent function and high calcium exchange ability (400min), better than STPP\r\n3. excellent PH buffering capacity\r\n4. competitive price to reduce much cost \r\n5. free flowing and low density: 0.48/ml around.\r\n6. not easily absorb moisture in air to become cake. \r\n7. very suitable for high tower sprayer and especially dry mix or blending\r\n8. be used same as STPP in producing process, without any change in equipment\r\n9. to make common or concentrate detergent powder; free-phosphate or low-phosphate detergent powder\r\nFor more info, please feel free to contact me: billnai@csdschina.com ; whatsapp +8618852572628\r\n', '1', 'offer', '344885', 1, '2023-09-15 08:45:37', NULL, '2023-09-28 13:23:21', NULL),
(64, '6046zeolite å°å›¾.jpg', 104, '8618852572628', 'zeolite 4a detergent grade', 'billnai@csdschina.com', '3-400', 'Commodity: Zeolite Detergent Grade\r\nFor Detergent Powder and soap bar Making\r\nSpecification	Standard	Result\r\nCalcium Exchange Ability (MgCaCO3/g Zeolite)	310 Min	330\r\nWhiteness %	95min	96\r\nPh Value ( 1% Solution, 25â„ƒ )	11.3 Max	11\r\nL.O.I  (500+/-10%,1h)	22  Max	18\r\nGranularity	Average Size	2-4um	Conform\r\n		â‰¥10um	90\r\n		â‰¤4um	2\r\nPacking: 25kgs in plastic woven bag with inner plastic film bag, 25mts Per 20FT Container\r\n', '1', 'offer', '566850', 1, '2023-09-15 08:46:38', NULL, '2023-09-17 08:15:18', NULL),
(67, '3998hydrogen peroxide 50.png', 108, '918882335624', 'Hydrogen Peroxide 50%', 'info@fyndsupplier.com', '$2900/MT', 'Ready stock available for dispatch\r\n\r\nHydrogen Peroxide 50%\r\nPrice : 2900 USD /MT- Ex-Petrapole/ Kolkata\r\nPacking : 30 kg Carbouy \r\nMake : Bangladesh', '1FCLL', 'offer', '556400', 1, '2023-09-17 12:51:57', NULL, '2023-09-21 09:51:47', 34),
(70, 'product.png', 110, '919453179080', 'Alcohol Based Defoamer', 'testsupplier@gmail.com', '100', 'test', '1', 'offer', '192225', 1, '2023-09-18 20:30:34', NULL, '2023-09-18 20:30:44', NULL),
(74, NULL, 108, '918882335624', 'ethyl acetate', 'info@fyndsupplier.com', 'On Request', 'Do you have Ethyl Acetate. Required 3FCL 40ft container to Algeria. ', NULL, 'inquiry', '356369', 1, '2023-09-20 16:57:09', NULL, '2023-09-20 17:51:16', NULL),
(76, '6174PAC Offer fyndsupplier .jpg', 29, '4794432969', 'PAC LV 65%', 'info@fyndsupplier.com', '1290$/MT', 'We are offering API grade, Polyanionic Cellulose - PAC LV 70%, Turkey Origin, Offer Price 1290$/MT ex-work Istanbul, Turkey. Please contact for Sample or offer. ', '1FCL', 'offer', '555308', 1, '2023-09-21 10:00:20', NULL, '2023-09-21 10:06:05', NULL),
(77, '5688soldium bromide fyndsupplier offer.jpg', 108, '918882335624', 'Sodium Bromide Solution', 'info@fyndsupplier.com', '1270$/MT', 'We have Sodium Bromide Solution, @ $1270/MT Ex-work India , Origin,: China. Please contact if required. ', '1FCL', 'offer', '411329', 1, '2023-09-21 10:05:59', NULL, '2023-09-21 10:06:02', NULL),
(79, NULL, 108, '918882335624', 'Urea', 'rameshwar@wesmartyinfotech.com', 'On Request', 'Requirement of Urea prilled or granular .\r\n35,000 MT immediately for first week of October 2023. Cif or fob basis\r\nPayment -- Buyer is ready to provide LC from Standard Chattered Bank UAE or any Major bank.', NULL, 'inquiry', '224447', 1, '2023-09-22 12:15:19', NULL, '2023-09-22 12:15:50', NULL),
(80, NULL, 123, '919313698897', 'Calcium carbonate', 'rameshwar@wesmartyinfotech.com', 'NA', 'Urgent Requirement(today)\r\n\r\nProduct name - Calcium Carbonate -Limestone\r\n\r\nMesh size -250\r\nPurity -92%\r\nLimestone - 97% Caco3\r\n\r\nQty - 10 mt \r\n Near to Gujarat preferable ', NULL, 'inquiry', '294100', 1, '2023-09-22 13:15:57', NULL, '2023-09-26 12:48:09', NULL),
(83, '2979Mr Nate      Phosphoric Acid       CHANHEN (2).png', 126, '8613688375526', 'Phosphoric Acid', 'yangb@chanhen.com', '1080', 'CHANHEN___The Top Phosphoric Acid Factory from China Since 1999\r\n * Food Grade Phosphoric Acid\r\n * Tech Grade Phosphoric Acid\r\n * Merchant Grade Phosphoric Acid\r\n\r\n\r\nSend me inquiry: yangb@chanhen.com (Mr Nate)\r\nWhatsApp/WeChat/Mobile:0086-13688375526', '1', 'offer', '936137', 1, '2023-09-26 12:25:31', NULL, '2023-09-28 13:23:09', NULL),
(84, NULL, 108, '918882335624', 'Xanthan Gum', 'info@fyndsupplier.com', 'On Request', 'Please find the RFQ for  8000 bag of Xanthan Gum. Packing required: 25 Kg bags must be pelletized . Kindly provide details on availability, pricing ( CIF Sohar Port) , and delivery lead time. Viscosity must be (1200-1700) . ', '1FCL', 'inquiry', '251290', 1, '2023-09-26 12:50:24', NULL, '2023-09-26 12:50:28', NULL),
(85, NULL, 130, '12819224860', 'Bentonite', 'setor.k.sorkpor@afriquesc.com', '95', 'Please provide competitive quote', NULL, 'inquiry', '643562', 1, '2023-09-27 06:59:10', NULL, '2023-09-28 23:43:06', NULL),
(86, NULL, 130, '12819224860', 'Calcium chloride 94-97% Big Bags', 'setor.k.sorkpor@afriquesc.com', 'N/a', 'Urgent need for \r\nLime hydrated. Safe carb. Sodium silicate. Mutual solvent. Ammonium chloride', NULL, 'inquiry', '800858', 1, '2023-09-27 08:12:47', NULL, '2023-09-28 23:43:13', NULL),
(88, '6203All Product Catlog.jpg', 133, '9109975568855', 'cellulose powder', 'sales@noyeroverseas.com', '-', 'Our Products Are :-\r\n\r\nA) Oil Well Drilling Lost Circulation Material Products\r\n\r\n1) Cellulose Fiber (Fibroseal)\r\n2) Tannin Fiber ( Vinseal)\r\n3) Walnut Shell Powder\r\n4) Quickseal\r\n\r\nB) Cosmetic Purpose Products\r\n\r\n1) Walnut Shell Granules (Cosmetic Grade)\r\n2) Fresh Aloevera Leaves\r\n\r\nC) Water Treatment Product\r\n\r\n1) walnut shell filter media\r\n\r\nD) Cattle Feed Fillers', '1', 'offer', '223153', 1, '2023-09-28 11:50:48', NULL, '2023-09-28 13:22:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_title`
--

CREATE TABLE `inquiry_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiry_title`
--

INSERT INTO `inquiry_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Feedback', NULL, NULL, '2023-06-23 17:55:21', 35);

-- --------------------------------------------------------

--
-- Table structure for table `offer_alignment`
--

CREATE TABLE `offer_alignment` (
  `id` int(11) NOT NULL,
  `box1` int(11) NOT NULL,
  `box2` int(11) NOT NULL,
  `box3` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer_alignment`
--

INSERT INTO `offer_alignment` (`id`, `box1`, `box2`, `box3`, `created_at`, `updated_at`) VALUES
(1, 77, 76, 67, '2023-06-25 21:55:47', '2023-09-21 10:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `offer_title`
--

CREATE TABLE `offer_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer_title`
--

INSERT INTO `offer_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Latest offers and surplus chemicals', NULL, NULL, '2023-06-25 22:12:47', 35);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_alignment`
--

CREATE TABLE `quotation_alignment` (
  `id` int(11) NOT NULL,
  `box1` int(11) NOT NULL,
  `box2` int(11) NOT NULL,
  `box3` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotation_alignment`
--

INSERT INTO `quotation_alignment` (`id`, `box1`, `box2`, `box3`, `created_at`, `updated_at`) VALUES
(1, 38, 62, 84, '2023-06-25 21:55:47', '2023-09-26 12:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_title`
--

CREATE TABLE `quotation_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotation_title`
--

INSERT INTO `quotation_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Latest Purchase Inquiries', NULL, NULL, '2023-06-25 22:04:47', 35);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `keyword` tinytext NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `title`, `description`, `keyword`, `page`) VALUES
(1, 'Welcome Home - Oilfiled Chemical', 'A global chemical buyers and suppliers network, simplifies chemical procurement 10X', 'Oilfiled Chemical, Chemical, Chemical Supplier', 'default'),
(3, 'About', 'Fyndsupplier.com is a global network for chemical buyers and suppliers, connect chemical buyers with following categories of chemical suppliers:\r\n1. Drilling chemical manufacturers and suppliers\r\n2. Cementing chemical manufacturers and suppliers\r\n3. Produ', 'Oilfiled Chemical, Chemical, Chemical Supplier, water treatment chemical suppliers, stimulation chemical suppliers, drilling chemical manufacturers and suppliers, scale inhibitor, corrosion inhibitor, biocide, acid, mutual solvent, glycol, industrial chem', 'about.php'),
(4, 'Blog All', 'The blog page on Fyndsupplier.com a global chemical buyers and suppliers network, talk about multiple subjects related chemical suppliers and buyers. The page can work as help guide and knowledge sharing for chemical buyers and suppliers. The blogs are pr', 'Oilfiled Chemical, Chemical, Chemical Supplier, chemical suppliers in India, chemical suppliers in Turkey chemical suppliers in Middle East, Chemical suppliers in UAE', 'blog-all.php'),
(5, 'Chemical All', 'Fyndsupplier.com is a global chemical buyers and suppliers network, simplifies chemical procurement 10X. The network deal with multiple categories of chemical manufacturers and suppliers such as:\r\n\r\nWater treatment chemical manufacturers and suppliers\r\nDr', 'Oilfiled Chemical, Chemical, Chemical Supplier, Scale and Corrosion Inhibitor, Manufacturers and suppliers, H2S Scavenger Manufacturers and suppliers, Biocide Manufacturers and suppliers, Cellulose( PAC LV/HV, CMC) Manufacturers and Suppliers, Glycol (EGM', 'chemical-all.php'),
(6, 'Chemical Glossary', 'The chemical glossary is about briefing about different chemicals which fyndsuppliers deal with. We have divided chemicals available on website within eight major categories (water treatment chemicals, stimulation chemical, drilling chemicals, cementing c', 'Oilfiled Chemical, Chemical, Chemical Supplier, water treatment chemicals, stimulation chemical, drilling chemicals, cementing chemicals, production chemicals, refinery chemicals', 'chemical-glossary.php'),
(7, 'Contact', 'Fyndsupplier have global presence with main office in India. Fyndsupplier is a global chemical buyers and suppliers network, simplifies chemical procurement 10X. We have agents in Norway, UK, UAE, Oman, Qatar, Saudi Arabia, Kuwait. \r\n\r\nWe have supplied ch', 'Oilfiled Chemical, Chemical, Chemical Supplier, contact of chemical suppliers and buyers. chemical suppliers contact in UAE, chemical suppliers contact in Oman, chemical suppliers contact in Qatar, chemical suppliers contact in Saudi, chemical suppliers c', 'contact.php'),
(8, 'FAQ', 'Fluently Ask Questions (FAQ) on this page talk about questions related with chemical, chemical manufacturers, chemical buyers, chemical market and general application of fyndsupplier.com. Fyndsupplier is a global chemical buyers and suppliers network, sim', 'Oilfiled Chemical, Chemical, Chemical Supplier, Polyanionic Cellulose (PAC) manufacturers and suppliers, Calcium Carbonate suppliers and manufacturers, barium sulphate manufacturers and suppliers, sodium bisulphate manufacturers and suppliers, bactericide', 'faq.php'),
(9, 'Leading Chemical Supplier | Quality Chemicals for Your Industry', 'Welcome to Oilfield Chemical, your trusted source for top-quality chemicals. Explore a diverse range of chemical solutions for your industry needs. Partner with us for reliable supplies and exceptional service. Contact us today', 'Oilfiled Chemical, Chemical, Chemical Supplier', 'index.php'),
(10, 'Inquiry', 'fyndsupplier.com  global chemical buyers and suppliers network, simplifies chemical procurement 10X, help chemical buyers to raise purchase inquiry which then reaches to chemical suppliers to receive quote. Once fyndsupplier register an inquiry by chemica', 'Oilfiled Chemical, Chemical, Chemical Supplier, corrosion inhibitor chemical manufacturer and supplier, water treatment chemical manufacturers and supplier, water treatment chemical supplier, stimulation chemical supplier, refinery chemical supplier, prod', 'inquiry-all.php'),
(11, 'Offer', 'The offer submitted on fyndsupplier.com by chemical suppliers to promote their products, market their products and connect with chemical buyers. The offer help chemical suppliers to notify buyers about new offered price, discount, available stocks and sur', 'Oilfiled Chemical, Chemical, Chemical Supplier, chemical manufacturers and suppliers in Middle East, chemical suppliers and manufacturers in Asia, chemical suppliers and manufacturers in Africa, offer from chemical manufacturers and suppliers. surplus che', 'offer-all.php'),
(12, 'Privacy Policy', 'Fyndsupplier.com global chemical buyers and suppliers network, simplifies chemical procurement 10X and help chemical buyers to connect with trusted chemical manufacturers and suppliers. \r\n\r\nOur privacy policy is that we dont share suppliers or buyers data', 'Oilfiled Chemical, Chemical, oilfield chemical suppliers in Middle East, Chemical Supplier, chemical suppliers and manufacturers in UAE, chemical suppliers and manufacturers in Oman, chemical suppliers and manufacturers in Saudi Arabia, chemical suppliers', 'privacy-policy.php'),
(13, 'Chemical Supplier Search: Find Reliable Suppliers for Your Industry Needs', 'Discover top chemical suppliers for your industry needs. Explore a wide range of high-quality chemicals, reliable suppliers, and competitive prices on our search page. Find the perfect chemical solutions today.', 'Oilfiled Chemical, Chemical, Chemical Supplier', 'search.php'),
(14, 'Supplier', 'Fyndsupplier.com is a global chemical buyers and suppliers network, simplifies chemical procurement 10X and help connect chemical suppliers with buyers DIRECTLY.  Chemical manufacturers and suppliers in Doha, Dubai, Abu Dhabi, Kuwait, Muscat, Riyad, Damma', 'Oilfiled Chemical, Chemical, Chemical Supplier, Chemical manufacturers and suppliers in Doha, Chemical manufacturers and suppliers in Muscat, Chemical manufacturers and suppliers in Dubai, Chemical manufacturers and suppliers in Abu Dhabi, Chemical manufa', 'supplier.php'),
(15, 'Terms Of Use', 'A global chemical buyers and suppliers network, simplifies chemical procurement 10X. Fyndsupplier helps chemical manufacturers and suppliers in the UAE, Oman, Qatar, Saudi Arabia, Kuwait, India, Malaysia, Indonesia, Bangladesh, Vietnam and China to sale o', 'Oilfiled Chemical, Chemical, Chemical Supplier, Chemical Manufacturers and Suppliers, Chemical Manufacturers and Suppliers in UAE, Chemical Manufacturers and Suppliers in India, Chemical Manufacturers and Suppliers in China, Chemical Manufacturers and Sup', 'terms-of-use.php');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_alignment`
--

CREATE TABLE `supplier_alignment` (
  `id` int(11) NOT NULL,
  `box1` int(11) NOT NULL,
  `box2` int(11) NOT NULL,
  `box3` int(11) NOT NULL,
  `box4` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_alignment`
--

INSERT INTO `supplier_alignment` (`id`, `box1`, `box2`, `box3`, `box4`, `created_at`, `updated_at`) VALUES
(1, 139, 141, 25, 44, '2023-06-25 21:55:47', '2023-09-29 13:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_chemical_list`
--

CREATE TABLE `supplier_chemical_list` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `chemical_id` int(11) NOT NULL,
  `chemical_photo` text DEFAULT NULL,
  `product_name` text NOT NULL,
  `min_order_quantity` varchar(20) NOT NULL,
  `price` varchar(255) NOT NULL,
  `density` text NOT NULL,
  `product_specification` text DEFAULT NULL,
  `product_info` text NOT NULL,
  `manufacturer_details` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_chemical_list`
--

INSERT INTO `supplier_chemical_list` (`id`, `uid`, `chemical_id`, `chemical_photo`, `product_name`, `min_order_quantity`, `price`, `density`, `product_specification`, `product_info`, `manufacturer_details`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 10, 349, 'product.png', 'Aluminium complex for shale stabilisation.', '20MT', 'TBD', '', '50-lb or 55.1-lb bag', 'Aluminum Complex / Resin blend Shale Stabilizer for WBM.', 'Krish Drill Chem', 1, '2023-07-30 11:59:30', NULL, '2023-07-30 12:01:45', NULL),
(3, 10, 346, 'product.png', 'Asphaltic Shale Stabilizer', '20MT', 'TBD', '', '50-lb bag or 1-MT SS', 'Sodium Sulfonated Asphalt', 'Krish Drill Chem', 1, '2023-07-30 12:00:15', NULL, '2023-07-30 12:01:28', NULL),
(4, 10, 320, 'product.png', 'Calcium carbonate flakes Fine', '20MT', 'TBD', '', '50-lb bag', 'Flaked Calcium Carbonate (Fine)', 'Krish Drill Chem', 1, '2023-07-30 12:01:12', NULL, NULL, NULL),
(5, 10, 319, 'product.png', 'Calcium carbonate flakes Medium', '20MT', 'TBD', '', '50-lb bag', 'Flaked Calcium Carbonate (Medium)', 'Krish Drill Chem', 1, '2023-07-30 12:02:17', NULL, NULL, NULL),
(6, 10, 321, 'product.png', 'Calcium carbonate flakes Coarse', '20MT', 'TBD', '', '50-lb bag', 'Flaked Calcium Carbonate (Coarse)', 'Krish Drill Chem', 1, '2023-07-30 12:02:52', NULL, '2023-07-30 12:03:04', NULL),
(7, 10, 307, 'product.png', 'Chrome Free Lignosulfonate (CFL)', '20MT', 'TBD', '', '50-lb bag', 'Chrome Free Lignosulfonate', 'Krish Drill Chem', 1, '2023-07-30 12:04:45', NULL, NULL, NULL),
(8, 10, 304, 'product.png', 'Chrome Lignosulfonate', '20MT', 'TBD', '', '50-lb bag', 'Chrome Lignosulfonate', 'Krish Drill Chem', 1, '2023-07-30 12:05:21', NULL, NULL, NULL),
(9, 10, 281, 'product.png', 'Diaceal LCM', '20MT', 'TBD', '', '40-lb bag', 'Diaseal-M LCM equivalent', 'Krish Drill Chem', 1, '2023-07-30 12:06:22', NULL, NULL, NULL),
(10, 10, 271, 'product.png', 'Drilling Detergent', '20MT', 'TBD', '', '5-gal pail or 53-gal or 55-gal or 1,000-Lit Tote', 'Drilling Detergent (Surfactant)', 'Krish Drill Chem', 1, '2023-07-30 12:08:11', NULL, NULL, NULL),
(11, 10, 259, 'product.png', 'Extreme Pressure Lubricant', '20MT', 'TBD', '', '55-gal', 'Extreme Pressure Lubricant (WBM, water-insoluble)', 'Krish Drill Chem', 1, '2023-07-30 12:09:07', NULL, NULL, NULL),
(12, 10, 147, 'product.png', 'Organophilic Lignite', '20MT', 'TBD', '', '50-lb bag', 'Fluid Loss Control Agent (OBM)', 'Krish Drill Chem', 1, '2023-07-30 12:10:50', NULL, NULL, NULL),
(13, 10, 225, 'product.png', 'HTHP Fluid Loss for OBM; asphaltite material', '20MT', 'TBD', '', '50-lb or 1MT SS', 'Modified Gilsonite Powder for OBM fluid loss control', 'Krish Drill Chem', 1, '2023-07-30 12:11:43', NULL, NULL, NULL),
(14, 10, 143, 'product.png', 'Organophylic Lignite H.T. (Amine-Treated Lignite)', '20MT', 'TBD', '', '50-lb bag', 'Organo Lignite for OBM fluid loss control', 'Krish Drill Chem', 1, '2023-07-30 12:12:31', NULL, NULL, NULL),
(15, 10, 127, 'product.png', 'Pipe freeing agent - non-weightable', '20MT', 'TBD', '', '55-gal', 'Spotting Fluid (N/W) for WBM ', 'Krish Drill Chem', 1, '2023-07-30 12:13:35', NULL, NULL, NULL),
(16, 10, 123, 'product.png', 'Polyamine Shale Inhibitor', '20MT', 'TBD', '', '53-gal', 'WBM Polyamine Shale Inhibitor', 'Krish Drill Chem', 1, '2023-07-30 12:14:36', NULL, NULL, NULL),
(17, 10, 387, 'product.png', 'lignite', '20MT', 'TBD', '', '50-lb bag or 1-MT SS', 'Modified Lignite Powder to perform as a thinner, deflocculant and fluid loss control.', 'Krish Drill Chem', 1, '2023-07-30 12:15:58', NULL, '2023-07-30 21:57:28', NULL),
(18, 10, 113, 'product.png', 'Potassium Chrome Lignite', '20MT', 'TBD', '', '50-lb bag', 'Potassium Chrome blend Lignite for WBM', 'Krish Drill Chem', 1, '2023-07-30 12:16:36', NULL, NULL, NULL),
(19, 10, 109, 'product.png', 'Potassium Lignite', '20MT', 'TBD', '', '50-lb bag', 'Potassium blended Lignite', 'Krish Drill Chem', 1, '2023-07-30 12:16:59', NULL, NULL, NULL),
(20, 10, 388, 'product.png', 'Resinated Lignite H.T.(>350ï¿½F)', '20MT', 'TBD', '', '500-lb', 'Resinated Lignite for H.T. wells', 'Krish Drill Chem', 1, '2023-07-30 12:17:28', NULL, '2023-07-30 21:57:19', NULL),
(21, 10, 91, 'product.png', 'Rig Wash (Degreaser)', '20MT', 'TBD', '', '5-gal or 55-gal or 1,000-Lit Tote', 'Rig Wash degreaser for cleaning rig floors, mud tanks, etc.', 'Krish Drill Chem', 1, '2023-07-30 12:18:42', NULL, NULL, NULL),
(22, 10, 52, 'product.png', 'Synergistic polymer', '20MT', 'TBD', '', '55-gal', '(Synergistic) Polymeric Deflocculant Liquid', 'Krish Drill Chem', 1, '2023-07-30 12:20:30', NULL, NULL, NULL),
(24, 19, 353, '5001TMQ.jpg', 'Acid gases inhibitor', '1MT', '1500/MT', '', '25KGS/BAG', 'RD (TMQ)\r\nChemical nameï¼š2,2,4-Trimethy1-1,2-Dihydroquinoline Content\r\nMolecularï¼š(C12H15N)n\r\nstructure:\r\nÂ Â Â Â Â \r\nMolecular Weight:(173.26)n\r\nCAS NO.:Â 26780-96-1\r\nExecutive standardï¼šGB/T 8826-2003\r\nSpecificationï¼š\r\n\r\nItem	Â Â Â Â Â Â Â Â Â Â Â Â Â Â Â Index\r\n	High-class products	First-class products\r\nAppearance	Amber to light brown flake or granular\r\nSoftening point,oC	80ï½ž100\r\nHeat Loss,% Â Â Â â‰¤Â Â Â 0.30	0.50\r\nAsh,%Â Â Â Â Â Â Â Â Â Â  Â Â Â â‰¤	0.30	0.50\r\nProperties: pale yellow to amber powder or thin. Nontoxic. Not soluble in water, soluble in benzene, chloroform, acetone and carbon disulfide. Micro-soluble petroleum hydrocarbons.\r\nApplicationï¼šThe product is particular excellent kinds of eneral-purpose ammonia anri-ageing agent. Ti particular suit to full-steel, semi-steel med radial tire and it apply to many kings of the tires, rubber tube, gummed tape, rubber overshoes and general industrial rubber producers and also suits to emulsion products.\r\nPackageï¼š25kg paper bag inner with PE bag.\r\nStorageï¼šThe product should be stored in the dry and cooling place with good ventilation. The product should be avoid hot sunshine.', 'Brand: Sunsine', 1, '2023-08-07 13:23:39', NULL, NULL, NULL),
(25, 25, 343, '2334å¾®ä¿¡æˆªå›¾_20230425160105.png', 'Barium sulfate', '1', 'negotiable', '', 'According to Costomerâ€²s Requirements', '\r\nChina Pmk Suppliers Pmk Oil, Pmk Powder, Pmk Liquid with Best Price CAS: 28578-16-7 /52190-28-0/236117-38-7/23076-35-9//5337-93-9/20388-87-8', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy.\r\nwhen you need , call me .Whatsapp/Tel:+8618332173585ðŸ“žðŸ“žðŸ“žðŸ“ž', 1, '2023-08-09 08:56:52', NULL, NULL, NULL),
(26, 25, 350, '3892å¾®ä¿¡æˆªå›¾_20230809112822.png', 'Alcohol Based Defoamer', '1', 'negotiable', '', '200kg/Drum', 'CAS No. 79-10-7 Factory Supply High Quality Best Price Acrylic Resin Chemical Material High Purity 99% Top Brand Acrylic Acid', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy.\r\nwhen you need , call me .Whatsapp/Tel:+8618332173585ðŸ“žðŸ“žðŸ“žðŸ“ž\r\n', 1, '2023-08-09 09:01:22', NULL, NULL, NULL),
(27, 25, 345, '2227å¾®ä¿¡æˆªå›¾_20230809114252.png', 'Bactericide forDrilling Fluids', '1', 'negotiable', '', '1kg/bag; 25kg/drum', 'Crystal N-Isopropylbenzylamine 102-97-6 Crystal 99%', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy.\r\nwhen you need , call me .Whatsapp/Tel:+8618332173585ðŸ“žðŸ“žðŸ“žðŸ“ž\r\n', 1, '2023-08-09 09:17:24', NULL, NULL, NULL),
(28, 25, 350, '5467CAS-148553-50-8 (1).jpg', 'Alcohol Based Defoamer', '1', 'negotiable', '', '1kg/bag; 25kg/drum', 'Lyric Pregabali Pregabalina Powder for Treatment Antiepileptic Drug CAS 148553-50-8', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy.\r\nwhen you need , call me .Whatsapp/Tel:+8618332173585ðŸ“žðŸ“žðŸ“žðŸ“ž\r\n', 1, '2023-08-09 09:19:47', NULL, NULL, NULL),
(29, 25, 350, '30115413-05-8 (1).jpg', 'Alcohol Based Defoamer', '1', 'negotiable', '', '1kg/bag; 25kg/drum', 'Raw Material CAS 103-90-2 Panadol Acetaminophen Paracetamol\r\n', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy.\r\nwhen you need , call me .Whatsapp/Tel:+8618332173585ðŸ“žðŸ“žðŸ“žðŸ“ž\r\n', 1, '2023-08-09 09:20:57', NULL, NULL, NULL),
(30, 25, 353, '3599EDTA-2NA (2).jpg', 'Acid gases inhibitor', '1', 'negotiable', '', '1kg/bag; 25kg/drum', 'Manufacture EDTA-2na Disodium Edetate Dihydrate C10h19n2nao9 CAS 6381-92-6\r\n\r\n', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy.\r\nwhen you need , call me .Whatsapp/Tel:+8618332173585ðŸ“žðŸ“žðŸ“žðŸ“ž\r\n', 1, '2023-08-09 09:31:53', NULL, NULL, NULL),
(31, 39, 244, '2904guargumpowder-.jpg', 'Guar gum', '5MT', 'USD 1890 PMT FOB MUNDRA PORT', '', 'PAPER BAGS/JUMBO BAGS', 'GUAR GUM POWDER', 'DURGA ENTERPRISES (www.chopragums.com)', 1, '2023-08-12 13:09:21', NULL, '2023-08-12 13:20:57', NULL),
(32, 39, 243, '3253split1.png', 'Guar gum splits', '10MT', 'USD 1750 PMT FOB MUNDRA PORT', '', 'PP BAGS/JUMBO BAGS', 'GUAR GUM SPLITS', 'DURGA ENTERPRISES (www.chopragums.com)', 1, '2023-08-12 13:10:41', NULL, '2023-08-12 13:20:38', NULL),
(33, 44, 389, '4635ä¸™äºŒé†‡.png', 'Propylene Glycol', '1ton', '1500-2000', '', '200 kg/drum', 'Propylene Glycol, an organic compound, is a colorless, viscous, and stable liquid that can absorb water. It possesses a nearly tasteless and odorless nature, with a mild sweetness. This compound exhibits miscibility with water, ethanol, and various organic solvents. Although it has slight flammability, it is minimally toxic and causes slight irritation.', 'We are an innovative company specializing in the chemical field. Since establish in 2009, We have a complete technical R&D, quality assurance, and sales service system, and products have been exported to more than 190 countries.We are highly appreciated and trusted by domestic and overseas customers.', 1, '2023-08-16 11:09:19', NULL, '2023-08-17 09:19:39', NULL),
(34, 44, 390, '3216ç¢³é…¸ä¸™çƒ¯é…¯.png', 'Propylene Carbonate', '1ton', '1000-1300', '', '250 kg/drum', 'Propylene carbonate is a fascinating compound that possesses a range of intriguing properties. As you delve into its characteristics, youâ€™ll discover that it is a colorless and odorless liquid, with the additional quality of being highly flammable. Its remarkable versatility comes to light when you observe its ability to mix seamlessly with various substances such as ether, acetone, benzene, chloroform, ethyl acetate, and many more. Furthermore, propylene carbonate exhibits the captivating trait of solubility in both water and carbon tetrachloride, amplifying its potential for diverse applications.', 'We are an innovative company specializing in the chemical field. Since establish in 2009, We have a complete technical R&D, quality assurance, and sales service system, and products have been exported to more than 190 countries.We are highly appreciated and trusted by domestic and overseas customers.', 1, '2023-08-16 11:19:23', NULL, '2023-08-17 09:19:21', NULL),
(35, 44, 391, '5145ä¹™äºŒé†‡.png', 'Ethylene Glycol', '1ton', '400-800', '', '230 kg/drum', 'Ethylene glycol is a colorless, transparent, and slightly viscous liquid characterized by its odorless nature and subtle sweetness. It has a notable propensity for absorbing moisture and displays low toxicity to animals. This versatile compound finds miscibility with various substances, such as water, glycerin, acetone, acetic acid, aldehydes, pyridine, and ethanol. Still, it only exhibits slight solubility in ether, remaining insoluble in benzene, petroleum ether, and oil. Caution must be exercised when handling ethylene glycol near open flames, high heat, or oxidants, as there is a risk of combustion and explosion. In elevated temperatures, the pressure within its container may rise, leading to potential cracking and explosion hazards.', 'We are an innovative company specializing in the chemical field. Since establish in 2009, We have a complete technical R&D, quality assurance, and sales service system, and products have been exported to more than 190 countries.We are highly appreciated and trusted by domestic and overseas customers.', 1, '2023-08-16 11:30:33', NULL, '2023-08-17 09:19:01', NULL),
(36, 47, 392, '2421ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 1 (1).png', 'Fluis Loss Control Additive Well Cementing', '1 FCL', '-', '', '25 kg bags ', 'Fluid loss control agents are used in well cement compositions to reduce the fluid loss from the cement compositions to permeable formations or zones into or through which the cement compositions are pumped. Fluid loss additive FLOSS 304 makes the process of cementing oil and gas wells technological and reliable. FLOSS 304 effectively reduces the filtration rate in the field condition and increses the stability of cement system. ', 'NRG International Chemicals\r\n', 1, '2023-08-17 18:53:44', NULL, '2023-08-18 12:07:07', NULL),
(37, 47, 393, '4093ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 7.png', 'Viscoelastic Surfactant', '1 FCL', '-', '', 'Barrels', 'The product NRG-VES is designed for use in the processes of matrix acid treatments of bottom-hole zones of wells and acid hydraulic fracturing in order to increase the viscosity of the acid composition, as well as to control the crack opening by changing the rheological properties of the frac fluid. NRG-VES is a complex composition of surfactants in an organic solvent.\r\n', 'NRG International Chemicals', 1, '2023-08-17 22:16:51', NULL, '2023-08-18 12:07:13', NULL),
(38, 47, 394, '3564ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 2.png', 'Retarder Well Cementing', '1 FCL', '-', '', '25 kg bags ', 'The principal objective of well cementing operations is to formulate a cement that is pumpable for a time sufficient for placement in the annulus, develops strength within a few hours after placement and remains durable throughout the well\'s lifetime. Using NRG RETARDER LR for low and moderate circulating temperatures up to 80C, allows to delay the setting time and extend the time during which a cement slurry is pumpable.\r\n', 'NRG International Chemicals\r\nwww.nrg-int.com \r\ninfo@nrg-int.com', 1, '2023-08-17 22:18:38', NULL, '2023-08-18 12:07:18', NULL),
(39, 47, 395, '2528ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 3.png', 'Viscosifier and Gelling Agent Liquid Grade', '1 FCL', '-', '', 'IBC', 'NRG XG-SLURRY is used as an effective thickener in fresh systems ans salt-saturated drilling fluids, as well as in completion fluids. In addition, the product is used as a structural agent for the mud vehicle (pulp) for re-injection of drilling waste. NRG XG-SLURRY is a stable suspension of high-quality biopolymer in mineral oil.   ', 'NRG International Chemicals\r\nwww.nrg-int.com \r\ninfo@nrg-int.com', 1, '2023-08-17 22:20:14', NULL, '2023-08-18 12:06:59', NULL),
(40, 47, 396, '2535ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 4.png', 'Emulsifier OBM Based Drilling Fluids', '1 FCL', '-', '', 'Barrels', 'OBM EMUL is the standard emulsifier component for oil-based drilling fluid system that provides a stable emulsion and secondary filtration control. ONR OBM EMUL emulsifier is used in both oil-based and synthetic-based fluids to help form a stable water-in-oil emulsion. ', 'NRG Intarnational Chemicals\r\nwww.nrg-int.com\r\ninfo@nrg-int.com', 1, '2023-08-17 22:22:18', NULL, '2023-08-18 12:06:54', NULL),
(41, 47, 397, '4544ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 5.png', 'Synthetic Gelling Agent for Fracturing', '1 FCL', '-', '', 'Bags 25 kg or Barrels', 'NRG-SGA is an innovative guar-free synthetic gelling polymer for hydraulic fracturing, Â«pure liquidÂ» technology. NRG-SGA product is able to completely replace the cross-linked guar system, linear fluid and work as a friction reducer for high-flow frac pumping.\r\n\r\nPHYSICAL PROPERTIES\r\nAppearance: white to light yellow powder. \r\nViscosity of 0.5% solution: at least 50 cP. \r\nMoisture content in dry form: no more than 12%.', 'NRG International Chemicals\r\nwww.nrg-int.com\r\ninfo@nrg-int.com', 1, '2023-08-17 22:23:46', NULL, '2023-08-18 12:06:49', NULL),
(42, 47, 398, '3649ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 6.png', 'Well Cementing Specialty Chemicals and Additives', '1 FCL', '-', '', 'Bags 25 kg or Barrels', 'All Line of Products for Well Cementing Operations', 'NRG International Chemicals\r\nwww.nrg-int.com\r\ninfo@nrg-int.com', 1, '2023-08-17 22:25:17', NULL, '2023-08-18 12:06:45', NULL),
(43, 47, 399, '3227ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 8.png', 'Dissolvable Plugs for Liner and Filter, Well Completion', 'Box', '-', '', 'Box', 'Designed for temporary blocking of filter openings. Plugs allow to circulate through the shoe during RIH and to provide pressure tests. Plugs have a predeterminated dissolution rate, which is selected depending on the customerâ€™s requirements. \r\nA distinctive feature is that the process begins only when the liner fully immersed in the fluid. Do not dissolve in OBM. Dissolve at different rates in WBM (depending on the formulation and composition of the WBM). Dissolve at different rates in completion fluids (depending on salt content). ', 'NRG International Chemicals\r\nwww.nrg-int.com\r\ninfo@nrg-int.com', 1, '2023-08-17 22:27:00', NULL, '2023-08-18 12:06:39', NULL),
(44, 47, 400, '6721ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 9.png', 'P&P Dissolvable Plugs for Fracturing', '1 piece', '-', '', 'Box', 'FEATURES AND BENEFITS\r\nFull-bore frac sleeve with no ID restrictions.\r\nUnlimited number of stages.\r\nBoth cemented and uncemented liner or casing.\r\nNo need for coil tubing intervention to operate the sleeves during initial stimulation.\r\nKey-plugs are pumped down with regular pumps and fully dissolves in several days.\r\nSystem has a secondary operating method with a coil tubing.', 'NRG International Chemicals \r\ninfo@nrg-int.com', 1, '2023-08-17 22:28:56', NULL, '2023-08-18 12:06:34', NULL),
(45, 50, 40, 'product.png', 'Well cleaning Surfactant', '1 FCL', 'NA', '', 'Drums ', 'Surfactant  ', 'REDA Energy is a leading independent production chemicals company with local operations and technical centers across the globe. We are active in the Europe, Middle East, Africa, Asia Pacific, and America regions.\r\n\r\nOur products range is in the scope of Drilling, Stimulation, Fracturing additives. ', 1, '2023-08-20 15:35:23', NULL, NULL, NULL),
(46, 50, 353, 'product.png', 'Acid gases inhibitor', '1 FCL', 'NA', '', 'Drums', 'Acid Gases inhibitor ', 'REDA Energy is a leading independent production chemicals company with local operations and technical centers across the globe. We are active in the Europe, Middle East, Africa, Asia Pacific, and America regions. Our products range is in the scope of Drilling, Stimulation, Fracturing additives. ', 1, '2023-08-20 15:36:25', NULL, NULL, NULL),
(47, 51, 401, '1735HECäº§å“æˆå“åŒ…è£…ç…§ç‰‡ï¼ˆæ­£é¢1ï¼‰.JPG', 'HEC', '600KG', '6200', '', 'paper bag with pallet', 'HEC is mainly used as viscosifier and water loss controller in oil drilling industry. High-viscosity HEC is mainly used as viscosifier in well-completing or finishing fluid; while low-viscosity HEC is mainly used as water loss controller. HEC used as thickener will impart good mobility and stability to various slurries necessary for drilling, completion, cementing and fracturing operations. In drilling, HEC can increase the sand carrying capability of the slurry and extend the service life of drill bits. In low-solid content completion fluid and cementing fluid, the excellent water loss control performance of HEC can prevent large amount of water in the slurry from entering into the oil reservoir and enhancing the stabilizing capability of the wall of the reservoir. ', 'We,Tianpu chemical are the largest HEC.EC manufacturer in China, a state-owned enterprise with an annual output of 6000T HEC,1000T EC. We also work with a wide range of oil service companies, such as Baker Hughes, OGDCL, Halliburton and so on,If you need HEC.EC', 1, '2023-08-24 07:26:36', NULL, '2023-09-28 13:09:19', NULL),
(48, 51, 402, '6280HECäº§å“æˆå“åŒ…è£…ç…§ç‰‡ï¼ˆæ­£é¢1ï¼‰.JPG', 'Ethyl cellulose', '20KG', '15000', '', 'paper bag with pallet', ' white, tasteless, odorless, non-toxic granule or powdery, it is stable in light and heat Softening temp. 135-155Â°C, Melting point165-185Â°C.Ethyl cellulose is soluble in common solvent, It is compatible with varieties of resins and plasticizer. The film and plastic articles made form ethyl cellulose have good mechanical strength and toughness at higher or lower temperature.', 'Weï¼ŒTianpu\r\nChemicals Company Limitedï¼Œ are the largest  Ethylcellulose manufacturer in China, a state-owned enterprise with an annual\r\noutput of 1000T EC. We also work with a wide range of  Pharmaceutical  companies, such as CSPC Pharmaceutical Group  , Humanwell,Nhwa Groupï¼Œetc.', 1, '2023-08-24 07:37:49', NULL, '2023-09-28 13:09:05', NULL),
(49, 54, 353, '44711 Size 3 x 3 2 Nos. - Copy.jpg', 'Acid gases inhibitor', '25 MT', '200 MT FOB', '', '50 kgs', 'Water Treatment:	The major area of use for Alum is in Water treatment and clarification. Its clarifying action is attributed to Aluminium Hydroxide formation by hydrolysis. This, in turn, carries down all the colloidal impurities and forms a slimy layer at the bottom\r\nSizing of Paper:	The other major area of use is in sizing of paper. It reacts with sodium resonate to give insoluble Aluminium resonate. For sizing of paper, Alum should be free from Ferric ions or else the paper will be discoloured. Ferrous ions do not farm since they form a soluble colourless resonate which, however, would represent a loss of resonate. Alum imparts certain degree of resistance to penetration by liquids during sizing of paper.\r\nMiscellaneous Application:	Alum is also required in various other industries like Dyes, Food, Petroleum, Pharmaceuticals, Fire-proofing, tanning etc.\r\n', 'VIVAN INDUSTRIES\r\nPlot No. A1/1402,\r\nGIDC Estate,\r\nAnkleshwar-393002, \r\nGujarat,\r\nINDIA.\r\nWebsite: http://www.vivanindustries.in/\r\nJayesh Gheewala / Harshal Manjrawala\r\n\r\n+91 81550 66066 / +91 98241 58241', 1, '2023-08-25 15:14:23', NULL, NULL, NULL),
(52, 57, 49, '5501titanium oxide fyndsupplier.jpg', 'Titanium Dioxide', '1FCL ', '$2/Kg', '', '25 kg', 'Titanium Dioxide ( TiO2 ) is a Rutile type Titanium Dioxide produced by sulphate process. With Excellent Optical properties and dispersion, Our product is strongly recommended for Industrial Coating, Printing Inks and other industries', 'At Shanghai Jiuta Chemical, our top priorities are customer satisfaction, high-quality materials, and excellent service. With over 25 years of experience in the market, we have a strong track record of delivering reliable and innovative solutions to our clients. We are constantly working to improve and evolve our product offerings, and are committed to providing the best possible experience for our customers. As a trusted supplier of titanium dioxide(TiO2) and its derivatives, we are confident in our ability to serve you for many years to come.', 1, '2023-09-09 17:01:19', NULL, NULL, NULL),
(53, 21, 403, '66832.jpg', 'CMC', '1FCL', 'USD', '', '25 kg', 'We supply Carboxymethyle Cellulose (CMC) LV/HV for industrial grade application. We have been in market since last over 12 years and have large manufacturing facility in China. You can approach us for CMC or other products. ', 'Shijiazhuang Taixu Biology Technology Co., Ltd. located in Shijiazhuang city, is a supplier of PAC, CMC and F-Seal and an export agent of Drilling Mud Additives of Xanthan Gum, sulfonated asphalt and HEC etc.in China, which has more than 30 years of domestic market experience, more than 10 years of export experience.We have customers all over Asia, Africa, the Americas, Europe and more than 40 countries.', 1, '2023-09-09 17:18:32', NULL, '2023-09-28 13:08:55', NULL),
(54, 69, 404, 'product.png', 'Zinc Sulphate', '1FCL', 'On Request', '', '25Kg', 'We are Saudi Arabia, base chemical manufacturer and supplier, provide quality Zinc Sulphate and global market. ', 'Manufacturer based in Saudi Arabia ', 1, '2023-09-11 16:00:17', NULL, '2023-09-28 13:08:40', NULL),
(55, 69, 405, 'product.png', 'Copper Sulphate', '1FCL', 'On Request', '', '25Kg', 'We are Saudi Arabia, base chemical manufacturer and supplier, provide quality Copper Sulphate and global market. ', 'Manufacturer based in Saudi Arabia ', 1, '2023-09-11 16:01:09', NULL, '2023-09-11 16:04:31', NULL),
(56, 69, 406, 'product.png', 'Manginess Sulphate', '1FCL', 'On Request', '', '25Kg', 'We are manufacturer and supplier for Manginess Sulphate in Saudi Arabia ', 'We supply Manginess Sulphate, Copper Sulphate, Zinc Sulphate, and Magnesium. in Saudi Arabia and supply locally as well as for export globally. ', 1, '2023-09-11 16:06:37', NULL, '2023-09-28 13:08:07', NULL),
(57, 71, 407, 'product.png', 'sodium sulfide', '25KGS', 'floating price', '', 'BAG', '60%content min', 'Binzhou City Baoxiang Chemical Industry Co., Ltd.', 1, '2023-09-12 06:51:43', NULL, '2023-09-28 13:08:11', NULL),
(58, 75, 389, '1399propyleneGlycol.webp', 'Propylene Glycol', 'On Request', 'On Request', '', 'On Request', 'Propylene glycol (CH8O2) is a commonly used drug solubilizer in topical, oral, and injectable medications. It is used as a stabilizer for vitamins, and as a water-miscible cosolvent. It is a colorless, nearly odorless, clear, viscous liquid with a faintly sweet taste, hygroscopic and miscible with water, acetone, and chloroform. Propylene glycol is also used as a moisturizer in cosmetic products and as a dispersant in fragrances. There are many other food and industrial uses for propylene glycol.', 'www.chemlongxing.com\r\n', 1, '2023-09-13 03:34:15', NULL, NULL, NULL),
(59, 33, 314, '4313caustic-soda-lye.jpg', 'Caustic soda beads', 'On Request', 'On Request', '', 'On Request', 'Used as a cleansing agent and in the manufacturing of washing soda. Sometimes, sodium hydroxide is also used as a reagent in the laboratories. It is used in the preparation of soda lime. It is used in the extraction of aluminium by purifying bauxite', 'www.alkneel.in\r\n', 1, '2023-09-13 03:48:53', NULL, NULL, NULL),
(60, 104, 408, '5023csds xiao.jpg', 'complex sodium disilicate - best stpp substitute', '13 mts', '4-500', '', '25kgs per bag or jumbo bag', 'Commodity: Complex sodium disilicate -- best STPP substitute\r\nApplication: replace STPP in detergent powder making \r\nTypeï¼š\r\nItem                Type   	Type 1	Type 2\r\nAppearance 	white small granule, free flowing	white fine powder\r\nBulk density	0.48g/cm3	0.68g/cm3\r\n20FT Container	13 mts	19.5mts\r\n40HQ Container	26 -28 mts	26 -28 mts\r\nPreferred technology	Drying mixing, Post-spraying	Pre-spray\r\nSpecification and COA\r\nItem 	Standard	Test result\r\nCalcium exchange capacity 	>=400 mgCaCO3/gCSDS	441.06\r\nHumidity:	<=5%	2.5\r\nPH value:	<=12	11.27\r\nSiO2:	>=20%	23.08\r\nWhiteness:	>=80%	87.99\r\nBulk Density	0.35-0.85	Conform\r\nPacking: 25kgs in plastic woven bag with inner plastic film bag \r\nAdvantage: \r\n1. completely friendly to environment \r\n2. excellent function and high calcium exchange ability (400min), better than STPP\r\n3. excellent PH buffering capacity\r\n4. competitive price to reduce much cost \r\n5. free flowing and low density: 0.48/ml around.\r\n6. not easily absorb moisture in air to become cake. \r\n7. very suitable for high tower sprayer and especially dry mix or blending\r\n8. be used same as STPP in producing process, without any change in equipment\r\n9. to make common or concentrate detergent powder; free-phosphate or low-phosphate detergent powder\r\n\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year), SLES 70 (6000mts) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 07:47:10', NULL, '2023-09-28 13:07:59', NULL),
(61, 104, 409, '65041.jpg', 'modified sodium disilicate -- best builder for detergent powder', '13 mts', '4-500', '', '25kgs per bag or jumbo bag', 'Commodity: modified sodium disilicate -- best eco detergent builder\r\nApplication: replace STPP in detergent powder making \r\nTypeï¼š\r\nItem                Type   	Type 1	Type 2\r\nAppearance 	white small granule, free flowing	white fine powder\r\nBulk density	0.48g/cm3	0.68g/cm3\r\n20FT Container	13 mts	19.5mts\r\n40HQ Container	26 -28 mts	26 -28 mts\r\nPreferred technology	Drying mixing, Post-spraying	Pre-spray\r\nSpecification and COA\r\nItem 	Standard	Test result\r\nCalcium exchange capacity 	>=400 mgCaCO3/gCSDS	441.06\r\nHumidity:	<=5%	2.5\r\nPH value:	<=12	11.27\r\nSiO2:	>=20%	23.08\r\nWhiteness:	>=80%	87.99\r\nBulk Density	0.35-0.85	Conform\r\nPacking: 25kgs in plastic woven bag with inner plastic film bag \r\nAdvantage: \r\n1. completely friendly to environment \r\n2. excellent function and high calcium exchange ability (400min), better than STPP\r\n3. excellent PH buffering capacity\r\n4. competitive price to reduce much cost \r\n5. free flowing and low density: 0.48/ml around.\r\n6. not easily absorb moisture in air to become cake. \r\n7. very suitable for high tower sprayer and especially dry mix or blending\r\n8. be used same as STPP in producing process, without any change in equipment\r\n9. to make common or concentrate detergent powder; free-phosphate or low-phosphate detergent powder\r\n\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 07:51:54', NULL, '2023-09-28 13:08:17', NULL),
(62, 104, 410, '3945zeolite å°å›¾.jpg', 'zeolite 4a detergent grade', '25 mts', '3-400', '', '25kgs per bag or 1000kgs jumbo bag', 'Commodity: Zeolite Detergent Grade\r\nApplication: \r\nFor detergent powder and soap bar making \r\nSpecification and COA:\r\nSpecification	Standard	Result\r\nCalcium Exchange Ability (MgCaCO3/g Zeolite)	310 Min	330\r\nWhiteness %	95min	96\r\nPh Value ( 1% Solution, 25â„ƒ )	11.3 Max	11\r\nL.O.I  (500+/-10%,1h)	22  Max	20.4\r\nGranularity	Average Size	2-4um	Conform\r\n	â‰¥10um	90	Conform\r\n	â‰¤4um	2	Conform\r\nPacking: \r\n25kgs in plastic woven bag with inner plastic film bag, 25mts Per 20FT Container\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 07:59:23', NULL, '2023-09-28 13:08:24', NULL),
(63, 104, 411, '3138CMC 6.jpg', 'CMC Sodium Detergent Grade', '10 mts', '4-500', '', '25kgs per bag or jumbo bag', 'CMC Sodium Detergent Grade\r\nFull Name: Carboxymethylcellulose Sodium  \r\nAvailable Purity: 50-99%\r\nApplication: \r\nFor detergent powder and liquid making \r\nSpecification and COA:\r\nItems	Specification	Test Result\r\nappearance	White or light yellow powder	conform\r\nPurity %	65 min  	68.6\r\nDegree of Substitution  	0.35min	0.59\r\nMoisture %	8.0 max	4.1\r\nPH Value	8-11    	8.4\r\nViscosity (mpa.s)	5-40	11\r\nPacking: \r\n25kgs in plastic woven bag with inner plastic film bag, 25mts Per 20FT Container\r\n\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 08:14:55', NULL, '2023-09-28 13:08:30', NULL),
(64, 104, 412, '1620speckle.jpg', 'Colorful Granulated Speckle', '10 mts', '2-400', '', '25kgs per bag or jumbo bag', 'Colorful Granulated Speckle\r\nCharacter: it is mainly made by sodium sulphate\r\nColor available: blue, pink, green\r\nUse: Mainly used in washing powder, increase synthesis washing effort and appearance.\r\nAppearance: \r\nAppearance	Free flowing blue particle	conform\r\nOdour	odourless	conform\r\napparent gravity,g/l	800-1100g/l	1.0\r\nPH ï¼ˆ1ï¼…solutionï¼Œ25â„ƒï¼‰	7--12	8.4\r\nTime of slaking,min	â‰¤5	2\r\nMoisture 	â‰¤8%	0.9\r\nParticle size â‰¥1.4mm	â‰¤2%	0\r\nParticle size 1.25-1.4mm	â‰¤3%	1.5\r\nParticle size 0.45-1.25mm	â‰¥80	97.5\r\nParticle size <0.18mm	â‰¤5%	0.3\r\nPacking: 25kgs per bag \r\n20FT container loading: 27000 kgs, no pallet\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 08:18:59', NULL, '2023-09-28 13:07:49', NULL),
(65, 104, 413, '6185star.jpg', 'Star-Shaped Speckle for detergent powder making', '5 mts', '5-1000', '', '25kgs per carton', 'Star-Shaped Speckle\r\nCharacter: it is mainly made by soap base\r\nUse: Mainly used in washing powder, increase synthesis washing effort and appearance.\r\nAppearance: \r\nitem	index	results\r\napperence	flow freely,no agglomeration	flow freely,no agglomeration\r\nodor	no peculiar smell	no peculiar smell\r\nforeign body	â‰¤10	2\r\napperent gravityï¼Œg/l	380~520	436\r\ndiameterâ‰¥2.0mmï¼Œï¼…	â‰¤1.0	0.3\r\ndiameterâ‰¤0.85mmï¼Œï¼…	â‰¤10.0	0.7\r\nhunter color	agree with standard	agree with standard\r\nmoistureï¼Œï¼…	4~12	8.42\r\nPacking: 10kgs per paper carton \r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 08:24:09', NULL, '2023-09-28 13:07:42', NULL),
(66, 104, 414, '4212CBS_X.jpg', 'CBS-X,    CBS-351', '2 mts', '5-1000', '', '25kgs per carton', 'CBS-X,    CBS-351\r\nMain Chemical Composition: Stilbene derivative\r\nProperty: 351 is slight yellow greenish crystalline powder(or slight yellow greenish granule) , soluble in water, anionic type, maximum spectrum absorption at 348-350nm\r\nStability in front to alkaline peroxides (Sodium Percarbonate, Sodium Perborate, Hydrogen Peroxide) currently used in detergents. \r\nStability in front to Hydrosulfides. \r\nStability in front to alkalies. \r\nC.I. Number: 351    \r\nApplication: Can be used as brightener for detergent, cotton, linen, \r\n          silk, polyamide fiber, wool and paper .It can be added to any \r\n          process of any type of detergent. \r\nSpecification and COA\r\nTest item	Technical Specification	Test Result\r\nAppearance	Light yellowish powder	Light Yellowish  powder\r\nContentï¼ˆHPLCï¼‰	â‰¥98%	98.2%\r\nIndissoluble substance	â‰¤0.5%	0.3%\r\nmax in ultra-violet range	348-350nm	348nm\r\nE (1% /cm) Value:	1105-1181	1140\r\nPackage: 25kg per drum\r\n\r\n\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 08:26:41', NULL, '2023-09-28 13:07:30', NULL),
(67, 104, 415, '6199dms å¤§.jpg', 'DMS-X -- low price optical brightener for detergent making', '5 mts', '4-500', '', '25kgs per drum', '\r\nCommodity: DMS-X\r\nApplication: as optical brightener for detergent making\r\nSpecification: \r\nITEMS	STANDARDS	RESULT\r\nAPPEARANCE	White or light yellow granular	CONFIRM\r\nMEAN PRTICLE SIZE	ï¼ž200 microns	CONFORM\r\nï¼œ 150 microns	â‰¤10%	CONFORM\r\nEXTINCTION INDEX	425-445	435\r\nDENSITY	400-600kg/ãŽ¥	CONFORM\r\nTriazine   AAH%	0.05 max	CONFORM\r\nTriazine AAH+AAM+AMM%	1 max	CONFORM\r\nPacking: 25kgs per drum, 7mts per 20FT\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 08:32:33', NULL, '2023-09-28 13:07:21', NULL),
(68, 104, 416, '29761.jpg', 'Needle-shaped Speckle for detergent powder making', '10 mts', '4-500', '', '25kgs per bag or jumbo bag', 'Needle-shaped Speckle\r\nAppearance: colorful needle shape\r\nUse: Mainly used in washing powder, increase synthesis washing effort and appearance.	\r\nMain contents inside:\r\nSodium sulfate anhydrous, Sodium carbonate, Sodium dodecane1-sulphonate, Sodium CMC\r\nSpecification and COA:\r\nAppearance	Free flowing, needle shape	conform\r\nOdour	odourless	conform\r\napparent gravity,g/l	0.6-0.9g/ml	0.73\r\nimpurity	â‰¤10 per 200g	2\r\nPH ï¼ˆ1ï¼…solutionï¼Œ25â„ƒï¼‰	7--12	8.4\r\nTime of slaking,s	â‰¤400s	180\r\nMoisture 	3-7	4.88\r\nParticle size â‰¥2.0mm	â‰¤2%	0.2\r\nParticle size â‰¤0.425mm mm	â‰¤2%	1.1\r\nPacking: 25kgs per bag \r\n20FT container loading: 20000 kgs\r\n', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n', 1, '2023-09-15 08:35:10', NULL, '2023-09-28 13:07:15', NULL),
(69, 110, 350, 'product.png', 'Alcohol Based Defoamer', '10', '100$', '', 'asasa', 'test', 'test', 1, '2023-09-18 20:27:58', NULL, NULL, NULL),
(70, 21, 417, '66652.jpg', 'XANTHAN GUM', '5MT', 'USD', '', '25KG/BAG', 'XANTHAN GUM ALL GRADE CAN BE USED IN FOOD AND OILFIELD AND OTHER INDUSTRIAL', 'Shijiazhuang Taixu Biology Technology Co., Ltd located in Shijiazhuang city, is a\r\n- 1 professional supplier of PAC, CMC and F-Seal and Drilling Mud Additives of Xanthan Gum,  PHPA,Sulfonated Asphalt and HEC etc.in China, which has more than 12 years of\r\nexport experience.We have customersall over Asia, Africa, the Americas, Europe and more than 40 countries.', 1, '2023-09-26 14:50:35', NULL, '2023-09-26 14:51:56', NULL),
(71, 21, 136, '65692.jpg', 'Pac Regular and LV', '5MT', 'USD', '', '25KG/BAG', 'PAC LV / HV / R ALL GRADE \r\nUSED FOR OILFIELD OR OTHER INDUSTRIAL', 'Shijiazhuang Taixu Biology Technology Co., Ltd located in Shijiazhuang city, is a\r\n-1 professional supplier of PAC, CMC and F-Seal and Drilling Mud Additives of Xanthan \r\nGum, CMS, PHPA,Sulfonated Asphalt and HEC etc.in China, which has more than 12 years of\r\n export experience.We have customersall over Asia, Africa, the Americas, Europe and more \r\nthan 40 countries', 1, '2023-09-26 14:54:28', NULL, NULL, NULL),
(72, 21, 418, '4403PAM.jpg', 'PAM', '5MT', 'USD', '', '25KG/BAG', 'PHPA/PAM WITH DIFFERENT MOLECULAR WEIGHT', 'Shijiazhuang Taixu Biology Technology Co., Ltd located in Shijiazhuang city, is a - 1 professional supplier of PAC, CMC and F-Seal and Drilling Mud Additives of Xanthan Gum, PHPA,Sulfonated Asphalt and HEC etc.in China, which has more than 12 years of export experience.We have customersall over Asia, Africa, the Americas, Europe and more than 40 countries.', 1, '2023-09-26 14:56:40', NULL, '2023-09-28 13:06:56', NULL),
(73, 21, 401, '6398HEC.jpg', 'HEC', '5MT', 'USD', '', '25KG/BAG', 'HEC - hydroxyethyl cellulose\r\nVISCOSITY FROM 1000CP TO 1000000CP', 'Shijiazhuang Taixu Biology Technology Co., Ltd located in Shijiazhuang city, is a\r\n- 1 professional supplier of PAC, CMC and F-Seal and Drilling Mud Additives of Xanthan \r\nGum, CMS, PHPA,Sulfonated Asphalt and HEC etc.in China, which has more than 12 years of\r\n export experience.We have customersall over Asia, Africa, the Americas, Europe and more than 40 countries.', 1, '2023-09-26 14:59:38', NULL, NULL, NULL),
(74, 21, 419, '30691.jpg', 'SODIUM FORMATE', '5MT', 'USD', '', '25KG/BAG', 'SODIUM FORAMTE 95% TO 98% \r\nNON-CAKING NO STRONG TASTE', 'Shijiazhuang Taixu Biology Technology Co., Ltd located in Shijiazhuang city, is a\r\n- 1 professional supplier of PAC, CMC and F-Seal and Drilling Mud Additives of Xanthan \r\nGum, CMS, PHPA,Sulfonated Asphalt and HEC etc.in China, which has more than 12 years of export experience.We have customersall over Asia, Africa, the Americas, Europe and more than 40 countries.', 1, '2023-09-26 15:02:43', NULL, '2023-09-28 13:06:47', NULL),
(75, 139, 420, '2911gelatin-1kg-550x550.jpg', 'Gelatine', '1 FCL ', 'negotiable', '', '1 pouch', 'Gelatin is extracted from collagen and is a high molecular weight protein composed of 18 amino acids. Bovine hide , bones and fish scales are normally used for the production of the gelatin.\r\n\r\nGelatin can absorb 5-10 times of water and if heated,it enters a sol state. Upon cooling, it enters a gel state.\r\n\r\nBecause of its special properties, gelatin is used in making pharmaceutical capsules, jelly,industrial adhesives. Also gelatin is widely used in other applications.\r\n', 'Annual sales USD 1,200', 1, '2023-09-29 12:36:53', NULL, '2023-09-29 16:35:08', NULL),
(76, 139, 421, '3314benzyl-alcohol-1658310824-6454888.jpeg', 'Benzyl alcohol', '1 FCL ', 'negotiable', '', '25 box', 'CAS No.: 100-51-6\r\n\r\nAppearance:Clear, colourless, oilyliquid\r\n\r\nMolecular weight:108.14', 'We have established an extensive global network of business.', 1, '2023-09-29 12:40:46', NULL, '2023-09-29 16:35:12', NULL),
(77, 141, 422, '3016Sodium-Thiosulphate-Crystals.jpg', 'Sodium Thiosulphate', '27mt/20\'fCL', 'negotiable', '', '25kgs plastic bag', ' CAS No.: 10102-17-7 \r\n\r\nPurity: 99% \r\n\r\nAppearance: colorless crystal      ', 'Our company is mainly engaged in chemical products, covering a wide range of fields, including leather, rubber, medicine, pesticides, textile dyeing, oilfield chemistry, cement construction, detergent and daily chemicals. ', 1, '2023-09-29 12:55:28', NULL, '2023-09-29 16:35:03', NULL),
(78, 141, 423, '3653Acetic-ACID.jpg', 'Acetic Acid', '20MT/20FCL', 'negotiable', '', '25kg/drum', 'CAS No.:64-19-7  \r\n\r\nAppearance: Colorless Transparent Liquid \r\n\r\nPurity:26% to 99.8%      ', 'Through the efforts of our team, our products have been exported to more than 20 countries and regions, such as: the United States, Japan, Hungary, Chile, Mexico, Thailand, Vietnam, Malaysia, United Arab Emirates, Ghana, Egypt. ', 1, '2023-09-29 12:58:51', NULL, '2023-09-29 16:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_chemical_title`
--

CREATE TABLE `supplier_chemical_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_chemical_title`
--

INSERT INTO `supplier_chemical_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Feedback', NULL, NULL, '2023-06-23 17:55:21', 35);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_seo`
--

CREATE TABLE `supplier_seo` (
  `id` int(11) NOT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_seo`
--

INSERT INTO `supplier_seo` (`id`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(3, 'Supplier Profile | Oilfield Chemical', 'Welcome to Oilfield Chemical, your trusted source for top-quality chemicals. Explore a diverse range of chemical solutions for your industry needs', 'Oilfiled Chemical, Chemical, Chemical Supplier');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_title`
--

CREATE TABLE `supplier_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `cover` tinytext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_title`
--

INSERT INTO `supplier_title` (`id`, `title`, `cover`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Top Chemical Suppliers', '6309www.fyndsupplier.com-min.png', NULL, NULL, '2023-08-04 15:43:12', 35);

-- --------------------------------------------------------

--
-- Table structure for table `top_chemical_buyer_title`
--

CREATE TABLE `top_chemical_buyer_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `top_chemical_buyer_title`
--

INSERT INTO `top_chemical_buyer_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Feedback', NULL, NULL, '2023-06-23 17:55:21', 35);

-- --------------------------------------------------------

--
-- Table structure for table `top_chemical_supplier_title`
--

CREATE TABLE `top_chemical_supplier_title` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `top_chemical_supplier_title`
--

INSERT INTO `top_chemical_supplier_title` (`id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Feedback', NULL, NULL, '2023-06-23 17:55:21', 35);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `profile_photo` text DEFAULT NULL,
  `name` tinytext DEFAULT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` tinytext DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `website` text NOT NULL,
  `about` text NOT NULL,
  `user_type` varchar(15) NOT NULL COMMENT '1 = admin, 2 = user',
  `country_code` int(11) DEFAULT NULL,
  `established_year` varchar(10) DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `profile_photo`, `name`, `mobile`, `email`, `company_name`, `country`, `website`, `about`, `user_type`, `country_code`, `established_year`, `designation`, `meta_title`, `meta_description`, `meta_keyword`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, '5705Ali Pezeshkfar fyndsupplier.jpeg', 'Ali Pezeshkfar', '989903334102', 'mailer@novichem.co', 'Novichem Co.', 'Iran, Islamic Republic of', '', '', 'supplier', 98, '', NULL, NULL, NULL, NULL, '29Cq9vl7RW', 1, '2023-07-13 13:21:00', '2023-09-09 17:22:23'),
(10, '3780KDC_Logo.jpg', 'Krish Virani', '919326966409', 'info@krishdrill-chem.in', 'Krish Drill Chem', 'India', 'www.krishdrill-chem.co.in', 'An ISO 9001:2015, ISO 45001:2018 certified manufacturer of Drilling Fluids from Mumbai, India.', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'qz3wGLRfwh', 1, '2023-07-30 11:56:30', '2023-07-30 11:58:39'),
(12, 'profile.png', 'Tarun Patel', '919978805350', 'ambslifescience.mkt@gmail.com', 'AMBS LIFESCIENCE', 'India', 'www.ambslifescience.com', '', 'buyer', 91, '', NULL, NULL, NULL, NULL, 'HSCGOpg69c', 1, '2023-08-01 16:40:40', '2023-08-03 18:02:05'),
(13, 'profile.png', 'Dr. V K Saju', '96879049019', 'info@fyndsupplier.com', NULL, 'Oman', '', '', 'buyer', 968, NULL, NULL, NULL, NULL, NULL, 'nxKZ3yl9xz', 1, '2023-08-03 17:44:37', NULL),
(19, '1654PRODUCTS.png', 'Lisar', '8613569005336', 'liuhuijun8882@aliyun.com', 'HUXIAN YIBANG CHEMICAL CO.,LTD', 'China', '', 'Supplying: Rubber Chemicals: accelerator MBT,MBTS,CBS, TBBS, MBS. Antioxidant TMQ, 6PPD, IPPD,DTPD. Pechnocil Resin, Resorcinol Resin, petroleum resin.', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'LxZgFHqPRM', 1, '2023-08-07 13:15:47', '2023-08-07 13:24:06'),
(21, '1771taixubio fyndsupplier.png', 'Yana', '8618630128887', 'superchem9n@taixubio-tech.com', 'SHIJIAZHUANG TAIXU BIOLOGY TECHNOLOGY CO.,LTD.', 'China', 'www.taixubio.com', '', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'xYFK6gBuPh', 1, '2023-08-08 11:46:11', '2023-09-26 15:03:22'),
(22, 'profile.png', 'Echo Wang ', '8618563075368', 'info@fyndsupplier.com', NULL, 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, 'RaEbIk20xw', 1, '2023-08-08 12:23:31', NULL),
(24, 'profile.png', 'Jack', '8615689278498', NULL, NULL, 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, 'JLHxRIhlE5', 1, '2023-08-09 06:22:31', NULL),
(25, '6395logo.png', 'frieda fan ', '8618332173585', 'muhuang@mh01.ntesmail.com', 'Hebei Muhuang Technology', 'China', ' https://www.hb-mh.cn/', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy.\r\nwhen you need , call me .Whatsapp/Tel:+8618332173585ðŸ“žðŸ“žðŸ“žðŸ“ž\r\n', 'supplier', 86, '', NULL, 'Muhuang Technology | Oilfield Chemical', 'Hebei Muhuang Technology Co., Ltd provide chemical raw materials, chemical products, pharmaceutical , veterinary , dye intermediates, pigments, cosmetic raw materials and chemical reagents, can meet your various needs. Adhere to the \"quality first, customer first, integrity-based\" business policy. when you need , call me .Whatsapp/Tel:+8618332173585\r\n\r\nKey chemicals: Barium sulfate, Alcohol Based Defoamer, Bactericide forDrilling Fluids, Alcohol Based Defoamer, Alcohol Based Defoamer, Acid gases inhibitor', 'oilfield chemicals, chemical manufacturers and suppliers in China, pharmaceutical chemical manufacturers and suppliers, dye intermediates manufacturer and suppliers, pigments manufacturers and suppliers raw material and chemical reagents manufacturer and suppliers , Barium sulfate manufacturer and supplier , Alcohol Based Defoamer manufacturer and supplier, Bactericide forDrilling Fluids manufacturer and supplier, Alcohol Based Defoamer manufacturer and supplier, Alcohol Based Defoamer manufacturer and supplier, Acid gases inhibitor manufacturer and supplier', '2uAcjzt6p4', 1, '2023-08-09 07:20:17', '2023-08-09 07:21:55'),
(26, 'profile.png', 'rajesh chauhan', '917905001303', NULL, NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, 'jxYptPbSTz', 1, '2023-08-09 09:25:14', NULL),
(29, 'profile.png', 'Fyndsupplier', '4794432969', 'info@fyndsupplier.com', '', 'Norway', '', '', 'buyer', 47, '', NULL, NULL, NULL, NULL, 'drQxhNYMuK', 1, '2023-08-09 10:42:22', '2023-08-09 12:40:08'),
(32, 'profile.png', 'Raju', '971566659790', 'info@fyndsupplier.com', NULL, 'United Arab Emirates', '', '', 'buyer', 971, NULL, NULL, NULL, NULL, NULL, 's0jW5idVke', 1, '2023-08-11 13:07:31', NULL),
(33, 'profile.png', 'CHINTAK S MEHTA', '919428246967', 'chintak.mehta@alkneel.in', 'ALKNEEL PHARMA CHEM', 'India', 'www.alkneel.in', 'We deal in Sodium Bisulfite, Sodium Sulphite, Potassium Chloride, Potassium Sulphate, Soda ash , Caustic Soda\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'e4LnmLwWmP', 1, '2023-08-11 16:21:21', '2023-09-13 03:41:51'),
(34, 'profile.png', 'Kevin', '916355514700', 'saraincorporation03@gmail.com', 'Sara Incorporation', 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, '0ipulKE0wT', 1, '2023-08-11 17:37:57', NULL),
(35, 'profile.png', 'Ali Mahdavi', '971556248828', 'ali@chemdrill.com', 'Chemdrill Trading', 'United Arab Emirates', 'www.Chemdrill.com', '', 'buyer', 971, '', NULL, NULL, NULL, NULL, '9Fr3UN3w2L', 1, '2023-08-12 11:09:05', '2023-08-12 12:23:27'),
(37, 'profile.png', 'Pradeep Jain', '917506086942', 'info@mrspeciality.com', 'M R Speciality Chemicals pvt Ltd.', 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, '8U8enBbrZ6', 1, '2023-08-12 11:51:54', NULL),
(38, 'profile.png', 'Sandeep Abhyankar ', '919820547439', NULL, NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, 'V8BARhU57R', 1, '2023-08-12 11:52:59', NULL),
(39, '2940durga enterprises fyndsupplier.png', 'DARSHAN CHOPRA', '919928488170', 'durga@chopragums.com', 'Durga Enterprises', 'India', 'www.chopragums.com', 'Manufacturer and Exporter of Guar Gum Powder & Derivatives', 'supplier', 91, '', NULL, 'Durga Enterprises - Guar Gum Manufacturers and Suppliers in India', 'Durga Enterprises - Guar Gum Manufacturers and Suppliers in India and export to chemical buyers globally. The company deal with Guar gum, Guar Gum Splits and modified Guar gums used for oil well drilling and other industrial application. You can connect with us directly through Fyndsupplier.com or our website. Here is Durga Enterprises profile on fyndsupplier https://www.fyndsupplier.com/supplier-profile?slug=GacQ7JE93d\r\n\r\nMr Darshan Chopra is the MD of the company and leading company to offer great quality products at the MOST competitive price in the market. We can help buyers from laboratory, oil and gas industry and other industry to provide them FREE sample for long term interest and doing business. ', 'Guar gum, modified Guar Gum, Guar Gum Manufacturers and Suppliers, Guar Gum manufacturer and supplier in India, Modified Guar Gum Manufacturers and Suppliers, Laboratory Chemical manufacturer and suppliers. Guar gum splits', 'GacQ7JE93d', 1, '2023-08-12 12:56:20', '2023-09-13 03:54:56'),
(40, 'profile.png', 'Islam Hassan', '966582654209', 'islam.h@mn-chem.com', 'Modern National Chemicals, MNChrm.', 'Saudi Arabia', 'www.mnchem.com', 'Deals in Acid additives, cement additives, Frac. systems, flow assurance, completion fluids, wellbore cleaning\r\n', 'supplier', 966, '', NULL, NULL, NULL, NULL, 'vWuB9dpMUW', 1, '2023-08-12 13:04:04', '2023-09-13 03:58:23'),
(41, 'profile.png', 'Yahia Ait Hamlat', '9710501106780', 'yaithamlat@ofite.com', 'OFI Testing Equipment', 'United States', '', '', 'supplier', 971, NULL, NULL, NULL, NULL, NULL, 'olZRuk3L6x', 1, '2023-08-12 14:34:14', NULL),
(42, 'profile.png', 'Deen', '8615022619141', 'nixamuddin@yahoo.com', 'Hainan Beibo Industry Co. Ltd', 'China', 'http://beiboind.com/', 'With an extensive experience, we we manufacture of varieties of oilfield chemicals and frequently used drilling tools. Our trustworthy products are always adding value in the following areas: drilling, cementing, acidizing, fracturing, oil & gas treatment, transportation, refining, and water treatments. Oilfield and refinery chemicals are our primary focus; we are providing one of the best product to our customer. Some popular chemicals, including Pour point depressants and wax inhibitor, emulsifiers, Xanthan Gum, Sodium Carboxymethyl cellulose (CMC), Lignosulfonate, Hydroxyethyl cellulose (HEC), PHPA, Sodium Chloride, Potassium Chloride, and Sulfonated Asphalt. ', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'UMEUdy3ukB', 1, '2023-08-13 10:06:09', '2023-08-13 10:13:53'),
(43, 'profile.png', 'Derek Zhang', '8618953601694', 'derek@menjiechem.com', 'Weifang JS Chemical Co,,Ltd', 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, 'PPMkupXnlp', 1, '2023-08-14 05:53:17', NULL),
(44, '67065908fec9255b46234d1bb9f8e6b9c47.jpg', 'Frank Sun', '8619156216226', 'sales19@epchems.com', 'Anhui Eapearl Chemical Co., Ltd', 'China', 'https://epchems.com/', 'We are an innovative company specializing in the chemical field. Since establish in 2009, We have a complete technical R&D, quality assurance, and sales service system, and products have been exported to more than 190 countries.We are highly appreciated and trusted by domestic and overseas customers.', 'supplier', 86, '', NULL, NULL, NULL, NULL, '7v2isHOa5H', 1, '2023-08-15 14:26:26', '2023-08-16 11:05:09'),
(45, 'profile.png', 'Arivudainambi', '971544206284', NULL, NULL, 'United Arab Emirates', '', '', 'buyer', 971, NULL, NULL, NULL, NULL, NULL, 'PzBakRiWwO', 1, '2023-08-15 17:17:09', NULL),
(46, 'profile.png', 'Jenny', '8615063917132', NULL, NULL, 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, 'bV2ktcYuQF', 1, '2023-08-16 07:54:03', NULL),
(47, '2899ÐœÐ¾Ð½Ñ‚Ð°Ð¶Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ 1.png', 'Andrew D.', '971503915203', 'da@nrg-int.com', 'NRG International Chemicals ', 'United Arab Emirates', 'www.nrg-int.com', 'The NRG team helps oil and gas operators and service companies make the right choice of effective chemical solutions for mining. Our main products are special chemicals, additives and components for drilling, cementing, intensification and completion of wells.\r\n\r\nNRG knows how to create exclusive solutions and can help with localization and your own production.', 'supplier', 971, '', NULL, 'NRG International Chemicals - Chemical Manufacturers and Supplier In Dubai, Abu Dhabi, UAE and Middle East', 'NRG International Chemicals - Chemical Manufacturers and Supplier In Dubai, Abu Dhabi, UAE and Middle East. You can visit NRG International Chemicals profile on fyndsupplier here https://www.fyndsupplier.com/supplier-profile?slug=ZKOhNePMt3\r\n\r\nYou can list of chemicals which they supply from their UAE unit setup recently. They are company from Russia with presence in different countries to supply quality chemicals at competitive prices.  Chemical buyers from the Middle East including Oman, Qatar, Iraq, Kuwait, Saudi Arabia, and UAE can contact NRG International chemicals. They can export chemicals to all neighbouring countries including cities like Doha, Dammam, Abu Dhabi, Dubai, Sharjah, Muscat, Kuwait, Isbil, Bahrain, and other neighbouring cities. \r\n\r\nHere are key chemicals which NRG International Chemicals Supply: \r\n\r\n1. Fluis Loss Control Additive Well \r\n2. Viscoelastic Surfactant\r\n3. Retarder Well Cementing\r\n4. Viscosifier and Gelling Agent Liquid \r\n5. Emulsifier OBM Based Drilling Fluids\r\n6. Synthetic Gelling Agent for Fracturing\r\n7. Well Cementing Specialty Chemicals and Additives\r\n8. Dissolvable Plugs for Liner and Filter, Well Completion\r\n9. P&P Dissolvable Plugs for Fracturing', 'chemical manufacturers and suppliers in UAE, chemical manufacturers and suppliers in Dubai, chemical manufacturers and suppliers in Abu Dhabi, chemical manufacturers and suppliers in Middle East, chemical manufacturers and suppliers in Qatar, chemical manufacturers and suppliers in Kuwait, chemical manufacturers and suppliers in Saudi Arabia, chemical manufacturers and suppliers in Oman, Fluis Loss Control Additive Well, Viscoelastic Surfactant, Retarder Well Cementing, Viscosifier and Gelling Agent Liquid, Emulsifier OBM Based Drilling Fluids, Synthetic Gelling Agent for Fracturing, Well Cementing Specialty Chemicals and Additives, Dissolvable Plugs for Liner and Filter, Well Completion, P&P Dissolvable Plugs for Fracturing', 'ZKOhNePMt3', 1, '2023-08-16 17:20:57', '2023-08-17 22:30:36'),
(50, '4046reda energy fyndsupplier.jpeg', 'Mohamed youssef', '966507036438', 'Mohammed.youssef@redaenergy.com', 'Reda Energy', 'Saudi Arabia', '', '', 'supplier', 966, '', NULL, 'Reda Energy, Saudi Arabia - Oilfield Chemical Manufacturers and Suppliers ', 'Reda Energy is a reputed global chemical  manufacturer of Drilling Fluids from Saudi Arabia. Deal with drilling chemicals, production chemicals, oilfield chemicals, stimulation chemicals, fracturing chemicals, cementing chemicals and gelling agent and solvents etc. \r\n\r\nKey chemicals which they deals are:\r\n1. Well cleaning Surfactant\r\n2. Acid gases inhibitor\r\n\r\nHere is Reda Energy profile on fyndsupplier website https://www.fyndsupplier.com/supplier-profile?slug=I8w0ifWEpu', 'Chemical suppliers in India, drilling chemical, production chemicals, stimulation chemicals. Well cleaning Surfactant, Acid gases inhibitor', 'I8w0ifWEpu', 1, '2023-08-20 15:13:01', '2023-09-11 14:11:36'),
(51, '3876PIC.jpg', 'ALEEX', '8615196066587', 'yzhao@tianpuchemical.com', 'Tianpu Chemicals Company Limited', 'China', 'Http://www.tianpuchemical.com', 'This is Aleex,Export sales manager specialized for Hydroxyethyl cellulose,Ethylcellulose from Tinapu chemical for 10+years ,Weï¼ŒTianpu Chemicals Company Limitedï¼Œ are the largest  Hydroxyethyl cellulose manufacturer in China, a state-owned enterprise with an annual output of 6000T HEC. The quality of our products is comparable to that of dow , Natrosol,I notice that you are using oil grade HEC,which  increase viscosity in clear brine fluids. We also work with a wide range of oil chemical raw materials companies, such as Baker Hughes, OGDCL,CNPC etc.', 'supplier', 86, '', NULL, 'HEC Manufacturer and Supplier in China', 'Hydroxyethyl cellulose (HEC),Ethyl cellulose manufacturer and supplier in China', 'Hydroxyethyl cellulose manufacturer and supplier in China,Ethylcellulose manufacturer and supplier in China ', '2B4T2gkvj2', 1, '2023-08-24 07:09:50', '2023-09-13 04:48:05'),
(52, 'profile.png', 'Sunny Liu', '8618854108808', NULL, NULL, 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, 'R8Urd6ua78', 1, '2023-08-24 08:25:26', NULL),
(54, '5600vivan fyndsupplier.jpeg', 'VIVAN INDUSTRIES', '918155066066', 'vivanindustries.1402@gmail.com', 'VIVAN INDUSTRIES', 'India', 'http://www.vivanindustries.in', 'VIVAN INDUSTRIES is Manufacturer and Exporter of Non Ferric Alum, established in 2020, is a rapidly growing company for supply and distribution of good quality products, Future plan is to create widely networked in India and Global Market with sourcing and marketing arm. Our approach is to understand customerâ€™s requirements, devise products that meet those requirements economically and then deliver those products timely without compromising quality. ', 'supplier', 91, '', NULL, 'VIVAN INDUSTRIES', 'VIVAN INDUSTRIES is Manufacturer and Exporter of Non Ferric Alum, established in 2020, is a rapidly growing company for supply and distribution of good quality products, Future plan is to create widely networked in India and Global Market with sourcing and marketing arm. Our approach is to understand. \r\n\r\nKey chemicals deal with: Acid Corrosion Inhibitor, Biocide, Corrosion Inhibitor, Scale Inhibitor, PAC LV, LCM, CMC, Sulphate, Carbonate, \r\n\r\nHere is profile of Vivan Industries on fyndsupplier: https://www.fyndsupplier.com/supplier-profile?slug=vivan-industries', 'VIVAN INDUSTRIES, Acid Corrosion Inhibitor supplier and manufacturer, Biocide supplier and manufacturer, Corrosion Inhibitor supplier and manufacturer, Scale Inhibitor supplier and manufacturer, PAC LV supplier and manufacturer, LCM supplier and manufacturer, CMC supplier and manufacturer, Sulphate supplier and manufacturer, Carbonate supplier and manufacturer, ', 'vivan-industries', 1, '2023-08-25 15:09:48', '2023-09-09 21:33:34'),
(55, 'profile.png', 'AL AMIN INTERNATIONAL', '919773086246', NULL, NULL, 'India', '', '', 'buyer', 91, NULL, NULL, NULL, NULL, NULL, 'A2v80VpJSa', 1, '2023-08-26 12:12:35', NULL),
(56, 'profile.png', 'Eric Liu', '8617732841676', NULL, NULL, 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, 'Rbmo8vY0Qw', 1, '2023-08-29 11:53:03', NULL),
(57, '6588jiuta.jpg', 'Farash', '971508508883', 'farash@shjiuta.com', 'Jiuta Chemical Co., Ltd', 'China', '', 'Titanium Oxide Manufacturer and Suppliers in UAE and China. We offer the best quality industrial grade Titanium Oxide at the MOST competitive price with history of over 20 years in market. ', 'supplier', 971, '', NULL, 'JIuta Chemical Company Limited - Chemical Manufacturer and Supplier in China ', 'JIuta Chemical Company Limited - Chemical Manufacturer and Supplier in China. The company supply and export chemical to chemical buyers in Middle East, Europe, USA, Asia and Africa. \r\n\r\nHere are key chemicals which Jiuta Chemicals Company deal with:\r\n\r\n\r\nHere is profile of Jiuta Chemical company on fyndsupplier website: https://www.fyndsupplier.com/supplier-profile?slug=SWAjg0glcL', 'chemical manufacturer and supplier in china, JIuta Chemical Company Limited', 'SWAjg0glcL', 1, '2023-09-03 01:11:40', '2023-09-09 17:06:02'),
(63, 'profile.png', 'Sanjeev Gupta', '917018480095', 'sanjeev@metapharma.co.in', 'Meta Pharma', 'India', 'www.metapharma.co.in', '', 'buyer', 91, '', NULL, NULL, NULL, NULL, '9scIiDnaZ2', 1, '2023-09-06 13:02:33', '2023-09-09 21:32:47'),
(67, 'profile.png', 'Mohammed Zoheb Asnsari', '971529536108', ' zoheb1185@gmail.com', 'MEDIST FZE /  Eastern Resource Trading', 'United Arab Emirates', '', 'Deals in Pharma,Personal care, Home care, Petrochemicals, Paints \r\n', 'supplier', 971, '', NULL, NULL, NULL, NULL, 'qFKPEk4DHr', 1, '2023-09-10 20:24:25', '2023-09-13 03:23:19'),
(68, 'profile.png', 'Abu Shaida', '966500200692', 'sales1@uitc.com.sa', 'United International trading company', 'Saudi Arabia', '', 'Deals in Drilling Fluids Chemicals in Saudi Arabia and Neighbouring market. ', 'supplier', 966, '', NULL, NULL, NULL, NULL, 'VbJ0S2b8EH', 1, '2023-09-10 20:30:43', '2023-09-11 14:05:17'),
(69, 'profile.png', 'Ghassan Almahmoud ', '966591317733', 'Ghassan.almahmoud@eiaas.sa', 'EIAAS ', 'Saudi Arabia', 'eiaas.sa', 'Chemical manufacturer and supplier in Saudi Arabia. We deal with key chemicals : zinc sulfate, copper sulphate, magnesium and Manginess sulphate  so if you need for Saudi Arabia or export then please contact. ', 'supplier', 966, '', NULL, 'EIAAS - Sulphate Manufacturer and Suppliers in Saudi Arabia', 'We are reputed chemical manufacturer and supplier in Saudi Arabia. We supply following key chemicals: Zinc Sulfate, Copper Sulphate, Magnesium and Manginess Sulphate', 'Zinc sulfate manufacturer and supplier in Saudi Arabia, copper sulphate  manufacturer and supplier in Saudi Arabia, magnesium  manufacturer and supplier in Saudi Arabia and Manginess sulphate manufacturer and supplier in Saudi Arabia, ', 'ksa', 1, '2023-09-10 21:09:01', '2023-09-11 16:03:25'),
(70, 'profile.png', 'Guest', '917383243436', 'info@fyndsupplier.com', NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, 'EPoiiopQvr', 1, '2023-09-11 11:43:50', NULL),
(71, 'profile.png', 'Miranda Zhang', '8613012487607', 'baoxianghuagong68@163.com', 'Binzhou City Baoxiang Chemical Industry Co., Ltd.', 'China', '', 'We are Sodium Sulphide and Sodium Hydrogen Sulphide Raw material manufacturer and supplier in China ', 'supplier', 86, '', NULL, NULL, NULL, NULL, '7kCfmCCTMT', 1, '2023-09-12 06:36:21', '2023-09-12 08:47:03'),
(72, 'profile.png', 'Guest', '917778814849', 'info@fyndsupplier.com', NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, '7jlYUF2b5a', 1, '2023-09-12 23:03:52', NULL),
(73, 'profile.png', 'Ahmed Hamdy', '201008685262', 'ahmedhamdi@eccegypt.com ', 'EMEC production chemicals', 'Egypt', 'eccegypt.com', 'Manufacturer and supplier of Corrosion inhibitors, scale inhibitors, scale dissolvers, biocides , Triazene , demulsifier, pour point depressants, paraffin dispersants , asphaltine dispersants, defoamers , ph controller and emulsifiers', 'supplier', 20, '', NULL, NULL, NULL, NULL, 'o1UdKS4vsY', 1, '2023-09-12 23:30:29', '2023-09-12 23:31:57'),
(75, 'profile.png', 'Alice liu', '8618754675870', '', 'Dongying City longxing Chemical Co. LTD', 'China', 'www.chemlongxing.com', 'Deals in propylene Glycol, Dimethyl Carbonate, Propylene Carbonate, Methylene Chloride, Aniline, Dichloropropane, Xylene Etc\r\n', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'OpWnKJxQ6F', 1, '2023-09-13 03:27:08', '2023-09-13 03:28:57'),
(76, 'profile.png', 'Ark Shah', '917600019798', 'Md.cfc@chemfertchemicals.com', 'CHEMFERT Chemicals', 'India', 'www.chemfertchemicals.com', 'We Deals in Oil Drilling Chemicals, Water Treatment Chemicals and Water Soluble Fertilizers\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'cReM5trMDZ', 1, '2023-09-13 03:38:03', '2023-09-13 03:39:43'),
(77, 'profile.png', 'Bharat Maggu', '919910969558', 'shinewax@gmail.com', 'Multichem India', 'India', '', 'Deals in Oilfield Chemicals \r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, '29Duzap6s3', 1, '2023-09-13 03:50:35', '2023-09-13 03:51:17'),
(78, 'profile.png', 'Alexander Lyu', '8618348854172', 'alexander@qdbiotek.com', '', 'China', 'www.qdbiotek.com', '', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'm7e2h1h9SY', 1, '2023-09-13 03:52:30', '2023-09-13 03:53:40'),
(79, 'profile.png', 'Dinaish Lunkad', '919426596891', 'info@bttcogroup.com', 'The BTTTCO Overseas', 'India', 'www.bttcogroup.com', 'Deals in Guar gum, Castor oil derivatives, sodium Cynide 98%, Bentonite, Sulphuric Acid 98%\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, '792a0UWIAr', 1, '2023-09-13 03:56:05', '2023-09-13 03:56:52'),
(80, 'profile.png', 'J H Shah', '919825070161', 'Jhshah@bleachchexim.com', 'Bleach Chem Exim Pvt Ltd', 'India', 'www.bleachexim.com', '', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'r1yd7yiCpe', 1, '2023-09-13 03:59:15', '2023-09-13 03:59:54'),
(81, 'profile.png', 'Banjo Ajegbomogun', '96897839655', 'banjoaje@gmail.com', 'Halliburton', 'Oman', '', 'Deals in Stimulation and Coiled Tubing Chemicals\r\n and others', 'buyer', 968, '', NULL, NULL, NULL, NULL, '9IohQvkgLQ', 1, '2023-09-13 04:01:45', '2023-09-13 04:02:33'),
(82, 'profile.png', 'Derek Song', '8613325295627', 'derek.song@shdhuiguang.com', 'Shandong Huiguang Technology Development Co. Ltd.', 'China', 'www.shdhuiguang.com', 'Deals in HPMC / HEMC / HEC\r\n', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'l3AKMajvCV', 1, '2023-09-13 04:03:35', '2023-09-13 04:04:32'),
(83, 'profile.png', 'Ayaz Khan', '971558724925', 'ayaz@alghaithindustries.ae', ' Al Ghaith Industries', 'United Arab Emirates', 'www.alghaithindustries.ae', 'Deals in Caustic Flakes, HCL Caustic Liquid\r\n', 'supplier', 971, '', NULL, NULL, NULL, NULL, 'dEWobgdo3H', 1, '2023-09-13 04:05:59', '2023-09-13 04:06:37'),
(84, 'profile.png', 'Tushar', '8613184138516', 'tushar@hfcs.net.cn', '', 'China', 'www.hfcs.net.cn', 'Deals In Food And Beverage Sweeteners\r\n', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'ugGG31Q1cr', 1, '2023-09-13 04:07:30', '2023-09-13 04:08:25'),
(85, 'profile.png', 'Habibullah Ansari', '919825284561', 'ops@sdfchemicals.com', 'Supreme Drilling Fluid Chemicals', 'India', 'sdfchemicals.com', 'Deals in Drilling Fluid chemicals\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, '7VXbbCKCMs', 1, '2023-09-13 04:09:11', '2023-09-13 04:09:58'),
(86, 'profile.png', 'Aravind', '919688441155', '', 'Meenatchi Traders', 'India', '', 'Deals in Carbon Black / Pyrolysis Oil\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'njWCGpURLr', 1, '2023-09-13 04:10:46', '2023-09-13 04:11:23'),
(87, 'profile.png', 'Mohamed Samy', '201201009530', 'engineermohamedsam898@gmail.com', 'Horizon Chemical', 'Egypt', '', 'Deals in oil and gas petrochemicals\r\n', 'supplier', 20, '', NULL, NULL, NULL, NULL, 'CBQIrQCzDP', 1, '2023-09-13 04:28:34', '2023-09-13 04:29:14'),
(88, 'profile.png', 'Terry Su', '8613780771900', 'terry@dayongchem.com', 'Dongying City Dayong Petroleum Additives Co. Ltd.', 'China', 'www.dayongchem.com', 'Deals in Drilling chemicals, like Xanthan Gum, PAC LV, PAC HV, PHPA, etc.   Production chemicals, like Demulsifier Reverse Demulsifier, Drag Reducer , H2S Scavenger (Oil Based & Water Based) , Defoamer, etc.\r\n', 'buyer', 86, '', NULL, NULL, NULL, NULL, 's1IO3gug9H', 1, '2023-09-13 04:30:08', '2023-09-13 04:30:49'),
(89, 'profile.png', 'Moses Inyangabia', '2348098022335', 'info@dpcsnig.com', 'Drilling & Production Chemicals Serv. Ltd', 'Nigeria', 'www.dpcsnig.com', 'Deals in Drilling, Production, & Water Treatment Chemical', 'supplier', 234, '', NULL, NULL, NULL, NULL, 'TmH6wR8GkZ', 1, '2023-09-13 04:31:49', '2023-09-13 04:32:39'),
(90, 'profile.png', 'Tombang Sitorus', '628128657523', 'tombang@kharip.com', 'Kharisma Riama Perdana', 'Indonesia', 'www.kharip.com', '', 'buyer', 62, '', NULL, NULL, NULL, NULL, 'pOga9YaaVj', 1, '2023-09-13 04:33:36', '2023-09-13 04:34:15'),
(91, 'profile.png', 'Wendy Pan', '8613668614895', 'Vipn@chemichase.com', 'Shandong Chemichase Chemical Co. ltd.', 'China', 'www.chemichase.com', '', 'buyer', 86, '', NULL, NULL, NULL, NULL, 'buK3AMcUCZ', 1, '2023-09-13 04:35:15', '2023-09-13 04:35:47'),
(92, 'profile.png', 'Mr Manohar', '919607112255', 'ceo@noyeroverseas.com', 'Noyer Overseas India Pvt Ltd.', 'India', 'www.noyeroverseas.com', 'Deals in Celellduos Fiber LCM , Nut plug LCM , Fibroseal LCM, Grape Powder LCM\r\n', 'buyer', 91, '', NULL, NULL, NULL, NULL, 'htnf509Qkl', 1, '2023-09-13 04:37:21', '2023-09-13 04:38:58'),
(93, 'profile.png', 'Tarun Negi', '919760947123', 'tarun@techwysh.com', 'Techwysh', 'India', 'www.techwysh.com', 'Deals in Drilling, Production, Cementing  and Stimulation\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'Z0tv0axfc4', 1, '2023-09-13 04:39:45', '2023-09-13 04:40:52'),
(94, 'profile.png', 'Prasidh Pandya', '917666597741', 'sales@famouschemtrade.com', 'Famous Chem Trade', 'India', 'www.famouschemtrade.com', 'Deals in Titanium Dioxide, Calcium Carbonate, Silica powder, Talc, Dolomite, Barium sulphate\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'O9zDrwmPhE', 1, '2023-09-13 04:41:54', '2023-09-13 04:42:36'),
(95, 'profile.png', 'Aagam Shah', '919426851754', 'aagamshah1206@gmail.com', 'Shri Labdhi Enterprise', 'India', 'www.shrilabdhienterprise.com', ' We Are Supplying Industrial and Marine Related Maintenance Products', 'supplier', 91, '', NULL, NULL, NULL, NULL, '2lbgZkvYcC', 1, '2023-09-13 04:43:26', '2023-09-13 04:44:24'),
(96, 'profile.png', 'Andrew', '79297272680', 'a.datskov@onrg.ae', 'Nrg International Chemicals (UAE)', 'Kazakhstan', 'www.onrg.ae', 'Well Cementing, Drilling Fluids, Matrix Acidizing, Well Completion Equipment', 'supplier', 7, '', NULL, NULL, NULL, NULL, 'P6H0960jUt', 1, '2023-09-13 04:46:11', '2023-09-13 04:46:59'),
(97, 'profile.png', 'Aalok', '919960028452', 'info@abemultech.com', 'Ab Emultech Private Limited ', 'India', 'www.abemultech.com', '', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'fgTb1wibl4', 1, '2023-09-13 04:48:47', '2023-09-13 04:49:35'),
(98, 'profile.png', 'Abby Chem Menu ', '8615037315250', 'abby.yang@oilfieldchem.com', 'www.oilfieldchem.com', 'China', '', 'Deals in Sulfonated Asphalt, Pac', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'g1D7lOOwbV', 1, '2023-09-13 04:50:34', '2023-09-13 04:51:10'),
(99, 'profile.png', 'Mohammed Shafi', '919346696789', 'elitemineralsind@gmail.com', '', 'India', 'www.eliteminerals.in', 'Deals in White and Off White Barytes Powder, Dolomite, Bentonite\r\n\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, '1raabYsHMp', 1, '2023-09-13 04:51:57', '2023-09-13 04:52:45'),
(100, 'profile.png', 'Hadi Jafarian', '989194607539', 'Chemicals@gmail.com', '', 'Iran, Islamic Republic of', '', 'Deals in Gilsonite, Hematite, DEG, MEG, TEG, MEA, Drilling Fluids\r\n', 'supplier', 98, '', NULL, NULL, NULL, NULL, 'aKy7xnoTal', 1, '2023-09-13 04:54:09', '2023-09-13 04:54:33'),
(101, 'profile.png', 'Mudassar', '971585443600', 'M.nazeer@chemtrade.com', 'Chemtrade', 'United Arab Emirates', 'www.chemtrade.com', 'Deals in Upstream Chemicals\r\n', 'supplier', 971, '', NULL, NULL, NULL, NULL, 'LdRxDWApG2', 1, '2023-09-13 04:55:35', '2023-09-13 04:56:12'),
(102, 'profile.png', 'Nilesh Patil', '919552375224', 'nilesh.patil@bureauveritas.com', 'Bureau Veritas Marine Services', 'India', 'www.bureauveritas.com', 'Deals in Octane Booster, Cargo Treatment Chemical\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'Ue6P7bSv0v', 1, '2023-09-13 04:57:11', '2023-09-13 04:58:01'),
(103, 'profile.png', 'Rajesh Shah', '919099511113', 'ceo@oxxyy.com', 'Company  Oxxyy Speciality (Speciality chemicals Div of Oxxyy Group Of Companies)', 'India', '', 'Deals in Speciality Chemicals for Oil and Gas, Speciality Additives for Lubricants\r\n', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'VWJ2dBmJ2D', 1, '2023-09-13 04:58:52', '2023-09-13 04:59:51'),
(104, '2931logo 3.jpg', 'Bill Nai', '8618852572628', 'billnai@csdschina.com', 'yangzhou guanmin detergent chemicals co., ltd.', 'China', 'www.csdschina.com', 'we are the leading manufacturer and exporter of Complex Sodium DiSilicate-best STPP substitute (40000mts per year), Zeolite detergent grade (15000mts per year) and CMC sodium (6000mts per year) in China.  \r\nWe have cooperated with over 60 foreign detergent factories and 20 domestic detergent factories all over the world since 2008\r\n\r\nwe produce:\r\n1. Complex Sodium DiSilicate--best STPP substitute for detergent powder making\r\n \r\n2. Zeolite Detergent Grade\r\n \r\n3. CMC sodium\r\n\r\nwe also supply\r\noptical brightener: CBS-X, DMS-X\r\nsurfactant: LAS powder, AEO, SLES\r\ncolorful speckle\r\n\r\nwe hope that we can have a chance to cooperate with your esteemed company\r\n', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'AWI0xbS1g4', 1, '2023-09-13 13:52:10', '2023-09-14 08:04:07'),
(105, 'profile.png', 'Rameshwar M Paswan', '966537040220', 'info@fyndsupplier.com', NULL, 'Saudi Arabia', '', '', 'buyer', 966, NULL, NULL, NULL, NULL, NULL, 'euurhz8Na4', 1, '2023-09-14 17:22:30', NULL),
(106, 'profile.png', 'Abdul Wahabi', '966537040220', 'info@fyndsupplier.com', '', 'Saudi Arabia', '', '', 'buyer', 966, '', NULL, NULL, NULL, NULL, 'Km5GWWSNiZ', 1, '2023-09-14 17:24:58', '2023-09-28 13:28:47'),
(108, 'profile.png', 'Guest', '918882335624', 'info@fyndsupplier.com', NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, 'WixFZTmYGd', 1, '2023-09-17 08:14:32', NULL),
(110, 'profile.png', 'test', '919453179080', 'testsupplier@gmail.com', 'test', 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, '2fZSK8KMBS', 1, '2023-09-18 20:27:32', NULL),
(115, 'profile.png', 'Chintan Rabari ', '919023390780', '', 'Gujarat chemical and pharmaceutical ', 'India', '', '', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'W0inGi0QAw', 1, '2023-09-20 22:55:56', '2023-09-20 22:57:21'),
(116, 'profile.png', 'Nikhil Pethani', '919427283536', 'madhurasoverseas@gmail.com', 'Madhuras overseas', 'India', '', '', 'supplier', 91, '', NULL, NULL, NULL, NULL, '2DlNgxZEud', 1, '2023-09-20 23:03:55', '2023-09-20 23:04:41'),
(118, 'profile.png', 'Veer Chemicals ', '919820453476', NULL, NULL, 'India', '', '', 'buyer', 91, NULL, NULL, NULL, NULL, NULL, 'Ny9px12FGB', 1, '2023-09-21 07:06:20', NULL),
(119, 'profile.png', 'HARSH VARDHAN DWIVEDI ', '919554806711', NULL, NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, 'bVaXZ6h3AL', 1, '2023-09-21 11:11:02', NULL),
(120, 'profile.png', 'Hiren bhai shah', '91982421806', NULL, NULL, 'India', '', '', 'buyer', 91, NULL, NULL, NULL, NULL, NULL, 'loctuiblpw', 1, '2023-09-21 19:29:57', NULL),
(122, 'profile.png', 'Divya', '9710566449676', NULL, NULL, 'United Arab Emirates', '', '', 'supplier', 971, NULL, NULL, NULL, NULL, NULL, 'Rf4ChZwQyq', 1, '2023-09-22 12:24:30', NULL),
(123, 'profile.png', 'Guest', '919313698897', 'rameshwar@wesmartyinfotech.com', NULL, 'India', '', '', 'buyer', 91, NULL, NULL, NULL, NULL, NULL, 'cMwFknMuDp', 1, '2023-09-22 13:15:57', NULL),
(126, 'profile.png', 'Mr Nate', '8613688375526', 'yangb@chanhen.com', 'chanhen group-----the top phosphoric acid factory', 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, '1mNUUtmjXF', 1, '2023-09-26 12:21:43', NULL),
(127, 'profile.png', 'RENJITH KAMALAN', '971504035250', NULL, NULL, 'United Arab Emirates', '', '', 'supplier', 971, NULL, NULL, NULL, NULL, NULL, 'cRyRgtiFtr', 1, '2023-09-26 13:17:48', NULL),
(128, 'profile.png', 'Ranjitsinh ', '919712921285', NULL, NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, 'IVTim4KqGe', 1, '2023-09-26 13:29:46', NULL),
(129, 'profile.png', 'Nitin Mathurkar ', '919971047303', 'mathurkar5000@gmail.com', 'Silhouette paints and allied chemicals ', 'India', '', 'Deals in all kinds of solvent and chemical. ', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'XgRRtEq96g', 1, '2023-09-26 21:55:16', '2023-09-26 21:56:47'),
(130, 'profile.png', 'Guest', '12819224860', 'setor.k.sorkpor@afriquesc.com', NULL, 'Canada', '', '', 'buyer', 1, NULL, NULL, NULL, NULL, NULL, 'dgL376d2ND', 1, '2023-09-27 06:59:10', NULL),
(131, 'profile.png', 'Akanimo Inyangabia', '2348030861268', NULL, NULL, 'Nigeria', '', '', 'supplier', 234, NULL, NULL, NULL, NULL, NULL, 'r2NuFkUhwa', 1, '2023-09-28 09:54:29', NULL),
(132, 'profile.png', 'Manohar Bhujbal', '9109975568855', 'sales@noyeroverseas.com', 'NOYER OVERSEAS INDIA PVT LTD', 'India', '', '', 'buyer', 91, '', NULL, NULL, NULL, NULL, 'ZVleJ6T404', 1, '2023-09-28 10:45:40', '2023-09-28 11:52:05'),
(133, 'profile.png', 'Guest', '9109975568855', 'sales@noyeroverseas.com', NULL, 'India', '', '', 'supplier', 91, NULL, NULL, NULL, NULL, NULL, 'ZIG6OjxBF0', 1, '2023-09-28 11:50:48', NULL),
(134, 'profile.png', 'Zeke Zhai', '8615689322952', NULL, NULL, 'China', '', '', 'supplier', 86, NULL, NULL, NULL, NULL, NULL, 'pXEaCKwhQc', 1, '2023-09-28 12:35:52', NULL),
(135, 'profile.png', 'hari chandana', '971586678649', NULL, NULL, 'United Arab Emirates', '', '', 'supplier', 971, NULL, NULL, NULL, NULL, NULL, 'a3Zq3IaEa3', 1, '2023-09-28 13:06:14', NULL),
(136, '5985WhatsApp Image 2023-09-28 at 14.21.07.jpeg', 'Metflow Engineers', '918487948488', 'info@metflowengineers.com', 'Metflow Engineers', 'India', 'www.metflowengineers.com', '', 'supplier', 91, '', NULL, NULL, NULL, NULL, 'KpIqiYjqPb', 1, '2023-09-28 14:14:42', '2023-09-28 14:21:28'),
(137, 'profile.png', 'Chemeco', '380507460258', NULL, NULL, 'Ukraine', '', '', 'buyer', 380, NULL, NULL, NULL, NULL, NULL, '0wxWvSElaJ', 1, '2023-09-28 16:42:06', NULL),
(139, '3152logo.png', 'Lihao Chemicals', '861870363188', 'bcces2012@vip.126.com', 'Lihao Chemicals', 'China', 'http://www.lihaochemical.com/', 'We have established an extensive global network of business. We have years of experience in foreign trade, with a high-quality management team pursuing unmatched trust and top-quality service-giving priority to efficiency, innovation, and practical business ideas, thereby possessing favorable conditions for business cooperation and extensive business opportunities with customers around the world.', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'OzKbh99Ht3', 1, '2023-09-29 12:28:44', '2023-09-29 23:33:30'),
(141, 'profile.png', 'Hebei Bossory ', '8618633819069', 'freda@bossory.com', 'Hebei Bossory Chemicals Technology Co., Ltd', 'China', 'http://www.bossory.com/', 'Hebei Bossory Chemicals Technology Co., Ltd. is a comprehensive modern enterprise that integrating chemical research, development, production and trading together, has already formed a set of scientific management system.', 'supplier', 86, '', NULL, NULL, NULL, NULL, 'ACVGJgUWh7', 1, '2023-09-29 12:50:02', '2023-09-29 12:59:49'),
(143, 'profile.png', 'Achin jain', '918770188541', NULL, NULL, 'India', '', '', 'buyer', 91, NULL, NULL, NULL, NULL, NULL, 'YWAtdHNdpI', 1, '2023-09-30 09:29:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `blog_title`
--
ALTER TABLE `blog_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_alignment`
--
ALTER TABLE `buyer_alignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_title`
--
ALTER TABLE `buyer_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemical`
--
ALTER TABLE `chemical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemical_alignment`
--
ALTER TABLE `chemical_alignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemical_title`
--
ALTER TABLE `chemical_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_inquiry`
--
ALTER TABLE `contact_inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_to` (`contact_to`),
  ADD KEY `contact_from` (`contact_from`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_title`
--
ALTER TABLE `faq_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_title`
--
ALTER TABLE `feedback_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `head_script`
--
ALTER TABLE `head_script`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner_title`
--
ALTER TABLE `home_banner_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_head_script`
--
ALTER TABLE `home_head_script`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `chemical_id` (`chemical_id`),
  ADD KEY `main_chemical_id` (`main_chemical_id`);

--
-- Indexes for table `inquiry_offer`
--
ALTER TABLE `inquiry_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `inquiry_title`
--
ALTER TABLE `inquiry_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_alignment`
--
ALTER TABLE `offer_alignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_title`
--
ALTER TABLE `offer_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_alignment`
--
ALTER TABLE `quotation_alignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_title`
--
ALTER TABLE `quotation_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_alignment`
--
ALTER TABLE `supplier_alignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_chemical_list`
--
ALTER TABLE `supplier_chemical_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `chemical_id` (`chemical_id`);

--
-- Indexes for table `supplier_chemical_title`
--
ALTER TABLE `supplier_chemical_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_seo`
--
ALTER TABLE `supplier_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_title`
--
ALTER TABLE `supplier_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_chemical_buyer_title`
--
ALTER TABLE `top_chemical_buyer_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_chemical_supplier_title`
--
ALTER TABLE `top_chemical_supplier_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_title`
--
ALTER TABLE `blog_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_alignment`
--
ALTER TABLE `buyer_alignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_title`
--
ALTER TABLE `buyer_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chemical`
--
ALTER TABLE `chemical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `chemical_alignment`
--
ALTER TABLE `chemical_alignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chemical_title`
--
ALTER TABLE `chemical_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_inquiry`
--
ALTER TABLE `contact_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `faq_title`
--
ALTER TABLE `faq_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback_title`
--
ALTER TABLE `feedback_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `head_script`
--
ALTER TABLE `head_script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `home_banner_title`
--
ALTER TABLE `home_banner_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_head_script`
--
ALTER TABLE `home_head_script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inquiry_offer`
--
ALTER TABLE `inquiry_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `inquiry_title`
--
ALTER TABLE `inquiry_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer_alignment`
--
ALTER TABLE `offer_alignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer_title`
--
ALTER TABLE `offer_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotation_alignment`
--
ALTER TABLE `quotation_alignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotation_title`
--
ALTER TABLE `quotation_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supplier_alignment`
--
ALTER TABLE `supplier_alignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_chemical_list`
--
ALTER TABLE `supplier_chemical_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `supplier_chemical_title`
--
ALTER TABLE `supplier_chemical_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_seo`
--
ALTER TABLE `supplier_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `supplier_title`
--
ALTER TABLE `supplier_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_chemical_buyer_title`
--
ALTER TABLE `top_chemical_buyer_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_chemical_supplier_title`
--
ALTER TABLE `top_chemical_supplier_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_comment_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_inquiry`
--
ALTER TABLE `contact_inquiry`
  ADD CONSTRAINT `contact_inquiry_ibfk_1` FOREIGN KEY (`contact_to`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_inquiry_ibfk_2` FOREIGN KEY (`contact_from`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD CONSTRAINT `group_chat_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiry_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiry_ibfk_3` FOREIGN KEY (`chemical_id`) REFERENCES `supplier_chemical_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiry_ibfk_4` FOREIGN KEY (`main_chemical_id`) REFERENCES `chemical` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquiry_offer`
--
ALTER TABLE `inquiry_offer`
  ADD CONSTRAINT `inquiry_offer_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_chemical_list`
--
ALTER TABLE `supplier_chemical_list`
  ADD CONSTRAINT `supplier_chemical_list_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_chemical_list_ibfk_2` FOREIGN KEY (`chemical_id`) REFERENCES `chemical` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
