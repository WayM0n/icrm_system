<?php
    $host = 'localhost';
    $db = 'icrm_employees';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try{
        $pdo_updated_password = new PDO($dsn,$user,$password);

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>