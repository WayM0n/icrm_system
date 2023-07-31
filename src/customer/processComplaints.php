<?php
session_start();
if(isset($_SESSION['id'])){
    require_once('./db/configComplaints.php');
    require_once('./db/configRating.php');
    if(isset($_POST['submit_complaints'])){
        date_default_timezone_set("Asia/Kolkata");
        $status = 0;
        $raised_on_date = date('Y-m-d H:i:s', time());

        $sql_insert_complaint = "INSERT INTO `user_complaints` (`title`, `description`, `raised_on`, `comp_status`, `submitted_by`) VALUES (:title,:description,:raised_on,:status,:user_id);";

        $prepeare_insert_complaint = $pdo_com->prepare($sql_insert_complaint);
        $prepeare_insert_complaint->bindParam(':title', $_POST['title']);
        $prepeare_insert_complaint->bindParam(':description', $_POST['description']);
        $prepeare_insert_complaint->bindParam(':raised_on', $raised_on_date);
        $prepeare_insert_complaint->bindParam(':status', $status,PDO::PARAM_INT);
        $prepeare_insert_complaint->bindParam(':user_id', $_SESSION['id'],PDO::PARAM_INT);

        $stored_complaint = $prepeare_insert_complaint->execute();

        //getting complaint id to insert into solution table
        $get_comp_id = "SELECT c_id FROM user_complaints WHERE submitted_by = :u_id ORDER BY raised_on DESC";
        $prepared_comp_id = $pdo_com->prepare($get_comp_id);
        $prepared_comp_id->bindParam(':u_id', $_SESSION['id']);
        $prepared_comp_id->execute();
        $comp_id = $prepared_comp_id->fetch();

        $insert_solution_data = "INSERT INTO `solution_complaints`(`complaint_id`) VALUES (:comp_id)";
        $prepared_solution = $pdo_com->prepare($insert_solution_data);
        $prepared_solution->bindParam(':comp_id', $comp_id[0]);
        $sol_added = $prepared_solution->execute();

        //rating table
        //getting solution id to insert into rating table
        require_once('./db/configRating.php');
        $get_sol_id = "SELECT sol_id FROM solution_complaints WHERE complaint_id = :c_id ORDER BY sol_id DESC";
        $prepared_sol_id = $pdo_com->prepare($get_sol_id);
        $prepared_sol_id->bindParam(':c_id', $comp_id[0]);
        $prepared_sol_id->execute();
        $sol_id = $prepared_sol_id->fetch();

        $insert_rating_data = "INSERT INTO `customer_review`(`solution_id`) VALUES (:sol_id)";
        $prepared_rating = $pdo_rate->prepare($insert_rating_data);
        $prepared_rating->bindParam(':sol_id', $sol_id[0]);
        $rating_added = $prepared_rating->execute();



        if($stored_complaint && $sol_added && $rating_added){
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
else{
    header("refresh:0;url='./complaints.php'");
}
?>