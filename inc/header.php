<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $website['website_name'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">


    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">

</head>

<body class="layout-4">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['fullname'] ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">


                            <div class="dropdown-divider"></div>
                            <a href="index.php?logout" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Start main left sidebar menu -->
            <div class="main-sidebar sidebar-style-3">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index-2.html">Dreamer</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index-2.html">DR</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-link">
                            <a href="index.php?page=dashboard&type=view" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>

                        </li>
                        <li class="menu-header">Utilities</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Categories</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="index.php?page=category&type=view">View</a></li>

                                <li><a class="nav-link" href="index.php?page=category&type=add">Add More</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Inventory</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="index.php?page=inventory&type=view">Manage Items</a></li>
                                <li><a class="nav-link" href="index.php?page=inventory&type=add">Add Items</a></li>
                                <li><a class="nav-link" href="index.php?page=invoices&type=view">Invoices</a></li>


                            </ul>
                        </li>


                    </ul>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://codewithtaha.rf.gd" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Developer</a>
                    </div>
                </aside>
            </div>