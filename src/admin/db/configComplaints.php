<?php
    $host = 'localhost';
    $db = 'icrm_complaints';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try{
        $pdo_com = new PDO($dsn,$user,$password);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>