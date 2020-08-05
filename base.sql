--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `description`) VALUES
(1, 8, 100, 1596663544),
(2, 8, 210, 1596663558),
(3, 8, 800, 1596663581),
(4, 8, 350, 1596663591),
(5, 1, 150, 1596664275),
(6, 1, 240, 1596664285),
(7, 1, 680, 1596664297),
(8, 1, 500, 1596664317),
(9, 2, 840, 1596664366),
(10, 2, 390, 1596664376),
(11, 3, 550, 1596664418),
(12, 4, 400, 1596664448),
(13, 5, 750, 1596664478),
(14, 5, 630, 1596664488),
(15, 11, 220, 1596664525),
(16, 11, 380, 1596664534),
(17, 11, 820, 1596664545),
(18, 11, 330, 1596664554),
(19, 1, 330, 1596666399),
(20, 8, 550, 1596666428),
(21, 8, 320, 1596666437);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(55) NOT NULL,
  `login` varchar(55) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `fio` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `pass`, `fio`) VALUES
(1, 'yara1991@mail.ru', 'yara', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Катрановский Данила Адрианович '),
(8, 'anna@mail.ru', 'anna55', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Аронова Владислава Казимировна'),
(2, 'rebok@yandex.ru', 'rebok', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Разумов Эдуард Климентович'),
(3, 'rebok@yandex.ru', 'rebok3', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Разумов Эдуард Климентович'),
(4, 'rebok@yandex.ru', 'rebok1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Разумов Эдуард Климентович'),
(5, 'fillit@google.com', 'fillit', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Филимонов Вячеслав Святославович'),
(12, 'anna@mail.ru', 'anna2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Аронова Владислава Казимировна'),
(6, 'fillit@google.com', 'fillit2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Филимонов Вячеслав Святославович'),
(9, 'miha@mail.ru', 'miha1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Аронова Владислава Казимировна'),
(7, 'fillit@google.com', 'fillit3', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Филимонов Вячеслав Святославович'),
(10, 'miha@mail.ru', 'miha2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Аронова Владислава Казимировна'),
(11, 'ermak100@yandex.ru', 'ermak100', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Еремеев Клавдий Брониславович'),
(13, 'anna@mail.ru', 'anna5', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Аронова Владислава Казимировна'),
(14, 'anna@mail.ru', 'anna10', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Аронова Владислава Казимировна');

