-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 23 2020 г., 10:01
-- Версия сервера: 5.7.26
-- Версия PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kotme`
--

-- --------------------------------------------------------

--
-- Структура таблицы `begin`
--

DROP TABLE IF EXISTS `begin`;
CREATE TABLE IF NOT EXISTS `begin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `character_replics`
--

DROP TABLE IF EXISTS `character_replics`;
CREATE TABLE IF NOT EXISTS `character_replics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `character_replics`
--

INSERT INTO `character_replics` (`id`, `text`) VALUES
(1, 'Пожалуй, нет ни одного человека, кто хоть раз в жизни не мечтал отправиться в дальнее путешествие навстречу приключениям и найти древние сокровища. Нам предоставляется такая возможность: мы отправляемся на поиски сокровищ! Но в отличие от многих кладоискателей прошлого нам обязательно повезет! Осталось только расшифровать карту и древние сокровища наши!'),
(2, 'Отличное начало. Продолжай в том же духе!'),
(3, 'Молодец! Ты на верном пути к сокровищам!'),
(4, 'У тебя отлично получается, продолжай в том же духе!'),
(5, ' Отлично! Осталось совсем немного и древние сокровища наши!'),
(6, 'Продолжай в том же духе, сокровища уже близко!'),
(7, 'У тебя отлично получается! Не останавливайся на достигнутом!'),
(8, 'Отлично! Осталось расшифровать ещё несколько фрагментов карты.'),
(9, 'Молодец! Древние сокровища уже близко!'),
(11, 'Вот и подошло к концу наше путешествие, карта привела нас к сокровищам. А знаешь, какие наши главные сокровища? Это приобретенные знания!'),
(10, 'Мы уже в шаге от победы! Осталось совсем немного! Давай же сделаем последний рывок!');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `code` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `text`, `code`) VALUES
(1, 'Функции в Kotlin', 'В Kotlin функции определяются через ключевое слово fun. \r\nПосле имени функции в круглых скобках через запятую перечисляются параметры. Каждый параметр состоит из имени переменной и через двоеточие ее типа. Параметры являются val-переменными. \r\nКлючевое слово val опускается. \r\nПосле круглых скобок с параметрами ставится двоеточие и указывается тип возвращаемого функцией значения. \r\nТело функции заключается в фигурные скобки.', '//Пример функции:<br><br>fun add(x: Int, y: Int): Int {<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;return x + y<br>\r\n}');

-- --------------------------------------------------------

--
-- Структура таблицы `log_edit`
--

DROP TABLE IF EXISTS `log_edit`;
CREATE TABLE IF NOT EXISTS `log_edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coper` int(11) DEFAULT NULL,
  `key_id` int(50) DEFAULT NULL,
  `obj` varchar(500) DEFAULT NULL,
  `field` varchar(500) NOT NULL,
  `newvalue` varchar(500) DEFAULT NULL,
  `oldvalue` varchar(500) DEFAULT NULL,
  `osot` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `log_edit`
--

INSERT INTO `log_edit` (`id`, `coper`, `key_id`, `obj`, `field`, `newvalue`, `oldvalue`, `osot`) VALUES
(1, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(2, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(3, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(4, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(5, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(6, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(7, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(8, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(9, 385, NULL, 'users', 'login', 'tt', '', NULL),
(10, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(11, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(12, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(13, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(14, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(15, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(16, 385, NULL, 'users', 'login', 'tt', '', NULL),
(17, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(18, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(19, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(20, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(21, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(22, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:36:32', '', 'New'),
(23, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(24, 385, NULL, 'users', 'login', 'tt', '', NULL),
(25, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(26, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(27, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:36:32', '', NULL),
(28, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(29, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(30, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(31, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:37:09', '', 'New'),
(32, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(33, 385, NULL, 'users', 'login', 'tt', '', NULL),
(34, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(35, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(36, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:37:09', '', NULL),
(37, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(38, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(39, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(40, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:37:18', '', 'New'),
(41, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(42, 385, NULL, 'users', 'login', 'tt', '', NULL),
(43, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(44, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(45, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:37:18', '', NULL),
(46, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(47, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(48, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(49, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:37:53', '', 'New'),
(50, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(51, 385, NULL, 'users', 'login', 'tt', '', NULL),
(52, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(53, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(54, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:37:53', '', NULL),
(55, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(56, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(57, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(58, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:38:07', '', 'New'),
(59, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(60, 385, NULL, 'users', 'login', 'tt', '', NULL),
(61, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(62, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(63, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:38:07', '', NULL),
(64, 385, NULL, 'users', 'login', 'tt', '', 'New'),
(65, 385, NULL, 'users', 'name', 'tashka', '', 'New'),
(66, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(67, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:41:05', '', 'New'),
(68, 385, NULL, 'users', 'id', NULL, '9999999', 'New'),
(69, 385, NULL, 'users', 'login', 'tt', '', NULL),
(70, 385, NULL, 'users', 'name', 'tashka', '', NULL),
(71, 385, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(72, 385, NULL, 'users', 'lastlogin', '2020-11-16 18:41:05', '', NULL),
(73, 387, NULL, 'users', 'login', 'tt', '', 'New'),
(74, 387, NULL, 'users', 'name', 'tashka', '', 'New'),
(75, 387, NULL, 'users', 'email', 'ttt@ya.ru', '', 'New'),
(76, 387, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', 'New'),
(77, 387, NULL, 'users', 'lastlogin', '2020-11-16 18:43:30', '', 'New'),
(78, 387, NULL, 'users', 'id', NULL, '9999999', 'New'),
(79, 387, NULL, 'users', 'login', 'tt', '', NULL),
(80, 387, NULL, 'users', 'name', 'tashka', '', NULL),
(81, 387, NULL, 'users', 'email', 'ttt@ya.ru', '', NULL),
(82, 387, NULL, 'users', 'password', '00b663db02a0497bb4f8758419ef3f44dccaee72', '', NULL),
(83, 387, NULL, 'users', 'lastlogin', '2020-11-16 18:43:30', '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_player` int(11) NOT NULL DEFAULT '0',
  `text` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `task` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `text`, `task`) VALUES
