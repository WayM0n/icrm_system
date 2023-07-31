<?php
    require_once('./db/config.php');
    require_once('./db/configPlans.php');
    require_once('./db/configComplaints.php');
     $sql_query = "SELECT * FROM icrm_customers.purchased_plans JOIN isp_airtel_plans.plans_details ON icrm_customers.purchased_plans.plans_id=isp_airtel_plans.plans_details.id WHERE user_id =:id ORDER BY purchased_date DESC";
    $statement = $pdo_plan->prepare($sql_query);
    $statement->bindParam(':id',$_SESSION['id'],PDO::PARAM_INT);
    $executed = $statement->execute();
    $plans_fetch = $statement->fetchALL();
    function getExpireDay($oldDate, $expire_status)
    {
        if (!$expire_status) {
            $expired_date = date_create($oldDate);
            $now = date("Y-m-d", time());
            $current_date = date_create($now);
            $expire_days = date_diff($expired_date, $current_date);
            return $expire_days->format("%a days");
        }
    }

    //complaints
    $sql = 'SELECT * FROM `user_complaints` WHERE submitted_by = :id';
    $prepared_sql = $pdo_com->prepare($sql);
    $i = 0;
    $prepared_sql->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
    $sql_execute = $prepared_sql->execute();
?>
<section id="plans_details"  class="user-select-none my-4">
    <div class="container-fluid mx-auto">
        <div class="row g-4 m-sm-4">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h2 class="text-primary">
                                <span class="bi bi-pause-circle bg-label-primary p-1 rounded-2 shadow-lg align-self-center me-2"></span>Current Plan
                            </h2>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p class="h1 py-2 pb-3 fw-semibold">
                            <span class="fa fa-rupee"></span>  
                            <?php
                                echo $plans_fetch[0]['price'];
                            ?>
                        </p>
                        <h4 class="fw-bold pt-2 text-secondary">
                            <?php
                                echo $plans_fetch[0]['name'];
                            ?>
                        </h4>
                        <h6 class="fw-bold pt-3">Data Pack - <span class="fw-semibold">
                            <?php
                                echo $plans_fetch[0]['data_pack'];
                                ?> GB/Day</span>
                        </h6>                           
                        <h5 class="text-danger small py-3">Expiring in  <?php echo getExpireDay($plans_fetch[0]['expired_date'], $plans_fetch[0]['expired']); ?></h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <h2 class="text-primary">
                                <span class="bi bi-skip-backward-circle bg-label-green p-1 rounded-2 shadow-lg align-self-center me-2"></span>Previous Plan
                            </h2>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p class="h1 py-2 pb-3 fw-semibold">
                            <span class="fa fa-rupee"></span> 
                             <?php
                                echo $plans_fetch[1]['price'];
                            ?>
                        </p>
                        <h4 class="fw-bold pt-2 text-secondary"> <?php
                                echo $plans_fetch[1]['name'];
                                ?>
                        </h4>
                        <h6 class="fw-bold pt-3">Data Pack - <?php
                                echo $plans_fetch[1]['data_pack'];
                                ?> <span class="fw-semibold">
                             GB/Day</span>
                        </h6>                           
                        <h5 class="text-danger small py-3">Expired on
                            <?php
                                    echo $plans_fetch[1]['expired_date']
                             ?></h5>
                    </div>
                </div>
            </div>
          
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="row g-4">
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <div id="user-card-primary" class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="fa fa-2x bg-label-primary shadow-sm fa-envelope rounded-3 p-2"></span>
                                    </div>
                                </div>
                                <span class="d-block mb-1">SMS Reamining</span>
                                <h3 class="card-title text-nowrap mb-2"><span class="bi bi-envelope-fill bx bx-flashing me-1"></span>38/100</h3>
                                <small class="text-white fw-semibold">5.6% decrease in Complaints</small>
                            </div>
                        </div>                  
                     </div>
                    <div class="col-lg-6 col-sm-12 col-md-12">
                      <div id="user-card-green" class="card shadow-lg">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar  bx bx-flashing-hover flex-shrink-0">
                                  <span class="fa fa-2x bg-label-primary shadow-sm bi bi-activity rounded-3 p-2"></span>
                              </div>
                            </div>
                            <span class="d-block fw-bold mb-1">Mostly Purchaseed Plan</span>
                            <h3 class="card-title text-nowrap mb-2" title="8,26,45,673"><span class="bi bi-currency-rupee bx bx-tada me-1"></span>799</h3>
                            <small class="text-dark fw-semibold text-white">23% decreased last month</small>
                          </div>
                      </div>                  
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12">
                      <div id="user-card-light" class="card shadow-lg">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="small fw-bold justify-content-between">
                                    If you're facing any technical problems/errors, Kindly submit your issues <a href="./issues.php">Here</a>
                                </p>
                                <div class="card-title bx bx-tada text-nowrap rounded-circle m-3 p-2">
                                    <span class="fa fa-2x fa-bug text-danger rounded-circle p-1">
                                        <span class="fa ms-1 fs-6 fa-bug position-absolute top-60 start-90 translate-middle badge rounded-circle text-danger">
                                        </span>
                                    </span>
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

