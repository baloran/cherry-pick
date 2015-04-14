<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', 'localhost');
define('DB_NAME', 'php_password');
define('DB_USER', 'root');
define('DB_PASS', '');

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}


require './core/controller.php';

// Ou, en utilisant une fonction anonyme à partir de PHP 5.3.0
spl_autoload_register(function ($class) {
    include './app/controller/' . $class . '.php';
});