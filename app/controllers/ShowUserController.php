<?php

session_start();
require_once '../../dbconnection.php';


$user_id = $_GET['id'];
$get_user = mysqli_query($connect, "SELECT * FROM users WHERE id='$user_id';");


if(isset($_GET['id'])){
    if(mysqli_num_rows($get_user) > 0){
        $user = mysqli_fetch_assoc($get_user);

        $_SESSION['user_data'] = [
            'id' => $user['id'],
            'name' => $user['name'], 
            'surname' => $user['surname'], 
            'gender' => $user['gender'], 
            'birthday' => $user['birthday'], 
        ];
        header('Location: ../../resources/views/data/full_user_data.php');
    }
}


?>