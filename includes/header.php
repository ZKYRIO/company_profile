<?php
include ('/laragon/www/companyProfile/koneksi/koneksi.php');
include ('function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $identitasWeb['nama_instansi'] ?></title>
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Header CSS -->
    <link rel="stylesheet" href="../website/css/header.css">
    <!-- Index CSS -->
    <link rel="stylesheet" href="../website/css/index.css">
    <!-- Blog CSS -->
    <link rel="stylesheet" href="../website/css/blog.css">
    <!-- Detail Blog CSS -->
    <link rel="stylesheet" href="../website/css/detail-blog.css">
    <!-- Footer CSS -->
    <link rel="stylesheet" href="../website/css/footer.css">
</head>
<body>
    <!-- Header Top -->
    <section class="header-top">
        <div class="copyright">
            <span>© 2023 <?php echo $identitasWeb['copyright_instansi'] ?>, Tbk. All Right Reserved</span>
        </div>
    </section>
    <!-- Close Header Top -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-navbar sticky-top">
        <div class="container">
            <img src="../companyProfile/admin/img/identitasWeb/<?php echo $identitasWeb['logo_instansi'] ?>" width="40" alt="">
            <a class="navbar-brand mx-3" href="#">
                <?php echo $identitasWeb['nama_instansi'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" onclick="">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Karir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Berita</a>
                    </li>
                    <li class="nav-item ms-2">
                        <button type="button" class="btn btn-darkgreen">Hubungi Kami</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->
