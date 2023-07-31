<?php
 include_once './db/config.php';

    if (isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $emailsearch = "SELECT * FROM `user_details` WHERE email = :email AND status = :status ";
        $status = 'active';
        $query = $pdo->prepare($emailsearch);
        $query->bindParam(':email', $email);
        $query->bindParam(':status',$status);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
            if($result){
                $db_pass = $result['password'];
                $pass_decode = password_verify($password, $db_pass);
                    if($pass_decode){
                        session_start();
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['name'] = $result['f_name']." ".$result['l_name'];
                        //$_SESSION['image'] = $result['image'];
                              if(isset($_POST['rememberme'])){
                                  setcookie('emailcookie', $email, time() + 86400);
                                  setcookie('passwordcookie', $password, time() + 86400);
                                 
                                header("refresh:0;url=./index.php");
                              }else{
                                    header("refresh:0;url=./index.php");
                              }
                    }else{
                        echo "<script>alert('password incorrect')</script>";
                          header("refresh:0;url='logina.php'");
                    }
            }else{
                echo "<script>alert('Invalid email')</script>";
                  header("refresh:0;url='./logina.php'");
                
            }
    }
    else{
        echo "<script>alert('something wrong')</script>";
    }

    ?>



