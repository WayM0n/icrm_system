
<section id="issue" class="my-4 user-select-none">
    <div class="ms-4 m-3 p-4">
        <button id="btn_comp" type="button" class="btn btn-md btn-success">
            <span class="fa fa-plus-circle"></span> Raise a Complaint
        </button>
    </div>

    <div id="compForm" class="container-fluid mx-auto hide">
        <div class="row m-sm-4">
            <div class="col-sm-12 col-lg-12">
                <div class="card rounded-4">
                        <div class="card-header rounded-4">
                            <div class="card-title text-center">
                                <h2>
                                <span class="fa fa-exclamation-circle text-danger p-1 bg-label-red rounded-4"></span>
                                    Raise a Complaint
                                </h2>
                            </div>
                        </div>
                        <hr class="w-50 align-self-center">
                        <div class="card-body mt-2 mb-4">
                            <form action="./processComplaints.php" method="post">
                                <div class="Form-group">
                                     <label class="fs-5 " for="email ">Title </label>
                                    <input class="form-control mt-2" type="text" name="title" pattern="[a-zA-Z\s]+" title="Please enter a message with only text characters" id="title" placeholder="title-name" required>
                                   
                                </div>
                                 <div class="form-group">
                                <label class="fs-5 mt-4 mb-2" for="email ">Description </label>
                                <textarea class="form-control mb-3" placeholder="Something ...." rows="5" maxlength="250" id="description" name="description" required></textarea>
                                 <div class="float-end"><span id="counter"></span></div>
                                </div>
                              
                                <div class="text-center">
                                    <button class="mt-2 btn form-control btn-primary" name="submit_complaints" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>   
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var description =document.getElementById('description');
    var counter =document.getElementById('counter');
    description.addEventListener('input',function(e){
        const target = e.target;
        const maxlength = target.getAttribute('maxlength');
        const currentLength =target.value.length;
        counter.innerHTML = `${currentLength}/${maxlength}`;
    })
</script>
<?php
        require_once('./db/configComplaints.php');
        $i = 0;
        $sql_limit = "SELECT * FROM `user_complaints` join solution_complaints on c_id=solution_complaints.complaint_id where submitted_by=:id order by raised_on desc" ;
        $sql_limit_query = $pdo_com->prepare($sql_limit);
        $sql_limit_query->bindParam(':id', $_SESSION['id'],PDO::PARAM_INT);
        $sql_limit_query->execute();
