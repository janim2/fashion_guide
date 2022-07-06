                            
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                             <h4 class="header-title">Add Project  <?= $response; ?></h4>
                        <hr class="mb-3">
                                            <form method="POST" id="project_form" enctype="multipart/form-data" action="project-add.php">
                                            <?php
                                                if(isset($_GET['forclientID'])){?>
                                                <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Client</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" aria-label="Default select example" name="client" id="client">
                                                        <option selected value="<?= $_GET['forclientID']?>"><?= $_GET['forclientName']?></option>
                                                    </select>
                                                </div>
                                                <?php
                                                }
                                                else{?>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-4 col-form-label">Client</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-select" aria-label="Default select example" name="client" id="client" required>
                                                                <option selected></option>
                                                                <?php
                                                                    $query = "SELECT * FROM clients WHERE customer_id = :customer_id";
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

                                                                        
                                                        <option value="<?=$result['client_id'] ?>"><?=$result['full_name'] ?> -- <?=$result['phone_number_1'] ?> </option>
                                                                        <?php 
                                                                    }
                                                                        ?>

                                                                        
                                                                <?php
                                                                    }?> 
                                                        </select>
                                                </div>
                                                <?php
                                                }
                                            ?>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Type of Work</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder=" " id="type_of_work" name="type_of_work" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-search-input" class="col-sm-4 col-form-label">Brief Description of the Work</label>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" id="productdesc" rows="4" placeholder="" id="description" name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-url-input" class="col-sm-4 col-form-label">Type of Fabric</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder=""  id="type_of_fabric" name="type_of_fabric">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-url-input" class="col-sm-4 col-form-label">Images of Fabric &amp; Style (if any)</label>
                                                <div class="col-sm-6">
                                                    <input type="file" name="files[]" class="form-control" id="customFile" multiple>
                                                </div>
                                            </div>
                                            
                                             <div class="row mb-3">
                                                <label for="example-email-input" class="col-sm-4 col-form-label">Sewing Charges- GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="" id="sewing_charges" name="sewing_charges" value="" onkeyup="addSewingAndDeliveryCharges();" required/>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-email-input" class="col-sm-4 col-form-label">Delivery Charges- GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="" id="delivery_charges" name="delivery_charges" value="0" onkeyup="addSewingAndDeliveryCharges();" />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-email-input" class="col-sm-4 col-form-label">Project Cost- GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="" id="project_cost" name="project_cost" readonly />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-url-input" class="col-sm-4 col-form-label">Advance Payment- GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder=""  id="advance_payment" name="advance_payment" onkeyup="subtractGetBalance();" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-4 col-form-label">Balance- GHS</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" value=""  id="balance" name="balance" readonly>
                                                </div>
                                            </div>
                                             <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-4 col-form-label">Start Date</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="date" id="start_date" name="start_date" value="<?= date('Y-m-d') ?>" required/>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-4 col-form-label">End Date</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="date" id="end_date" name="end_date" required/>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-4 col-form-label">Days to complete project</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text"  id="days_to_complete" name="days_to_complete" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Mode Of Delivery</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" aria-label="Default select example" id="mode_of_delivery" name="mode_of_delivery">
                                                        <option></option>
                                                        <option value="Delivery" selected>Delivery</option>
                                                         <option value="PickUp">Pick Up</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-tel-input" class="col-sm-4 col-form-label">Delivery Location</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder=""  id="delivery_location" name="delivery_location" >
                                                </div>
                                            </div>
                                           <div class="row mb-3" style="display:none;">
                                                <label class="col-sm-4 col-form-label">Added By</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select" aria-label="Default select example" name="added_by" id="added_by">
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
                                            <hr>
                                             <div class="row">
                                                <label class="col-sm-4 col-form-label"></label>
                                                    <div class="col-sm-6">
                                                        <div class="button-items">
                                                            <input type="hidden" name="action" id="project_action">
                                                            <input type="hidden" name="id" id="project_id">
                                                            <button type="submit" id="add_project_btn" name="add_project_btn"
                                                        class="btn btn-outline-success waves-effect waves-light">Add Client
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
                    </div>