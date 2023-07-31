<?php
    session_start();
    if (isset($_SESSION['id'])) {
        if (isset($_POST['btnSol'])) {
            include_once './db/configComplaints.php';

            $sql_query_solve = "UPDATE `solution_complaints` SET`solution`=:solution,`solved_on`=:solved_on,`emp_id`=:emp_id WHERE complaint_id = :c_id";

            $prepared_solution_query = $pdo_com->prepare($sql_query_solve);

            date_default_timezone_set("Asia/Kolkata");
            $solved_on = date('Y-m-d H:i:s', time());

            $prepared_solution_query->bindParam(':solution', $_POST['solu']);
            $prepared_solution_query->bindParam(':solved_on', $solved_on);
            $prepared_solution_query->bindParam(':emp_id', $_SESSION['id'],PDO::PARAM_INT);
            $prepared_solution_query->bindParam(':c_id', $_POST['c_id']);

            $update_Solution = $prepared_solution_query->execute();

            $status = 1;
            $sql_update_complaint_status = "UPDATE `user_complaints` SET `comp_status` = :status WHERE `c_id` = :c_id ";
            $prepared_complaint_status_query = $pdo_com->prepare($sql_update_complaint_status);
            $prepared_complaint_status_query->bindParam(':status', $status, PDO::PARAM_INT);
            $prepared_complaint_status_query->bindParam(':c_id', $_POST['c_id'], PDO::PARAM_INT);
            $update_status=$prepared_complaint_status_query->execute();

            if ($update_Solution && $update_status) {
                 header("refresh:0;url='./reviews.php'");
                //reviews.php header
            } else {
                //header for complaints.php
                 header("refresh:0;url='./complaints.php'");
            }
        } else {
            //header for complaints.php
             header("refresh:0;url='./complaints.php'");
        }
    }
    else{
        echo "nothing";
    }
?>