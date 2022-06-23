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
        $email                   = $_POST["email"];
        $helpline                = $_POST["helpline"];
       

         $query = "INSERT INTO customer(company_name, office_location, email, helpline)

            VALUES(:company_name, :office_location, :email, :helpline)";
        $statement = $connect->prepare($query);

 
        $counter = $count_statement->rowCount();
        if($counter == 0){
            $has_added = $statement->execute(
                array(
                    ":company_name"           => $company_name,
                    ":office_location"        => $office_location,
                    ":email"                  => $email,    
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
              
            <div class="col-md-5">
              <div class="card mb-3">
                <div class="card-body">
                   <h4 class="header-title">Subcription Payment</h4> 
                   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pay for Service</h6> 
                    </div>
                    <div class="col-sm-9 text-secondary"> 
                        <select class="form-select" aria-label="Default select example" id="payment_for"
                        name="payment_for" required>
                        <option selected value="" > Select a service to pay for</option>
                        <option  value="SMS">SMS</option>
                        <option value="Software">Software Services</option>
                    </select>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Currency</h6>
                    </div>
                   <div class="col-sm-9 text-secondary"> 
                    <select class="form-select" aria-label="Default select example" id=""
                        name="" required>
                        <option selected value="Ghana Cedis">Ghana Cedis - GHS</option>
                    </select>
                    </div>
                  </div>
                  <hr>

                  <div class="row sms-quantity-layout">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Quantity</h6>
                    </div>
                   <div class="col-sm-9 text-secondary"> 
                    <select class="form-select" aria-label="Default select example" id="sms-quantity"
                        name="sms-quantity" required>
                        <option>Select SMS Unit To Recharge</option>
                        <option value="304">304 SMS Units</option>
                        <option value="817">817 SMS Units</option>
                        <option value="1635">1,635 SMS Units</option>
                        <option value="2453">2,453 SMS Units</option>
                        <option value="3538">3,538 SMS Units</option>
                        <option value="4422">4,422 SMS Units</option>
                        <option value="5306">5,306 SMS Units</option>
                        <option value="6191">6,191 SMS Units</option>    
                        <option value="7076">7,076 SMS Units</option>
                        <option value="7960">7,960 SMS Units</option>
                        <option value="9214">9,214 SMS Units</option>
                        <option value="19222">19,222 SMS Units</option>
                    </select>
                    </div>
                  </div>

                  <div class="row subcription-period-layout">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Period</h6>
                    </div>
                   <div class="col-sm-9 text-secondary"> 
                    <select class="form-select" aria-label="Default select example" id="subcription-period"
                        name="subcription-period" required>
                        <option>Select Subcription Period</option>
                        <option value="1">Monthly</option>
                        <option value="6">Half Year - 6 Months</option>
                        <option value="12">Annual - 1 Year</option>
                        <option value="24">Biennial - 2 Years</option>
                    </select>
                    </div>
                  </div>
                  <hr>
                 
                   <div class="row sms-price-tag">
                      <div class="col-xl-12">
                          <div class="card border-start border-primary bg-light border-end border-top border-bottom">
                              <div class="card-body">
                                <h2 class="mt-3 font-size-22 text-center">GHS 200.00</h2>
                                  <div class="mt-3"> 
                                    <h3 class="mb-0 mt-4 text-center">Cost</h3>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

               

                    <div class="software-price-tag">
                       <div class="card border-start border-primary bg-light monthly_retainer">
                            <div class="card-body">
                                <div class="float-end">
                                    <h2 class="mt-4 ps-2">GHS 100</h2>
                                </div>

                                <div class="price-box">
                                    <h5>Monthly Retainer</h5>
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                        </div>

                        <div class="card border-start border-danger bg-light half_year_retainer">
                            <div class="card-body">
                                <div class="float-end">
                                    <h2 class="mt-4 ps-2">GHS 540</h2>
                                </div>

                                <div class="price-box">
                                    <h5>Half Year Retainer</h5>
                                    <p class="text-muted mb-0">
                                        <li class="nav-item d-inline-block">
                                            <a class="nav-link px-3 rounded yearly" id="Yearly" data-bs-toggle="pill" href="#Year" role="tab" aria-controls="Year" aria-selected="false"> <span
                                                        class="badge bg-danger rounded text-white px-2 py-2">10% Off </span></a>
                                        </li>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card border-start border-warning bg-light yearly_retainer">
                            <div class="card-body">
                                <div class="float-end">
                                    <h2 class="mt-4 ps-2">GHS 960</h2>
                                </div>

                                <div class="price-box">
                                    <h5>Yearly Retainer</h5>
                                   <p class="text-muted mb-0">
                                        <li class="nav-item d-inline-block">
                                            <a class="nav-link px-3 rounded yearly" id="Yearly" data-bs-toggle="pill" href="#Year" role="tab" aria-controls="Year" aria-selected="false"> <span
                                                        class="badge bg-warning rounded text-white px-2 py-2">20% Off </span></a>
                                        </li>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card border-start border-success bg-light biennial_retainer">
                            <div class="card-body">
                                <div class="float-end">
                                    <h2 class="mt-4 ps-2">GHS 1,680</h2>
                                </div>

                                <div class="price-box">
                                    <h5>Biennial Retainer</h5>
                                   <p class="text-muted mb-0">
                                        <li class="nav-item d-inline-block">
                                            <a class="nav-link px-3 rounded yearly" id="Yearly" data-bs-toggle="pill" href="#Year" role="tab" aria-controls="Year" aria-selected="false"> <span
                                                        class="badge bg-success rounded text-white px-2 py-2">30% Off </span></a>
                                        </li>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="row add_buttons">
                    <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <div class="button-items">
                                <input type="hidden" name="action" id="account_action">
                                <input type="hidden" name="id" id="account_id">
                                <button type="submit" id="add_account_btn" name="add_account_btn"
                            class="btn btn-outline-success waves-effect waves-light">Purchase Now
                                </button>
                        <a href="dashboard.php"
                            class="btn btn-danger waves-effect waves-light">Cancel Purchase</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
</div>

             <div class="col-md-7 mb-3">
                <div class="card">
                <div class="card-body">
                   <h4 class="header-title">Subscription History</h4> 
                   <hr>

                   <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0;">
                      <thead>
                      <tr>
                          <th>S/N</th>
                          <th>Subcription For</th>
                          <th>Value</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td class="text-center"></td>
                          <td>
                              
                          </td>
                          <td><div class="media-body overflow-hidden mt-1">
                                  <h5 class="font-size-14 mb-1"></h5>
                                  <p class="text-primary mb-0"></p>
                              </div>
                          </td>
                          <td></td>
                          <td><div class="media-body overflow-hidden mt-1">
                                  <h5 class="font-size-14 mb-1"></h5>
                                  <p class="text-muted mb-0"></p>
                              </div></td>
                          <td>
                              <a href="#" class="btn btn-outline-primary">Receipt</a>
                          </td>
                      </tr>
                       </tbody>
                  </table>


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

  //hiding items
    $(".sms-quantity-layout").hide();
    $(".subcription-period-layout").hide();
    $(".sms-price-tag").hide();
    $(".software-price-tag").hide();
    $(".add_buttons").hide();

    $(".monthly_retainer").hide();
    $(".half_year_retainer").hide();
    $(".yearly_retainer").hide();
    $(".biennial_retainer").hide();


    //showing the corresponding payment for
    $('#payment_for').on('change', function() {
        if (this.value == "SMS") {
          $('.sms-quantity-layout').show();
          $(".subcription-period-layout").hide();
          $(".software-price-tag").hide();
          $(".add_buttons").hide();
        }else if(this.value == "Software"){
          $('.sms-quantity-layout').hide();
          $(".subcription-period-layout").show();
          $(".sms-price-tag").hide();
          $(".add_buttons").hide();
        }
        else {
          $('.sms-quantity-layout').hide();
          $(".subcription-period-layout").hide();
          $(".sms-price-tag").hide();
          $(".software-price-tag").hide();
          $(".add_buttons").hide();
        } 
    });

    //sms subcription price tag
    $('#sms-quantity').on('change', function() {
        if (this.value == "304") {
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "817"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "1635"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "2453"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "3538"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "4422"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "5306"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "6191"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "7076"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "7960"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "9214"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }else if(this.value == "19222"){
            $('.sms-price-tag').show();
            $(".add_buttons").show();
        }
        else {
            $(".sms-price-tag").hide();
        $(".add_buttons").hide();
        } 
    });

    //sofware subcription price tag
    $('#subcription-period').on('change', function() {
        if (this.value == "1") {
          $(".software-price-tag").show();
          $(".monthly_retainer").show();
          $(".half_year_retainer").hide();
          $(".yearly_retainer").hide();
          $(".biennial_retainer").hide();
          $(".add_buttons").show();
          $('.sms-price-tag').hide();
        }else if(this.value == "6"){
          $(".software-price-tag").show();
          $(".monthly_retainer").hide();
          $(".half_year_retainer").show();
          $(".yearly_retainer").hide();
          $(".biennial_retainer").hide();
          $(".add_buttons").show();
        }else if(this.value == "12"){
          $(".software-price-tag").show();
          $(".monthly_retainer").hide();
          $(".half_year_retainer").hide();
          $(".yearly_retainer").show();
          $(".biennial_retainer").hide();
          $(".add_buttons").show();
        }else if(this.value == "24"){
          $(".software-price-tag").show();
          $(".monthly_retainer").hide();
          $(".half_year_retainer").hide();
          $(".yearly_retainer").hide();
          $(".biennial_retainer").show();
          $(".add_buttons").show();
        }else {
        $(".software-price-tag").hide();
        $(".monthly_retainer").hide();
        $(".half_year_retainer").hide();
        $(".yearly_retainer").hide();
        $(".biennial_retainer").hide();
        $(".add_buttons").hide();
        } 
    });

   

    </script>
  