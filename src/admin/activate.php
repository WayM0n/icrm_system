<?php
session_start();
include_once './db/configActivate.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $updatequery = "UPDATE user_details SET status= :status WHERE token = :token";
    $status = 'active';
    $update_prepare = $pdo_update->prepare($updatequery);
    $update_prepare->bindParam(':status',$status);
     $update_prepare->bindParam(':token',$_GET['token']);
    $ress = $update_prepare->execute();
    if($ress){
        if(isset($_SESSION['message'])){
            $_SESSION['message'] = "Account updated successfully";
             header("refresh:0;url=./logina.php");
        }else{
          
        }
    }else{
         $_SESSION['message'] = "Account Not updated ";
             header("refresh:0;url=./sign.html");
    }
}
?>