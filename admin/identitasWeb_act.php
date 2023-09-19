<?php

function updateIdentitasWeb($data) {
    global $db;

    $nama_instansi = htmlspecialchars($data["nama_instansi"]);
    $visi_instansi = htmlspecialchars($data["visi_instansi"]);
    $misi_instansi = htmlspecialchars($data["misi_instansi"]);
    $profile_instansi = htmlspecialchars($data["profile_instansi"]);
    $copyright = htmlspecialchars($data["copyright"]);
    $instagram = htmlspecialchars($data["instagram"]);
    $facebook = htmlspecialchars($data["facebook"]);
    $whatsapp = htmlspecialchars($data["whatsapp"]);
    $bannerLama = $data["banner_profile_lama"];
    $logoLama = $data["logo_instansi_lama"];

    // cek apakah user pilih banner profile baru atau tidak
    if ( $_FILES["banner_profile"]["error"] === 4 ) {
        $banner_profile = $bannerLama;
    } else {
        $fotoFor = "banner_profile";
        $banner_profile = upload($fotoFor);

        // cek apakah sudah sesuai atau tidak
        if ( $banner_profile === false ) {
            return false;
        } else {
            // hapus banner lama yang ada di file
            unlink("img/identitasWeb/$bannerLama");
        }
    }

    // cek apakah user pilih logo instansi baru atau tidak
    if ( $_FILES["logo_instansi"]["error"] === 4 ) {
        $logo_instansi = $logoLama;
    } else {
        $fotoFor = "logo_instansi";
        $logo_instansi = upload($fotoFor);

        // cek apakah sudah sesuai atau tidak
        if ( $logo_instansi === false ) {
            return false;
        } else {
            // hapus logo lama yang ada di file
            unlink("img/identitasWeb/$logoLama");
        }
    }


    $query = "UPDATE identitas_web SET nama_instansi= '$nama_instansi' , visi_instansi = '$visi_instansi' , misi_instansi= '$misi_instansi' , profile_instansi = '$profile_instansi' , banner_profile= '$banner_profile' , copyright_instansi = '$copyright' , instagram_instansi = '$instagram' , whatsapp_instansi = '$whatsapp' , facebook_instansi= '$facebook' , logo_instansi= '$logo_instansi' ";
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
    if( $ukuranFile > 10000000 ) {
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
    move_uploaded_file($tmp , 'img/identitasWeb/' . $namaFileBaru);

    return $namaFileBaru;

}
?>