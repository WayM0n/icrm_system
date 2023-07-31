
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
                          <span class="fa fa-2x bg-label-primary shadow-sm fa-exclamation-triangle rounded-3 p-2"></span>
                      </div>
                    </div>
                    <span class="d-block mb-1">Today Complaints</span>
                    <h3 class="card-title text-nowrap mb-2"><span class="fa fa-exclamation-circle"></span> 33</h3>
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
    require_once './db/configComplaints.php';
        $i = 0;
        $sql_limit = "SELECT *,icrm_customers.user_details.f_name,icrm_customers.user_details.l_name FROM `user_complaints` join icrm_customers.user_details on submitted_by = icrm_customers.user_details.id ORDER BY raised_on desc";
        $sql_limit_query = $pdo_com->prepare($sql_limit);
        $sql_limit_query->execute();

    ?>

<section id="complaints_table" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4">
            <div class="col-sm-12 col-lg-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="fa fa-exclamation-circle bg-label-red p-1 px-2 rounded-circle shadow-lg align-self-center"></span>
                                Complaints
                            </h2>
                        </div>
                    </div>
                    <hr class="w-50 align-self-center">
                     <?php
                     if ($sql_limit_query) {
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
                                    <tbody class="fw-semibold small table-group-divider">
                                    <?php
                                    foreach ($result_select as $value) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                echo ++$i; ?>
                                            </td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td><?= $value['description'] ?></td>
                                            <td><?= $value['f_name'] . " ", $value['l_name'] ?></td>
                                            <td><?php echo date("d-M-Y", strtotime($value['raised_on'])) ?></td>
                                            <td>
                                                <?php if ($value['comp_status']) {
                                                    echo "<span class='badge small bg-success text-truncate text p-2'>Solved</span>";
                                                } else {
                                                    echo "<span class='badge small bg-warning text-truncate text p-2'>Pending</span>";
                                                } ?>
                                            </td>
                                          
                                        </tr>
                                     <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <?php
                         } else {
                             ?>
                    
                    <div class="card-body my-2 text-center">
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
