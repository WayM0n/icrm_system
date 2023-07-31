
<?php
session_start();
include_once './db/config.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
       $emailquery = "SELECT * FROM user_details WHERE email = :email ";
        $prepare_select_query = $pdo->prepare($emailquery);
        $prepare_select_query->bindParam(':email',$email);
        $prepare_select_query->execute();
        $result = $prepare_select_query->fetch();
        $username = $result['f_name'];
        $token = $result['token'];
        if($result){
            
                $subject = "Password Reset";
                $body = "Hi, $username  Click here too reset your password http://localhost/icrm/src/employee/email_rest_password.php?token=$token";
                $headers = "From: mk3500112@gmail.com";

                if (mail($email, $subject, $body, $headers)) {
                 $_SESSION['token'] = $token;
                    $_SESSION['message'] = "Check you mail to reset your password $email";
                  $_SESSION['token'] = $token;
                    header("refresh:0;url='./logina.php'");
                } else {
                    mail($email, $subject, $body, $headers);
                    echo "Email sending failed...";
                }
}
else{
    echo "no";
}

// if(isset($_POST['email_submit'])){
//     $email = $_POST['email'];
//     echo $email ? 't' : 'f';
//     // $name = $result['token'];
//     // $token = $result['token'];
//     // $emailquery = "SELECT * FROM `user_details` WHERE email = :email ";
//     // $prepare_select_query = $pdo->prepare($emailquery);
//     // $prepare_select_query->bindParam(':email', $email);
//     // $prepare_select_query->execute();
//     // $result = $prepare_select_query->fetch();
//     // if ($result) {
//     //     $subject = "Password Reset";
//     //     $body = "Hi, $name  Click here too reset your password http://localhost/icrm/project/mini%20Project/src/Customer/reset_pass.php?token=$token";
//     //     $headers = "From: mk3500112@gmail.com";

//     //     if (mail($email, $subject, $body, $headers)) {
//     //         $_SESSION['message'] = "check you mail to reset your password $email";
//     //         header("refresh:0;url='./logina.php'");
//     //     } else {
//     //         mail($email, $subject, $body, $headers);
//     //         echo "Email sending failed...";
//     //     }

//     //     // header("refresh:0;url='./signUp.html'");
//     // }

// }
// else{
//     echo "<script>alert('No email found.')</script>";
 }
      
?>