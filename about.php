<?php

session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login_admin.php"</script>';
}
$about = mysqli_query($konek, "SELECT*FROM tb_about");



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="dasboard_admin.php">Dasboard</a>
                    <a class="nav-link" href="profil_admin.php">Profil</a>
                    <a class="nav-link" href="about.php">About</a>
                    <a class="nav-link" href="destinasi.php">Destinasi</a>
                    <a class="nav-link" href="gallery.php">Gallery</a>

                    <a class="nav-link" href="Logout.php">Keluar</a>


                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <a href="tambah-about.php" class=" btn btn-warning mt-4 text-white"> Tambah About</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">nama_about</th>
                    <th scope="col">deskripsi_about</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($about as $a) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $a['nama_about']; ?></td>
                        <td width="60%"> <?= $a['deskripsi_about']; ?></td>
                        <td><img src="img/<?= $a['foto_about']; ?>" alt="" width="50px"></td>
                        <td>
                            <a href="edit-about.php?ide=<?= $a['id_about']; ?>" class="btn btn-primary">Edit</a>
                            <a href="hapus.php?ida=<?= $a['id_about']; ?>" class="btn btn-danger" onclick="return confirm('yakin ingin di hapus')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <footer class="mt-4">
        <div class="container">
            <small> @copyright 2021 Andro duran</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>