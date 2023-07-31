<?php
    require_once('./db/config.php');
    require_once('./db/configComplaints.php');
?>
<section id="ranking_rating"  class="user-select-none my-4">
    <div class="container-fluid mx-auto">
        <div class="row g-4 m-sm-4">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card shadow-lg rounded-4">
                        <div class="card-header rounded-4 py-3 pb-1">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <h2 class="text-primary">
                                    <span class="fa fa-star bg-label-primary p-1 rounded-top shadow-lg align-self-center"></span>
                                    Overall Rating
                                </h2>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <p id="rating_val" class="larger fw-semibold">4.2</p>
                            <h3 id="rating_stars" class="py-2">
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star-half-empty text-warning"></span>
                            </h3>
                            <h5 class="text-muted small py-3">Total Reviews : 271</h5>
                        </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card rounded-4 shadow-lg">
                    <div class="card-header mb-0 text-center rounded-4">
                       <h5 class="text-primary">
                           Detailed Rating
                       </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody class="text-center">
                                <tr>
                                    <td class="p-1 fw-bolder pt-2">
                                        5
                                        <span class="fa fa-star text-warning"></span>
                                    </td>
                                    <td class="p-1 pt-2 px-0">
                                        <div class="best mt-2"></div>
                                    </td>
                                    <td  class="fw-semibold p-1 pt-2">
                                        212
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-1 fw-bolder pt-2">
                                        4
                                        <span class="fa fa-star text-warning"></span>
                                    </td>
                                    <td class="p-1 pt-2 px-0">
                                        <div class="better mt-2"></div>
                                    </td>
                                    <td  class="fw-semibold p-1 pt-2">
                                        40
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-1 fw-bolder pt-2">
                                        3
                                        <span class="fa fa-star text-warning"></span>
                                    </td>
                                    <td class="p-1 pt-2 px-0">
                                        <div class="normal mt-2"></div>
                                    </td>
                                    <td  class=" fw-semibold p-1 pt-2">
                                        12
                                    </td>
                                </tr>

                                <tr>
                                    <td class="p-1 fw-bolder pt-2">
                                        2
                                        <span class="fa fa-star text-warning"></span>
                                    </td>
                                    <td class="p-1 pt-2 px-0">
                                        <div class="bad mt-2"></div>
                                    </td>
                                    <td  class=" fw-semibold p-1 pt-2">
                                        5
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1 fw-bolder pt-2">
                                        1
                                        <span class="fa fa-star text-warning"></span>
                                    </td>
                                    <td class="p-1 pt-2 px-0">
                                        <div class="worst mt-2"></div>
                                    </td>
                                    <td  class="fw-semibold p-1 pt-2">
                                        2
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="small text-center pt-4 pb-2 text-secondary text-muted">
                            <!-- <a href="./reviews.php" class="btn btn-sm btn-primary" aria-label="Customer Reviews are displayed here.">All Reviews</a></p> -->
                            Check all reviews
                            <a href="./reviews.php" aria-label="Customer Reviews are displayed here.">Here</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="row g-4">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div id="user-card-green" class="card shadow-lg">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="fa fa-2x bg-label-primary shadow-sm fa-exclamation-triangle rounded-3 p-2"></span>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Today Complaints</span>
                                <h3 class="card-title text-nowrap mb-2"><span class="bi bi-exclamation-circle bx bx-tada"></span> 33</h3>
                                <small class="text-white fw-semibold">5.6% decrease in Complaints</small>
                            </div>
                        </div>                  
                     </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                      <div id="user-card-info" class="card shadow-lg">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar  bx bx-flashing-hover flex-shrink-0">
                                  <span class="fa fa-2x bg-label-green shadow-sm bi bi-activity rounded-3 p-2"></span>
                              </div>
                            </div>
                            <span class="d-block fw-bold mb-1">Porting Rate</span>
                            <h3 class="card-title text-nowrap mb-2" title="8,26,45,673"><span class="bi bi-activity bx bx-flashing"></span> 34%</h3>
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
        $i = 0;
        $limit = 3;
        $sql_limit = "SELECT *,icrm_customers.user_details.f_name,icrm_customers.user_details.l_name FROM `user_complaints` join icrm_customers.user_details on submitted_by = icrm_customers.user_details.id ORDER BY raised_on desc LIMIT :limit";
        $sql_limit_query = $pdo_com->prepare($sql_limit);
        $sql_limit_query->bindParam(':limit', $limit,PDO::PARAM_INT);
        $sql_limit_query->execute();
?>

<section id="top_complaints" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4">
            <div class="col-sm-12 col-lg-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="fa fa-exclamation-circle bg-label-primary p-1 rounded-circle shadow-lg align-self-center"></span>
                                Top Complaints
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
                                            <th>Raised By</th>
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
                                            <td><?=$value['f_name']." ",$value['l_name']?></td>
                                            <td><?php echo date("d-M-Y",strtotime($value['raised_on']))?></td>
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
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>