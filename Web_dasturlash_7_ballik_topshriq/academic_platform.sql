-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 22 2025 г., 04:24
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `academic_platform`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ca`
--

CREATE TABLE `ca` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `recipient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `teacher_id`) VALUES
(1, 'Web dasturlash', 'Bekcend qisimlar toliq darslik', NULL),
(2, 'Bulult hioblash', 'Ki 1/23 guruhlari uchun', 14),
(3, 'Sxematexnika va robototexnika', 'Ki 1/23 guruhi uchun', 23);

-- --------------------------------------------------------

--
-- Структура таблицы `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `login_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` tinyint(4) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`, `teacher_id`, `test_id`) VALUES
(1, 2, '2025 yil chempionlar ligasida qaysi jamoa chempion boldi?', 'real', 'barsa', 'psg', 'paxtakor', 3, NULL, 0),
(2, 3, '1. P-tip yarim o‘tkazgichning asosiy xususiyati nima?', 'A) Teshiklar ko‘pligi', 'B) Kovaklar ko\'pligi', 'C) Elektronlar ko\'pligi', 'D) Neytronlar ko\'pligi', 1, NULL, 0),
(3, 3, '2. Bipolyar tranzistor nechta asosiy qismdan tashkil topgan?', '4', '5', '3', '2', 3, NULL, 0),
(4, 3, '3. Arduino Uno ning analog pinlari qanchta?', '10', '14', '20', '6', 4, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `score` int(11) DEFAULT 0,
  `total_questions` int(11) DEFAULT 0,
  `teacher_score` int(11) DEFAULT NULL,
  `teacher_feedback` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `results`
--

INSERT INTO `results` (`id`, `student_id`, `course_id`, `score`, `total_questions`, `teacher_score`, `teacher_feedback`, `created_at`) VALUES
(1, 7, 2, 80, 0, 55, 'chatgpt fodyalanilgan', '2025-06-21 12:56:23'),
(2, 7, 3, 3, 0, NULL, NULL, '2025-06-21 15:39:11');

-- --------------------------------------------------------

--
-- Структура таблицы `student_certificates`
--

CREATE TABLE `student_certificates` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `issued_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `test_results`
--

CREATE TABLE `test_results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher','student') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `avatar`) VALUES
(1, 'Farhodjon Olimov', 'olimovfarhodjon347@gmail.com', '$2y$10$kL9d8BY9rDUIePcGDP.lSOp6CkyEA9JLV8cgajJ8DY/rWYyodjrze', 'admin', '2025-06-18 21:55:09', NULL),
(6, 'Farhodjon Olimov', 'farhodjonolimov333@gamil.com', '$2y$10$wjUe55e5GeNimvbUa4FfMu91kXDeOyFZg0wOWY4ZJjtgq03V142a2', 'student', '2025-06-19 05:23:11', NULL),
(7, 'Farhodjon Olimov', 'olimovfarhodjon1@gmail.com', '$2y$10$i/R2gKtrPARZMYYzgmIZx.fKM1N9T./cgVsUArOkNgzVAnFv3sxY.', 'student', '2025-06-19 10:10:24', NULL),
(8, 'Farhodjon Olimov', 'olimovfarhodjon327@gmail.com', '$2y$10$/oxXiod1q5acwHqQK.kzpeoWxPyPqFuSP7ND/hrPz08l/4el1QRkC', 'student', '2025-06-19 11:10:25', NULL),
(13, 'Farhodjon Olimov', 'olimovfarhodjon77@gmail.com', '$2y$10$G3neCnfVLvBZrF2JBWWlv..DzmKaIJ891mNHyBhDbZlzPBAGivX.W', 'student', '2025-06-20 05:08:09', NULL),
(14, 'Botirov Muzaffarjon', 'muzaffarjon66@gmail.com', '$2y$10$LRN09WfvLl8vpxyse7in..hnFxVhzVvqto0nfNH/uppwfaRRA6FFm', 'teacher', '2025-06-20 05:26:49', 'uploads/avatars/teacher_14_1750493688.jpg'),
(17, 'Farhodjon Olimov', 'olimovfarhodjon777@gmail.com', '$2y$10$7qsgUXBGW0GjAcqRlfptAexhwXtBK9yOTQfhNcJWd55qETofK69QG', 'student', '2025-06-20 06:49:56', NULL),
(18, 'Farhodjon Olimov', 'olimovfarhodjon333@gmail.com', '$2y$10$LKdrkD3qsjdtWTlGue3ZXOVv7/xxZpCAcE3MyoNZDo/cPsrCSbj8i', 'student', '2025-06-21 03:57:12', NULL),
(21, 'Muzaffar Botirov', 'olimovfarhodjon111@gmail.com', '$2y$10$rpg07toTjrydV66r39GwyuUHTQjvrTNvZAl37/nFLtCf.fC9T1Kvm', 'admin', '2025-06-21 06:35:41', NULL),
(23, 'Sanjar Mahmudov', 'sanjarbek99@gmail.com', '$2y$10$Inejw1gFr.xK.aWqHH7p5OP..amZY1A5MOlmvw7AFJQ6KZz.e2Kgy', 'teacher', '2025-06-21 10:34:03', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ca`
--
ALTER TABLE `ca`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Индексы таблицы `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `student_certificates`
--
ALTER TABLE `student_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ca`
--
ALTER TABLE `ca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `student_certificates`
--
ALTER TABLE `student_certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Ограничения внешнего ключа таблицы `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student_certificates`
--
ALTER TABLE `student_certificates`
  ADD CONSTRAINT `student_certificates_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_certificates_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
