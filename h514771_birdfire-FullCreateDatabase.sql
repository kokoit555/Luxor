-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2017 at 05:28 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h514771_birdfire`
--
CREATE DATABASE IF NOT EXISTS `h514771_birdfire` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `h514771_birdfire`;

-- --------------------------------------------------------

--
-- Table structure for table `adminluxor`
--

CREATE TABLE `adminluxor` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminluxor`
--

INSERT INTO `adminluxor` (`id_admin`, `username`, `password`) VALUES
(1, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `codepromotion`
--

CREATE TABLE `codepromotion` (
  `id_Code` int(11) NOT NULL,
  `CodePromotion` varchar(12) NOT NULL,
  `MatchPercen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codepromotion`
--

INSERT INTO `codepromotion` (`id_Code`, `CodePromotion`, `MatchPercen`) VALUES
(1, 'GFTIRKQL6654', 10);

-- --------------------------------------------------------

--
-- Table structure for table `favoruite`
--

CREATE TABLE `favoruite` (
  `id_Favoruite` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `formregisterstore`
--

CREATE TABLE `formregisterstore` (
  `id_formRegisterStore` int(11) NOT NULL,
  `NameStore` varchar(255) NOT NULL,
  `AvatarStore` varchar(50) NOT NULL,
  `AddressStore` varchar(255) NOT NULL,
  `TelStore` varchar(30) NOT NULL,
  `CityStore` varchar(100) NOT NULL,
  `StateStore` varchar(100) NOT NULL,
  `ZipStore` varchar(10) NOT NULL,
  `CountryStore` varchar(100) NOT NULL,
  `EmailStore` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `textStory` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formregisterstore`
--

INSERT INTO `formregisterstore` (`id_formRegisterStore`, `NameStore`, `AvatarStore`, `AddressStore`, `TelStore`, `CityStore`, `StateStore`, `ZipStore`, `CountryStore`, `EmailStore`, `Password`, `textStory`) VALUES
(1, 'FolkCharm', '---', '555/55', '099-999-9999', 'เมือง', 'กรุงเทพ', '10000', 'ประเทศไทย', 'folkChram@info.com', '81dc9bdb52d04dc20036dbd8313ed055', 'กระเป๋า ทุกคนน่ารักมาก สวัสดีครับ เย้ๆดีใจจังเลยห่อส่งไปร้านเดียวน่ะ ฮ่าาๆ ก่อนจะกลับนะครับ');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotproduct`
--

CREATE TABLE `hotproduct` (
  `id_hotproduct` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `urlimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imgproduct`
--

CREATE TABLE `imgproduct` (
  `id_imgProduct` int(11) NOT NULL,
  `Name_img` varchar(100) NOT NULL,
  `url_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imgproduct`
--

INSERT INTO `imgproduct` (`id_imgProduct`, `Name_img`, `url_img`) VALUES
(4, 'jai-01.png', 'images/product/'),
(5, 'jai-02.png', 'images/product/'),
(6, 'jai-03.png', 'images/product/'),
(7, 'jai-04.png', 'images/product/');

-- --------------------------------------------------------

--
-- Table structure for table `imgproductdetail`
--

CREATE TABLE `imgproductdetail` (
  `id_imgProductDetail` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_imgProduct` int(11) NOT NULL,
  `namethumbProduct` varchar(1) NOT NULL,
  `urlthumbProduct` text NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imgproductdetail`
--

INSERT INTO `imgproductdetail` (`id_imgProductDetail`, `id_product`, `id_imgProduct`, `namethumbProduct`, `urlthumbProduct`, `qty`) VALUES
(4, 3, 4, '1', 'images/thumbproduct/jai-p01.png', '10'),
(5, 3, 5, '2', 'images/thumbproduct/jai-p02.png', '10'),
(6, 3, 6, '3', 'images/thumbproduct/jai-p03.png', '10'),
(7, 3, 7, '4', 'images/thumbproduct/jai-p04.png', '10');

-- --------------------------------------------------------

--
-- Table structure for table `orderproductdetail`
--

CREATE TABLE `orderproductdetail` (
  `id_orderDetail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `namethumbProduct` int(11) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `Price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Date_order` date NOT NULL,
  `Tax` varchar(5) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Tel` varchar(30) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  `Send_email_order` varchar(100) NOT NULL,
  `Totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `Type_payment` varchar(255) NOT NULL,
  `Payment_Status` varchar(255) NOT NULL,
  `DatePayment` date NOT NULL,
  `id_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `NameProduct` varchar(300) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `PriceProduct` varchar(10) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `tax` varchar(3) NOT NULL,
  `date_input` date NOT NULL,
  `productDetail` varchar(255) NOT NULL,
  `textProductDetail` text NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_store` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `NameProduct`, `Status`, `PriceProduct`, `discount`, `tax`, `date_input`, `productDetail`, `textProductDetail`, `id_type`, `id_store`) VALUES
(1, 'กระเป๋า', 'Stock', '4000', '0%', '7%', '2017-12-06', 'กระเป๋านิ่มๆ น่ารักๆ แฝงด้วยลวดลายธรรมชาติปักอย่างประณีต ', 'กระเป๋านิ่มๆ น่ารักๆ แฝงด้วยลวดลายธรรมชาติปักอย่างประณีต คือผ้าฝ้ายย้อมคราม ฝีมือชาวบ้านชุมชนบ้านนางเติ่ง ต.โคกภู อ.ภูพาน จ.สกลนคร มีทั้งเสื้อ กางเกง ผ้าพันคอ ผ้าคลุมไหล่น่ารักๆ ให้เลือก เมื่อรวมกับดีไซน์เรียบง่ายแต่แฝงไว้ด้วยความเก๋ไก๋ รับรองว่าใส่แล้วต้องยืดอกอย่างภูมิใจเพราะสวยไม่ซ้ำใครและได้ช่วยสังคมไปในตัว', 3, 1),
(2, 'กระเป๋า2', 'Stock', '5000', '10%', '7%', '2017-12-05', 'กระเป๋านิ่มๆ น่ารักๆ แฝงด้วยลวดลายธรรมชาติปักอย่างประณีต ', 'กระเป๋านิ่มๆ น่ารักๆ แฝงด้วยลวดลายธรรมชาติปักอย่างประณีต คือผ้าฝ้ายย้อมคราม ฝีมือชาวบ้านชุมชนบ้านนางเติ่ง ต.โคกภู อ.ภูพาน จ.สกลนคร มีทั้งเสื้อ กางเกง ผ้าพันคอ ผ้าคลุมไหล่น่ารักๆ ให้เลือก เมื่อรวมกับดีไซน์เรียบง่ายแต่แฝงไว้ด้วยความเก๋ไก๋ รับรองว่าใส่แล้วต้องยืดอกอย่างภูมิใจเพราะสวยไม่ซ้ำใครและได้ช่วยสังคมไปในตัว', 6, 1),
(3, 'Jaina', 'Stock', '1250', '0%', '7%', '2017-12-14', 'ขนาดของกระเป๋า (กว้าง x ยาว x สูง) 23 x 30 x 18', 'กระเป๋าสะพาย/ถือ ที่สวยงามมีเอกลักษณ์ ไม่ซ้ำใคร (งานทำเพียงใบเดียว) เป็นกระเป๋าที่สามารถใช้งานได้ทั้งวัน ใบนี้ทำจาก ผ้าไหมมัดหมี่และหนังวัวแท้สีน้ำเงิน มีสายสะพายซึ่งสามารถปรับความสั้นยาวและถอดออกได้ หากคุณต้องการกระเป๋าที่ไม่ซ้ำใคร กระเป๋าใบนี้ตอบโจทย์ให้คุณได้ วัสดุภายนอก ตกแต่งด้วย อุปกรณ์สีทอง ด้านหน้ามีโลโก้ Jai แบบแสตมป์จม มีกระเป๋าใส่ของด้านหลังเปิดปิดด้วยแม่เหล็ก ซิปสองทางสีทองอย่างดี วัสดุภายใน กระเป๋าติดซิปสีทองอย่างดี 2 ช่อง มีช่องสำหรับใส่มือถือและบัตรต่างๆ และใช้ซับในหนังกลับสีน้ำเงิน ขนาดของกระเป๋า สูง 23 ยาว 30 กว้าง 18 ซม.', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_Review` int(11) NOT NULL,
  `Comment` varchar(800) NOT NULL,
  `ratepoint` varchar(1) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id_Shipping` int(11) NOT NULL,
  `NameShipping` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id_Shipping`, `NameShipping`) VALUES
(2, 'Kerry'),
(1, 'Thailand Post');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id_store` int(11) NOT NULL,
  `NameStore` varchar(255) NOT NULL,
  `AvatarStore` varchar(50) NOT NULL,
  `AddressStore` varchar(255) NOT NULL,
  `TelStore` varchar(30) NOT NULL,
  `CityStore` varchar(100) NOT NULL,
  `StateStore` varchar(100) NOT NULL,
  `ZipStore` varchar(10) NOT NULL,
  `CountryStore` varchar(100) NOT NULL,
  `EmailStore` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `textStory` text NOT NULL,
  `nameAccountStore` varchar(50) NOT NULL,
  `numberStorebank` varchar(10) NOT NULL,
  `namebank` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id_store`, `NameStore`, `AvatarStore`, `AddressStore`, `TelStore`, `CityStore`, `StateStore`, `ZipStore`, `CountryStore`, `EmailStore`, `Password`, `textStory`, `nameAccountStore`, `numberStorebank`, `namebank`) VALUES
(1, 'ภูคราม', 'avatar/bhukram.jpg', '555/55 หมู่ 5 ชุมชน 555', '099-999-9999', 'ชุมชน', 'จังหวัด', '10000', 'ประเทศไทย', 'store@info.com', 'MD5(''1234'')', '<h3>“ภูคราม” ผ้าฝ้ายปักลวดลายธรรมชาติ</h3><p> เป็นผลิตประเภทสิ่งทอ งานหัตถกรรมทำมือ และส่วนใหญ่เป็นผลิตภัณฑ์จากธรรมชาติ โดยการใช้ครามธรรมชาติ และใช้ฝ้ายทอมือเป็นหลัก โดยได้ทำงานกับกลุ่มชาวบ้าน ตำบลโคกภู จังหวัดสกลนคร กลุ่มเล็กๆ ที่ใช้เวลาว่างมาทอผ้า การทอผ้าใช้อารมณ์ทอแบบสบายๆ ไม่เครียด ถ้าหากเครียดจะไม่ทำ ดังนั้นผ้าของกลุ่มผู้ครามจะเป็นผ้าที่ถักทอขึ้นด้วยความสุข</p><h3>แรงบันดาลใจ (Inspiration)</h3><p>เริ่มจากประสบการณ์การทำงานที่ผ่านมาล้วนทำงานในส่วนของชุมชนมีการกระตุ้นและพัฒนาชุมชนอื่นๆ ทำให้อยากกลับมาทำที่ชุมชนของบ้านเกิดตนเอง ซึ่งมีการพัฒนาน้อย ประจวบเหมาะกับป้ากลุ่มเล็กในชุมชนมีการกลับมาทอผ้า โดยไม่มีใครมาสนับสนุน ไม่มีตลาด จึงได้เริ่มเข้าไปหาตลาดให้ ขายให้ และทำให้เรามีรายได้อีกส่วนนึงด้วย หลังจากนั้นได้มาศึกษาการทำผ้าฝ้ายย้อมคราม ทำให้เห็นขั้นตอนทั้งหมดในการที่มีขั้นตอนการทำที่ยากและมีหลายขั้นตอน ต้นทุนต่างๆไม่สัมพันธ์กับราคาจึงอยากเป็นส่วนในการช่วยเหลือ รวมทั้งหากกลุ่มนี้เริ่มต้นได้ดี ก็อยากขยายไปสู่ชุมชนอื่นๆมีภาวะเช่นเดียวกัน</p><h3>สู่การเปลี่ยนแปลง (Social Impact)</h3><li>สร้างอาชีพและเพิ่มรายได้ภายในครอบครัวแก่คนในชุมชน</li><li>เป็นการรื้อฟื้นและอนุรักษ์วิถีดั่งเดิม เช่น การทอผ้า เลี้ยงคราม ปลูกฝ้าย ปลูกคราม เป็นต้น</li><li>ลดการเดินทางขายแรงงานในเมืองหลวง</li><li>พัฒนาคุณภาพชีวิตของคนในชุมชน</li> <li>เกิดการรวมกลุ่มของคนในชุมชน มีการแลกเปลี่ยน นำไปสู่แนวทางพัฒนาคุณภาพชีวิตด้วยตัวเอง</li><li>ชาวบ้านได้มีโอกาสในการใช้ความคิดสร้างสรรค์ระหว่างการทำงาน</li><li>สร้างอาชีพให้แก่กลุ่มคนรุ่นใหม่</li>', 'ภูคราม', '0000000000', 'krungthai');

-- --------------------------------------------------------

--
-- Table structure for table `store_product_shipment`
--

CREATE TABLE `store_product_shipment` (
  `id_shipment` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `Status` varchar(1) NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_shipping` int(11) DEFAULT NULL,
  `ShipCode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subemail`
--

CREATE TABLE `subemail` (
  `id_subemail` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typeproduct`
--

CREATE TABLE `typeproduct` (
  `id_typeProduct` int(11) NOT NULL,
  `nameTypeProduct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeproduct`
--

INSERT INTO `typeproduct` (`id_typeProduct`, `nameTypeProduct`) VALUES
(2, 'กางเกง'),
(4, 'ของฝาก'),
(5, 'ผ้าพันคอ'),
(6, 'อื่นๆ'),
(3, 'เครื่องประดับ'),
(1, 'เสื้อผ้า');

-- --------------------------------------------------------

--
-- Table structure for table `user_member`
--

CREATE TABLE `user_member` (
  `id_user` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tel` varchar(30) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_member`
--

INSERT INTO `user_member` (`id_user`, `Name`, `LastName`, `Email`, `Tel`, `Address`, `City`, `State`, `Country`, `Zip`, `Password`) VALUES
(1, 'Admin', 'Fumin', 'Luxor@info.com', '099-999-9999', '555/55 หมู่ 5 หมู่บ้าน 555 ตำบล รารา ', 'เมือง', 'กรุงเทพ', 'ประเทศไทย', '10000', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminluxor`
--
ALTER TABLE `adminluxor`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `codepromotion`
--
ALTER TABLE `codepromotion`
  ADD PRIMARY KEY (`id_Code`),
  ADD UNIQUE KEY `CodePromotion` (`CodePromotion`);

--
-- Indexes for table `favoruite`
--
ALTER TABLE `favoruite`
  ADD PRIMARY KEY (`id_Favoruite`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `formregisterstore`
--
ALTER TABLE `formregisterstore`
  ADD PRIMARY KEY (`id_formRegisterStore`),
  ADD UNIQUE KEY `NameStore` (`NameStore`),
  ADD UNIQUE KEY `EmailStore` (`EmailStore`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `hotproduct`
--
ALTER TABLE `hotproduct`
  ADD PRIMARY KEY (`id_hotproduct`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `imgproduct`
--
ALTER TABLE `imgproduct`
  ADD PRIMARY KEY (`id_imgProduct`);

--
-- Indexes for table `imgproductdetail`
--
ALTER TABLE `imgproductdetail`
  ADD PRIMARY KEY (`id_imgProductDetail`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_imgProduct` (`id_imgProduct`);

--
-- Indexes for table `orderproductdetail`
--
ALTER TABLE `orderproductdetail`
  ADD PRIMARY KEY (`id_orderDetail`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_code` (`id_code`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_store` (`id_store`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_Review`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id_Shipping`),
  ADD UNIQUE KEY `NameShipping` (`NameShipping`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id_store`),
  ADD UNIQUE KEY `NameStore` (`NameStore`),
  ADD UNIQUE KEY `EmailStore` (`EmailStore`);

--
-- Indexes for table `store_product_shipment`
--
ALTER TABLE `store_product_shipment`
  ADD PRIMARY KEY (`id_shipment`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_shipping` (`id_shipping`),
  ADD KEY `id_payment` (`id_payment`),
  ADD KEY `id_store` (`id_store`);

--
-- Indexes for table `subemail`
--
ALTER TABLE `subemail`
  ADD PRIMARY KEY (`id_subemail`);

--
-- Indexes for table `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`id_typeProduct`),
  ADD UNIQUE KEY `nameTypeProduct` (`nameTypeProduct`);

--
-- Indexes for table `user_member`
--
ALTER TABLE `user_member`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminluxor`
--
ALTER TABLE `adminluxor`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `codepromotion`
--
ALTER TABLE `codepromotion`
  MODIFY `id_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `favoruite`
--
ALTER TABLE `favoruite`
  MODIFY `id_Favoruite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `formregisterstore`
--
ALTER TABLE `formregisterstore`
  MODIFY `id_formRegisterStore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotproduct`
--
ALTER TABLE `hotproduct`
  MODIFY `id_hotproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `imgproduct`
--
ALTER TABLE `imgproduct`
  MODIFY `id_imgProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `imgproductdetail`
--
ALTER TABLE `imgproductdetail`
  MODIFY `id_imgProductDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orderproductdetail`
--
ALTER TABLE `orderproductdetail`
  MODIFY `id_orderDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_Review` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id_Shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id_store` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_product_shipment`
--
ALTER TABLE `store_product_shipment`
  MODIFY `id_shipment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subemail`
--
ALTER TABLE `subemail`
  MODIFY `id_subemail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `id_typeProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_member`
--
ALTER TABLE `user_member`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `favoruite`
--
ALTER TABLE `favoruite`
  ADD CONSTRAINT `favoruite_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `favoruite_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_member` (`id_user`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_member` (`id_user`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_product` (`id_order`);

--
-- Constraints for table `hotproduct`
--
ALTER TABLE `hotproduct`
  ADD CONSTRAINT `hotproduct_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `imgproductdetail`
--
ALTER TABLE `imgproductdetail`
  ADD CONSTRAINT `imgproductdetail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `imgproductdetail_ibfk_2` FOREIGN KEY (`id_imgProduct`) REFERENCES `imgproduct` (`id_imgProduct`);

--
-- Constraints for table `orderproductdetail`
--
ALTER TABLE `orderproductdetail`
  ADD CONSTRAINT `orderproductdetail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `orderproductdetail_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_product` (`id_order`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_member` (`id_user`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_code`) REFERENCES `codepromotion` (`id_Code`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `typeproduct` (`id_typeProduct`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_member` (`id_user`);

--
-- Constraints for table `store_product_shipment`
--
ALTER TABLE `store_product_shipment`
  ADD CONSTRAINT `store_product_shipment_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_product` (`id_order`),
  ADD CONSTRAINT `store_product_shipment_ibfk_2` FOREIGN KEY (`id_shipping`) REFERENCES `shipping` (`id_Shipping`),
  ADD CONSTRAINT `store_product_shipment_ibfk_3` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`),
  ADD CONSTRAINT `store_product_shipment_ibfk_4` FOREIGN KEY (`id_store`) REFERENCES `store` (`id_store`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
