<?php
include 'bannerSlider_act.php';
include 'includes/header.php';

// Cek apakah submit sudah pernah di tekan atau belum
if (isset($_POST["submit"])) {
    if(insertSlider() > 0) {
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

<div class="container bannerSliderTambah formpage" >
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card form">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form Tambah Banner Slider</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col">
                                <label for="banner_slider"><strong>Banner Slider</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" width="400" style="display: none; border-radius: 0;">
                                    <input type="file" name="banner_slider" id="banner_slider" class="form-control-file" onchange="preview_image(event)">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <a href="bannerSlider.php" type="submit" class="btn btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   

<?php
include 'includes/footer.php';
?>