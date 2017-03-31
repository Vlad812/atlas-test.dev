--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.34.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 31.03.2017 4:20:20
-- Версия сервера: 5.6.34
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE atlas;

--
-- Описание для таблицы placemarkers
--
DROP TABLE IF EXISTS placemarkers;
CREATE TABLE IF NOT EXISTS placemarkers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) DEFAULT NULL,
  lat DECIMAL(9, 6) DEFAULT NULL,
  lon DECIMAL(9, 6) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 17
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

DELIMITER $$

--
-- Описание для функции harvesine
--
DROP FUNCTION IF EXISTS harvesine$$
CREATE FUNCTION harvesine(lat1 double, lon1 double, lat2 double, lon2 double)
  RETURNS double
return  6371 * 2 * ASIN(SQRT(POWER(SIN((lat1 - abs(lat2)) * pi()/180 / 2), 2) 
         + COS(abs(lat1) * pi()/180 ) * COS(abs(lat2) * pi()/180) * POWER(SIN((lon1 - lon2) * pi()/180 / 2), 2) ))
$$

DELIMITER ;

-- 
-- Вывод данных для таблицы placemarkers
--
INSERT INTO placemarkers VALUES
(14, 'Дворцовый Мост', 59.941141, 30.308155),
(15, 'Стрелка', 59.943768, 30.307082),
(16, 'Эрмитаж', 59.939567, 30.313811);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;