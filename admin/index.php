<?php

include("includes/header.php");

// Ambil data user dari database
$users = mysqli_query($db,"SELECT * FROM user");

// ambil id_user AKTIF saat login dari session
$id_user = $_SESSION['id'];

// Ambil data artikel dari database
$articles = mysqli_query($db,"SELECT * FROM artikel WHERE user_id = $id_user");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="count">
                                <h1 class="mb-0"><?php echo mysqli_num_rows($users); ?></h1>
                                <h3>Pengguna</h3>
                            </div>
                            <i class="fa fa-users fa-5x text-success" aria-hidden="true"></i>
                        </div>
                        <a href="user.php" class="btn btn-success w-100 rounded-0">Lihat Selengkapnya<i class="fa fa-arrow-circle-o-right ml-2" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="count">
                                <h1 class="mb-0"><?php echo mysqli_num_rows($articles); ?></h1>
                                <h3>Artikel</h3>
                            </div>
                            <i class="fa fa-newspaper-o fa-5x text-success" aria-hidden="true"></i>
                        </div>
                        <a href="artikel.php" class="btn btn-success w-100 rounded-0">Lihat Selengkapnya<i class="fa fa-arrow-circle-o-right ml-2" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>