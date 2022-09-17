-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2022 at 05:39 PM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u305376862_rony_cit_inbio`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_contents`
--

CREATE TABLE `banner_contents` (
  `id` int(11) NOT NULL,
  `sub_heading` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title_1` varchar(100) NOT NULL,
  `title_2` varchar(100) NOT NULL,
  `title_3` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner_contents`
--

INSERT INTO `banner_contents` (`id`, `sub_heading`, `name`, `title_1`, `title_2`, `title_3`, `description`) VALUES
(1, 'Hello', 'RH Rony', 'Web Designer', 'Web Developer', 'UX/UI Expert', 'Since starting my work path as a frontend designer about 4 years ago, I\'m doing great nowadays with my firm named IMBD Agency.');

-- --------------------------------------------------------

--
-- Table structure for table `banner_image`
--

CREATE TABLE `banner_image` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner_image`
--

INSERT INTO `banner_image` (`id`, `image`, `status`) VALUES
(1, 'banner-img-1.png', 1),
(3, 'banner-img-3.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `category`, `content`, `time`, `status`) VALUES
(1, 'Virtual Social Media Manager (VSMM) in Bangladesh', 'blog-1.jpg', 'Blog', '<p>First, let’s take a view on what Virtual Social Media Manager (VSMM) is, Virtual Social Media Manager (VSMM) is the brainchild of<a href=\"https://www.imbdagency.com/\"> IMBD Agency </a>to assist all social media services automatically and without interrupting your online marketing hassle.</p><p>Actually, it’s a ‘Well-Arranged’ platform where you get all your business peripherals controlled by a third party organization or you can say; a supportive company in a very defined way. From the concept of symbiosis, a supportive company or organization gives their effort to boost up the business of their client’s company. In order to do so, they apply some marketing policies using our regular social media platforms. This is the theme of Virtual Social Media Manager (VSMM).</p><h4>Is Virtual Social Media Manager (VSMM) an innovation?</h4><p>Well, now you are thinking about the existence of these types of business facilities from a very past. Yes, it’s true! But one thing is, in past times these facilities were not so much defined, and they were scattered, even still are! Since a Digital Marketing company named<a href=\"https://www.imbdagency.com/\"> IMBD Agency</a> from Bangladesh tried to figure out how these types of business support can be modified and arranged in a helpful procedure, the concept of VSMM was born. This took them about 3 years to do several related research and development to shape the VSMM, and still, they are working to make it more user friendly. So, we should say, it’s an excellent evolution rather than an innovation.</p><h4>How Virtual Social Media Manager (VSMM) works:</h4><p>Let’s take an example. Suppose you are an Owner or Chief Executive Officer of a newly established hair oil company. For selling your product you need marketing. You will have to think about a proper advertisement that copes with your budget. Besides, you just need to ensure good maintenance of your company as well as the employees while the other business strategies and factors are still there. To grow your business you don’t have any chance to get all these messy! In this case, it’s quite tough to maintain your marketing properly. Also, there are many sections such as advertisement design, platforms where to be advertised, types of campaigns, audience targeting, etc. Who will take care of all of these? Here comes the dependency on such an optimized system that can run your product campaign efficiently. Virtual Social Media Manager is a service where you can overcome the above marketing challenges.</p><p>VSMM targets social media platforms where your marketing should be done. Then with your collaboration the VSMM service provider company sketches out the marketing strategy for you.&nbsp;</p><p>They –</p><ul><li>Set up, organize, and modify social networking profiles.</li><li>Make content, videographies, etc for your product or service.</li><li>Maintain your website.</li><li>Create fruitful events on social media.</li><li>Maintain your company’s social links, groups, and pages on Facebook, LinkedIn, Instagram, Twitter, WhatsApp, and others and boost them as necessary.</li><li>Target the apposite audience for your product or service.</li><li>Analyze every delicate response of the audience.</li><li>Monitor social media conversations for new messages, followers, and engagement.</li><li>Reply to and manage comments across social media accounts.</li><li>Generate weekly reports to show the progress of your campaigns.</li><li>Update your Business status on social platforms on a regular basis.</li><li>Compile marketing statistics from different analytics tools and native platforms.</li><li>Make your business trouble-free and help it grow properly.</li><li>Moreover, provide you all these assistance at a very reasonable cost.</li></ul><p>Maybe maintaining your all social media platform professionally is time-consuming and costly for yours! So many companies are losing their audience from social media platforms for lack of content creators and social media experts. But hiring experts is expensive!! Well here is the perfect solution for you which is going to save your money and time and at the same time. It will ensure your Social media platform growth. Virtual Social Media Manager is going to take all the responsibility of all your social media platforms. A highly skilled team will take care of your social media platforms like the Facebook page, group, Instagram, Youtube, Twitter, LinkedIn, Pinterest and so many. This team consists of R&amp;D, Graphics Designer, Copywriter,&nbsp; Video editor, Voice over artist, Ads expert and Social media manager who will maintain your platforms and send you the progress report every month. And luckily this VSMM service starts at a tiny price. So save your time and money and invest it in your business.</p>', '2022-03-16 22:20:22', 1),
(2, 'White hat SEO service in Bangladesh: Increase Your Website Traffic', 'blog-2.jpg', 'Tips', '<p>Do you want to increase the traffic to your website? If so, then white hat SEO services are a great option. IMBD Agency is providing one of the best white hat SEO services at affordable rates according to the latest Google algorithm. We guarantee high-quality SEO service that will generate consistent and sustainable results for your business.</p><h4>What is White Hat SEO:</h4><p>Simply doing actual SEO without spamming is called White hat SEO services which will help you a lot to get ranked faster to get more traffic.</p><p>IMBD Agency provides white hat SEO services and also guarantees high quality of service that will go according to the <a href=\"https://www.searchenginejournal.com/google-algorithm-history/\">latest algorithm from Google</a>. To be able to generate more traffic, you need it with actual SEO work.</p><h4>What our SEO service ensure:</h4><p>Our SEO service guarantees sustainable results no matter how long or short a time span as well as consistent ranking on top pages of SERPs (Search Engine Result Pages). If you want to increase sales then this should be the first thing that you have tried out because, without these techniques, many websites will never rank at all!</p><p>– We always want to be able to help you a lot so we can get ranked faster for more traffic which will, in turn, generate better sales. We have worked with so many businesses and helped them to get ranked with our proven white hat SEO technique.</p><p>– We have been working on white hat SEO for a long time now which is why we are one of the best. Our team will be able to help you rank faster and more efficiently than ever before with our proven techniques.</p><p>– You can hire us because not only do we work exclusively with the white hat SEO, but also we guarantee results in a certain amount of time so that if it doesn’t get ranked then your money won’t go wasted!</p><p>This blog post will show you how much IMBD Agency has helped clients rank their website higher using genuine white hat SEO service without breaking any Google guidelines or risking getting penalized by them. And all these while still generating high traffic from non-spam sources which will ultimately lead to better sales.</p><p>We know SEO is a long time process but the result of SEO is really worth it. If your business doesn’t have a quality online presence then you will be losing your business growth day by day.</p><p>There is a lot of SEO service providers out there but IMBD Agency will provide you high-quality white hat SEO services which are completely according to the latest Google algorithm. We guarantee that if we cannot rank your website higher using genuine white hats within a certain amount of time then you won’t have to pay for anything (no matter how much it takes or what needs to be done). By doing proper research we ensure that how it could be your ranking journey.</p><p>IMBD Agency is one of the top SEO companies in Bangladesh. We are providing white hat SEO service and we have more than 7 years of experience in this field so you can trust us to get your business ranking higher on search engines with high-quality services guaranteed!</p><p>If you want to increase traffic, then come with us at IMBD Agency for one of the best white hat SEO service providers out there.</p><p>The benefits from our previous work: increased online sales by 400%+, improved ROI</p><p>The best part about our service is that we don’t work with spammy links and all these while still generating traffic from non-spam sources like social media, commenting on relevant blogs, writing guest posts on quality websites, and more!</p><p>If you’re looking for one of the best long-term investments in your business growth, then you can try our service.</p>', '2022-03-16 22:43:05', 1),
(3, 'Why your next Marketing Platform is Facebook Messenger?', 'blog-3.jpg', 'Tips', '<p>Messenger is undoubtedly successful, but here are the real reasons to find it your next marketing platform beside the raw numbers:</p><h4>Mobile-first:</h4><p>While old Facebook apps were mostly built for desktop use, with some mobile-ready developers going the extra mile, Messenger is an app that you can access to your iPhone, Android but it’s not a web-focused app like the old race of messengers, for example. <a href=\"https://en.wikipedia.org/wiki/AIM_(software)\">AIM</a> Remember? Did <a href=\"https://www.icq.com/\">ICQ</a>?</p><p>With Messenger being a mobile-first network, its bots will conquer the millions of cell phones that are primary computing tools for a lot of people. Which is precisely why the M.Me Messenger links are so relevant – they let users quickly access the platform – on the go!</p><h4>Your customers like messaging:</h4><p>Again, comparing Facebook Messenger apps with ‘old’ Facebook apps, particularly bots, is like comparing apples to oranges. What we want to do these days as users are to type out to our mates. That is the ‘interface’ that we like and use rather than Facebook itself – also Zuckerberg stated himself:</p><p>Messaging is among the few events that take place individuals do other than social networking. Eighty-five per cent of people are on Facebook in some countries, but 95 per cent use SMS or texting.</p><h4>(Mobile) Developers Are Ready:</h4><p>Developers weren’t fully prepared for the beast that the Facebook Platform is because when it was released and ALL the businesses around the world realized they needed to have a Facebook presence.</p><p>&nbsp;</p><p>Today’s developers are well aware of both the strengths and limitations of the Facebook Platform as well as the sheer determination of their customers to establish a presence on the site.</p><h4>Early Adopters Will Be Rewarded:</h4><p>While I know you’d love to make sure bots are the right option for your next marketing campaign on Facebook, waiting might not be the right decision.</p><p>You can, of course, wait a month or two, see what everyone else is doing, and then maybe start preparing your project, but at that point, everyone and their grandmother will have a bot. So they won’t be BB8. Just like Runkeeper did with iOS or Farmville with the original Facebook website, you’ll gain the most visibility you would expect to be going quickly (like a startup).</p><h4>Engage your existing Facebook customers:</h4><p>If you’re reading this post, I’m pretty sure you’ve already got the following on the most prominent social network in the world. Facebook bots will let you take advantage of those followers and engage them even more – and sell them a little bit more!</p><p>Note that Facebook Bots are completely new within Facebook Messenger Platform so you may need to introduce the idea to your developers and the rest of the team. The best thing about it is that the ‘bots’ are fresh and exciting and can ramp up the team to create a whole new experience.</p><p>What’s interesting about the Facebook Messenger platform is that we’re still not 100 per cent sure how to make the most of it. We do not yet have a “winner” Facebook Messenger site. You may be the one that makes the network the best and builds the next great bot!</p>', '2022-03-16 22:51:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`) VALUES
(1, 'Blog'),
(2, 'Tips'),
(3, 'Case Study');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `name`, `status`) VALUES
(1, 'client-1.png', 'Uddam', 1),
(2, 'client-2.png', 'Borak Polytechnic', 1),
(3, 'client-3.png', 'ISTT', 1),
(4, 'client-4.png', 'Gulshan Clinic', 1),
(5, 'client-5.png', 'CUST', 1),
(6, 'client-6.png', 'ZangMart', 1),
(7, 'client-7.png', 'BD Unbound', 1),
(8, 'client-8.png', 'IMBD CRM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `website`, `comment`, `status`, `date`, `blog_id`) VALUES
(1, 'Rowshon Habib Rony', 'rhrony0009@gmail.com', 'https://rhrony.com', 'Thanks for your Informative post', 1, '2022-03-15', 3),
(2, 'SHAMIM AHMED', 'info.imbdagency@gmail.com', 'https://www.imbdagency.com', 'Good post. Can you describe more?', 1, '2022-03-15', 1),
(4, 'Nayeem Boktheir', 'nayeemboktheir@gmail.com', 'https://clonotech.com', 'Thanks for your informative post. I will help me a lot.', 1, '2022-03-17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts_info`
--

CREATE TABLE `contacts_info` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts_info`
--

INSERT INTO `contacts_info` (`id`, `address`, `phone`, `email`) VALUES
(1, 'House: 183/6, Block- A, Avenue- 2, Section-13, Mirpur, Dhaka- 1216', '+8801839096877', 'cto@imbdagency.com');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `course`, `institute`, `start_year`, `end_year`, `description`, `status`) VALUES
(1, 'SSC', 'Amar Desh Residential School', 2011, '2012', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.', 0),
(2, 'HSC', 'Ahammad Uddin Shah Shishu Niketon School & College', 2013, '2015', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.', 1),
(3, 'BBA', 'Govt. Titumir College', 2015, '2019', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.', 1),
(4, 'MBA', 'Govt. Titumir College', 2019, '2020', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `company`, `designation`, `start_year`, `end_year`, `description`, `status`) VALUES
(1, 'IMBD Agency', 'Chief Technical Officer', 2018, 'Present', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.', 1),
(2, 'šiyaaka', 'Marketing Executive', 2015, '2018', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `footer_image`
--

CREATE TABLE `footer_image` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer_image`
--

INSERT INTO `footer_image` (`id`, `image`) VALUES
(3, 'footer_image-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `subject`, `message`, `time`, `read_status`) VALUES
(1, 'Basir Ahmed', '01839096877', 'basirahmednrb@gmail.com', 'Business proposal', 'Hello, Im Bashir Ahmed CEO Cleanco Service Ltd. I need some help from you regarding my website. Can you please contact me asap.', '2022-03-15 18:45:08', 1),
(2, 'Nayeem Boktheir', '+8801833333333', 'nayeemboktheir@gmail.com', 'Change Primary domain', 'Hello. How can I change my primary domain from cpanel? please help', '2022-03-17 15:36:57', 1),
(3, 'weci@mailinator.com', 'punidi@mailinator.co', 'tunazzinaaafrin@gmail.com', 'hal', 'hello', '2022-03-18 14:53:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `desp` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `category`, `desp`, `image`, `link`, `status`) VALUES
(1, 'Token Management', 'Web App', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nibh tellus molestie nunc non blandit massa enim. Fringilla phasellus faucibus scelerisque eleifend. Mauris a diam maecenas sed enim ut sem viverra. Metus dictum at tempor commodo ullamcorper a lacus.', 'portfolio-1.jpg', 'https://token.abohon.com', 1),
(2, 'House of Beauty eCommerce', 'eCommerce', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nibh tellus molestie nunc non blandit massa enim. Fringilla phasellus faucibus scelerisque eleifend. Mauris a diam maecenas sed enim ut sem viverra. Metus dictum at tempor commodo ullamcorper a lacus.', 'portfolio-2.jpg', 'https://houseofbeautybd.com', 0),
(3, 'BST Travel Engine', 'Web Development', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nibh tellus molestie nunc non blandit massa enim. Fringilla phasellus faucibus scelerisque eleifend. Mauris a diam maecenas sed enim ut sem viverra. Metus dictum at tempor commodo ullamcorper a lacus.', 'portfolio-3.jpg', 'https://www.bangladeshscenictours.com', 1),
(4, 'IMBD Panel & CRM', 'Web App', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nibh tellus molestie nunc non blandit massa enim. Fringilla phasellus faucibus scelerisque eleifend. Mauris a diam maecenas sed enim ut sem viverra. Metus dictum at tempor commodo ullamcorper a lacus.', 'portfolio-4.jpg', 'https://panel.imbdagency.com', 1),
(5, 'Green Oronno Hostel Booking', 'Web Development', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nibh tellus molestie nunc non blandit massa enim. Fringilla phasellus faucibus scelerisque eleifend. Mauris a diam maecenas sed enim ut sem viverra. Metus dictum at tempor commodo ullamcorper a lacus.', 'portfolio-5.jpg', 'https://greenaronno.com', 1),
(6, 'Bicavs Web Portal', 'Wordpress', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nibh tellus molestie nunc non blandit massa enim. Fringilla phasellus faucibus scelerisque eleifend. Mauris a diam maecenas sed enim ut sem viverra. Metus dictum at tempor commodo ullamcorper a lacus.', 'portfolio-6.jpg', 'https://www.bicavs.com', 1),
(7, 'Abohon eCommerce', 'eCommerce', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nibh tellus molestie nunc non blandit massa enim. Fringilla phasellus faucibus scelerisque eleifend. Mauris a diam maecenas sed enim ut sem viverra. Metus dictum at tempor commodo ullamcorper a lacus.', 'portfolio-7.jpg', 'https://abohon.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `name`) VALUES
(1, 'UX/UI'),
(3, 'Web Development'),
(4, 'Web App'),
(5, 'eCommerce'),
(7, 'Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `description`, `status`) VALUES
(1, 'far fa-object-group', 'Responsive Web Design', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 1),
(2, 'fas fa-cart-plus', 'e-Commerce Website', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 1),
(3, 'fas fa-clock', 'On time Delivery', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 1),
(4, 'far fa-credit-card', 'Secure Checkout', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 1),
(5, 'fas fa-database', 'Database Management', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 1),
(6, 'fas fa-bug', 'Bug Fixing Support', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 0),
(7, 'fas fa-chart-bar', 'Analytical Web App Develop', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 0),
(8, 'far fa-comment', '24x7 Support', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'default-logo.png',
  `icon` varchar(100) NOT NULL DEFAULT 'default-icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `name`, `tagline`, `logo`, `icon`) VALUES
(1, 'RH Rony', 'A Full Stack Web Developer', 'site-logo.png', 'site-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `technology` varchar(20) NOT NULL,
  `percentage` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 = design tool, 1 = technology',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `technology`, `percentage`, `type`, `status`) VALUES
(1, 'HTML', 80, 1, 1),
(2, 'CSS', 75, 1, 0),
(3, 'JavaScript', 55, 1, 1),
(4, 'PHP', 60, 1, 1),
(5, 'Wordpress', 65, 1, 1),
(6, 'Laravel', 45, 1, 1),
(9, 'Adobe Photoshop', 81, 0, 1),
(10, 'Adobe Illustrator', 63, 0, 1),
(11, 'Adobe XD', 66, 0, 1),
(12, 'Figma', 71, 0, 1),
(13, 'Canva Pro', 57, 0, 0),
(14, 'Sketch', 63, 0, 1),
(15, 'Axure', 68, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` int(11) NOT NULL,
  `platform` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `platform`, `link`, `status`) VALUES
(1, 'fab fa-facebook', 'https://www.facebook.com/rhrony009', 1),
(2, 'fab fa-twitter', 'https://twitter.com/rhrony0009', 0),
(3, 'fab fa-linkedin-in', 'https://www.linkedin.com/in/rhrony', 0),
(4, 'fab fa-instagram', 'https://www.instagram.com/rh_rony', 1),
(5, 'fab fa-reddit-alien', 'https://www.reddit.com/user/rhrony', 1),
(6, 'fab fa-pinterest-p', 'https://www.pinterest.com/rhrony009', 0),
(7, 'fab fa-github', 'https://github.com/rhrony09/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `project_name` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `company`, `designation`, `image`, `project_name`, `content`, `start_date`, `end_date`, `rating`, `status`) VALUES
(1, 'Daniel Lis', 'London Lofts and Basements', 'CEO', 'testimonial-1.jpg', 'Web Development', 'I am very impressed with the Web Development service I received from RH Rony. He was very professional and offered me a great deal on his services. I would recommend him to anyone looking for web development services.	', '2019-03-02', '2019-05-01', 5, 1),
(2, 'William S. Wiedman', 'Frame Scene', 'Owner', 'testimonial-2.jpg', 'Web App Development', 'I am extremely satisfied with my recent web development project. Mr. Rony was very professional and knowledgeable about his field. He was able to understand my needs and provide me with a product that met my expectations. I would definitely recommend Web Development Services to anyone looking for quality web development work.', '2020-06-13', '2020-08-01', 5, 1),
(3, 'Peter Ross', 'Auto Palace', 'Founder', 'testimonial-3.jpg', 'eCommerce', 'I am a very happy customer of Web Design & Development Service. I have been working with him for a few months now and he has done a fantastic job on all of my projects. He is very professional and always deliver quality work. I would highly recommend him to anyone looking for a new website or even just some help with him current one.', '2021-07-26', '2021-08-25', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `profile_pic` varchar(50) DEFAULT 'default.jpg',
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '0 = user, 1 = moderator, 2 = admin, 3 = super admin',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = active, 1 = deleted',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `password`, `profile_pic`, `role`, `status`, `created_at`) VALUES
(1, 'RH Rony', 'rhrony0009@gmail.com', '01839096877', '$2y$10$DG1VlEftMBdKAYaHqhwZNOXGmf21QguxSfTYExmmqO4VumZ6bRqG.', '1.jpg', 3, 0, '2022-02-11 20:24:24'),
(5, 'Ashiq Ahmed', 'ashiq@imbdagency.com', '01797242610', '$2y$10$jnXdMw9tV3Hyd5YJ5crVd.wYPNeAg1j1JUSpYowx5ORDHNxNMNl2W', '5.jpg', 2, 0, '2022-02-11 21:41:00'),
(11, 'Kitra Hyde', 'zikimale@mailinator.com', '+1 (588) 955-7504', '$2y$10$LJCGViEVtWyGMWJde1K/3.SXgGjh9it/IoTEFHWYMFIv08vDR.CNS', 'default.jpg', 0, 1, '2022-03-05 21:58:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_contents`
--
ALTER TABLE `banner_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_image`
--
ALTER TABLE `banner_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_info`
--
ALTER TABLE `contacts_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_image`
--
ALTER TABLE `footer_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_contents`
--
ALTER TABLE `banner_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_image`
--
ALTER TABLE `banner_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts_info`
--
ALTER TABLE `contacts_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `footer_image`
--
ALTER TABLE `footer_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
