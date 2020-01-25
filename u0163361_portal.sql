-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 24 2020 г., 21:55
-- Версия сервера: 5.7.23-24
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0163361_portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sb_blog`
--

CREATE TABLE IF NOT EXISTS `sb_blog` (
  `blog_id` int(10) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `title` text NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `keywords` text NOT NULL,
  `announce` text NOT NULL,
  `text` longtext NOT NULL,
  `image` varchar(250) NOT NULL DEFAULT '',
  `date` int(16) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_blog`
--

INSERT INTO `sb_blog` (`blog_id`, `name`, `title`, `metatitle`, `meta_description`, `keywords`, `announce`, `text`, `image`, `date`, `active`, `sort`) VALUES
(1, 'news1', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов.&lt;/p&gt;\r\n', '', 1568009224, 1, 1),
(2, 'news2', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568109224, 1, 3),
(3, 'news3', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568209224, 1, 5),
(4, 'news4', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568309224, 1, 9),
(5, 'news5', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568409224, 1, 7),
(6, 'news6', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568509224, 1, 13),
(7, 'news7', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568609224, 1, 2),
(8, 'news8', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568709224, 1, 4),
(9, 'news9', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568809224, 1, 11),
(10, 'news10', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568909224, 1, 18),
(11, 'news11', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568919224, 1, 17),
(12, 'news12', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1569059224, 1, 14),
(13, 'news13', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1569109224, 1, 6),
(14, 'news14', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1569159224, 1, 8),
(15, 'news15', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568859224, 1, 12),
(16, 'news16', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1567859224, 1, 21),
(17, 'news17', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1568469224, 1, 20),
(18, 'news18', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1566179224, 1, 10),
(19, 'news19', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1569209224, 1, 19),
(20, 'news20', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1569259224, 1, 15),
(21, 'news21', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1560309224, 1, 22),
(22, 'news22', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов.&lt;/p&gt;\r\n', '', 1569311467, 1, 23),
(23, 'news23', 'Добро пожаловать в раздел новостей!', '', '', '', 'Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&Go.', '&lt;p&gt;\r\n	Уважаемые партнеры, Вы находитесь в разделе новостей компании Dry&amp;amp;Go. Здесь мы планируем публиковать анонсы предстоящих и прошедших событий, информацию об изменениях в системе стандартов&lt;/p&gt;\r\n', '', 1569309224, 1, 16),
(31, 'novaya-informaciya', 'Новая информация', '', '', '', 'Новая информация для вас', '&lt;p&gt;\r\n	Новая информация о нас.&lt;/p&gt;\r\n', '', 1569311099, 0, 31);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_cache`
--

CREATE TABLE IF NOT EXISTS `sb_cache` (
  `id` varchar(100) NOT NULL,
  `value` varchar(500) NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_cache`
--

INSERT INTO `sb_cache` (`id`, `value`) VALUES
('instagram_last_update', '1569337985'),
('sitemap_last_update', '1579852620');

-- --------------------------------------------------------

--
-- Структура таблицы `sb_catalog`
--

CREATE TABLE IF NOT EXISTS `sb_catalog` (
  `catalog_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `keywords` text NOT NULL,
  `text` text NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_catalog`
--

INSERT INTO `sb_catalog` (`catalog_id`, `parent_id`, `name`, `title`, `metatitle`, `meta_description`, `keywords`, `text`, `sort`) VALUES
(1, 0, 'marketing', 'Маркетинг', '', '', '', '&lt;p&gt;Основными каналами продвижения являются:&lt;/p&gt;\r\n&lt;p&gt;•	Аудио и видео реклама внутри ТЦ и на его внешних стенах&lt;br&gt;\r\n•	Сайт&lt;br&gt;\r\n•	Социальные сети&lt;br&gt;\r\n•	Пиар-менеджер франчайзера&lt;br&gt;\r\n•	Контекстная реклама&lt;br&gt;\r\n•	Участие в мероприятиях в качестве партнеров&lt;br&gt;\r\n•	Работа с лидерами мнений и блоггерами&lt;br&gt;\r\n•	Дни открытых дверей. В эти дни в баре проводятся уроки по уходу за собой и мастер-классы.&lt;/p&gt;\r\n&lt;p&gt;Наиболее важные элементы привлечения и удержания клиентов в баре укладок «Dry&amp;amp;Go»:&lt;/p&gt;\r\n&lt;p&gt;•	Безлимитные абонементы&lt;/p&gt;\r\n&lt;p&gt;•	Акция «Укладка в подарок»&lt;/p&gt;\r\n&lt;p&gt;•	Продажа косметики клиентам&lt;/p&gt;\r\n&lt;p&gt;•	Предложение дополнительных услуг &lt;/p&gt;\r\n', 4),
(2, 0, 'personal', 'Персонал', '', '', '', '&lt;p&gt;Для правильной организации работы бара укладов &amp;laquo;Dry&amp;amp;Go&amp;raquo; требуются:&lt;/p&gt;\r\n&lt;p&gt;&amp;mdash; Администратор&lt;br /&gt;\r\n&amp;mdash; Стилисты&lt;br /&gt;\r\n&amp;mdash; Визажисты&lt;br /&gt;\r\n&amp;mdash; Стилисты &amp;mdash; визажисты&lt;/p&gt;\r\n&lt;p&gt;На усмотрение франчайзи остается введение должности управляющего.&lt;/p&gt;\r\n&lt;p&gt;Все стилисты должны одинаково хорошо владеть искусством создания укладок и макияжа. В случае, если мастер специализируется на чем-то одном, требуется произвести повышение квалификации до универсального уровня.&lt;/p&gt;\r\n&lt;p&gt;В зависимости от выбранного формата определяется необходимое количество мастеров: среднее количество сотрудников от 4 до 10 человек в зависимости от дня недели и места расположения бара.&lt;/p&gt;\r\n&lt;p&gt;У всех сотрудников обязательно наличие санитарной книжки.&lt;/p&gt;\r\n&lt;p&gt;Обязанности администратора и специалистов &amp;laquo;Dry&amp;amp;Go&amp;raquo; определены соответствующими должностными инструкциями, которые франчайзер передает франчайзи для внутреннего пользования, так как требования к работе персоналу едины во всей сети.&lt;/p&gt;\r\n&lt;p&gt;Для поиска сотрудников можно обратиться к интернет-ресурсам и подобрать подходящих кандидатов или самим подать объявление о найме сотрудника.&lt;br /&gt;\r\n	Почти все сайты, посвященные работе, содержат базу резюме.&lt;/p&gt;\r\n', 3),
(3, 0, 'podgotovka-k-zapysky-biznesa', 'Подготовка к запуску бизнеса', '', '', '', '', 2),
(4, 0, 'pomeshenie', 'Помещение', '', '', '', '&lt;p&gt;Правильный выбор локации является одной из составляющих успешного старта. Мы рекомендуем Франчайзи не торопиться с решением, а подобрать действительно идеальное место для открытия.&lt;/p&gt;\r\n&lt;p&gt;Управляющая Компания &amp;laquo;Dry&amp;amp;Go&amp;raquo; оказывает помощь в выборе локации, консультируя Франчайзи, а также, при необходимости, проводя прямые переговоры с потенциальными арендодателями.&lt;/p&gt;\r\n&lt;p&gt;Бар укладок должен привлекать новых Гостей, обеспечивая ежедневный входящий траффик новых Клиентов.&lt;/p&gt;\r\n&lt;p&gt;Наилучшими вариантами расположения являются:&lt;br /&gt;\r\n&amp;bull; помещение в популярном Торговом Центре&lt;br /&gt;\r\n&amp;bull; формат street retail на 1 линии от центральной дороги.&lt;/p&gt;\r\n&lt;p&gt;Удачное месторасположение с привлекательной входной группой будут являться действенным инструментом лидогенерации.&lt;/p&gt;\r\n', 5),
(6, 0, 'obshie-standarty', 'Общие стандарты', '', '', '', '&lt;p&gt;Данный раздел содержит общие гайды по работе с системой стандартов. Руководства по использованию элементов фирменного стиля, а так же общие руководства по запуску и управлению бизнес-процессами.&lt;/p&gt;\r\n', 1),
(8, 0, 'juridicheskiy-blok', 'Юридический блок', '', '', '', '&lt;p&gt;На первом этапе надо определить форму собственности.&lt;/p&gt;\r\n&lt;p&gt;Франчайзер не настаивает на определенной форме, но рекомендует оформить ИП.&lt;/p&gt;\r\n&lt;p&gt;Услуги Бара укладок оказывать по патентной системе налогообложения, а продажи товаров на УСН 6%.&lt;/p&gt;\r\n', 6),
(9, 0, 'biznes-protsesy', 'Бизнес процессы', '', '', '', '', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_config`
--

CREATE TABLE IF NOT EXISTS `sb_config` (
  `id` int(10) unsigned NOT NULL,
  `config_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='настройки';

--
-- Дамп данных таблицы `sb_config`
--

INSERT INTO `sb_config` (`id`, `config_id`, `title`, `type`, `value`) VALUES
(1, 'email', 'E-mail администратора', 'text', 'franchise@drygo.ru'),
(2, 'phone', 'Телефон', 'text', '+7 (495) 662-59-64'),
(3, 'www', 'Веб-сайт', 'textarea', 'drygo.ru'),
(5, 'footer', 'Подвал', 'text', 'Все материалы и файлы портала являются интеллектуальной собственностью франчайзера. Перепродажа, изменение, размещение в свободном доступе в сети Интернет будут преследоваться в соответствии со ст.ст.  1252, 1302 ГК РФ, ст.7.12 КоАП РФ, ст. ст. 146, 147 УК РФ.'),
(4, 'regim', 'Режим', 'text', 'Пн-пт с 09.00 до 18.00');

-- --------------------------------------------------------

--
-- Структура таблицы `sb_docs`
--

CREATE TABLE IF NOT EXISTS `sb_docs` (
  `docs_id` int(10) unsigned NOT NULL,
  `catalog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `link` text NOT NULL,
  `date` int(16) NOT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=1479 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_docs`
--

INSERT INTO `sb_docs` (`docs_id`, `catalog_id`, `type_id`, `title`, `text`, `link`, `date`, `sort`) VALUES
(1, 1, 3, 'Исходники рекламных материалов', 'Папка с исходниками рекламных материалов и элементов фирменного стиля. ', 'https://yadi.sk/d/FhNVm0EyqtN5aQ', 1569315210, 4),
(2, 1, 1, ' Пример маркетинговых акций', '', 'https://yadi.sk/i/4tq4vBEFnpQxIA', 1566015210, 8),
(3, 1, 1, 'Открытие нового бара укладок', '', 'https://yadi.sk/i/xS9c9G7AJGPXCg', 1566115210, 52),
(7, 4, 1, 'Инструкция по поиску помещения', '', 'https://yadi.sk/i/rUEhtSRCP7Z7LA', 1566515210, 85),
(8, 4, 1, 'Общие требования к помещению', '', 'https://yadi.sk/i/IwAOSsIm_s4Trw', 1566615210, 86),
(9, 4, 1, 'Ремонт помещения', '', 'https://yadi.sk/i/z30XJWyBpipDWA', 1566715210, 87),
(10, 4, 1, 'Проект интерьера помещения', '', 'https://yadi.sk/i/HiP7lFF_h478Kg', 1566815210, 88),
(11, 4, 1, 'Список мебели и оборудования', '', 'https://yadi.sk/i/dhFHWEjfHI5Usw', 1566915210, 89),
(12, 4, 1, ' Карта торговой территории', '', 'https://yadi.sk/i/pz4rADdsUl7BDg', 1567015210, 92),
(13, 4, 1, 'Интернет-площадки для подбора помещения', '', 'https://yadi.sk/i/Dr92o877dIlBLA', 1567115210, 189),
(14, 2, 1, ' Пример объявления для поиска сотрудников', '', 'https://yadi.sk/i/IJm7-nDMHYllhg', 1567215210, 190),
(16, 3, 1, 'Чек-лист проверки студии', '', 'https://yadi.sk/i/rZ4pKiLv7qYQCg', 1567415210, 292),
(17, 3, 1, 'Программное обеспечение', '', 'https://yadi.sk/i/fnSFN2IEJzwKZw', 1567515210, 293),
(18, 3, 1, 'Папка потребителя', '', 'https://yadi.sk/i/bbyYM75ELmOf4Q', 1567615210, 294),
(19, 3, 1, ' Открытие нового бара укладок', '', 'https://yadi.sk/i/xS9c9G7AJGPXCg', 1567715210, 296),
(20, 3, 1, 'Список мебели и оборудования', '', 'https://yadi.sk/i/dhFHWEjfHI5Usw', 1567815210, 297),
(21, 3, 1, ' Инструкция по пожарной безопасности', '', 'https://yadi.sk/i/UkNAG1TXwZ657w', 1567915210, 298),
(22, 9, 1, 'Требования к внешнему виду сотрудников', '', 'https://yadi.sk/i/wScmCiynYbI4Cw', 1568015210, 303),
(23, 8, 1, ' Инструкция по регистрации юридического лица', '', 'https://yadi.sk/i/HFtMAnSlzl-CYA', 1568115210, 304),
(24, 8, 1, 'Коды ОКВЭД', '', 'https://yadi.sk/i/ezgs99rKwmjfQQ', 1568215210, 305),
(25, 9, 1, ' Товары на витрину', '', 'https://yadi.sk/i/F4QoiVgV7zaFCA', 1568315210, 306),
(26, 9, 1, 'Расходные материалы', '', 'https://yadi.sk/i/aE-mWTCsHKThJw', 1568095210, 621),
(27, 9, 1, 'Программное обеспечение', '', 'https://yadi.sk/i/fnSFN2IEJzwKZw', 1568115210, 623),
(28, 4, 1, ' Заключение договора аренды', '', 'https://yadi.sk/i/gdbDbRYJXwvnag', 1568215210, 922),
(29, 2, 1, ' Материалы по обучению сотрудников', '', 'https://yadi.sk/i/Mja6Rbef4QeVxQ', 1568315210, 1132),
(30, 2, 1, ' Список площадок для поиска сотрудников', '', 'https://yadi.sk/i/nxcBkTIb4ocPWg', 1568415210, 1133),
(31, 9, 1, 'Папка потребителя', '', 'https://yadi.sk/i/bbyYM75ELmOf4Q', 1568515210, 1149),
(32, 9, 1, ' Косметические средства в работу', '', 'https://yadi.sk/i/wKDdsQ4jrRYXCw', 1568615210, 1150),
(33, 9, 1, ' Инструкция по пожарной безопасности', '', 'https://yadi.sk/i/UkNAG1TXwZ657w', 1568715210, 1151),
(34, 9, 1, 'Проверка «Тайный покупатель»', '', 'https://yadi.sk/i/rwYtLPxkZDbo4A', 1568815210, 1142),
(35, 2, 1, 'Штатное расписание', '', 'https://yadi.sk/i/c8WPdRMokWqYiQ', 1568915210, 619),
(36, 2, 1, 'Требования к кандидатам', '', 'https://yadi.sk/i/NKK8lHjJsrPjbw', 1569015210, 331),
(37, 2, 1, 'Требования к внешнему виду сотрудников', '', 'https://yadi.sk/i/wScmCiynYbI4Cw', 1569115210, 618),
(38, 2, 1, 'Стартовое обучение персонала', '', 'https://yadi.sk/i/7_FTPPCsvK3Gvw', 1569215210, 620),
(1428, 6, 3, 'Чистота и рабочие места', '', 'https://disk.yandex.ru/client/disk/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20DryGo/%D0%A7%D0%B8%D1%81%D1%82%D0%BE%D1%82%D0%B0%20%D0%B8%20%D1%80%D0%B0%D0%B1.%D0%BC%D0%B5%D1%81%D1%82%D0%B0', 1575527830, 1428),
(1429, 6, 3, 'Стандарты работы DryGo', 'Тут вы можете найти инструкции и стандарты работы баров укладок DryGo', 'https://disk.yandex.ru/client/disk/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20DryGo/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D1%8B%20DryGo', 1579070771, 1429),
(1430, 6, 3, 'Стандарты общения DryGo', 'Стандарты общения с клиентами баров укладок DryGo, стандарты внешнего вида персонала, стандарты сервиса и обслуживания DryGo', 'https://disk.yandex.ru/client/disk/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20DryGo/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20%D0%BE%D0%B1%D1%89%D0%B5%D0%BD%D0%B8%D1%8F%20DryGo', 1579070874, 1430),
(1431, 1, 3, 'Анкета тайного клиента DryGo', 'Анкета тайного клиента DryGo', 'https://disk.yandex.ru/client/disk/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20DryGo/%D0%9C%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3', 1579257976, 1431),
(1432, 2, 3, 'Персонал и нарушения', 'Инструкции для мастеров, нарушения и регламенты для мастеров', 'https://disk.yandex.ru/client/disk/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20DryGo/%D0%9F%D0%B5%D1%80%D1%81%D0%BE%D0%BD%D0%B0%D0%BB%20%D0%B8%20%D0%BD%D0%B0%D1%80%D1%83%D1%88%D0%B5%D0%BD%D0%B8%D1%8F', 1579076493, 1432),
(1433, 1, 3, 'GuideBook DryGo', 'Руководство по использованию фирменного стиля компании DryGo', 'https://disk.yandex.ru/client/disk/GuideBook', 1579257917, 1433),
(1439, 1, 2, 'Вывески DryGo', 'Фирменные вывески DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=dwQ5QCe5dlv%2BmTBgj8Pv5TY%2FrRh7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzRf0J3QvtGB0LjRgtC10LvQuCDRgdGC0LjQu9GPL9CS0YvQstC10YHQutC4L0RHX9CS0YvQstC10YHQutC4LnBkZiIsInRpdGxlIjoiREdf0JLRi9Cy0LXRgdC60LgucGRmIiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkwOTAxNDc0NTksInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579090176, 1439),
(1440, 1, 2, 'Каталог укладок DryGo', 'Фирменный каталог укладок DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=3O2cOlTr3quyr%2FK6VIBDk3Ez54J7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzRf0J3QvtGB0LjRgtC10LvQuCDRgdGC0LjQu9GPL9Ca0LDRgtCw0LvQvtCzINGD0LrQu9Cw0LTQvtC6L0RHX9Ca0LDRgtCw0LvQvtCzINGD0LrQu9Cw0LTQvtC6LnBkZiIsInRpdGxlIjoiREdf0JrQsNGC0LDQu9C%2B0LMg0YPQutC70LDQtNC%2B0LoucGRmIiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkwOTAxODQwNjIsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579090214, 1440),
(1446, 1, 2, 'Бейджи DryGo', 'Фирменные бейджи бара укладок DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=e8Hn44OQTr3QzCAEG8439BT4GCh7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzRf0J3QvtGB0LjRgtC10LvQuCDRgdGC0LjQu9GPL9Cj0L3QuNGE0L7RgNC80LAvREdf0JHRjdC50LTQttC4LnBkZiIsInRpdGxlIjoiREdf0JHRjdC50LTQttC4LnBkZiIsIm5vaWZyYW1lIjpmYWxzZSwidWlkIjoiMTEzMDAwMDAzNjM2ODc1MCIsInRzIjoxNTc5MDkwNTY0OTQ1LCJ5dSI6IjUxOTI5NDI5MzE1Nzg2NjM3NjcifQ%3D%3D', 1579090606, 1446),
(1447, 1, 2, 'Нанесение принта DryGo', 'Нанесение принта на футболку DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=lOFtuoCremrirwant5BGriWbMGJ7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzRf0J3QvtGB0LjRgtC10LvQuCDRgdGC0LjQu9GPL9Cj0L3QuNGE0L7RgNC80LAvREdf0J3QsNC90LXRgdC10L3QuNC1INC90LAg0YTRg9GC0LHQvtC70LrRgy5wZGYiLCJ0aXRsZSI6IkRHX9Cd0LDQvdC10YHQtdC90LjQtSDQvdCwINGE0YPRgtCx0L7Qu9C60YMucGRmIiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkwOTA1Njc1OTksInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579090651, 1447),
(1448, 1, 2, 'Пречек DryGo', 'Фирменный пречек бара укладок DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=UR6ZsJq8FQEg4QKwn3MiPz7hEWt7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzRf0J3QvtGB0LjRgtC10LvQuCDRgdGC0LjQu9GPL0RHX9Cf0YDQtdGH0LXQui5wZGYiLCJ0aXRsZSI6IkRHX9Cf0YDQtdGH0LXQui5wZGYiLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTA5MDc0NTEzNSwieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579090784, 1448),
(1449, 1, 2, 'Пакет бумажный DryGo', 'Концепт фирменного бумажного пакета бара укладок DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=X0fglBD%2BsefMIF0qm3TX5dY%2FSfd7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzRf0J3QvtGB0LjRgtC10LvQuCDRgdGC0LjQu9GPL9Cf0LDQutC10YIg0LHRg9C80LDQttC90YvQuS9ER1%2FQn9Cw0LrQtdGCINCx0YPQvNCw0LbQvdGL0LkucGRmIiwidGl0bGUiOiJER1%2FQn9Cw0LrQtdGCINCx0YPQvNCw0LbQvdGL0LkucGRmIiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkwOTExMTQ3ODUsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579091160, 1449),
(1450, 1, 3, 'Меню DryGo', 'Все фирменные меню DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/4_%D0%9D%D0%BE%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B8%20%D1%81%D1%82%D0%B8%D0%BB%D1%8F/%D0%9C%D0%B5%D0%BD%D1%8E%20%D1%83%D1%81%D0%BB%D1%83%D0%B3', 1579097457, 1450),
(1451, 1, 3, 'Тейбл-Тенты DryGo', 'Фирменные тейбл-тенты бара укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/4_%D0%9D%D0%BE%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B8%20%D1%81%D1%82%D0%B8%D0%BB%D1%8F/%D0%A2%D0%B5%D0%B9%D0%B1%D0%BB-%D1%82%D0%B5%D0%BD%D1%82%D1%8B', 1579258111, 1451),
(1452, 1, 3, 'Кристалайты DryGo', 'Фирменные кристалайты бара укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/4_%D0%9D%D0%BE%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B8%20%D1%81%D1%82%D0%B8%D0%BB%D1%8F/%D0%9A%D1%80%D0%B8%D1%81%D1%82%D0%B0%D0%BB%D0%B0%D0%B9%D1%82%D1%8B', 1579258133, 1452),
(1453, 1, 3, 'Подарочные сертификаты DryGo', 'Фирменные подарочные сертификаты бара укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/4_%D0%9D%D0%BE%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B8%20%D1%81%D1%82%D0%B8%D0%BB%D1%8F/%D0%9F%D0%BE%D0%B4%D0%B0%D1%80%D0%BE%D1%87%D0%BD%D1%8B%D0%B5%20%D1%81%D0%B5%D1%80%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D1%8B', 1579164601, 1453),
(1454, 1, 3, 'Входная группа файлов DryGo', 'Фирменная входная группа баров укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/4_%D0%9D%D0%BE%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B8%20%D1%81%D1%82%D0%B8%D0%BB%D1%8F/%D0%92%D1%85%D0%BE%D0%B4%D0%BD%D0%B0%D1%8F%20%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D0%B0', 1579164777, 1454),
(1455, 0, 0, 'Визитки DryGo', 'Фирменные именные и корпоративные визитки баров укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/4_%D0%9D%D0%BE%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B8%20%D1%81%D1%82%D0%B8%D0%BB%D1%8F/%D0%92%D0%B8%D0%B7%D0%B8%D1%82%D0%BA%D0%B8', 1579164838, 1455),
(1456, 1, 3, 'Безлимитные абонементы DryGo', 'Фирменные безлимитные абонементы баров укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/4_%D0%9D%D0%BE%D1%81%D0%B8%D1%82%D0%B5%D0%BB%D0%B8%20%D1%81%D1%82%D0%B8%D0%BB%D1%8F/%D0%91%D0%B5%D0%B7%D0%BB%D0%B8%D0%BC%D0%B8%D1%82%D0%BD%D1%8B%D0%B5%20%D0%B0%D0%B1%D0%BE%D0%BD%D0%B5%D0%BC%D0%B5%D0%BD%D1%82%D1%8B', 1579164883, 1456),
(1457, 1, 2, 'Графические элементы DryGo', 'Фирменные графические элементы баров укладок DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=bf7ydNGeJxlyUaJbInJXVnm2k6N7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzNf0JPRgNCw0YTQuNGH0LXRgdC60LjQtSDRjdC70LXQvNC10L3RgtGLL0RHX9CT0YDQsNGE0LjRh9C10YHQutC40LUg0Y3Qu9C10LzQtdC90YLRiy5wZGYiLCJ0aXRsZSI6IkRHX9CT0YDQsNGE0LjRh9C10YHQutC40LUg0Y3Qu9C10LzQtdC90YLRiy5wZGYiLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTE2NDk0MDMwMiwieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579165004, 1457),
(1458, 1, 2, 'Фирменные цвета DryGo', 'Фирменные цвета баров укладок DryGo', 'https://docviewer.yandex.ru/view/1130000036368750/?*=unSQ6Y36cuxH4rpfUQIZLh%2FA5Vt7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzJf0KTQuNGA0LzQtdC90L3Ri9C1INGG0LLQtdGC0LAg0Lgg0YjRgNC40YTRgtGLL0RHX9Ck0LjRgNC80LXQvdC90YvQtSDRhtCy0LXRgtCwLnBkZiIsInRpdGxlIjoiREdf0KTQuNGA0LzQtdC90L3Ri9C1INGG0LLQtdGC0LAucGRmIiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkxNjUwMjIxODIsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579165056, 1458),
(1459, 1, 2, 'Логотип основная версия на фоне', 'Фирменный логотип баров укладок DryGo на фоне', 'https://docviewer.yandex.ru/view/1130000036368750/?*=DkUUggk5HIVPZyPkPLRvsc3Oe4p7InVybCI6InlhLWRpc2s6Ly8vZGlzay9ER1%2FQoNCV0JrQm9CQ0JzQndCr0JUg0JzQkNCi0JXQoNCY0JDQm9CrLzFf0JvQvtCz0L7RgtC40L8vREdf0JvQvtCz0L7RgtC40L9f0L7RgdC90L7QstC90LDRjyDQstC10YDRgdC40Y8g0L3QsCDRhNC%2B0L3QtS9ER1%2FQm9C%2B0LPQvtGC0LjQv1%2FQvtGB0L3QvtCy0L3QsNGPINCy0LXRgNGB0LjRjyDQvdCwINGE0L7QvdC1LnBkZiIsInRpdGxlIjoiREdf0JvQvtCz0L7RgtC40L9f0L7RgdC90L7QstC90LDRjyDQstC10YDRgdC40Y8g0L3QsCDRhNC%2B0L3QtS5wZGYiLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTE2NTE4NDM5NCwieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579165240, 1459),
(1460, 1, 3, 'Логотип основная версия', 'Основная версия фирменного логотипа баров укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/1_%D0%9B%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF/DG_%D0%9B%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF_%D0%BE%D1%81%D0%BD%D0%BE%D0%B2%D0%BD%D0%B0%D1%8F%20%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%8F', 1579165296, 1460),
(1461, 1, 3, 'Дополнительные версии логотипа DryGo', 'Фирменные дополнительные версии логотипа баров укладок DryGo', 'https://disk.yandex.ru/client/disk/DG_%D0%A0%D0%95%D0%9A%D0%9B%D0%90%D0%9C%D0%9D%D0%AB%D0%95%20%D0%9C%D0%90%D0%A2%D0%95%D0%A0%D0%98%D0%90%D0%9B%D0%AB/1_%D0%9B%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF/DG_%D0%9B%D0%BE%D0%B3%D0%BE%D1%82%D0%B8%D0%BF_%D0%B4%D0%BE%D0%BF%20%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D0%B8', 1579165332, 1461),
(1462, 2, 1, 'Job Offer Администратор', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=1pGLr1gTyG5m0q5SKe7aGmkfUC97InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi9Kb2Igb2ZmZXIg0LDQtNC80LjQvdC40YHRgtGA0LDRgtC%2B0YAuZG9jeCIsInRpdGxlIjoiSm9iIG9mZmVyINCw0LTQvNC40L3QuNGB0YLRgNCw0YLQvtGALmRvY3giLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTE2NTU0MTE0OSwieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579165594, 1462),
(1463, 2, 1, 'Job Offer Мастер маникюра', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=F6xfWIShy3g2NR%2FvuB1B5Ch%2F8497InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi9Kb2Igb2ZmZXIg0LzQsNGB0YLQtdGAINC80LDQvdC40LrRjtGA0LAuZG9jeCIsInRpdGxlIjoiSm9iIG9mZmVyINC80LDRgdGC0LXRgCDQvNCw0L3QuNC60Y7RgNCwLmRvY3giLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTE2NTU1NjM0NSwieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579165621, 1463),
(1464, 2, 1, 'Анкета для Администратора DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=gEwgqE8MDYV6uFzr%2F6N80%2FH0ZOp7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQkNCd0JrQldCi0JAg0LDQtNC80LjQvSDQuNGC0LQuZG9jeCIsInRpdGxlIjoi0JDQndCa0JXQotCQINCw0LTQvNC40L0g0LjRgtC0LmRvY3giLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTE2NTY0NzUyOSwieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579165683, 1464),
(1465, 2, 1, 'Стандарты внешнего вида администратора DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=3gPezFiKqFKXK%2FqKTv9b%2BgBwG117InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQkNCU0JzQmNCdLmRvY3giLCJ0aXRsZSI6ItCQ0JTQnNCY0J0uZG9jeCIsIm5vaWZyYW1lIjpmYWxzZSwidWlkIjoiMTEzMDAwMDAzNjM2ODc1MCIsInRzIjoxNTc5MTY1NjUzMTI2LCJ5dSI6IjUxOTI5NDI5MzE1Nzg2NjM3NjcifQ%3D%3D', 1579165719, 1465),
(1466, 2, 1, 'Должностная инструкция администратор DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=09IbZOx5pdqx9Ey3T0dP1eVtYgZ7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQlNCYINCw0LTQvNC40L3QuNGB0YLRgNCw0YLQvtGALmRvY3giLCJ0aXRsZSI6ItCU0Jgg0LDQtNC80LjQvdC40YHRgtGA0LDRgtC%2B0YAuZG9jeCIsIm5vaWZyYW1lIjpmYWxzZSwidWlkIjoiMTEzMDAwMDAzNjM2ODc1MCIsInRzIjoxNTc5MTY1NzIyMTMwLCJ5dSI6IjUxOTI5NDI5MzE1Nzg2NjM3NjcifQ%3D%3D', 1579165760, 1466),
(1467, 2, 1, 'Договор о индивидуальной полной материальной ответственности', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=qqpTVD%2FXTxUt5qZwNyLAj2LLbix7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQlNCc0J4g0LDQtNC80LjQvdC40YHRgtGA0LDRgtC%2B0YAuZG9jIiwidGl0bGUiOiLQlNCc0J4g0LDQtNC80LjQvdC40YHRgtGA0LDRgtC%2B0YAuZG9jIiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkxNjU3MjM5NTgsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579165809, 1467),
(1468, 2, 1, 'Таблица мотивации сотрудников баров укладок DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=k1rX07p9fEpeeSkzXw5GFb%2BCac97InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQnNC%2B0YLQuNCy0LDRhtC40Y8ueGxzeCIsInRpdGxlIjoi0JzQvtGC0LjQstCw0YbQuNGPLnhsc3giLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTE2NTcyNjIwNiwieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579165927, 1468),
(1469, 2, 1, 'Описание инструментов нематериальной ответственности', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=KrX0gOwt6iL2wl8yqfETlFY7MiV7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQntC%2F0LjRgdCw0L3QuNC1INC40L3RgdGC0YDRg9C80LXQvdGC0L7QsiDQvdC10LzQsNGC0LXRgNC40LDQu9GM0L3QvtC5INC80L7RgtC40LLQsNGG0LjQuC5kb2N4IiwidGl0bGUiOiLQntC%2F0LjRgdCw0L3QuNC1INC40L3RgdGC0YDRg9C80LXQvdGC0L7QsiDQvdC10LzQsNGC0LXRgNC40LDQu9GM0L3QvtC5INC80L7RgtC40LLQsNGG0LjQuC5kb2N4Iiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkxNjU5MzU2ODgsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579165958, 1469),
(1470, 2, 1, 'Оформление сотрудников DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=l1nT2VvRR6wOFCjpjDMdehg8EVV7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQntGE0L7RgNC80LvQtdC90LjQtSDRgdC%2B0YLRgNGD0LTQvdC40LrQvtCyLmRvY3giLCJ0aXRsZSI6ItCe0YTQvtGA0LzQu9C10L3QuNC1INGB0L7RgtGA0YPQtNC90LjQutC%2B0LIuZG9jeCIsIm5vaWZyYW1lIjpmYWxzZSwidWlkIjoiMTEzMDAwMDAzNjM2ODc1MCIsInRzIjoxNTc5MTY1OTYzNDM4LCJ5dSI6IjUxOTI5NDI5MzE1Nzg2NjM3NjcifQ%3D%3D', 1579165983, 1470),
(1471, 0, 0, 'Первичный отбор кандидатов и приглашение на собеседование', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=r0KyVmafTUjP%2BlmyrrWKc7orAUV7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQn9C10YDQstC40YfQvdGL0Lkg0L7RgtCx0L7RgCDQutCw0L3QtNC40LTQsNGC0L7QsiDQuCDQv9GA0LjQs9C70LDRiNC10L3QuNC1INC90LAg0YHQvtCx0LXRgdC10LTQvtCy0LDQvdC40LUuZG9jeCIsInRpdGxlIjoi0J%2FQtdGA0LLQuNGH0L3Ri9C5INC%2B0YLQsdC%2B0YAg0LrQsNC90LTQuNC00LDRgtC%2B0LIg0Lgg0L%2FRgNC40LPQu9Cw0YjQtdC90LjQtSDQvdCwINGB0L7QsdC10YHQtdC00L7QstCw0L3QuNC1LmRvY3giLCJub2lmcmFtZSI6ZmFsc2UsInVpZCI6IjExMzAwMDAwMzYzNjg3NTAiLCJ0cyI6MTU3OTE2NTk4NjM4NywieXUiOiI1MTkyOTQyOTMxNTc4NjYzNzY3In0%3D', 1579166030, 1471),
(1472, 2, 1, 'Пример трудового договора DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=Z6hDx4JRlKi0OBL8wfIZG2AjyUt7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQn9GA0LjQvNC10YAg0YLRgNGD0LTQvtCy0L7Qs9C%2BINC00L7Qs9C%2B0LLQvtGA0LAueGxzIiwidGl0bGUiOiLQn9GA0LjQvNC10YAg0YLRgNGD0LTQvtCy0L7Qs9C%2BINC00L7Qs9C%2B0LLQvtGA0LAueGxzIiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkxNjYxNjUyMjksInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579166248, 1472),
(1473, 2, 1, 'Требования к кандидатам DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=V0ODB4ZXfZvdpo1k38FqYm0dNDd7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQotGA0LXQsdC%2B0LLQsNC90LjQtSDQuiDQutCw0L3QtNC40LTQsNGC0LDQvCBEcnlHby5kb2N4IiwidGl0bGUiOiLQotGA0LXQsdC%2B0LLQsNC90LjQtSDQuiDQutCw0L3QtNC40LTQsNGC0LDQvCBEcnlHby5kb2N4Iiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkxNjYyNTk0OTYsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579166290, 1473),
(1474, 2, 1, 'Работа с кассой в DryGo', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=EcF4XZr%2Bw24nGlPxK52b5uxmrT97InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQoNCw0LHQvtGC0LAg0YEg0LrQsNGB0YHQvtC5LmRvY3giLCJ0aXRsZSI6ItCg0LDQsdC%2B0YLQsCDRgSDQutCw0YHRgdC%2B0LkuZG9jeCIsIm5vaWZyYW1lIjpmYWxzZSwidWlkIjoiMTEzMDAwMDAzNjM2ODc1MCIsInRzIjoxNTc5MTY2MjU1Mjk2LCJ5dSI6IjUxOTI5NDI5MzE1Nzg2NjM3NjcifQ%3D%3D', 1579166322, 1474),
(1475, 2, 1, 'Проверка документов кандидатов ', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=PTwjq0g2dhtzQHCvUIxYnzUj1pV7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQn9GA0L7QstC10YDQutCwINC00L7QutGD0LzQtdC90YLQvtCyINC60LDQvdC00LjQtNCw0YLQsC5kb2N4IiwidGl0bGUiOiLQn9GA0L7QstC10YDQutCwINC00L7QutGD0LzQtdC90YLQvtCyINC60LDQvdC00LjQtNCw0YLQsC5kb2N4Iiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkxNjYyNTMwODQsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579166352, 1475),
(1476, 2, 1, 'Таблица депремирования сотрудников', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=Vo3thRYMKDGqwVp6i3pdfXJURlR7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQotCw0LHQu9C40YbQsCDQtNC10L%2FRgNC10LzQuNGA0L7QstCw0L3QuNGPICgxKS54bHMiLCJ0aXRsZSI6ItCi0LDQsdC70LjRhtCwINC00LXQv9GA0LXQvNC40YDQvtCy0LDQvdC40Y8gKDEpLnhscyIsIm5vaWZyYW1lIjpmYWxzZSwidWlkIjoiMTEzMDAwMDAzNjM2ODc1MCIsInRzIjoxNTc5MTY2MjU3NDA4LCJ5dSI6IjUxOTI5NDI5MzE1Nzg2NjM3NjcifQ%3D%3D', 1579166379, 1476),
(1477, 2, 3, 'Регламенты и инструкции для сотрудников DryGo', '', 'https://disk.yandex.ru/client/disk/%D0%A1%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D1%8B%20DryGo/%D0%9F%D0%B5%D1%80%D1%81%D0%BE%D0%BD%D0%B0%D0%BB%20%D0%B8%20%D0%BD%D0%B0%D1%80%D1%83%D1%88%D0%B5%D0%BD%D0%B8%D1%8F', 1579166512, 1477),
(1478, 6, 1, 'При обнаружении педикулеза', '', 'https://docviewer.yandex.ru/view/1130000036368750/?*=Ce55SRAoNxrs%2FLc38q6unQ4NOBJ7InVybCI6InlhLWRpc2s6Ly8vZGlzay9IUi%2FQn9GA0Lgg0L7QsdC90LDRgNGD0LbQtdC90LjQuCDQstGI0LXQuS5kb2N4IiwidGl0bGUiOiLQn9GA0Lgg0L7QsdC90LDRgNGD0LbQtdC90LjQuCDQstGI0LXQuS5kb2N4Iiwibm9pZnJhbWUiOmZhbHNlLCJ1aWQiOiIxMTMwMDAwMDM2MzY4NzUwIiwidHMiOjE1NzkxNjYwNzc3MTIsInl1IjoiNTE5Mjk0MjkzMTU3ODY2Mzc2NyJ9', 1579169137, 1478);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_frontpage`
--

CREATE TABLE IF NOT EXISTS `sb_frontpage` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `text2` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_frontpage`
--

INSERT INTO `sb_frontpage` (`id`, `name`, `title`, `text`, `text2`, `image`, `sort`) VALUES
(1, 'Преимущества', 'Выбирая роспись от студии RospisSten.ru вы получаете гарантированный результат с учетом ваших пожеланий, предпочтений и вкуса.', '&lt;ul&gt;\r\n	&lt;li&gt;\r\n		&lt;img src=&quot;/assets/images/advantage01.png&quot; /&gt;&amp;nbsp;Персональный подход. Бесплатный выезд&lt;br /&gt;\r\n		на замер и консультация&amp;nbsp;&lt;b&gt;Персональный менеджер бесплатно выезжает на замер, фотографирует, консультирует и улавливает&amp;nbsp; все ваши пожелания.&lt;/b&gt;&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;img src=&quot;/assets/images/advantage02.png&quot; /&gt;Эскиз в подарок. Эскиз любой сложности ручной работы. &lt;strong&gt;Стоимость за эскиз в подарок после заключения договора. Только с эскиза начинается роспись.&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;img src=&quot;/assets/images/advantage03.png&quot; /&gt; Профессиональные&lt;br /&gt;\r\n		художники и высочайшее качество&amp;nbsp;&lt;strong&gt;Выпускники ведущих ВУЗов. Работы некоторых украшают частные собрания коллекционеров по всему миру.&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;img src=&quot;/assets/images/advantage04.png&quot; /&gt; Официальный&lt;br /&gt;\r\n		договор, безопасные материалы и гарантия 5 лет.&amp;nbsp;&lt;strong&gt;Договор гарантирует вам качество исполнения услуг и оговоренных условий. Безопасные краски и материалы. Гарантия на работы&amp;nbsp; 5 лет!&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;img src=&quot;/assets/images/advantage05.png&quot; /&gt; Гибкое&lt;br /&gt;\r\n		ценообразование и компромисс.&amp;nbsp;&lt;strong&gt;Всегда идем навстречу заказчику и находим компромисс. Уложимся в ваш бюджет.&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&lt;img src=&quot;/assets/images/advantage06.png&quot; /&gt; Потрясающий&lt;br /&gt;\r\n		результат=эксклюзив=100 % качество.&amp;nbsp;&lt;strong&gt;Шедевр Вашего дома будет радовать Вас и гостей долгие годы. Нас всегда рекомендуют.&lt;/strong&gt;&lt;/li&gt;\r\n	&lt;li&gt;\r\n		&amp;nbsp;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '', '', 1),
(2, 'Наши работы', 'с 2007 по 2019 год\r\nмы реализовали \r\nсотни проектов\r\nпо художественной росписи', '&lt;div&gt;\r\n	Варианты оформления стен могут быть самыми разнообразными. Здесь ограничение в выборе может нарисовать только ваше воображение. Наши мастера выполнят любую работу,&amp;nbsp;от несложных узоров и заканчивая целыми композициями высочайшего качества, которые имеют свой неповторимый сюжет и смысл. Профессиональные художники студии RospisSten.ru создадут, специально для вас, произведение искусства, которое будет соответствовать вашим личным предпочтениям по тематике, стилю и вкусу.&lt;/div&gt;\r\n&lt;div&gt;\r\n	&lt;hr /&gt;\r\n	Основные направления:&lt;/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n	1. Художественная роспись стен, потолков в интерьере квартир, лофтов, домов (прихожие, холлы, гостиные, кухни, столовые, детские комнаты, спальни, ванные комнаты), офисов (кабинетов, переговорных, коридорного пространства) и общественных помещений (бизнес-центров, ресторанов, кафе, пабов, магазинов, детских садов, учебных учреждений, фитнес-центров).&lt;/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n	2. Роспись мебели, патинирование и золочение: шкафов, комодов, кроватей, кухонь, столов, витрин, интерьерных картин и различных предметов декора, таких как шкатулки, сундуки, ширмы, игрушки. Роспись буазери (стеновых панелей).&lt;/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n	3. Художественное декорирование. Роспись, патинирование и золочение лепнины, карнизов, арок, ниш, колонн, линкруста.&lt;/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;\r\n	4. Декоративное оформление стен и потолков (под натуральный камень, травертин, шелк, карта мира, песчаные вихри, перламутр, под дерево, под бетон, металлизированные фактуры и др). Все работы по нанесению декоративной штукатурки, венецианских покрытий, ЛКМ на любые поверхности выполняются &amp;quot;под ключ&amp;quot; (в стоимость входят все затраты, включая материалы).&lt;/div&gt;\r\n&lt;div&gt;\r\n	&lt;div&gt;\r\n		&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	Выполняем художественную роспись стен, потолков, мебели, декоров в Москве и Московской области.&lt;/p&gt;\r\n&lt;hr /&gt;\r\n&lt;h4&gt;\r\n	Работаем 7 дней в неделю (включая субботу и воскресенье) с 9.00 до 21.00.&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n', '', '', 2),
(3, 'О нас', 'В нашей команде только профессиональные художники', '&lt;p&gt;\r\n	Наши работы ручной росписи дарят вам не только красоту на долгие годы, но и часть души художника, сумевшего искусно, неповторимо украсить ваш интерьер. Студия &amp;quot;RospisSten.ru&amp;quot; для тех, кто ценит искусство, кто не потерял чувство прекрасного и кому необходимо высокое качество. Вот не полный перечень стилей и жанров в которых мы трудимся: академизм, античность, барокко, ампир, ренессанс, альфрейная живопись, неоклассицизм, модерн, ар-деко, анималистика, абстракции, граффити, поп-арт... Слышим и учитываем все пожелания и нужды заказчика. С нами удобно и легко работать. Убедитесь в этом сами.&lt;/p&gt;\r\n', '', '', 3),
(4, 'Заказать роспись', 'Бесплатная консультация', '&lt;p&gt;\r\n	Если вы хотите украсить свой дом, мебель или заказать полноценный художественный дизайн, то просто заполните эту форму и наш специалист свяжется с вами и ответит на все вопросы&lt;/p&gt;\r\n', '', '', 4),
(5, 'Ценообразование', 'От чего зависит \r\nстоимость росписи', '&lt;p&gt;\r\n	Цены включают стоимость грунта, красок (акрил или темпера) и расходных материалов для работы художника.&amp;nbsp;&lt;br /&gt;\r\n	Цены не включают подготовку стен к работе (штукатурные работы, армирование, шпатлёвка, штробление).&lt;br /&gt;\r\n	Также необходимо учесть удаленность объекта от МКАД или другой город, а значит транспортные расходы.&amp;nbsp; &amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Срочность выполнения работы имеет важное значение, так как в этом случае приходиться работать в выходные дни, вечерние и ночные часы.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Использование только дорогих красок, гарантирующих качество и безопасность. Ленивый три раза ходит, а скупой три раза платит.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Настоящая художественная роспись подразумевает только ручную работу (hаnd made) и длительность процесса. Остерегайтесь удешевляющих уловок.&lt;/p&gt;\r\n&lt;p&gt;\r\n	В классических интерьерах возможна лишь академическая роспись. Данная техника требует высочайшего мастерства художника и многолетнего опыта. Академическая живопись - длительный процесс многослойной детализированной росписи. Росписи - музейного качества. Стоимость соответствующая.&lt;/p&gt;\r\n&lt;hr /&gt;\r\n&lt;h4&gt;\r\n	И самое главное. Качество росписи и стоимость имеют прямую зависимость от таланта и мастерства художника. Выбор за Вами.&lt;/h4&gt;\r\n&lt;hr /&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n', '&lt;hr /&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	*Объем имеет значение. Чем больше объем, тем больше скидка.&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	* При заключении Договора, стоимость за разработку эскиза в подарок.&lt;/p&gt;\r\n&lt;p align=&quot;center&quot;&gt;\r\n	* Найдем компромисс и подберем роспись под ваш бюджет.&lt;/p&gt;\r\n&lt;hr /&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n', '', 5),
(6, 'Этапы работ', 'Заказать художественную роспись у нас просто и надежно! Вот так происходит работа:', '&lt;div class=&quot;item&quot;&gt;\r\n	&lt;div class=&quot;image&quot;&gt;\r\n		&lt;img src=&quot;/assets/images/step01.png&quot; /&gt;&lt;/div&gt;\r\n	&lt;div class=&quot;name&quot;&gt;\r\n		Заявка&lt;/div&gt;\r\n	&lt;div class=&quot;info&quot;&gt;\r\n		Вы оставляете заявку&lt;br /&gt;\r\n		или звоните нам +7 495 018-37-20&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;item&quot;&gt;\r\n	&lt;div class=&quot;image&quot;&gt;\r\n		&lt;img src=&quot;/assets/images/step02.png&quot; /&gt;&lt;/div&gt;\r\n	&lt;div class=&quot;name&quot;&gt;\r\n		Согласование&lt;/div&gt;\r\n	&lt;div class=&quot;info&quot;&gt;\r\n		Мы бесплатно выезжаем на замер и консультацию. Разрабатываем эскиз и заключаем Договор&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;item&quot;&gt;\r\n	&lt;div class=&quot;image&quot;&gt;\r\n		&lt;img src=&quot;/assets/images/step03.png&quot; /&gt;&lt;/div&gt;\r\n	&lt;div class=&quot;name&quot;&gt;\r\n		Роспись&lt;/div&gt;\r\n	&lt;div class=&quot;info&quot;&gt;\r\n		Вы вносите предоплату.&lt;br /&gt;\r\n		Мы начинаем выполнять работу и воплощать ваши идеи в жизнь&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;item&quot;&gt;\r\n	&lt;div class=&quot;image&quot;&gt;\r\n		&lt;img src=&quot;/assets/images/step04.png&quot; /&gt;&lt;/div&gt;\r\n	&lt;div class=&quot;name&quot;&gt;\r\n		Сдача работы&lt;/div&gt;\r\n	&lt;div class=&quot;info&quot;&gt;\r\n		Вы принимаете ее, вносите оставшуюся сумму и рекомендуете нас своим друзьям :)&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n', '', '', 6),
(7, 'Блог', 'Ручная роспись стен будет прекрасным решением для любого интерьера. ', '&lt;p&gt;\r\n	Что сегодня представляет собой роспись стен и мебели? Почему роспись, а не обои? Как сделать окружающий интерьер более ярким? На эти и многие другие вопросы можно найти ответ в наших статьях.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Визуализируйте свою мечту с помощью росписи стен вместе с нами.&lt;/p&gt;\r\n', '', '', 7),
(8, 'Первый экран', 'Не бойтесь мечтать\r\n', '&lt;pre style=&quot;text-align: center;&quot;&gt;\r\n&lt;/pre&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&lt;span style=&quot;color:#000000;&quot;&gt;&lt;span style=&quot;font-size:28px;&quot;&gt;&lt;strong style=&quot;font-size: 36px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	&lt;span style=&quot;color:#ffffff;&quot;&gt;&lt;span style=&quot;font-size:36px;&quot;&gt;Визуализируйте свою Мечту вместе с нами с помощью росписи&lt;/span&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div style=&quot;text-align: center;&quot;&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n', '', '15405470375bd2e1ddae90f.jpg', 0),
(9, 'Прайс-лист', 'Цена работы за м2 нанесения декоративной штукатурки и краски (работа плюс материалы)\r\n', '&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Венецианская штукатурка классика &lt;span class=&quot;price&quot;&gt;от 1 600 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Фактурная венецианская штукатурка &lt;span class=&quot;price&quot;&gt;от 1 600 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Фактурная штукатурка &amp;quot;Карта мира&amp;quot;, &amp;quot;Острова&amp;quot;, под старину &lt;span class=&quot;price&quot;&gt;от 1 800 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Интрузия &lt;span class=&quot;price&quot;&gt;от 2 000 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Декоративная штукатурка под бетон&amp;nbsp;&lt;span class=&quot;price&quot;&gt;от 1 600 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Штукатурка под травертин&lt;span class=&quot;price&quot;&gt;от 1 800 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Декоративные покрытия &amp;quot;Шелк&amp;quot;, &amp;quot;Велюр&amp;quot;, &amp;quot;Замша&amp;quot; &lt;span class=&quot;price&quot;&gt;от 1 400 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Покрытия &amp;quot;Песчаные вихри&amp;quot;, перламутровые &lt;span class=&quot;price&quot;&gt;от 1 200 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Фактура под дерево&amp;nbsp;&lt;span class=&quot;price&quot;&gt;от 2 000 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Флоковые краски &lt;span class=&quot;price&quot;&gt;от 1 200 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Металлизированная фактура&lt;span class=&quot;price&quot;&gt;от 2 000 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Фактура под кирпич&amp;nbsp;&lt;span class=&quot;price&quot;&gt;от 3 000 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Авторское нанесение &lt;span class=&quot;price&quot;&gt;от 2 500 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Колонны под мрамор&amp;nbsp;&lt;span class=&quot;price&quot;&gt;от 8 000 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Имитация камня &lt;span class=&quot;price&quot;&gt;от 3 500 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Покрытия с трафаретом&lt;span class=&quot;price&quot;&gt;от 5 000 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;price-item clearfix&quot;&gt;\r\n	Резка и роспись по сырой штукатурке&lt;span class=&quot;price&quot;&gt;от 5 500 руб.м2&lt;/span&gt;&lt;/div&gt;\r\n', '', '', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_instagram`
--

CREATE TABLE IF NOT EXISTS `sb_instagram` (
  `id` int(10) unsigned NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `thumb` varchar(250) NOT NULL,
  `text` blob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_instagram`
--

INSERT INTO `sb_instagram` (`id`, `instagram`, `url`, `image`, `thumb`, `text`) VALUES
(1, '1866272500686729990_8038832833', 'https://www.instagram.com/p/BnmVPORgzMG/', 'https://scontent.cdninstagram.com/vp/62759c1279b92c3c7fef97608d1eca1f/5C32AB6D/t51.2885-15/sh0.08/e35/s640x640/40591712_268678303981822_8716560554487019349_n.jpg', '45acb9997df170f18423e227cf6cdf9f.jpg', 0xd0a0d0bed181d0bfd0b8d181d18c20d0b220d187d0b0d181d182d0bdd0bed0bc20d0b4d0bed0bcd0b5202023d180d0bed181d0bfd0b8d181d18cd181d182d0b5d0bd23d0b2d0b0d188d0b4d0bed0bc23d0bbd18ed0b1d0b8d182d0b5d0bbd18fd0bcd0bad180d0b0d181d0bed182d18b23d186d0b5d0bdd0b8d182d0b5d0bbd18fd0bcd0b8d181d0bad183d181d181d182d0b2d0b0),
(2, '1866274580549772555_8038832833', 'https://www.instagram.com/p/BnmVtfTAqUL/', 'https://scontent.cdninstagram.com/vp/c441dc485383c60e777e533cd0bba645/5C36F543/t51.2885-15/sh0.08/e35/s640x640/41007237_2130199137013709_8523020424389111034_n.jpg', '19ba271490fe9613fe48dbfd18309999.jpg', 0xd0a8d0b8d0bad0b0d180d0bdd18bd0b920d0b8d0bdd181d182d180d183d0bcd0b5d0bdd18220d180d0b0d181d188d0b8d180d0b5d0bdd0b8d18f20d0bfd180d0bed181d182d180d0b0d0bdd181d182d0b2d0b0),
(3, '1866280088769691008_8038832833', 'https://www.instagram.com/p/BnmW9pOgH2A/', 'https://scontent.cdninstagram.com/vp/b3c957a61fc208f7352ceff828e9623f/5C232BDD/t51.2885-15/sh0.08/e35/s640x640/41579857_1085839201592748_1902599223164342924_n.jpg', 'ca26ba23c6e8f58b15dce2a82255e4c6.jpg', 0xd09020d0b2d0bed18220d0b820d0bdd0b0d18820d185d183d0b4d0bed0b6d0bdd0b8d0ba20d0b7d0b020d180d0b0d0b1d0bed182d0bed0b92120f09f91a8e2808df09f8ea8d09dd0b5d18220d0bdd0b8d187d0b5d0b3d0be20d0b8d0bdd182d0b5d180d0b5d181d0bdd0b5d0b920d0b820d0bfd180d0b5d0bad180d0b0d181d0bdd0b5d0b92cd187d0b5d0bc20d0bdd0b0d0b1d0bbd18ed0b4d0b0d182d18c20d0b7d0b020d180d0bed0b6d0b4d0b5d0bdd0b8d0b5d0bc20d188d0b5d0b4d0b5d0b2d180d0b0f09fa4a923d188d0b5d0b4d0b5d0b2d180d18bd0b2d0b0d188d0b5d0b3d0bed0b4d0bed0bcd0b023d0bbd183d187d188d0b8d0b5d185d183d0b4d0bed0b6d0bdd0b8d0bad0b823d0bad180d0b0d181d0bed182d0b0d0b4d0bed0bcd0b023d186d0b5d0bdd0b8d182d0b5d0bbd0b8d0bad180d0b0d181d0bed182d18b),
(94, '1867726376251302005_8038832833', 'https://www.instagram.com/p/Bnrfz5aFiB1/', 'https://scontent.cdninstagram.com/vp/b2e1c40b770e67508ee6d81e2bba2331/5C2F3EE0/t51.2885-15/sh0.08/e35/s640x640/40473397_911590345707449_2947076445332030095_n.jpg', 'f7a95a2630d4dbecf5badd3df369b3e3.jpg', 0xd0a0d0bed181d0bfd0b8d181d18c20d18120d18dd184d184d0b5d0bad182d0bed0bc20d181d182d0b0d180d0b5d0bdd0b8d18f20d0bfd0be20d0bcd0b0d182d0b8d0b2d0b0d0bc20d184d180d0b5d181d0bad0b820d091d0b5d0bdd0bed186d186d0be20d093d0bed186d186d0bed0bbd0b820c2abd0a8d0b5d181d182d0b2d0b8d0b520d0b2d0bed0bbd185d0b2d0bed0b2c2bb2023d186d0b5d0bdd0b8d182d0b5d0bbd18fd0bcd0b2d18bd181d0bed0bad0bed0b3d0bed0b8d181d0bad183d181d181d182d0b2d0b023d188d0b5d0b4d0b5d0b2d180d0b2d0b0d188d0b5d0b3d0bed0b4d0bed0bcd0b023d0b4d0b8d0b7d0b0d0b9d0bdd0b8d0bdd182d0b5d180d18cd0b5d180d0b0),
(95, '1867728280347763794_8038832833', 'https://www.instagram.com/p/BnrgPmvFGRS/', 'https://scontent.cdninstagram.com/vp/78926b544a341f65ac19af9ac9117767/5C2068D2/t51.2885-15/sh0.08/e35/s640x640/40533535_331014134140962_8428743926762236632_n.jpg', '1440a140835ab3314bc27245b2fa4831.jpg', 0x23d0bbd183d187d188d0b8d0b5d0b4d0bed0bcd0b023d0bad180d0b0d181d0bed182d0b0d0b8d0bdd182d0b5d180d18cd0b5d180d0b023d0bcd0b5d187d182d0b0d182d18cd0bdd0b5d0b2d180d0b5d0b4d0bdd0be),
(96, '1867729681740259446_8038832833', 'https://www.instagram.com/p/Bnrgj_4lOB2/', 'https://scontent.cdninstagram.com/vp/94acbc5849fcc30af2d2a9420061c201/5C38963C/t51.2885-15/sh0.08/e35/s640x640/41214770_853883268140701_968038042537050663_n.jpg', 'b08700bbe7836856080c1043e15fd5c2.jpg', 0xd0a1d0b0d0bcd0b820d0b7d0b0d0b2d0b8d0b4d183d0b5d0bc20d181d0b2d0bed0b8d0bc20d0b7d0b0d0bad0b0d0b7d187d0b8d0bad0b0d0bc2023d0bcd0bed0b6d0b5d182d0b1d18bd182d18cd183d0b2d0b0d18123d0bbd183d187d188d0b8d0b5d0b4d0bed0bcd0b023d180d0bed181d0bfd0b8d181d18cd181d182d0b5d0bd);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_learn`
--

CREATE TABLE IF NOT EXISTS `sb_learn` (
  `learn_id` int(10) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `title` text NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `keywords` text NOT NULL,
  `announce` text NOT NULL,
  `text` longtext NOT NULL,
  `image` varchar(250) NOT NULL DEFAULT '',
  `date` int(16) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_learn`
--

INSERT INTO `sb_learn` (`learn_id`, `name`, `title`, `metatitle`, `meta_description`, `keywords`, `announce`, `text`, `image`, `date`, `active`, `sort`) VALUES
(1, 'zapisi-razdela-obucheniya', 'Записи раздела обучения', '', '', '', 'Реферат по политологии Тема: «Онтологический бихевиоризм — актуальная национальная задача» Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.', '&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n', '15693338395d8a224f179b1.jpeg', 1569334356, 1, 0),
(2, 'zapisi-razdela-obucheniya1', 'Записи раздела обучения 1', '', '', '', 'Реферат по политологии Тема: «Онтологический бихевиоризм — актуальная национальная задача» Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.', '&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Реферат по политологии Тема: &amp;laquo;Онтологический бихевиоризм &amp;mdash; актуальная национальная задача&amp;raquo; Континентально-европейский тип политической культуры ограничивает субъект власти. Унитарное государство отражает либерализм.&lt;/p&gt;\r\n', '15693338395d8a224f179b1.jpeg', 1569234356, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_lostpass`
--

CREATE TABLE IF NOT EXISTS `sb_lostpass` (
  `code` varchar(32) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='восстановление паролей';

-- --------------------------------------------------------

--
-- Структура таблицы `sb_menu`
--

CREATE TABLE IF NOT EXISTS `sb_menu` (
  `menu_id` int(5) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `href` text NOT NULL,
  `sort` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='меню';

--
-- Дамп данных таблицы `sb_menu`
--

INSERT INTO `sb_menu` (`menu_id`, `parent_id`, `type`, `title`, `href`, `sort`) VALUES
(1, 0, 'main', 'Главная', '/', 1),
(2, 0, 'main', 'Все новости', '/news', 2),
(3, 0, 'main', 'Обучение', '/learn', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_news`
--

CREATE TABLE IF NOT EXISTS `sb_news` (
  `news_id` int(10) unsigned NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sb_news_visible`
--

CREATE TABLE IF NOT EXISTS `sb_news_visible` (
  `news_id` int(10) unsigned NOT NULL,
  `object_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='видимость на страницах';

-- --------------------------------------------------------

--
-- Структура таблицы `sb_object`
--

CREATE TABLE IF NOT EXISTS `sb_object` (
  `object_id` int(3) unsigned NOT NULL,
  `parent_id` int(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `redirect` varchar(255) NOT NULL,
  `metatitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `template` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `search` text,
  `sort` int(4) unsigned NOT NULL DEFAULT '0',
  `access_delete` int(1) unsigned NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `hide` int(1) unsigned NOT NULL DEFAULT '0',
  `sitemap` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_object`
--

INSERT INTO `sb_object` (`object_id`, `parent_id`, `name`, `title`, `redirect`, `metatitle`, `description`, `keywords`, `template`, `module`, `text`, `search`, `sort`, `access_delete`, `image`, `hide`, `sitemap`) VALUES
(1, 0, '', 'База Знаний — Хранилище файлов и документов компании', '', '', '', '', 'index.php', '', '', 'База Знаний — Хранилище файлов и документов компании ', 1, 1, NULL, 0, 1),
(14, 0, 'news', 'Все новости', '', '', '', '', 'webpage.php', 'blog|index', '', 'Все новости ', 14, 1, NULL, 0, 1),
(15, 0, 'learn', 'Обучение', '', '', '', '', 'webpage.php', 'learn|index', '', 'Обучение ', 15, 1, NULL, 0, 1),
(16, 0, 'search', 'Поиск', '', '', '', '', 'webpage.php', 'search|generator', '', 'Поиск ', 16, 1, NULL, 0, 1),
(2, 0, 'dobro-pozhalovat-v-bazu-znanij-dry-go', 'Добро пожаловать в базу знаний Dry&amp;GO', '', '', '', '', 'webpage.php', '', '&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n', 'Добро пожаловать в базу знаний Dry&amp;GO \r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;.\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n', 2, 1, NULL, 0, 1),
(3, 0, 'gajd-po-rabote-s-sistemoj-standartov-dry-go', 'Гайд по работе с системой стандартов Dry&amp;GO', '', '', '', '', 'webpage.php', '', '&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n', 'Гайд по работе с системой стандартов Dry&amp;GO \r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n', 3, 1, NULL, 0, 1),
(4, 0, 'standarty', 'Стандарты', '', '', '', '', 'default.php', 'catalog|index', '', 'Стандарты ', 4, 1, NULL, 0, 1),
(6, 0, 'spisok-kontaktov', 'Список контактов ответственных лиц', '', '', '', '', 'webpage.php', '', '&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Информация по работе с базой знаний &amp;quot;Dry&amp;amp;Go&amp;quot;&lt;/p&gt;\r\n', 'Список контактов ответственных лиц \r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n\r\n	Информация по работе с базой знаний &quot;Dry&amp;Go&quot;\r\n', 6, 1, NULL, 0, 1),
(17, 0, 'logout', 'Выход', '', '', '', '', 'default.php', 'user|logout', '', 'Выход ', 17, 1, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_session`
--

CREATE TABLE IF NOT EXISTS `sb_session` (
  `session_id` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `date_erase` datetime NOT NULL,
  `user_id` int(3) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_session`
--

INSERT INTO `sb_session` (`session_id`, `date`, `date_erase`, `user_id`) VALUES
('f28b2ac62d438ebe88a19ee686c774a3', '2020-01-13 15:29:03', '2020-01-27 15:29:03', 2),
('d40ba5e5da5e37047c27fc8b1a5bc910', '2020-01-17 11:26:56', '2020-01-31 11:26:56', 2),
('45c9d13cc2e278b2b0de89f683eb9262', '2020-01-14 17:52:16', '2020-01-28 17:52:16', 2),
('6fea101a4bc36a5483b8dcdd17ae6dc9', '2020-01-16 17:05:21', '2020-01-30 17:05:21', 2),
('929f18cd901eae7265041be1c94786bf', '2020-01-15 17:58:47', '2020-01-29 17:58:47', 2),
('31e05c38dd15330cd3a39d47a7e87d97', '2020-01-16 17:12:22', '2020-01-30 17:12:22', 9),
('b7d8789f9a5f3d0a2b7704df0b43cf74', '2020-01-16 21:00:00', '2020-01-30 21:00:00', 8),
('ff523d21900a70042bd01c78539c940d', '2020-01-17 17:36:27', '2020-01-31 17:36:27', 2),
('ebf25370e7bd59500e9499286e227076', '2020-01-17 12:50:53', '2020-01-31 12:50:53', 8),
('080d30d7ece3fb7447e020863abde80c', '2020-01-17 13:46:34', '2020-01-31 13:46:34', 10),
('620682b0525785a179dd7ab513ae20ba', '2020-01-17 13:58:07', '2020-01-31 13:58:07', 8),
('ebf6a358f9e4bff7627d6c62cbdbcf94', '2020-01-20 11:55:52', '2020-02-03 11:55:52', 2),
('bcdd04ff1b9ea2e6dcca90b40b777278', '2020-01-20 17:59:21', '2020-02-03 17:59:21', 5),
('b384861b08cf7e589b1c8e516c018577', '2020-01-21 12:56:44', '2020-02-04 12:56:44', 2),
('18362b2f9bc6936aefd2c83f0b501ec8', '2020-01-22 17:15:20', '2020-02-05 17:15:20', 2),
('c4a85075f0b5f8f147a37b73cd06d916', '2020-01-23 11:15:39', '2020-02-06 11:15:39', 2),
('ac091224af5f52b3c905a27d493f6ddc', '2020-01-23 20:55:17', '2020-02-06 20:55:17', 2),
('47fccc47939ec5d17c2f917a1ba1b19c', '2020-01-23 17:50:31', '2020-02-06 17:50:31', 2),
('c5ad1cfe1d755d08d8684d1d7653403b', '2020-01-24 10:57:00', '2020-02-07 10:57:00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_slider`
--

CREATE TABLE IF NOT EXISTS `sb_slider` (
  `slider_id` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `href` text NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sb_type`
--

CREATE TABLE IF NOT EXISTS `sb_type` (
  `type_id` int(10) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_type`
--

INSERT INTO `sb_type` (`type_id`, `title`, `image`, `sort`) VALUES
(1, 'Документ WORD', '15691706065d87a4aeb77f9.png', 1),
(2, 'Файл PDF', '15691707005d87a50c64b28.png', 2),
(3, 'Папка с файлами', '15691707255d87a52534ea0.png', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `sb_user`
--

CREATE TABLE IF NOT EXISTS `sb_user` (
  `user_id` int(3) unsigned NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_ip` varchar(15) NOT NULL,
  `activate` int(4) unsigned NOT NULL DEFAULT '0',
  `conf_save2week` int(1) unsigned NOT NULL DEFAULT '0',
  `logged_ip` varchar(15) DEFAULT NULL,
  `logged_date` datetime DEFAULT NULL,
  `admin` int(1) unsigned NOT NULL DEFAULT '0',
  `ban` int(1) NOT NULL DEFAULT '0',
  `ban_reason` text
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sb_user`
--

INSERT INTO `sb_user` (`user_id`, `login`, `password`, `email`, `name`, `reg_date`, `reg_ip`, `activate`, `conf_save2week`, `logged_ip`, `logged_date`, `admin`, `ban`, `ban_reason`) VALUES
(1, 'gp-supervisor', '2f75903798e52d5a61c2827f3706ec57', '', 'Supervisor', '0000-00-00 00:00:00', '', 0, 0, '84.201.244.172', '2018-11-12 17:16:12', 1, 0, NULL),
(2, 'admin', '5caf5487a5b1e887ed63aba372aac4b3', 'elena@progtech.ru', 'Administrator', '0000-00-00 00:00:00', '', 0, 0, '80.251.135.86', '2020-01-24 10:57:00', 1, 0, NULL),
(3, 'demo', '547fcbf227747538c03d173671065485', 'test@test.ru', 'demo', '2019-10-23 09:41:29', '', 0, 0, '80.251.135.86', '2019-12-05 10:19:42', 0, 0, NULL),
(4, 'test', '257b2709c0b6623c17d5d6f62a45fac9', 'testtest@test.ru', 'admin', '2019-11-30 15:27:05', '', 0, 0, '37.140.189.215', '2019-11-30 18:37:21', 0, 0, NULL),
(5, 'franchisemsk2', 'e02d1c54b2aecbf07d7b962513759b01', 'she-123@yandex.ru', 'Марина Москва', '2020-01-14 14:52:16', '', 0, 0, '37.204.44.151', '2020-01-20 17:59:21', 0, 0, NULL),
(6, 'franchisemsk1', 'f9881d385b35e864bbc3ac2f05dc291d', 'grinchuk-olesya@mail.ru', 'Олеся Москва', '2020-01-15 07:15:46', '', 0, 0, NULL, NULL, 0, 0, NULL),
(7, 'franchiseekb1', '720ddbd13ccb9db8f2a91621b3813596', 'm.polyakova13@gmail.com', 'Мария Екатеринбург', '2020-01-15 07:16:14', '', 0, 0, NULL, NULL, 0, 0, NULL),
(8, 'franchisemsk3', '4503b1711b379870eaedbcc46a456a72', 'ernest03@mail.ru', 'Ольга Москва', '2020-01-15 07:27:15', '', 0, 0, '213.87.160.42', '2020-01-17 13:58:07', 0, 0, NULL),
(9, 'founder1', 'afb1b5d750fe51ce28158347bb4aa959', 'oks1967@mail.ru', 'Олег Сычков', '2020-01-16 14:05:20', '', 0, 0, '80.251.135.86', '2020-01-16 17:12:22', 0, 0, NULL),
(10, 'design1', '87d7cb27bbaa1aa8a56b85154e359ea8', 'design@nogotok-studio.ru', 'Саша Дизайнер', '2020-01-17 10:27:57', '', 0, 0, '80.251.135.86', '2020-01-17 13:46:34', 0, 0, NULL),
(11, 'marketing1', '2eb54200537ec4eec67f85f353bdb045', 'marketing@drygo.ru', 'Екатерина Писарева', '2020-01-17 11:47:19', '', 0, 0, NULL, NULL, 0, 0, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sb_blog`
--
ALTER TABLE `sb_blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `active` (`active`);

--
-- Индексы таблицы `sb_cache`
--
ALTER TABLE `sb_cache`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sb_catalog`
--
ALTER TABLE `sb_catalog`
  ADD PRIMARY KEY (`catalog_id`),
  ADD KEY `name` (`name`,`sort`);

--
-- Индексы таблицы `sb_config`
--
ALTER TABLE `sb_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `config_id` (`config_id`);

--
-- Индексы таблицы `sb_docs`
--
ALTER TABLE `sb_docs`
  ADD PRIMARY KEY (`docs_id`),
  ADD KEY `catalog_id` (`catalog_id`),
  ADD KEY `sort` (`sort`);

--
-- Индексы таблицы `sb_frontpage`
--
ALTER TABLE `sb_frontpage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sb_instagram`
--
ALTER TABLE `sb_instagram`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instagram` (`instagram`);

--
-- Индексы таблицы `sb_learn`
--
ALTER TABLE `sb_learn`
  ADD PRIMARY KEY (`learn_id`),
  ADD KEY `active` (`active`);

--
-- Индексы таблицы `sb_lostpass`
--
ALTER TABLE `sb_lostpass`
  ADD PRIMARY KEY (`code`),
  ADD KEY `date` (`date`);

--
-- Индексы таблицы `sb_menu`
--
ALTER TABLE `sb_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `sb_news`
--
ALTER TABLE `sb_news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `type` (`type`,`sort`);

--
-- Индексы таблицы `sb_news_visible`
--
ALTER TABLE `sb_news_visible`
  ADD KEY `news_id` (`news_id`,`object_id`);

--
-- Индексы таблицы `sb_object`
--
ALTER TABLE `sb_object`
  ADD PRIMARY KEY (`object_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `sb_session`
--
ALTER TABLE `sb_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `date_erase` (`date_erase`,`user_id`);

--
-- Индексы таблицы `sb_slider`
--
ALTER TABLE `sb_slider`
  ADD PRIMARY KEY (`slider_id`),
  ADD UNIQUE KEY `filename` (`filename`),
  ADD KEY `sort` (`sort`);

--
-- Индексы таблицы `sb_type`
--
ALTER TABLE `sb_type`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `name` (`sort`);

--
-- Индексы таблицы `sb_user`
--
ALTER TABLE `sb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sb_blog`
--
ALTER TABLE `sb_blog`
  MODIFY `blog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `sb_catalog`
--
ALTER TABLE `sb_catalog`
  MODIFY `catalog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `sb_config`
--
ALTER TABLE `sb_config`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `sb_docs`
--
ALTER TABLE `sb_docs`
  MODIFY `docs_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1479;
--
-- AUTO_INCREMENT для таблицы `sb_frontpage`
--
ALTER TABLE `sb_frontpage`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `sb_instagram`
--
ALTER TABLE `sb_instagram`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT для таблицы `sb_learn`
--
ALTER TABLE `sb_learn`
  MODIFY `learn_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `sb_menu`
--
ALTER TABLE `sb_menu`
  MODIFY `menu_id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `sb_news`
--
ALTER TABLE `sb_news`
  MODIFY `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sb_object`
--
ALTER TABLE `sb_object`
  MODIFY `object_id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `sb_slider`
--
ALTER TABLE `sb_slider`
  MODIFY `slider_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sb_type`
--
ALTER TABLE `sb_type`
  MODIFY `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `sb_user`
--
ALTER TABLE `sb_user`
  MODIFY `user_id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
