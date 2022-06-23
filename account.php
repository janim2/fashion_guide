 <?php 
 
   // session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';
    include_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];
    
    $response = "";

    if(isset($_POST['add_account_btn'])){
        $company_name            = $_POST["company_name"];
        $office_location         = $_POST["office_location"];
        $helpline                = $_POST["helpline"];
       

         $query = "INSERT INTO customer(company_name, office_location, helpline)

            VALUES(:company_name, :office_location, :helpline)";
        $statement = $connect->prepare($query);

 
        $counter = $count_statement->rowCount();
        if($counter == 0){
            $has_added = $statement->execute(
                array(
                    ":company_name"           => $company_name,
                    ":office_location"        => $office_location,
                    ":helpline"               => $helpline,
                     
                )
            );

            if($has_added){
                $response = "<div class='alert alert-success text-center' role='alert'>Account has been updated successfully</div>";
            }
            else{
                $response = "<div class='alert alert-danger text-center' role='alert'>" + $has_added + "</div>";
            }
        }
        
    }

    
    

            
?> 
<div class="main-content">

  <div class="page-content">

    <!-- start page title -->
    <div class="page-title-box">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <div class="page-title">
              <h4>Account Details</h4>
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Account</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end page title -->
    <div class="container-fluid">
      <div class="page-content-wrapper">
         <form>
        <div class="row">
          <div class="col-lg-12">
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4></h4>
                        <p class="text-secondary mb-1"></p>
                        <p class="text-muted font-size-sm"></p>
                        <button class="btn btn-outline-primary">Company Logo</button>
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
                      <h6 class="mb-0">Company Name</h6> 
                    </div>
                    <div class="col-sm-9 text-secondary"> 
                        <input class="form-control" type="text" placeholder="" id="company_name" name="company_name" required value="">  
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Office Location</h6>
                    </div>
                   <div class="col-sm-9 text-secondary"> 
                        <input class="form-control" type="text" placeholder="" id="office_location" name="office_location" value="" required>  
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Helpline</h6>
                    </div>
                   <div class="col-sm-9 text-secondary"> 
                        <input class="form-control" type="text" placeholder="" id="helpline" name="helpline" required value="">  
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Logo</h6>
                    </div>
                   <div class="col-sm-9 text-secondary"> 
                        <input class="form-control" type="file" id="image" name="image">  
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <div class="button-items">
                                <input type="hidden" name="action" id="account_action">
                                <input type="hidden" name="id" id="account_id">
                                <button type="submit" id="add_account_btn" name="add_account_btn"
                            class="btn btn-outline-success waves-effect waves-light">Update Account
                                </button>
                        <a href="dashboard.php"
                            class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                    </div>
                </div>
            </div>
                </div>
              </div>
</div>

                                           








              
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php include_once 'partials/footer.php'; ?>
  