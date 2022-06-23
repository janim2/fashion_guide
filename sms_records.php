

<?php
    //session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';
    include_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];

    
?>
            <div class="main-content">
                <div class="page-content">
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h4>SMS</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                             <li class="breadcrumb-item active">SMS Records</li>
                                         </ol>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="float-end d-sm-block">
                                    <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Top Up SMS</a>
                                    <a href="sms-add.php" class="btn btn-success">Send SMS</a>
                                </div>
                             </div>
                         </div>
                        </div>
                     </div>
                     

                      <div class="container-fluid">
                        <div class="page-content-wrapper">


                            <div class="row">
                                <div class="col-xl-4">
                                   <div class="card">
                                       <div class="card-body">
                                            <i class="fab fa-cc-visa text-info h1"></i>

                                            <h3 class="mt-3 font-size-22"></h3>

                                            <div class="mt-3">
                                                <p class="mb-0">SMS Balance</p>
                                                
                                            </div>
                                       </div>
                                   </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fab fa-cc-mastercard text-danger h1"></i>
 
                                             <h3 class="mt-3 font-size-22"></h3>
 
                                             <div class="mt-3">
                                                <p class="mb-0">Total Used</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                             <i class="fab fa-cc-discover text-success h1"></i>
 
                                             <h3 class="mt-3 font-size-22"><?= countGender($connect, $customer_id, "female") ?></h3>
 
                                             <div class="mt-3">
                                                <div class="mt-3">
                                                <p class="mb-0">Females</p>
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
                                           <h4 class="header-title">All Clients</h4> 
                                            
                                                <hr class="mb-3">

                                                <?php
                                                    $query = "SELECT * FROM sms WHERE customer_id = :customer_id ORDER BY id DESC";
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
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Clients</th>
                                                    <th>Message</th>
                                                    <th>Credits</th>
                                                    <th>Sent On</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($rows as $result) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $i ?></td>
                                                    <td>
                                                        <a href="client-profile.php?ref=<?= getClientIDUsingPhoneNumber($connect, $result['phone_number'])?>">
                                                            <div class="media">
                                                                <div class="me-3 align-self-center">
                                                                    <div class="avatar-sm rounded bg-primary align-self-center">
                                                                        <span class="avatar-title">
                                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="50">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body overflow-hidden mt-1">
                                                                    <h5 class="font-size-15 mb-1"><?= ucwords(getClientName($connect, getClientIDUsingPhoneNumber($connect, $result['phone_number']))) ?></h5>
                                                                    <p class="mb-0 text-primary"><?= ucwords(getClientNumber($connect, getClientIDUsingPhoneNumber($connect, $result['phone_number']))) ?></p>
                                                                </div>                                                            
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?= $result['message']; ?>
                                                    </td>
                                                    <td> <?= $result['credit']; ?></td>
                                                    <td>
                                                        <?= $result['date']; ?>
                                                    </td>
                                                    <td>
                                                    Sent
                                                    </td>
                                                </tr>
                                                 <?php $i++;
                                     } ?>
                                                </tbody>
                                            </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                        </div>
        
                        
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>

              
                
<?php include_once 'partials/footer.php'; ?>