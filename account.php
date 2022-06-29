 <?php 
 
   // session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';
    include_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];
    $company_id  = $_SESSION['company_id'];

    // FETCH COMPANY DETAILS
    $c_query = "SELECT * FROM company WHERE id = :id";
    $c_statement = $connect->prepare($c_query);
    $c_statement->execute(
      array(
        ":id" => $company_id
      )
    );
    $c_result = $c_statement->fetch();
    // FETCH COMPANY DETAILS ENDS HERE    
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
         <form id="profile_form">
           <div class="row">
             <div class="col-lg-12">
               <div class="row gutters-sm">
                 <div class="col-md-4 mb-3">
                   <div class="card">
                     <div class="card-body">
                       <div class="d-flex flex-column align-items-center text-center">
                         <img
                           src="<?= $c_result['logo'] == 'None' ? 'https://bootdey.com/img/Content/avatar/avatar7.png' : 'assets/images/companies/'.$c_result['logo']?>"
                           alt="Admin" class="rounded-circle" width="150">
                         <div class="mt-3">
                           <h4></h4>
                           <p class="text-secondary mb-1"></p>
                           <p class="text-muted font-size-sm"><?= $_SESSION['username']; ?></p>
                           <p class="text-muted font-size-sm"><?= $_SESSION['fullname']; ?></p>
                           <!-- <button class="btn btn-outline-primary">Company Logo</button> -->
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
                           <input class="form-control" type="text" id="company_name" name="company_name" required
                             value="<?= $c_result['name']; ?>">
                         </div>
                       </div>
                       <hr>
                       <div class="row">
                         <div class="col-sm-3">
                           <h6 class="mb-0">Office Location</h6>
                         </div>
                         <div class="col-sm-9 text-secondary">
                           <input class="form-control" type="text" id="office_location" name="office_location"
                             value="<?= $c_result['location']; ?>" required>
                         </div>
                       </div>
                       <input class="form-control" type="text" id="company_id" name="company_id" hidden
                             value="<?= $company_id ?>">
                       <hr>
                       <div class="row">
                         <div class="col-sm-3">
                           <h6 class="mb-0">Helpline</h6>
                         </div>
                         <div class="col-sm-9 text-secondary">
                           <input class="form-control" type="text" id="helpline" name="helpline" required
                             value="<?= $c_result['helpline']; ?>">
                         </div>
                       </div>
                       <hr>
                       <div class="row">
                         <div class="col-sm-3">
                           <h6 class="mb-0">Logo</h6>
                         </div>
                         <div class="col-sm-9 text-secondary">
                           <input class="form-control" type="file" name="files[]">
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
                               class="btn btn-outline-success waves-effect waves-light loading">Update Account
                             </button>
                             <a href="dashboard.php" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
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


<script>
    $(document).on('submit', '#profile_form', function (event) {
      event.preventDefault();

      return submitFormQuery(this, "database/account/update_account.php", ".loading", "Company Successfully Updated",
      "other");
    });
</script>