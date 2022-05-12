<?php
    include_once '../../helpers/functions.php';
    require_once '../config.php';

    $project_id = $_POST['id'];

    $query = "DELETE FROM projects WHERE project_id = :id";
    $statement = $connect->prepare($query);
    $has_changed = $statement->execute(
        array(
            ":id" => $project_id,
        )
    );

    if($has_changed)
        echo "Project deleted.";
    else echo "Something went wrong";

?>