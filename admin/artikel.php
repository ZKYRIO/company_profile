<?php
include 'includes/header.php';
global $_SESSION;

// ambil id_user AKTIF saat login dari session
$id_user = $_SESSION['id'];

$articles = mysqli_query($db, "SELECT * FROM artikel WHERE user_id = $id_user");
$rowCount = mysqli_num_rows($articles);

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Data Artikel</h4>
                    </div>
                </div>

                <div class="iq-card-body flex-column">
                    <a href="artikel_tambah.php" class="btn btn-success align-self-end mb-3 mx-3"><i class="fa fa-plus"></i> &nbsp Tambahkan Data </a>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th width="1%">No</th:w>
                                    <th>Judul</th>
                                    <th width="15%">Tanggal Upload</th>
                                    <th>Deskripsi</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ; ?>
                                <?php while( $no <= $rowCount ) :  ?>
                                    <?php foreach ( $articles as $article ) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $article["judul_artikel"] ?></td>
                                            <td><?php echo $article["tanggal_artikel"] ?></td>
                                            <td><?php echo $article["deskripsi_artikel"] ?></td>
                                            <td>
                                                <a href="artikel_edit.php?id_artikel=<?php echo $article['id_artikel'] ?>">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <span> | </span>
                                                <a href="artikel_delete.php?id_artikel=<?php echo $article['id_artikel'] ?>" onclick="return confirm('Apakah Kamu Yakin?')">
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