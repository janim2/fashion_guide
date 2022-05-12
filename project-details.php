<?php
    // session_start();
    require_once 'database/config.php';
    require_once 'partials/header.php';
    require_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];
    $project_id = $_GET['ref'];

    $query = "SELECT * FROM projects WHERE project_id = :id";
    $statement = $connect->prepare($query);

    $statement->execute(
      array(
        ":id" => $project_id,
      )
    );

    $result = $statement->fetch();
    $client_name = getClientName($connect, $result['client']);

    $daystoend = daysBetweenDates($result['end_date'],$result['start_date']);
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
              <h4>Project Details</h4>
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="project.php">Projects</a></li>
                <li class="breadcrumb-item active">Project Details</li>
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
                                            <i class="fas fa-briefcase text-info h1"></i>

                                            <h3 class="mt-3 font-size-22">GHS <?= $result['project_cost'] == "" ? 0 : $result['project_cost']; ?></h3>

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
 
                                             <h3 class="mt-3 font-size-22">GHS <?= ucwords($result['advance_payment']); ?></h3>
 
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
 
                                             <h3 class="mt-3 font-size-22">GHS <?= ucwords($result['balance']); ?></h3>
 
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
 
                                             <h3 class="mt-3 font-size-24"> <?= $daystoend; ?> Days</h3>
 
                                             <div class="mt-3">
                                                 <p class="mb-0 mt-4">Days Left</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


      <p id="countdown"></p>
        <div class="card">
          <div class="card-body">
             <h4 class="header-title mb-4" style="color :blue"><?= $client_name;?></h4>
                      <hr />

            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                      if($result['status'] == 0){?>
                          <span class="badge badge-pill badge-soft-danger font-size-13">In progress</apan>
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
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Client Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= ucwords($client_name); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Type of Work</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= ucwords($result['type_of_work']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Brief Description of the Work</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= ucwords($result['description']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Type of Fabric</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= ucwords($result['type_of_fabric']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Sewing Charges - GHS</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?= $result['sewing_charges'] == "" ? 0 : $result['sewing_charges']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Delivery Charges - GHS</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $result['delivery_charges'] == "" ? 0 : $result['delivery_charges']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Project Cost - GHS</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $result['project_cost'] == "" ? 0 : $result['project_cost']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Advance Payment - GHS</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= ucwords($result['advance_payment']); ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Balance - GHS</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= ucwords($result['balance']); ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Start Date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= ucwords($result['start_date']); ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">End Date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= ucwords($result['end_date']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Days to Complete</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $daystoend; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mode of Delivery</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= ucwords($result['mode_of_delivery']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Delivery Location</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= ucwords($result['delivery_location']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    <?php
                        if($result['status'] == 0){?>
                            <button class="btn btn-warning" type="submit" name="mark_as_completed" onclick="markAs(1)">Mark As Completed</button>
                        <?php
                        }
                        else if($result['status'] == 1){?>
                          <button class="btn btn-success" type="submit" name="mark_as_delivered" onclick="markAs(2)">Mark As Delivered</button>
                        <?php
                        }
                    ?>
                      <button class="btn btn-danger" name="delete" onclick="deleteProject(<?= $project_id; ?>)">Delete</button>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
<!-- End Page-content -->
<?php include_once 'partials/footer.php'; ?>
<script>
  function markAs(status){
    $.ajax({
        url: "database/project/mark_as.php",
        method: "POST",
        data: {
            "id" : <?= $project_id; ?>,
            "mark_as" : status,
        },
        // beforeSend: function(){
        //     $(".preloader").show();
        // },
        success: function(data) {
            alert(data); 
            location.href='project-details.php?ref=<?= $project_id; ?>';
        },
    });
  }

  function deleteProject(projectID){
    var confirmation = confirm("Are you sure you want to delete this project");
    if(confirmation){
        $.ajax({
            url: "database/project/delete_project.php",
            method: "POST",
            data: {
                "id" : <?= $project_id; ?>,
            },
            // beforeSend: function(){
            //     $(".preloader").show();
            // },
            success: function(data) {
                alert(data); 
                location.href='project.php';
            },
        });
      }
  }
  
</script>
<!-- <script>
    window.onload = function() {
        var days_to_end = "<?= $daystoend; ?>";
        var days_in_seconds = days_to_end * 3600;
        var hours = floor(($days_in_seconds%86400)/3600);
        var minute = floor(($days_in_seconds%3600)/60);
        var sec = $days_in_seconds%60;
        
        setInterval(function() {
            document.getElementById("countdown").innerHTML = minute + " : " + sec;
            sec--;
            if (sec == 00) {
            minute --;
            sec = 60;
            if (minute == 0) {
                minute = 5;
            }
            }
        }, 1000);
    }
</script> -->