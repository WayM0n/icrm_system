<section>
    <div class="container-fluid my-4">
        <div class="row p-2 m-4">
            <div class="col-sm-12 m-2">
                <div class="card shadow-lg">
                    <div class="card-header text-center p-2 mt-2">
                        <div class="card-title">
                            <h1 class="fst-italic fw-bolder">
                                <span class=" p-2 bg-primary text-white rounded-5 fa fa-comments me-1 shadow-lg"></span>Feedbacks
                            </h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        require_once('../db/user_feedback.php');
                        $feeds_query = "SELECT * FROM `user_feeds` ORDER BY submitted_on DESC ";
                        $feeds_prepared=$pdo_feed->prepare($feeds_query);
                        $feeds_prepared->execute();
                        $feeds =$feeds_prepared->fetchAll(PDO::FETCH_ASSOC);
                        foreach($feeds as $feed){
                        ?>
                        <div class="card mt-3 shadow-lg">
                            <div class="card-header">
                                <div class="d-md-flex d-sm-block justify-content-between align-items-center">
                                    <div class="d-flex flex-column justify-content-between">
                                        <p><?php echo $feed['username']?>
                                            <span class="small text-muted ms- 1 d-block">
                                                <?php echo $feed['email'] ?>
                                            </span>
                                        </p>
                                    </div>
                                    <p class="small text-muted align-md-bottom mb-md-0">Date : 
                                        <?php
                                            echo date('d-M-Y' ,strtotime($feed['submitted_on']))
                                        ?></p>
                                </div>
                            </div>
                            <div class="card-body bg-secondary p-3">
                                <p class="text-white small fst-italic ms-3">
                                    <?php
                                            echo $feed['feedback'];
                                        ?>
                                </p>
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
</section>