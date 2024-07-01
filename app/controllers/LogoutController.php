<?php

session_start();

unset($_SESSION['admin']);

header('Location: ../../resources/views/auth/singin.php')

?>