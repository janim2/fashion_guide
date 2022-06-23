 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <title>Login|Fashion System </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="Fashion System" name="description" />
     <meta content="Fashion System " name="SageIT Services" />
     <!-- App favicon -->
     <link rel="shortcut icon" href="assets/images/favicon.ico">

     <!-- Bootstrap Css -->
     <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
     <!-- Icons Css -->
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <!-- App Css-->
     <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
 </head>


 <body class="authentication-bg"
     style="background:url(https://previews.123rf.com/images/olganiki/olganiki1505/olganiki150500013/39686603-marco-copyspace-con-herramientas-de-costura-y-accesorios-en-el-fondo-de-madera-blanca.jpg) no-repeat center center; background-size: cover;">
     <div class="home-center">
         <div class="home-desc-center">

             <div class="container">

                 <div class="row justify-content-center">
                     <div class="col-md-8 col-lg-6 col-xl-5">
                         <div class="card">
                             <div class="card-body">
                                 <div class="px-2 py-3">


                                     <div class="text-center">
                                         <span>
                                             <img src="assets/images/SAGEIT.png" height="100" alt="logo">
                                         </span>

                                         <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
                                     </div>

                                     <form id="login_form">
                                         <div class="mb-3">
                                             <label for="email">Username/Email</label>
                                             <input type="text" class="form-control" id="username" name="username"
                                                 placeholder="Enter username">
                                         </div>

                                         <div class="mb-3">
                                             <label for="password">Password</label>
                                             <input type="password" class="form-control" id="password" name="password"
                                                 placeholder="Enter password">
                                         </div>

                                         <div>
                                             <button class="btn btn-primary w-100 waves-effect waves-light loading"
                                                 type="submit" id="login" name="login">Log In</button>
                                         </div>

                                         <div class="mt-4 text-center">
                                             <a href="register.php" class=" mdi mdi-account me-1 text-primary"><b
                                                     class=""> Create Account</b> </a>
                                         </div>

                                         <!--    <div class="mt-4 text-center">
                                            <a href="register.php" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div> -->
                                     </form>


                                 </div>
                             </div>
                         </div>

                         <div class="mt-5 text-center text-primary">
                             <p>© <script>
                                     document.write(new Date().getFullYear())
                                 </script> Fashion System<a href="https://sageitservices.com" target="_blank"
                                     class="fw-bold text-primary"> SageIT Services</a></p>
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

     <?php require_once 'helpers/sweet_alert.php'; ?>
     <script src="helpers/submittion_helper.js"></script>
     <script>
         $(document).on('submit', '#login_form', function (event) {
             event.preventDefault();
             return submitFormQuery(this, "database/auth/login.php", ".loading", "Login Successfully",
                 "login");
         });
     </script>
 </body>

 </html>