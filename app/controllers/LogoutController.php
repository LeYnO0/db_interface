<?php

session_start();
//When clicking on the "Logout" button on the preview_data view, the admin array is stung and redirected to the authorization page
unset($_SESSION['admin']);

header('Location: ../../resources/views/auth/singin.php')

?>