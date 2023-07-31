
<?php
session_start(); 
  ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Icrm</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
    footer {
        position: fixed;
        bottom: 0;
    }
    h3{
        text-shadow: 2px 2px 9px grey;
    }
    label{
        text-shadow: 2px 3px 6px grey;
    }
    #form{
        background-image: linear-gradient(blue, pink);
        height:100%;
    }
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
    .h-custom {
      height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }
    </style>

</head>

<body id="form" >

  <section class="vh-100 ">
  <div class="container h-custom ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./assets/img/Group9473.png" class="img-fluid"
          alt="Sample image" width="450px" height="250px">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                 <form action="./login.php" method="post" enctype="multipart/form-data" > 

                    <div>
                      <p class="bg-success text-white mt-5 rounded-2    shadow-lg fs-5  px-4">
                        <?php
                        if(isset($_SESSION['message'])){
                          echo  "<p class='bg-success text-white mt-5 rounded-2    shadow-lg fs-5 px-4'>".$_SESSION['message'];
                        }
                        else{
                           echo $_SESSION['message']="";                        
                          }
                       
                        ?>
                      </p>
                    </div>
                    
                        <label for="email" class="form-label pt-2 fs-4 ">EMAIL</label>
                        <input type="email" name="email" placeholder="abc23@gmail.com" id="email"  value="<?php
                        if (isset($_COOKIE['emailcookie'])) {
                          echo $_COOKIE['emailcookie'];
                        }
                        ?>"    class="form-control"required>

                        <label for="password" class="form-label pt-2 fs-4 ">PASSWORD</label>
                        <input type="password" name="password"  value="<?php
                        if (isset($_COOKIE['passwordcookie'])) {
                          echo $_COOKIE['passwordcookie'];
                        }
                        ?>"    placeholder="mon@45fgvc" id="password" class="form-control" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" required>
                        <div>
                        <input type="checkbox" name="rememberme" class="me-2 fs-4 mt-3">Remember Me
                        </div>

                        <button class="form-control btn btn-primary mt-2 text-white pt-1 mb-1" type="submit" name="submit"><b>Log-in</b></button>

                        <a href="recover_email.php" class="form-control mt-1 text-decoration-none text-center border border-0 bg-danger text-white fw-bold" type="reset" name="reset">Reset Password</a>

                        <p class="text-white text-center pt-2">Don't Have an account ? <a href="./signUp.html" class="fw-bold text-dark">SignUp Here</a></p>
                    </form>
      </div>
    </div>
  </div>
  
</section>


  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

?>