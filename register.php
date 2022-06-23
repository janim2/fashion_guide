<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>Register|Fashion System</title>
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


<body class="authentication-bg"
    style="background:url(https://previews.123rf.com/images/olganiki/olganiki1505/olganiki150500013/39686603-marco-copyspace-con-herramientas-de-costura-y-accesorios-en-el-fondo-de-madera-blanca.jpg) no-repeat center center; background-size: cover;">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="/" class="text-white router-link-active"><i
                            class="fas fa-home h2"></i></a></div>


                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <span>
                                            <img src="assets/images/SAGEIT.png" height="90" alt="logo">
                                        </span>

                                        <div class="card border-start border-primary bg-light">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <h3 class="mt-4 ps-2">GHS 350.00 <br /><span
                                                            class="text-primary">Annually</span></h3>

                                                </div>

                                                <div class="price-box">
                                                    <h5 class="text-primary mb-2 mt-4">Fashion System</h5>
                                                    <p class="text-muted mb-0" style="text-align: left;">Digitilize all
                                                        your day-to-day operations and access all your information
                                                        anywhere with ease.
                                                        <br />
                                                        <small>Newly created accounted are actived within 10 minutes.
                                                            Call or WhatsApp support on +233 54 880 1288 for quick
                                                            Activation. Payment before activation. </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form id="register_form">
                                        <div class="mb-3">
                                            <input type="text-muted" class="form-control" id="company_name"
                                                name="company_name" placeholder="Company Name" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="company_location"
                                                name="company_location" placeholder="Company Location" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="admin_name" name="admin_name"
                                                placeholder="Admin Full Name" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Company Or Admin Email" required>
                                            <span style="color: red;">This will be used email for Logins</span>
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="repeat_password"
                                                name="repeat_password" placeholder="Repeat password" required>
                                        </div>

                                        <div class="mt-4">
                                            <button
                                                class="btn btn-primary w-100 waves-effect waves-light loading">Register</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the SageIT Services <a href="#"
                                                    class="text-primary">Terms of Use</a></p>
                                            <p>Already have an account ? <a href="index.php" class="fw-bold"> Login </a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>
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
        $(document).on('submit', '#register_form', function (event) {
            event.preventDefault();
            return submitFormQuery(this, "database/auth/register.php", ".loading", "Registration Successfully",
                "register");
        });
    </script>

</body>

</html>