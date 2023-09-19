<?php
include './../koneksi/koneksi.php';

$id = $_GET['id_artikel'];

// ambil data user dari database
$articles = mysqli_query($db, "SELECT * FROM artikel WHERE id_artikel = $id");
$article = mysqli_fetch_assoc($articles);
$banner_artikel_lama = $article["banner_artikel"];

// sql delete query
mysqli_query($db, "DELETE FROM artikel WHERE id_artikel = $id ");

if ( mysqli_affected_rows($db) > 0 ) {

    // hapus banner artikel dari file
    unlink("./img/bannerArtikel/$banner_artikel_lama");

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