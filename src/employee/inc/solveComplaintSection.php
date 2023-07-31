

<section>
        <div class="container">
            <div class="row" >
                <div class="col-lg-3"></div>
                <div class="col-lg-6 mt-3">
                    <div class="card mt-5 border-0 rounded-3">
                        <div class="card-header mb-3">
                            <h1 class="text-center mt-2 fw-bold" >Solved Complaints</h1>
                        </div>
                        <div class="card-body ">
                            <form action="./processSolution.php" method="post">
                                <input type="hidden" name="c_id" value="<?=$_POST['c_id'] ?>">
                                <div>
                                    <label for="comp" class="text-secondary p-2 fs-5">Complaint</label>
                                    <input type="text" class="form-control mb-3" name="Comp" id="Comp" value="<?=$_POST['title']?>" readonly>
                                </div>
                                
                                <div>
                                    <label for="solu"class=" text-secondary p-2 fs-5">Solution</label>
                                    <textarea class="form-control" placeholder="Something..." name="solu" id="solu" value=""></textarea>
                                </div>
                                <div class="my-2 text-center" >
                                    <button name="btnSol" type="submit" class="btn btn-success fs-4 px-4 border-0 mt-2 shadow-lg ">Solve</button> 
                                </div>
                            </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
        </div>

    </form>
</div>
