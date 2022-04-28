<?php

//total clients
   function count_total_clients($connect, $_customerId){
        $clientcount_query = $connect->prepare("SELECT COUNT(1) AS total_clients FROM 
        clients 
        WHERE customer_id = :customer_id");

        $clientcount_query->execute(array(":customer_id" => $_customerId));
        $clients = $clientcount_query->fetch();

        return $clients['total_clients'];
   }

   function countGender($connect, $_customerId, $gender){
     $query = "SELECT * FROM clients WHERE gender = :g AND customer_id = :id";
     $statement = $connect->prepare($query);
     $statement->execute(
          array(
               ":g" => $gender,
               ":id" => $_customerId
          )
     );
     $count = $statement->rowCount();
     return $count;
   }


   function count_total_users($connect, $_customerId){
        $userscount_query = $connect->prepare("SELECT COUNT(1) AS total_users FROM 
        users 
        WHERE id = :customer_id");

        $userscount_query->execute(array(":customer_id" => $_customerId));
        $users = $userscount_query->fetch();

        return $users['total_users'];
   }

   function count_total_projects($connect, $_customerId, $status){
        $query = "SELECT * FROM projects WHERE status = :s AND customer_id = :id";
        $statement = $connect->prepare($query);
        $statement->execute(
             array(
                  ":s" => $status,
                  ":id" => $_customerId
             )
        );
        $count = $statement->rowCount();
        return $count; 
   }

   function total_project_costs($connect, $_customerId){
          $query = "SELECT SUM(project_cost) as total FROM projects WHERE status <> 2 AND customer_id = :id";
          $statement = $connect->prepare($query);
          $statement->execute(
               array(
                    ":id" => $_customerId
               )
          );
          $result = $statement->fetch();
          return $result['total']; 
     }


function total_delivery_costs($connect, $_customerId){
     $query = "SELECT SUM(delivery_charges) as total FROM projects WHERE status <> 2 AND customer_id = :id";
     $statement = $connect->prepare($query);
     $statement->execute(
          array(
               ":id" => $_customerId
          )
     );
     $result = $statement->fetch();
     return $result['total']; 
}

function outstanding_balance($connect, $_customerId){
     $query = "SELECT SUM(balance) as total FROM projects WHERE customer_id = :id";
     $statement = $connect->prepare($query);
     $statement->execute(
          array(
               ":id" => $_customerId
          )
     );
     $result = $statement->fetch();
     return $result['total'];
}



?>

