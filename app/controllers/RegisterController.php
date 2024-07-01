<?php

//Требуется создать иаблицы БД с пользователями и админами. SQL-запрос 
//на создание таблицы пользователей выглядит след. образом:

//-------------------------------------------------------------
// CREATE TABLE users 
// (
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(100) NOT NULL,
//     surname VARCHAR(100) NOT NULL,
//     gender VARCHAR(20) DEFAULT NULL,
//     birthday Date NOT NULL,
//     hashed_password VARCHAR(255) NOT NULL
// );
//-------------------------------------------------------------


// запрос на создание таблицы админов выглядит след. образом:
//-------------------------------------------------------------

// CREATE TABLE admins 
// (
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     login VARCHAR(100) NOT NULL UNIQUE,
//     email VARCHAR(100) NOT NULL UNIQUE,
//     hashed_password VARCHAR(255) NOT NULL,
//     reg_data DATETIME NOT NULL,
//     delete_data DATETIME DEFAULT NULL
// );
// //-------------------------------------------------------------



session_start();

require_once '../../dbconnection.php';

$login = $_POST['login'];
$email = $_POST['email'];
$hashd_password = md5($_POST['password']);
$reg_date = date('Y-m-d H:i:s');

//блок проверки данных из формы регистрации
if(strlen($_POST['password']) < 9){
    $_SESSION['message'] = 'Минимальная длина пароля - 8 символов';
    header('Location: ../../index.php');
}
//выборка строк на наличие уже использующихся логина и почты
$check_login = mysqli_query($connect, "SELECT * FROM admins WHERE login='$login';");
$check_email = mysqli_query($connect, "SELECT * FROM admins WHERE email='$email';");

//проверка уникальности логина и email
if(mysqli_num_rows($check_login) > 0){
    $_SESSION['message'] = 'Пользователь с таким логином уже существует';
    header('Location: ../../index.php');
}elseif(mysqli_num_rows($check_email) > 0){
    $_SESSION['message'] = 'Такой email уже используется';
    header('Location: ../../index.php');
}else{
    //выполняем запрос регистрации с параметрами из формы и функцией date для получения текущего времени
    mysqli_query($connect, "INSERT INTO `admins`(`login`, `email`, `hashed_password`, `reg_data`) VALUES ('$login', '$email', '$hashd_password', '$reg_date');");
    header('Location: ../../resources/views/auth/singin.php');
}

?>