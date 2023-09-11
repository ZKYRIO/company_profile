<?php
Require 'includes/koneksi.php';
include 'includes/header.php';

// Ambil data user dari database
$users = mysqli_query($db, "SELECT * FROM user");
$rowCount = mysqli_num_rows($users);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Data Pengguna</h4>
                    </div>
                </div>

                <div class="iq-card-body flex-column">
                    <a href="user_tambah.php" class="btn btn-success align-self-end mb-3 mx-3"><i class="fa fa-plus"></i> &nbsp Tambahkan Data </a>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="15%">Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1 ; ?>
                                <?php while( $no <= $rowCount ) :  ?>
                                    <?php foreach ( $users as $user ) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>
                                            <img src="img/users/<?php echo $user['foto_user']; ?>" width="100" alt="">
                                        </td>
                                        <td><?php echo $user['nama_user']; ?></td>
                                        <td><?php echo $user['email_user']; ?></td>
                                        <td>
                                            <a href="user_edit.php?id_user=<?php echo $user['id'] ?>">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <span> | </span>
                                            <a href="user_delete.php?id_user=<?php echo $user['id'] ?>" onclick="return confirm('Apakah Kamu Yakin?')">
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