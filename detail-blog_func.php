<?php 
$id_artikel = $_GET['id_artikel'];

// Ambil data artikel with user dari yang paling baru
$query = "SELECT id_artikel,
                 banner_artikel,
                 judul_artikel,
                 deskripsi_artikel,
                 tanggal_artikel,
                 nama_user,
                 foto_user
          FROM artikel INNER JOIN user ON artikel.user_id = user.id
          ORDER BY id_artikel DESC LIMIT 3";
$articleUserNews = mysqli_query($db, $query);
$articleUserNew = mysqli_fetch_assoc($articleUserNews);

// ambil data artikel with user
$query = "SELECT id_artikel,
                 banner_artikel,
                 judul_artikel,
                 deskripsi_artikel,
                 isi_artikel,
                 tanggal_artikel,
                 nama_user,
                 foto_user
          FROM artikel INNER JOIN user ON artikel.user_id = user.id
          WHERE id_artikel=$id_artikel";
$articleUsers = mysqli_query($db, $query);
$articleUser = mysqli_fetch_assoc($articleUsers);

//mengubah format tanggal 
$date = strtotime($articleUser['tanggal_artikel']);
$date = date("d - m - Y", $date);
?>