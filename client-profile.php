<?php
    //session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    $customer_id = $_SESSION['customer_id'];

    $client_id = $_GET['ref'];
    $query = "SELECT * FROM clients WHERE client_id = :id";
    $statement = $connect->prepare($query);

    $statement->execute(
      array(
        ":id" => $client_id,
      )
    );
    $result = $statement->fetch();

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

  <div class="page-content">

    <!-- start page title -->
    <div class="page-title-box">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <div class="page-title">
              <h4>Client Details</h4>
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="client.php">Clients</a></li>
                <li class="breadcrumb-item active">Client Details</li>
              </ol>
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
                        <i class="fas fa-briefcase text-info h1"></i>

                        <h3 class="mt-3 font-size-22"></h3>

                        <div class="mt-3">
                            <p class="mb-0 mt-4">Project Cost</p>
                        </div>
                   </div>
               </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                         <i class="fas fa-users text-danger h1"></i>

                         <h3 class="mt-3 font-size-22"></h3>

                         <div class="mt-3">
                             <p class="mb-0 mt-4">Amount Paid</p>
                         </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                         <i class="fab fa-cc-visa text-success h1"></i>

                         <h3 class="mt-3 font-size-22"></h3>

                         <div class="mt-3">

                             <p class="mb-0 mt-4">Balance</p>
                         </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                         <i class="fas fa-shipping-fast text-primary h1"></i>

                         <h3 class="mt-3 font-size-24"></h3>

                         <div class="mt-3">
                             <p class="mb-0 mt-4">Days Left</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4><?= $result['full_name']?></h4>
                        <p class="text-secondary mb-1"><?= $result['residential_address']?></p>
                        <p class="text-muted font-size-sm"><?= $result['gender']?></p>
                        <button class="btn btn-primary" onclick="location.href='project-add.php?forclientID=<?= $client_id ?>&forclientName=<?= $result['full_name']?>'">Add Project</button>
                        <button class="btn btn-outline-primary" onclick="location.href='sms-add.php?sendToID=<?= $client_id; ?>'">Send Message</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $result['full_name']?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $result['email']?> </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $result['phone_number_1']?> </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $result['phone_number_2']?> </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Added On</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"><?= $result['created_on']?> </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <button class="btn btn-outline-success">Update</button>
                        <button class="btn btn-danger" onclick="removeClient(<?= $client_id; ?>)">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
