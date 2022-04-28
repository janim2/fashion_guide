
<?php
    session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';
    include_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];
    
?>

            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h4>Project</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                             <li class="breadcrumb-item active">Payment</li>
                                         </ol>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="float-end d-none d-sm-block">
                                    <a href="payment-add.php" class="btn btn-success">Add Payment</a>
                                    
                            <!-- <a href="project-add.php" class="btn btn-success">Add project</a>  -->
                                </div>
                             </div>
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">

                        <div class="page-content-wrapper">

                        <div class="row">
                                <div class="col-xl-3">
                                   <div class="card">
                                       <div class="card-body">
                                            <i class="fas fa-briefcase text-danger h1"></i>

                                            <h3 class="mt-3 font-size-22"><?= count_total_projects($connect, $customer_id, 0)?></h3>

                                            <div class="mt-3">
                                                <p class="mb-0">Outstanding Projects</p>
                                            </div>
                                       </div>
                                   </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fas fa-briefcase text-info h1"></i>
 
                                             <h3 class="mt-3 font-size-22"><?= count_total_projects($connect, $customer_id, 1)?></h3>
 
                                             <div class="mt-3">
                                                <p class="mb-0">Completed Projects</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fas fa-briefcase text-success h1"></i>
 
                                             <h3 class="mt-3 font-size-22"><?= count_total_projects($connect, $customer_id, 2)?></h3>
 
                                             <div class="mt-3">
                                                <div class="mt-3">
                                                <p class="mb-0">Delivered Projects</p>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fab fa-cc-amex text-primary h1"></i>
 
                                             <h3 class="mt-3 font-size-24"><?= moneyFormat(outstanding_balance($connect, $customer_id)); ?></h3>
 
                                             <div class="mt-3">
                                                <div class="mt-3">
                                                <p class="mb-0">Outstanding Balance</p>
                                             </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                             <h4 class="header-title">Payment Records </h4> 
                                            
                                                <hr class="mb-3">

                                             <?php
                                                $query = "SELECT * FROM payments WHERE customer_id = :customer_id";
                                                $statement = $connect->prepare($query);
                                                $statement->execute(
                                                    array(
                                                        ':customer_id' => $customer_id
                                                    )
                                                );
                                                $count = $statement->rowCount();
                                                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                $i = 1;
                                                if ($count > 0 && !empty($rows)) { ?>
                                            
                                            
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Client</th>
                                                    <th>Type of Work</th>
                                                    <th>Amount Charged</th>
                                                    <th>Balance</th>
                                                    <th>Days left</th>
                                                    <th>Dates</th>
                                                    <th>Delivery</th>
                                                </tr>
                                                </thead>
                                                <?php foreach ($rows as $result) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= ucwords(getClientName($connect, $result['client'])) ?></td>
                                                    <td><?= ucwords(fetchProjectDetails($connect, fetchProjectIDFromClientID($connect, $result['client']), "type_of_work")) ?></td>
                                                    <td><?= ucwords($result['amount_charged']) ?></td>
                                                    <td><?= ucwords($result['balance']) ?></td>
                                                    <td><?= ucwords($result['days_to_complete']) ?></td>
                                                    <td><?= $result['payment_date'] ?></td>
                                                    <td><?= ucwords(fetchProjectDetails($connect, fetchProjectIDFromClientID($connect, $result['client']), "mode_of_delivery")) ?></td>
                                                </tr>
                                                 <?php $i++;
                                     } ?>
                                                </tbody>
                                            </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

              
                 <?php include_once 'partials/footer.php'; ?>
               