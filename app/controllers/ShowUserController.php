<?php

session_start();
require_once '../../dbconnection.php';

//get GET parameter id
$user_id = $_GET['id'];
//prepare a request
$query = "SELECT * FROM users WHERE id='$user_id';";
//run this query
$get_user = mysqli_query($connect, $query);


if (isset($_GET['id'])) {
    //if more than 0 rows are returned
    if (mysqli_num_rows($get_user) > 0) {
        $user = mysqli_fetch_assoc($get_user);
        //create a user_data array in the _SESSION array, which we use only on the page,
        //where we display the full data of the user, and when clicking on the "Home" button, we delete this array. It lives only within one view
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
