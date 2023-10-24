<?php 
$id_artikel = $_GET['id_artikel'];

// For Sidebar Blog Terbaru
$articleUserNews = function ($id_artikel = 'tidak') use ($db) {

    // Cek apakah ada id_artikel yang dikirim
    $check_id = '';
    if($id_artikel != 'tidak'){
        $check_id = "WHERE id_artikel != $id_artikel";
    }
    
    $query = "SELECT    id_artikel,
    banner_artikel,
    judul_artikel,
    deskripsi_artikel,
    tanggal_artikel,
    nama_user,
    foto_user
    FROM artikel INNER JOIN user ON artikel.user_id = user.id
    $check_id
    ORDER BY id_artikel DESC LIMIT 3";
    return mysqli_query($db, $query);
};


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
function format_date($artikel) {
    $date = strtotime($artikel);
    $date = date("d - m - Y", $date);
    return $date;
}
?>