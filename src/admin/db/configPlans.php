<?php
    $host = 'localhost';
    $db = 'isp_airtel_plans';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try{
        $pdo_plan = new PDO($dsn,$user,$password);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>