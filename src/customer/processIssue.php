<?php
session_start();
if(isset($_SESSION['id'])){
    require_once('./db/configIssue.php');
    if(isset($_POST['submit_issue'])){
        date_default_timezone_set("Asia/Kolkata");
        $status = 0;
        $raised_on_date = date('Y-m-d H:i:s', time());
        $proof_by_default = isset($_FILE['proof'])?$_FILE['proof']['tmp_name']:null;
        $sql_insert_issue = "INSERT INTO `user_issues` ( `title`, `description`, `proof`, `raised_by`, `raised_on`) VALUES (:title,:description,:proof,:raised_by,:raised_on);";

        $prepeare_insert_issue = $pdo_issue->prepare($sql_insert_issue);
        $prepeare_insert_issue->bindParam(':title', $_POST['title']);
        $prepeare_insert_issue->bindParam(':description', $_POST['description']);
        $prepeare_insert_issue->bindParam(':raised_on', $raised_on_date);
        $prepeare_insert_issue->bindParam(':raised_by', $_SESSION['id'],PDO::PARAM_INT);
        if (is_null($proof_by_default)) {
            $prepeare_insert_issue->bindParam(':proof', $proof_by_default, PDO::PARAM_NULL);
        }
        else{
            $prepeare_insert_issue->bindParam(':proof', $proof_by_default);
        }
        $stored_issue = $prepeare_insert_issue->execute();

        if($stored_issue){
            header("refresh:0;url='./issues.php'");
        }
        else{
            header("refresh:0;url='./issues.php'");
        }
        
    }
    else{
        echo "imposible";
        header("refresh:0;url='./issues.php'");
    }
}
else{
    header("refresh:0;url='./issues.php'");
}
?>