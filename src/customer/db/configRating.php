<?php
    $host = 'localhost';
    $db = 'icrm_rating';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try{
        $pdo_rate = new PDO($dsn,$user,$password);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>