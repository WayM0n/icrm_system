<?php
    $host = 'localhost';
    $db = 'icrm_issues';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try{
        $pdo_issue = new PDO($dsn,$user,$password);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>