-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2015 at 08:32 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dadiproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img`) VALUES
(5, 'galleryImages/m_54e31f734da99.jpg'),
(8, 'galleryImages/m_54e33510ed8a2.jpg'),
(11, 'galleryImages/m_54e33527a7a2e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(2, 'اجتماعی'),
(3, 'اقتصادی'),
(4, 'فرهنگی'),
(5, 'هنری'),
(6, 'مقالات'),
(7, 'سیاسی');

-- --------------------------------------------------------

--
-- Table structure for table `marquee`
--

CREATE TABLE IF NOT EXISTS `marquee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `textmarquee` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `marquee`
--

INSERT INTO `marquee` (`id`, `textmarquee`) VALUES
(4, ' علی ابن ابیطالب : سخنان شما سنگهای سخت را نرم می کند'),
(5, ' علی ابن ابیطالب : دعوت کننده ای که فاقد عمل باشد مانند تیر اندازی است که کمان او زه ندارد'),
(6, ' علی ابن ابیطالب : حاجت محتاج را به تاخیر نینداز زیرا نمی دانی از اینکه فردا برای تو چه پیش خواهد آمد'),
(7, ' علی ابن ابیطالب : علم خویش را به جهل و یقین خود را به شک مبدل نکنید، آنگاه که به علم رسیدید عمل کنید و آنگاه که به یقین دست یافتید ،اقدام نمایید.'),
(8, ' علی ابن ابیطالب : برای مردم آن را بخواه که برای خود می خواهی و با دیگران طوری رفتار کن که مایلی درباره ات آنچنان کنند\r\n'),
(9, ' علی ابن ابیطالب : آدمی به گفتارش سنجیده می شود و به رفتارش ارزیابی می گردد، چیزی بگو که کفه سخنت سنگین شود و کاری کن که قیمت رفتارت بالا رود');

-- --------------------------------------------------------

--
-- Table structure for table `newsdadi`
--

CREATE TABLE IF NOT EXISTS `newsdadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `perfectnews` varchar(500) NOT NULL,
  `groupid` int(11) NOT NULL,
  `history` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `smallImage` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `newsdadi`
--

INSERT INTO `newsdadi` (`id`, `title`, `text`, `perfectnews`, `groupid`, `history`, `image`, `smallImage`) VALUES
(40, 'gggggggg', '\r\n           wqeqwe     ', '\r\n            wewqeqw', 2, '2015-02-11', 'newsImage/40/Chrysanthemum.jpg', ''),
(41, 'ddddddddd', '\r\n                sgdhjasd', '\r\n            asdghjasdgjhsa', 3, '2015-02-11', 'newsImage/41/Koala.jpg', ''),
(42, 'ddddddddd', '\r\n                vghfgh', 'hjghgjh\r\n            ', 2, '2015-02-11', '', ''),
(43, 'ddddddddd', '\r\n                asdas', 'dsfsdfs\r\n            ', 2, '2015-02-11', 'newsImage/43/Hydrangeas.jpg', 'newsImage/43/thumb/Hydrangeas.jpg'),
(44, 'fdyhdf', '\r\n dhkkhk;lkh;lk mgdln;kdj gfjfgj', '\r\n  mari.ghobadi          ', 4, '2015-02-12', 'newsImage/44/Penguins.jpg', 'newsImage/44/thumb/Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE IF NOT EXISTS `opinion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idnews` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `nazar` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `statuse` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `opinion`
--

INSERT INTO `opinion` (`id`, `idnews`, `name`, `nazar`, `email`, `statuse`) VALUES
(1, 2, 'maryam', ' sjflkshfhسایت بسیار خوبی است', 'mari.ghobadi@gmail.com', 'false'),
(2, 2, 'یبلی', ' غهغفققغغغغغغغغغغغغغغغغغغغ', 'بتل', 'false'),
(3, 3, 'mari', ' sssssssssssssssssssssssssss', 'mari.ghobadi@gmail.com', 'false'),
(4, 4, 'tdhtdhdth', ' bbbbbbbbbbbbbbbbbbbbbbbbbb', 'mari.ghobadi@gmail.com', 'false'),
(5, 5, 'مریم', ' خبر بسیار خوبی بود', 'قبادی زاده', 'false'),
(6, 5, 'ماری', ' سایت خوبی دارید', 'mari.ghobadi@gmail.com', 'false'),
(7, 5, 'سجاد', ' خبر خوبی بود', 'mari.ghobadi@gmail.com', 'false'),
(9, 6, 'ناشناس ', ' منتر خبر های بعدی هستیم', 'mari.ghobadi@gmail.com', 'false'),
(10, 7, 'سعید33', ' سایت زیبایییددارید', 'mari.ghobadi@gmail.com', 'false'),
(11, 5, 'kkk', 'سایت خوبی است', 'mari.ghobadi@gmail.com', 'false'),
(12, 5, 'سعید33', 'عاللللللللللللییییییییییییی بود', 'saji.ghobadi@gmail.com', 'false'),
(13, 5, 'retwt', 'eryery', 'rtert', 'false'),
(14, 7, 'ali132', 'خبر تاسفم برانگیزی بود ', 'jkjkjk', 'false'),
(15, 7, 'm', ' خبر خبر', 'mari.ghobadi@gmail.com', 'false'),
(16, 7, 'm', ' خبر خبر', 'mari.ghobadi@gmail.com', 'true'),
(17, 7, 'm', ' خبر خبر', 'mari.ghobadi@gmail.com', '1'),
(18, 7, 'نام', ' متن', 'ایمیل', '1'),
(19, 7, 'نی', ' ماینسشی', 'همبمام', '1'),
(20, 7, 'ییی', ' یییییییییییشستنیا', 'یییییییی', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `sabtenam`
--

CREATE TABLE IF NOT EXISTS `sabtenam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `gender` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sabtenam`
--

INSERT INTO `sabtenam` (`id`, `name`, `username`, `password`, `mail`, `gender`, `level`) VALUES
(1, 'mari', 'ghobadi', 'mari123', 'mari.ghobadi@gmail.com', 0, 2),
(2, 'mm', 'mari', 'ghobadi', 'mari.ghobadi@gmail.com', 0, 2),
(3, 'sajad', 'saji', 'ghobadi', 'sajad.ghobadi@yahoo.com', 0, 2),
(4, 'سوسن', 'ss', '387', 'mari.ghobadi@gmail.com', 0, 2),
(5, 'nm', 'kk', 'fffffffff', 'mari.ghobadi@gmail.com', 0, 2),
(6, 'dfgdf', 'trrrrrrrrr', 'tttttttttttt', 'mari.ghobadi@gmail.com', 3, 2),
(7, 'nini', 'ninaz', 'nn', 'mari.ghobadi@gmail.com', 4, 1),
(8, 'fsdf', 'dfs', 'd', 'dg', 3, 2),
(9, 'ddb', 'khgf', 'rt', 'tj', 3, 1),
(10, 'g', 'mgmm', 'hgg', 'mari.ghobadi@gmail.com', 4, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