(1, ' Этот остров довольно большой, и у нас есть только карта.\r\nНужно разобратся как же нам здесь ориентироваться.\r\n\r\n', 'Давайте вспомним как мы проходили азы в школе и познакомимся с нашим помощником Котлином.\r\n\r\nВыведите в консоль \"Привет Котлин!\"'),
(2, ' Нам придется оценить расстояние по карте, поэтому давайте придумаем как это сделать.\r\n', 'Напишите функцию, которая будет брать 4 аргумента: x1, y1, x2, y2 и вычислять расстояние между точками. Первая и вторая точки заданы как (x1, y1), (x2, y2). Аргументы и результат функции должны иметь тип Float.\r\n'),
(3, 'В инструкции сказано пройти 43 шага прямо, 81 шаг вправо, затем идите вперед до зеленого камня. Ох уж эти картографы... А вдруг мы собьемся со счета? Давайте доверемся Котлину, он за нас все посчитает!\r\n', 'Напишите две функции, одна из которых считает и выводит количество пройденных шагов, а вторая выдает результат когда мы дошли до цели. Первая функция принимает один целочисленный аргумент и выводит в консоль с каждой новой строки, например \"Шаг 1 идем далее\", \"Шаг 2 последний\". Вторая функция принимает на вход лямбду, проверяющую достигли ли мы цели на данном шаге или нет.'),
(4, 'На этом острове нам придется переправиться через озеро, поэтому нам потребуется плот. Для его создания нам нужно определиться с необходимыми материалами. Для плота нужны 8 бревен и 20 лоз.\r\nА еще хочется что-нибудь пожарить. 5 штук рыбы и 2 кокоса вполне хватит. И нам нужно будет проверить имеется ли у нас всё необходимое.\r\n', 'Создайте функцию-расширение, которая выводит слово \"плот\", если среди предметов достаточно материалов для плота и слово \"обед\", если хватает еды. Назовите функцию checkCrafting. Функция будет вызываться по списку, представляющему имающиеся предметы. А результат должен быть в виде списка из предметов, которые можно создать из того что у нас есть.'),
(5, '', 'Создайте ассоциативный массив, взяв со входа список предметов, и для каждого типа предмета задайте в массиве их количество.'),
(6, ' Вы дошли до хижины, дверь была открыта. В хижине рядом со столом вы увидели ящик, в котором находился какой-то прибор. Судя по всему, рядом, лежит руководство к нему. Почитав руководство и включив прибор, вы поняли что там содержится список кодов с их значением.\r\n', 'Создайте класс с именем Device. Он должен содержать метод setCode, принимающий на вход целое число и строку со значением. Класс должен содержать метод getInfo, позволяющий по известному коду выдать строку с информацией. И класс должен иметь еще один метод, позволяющий получить список кодов - getCodes().'),
(7, 'Пройдя дальше на отметке по карте вы обнаружили металлическую дверь. Вы нашли код который обозначен, как \"Вход в Убежище\", испробовали его, но это не сработало. Изучив прибор внимательней, вы увидели что в него можно вставлять разные карты памяти.\r\n', 'Возьмите класс Device из прошлого задания. Создайте новый класс Card для карты памяти и добавьте свойство card в Device. В классе Card перегрузите оператор доступа по индексу, задав ему на вход целое число, а на выходе строковое значение. И перегрузите оператор присваивания по индексу, который принимает целое число, строку и сохраняет эту пару в памяти.'),
(8, 'Пошарив по близости вы наткнулись на останки. В кармане вы нашли красную карту памяти. Вынув свою синюю карту, вы решили вставить красную в прибор и посмотреть какие там коды.\r\n', 'Красная карта должна работать схожим образом с синей. Поэтому создайте класс синей карты и красной. Наш старый класс Card переделайте в интерфейс ICard. Этот интерфейс унаследуйте в обеих картах памяти. ICard точно также должен содержать доступ и присваивание по индексу. Подготовьте реализацию интерфейса в каждом классе карты памяти. В классе Device поменяйте тип у свойства card.'),
(9, 'Вернувшись к двери, вы ввели код и дверь открылась. Ура, сокровища уже близко! Вы прошли дальше по коридору, открывая с помощью кодов разные двери, но помещения были обесточены. В итоге удалось найти кабинет, где работал компьютер, видимо от резервного питания. Включив компьютер, вы видите что для входа требуется USB-ключ и его нужно вставить. Осмотрев кабинет, вы нашли разные USB-устройства, но не знаете какое из них подойдет.\r\n', 'Создайте функцию с именем checkUSBToken, принимающую дженерик-параметр и входной объект типа Any. Проверьте соответствует ли входной объект классу USBToken, если да, то возвратите его с дженерик-типом, если нет, то верните null.'),
(10, 'Вы вошли в систему, посмотрев иконки на рабочем столе, вы увидели \"Системы охраны\", там вы нашли особую дверь, для которой требовались коды с зеленой карточки. Когда вы проходили мимо этой двери у неё не было клавиатуры для ввода, значит она открывается с помощью компьютера. Вы не знаете как вставить карту в компьютер, но в программе есть кнопка \"Ввести коды\". Вы нажали и там требуется ввести полный список кодов в формате HTML. Хм, что бы это значило? Посмотрев документацию, вы увидели пример и там просто требуется ввести подобный текст.\r\n', 'Создайте класс Tag, который будет обозначать HTML-элемент. А затем унаследуйте его в другие классы: Table, TR, TD, Html. Затем создайте соответствующие функции в классах для добавления элементов: table, tr, td. Напишите функцию html, создающую экземпляр класса Html. Таким образом создание HTML-страницы должно происходить через DSL, созданный вами.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `lastlogin` datetime NOT NULL,
  `login` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `progerss` int(2) NOT NULL DEFAULT '0',
  `character_rep` int(11) NOT NULL DEFAULT '0',
  `usersadmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `lastlogin`, `login`, `name`, `password`, `progerss`, `character_rep`, `usersadmin`) VALUES
(1, '25', '2020-11-23 11:17:52', 't.s.', 'Самарина Т.С.', 'e4ff36ede472fb9b355b74efc8a450b684139b10', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_code`
--

DROP TABLE IF EXISTS `user_code`;
CREATE TABLE IF NOT EXISTS `user_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_code`
--

INSERT INTO `user_code` (`id`, `user_id`, `task`, `code`) VALUES
(1, 1, 1, 'fun main() {\n    println(\"Привет Котлин!\");\n}\n\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
