 <?php 
    ini_set('display_errors', '0');

    session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';
    include_once 'helpers/functions.php';

    $customer_id = $_SESSION['customer_id'];
    
    $response = "";

    if(isset($_POST['add_project_btn'])){
        $client                        = $_POST["client"];
        $type_of_work                  = $_POST["type_of_work"];
        $description                   = $_POST["description"];
        $type_of_fabric                = $_POST["type_of_fabric"];
        $sewing_charges                = $_POST["sewing_charges"];
        $delivery_charges              = $_POST["delivery_charges"];
        $project_cost                  = $_POST["project_cost"];
        $advance_payment               = $_POST["advance_payment"];
        $balance                       = $_POST["balance"];
        $start_date                    = $_POST["start_date"];
        $end_date                      = $_POST["end_date"];
        $days_to_complete              = $_POST["days_to_complete"];
        $mode_of_delivery              = $_POST["mode_of_delivery"];
        $delivery_location             = $_POST["delivery_location"];
        $added_by                      = $_POST["added_by"];

        $temp_img_upload_id            = random_int(10, 999999);


         $query = "INSERT INTO projects(customer_id, client, type_of_work, description, type_of_fabric, sewing_charges, delivery_charges, project_cost, advance_payment, balance, start_date, end_date, days_to_complete, mode_of_delivery, delivery_location, temp_img_upload_id, added_by)
            VALUES(:customer_id, :client, :type_of_work, :description, :type_of_fabric, :sewing_charges, :delivery_charges, :project_cost,  :advance_payment, :balance, :start_date, :end_date, :days_to_complete, :mode_of_delivery, :delivery_location, :tmp_img_upload_id, :added_by)";
        $statement = $connect->prepare($query);

        // looking for the presence of client same phone-number-1
        $count_query = "SELECT * FROM projects WHERE client = :client AND advance_payment = :advance_payment AND start_date = :start_date AND days_to_complete = :days_to_complete";
        $count_statement = $connect->prepare($count_query);
        $count_statement->execute(
            array(
                ":client"                   =>  $client,
                ":advance_payment"          =>  $advance_payment,
                ":start_date"               =>  $start_date,
                ":days_to_complete"         =>  $days_to_complete,

            )
        ); 
        $counter = $count_statement->rowCount();
        if($counter == 0){
            $has_added = $statement->execute(
                array(
                    ":customer_id"                   => $customer_id,
                    ":client"                        => $client,
                    ":type_of_work"                  => $type_of_work,    
                    ":description"                   => $description,    
                    ":type_of_fabric"                => $type_of_fabric,
                    ":sewing_charges"                => $sewing_charges,
                    ":delivery_charges"              => $delivery_charges,
                    ":project_cost"                  => $project_cost,
                    ":advance_payment"               => $advance_payment,    
                    ":balance"                       => $balance,    
                    ":start_date"                    => $start_date,
                    ":end_date"                      => $end_date,
                    ":days_to_complete"              => $days_to_complete,    
                    ":mode_of_delivery"              => $mode_of_delivery,    
                    ":delivery_location"             => $delivery_location,
                    ":tmp_img_upload_id"             => $temp_img_upload_id,
                    ":added_by"                      => $added_by,
                     
                )
            );

            if($has_added){
                //upload images if any
                if($_FILES["files"]){
                    upload_images($connect, fetchProjectIdUsingTempImgUploadID($connect, $temp_img_upload_id));
                }
                $client_number = getClientNumber($connect, $client);
                $client_name = getClientName($connect, $client);
                sendSms($connect, $client_number, "Hi $client_name, your $type_of_work work has been added to our list of ongoing projects and expected to start on $start_date. Sewing Cost is GHS $sewing_charges, Delivery Cost is GHS $delivery_charges. Total project cost is GHS $project_cost, Advance payment made is GHS $advance_payment, Balance GHS $balance. Your $type_of_work will be completed in $days_to_complete. Helpline: 0274756446.");
                $response = "<div class='alert alert-success text-center' role='alert'>Project has been added successfully added</div>";
                
            }
            else{
                $response = "<div class='alert alert-danger text-center' role='alert'>" + $has_added + "</div>";
            }
        }
        else{
            $response = "<div class='alert alert-danger text-center' role='alert'>Project already exists</div>";
        }
        
    }

    function upload_images($connect, $post_id){
        extract($_POST);
        $error=array();

        $txtGalleryName = "fabric";
        $images_array = array();

        $img_path = "assets/images/";

        $extension=array("jpeg","jpg","png","gif");
        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
            $file_name=$_FILES["files"]["name"][$key];
            $file_tmp=$_FILES["files"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);

            if(in_array($ext,$extension)) {
                if(!file_exists($img_path.$txtGalleryName."/".$file_name)) {
                    move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$img_path.$txtGalleryName."/".$file_name);
                    // echo $file_name;
                    // array_push($images_array, $file_name);
                    SaveToImagesDatabase($connect, $post_id, $file_name);
                }
                else {
                    $filename=basename($file_name,$ext);
                    $newFileName=$filename.time().".".$ext;
                    move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$img_path.$txtGalleryName."/".$newFileName);
                    // echo $file_name;
                    // array_push($images_array, $file_name);
                    SaveToImagesDatabase($connect, $post_id, $file_name);
                }
            }
            else {
                array_push($error,"$file_name, ");
            }
        }
    }

    function SaveToImagesDatabase($connect, $id, $file_name){
        $query = "INSERT INTO fabric_images(project_id, image_url) VALUES(:project_id, :image_url)";
            $statement = $connect->prepare($query);
            $result = $statement->execute(
                array(
                    ":project_id"   => $id,
                    ":image_url"    => $file_name,
                )
            );

            if($result){
                // echo "success";
            }
            else{
                echo "Something went wrong";
            }
    }

            
