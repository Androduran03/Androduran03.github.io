<?php
include 'koneksi.php'


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;300&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Mconik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="#gallery">Gallery</a>
                    <a class="nav-link" href="#contact">Kontak</a>
                </div>
            </div>

        </div>
    </nav>
    <!-- akir navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid ">
        <div class="container">
            <h1 class="display-4 ">Mari <span>Rawat </span> dan <span>Lestarikan</span> </h1>
            <p class="efek-ngetik text-white"></p>
            <a href="more.php" class="btn btn-primary tombol ">More</a>
        </div>
    </div>
    <!-- akir jumbotron -->

    <!-- container -->


    <!-- info panel -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row ">
                    <div class="col-lg ">
                        <img src="img/mabar.jfif" alt="jemurkopi" class="float-start">
                        <h4>Manggarai Barat</h4>
                        <p>Berdiri pada Tahun 2003</p>
                    </div>
                    <div class="col-lg">
                        <img src="img/mateng.jfif" alt="jemurkopi" class="float-start">
                        <h4>Manggarai Tengah</h4>
                        <p>Merupakan Kabupaten Induk.</p>
                    </div>
                    <div class="col-lg">
                        <img src="img/matim.jfif" alt="jemurkopi" class="float-start">
                        <h4>Manggarai Timur</h4>
                        <p>Berdiri pada Tahun 2007</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akir info panel -->

    <!-- akir container -->

    <!-- about -->
    <section id="about">
        <div class="container" data-aos="fade-in">
            <div class="row text-center">

                <h2>About</h2>
            </div>
            <?php
            $about = mysqli_query($konek, "SELECT * FROM tb_about order by id_about desc");

            ?>


            <div class="row">
                <?php foreach ($about as $a) : ?>
                    <div class="col-md-4 text-center p-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100">
                        <img src="img/<?= $a['foto_about']; ?>" alt="" width="200" class="rounded-circle img-thumbnail shadow-lg mb-2">
                        <h4 class="text-center"><?= $a['nama_about']; ?></h4>
                        <p><?= $a['deskripsi_about']; ?></p>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- akir about -->
    <!-- parawisata -->
    <section id="parawisata">
        <?php

        $destinasi = mysqli_query($konek, "SELECT * FROM tb_destinasi");
        ?>


        <div class="container">
            <div class="row text-center">
                <h2>Destinasi Wisata</h2>
                <div class="col-12 mx-auto">
                    <p>Deretan Tempat Wisata di Manggarai yang Menawan. Saat mengunjungi kota Nusa Tenggara Timur sebaiknya jangan lupa mengunjungi kota Manggarai untuk menikmati segudang keunikan</p>
                </div>
            </div>

            <div class="row g-3">
                <?php foreach ($destinasi as $a) : ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="parawisata">
                            <a href="img/<?= $a['foto_destinasi']; ?>"> <img src="img/<?= $a['foto_destinasi']; ?>" alt=""></a>
                            <div class="overlay">
                                <div>
                                    <h4 class="text-white"><?= $a['nama_destinasi']; ?></h4>
                                    <p><a href="lihat-destinasi.php?idd=<?= $a['id_destinasi']; ?>" class="btn btn-primary">Coba Lihat</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- akir parawisata -->

    <!-- galeri -->


    <section id="gallery">

        <div class="container">
            <div class="row">
                <div class="col-12 section-intro">
                    <h2 class="text-center">Gallery</h2>

                </div>
            </div>
            <?php

            $gallery = mysqli_query($konek, "SELECT * FROM tb_gallery");
            ?>
            <div class="row justify-content-center">
                <?php foreach ($gallery as $a) : ?>
                    <div class="col-md-3">

                        <a href="img/<?= $a['foto_gallery']; ?>" target="_blank">
                            <img src="img/<?= $a['foto_gallery']; ?>" alt="" class="img-fluid gallery-img">
                        </a>

                    </div>
                <?php endforeach; ?>

            </div>

        </div>
        </div>


    </section>

    <!-- akir Galeri -->
    <!-- kontak -->

    <section id="contact">
        <?php
        $kontak = mysqli_query($konek, "SELECT*FROM tb_admin");
        $k = mysqli_fetch_object($kontak);
        ?>

        <div class="container">
            <div class="intro-text">
                <h2>Kontak Kami</h2>
                <p>Hubungi Kami. Jika Anda memiliki pertanyaan atau masalah dengan salah satu layanan kami</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                        <strong>Terimakasih</strong> Pesan Anda Sudah Kami Terimah
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form name="Mconik-Kontak-Form">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama anda">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-kirim">Kirim</button>
                        <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
            <div class="theree-col-grid">
                <div class="contact-info hover-effect">
                    <div class="icon-box">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h6 class="h5">Telephon:</h6>
                    <span><?= $k->hp_admin; ?></span> <br>

                </div>
                <div class="contact-info hover-effect">
                    <div class="icon-box">
                        <i class="bi bi-map-fill"></i>
                    </div>
                    <h6 class="h5">Email :</h6>
                    <span><?= $k->email_admin; ?></span>

                </div>
                <div class="contact-info hover-effect">
                    <div class="icon-box">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h6 class="h5">Alamat:</h6>
                    <span><?= $k->alamat_admin; ?></span> <br>
                    <span>Indonesia</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735004.9669166685!2d120.06829405036221!3d-8.61745188285886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db377cb7a53c435%3A0x3564af615d5f1776!2sManggarai%20Regency%2C%20East%20Nusa%20Tenggara!5e0!3m2!1sen!2sid!4v1655293498454!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!--akir kontak -->

    <!-- footer -->
    <footer class="bg-dark text-center footer">
        <small class=" text-white">Created With <i class="bi bi-heart-fill text-warning"></i> by <a class="text-white fw-bold" href="https://www.instagram.com/patrisiusduran03/">Andro Duran</a> </small>
    </footer>

    <script src="js/script.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        gsap.from('.navbar', {
            duration: 1.5,
            y: '-100%',
            opacity: 0,
            ease: 'bounce'
        });
    </script>
    <script>
        const galleryImg = document.querySelectorAll('.gallery-img');
        galleryImg.forEach((img, i) => {
            img.dataset.aos = 'fade-down';
            img.dataset.aosDelay = i * 100;
        })
        AOS.init({
            once: true,
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbxYQzK8EGczhAOdRE60pq_nPbW4KrEYtMGe4wpWhQmxNxG8X_Qbp_I2wBbJ6xmn4OM4kw/exec';
        const form = document.forms['Mconik-Kontak-Form'];
        const btnKirim = document.querySelector('.btn-kirim');
        const btnLoading = document.querySelector('.btn-loading');
        const myAlert = document.querySelector('.my-alert');





        form.addEventListener('submit', e => {
            e.preventDefault();

            //ketika tombol submit di klik
            //tampilkan tombol Loading, hilangkan tombol kirim


            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    //tampilakn tombol Kirim ,Hilangkan tombol Loading 
                    btnKirim.classList.toggle('d-none');
                    btnLoading.classList.toggle('d-none');
                    myAlert.classList.toggle('d-none');

                    //tampilkan my alert
                    form.reset();
                    console.log('Success!', response);
                })
                .catch(error => console.error('Error!', error.message))
        })
    </script>

</body>

</html>