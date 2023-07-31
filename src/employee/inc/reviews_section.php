  <?php
        require_once('./db/configComplaints.php');
        $i = 0;
        $status=1;
        $sql_solved = "SELECT * FROM `user_complaints` join icrm_customers.user_details  on submitted_by = icrm_customers.user_details.id join solution_complaints on c_id=solution_complaints.complaint_id WHERE comp_status=:status ORDER BY solved_on desc;";
        $sql_solve_query = $pdo_com->prepare($sql_solved);
        $sql_solve_query->bindParam(':status',$status);
        $sql_solve_query->execute();

    ?>
<section id="reviews_table" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4">
            <div class="col-sm-12 col-lg-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="fa fa-thumbs-up rounded-circle p-1 bg-label-blue"></span>
                                <span class="fa fa-thumbs-down rounded-circle p-1 bg-label-red"></span>
                                Reviews
                            </h2>
                        </div>
                    </div>
                    <hr class="w-50 align-self-center">
                    <?php
                     if ($sql_solve_query) {
                         $result_solve_select = $sql_solve_query->fetchAll(PDO::FETCH_ASSOC);
                      if ($result_solve_select) {
                        ?>
                    <div class="card-body text-center">
                        <div class="mx-3 rounded-4 table-responsive shadow-lg text-center">
                                <table class="table table-borderless table-hover table-striped align-middle text-center">
                                    <thead class="border-4 border-bottom">
                                        <tr>
                                            <th>Customer</th>
                                            <th>Complaint</th>
                                            <th>Solved On</th>
                                            <th>Rating</th>
                                            <th>Solved</th>
                                            <th>Suggestion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold small table-group-divider">
                                        <?php
                                        
                                        foreach ($result_solve_select as $value) {
                                            require_once './db/configRating.php';
                                            $rating_data_query = "SELECT * FROM `customer_review` WHERE solution_id = :sol_id";
                                            $rating_data_prepared = $pdo->prepare($rating_data_query);
                                            $rating_data_prepared->bindParam(':sol_id', $value['sol_id']);
                                            $rating_data_prepared->execute();
                                            $result_data_rating = $rating_data_prepared->fetch(PDO::FETCH_ASSOC);

                                          ?>
                                        <tr>
                                            <td><?php echo $value['f_name']." ".  $value['l_name'] ?></td>
                                            <td class="fw-bold"><?php echo $value['title'] ?></td>
                                            <td>
                                              <?php echo date("d-M-Y",strtotime($value['solved_on']))  ?>
                                            </td>
                                            <td><?php if($result_data_rating['rating']){
                                                echo $result_data_rating['rating'].'<span class="fa ms-1 fa-star text-warning"></span>';
                                            }
                                            else{
                                                echo '<span class="fa fa-exclamation-circle ms-1 text-danger">Not Rated</span>';
                                            } ?></td>
                                            <td>
                                                <?php if($value['comp_status']){
                                                echo '<span class="badge bg-success">Solved</span>';
                                            }
                                            else{
                                                echo '<span class="badge bg-warning">Pending</span>';
                                            } ?>
                                            
                                            </td>
                                            <td>
                                            <?php 
                                                if($result_data_rating['suggestion']){
                                                echo $result_data_rating['suggestion'];
                                                } 
                                            ?>
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
                            }
                        }
                        else{
                    ?>
                    <div class="card-body my-2 text-center">
                            <h3 class="text-muted">No Reviews Are There</h3>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>