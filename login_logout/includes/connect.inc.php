<?php
date_default_timezone_set("Asia/Calcutta");
$DB_NAME = constant("DB_NAME");
$DB_USER = constant("DB_USER");
$DB_PASS = constant("DB_PASS");

try{
    $pdo = new PDO("mysql:host=localhost;dbname=$DB_NAME", $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    exit('DB Connection Failed');
}
?>