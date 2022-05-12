<?php
    include_once '../../helpers/functions.php';
    require_once '../config.php';

    $project_id = $_POST['id'];
    $mark_as    = $_POST['mark_as'];

    $query = "UPDATE projects SET status = :s WHERE project_id = :id";
    $statement = $connect->prepare($query);
    $has_changed = $statement->execute(
        array(
            ":s" => $mark_as,
            ":id" => $project_id,
        )
    );

    if($has_changed){
        echo "Project status changed.";
        if($mark_as == 1){
            $clientID = fetchProjectDetails($connect, $project_id, 'client');
            $clientName = getClientName($connect, $clientID);
            $clientPhone = getClientNumber($connect, $clientID);
            $projectName = fetchProjectDetails($connect, $project_id, 'type_of_work');
            $mode_delivery = fetchProjectDetails($connect, $project_id, 'mode_of_delivery');
            $clientAddress = getClientAddress($connect, $clientID);
            $balance = fetchProjectDetails($connect, $project_id, 'project_cost') - getTotalAmountPaidForProject($connect, $project_id);

            if($balance <= 0){
                $balance = 0;
            }
            $delivery_addon = "A dispatch will call yo arrange for delivery at your location $clientAddress. Helpline 0274756446";
            $pickup_addon = "Kindly pass by our office to pickup your work. Helpline: 0274756446";
            $msg = "Hi $clientName your $projectName has been completed adn it's ready for $mode_delivery. Kindly see to it that you have fully paid for the cost of project. Your Outstanding balance is GHC $balance.";
            if($mode_delivery = "Delivery"){
                $msg = $msg.$delivery_addon;
            }
            else{
                $msg = $msg.$pickup_addon;
            }
            sendSMS($connect, $clientPhone, $msg);
        }
    }
    else{
        echo "Something went wrong";
    }

    
?>      