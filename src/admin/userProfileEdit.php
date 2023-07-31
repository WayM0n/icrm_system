<?php
    session_start();
    if (isset($_SESSION['id'])) {
        require_once('./db/config.php');
        $detailsSearch =  "SELECT * FROM user_details JOIN user_full_details on user_details.id = user_full_details.u_id WHERE user_details.id = :id";
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
    <style>

body{margin-top:20px;
background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(16,79,89,0.6474964985994398) 100%);
    }
.avatar{
width:200px;
height:200px;
}	


td{
   color: #0457fc;
   font-weight: 500;
}




</style>
   <?php
     require_once('./inc/header.php');
   ?>
  <section class="" >
<div class="container form_back bg-light  mt-4 shadow-lg rounded-3 border border-white border-5 justify-content-center mb-4 ">
    <h1 class="text-white text-center shadow-lg bg-primary border border-1 border-light mt-3" >User Details</h1>
    
	<div class="row ">
      <div class="col-md-3 ">
        <form action="./update_profile.php" method="post" enctype="multipart/form-data" >
        <div class="text-center">
           <img class=" mt-3 border border-dark me-3 mb-3 " src="<?= $result['profile_pic'];?>" alt = "profile_image" width="200px" height="200px">
             <input type="file" id="image" class="form-control w-75 ms-4 mb-3" name="new_profile" >
           <button type="submit" name="user_update" class="  fs-5  text-white fw-3 bg-danger mb-2  ">Upload Profile</button>
         
        </div>
        </form>
      </div>
      <div class="col-md-7 ms-5 my-4 personal-info  ">
      <table class="table text-center table-responsive table-borderless">
       <h3 class="fs-3 fw-bold border-bottom " >Personal-info :-</h3>
                        <tbody>
                        <form action="./update_user_profile.php" enctype="multipart/form-data" method="post">
                        <div class="row gx-3 mt-4 mb-2">
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
                         <div class="row gx-3 ">
                            <div class="col-md-6">
                                <label class="fs-5   mb-1" for="dist">Date-Of-Birth</label>
                                <input class="form-control" name="dob"  id="dob" type="date" placeholder="Date-Of-Birth...." value="<?php echo $result['dob']?>" >
                            </div>
                              <div class="col-md-6">
                                <label class="fs-5   mb-1" for="gender">Gender</label>
                                 <input class="form-control" name="gender"  id="gender" type="text" placeholder="Gender...." value="<?php echo $result['gender']?>" >
                                
                            </div>
                         </div>
                   
                        </tbody>
                        
                    </table>   
        </div>
        <h3 class=" fs-3 fw-bold  bg-primary border border-1 border-light  mb-5 text-white p-2 shadow-lg add" >Address :-</h3>
              </div>
            <div class="col-md-9 personal-info ms-5">
                 <table class="table  table-responsive table-borderless">
                        <tbody>
                        
                     <div class="row gx-3 mb-4">
                       <div class="col-md-6">
                                <label class="fs-5   mb-1" for="city">City</label>
                                <input class="form-control" name="city"  id="city" type="text" placeholder="city.." value="<?php echo $result['city']?>" >
                            </div>
                        <div class="col-md-6">
                                <label class="fs-5   mb-1" for="tehsil">Tehsil</label>
                                <input class="form-control" name="tehsil"  id="tehsil" type="text" placeholder="tehsil...." value="<?php echo $result['tehsil']?>" >
                            </div>
                     </div>

                     <div class="row gx-3 mb-4">
                       <div class="col-md-6">
                                <label class="fs-5   mb-1" for="dist">District</label>
                                <input class="form-control" name="district"  id="dist" type="text" placeholder="district...." value="<?php echo $result['district']?>" >
                            </div>
                        <div class="col-md-6">
                                <label class="fs-5   mb-1" for="pin">Pin Code</label>
                                <input class="form-control" name="pin"  id="pin" type="text" placeholder="Pin Code......" value="<?php echo $result['pin_code']?>" >
                            </div>
                     </div>
                       <div class="row gx-3 mb-4">
                       <div class="col-md-6">
                                <label class="fs-5   mb-1" for="adhar">Aadhar Card Number</label>
                                <input class="form-control" name="aadhar_card"  id="adhar" type="tel" placeholder="Adhar...." value="<?php echo $result['aadhar_card']?>" >
                            </div>
                        <div class="col-md-6">
                                <label class="fs-5   mb-1" for="state">State </label>
                                <input class="form-control" name="state"  id="state" type="text" placeholder="state.. Code......" value="<?php echo $result['state']?>" >
                            </div>
                     </div>
                     <div class="text-center">
                           
                            <button type="submit" name="user_profile_update" class="p-2 rounded-3 fs-5 px-5 text-white fw-3 bg-primary mb-0  ">Update</button>
                        </div>
                        </tbody>
                         </form>
                    </table>
        </div>
              
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