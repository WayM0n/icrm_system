<?php
    require_once './db/configUserUpdate.php';
    $sql = 'SELECT * FROM `user_details` WHERE id = :id';
    $id = 39;
    $sql_prepared = $pdo->prepare($sql);
    $sql_prepared->bindParam(':id', $id, PDO::PARAM_INT);
    $exe = $sql_prepared->execute();
    $res = $sql_prepared->fetch();
    if($res){
    echo '<img src="' . $res['image'] . '" alt = "profile_image" width="200px" height="250px">';
    }
?>