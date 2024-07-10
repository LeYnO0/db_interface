index.php является точкой входа приложения. По логике изначально админ не зарегестрирован, поэтому для потенциального админа первой отображается страница регистрации.

Приложение с точки зрения архитектуры похоже на MVC за исключением по сути отсутствующих моделей данных. Все манипуляции с БД проводятся посредством встроенных в PHP функций. Также нет миграций. Для создания таблиц можно использовать веб-интерфейс какой либо БД, но проще создать таблицы запросами, представленными ниже, чтобы не ошибиться в параметрах.

Для запуска приложения требуется файл .env с параметрами подключения к БД:
- DB_HOST=***
- DB_USERNAME=***
- DB_PASSWORD=***
- DB_DATABASE=***

Название переменных изменять нельзя.

Требуется создать таблицы БД с пользователями и админами. SQL-запрос
на создание таблицы пользователей выглядит след. образом:

 CREATE TABLE users  
(  
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,  
    name VARCHAR(100) NOT NULL,  
    surname VARCHAR(100) NOT NULL,  
    gender VARCHAR(20) DEFAULT NULL,  
    birthday Date NOT NULL,  
    hashed_password VARCHAR(255) NOT NULL  
);  

запрос на создание таблицы админов выглядит след. образом:

 CREATE TABLE admins  
(  
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,  
    login VARCHAR(100) NOT NULL UNIQUE,  
    email VARCHAR(100) NOT NULL UNIQUE,  
    hashed_password VARCHAR(255) NOT NULL,  
    reg_data DATETIME NOT NULL,  
    delete_data DATETIME DEFAULT NULL  
);


Из библиотек использовался пакет phpdotenv, который нужно установить через composer install.
Также использовался Bootstrap. Подлючен через link.

Для отображения проекта необходимо поместить его в директорию, которую просматривает сервер. Я использовал Apache2. Соответственно, если используете его, то нужно создать config-файл и симлинк на него в директории sites-enable. При желании пожно задать домен в host-файле.