?>
<section id="top_complaints" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4 g-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
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
                    <div class="card-body text-center">
                    <?php                
                        if ($sql_limit_query){
                            $result_select = $sql_limit_query->fetchAll(PDO::FETCH_ASSOC);
                            if ($result_select) {
                    ?>
                        <div class="mx-3 rounded-4 table-responsive shadow-lg text-center">
                                <table class="table table-borderless table-hover table-striped align-middle text-center">
                                    <thead class="border-4 border-bottom">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Raised On</th>
                                            <th>Status</th>
                                            <th>Solved On</th>
                                            <th>Solution</th>
                                            <th>Rate</th>
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
                                            <td><?php echo $value['description'] ?></td>
                                            <td><?php echo $value['raised_on'] ?></td>
                                            <td>
                                                <?php if ($value['comp_status']) {
                                                    echo "<span class='badge bg-success text-truncate text p-2'>Solved</span>";
                                                } else {
                                                    echo "<span class='badge bg-warning text-truncate text p-2'>Pending</span>";
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $value['solved_on'] ? $value['solved_on'] : 'Not solved yet';
                                                 ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($value['solution']){
                                                ?>
                                                        
                                                        
                                                        <button type="button" name="solve" id="solve_<?=$value['c_id']?>" class="small fs-6 p-2 badge btn btn-lg btn-success" id="" data-bs-toggle="modal" data-bs-target="#user_<?=$value['c_id']?>">
                                                        View
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="user_<?=$value['c_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Complaint Details</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                       <?php echo $value['solution'] ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                    else{
                                                        echo "<span class='badge fs-6 bg-danger text-truncate p-2'>Not Solved</span>";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    include_once './db/configRating.php';
                                                    if($value['comp_status']){
                                                    $rating_query = "SELECT *FROM customer_review WHERE solution_id = :sol_id";
                                                    $rating_query_prepared = $pdo_rate->prepare($rating_query);
                                                    $rating_query_prepared->bindParam(':sol_id',$value['sol_id'],PDO::PARAM_INT);
                                                    $rating_query_prepared->execute();
                                                    $rating_data = $rating_query_prepared->fetch(PDO::FETCH_ASSOC);
                                                        if($rating_data){
                                                        ?>
                                                            <?php
                                                             if ($rating_data['rating']) {
                                                                echo $rating_data['rating'].'<span class="ms-1 fa fa-star text-warning"></span>';
                                                            }
                                                            else{
                                                                ?>
                                                                
                                                                <button class="btn btn-primary small"  data-bs-toggle="modal"  data-bs-target="#sol_<?php echo $rating_data['solution_id'] ?>">Rate Here</button>
                                                                <div class ="modal fade" id="sol_<?php echo $rating_data['solution_id'] ?>">
                                                                    <div class="modal-dialog " >
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" > 
                                                                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class= "modal-body">
                                                                                <div class="card shadow-lg border-0 mt-4">
                                                                            <div class="card-header truly-basic experience rounded-3">
                                                                                <h2 class=" text-white card-title fw-bold text-center fs-3">Rate Your Experience With Us</h2>
                                                                            </div>
                                                                            <div class="card-body px-4 ">
                                                                                <form action="processRating.php" method="post">
                                                                                        <input type="hidden" value="<?=$rating_data['solution_id']?>" name="solution_id">
                                                                                        <h5 class="fs-4  " >Are You Satisfied ?</h5>
                                                                                        
                                                                                        <div class="form-check form-check-inline mb-4 ms-4">
                                                                                            <input class="form-check-input" type="radio" name="exp" id="exp1" value="1" required checked>
                                                                                            <label class="form-check-label" for="exp1">Yes</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline ">
                                                                                            <input class="form-check-input" type="radio" name="exp" id="exp2" value="0" required>
                                                                                            <label class="form-check-label" for="exp2">No</label>
                                                                                        </div>

                                                                                        <div class="mb-3 mt-1">
                                                                                            <h5 class="mb-4 fs-4" >How would you rate communication skill of the customer ?</h5>
                                                                                            <div class="mx-4">
                                                                                            <input type="range"  name="range" min="0" max="10" required class="form-range">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="p-1">
                                                                                            <h5 class="fs-4 pb-2">Rate Our Solution</h5>
                                                                                            <div class="mx-4">
                                                                                                <select name="sol_rate" id="sol_rate" class="form-select" required>
                                                                                                    <option disabled selected>Select Here</option>
                                                                                                    <option value="1">Worst</option>
                                                                                                    <option value="2">Bad</option>
                                                                                                    <option value="3">Normal</option>
                                                                                                    <option value="4">Good</option>
                                                                                                    <option value="5">Very Good</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                            <div class="ms-3 form-group">
                                                                                                <label for="textarea" class="fs-4 h4 mt-4 mb-4">Any Suggestion ?</label>
                                                                                                <textarea class="form-control" id="textarea" name="suggestion"   rows="3"></textarea>
                                                                                            </div>

                                                                                            <div class="text-center">
                                                                                                <button id="rate_btn" type="submit" name="ratingBtn" class="btn btn-primary mt-3 mb-2 px-3  fs-4 rounded-5  border-3" >Submit</button>
                                                                                            </div>
                                                                                </form>

                                                                            </div>
                                                                        </div>
              


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php    
                                                            }
                                                        }
                                                    }
                                                    else{
                                                        echo "<span class='badge fs-6 bg-danger text-truncate p-2'>Can't Rate</span>";
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
                        <?php
                             }
                            else{
                        ?>
                    </div>
                    
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
        </div>
    </div>
</section>
