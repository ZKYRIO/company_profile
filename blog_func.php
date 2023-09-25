<?php 

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

// mbil data artikel with user untuk blog lain setelah blog terbaru
$query = "SELECT id_artikel,
                 banner_artikel,
                 judul_artikel,
                 deskripsi_artikel,
                 tanggal_artikel,
                 nama_user,
                 foto_user
          FROM artikel INNER JOIN user ON artikel.user_id = user.id
          ORDER BY id_artikel DESC LIMIT 4 OFFSET 1";
$articleUsers = mysqli_query($db, $query);
$articleUser = mysqli_fetch_assoc($articleUsers);

// mengubah format tanggal untuk artikel utama
$oldDate = $articleUserNew["tanggal_artikel"];
$date = strtotime($oldDate);
$date = date("d - m - Y", $date);
?>