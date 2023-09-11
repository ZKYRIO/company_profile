<?php
include 'includes/koneksi.php';

$id = $_GET['id_user'];

// ambil data user dari database
$users = mysqli_query($db, "SELECT * FROM user WHERE id = $id");
$user = mysqli_fetch_assoc($users);

// sql delete query
mysqli_query($db, "DELETE FROM user WHERE id = $id ");

if ( mysqli_affected_rows($db) > 0 ) {
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