?>    

            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h4>Project</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
                                             <li class="breadcrumb-item active">Add Project</li>
                                         </ol>
                                 </div>
                             </div>
                             
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">

                        <div class="page-content-wrapper">

                        <p id="countdown"></p>

                           <?php include_once 'includes/-add-project.php';?>
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

 <?php include_once 'partials/footer.php'; ?>

<script>
    $('#start_date').on('change', function() {
        $.ajax({
            url: "database/project/fetch_date_difference.php",
            method: "POST",
            data: {
                "end_date" : $('#end_date').val(),
                "start_date" : $('#start_date').val(),
            },
            success: function(data) {
                if(data > 0){
                    $('#days_to_complete').val(data)
                }else{
                    $('#days_to_complete').val("0")
                }
            },
        });
    });
    $('#end_date').on('change', function() {
        $.ajax({
            url: "database/project/fetch_date_difference.php",
            method: "POST",
            data: {
                "end_date" : $('#end_date').val(),
                "start_date" : $('#start_date').val(),
            },
            success: function(data) {
                if(data > 0){
                    $('#days_to_complete').val(data)
                }else{
                    $('#days_to_complete').val("0")
                }
            },
        });
    });

</script>
<script type="text/javascript">

    //Add Sewing & Delivery Cost
    function addSewingAndDeliveryCharges() {
        var sewingCharges = document.getElementById('sewing_charges').value;
        var deliveryCharges = document.getElementById('delivery_charges').value;
        var result = parseInt(sewingCharges) + parseInt(deliveryCharges);
        if (!isNaN(result)) {
            document.getElementById('project_cost').value = result;
        }
    }


    //calculate balance 
     function subtractGetBalance() {
            var projectCost = document.getElementById('project_cost').value;
            var advancePayment = document.getElementById('advance_payment').value;
            var result = parseInt(projectCost) - parseInt(advancePayment);
            if (!isNaN(result) && result > 0) {
                document.getElementById('balance').value = result;
            }else{
                document.getElementById('balance').value = 0;
            }
        }

</script>


