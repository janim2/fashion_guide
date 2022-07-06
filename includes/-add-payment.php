                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                             <h4 class="header-title">Add Payment  <?= $response; ?></h4>
                                            <hr class="mb-3">
                                             <form method="POST" id="payment_form" enctype="multipart/form-data" action="payment-add.php">
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Client</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" aria-label="Default select example" name="client" id="client" required>
                                                        <option></option>
                                                        <?php
                                                                $query = "SELECT * FROM projects WHERE customer_id = :customer_id";
                                                                $statement = $connect->prepare($query);
                                                                $statement->execute(
                                                                    array(
                                                                        ':customer_id' => $_SESSION['customer_id']
                                                                    )
                                                                );
                                                                $count = $statement->rowCount();
                                                                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                                if ($count > 0 && !empty($rows)) {
                                                                    foreach ($rows as $result){?>
                                                                    
                                                                    <option value="<?=$result['client'] ?>"><?= getClientName($connect, $result['client']) ?> -- <?= getClientNumber($connect, $result['client']) ?></option>
                                                                    <?php 
                                                                }
                                                                    ?>

                                                                    
                                                            <?php
                                                                }
                                                                else{?>
                                                                    <option value="" disabled="disabled" selected="selected">Add Project To Proceed</option>
                                                                <?php
                                                            }?> 
                                                       
                                                        </select>   
                                                </div>
                                            </div>

                                            <div class="row mb-3 projects">
                                            </div>
                                            
                                             <div class="row mb-3">
                                                <label for="example-email-input" class="col-sm-4 col-form-label">Amount Charged- GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="" id="project_cost" name="project_cost" readonly />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-email-input" class="col-sm-4 col-form-label">Advanced Payment- GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="" id="advance_payment" name="advance_payment" readonly />
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-url-input" class="col-sm-4 col-form-label">Paying Amount - GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder=""  id="paying_amount" name="paying_amount" onkeyup="return calculateBalance()" required/>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-4 col-form-label">Balance - GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" value=""  id="balance" name="balance" readonly>
                                                </div>
                                            </div>
                                            
                                             <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-4 col-form-label">Payment Date</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="date" id="payment_date" name="payment_date" value="<?= date('Y-m-d') ?>" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-4 col-form-label">Days to complete project</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" value="" id="days_to_complete" name="days_to_complete" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3" style="display:none;">
                                                <label class="col-sm-4 col-form-label">Received By</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" aria-label="Default select example" id="received_by" name="received_by">
                                                         <?php
                                                            $query = "SELECT * FROM users WHERE id = :customer_id";
                                                            $statement = $connect->prepare($query);
                                                            $statement->execute(
                                                                array(
                                                                    ':customer_id' => $_SESSION['customer_id']
                                                                )
                                                            );
                                                            $count = $statement->rowCount();
                                                            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                            if ($count > 0 && !empty($rows)) {
                                                                foreach ($rows as $result){?>
                                                                
                                                <option value="<?=$result['id'] ?>"><?=$result['full_name'] ?></option>
                                                                <?php 
                                                            }
                                                                ?>
                                                        <?php
                                                            }?> 
                                                                                            
                                                        </select>
                                                </div>
                                            </div>
                                            
                                           
                                             <div class="row">
                                                <label class="col-sm-4 col-form-label"></label>
                                                    <div class="col-sm-6">
                                                        <div class="button-items">
                                                            <input type="hidden" name="action" id="payment_action">
                                                            <input type="hidden" name="id" id="payment_id">
                                                            <button type="submit" id="add_payment_btn" name="add_payment_btn"
                                                        class="btn btn-outline-success waves-effect waves-light">Add Payment
                                                            </button>
                                                    <a href="project.php"
                                                        class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->