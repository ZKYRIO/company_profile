<?php
include 'includes/header.php';
include 'artikel_act.php';

// Cek apakah submit sudah pernah di tekan atau belum
if (isset($_POST["submit"])) {
    if(insertArtikel($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan')
            document.location.href = 'index.php';
        </script>
        ";
    }  else {
        echo "
        <script>
            alert('data gagal ditambahkan')
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<div class="container identitasWeb" style="min-height: 10000px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card form">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form Tambah Artikel</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                    <form method="post" enctype="multipart/form-data">
                        <!-- id user -->
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION["id"] ?>">
                        <div class="form-row">
                            <div class="col">
                                <label for="judul_artikel"><strong>Judul Artikel</strong></label>
                                <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" required >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="deskripsi_artikel"><strong>Deskripsi Artikel</strong></label>
                                <input type="text" name="deskripsi_artikel" id="deskripsi_artikel" class="form-control" required >
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col">
                                <label for="content_artikel"><strong>Isi Artikel</strong></label>
                                <textarea name="content_artikel" id="content_artikel" cols="30" rows="5" class="form-control" required ></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="banner_artikel"><strong>Banner Artikel</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" width="200" style="display: none; border-radius: 1rem;">
                                    <input type="file" class="form-control-file" name="banner_artikel" id="banner_artikel" onchange="preview_image(event)" required>
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