
<?php
    require_once('./db/configIssue.php');
    $i = 0;
    $j = 0;

    $customer_issue_query = "SELECT * FROM `user_issues`JOIN icrm_customers.user_details ON raised_by = icrm_customers.user_details.id ORDER BY raised_on DESC;";
    $customer_issue_prepare = $pdo_issue->prepare($customer_issue_query);
    $customer_issue_prepare->execute();
    $customer_issues_found = $customer_issue_prepare->fetchAll(PDO::FETCH_ASSOC);

    $employee_issue_query = "SELECT * FROM `employees_issues`JOIN icrm_employees.user_details ON raised_by = icrm_employees.user_details.id ORDER BY raised_on DESC;";
    $employee_issue_prepare = $pdo_issue->prepare($employee_issue_query);
    $employee_issue_prepare->execute();
    $employee_issues_found = $employee_issue_prepare->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="reviews_table" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4 g-4">
            <div class="col-sm-12 col-lg-6 col-md-12">
               <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="fa fa-users rounded-circle p-2 bg-label-green"></span>
                                Customer Issues
                            </h2> 
                        </div>
                    </div>
                    <hr class="w-50 align-self-center">
                    <?php
                        if($customer_issues_found){
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
                                            <th>Raised By</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold small">
                                    <?php
                                         foreach($customer_issues_found as $customer_issue){
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$j;?>
                                            </td>
                                            <td class="fw-bold"><?php
                                            echo $customer_issue['title'];
                                            ?></td>
                                            <td class="fst-italic"><?php
                                            echo $customer_issue['description'];
                                            ?></td>
                                            <td class="small">
                                                <?php
                                                echo date('d-M-Y',strtotime($customer_issue['raised_on']));
                                                ?>
                                            </td>
                                            <td><?=$customer_issue['f_name']." ".$customer_issue['l_name']?></td>
                                        </tr>
                                    <?php
                                        }       
                                    ?>
                                    </tbody>
                                </table>
                        </div>
                    
                    </div>
                    <?php
                        }
                        else{
                    ?>
                    `<div class="card-body my-2 text-center">
                            <h3 class="text-muted">No Issues</h3>
                    </div>`
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-12">
               <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="fa fa-user-secret rounded-circle p-2 bg-label-primary"></span>
                                Employee Issues
                            </h2> 
                        </div>
                    </div>
                    <hr class="w-50 align-self-center">
                    <?php
                        if($employee_issues_found){
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
                                            <th>Raised By</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold small">
                                    <?php
                                         foreach($employee_issues_found as $employee_issue){
                                    ?>
                                        <tr>
                                            <td>
                                                <?= ++$j;?>
                                            </td>
                                            <td class="fw-bold"><?php
                                            echo $employee_issue['title'];
                                            ?></td>
                                            <td class="fst-italic"><?php
                                            echo $employee_issue['description'];
                                            ?></td>
                                            <td class="small">
                                                <?php
                                                echo date('d-M-Y',strtotime($employee_issue['raised_on']));
                                                ?>
                                            </td>
                                            <td><?=$employee_issue['f_name']." ".$employee_issue['l_name']?></td>
                                        </tr>
                                    <?php
                                        }       
                                    ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <?php
                        }
                        else{
                    ?>
                    <div class="card-body my-2 text-center">
                            <h3 class="text-muted">No Issues</h3>
                    </div>`
                    <?php
                        }
                    ?>
                </div>
            </div>
       
        </div>
    </div>
</section>