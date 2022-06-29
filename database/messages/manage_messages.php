<?php
    require_once '../../helpers/functions.php';

    session_start();
    class ManageMessages{
        public $client_name;
        public $completion_date;
        public $phone;
        public $message;

        // function __loginConstruct(){
        //     $this->email     = $_POST['username'];
        //     $this->password  = $_POST['password'];
        // }

        function  __sendInconvenienceConstruct(){
            $this->client_name     = $_POST['client_name'];
            $this->completion_date = $_POST['completion_date'];
            $this->phone           = $_POST['phone'];
            $this->message         = $_POST['message'];
        }

        function sendInconvenienceMessage($con){
            sendSms($con, $this->phone,$this->message);
            return 1;
        }
    }

?>