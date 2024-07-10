<?php

session_start();

require_once '../../dbconnection.php';

//getting admin data from the registration field
$login = $_POST['login'];
$email = $_POST['email'];
$hashd_password = md5($_POST['password']);
$reg_date = date('Y-m-d H:i:s');

//data validation block from the registration form
if (strlen($_POST['password']) < 9) {
    $_SESSION['message'] = 'Минимальная длина пароля - 8 символов';
    header('Location: ../../index.php');
}
//selection of strings for the presence of already used login and mail
$check_login = mysqli_query($connect, "SELECT * FROM admins WHERE login='$login';");
$check_email = mysqli_query($connect, "SELECT * FROM admins WHERE email='$email';");

//checking uniqueness of login and email
if (mysqli_num_rows($check_login) > 0) {
    $_SESSION['message'] = 'Пользователь с таким логином уже существует';
    header('Location: ../../index.php');
} elseif (mysqli_num_rows($check_email) > 0) {
    $_SESSION['message'] = 'Такой email уже используется';
    header('Location: ../../index.php');
} else {
    //execute the registration request with parameters from the form and the date function to get the current time
    mysqli_query($connect, "INSERT INTO `admins`(`login`, `email`, `hashed_password`, `reg_data`) VALUES ('$login', '$email', '$hashd_password', '$reg_date');");
    header('Location: ../../resources/views/auth/singin.php');
}
