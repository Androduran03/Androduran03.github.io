<?php

include 'koneksi.php';


if (isset($_GET['idd'])) {
    $destinasi = mysqli_query($konek, "SELECT *FROM tb_destinasi WHERE id_destinasi='" . $_GET['idd'] . "'");
    $d = mysqli_fetch_object($destinasi);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lihat Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;300&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success p-2 ">
        <div class="container">
            <a class="navbar-brand" href="#">Mconik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>

                </div>
            </div>
        </div>
    </nav>
    <!-- akir navbar -->

    <!-- lihat destinasi -->



    <div class="container">
        <div class="card m-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="img/<?= $d->foto_destinasi; ?>" class="img-fluid rounded-start img-thumbnail" alt="..." width="100%">
                </div>
                <div class="col-md-6 lihat-destinasi">
                    <div class="card-body ">
                        <h5 class="card-title"><?= $d->nama_destinasi; ?></h5>
                        <p class="card-text"><?= $d->deskripsi_destinasi; ?></p>
                        <div class="text-center">
                            <h6 class="text-success ">follow Us : </h6>
                            <small><a href="https://www.facebook.com/candrox durann/"><i class="bi bi-facebook text-primary d-inline"></i></a></small>
                            <small><a href="https://www.instagram.com/patrisiusduran03/"><i class="bi bi-instagram text-danger d-inline"></i></a></small>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- akir destinasi -->

    <div class="row">
        <div class="col">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d735004.9669166685!2d120.06829405036221!3d-8.61745188285886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db377cb7a53c435%3A0x3564af615d5f1776!2sManggarai%20Regency%2C%20East%20Nusa%20Tenggara!5e0!3m2!1sen!2sid!4v1655293498454!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!--akir kontak -->

    <!-- footer -->
    <footer class="bg-dark text-center footer">
        <small class=" text-white pt-3">Created With <i class="bi bi-heart-fill text-warning"></i> by <a class="text-white fw-bold" href="https://www.instagram.com/patrisiusduran03/">Andro Duran</a> </small>
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
</body>

</html>