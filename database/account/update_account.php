<?php
    require_once '../config.php';
    require_once 'manage_account.php';

    $update = new ManageAccount();
    $update->__updateConstruct();
    echo $update->UpdateInfo($connect);