
 <style>
   
    .heading{
        color: rgb(66, 8, 100);
         text-shadow: 2px 4px 5px grey;
         font-size: 50px !important;
    }
    .navigation-heading{
        font-weight: bolder !important;
         font-size: 28px !important;
         text-shadow: none !important;
       
    }
    .header-background{
    background-color: whitesmoke;
    }
    .text-green{
         color: purple;
        font-weight: 900;
         text-shadow: 3px 4px 7px grey;
         transition:all 0.6s;
         
    }
     .text-green:hover{
        color: white;
        background-color: purple;
        font-weight: 900;
        padding-left: 20px;
         padding-right: 20px;
         transform: scale(1.1);
         box-shadow: 2px 3px 5px black;
    }

    .modal-content{
          background: linear-gradient(360deg,rgb(148, 130, 212),transparent);
    }

 </style>

<div class="container-fluid  pt-3 pb-3 mb-5  ">
    <nav class="navbar navbar-expand-sm rounded-5 header-background fixed-top">
        <div class="container-fluid navv">
            <h1 class="navbar-brand fs-1 fw-bolder y-p logo font heading" href="index.php ">iCRM
            </h1>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#collapseNavbar"
                title="menu">
                <span class="fa fa-bars text-white"></span>
            </button>
            <div class="justify-content-end collapse navbar-collapse" id="collapseNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active p-3">
                        <a class="nav-link navigation-heading mt-1 fs-4 text-green lead" href="index.php"><b>  HOME</b></a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link mt-1 fs-4 fw-bold navigation-heading text-green lead" href="#about-1"><b>ABOUT US</b></a>
                    </li>
                   <li class="nav-item p-3"  id="floating-icon">
                            <a class="nav-link fw-bolder navigation-heading fs-4 text-green mt-1 " href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">FEEDBACK</a>
                        </li>

                   <li class="nav-item p-3">
                        <a class="nav-link fs-4 fw-bold text-green navigation-heading lead" href="#faqs">FAQs</a>
                    </li>
                    <li class="nav-item p-3  dropdown">
                        <a class="nav-link fw-bold fs-4 fw-bold navigation-heading text-green dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sign Up
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item " href="./Customer/signUp.html">Customer</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="./employee/signUp.html">Employee</a></li>
                        </ul>
                    </li>
                    <li class="nav-item p-3  dropdown">
                        <a class="nav-link fs-4 fw-bold text-green navigation-heading dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            LOGIN
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./Customer/logina.php">Customer</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="./employee/logina.php">Employee</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<div id="feedback-form-modal">
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
        <div class="modal-content p-5">
            <div class="modal-header"> 
                    <h2 class="modal-title text-dark heading fw-bolder">Feedback</h2>
                    <button type="button" class="btn btn-close"    data-bs-dismiss="modal"></button> 
            </div>
                     <form action="./index.php" method="post">
                                <label for="username" class="form-label mt-5 text-white fs-4">NAME</label>
                                <input type="text" name="username" id="username" class="form-control  border-0 border-bottom border-dark" required><br>

                                <label for="email" class="form-label text-white fs-4">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control mb-3 border-0 border-bottom border-dark" required><br>

                                 <label for="messege" class="form-label text-white fs-4">Description</label> 
                                <textarea type="text" name="messege" id="messege" rows="4"  class="form-control md-textarea mt-3 border-dark " placeholder="Your Messege" required ></textarea>

                                <button class="form-control btn btn-primary mt-3" type="submit" name = "submit" >Send Messege</button>
                      </form>
        </div>
    </div>
  </div>
</div>

<?php
    include_once './db/user_feedback.php';
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $messege = $_POST['messege'];
        date_default_timezone_set('Asia/Kolkata');
        $submitted_date = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO `user_feeds`(`username`, `email`, `feedback` , `submitted_on`) VALUES (:uname,:email,:user_description , :submitted_on)';
        $prepared_feed = $pdo_feed->prepare($sql);
        $prepared_feed->bindParam(':uname', $_POST['username']);
        $prepared_feed->bindParam(':email', $_POST['email']);
        $prepared_feed->bindParam(':user_description', $_POST['messege']);
        $prepared_feed->bindParam(':submitted_on', $submitted_date);

        $executed = $prepared_feed->execute();

        if ($executed) {
            header("refresh:0;url='./index.php'");
        } else {
            echo "<script>alert('NOt Inserted ')</script>";
            
        }
    }
?>

