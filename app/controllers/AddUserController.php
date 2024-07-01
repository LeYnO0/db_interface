<?php
session_start();
require_once '../../dbconnection.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$hashed_password = md5($_POST['password']);

$query = "INSERT INTO users(name, surname, gender, birthday, hashed_password) VALUES ('$name', '$surname', '$gender', '$birthday', '$hashed_password');";

if(!DateTime::createFromFormat('Y-m-d', $birthday)){
    $_SESSION['message'] = 'Введите дату в формате ГГГГ-ММ-ДД';
    header("Location: ../../resources/views/data/add_user.php");
}elseif(!$name){
    $_SESSION['message'] = 'Поле Name обязательно';
    header("Location: ../../resources/views/data/add_user.php");
}elseif(!$surname){
    $_SESSION['message'] = 'Поле Surname обязательно';
    header("Location: ../../resources/views/data/add_user.php");
}else{
    mysqli_query($connect, $query);
    header('Location: ../../resources/views/data/preview_data.php');
}

?>