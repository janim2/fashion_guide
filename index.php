 <?php  
 session_start();  
 require_once 'database/config.php';

 $message = "";  
 try  
 {  
    //   $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          ':username'       =>     $_POST["username"],  
                          ':password'       =>     $_POST["password"]  
                     )  
                );  
                
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $result = $statement->fetch();
                     $_SESSION["username"] = $_POST["username"];
                     $_SESSION["fullname"] = $_POST["full_name"];
                     $_SESSION['customer_id'] = $result['id'];  
                     header("location:dashboard.php");  
                }  
                else  
                {  
                     $message = '<label>Oops! Your credentials do not match our records</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>




 <!doctype html>
 <html lang="en">

 <head>


     <meta charset="utf-8" />
     <title>Login page</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
     <meta content="Themesdesign" name="author" />
     <!-- App favicon -->
     <link rel="shortcut icon" href="assets/images/favicon.ico">

     <!-- Bootstrap Css -->
     <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
     <!-- Icons Css -->
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <!-- App Css-->
     <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


 </head>


 <body class="authentication-bg bg-primary">
     <div class="home-center">
         <div class="home-desc-center">

             <div class="container">

                 <div class="row justify-content-center">
                     <div class="col-md-8 col-lg-6 col-xl-5">
                         <div class="card">
                             <div class="card-body">
                                 <div class="px-2 py-3">


                                     <div class="text-center">
                                         <!-- <a href="index.html">
                                             <img src="assets/images/logo-dark.png" height="22" alt="logo">
                                         </a> -->
                                         <h5 class="text-primary mb-2 mt-4">Fashion Guide</h5>

                                         <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
                                         <p class="text-muted">Sign in to continue Fashion Guide</p>
                                     </div>

                                     <?php  
                                        if(isset($message))  
                                        {  
                                            echo '<label class="text-danger">'.$message.'</label>';  
                                        }  
                                    ?>
                                     <form method="post">
                                         <div class="mb-3">
                                             <label for="email">Username</label>
                                             <input type="text" class="form-control" id="username" name="username"
                                                 placeholder="Enter username">
                                         </div>

                                         <div class="mb-3">
                                             <label for="password">Password</label>
                                             <input type="password" class="form-control" id="password" name="password"
                                                 placeholder="Enter password">
                                         </div>

                                         <!--      <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customControlInline">
                                                    <label class="form-label"
                                                        for="customControlInline">Remember me</label>
                                                </div>
                                        </div>   -->

                                         <div>
                                             <button class="btn btn-primary w-100 waves-effect waves-light"
                                                 type="submit" id="login" name="login">Log In</button>
                                         </div>

                                         <!--    <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>  -->


                                     </form>


                                 </div>
                             </div>
                         </div>

                         <div class="mt-5 text-center text-white">
                             <p>Don't have an account ?<a href="auth-register.html" class="fw-bold text-white">
                                     Register</a> </p>
                             <p>© <script>
                                     document.write(new Date().getFullYear())
                                 </script> Fashion Guide by <a href="https://sageitservices.com" target="_blank"
                                     class="fw-bold text-white"> SageIT Services</a></p>
                         </div>
                     </div>
                 </div>

             </div>


         </div>
         <!-- End Log In page -->
     </div>

     <!-- JAVASCRIPT -->
     <script src="assets/libs/jquery/jquery.min.js"></script>
     <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="assets/libs/metismenu/metisMenu.min.js"></script>
     <script src="assets/libs/simplebar/simplebar.min.js"></script>
     <script src="assets/libs/node-waves/waves.min.js"></script>

     <script src="assets/js/app.js"></script>

 </body>

 </html>