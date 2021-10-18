<?php

$id = $_GET['id'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://chatomz.bunefit.com/api/hewan/'.$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dunia Hewan</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">Dunia Hewan</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Beranda</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Jenis <?=$data->hewan->nama?></a></li>
                        <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Tentang</a></li> -->
                        <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Kontak</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Selamat Datang Di Dunia Hewan</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Kumpulan informasi tentang dunia hewan</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Daftar Hewan Jenis  <?=$data->hewan->nama?></h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <?php 
                        if (count($data->jenis) == 0) {
                            ?>
                            <div class="col text-center">
                                <strong class="mb-2">Data Belum Ada</strong> <br>
                                <a href="index.php" class="btn btn-primary btn-sm">Kembali ke beranda</a>
                            </div>
                            <?php
                        } else {
                            foreach ($data->jenis as $item) {
                                ?>
                                <!-- Portfolio Item 1-->
                                <div class="col-md-6 col-lg-4 mb-5">
                                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal<?=$item->id?>">
                                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-search fa-3x"></i> <br><small><?=ucwords($item->nama_jenis)?></small> </div>
                                        </div>
                                        <img class="img-fluid" src="https://chatomz.bunefit.com/public/img/company/informasi/hewan/<?=$item->gambar_jenis?>" alt="gambar hewan" />
                                    </div>
                                </div>
                                <div class="portfolio-modal modal fade" id="portfolioModal<?=$item->id?>" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                            <div class="modal-body pb-5">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 col-md-12 text-center">
                                                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-2"><?=$item->nama_jenis?></h2>
                                                            <div class="divider-custom">
                                                                <div class="divider-custom-line"></div>
                                                                <!-- <div class="divider-custom-icon"><i class="fas fa-star"></i></div> -->
                                                                <div class="divider-custom-icon fst-italic"><?=$item->nama_latin_jenis?></div>
                                                                <div class="divider-custom-line"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 text-center">
                                                            <!-- Portfolio Modal - Title-->
                                                            <!-- Icon Divider-->
                                                            <!-- Portfolio Modal - Image-->
                                                            <img class="img-fluid rounded mb-5" src="https://chatomz.bunefit.com/public/img/company/informasi/hewan/<?=$item->gambar_jenis?>" alt="..." />
                                                            <!-- Portfolio Modal - Text-->
                                                            <!-- <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                                                                <i class="fas fa-times fa-fw"></i>
                                                                Close Window
                                                            </button> -->
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 p-2">
                                                            <h5 class="mb-4"><?=$item->tentang_jenis?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Tentang</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">Website ini digunakan untuk memberikan informasi seputar dunia hewan, dimana akan ada banyak informasi dunia hewan.</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Silahkan mencari tahu mengenai hewan yang ada di dunia, melalui website ini diharapkan kita bisa lebih mengetahui keberagaman dunia hewan</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="https://bunefit.com/">
                        <i class="fas fa-download me-2"></i>
                        Website Utama
                    </a>
                </div>
            </div>
        </section>
      
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Lokasi</h4>
                        <p class="lead mb-0">
                            Perum Cipta Graha Mandiri Blok A23
                            <br />
                            Bungursari, Kota Tasikmalaya
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/firman_chatomz/"><i class="fab fa-fw fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/firman.chatomz" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/firman_chatomz" target="_blank"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://bunefit.com/" target="_blank"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Tentang Chatomz</h4>
                        <p class="lead mb-0">
                            Senang berbagi informasi
                            <a href="https://bunefit.com">Bunefit</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Chatomz Company 2021</small></div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
