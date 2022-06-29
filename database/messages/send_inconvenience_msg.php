<?php
    require_once '../config.php';
    require_once 'manage_messages.php';

    $inconMessage = new ManageMessages();
    $inconMessage->__sendInconvenienceConstruct();
    echo $inconMessage->sendInconvenienceMessage($connect);