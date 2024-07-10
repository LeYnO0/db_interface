<?php

session_start();

require_once '../../dbconnection.php';

$form_hashed_password = md5($_POST['password']);
$form_email = $_POST['email'];
//simple sample query with a truth condition on both parameters (both login and password)
$query = "SELECT * FROM admins WHERE email = '$form_email' AND hashed_password ='$form_hashed_password';";

$check_admin = mysqli_query($connect, $query);
//if the sampling result is not zero
if (mysqli_num_rows($check_admin) > 0) {

    $user = mysqli_fetch_assoc($check_admin);
    //create in the global variable _SESSION an array with the authorized admin, which we will delete when the admin logs out of the system
    $_SESSION['admin'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "email" => $user['email']

    ];
    //redirect to the data view
    header('Location: ../../resources/views/data/preview_data.php');
} else {
    //create an error message and redirect the admin to the authorization page (the same one we are on).
    $_SESSION['message'] = 'Неверная почта или пароль';
    header('Location: ../../resources/views/auth/singin.php');
}
