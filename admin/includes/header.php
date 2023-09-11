<?php
Require 'koneksi.php';
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
    <div class="iq-sidebar" style="background: #034F00;"> 
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul class="iq-menu">
                    <li class="iq-menu-title">
                        <span class="d-block">Dashboard</span>
                        <i class="ri-subtract-line"></i>
                    </li>
                    <li class="sidebar-item">
                        <a href="index.php" class="iq-waves-effect">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>                     
                    <li class="sidebar-item">
                        <a href="user.php" class="iq-waves-effect">
                            <i class="ri-group-fill"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="identitasWeb.php" class="iq-waves-effect">
                            <i class="fa fa-id-card"></i>
                            <span>Identitas Web</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="bannerSlider.php" class="iq-waves-effect">
                            <i class="fa fa-sliders"></i>
                            <span>Banner Slider</span>
                        </a>
                    </li>

                    <li class="iq-menu-title">
                        <span class="d-block">Data Artikel</span>
                        <i class="ri-subtract-line"></i>
                    </li>
                    <li class="sidebar-item">
                        <a href="artikel.php" class="iq-waves-effect">
                            <i class="fa fa-newspaper-o"></i>
                            <span>Artikel</span>
                        </a>
                    </li>

                    <li class="iq-menu-title">
                        <i class="ri-subtract-line"></i>
                    </li>
                    <li class="sidebar-item">
                        <a href="../../../companyProfile/admin/signout.php" class="iq-waves-effect">
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
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <!-- <div class="iq-search-bar">
                            <form action="#" class="searchbox">
                                <input type="text" class="text search-input" placeholder="Type here to search...">
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            </form>
                        </div> -->
                        <a href="../../../comle/../companyProfile/admin/signout.php" class="btn btn-success mx-3 logout-btn">
                            <i class="fa fa-power-off"></i>Log Out
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>

                        <div class="iq-menu-bt">
                            
                        </div>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list">
                                <li class="nav-item align-self-center">
                                    <div class="wrapper-menu">
                                        <div class="main-circle"><i class="ri-more-fill" style="color: #32c12d;"></i></div>
                                        <div class="hover-circle"><i class="ri-more-2-fill"></i></div>  
                                    </div>
                                </li>
                                <li class="nav-item iq-full-screen">
                                    <a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a>
                                </li>
                            </ul>
                        </div>
                        <ul class="navbar-list">
                            <li>
                                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="img/users/<?php echo $_SESSION['foto']; ?>" class="img-fluid rounded mr-3" alt="user">
                                    <div class="caption">
                                        <h6 class="mb-0 line-height"><?php echo $_SESSION['nama']; ?></h6>
                                        <span class="font-size-12" style="color: rgba(49, 192, 44, 1);">Available</span>
                                    </div>
                                </a>
                                <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Hello <?php echo $_SESSION['nama']; ?></h5>
                                            <span class="text-white font-size-12">Available</span>
                                        </div>
                                        <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-file-user-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">My Profile</h6>
                                                    <p class="mb-0 font-size-12">View personal profile details.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-profile-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Edit Profile</h6>
                                                    <p class="mb-0 font-size-12">Modify your personal details.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-account-box-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Account settings</h6>
                                                    <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-lock-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Privacy Settings</h6>
                                                    <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        <!-- TOP Nav Bar END -->