<?php

session_start();
require_once '../../dbconnection.php';
//similarly with admin registration, get data from the update form
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
//generate a query with updated data
$query = "UPDATE users SET name='$name', surname='$surname', gender='$gender', birthday='$birthday' WHERE id='$id'";
//standard format and missing data checks
if (!DateTime::createFromFormat('Y-m-d', $birthday)) {
    $_SESSION['message'] = 'Введите дату в формате ГГГГ-ММ-ДД';
    header("Location: ../../resources/views/data/edit_data.php?id=$id");
} elseif (!$name) {
    $_SESSION['message'] = 'Поле Name обязательно';
    header("Location: ../../resources/views/data/edit_data.php?id=$id");
} elseif (!$surname) {
    $_SESSION['message'] = 'Поле Surname обязательно';
    header("Location: ../../resources/views/data/edit_data.php?id=$id");
} else {
    mysqli_query($connect, $query);
    header('Location: ../../resources/views/data/preview_data.php');
}
