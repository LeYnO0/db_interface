<?php

use Dotenv\Dotenv;
require 'vendor/autoload.php';

$dotenv = Dotenv::createMutable(__DIR__);


$dotenv->load();

$connect = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']); 

if(!$connect){
	die('Error connection in database...');
}

?>