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
        $amount_charged                = $_POST["project_cost"];
        $balance                       = $_POST["balance"];
        $paying_amount                 = $_POST["paying_amount"];
        $payment_date                  = $_POST["payment_date"];
        $days_to_complete              = $_POST["days_to_complete"];
        $received_by                   = $_POST["received_by"];
              

         $query = "INSERT INTO payments(customer_id, client, amount_charged, balance, paying_amount, payment_date, days_to_complete, received_by)
            VALUES(:cid, :client, :amount_charged, :balance, :paying_amount, :payment_date, :days_to_complete, :received_by)";
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
        if($counter == 0){
            $has_added = $statement->execute(
                array(
                   ":cid"                            => $customer_id,
                    ":client"                        => $client,
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
                $response = "<div class='alert alert-success text-center' role='alert'>Payment has been added successfully</div>";
                
            }
            else{
                $response = "<div class='alert alert-danger text-center' role='alert'>" + $has_added + "</div>";
            }
        }
        else{
            $response = "<div class='alert alert-danger text-center' role='alert'>Payment already exists</div>";
        }
        
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
        $.ajax({
            url: 'database/payment/fetch_payment_details.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "client_id": client,
            },
            success: function(data) {
            //    alert("data");
                $('#project_cost').val(data.project_cost == "" ? 0 : data.project_cost);
                $('#advance_payment').val(data.advance_payment);
                $('#balance').val(data.balance);
                $('#days_to_complete').val(data.days_to_complete == "" ? 0 : data.days_to_complete);
            }
        });
    } else {
       
        $('#project_cost').val("");
        $('#advance_payment').val("");
        $('#balance').val("");
        $('#days_to_complete').val("");
        
    }

});

 </script>