<?php
    $sql_basic = "SELECT * FROM `plans_details` WHERE price BETWEEN 0 AND 300 ORDER BY price DESC";
    $sql_basic_prepared = $pdo_plan->prepare($sql_basic);
    $sql_basic_prepared->execute();
    $sql_basic_fetch = $sql_basic_prepared->fetch(PDO::FETCH_ASSOC);


    $sql_comfort = "SELECT * FROM `plans_details` WHERE price BETWEEN 300 AND 700 ORDER BY price DESC";
    $sql_comfort_prepared = $pdo_plan->prepare($sql_comfort);
    $sql_comfort_prepared->execute();
    $sql_comfort_fetch = $sql_comfort_prepared->fetch(PDO::FETCH_ASSOC);


    $sql_premium = "SELECT * FROM `plans_details` WHERE price > 700 ORDER BY price DESC";
    $sql_premium_prepared = $pdo_plan->prepare($sql_premium);
    $sql_premium_prepared->execute();
    $sql_premium_fetch = $sql_premium_prepared->fetch(PDO::FETCH_ASSOC);
    
?>
<section id="offers"  class="user-select-none my-4">
    <div class="container-fluid">
        <div class="row m-sm-3">
            <div class="col-sm-12">
                <div class="card shadow-lg rounded-5">
                    <div class="card-header mt-4 text-center">
                        <h1 class="card-title text-danger fw-bolder fs-1">
                            <span class="bi bi-shop-window bg-label-green p-1 me-1 rounded-4"></span>Offers</h1>
                    </div>
                    <div id="offers_list" class="card-body">
                    <div class="container-fluid mx-auto">
                        <div class="row mx-sm-4 my-sm-2 g-sm-4">
                            <div class="col-sm-12 col-md-12 col-lg-4" >
                                <div class="card  shadow-lg rounded-4" >
                                    <div class="card-title truly-basic rounded-4 rounded-bottom">
                                        <div class="text-white text-center p-1">
                                        <h1 class="fs-1 fw-bolder">Basic</h1>
                                        </div>
                                    </div>
                                    <div class="card-body text-dark text-center ">
                                        <h3 class="my-5 fs-1"><span class="fa fa-rupee fw-bold fs-1 mx-2"></span>
                                        <?php
                                        echo $sql_basic_fetch['price'];
                                        ?>
                                        </h3>
                                        <h4 class="fw-bold pt-2 text-secondary">
                                        <?php
                                        echo $sql_basic_fetch['name'];
                                        ?>
                                        </h4>
                                        <div class="mt-4 h6 text-dark text-center">
                                            <ul class="list-unstyled fw-bold p-1">
                                                <li class="mt-2">Validity - <span class="fw-semibold">
                                                <?php
                                               echo $sql_basic_fetch['validity'];
                                               ?> Days
                                                </span></li>
                                                <li class="mt-4">Data Pack - <span class="fw-semibold">
                                                <?php
                                                echo $sql_basic_fetch['data_pack'];
                                                ?> GB/Day
                                                </span></li>
                                                <li class="mt-4">SMS - <span class="fw-semibold">
                                                100 SMS/Day
                                                </span></li>
                                            </ul>
                                        </div>
                                        <div class="text-center">
                                            <h4 class="p-2 border-0 rounded-4" >
                                                <a href="https://paytm.com/recharge" role="button" class="btn btn-primary text-white text-decoration-none px-3 buy_btn fs-5" >BUY NOW</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-sm-12 col-md-12 col-lg-4 " >
                                <div class="card shadow-lg rounded-4">
                                    <div class="card-title truly-premium rounded-4 rounded-bottom">
                                        <div class="text-white text-center p-1">
                                        <h1 class="fs-1 fw-bolder">Premium</h1>
                                        </div>
                                    </div>
                                    <div class="card-body text-dark text-center ">
                                        <h3 class="my-5 fs-1"><span class="fa fa-rupee fw-bold fs-1 mx-2"></span>
                                        <?php
                                        echo $sql_premium_fetch['price'];
                                        ?>
                                        </h3>
                                        <h4 class="fw-bold pt-2 text-secondary">Truly Unlimited</h4>
                                        <div class="mt-4 h6 text-dark text-center">
                                            <ul class="list-unstyled fw-bold p-1">
                                                <li class="mt-2">Validity - <span class="fw-semibold">
                                                <?php
                                                echo $sql_premium_fetch['validity'];
                                                ?> Days
                                                </span></li>
                                                <li class="mt-4">Data Pack - <span class="fw-semibold">
                                                 <?php
                                                 echo $sql_premium_fetch['data_pack'];
                                                 ?> GB/Day
                                                </span></li>
                                                <li class="mt-4">SMS - <span class="fw-semibold">
                                                100 SMS/Day
                                                </span></li>
                                            </ul>
                                        </div>
                                        <div class="text-center">
                                            <h4 class="p-2 border-0 rounded-4" >
                                                <a href="https://paytm.com/recharge" role="button" class="btn btn-primary text-white text-decoration-none px-3 buy_btn fs-5" >BUY NOW</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 " >
                                <div class="card shadow-lg rounded-4">
                                    <div class="card-title truly-comfort rounded-4 rounded-bottom">
                                        <div class="text-white text-center p-1">
                                        <h1 class="fs-1 fw-bolder">Comfort</h1>
                                        </div>
                                    </div>
                                    <div class="card-body text-dark text-center ">
                                        <h3 class="my-5 fs-1"><span class="fa fa-rupee fw-bold fs-1 mx-2"></span>
                                        <?php
                                            echo $sql_comfort_fetch['price'];
                                        ?>
                                            </h3>
                                        <h4 class="fw-bold pt-2 text-secondary">Truly Unlimited</h4>
                                        <div class="mt-4 h6 text-dark text-center">
                                            <ul class="list-unstyled fw-bold p-1">
                                                <li class="mt-2">Validity - <span class="fw-semibold">
                                                 <?php
                                                echo $sql_comfort_fetch['validity'];
                                                ?> Days
                                                </span></li>
                                                <li class="mt-4">Data Pack - <span class="fw-semibold">
                                                 <?php
                                                echo $sql_comfort_fetch['data_pack'];
                                                ?> GB/Day
                                                </span></li>
                                                <li class="mt-4">SMS - <span class="fw-semibold">
                                                100 SMS/Day
                                                </span></li>
                                            </ul>
                                        </div>
                                        <div class="text-center">
                                            <h4 class="p-2 border-0 rounded-4" >
                                                <a href="https://paytm.com/recharge" role="button" class="btn btn-primary text-white text-decoration-none px-3 buy_btn fs-5" >BUY NOW</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    
                    </div>
                    <h5 class="text-muted text-center small py-3">
                        <a class="text-decoration-none" href="./plans.php" aria-label="complaints section link">
                            View All Plans
                        </a>
                    </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

