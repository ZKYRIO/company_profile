<?php
include './../koneksi/koneksi.php';

function insertUser($data) {
    global $db;
    
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);
    $konfirmPass = htmlspecialchars($data['konfirmPass']);
    $foto = upload() ;

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
    

    // Cek apakah password 1 dan konfirmasi password tidak sama
    if ( $password !== $konfirmPass) {
        echo "
            <script>
                alert('password tidak sama !');
            </script>
        ";
        return false;
    }

    // Cek apakah user sudah memasukkan gambar
    if(!$foto) {
        return false;
    }

     // Enskripsi password
     $password = password_hash($password, PASSWORD_DEFAULT);

     // Insert usn & pass to database
     mysqli_query($db, "INSERT INTO user VALUES( NULL ,'$nama', '$email' , '$password' , '$foto' )");

     return mysqli_affected_rows($db);
}

// Function untuk upload file
function upload() {
    $namaFile = $_FILES["foto_user"]['name'];
    $ukuranFile = $_FILES["foto_user"]["size"];
    $error = $_FILES["foto_user"]["error"]; 
    $tmp = $_FILES["foto_user"]["tmp_name"];

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
                alert('File yang anda upload bukan format gambar!');
            </script>
        ";
        return false;
    }

    // cek jika ukuran nya terlalu besar
    if( $ukuranFile > 10000000 ) {
        echo "
            <script>
                alert('ukuran gambar melebihi 10mb!');
            </script>
        ";
        return false;
    }

    // gambar siap diupload
    // generate nama baru secara random
    $namaFileBaru = uniqid() ;
    $namaFileBaru .= '.' ;
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmp , 'img/users/' . $namaFileBaru);

    return $namaFileBaru;

}

function updateUser ($data) {
    global $db;

    $id = $data["id_user"];
    $nama = htmlspecialchars($data["nama"]);
    $emailBaru = htmlspecialchars($data["email"]);
    $emailLama = $data["email_lama"];
    $passwordDefault = $data["passwordDefault"];
    $passwordBaru = htmlspecialchars($data["passwordBaru"]);
    $konfirmPass = htmlspecialchars($data["konfirmPass"]);
    $fotoLama = $data["foto_user_lama"];

    // Cek apakah email sudah ada di database atau belum
    $result = mysqli_query($db, " SELECT email_user FROM user WHERE email_user = '$emailBaru' ");
    $hasil = mysqli_fetch_assoc($result);

    if ($emailBaru == $emailLama) {
        $email = $emailLama;
    } elseif ($hasil["email_user"] == $emailBaru) {
        echo "
        <script>
            alert(' email sudah ada !');
        </script>
        ";
        return false;
    } else {
        $email = $emailBaru;
    }

    // Cek apakah user ganti password atau tidak
    if ( !$passwordBaru == "" && !$konfirmPass == "" ) {
        if ( $passwordBaru == $konfirmPass ) {
            // Enskripsi password
            $password = password_hash($passwordBaru, PASSWORD_DEFAULT);
        } else {
            echo "
            <script>
                alert('password yang anda masukkan tidak sama!');
            </script>
            ";
            return false;
        }
    } else {
        $password = $passwordDefault;
    }
    
    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES["foto_user"]["error"] === 4 ) {
        $foto_user = $fotoLama;
    } else {
        $foto_user = upload();
        // cek apakah sudah sesuai atau tidak
        if ( $foto_user === false ) {
            return false;
        } else {
            // Hapus gambar yang ada di file
            unlink("img/users/$fotoLama");
        }
    }


    $query = "UPDATE user SET nama_user = '$nama' , email_user = '$email' , password_user = '$password' , foto_user = '$foto_user' WHERE id = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

?>