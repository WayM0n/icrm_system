<?php
session_start();
if(isset($_SESSION['id'])){
    include_once './db/configRating.php';
    if(isset($_POST['ratingBtn'])){
        $satisfaction = $_POST['exp'];
        $communication = $_POST['range'];
        $sol_rate = $_POST['sol_rate'];
        $suggestion = ($_POST['suggestion']!=="")?$_POST['suggestion']:"No Suggestion";
        $sql = "UPDATE `customer_review` SET `solution_satisfaction`=:satisfaction,`communication_rate`=:communication,`rating`=:sol_rate,`suggestion`=:suggestion WHERE solution_id = :solution_id";
        $sql_prepared = $pdo_rate->prepare($sql);
        $sql_prepared->bindParam(':satisfaction', $satisfaction,PDO::PARAM_INT);
        $sql_prepared->bindParam(':satisfaction', $satisfaction,PDO::PARAM_INT);
        $sql_prepared->bindParam(':communication', $communication,PDO::PARAM_INT);
        $sql_prepared->bindParam(':sol_rate', $sol_rate,PDO::PARAM_INT);
        $sql_prepared->bindParam(':suggestion', $suggestion);
        $sql_prepared->bindParam(':solution_id', $_POST['solution_id']);
        $sql_result = $sql_prepared->execute();
        if($sql_result){
           header("refresh:0;url='./complaints.php'");
        }
        else{
           header("refresh:0;url='./complaints.php'");
        }
    }
    else{
        header("refresh:0;url='./complaints.php'");
        }
    }

?>