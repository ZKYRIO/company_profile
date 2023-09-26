<?php
include './../koneksi/koneksi.php';

function insertSlider() {
    global $db;

    $fotoFor = "banner_slider";
    $gambarSlider = upload($fotoFor);
    if(!$gambarSlider) {
        return false;
    }

    // sql insert query
    $query = "INSERT INTO slider VALUES( NULL , '$gambarSlider') ";
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
    move_uploaded_file($tmp , 'img/bannerSlider/' . $namaFileBaru);

    return $namaFileBaru;

}

function updateSlider($data) {
    global $db;

    $id_slider = $data["id_slider"];
    $gambarLama = $data["banner_slider_lama"];

    if($_FILES["banner_slider"]["error"] === 4) {
        $gambarSlider = $gambarLama;
    } else {
        $fotoFor = "banner_slider";
        $gambarSlider = upload($fotoFor);
        if ( $gambarSlider === false) {
            return false;
        } else {
            unlink("img/bannerSlider/$gambarLama");
        }

        // sql update query
        $query = "UPDATE slider SET banner_slider = '$gambarSlider' WHERE id_slider = $id_slider";
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }
}
?>

