<?php
include 'identitasWeb_act.php';
include 'includes/header.php';

if( isset($_POST["submit"]) ) {
    if ( updateIdentitasWeb($_POST) > 0 ) {
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

// Ambil data identitas web dari database
$id_identitasWeb = $_GET["id_identitasWeb"];
$identitasWebs = mysqli_query($db, "SELECT * FROM identitas_web WHERE id_identitasWeb = $id_identitasWeb");
$identitasWeb = mysqli_fetch_assoc($identitasWebs);
?>

<div class="container identitasWeb" style="min-height: 10000px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card form">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Form Ubah Identitas Web</h4>
                    </div>
                </div>

                <div class="iq-card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <label for="nama_instansi"><strong>Nama Instansi</strong></label>
                            <input type="text" class="form-control" name="nama_instansi" id="nama_instansi" value="<?php echo $identitasWeb["nama_instansi"] ?>">
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="visi_instansi"><strong>Visi Instansi</strong></label>
                                <input type="text" class="form-control" name="visi_instansi" id="visi_instansi" value="<?php echo $identitasWeb["visi_instansi"] ?>">
                            </div>
                            <div class="col">
                                <label for="misi_instansi"><strong>Misi Instansi</strong></label>
                                <input type="text" class="form-control" name="misi_instansi" id="misi_instansi" value="<?php echo $identitasWeb["misi_instansi"] ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="nama_instansi"><strong>Profile Instansi</strong></label>
                                <textarea name="profile_instansi" id="profile_instansi" cols="30" rows="5" class="form-control">
                                    <?php echo $identitasWeb["profile_instansi"] ?>
                                </textarea>
                            </div>
                        </div>

                        <!-- <div class="form-row">
                            <div class="col">
                                <label for="banner_profile"><strong>Banner Profile Instansi</strong></label>
                                <img src="img/identitasWeb/<?php echo $identitasWeb["banner_profile"] ?>" alt="">
                                <input type="file" class="form-control-file" name="banner_profile" id="banner_profile">
                                <input type="hidden" name="banner_profile_lama" value="<?php echo $identitasWeb["banner_profile"] ?>">
                            </div>
                        </div> -->

                        <div class="form-row">
                            <div class="col">
                                <label for="banner_profile"><strong>Banner Profile</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" src="img/identitasWeb/<?php echo $identitasWeb['banner_profile'] ?>" width="400" style="border-radius: 0; display: none;">
                                    <input type="file" class="form-control-file" name="banner_profile" id="banner_profile" style="margin-top: 1.5rem;" onchange="preview_image(event)">
                                    <input type="hidden" name="banner_profile_lama" id="banner_profile_lama" value="<?php echo $identitasWeb['banner_profile'] ?>">
                                </div>
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="copyright"><strong>Copyright</strong></label>
                                <input type="text" class="form-control" name="copyright" id="copyright" value="<?php echo $identitasWeb["copyright_instansi"] ?>">
                            </div>
                            <div class="col">
                                <label for="whatsapp"><strong>Whatsapp</strong></label>
                                <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?php echo $identitasWeb["whatsapp_instansi"] ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="instagram"><strong>Instagram</strong></label>
                                <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $identitasWeb["instagram_instansi"] ?>">
                            </div>
                            <div class="col">
                                <label for="facebook"><strong>Facebook</strong></label>
                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $identitasWeb["facebook_instansi"] ?>">
                            </div>
                        </div>

                        <!-- <div class="form-row">
                            <div class="col">
                                <label for="logo_instansi"><strong>Logo Instansi</strong></label>
                                <img src="img/identitasWeb/<?php echo $identitasWeb["logo_instansi"] ?>" alt="">
                                <input type="file" class="form-control-file" name="logo_instansi" id="logo_instansi">
                                <input type="hidden" name="logo_instansi_lama" value="<?php echo $identitasWeb["logo_instansi"] ?>">
                            </div>
                        </div> -->

                        <div class="form-row">
                            <div class="col">
                                <label for="logo_instansi"><strong>Logo Instansi</strong></label>
                                <div class="form-gambar">
                                    <img id="output_image" src="img/identitasWeb/<?php echo $identitasWeb['logo_instansi'] ?>" width="100" alt="">
                                    <input type="file" class="form-control-file" name="logo_instansi" id="logo_instansi" style="margin-top: 1.5rem;" onchange="preview_image(event)">
                                    <input type="hidden" name="logo_instansi_lama" id="logo_instansi_lama" value="<?php echo $identitasWeb['logo_instansi'] ?>">
                                </div>
                            </div> 
                        </div>

                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <a href="identitasWeb.php" type="submit" class="btn btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   

<?php
include 'includes/footer.php';
?>