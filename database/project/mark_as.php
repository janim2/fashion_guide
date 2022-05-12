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

    if($has_changed)
        echo "Project status changed.";
    else echo "Something went wrong";

    
?>      