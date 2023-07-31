<?php
    session_start();
    if (isset($_SESSION['id'])) {
        require_once('./db/config.php');
        $detailsSearch = "SELECT * FROM user_details WHERE id = :id ";
        $query = $pdo->prepare($detailsSearch);
        $query->bindParam(':id', $_SESSION['id']);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/stylesheet/style.css" rel="stylesheet">
        <link href="./assets/stylesheet/style2.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
   <?php
     require_once('./inc/header.php');
   ?>
  <section >
   <div class="container mb-5">
    <div class="row ">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <!-- Profile picture card-->
            <div class="card mt-4 mb-5 ">
                <div class="card-header bg-dark text-white fs-2 fw-bolder">User Profile</div>
                <div class="card-body ">
                
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkbY6P2zF7pnvbZ_RBdknvEmhKTshGma1qJkn4Q6A&s" >';
                    
                    <label for="cimage" class="ms-4  fs-5"><p class="mt-2" >Change Image</p>
                         <input type="file" id="cimage" class="form-control " name="image " style="width: 250px;">
                    </label>
                   
                </div>
                <div class="card-body ">
                    <form action="./user_details.php" enctype="mu" method="post">
                        
                        <div class="row gx-3 mb-4">
                            <div class="col-md-6">
                                <label class="fs-5   mb-1" for="inputFirstName">First name</label>
                                <input class="form-control " id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $result['f_name']?>" name="f_name">
                            </div>
                            <div class="col-md-6">
                                <label class="fs-5   mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="l_name"  id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $result['l_name']?>" >
                            </div>
                        </div>

                         <div class="row gx-3 mb-4">
                             <div class="col-md-6">
                            <label class="fs-5  mb-2" for="inputEmailAddress">Email address</label>
                            <input class="form-control mb-4" id="inputEmailAddress" name="email" placeholder="Enter your email address" value="<?php echo $result['email']?>" name="email" >
                            </div>
                              <div class="col-md-6">
                                <label class="fs-5   mb-1" for="contact">Contact</label>
                                <input class="form-control" name="contact"  id="contact"  placeholder="Enter your last name" value="<?php echo $result['contact']?>" >
                            </div>

                         </div>

                        
                        <div class="text-center">
                           
                            <button type="submit" name="user_update" class="p-2 rounded-3 fs-5 px-5 text-white fw-3 bg-primary  " >Update</button>
                        </div>
                    </form>
                </div>  
        </div>
        <div class="col-lg-2"></div>
    </div>
   </div>
   </section>
</body>
</html>
<?php
    }
    else{
        echo "<script>alert('login first')</script>";
        header("refresh:0;url='logina.php'");
    }
?>