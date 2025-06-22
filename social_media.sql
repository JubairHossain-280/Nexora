-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 04:46 AM
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
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `comment_text` varchar(255) NOT NULL,
  `create_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `post_context` mediumtext NOT NULL,
  `post_media` varchar(255) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_context`, `post_media`, `media_type`, `created_at`) VALUES
(37, 49, 'BACHELOR POINT SEASON - 05\r\nKABILA X SHUVO', 'uploads/posts/6847f91c9ffb2Kabila_x_Shuvo.mp4', 'video', '2025-06-10 09:21:32'),
(46, 49, 'Join Brain Station 23 as a DevOps Engineer – Automate, Optimize, and Scale with Confidence!\r\nAre you an expert in building robust CI/CD pipelines, managing cloud infrastructure, and driving automation across development workflows? Brain Station 23 is hiring a DevOps Engineer to help streamline deployment processes and enhance system reliability. If you\'re skilled in Docker, Kubernetes, AWS/Azure, Terraform, and monitoring tools, this is your opportunity to make a real impact.\r\nDeadline: 18th June, 2025\r\nJob Type: Full-Time\r\nExperience: 3-5 Years\r\nSalary: 50k-100k\r\nWhy Join Us?\r\nOwn the Infrastructure – Design, implement, and manage scalable systems\r\nBoost Deployment Speed – Build and maintain CI/CD pipelines for fast, reliable delivery\r\nEnhance Reliability – Monitor and improve system performance and uptime\r\nCollaborate Across Teams – Work closely with developers, QA, and operations teams\r\nStay Ahead – Use the latest DevOps tools and best practices in a fast-paced environment\r\nApply Now:\r\nDevOps Engineer: https://brainstation-23.easy.jobs/eqlaksowde-senior...\r\nTake your DevOps career to the next level—Join Brain Station 23 and build the future of infrastructure!', 'uploads/posts/684818a7db058505500662_23915014211497381_6219735244135613829_n.jpg', 'image', '2025-06-10 11:36:07'),
(47, 49, '🔧🚀 We\'re Hiring a Developer (with Equity)!\r\n**We’re building something bold — a platform that solves real-life service problems in Bangladesh.**\r\n💡 **Business Name:** কাজহলো (Kajholo)\r\n📌 **What we need:**\r\nA web developer who can build a **client-focused service platform** (user-friendly, responsive, scalable).\r\nNo money now, but we’re offering **10% equity** to be a **co-creator** in this journey!\r\n✨ What You Get:\r\n✅ 10% equity in the company\r\n✅ Your name on the founding team\r\n✅ Full creative & tech freedom\r\n✅ Real impact solving local problems\r\n💬 Who We\'re Looking For:\r\n* Passionate developer (HTML, CSS, JS, or React/Next/Framer)\r\n* Belief in startups\r\n* Long-term mindset\r\n* Willing to grow something from zero\r\n**If you\'re excited to solve real problems with tech — come build with us!**\r\n📩 DM me\r\n📞 Or comment “Interested” below and I’ll reach out.\r\n#startup #developerneeded #equity #bangladeshstartup #kajholo #serviceplatform #joinourteam #buildinpublic', 'uploads/posts/68481a0542b57505853787_1962367394504501_3966225203818393073_n.jpg', 'image', '2025-06-10 11:41:57'),
(48, 49, 'Job Title: Spring Boot Developer\r\nCompany Name: Digital Run Limited \r\nLocation: Baridhara DOHS,Dhaka, Bangladesh.\r\nExperience:  2-  4 years\r\nSalary: Negotiable (Based on experience)\r\nJob Overview:\r\nDigital Run Limited is looking for an experienced Spring Boot Developer to join our team. The ideal candidate will be responsible for developing scalable web applications, designing RESTful APIs, and working with microservices using Spring Boot. If you have a passion for writing clean code and optimizing application performance, we’d love to hear from you!\r\nResponsibilities:\r\n• Develop scalable web applications using Spring Boot.\r\n• Design and implement RESTful APIs and microservices.\r\n• Write clean, efficient, and maintainable code.\r\n• Ensure application performance and scalability.\r\n• Collaborate with cross-functional teams for feature development and deployment.\r\n• Debug and resolve technical issues efficiently.\r\nRequirements:\r\n• Proficiency in Java and Spring Boot.\r\n• Experience with MySQL/PostgreSQL databases.\r\n• Familiarity with Hibernate, Git, Docker, and CI/CD pipelines.\r\n• Strong knowledge of software development best practices.\r\n• Bachelor\'s degree in Computer Science or a related field (preferred).\r\n• \r\nBenefits :\r\n• Festival Bonuses\r\n• Flexible Vacation Policy\r\n• Lunch & Snacks Facility\r\n• Paid Leaves\r\n• Weekly Holidays (Friday-Saturday)\r\n• Annual Salary Increment\r\n• Work Hours: 10:00 AM - 7:00 PM, Sunday to Thursday\r\nHow to Apply:\r\nSend your CV to 📧 career@digitalrun.biz with the subject \"Application for Spring Boot Developer\".', 'uploads/posts/68481aa07c0f6481944518_28541425435506267_3251675028021889456_n.jpg', 'image', '2025-06-10 11:44:32'),
(49, 49, 'Level Up Your Career as an ASP.NET Developer at Brain Station 23!\r\nAre you passionate about developing secure, scalable, and high-performance web applications? Brain Station 23 is hiring an ASP.NET Developer to build robust backend systems and enterprise-grade solutions. If you have hands-on experience with ASP.NET MVC/Core, C#, SQL Server, and RESTful APIs, we want you on our team!\r\nDeadline: 18th June, 2025\r\nJob Type: Full-Time\r\nExperience: 3-7 Years\r\nSalary: 50k-100k\r\nWhy Join Us?\r\nBuild Enterprise Applications – Work on high-impact projects for global clients\r\nModern Tech Stack – Leverage the latest in .NET, cloud, and DevOps practices\r\nCollaborative Team – Learn and grow with experienced developers and architects\r\nCareer Growth – Access continuous learning, mentorship, and leadership opportunities\r\nApply Now:\r\nASP.NET Developer: https://brainstation-23.easy.jobs/kpkemtqbpm-aspnet...\r\nBuild your future with code—Join Brain Station 23 and make your mark in tech!', 'uploads/posts/68481af28e693506055573_23914996564832479_7901225312790666100_n.jpg', 'image', '2025-06-10 11:45:54'),
(50, 49, '🚀 Hello future developers 😚', '', '', '2025-06-10 14:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `story_path` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `user_id`, `story_path`, `created_at`) VALUES
(89, 49, 'uploads/stories/6856c4bc7dffcarray_with.mp4', '2025-06-21 14:42:04.619431'),
(90, 49, 'uploads/stories/6856c4c877614polite_communication.mp4', '2025-06-21 14:42:16.526605'),
(91, 49, 'uploads/stories/6856c4d593f8eWhat_will_you_get_from_our_Redux_course_Batch_2__shorts.mp4', '2025-06-21 14:42:29.628385'),
(92, 49, 'uploads/stories/6856c4d9634a4Google_meet_AI_live_translation_new_feature____GoogleIO__shorts__google__googlemeet.mp4', '2025-06-21 14:42:33.430872');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `cover_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `dob`, `email`, `password`, `profile_image`, `cover_photo`) VALUES
(49, 'sakib', '2007-06-01', 'sakib@gmail.com', '$2y$10$qkaJsEICDX6ncbjWCv0.d.74osksZCjzUMqDB84QGrOEQlvHSiYnu', 'uploads/profiles/683f34261a052profile.jpg', 'uploads/covers/683f00d583453javascript-google-node-js-html-microsoft-visual-studio-hd-wallpaper-preview.jpg'),
(50, 'Anamul', '2025-06-03', 'anamul@gmail.com', '$2y$10$nK6X/veEAbOMt1Iw4F0Mae1d5DFFwfsEVibbcSX6JdQbXzJOmzy2C', '', ''),
(51, 'admin', '2025-06-12', 'jubair@gmail.com', '$2y$10$owsJASLyzrXdpCTYPPPwoeBNcbfrdZ/b5z8Ls0xwqJhVNbc7bq1e2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
