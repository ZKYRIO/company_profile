<?php 
// Mengambil data database:
// Tabel Artikel
$articles = mysqli_query($db, "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 6");
$article = mysqli_fetch_assoc($articles);
// Tabel Banner Slider
$sliders = mysqli_query($db, "SELECT * FROM slider");
$slider = mysqli_fetch_assoc($sliders);
// Tabel Identitas Web
$identitasWebs = mysqli_query($db, "SELECT * FROM identitas_web");
$identitasWeb = mysqli_fetch_assoc($identitasWebs);

?>