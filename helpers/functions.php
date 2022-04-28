<?php
include('sms.php');

function sendSms($phone_number, $message){
    $send = new SendSms();
    $send->key = '5zFWCDwTTpKT6xeSz1OjZp4BW';
    $send->message = strip_tags(str_replace(array("\r", "\n"), ' ', str_replace(array("&"), ' n ', $message)));
    $send->numbers = $phone_number;
  
    $sender_id = 'SageIT';
  
    $send->sender_id = $sender_id;
    return $send->sendMessage();
}

//fetch client name
function getClientName($connect, $client_id)
{
    $query = "SELECT * FROM clients WHERE client_id = :client_id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
           // ":customer_id" => $_SESSION['customer_id'],
            ":client_id"         =>    $client_id,
        )
    );
    $result = $statement->fetch();
    return empty($result['full_name']) ? 'NONE' : $result['full_name'];
}


//fetch client phone number
function getClientNumber($connect, $client_id)
{
    $query = "SELECT * FROM clients WHERE client_id = :client_id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
           // ":customer_id" => $_SESSION['customer_id'],
            ":client_id"         =>    $client_id,
        )
    );
    $result = $statement->fetch();
    return empty($result['phone_number_1']) ? 'NONE' : $result['phone_number_1'];
}

function daysBetweenDates($endDate, $startDate){
    $days = (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24);
    return $days;
}

function fetchProjectIDFromClientID($connect, $client_id){
    $query = "SELECT project_id FROM projects WHERE client = :id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ":id"         =>    $client_id,
        )
    );
    $result = $statement->fetch();
    return $result['project_id'] ?? 0;
}

function fetchProjectDetails($connect, $project_id, $what_to_return){
    $query = "SELECT * FROM projects WHERE project_id = :id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ":id"         =>    $project_id,
        )
    );
    $result = $statement->fetch();
    return empty($result[$what_to_return]) ? 'NONE' : $result[$what_to_return];
}

function moneyFormat($amount){
    return 'GHS ' . number_format($amount, 2);
}
?>