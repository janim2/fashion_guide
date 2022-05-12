<?php
    //session_start();
    require_once 'partials/header.php';
    require_once 'helpers/counter_functions.php';
    require_once 'database/config.php';
    require_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];
?>

        <div class="main-content">
                <div class="page-content">
                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h4>Fashion Guide</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item active">Dashboard</li>
                                         </ol>
                                 </div>
                             </div>
                         </div>
                        </div>
                     </div>

                    <div class="container-fluid">

                        <div class="page-content-wrapper">      


                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fas fa-users text-danger h1"></i>
 
                                             <h3 class="mt-3 font-size-22"><?= count_total_clients($connect, $customer_id)?></h3>
 
                                             <div class="mt-3">
                                                 <p class="mb-0 mt-4">Clients</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fas fa-briefcase text-info h1"></i>
 
                                             <h3 class="mt-3 font-size-22"><?= count_total_clients($connect, $customer_id)?></h3>
 
                                             <div class="mt-3">
                                                 <p class="mb-0 mt-4">Clients</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fab fa-cc-visa text-success h1"></i>
 
                                             <h3 class="mt-3 font-size-22"><?= moneyFormat(total_project_costs($connect, $customer_id))?></h3>
 
                                             <div class="mt-3">
 
                                                 <p class="mb-0 mt-4">Total Project Cost</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fas fa-shipping-fast text-primary h1"></i>
 
                                             <h3 class="mt-3 font-size-24"><?= all_count_total_projects($connect, $customer_id)?></h3>
 
                                             <div class="mt-3">
                                                 <p class="mb-0 mt-4">Total Projects</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <div class="row">

                            <div class="col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Products of the Month</h4>
                                        <div class="table-responsive">
                                            <?php
                                                    $query = "SELECT * FROM projects WHERE customer_id = :customer_id AND status <> '2' ORDER BY days_to_complete ASC ";
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
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Clients</th>
                                                        <th>Project Status</th>
                                                        <th>Type Of Work</th>
                                                        <th>Balance</th>
                                                        <th>Days Left</th>
                                                        <th>Delivery Mode</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($rows as $result) { ?>
                                                    <tr>
                                                        <td>
                                                        <a href="project-details.php?ref=<?= $result['project_id']?>">
                                                            <div class="media">
                                                                <div class="me-3 align-self-center">
                                                                    <div class="avatar-sm rounded bg-primary align-self-center">
                                                                        <span class="avatar-title">
                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="50">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body overflow-hidden mt-1">
                                                                    <h5 class="font-size-15 mb-1"><?= getClientName($connect, $result['client']) ?></h5>
                                                                    <p class="mb-0 text-primary"><?= getClientNumber($connect, $result['client']) ?></p>
                                                                </div>                                                            
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($result['status'] == 0){?>
                                                                <span class="badge badge-pill badge-soft-primary font-size-13">In progress</apan>
                                                            <?php
                                                            }
                                                            else if($result['status'] == 1){?>
                                                                <span class="badge badge-pill badge-soft-warning font-size-13">Completed Not Delivered</apan>
                                                            <?php
                                                            }
                                                            else{?>
                                                                <span class="badge badge-pill badge-soft-success font-size-13">Completed And Delivered</apan>
                                                            <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?= ucwords($result['type_of_work']) ?></td>
                                                <!--    <td>GHS <?= $result['project_cost'] == "" ? 0 : ucwords($result['project_cost']) ?></td> -->
                                                    <td><?= $result['balance'] == "" ? 0 : ucwords($result['balance']) ?></td>
                                                    <td><?= $result['days_to_complete'] == "" ? 0 : $result['days_to_complete'] ?></td>
                                                    
                                                    <td><?= ucwords($result['mode_of_delivery']) ?></td>
                                                <!--    <td> 
                                                        <a href="project-details.php?ref=<?= $result['project_id']?>" class="btn btn-sm btn-outline-primary">Details</a>
                                                    </td> -->
                                                    </tr>
                                                 <?php $i++;
                                     } ?>
                                                </tbody>
                                            </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                              <div class="card">
                                               <div class="card-body">
                                                  <h4 class="header-title mb-4" style="color :blue">Recent Activities</h4>
                                                  <hr />
                                                    <div class="border p-4 rounded">
                                                        <div class="media">
                                                            <div class="me-3 align-self-center">
                                                                <div class="avatar-sm rounded bg-primary align-self-center">
                                                                    <span class="avatar-title">
                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="50">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body overflow-hidden mt-1">
                                                                <h5 class="font-size-15 mb-1"><?= getClientName($connect, $result['client']) ?></h5>
                                                                <p class="mb-0 text-primary"><?= getClientNumber($connect, $result['client']) ?></p>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="media border-bottom py-3">
                                                            <div class="media-body">
                                                                <p class="text-muted mb-2">Has been added to your list of clients</p>
                                                            </div>
                                                            <p class="float-sm-right font-size-12">22 Jan, 2020</p>
                                                        </div>
                                                    </div>
                                                    <div class="border p-4 rounded">
                                                        <div class="media">
                                                            <div class="me-3 align-self-center">
                                                                <div class="avatar-sm rounded bg-primary align-self-center">
                                                                    <span class="avatar-title">
                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="50">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body overflow-hidden mt-1">
                                                                <h5 class="font-size-15 mb-1"><?= getClientName($connect, $result['client']) ?></h5>
                                                                <p class="mb-0 text-primary"><?= getClientNumber($connect, $result['client']) ?></p>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="media border-bottom py-3">
                                                            <div class="media-body">
                                                                <p class="text-muted mb-2">Kaba & Slit works has been added to the list of project for the above client.</p>
                                                            </div>
                                                            <p class="float-sm-right font-size-12">22 Jan, 2020</p>
                                                        </div>
                                                    </div>
                                                    <div class="border p-4 rounded">
                                                        <div class="media">
                                                            <div class="me-3 align-self-center">
                                                                <div class="avatar-sm rounded bg-primary align-self-center">
                                                                    <span class="avatar-title">
                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="50">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body overflow-hidden mt-1">
                                                                <h5 class="font-size-15 mb-1"><?= getClientName($connect, $result['client']) ?></h5>
                                                                <p class="mb-0 text-primary"><?= getClientNumber($connect, $result['client']) ?></p>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="media border-bottom py-3">
                                                            <div class="media-body">
                                                                <p class="text-muted mb-2">GHS 250 has been received from the above clients as a project cost</p>
                                                            </div>
                                                            <p class="float-sm-right font-size-12">22 Jan, 2020</p>
                                                        </div>
                                                    </div>
                                               </div>
                                           </div>
              </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                         <i class="fas fa-paper-plane text-primary h1"></i>

                                         <h3 class="mt-3 font-size-24">1245</h3>

                                         <div class="mt-3">
                                             <p class="mb-0 mt-4">Pending Project</p>
                                         </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                         <i class="fas fa-paper-plane text-primary h1"></i>

                                         <h3 class="mt-3 font-size-24"><?= count_total_projects($connect, $customer_id, 0)?></h3>

                                         <div class="mt-3">
                                             <p class="mb-0 mt-4">Uncompleted Project</p>
                                         </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-body">
                                         <i class="fas fa-paper-plane text-primary h1"></i>

                                         <h3 class="mt-3 font-size-24"><?= count_total_projects($connect, $customer_id, 1)?></h3>

                                         <div class="mt-3">
                                             <p class="mb-0 mt-4">Completed Project</p>
                                         </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                         <i class="fas fa-paper-plane text-primary h1"></i>

                                         <h3 class="mt-3 font-size-24"><?= count_total_projects($connect, $customer_id, 2)?></h3>

                                         <div class="mt-3">
                                             <p class="mb-0 mt-4">Delivered Projects</p>
                                         </div>
                                    </div>
                                </div>
                            </div>

                            


                        </div>



                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
           

    <?php include_once 'partials/footer.php'; ?>