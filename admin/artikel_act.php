<?php
// include 'includes/koneksi.php';

function insertArtikel($data) {
    global $db;

    $id_user = $data["id_user"];
    $judul = htmlspecialchars($data["judul_artikel"]);
    $tanggal = htmlspecialchars($data["tanggal_artikel"]);
    $deskripsi = htmlspecialchars($data["deskripsi_artikel"]);
    $content = htmlspecialchars($data["content_artikel"]);

    $fotoFor = "banner_artikel";
    $bannerArtikel = upload($fotoFor);

    // sql insert query
    $query = "INSERT INTO artikel VALUES( NULL , $id_user ,'$judul' , '$tanggal' , '$deskripsi' , '$content' , '$bannerArtikel' ) ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Function untuk upload file
function upload($fotoFor) {
    $namaFile = $_FILES["$fotoFor"]['name'];
    $ukuranFile = $_FILES["$fotoFor"]["size"];
    $error = $_FILES["$fotoFor"]["error"]; 
    $tmp = $_FILES["$fotoFor"]["tmp_name"];

    //  cek apakh gambar diupload atau tidak
    if($error === 4) {
        echo "
            <script>
                alert('pilih gambar dahulu!');
            </script>
        ";
        return false;
    }

    //  cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
    if( in_array( $ekstensiGambar, $ekstensiGambarValid ) === false) {
        echo "
            <script>
                alert('File gambar {$fotoFor} yang anda upload bukan format gambar!');
            </script>
        ";
        return false;
    }

    // cek jika ukuran nya terlalu besar
    if( $ukuranFile > 20000000 ) {
        echo "
            <script>
                alert('ukuran gambar {$fotoFor} melebihi 10mb!');
            </script>
        ";
        return false;
    }

    // gambar siap diupload
    $namaFileBaru = uniqid() ;
    $namaFileBaru .= '.' ;
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmp , 'img/bannerArtikel/' . $namaFileBaru);

    return $namaFileBaru;

}

?>