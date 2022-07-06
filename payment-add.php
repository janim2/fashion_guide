 <?php 
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';
    include_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];
    
   //$title = "add payment";
    $response = "";

    if(isset($_POST['add_payment_btn'])){
        $client                        = $_POST["client"];
        $project_id                    = $_POST["project_id"];
        $amount_charged                = $_POST["project_cost"];
        $balance                       = $_POST["balance"];
        $paying_amount                 = $_POST["paying_amount"];
        $payment_date                  = $_POST["payment_date"];
        $days_to_complete              = $_POST["days_to_complete"];
        $received_by                   = $_POST["received_by"];
              

         $query = "INSERT INTO payments(customer_id, client, project_id, amount_charged, balance, paying_amount, payment_date, days_to_complete, received_by)
            VALUES(:cid, :client, :p_id, :amount_charged, :balance, :paying_amount, :payment_date, :days_to_complete, :received_by)";
        $statement = $connect->prepare($query);

        // looking for the presence of client same phone-number-1
        $count_query = "SELECT * FROM payments WHERE client = :client AND balance = :balance AND paying_amount = :paying_amount AND payment_date = :payment_date";
        $count_statement = $connect->prepare($count_query);
        $count_statement->execute(
            array(
                ":client"               =>  $client,
                ":balance"              =>  $balance,
                ":paying_amount"        =>  $paying_amount,
                ":payment_date"         =>  $payment_date,

            )
        ); 
        $counter = $count_statement->rowCount();
        // if($counter == 0){
            $has_added = $statement->execute(
                array(
                   ":cid"                            => $customer_id,
                    ":client"                        => $client,
                    ":p_id"                          => $project_id, 
                    ":amount_charged"                => $amount_charged ?? 0,    
                    ":balance"                       => $balance,    
                    ":paying_amount"                 => $paying_amount,
                    ":payment_date"                  => $payment_date,
                    ":days_to_complete"              => $days_to_complete,    
                    ":received_by"                   => $received_by,    
                    //":added_by"                         => $
                    //":created_on"                       => $
                    //":updated_on"                       => $
                    
                    // ":created_by"                     =>  $_SESSION['username'],
                    // ":the_date"                       =>  date('Y-m-d H:i:s'), 
                     
                )
            );

            if($has_added){
                $client_number = getClientNumber($connect, $client);
                $client_name = getClientName($connect, $client);
                sendSms($connect, $client_number, "Hi $client_name, an amount of GHS $paying_amount has been received. Your outstanding balance is GHS $balance. Helpline: 0274756446.");
                $response = "<div class='alert alert-success text-center' role='alert'>Payment has been added successfully</div>";
                
            }
            else{
                $response = "<div class='alert alert-danger text-center' role='alert'>" + $has_added + "</div>";
            }
        // }
        // else{
        //     $response = "<div class='alert alert-danger text-center' role='alert'>Payment already exists</div>";
        // }
        
    }

            
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
                                     <h4>Payment</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Payment</a></li>
                                             <li class="breadcrumb-item active">Add Payment</li>
                                         </ol>
                                 </div>
                             </div>
                             
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">

                        <div class="page-content-wrapper">
                
                            <?php include_once 'includes/-add-payment.php';?>        

                        </div>
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

              
                


<?php include_once 'partials/footer.php'; ?>

 <script>
     
     function subtract() {
            var txtFirstNumberValue = document.getElementById('advance_payment').value;
            var txtSecondNumberValue = document.getElementById('paying_amount').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                if (result >= 0){
                   // alert("hiiii")
                }
                document.getElementById('balance').value = result;
            }
        }

      //fetch clients details
    $('#client').on('change', function() {
        var client = $('#client').val();
        if (client != "") {
            fetchClientProjects(client);
        } 
    });


function fetchClientProjects(client_id){
    $.ajax({
        url: 'database/payment/fetch_client_projects.php',
        type: 'POST',
        // dataType: 'json',
        data: {
            "client_id": client_id,
        },
        success: function(data) {
            //    alert("data");
            $('.projects').html(data);
        }
    });
}

function calculateBalance(){
    var cost = $('#project_cost').val() ?? 0; 
    var advance = $('#advance_payment').val() ?? 0;
    var pay = $('#paying_amount').val() ?? 0;

    var sum = parseInt(advance) + parseInt(pay);
    var balance = parseInt(cost) - sum;
    if(pay == ""){
        $('#balance').val(balance);
    }
    else if(balance < 0){
        // var amount = $parseInt(cost) - $parseInt(advance);

        $('#balance').val(balance);
        alert("Cannot pay more than Project Amount cost");
    }
    else {
        $('#balance').val(balance);
    }
}


 </script>
