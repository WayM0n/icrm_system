<?php
    $host = 'localhost';
    $db = 'icrm_customers';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try{
        $pdo = new PDO($dsn,$user,$password);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>