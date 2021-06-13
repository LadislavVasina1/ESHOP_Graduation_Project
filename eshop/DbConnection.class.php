<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'eshop');
 
/* Připojení k DB */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME .';charset=utf8', DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::MYSQL_ATTR_MULTI_STATEMENTS, false);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
