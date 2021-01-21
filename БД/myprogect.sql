-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 15 2021 г., 12:05
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myprogect`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `IdDish` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Weight` int(11) DEFAULT NULL COMMENT 'грамм',
  `Price` int(11) DEFAULT NULL COMMENT 'рублей',
  `CookingTime` int(11) NOT NULL DEFAULT '0' COMMENT 'минут',
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`IdDish`, `Name`, `Weight`, `Price`, `CookingTime`, `Type`) VALUES
(1, 'Картофель с куриной грудкой', 300, 50, 7, 'Первое'),
(2, 'Картофель в томатном соусе', 200, 100, 5, 'Второе'),
(3, 'Греческий салат', 350, 200, 10, 'Салат'),
(4, 'Крабовый салат', 200, 150, 5, 'Салат'),
(8, 'Запечённая картошка', 400, 200, 20, 'Второе'),
(9, 'Овощной суп', 200, 100, 15, 'Первое'),
(10, 'Стейк лосося, запеченый в пергаменте', 260, 750, 30, 'Второе'),
(11, 'Котлета из трески и лосося', 140, 390, 14, 'Второе'),
(12, 'Куриная грудка с сыром', 170, 350, 11, 'Второе'),
(13, 'Паста “Карбонара”', 300, 380, 8, 'Второе'),
(14, 'Каре ягненка', 200, 990, 14, 'Второе'),
(15, 'Мясные колбаски “Мартинборо”', 350, 490, 21, 'Второе'),
(16, 'Салат “Цезарь” с курицей', 165, 350, 7, 'Салат'),
(17, 'Салат “Морской”', 200, 390, 28, 'Салат'),
(19, 'Салат “Цезарь” с креветкой', 165, 450, 18, 'Салат'),
(20, 'Шоколадный фондан', 100, 270, 3, 'Десерт'),
(21, 'Миндальный торт “Алмонди”', 150, 320, 5, 'Десерт');

-- --------------------------------------------------------

--
-- Структура таблицы `dish_ordering`
--

