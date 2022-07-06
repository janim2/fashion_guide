<?php
    require_once '../../helpers/functions.php';

    session_start();
    class ManageMessages{
        public $client_name;
        public $completion_date;
        public $phone;
        public $message;
        public $project_id;

        // function __loginConstruct(){
        //     $this->email     = $_POST['username'];
        //     $this->password  = $_POST['password'];
        // }

        function  __sendInconvenienceConstruct(){
            $this->client_name     = $_POST['client_name'];
            $this->completion_date = $_POST['completion_date'];
            $this->phone           = $_POST['phone'];
            $this->message         = $_POST['message'];
            $this->project_id      = $_POST['project_id'];
        }

        function sendInconvenienceMessage($con){
            sendSms($con, $this->phone,$this->message);
            $this->changeDateofDelivery($con);
            return 1;   
        }

        //CHANGE DATE OF COMPLETION
        function changeDateofDelivery($con){
            $query = "UPDATE projects SET end_date = :edate WHERE project_id = :id";
            $statement = $con->prepare($query);
            $has_changed = $statement->execute(
                array(
                    ":edate" => $this->completion_date,
                    ":id"    => $this->project_id
                )
            );
            // if($has_changed){
            //     return "Message sent successfully";
            // }
        }
    }

?>