<?php
include 'includes/koneksi.php';

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

    // Insert usn & pass to database
    mysqli_query($db, "INSERT INTO user VALUES( NULL ,'$nama', '$email' , '$password' , '$profDefault' )");

    return mysqli_affected_rows($db);

}
?>