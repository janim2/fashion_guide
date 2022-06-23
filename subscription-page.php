<!doctype html>
<html lang="en">

    <head>
        
        
        <meta charset="utf-8" />
        <title>Coming Soon | Morvin - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    
    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="index.php"><i class="fas fa-home h2"></i></a>
        </div>

        <div class="account-pages my-5 pt-5">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <span class="logo"> <img src="assets/images/SAGEIT.png" height="100" alt="logo"></span>
                            <h4 class="mt-2" style="color: red;">Oops...Your Account Has Expired</h4>
                        <!--    <div class="row justify-content-center mt-1 pt-3">
                                <div class="col-md-8">
                                    <div data-countdown="2021/12/31" class="counter-number"></div>
                                </div>
                            </div>  -->
                        </div>
                    </div>
                </div>


                 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Subcription Payment</h4> 
                                    <div class="row align-items-center">
                                        <div class="col-xl-6">
                                            <div class="pricing-box">
                                               <hr>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <h6 class="mb-0">Pay for Service</h6> 
                                                </div>
                                                <div class="col-sm-9 text-secondary"> 
                                                    <select class="form-select" aria-label="Default select example" id="payment_for"
                                                    name="payment_for" required>
                                                    <option  value="" > Select a service to pay for</option>
                                                    <option disabled  value="SMS">SMS</option>
                                                    <option selected value="Software">Software Services</option>
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

                                <div class="col-xl-6">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="text-center">
                                                <ul class="nav nav-pills rounded justify-content-center d-inline-block border py-1 px-2" id="pills-tab" role="tablist">
                                                    <li class="nav-item d-inline-block">
                                                        <a class="nav-link px-3 rounded active monthly" id="Monthly" data-bs-toggle="pill" href="#Month" role="tab" aria-controls="Month" aria-selected="true" style="text-transform: uppercase;">How To Make Payment</a>
                                                    </li>
                                                </ul>
                                            </div>
    
                                            <div class="tab-content pt-3" id="pills-tabContent">
                                                <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                                                    <div class="card border-start border-primary bg-light border-primary bg-light border-end border-top border-bottom">
                                                        <div class="card-body">
                                                            <div class="price-box">
                                                                <h5>Professional</h5>
                                                                <p class="text-muted mb-0">Desktop publishing
                                                                    software like Aldus PageMaker including versions
                                                                    of Lorem Ipsum.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
 



        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

          <!-- Plugins js-->
          <script src="assets/libs/jquery-countdown/jquery.countdown.min.js"></script>

          <!-- Countdown js -->
          <script src="assets/js/pages/coming-soon.init.js"></script>

        <script src="assets/js/app.js"></script>

        <script>

  //hiding items;
    $(".software-price-tag").hide();
    $(".add_buttons").hide();
    //showing the corresponding payment for
    $('#payment_for').on('change', function() {
        if (this.value == "Software") {
          $(".subcription-period-layout").show();
          $(".add_buttons").hide();
        }
        else {
          $('.sms-quantity-layout').hide();
          $(".subcription-period-layout").show();
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
  

    </body>
</html>
