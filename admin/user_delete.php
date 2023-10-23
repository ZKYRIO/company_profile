<?php
include './../koneksi/koneksi.php';

$id = $_GET['id_user'];

// ambil data artikel dari database
$artikels = mysqli_query($db, "SELECT * FROM artikel WHERE user_id = $id");

// ambil data user dari database
$users = mysqli_query($db, "SELECT * FROM user WHERE id = $id");
$user = mysqli_fetch_assoc($users);
$foto_user_lama = $user["foto_user"];

// hapus artikel sesuai id_user
mysqli_query($db, "DELETE FROM artikel WHERE user_id = $id");

// hapus user sesuai id_user
mysqli_query($db, "DELETE FROM user WHERE id = $id");

if ( mysqli_affected_rows($db) > 0 ) {

    // hapus banner artikel dari file
    while($banner_artikel = mysqli_fetch_assoc($artikels)) {
        $banner_artikel_lama = $banner_artikel["banner_artikel"];
        unlink("./img/bannerArtikel/$banner_artikel_lama");
    }

    // hapus foto user dari file
    unlink("./img/users/$foto_user_lama");

    echo "
    <script>
        alert('Data Berhasil Di Hapus!')
        document.location.href = 'index.php';
    </script>
    ";
    exit;
} else {
    echo "
    <script>
        alert('Data Gagal Di Hapus!')
        document.location.href = 'index.php';
    </script>
    ";
    exit;
}

?>