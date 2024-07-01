<?php

session_start();

unset($_SERVER['user_data']);

header('Location: ../../resources/views/data/preview_data.php');

?>