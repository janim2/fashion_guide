<?php
    ini_set('display_errors', '0');

   // session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    require_once 'helpers/functions.php';
    
   // sendSms("0554368510", "hello");
    $customer_id = $_SESSION['customer_id'];

   //$title = "add client";
    $response = "";

    if(isset($_POST['send_sms_bk'])){
        // echo "Working";
        $client          = $_POST["client"];
        $message         = $_POST["message"];
        $clientPhone     = getClientNumber($connect, $client);
        sendSMS($connect, $clientPhone, $message);
        // $response = "<div class='alert alert-danger text-center' role='alert'>" + $has_added + "</div>";
        $response = "<div class='alert alert-success text-center' role='alert'>SMS Sent</div>";
    }
?>

<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Send SMS</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="sms_records.php">SMS</a></li>
                                <li class="breadcrumb-item active">Send SMS</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">


                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Send SMS <?= $response; ?></h4>
                                <hr class="mb-3">
                                <form method="POST" id="sms_form" enctype="multipart/form-data" action="sms-add.php">

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Client</label>
                                        <?php
                                            if(isset($_GET['sendToID'])){?>
                                                <div class="col-sm-10">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="client" id="client" required>
                                                        <option value="<?=$_GET['sendToID'] ?>">
                                                            <?= getClientName($connect, $_GET['sendToID']) ?> --
                                                            <?= getClientNumber($connect, $_GET['sendToID']) ?></option>
                                                    </select>
                                                </div>
                                            <?php
                                            }
                                            else{?>
                                                <div class="col-sm-10">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="client" id="client" required>
                                                        <option></option>
                                                        <?php
                                                            $query = "SELECT * FROM projects WHERE customer_id = :customer_id";
                                                            $statement = $connect->prepare($query);
                                                            $statement->execute(
                                                                array(
                                                                    ':customer_id' => $_SESSION['customer_id']
                                                                )
                                                            );
                                                            $count = $statement->rowCount();
                                                            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                            if ($count > 0 && !empty($rows)) {
                                                                foreach ($rows as $result){?>

                                                        <option value="<?=$result['client'] ?>">
                                                            <?= getClientName($connect, $result['client']) ?> --
                                                            <?= getClientNumber($connect, $result['client']) ?></option>
                                                        <?php 
                                                            }
                                                                ?>
                                                        <?php
                                                            }?>

                                                    </select>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        


                                    </div>


                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">
                                            Message
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" type="text" placeholder="" id="message"
                                                name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row add-buttons">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label"></label>
                                                        <div class="col-sm-8">
                                                            <div class="button-items">
                                                                <input type="hidden" name="action" id="client_action">
                                                                <input type="hidden" name="id" id="client_id">
                                                                <button type="submit" id="send_sms_bk"
                                                                    name="send_sms_bk"
                                                                    class="btn btn-outline-success waves-effect waves-light">Send
                                                                    SMS</button>
                                                                <a href="sms_records.php"
                                                                    class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Page-content -->



        <?php require_once 'partials/footer.php';?>