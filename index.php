<?php
include('includes/header.php');
include('index_func.php');
?>

<!-- Header -->
<header>
    <!-- <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

            
                <div class="carousel-item">
                    <img src="../admin/img/bannerSlider/<?php echo $bannerSlider['banner_slider'] ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> -->

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <?php foreach ($sliders as $key => $bannerSlider) : ?>
                <div class="carousel-item <?php if ($key == 0) {
                                                echo 'active';
                                            } ?>">
                    <img src="admin/img/bannerSlider/<?php echo $bannerSlider['banner_slider']; ?>" class="d-block w-100">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>
<!-- Close Header -->

<!-- Content -->
<main>
    <section class="about">
        <div class="container">
            <div class="row mb-4">
                <h2 class="mb-4 text-center">
                    <span class="text-color">Visi</span> dan <span class="text-color">Misi</span> <?php echo $identitasWeb['copyright_instansi'] ?>
                </h2>
                <div class="col-md-6 visi">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Visi</h5>
                            <p class="card-text">
                                <?php echo $identitasWeb['visi_instansi']; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-body text-center">
                            <h5 class="card-title">Misi</h5>
                            <p class="card-text">
                                <?php echo $identitasWeb['misi_instansi']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile-pic">
                                    <img src="../companyProfile/admin/img/identitasWeb/<?php echo $identitasWeb['banner_profile'] ?>" alt="" style="width: 100% !important; height: 22.7rem !important; object-fit: cover !important;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Profile Perusahaan</h4>
                                    <p class="card-text">
                                        <?php echo $identitasWeb['profile_instansi'] ?>
                                    </p>
                                    <a href="#" class="btn btn-bg-green">Baca Selengkapnya..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="artikel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center mb-4">Berita dan Acara</h2>
                </div>
            </div>

            <div class="row row-gap-3">
                <?php foreach ($articles as $article) : ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="news-img">
                                <img src="../companyProfile/admin/img/bannerArtikel/<?php echo $article['banner_artikel'] ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $article['judul_artikel'] ?></h5>
                                <p class="card-text"><?php echo $article['deskripsi_artikel'] ?></p>
                            </div>
                            <a href="detail-blog.php?id_artikel=<?php echo $article['id_artikel'] ?>" class="btn btn-bg-green">Baca Selengkapnya...</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="row mt-3 justify-content-end">
                <div class="col-md-4">
                    <div class="see-more d-flex justify-content-end">
                        <a href="blog.php" class="btn">
                            <span class="position-relative">See More Update</span>
                            <i class="fa-solid fa-arrow-right" style="color: #000000;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Close Content -->

<?php
include('./includes/footer.php')
?>