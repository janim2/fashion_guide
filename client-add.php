

<?php
   // session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    require_once 'helpers/functions.php';
    
   // sendSms("0554368510", "hello");
    $customer_id = $_SESSION['customer_id'];

   //$title = "add client";
    $response = "";

    if(isset($_POST['add_client_btn'])){
        $full_name                          = $_POST["full_name"];
        $phone_number_1                     = $_POST["phone_number_1"];
        $phone_number_2                     = $_POST["phone_number_2"];
        $residential_address                = $_POST["residential_address"];
        $email                              = $_POST["email"];
        $gender                             = $_POST["gender"];
        $male_trouser_waist                 = $_POST["male_trouser_waist"];
        $male_trouser_seat                  = $_POST["male_trouser_seat"];
        $male_trouser_thigh                 = $_POST["male_trouser_thigh"];
        $male_trouser_knee                  = $_POST["male_trouser_knee"];
        $male_trouser_bass                  = $_POST["male_trouser_bass"];
        $male_trouser_lenght                = $_POST["male_trouser_lenght"];
        $male_shirt_chest                   = $_POST["male_shirt_chest"];
        $male_shirt_back                    = $_POST["male_shirt_back"];
        $male_shirt_short_sleeve            = $_POST["male_shirt_short_sleeve"];
        $male_shirt_long_sleeve             = $_POST["male_shirt_long_sleeve"];
        $male_shirt_around_arm              = $_POST["male_shirt_around_arm"];
        $male_shirt_cuff                    = $_POST["male_shirt_cuff"];
        $male_shirt_lenght                  = $_POST["male_shirt_lenght"];
        $male_agbada_back                   = $_POST["male_agbada_back"];
        $male_agbada_length                 = $_POST["male_agbada_length"];
        $female_skirt_waist                 = $_POST["female_skirt_waist"];
        $female_skirt_hip                   = $_POST["female_skirt_hip"];
        $female_skirt_knee                  = $_POST["female_skirt_knee"];
        $female_skirt_waist_hip             = $_POST["female_skirt_waist_hip"];
        $female_skirt_waist_knee            = $_POST["female_skirt_waist_knee"];
        $female_skirt_skirt_lenght          = $_POST["female_skirt_skirt_lenght"];
        $female_dress_bust                  = $_POST["female_dress_bust"];
        $female_dress_under_bust            = $_POST["female_dress_under_bust"];
        $female_dress_waist                 = $_POST["female_dress_waist"];
        $female_dress_shoulder              = $_POST["female_dress_shoulder"];
        $female_dress_shoulder_nipple       = $_POST["female_dress_shoulder_nipple"];
        $female_dress_shoulder_under_bust   = $_POST["female_dress_shoulder_under_bust"];
        $female_dress_shoulder_waist        = $_POST["female_dress_shoulder_waist"];
        $female_dress_nipple_nipple         = $_POST["female_dress_nipple_nipple"];
        $female_dress_shoulder_hip          = $_POST["female_dress_shoulder_hip"];
        $female_dress_shoulder_knee         = $_POST["female_dress_shoulder_knee"];
        $female_dress_top_lenght            = $_POST["female_dress_top_lenght"];
        $female_dress_lenght                = $_POST["female_dress_lenght"];
        $female_trouser_waist               = $_POST["female_trouser_waist"];
        $female_trouser_seat                = $_POST["female_trouser_seat"];
        $female_trouser_thigh               = $_POST["female_trouser_thigh"];
        $female_trouser_knee                = $_POST["female_trouser_knee"];
        $female_trouser_bass                = $_POST["female_trouser_bass"];
        $female_trouser_lenght              = $_POST["female_trouser_lenght"];
       
        
         $query = "INSERT INTO clients(customer_id, full_name, phone_number_1, phone_number_2, residential_address,email, gender, male_trouser_waist, male_trouser_seat, male_trouser_thigh, male_trouser_knee, male_trouser_bass, male_trouser_lenght, male_shirt_chest, male_shirt_back, male_shirt_short_sleeve, male_shirt_long_sleeve, male_shirt_around_arm, male_shirt_cuff, male_shirt_lenght, male_agbada_back, male_agbada_length, female_skirt_waist,female_skirt_hip, female_skirt_knee, female_skirt_waist_hip, female_skirt_waist_knee, female_skirt_skirt_lenght, female_dress_bust, female_dress_under_bust, female_dress_waist, female_dress_shoulder, female_dress_shoulder_nipple, female_dress_shoulder_under_bust, female_dress_shoulder_waist, female_dress_nipple_nipple, female_dress_shoulder_hip, female_dress_shoulder_knee, female_dress_top_lenght, female_dress_lenght, female_trouser_waist, female_trouser_seat, female_trouser_thigh, female_trouser_knee, female_trouser_bass, female_trouser_lenght)
            VALUES(:customer_id, :full_name, :phone_number_1, :phone_number_2, :residential_address, :email, :gender, :male_trouser_waist, :male_trouser_seat, :male_trouser_thigh, :male_trouser_knee, :male_trouser_bass, :male_trouser_lenght, :male_shirt_chest, :male_shirt_back, :male_shirt_short_sleeve, :male_shirt_long_sleeve, :male_shirt_around_arm, :male_shirt_cuff, :male_shirt_lenght, :male_agbada_back, :male_agbada_length, :female_skirt_waist, :female_skirt_hip, :female_skirt_knee, :female_skirt_waist_hip, :female_skirt_waist_knee, :female_skirt_skirt_lenght, :female_dress_bust, :female_dress_under_bust, :female_dress_waist, :female_dress_shoulder, :female_dress_shoulder_nipple, :female_dress_shoulder_under_bust, :female_dress_shoulder_waist, :female_dress_nipple_nipple, :female_dress_shoulder_hip, :female_dress_shoulder_knee, :female_dress_top_lenght, :female_dress_lenght, :female_trouser_waist, :female_trouser_seat, :female_trouser_thigh, :female_trouser_knee, :female_trouser_bass, :female_trouser_lenght)";
        $statement = $connect->prepare($query);

        // looking for the presence of client same phone-number-1
        $count_query = "SELECT * FROM clients WHERE customer_id = :customer_id AND full_name = :full_name AND phone_number_1 = :phone_number_1 AND phone_number_2 = :phone_number_2";
        $count_statement = $connect->prepare($count_query);
        $count_statement->execute(
            array(
                ":customer_id"      =>  $customer_id,
                ":full_name"        =>  $full_name,
                ":phone_number_1"   =>  $phone_number_1,
                ":phone_number_2"   =>  $phone_number_2,

            )
        );
        $counter = $count_statement->rowCount();
        if($counter == 0){
            $has_added = $statement->execute(
                array(
                    ":customer_id"                      => $customer_id,
                    ":full_name"                        => $full_name,
                    ":phone_number_1"                   => $phone_number_1,    
                    ":phone_number_2"                   => $phone_number_2,    
                    ":residential_address"              => $residential_address,
                    ":email"                            => $email,  
                    ":gender"                           => $gender,
                    ":male_trouser_waist"               => $male_trouser_waist,
                    ":male_trouser_seat"                => $male_trouser_seat,
                    ":male_trouser_thigh"               => $male_trouser_thigh,
                    ":male_trouser_knee"                => $male_trouser_knee,
                    ":male_trouser_bass"                => $male_trouser_bass,
                    ":male_trouser_lenght"              => $male_trouser_lenght,
                    ":male_shirt_chest"                 => $male_shirt_chest,
                    ":male_shirt_back"                  => $male_shirt_back,
                    ":male_shirt_short_sleeve"          => $male_shirt_short_sleeve,
                    ":male_shirt_long_sleeve"           => $male_shirt_long_sleeve,
                    ":male_shirt_around_arm"            => $male_shirt_around_arm,
                    ":male_shirt_cuff"                  => $male_shirt_cuff, 
                    ":male_shirt_lenght"                => $male_shirt_lenght,
                    ":male_agbada_back"                 => $male_agbada_back,
                    ":male_agbada_length"               => $male_agbada_length,
                    ":female_skirt_waist"               => $female_skirt_waist,
                    ":female_skirt_hip"                 => $female_skirt_hip,
                    ":female_skirt_knee"                => $female_skirt_knee,
                    ":female_skirt_waist_hip"           => $female_skirt_waist_hip,
                    ":female_skirt_waist_knee"          => $female_skirt_waist_knee,
                    ":female_skirt_skirt_lenght"        => $female_skirt_skirt_lenght,
                    ":female_dress_bust"                => $female_dress_bust,
                    ":female_dress_under_bust"          => $female_dress_under_bust,
                    ":female_dress_waist"               => $female_dress_waist,
                    ":female_dress_shoulder"            => $female_dress_shoulder,
                    ":female_dress_shoulder_nipple"     => $female_dress_shoulder_nipple,
                    ":female_dress_shoulder_under_bust" => $female_dress_shoulder_under_bust,
                    ":female_dress_shoulder_waist"      => $female_dress_shoulder_waist,
                    ":female_dress_nipple_nipple"       => $female_dress_nipple_nipple,
                    ":female_dress_shoulder_hip"        => $female_dress_shoulder_hip,
                    ":female_dress_shoulder_knee"       => $female_dress_shoulder_knee,
                    ":female_dress_top_lenght"          => $female_dress_top_lenght,
                    ":female_dress_lenght"              => $female_dress_lenght,
                    ":female_trouser_waist"             => $female_trouser_waist,
                    ":female_trouser_seat"              => $female_trouser_seat,
                    ":female_trouser_thigh"             => $female_trouser_thigh,
                    ":female_trouser_knee"              => $female_trouser_knee,
                    ":female_trouser_bass"              => $female_trouser_bass,
                    ":female_trouser_lenght"            => $female_trouser_lenght,    
                )
            );

            if($has_added){
               sendSms($phone_number_1, "Welcome $full_name to Fashion Guide. We are happy with your interest to do business with us.  Helpline: 0274756446.");

                //sendSms($_POST['phone_number_1'], 'Welcome $full_name to Fashion Guide. We are happy with your interest to do business with us.  Helpline: 0274756446.');

                $response = "<div class='alert alert-success text-center' role='alert'>Client has been added successfully</div>";
            }
            else{
                $response = "<div class='alert alert-danger text-center' role='alert'>" + $has_added + "</div>";
            }
        }
        else{
            $response = "<div class='alert alert-danger text-center' role='alert'>Client already exists</div>";
        }
        
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
                                        <h4>Client Form</h4> 
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="account.html">Clients</a></li>
                                             <li class="breadcrumb-item active">Add Client</li>
                                         </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">
                        <div class="page-content-wrapper">
                            

                        <?php include_once 'includes/-add-client.php';?>        
                           
                        </div> <!-- container-fluid -->
                    </div> <!-- End Page-content -->



<?php require_once 'partials/footer.php';?>




<script>
    $(".male_layout").hide();
    $(".female_layout").hide();
    $(".add-buttons").hide();
    //showing the corresponding gender measurement form
    $('#gender').on('change', function() {
        if (this.value == "male") {
            $('.male_layout').show();
            $('.female_layout').hide();
            $(".add-buttons").show();
        }else if(this.value == "female"){
            $('.male_layout').hide();
            $('.female_layout').show();
            $(".add-buttons").show();
        } 
        else {
            $(".male_layout").hide();
            $(".female_layout").hide();
            $(".add-buttons").hide();
        } 
    });

   
</script>


