<?php
include 'signup_act.php';

// cek apakah sign up sudah di pencet
if ( isset($_POST["signUp"]) ) {
    if (signup($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('user berhasil ditambahkan !');
            </script>
        ";
        header("Location: index.php");
        exit;
    } else {
        echo "
            <script>
                alert('user gagal ditambahkan !');
            </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<!-- Mirrored from yulan.bianchenglianmeng.cn/template/202203213155/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2023 04:06:56 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up - Web Admin</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.html" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="css/typography.css">
    <!-- CSS Manual -->
    <link rel="stylesheet" href="css/signup.css" type="text/css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" >
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Sign in Start -->
    <section class="sign-up-page">
        <div class="container sign-up-page-bg mt-5 mb-5 p-0">
            <div class="row no-gutters">
                <div class="col-md-6 position-relative">
                    <div class="sign-up-from">
                        <h1 class="mb-0">Sign Up</h1>
                        <form class="mt-4" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control mb-0" name="nama" id="exampleInputEmail1" placeholder="Enter Your Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email</label>
                                <input type="email" class="form-control mb-0" name="email" id="exampleInputEmail2" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control mb-0" name="password" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="konfirm-password">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="konfirmPass" id="konfirmasi-password" placeholder="Konfirmasi Password" required>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <input type="hidden" name="fotoProfil" id="foto" value="profDefault.jpg">
                            </div>
                            <div class="d-inline-block w-100">
                                <button type="submit" name="signUp" class="btn btn-success float-right">Sign Up</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="index.php">Sign In</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                    <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div class="sign-up-detail text-white">
                        <a class="sign-up-logo mb-5" href="#"><img src="images/logo-white.png" class="img-fluid" alt="logo"></a>
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                            <div class="item">
                                <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                            </div>
                            <div class="item">
                                <img src="images/login/2.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                            </div>
                            <div class="item">
                                <img src="images/login/3.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="js/smooth-scrollbar.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

<!-- Mirrored from yulan.bianchenglianmeng.cn/template/202203213155/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2023 04:06:56 GMT -->
</html>