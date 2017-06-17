-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 09:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcijcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `text`) VALUES
(1, 'add'),
(2, 'edit own'),
(3, 'edit all'),
(4, 'delete own'),
(5, 'delete all');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pubdate` date DEFAULT NULL,
  `body` text NOT NULL,
  `summary` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` date NOT NULL,
  `pre_head` text NOT NULL,
  `post_head` text,
  `publishing_date` datetime NOT NULL,
  `tagline` text NOT NULL,
  `general_notes` text NOT NULL,
  `series_indicator` varchar(10) NOT NULL,
  `ireport_indicator` varchar(10) NOT NULL,
  `subjects` varchar(30) NOT NULL,
  `index_num` text,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `pubdate`, `body`, `summary`, `created`, `modified`, `pre_head`, `post_head`, `publishing_date`, `tagline`, `general_notes`, `series_indicator`, `ireport_indicator`, `subjects`, `index_num`, `status`) VALUES
(1, 'Duterte on Drugs', 'Duterte-on-Drugs', '2016-11-28', '<p>&amp;lt;p&amp;gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit sem leo, gravida tempus ex facilisis eu. Ut vehicula mauris placerat, fermentum orci in, facilisis turpis. Pellentesque congue, purus non posuere vulputate, nunc ipsum finibus ligula, convallis rhoncus neque massa sed felis. Nunc accumsan sit amet sapien in fermentum. Nulla molestie quam eget leo accumsan, at gravida metus molestie. Curabitur euismod sapien eu arcu feugiat mattis. Praesent nisi est, eleifend quis sem a, laoreet luctus diam. Phasellus sed hendrerit arcu. Phasellus volutpat neque sit amet ligula molestie, eu volutpat diam egestas.&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;Praesent tincidunt, sapien at pharetra consectetur, augue est pretium ligula, eu sagittis nisi elit eu velit. Vivamus id semper diam. Fusce nisi lectus, faucibus at ex et, dignissim ullamcorper nunc. Nullam euismod augue quis purus euismod, non aliquam dolor aliquet. Proin placerat, erat non laoreet viverra, augue purus finibus turpis, et elementum leo nisi eget leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla ipsum est, vulputate nec eros nec, maximus vulputate turpis. Aenean in dolor in mi tincidunt blandit et eu sapien. Duis tempor sed dolor id molestie. Quisque commodo ipsum a neque porttitor fringilla. Mauris rhoncus in leo quis tempor. Suspendisse mollis cursus ligula in interdum.&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;Sed sit amet sem sagittis, interdum nulla at, pharetra ligula. Mauris ut euismod diam, nec feugiat ipsum. Donec orci diam, commodo et sapien ut, pellentesque commodo lacus. Proin ac lacus enim. Nunc non tristique eros. Nam consectetur, velit nec porta malesuada, risus sem condimentum ligula, vel molestie ex velit id nisi. Nam vitae facilisis dui. Quisque nec gravida justo. In sodales condimentum metus id malesuada. Donec eget ante non ex aliquet maximus. Suspendisse imperdiet vulputate felis, non viverra lectus pellentesque at. In hac habitasse platea dictumst. Mauris id turpis vitae leo ullamcorper scelerisque.&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;Sed rhoncus ligula sed purus dapibus sollicitudin. Proin consectetur fermentum neque, vel viverra tellus vehicula nec. Nullam ut sodales turpis. Sed ante libero, eleifend eget consequat at, tempor in orci. Vivamus a convallis odio. Cras ut porttitor massa. Phasellus quis diam et ligula finibus faucibus.&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Maecenas sed neque massa. Nam sodales blandit lobortis. Duis bibendum dictum convallis. Fusce aliquam tincidunt nibh, ut aliquam enim aliquam eu. Sed semper, est se&amp;lt;/strong&amp;gt;d consequat convallis, libero ligula tincidunt magna, eget euismod orci velit non ex. Quisque quis magna nunc. Nam congue, sem sit amet tristique efficitur, sem mi tempus erat, at auctor erat magna vel lectus. Aenean fermentum odio non nisl ornare efficitur. Sed quis tempus nulla. Ut eget nisi nulla. Morbi nulla neque, tristique eget blandit a, tempor eu nibh. Donec viverra est risus, id pulvinar nulla facilisis sit amet. Vestibulum porta enim erat, ut aliquam tellus auctor a.&amp;lt;/p&amp;gt;</p>', '<p>Drugs. Drugs. Drugs.</p>', '2016-11-27 16:27:56', '2017-03-26', 'Duterte war', 'on drugs', '0000-00-00 00:00:00', '1', '<p>this is a note</p>\r\n', '1', '1', '1', '0', 0),
(2, 'This another news', 'This-another-news', '2016-12-15', '<p>SINGAPORE &ndash; Philippine President Rodrigo Duterte and Singaporean Prime Minister Lee Hsien Loong agreed that their governments should help each other fight terrorism, drugs, and transnational crime. Foreign Secretary Perfecto Yasay Jr, in a video message to reporters, said these were among the major topics discussed during the expanded bilateral meeting between the two leaders and their ministers on Thursday, December 15. &quot;We talked a lot about the areas of mutual cooperation, particularly in the field of the fight against terrorism, the fight against illegal drugs, these are basic things we both agreed to pursue. And also in the area of cooperation, we expect to secure our borders from transnational crimes,&quot; said Yasay on Thursday from Istana where the meeting took place. This is a sample file yes.</p>', '<p>I dunno english. What is that</p>', '2016-12-15 17:19:43', '2017-03-26', '', '', '0000-00-00 00:00:00', '1', '<p>hey</p>\r\n', '', '', '1', '0', 0),
(3, 'Third news', 'Third-news', '2016-12-15', '<p>Aside from seeking help with combating terrorism and drugs, Duterte sought to get to know Singapore&amp;#39;s leaders. &quot;This trip was basically intended for the President to get to know our Asian leaders and to relate with them especially so because we are having our ASEAN (Association of Southeast Asian Nations) chairmanship next year,&quot; Yasay said.</p>', '<p>This is quite a lot of news, isn&#39;t it?</p>', '2016-12-15 17:28:57', '2017-03-26', '', '', '0000-00-00 00:00:00', '3', '', '', '', '1', '0', 0),
(4, 'Another news', 'Another-news', '2016-12-16', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>Here&#39;s some news for you.</p>', '2016-12-16 15:49:27', '2017-03-26', '', '', '0000-00-00 00:00:00', '1', '<p>This is also a note.</p>\r\n', '', '', '1', '0', 0),
(5, 'news again', 'news-again', '2016-12-16', '<p>Lorem Ipsum&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. This intends to be in a page breaker.</p>', '<p>This is the news. Again.</p>', '2016-12-16 15:49:54', '2017-04-13', '', '', '0000-00-00 00:00:00', '1', '<p>This is a new note With indention and all</p>\r\n', '', '', '1', '0', 2),
(6, 'Jane\'s Article', 'janes-article', '2017-02-02', '<p>This is Jane&amp;#39;s Article.</p>', '<p>This is wonderful&nbsp;information.</p>', '2017-02-02 14:15:22', '2017-04-13', '', '', '0000-00-00 00:00:00', '1', '<p>Some Notes.</p>\r\n', '', '', '1', '0', 2),
(7, 'Agnes\' Article', 'Agnes-Article', '2017-02-02', '<p>This is Jane&#39;s Article.</p>', '<p>This is really cool information.</p>', '2017-02-02 15:07:57', '2017-03-26', '', '', '0000-00-00 00:00:00', '1', '<p>Some Notes</p>\r\n', '', '', '1', '0', 0),
(8, 'John\'s Article', 'Johns-Article', '2017-02-02', '<p>This is Jane&amp;#39;s Article.</p>', '<p>This is super amazing information.</p>', '2017-02-02 15:08:20', '2017-04-13', '', '', '0000-00-00 00:00:00', '1', '', '', '', '1', '0', 2),
(9, 'asd', 'asd', '2017-04-13', '<p>asd</p>', '<p>asd</p>', '2017-04-13 08:15:11', '2017-04-15', '', '', '0000-00-00 00:00:00', '1', '', '', '', '1', '0', 1),
(10, 'series test', 'series-test', '2017-04-15', '<p>a</p>', '<p>a</p>', '2017-04-15 11:07:43', '2017-04-15', '', '', '0000-00-00 00:00:00', '1', '', '', '', '1', '0', 2),
(11, 'pub test', 'pub-test', '2017-04-15', '<p>a</p>', 'a', '2017-04-15 11:25:21', '2017-04-29', '', '', '0000-00-00 00:00:00', '2', 'a\r\n', '', '', '1', '0', 2),
(14, 'yes', 'fourth-pub', '2017-04-18', '<p>a</p>', 'a', '2017-04-15 11:31:20', '2017-06-09', 'this is a prehead', NULL, '0000-00-00 00:00:00', '1', '', '', '', '1', '0', 2),
(15, 'Nice', 'Nice', '2017-06-06', '<p>Hey</p>\r\n\r\n<p><img alt=\"\" src=\"http://[::1]/pcij-cms/pcij/uploads/13_B_1.jpg\" style=\"height:60px; width:116px\" /></p>', 'This is a summary of this article.', '2017-06-08 14:15:24', '2017-06-09', 'nice', NULL, '0000-00-00 00:00:00', '3', '', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `author_article`
--

CREATE TABLE `author_article` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author_article`
--

INSERT INTO `author_article` (`id`, `author_id`, `article_slug`) VALUES
(102, 4, 'Agness-Article'),
(123, 4, 'Agnes-Article'),
(127, 3, 'Another-news'),
(128, 1, 'Third-news'),
(129, 3, 'This-another-news'),
(130, 1, 'This-another-news'),
(131, 3, 'Duterte-on-Drugs'),
(132, 1, 'Duterte-on-Drugs'),
(140, 6, 'Johns-Article'),
(141, 3, 'news-again'),
(142, 6, 'janes-article'),
(143, 5, 'janes-article'),
(147, 5, 'asd'),
(150, 1, 'second-pub-test'),
(151, 1, 'series-test'),
(170, 5, 'fourth-pub'),
(174, 6, 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `author_blog`
--

CREATE TABLE `author_blog` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `blog_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author_blog`
--

INSERT INTO `author_blog` (`id`, `author_id`, `blog_slug`) VALUES
(64, 3, 'Duterte-on-Drugs'),
(65, 1, 'Duterte-on-Drugs'),
(71, 1, 'Third-news'),
(77, 3, 'Another-news'),
(83, 3, 'This-another-news'),
(84, 1, 'This-another-news'),
(96, 3, 'news-again'),
(99, 6, 'janes-article'),
(100, 5, 'janes-article'),
(101, 6, 'Johns-Article'),
(102, 4, 'Agness-Article'),
(103, 4, 'Agnes-Article'),
(104, 6, 'Johns-Blog'),
(105, 4, 'Agnes-Blog'),
(106, 6, 'Janes-Blog'),
(107, 5, 'Janes-Blog'),
(115, 6, 'This-is-a-Blog'),
(122, 3, 'About-Blogging'),
(127, 4, 'Bacon'),
(137, 6, 'Gouda'),
(138, 5, 'Gouda'),
(139, 6, 'This-is-a-Food-Blog');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `summary` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` date NOT NULL,
  `pre_head` text NOT NULL,
  `post_head` text,
  `publishing_date` datetime NOT NULL,
  `tagline` text NOT NULL,
  `general_notes` text NOT NULL,
  `series_indicator` varchar(10) NOT NULL,
  `ireport_indicator` varchar(10) NOT NULL,
  `subjects` varchar(30) NOT NULL,
  `index_num` text,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `pubdate`, `body`, `summary`, `created`, `modified`, `pre_head`, `post_head`, `publishing_date`, `tagline`, `general_notes`, `series_indicator`, `ireport_indicator`, `subjects`, `index_num`, `status`) VALUES
(5, 'About Blogging', 'About-Blogging', '2016-12-16', '<p>Lorem Ipsum&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. This intends to be in a page breaker.</p>', '<p>Can you blog blog blog like me?</p>', '2016-12-16 15:49:54', '2017-03-26', '', '', '0000-00-00 00:00:00', '1', '<p>This is a new note With indention and all</p>\r\n', '', '', '1', '0', 0),
(6, 'Gouda', 'Gouda', '2017-02-02', '<p>Everyone loves melted cheese cheddar. Pepper jack fondue gouda croque monsieur cheese triangles dolcelatte cheddar camembert de normandie. Gouda bocconcini bocconcini roquefort cottage cheese pepper jack camembert de normandie lancashire. Cheese slices taleggio ricotta.Chee</p>', 'Gotta love mah cheese.', '2017-02-02 14:15:22', '2017-06-08', '', NULL, '0000-00-00 00:00:00', '1', 'Some Notes.\r\n', '', '', '1', NULL, 1),
(7, 'Bacon', 'Bacon', '2017-02-02', '<p>Bacon ipsum dolor amet pork frankfurter biltong, cow chicken bresaola burgdoggen kielbasa capicola ball tip pork loin. Jerky filet mignon spare ribs, venison rump cow boudin doner beef ribs ribeye t-bone. Pancetta ham hock biltong chicken pig. Corned beef cow kevin chicken ham hock biltong boudin short ribs shank picanha. Leberkas meatball t-bone porchetta. Picanha flank ham hock, beef ribs ham drumstick frankfurter jowl ball tip tenderloin ribeye salami venison kielbasa. Tongue landjaeger jerky rump tri-tip corned beef cupim shoulder tail shankle.</p>', 'Bacon is life.', '2017-02-02 15:07:57', '2017-05-19', '', '', '0000-00-00 00:00:00', '1', 'Some Notes\r\n', '', '', '1', '0', 0),
(8, 'This is a Food Blog', 'This-is-a-Food-Blog', '2017-02-02', '<p>Macaroon donut sweet macaroon pie donut. Chupa chups jelly-o macaroon macaroon macaroon. Lemon drops biscuit pudding fruitcake caramels. Biscuit muffin cheesecake. Cupcake lemon drops sugar plum biscuit apple pie cake chocolate cake marzipan fruitcake. Bear claw cheesecake fruitcake sesame snaps cotton candy jelly. Cotton candy cookie sweet sweet gummi bears wafer bonbon danish danish. Fruitcake bear claw apple pie sweet roll icing cotton candy cake muffin. Pastry apple pie sweet roll jelly cupcake. Jujubes ice cream toffee liquorice toffee sweet cheesecake pie jelly. Tart halvah cake candy canes. Carrot cake chocolate jujubes oat cake toffee tart. Biscuit powder jelly beans. Sesame snaps danish icing powder jelly beans sweet brownie drag&eacute;e.</p>', 'What is your favorite sweets?', '2017-02-02 15:08:20', '2017-06-08', '', NULL, '0000-00-00 00:00:00', '1', 'Some Notes\r\n', '', '', '1', NULL, 0),
(9, 'Gouda', 'Gouda', '2017-02-02', '<p>Everyone loves melted cheese cheddar. Pepper jack fondue gouda croque monsieur cheese triangles dolcelatte cheddar camembert de normandie. Gouda bocconcini bocconcini roquefort cottage cheese pepper jack camembert de normandie lancashire. Cheese slices taleggio ricotta.Chee</p>', 'Gotta love mah cheese.', '2017-06-08 14:35:10', '2017-06-08', '', NULL, '0000-00-00 00:00:00', '1', 'Some Notes.\r\n', '', '', '', NULL, 1),
(10, 'Gouda', 'Gouda', '2017-02-02', '<p>Everyone loves melted cheese cheddar. Pepper jack fondue gouda croque monsieur cheese triangles dolcelatte cheddar camembert de normandie. Gouda bocconcini bocconcini roquefort cottage cheese pepper jack camembert de normandie lancashire. Cheese slices taleggio ricotta.Chee</p>', 'Gotta love mah cheese.', '2017-06-08 14:35:30', '2017-06-08', '', NULL, '0000-00-00 00:00:00', '1', 'Some Notes.\r\n', '', '', '', NULL, 1),
(11, 'Gouda', 'Gouda', '2017-02-02', '<p>Everyone loves melted cheese cheddar. Pepper jack fondue gouda croque monsieur cheese triangles dolcelatte cheddar camembert de normandie. Gouda bocconcini bocconcini roquefort cottage cheese pepper jack camembert de normandie lancashire. Cheese slices taleggio ricotta.Chee</p>', 'Gotta love mah cheese.', '2017-06-08 14:35:37', '2017-06-08', '', NULL, '0000-00-00 00:00:00', '1', 'Some Notes.\r\n', '', '', '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` text,
  `caption` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `title`, `caption`) VALUES
(3, 'Icon_BiodiverCity.jpg', '', ''),
(4, 'Icon_Ecomobile.jpg', '', ''),
(5, 'Icon_HHC.jpg', '', ''),
(6, 'Icon_LCC.jpg', '', ''),
(7, 'Icon_SustLocal.jpg', '', ''),
(8, '13_B_1.jpg', '', ''),
(9, '14_B_1.jpg', '', ''),
(10, '15_B_1_(1).jpg', '', ''),
(11, '7_B_1.jpg', '', ''),
(12, '3_B_1.jpg', '', ''),
(13, '6_B_1_(1).jpg', '', ''),
(14, '7_B_1_(1).jpg', '', ''),
(15, 'pexels-photo-395132.jpeg', '', ''),
(16, 'pexels-photo-220866.jpeg', '', ''),
(17, 'device-phone.png', '', ''),
(18, '49_B_1.jpg', NULL, NULL),
(19, '50_B_1.jpg', NULL, NULL),
(20, '49_B_11.jpg', NULL, NULL),
(21, '50_B_11.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_article`
--

CREATE TABLE `file_article` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_id` varchar(100) NOT NULL,
  `article_slug` varchar(100) NOT NULL,
  `title` text,
  `caption` text,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_article`
--

INSERT INTO `file_article` (`id`, `file_id`, `article_slug`, `title`, `caption`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, '5', 'Agnes-Article', NULL, NULL, '0000-00-00', NULL, NULL),
(26, '6', 'Johns-Article', NULL, NULL, '0000-00-00', NULL, NULL),
(27, '3', 'Johns-Article', NULL, NULL, '0000-00-00', NULL, NULL),
(28, '4', 'Johns-Article', NULL, NULL, '0000-00-00', NULL, NULL),
(29, '5', 'Johns-Article', NULL, NULL, '0000-00-00', NULL, NULL),
(30, '6', 'fourth-pub', 'Windmill', 'This is a windmill.', '2017-05-21', '2017-05-21', '2017-05-21'),
(31, '5', 'fourth-pub', 'Happy Face', 'This is a happy face.', '2017-05-21', '2017-06-09', NULL),
(32, '20', 'fourth-pub', '', '', '0000-00-00', '2017-06-09', NULL),
(33, '21', 'fourth-pub', NULL, NULL, '0000-00-00', NULL, '2017-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `file_blog`
--

CREATE TABLE `file_blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_id` varchar(100) NOT NULL,
  `blog_slug` varchar(100) NOT NULL,
  `title` text,
  `caption` text,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_blog`
--

INSERT INTO `file_blog` (`id`, `file_id`, `blog_slug`, `title`, `caption`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '5', 'This-is-a-Blog', '', '', '0000-00-00', NULL, NULL),
(4, '7', 'This-is-a-Blog', '', '', '0000-00-00', NULL, NULL),
(19, '7', 'Bacon', '', '', '0000-00-00', NULL, NULL),
(20, '3', 'Bacon', '', '', '0000-00-00', NULL, NULL),
(21, '5', 'Bacon', '', '', '0000-00-00', NULL, NULL),
(22, '7', 'This-is-a-Food-Blog', '', '', '0000-00-00', '2017-06-08', NULL),
(23, '5', 'This-is-a-Food-Blog', '', '', '0000-00-00', '2017-06-08', NULL),
(24, '17', 'This-is-a-Food-Blog', '', '', '0000-00-00', '2017-06-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(7);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`) VALUES
(1, 'article'),
(2, 'blog');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `body` text NOT NULL,
  `image_id` varchar(100) DEFAULT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT '0',
  `template` varchar(25) DEFAULT NULL,
  `author` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `order`, `body`, `image_id`, `parent_id`, `template`, `author`) VALUES
(1, 'Homepage', 'Homepage', 1, 'This is the homepage', NULL, 0, 'homepage', 'pczuniga'),
(2, 'Our History', 'about', 2, '<p>Makin&#39; your way in the world today takes everything you&#39;ve got. Takin&#39; a break from all your worries sure would help a lot. Why do we always come here? I guess well never know. &nbsp;Its like a kind of torture to have to watch the show. Doin&#39; it our way. There&#39;s nothing we wont try. Never heard the word impossible. This time there&#39;s no stopping us. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://[::1]/pcij-cms/pcij/uploads/pexels-photo-395132.jpeg\" style=\"height:200px; width:325px\" /></p>\r\n\r\n<p>I have always wanted to have a neighbor just like you. I&#39;ve always wanted to live in a neighborhood with you! Doin&#39; it our way. There&#39;s nothing we wont try. Never heard the word impossible. This time there&#39;s no stopping us. I have always wanted to have a neighbor just like you. I&#39;ve always wanted to live in a neighborhood with you! Wouldn&#39;t you like to get away? Sometimes you want to go where everybody knows your name. And they&#39;re always glad you came. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. And when the odds are against him and their dangers work to do. You bet your life Speed Racer he will see it through. Now were up in the big leagues getting&#39; our turn at bat? Got kind of tired packin&#39; and unpackin&#39; - town to town and up and down the dial. Well we&#39;re movin&#39; on up to the east side. To a deluxe apartment in the sky! Sunny Days sweepin&#39; the clouds away. On my way to where the air is sweet. Can you tell me how to get how to get to Sesame Street? Why do we always come here? I guess well never know. Its like a kind of torture to have to watch the show?</p>', '12', 0, 'about', 'pczuniga'),
(4, 'Contact Us', 'Contact-Us', 0, 'Contact us', NULL, 2, 'page', 'pczuniga'),
(5, 'News', 'News', 0, 'This is for news', NULL, 0, 'page', 'pczuniga'),
(6, 'news archive', 'news-archive', 0, 'This page will generate the news archive', NULL, 0, 'news_archive', 'pczuniga'),
(7, 'Blogs', 'blog-archive', 0, 'This is for Blogs', NULL, 0, 'blog_archive', 'pczuniga'),
(8, 'Story Landing', 'storylanding', 0, 'Story Landing Page.', NULL, 0, 'storylanding', 'pczuniga'),
(9, 'Training Page', 'training', 0, 'This is a training page.', NULL, 0, 'training', 'pczuniga'),
(10, 'Random', 'Random', 0, '<p>Random</p>', '16', 0, 'page', 'pczuniga'),
(12, 'New', 'New', 0, '<p>New</p>', '9', 0, 'page', 'pczuniga'),
(13, 'First', 'First', 0, '<p>hey</p>', '11', 0, 'page', 'pczuniga');

-- --------------------------------------------------------

--
-- Table structure for table `pages_elements`
--

CREATE TABLE `pages_elements` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` text,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_elements`
--

INSERT INTO `pages_elements` (`id`, `page_id`, `type`, `title`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 13, 'tab', 'sad', '<p>sad</p>\r\n', '0000-00-00', NULL, NULL),
(2, 13, 'tab', 'sad', '<p>sad</p>\r\n', '0000-00-00', NULL, NULL),
(3, 2, 'tab', 'Awards & Citations', '<p><strong>TITLE </strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p><strong>TITLE</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p><strong>TITLE</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &nbsp; &nbsp;</p>\r\n', '0000-00-00', '2017-06-09', NULL),
(4, 2, 'tab', 'Awards & Citations', '<p>TITLE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. TITLE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. TITLE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &nbsp; &nbsp;</p>\r\n', '0000-00-00', NULL, '2017-05-14'),
(5, 2, 'tab', 'Our Staff', '<p>This is our staff.&nbsp;</p>\r\n', '0000-00-00', '2017-06-09', NULL),
(6, 2, 'tab', 'Our Board of Trustees', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '0000-00-00', '2017-06-09', NULL),
(7, 2, 'tab', 'Books & Videos', '<p>TITLE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. TITLE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. TITLE Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. &nbsp; &nbsp;</p>\r\n', '0000-00-00', '2017-06-09', NULL),
(8, 10, 'tab', '', '', '0000-00-00', '2017-05-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `module_id`, `action_id`, `created`, `modified`) VALUES
(1, 1, 1, 1, '0000-00-00', '0000-00-00'),
(2, 2, 1, 1, '0000-00-00', '0000-00-00'),
(3, 3, 1, 1, '2017-02-25', '2017-02-25'),
(4, 3, 1, 2, '2017-02-25', '2017-02-25'),
(5, 2, 1, 2, '2017-02-25', '2017-02-25'),
(6, 1, 1, 2, '2017-02-25', '2017-02-25'),
(8, 2, 1, 3, '2017-02-25', '2017-02-25'),
(9, 1, 1, 3, '2017-02-25', '2017-02-25'),
(10, 3, 1, 4, '2017-02-25', '2017-02-25'),
(11, 2, 1, 4, '2017-02-25', '2017-02-25'),
(12, 1, 1, 4, '2017-02-25', '2017-02-25'),
(13, 2, 1, 5, '2017-02-25', '2017-02-25'),
(14, 1, 1, 5, '2017-02-25', '2017-02-25'),
(15, 1, 2, 5, '2017-03-26', '2017-03-26'),
(16, 1, 2, 3, '2017-03-26', '2017-03-26'),
(17, 1, 2, 1, '2017-03-26', '2017-03-26'),
(18, 3, 2, 1, '2017-04-13', '2017-04-13'),
(19, 3, 2, 2, '2017-04-13', '2017-04-13'),
(20, 3, 2, 4, '2017-04-13', '2017-04-13'),
(21, 2, 2, 5, '2017-04-13', '2017-04-13'),
(22, 2, 2, 4, '2017-04-13', '2017-04-13'),
(23, 2, 2, 3, '2017-04-13', '2017-04-13'),
(24, 2, 2, 2, '2017-04-13', '2017-04-13'),
(25, 2, 2, 1, '2017-04-13', '2017-04-13'),
(26, 5, 1, 2, '2017-05-19', '2017-05-19'),
(27, 5, 1, 4, '2017-05-19', '2017-05-19'),
(28, 5, 2, 2, '2017-05-19', '2017-05-19'),
(29, 5, 2, 4, '2017-05-19', '2017-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `description`, `created`, `modified`) VALUES
(1, 'admin', 'This role has access to everything.', '0000-00-00', '0000-00-00'),
(2, 'editor', 'This role can edit all existing articles and blogs.', '0000-00-00', '0000-00-00'),
(3, 'writer', 'This role can create their own article and blog.', '0000-00-00', '0000-00-00'),
(4, 'user', '<p>sample</p>', '2017-02-25', '2017-02-25'),
(5, 'data_staff', '<p>this is data staff</p>', '2017-05-19', '2017-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `title`, `author_id`, `created`) VALUES
(1, 'Duterte', 1, '2017-04-15'),
(2, 'Riptide', 1, '2017-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `series_article`
--

CREATE TABLE `series_article` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `article_slug` varchar(100) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series_article`
--

INSERT INTO `series_article` (`id`, `series_id`, `article_slug`, `rank`) VALUES
(2, 1, 'fourth-pub', 2),
(6, 1, 'Nice', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `text`) VALUES
(1, 'Environment'),
(2, 'Governance'),
(4, 'Justice'),
(5, 'Greatness'),
(6, 'Love');

-- --------------------------------------------------------

--
-- Table structure for table `subject_article`
--

CREATE TABLE `subject_article` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `article_slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_article`
--

INSERT INTO `subject_article` (`id`, `subject_id`, `article_slug`) VALUES
(16, 6, 'fourth-pub'),
(17, 4, 'fourth-pub');

-- --------------------------------------------------------

--
-- Table structure for table `subject_blog`
--

CREATE TABLE `subject_blog` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `blog_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_blog`
--

INSERT INTO `subject_blog` (`id`, `subject_id`, `blog_slug`) VALUES
(4, 2, 'Bacon');

-- --------------------------------------------------------

--
-- Table structure for table `tagline`
--

CREATE TABLE `tagline` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagline`
--

INSERT INTO `tagline` (`id`, `text`) VALUES
(1, 'PCIJ,'),
(2, 'With additional research by'),
(3, 'With additional reporting by'),
(4, 'With additional research and reporting by ');

-- --------------------------------------------------------

--
-- Table structure for table `tagline_author_article`
--

CREATE TABLE `tagline_author_article` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagline_author_article`
--

INSERT INTO `tagline_author_article` (`id`, `author_id`, `article_slug`) VALUES
(28, 5, 'Agness-Article'),
(48, 5, 'Agnes-Article'),
(52, 3, 'Another-news'),
(53, 1, 'Third-news'),
(54, 3, 'This-another-news'),
(59, 5, 'Johns-Article'),
(60, 3, 'news-again'),
(61, 1, 'news-again'),
(62, 5, 'janes-article'),
(63, 1, 'pub-test'),
(64, 3, 'Nice'),
(65, 1, 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `tagline_author_blog`
--

CREATE TABLE `tagline_author_blog` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `blog_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagline_author_blog`
--

INSERT INTO `tagline_author_blog` (`id`, `author_id`, `blog_slug`) VALUES
(6, 1, 'Third-news'),
(11, 3, 'Another-news'),
(16, 3, 'This-another-news'),
(23, 3, 'news-again'),
(24, 1, 'news-again'),
(26, 5, 'janes-article'),
(27, 5, 'Johns-Article'),
(28, 5, 'Agness-Article'),
(29, 5, 'Agnes-Article'),
(30, 5, 'Johns-Blog'),
(31, 5, 'Agnes-Blog'),
(32, 5, 'Janes-Blog'),
(40, 5, 'This-is-a-Blog'),
(46, 3, 'About-Blogging'),
(47, 1, 'About-Blogging'),
(51, 5, 'Bacon'),
(57, 5, 'Gouda'),
(58, 5, 'This-is-a-Food-Blog');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `text` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `text`) VALUES
(1, 'Duterte'),
(2, 'Drugs'),
(3, 'God'),
(4, 'Man'),
(5, 'Heart'),
(6, 'Singapore'),
(7, 'Life');

-- --------------------------------------------------------

--
-- Table structure for table `tag_article`
--

CREATE TABLE `tag_article` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `article_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_article`
--

INSERT INTO `tag_article` (`id`, `tag_id`, `article_slug`) VALUES
(164, 5, 'Agness-Article'),
(187, 7, 'Agnes-Article'),
(188, 3, 'Agnes-Article'),
(189, 5, 'Agnes-Article'),
(194, 1, 'Another-news'),
(195, 5, 'Third-news'),
(196, 3, 'Third-news'),
(197, 6, 'This-another-news'),
(198, 1, 'This-another-news'),
(199, 1, 'Duterte-on-Drugs'),
(200, 1, 'Duterte-on-Drugs'),
(206, 5, 'Johns-Article'),
(207, 4, 'news-again'),
(208, 1, 'news-again'),
(209, 7, 'janes-article'),
(210, 5, 'janes-article'),
(220, 1, 'fourth-pub');

-- --------------------------------------------------------

--
-- Table structure for table `tag_blog`
--

CREATE TABLE `tag_blog` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `blog_slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_blog`
--

INSERT INTO `tag_blog` (`id`, `tag_id`, `blog_slug`) VALUES
(125, 1, 'Duterte-on-Drugs'),
(126, 1, 'Duterte-on-Drugs'),
(136, 3, 'Third-news'),
(137, 5, 'Third-news'),
(144, 1, 'Another-news'),
(151, 6, 'This-another-news'),
(152, 1, 'This-another-news'),
(159, 4, 'news-again'),
(160, 1, 'news-again'),
(162, 5, 'janes-article'),
(163, 5, 'Johns-Article'),
(164, 5, 'Agness-Article'),
(165, 5, 'Agnes-Article'),
(166, 5, 'Johns-Blog'),
(167, 5, 'Agnes-Blog'),
(168, 5, 'Janes-Blog'),
(176, 5, 'This-is-a-Blog'),
(182, 4, 'About-Blogging'),
(183, 1, 'About-Blogging'),
(187, 5, 'Bacon'),
(193, 5, 'Gouda'),
(194, 5, 'This-is-a-Food-Blog');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `active` varchar(10) NOT NULL,
  `access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `middle_name`, `user_name`, `image`, `bio`, `active`, `access`) VALUES
(1, 'philip_zuniga@yahoo.com', '032085e40c6ae38ed302b99d7934ca41769c763cf8640505ba71e61b355c9796a8553cf1895a0cfd926f18b3fdcf819aa02a8ca004867a8112e89f1a61657d54', 'Philip Christian', 'Zuniga', 'Correa', 'pczuniga', 'duterte.jpg', '<p>This is a bio</p>', 'yes', 'admin'),
(3, 'roseannsale@gmail.com', '3230a4e4678471942b5d7e410251beda21f3439a8d8d8dadab2de72b7f26dc1b9ec31279c99a4ef329982295641d51c94adbf61820ec33dfe40c6cac19ad1b24', 'Rose Ann', 'Sale', 'Valdez', 'roseann', 'duterte.jpg', 'She is rose ann', 'yes', 'editor'),
(4, 'agnes_chrno11@yahoo.com', '032085e40c6ae38ed302b99d7934ca41769c763cf8640505ba71e61b355c9796a8553cf1895a0cfd926f18b3fdcf819aa02a8ca004867a8112e89f1a61657d54', 'Agnes', 'Jardeleza', '', 'ajardeleza', 'duterte.jpg', '<p>&lt;p&gt;This is Agnes\' bio.&lt;/p&gt;</p>', 'yes', 'editor'),
(5, 'janedoe@yahoo.com', '032085e40c6ae38ed302b99d7934ca41769c763cf8640505ba71e61b355c9796a8553cf1895a0cfd926f18b3fdcf819aa02a8ca004867a8112e89f1a61657d54', 'Jane', 'Doe', '', 'janedoe', 'duterte.jpg', 'This is Jane&#039;s Bio.', 'yes', 'data_staff'),
(6, 'johndoe@yahoo.com', '42a40159e2dafaa62d3f7d6d0c357d049eb85e6a9ea56a530c8d12700ffabb5c33ce5f2bcbdf216c27a4f70a94b8a39640ad8cafac4120ea13f32ad0a744974d', 'John', 'Doe', '', 'johndoe', 'duterte.jpg', '<p>&lt;p&gt;This is John\'s bio.&lt;/p&gt;</p>', 'yes', 'writer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `author_article`
--
ALTER TABLE `author_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_blog`
--
ALTER TABLE `author_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `file_article`
--
ALTER TABLE `file_article`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `file_blog`
--
ALTER TABLE `file_blog`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_elements`
--
ALTER TABLE `pages_elements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `series_article`
--
ALTER TABLE `series_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_article`
--
ALTER TABLE `subject_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subject_blog`
--
ALTER TABLE `subject_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagline`
--
ALTER TABLE `tagline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagline_author_article`
--
ALTER TABLE `tagline_author_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagline_author_blog`
--
ALTER TABLE `tagline_author_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_article`
--
ALTER TABLE `tag_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_blog`
--
ALTER TABLE `tag_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `author_article`
--
ALTER TABLE `author_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `author_blog`
--
ALTER TABLE `author_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `file_article`
--
ALTER TABLE `file_article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `file_blog`
--
ALTER TABLE `file_blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pages_elements`
--
ALTER TABLE `pages_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `series_article`
--
ALTER TABLE `series_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subject_article`
--
ALTER TABLE `subject_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subject_blog`
--
ALTER TABLE `subject_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tagline`
--
ALTER TABLE `tagline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tagline_author_article`
--
ALTER TABLE `tagline_author_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tagline_author_blog`
--
ALTER TABLE `tagline_author_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tag_article`
--
ALTER TABLE `tag_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT for table `tag_blog`
--
ALTER TABLE `tag_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
