<?php

session_start();
//удаляем массив, который созавали в контроллере показа юзера
unset($_SERVER['user_data']);

header('Location: ../../resources/views/data/preview_data.php');

