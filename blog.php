<?php
include('includes/header.php');
include('blog_func.php');
?>

    <!-- Content -->
    <main>
        <section class="blog">
            <div class="container">
                <div class="row">
                    <!-- Artikel Utama -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="blog-terbaru">
                                    <div class="blog-item-img">
                                        <img src="../companyProfile/admin/img/bannerArtikel/<?php echo $articleUserNew['banner_artikel'] ?>" width="100%" alt="">
                                    </div>
                                    <div class="blog-item-content">
                                        <div class="container">
                                            <h2 class="blog-title">
                                                <a href="detail-blog.php?id_artikel=<?php echo $articleUserNew['id_artikel'] ?>" >
                                                    <?php echo $articleUserNew['judul_artikel'] ?>
                                                </a>
                                            </h2>

                                            <div class="blog-informasi pb-3">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="blog-penulis">
                                                            <div class="identitas-penulis">
                                                                <img src="../companyProfile/admin/img/users/<?php echo $articleUserNew['foto_user'] ?>" class="rounded" alt="" width="50">
                                                                <span><?php echo $articleUserNew['nama_user'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 date">
                                                        <div class="blog-date">
                                                            <i class="fa-solid fa-calendar-days" style="color: #000000;"></i>
                                                            <span><?php echo $date ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class=" blog-desk"><?php echo $articleUserNew['deskripsi_artikel'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php foreach($articleUsers as $articleUser) : ?>
                        <div class="blog-lain mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="detail-blog.php?id_artikel=<?php echo $articleUser['id_artikel'] ?>" class="blog-img">
                                        <img src="../companyProfile/admin/img/bannerArtikel/<?php echo $articleUser['banner_artikel'] ?>" width="100%" alt="">
                                    </a>
                                </div>
                                <div class="col-md-6 blog-detail">
                                    <a href="detail-blog.php?id_artikel=<?php echo $articleUser['id_artikel'] ?>" class="blog-title">
                                        <h4><?php echo $articleUser['judul_artikel'] ?></h4>
                                    </a>
                                    <span><?php echo $articleUser['deskripsi_artikel'] ?></span>
                                    <div class="informasi-penulis mt-3">
                                        <img src="../companyProfile/admin/img/users/<?php echo $articleUser['foto_user'] ?>" class="rounded" width="50" alt="">
                                        <span class="nama-penulis"><?php echo $articleUser['nama_user'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <div class="see-more-blog mt-5">
                            <a class="btn" id="load_btn">
                                <span>Tampilkan Artikel Lainnya</span>
                                <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar & Latepost Blog -->
                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="sidebar-search mb-5">
                                <form action="">
                                    <input class="form-control" type="text" name="search" placeholder="Cari Judul Blog">
                                    <button type="submit" class="btn btn-bg-green mt-2 text-uppercase">Cari</button>
                                </form>
                            </div>
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
            </div>
        </section>
    </main>
    <!-- Close Content -->

    <script>

        // ambil data dari local storage
        var limit = localStorage.getItem('limit');

        // cek apakah sudah ada data di local storage
        if (limit === null) {
            // Jika data belum ada, inisialisasikan limit awal
            limit = 0;
        } else {
            // Jika data sudah ada, konversi dari string ke angka
            limit = parseInt(limit);
        }

        var limitElement = document.getElementById("load_btn");
        var tautan = document.getElementById("load_btn");

        tautan.addEventListener("click", function() {
            // Tambahkan ke limit
            limit++;
            
            // Simpan limit di localStorage
            localStorage.setItem('limit', limit);
            
            // Perbarui URL 
            tautan.setAttribute("href", "blog.php?limit=" + limit);


        });

        // hapus value limit dari local storage
        document.addEventListener("DOMContentLoaded", function() {
            localStorage.removeItem("limit")
        })

    </script>

<?php
include('includes/footer.php')
?>