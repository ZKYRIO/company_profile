<?php
require 'user_act.php';
include 'includes/header.php';

// Cek apakah submit sudah pernah di tekan atau belum
if (isset($_POST["submit"])) {
    if(updateUser($_POST) > 0) {
        echo "
        <script>
                alert('Perubahan data berhasil di simpan')
                document.location.href = 'index.php';
            </script>
        ";
    }  else {
        echo "
        <script>
                alert('Perubahan data gagal di simpan')
                document.location.href = 'index.php';
            </script>
        ";
    }
}

// Ambil seluruh data dari id yang ditangkap $_GET
$id_user = $_GET['id_user'];
$users = mysqli_query($db, "SELECT * FROM user WHERE id = $id_user");
$user = mysqli_fetch_assoc($users);

?>

<div class="container userEdit" style="min-height: 100vh;">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card form">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form Tambah User</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                        <div class="form-row">
                            <div class="col">
                                <label for="nama"><strong>Nama Lengkap</strong></label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user["nama_user"] ?>">
                            </div>
                            <div class="col">
                                <label for="email"><strong>Email</strong></label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $user["email_user"] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="hidden" name="passwordDefault" value="<?php echo $user["password_user"] ?>">
                                <label for="password"><strong>Password</strong></label>
                                <input type="password" name="passwordBaru" id="password" class="form-control">
                            </div>
                            <div class="col">
                                <label for="konfirmPass"><strong>Konfirmasi Password</strong></label>
                                <input type="password" name="konfirmPass" id="konfirmPass" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="foto_user"><strong>Foto Profile</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" src="img/users/<?php echo $user['foto_user'] ?>" width="75" alt="" >
                                    <input type="file" class="form-control-file" name="foto_user" id="foto_user" onchange="preview_image(event)">
                                    <input type="hidden" name="foto_user_lama" id="foto_user_lama" value="<?php echo $user['foto_user'] ?>">
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