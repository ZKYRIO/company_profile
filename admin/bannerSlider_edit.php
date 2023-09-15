<?php
include 'bannerSlider_act.php';
include 'includes/header.php';

if( isset($_POST["submit"]) ) {
    if( updateSlider($_POST) > 0) {
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

$id = $_GET["id_slider"];
// ambil data banner slider dari database
$sliders = mysqli_query($db, "SELECT * FROM slider WHERE id_slider = $id");
$slider = mysqli_fetch_assoc($sliders);
?>

<div class="container bannerSliderEdit formpage">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card form">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form Edit Banner Slider</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col">
                                <label for="banner_slider"><strong>Banner Slider</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" src="img/bannerSlider/<?php echo $slider['banner_slider']?>" alt="" width="400" style="border-radius: 0;">
                                    <input type="hidden" name="id_slider" value="<?php echo $slider['id_slider'] ?>">
                                    <input type="file" name="banner_slider" id="banner_slider" class="form-control-file" onchange="preview_image(event)">
                                    <input type="hidden" name="banner_slider_lama" value="<?php echo $slider['banner_slider'] ?>">
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