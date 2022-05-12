
<?php
    //session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';

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
                                     <h4>Users</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                             <li class="breadcrumb-item active">Users</li>
                                         </ol>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="float-end d-none d-sm-block">
                                    <a href="users-add.php" class="btn btn-success">Add User</a>
                                </div>
                             </div>
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                             <h4 class="header-title">Users <span class="btn btn-sm btn-primary"><?= count_total_users($connect, $customer_id) ?></span> </h4> 
                                            
                                                <hr class="mb-3">

                                                <?php
                        $query = "SELECT * FROM users WHERE id = :customer_id";
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
                                                    <th>Full Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Added On</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
            
            
                                                <tbody>
                                                    <?php foreach ($rows as $result) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= ucwords($result['full_name']) ?></td>
                                                    <td><?= ucwords($result['phone_number']) ?></td>
                                                    <td><?= ucwords($result['username']) ?></td>
                                                    <td><?= ucwords($result['role']) ?></td>
                                                    <td></td>
                                                    <td></td>
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
               