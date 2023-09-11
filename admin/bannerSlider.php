<?php
include 'includes/header.php';

// Ambil data banner slider dari database
$sliders = mysqli_query($db, "SELECT * FROM slider");
$rowCount = mysqli_num_rows($sliders);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Data Banner Slider</h4>
                    </div>
                </div>

                <div class="iq-card-body flex-column">
                    <a href="bannerSlider_tambah.php" class="btn btn-success align-self-end mb-3 mx-3"><i class="fa fa-plus"></i> &nbsp Tambahkan Data </a>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th width="1%">No</th:w>
                                    <th>Foto Banner Slider</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1 ; ?>
                                <?php while( $no <= $rowCount ) :  ?>
                                    <?php foreach ( $sliders as $slider ) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <img src="img/bannerSlider/<?php echo $slider["banner_slider"] ?>" width="350" alt="" />
                                            </td>
                                            <td>
                                                <a href="bannerSlider_edit.php?id_slider=<?php echo $slider['id_slider'] ?>">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <span> | </span>
                                                <a href="bannerSlider_delete.php?id_slider=<?php echo $slider['id_slider'] ?>" onclick="return confirm('Apakah Kamu Yakin?')">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   

<?php
include 'includes/footer.php';
?>