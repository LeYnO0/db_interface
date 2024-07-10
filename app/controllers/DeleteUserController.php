<?php

require_once '../../dbconnection.php';

$id = $_GET['id'];
//elementary selection for deletion by id, which is passed by GET-parameter
$query = "DELETE FROM users WHERE id='$id'";

mysqli_query($connect, $query);
header('Location: ../../resources/views/data/preview_data.php');
