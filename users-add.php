 <?php session_start();
    require_once 'partials/header.php';
    require_once 'database/config.php';
    include_once 'helpers/counter_functions.php';

    $customer_id = $_SESSION['customer_id'];
    


   //$title = "add users";
    $response = "";

    if(isset($_POST['add_users_btn'])){
        $full_name             = $_POST["full_name"];
        $phone_number          = $_POST["phone_number"];
        $username                 = $_POST["username"];
        $password              = $_POST["password"];
        $role                  = $_POST["role"];
       
              


         $query = "INSERT INTO users(full_name, phone_number, username, password, role)
            VALUES(:full_name, :phone_number, :username, :password, :role)";
        $statement = $connect->prepare($query);

        // looking for the presence of users
        $count_query = "SELECT * FROM users WHERE phone_number = :phone_number AND username = :username AND role = :role";
        $count_statement = $connect->prepare($count_query);
        $count_statement->execute(
            array(
                ":phone_number"     =>  $phone_number,
                ":username"            =>  $username,
                ":role"             =>  $role,

            )
        ); 
        $counter = $count_statement->rowCount();
        if($counter == 0){
            $has_added = $statement->execute(
                array(
                   // ":customer_id"         => '1',
                    ":full_name"             => $full_name,
                    ":phone_number"          => $phone_number,    
                    ":username"                 => $username,    
                    ":password"              => $password,
                    ":role"                  => $role,
                    //":added_by"                         => $
                    //":created_on"                       => $
                    //":updated_on"                       => $
                    
                    // ":created_by"                     =>  $_SESSION['username'],
                    // ":the_date"                       =>  date('Y-m-d H:i:s'), 
                     
                )
            );

            if($has_added){
                $response = "<div class='alert alert-success text-center' role='alert'>User has been added successfully</div>";
                
            }
            else{
                $response = "<div class='alert alert-danger text-center' role='alert'>" + $has_added + "</div>";
            }
        }
        else{
            $response = "<div class='alert alert-danger text-center' role='alert'>User already exists</div>";
        }
        
    }

            
?> 

            
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h4>Users</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                             <li class="breadcrumb-item active">Add Users</li>
                                         </ol>
                                 </div>
                             </div>
                             
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    


                    <div class="container-fluid">

                        <div class="page-content-wrapper">

                        


    
                            <?php include_once 'includes/-add-users.php';?>        
                                
    
                           
    
                           

                        </div>
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

              
                


 <?php include_once 'partials/footer.php'; ?>


 
