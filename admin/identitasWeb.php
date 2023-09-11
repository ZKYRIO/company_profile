<?php
include 'includes/header.php';

// Ambil data user dari database
$identitaswebs = mysqli_query($db, "SELECT * FROM identitas_web");
$rowCount = mysqli_num_rows($identitaswebs);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Data Identitas Web</h4>
                    </div>
                </div>

                <div class="iq-card-body flex-column">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th width="1%">No</th:w>
                                    <th>Nama Instansi</th>
                                    <th>Logo Instansi</th>
                                    <th>visi instansi</th>
                                    <th>Misi instansi</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1 ; ?>
                                <?php while( $no <= $rowCount ) :  ?>
                                    <?php foreach ( $identitaswebs as $identitasweb ) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $identitasweb['nama_instansi']; ?></td>
                                        <td>
                                            <img src="img/identitasWeb/<?php echo $identitasweb['logo_instansi']; ?>" alt="">
                                        </td>
                                        <td><?php echo $identitasweb['visi_instansi']; ?></td>
                                        <td><?php echo $identitasweb['misi_instansi']; ?></td>
                                        <td>
                                            <a href="identitasWeb_edit.php?id_identitasWeb=<?php echo $identitasweb['id_identitasWeb']; ?>">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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