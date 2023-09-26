<?php
require 'user_act.php';
include 'includes/header.php';

// Cek apakah submit sudah pernah di tekan atau belum
if (isset($_POST["submit"])) {
    if(insertUser($_POST) > 0) {
        echo "
        <script>
                alert('data berhasil ditambahkan')
                document.location.href = 'index.php';
            </script>
        ";
    }  else {
        echo "
        <script>
                alert('data gagal ditambahkan')
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<div class="container userTambah formpage">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card form">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form Tambah Pengguna</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col">
                                <label for="nama"><strong>Nama Lengkap</strong></label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="email"><strong>Email</strong></label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="password"><strong>Password</strong></label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="konfirmPass"><strong>Konfirmasi Password</strong></label>
                                <input type="password" name="konfirmPass" id="konfirmPass" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="foto_user"><strong>Foto Profile</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" style="display: none; width: 10%; object-fit: cover; aspect-ratio: 1/1;">
                                <input type="file" class="form-control-file" name="foto_user" id="foto_user" onchange="preview_image(event)" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <a href="user.php" type="submit" class="btn btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   

<?php
include 'includes/footer.php';
?>