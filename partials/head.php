<?php
    session_start();
    if(!isset($_SESSION['customer_id']))
        header('location: index.php');
?>
<!doctype html>
<html lang="en">

<head>

    
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="assets/libs/@fullcalendar/core/main.min.css" type="text/css">
     <link rel="stylesheet" href="assets/libs/@fullcalendar/daygrid/main.min.css" type="text/css">
     <link rel="stylesheet" href="assets/libs/@fullcalendar/bootstrap/main.min.css" type="text/css">
     <link rel="stylesheet" href="assets/libs/@fullcalendar/timegrid/main.min.css" type="text/css">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    
</head>


<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
