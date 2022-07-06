<?php
    require_once '../config.php';
    require_once 'manage_auth.php';

    session_start();

    //REDUCE THE VALIDITY PERIOD
    $query = "UPDATE company SET validity = validity - 1 WHERE validity <> 0";
    $statement = $connect->prepare($query);

    $statement->execute();

    //CHECK IF THE VALIDITY PERIOD IS 0, THEN LOG USER OUT
    if(isset($_SESSION['customer_id'])){
        $select_query = "SELECT validity FROM company WHERE id = :id";
        $select_statement = $connect->prepare($select_query);
        $select_statement->execute(
            array(
                ":id" => $_SESSION['customer_id'],
            )
        );
        $select_result = $select_statement->fetch();
        if($select_result['validity'] == 0){
            $logout = new ManageAccounts();
            // $logout->__loginConstruct();
            echo $logout->Logout();
        }
    }
    
?>