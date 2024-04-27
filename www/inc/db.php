<?php
$dsn="mysql:dbname=php-dm-db;host=localhost;charset=utf8";

$username="root";
$password="";

// Pour docker
// $password="root";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch(Exception $error) {
    echo "<h1>Erreur de connexion</h1>";
    var_dump($error->getMessage());
    exit();
}