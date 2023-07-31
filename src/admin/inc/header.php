<?php
    $path = $_SERVER['REQUEST_URI'];
    $path=explode('/',$path); 
    $path = $path[4];
?>
<section id="header">
    <nav class="navbar shadow-lg fixed-top border-secondary navbar-expand-sm">
        <div class="container-fluid d-flex flex-row py-2">

            <div class="navbar-brand text-secondary d-flex flex-row">
                <a class="btn btn-outline-lightpurple" data-bs-toggle="offcanvas" href="#sidebar" aria-label="Access the offcanvas for more pages">
                    <span class="fa fa-arrow-right"></span>
                </a>
            </div>

            <div class="btn-toolbar">
                <h3 id="icrm" class="ms- text-secondary">iCRM</h3>
            </div>

            <!-- <ul class="navbar-nav h4 d-flex flex-row">
                <li class="nav-item mx-3 ">
                    <a href="userProfile.php" class="nav-link text-secondary header-icon header-active" aria-label="Containing user profile pic and basic information"><span class="fa fa-user-circle"></span></a>
                </li>
                <li class="nav-item mx-3">
                    <a href="userProfileEdit.php" class="nav-link text-secondary header-icon" aria-label="User can update his/her profile by click here"><span class="fa fa-edit"></span></a>
                </li>
                <li class="nav-item mx-3">
                    <a href="logout.php" class="nav-link text-secondary header-icon" aria-label="Logout. End user session here."><span class="fa fa-sign-out"></span></a>
                </li>
            </ul> -->
            <div class="dropdown dropstart">
                <a href="" class="nav-link text-secondary header-icon header-active dropdown" aria-label="Containing user profile pic and basic information" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                    <img src="./assets/img/user.jpg" alt="profile_pic" class="rounded-circle userImg">      
                </a>
                <!-- <a href="" class="nav-link text-secondary header-icon header-active dropdown" aria-label="Containing user profile pic and basic information" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true"><span class="fa fa-2x fa-user-circle"></span></a> -->
                <ul class="dropdown-menu">
                    <li class="nav-item mx-3 ">
                        <a href="userProfile.php" class="nav-link text-secondary header-icon header-active" aria-label="Containing user profile pic and basic information"><span class="fa fa-2x fa-user-circle me-2"></span>User Profile</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="nav-item mx-3">
                        <a href="userProfileEdit.php" class="nav-link text-secondary header-icon" aria-label="User can update his/her profile by click here"><span class="fa fa-edit fa-2x me-2"></span>Edit Profile</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="nav-item mx-3">
                        <a class="nav-link text-secondary header-icon" data-bs-toggle="modal" data-bs-target="#logoutModal" aria-label="Logout. End user session here."><span class="fa fa-sign-out fa-2x me-2"></span>Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="h5 fw-bold p-3">Are you really wanna logout?</p>
                </div>
                <div class="modal-footer border-0">
                    <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-primary" name="logout_submit">Log Out</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--offcanvas-->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
        <div class="offcanvas-header">
            <h3 id="icrm_sidebar" class="text-secondary">iCRM</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <hr class="text-primary">
        <div class="offcanvas-body">
            <ul class="navbar-nav text-secondary">
                <li class="nav-item text-center h5">
                        <a href="index.php" class="nav-link offcanvas-link <?=$path == 'index.php'?'offcanvas-active':'';?>">
                            <div class="h2">
                                <span class="fa fa-tachometer"></span>
                            </div>
                            Dashboard
                        </a>
                </li>
                <hr>
                <li class="nav-item text-center h5">
                        <a href="employees.php" class="nav-link offcanvas-link <?=$path == 'employees.php'?'offcanvas-active':'';?>">
                            <div class="h2">
                                <span class="fa fa-user-secret"></span>
                            </div>
                            Employees
                        </a>
                </li>
                <hr>
                <li class="nav-item text-center h5">
                        <a href="customers.php" class="nav-link offcanvas-link <?=$path == 'customers.php'?'offcanvas-active':'';?>">
                            <div class="h2">
                                <span class="fa fa-users"></span>
                            </div>
                            Customers
                        </a>
                </li>
                <hr>
                <li class="nav-item text-center h5">
                        <a href="complaints.php" class="nav-link offcanvas-link <?=$path == 'complaints.php'?'offcanvas-active':'';?>">
                            <div class="h2">
                                <span class="fa fa-exclamation-circle"></span>
                            </div>
                            Complaints
                        </a>
                </li>
                <hr>
                <li class="nav-item text-center h5">
                        <a href="feedbacks.php" class="nav-link offcanvas-link <?=$path == 'feedbacks.php'?'offcanvas-active':'';?>">
                            <div class="h2">
                                <span class="fa fa-comments"></span>
                            </div>
                            Feedbacks
                        </a>
                </li>
                <hr>
                <li class="nav-item text-center h5">
                        <a href="issues.php" class="nav-link offcanvas-link <?=$path == 'issues.php'?'offcanvas-active':'';?>" title="Techincal bugs/errors faced by users are displayed here">
                            <div class="h2">
                                <span class="fa fa-bug"></span>
                            </div>
                            Issues
                        </a>
                </li>
                <hr>
            </ul>
        </div>
    </div>
</section>
<section class="nav-helper">

</section>