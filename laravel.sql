-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2020 lúc 09:39 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `archivements`
--

CREATE TABLE `archivements` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'Danh Mục Tin Tức', 'news', 1, 10, '2020-09-20 04:04:50', '2020-09-20 04:04:50'),
(13, 'Danh Mục Thông Báo', 'notification', 1, 10, '2020-09-21 04:05:15', '2020-09-21 04:05:15'),
(14, 'Trang Giới Thiệu', 'about', 1, 10, '2020-09-20 04:17:13', '2020-09-20 04:17:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_sessions` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `name`, `number_of_sessions`, `start_date`, `finish_date`, `teacher_id`, `level_id`, `course_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Lớp số 10', 24, '2020-09-21', '2020-11-11', 13, 6, 13, 10, 1, '2020-09-20 04:32:36', '2020-09-20 04:52:01'),
(13, 'Lớp số 11', 24, '2020-09-21', '2020-11-11', 13, 6, 14, 10, 1, '2020-09-20 04:32:58', '2020-09-20 04:52:06'),
(14, 'Lớp số 12', 24, '2020-12-21', '2021-01-16', 14, 6, 14, 10, 1, '2020-09-20 04:33:25', '2020-09-21 08:24:37'),
(15, 'Lớp số 13', 24, '2020-09-20', '2020-09-25', NULL, 6, 13, 10, 1, '2020-09-20 04:34:37', '2020-09-20 04:34:37'),
(16, 'Lớp số 14', 24, '2020-09-27', '2020-09-30', NULL, 7, 13, 10, 1, '2020-09-20 04:34:58', '2020-09-20 04:34:58'),
(17, 'Lớp số 15', 24, '2020-09-21', '2020-11-11', NULL, 7, 11, 10, 1, '2020-09-20 04:35:58', '2020-09-20 05:32:59'),
(18, 'Lớp số 16', 24, '2020-09-27', '2020-09-30', NULL, 6, 11, 10, 1, '2020-09-20 04:36:22', '2020-09-20 04:36:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `start_date`, `finish_date`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 'khóa 10', '2020-09-20', '2020-11-20', 10, 1, '2020-09-19 14:35:33', '2020-09-19 14:35:33'),
(12, 'khóa 20', '2020-09-20', '2020-10-23', 10, 1, '2020-09-19 14:35:49', '2020-09-19 14:35:49'),
(13, 'khóa 30', '2020-09-20', '2020-10-24', 10, 1, '2020-09-19 14:36:03', '2020-09-19 14:36:03'),
(14, 'khóa 40', '2020-09-19', '2020-09-27', 10, 1, '2020-09-19 14:36:20', '2020-09-19 14:36:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_learned_class`
--

CREATE TABLE `history_learned_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `homeworks_history`
--

CREATE TABLE `homeworks_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `question_and_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `selected_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeout` datetime NOT NULL,
  `timetart` datetime NOT NULL,
  `quiz` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `homeworks_history`
--

INSERT INTO `homeworks_history` (`id`, `student_id`, `level_id`, `question_and_answer`, `correct_answer`, `selected_answer`, `timeout`, `timetart`, `quiz`, `score`, `created_at`, `updated_at`) VALUES
(1, 17, 6, '{ \"Which of the following is NOT implied by the author?\" :{ \"A\" : \"Foot races appeal to a variety of people\" , \"B\" : \"Walkers can compete for prizes\" , \"C\" : \"Entering a race is a way to give support to an organization\" , \"D\" : \"Running is a good way to strengthen the heart\" }, \"The word “bystander” refers to __________.\" :{ \"A\" : \"a spectator\" , \"B\" : \"a judge\" , \"C\" : \"a participant\" , \"D\" : \"a walker\" }, \"The phrase “to a good cause” could be best replaced by which of the following?\" :{ \"A\" : \"to reward the winner\" , \"B\" : \"to protect a wise investment\" , \"C\" : \"for a good purpose\" , \"D\" : \"for an award\" }, \"Which of the following is NOT mentioned in this passage?\" :{ \"A\" : \"Some runners were ready to put out a fire\" , \"B\" : \"Some runners looked like Elvis Presley\" , \"C\" : \"Some runners were participating in a wedding\" , \"D\" : \"Some runners were serious about winning\" }, \"The word “camaraderie” as used in line 2 could be best replaced by which of the following _______.\" :{ \"A\" : \"views\" , \"B\" : \"companionship\" , \"C\" : \"games\" , \"D\" : \"jokes\" }, \"I think it’s impossible to abolish school examinations. They are necessary to evaluate students’ progress.\" :{ \"A\" : \"continue\" , \"B\" : \"extinguish\" , \"C\" : \"organize\" , \"D\" : \"stop\" }, \"He revealed his intentions of leaving the company to the manager during the office dinner party\" :{ \"A\" : \"concealed\" , \"B\" : \"disclosed\" , \"C\" : \"misled\" , \"D\" : \"influenced\" }, \"“I’m sorry I gave you the wrong number”, said Paul to Susan.\" :{ \"A\" : \"Paul apologized to Susan for having given the wrong number.\" , \"B\" : \"Paul accused Susan of having given him the wrong number.\" , \"C\" : \"Paul thanked to Susan for giving the wrong number.\" , \"D\" : \"Paul denied giving Susan the wrong number.\" }, \"I needn’t have watered the garden because it came down in torrents after that.\" :{ \"A\" : \"If only I had watered the garden before it came down in torrents.\" , \"B\" : \"It’s a pity I had watered the garden before it came down in torrents\" , \"C\" : \"I regret having watered the garden before it came down in torrents\" , \"D\" : \"If it had came down in torrents, I wouldn’t have watered the garden\" }, \"The students complained that the teacher was inexperienced.\" :{ \"A\" : \"The teacher was popular despite his inexperience.\" , \"B\" : \"The teacher was favored because of his inexperience.\" , \"C\" : \"The students praised the teacher for his inexperience.\" , \"D\" : \"The teacher was not supported for his inexperience.\" }}', '{ \"Which of the following is NOT implied by the author?\" :{ \"D\":\"Running is a good way to strengthen the heart\" }, \"The word “bystander” refers to __________.\" :{ \"A\":\"a spectator\" }, \"The phrase “to a good cause” could be best replaced by which of the following?\" :{ \"C\":\"for a good purpose\" }, \"Which of the following is NOT mentioned in this passage?\" :{ \"A\":\"Some runners were ready to put out a fire\" }, \"The word “camaraderie” as used in line 2 could be best replaced by which of the following _______.\" :{ \"B\":\"companionship\" }, \"I think it’s impossible to abolish school examinations. They are necessary to evaluate students’ progress.\" :{ \"A\":\"continue\" }, \"He revealed his intentions of leaving the company to the manager during the office dinner party\" :{ \"A\":\"concealed\" }, \"“I’m sorry I gave you the wrong number”, said Paul to Susan.\" :{ \"A\":\"Paul apologized to Susan for having given the wrong number.\" }, \"I needn’t have watered the garden because it came down in torrents after that.\" :{ \"C\":\"I regret having watered the garden before it came down in torrents\" }, \"The students complained that the teacher was inexperienced.\" :{ \"D\":\"The teacher was not supported for his inexperience.\" }}', '{ \"Which of the following is NOT implied by the author?\" :\"undefined\", \"The word “bystander” refers to __________.\" :\"undefined\", \"The phrase “to a good cause” could be best replaced by which of the following?\" :\"undefined\", \"Which of the following is NOT mentioned in this passage?\" :\"undefined\", \"The word “camaraderie” as used in line 2 could be best replaced by which of the following _______.\" :\"undefined\", \"I think it’s impossible to abolish school examinations. They are necessary to evaluate students’ progress.\" :\"undefined\", \"He revealed his intentions of leaving the company to the manager during the office dinner party\" :\"undefined\", \"“I’m sorry I gave you the wrong number”, said Paul to Susan.\" :\"undefined\", \"I needn’t have watered the garden because it came down in torrents after that.\" :\"undefined\", \"The students complained that the teacher was inexperienced.\" :\"undefined\"}', '2020-09-21 01:49:44', '2020-09-21 01:39:44', 3, 0, '2020-09-20 18:39:44', '2020-09-20 18:39:44'),
(2, 17, 6, '{ \"Do you know that ________ longest river in ________ world is ________ Nile?\" :{ \"A\" : \"the/the/the\" , \"B\" : \"a/the/the\" , \"C\" : \"x/the/a\" , \"D\" : \"the/the/x\" }, \"Lightweight luggage enables you to manage easily even when fully ________\" :{ \"A\" : \"crowded\" , \"B\" : \"loaded\" , \"C\" : \"carried\" , \"D\" : \"packed\" }, \"The revolving door remained ________ because Posey was pushing on it the wrong way.\" :{ \"A\" : \"station\" , \"B\" : \"stationed\" , \"C\" : \"stationary\" , \"D\" : \"stationery\" }, \"________ at the airport more early, he would have met his friend.\" :{ \"A\" : \"Than he arrived\" , \"B\" : \"Had he arrived\" , \"C\" : \"When he arrived\" , \"D\" : \"He has arrived\" }, \"You must have forgotten to send the email, ________ there’s nothing in my inbox.\" :{ \"A\" : \"because of\" , \"B\" : \"for\" , \"C\" : \"due to\" , \"D\" : \"owning to\" }, \"The wine had made him a little ________ and couldn’t control his movement.\" :{ \"A\" : \"light-headed\" , \"B\" : \"narrow-minded\" , \"C\" : \"light-hearted\" , \"D\" : \"light-footed\" }, \"My little girl is tired now because she ________ all day.\" :{ \"A\" : \"studies\" , \"B\" : \"studied\" , \"C\" : \"has been studying\" , \"D\" : \"has studied\" }, \"The new director has really got things ________.\" :{ \"A\" : \"flying\" , \"B\" : \"running\" , \"C\" : \"jogging\" , \"D\" : \"moving\" }, \"________________________, he left the hall quickly.\" :{ \"A\" : \"Not be rewarded with a smile\" , \"B\" : \"Not rewarding with a smile\" , \"C\" : \"Not having rewarded with a smile\" , \"D\" : \"Not being rewarded with a smile\" }, \"We were ________ a mile of our destination when we ran out of petrol.\" :{ \"A\" : \"hardly\" , \"B\" : \"only\" , \"C\" : \"within\" , \"D\" : \"inside\" }}', '{ \"Do you know that ________ longest river in ________ world is ________ Nile?\" :{ \"D\":\"the/the/x\" }, \"Lightweight luggage enables you to manage easily even when fully ________\" :{ \"D\":\"packed\" }, \"The revolving door remained ________ because Posey was pushing on it the wrong way.\" :{ \"C\":\"stationary\" }, \"________ at the airport more early, he would have met his friend.\" :{ \"B\":\"Had he arrived\" }, \"You must have forgotten to send the email, ________ there’s nothing in my inbox.\" :{ \"B\":\"for\" }, \"The wine had made him a little ________ and couldn’t control his movement.\" :{ \"A\":\"light-headed\" }, \"My little girl is tired now because she ________ all day.\" :{ \"C\":\"has been studying\" }, \"The new director has really got things ________.\" :{ \"D\":\"moving\" }, \"________________________, he left the hall quickly.\" :{ \"D\":\"Not being rewarded with a smile\" }, \"We were ________ a mile of our destination when we ran out of petrol.\" :{ \"C\":\"within\" }}', '{ \"Do you know that ________ longest river in ________ world is ________ Nile?\" : \"B\" , \"Lightweight luggage enables you to manage easily even when fully ________\" : \"C\" , \"The revolving door remained ________ because Posey was pushing on it the wrong way.\" : \"C\" , \"________ at the airport more early, he would have met his friend.\" : \"C\" , \"You must have forgotten to send the email, ________ there’s nothing in my inbox.\" : \"B\" , \"The wine had made him a little ________ and couldn’t control his movement.\" : \"A\" , \"My little girl is tired now because she ________ all day.\" : \"C\" , \"The new director has really got things ________.\" : \"C\" , \"________________________, he left the hall quickly.\" : \"C\" , \"We were ________ a mile of our destination when we ran out of petrol.\" : \"C\" }', '2020-09-21 15:18:35', '2020-09-21 15:17:53', 1, 5, '2020-09-21 08:17:53', '2020-09-21 08:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` bigint(20) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `levels`
--

INSERT INTO `levels` (`id`, `level`, `description`, `fee`, `user_id`, `image`) VALUES
(6, 450, 'level 450+', 2000000, 10, 'images/nHtp2Ffr4DS3ptB4GGqIUl6fdquqjBwK5iuLPstE.jpeg'),
(7, 550, 'level 550+', 3000000, 10, 'images/QR0uGqijTVKdiZjIUuKtkWiU136FSdHY2KUSHTfh.jpeg'),
(8, 900, 'level 900+', 4000000, 10, 'images/ZSaPHfE8oXjZLVXJqoFbEWXA9Uay3fDu3wW7PkI9.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_06_025727_create_users_table', 1),
(2, '2020_07_06_025916_create_levels_table', 1),
(3, '2020_07_06_030055_create_questions_test_table', 1),
(4, '2020_07_06_032312_create_settings_table', 1),
(5, '2020_07_06_032359_create_tests_table', 1),
(6, '2020_07_26_081804_create_categories_table', 1),
(7, '2020_07_26_083514_create__notifications_table', 1),
(8, '2020_07_26_093514_create_news_table', 1),
(9, '2020_08_04_074959_create_courses_table', 1),
(10, '2020_08_04_104104_create_classes_table', 1),
(11, '2020_08_04_104627_create_students_table', 1),
(12, '2020_08_04_105055_create_feedback_table', 1),
(13, '2020_08_04_105833_create_enrollments_table', 1),
(14, '2020_08_04_110216_create_history_learned_class_table', 1),
(15, '2020_08_04_115854_create_schedules_table', 1),
(16, '2020_08_04_120102_create_archivements_table', 1),
(17, '2020_08_08_231739_create_revenues_table', 1),
(18, '2020_08_08_231925_create_waiting_lists_table', 1),
(19, '2020_08_29_223801_create_quiz_test_table', 1),
(20, '2020_09_04_142024_create_homeworks_history_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `view` int(11) NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `type`, `image`, `status`, `view`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 'CHƯƠNG TRÌNH GIÚP GIỎI TIẾNG ANH CHO NGƯỜI MỚI BẮT ĐẦU', 'Đội ngũ thầy cô đào tạo chuyên nghiệp với kinh nghiệm giảng dạy tối thiểu 2 năm sẽ tư vấn giúp bạn cách học hiệu quả nhất!', '<p><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px; text-align: justify;\">Đặc biệt - các khóa học chỉ kéo dài từ 3-6 tháng với lịch học 4 buổi/ tuần (2 buổi cố định, 2 buổi phát âm và khoá học tiếng anh giao tiếp với giáo viên bản ngữ vào mỗi cuối tuần)</span><br></p><p><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px; text-align: justify;\">Lộ trình học tập được cá nhân hoá để phù hợp với trình độ đầu vào của từng học viên, đảm bảo học viên có thể tiến bộ trong thời gian ngắn nhất</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px; text-align: justify;\">Ứng dụng phương pháp Flipped Learning giúp học viên dễ dàng tiếp thu bài giảng và tiến bộ ngay sau từng buổi học</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 13px;\">3 tháng cuối: Giúp hoc viên hoàn toàn tự tin sử dụng các kĩ năng Nghe- Nói- Đọc- Viết, tự tin giao tiếp với người nước ngoài bằng phản xạ tự nhiên.</span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px; text-align: justify;\"><br></span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px; text-align: justify;\"><br></span><span style=\"background-color: transparent; color: rgb(97, 97, 97); font-family: Montserrat, sans-serif; font-size: 13px; text-align: justify;\"><br></span></p>', 'about', 'images/mWuUBOYFZB12tpNuCOEjXoeVKthzDY3pcmITVsHR.jpeg', 1, 0, 12, 10, '2020-09-20 04:09:43', '2020-09-20 04:09:43'),
(12, 'Tầm quan trọng của việc học tiếng Anh trong thời kỳ hội nhập.', 'Tiếng Anh là một thứ tiếng không có gì xa lạ với tất cả chúng ta, có lẽ Tôi và Bạn ai cũng biết tiếng Anh là ngôn ngữ phổ biến và được sử dụng nhiều nhất thế giới,', '<p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 18px; text-align: justify;\">Tiếng Anh là một thứ tiếng không có gì xa lạ với tất cả chúng ta, có lẽ Tôi và Bạn ai cũng biết tiếng Anh là ngôn ngữ phổ biến và được sử dụng nhiều nhất thế giới, đối với các Quốc gia thì ngoài tiếng mẹ đẻ ( hay tiếng bản địa ) thì họ còn dùng tiếng Anh như là một ngôn ngữ thứ 2 trong giao tiếp.</span></p><p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\">Hiểu được tầm quan trọng của việc học tiếng Anh, Trung tâm Ngoại ngữ Hà Nội có địa chỉ 449 Hoàng Quốc Việt, Cầu giấy khai giảng liên tục các khóa đào tạo tiếng Anh từ cơ bản đến nâng cao, các khóa luyện thi Toeic, Toefl, Ielts.</span></p><p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\">Là cơ sở được sự tín nhiệm của Sở giáo dục và đào tạo Hà Nội cấp giấy phép hoạt động từ năm 2006, đến nay trung tâm đã có được những thành công nhất định, cùng với lịch sử 14 năm kinh nghiệm trong chuyên môn đào tạo ngoại ngữ, Chúng tôi sẽ là điểm đến tri thức cho tất cả các bạn.</span></p><p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\">Với mục tiêu giúp tất các học viên nâng cao khả năng ngoại ngữ, những bài giảng của Trung tâm Ngoại ngữ Hà Nội luôn đươc thiết kế phù hợp với các khóa học dành cho mỗi đối tượng khác nhau từ chương trình tiếng Anh cơ bản đến các bài học nâng cao.</span><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\"><br></span><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\"><br></span></p><p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\"><br></span><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 18px; text-align: justify;\"><br></span>                                      </p>', 'new', 'images/Qws19BihzZWEEceGuCyDV33ZuyRGr8Zw1dGlQC1I.jpeg', 1, 0, 12, 10, '2020-09-20 04:11:25', '2020-09-20 04:11:25'),
(13, 'Phương pháp đào tạo tiếng Anh tại Trung tâm', 'Với thế mạnh về phương pháp giảng dạy chuyên sâu về tương tác, lấy học viên làm trọng tâm; đội ngũ giảng viên ưu tú, giàu kinh nghiệm, tận tâm và đầy nhiệt huyết; môi trường học thân thiện giúp học viên năng động và tự tin hơn trong quá trình học tập.', '<p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\">Với thế mạnh về phương pháp giảng dạy chuyên sâu về tương tác, lấy học viên làm trọng tâm; đội ngũ giảng viên ưu tú, giàu kinh nghiệm, tận tâm và đầy nhiệt huyết; môi trường học thân thiện giúp học viên năng động và tự tin hơn trong quá trình học tập.</span></p><p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\">Chương trình học được thiết kế đa dạng, phù hợp cho mọi đối tượng học viên; chúng tôi cam kết mang lại phương pháp giảng dạy tiếng Anh hiệu quả và chất lượng đến từng cá nhân, các đơn vị, tổ chức và Doanh nghiệp.</span></p><p><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\">Trung tâm Ngoại ngữ Hà Nội luôn đặt hiệu quả của mỗi khoá học tiếng Anh và thành công của mỗi học viên lên hàng đầu với mục tiêu giúp bạn chinh phục tiếng Anh theo cách đơn giản mà hiệu quả nhất.</span><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\"><br></span><span style=\"color: rgb(69, 78, 91); font-family: &quot;Open Sans&quot;, Helvetica, Arial, Verdana, sans-serif; font-size: 13px; text-align: justify;\"><br></span>                                      </p>', 'new', 'images/LJzESVLavQTWVz46M1TdJNx14Rv6zPS8XFdIPtNF.jpeg', 1, 0, 12, 10, '2020-09-20 04:12:15', '2020-09-20 04:12:15'),
(14, 'CHẤT LƯỢNG ĐẠT TIÊU CHUẨN QUỐC TẾ', 'CHẤT LƯỢNG ĐẠT TIÊU CHUẨN QUỐC TẾ', '<div><br></div><div><h5 class=\"title\" style=\"font-family: Roboto, sans-serif; line-height: 75px; color: rgb(191, 9, 51); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: 1.5rem; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; position: relative; min-height: 60px; font-weight: 700 !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; vertical-align: middle; display: inline-block; height: 44px; line-height: 30px; -webkit-tap-highlight-color: transparent !important;\">CHẤT LƯỢNG ĐẠT TIÊU CHUẨN QUỐC TẾ</span></h5><div class=\"description\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-family: Roboto, sans-serif; vertical-align: baseline; font-size: 15px; color: rgb(54, 54, 54); text-align: justify; line-height: 24px; -webkit-tap-highlight-color: transparent !important;\"><p style=\"font-family: inherit; margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; vertical-align: baseline; line-height: 1.6em; -webkit-tap-highlight-color: transparent !important;\"><div style=\"text-align: center;\"><span style=\"font-family: inherit; font-style: inherit; font-weight: inherit; background-color: transparent;\">VUS tự hào trở thành đơn vị đào tạo Anh ngữ đạt tiêu chuẩn toàn cầu được công nhận bởi NEAS, tổ chức độc lập quản lý chất lượng các trung tâm giảng dạy Anh ngữ quốc tế. Suốt 25 năm qua, chứng nhận Chất lượng NEAS đã xác nhận tiêu chuẩn cho nhiều trung tâm giảng dạy tiếng Anh hàng đầu thế giới. Một đơn vị giáo dục đạt chuẩn NEAS cần phải sở hữu những tiêu chí quốc tế:</span></div><div style=\"text-align: center;\"><span style=\"font-family: inherit; font-style: inherit; font-weight: inherit; background-color: transparent;\">- Chất lượng giảng dạy cao</span></div><div style=\"text-align: center;\"><span style=\"font-family: inherit; font-style: inherit; font-weight: inherit; background-color: transparent;\">- Khoá học đáp ứng nhu cầu học viên</span></div><div style=\"text-align: center;\"><span style=\"font-family: inherit; font-style: inherit; font-weight: inherit; background-color: transparent;\">- Công nghệ giảng dạy tiên tiến</span></div><div style=\"text-align: center;\"><span style=\"font-family: inherit; font-style: inherit; font-weight: inherit; background-color: transparent;\">- Môi trường học tập an toàn và hữu ích</span></div></p></div></div>', 'new', 'images/yo5lIr0INoJuTIHF2CjuPrvDXl54cVJiwc7OSUct.jpeg', 1, 0, 12, 10, '2020-09-20 04:30:39', '2020-09-20 04:30:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `status`, `is_active`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 'Lịch Khai Giảng Khóa Mới', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">Bộ Giáo dục và Đào tạo ban hành Quyết định 2084/QĐ-BGDĐT về khung kế hoạch thời gian năm học 2020-2021 đối với giáo dục mầm non, giáo dục phổ thông và giáo dục thường xuyên.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">Theo đó, cụ thể khung kế hoạch năm học 2020-2021 như sau:</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">- Tựu trường sớm nhất vào ngày 01 tháng 9 năm 2020.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">- Tổ chức khai giảng vào ngày 05 tháng 9 năm 2020. </p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">- Kết thúc học kỳ I trước ngày 16 tháng 01 năm 2021, hoàn thành kế hoạch giáo dục học kỳ II trước ngày 25 tháng 5 năm 2021 và kết thúc năm học trước ngày 31 tháng 5 năm 2021.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">- Xét công nhận hoàn thành chương trình tiểu học và xét công nhận tốt nghiệp trung học cơ sở (THCS) trước ngày 15 tháng 6 năm 2021.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">- Hoàn thành tuyển sinh vào lớp 10 trước ngày 31 tháng 7 năm 2021.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px; text-align: justify;\">- Thi tốt nghiệp trung học phổ thông (THPT), thi học sinh giỏi quốc gia và thi khoa học kĩ thuật cấp quốc gia theo hướng dẫn của Bộ Giáo dục và Đào tạo.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, \"open sans\", sans-serif; font-size: 15px;\">Quyết định 2084/QĐ-BGDĐT có hiệu lực từ ngày 27/7/2020.</p>', 1, 1, 13, 10, '2020-09-20 04:38:59', '2020-09-20 04:38:59'),
(12, 'Lịch Nghỉ lễ 2-9 Năm 2020', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; color: rgba(0, 0, 0, 0.87); text-align: justify;\">Hiện tại theo quy định của chính phủ thì lễ Quốc Khánh 2/9 sẽ được nghỉ 1 ngày. Nếu ngày lễ trùng với ngày nghỉ thì sẽ được hưởng ngày nghỉ bù theo đúng quy định. Tuy nhiên:</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; color: rgba(0, 0, 0, 0.87); text-align: justify;\">Từ năm 2021, người lao động được nghỉ 2 ngày dịp Quốc khánh 2/9. Đây là một trong những nội dung được Quốc hội thông qua sáng ngày 20/11/2019 trong Bộ luật Lao động (sửa đổi), có hiệu lực thi hành từ ngày 1/1/2021.Sau nhiều đề xuất, cuối cùng Quốc hội đã lựa chọn phương án người lao động được nghỉ Quốc khánh 2 ngày (hiện tại là 1 ngày) là ngày 2/9 và 1 ngày liền kề trước hoặc sau.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 8px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; color: rgba(0, 0, 0, 0.87); text-align: justify;\">Như vậy kể từ năm 2021, lịch nghỉ lễ Quốc khánh 2/9 sẽ là 2 ngày.</p>', 1, 1, 13, 10, '2020-09-20 04:41:38', '2020-09-20 04:41:38'),
(14, 'do dịch Covid-19, trung tâm cho học sinh nghỉ học để phòng tránh dịch.', '<p style=\"margin: 20px 0px; color: rgb(51, 51, 51); font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 18px;\">Thực hiện chỉ đạo của UBND tỉnh, Sở Giáo dục và Đào tạo tỉnh<span style=\"font-weight: bolder;\"> </span>đã cho học sinh cấp THPT và GDTX trên địa bàn tỉnh nghỉ học để phòng, chống dịch Covid-19 từ ngày hôm nay (27-3). Như vậy, sau gần một tháng đi học từ ngày 2-3, học sinh THPT và GDTX sẽ tiếp tục nghỉ học chờ khi có thông báo mới.</p><p style=\"margin: 20px 0px; color: rgb(51, 51, 51); font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 18px;\">Trước đó, cũng sau một tuần đi học từ ngày 9-3, học sinh mầm non, tiểu học và THCS tới ngày 15-3 tiếp tục được nghỉ học. Riêng học sinh THPT và GDTX trên địa bàn đã đi học từ ngày 2-3.</p><p style=\"margin: 20px 0px; color: rgb(51, 51, 51); font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 18px;\">Để bảo đảm kiến thức cho học sinh, thời gian qua tỉnh đã đẩy mạnh việc ứng dụng công nghệ thông tin vào việc dạy học theo hình thức online và chuẩn bị phối hợp đài truyền hình để tiến hành dạy học qua truyền hình...</p><p style=\"margin: 20px 0px; color: rgb(51, 51, 51); font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 18px;\">* Để phòng dịch Covid-19 đang có xu hướng diễn biến ngày càng phức tạp, khó lường, UBND tỉnh<span style=\"font-weight: bolder;\"> Điện Biên </span>quyết định cho học sinh mầm non, tiểu học, THCS (đang nghỉ học) sẽ tiếp tục nghỉ cho đến khi UBND tỉnh có thông báo mới.</p><p style=\"margin: 20px 0px; color: rgb(51, 51, 51); font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 18px;\">Với các trường THPT, DTNT, các trường cao đẳng, trung tâm giáo dục thường xuyên tỉnh; các trung tâm: Ngoại ngữ - tin học, giáo dục nghề nghiệp - giáo dục thường xuyên cấp huyện sẽ dừng việc dạy và học, kể từ ngày 28-3 đến khi UBND tỉnh có thông báo mới. Trước đó, học sinh các bậc này trên địa bàn tỉnh Điện Biên đã đi học trở lại từ ngày 2-3.</p>', 2, 1, 13, 10, '2020-09-20 04:47:11', '2020-09-20 04:47:11'),
(15, 'pppppppp', 'kkkkkkkkkk', 2, 1, 13, 10, '2020-09-21 08:17:13', '2020-09-21 08:17:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions_test`
--

CREATE TABLE `questions_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions_test`
--

INSERT INTO `questions_test` (`id`, `question`, `quiz_id`, `answer`, `correct_answer`, `status`, `level_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 'Do you know that ________ longest river in ________ world is ________ Nile?', 1, '{ \"A\" : \"the/the/the\" , \"B\" : \"a/the/the\" , \"C\" : \"x/the/a\" , \"D\" : \"the/the/x\" }', 'D', 1, 6, 10, '2020-09-20 05:43:47', '2020-09-20 05:43:47'),
(12, 'Lightweight luggage enables you to manage easily even when fully ________', 1, '{ \"A\" : \"crowded\" , \"B\" : \"loaded\" , \"C\" : \"carried\" , \"D\" : \"packed\" }', 'D', 1, 6, 10, '2020-09-20 05:44:48', '2020-09-20 05:44:48'),
(13, 'The revolving door remained ________ because Posey was pushing on it the wrong way.', 1, '{ \"A\" : \"station\" , \"B\" : \"stationed\" , \"C\" : \"stationary\" , \"D\" : \"stationery\" }', 'C', 1, 6, 10, '2020-09-20 05:47:13', '2020-09-20 05:47:13'),
(14, '________ at the airport more early, he would have met his friend.', 1, '{ \"A\" : \"Than he arrived\" , \"B\" : \"Had he arrived\" , \"C\" : \"When he arrived\" , \"D\" : \"He has arrived\" }', 'B', 1, 6, 10, '2020-09-20 05:48:06', '2020-09-20 05:48:06'),
(15, 'You must have forgotten to send the email, ________ there’s nothing in my inbox.', 1, '{ \"A\" : \"because of\" , \"B\" : \"for\" , \"C\" : \"due to\" , \"D\" : \"owning to\" }', 'B', 1, 6, 10, '2020-09-20 05:49:00', '2020-09-20 05:49:00'),
(16, 'The wine had made him a little ________ and couldn’t control his movement.', 1, '{ \"A\" : \"light-headed\" , \"B\" : \"narrow-minded\" , \"C\" : \"light-hearted\" , \"D\" : \"light-footed\" }', 'A', 1, 6, 10, '2020-09-20 05:49:52', '2020-09-20 05:49:52'),
(17, 'My little girl is tired now because she ________ all day.', 1, '{ \"A\" : \"studies\" , \"B\" : \"studied\" , \"C\" : \"has been studying\" , \"D\" : \"has studied\" }', 'C', 1, 6, 10, '2020-09-20 05:51:12', '2020-09-20 05:51:12'),
(18, 'The new director has really got things ________.', 1, '{ \"A\" : \"flying\" , \"B\" : \"running\" , \"C\" : \"jogging\" , \"D\" : \"moving\" }', 'D', 1, 6, 10, '2020-09-20 05:52:14', '2020-09-20 05:52:14'),
(19, '________________________, he left the hall quickly.', 1, '{ \"A\" : \"Not be rewarded with a smile\" , \"B\" : \"Not rewarding with a smile\" , \"C\" : \"Not having rewarded with a smile\" , \"D\" : \"Not being rewarded with a smile\" }', 'D', 1, 6, 10, '2020-09-20 05:53:08', '2020-09-20 05:53:08'),
(20, 'We were ________ a mile of our destination when we ran out of petrol.', 1, '{ \"A\" : \"hardly\" , \"B\" : \"only\" , \"C\" : \"within\" , \"D\" : \"inside\" }', 'C', 1, 6, 10, '2020-09-20 05:53:54', '2020-09-20 05:53:54'),
(21, 'The forecast has revealed that the world’s reserves of fossil fuel will have ________ by 2015.', 2, '{ \"A\" : \"taken over\" , \"B\" : \"caught up\" , \"C\" : \"run out\" , \"D\" : \"used off\" }', 'C', 1, 6, 10, '2020-09-20 05:59:03', '2020-09-20 05:59:03'),
(22, 'I usually buy my clothes ________. It’s cheaper than going to the dress maker.', 2, '{ \"A\" : \"on the shelf\" , \"B\" : \"on the house\" , \"C\" : \"in public\" , \"D\" : \"off the peg\" }', 'D', 1, 6, 10, '2020-09-20 05:59:44', '2020-09-20 05:59:44'),
(23, 'As ________ in Greek and Roman mythology, harpies were frightful monsters that were half woman and half bird.', 2, '{ \"A\" : \"description\" , \"B\" : \"describing\" , \"C\" : \"to describe\" , \"D\" : \"described\" }', 'D', 1, 6, 10, '2020-09-20 06:00:29', '2020-09-20 06:00:29'),
(24, 'Scientists have invented walls and windows that can block out the noise, which allows individuals to focus on their work without ________.', 2, '{ \"A\" : \"be disturbed\" , \"B\" : \"disturbing\" , \"C\" : \"being disturbed\" , \"D\" : \"being disturbing\" }', 'C', 1, 6, 10, '2020-09-20 06:01:11', '2020-09-20 06:01:11'),
(25, 'Televisions are now an everyday feature of most households in the United States, and television viewing is the number of one activity leisure.', 2, '{ \"A\" : \"everyday\" , \"B\" : \"activity leisure\" , \"C\" : \"most households\" , \"D\" : \"television viewing\" }', 'B', 1, 6, 10, '2020-09-20 06:02:39', '2020-09-20 06:02:39'),
(26, 'New sources of energy have been looking for as the number of fossil fuels continues to decrease.', 2, '{ \"A\" : \"New sources\" , \"B\" : \"been looking\" , \"C\" : \"fossil\" , \"D\" : \"continues\" }', 'B', 1, 6, 10, '2020-09-20 06:03:28', '2020-09-20 06:03:28'),
(27, 'Almost poetry is more enjoyable when it is read aloud.', 2, '{ \"A\" : \"is more\" , \"B\" : \"Almost\" , \"C\" : \"it is\" , \"D\" : \"enjoyable\" }', 'B', 1, 6, 10, '2020-09-20 06:04:15', '2020-09-20 06:04:15'),
(28, 'Which of the following best describes the organization of this passage?', 2, '{ \"A\" : \"chronological order\" , \"B\" : \"cause and result\" , \"C\" : \"statement and example\" , \"D\" : \"specific to general\" }', 'C', 1, 6, 10, '2020-09-20 06:05:04', '2020-09-20 06:05:04'),
(29, 'The main purpose of this passage is to ________________________.', 2, '{ \"A\" : \"describe a popular activity\" , \"B\" : \"give reasons for the popularity of the foot races\" , \"C\" : \"make fun of runners in costume\" , \"D\" : \"encourage people to exercise\" }', 'A', 1, 6, 10, '2020-09-20 06:05:55', '2020-09-20 06:05:55'),
(30, 'In what sentence(s) does the author give reasons for why people enter foot races?', 2, '{ \"A\" : \"Foot racing … and exercise.\" , \"B\" : \"Behind them … a fire horse.\" , \"C\" : \"The largest … 34 minutes.\" , \"D\" : \"People of all ages … in length.\" }', 'A', 1, 6, 10, '2020-09-20 06:06:39', '2020-09-20 06:06:39'),
(31, 'Which of the following is NOT implied by the author?', 3, '{ \"A\" : \"Foot races appeal to a variety of people\" , \"B\" : \"Walkers can compete for prizes\" , \"C\" : \"Entering a race is a way to give support to an organization\" , \"D\" : \"Running is a good way to strengthen the heart\" }', 'D', 1, 6, 10, '2020-09-20 06:11:43', '2020-09-20 06:11:43'),
(32, 'The word “bystander” refers to __________.', 3, '{ \"A\" : \"a spectator\" , \"B\" : \"a judge\" , \"C\" : \"a participant\" , \"D\" : \"a walker\" }', 'A', 1, 6, 10, '2020-09-20 06:12:20', '2020-09-20 06:12:20'),
(33, 'The phrase “to a good cause” could be best replaced by which of the following?', 3, '{ \"A\" : \"to reward the winner\" , \"B\" : \"to protect a wise investment\" , \"C\" : \"for a good purpose\" , \"D\" : \"for an award\" }', 'C', 1, 6, 10, '2020-09-20 06:13:01', '2020-09-20 06:13:01'),
(34, 'Which of the following is NOT mentioned in this passage?', 3, '{ \"A\" : \"Some runners were ready to put out a fire\" , \"B\" : \"Some runners looked like Elvis Presley\" , \"C\" : \"Some runners were participating in a wedding\" , \"D\" : \"Some runners were serious about winning\" }', 'A', 1, 6, 10, '2020-09-20 06:13:47', '2020-09-20 06:13:47'),
(35, 'The word “camaraderie” as used in line 2 could be best replaced by which of the following _______.', 3, '{ \"A\" : \"views\" , \"B\" : \"companionship\" , \"C\" : \"games\" , \"D\" : \"jokes\" }', 'B', 1, 6, 10, '2020-09-20 06:16:24', '2020-09-20 06:16:24'),
(36, 'I think it’s impossible to abolish school examinations. They are necessary to evaluate students’ progress.', 3, '{ \"A\" : \"continue\" , \"B\" : \"extinguish\" , \"C\" : \"organize\" , \"D\" : \"stop\" }', 'A', 1, 6, 10, '2020-09-20 06:18:58', '2020-09-20 06:18:58'),
(37, 'He revealed his intentions of leaving the company to the manager during the office dinner party', 3, '{ \"A\" : \"concealed\" , \"B\" : \"disclosed\" , \"C\" : \"misled\" , \"D\" : \"influenced\" }', 'A', 1, 6, 10, '2020-09-20 06:20:20', '2020-09-20 06:20:20'),
(38, '“I’m sorry I gave you the wrong number”, said Paul to Susan.', 3, '{ \"A\" : \"Paul apologized to Susan for having given the wrong number.\" , \"B\" : \"Paul accused Susan of having given him the wrong number.\" , \"C\" : \"Paul thanked to Susan for giving the wrong number.\" , \"D\" : \"Paul denied giving Susan the wrong number.\" }', 'A', 1, 6, 10, '2020-09-20 06:21:11', '2020-09-20 06:21:11'),
(39, 'I needn’t have watered the garden because it came down in torrents after that.', 3, '{ \"A\" : \"If only I had watered the garden before it came down in torrents.\" , \"B\" : \"It’s a pity I had watered the garden before it came down in torrents\" , \"C\" : \"I regret having watered the garden before it came down in torrents\" , \"D\" : \"If it had came down in torrents, I wouldn’t have watered the garden\" }', 'C', 1, 6, 10, '2020-09-20 06:22:13', '2020-09-20 06:22:13'),
(40, 'The students complained that the teacher was inexperienced.', 3, '{ \"A\" : \"The teacher was popular despite his inexperience.\" , \"B\" : \"The teacher was favored because of his inexperience.\" , \"C\" : \"The students praised the teacher for his inexperience.\" , \"D\" : \"The teacher was not supported for his inexperience.\" }', 'D', 1, 6, 10, '2020-09-20 06:23:37', '2020-09-20 06:23:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quiz_test`
--

CREATE TABLE `quiz_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `quiz` int(11) NOT NULL,
  `time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quiz_test`
--

INSERT INTO `quiz_test` (`id`, `user_id`, `level_id`, `quiz`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 6, 1, 10, 1, '2020-09-20 05:35:04', '2020-09-20 05:35:04'),
(2, 10, 6, 2, 10, 1, '2020-09-20 05:35:06', '2020-09-20 05:35:06'),
(3, 10, 6, 3, 10, 1, '2020-09-20 05:35:07', '2020-09-20 05:35:07'),
(4, 10, 6, 4, 10, 1, '2020-09-20 05:35:08', '2020-09-20 05:35:08'),
(5, 10, 6, 5, 10, 1, '2020-09-20 05:35:09', '2020-09-20 05:35:09'),
(6, 10, 6, 6, 10, 1, '2020-09-20 05:35:11', '2020-09-20 05:35:11'),
(7, 10, 6, 7, 10, 1, '2020-09-20 05:35:12', '2020-09-20 05:35:12'),
(8, 10, 6, 8, 10, 1, '2020-09-20 05:35:13', '2020-09-20 05:35:13'),
(9, 10, 6, 9, 10, 1, '2020-09-20 05:35:14', '2020-09-20 05:35:14'),
(10, 10, 6, 10, 10, 1, '2020-09-20 05:35:15', '2020-09-20 05:35:15'),
(11, 10, 6, 11, 10, 1, '2020-09-20 05:35:16', '2020-09-20 05:35:16'),
(12, 10, 6, 12, 10, 1, '2020-09-20 05:35:17', '2020-09-20 05:35:17'),
(13, 10, 6, 13, 10, 1, '2020-09-20 05:35:19', '2020-09-20 05:35:19'),
(14, 10, 6, 14, 10, 1, '2020-09-20 05:35:20', '2020-09-20 05:35:20'),
(15, 10, 6, 15, 10, 1, '2020-09-20 05:35:21', '2020-09-20 05:35:21'),
(16, 10, 6, 16, 10, 1, '2020-09-20 05:35:22', '2020-09-20 05:35:22'),
(17, 10, 6, 17, 10, 1, '2020-09-20 05:35:23', '2020-09-20 05:35:23'),
(18, 10, 6, 18, 10, 1, '2020-09-20 05:35:25', '2020-09-20 05:35:25'),
(19, 10, 6, 19, 10, 1, '2020-09-20 05:35:26', '2020-09-20 05:35:26'),
(20, 10, 6, 20, 10, 1, '2020-09-20 05:35:27', '2020-09-20 05:35:27'),
(21, 10, 6, 21, 10, 1, '2020-09-20 05:35:28', '2020-09-20 05:35:28'),
(22, 10, 6, 22, 10, 1, '2020-09-20 05:35:29', '2020-09-20 05:35:29'),
(23, 10, 6, 23, 10, 1, '2020-09-20 05:35:30', '2020-09-20 05:35:30'),
(24, 10, 6, 24, 10, 1, '2020-09-20 05:35:32', '2020-09-20 05:35:32'),
(25, 10, 7, 1, 10, 1, '2020-09-20 05:35:45', '2020-09-20 05:35:45'),
(26, 10, 7, 2, 10, 1, '2020-09-20 05:35:47', '2020-09-20 05:35:47'),
(27, 10, 7, 3, 10, 1, '2020-09-20 05:35:48', '2020-09-20 05:35:48'),
(28, 10, 7, 4, 10, 1, '2020-09-20 05:35:49', '2020-09-20 05:35:49'),
(29, 10, 7, 5, 10, 1, '2020-09-20 05:35:50', '2020-09-20 05:35:50'),
(30, 10, 7, 6, 10, 1, '2020-09-20 05:35:52', '2020-09-20 05:35:52'),
(31, 10, 7, 7, 10, 1, '2020-09-20 05:35:54', '2020-09-20 05:35:54'),
(32, 10, 7, 8, 10, 1, '2020-09-20 05:35:55', '2020-09-20 05:35:55'),
(33, 10, 7, 9, 10, 1, '2020-09-20 05:35:57', '2020-09-20 05:35:57'),
(34, 10, 7, 10, 10, 1, '2020-09-20 05:35:58', '2020-09-20 05:35:58'),
(35, 10, 7, 11, 10, 1, '2020-09-20 05:35:59', '2020-09-20 05:35:59'),
(36, 10, 7, 12, 10, 1, '2020-09-20 05:36:00', '2020-09-20 05:36:00'),
(37, 10, 7, 13, 10, 1, '2020-09-20 05:36:01', '2020-09-20 05:36:01'),
(38, 10, 7, 14, 10, 1, '2020-09-20 05:36:02', '2020-09-20 05:36:02'),
(39, 10, 7, 15, 10, 1, '2020-09-20 05:36:04', '2020-09-20 05:36:04'),
(40, 10, 7, 16, 10, 1, '2020-09-20 05:36:05', '2020-09-20 05:36:05'),
(41, 10, 7, 17, 10, 1, '2020-09-20 05:36:06', '2020-09-20 05:36:06'),
(42, 10, 7, 18, 10, 1, '2020-09-20 05:36:07', '2020-09-20 05:36:07'),
(43, 10, 7, 19, 10, 1, '2020-09-20 05:36:08', '2020-09-20 05:36:08'),
(44, 10, 7, 20, 10, 1, '2020-09-20 05:36:09', '2020-09-20 05:36:09'),
(45, 10, 7, 21, 10, 1, '2020-09-20 05:36:11', '2020-09-20 05:36:11'),
(46, 10, 7, 22, 10, 1, '2020-09-20 05:36:12', '2020-09-20 05:36:12'),
(47, 10, 7, 23, 10, 1, '2020-09-20 05:36:13', '2020-09-20 05:36:13'),
(48, 10, 7, 24, 10, 1, '2020-09-20 05:36:14', '2020-09-20 05:36:14'),
(49, 10, 8, 1, 10, 1, '2020-09-20 05:36:24', '2020-09-20 05:36:24'),
(50, 10, 8, 2, 10, 1, '2020-09-20 05:36:25', '2020-09-20 05:36:25'),
(51, 10, 8, 3, 10, 1, '2020-09-20 05:36:27', '2020-09-20 05:36:27'),
(52, 10, 8, 4, 10, 1, '2020-09-20 05:36:28', '2020-09-20 05:36:28'),
(53, 10, 8, 5, 10, 1, '2020-09-20 05:36:29', '2020-09-20 05:36:29'),
(54, 10, 8, 6, 10, 1, '2020-09-20 05:36:30', '2020-09-20 05:36:30'),
(55, 10, 8, 7, 10, 1, '2020-09-20 05:36:31', '2020-09-20 05:36:31'),
(56, 10, 8, 8, 10, 1, '2020-09-20 05:36:33', '2020-09-20 05:36:33'),
(57, 10, 8, 9, 10, 1, '2020-09-20 05:36:35', '2020-09-20 05:36:35'),
(58, 10, 8, 10, 10, 1, '2020-09-20 05:36:36', '2020-09-20 05:36:36'),
(59, 10, 8, 11, 10, 1, '2020-09-20 05:36:37', '2020-09-20 05:36:37'),
(60, 10, 8, 12, 10, 1, '2020-09-20 05:36:38', '2020-09-20 05:36:38'),
(61, 10, 8, 13, 10, 1, '2020-09-20 05:36:40', '2020-09-20 05:36:40'),
(62, 10, 8, 14, 10, 1, '2020-09-20 05:36:43', '2020-09-20 05:36:43'),
(63, 10, 8, 15, 10, 1, '2020-09-20 05:36:50', '2020-09-20 05:36:50'),
(64, 10, 8, 16, 10, 1, '2020-09-20 05:36:51', '2020-09-20 05:36:51'),
(65, 10, 8, 17, 10, 1, '2020-09-20 05:36:54', '2020-09-20 05:36:54'),
(66, 10, 8, 18, 10, 1, '2020-09-20 05:36:57', '2020-09-20 05:36:57'),
(67, 10, 8, 19, 10, 1, '2020-09-20 05:36:59', '2020-09-20 05:36:59'),
(68, 10, 8, 20, 10, 1, '2020-09-20 05:37:00', '2020-09-20 05:37:00'),
(69, 10, 8, 21, 10, 1, '2020-09-20 05:37:01', '2020-09-20 05:37:01'),
(70, 10, 8, 22, 10, 1, '2020-09-20 05:37:02', '2020-09-20 05:37:02'),
(71, 10, 8, 23, 10, 1, '2020-09-20 05:37:03', '2020-09-20 05:37:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenues`
--

CREATE TABLE `revenues` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `total` bigint(20) NOT NULL,
  `level_fee` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `weekday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `time` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `schedules`
--

INSERT INTO `schedules` (`id`, `weekday`, `slot`, `student_id`, `user_id`, `teacher_id`, `level_id`, `class_id`, `time`, `created_at`, `updated_at`) VALUES
(35, '2', '1', NULL, 10, 13, 6, 12, '2020-09-20', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(36, '3', '1', NULL, 10, 13, 6, 12, '2020-09-20', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(37, '4', '1', NULL, 10, 13, 6, 12, '2020-09-20', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(38, '2', '1', NULL, 10, 13, 6, 12, '2020-09-28', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(39, '3', '1', NULL, 10, 13, 6, 12, '2020-09-29', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(40, '4', '1', NULL, 10, 13, 6, 12, '2020-09-30', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(41, '2', '1', NULL, 10, 13, 6, 12, '2020-10-05', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(42, '3', '1', NULL, 10, 13, 6, 12, '2020-10-06', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(43, '4', '1', NULL, 10, 13, 6, 12, '2020-10-07', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(44, '2', '1', NULL, 10, 13, 6, 12, '2020-10-12', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(45, '3', '1', NULL, 10, 13, 6, 12, '2020-10-13', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(46, '4', '1', NULL, 10, 13, 6, 12, '2020-10-14', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(47, '2', '1', NULL, 10, 13, 6, 12, '2020-10-19', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(48, '3', '1', NULL, 10, 13, 6, 12, '2020-10-20', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(49, '4', '1', NULL, 10, 13, 6, 12, '2020-10-21', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(50, '2', '1', NULL, 10, 13, 6, 12, '2020-10-26', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(51, '3', '1', NULL, 10, 13, 6, 12, '2020-10-27', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(52, '4', '1', NULL, 10, 13, 6, 12, '2020-10-28', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(53, '2', '1', NULL, 10, 13, 6, 12, '2020-11-02', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(54, '3', '1', NULL, 10, 13, 6, 12, '2020-11-03', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(55, '4', '1', NULL, 10, 13, 6, 12, '2020-11-04', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(56, '2', '1', NULL, 10, 13, 6, 12, '2020-11-09', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(57, '3', '1', NULL, 10, 13, 6, 12, '2020-11-10', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(58, '4', '1', NULL, 10, 13, 6, 12, '2020-11-11', '2020-09-20 04:49:59', '2020-09-20 04:52:01'),
(59, '2', '2', NULL, 10, 13, 6, 13, '2020-09-21', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(60, '3', '2', NULL, 10, 13, 6, 13, '2020-09-22', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(61, '4', '2', NULL, 10, 13, 6, 13, '2020-09-23', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(62, '2', '2', NULL, 10, 13, 6, 13, '2020-09-28', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(63, '3', '2', NULL, 10, 13, 6, 13, '2020-09-29', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(64, '4', '2', NULL, 10, 13, 6, 13, '2020-09-30', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(65, '2', '2', NULL, 10, 13, 6, 13, '2020-10-05', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(66, '3', '2', NULL, 10, 13, 6, 13, '2020-10-06', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(67, '4', '2', NULL, 10, 13, 6, 13, '2020-10-07', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(68, '2', '2', NULL, 10, 13, 6, 13, '2020-10-12', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(69, '3', '2', NULL, 10, 13, 6, 13, '2020-10-13', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(70, '4', '2', NULL, 10, 13, 6, 13, '2020-10-14', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(71, '2', '2', NULL, 10, 13, 6, 13, '2020-10-19', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(72, '3', '2', NULL, 10, 13, 6, 13, '2020-10-20', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(73, '4', '2', NULL, 10, 13, 6, 13, '2020-10-21', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(74, '2', '2', NULL, 10, 13, 6, 13, '2020-10-26', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(75, '3', '2', NULL, 10, 13, 6, 13, '2020-10-27', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(76, '4', '2', NULL, 10, 13, 6, 13, '2020-10-28', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(77, '2', '2', NULL, 10, 13, 6, 13, '2020-11-02', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(78, '3', '2', NULL, 10, 13, 6, 13, '2020-11-03', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(79, '4', '2', NULL, 10, 13, 6, 13, '2020-11-04', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(80, '2', '2', NULL, 10, 13, 6, 13, '2020-11-09', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(81, '3', '2', NULL, 10, 13, 6, 13, '2020-11-10', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(82, '4', '2', NULL, 10, 13, 6, 13, '2020-11-11', '2020-09-20 04:50:15', '2020-09-20 04:52:06'),
(395, '2', '1', NULL, 10, 14, 6, 14, '2020-12-21', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(396, '3', '2', NULL, 10, 14, 6, 14, '2020-12-22', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(397, '4', '3', NULL, 10, 14, 6, 14, '2020-12-23', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(398, '5', '4', NULL, 10, 14, 6, 14, '2020-12-24', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(399, '6', '5', NULL, 10, 14, 6, 14, '2020-12-25', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(400, '7', '6', NULL, 10, 14, 6, 14, '2020-12-26', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(401, '2', '1', NULL, 10, 14, 6, 14, '2020-12-28', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(402, '3', '2', NULL, 10, 14, 6, 14, '2020-12-29', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(403, '4', '3', NULL, 10, 14, 6, 14, '2020-12-30', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(404, '5', '4', NULL, 10, 14, 6, 14, '2020-12-31', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(405, '6', '5', NULL, 10, 14, 6, 14, '2021-01-01', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(406, '7', '6', NULL, 10, 14, 6, 14, '2021-01-02', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(407, '2', '1', NULL, 10, 14, 6, 14, '2021-01-04', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(408, '3', '2', NULL, 10, 14, 6, 14, '2021-01-05', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(409, '4', '3', NULL, 10, 14, 6, 14, '2021-01-06', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(410, '5', '4', NULL, 10, 14, 6, 14, '2021-01-07', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(411, '6', '5', NULL, 10, 14, 6, 14, '2021-01-08', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(412, '7', '6', NULL, 10, 14, 6, 14, '2021-01-09', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(413, '2', '1', NULL, 10, 14, 6, 14, '2021-01-11', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(414, '3', '2', NULL, 10, 14, 6, 14, '2021-01-12', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(415, '4', '3', NULL, 10, 14, 6, 14, '2021-01-13', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(416, '5', '4', NULL, 10, 14, 6, 14, '2021-01-14', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(417, '6', '5', NULL, 10, 14, 6, 14, '2021-01-15', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(418, '7', '6', NULL, 10, 14, 6, 14, '2021-01-16', '2020-09-20 05:17:28', '2020-09-21 08:24:37'),
(419, '2', '1', NULL, 10, NULL, 7, 17, '2020-09-21', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(420, '3', '2', NULL, 10, NULL, 7, 17, '2020-09-22', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(421, '4', '3', NULL, 10, NULL, 7, 17, '2020-09-23', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(422, '2', '1', NULL, 10, NULL, 7, 17, '2020-09-28', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(423, '3', '2', NULL, 10, NULL, 7, 17, '2020-09-29', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(424, '4', '3', NULL, 10, NULL, 7, 17, '2020-09-30', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(425, '2', '1', NULL, 10, NULL, 7, 17, '2020-10-05', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(426, '3', '2', NULL, 10, NULL, 7, 17, '2020-10-06', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(427, '4', '3', NULL, 10, NULL, 7, 17, '2020-10-07', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(428, '2', '1', NULL, 10, NULL, 7, 17, '2020-10-12', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(429, '3', '2', NULL, 10, NULL, 7, 17, '2020-10-13', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(430, '4', '3', NULL, 10, NULL, 7, 17, '2020-10-14', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(431, '2', '1', NULL, 10, NULL, 7, 17, '2020-10-19', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(432, '3', '2', NULL, 10, NULL, 7, 17, '2020-10-20', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(433, '4', '3', NULL, 10, NULL, 7, 17, '2020-10-21', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(434, '2', '1', NULL, 10, NULL, 7, 17, '2020-10-26', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(435, '3', '2', NULL, 10, NULL, 7, 17, '2020-10-27', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(436, '4', '3', NULL, 10, NULL, 7, 17, '2020-10-28', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(437, '2', '1', NULL, 10, NULL, 7, 17, '2020-11-02', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(438, '3', '2', NULL, 10, NULL, 7, 17, '2020-11-03', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(439, '4', '3', NULL, 10, NULL, 7, 17, '2020-11-04', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(440, '2', '1', NULL, 10, NULL, 7, 17, '2020-11-09', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(441, '3', '2', NULL, 10, NULL, 7, 17, '2020-11-10', '2020-09-20 05:32:59', '2020-09-20 05:32:59'),
(442, '4', '3', NULL, 10, NULL, 7, 17, '2020-11-11', '2020-09-20 05:32:59', '2020-09-20 05:32:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `welcome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `welcome_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `welcome_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fanpage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `logo`, `slogan`, `phone`, `banner`, `address`, `welcome`, `welcome_content`, `welcome_image`, `breadcrumb`, `fanpage`, `email`, `created_at`, `updated_at`) VALUES
(12, 'images/VCL6rk37cmpBCVn0ujR4I7BdDYfX79FtIyPVNPWo.png', 'If I Fail, I Try Again And Again, And Again.', '0346504448', 'images/YOzEH8mqg9HQII1NslfqwBZvn4ueDeTBhvQxIaia.jpeg', 'Cao Đẳng FPT polytechnic hà nội', 'welcome to eduspace english', 'welcome to eduspace english Studying Is Not About Time. It’s About Effort', 'images/FXf65D6qqlKGvxv61ZeGWh3pPW0To8QRC4vmfWX0.jpeg', 'images/F1ApBsbiwRTa3wXAPvFp3LIWomOympkCu9KX2oCE.png', '<iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FEduspace-English-112035517310047&tabs=timeline&width=340&height=270&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId\" width=\"340\" height=\"270\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" allow=\"encrypted-media\"></iframe>', 'eduspace@gmail.com', NULL, '2020-09-20 03:48:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `fee_status` bigint(20) NOT NULL,
  `code_reset_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `fullname`, `code`, `avatar`, `date_of_birth`, `phone`, `email`, `address`, `password`, `class_id`, `status`, `fee_status`, `code_reset_password`, `created_at`, `updated_at`) VALUES
(13, 'tran tien phuc', 'PH001', 'images/kCr7h7oFIBoaAatuPM81sNEAzA83W5y4dkypYI7t.jpeg', '2020-09-10', '0346504448', 'trantienphduchgvt@gmail', 'hà nội mỹ đình 1', '$2y$10$EopkBUDlpltADJwTlO9iL.bsTdMVv/rJdbbl7jAL8y0rIHzVVJITG', 12, 1, 1, NULL, '2020-09-20 05:30:20', '2020-09-21 08:19:09'),
(14, 'nguyên quang trường', 'PH0013', 'images/4FHITnnvWrJxtRjACKzj8tK6SvKGHJhw3dWnJ2dy.jpeg', '2020-09-01', '0346504448', 'quangtruong2491998@gmail.com', 'hà nội hà nội', '$2y$10$4quEJ1r5EUT9g8yg6dJ0B.lwewXQ0lwpb4DsdLnVbj44pmdRYqixq', 12, 1, 0, NULL, '2020-09-20 05:31:32', '2020-09-20 05:31:32'),
(15, 'ngô ngọc minh', 'PH0014', 'images/5rwBR2brLRGHbX0mfx6nTEEI8QWO5yXol4K4EuYr.jpeg', '2020-09-03', '0346504448', 'minhnn@gmail.com', 'hà nội mỹ đình 2', '$2y$10$b0XX61WTMMa8CGGIrkPn/Ous7qbD/mCBoWR5gM8BEbHGAebR8uQ.6', 17, 1, 0, NULL, '2020-09-20 05:33:50', '2020-09-20 05:33:50'),
(16, 'vũ anh quân', 'PH0015', 'images/v6BcmXYuesb0cqSJaQd4DzDmFyLmqg8JQsDRcRo9.jpeg', '2020-09-17', '0346504448', 'quannv@gmail.com', 'hà nội mỹ đình 3', '$2y$10$cS7OIt4uLUb1bIz20EPEJee2nozghslJrdgcYQ.oYOg6TkM5RjCdG', 17, 1, 0, NULL, '2020-09-20 05:34:28', '2020-09-20 05:34:28'),
(17, 'student', 'PH0016', 'images/B9hO51JKMDn1xM0P7OfZZQ64yIzqpFGzUSBHGiIA.jpeg', '2020-09-16', '0346504448', 'student@gmail.com', 'hà nội mỹ đình', '$2y$10$NG2yL09THwql4mPDx0EmLeV.UAJ2375gYlQTef.1AY4ZYHfUySy6W', 12, 1, 0, NULL, '2020-09-20 06:27:48', '2020-09-20 06:27:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_test_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_reset_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_reset_password` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `password`, `fullname`, `avatar`, `address`, `date_of_birth`, `phone`, `email`, `code_reset_password`, `time_reset_password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(10, '$2y$10$jWAK3sbZ/PZfVUbzYXdk8.dfe92qaZl/nMRwjJ1wbNLpXutuzH8GO', 'Giám Đốc A', 'https://lorempixel.com/150/150/cats/?42143', 'hà nội', '1994-08-11', '0123456789', 'direction@gmail.com', NULL, NULL, 5, 1, '2020-09-19 14:15:25', '2020-09-21 08:23:31'),
(11, '$2y$10$waBQZoJoEaEKEBToq3R/QO0lGuEsHsIxPPqFoapYyIVW3CLNfa/Xq', 'Quản Lý A', 'images/mJXfdhklHtEGtJkl6HKeMtatIGUWWNSinZ5HaiF7.jpeg', 'mỹ đình hà nội', '2018-01-31', '0346504448', 'manage@gmail.com', NULL, NULL, 3, 1, '2020-09-20 03:55:12', '2020-09-20 03:59:19'),
(12, '$2y$10$7ZQzhegTqcnGK2Vpq44vru3KFVzF/ct3RmXpkLLti27i1/hqQIyEW', 'Admin A', 'images/9gxHzlD1R3JW8wz0JuOmRSgaBhtigDv9LMiIWGU0.jpeg', 'hà nội mỹ đình', '2020-09-09', '0346504448', 'admin@gmail.com', NULL, NULL, 2, 1, '2020-09-20 03:56:43', '2020-09-20 03:56:43'),
(13, '$2y$10$TO2Eby4yc/xwF2rLM03jSel1F.3jMi8OypD/QFohq/qzgygl.cQHq', 'Giảng Viên A', 'images/xpEL7J0psBgMXTem5CQiI30fKZzgk5BGbwdHCge9.jpeg', 'hà nội mỹ đình', '2020-09-15', '0346504448', 'teachera@gmail.com', NULL, NULL, 4, 1, '2020-09-20 03:57:35', '2020-09-20 03:57:35'),
(14, '$2y$10$5CTkC6uIsbPc0JOhqf638.rYmnO/KMsi7mN3W29oNKq182.qD54t2', 'Giảng Viên B', 'images/wuSji9LW3Ufgofn5O42tJ1F8sjr3QpbOkoDBxBVm.jpeg', 'hà nội mỹ đình', '2020-09-11', '0346504448', 'teacherb@gmail.com', NULL, NULL, 4, 1, '2020-09-20 03:58:20', '2020-09-20 03:58:20'),
(15, '$2y$10$331EAs/A9HoAQjajgUVG7ebki/D7x44RKUjFwUMMhg2DA3yjMcqcW', 'Giảng Viên C', 'images/P7Fnd23UF93xcwljBO8d4MIzVLLRG92wd0uzgZ1z.jpeg', 'hà nội mỹ đình', '2020-09-14', '0346504448', 'teacherc@gmail', NULL, NULL, 4, 1, '2020-09-20 03:59:08', '2020-09-20 03:59:08'),
(16, '$2y$10$kbefTpJRPveICVw.28EjEeEt01QoY5/sfUmUIWEC95mpZu4ZNIshq', 'Giảng Viên D', 'images/fV6lxl3KiljPrSDCwSAKTi8LYJ6jw1wcX439IjLz.jpeg', 'hà nội mỹ đình', '2020-09-09', '0346504448', 'teacherd@gmail.com', NULL, NULL, 4, 1, '2020-09-20 03:59:56', '2020-09-20 03:59:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `waiting_lists`
--

CREATE TABLE `waiting_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `waiting_lists`
--

INSERT INTO `waiting_lists` (`id`, `fullname`, `date_of_birth`, `phone`, `address`, `slot`, `status`, `email`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'tran tien phuc chờ', '2020-09-16', '0346504448', 'hà nội mỹ đình', 1, 1, 'trantienphduchgvt@gmail', 6, '2020-09-20 04:53:26', '2020-09-20 04:53:26'),
(2, 'nguyên quang trường chờ', '2020-09-11', '0346504448', 'hà nội mỹ đình', 2, 1, 'truongnw@gmail.com', 7, '2020-09-20 05:27:45', '2020-09-20 05:27:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `archivements`
--
ALTER TABLE `archivements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivements_student_id_foreign` (`student_id`),
  ADD KEY `archivements_class_id_foreign` (`class_id`),
  ADD KEY `archivements_test_id_foreign` (`test_id`),
  ADD KEY `archivements_schedule_id_foreign` (`schedule_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_teacher_id_foreign` (`teacher_id`),
  ADD KEY `classes_level_id_foreign` (`level_id`),
  ADD KEY `classes_course_id_foreign` (`course_id`),
  ADD KEY `classes_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enrollments_email_unique` (`email`),
  ADD KEY `enrollments_level_id_foreign` (`level_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_student_id_foreign` (`student_id`),
  ADD KEY `feedback_class_id_foreign` (`class_id`);

--
-- Chỉ mục cho bảng `history_learned_class`
--
ALTER TABLE `history_learned_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_learned_class_student_id_foreign` (`student_id`),
  ADD KEY `history_learned_class_level_id_foreign` (`level_id`),
  ADD KEY `history_learned_class_course_id_foreign` (`course_id`),
  ADD KEY `history_learned_class_class_id_foreign` (`class_id`);

--
-- Chỉ mục cho bảng `homeworks_history`
--
ALTER TABLE `homeworks_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeworks_history_student_id_foreign` (`student_id`),
  ADD KEY `homeworks_history_level_id_foreign` (`level_id`);

--
-- Chỉ mục cho bảng `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levels_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_category_id_foreign` (`category_id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `questions_test`
--
ALTER TABLE `questions_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_test_level_id_foreign` (`level_id`),
  ADD KEY `questions_test_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `quiz_test`
--
ALTER TABLE `quiz_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_test_user_id_foreign` (`user_id`),
  ADD KEY `quiz_test_level_id_foreign` (`level_id`);

--
-- Chỉ mục cho bảng `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revenues_course_id_foreign` (`course_id`);

--
-- Chỉ mục cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_user_id_foreign` (`user_id`),
  ADD KEY `schedules_teacher_id_foreign` (`teacher_id`),
  ADD KEY `schedules_level_id_foreign` (`level_id`),
  ADD KEY `schedules_class_id_foreign` (`class_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_email_unique` (`email`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Chỉ mục cho bảng `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_email_unique` (`email`),
  ADD KEY `tests_question_test_id_foreign` (`question_test_id`),
  ADD KEY `tests_level_id_foreign` (`level_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `email` (`email`);

--
-- Chỉ mục cho bảng `waiting_lists`
--
ALTER TABLE `waiting_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `waiting_lists_email_unique` (`email`),
  ADD KEY `waiting_lists_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `archivements`
--
ALTER TABLE `archivements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `history_learned_class`
--
ALTER TABLE `history_learned_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `homeworks_history`
--
ALTER TABLE `homeworks_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `questions_test`
--
ALTER TABLE `questions_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `quiz_test`
--
ALTER TABLE `quiz_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `waiting_lists`
--
ALTER TABLE `waiting_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `archivements`
--
ALTER TABLE `archivements`
  ADD CONSTRAINT `archivements_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archivements_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archivements_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archivements_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `history_learned_class`
--
ALTER TABLE `history_learned_class`
  ADD CONSTRAINT `history_learned_class_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_learned_class_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_learned_class_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_learned_class_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `homeworks_history`
--
ALTER TABLE `homeworks_history`
  ADD CONSTRAINT `homeworks_history_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `homeworks_history_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `questions_test`
--
ALTER TABLE `questions_test`
  ADD CONSTRAINT `questions_test_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_test_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `quiz_test`
--
ALTER TABLE `quiz_test`
  ADD CONSTRAINT `quiz_test_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `quiz_test_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `revenues`
--
ALTER TABLE `revenues`
  ADD CONSTRAINT `revenues_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tests_question_test_id_foreign` FOREIGN KEY (`question_test_id`) REFERENCES `questions_test` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `waiting_lists`
--
ALTER TABLE `waiting_lists`
  ADD CONSTRAINT `waiting_lists_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
