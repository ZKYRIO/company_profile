<?php
// include './../koneksi/koneksi.php';

function insertArtikel($data) {
    global $db;

    $id_user = $data["id_user"];
    $judul = htmlspecialchars($data["judul_artikel"]);
    $tanggal = date('m-d-Y');
    $deskripsi = htmlspecialchars($data["deskripsi_artikel"]);
    $content = htmlspecialchars($data["content_artikel"]);

    $fotoFor = "banner_artikel";
    $bannerArtikel = upload($fotoFor);

    // sql insert query
    $query = "INSERT INTO artikel VALUES( NULL , $id_user ,'$judul' , STR_TO_DATE('$tanggal','%m-%d-%Y') , '$deskripsi' , '$content' , '$bannerArtikel' ) ";
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

function updateArtikel ($data) {
    global $db;

    $id_artikel = $data["id_artikel"];
    $judul = htmlspecialchars($data["judul_artikel"]);
    // $tanggal = htmlspecialchars($data["tanggal_artikel"]);
    $deskripsi = htmlspecialchars($data["deskripsi_artikel"]);
    $content = htmlspecialchars($data["content_artikel"]);

    $bannerArtikel_lama = $data["banner_artikel_lama"];

    
    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES["banner_artikel"]["error"] === 4 ) {
        $bannerArtikel = $bannerArtikel_lama;
    } else {
        $fotoFor = "banner_artikel";
        $bannerArtikel = upload($fotoFor);
        // cek apakah sudah sesuai atau tidak
        if ( $bannerArtikel === false ) {
            return false;
        } else {
            // Hapus banner artikel lama yang ada di file
            unlink("./img/bannerArtikel/$bannerArtikel_lama");
        }
    }


    $query = "UPDATE artikel SET judul_artikel = '$judul', deskripsi_artikel = '$deskripsi', isi_artikel = '$content', banner_artikel = '$bannerArtikel' WHERE id_artikel = $id_artikel";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

?>