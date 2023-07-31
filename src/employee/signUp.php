<?php
    session_start();
    include_once './db/config.php';

    if(isset($_POST['register_submit'])){
        $firstname = $_POST['firstname'];
        $lastname =  $_POST['lastname']; 
        $contact =  $_POST['contact']; 
        $email =  $_POST['email']; 
        $cpassword =  $_POST['cpassword']; 
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
        $token =  bin2hex(random_bytes(15));
        $status = 'inactive';
        // $rpass = password_hash($rpassword, PASSWORD_BCRYPT);

        $emailquery = "SELECT * FROM user_details WHERE email = :email ";
        $prepare_select_query = $pdo->prepare($emailquery);
        $prepare_select_query->bindParam(':email',$email);
        $prepare_select_query->execute();
        $result = $prepare_select_query->fetch();
        if($result){
            echo "<script>alert('Email already exit.')</script>";
            // header("refresh:0;url='./signUp.html'");
        }
        else{
            if($cpassword){
                $insertQuery = "INSERT INTO user_details( f_name, l_name, email,contact,password,token,status) VALUES (:firstname,:lastname,:email,:contact,:pass,:token,:status)";
                $prepare_insert_query = $pdo->prepare($insertQuery);

                $prepare_insert_query->bindParam(':firstname',$firstname);
                $prepare_insert_query->bindParam(':lastname',$lastname);
                $prepare_insert_query->bindParam(':email',$email);
                $prepare_insert_query->bindValue(':contact',$_POST['contact']);
                $prepare_insert_query->bindParam(':pass',$cpass);
                $prepare_insert_query->bindParam(':token',$token);
                $prepare_insert_query->bindParam(':status',$status);
                
                $inserted=$prepare_insert_query->execute();
                $get_uid = "SELECT id FROM user_details WHERE email = :email";
                $prepared_uid = $pdo->prepare($get_uid);
                $prepared_uid->bindParam(':email', $email);
                $prepared_uid->execute();
                $u_id = $prepared_uid->fetch();
                
                //registered time
                date_default_timezone_set("Asia/Kolkata");
                $registered_on = date("Y-m-d");

                $insert_id_fullDetails = "INSERT INTO user_full_details (u_id,registered_on) VALUES(:u_id,:registered_on)";
                $prepared_insert_uid = $pdo->prepare($insert_id_fullDetails);
                $prepared_insert_uid->bindParam(':u_id', $u_id['id'],PDO::PARAM_INT);
                $prepared_insert_uid->bindParam(':registered_on', $registered_on);
                $inserted_full = $prepared_insert_uid->execute();
            }
                if($inserted && $inserted_full){
               
                $subject = "Email Activation";
                $body = "Hi, $firstname.$lastname. Click here too activate your account http://localhost/icrm/src/employee/activate.php?token=$token";
                $headers = "From: mk3500112@gmail.com";
                
                if(mail($email, $subject, $body, $headers)){
                   
                    $_SESSION['message'] = "check you mail to activate your account $email";
                    header("refresh:0;url='./logina.php'");
                }
                else {
                    mail($email, $subject, $body, $headers);
                    echo "Email sending failed...";
                }
                    // echo "<script>alert('Registered successfully')</script>";
                    // header("refresh:0;url='./signUp.html'");
                    // exit;
                }
                else{
                    echo "<script>alert('Registration Failed')</script>";
                    // header("refresh:0;url='./signUp.html'");
                    // exit;
                }
        }
    } else {
    echo "<script>alert('Something went wrong.')</script>";
    // header("refresh:0;url='./signUp.html'");
    // exit;
}
    ?>