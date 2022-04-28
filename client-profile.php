<?php
    session_start();
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
          <!-- <div class="col-sm-6">
            <div class="float-end d-none d-sm-block">
              <a href="" class="btn btn-success">Add Widget</a>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- end page title -->
    <div class="container-fluid">
      <div class="page-content-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                        width="150">
                      <div class="mt-3">
                        <h4><?= $result['full_name']?></h4>
                        <p class="text-secondary mb-1"><?= $result['phone_number_1']?></p>

                        <p class="text-muted font-size-sm"><?= $result['residential_address']?></p>
                        <!-- <button class="btn btn-outline-primary">Send Message</button> -->
                      </div>

                    </div>
                    <div class="card mt-3">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <!-- <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                          <circle cx="12" cy="12" r="10"></circle>
                          <line x1="2" y1="12" x2="22" y2="12"></line>
                          <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                          </path> -->
                          <!-- </svg> -->
                          <h6>Gender</h6>
                          <span class="text-secondary bg-info text-white" style="font-size: 20px; padding: 10px"><?= $result['gender']?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <!-- <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                          <path
                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                          </path> -->
                          <h6>Phone Number 2</h6>
                          <span class="text-secondary"><?= empty($result['phone_number_2']) ? "None" : $result['phone_number_2']?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <!-- <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                          <path
                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                          </path> -->
                          <h6>Email</h6>
                          <span class="text-secondary"><?= empty($result['email']) ? 'None' : $result['email']?></span>
                        </li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <!-- male specifications -->
              <div class="col-md-8 male_specification" style="display:none">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Trouser Waist</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $result['male_trouser_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Trouser Seat</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_trouser_seat']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Trouser Thigh</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $result['male_trouser_thigh']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Trouser Knee</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $result['male_trouser_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Trouser Bass</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_trouser_bass']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Trouser Length</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_trouser_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Shirt Chest</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $result['male_shirt_chest']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Shirt Back</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_shirt_back']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Shirt Short Sleeve</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_shirt_short_sleeve']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Shirt Long Sleeve</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_shirt_long_sleeve']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Shirt Around Arm</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_shirt_around_arm']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Shirt Cuff</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_shirt_cuff']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Shirt Length</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_shirt_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Agbada Back</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_agbada_back']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Male Agbada Length</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['male_agbada_length']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">                      
                          <button class="btn btn-danger" onclick="removeClient(<?= $client_id; ?>)">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- female specifications -->
              <div class="col-md-8 female_specification" style="display:none">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Skirt Waist</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_skirt_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Skirt Hip</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_skirt_hip']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Skirt Knee</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_skirt_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Skirt Waist Hip</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_skirt_waist_hip']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Skirt Waist Knee</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_skirt_waist_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Skirt Length</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_skirt_skirt_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Bust</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_bust']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Under Bust</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_under_bust']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Waist</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Shoulder</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_shoulder']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Shoulder Nipple</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_shoulder_nipple']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Shoulder Under Bust</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_shoulder_under_bust']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Shoulder Waist</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_shoulder_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Nipple</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_nipple_nipple']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Shoulder Hip</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_shoulder_hip']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Shoulder Knee</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_shoulder_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Top Length</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_top_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Length</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_dress_lenght']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Trouser Waist</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_trouser_waist']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Dress Trouser Seat</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_trouser_seat']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Trouser Thigh</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_trouser_thigh']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Trouser Knee</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_trouser_knee']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Trouser Bass</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_trouser_bass']; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Female Trouser Length</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?= $result['female_trouser_lenght']; ?>
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
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
      var confirmation = confirm("Are you sure you want to delete this Client");
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
