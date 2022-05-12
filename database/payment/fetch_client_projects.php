<?php
    require_once('../config.php');
    session_start();

    $customer_id        = $_SESSION['customer_id'];
    $client_id          = $_POST["client_id"];


    $query = "SELECT * FROM projects WHERE customer_id = :customer_id AND client = :client";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':customer_id' => $_SESSION['customer_id'],
            ':client'      => $client_id, 
        )
    );
    $count = $statement->rowCount();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($count > 0 && !empty($rows)){?>
        <label class="col-sm-4 col-form-label">Projects</label>
        <div class="col-sm-6">
            <select class="form-select" aria-label="Default select example" name="project_id" id="project_id">
                <option></option>
        <?php
        
            foreach($rows as $result){?>
                <option value="<?= $result['project_id'] ?>"><?= $result['type_of_work']?></option>
        <?php
        }
        ?>
            </select>   
    </div>
    <?php
    }
    ?>


<script>
    $('#project_id').on('change', function(){
        var client = $('#client').val();
        var project_id = $('#project_id').val();
        if (project_id != "") {
            $.ajax({
                url: 'database/payment/fetch_payment_details.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    "client_id": client,
                    "project_id": project_id
                },
                success: function(data) {
                //    alert("data");
                if(data.project_cost - data.advance_payment <= 0){
                    alert("Payment completed");
                }
                else{
                    $('#project_cost').val(data.project_cost == "" ? 0 : data.project_cost);
                    $('#advance_payment').val(data.advance_payment);
                    // $('#balance').val(data.balance);
                    $('#days_to_complete').val(data.days_to_complete == "" ? 0 : data.days_to_complete);
                }
                    
                }
            });
        } else {
            $('#project_cost').val("");
            $('#advance_payment').val("");
            $('#balance').val("");
            $('#days_to_complete').val("");
            
        }
    })
</script>
                                                
                                                    
                                                       
                        