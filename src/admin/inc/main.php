<?php
    require_once('./db/configSales.php');
    $month = 6;
    $plans_by_sales_query = "SELECT * FROM `plan_sales` join isp_airtel_plans.plans_details on plan_id= isp_airtel_plans.plans_details.id WHERE MONTH(sales_date)=:month ORDER BY total_sales";
    $prepared_plans_sales = $pdo_sales->prepare($plans_by_sales_query);
    $prepared_plans_sales->bindParam(':month',$month,PDO::PARAM_INT);
    $prepared_plans_sales->execute();
    $plan_sales_result = $prepared_plans_sales ->fetchAll(PDO::FETCH_ASSOC);


    $plans_by_volume_query = "SELECT * FROM `plan_sales` join isp_airtel_plans.plans_details on plan_id= isp_airtel_plans.plans_details.id WHERE MONTH(sales_date)=:month ORDER BY purchased_volume";
    $prepared_plans_volume = $pdo_sales->prepare($plans_by_volume_query);
    $prepared_plans_volume->bindParam(':month',$month,PDO::PARAM_INT);
    $prepared_plans_volume->execute();
    $plan_volume_result = $prepared_plans_volume ->fetchAll(PDO::FETCH_ASSOC);
    
    function format_number($number) {
        // first strip any formatting;
        $number = (0+str_replace(",", "", $number));
 
        // is this a number?
        if (!is_numeric($number)) return false;
 
        // now filter it;
        if ($number > 1000000000000) return round(($number/1000000000000), 2).' T';
        elseif ($number > 1000000000) return round(($number/1000000000), 2).' B';
        elseif ($number > 1000000) return round(($number/1000000), 2).' M';
        elseif ($number > 1000) return round(($number/1000), 2).' K';
 
        return number_format($number);
    }
    function format_number_ind($number) {
        // first strip any formatting;
        $number = (0+str_replace(",", "", $number));
 
        // is this a number?
        if (!is_numeric($number)) return false;
 
        // now filter it;
        if ($number > 100000000000) return round(($number/100000000000), 2).' Khr';
        if ($number > 1000000000) return round(($number/1000000000), 2).' Ar';
        elseif ($number > 10000000) return round(($number/10000000), 2).' Cr';
        elseif ($number > 100000) return round(($number/100000), 2).' Lac';
        elseif ($number > 1000) return round(($number/1000), 2).' K';
 
        return number_format($number);
    }

    $avatar_cards = [
        'darkpurple'=>'bg-label-primary',
        'red'=>'bg-label-red',
        'blue'=>'bg-label-blue',
        'grey'=>'bg-label-grey',
        'green'=>'bg-label-green',
        'yellow'=>'bg-label-yellow',
        'black'=>'bg-label-black'
    ];
?>


<!--Details Cards -->
<section id="details_cards">

</section>

