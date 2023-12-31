<?php
include 'signin_act.php';

// Ambil data user dari database
$identitaswebs = mysqli_query($db, "SELECT * FROM identitas_web");
$identitasweb = mysqli_fetch_assoc($identitaswebs);
?>

<!doctype html>
<html lang="en">

<!-- Mirrored from yulan.bianchenglianmeng.cn/template/202203213155/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2023 04:06:43 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign In - Web Admin</title>
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
    <!-- My Style CSS -->
    <link rel="stylesheet" href="css/myStyle.css">
</head>
<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div class="container sign-in-page-bg mt-5 mb-5 p-0">
            <div class="row no-gutters">
                <div class="col-md-6 text-center sign-in-details">
                    <img src="img/identitasWeb/<?php echo $identitasweb['logo_instansi'] ?>" width="40%" alt="logo">

                    <h2><?php echo $identitasweb['nama_instansi'] ?></h2>
                </div>
                
                <div class="col-md-6 position-relative">
                    <div class="sign-in-from">
                        <h1 class="mb-0">Sign in</h1>
                        <!-- Banner Error -->
                        <?php if (isset($error)) : ?>
                            <p style="color: white; font-weight: bold; width: fit-content; background: red; font-style: italic; padding: .8rem 1.5rem;">Email atau password error !</p>
                        <?php endif; ?>

                        <form class="mt-4" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <!-- <a href="#" class="float-right">Forgot password?</a> -->
                                <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="d-inline-block w-100">
                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                </div>
                                <button type="submit" name="signIn" class="btn btn-success float-right">Sign in</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Don't have an account? 
                                    <a href="signup.php" style="color: rgba(49, 192, 44, 1);" >Sign up</a>
                                </span>
                                <ul class="iq-social-media">
                                    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                    <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                        </form>
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

<!-- Mirrored from yulan.bianchenglianmeng.cn/template/202203213155/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 May 2023 04:06:56 GMT -->
</html>