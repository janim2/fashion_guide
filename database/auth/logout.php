<?php
    require_once '../config.php';
    require_once 'manage_auth.php';

    $logout = new ManageAccounts();
    // $logout->__loginConstruct();
    echo $logout->Logout();