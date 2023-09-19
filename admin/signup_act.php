<?php
include './../koneksi/koneksi.php';

function signup($data) {
    global $db;

    $nama = stripslashes($data['nama']);
    $email = strtolower(stripslashes($data['email']));
    $password = mysqli_real_escape_string($db,$data["password"]);
    $password2 = mysqli_real_escape_string($db,$data["konfirmPass"]);
    $profDefault = $data['fotoProfil'];

    // Cek apakah username sudah ada di database atau belum
    $result = mysqli_query($db, "SELECT email_user FROM user WHERE email_user = '$email'");
    if ( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert(' email sudah ada !');
            </script>
        ";
        return false;
    }

    // Cek apakah password 1 dan password 2 tidak sama
    if ( $password !== $password2) {
        echo "
            <script>
                alert('password tidak sama !');
            </script>
        ";
        return false;
    }

    // Enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah user meng upload foto profile atau tidak
    if ( $_FILES['foto_user']['error'] === 4) {
        $foto_user = $profDefault;
    }else {
        $fotoFor = "foto_user";
        $foto_user = upload($fotoFor);
    }

    // Insert usn & pass to database
    mysqli_query($db, "INSERT INTO user VALUES( NULL ,'$nama', '$email' , '$password' , '$foto_user' )");

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
    move_uploaded_file($tmp , './img/users/' . $namaFileBaru);

    return $namaFileBaru;

}
?>