CREATE TABLE `dish_ordering` (
  `IdDish` int(11) NOT NULL,
  `Count` int(11) NOT NULL DEFAULT '1',
  `IdOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish_ordering`
--

INSERT INTO `dish_ordering` (`IdDish`, `Count`, `IdOrder`) VALUES
(1, 3, 2),
(2, 2, 3),
(4, 3, 5),
(13, 4, 4),
(14, 1, 1),
(14, 1, 5),
(16, 1, 1),
(21, 1, 1),
(21, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `IdEmployee` int(11) NOT NULL,
  `FIO` varchar(50) NOT NULL,
  `NumOfPasport` varchar(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Number` varchar(20) DEFAULT NULL,
  `Age` int(11) NOT NULL DEFAULT '18',
  `IdPosition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`IdEmployee`, `FIO`, `NumOfPasport`, `Address`, `Number`, `Age`, `IdPosition`) VALUES
(1, 'Дубов Анатолий Карлович', '8020 521253', 'г.Уфа, Аксакова 53', '+7-917-32-31-623', 20, 2),
(2, 'Карпович Анатолий Александрович', '8015 982313', 'г.Уфа, Заки Валиди', '+7-912-49-17-312', 25, 3),
(3, 'Лебедева Анна Дмитриевна', '8018 212853', 'г.Уфа , Жукова', '+7-917-57-11-108', 18, 1),
(4, 'Богачев Фёдор Михайлович', '8015 192516', 'г.Уфа, Октября проспект, 23/2', '+7-914-47-71-198', 25, 4),
(5, 'Воробьёв Дамир Робертович', '8010 694623', 'г.Уфа, Комсомольская, 21', '+7-917-10-62-731', 30, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `IdIngredient` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Count` int(11) NOT NULL COMMENT 'кг/литров',
  `Supplier` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL COMMENT 'рублей за кг/литр'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`IdIngredient`, `Name`, `Count`, `Supplier`, `Price`) VALUES
(1, 'Картофель', 0, 'г.Уфа , картофельный завод', 500),
(2, 'Куриная грудка', 0, 'Магазин \"Магнит\"', 1000),
(3, 'Лук репчатый', 0, 'г.Уфа , магазин \"Магнит\"', 150),
(4, 'Томаты', 0, 'Магазин \"Магнит\"', 200),
(5, 'Кревётки', 0, 'Россия, Рязанская обл., Рязань Стимул, ООО', 6000),
(6, 'Соевый соус', 5, 'г.Уфа , магазин \"Магнит\"', 50),
(7, 'Каре ягнёнка', 4, 'г.Уфа , магазин \"Магнит\"', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient_dish`
--

CREATE TABLE `ingredient_dish` (
  `IdIngredient` int(11) NOT NULL,
  `Weight` int(11) NOT NULL COMMENT 'грамм',
  `IdDish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredient_dish`
--

INSERT INTO `ingredient_dish` (`IdIngredient`, `Weight`, `IdDish`) VALUES
(1, 0, 1),
(1, 300, 2),
(2, 0, 1),
(2, 300, 12),
(2, 250, 16),
(3, 100, 2),
(4, 200, 2),
(6, 100, 14),
(7, 1, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `ordering`
--

CREATE TABLE `ordering` (
  `IdOrder` int(11) NOT NULL,
  `Client` varchar(50) NOT NULL,
  `NumberOfCliemt` varchar(20) NOT NULL,
  `IdEmployee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ordering`
--

INSERT INTO `ordering` (`IdOrder`, `Client`, `NumberOfCliemt`, `IdEmployee`) VALUES
(1, 'Петр Петрович Петров', '4532423', 1),
(2, 'Зимина Инна Алексеевна', '12', 2),
(3, 'Полякова Наталия Эдуардовна', '13', 3),
(4, 'Игнатов Митрофан Никитевич', '312', 4),
(5, 'Воронцов Игорь Игоревич', '3241', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `IdPosition` int(11) NOT NULL,
  `NameOfPosition` varchar(50) NOT NULL DEFAULT 'None',
  `salary` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Responsibilities` varchar(100) NOT NULL,
  `Requirements` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`IdPosition`, `NameOfPosition`, `salary`, `Responsibilities`, `Requirements`) VALUES
(1, 'Официант', 20000, '1)Принимать заказы у клиентов\r\n2)Отдавать заказы на кухню', '1)Общительность 2)Знание меню'),
(2, 'Повар', 25000, '1)Готовить блюда\r\n2)Поддерживать порядок на своём месте', '1)Чистоплотность 2)Навыки готовки'),
(3, 'Администратор', 40000, '1)Контролировать работу официантов\r\n2)Подсчёт расходов и доходов за месяц', '1)Умение пользоваться Excel 2)Лидерские качества'),
(4, 'Уборщик', 10000, '1)Поддерживать чистоту в заведении', '1)Мед. книжка\n2)Пунктуальность \n3)Чистоплотность\n'),
(5, 'Бармен', 30000, '1)Обслуживать клиентов', '1)Знание коктейлей и процесс их приготовления 2)Мед.книжка');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`IdDish`),
  ADD KEY `IdDish` (`IdDish`);

--
-- Индексы таблицы `dish_ordering`
--
ALTER TABLE `dish_ordering`
  ADD PRIMARY KEY (`IdDish`,`IdOrder`),
  ADD KEY `IdDish` (`IdDish`),
  ADD KEY `IdDish_2` (`IdDish`),
  ADD KEY `IdOrder` (`IdOrder`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`IdEmployee`),
  ADD KEY `IdEmployee` (`IdEmployee`),
  ADD KEY `IdEmployee_2` (`IdEmployee`),
  ADD KEY `IdEmployee_3` (`IdEmployee`),
  ADD KEY `IdEmployee_4` (`IdEmployee`),
  ADD KEY `IdEmployee_5` (`IdEmployee`),
  ADD KEY `IdPosition` (`IdPosition`),
  ADD KEY `IdEmployee_6` (`IdEmployee`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`IdIngredient`),
  ADD KEY `IdIngredient` (`IdIngredient`);

--
-- Индексы таблицы `ingredient_dish`
--
ALTER TABLE `ingredient_dish`
  ADD PRIMARY KEY (`IdIngredient`,`IdDish`),
  ADD KEY `IdIngredient` (`IdIngredient`),
  ADD KEY `IdIngredient_2` (`IdIngredient`,`IdDish`),
  ADD KEY `IdIngredient_3` (`IdIngredient`),
  ADD KEY `IdDish` (`IdDish`);

--
-- Индексы таблицы `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`IdOrder`),
  ADD KEY `IdEmployee` (`IdEmployee`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`IdPosition`),
  ADD KEY `IdPosition` (`IdPosition`),
  ADD KEY `IdPosition_2` (`IdPosition`),
  ADD KEY `IdPosition_3` (`IdPosition`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `IdDish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `IdEmployee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `IdIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ordering`
--
ALTER TABLE `ordering`
  MODIFY `IdOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `IdPosition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dish_ordering`
--
ALTER TABLE `dish_ordering`
  ADD CONSTRAINT `dish_ordering_ibfk_1` FOREIGN KEY (`IdDish`) REFERENCES `dishes` (`IdDish`),
  ADD CONSTRAINT `dish_ordering_ibfk_2` FOREIGN KEY (`IdOrder`) REFERENCES `ordering` (`IdOrder`);

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`IdPosition`) REFERENCES `position` (`IdPosition`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ingredient_dish`
--
ALTER TABLE `ingredient_dish`
  ADD CONSTRAINT `ingredient_dish_ibfk_1` FOREIGN KEY (`IdIngredient`) REFERENCES `ingredients` (`IdIngredient`),
  ADD CONSTRAINT `ingredient_dish_ibfk_2` FOREIGN KEY (`IdDish`) REFERENCES `dishes` (`IdDish`);

--
-- Ограничения внешнего ключа таблицы `ordering`
--
ALTER TABLE `ordering`
  ADD CONSTRAINT `ordering_ibfk_1` FOREIGN KEY (`IdEmployee`) REFERENCES `employee` (`IdEmployee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
