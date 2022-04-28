<?php
    require_once('../config.php');
    session_start();

    $customer_id        = $_SESSION['customer_id'];
    $client_id          = $_POST["client_id"];

    $query = $connect->prepare("SELECT * FROM projects WHERE client = :client_id AND customer_id = :customer_id AND status = 0");
    //tailors cannot work on more than one project at a time for the same client. Thus, project details with a status of 0 would always be 1; 
                
    $query->execute(
        array(
                ':client_id'      =>  $client_id,
                ':customer_id'    =>  $customer_id,
                
            )
        );
    $details_check  = $query->fetch();

    $userarray      = array();


    $userarray["project_cost"]          =   strtoupper($details_check["project_cost"]);
    $userarray["advance_payment"]          =   strtoupper($details_check["advance_payment"]);
    $userarray["balance"]                 =   strtoupper($details_check["balance"]);
    $userarray["days_to_complete"]        =   strtoupper($details_check["days_to_complete"]);
    

    echo json_encode($userarray);
?>
