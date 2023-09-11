<?php
include 'includes/koneksi.php';
session_start();

// Cek apakah user sudah pernah login apa belum
if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST["signIn"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    // cek apakah username ada di database
    $result = mysqli_query($db, "SELECT * FROM user WHERE email_user = '$email' ");

    if (mysqli_num_rows($result) === 1) {


        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password_user"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row['id'];
            $_SESSION["nama"] = $row['nama_user'];
            $_SESSION["email"] = $row['email_user'];
            $_SESSION["password"] = $row['password_user'];
            $_SESSION["foto"]= $row['foto_user'];


            // cek apakah user 
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('id', $row["id"], time() + 60);
                setcookie('key', hash('sha256', $row["email_user"]), time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>