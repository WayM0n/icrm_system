
<section id="issue" class="my-4 user-select-none">
    <div class="ms-4 m-3 p-4">
        <button id="btn_raise" type="button" class="btn btn-md btn-success">
            <span class="fa fa-plus-circle"></span> Raise an Issue
        </button>
    </div>

    <div id="issueForm" class="container-fluid mx-auto hide">
        <div class="row m-sm-4">
            <div class="col-sm-12 col-lg-12">
                <div class="card rounded-5">
                        <div class="card-header">
                            <div class="card-title text-center">
                                <h2>Raise an Issue
                                    <span class="fa fa-bug text-danger"></span>
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="./processIssue.php" method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control fw-semibold" type="text" name="title" id="title" placeholder="Issue" required>
                                    <label for="email">Title</label>
                                </div>
                                <div class="form-floating mb-3" >
                                    <textarea class="form-control mb-3" placeholder="Something ...." rows="5" maxlength="250" id="description" name="description" required></textarea>
                                 <div class="float-end"><span id="counter"></span></div>
                                
                                    <label for="desc">Description</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-secondary" type="button" id="inputGroupFileAddon04" disbaled>
                                        <span class="fa fa-file"></span>
                                    </button>
                                  </div>
                                <div class="text-center">
                                    <button class="btn form-control btn-primary" name="submit_issue" type="submit"><span class="fa fa-send-o fs-3" ></span></button>
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
require_once('./db/configIssue.php');
$sql_issue = "SELECT * FROM `user_issues` WHERE raised_by=:raised_by ORDER BY raised_on DESC";
$sql_issue_prepared = $pdo_issue->prepare($sql_issue);
$sql_issue_prepared->bindParam(':raised_by', $_SESSION['id']);
$sql_issue_prepared->execute();
$sql_issue_fetch = $sql_issue_prepared->fetchALL();
?>
<section id="reviews_table" class="my-4 user-select-none">
    <div class="container-fluid mx-auto">
        <div class="row m-sm-4">
            <div class="col-sm-12 col-lg-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header rounded-4 py-3 pb-1">
                        <div class="card-title text-center">
                            <h2 class="text-primary">
                                <span class="fa fa-history rounded-circle p-1 bg-label-green"></span>
                                Issues History
                            </h2>
                        </div>
                    </div>
                    <hr class="w-50 align-self-center">
                            <?php
                            if ($sql_issue_fetch) {
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
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($sql_issue_fetch as $sql_issue_value) {
                                        # code...         
                                        ?>
                                    <tbody class="fw-semibold small table-group-divider">
                                        <tr>
                                            <td>
                                                1.
                                            </td>
                                            <td><?php echo $sql_issue_value['title'] ?></td>
                                            <td><?php echo $sql_issue_value['description'] ?></td>
                                            <td><?php echo date("d-M-Y", strtotime($sql_issue_value['raised_on'])) ?></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                        </div>
                    </div>
                    <?php
                        }
                    else{
                    ?>
                    <div class=" my-2 text-center">
                            <h3 class="text-muted">No Issues</h3>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>