<!---->
<section id="details_top_plans"  class="my-4">
    <div class="container-fluid mx-auto">
        <div class="row g-4">
            <div class="col-md-12 col-lg-6">
                <div class="card rounded-4 shadow-lg">
                    <div class="card-header rounded-4">
                    <h2 class="card-title p-4 pb-2">
                            Top Plans By <span class="text-primary">Sales</span>
                        </h2>
                    </div>
                    <div id="covered1" class="card-body overflow-auto">
                        <?php
                            foreach($plan_sales_result as $result_sales){
                        ?>
                        <ul class="plans-list p-1 m-0">
                            <li class="d-flex mx-4 my-1 py-1">
                                <div class="avatar bx-md me-3 ">
                                    <span class="avatar-initial rounded <?=$avatar_cards[array_rand($avatar_cards)]; ?> px-2 py-1"><i class="bx bx-rupee"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2 py-1">
                                    <div class="me-2">
                                        <h4 class="mb-0"><span class="fa fa-rupee"></span> <?=$result_sales['price']?></h4>
                                        <p class="small text-muted"><?=$result_sales['name']?></p>
                                    </div>
                                    <div class="me-2">
                                        <h4 class="mb-0">
                                        <span class="fa fa-rupee me-1 p-1 px-2 rounded-5 bg-primary text-white"></span><small class="h4 fw-semibold  " title="<?=$result_sales['total_sales']?>"><?=format_number_ind($result_sales['total_sales'])?></small></h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 ">
                <div class="card rounded-4 shadow-lg">
                    <div class="card-header rounded-4">
                    <h2 class="card-title p-4 pb-2">
                            Top Plans By <span class="text-primary">Volume</span>
                        </h2>
                    </div>
                    <div id="covered2" class="card-body overflow-auto">
                        <?php
                            foreach($plan_volume_result as $result_volume){
                        ?>

                        <ul class="plans-list p-1 m-0">
                            <li class="d-flex mx-4 my-2 py-1">
                                <div class="avatar bx-md me-3">
                                    <span class="avatar-initial rounded <?=$avatar_cards[array_rand($avatar_cards)]; ?> px-2 py-1"><i class="bx bx-rupee"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h4 class="mb-0"><span class="fa fa-rupee"></span> <?=$result_volume['price']?></h4>
                                        <p class="small text-muted"><?=$result_volume['name']?></p>
                                    </div>
                                    <div class="me-2">
                                        <h4 class="mb-0">
                                        <span class="fa fa-users me-1 p-2 rounded-5 bg-success text-white"></span>
                                        <small class="h4 fw-semibold  " title="<?=$result_volume['purchased_volume']?>"><?=format_number_ind($result_volume['purchased_volume'])?></small></h4>
                                    </div>
                                   
                                </div>
                            </li>
                        </ul>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$limit = 3; 
require_once './db/configEmployees.php';
$sql_employees = "SELECT * FROM user_details JOIN user_full_details ON id=user_full_details.u_id ORDER BY user_full_details.registered_on DESC LIMIT :limit";
$sql_employees_prepared = $pdo_emp->prepare($sql_employees);
$sql_employees_prepared->bindParam(':limit',$limit,PDO::PARAM_INT);
$sql_employees_prepared->execute();
$sql_employees_fetch = $sql_employees_prepared->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="users">
  <div class="container-fluid">
    <div class="row m-sm-4">
            <div class="col-md-12 col-lg-6 my-3">
                <div class="card rounded-4 shadow-lg">
                  <div class="card-header rounded-4 p-3">
                    <div class="card-title pt-3">
                      <div class="d-flex justify-content-between">
                        <h3 class="ms-3 text-secondary text-uppercase"><span class="text-white fa fa-user-secret bg-dark rounded-circle p-2"></span> Employees</h3>
                      </div>
                    </div>
                  </div>
                  <div class="card-body mx-3 p-2">
                   <?php
                   if($sql_employees_fetch){
                    ?>
                  <div class="card-datatable mx-2 border-1 table-responsive">
                    <table class="table table-hover text-center p-5 border-top">
                      <thead>
                        <tr class="py-3 my-5">
                          <th>Employee</th>
                          <th>Rating</th>
                          <th>Complaints Solved</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>City</th>
                        </tr>
                      </thead>
                      <tbody class="text-center table-border-bottom-0">
                        <?php
                        foreach ($sql_employees_fetch as $result_fetch) {
                          ?>
                        <tr>
                          <td>
                            <div class="d-flex justify-content-center align-items-center">
                              <div class="image-wrapper">
                                <div class="image-container me-2">
                                    <img src="./../employee/<?= $result_fetch['profile_pic']?>" alt="Avatar" class="rounded-circle userImg"></div>
                              </div>
                              <div class="d-flex flex-column">
                                <p class="text-body text-truncate fw-semibold"><?php echo $result_fetch['f_name']." ".$result_fetch['l_name'] ?></p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <?php
                            require_once ('./db/configRating.php');
                            require_once ('./db/configComplaints.php');
                            $sql_user_rating = "SELECT AVG(rating) as rate from customer_review LEFT join icrm_complaints.solution_complaints on solution_id = icrm_complaints.solution_complaints.sol_id where icrm_complaints.solution_complaints.emp_id = :emp_id";
                            $sql_user_rating_prepared = $pdo_rate->prepare($sql_user_rating);
                            $sql_user_rating_prepared->bindParam(':emp_id', $result_fetch['id']);
                            $sql_user_rating_prepared->execute();
                            $sql_user_rating_fetch = $sql_user_rating_prepared->fetch(PDO::FETCH_ASSOC);

                            $sql_complaintsCount = "SELECT COUNT(comp_status) as complaint_solved FROM user_complaints left join solution_complaints on c_id = solution_complaints.complaint_id WHERE solution_complaints.emp_id=:emp_id";
                            $sql_complaintsCount_prepared = $pdo_com->prepare($sql_complaintsCount);
                            $sql_complaintsCount_prepared->bindParam(':emp_id', $result_fetch['id']);
                            $sql_complaintsCount_prepared->execute();
                            $sql_complaintsCount_fetch = $sql_complaintsCount_prepared->fetch(PDO::FETCH_ASSOC);

                            if ($sql_user_rating_fetch) {
                              foreach ($sql_user_rating_fetch as $user_rating) {
                                if ($user_rating) {
                                  echo "<h5 class='fw-bold'>" . number_format((float) $user_rating[0], 1, '.', '') . '<span class="fa fa-star-half-full text-warning"></span></h5>';
                                } else {
                                  echo "Not Rated";
                                }
                              }
                            }
                              ?>
                             </td>
                          <td>
                            <?php
                              if($sql_complaintsCount_fetch){
                                echo "<h5 class='fw-bold text-muted'>".$sql_complaintsCount_fetch['complaint_solved'].'</h5>';
                            }else{
                              echo "Not Solved yet";
                            }
                            ?>
                          </td>
                          <td><?php echo $result_fetch['contact'] ?></td>
                          <td><?php echo $result_fetch['email'] ?></td>
                          <td><?php echo $result_fetch['city']?$result_fetch['city']:'Not Updated' ?></td>
                        </tr>
                        <?php
                         } 
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-center my-2">
                        <a class="text-muted fw-bold text-decoration-none nav-item" href="employees.php">View All Employees</a>
                    </div>
                <?php
                  }
                else{
                  ?>
                    <div class="my-2 mx-3" >
                      <h2 class="text-muted" >No Employees</h2>
                    </div>  
              <?php
                } 
                ?>
                </div>
                  </div>
            </div>
      
    <?php 
    require_once './db/configCustomers.php';
    $limit2 = 3;
    $sql_employees = "SELECT * FROM user_details JOIN user_full_details ON id=user_full_details.u_id ORDER BY user_full_details.registered_on DESC LIMIT :limit";
    $sql_employees_prepared = $pdo_cust->prepare($sql_employees);
    $sql_employees_prepared->bindParam(':limit',$limit2,PDO::PARAM_INT);
    $sql_employees_prepared->execute();
    $sql_employees_fetch = $sql_employees_prepared->fetchAll(PDO::FETCH_ASSOC);
    ?>

                <div class="col-md-12 col-lg-6 my-3">
                    <div class="card rounded-4 shadow-lg">
                    <div class="card-header rounded-4 p-3">
                        <div class="card-title pt-3">
                        <div class="d-flex justify-content-between">
                            <h3 class="ms-3 text-secondary text-uppercase"><span class="text-white fa fa-users bg-dark rounded-circle p-2"></span> Customers</h3>
                        </div>
                        </div>
                    </div>
                    <div class="card-body mx-3 p-2">
                    <?php
                    if($sql_employees_fetch){
                        ?>
                    <div class="card-datatable mx-2 border-1 table-responsive">
                        <table class="table table-hover text-center p-5 border-top">
                        <thead>
                            <tr class="py-3 my-5">
                            <th>Customer</th>
                            <th>Plan Purchased</th>
                            <th>Registered on</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>City</th>
                            
                            </tr>
                        </thead>
                        <tbody class="text-center table-border-bottom-0">
                            <?php
                            foreach ($sql_employees_fetch as $result_fetch) {
                            ?>
                            <tr>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                <div class="image-wrapper">
                                    <div class="image-container me-2">
                                        <img src="./../Customer/<?= $result_fetch['profile_pic']?>" alt="Avatar" class="rounded-circle userImg"></div>
                                </div>
                                <div class="d-flex flex-column">
                                    <p class="text-body text-truncate fw-semibold"><?php echo $result_fetch['f_name']." ".$result_fetch['l_name'] ?></p>
                                </div>
                                </div>
                            </td>
                            <td><?php
                            $plan_purchased =  "SELECT purchased_date , isp_airtel_plans.plans_details.price FROM icrm_customers.purchased_plans JOIN isp_airtel_plans.plans_details on plans_id = isp_airtel_plans.plans_details.id WHERE user_id = :user_id ORDER BY purchased_date desc";
                            $prepare_plan_purchased =$pdo_cust->prepare($plan_purchased) ;
                            $prepare_plan_purchased->bindParam('user_id', $result_fetch['id']);
                            $prepare_plan_purchased->execute();
                            $plan_purchased_fetched = $prepare_plan_purchased->fetch(PDO::FETCH_ASSOC);
                            echo "<h5 class='fw-semibold'><span class='fa fa-rupee me-1'></span>".$plan_purchased_fetched['price'].'</h5>' ;
                            ?>
                            </td>
                            <td><?php echo date('d-M-Y',strtotime($result_fetch['registered_on']))?></td>
                            <td><?php echo $result_fetch['contact'] ?></td>
                            <td><?php echo $result_fetch['email'] ?></td>
                            <td><?php echo $result_fetch['city']?$result_fetch['city']:'Not Updated' ?></td>
                            
                            </tr>
                            <?php
                            } 
                            ?>
                        </tbody>
                        </table>
                    </div>
                    <div class="text-center my-2">
                        <a class="text-muted fw-bold text-decoration-none nav-item" href="customers.php">View All Customers</a>
                    </div>
                    <?php
                    }
                    else{
                    ?>
                        <div class="my-2 mx-3" >
                        <h2 class="text-muted" >No Employees</h2>
                        </div>  
                <?php
                    } 
                    ?>
                    </div>
                    </div>
                </div>

    
    </div>
  </div>
</section>




