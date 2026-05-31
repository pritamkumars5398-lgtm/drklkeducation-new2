<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>NGO | Admin</title>
    <!-- Favicon-->
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('admin/assets/favicon.ico') ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="<?= base_url('admin/assets/css/style.css') ?>">
    <link href="<?= base_url('admin/assets/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('admin/assets/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('admin/assets/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="<?= base_url('admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') ?>" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?= base_url('admin/assets/plugins/dropzone/dropzone.css') ?>" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?= base_url('admin/assets/plugins/multi-select/css/multi-select.css') ?>" rel="stylesheet">



    <!-- Bootstrap Select Css -->
    <link href="<?= base_url('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css') ?>" rel="stylesheet" />

   <!-- JQuery DataTable Css -->
    <link href="<?= base_url('admin/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') ?>" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="<?= base_url('admin/assets/plugins/morrisjs/morris.css') ?>" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?= base_url('admin/assets/css/style.css?v=1.01') ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('admin/assets/css/themes/all-themes.css') ?>" rel="stylesheet" />


    <style>
        /* Dark Theme */
        body.dark-mode {
        background-color: #121212;
        color: #ffffff;
        }

        /* The Icon Button */
        .theme-toggle {
        cursor: pointer;
        font-size: 32px;
        border: none;
        background: none;
        outline: none;
        }
        .add_button{font-size:32px !important;}
    
        .ap_font{font-size:26px;    margin-right: 5px;}
        #project-avg{display:flex;    padding: 10px 0px;}

        .chart-container {
        margin-top: 20px;
        height: 140px;
        }
        /* Tooltip styling override */
        .chartjs-tooltip {
        font-family: 'Roboto', Arial, sans-serif;
        background: #fff;
        color: #333;
        border: 1px solid #eee;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(60,60,60,.12);
        padding: 8px 12px;
        font-size: 0.96rem;
        }

        .mdc-btn {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 10px 24px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        font-family: 'Roboto', Arial, sans-serif;
        font-size: 1.1rem;
        font-weight: 500;
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(24,131,230,0.10);
        transition: background 0.2s;
        }
        .mdc-btn:hover {
        background: #156fd6;
        }
        .mdc-btn .material-icons {
        font-size: 20px;
        margin-right: 8px;
        vertical-align: middle;
        }
        .badge{border-radius:30px;}
    </style>

<!-- test section start -->
<!-- Google Fonts: Roboto for Material look -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">

 
<!-- test section end -->

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">ADMIN - NGO </a>
            </div>

            


            
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">0</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    

