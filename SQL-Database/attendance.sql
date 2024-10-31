-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 07:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignclasses`
--

CREATE TABLE `assignclasses` (
  `assignClassId` bigint(20) UNSIGNED NOT NULL,
  `classId` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignclasses`
--

INSERT INTO `assignclasses` (`assignClassId`, `classId`, `id`, `created_at`, `updated_at`) VALUES
(11, 10, 1, '2024-10-04 06:31:55', '2024-10-04 06:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `assignsubjects`
--

CREATE TABLE `assignsubjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignsubjects`
--

INSERT INTO `assignsubjects` (`id`, `subject_id`, `faculty_id`, `created_at`, `updated_at`) VALUES
(9, 15, 1, '2024-10-04 06:32:09', '2024-10-04 06:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_statuses`
--

CREATE TABLE `attendance_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fill_attendance_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_statuses`
--

INSERT INTO `attendance_statuses` (`id`, `fill_attendance_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, '2023-01-03 08:33:21', '2023-01-03 08:33:21'),
(4, 2, 2, 0, '2023-01-05 02:49:06', '2023-01-05 02:49:06'),
(6, 3, 2, 1, '2023-01-06 07:32:55', '2023-01-06 07:32:55'),
(8, 4, 2, 0, '2023-01-06 07:33:34', '2023-01-06 07:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classId` bigint(20) UNSIGNED NOT NULL,
  `classCode` varchar(10) NOT NULL,
  `course` varchar(20) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `year` int(11) NOT NULL,
  `is_deleted` varchar(6) NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classId`, `classCode`, `course`, `semester`, `year`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'BCA-01', 'BCA', 1, 2022, 'false', '2024-10-04 06:17:42', '2024-10-04 06:17:42'),
(2, 'BCA-02', 'BCA', 2, 2022, 'false', '2024-10-04 06:17:58', '2024-10-04 06:17:58'),
(3, 'BCA-03', 'BCA', 3, 2023, 'false', '2024-10-04 06:18:12', '2024-10-04 06:18:12'),
(9, 'BCA-04', 'BCA', 4, 2023, 'false', '2024-10-04 06:23:00', '2024-10-04 06:23:00'),
(10, 'BCA-05', 'BCA', 5, 2024, 'false', '2024-10-04 06:23:14', '2024-10-04 06:23:14'),
(11, 'BCA-06', 'BCA', 6, 2024, 'false', '2024-10-04 06:23:31', '2024-10-04 06:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `qualification` varchar(16) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `is_deleted` varchar(6) NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `email`, `qualification`, `dob`, `gender`, `mobile_no`, `address`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'faculty', 'faculty@gmail.com', 'MCA', '2023-01-01', 'Male', 9909328196, 'fdgv', 'false', '2023-01-03 08:24:52', '2023-01-03 08:24:52'),
(2, 'meet', 'meet@gmail.com', 'MCA', '2023-01-04', 'Male', 9909328196, 'sas', 'true', '2023-01-06 22:58:40', '2024-10-04 06:16:23'),
(3, 'vatsal', 'vatsal@gmail.com', 'MCA', '2023-01-03', 'Male', 9909328196, 'asx', 'true', '2023-01-07 00:02:37', '2024-10-04 06:16:17'),
(4, 'Hasti Shihora', 'hastishihora@gmail.com', 'MBA', '2003-12-02', 'Female', 9638527410, 'Hirabaug', 'true', '2024-10-03 01:17:46', '2024-10-04 06:16:08'),
(5, 'faculty 2', 'faculty2@gmail.com', 'MCA', '2003-12-02', 'Female', 9638527410, 'Hirabaug', 'false', '2024-10-03 01:23:20', '2024-10-03 01:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '672ccbce-410b-4e11-a3ee-42c43b564043', 'database', 'default', '{\"uuid\":\"672ccbce-410b-4e11-a3ee-42c43b564043\",\"displayName\":\"App\\\\Jobs\\\\SendFacultyMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendFacultyMailJob\",\"command\":\"O:27:\\\"App\\\\Jobs\\\\SendFacultyMailJob\\\":1:{s:4:\\\"data\\\";a:7:{s:4:\\\"name\\\";s:4:\\\"meet\\\";s:5:\\\"email\\\";s:14:\\\"meet@gmail.com\\\";s:13:\\\"qualification\\\";s:3:\\\"MCA\\\";s:3:\\\"dob\\\";s:10:\\\"2023-01-04\\\";s:6:\\\"gender\\\";s:4:\\\"Male\\\";s:9:\\\"mobile_no\\\";s:10:\\\"9909328196\\\";s:7:\\\"address\\\";s:3:\\\"sas\\\";}}\"}}', 'Symfony\\Component\\Mailer\\Exception\\TransportException: Failed to authenticate on SMTP server with username \"jaygoyani.mca22@scet.ac.in\" using the following authenticators: \"LOGIN\", \"PLAIN\", \"XOAUTH2\". Authenticator \"LOGIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials d9443c01a7336-207945da697sm87875505ad.22 - gsmtp\".\". Authenticator \"PLAIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials d9443c01a7336-207945da697sm87875505ad.22 - gsmtp\".\". Authenticator \"XOAUTH2\" returned \"Expected response code \"235\" but got code \"334\", with message \"334 eyJzdGF0dXMiOiI0MDAiLCJzY2hlbWVzIjoiQmVhcmVyIiwic2NvcGUiOiJodHRwczovL21haWwuZ29vZ2xlLmNvbS8ifQ==\".\". in C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php:212\nStack trace:\n#0 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(148): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->handleAuth(Array)\n#1 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(105): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->doEhloCommand()\n#2 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(253): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'HELO [127.0.0.1...\', Array)\n#3 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(276): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doHeloCommand()\n#4 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(213): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#5 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#6 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#7 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#8 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(285): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#9 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(203): Illuminate\\Mail\\Mailer->send(\'Mail.FacultyMai...\', Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#11 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(196): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#12 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(307): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#13 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(253): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\FacultyMail))\n#14 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\FacultyMail))\n#15 C:\\xampp\\htdocs\\Attendance-Management-System\\app\\Jobs\\SendFacultyMailJob.php(36): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\FacultyMail))\n#16 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendFacultyMailJob->handle()\n#17 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#23 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#24 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendFacultyMailJob), false)\n#26 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#27 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#28 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendFacultyMailJob))\n#30 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(145): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(129): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Command\\Command.php(312): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(151): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(1022): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(314): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(168): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\Attendance-Management-System\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 {main}', '2024-09-20 00:22:40'),
(2, '116ca30f-c644-4653-bd9e-55dd914972d8', 'database', 'default', '{\"uuid\":\"116ca30f-c644-4653-bd9e-55dd914972d8\",\"displayName\":\"App\\\\Jobs\\\\SendFacultyMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendFacultyMailJob\",\"command\":\"O:27:\\\"App\\\\Jobs\\\\SendFacultyMailJob\\\":1:{s:4:\\\"data\\\";a:7:{s:4:\\\"name\\\";s:6:\\\"vatsal\\\";s:5:\\\"email\\\";s:16:\\\"vatsal@gmail.com\\\";s:13:\\\"qualification\\\";s:3:\\\"MCA\\\";s:3:\\\"dob\\\";s:10:\\\"2023-01-03\\\";s:6:\\\"gender\\\";s:4:\\\"Male\\\";s:9:\\\"mobile_no\\\";s:10:\\\"9909328196\\\";s:7:\\\"address\\\";s:3:\\\"asx\\\";}}\"}}', 'Symfony\\Component\\Mailer\\Exception\\TransportException: Failed to authenticate on SMTP server with username \"jaygoyani.mca22@scet.ac.in\" using the following authenticators: \"LOGIN\", \"PLAIN\", \"XOAUTH2\". Authenticator \"LOGIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials d2e1a72fcca58-71944a980d7sm9459394b3a.15 - gsmtp\".\". Authenticator \"PLAIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials d2e1a72fcca58-71944a980d7sm9459394b3a.15 - gsmtp\".\". Authenticator \"XOAUTH2\" returned \"Expected response code \"235\" but got code \"334\", with message \"334 eyJzdGF0dXMiOiI0MDAiLCJzY2hlbWVzIjoiQmVhcmVyIiwic2NvcGUiOiJodHRwczovL21haWwuZ29vZ2xlLmNvbS8ifQ==\".\". in C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php:212\nStack trace:\n#0 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(148): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->handleAuth(Array)\n#1 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(105): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->doEhloCommand()\n#2 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(253): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'HELO [127.0.0.1...\', Array)\n#3 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(276): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doHeloCommand()\n#4 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(213): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#5 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#6 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#7 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#8 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(285): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#9 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(203): Illuminate\\Mail\\Mailer->send(\'Mail.FacultyMai...\', Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#11 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(196): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#12 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(307): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#13 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(253): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\FacultyMail))\n#14 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\FacultyMail))\n#15 C:\\xampp\\htdocs\\Attendance-Management-System\\app\\Jobs\\SendFacultyMailJob.php(36): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\FacultyMail))\n#16 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendFacultyMailJob->handle()\n#17 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#23 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#24 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendFacultyMailJob), false)\n#26 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#27 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendFacultyMailJob))\n#28 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendFacultyMailJob))\n#30 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(145): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(129): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Command\\Command.php(312): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(151): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(1022): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(314): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(168): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\Attendance-Management-System\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 {main}', '2024-09-20 00:22:47'),
(3, 'dfcfd11d-e99f-471e-9ef4-f3114c007bee', 'database', 'default', '{\"uuid\":\"dfcfd11d-e99f-471e-9ef4-f3114c007bee\",\"displayName\":\"App\\\\Jobs\\\\SendStudentMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendStudentMailJob\",\"command\":\"O:27:\\\"App\\\\Jobs\\\\SendStudentMailJob\\\":1:{s:4:\\\"data\\\";a:10:{s:4:\\\"name\\\";s:12:\\\"Hatsi Goyani\\\";s:5:\\\"email\\\";s:22:\\\"shihorahasti@gmail.com\\\";s:13:\\\"enrollment_no\\\";s:12:\\\"195040686077\\\";s:3:\\\"dob\\\";s:10:\\\"2003-02-15\\\";s:6:\\\"gender\\\";s:6:\\\"Female\\\";s:9:\\\"mobile_no\\\";s:10:\\\"9925061215\\\";s:7:\\\"address\\\";s:15:\\\"Hirabaug, Surat\\\";s:5:\\\"class\\\";s:6:\\\"CA-202\\\";s:6:\\\"course\\\";s:3:\\\"MCA\\\";s:8:\\\"semester\\\";s:1:\\\"4\\\";}}\"}}', 'Symfony\\Component\\Mailer\\Exception\\TransportException: Failed to authenticate on SMTP server with username \"jaygoyani.mca22@scet.ac.in\" using the following authenticators: \"LOGIN\", \"PLAIN\", \"XOAUTH2\". Authenticator \"LOGIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials d9443c01a7336-207947489dfsm88133535ad.295 - gsmtp\".\". Authenticator \"PLAIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials d9443c01a7336-207947489dfsm88133535ad.295 - gsmtp\".\". Authenticator \"XOAUTH2\" returned \"Expected response code \"235\" but got code \"334\", with message \"334 eyJzdGF0dXMiOiI0MDAiLCJzY2hlbWVzIjoiQmVhcmVyIiwic2NvcGUiOiJodHRwczovL21haWwuZ29vZ2xlLmNvbS8ifQ==\".\". in C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php:212\nStack trace:\n#0 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(148): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->handleAuth(Array)\n#1 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(105): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->doEhloCommand()\n#2 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(253): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'HELO [127.0.0.1...\', Array)\n#3 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(276): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doHeloCommand()\n#4 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(213): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#5 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#6 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#7 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#8 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(285): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#9 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(203): Illuminate\\Mail\\Mailer->send(\'Mail.StudentMai...\', Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#11 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(196): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#12 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(307): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#13 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(253): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\StudentMail))\n#14 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\StudentMail))\n#15 C:\\xampp\\htdocs\\Attendance-Management-System\\app\\Jobs\\SendStudentMailJob.php(36): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\StudentMail))\n#16 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendStudentMailJob->handle()\n#17 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#23 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#24 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendStudentMailJob), false)\n#26 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#27 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#28 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendStudentMailJob))\n#30 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(145): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(129): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Command\\Command.php(312): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(151): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(1022): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(314): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(168): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\Attendance-Management-System\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 {main}', '2024-09-20 00:22:51');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(4, '0f032c2e-561e-425d-81ea-45eb48b36e8c', 'database', 'default', '{\"uuid\":\"0f032c2e-561e-425d-81ea-45eb48b36e8c\",\"displayName\":\"App\\\\Jobs\\\\SendStudentMailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendStudentMailJob\",\"command\":\"O:27:\\\"App\\\\Jobs\\\\SendStudentMailJob\\\":1:{s:4:\\\"data\\\";a:10:{s:4:\\\"name\\\";s:10:\\\"Jay Goyani\\\";s:5:\\\"email\\\";s:22:\\\"jaygoyani939@gmail.com\\\";s:13:\\\"enrollment_no\\\";s:12:\\\"195040686076\\\";s:3:\\\"dob\\\";s:10:\\\"2002-01-13\\\";s:6:\\\"gender\\\";s:4:\\\"Male\\\";s:9:\\\"mobile_no\\\";s:10:\\\"8238938615\\\";s:7:\\\"address\\\";s:19:\\\"Mota Varachha,Surat\\\";s:5:\\\"class\\\";s:6:\\\"CA-202\\\";s:6:\\\"course\\\";s:3:\\\"MCA\\\";s:8:\\\"semester\\\";s:1:\\\"4\\\";}}\"}}', 'Symfony\\Component\\Mailer\\Exception\\TransportException: Failed to authenticate on SMTP server with username \"jaygoyani.mca22@scet.ac.in\" using the following authenticators: \"LOGIN\", \"PLAIN\", \"XOAUTH2\". Authenticator \"LOGIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials 98e67ed59e1d1-2dd6ee7bfaesm3111964a91.6 - gsmtp\".\". Authenticator \"PLAIN\" returned \"Expected response code \"235\" but got code \"535\", with message \"535-5.7.8 Username and Password not accepted. For more information, go to\r\n535 5.7.8  https://support.google.com/mail/?p=BadCredentials 98e67ed59e1d1-2dd6ee7bfaesm3111964a91.6 - gsmtp\".\". Authenticator \"XOAUTH2\" returned \"Expected response code \"235\" but got code \"334\", with message \"334 eyJzdGF0dXMiOiI0MDAiLCJzY2hlbWVzIjoiQmVhcmVyIiwic2NvcGUiOiJodHRwczovL21haWwuZ29vZ2xlLmNvbS8ifQ==\".\". in C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php:212\nStack trace:\n#0 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(148): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->handleAuth(Array)\n#1 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(105): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->doEhloCommand()\n#2 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(253): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'HELO [127.0.0.1...\', Array)\n#3 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(276): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doHeloCommand()\n#4 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(213): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#5 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#6 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#7 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#8 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(285): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#9 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(203): Illuminate\\Mail\\Mailer->send(\'Mail.StudentMai...\', Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#11 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(196): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#12 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(307): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#13 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(253): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\StudentMail))\n#14 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\StudentMail))\n#15 C:\\xampp\\htdocs\\Attendance-Management-System\\app\\Jobs\\SendStudentMailJob.php(36): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\StudentMail))\n#16 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendStudentMailJob->handle()\n#17 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#23 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#24 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendStudentMailJob), false)\n#26 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#27 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendStudentMailJob))\n#28 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendStudentMailJob))\n#30 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(425): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(375): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(173): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(145): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(129): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(651): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Command\\Command.php(312): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(151): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(1022): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(314): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\symfony\\console\\Application.php(168): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(102): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\Attendance-Management-System\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(155): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\Attendance-Management-System\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 {main}', '2024-09-20 00:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `fill_attendances`
--

CREATE TABLE `fill_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `faculty` varchar(60) NOT NULL,
  `date` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fill_attendances`
--

INSERT INTO `fill_attendances` (`id`, `class`, `subject`, `faculty`, `date`, `created_at`, `updated_at`) VALUES
(1, 'CA-201', 'DS', 'faculty@gmail.com', '2023-01-03 07:27:26', '2023-01-03 08:33:21', '2023-01-03 08:33:21'),
(2, 'CA-201', 'DS', 'faculty@gmail.com', '2023-01-05 01:48:56', '2023-01-05 02:49:06', '2023-01-05 02:49:06'),
(3, 'CA-201', 'JAVA', 'faculty@gmail.com', '2023-01-06 06:32:47', '2023-01-06 07:32:55', '2023-01-06 07:32:55'),
(4, 'CA-201', 'DS', 'faculty@gmail.com', '2023-01-06 06:33:31', '2023-01-06 07:33:34', '2023-01-06 07:33:34'),
(5, 'CA-201', 'DS', 'faculty@gmail.com', '2023-01-07 12:19:36', '2023-01-07 01:19:43', '2023-01-07 01:19:43'),
(6, 'CA-201', 'DS', 'faculty@gmail.com', '2023-01-07 12:19:53', '2023-01-07 01:19:56', '2023-01-07 01:19:56'),
(7, 'CA-201', 'DS', 'faculty@gmail.com', '2024-09-25 11:38:05', '2024-09-25 12:38:41', '2024-09-25 12:38:41'),
(8, 'CA-201', 'DS', 'faculty@gmail.com', '2024-09-25 11:39:09', '2024-09-25 12:39:12', '2024-09-25 12:39:12'),
(9, 'CA-201', 'DS', 'faculty@gmail.com', '2024-09-25 11:39:09', '2024-09-25 12:39:16', '2024-09-25 12:39:16'),
(10, 'BCA-206', 'PHP', 'meet@gmail.com', '2024-09-25 11:49:26', '2024-09-25 12:49:29', '2024-09-25 12:49:29'),
(11, 'BCA-206', 'PHP', 'meet@gmail.com', '2024-09-25 11:49:26', '2024-09-25 12:49:30', '2024-09-25 12:49:30'),
(12, 'BCA-206', 'PHP', 'meet@gmail.com', '2024-09-25 11:49:26', '2024-09-25 12:49:31', '2024-09-25 12:49:31'),
(13, 'BCA-206', 'PHP', 'meet@gmail.com', '2024-09-25 11:50:12', '2024-09-25 12:51:50', '2024-09-25 12:51:50'),
(14, 'BCA-206', 'PHP', 'meet@gmail.com', '2024-09-25 11:50:12', '2024-09-25 12:51:51', '2024-09-25 12:51:51'),
(15, 'BCA-206', 'PHP', 'meet@gmail.com', '2024-09-25 11:50:12', '2024-09-25 12:51:51', '2024-09-25 12:51:51'),
(16, 'BCA-05', 'CC (Cloud Computing)', 'faculty@gmail.com', '2024-10-04 05:32:38', '2024-10-04 06:32:59', '2024-10-04 06:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_01_075050_create_students_table', 1),
(6, '2022_12_01_080133_create_faculties_table', 1),
(7, '2022_12_05_095826_create_classes_table', 1),
(8, '2022_12_05_101048_create_subjects_table', 1),
(9, '2022_12_17_065550_create_jobs_table', 1),
(10, '2022_12_26_102101_create_assignclasses_table', 1),
(11, '2022_12_27_074847_create_assignsubjects_table', 1),
(12, '2022_12_27_120241_create_fill_attendances_table', 1),
(13, '2022_12_29_124950_create_attendance_statuses_table', 1),
(14, '2023_01_03_121022_create_reports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('meetranoliya88@gmail.com', '$2y$10$bif9lVYsV/u4MokwoQmXcusk6pdvt3HMIS1XhsFk4VOiaHMHivEi2', '2023-01-05 08:12:57'),
('shihorahasti@gmail.com', '$2y$10$q3W336dcYDR6IcEgUqTvguvM05NzDmkExe.dZGADzKHG.stAWuS4i', '2024-09-20 00:26:20'),
('jaygoyani939@gmail.com', '$2y$10$nAB7TYiTlpaI0otNSaMDOO3bbSIAYNGxgqjmvqptDUTvF1Y5knA6u', '2024-10-04 06:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `present` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `average` double NOT NULL,
  `totalLecture` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `class`, `subject`, `present`, `total`, `average`, `totalLecture`, `created_at`, `updated_at`) VALUES
(1, 'CA-201', 'DS', 5, 8, 10, 0, '2023-01-04 12:31:55', '2023-01-04 12:31:55'),
(2, 'CA-202', 'JAVA', 6, 12, 50, 0, '2022-11-09 12:31:55', '2022-10-12 12:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `enrollment_no` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` text NOT NULL,
  `class` varchar(6) NOT NULL,
  `course` varchar(30) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `presentAttendance` tinyint(4) NOT NULL DEFAULT 0,
  `totalAttendance` tinyint(4) NOT NULL DEFAULT 0,
  `avgAttendance` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` varchar(6) NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `enrollment_no`, `dob`, `mobile_no`, `gender`, `address`, `class`, `course`, `semester`, `presentAttendance`, `totalAttendance`, `avgAttendance`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'student', 'student@gmail.com', 1950406862, '2022-12-31', 9909328196, 'Male', 'dsc', 'CA-202', 'MCA', '1', 1, 4, 25, 'false', '2023-01-03 08:27:17', '2023-01-06 07:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `is_deleted` varchar(6) NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `class`, `semester`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, 'Statistics', 'BCA-01', 1, 'false', '2024-10-04 06:24:41', '2024-10-04 06:24:41'),
(6, 'Introduction to C', 'BCA-01', 1, 'false', '2024-10-04 06:24:51', '2024-10-04 06:24:51'),
(7, 'OS', 'BCA-02', 2, 'false', '2024-10-04 06:25:36', '2024-10-04 06:25:36'),
(8, 'DS', 'BCA-02', 2, 'false', '2024-10-04 06:26:42', '2024-10-04 06:26:42'),
(9, 'SE', 'BCA-03', 3, 'false', '2024-10-04 06:27:01', '2024-10-04 06:27:01'),
(10, 'OOPS', 'BCA-03', 3, 'false', '2024-10-04 06:27:19', '2024-10-04 06:27:19'),
(11, 'JAVA', 'BCA-04', 4, 'false', '2024-10-04 06:28:19', '2024-10-04 06:28:19'),
(12, 'RDBMS', 'BCA-04', 4, 'false', '2024-10-04 06:28:29', '2024-10-04 06:28:29'),
(13, 'PHP', 'BCA-05', 5, 'false', '2024-10-04 06:28:38', '2024-10-04 06:28:38'),
(14, 'DotNet', 'BCA-05', 5, 'false', '2024-10-04 06:28:50', '2024-10-04 06:28:50'),
(15, 'CC (Cloud Computing)', 'BCA-05', 5, 'false', '2024-10-04 06:29:25', '2024-10-04 06:29:25'),
(16, 'Python', 'BCA-06', 6, 'false', '2024-10-04 06:29:42', '2024-10-04 06:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` varchar(6) NOT NULL DEFAULT 'false',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2a$12$0U/NS1xKVowf7bLU/c2yCO2pqJIL8dftQoi5lP6lMAuJcRTztdwye', 1, 'false', 'T2BBwwlDWwrnJeKrlhNl2uqv2D8TAa7tH9KXI4oaD1H66TRap65oyXu2lehE', '2023-01-03 08:24:14', '2023-01-03 08:24:14'),
(2, 'faculty', 'faculty@gmail.com', NULL, '$2a$12$yATju7zoh1bZFWeEFAfeyODkuDVxXvX3heu.0Vu2htqLLtj6ZNUju', 2, 'false', NULL, '2023-01-03 08:24:52', '2023-01-03 08:24:52'),
(4, 'student', 'student@gmail.com', NULL, '$2y$10$Q4Wyk5BVG4z2ecNW15qTyeHT/PrTeGKon160SS0Pg0dNlU.AQoxnW', 3, 'false', NULL, '2023-01-03 08:27:17', '2023-01-03 08:27:17'),
(19, 'faculty 2', 'faculty2@gmail.com', NULL, '$2y$10$5NOOuDur9soyc5kQ4NVc7.ON70UDvUMuKb7YHWM6fbqQ8z.mvHway', 2, 'false', NULL, '2024-10-03 01:23:20', '2024-10-03 01:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignclasses`
--
ALTER TABLE `assignclasses`
  ADD PRIMARY KEY (`assignClassId`),
  ADD KEY `assignclasses_classid_foreign` (`classId`),
  ADD KEY `assignclasses_id_foreign` (`id`);

--
-- Indexes for table `assignsubjects`
--
ALTER TABLE `assignsubjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignsubjects_subject_id_foreign` (`subject_id`),
  ADD KEY `assignsubjects_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `attendance_statuses`
--
ALTER TABLE `attendance_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_statuses_fill_attendance_id_foreign` (`fill_attendance_id`),
  ADD KEY `attendance_statuses_student_id_foreign` (`student_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classId`),
  ADD UNIQUE KEY `classes_classcode_unique` (`classCode`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fill_attendances`
--
ALTER TABLE `fill_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_subject_name_unique` (`subject_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignclasses`
--
ALTER TABLE `assignclasses`
  MODIFY `assignClassId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assignsubjects`
--
ALTER TABLE `assignsubjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attendance_statuses`
--
ALTER TABLE `attendance_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fill_attendances`
--
ALTER TABLE `fill_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignclasses`
--
ALTER TABLE `assignclasses`
  ADD CONSTRAINT `assignclasses_classid_foreign` FOREIGN KEY (`classId`) REFERENCES `classes` (`classId`),
  ADD CONSTRAINT `assignclasses_id_foreign` FOREIGN KEY (`id`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `assignsubjects`
--
ALTER TABLE `assignsubjects`
  ADD CONSTRAINT `assignsubjects_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignsubjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance_statuses`
--
ALTER TABLE `attendance_statuses`
  ADD CONSTRAINT `attendance_statuses_fill_attendance_id_foreign` FOREIGN KEY (`fill_attendance_id`) REFERENCES `fill_attendances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_statuses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