<?php
        $i = 0;
        $limit = 3;
        $sql_limit = 'SELECT * FROM user_complaints WHERE submitted_by=:id LIMIT :limit ' ;
        $sql_limit_query = $pdo_com->prepare($sql_limit);
        $sql_limit_query->bindParam(':id', $_SESSION['id'],PDO::PARAM_INT);
        $sql_limit_query->bindParam(':limit', $limit,PDO::PARAM_INT);
        $sql_limit_query->execute();
?>

<section id="top_complaints" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4 d-flex g-4">
            <div class="col-sm-12 col-md-12 col-lg-6">
                
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
               
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="fa fa-history bg-label-primary p-1 rounded-circle shadow-lg align-self-center"></span>
                                Complaints History
                            </h2>
                        </div>
                    </div>
                    <hr class="w-50 align-self-center">
                    <?php                
                        if ($sql_limit_query){
                            $result_select = $sql_limit_query->fetchAll(PDO::FETCH_ASSOC);
                            if ($result_select) {
                    ?>
                    <div class="card-body text-center">
                        <div class="mx-3 rounded-4 table-responsive shadow-lg text-center">
                                <table class="table table-borderless table-hover table-striped align-middle text-center">
                                    <thead class="border-4 border-bottom">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Raised On</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($result_select as $value) {
                                        ?>
                                    <tbody class="fw-semibold small table-group-divider">
                                        <tr>
                                            <td>
                                                <?php
                                                echo ++$i; ?>
                                            </td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td><?php echo $value['description'] ?></td>
                                            <td><?php echo $value['raised_on'] ?></td>
                                            <td>
                                                <?php if ($value['comp_status']) {
                                                    echo "<span class='badge small bg-success text-truncate text p-2'>Solved</span>";
                                                } else {
                                                    echo "<span class='badge small bg-warning text-truncate text p-2'>Pending</span>";
                                                } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                        <?php
                                            }
                                        ?>
                                </table>
                        </div>
                        <h5 class="text-muted small py-3">
                            <a class="text-decoration-none" href="./complaints.php#complaints_table" aria-label="complaints section link">
                                View All Complaints
                            </a>
                        </h5>
                        </div>
                        <?php
                             }
                            else{
                        ?>
                    
                    <div class="card-body text-center">
                            <h3 class="text-muted">No Complaints Raised</h3>
                    </div>
                    <h5 class="text-muted text-center small py-3">
                            <a class="text-decoration-none" href="./complaints.php" aria-label="complaints section link">
                             Raise your Complaint Here
                            </a>
                        </h5>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <?php
                $j = 0;
                $limit2 = 3;
                $sql_plans_history = "SELECT * FROM `purchased_plans`  JOIN isp_airtel_plans.plans_details ON purchased_plans.plans_id = isp_airtel_plans.plans_details.id WHERE user_id = :id ORDER BY purchased_date DESC LIMIT :limit";
                $sql_plans_history_prepared = $pdo->prepare($sql_plans_history);
                $sql_plans_history_prepared->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
                $sql_plans_history_prepared->bindParam(':limit',$limit2, PDO::PARAM_INT);
                $sql_plans_history_prepared->execute();
                $plans_history_data = $sql_plans_history_prepared->fetchALL(PDO::FETCH_ASSOC);
            ?>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="bi bi-calendar-range-fill bg-label-primary p-1 rounded-circle shadow-lg align-self-center"></span>
                                Plans History
                            </h2>
                        </div>
                    </div>
                    <hr class="w-50 align-self-center">
                    <div class="card-body text-center">
                        <?php
                        if ($plans_history_data) {
                            ?>
                        <div class="mx-3 rounded-4 table-responsive shadow-lg text-center">
                                <table class="table table-borderless table-hover table-striped align-middle text-center">
                                    <thead class="border-4 border-bottom">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Plan Name</th>
                                            <th>Price</th>
                                            <th>Purchased On</th>
                                            <th>SMS</th>
                                            <th>Data Pack</th>
                                            <th>Validity</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold small table-group-divider">
                                        <?php
                                        foreach ($plans_history_data as $history_plans) {
                                            ?>
                                        <tr>
                                            <td><?php
                                            echo ++$j;
                                            ?>
                                            </td>
                                            <td><a href="detailedProblem" class="text-decoration-none">
                                            <?php
                                            echo $history_plans['name']
                                                ?> - 
                                                <span class="fa fa-rupee me-1"></span>
                                            <?php
                                            echo $history_plans['price']
                                                ?>
                                            </a></td>
                                            <td><span class="fa fa-rupee me-1"></span>
                                            <?php
                                            echo $history_plans['price']
                                                ?>
                                            </td>
                                            <td><?php
                                            echo $history_plans['purchased_date'];
                                            ?></td>
                                            <td>100 SMS/Daily</td>
                                            <td><?php echo $history_plans['data_pack'] ?> GB/Day</td>
                                            <td><?php echo $history_plans['validity'] ?> Days</td>
                                        </tr>
                                    </tbody>
                                    <?php
                                        }
                                        ?>
                                </table>
                        </div>
                        <h5 class="text-muted small py-3">
                            <a class="text-decoration-none" href="./plans.php" aria-label="plans section link">
                                Plans History
                            </a>
                        </h5>
                    </div>
                    <?php
                        }
                        else{
                    ?>
                    <div class="card-body my-2 text-center">
                            <h3 class="text-muted">No History Found</h3>
                    </div>
                    <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</section>

