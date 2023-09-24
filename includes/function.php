<?php

// Ambil Data dari databse:
// Tabel User
$users = mysqli_query($db, "SELECT * FROM user");
$user = mysqli_fetch_assoc($users);
// Tabel Banner Slider
$sliders = mysqli_query($db, "SELECT * FROM slider");
$slider = mysqli_fetch_assoc($sliders);
// Tabel Identitas Web
$identitasWebs = mysqli_query($db, "SELECT * FROM identitas_web");
$identitasWeb = mysqli_fetch_assoc($identitasWebs);
// Tabel Artikel
$articles = mysqli_query($db, "SELECT * FROM artikel ORDER BY id_artikel DESC");
$article = mysqli_fetch_assoc($articles);


?>