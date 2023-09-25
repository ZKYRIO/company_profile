<?php
include('includes/header.php');
include('detail-blog_func.php');
?>
    <!-- Content -->
    <main>
        <section class="detail-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-item">
                            <div class="blog-item-content">
                                <h1 class="blog-title mb-4">
                                    <?php echo $articleUser['judul_artikel'] ?>
                                </h1>
                                <div class="blog-content-penulis mb-4">
                                    <img src="../companyProfile/admin/img/users/<?php echo $articleUser['foto_user'] ?>" alt="" width="50">
                                    <div class="informasi-creator ms-3">
                                        <span><?php echo $articleUser['nama_user'] ?></span>
                                        <span><?php echo $date ?></span>
                                    </div>
                                </div>
                                <div class="blog-item-img">
                                    <img src="../companyProfile/admin/img/bannerArtikel/<?php echo $articleUser['banner_artikel'] ?>" alt="">
                                </div>
                            </div>
                            <div class="blog-item-body mt-4">
                                <p>
                                    <?php echo $articleUser['isi_artikel'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar-latepost card border-0">
                            <h5 class="mb-3 border-bottom pb-2">Blog Terbaru</h5>

                            <?php foreach( $articleUserNews as $articleUserNew) : ?>
                            <?php 
                                //mengubah format tanggal 
                                $date = strtotime($articleUserNew['tanggal_artikel']);
                                $date = date("d - m - Y", $date);
                            ?>
                            <div class="latepost-blog d-flex mb-3">
                                <a href="detail-blog.php?id_artikel=<?php echo $articleUserNew['id_artikel'] ?>">
                                    <div class="latepost-blog-img me-3">
                                        <img class="" src="../companyProfile/admin/img/bannerArtikel/<?php echo $articleUserNew['banner_artikel'] ?>" width="100%" alt="" >
                                    </div>
                                </a>
                                <div class="latepost-blog-body">
                                    <h6 class="m-0">
                                        <a href="detail-blog.php?id_artikel=<?php echo $articleUserNew['id_artikel'] ?>" class="blog-title">
                                            <?php echo $articleUserNew['judul_artikel'] ?>
                                        </a>
                                    </h6>
                                    <span class="latepost-blog-date"><?php echo $date ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Close Content -->

<?php
include('includes/footer.php')
?>