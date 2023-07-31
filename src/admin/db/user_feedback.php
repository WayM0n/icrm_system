<?php
    $host = 'localhost';
    $db = 'user_form';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try{
        $pdo_feed = new PDO($dsn,$user,$password);

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>