-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2020 г., 16:16
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `online_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `ID_Category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`ID_Category`, `name`) VALUES
(1, 'Shoes'),
(2, 'T-shirts'),
(3, 'Sport suits');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `ID_Item` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `quality` enum('LOW','MEDIUM','HIGH','EXCELLENT') NOT NULL,
  `FID_Vendor` int(11) NOT NULL,
  `FID_Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`ID_Item`, `name`, `price`, `quantity`, `quality`, `FID_Vendor`, `FID_Category`) VALUES
(1, 'yeezy boost 350', 700, 100, 'EXCELLENT', 1, 1),
(2, ' Streetspirit', 100, 73, 'MEDIUM', 1, 1),
(3, 'Revolution 5', 90, 89, 'MEDIUM', 2, 1),
(4, 'AIR MAX 270 REACT', 200, 120, 'HIGH', 2, 1),
(5, 'Team Club', 15, 500, 'MEDIUM', 2, 2),
(6, 'Sportswear', 30, 230, 'HIGH', 2, 2),
(7, 'TIRO19 TEE', 22, 400, 'HIGH', 1, 2),
(8, 'Stripes Tee Lush', 36, 100, 'EXCELLENT', 1, 2),
(9, 'Stripes DV2448', 113, 200, 'HIGH', 1, 3),
(10, 'Nsw Ce Trk Suit', 75, 300, 'MEDIUM', 2, 3),
(11, 'Yq Hood Cot', 599, 560, 'MEDIUM', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `vendors`
--

CREATE TABLE `vendors` (
  `ID_Vendor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `vendors`
--

INSERT INTO `vendors` (`ID_Vendor`, `name`) VALUES
(1, 'Adidas'),
(2, 'Nike');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID_Item`),
  ADD KEY `FID_CATEGORY_ITEM` (`FID_Category`),
  ADD KEY `FID_VENDOR_ITEM` (`FID_Vendor`);

--
-- Индексы таблицы `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ID_Vendor`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `ID_Item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `vendors`
--
ALTER TABLE `vendors`
  MODIFY `ID_Vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FID_CATEGORY_ITEM` FOREIGN KEY (`FID_Category`) REFERENCES `categories` (`ID_Category`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FID_VENDOR_ITEM` FOREIGN KEY (`FID_Vendor`) REFERENCES `vendors` (`ID_Vendor`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
