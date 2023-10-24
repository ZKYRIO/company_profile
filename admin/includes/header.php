<?php
include './../koneksi/koneksi.php';
session_start();

global $_SESSION;

// Cek apakah user sudah login apa belum
if (!isset($_SESSION["login"])) {
    header("Location: signin.php");
}

?>

<!doctype html>
<html lang="en">

<!-- Mirrored from yulan.bianchenglianmeng.cn/template/202203213155/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2023 04:04:24 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web Admin - Company Profile</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.html" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <!-- Full calendar -->
    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/list/main.css' rel='stylesheet' />
    <!-- MyStyle -->
    <link rel="stylesheet" href="css/myStyle.css">
    <link rel="stylesheet" href="css/flatpickr.min.css">
    <style>
        .iq-sidebar-menu .iq-menu li.active>a {color:black;}
    </style>
</head>

<body>
<!-- loader Start -->
    <div id="loading">
        <div id="loading-center">

        </div>
    </div>
<!-- loader END -->

<!-- Sidebar  -->
    <?php 
    $basename = basename($_SERVER["SCRIPT_FILENAME"], '.php'); 
    $basename = explode("_",$basename);
    $basename = $basename[0];

    ?>
    
    <div class="iq-sidebar" style="background: #034F00;"> 
        <button class="btn close_sidebar" type="button" id="close_sidebar" style="float: right; display: none; margin-top: 1rem;" onclick="closeSidebar()">
            <i class="fa fa-times-circle-o text-light" style="font-size: 1.5rem;" aria-hidden="true"></i>
        </button>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul class="iq-menu">
                    <li class="iq-menu-title">
                        <span class="d-block">Dashboard</span>
                        <i class="ri-subtract-line"></i>
                    </li>
                    <li class="sidebar-item <?php if($basename == "idex") {
                        echo "active";
                    } ?>">
                        <a href="index.php" class="iq-waves-effect">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>                     
                    <li class="sidebar-item <?php if($basename == "user") {
                        echo "active";
                    } ?>">
                        <a href="user.php" class="iq-waves-effect">
                            <i class="ri-group-fill"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?php if($basename == "identitasWeb") {
                        echo "active";
                    } ?>">
                        <a href="identitasWeb.php" class="iq-waves-effect">
                            <i class="fa fa-id-card"></i>
                            <span>Identitas Web</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?php if($basename == "bannerSlider") {
                        echo "active";
                    } ?>">
                        <a href="bannerSlider.php" class="iq-waves-effect">
                            <i class="fa fa-sliders"></i>
                            <span>Banner Slider</span>
                        </a>
                    </li>

                    <li class="iq-menu-title">
                        <span class="d-block">Data Artikel</span>
                        <i class="ri-subtract-line"></i>
                    </li>
                    <li class="sidebar-item <?php if($basename == "artikel") {
                        echo "active";
                    } ?>">
                        <a href="artikel.php" class="iq-waves-effect">
                            <i class="fa fa-newspaper-o"></i>
                            <span>Artikel</span>
                        </a>
                    </li>

                    <li class="iq-menu-title">
                        <i class="ri-subtract-line"></i>
                    </li>
                    <li class="sidebar-item">
                        <a href="../../../companyProfile/admin/signout.php" class="iq-waves-effect" onclick="return confirm('Apakah Kamu Yakin Untuk Logout?')">
                            <i class="fa fa-power-off"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-3"></div>
        </div>
    </div>
<!-- Sidebar END -->

<!-- Page Content  -->
    <div id="content-page" class="content-page">
        <!-- TOP Nav Bar -->
            <div class="iq-top-navbar header-top-sticky">
                <div class="iq-navbar-custom">
                    <nav class="navbar  navbar-light p-0">
                        <!-- <div class="iq-search-bar">
                            <form action="#" class="searchbox">
                                <input type="text" class="text search-input" placeholder="Type here to search...">
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            </form>
                        </div> -->
                        

                        <div class="navbar-list">
                            <a href="../../../comle/../companyProfile/admin/signout.php" class="btn btn-success mx-3 logout-btn" onclick="return confirm('Apakah Kamu Yakin Untuk Logout?')">
                                <i class="fa fa-power-off"></i>Log Out
                            </a>
                        </div>
                        <ul class="navbar-list">
                            <li>
                                <div class="wrapper-menu">
                                    <div class="main-circle"><i class="ri-more-fill" style="color: #32c12d;"></i></div>
                                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>  
                                </div>
                            </li>
                            <li>
                                <a href="#" class="iq-waves-effect" id="btnFullscreen">
                                    <i class="ri-fullscreen-line"></i>
                                </a>
                            </li>
                            <li>
                                <a class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="img/users/<?php echo $_SESSION['foto']; ?>" class="img-fluid rounded mr-3" alt="user">
                                    <div class="caption">
                                        <h6 class="mb-0 line-height"><?php echo $_SESSION['nama']; ?></h6>
                                        <span class="font-size-12" style="color: rgba(49, 192, 44, 1);">Pengguna</span>
                                    </div>
                                </a>
                                <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0" style="display: block;">
                                            <div class="bg-success p-3">
                                                <h6 class="mb-0 line-height text-white">Halo, <?php echo $_SESSION['nama']; ?></h6>
                                            </div>
                                            <a href="user_edit.php?id_user=<?php echo $_SESSION['id'] ?>" class="fa fa-pencil-square-o">
                                                Edit Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        <!-- TOP Nav Bar END -->