</div>

                                            <div class="col-md-8 mb-3">
                                              <div class="card">
                                               <div class="card-body">
                                                  <h4 class="header-title mb-4" style="color :blue">Project History</h4>
                                                  <hr />
                                                    <div class="border p-4 rounded">

                                                        <?php
                                                            $p_query = "SELECT * FROM projects WHERE customer_id = :c_id AND client = :c";
                                                            $p_statement = $connect->prepare($p_query);
                                                            $p_statement->execute(array(
                                                              ":c_id" => $customer_id, 
                                                              ":c"    => $client_id,
                                                            ));
                                                            
                                                            $count = $p_statement->rowCount();
                                                            $row = $p_statement->fetchAll(PDO::FETCH_ASSOC);
                                                            if($count > 0 && !empty($row)){
                                                              foreach($row as $rowrow){?>
                                                                  <div class="media border-bottom pb-3">
                                                                    <div class="media-body">
                                                                        <p class="text-muted mb-2"><?= $rowrow['type_of_work']?></p>
                                                                        <?php
                                                                            if($rowrow['status'] == 0){?>
                                                                                <span class="badge badge-pill badge-soft-primary font-size-13">In progress</apan>
                                                                            <?php
                                                                            }
                                                                            else if($rowrow['status'] == 1){?>
                                                                                <span class="badge badge-pill badge-soft-warning font-size-13">Completed Not Delivered</apan>
                                                                            <?php
                                                                            }
                                                                            else{?>
                                                                                <span class="badge badge-pill badge-soft-success font-size-13">Completed And Delivered</apan>
                                                                            <?php
                                                                            }
                                                                        ?>
                
                                                                        <!-- <ul class="list-inline product-review-link mb-0">
                                                                            <li class="list-inline-item">
                                                                                <a href="#"><i class="mdi mdi-thumb-up align-middle me-1"></i> Like</a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="#"><i class="mdi mdi-message-text align-middle me-1"></i> Comment</a>
                                                                            </li>
                                                                        </ul> -->
                                                                    </div>
                                                                    <p class="float-sm-right font-size-12">Completion Date: <?= $rowrow['end_date']?></p>
                                                                </div>
                                                              <?php
                                                              }
                                                            }
                                                        ?>
                                                    </div>
                                               </div>
                                           </div>
              </div>

              <!-- male specifications -->
              <div class="col-md-4 male_specification" style="display:none">
                <div class="card mb-3">
                  <div class="card-body">
                     <h4 class="header-title mb-4" style="color :blue">Male Measurement</h4>
                      <hr />
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Trouser Waist (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                        <?= $result['male_trouser_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Trouser Seat (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_trouser_seat']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Trouser Thigh (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                        <?= $result['male_trouser_thigh']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Trouser Knee (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                        <?= $result['male_trouser_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Trouser Bass (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_trouser_bass']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Trouser Length (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_trouser_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Shirt Chest (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                        <?= $result['male_shirt_chest']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Shirt Back (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_shirt_back']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Shirt Short Sleeve (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_shirt_short_sleeve']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Shirt Long Sleeve (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_shirt_long_sleeve']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Shirt Around Arm (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_shirt_around_arm']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Shirt Cuff (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_shirt_cuff']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Shirt Length (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_shirt_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Agbada Back (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_agbada_back']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Male Agbada Length (CM):</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['male_agbada_length']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                          <button class="btn btn-outline-success">Update</button>                     
                          <button class="btn btn-danger" onclick="removeClient(<?= $client_id; ?>)">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- female specifications -->
              <div class="col-md-4 female_specification" style="display:none">
                <div class="card mb-3">
                  <div class="card-body">
                    <h4 class="header-title mb-4" style="color :blue">Female Measurement</h4>
                      <hr />
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Skirt Waist</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_skirt_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Skirt Hip</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_skirt_hip']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Skirt Knee</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_skirt_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Skirt Waist Hip</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_skirt_waist_hip']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Skirt Waist Knee</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_skirt_waist_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Skirt Length</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_skirt_skirt_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Bust</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_bust']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Under Bust</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_under_bust']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Waist</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Shoulder</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_shoulder']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Shoulder Nipple</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_shoulder_nipple']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Shoulder Under Bust</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_shoulder_under_bust']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Shoulder Waist</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_shoulder_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Nipple</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_nipple_nipple']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Shoulder Hip</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_shoulder_hip']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Shoulder Knee</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_shoulder_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Top Length</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_top_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Length</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_dress_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Trouser Waist</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_trouser_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Dress Trouser Seat</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_trouser_seat']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Trouser Thigh</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_trouser_thigh']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Trouser Knee</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_trouser_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Trouser Bass</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_trouser_bass']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-9">
                        <h6 class="mb-0">Female Trouser Length</h6>
                      </div>
                      <div class="col-sm-3 text-secondary">
                      <?= $result['female_trouser_lenght']; ?>
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                        <button class="btn btn-outline-success">Update</button>
                        <button class="btn btn-danger" onclick="removeClient(<?= $client_id; ?>)">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>
        <!-- end card -->
      </div>
    </div>
    <!-- end row -->
  </div>
  <?php include_once 'partials/footer.php'; ?>
  <script>
    var gender = "<?= $result['gender']; ?>";
    if(gender == "male")
      $('.male_specification').show();
    else $('.female_specification').show();
  </script>

  <script>
    function removeClient(client_id){
      var confirmation = confirm("Are you sure you want to delete this Client. NOTE: All records associated with this client will be deleted");
      if(confirmation){
          $.ajax({
              url: "database/client/delete_client.php",
              method: "POST",
              data: {
                  "id" : client_id,
              },
              // beforeSend: function(){
              //     $(".preloader").show();
              // },
              success: function(data) {
                  alert(data); 
                  location.href='client.php';
              },
          });
        }
    }
  </script>
