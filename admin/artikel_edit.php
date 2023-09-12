<?php
require('./artikel_act.php');
include 'includes/header.php';

// Cek apakah submit sudah pernah di tekan atau belum
if (isset($_POST["submit"])) {
    if (updateArtikel($_POST) > 0) {
        echo "
        <script>
                alert('Perubahan data berhasil di simpan')
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
                alert('Perubahan data gagal di simpan')
                document.location.href = 'index.php';
            </script>
        ";
    }
}

// Ambil seluruh data dari id yang dikirim dengan method GET
$id_artikel = $_GET['id_artikel'];
$articles = mysqli_query($db, "SELECT * FROM artikel WHERE id_artikel = $id_artikel");
$article = mysqli_fetch_assoc($articles);

?>

<div class="container userEdit" style="min-height: 100vh;">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card form">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form Edit Artikel</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                    <form method="post" enctype="multipart/form-data">
                        <!-- id artikel -->
                        <input type="hidden" name="id_artikel" value="<?php echo $id_artikel ?>">
                        <div class="form-row">
                            <div class="col">
                                <label for="judul_artikel"><strong>Judul Artikel</strong></label>
                                <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" value="<?php echo $article["judul_artikel"] ?>" required >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="deskripsi_artikel"><strong>Deskripsi Artikel</strong></label>
                                <input type="text" name="deskripsi_artikel" id="deskripsi_artikel" class="form-control" value="<?php echo $article["deskripsi_artikel"] ?>" required >
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col">
                                <label for="content_artikel"><strong>Isi Artikel</strong></label>
                                <textarea name="content_artikel" id="content_artikel" cols="30" rows="5" class="form-control" required ><?php echo $article["isi_artikel"] ?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="foto_user"><strong>Banner Artikel</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" src="img/bannerArtikel/<?php echo $article['banner_artikel'] ?>" width="200" alt="" style="border-radius: 1rem;" >
                                    <input type="file" class="form-control-file" name="banner_artikel" id="banner_artikel" onchange="preview_image(event)">
                                    <input type="hidden" name="banner_artikel_lama" id="banner_artikel_lama" value="<?php echo $article['banner_artikel'] ?>">
                                </div>
                            </div> 
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <a href="artikel.php" type="submit" class="btn btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>