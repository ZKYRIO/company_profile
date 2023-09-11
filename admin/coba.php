<?php

require "includes/koneksi.php";

// if ( isset($_POST['submit'])) {
//     $tmp = $_FILES['foto']["name"];

//     $ekstensiGambar = pathinfo($tmp, PATHINFO_EXTENSION);
//     echo $tmp;
//     echo $ekstensiGambar;
//     exit;
// }

$id = $_GET["id_slider"];

$sliders = mysqli_query($db, "SELECT * FROM slider WHERE id_slider = $id");
$gambarSlider_lama = mysqli_fetch_assoc($sliders);

var_dump($sliders);
var_dump($gambarSlider_lama);
exit;

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="foto" id="foto">
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html> -->