<?php
include 'includes/koneksi.php';

$id = $_GET["id_slider"];

// ambil data banner slider dari database
$sliders = mysqli_query($db, "SELECT * FROM slider WHERE id_slider = $id");
$result = mysqli_fetch_assoc($sliders);
$gambarSlider_lama = $result["banner_slider"];

// sql deleter query
mysqli_query($db, "DELETE FROM slider WHERE id_slider = $id");

if(mysqli_affected_rows($db) > 0){

    // hapus banner lama yang ada di file
    unlink("img/bannerSlider/$gambarSlider_lama");

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
};

?>