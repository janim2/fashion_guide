<?php
include('sms.php');


function checkSMSCount($connect){
    // session_start();
    $query = "SELECT sms FROM company WHERE id = :id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ":id" => $_SESSION['company_id'],
        )
    );
    $result = $statement->fetch();
    return $result['sms'];
}

function sendSms($connect, $phone, $msg)
{
    $send = new SendSms();
    $send->key = '5zFWCDwTTpKT6xeSz1OjZp4BW';
    $send->message = $msg;
    $send->numbers = $phone;
    $send->sender = 'SageIT';
    if(checkSMSCount($connect) > 0){
        saveSMS($connect, $phone, $msg, checkSMSCount($connect) - 1);
        return $send->sendMessage();
    }
    else{?>
        <script>alert("SMS credits exhausted");</script>
    <?php
    }
}

function saveSMS($connect, $phone, $msg, $sms_count){
    $query = "INSERT INTO sms(customer_id, phone_number, message, credit) VALUES(:c_id, :p, :m, :c)";
    $statement = $connect->prepare($query);
    $saved = $statement->execute(
        array(
            ":c_id" => $_SESSION['customer_id'],
            ":p"    => $phone,
            ":m"  => $msg,
            ":c"  => 1
        )
    );
    if($saved){
        $u_query = "UPDATE company SET sms = :sms WHERE id = :id";
        $u_statement = $connect->prepare($u_query);
        $reduced = $u_statement->execute(
            array(
                ":sms" => $sms_count,
                ":id" => $_SESSION['customer_id'],
                )
        );
        if($reduced){
            return 1;
        }
    }
    else{
        return 0;
    }
}

//fetch client id using phonenumber
function getClientIDUsingPhoneNumber($connect, $phone)
{
    $query = "SELECT * FROM clients WHERE phone_number_1 = :p";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ":p"         =>    $phone,
        )
    );
    $result = $statement->fetch();
    return $result['client_id'];
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

//fetch client address
function getClientAddress($connect, $client_id)
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
    return empty($result['residential_address']) ? 'NONE' : $result['residential_address'];
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

function getTotalAmountPaidForProject($connect, $project_id){
    $query = "SELECT SUM(paying_amount) as total_amount_paid FROM payments WHERE project_id = :id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ":id"         =>    $project_id,
        )
    );
    $result = $statement->fetch();
    return $result['total_amount_paid'];
}


function fetchProjectIdUsingTempImgUploadID($connect, $tmp_img_upload_id){
    $query      = "SELECT project_id FROM projects WHERE temp_img_upload_id = :temp_img_upload_id";
    $statement  = $connect->prepare($query);

    $statement->execute(
        array(
            ":temp_img_upload_id" => $tmp_img_upload_id,
        )
    );
    $result = $statement->fetch();
    return $result['project_id'];
}

function hashPassword($password){
    return password_hash($password, PASSWORD_DEFAULT);
}

function fetchCompanyIDUsingName($con, $name){
    $query      = "SELECT id FROM company WHERE name = :n";
    $statement  = $con->prepare($query);

    $statement->execute(
        array(
            ":n" => $name,
        )
    );
    $result = $statement->fetch();
    return $result['id'];
}

?>