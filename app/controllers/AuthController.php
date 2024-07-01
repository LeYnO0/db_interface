<?php

    session_start();

    require_once '../../dbconnection.php';

    $form_hashed_password = md5($_POST['password']);
    $form_email = $_POST['email'];

    $check_admin = mysqli_query($connect, "SELECT * FROM admins WHERE email = '$form_email' AND hashed_password ='$form_hashed_password';");

    if(mysqli_num_rows($check_admin) > 0){

        $user = mysqli_fetch_assoc($check_admin);

        $_SESSION['admin'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email']
            
        ];
        header('Location: ../../resources/views/data/preview_data.php');

    }else{
        $_SESSION['message'] = 'Неверная почта или пароль';
        header('Location: ../../resources/views/auth/singin.php');
    }
    
?>