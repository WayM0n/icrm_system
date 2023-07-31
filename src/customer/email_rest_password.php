<?php
session_start();
// include_once './db/configsetpassword.php';
// if (isset($_POST['submit_password'])) {

//     if (isset($_SESSION['token'])) {
//         $token = $_SESSION['token'];
     
//             $password =  $_POST['password']; 
//             $cpassword =  $_POST['cpassword'];

//             $pass = password_hash($password, PASSWORD_BCRYPT);
//             $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

//                 if ($password == $cpassword) {
//                             $updatequery = "UPDATE user_details SET password = '$pass'  WHERE token = :token";
//                             $prepared_pass = $pdo_updated_password->prepare($updatequery);
//                             $prepared_pass->bindParam(':token', $_SESSION['token']);
//                             $result_update_query = $prepared_pass->execute();
//                             var_dump($result_update_query);
//                             if ($result_update_query) {
//                                 $_SESSION['message'] = "your password has been updated";
//                                 header("refresh:0.3;url='./email_correct_password.php'");
//                             }
//                             }else{
//                             $_SESSION['passmsg'] = "your password is not updated";
//                             header("refresh:0.5;url='./email_rest_password'");
//                             }
//                 }else{
//                     $_SESSION['passmsg'] = "your password is not matching";

//                 }
// } else {
    
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Icrm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body{
        background-image: linear-gradient(blue, pink);
      height: 937px;
        background-repeat: no-repeat;
        }
        #create_table{
         margin-top: 200PX;
          
        }
       .reset{
        background: rgb(62,198,199);
background: linear-gradient(90deg, rgba(62,198,199,1) 0%, rgba(218,233,233,1) 0%, rgba(62,198,199,1) 0%, rgba(13,38,232,1) 0%, rgba(6,14,237,1) 73%);
       }
       .text_link{
    color: darkblue;
       }
 
</style>

</head>

<body >

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 
        <div class="container">
            <div class="row">
                <div class="col-lg-3" ></div>
                <div class="col-lg-6" id="create_table">
                <div class="text-center" ><span class=" mb-2 fa fa-key fs-1 text-white bg-primary p-2 rounded-5 "></span></div>
                    <div>
                    <h1 class="text-center" >Set new password</h1>
                    <p class="text-center text-white" >Your new password must be different to previousaly used passwords.</p>
                    <p>
                    <?php
                    if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    }?></p>
                    <form action="./email_rest_password_1.php" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                        <label for="password"  class="text-start fw-bold fs-5" >Password</label>
                        <input type="password" class="form-control mb-3" name="password" id="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" placeholder="Password *" value="" required/>
                        <p class="fw-dark text-dark" >Must be atleast 8 cxharacters**.</p>
                        <label for="cpassword"  class="text-start fw-bold fs-5" >Confirm Password</label>
                        <input type="password" class="form-control mb-3" name="cpassword" id="cpassword" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" placeholder="Confirm Password *" value="" required/>
                        </div>

                        <button type="submit" name="submit_password"  class="reset form-control mt-1 text-center border border-0 btn text-white fw-bold" >  Update Password</button>

                    </form>

                    <div class="text-center mt-3" >
                    <a href="./logina.php" class="text-dark fw-bold text-center" > <span class="fa fa-arrow-left text_link " > Back to login</span> </a>
                    </div>
                    </div>
                     <div class="col-lg-3" ></div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>



