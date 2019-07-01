<?php
error_reporting();
session_start();
include "helper/auth.php";
$auth = new Auth();
$crud = new Crud();

ob_start();
if (empty($_SESSION['sess_user'])) {
    header("location:../index.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sumba Barat G I S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><b>S B D G I S</b></a>
            </div>

            <?php $page = isset( $_GET['p'])?$_GET['p']:""; ?>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-user"></i><b> User : <?= strtoupper($_SESSION['sess_user']['sess_peran']) ?> </b></a>
                    </li>
                    <li class='<?= $page=="view_dashbord"?"active":"" ?>' >
                        <a href="?p=view_dashbord"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <?php if($_SESSION['sess_user']['sess_peran']=="admin"): ?>
                    <h3 class="menu-title">Master</h3><!-- /.menu-title -->
                    <li class='<?= $page=="view_kecamatan"?"active":"" ?>' >
                        <a href="?p=view_kecamatan"> <i class="menu-icon fa fa-map-marker"></i>Kecamatan </a>
                    </li>
                    <li class='<?= $page=="view_jenis_lahan"?"active":"" ?>' >
                        <a href="?p=view_jenis_lahan"> <i class="menu-icon fa fa-tags"></i>Jenis Lahan Panen </a>
                    </li>
                    <?php endif ?>

                    <h3 class="menu-title">Transaksi</h3><!-- /.menu-title -->
                    <?php if($_SESSION['sess_user']['sess_peran']=="admin"): ?>
                    <li class='<?= $page=="view_kelompok_tani"?"active":"" ?>' >
                        <a href="?p=view_kelompok_tani"> <i class="menu-icon fa fa-users"></i>Kelompok Tani </a>
                    </li>
                    <?php endif ?>
                    <li class='<?= $page=="view_pemetaan"?"active":"" ?>' >
                        <a href="?p=view_pemetaan"> <i class="menu-icon fa fa-map-o"></i>Hasil Panen Dan Pemetaan </a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks" style="margin-top:10px"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>

                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>

                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <a href="../logout.php" class="pull-right" style="color:red;margin-top:8px">
                        <i class="fa fa-power-off"></i> Keluar
                    </a>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        <!-- <hr> -->
        <p style="margin-top:-12px"></p>

        <?php

        if($page){

            if($page == "view_dashbord"){
                include "dashbord/view.php";

            }elseif ($page == "view_kecamatan") {
                include "m_kecamatan/view.php";
            }elseif ($page == "add_kecamatan") {
                include "m_kecamatan/add_form.php";
            }elseif ($page == "edit_kecamatan") {
                include "m_kecamatan/edit_form.php";
            }elseif ($page == "delete_kecamatan") {
                include "m_kecamatan/delete.php";
            }


            elseif ($page == "view_jenis_lahan") {
                include "m_jenis_lahan/view.php";
            }elseif ($page == "add_jenis_lahan") {
                include "m_jenis_lahan/add_form.php";
            }elseif ($page == "edit_jenis_lahan") {
                include "m_jenis_lahan/edit_form.php";
            }elseif ($page == "delete_jenis_lahan") {
                include "m_jenis_lahan/delete.php";
            }


            elseif ($page == "view_kelompok_tani") {
                include "m_kelompok_tani/view.php";
            }elseif ($page == "add_kelompok_tani") {
                include "m_kelompok_tani/add_form.php";
            }elseif ($page == "edit_kelompok_tani") {
                include "m_kelompok_tani/edit_form.php";
            }elseif ($page == "delete_kelompok_tani") {
                include "m_kelompok_tani/delete.php";
            }

            elseif ($page == "view_pemetaan") {
                include "t_pemetaan/view.php";
            }elseif ($page == "add_pemetaan") {
                include "t_pemetaan/add_form.php";
            }




        }else{
            include "dashbord/view.php";
        }

        ?>
        </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- custom -->
    <script src="../assets/js/widgets.js"></script>

    <!-- datatabel -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>

</body>

</html>
