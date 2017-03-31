
Версия Symfony 3.2.2 

Рабочий демо пример: http://placemarkers.sofftolion.ru/

Использование: 

  Главная страница : манипуляции с метками
  
  /search - указание области для поиска (выбрать область нажать "Выбрать")
  
  /result - результаты поиска

  Логика приложения: src/AppBundle
  
  Js код: web/public/js/main.js
   
Требования:
    
    php 5.4+
    MySql 5.6
    
    Jquery 3.1
    Bootstrap 3
    
Дамп БД: файл atlas.sql
         
   Установка:
   
   1. Создать Бд  - atlas
   2. Импортировать данные из sql файла (таблица placemarkers, функция harvesine
   , тестовые данные для таблицы)
   3. Установить настройки соединения с БД в  app/config/parametrs.yml
   
   