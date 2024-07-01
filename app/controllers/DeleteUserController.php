<?php

require_once '../../dbconnection.php';

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id='$id'";

mysqli_query($connect, $query);
header('Location: ../../resources/views/data/preview_data.php');

?>