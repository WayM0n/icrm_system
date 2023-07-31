<?php
    require_once('./db/config.php');
        $detailsSearch = "SELECT * FROM user_details JOIN user_full_details on user_details.id = user_full_details.u_id WHERE user_details.id = :id";
        $query = $pdo->prepare($detailsSearch);
        $query->bindParam(':id', $_SESSION['id'],PDO::PARAM_INT);
        $found = $query->execute();
        $result = $query->fetch();
?>

<section id="profile" class="m-lg-5 user-select-none">
    <div class="container p-4">
        <div class="row mx-lg-5 mx-sm-4">
            <div class="card shadow-lg px-lg-5 py-3 px-sm-2 rounded-4">
                <div class="card-titile">
                        <p class="d-inline-block float-end shadow-lg p-2 rounded-5 fw-semibold">
                            <a href="./editProfile.php" class="text-decoration-none text-secondary">
                                <span class="h5 bi bi-pencil-square rounded-5 shadow-lg me-1"></span>Edit Profile
                            </a>
                        </p>
                    </div>
                <div class="card-body px-lg-3 px-sm-1">
                    
                    <div class="container-fluid">
                        <div class="row align-items-center g-2">
                            <!-- Profile Pic -->
                            <div class="col-sm-12 col-md-12 col-lg-6 text-center  my-2">
                                    <div class="text-center">
                                        <div class="img-fluid  py-1">
                                            <img id="img_profile" src="<?= $result['profile_pic'];?>" alt="profile_pic" class="img_profile img-fluid img-thumbnail shadow-lg ">
                                        </div>
                                    </div>
                            </div>
                            <!-- Details -->
                            <div class="col-sm-12 col-md-12 col-lg-6 text-center my-3">
                                <div class="card border-0">
                                    <div class="card-header text-white text-center ">
                                        <p class="h3 rounded-top truly-basic p-2">
                                            Personal Details
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-bold p-2">First Name</td>
                                                        <td class="text-muted fw-semibold p-2">
                                                            <?php echo $result['f_name'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <td class="p-2 fw-bold">Last Name</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['l_name'] ?></td>
                                                    </tr>
                                                    <tr>
                                                    <td class="fw-bold p-2">Email</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['email'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold p-2">Contact</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['contact'] ?></td>
                                                    </tr>
                                                    <tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-12 col-md-12 col-lg-3 text-center my-3">
                                <div class="card  mx-2 rounded-4 shadow-lg">
                                    <div class="card-body rounded-4">
                                        <div class="card-title h3">Wanna Update Profile?</div>
                                        <div class="d-flex flex-row flex-sm-column">
                                            <h1 class="my-2 p-1">
                                                <span class="bg-label-blue rounded-circle bi bi-arrow-right-circle-fill bx bx-tada shadow-lg"></span>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td class="fw-bold p-2">Aadhar Card No.</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['aadhar_card']?$result['aadhar_card']:'Not Set'?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-2 fw-bold">Registered On</td>
                                                        <td class="text-muted fw-semibold p-2"><?php 
                                                        echo $result['registered_on']?date('d-M-Y',strtotime($result['registered_on'])):'Not Set'?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold p-2"><abbr title="Date-of-Birth" class="text-decoration-none">D-o-B</abbr></td>
                                                        <td class="text-muted fw-semibold p-2">
                                                            <?php 
                                                             echo $result['dob']?date('d-M-Y',strtotime($result['dob'])):'Not Set'
                                                             ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold p-2">Gender</td>
                                                        <td class="text-muted fw-semibold p-2">
                                                            <?php echo $result['gender']?$result['gender']:'Not Set'?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-bold p-2">City</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['city']?$result['city']:'Not Set'?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-2 fw-bold">Tehsil</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['tehsil']?$result['tehsil']:'Not Set'?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold p-2">District</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['district']?$result['district']:'Not Set'?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold p-2">Pin Code</td>
                                                        <td class="text-muted fw-semibold p-2"><?php echo $result['pin_code']?$result['pin_code']:'Not Set'?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold p-2">State</td>
                                                        <td class="text-muted fw-semibold p-2"> <?php echo $result['state']?$result['state']:'Not Set'?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>