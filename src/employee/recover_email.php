
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
                    <h1 class="text-center" >Forget Password</h1>
                    <p class="text-center text-white" >No worries , we'll send you reset instructions.</p>
                    <form action="./recover_email1.php" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="email"  class="text-start fw-bold fs-5" >Email</label>
                     <input type="email" name="email" id="email" class="form-control" placeholder="Your Email *" value="" required/>
                    </div>

                    <button type="submit" name="submit"  class="reset form-control mt-1 text-center border border-0 btn text-white fw-bold" >  Reset Password</button>
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
?>