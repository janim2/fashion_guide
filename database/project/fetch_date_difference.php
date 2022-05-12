<?php
    include_once '../../helpers/functions.php';

    $enddate = $_POST['end_date'];
    $startdate = $_POST['start_date'];

    echo daysBetweenDates($enddate, $startdate);
?>