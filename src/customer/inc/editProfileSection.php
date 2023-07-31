<?php
    require_once('./db/config.php');
    $detailsSearch =  "SELECT * FROM user_details JOIN user_full_details on user_details.id = user_full_details.u_id WHERE user_details.id = :id";
    $query = $pdo->prepare($detailsSearch);
    $query->bindParam(':id', $_SESSION['id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $pic=explode('\\',$result['profile_pic']);
?>

<section id="profile" class="m-lg-5 user-select-none">
    <div class="container p-4">
        <div class="row mx-lg-5 mx-sm-4">
            <div class="card shadow-lg px-lg-5 py-3 px-sm-2 rounded-4">
                <div class="card-titile">
                        <p class="d-inline-block float-end shadow-lg p-2 rounded-5 fw-semibold">
                            <a href="./profile.php" class="text-decoration-none text-secondary">
                                <span class="h5 bi bi-person-square rounded-5 shadow-lg me-1"></span>View Profile
                            </a>
                        </p>
                </div>
                
                <div class="card-body px-lg-3 px-sm-1">
                    
                    <div class="container-fluid">
                        <div class="row align-items-center g-2">
                            <!-- Profile Pic -->
                            <div class="col-sm-12 col-md-12 col-lg-6 text-center my-2">
                            <form action="updateProfilePic.php" method="post" enctype="multipart/form-data">
                                    <div class="text-center">
                                        <div class="img-fluid py-1">
                                            <img id="img_profile" src="<?= $result['profile_pic'];?>" alt="profile_pic" class="img_profile img-fluid img-thumbnail">
                                        </div>
                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="new_profile_pic" class="pb-2">Profile Pic</label>
                                            <input type="file" accept="image/*"    class="form-control" name="new_profile_pic" accept="image/jpeg" size="500000" width="300" height="300"id="new_profile_pic" value="<?php echo $pic[2] ?>" required >
                                        </div>
                                        <button type="submit" name="updatePic" class=" mt-3 rounded-2 fs-5 p-2  text-white fw-3 bg-primary border-0 mb-2 shadow-lg ">Upload Profile</button>
                                        </form>
                                    </div>
                            </div>
                            <!-- Details -->
                            <div class="col-sm-12 col-md-12 col-lg-6 text-center my-3">
                                 <form action="updateProfile.php" method="post" enctype="multipart/form-data">
                                <div class="card border-0">
                                    <div class="card-header text-white text-center ">
                                        <p class="h3 rounded-top truly-basic p-2">
                                            Personal Details
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="f_name" class="pb-2">First Name</label>
                                            <input type="text" class="form-control" name="f_name" pattern="[A-Z][a-z]{0,19}" maxlength="20" id="f_name" value="<?php echo $result['f_name']?>"  required>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="l_name" class="pb-2">Last Name</label>
                                            <input type="text" class="form-control" name="l_name" value="<?php echo $result['l_name']?>"  id="l_name" pattern="[A-Z][a-z]{0,19}" maxlength="20" required>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="f_name" class="pb-2">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" required value="<?php echo $result['email']?>">
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="phone" class="pb-2">Contact</label>
                                            <input type="tel" 
                                            class="form-control" name="phone" maxlength="10"  value="<?php echo $result['contact']?>"  id="phone" 
                                            pattern="[0-9]{10}" minlength="10">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row align-items-center g-2">
                            <!-- Other Details -->
                            <div class="col-sm-12 col-md-12 col-lg-6 text-center my-3">
                                <div class="card border-0">
                                    <div class="card-header text-white text-center ">
                                        <p class="h3 rounded-top truly-comfort p-2">
                                            Other Details
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="plan_type" class="pb-2">Plan Type</label>
                                            <select name="plan_type" id="plan_type" class="form-select">
                                                <option selected disabled>Choose Here</option>
                                                <option value="Prepaid VoLTE">Prepaid VoLTE</option>
                                                 <option value="Postpaid VoLTE">Postpaid VoLTE</option>
                                                 
                                            </select>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="aadhar" class="pb-2">Aadhar Card No.</label>
                                            <input type="text" class="form-control" name="aadhar_card" pattern="[0-9]{12}" value="<?php echo $result['aadhar_card']?>" id="aadhar" required>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="registered" class="pb-2">Registered On</label>
                                            <input type="date" class="form-control" name="registered" id="registered">
                                        </div>

                                        
                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="dob" class="pb-2">Date-of-Birth</label>
                                            <input type="date" class="form-control" name="dob" id="dob" >
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="gender" class="pb-2">Gender</label>
                                            <select name="gender" id="gender" class="form-select">
                                                <option selected disabled>Choose Here</option>
                                                <option value="Male">Male</option>
                                                 <option value="Female">Female</option>
                                                  <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 text-center my-3">
                                <div class="card border-0">
                                    <div class="card-header text-white text-center ">
                                        <p class="h3 rounded-top truly-premium p-2">
                                            Address
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="city" class="pb-2">City</label>
                                            <input type="text" class="form-control" value="<?php echo $result['city']?>" name="city" id="city" pattern="[A-Z][a-z]{0,19}" maxlength="20" required>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="tehsil" class="pb-2">Tehsil</label>
                                            <input type="text" class="form-control" name="tehsil" pattern="[a-zA-Z]+ [a-zA-Z]+" title="Please enter a valid first and last name with a whitespace in between"id="tehsil" value="<?php echo $result['tehsil']?>" required>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="distt" class="pb-2">District</label>
                                            <input type="text" class="form-control" pattern="[A-Z][a-z]{0,19}" maxlength="20" name="district" value="<?php echo $result['district']?>" id="distt" required>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="pincode" class="pb-2">Pin Code</label>
                                            <input type="text" class="form-control" value="<?php echo $result['pin_code']?>" name="pin_code" pattern="[0-9]{6}" maxlength="6"  id="pincode" required>
                                        </div>

                                        <div class="mt-2 text-start fw-semibold">
                                            <label for="state" class="pb-2">State</label>
                                            <input type="text" class="form-control" name="state" value="<?php echo $result['state']?>" id="state" pattern="[a-zA-Z]+ [a-zA-Z]+" title="Please enter a valid first and last name with a whitespace in between" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 text-center">
                    <button type="submit" class="btn btn-success" name="btnSubmit">Save Changes</button>
                    <button type="reset" class="btn btn-danger ps-2" name="btnReset">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>