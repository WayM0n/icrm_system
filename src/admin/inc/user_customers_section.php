

<section id="user_Cards" class="mx-3 my-2">
    <div class="container-fluid mx-auto">
        <div class="row g-4 m-2">
            <div class="col-lg-3 col-sm-6 mb-4">
              <div id="user-card-primary" class="card shadow-lg">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                          <span class="fa fa-2x bg-label-red shadow-sm fa-heart shadow-lg rounded-3 p-2"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Mostly Purchased Plan</span>
                    <h3 class="card-title text-nowrap mb-2"><span class="fa fa-rupee"></span> 799</h3>
                    <small class="text-dark fw-semibold">Purchase by 34.5k Customers</small>
                  </div>
              </div>                  
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
              <div id="user-card-info" class="card shadow-lg">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                          <span class="fa fa-2x bg-label-red shadow-sm fa-thumbs-down rounded-3 p-2 shadow-lg"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Least Purchased Plan</span>
                    <h3 class="card-title text-nowrap mb-2"><span class="fa fa-rupee"></span> 199</h3>
                    <small class="text-dark fw-semibold">Purchase by 2.5k Customers</small>
                  </div>
              </div>                  
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
              <div id="user-card-green" class="card shadow-lg">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                          <span class="fa fa-2x bg-label-primary shadow-sm fa-user-plus rounded-3 p-2"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Total Customers</span>
                    <h3 class="card-title text-nowrap mb-2" title="8,26,45,673"><span class="fa fa-users"></span> 8.26L</h3>
                    <small class="text-dark fw-semibold">30.4K people registred last month</small>
                  </div>
              </div>                  
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
              <div id="user-card-light" class="card shadow-lg">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                          <span class="fa fa-2x bg-label-primary shadow-sm bi bi-activity rounded-3 p-2"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Porting Rate</span>
                    <h3 class="card-title text-nowrap mb-2" title="8,26,45,673"><span class="fa fa-heartbeat"></span> 34%</h3>
                    <small class="text-dark fw-semibold">23% decreased last month</small>
                  </div>
              </div>                  
            </div>
        </div>
    </div>
</section>

<?php 
require_once './db/configCustomers.php';
$sql_employees = "SELECT * FROM user_details JOIN user_full_details ON id=user_full_details.u_id ORDER BY user_full_details.registered_on DESC";
$sql_employees_prepared = $pdo_cust->prepare($sql_employees);
$sql_employees_prepared->execute();
$sql_employees_fetch = $sql_employees_prepared->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="customers">
  <div class="container-fluid">
    <div class="row m-sm-4">
            <div class="col-md-12 col-lg-12 my-3">
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

