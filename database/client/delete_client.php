<?php
    include_once '../../helpers/functions.php';
    require_once '../config.php';

    $client_id = $_POST['id'];

    $query = "DELETE FROM clients WHERE client_id = :id";
    $statement = $connect->prepare($query);
    $has_changed = $statement->execute(
        array(
            ":id" => $client_id,
        )
    );

    if($has_changed)
        echo "Client deleted.";
    else echo "Something went wrong";

?>