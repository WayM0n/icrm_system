
<section id="user_Cards" class="mx-3 my-2">
    <div class="container-fluid mx-auto">
        <div class="row g-4 m-2">
            <div class="col-lg-3 col-sm-6 my-4">
              <div id="user-card-primary" class="card shadow-lg">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                          <span class="fa fa-2x bg-label-green shadow-sm fa-check-square shadow-lg rounded-3 p-2"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Total Complaints Solved</span>
                    <h3 class="card-title text-nowrap mb-2"><span class="fa fa-check-circle"></span> 45.8k</h3>
                    <small class="text-dark fw-semibold">23.6k Customers satisfied</small>
                  </div>
              </div>                  
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
              <div id="user-card-info" class="card shadow-lg">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                          <span class="fa fa-2x bg-label-red shadow-sm fa-clock-o rounded-3 p-2 shadow-lg"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Pending Complaints</span>
                    <h3 class="card-title text-nowrap mb-2"><span class="fa fa-exclamation-circle"></span> 159</h3>
                    <small class="text-dark fw-semibold">Purchase by 2.5k Customers</small>
                  </div>
              </div>                  
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
              <div id="user-card-green" class="card shadow-lg">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                          <span class="fa fa-2x bg-label-primary shadow-sm fa-star rounded-3 p-2"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Average Rating</span>
                    <h4 class="card-title text-nowrap mb-0">
                        <div class="d-flex flex-row">
                        <p class="text-center text-white">4.2</p>
                            <span class="text-warning ms-2">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star-half"></span>
                            </span>
                        </div>
                </h4>
                    <small class="text-dark fw-semibold">5.6% decrease in Complaints</small>
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
require_once './db/configEmployees.php';
$sql_employees = "SELECT * FROM user_details JOIN user_full_details ON id=user_full_details.u_id ORDER BY user_full_details.registered_on DESC";
$sql_employees_prepared = $pdo_emp->prepare($sql_employees);
$sql_employees_prepared->execute();
$sql_employees_fetch = $sql_employees_prepared->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="complaints">
  <div class="container-fluid">
    <div class="row m-sm-4">
            <div class="col-md-12 col-lg-12 my-3">
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


