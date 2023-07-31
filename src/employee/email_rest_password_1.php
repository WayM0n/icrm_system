<?php
session_start();
include_once './db/configsetpassword.php';
if (isset($_POST['submit_password'])) {

    if (isset($_SESSION['token'])) {
        $token = $_SESSION['token'];
     
            $password =  $_POST['password']; 
            $cpassword =  $_POST['cpassword'];

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

                if ($password == $cpassword) {
                            $updatequery = "UPDATE user_details SET password = '$pass'  WHERE token = :token";
                            $prepared_pass = $pdo_updated_password->prepare($updatequery);
                            $prepared_pass->bindParam(':token', $_SESSION['token']);
                            $result_update_query = $prepared_pass->execute();
                          
                            if ($result_update_query) {
                                $_SESSION['message'] = "your password has been updated";
                                header("refresh:0.3;url='./email_correct_password.php'");
                            }
                            }else{
                            $_SESSION['passmsg'] = "Your password is not updated";
                            header("refresh:0.5;url='./email_rest_password'");
                            }
                }else{
                    $_SESSION['passmsg'] = "your password is not matching";

                }
} else {
    
}
?>
