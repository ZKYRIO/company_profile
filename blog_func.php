<?php 

// Ambil data artikel with user dari yang paling baru (sidebar blog terbaru & blog terbaru paling atas)
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


// Ambil data artikel with user untuk blog lainnya 
$LIMIT = isset($_GET['limit']) ? intval($_GET['limit']) + 4 : 4;
$query = "SELECT id_artikel,
                 banner_artikel,
                 judul_artikel,
                 deskripsi_artikel,
                 tanggal_artikel,
                 nama_user,
                 foto_user
          FROM artikel INNER JOIN user ON artikel.user_id = user.id
          ORDER BY id_artikel DESC LIMIT $LIMIT OFFSET 1";
$articleUsers = mysqli_query($db, $query);
$articleUser = mysqli_fetch_assoc($articleUsers);

//mengubah format tanggal 
function format_date($artikel) {
    $date = strtotime($artikel);
    $date = date("d - m - Y", $date);
    return $date;
}
?>