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

<?php
    $sql_basic = "SELECT * FROM `plans_details` WHERE price BETWEEN 0 AND 300 ORDER BY price DESC";
    $sql_basic_prepared = $pdo_plan->prepare($sql_basic);
    $sql_basic_prepared->execute();
    $sql_basic_fetch = $sql_basic_prepared->fetchALL(PDO::FETCH_ASSOC);


    $sql_comfort = "SELECT * FROM `plans_details` WHERE price BETWEEN 300 AND 700 ORDER BY price DESC";
    $sql_comfort_prepared = $pdo_plan->prepare($sql_comfort);
    $sql_comfort_prepared->execute();
    $sql_comfort_fetch = $sql_comfort_prepared->fetchALL(PDO::FETCH_ASSOC);

    $sql_premium = "SELECT * FROM `plans_details` WHERE price > 700 ORDER BY price DESC";
    $sql_premium_prepared = $pdo_plan->prepare($sql_premium);
    $sql_premium_prepared->execute();
    $sql_premium_fetch = $sql_premium_prepared->fetchALL(PDO::FETCH_ASSOC);
    
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
                    <div class="ms-5" >
                    <button class="btn btn-success my-4 p-2 fs-5 ms-2 " id="view_plans" name="view_plans" type="button">View Plans</button>
                    </div>
                    <div id="offers_list" class="card-body hide">
                    <div class="container-fluid mx-auto">
                        <div class="row mx-sm-4 my-sm-2 g-sm-4">
                            <?php
                                foreach($sql_basic_fetch as $value_basic)
                                {
                            ?>
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
                                        echo $value_basic['price'];
                                        ?>
                                        </h3>
                                        <h4 class="fw-bold pt-2 text-secondary">
                                        <?php
                                        echo $value_basic['name'];
                                        ?>
                                        </h4>
                                        <div class="mt-4 h6 text-dark text-center">
                                            <ul class="list-unstyled fw-bold p-1">
                                                <li class="mt-2">Validity - <span class="fw-semibold">
                                                <?php
                                               echo $value_basic['validity'];
                                               ?> Days
                                                </span></li>
                                                <li class="mt-4">Data Pack - <span class="fw-semibold">
                                                <?php
                                                echo $value_basic['data_pack'];
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
                            <?php
                                }
                            ?>
                            <?php
                            foreach($sql_comfort_fetch as $value_comfort){
                            ?>
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
                                        echo $value_comfort['price'];
                                        ?>
                                        </h3>
                                        <h4 class="fw-bold pt-2 text-secondary">Truly Unlimited</h4>
                                        <div class="mt-4 h6 text-dark text-center">
                                            <ul class="list-unstyled fw-bold p-1">
                                                <li class="mt-2">Validity - <span class="fw-semibold">
                                                <?php
                                                echo $value_comfort['validity'];
                                                ?> Days
                                                </span></li>
                                                <li class="mt-4">Data Pack - <span class="fw-semibold">
                                                 <?php
                                                 echo $value_comfort['data_pack'];
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
                            <?php
                            }
                            ?>
                            <?php
                            foreach($sql_premium_fetch as $value_premium){
                            ?>
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
                                            echo $value_premium['price'];
                                        ?>
                                            </h3>
                                        <h4 class="fw-bold pt-2 text-secondary">Truly Unlimited</h4>
                                        <div class="mt-4 h6 text-dark text-center">
                                            <ul class="list-unstyled fw-bold p-1">
                                                <li class="mt-2">Validity - <span class="fw-semibold">
                                                 <?php
                                                echo $value_premium['validity'];
                                                ?> Days
                                                </span></li>
                                                <li class="mt-4">Data Pack - <span class="fw-semibold">
                                                 <?php
                                                echo $value_premium['data_pack'];
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
                            <?php
                            }
                            ?>
                        </div>
                    
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

<section id="top_complaints" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4 g-4">
           
            <?php
            $j = 0;
            $sql_plans_history = "SELECT * FROM `purchased_plans`  JOIN isp_airtel_plans.plans_details ON purchased_plans.plans_id = isp_airtel_plans.plans_details.id WHERE user_id = :id ORDER BY purchased_date DESC";
            $sql_plans_history_prepared = $pdo->prepare($sql_plans_history);
            $sql_plans_history_prepared->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
            $sql_plans_history_prepared->execute();
            $plans_history_data = $sql_plans_history_prepared->fetchALL(PDO::FETCH_ASSOC);

            ?>

            <div class="col-sm-12 col-md-12 col-lg-12">
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
                                            <td><p class="fw-bold">
                                            <?php
                                            echo $history_plans['name']
                                                ?> - 
                                                <span class="fa fa-rupee me-1"></span>
                                            <?php
                                            echo $history_plans['price']
                                                ?>
                                            </p></td>
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