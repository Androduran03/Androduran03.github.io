<?php

session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login_admin.php"</script>';
}
$query = mysqli_query($konek, "SELECT *FROM tb_destinasi WHERE id_destinasi='" . $_GET['ide'] . "'");
$d = mysqli_fetch_object($query);

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
                    <a class="nav-link" href="galerry.php">Gallery</a>

                    <a class="nav-link" href="Logout.php">Keluar</a>


                </div>
            </div>
        </div>
    </nav>
    <div class="container">

        <h3 class="mt-4">Edit About</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row ">
                <label for="nama_destinasi" class="col-sm-6 col-form-label">Nama Destinasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_destinasi" id="nama_destinasi" value="<?= $d->nama_destinasi; ?>">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="deskripsi_destinasi" class="col-sm-6 col-form-label">Deskripsi Destinasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi_destinasi" id="deskripsi_destinasi" value="<?= $d->deskripsi_destinasi; ?>">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="foto_destinasi" class="col-sm-6 col-form-label">Foto Destinasi</label>

                <div class="col-sm-8">
                    <a href="img/<?= $d->foto_destinasi; ?>"><img src="img/<?= $d->foto_destinasi; ?>" alt="" width="50" class="mb-2"></a>
                    <input type="hidden" name="foto" value="<?= $d->foto_destinasi; ?>">
                    <input type="file" class="form-control" name="foto_destinasi" id="foto_destinasi">
                </div>
            </div>


            <button class="btn btn-primary" name="ubah_destinasi"> Ubah</button>
        </form>
        <?php

        if (isset($_POST['ubah_destinasi'])) {
            $nama_destinasi = $_POST['nama_destinasi'];
            $deskripsi_destinasi = $_POST['deskripsi_destinasi'];
            $foto = $_POST['foto'];
            $filename = $_FILES['foto_destinasi']['name'];
            $tmp_name = $_FILES['foto_destinasi']['tmp_name'];

            if ($filename != '') {
                $type1 = explode('.', $filename);
                $type2 = $type1[1];
                $new_name = 'foto' . time() . '.' . $type2;
                $type_dizinkan = array('jpeg', 'png', 'jpg', 'jfif');
                if (!in_array($type2, $type_dizinkan)) {
                    echo '<script>alert("type file tidak di izinkan")</script>';
                } else {
                    unlink('./img/' . $foto);
                    move_uploaded_file($tmp_name, './img/' . $new_name);
                    $namagambar = $new_name;
                }
            } else {
                $namagambar = $foto;
            }
            $u_destinasi = mysqli_query($konek, "UPDATE tb_destinasi SET 
            nama_destinasi = '" . $nama_destinasi . "',deskripsi_destinasi = '" . $deskripsi_destinasi . "',foto_destinasi='" . $namagambar . "' WHERE id_destinasi = $d->id_destinasi");
            if ($u_destinasi) {
                echo '<script> alert ("data berhasil di ubah")</script>';
                echo '<script> window.location = "destinasi.php"</script>';
            } else {
                echo 'gagal' . mysqli_error($konek);
            }
        }
        ?>
    </div>
    <footer class="mt-4">
        <div class="container">
            <small> @copyright 2021 Andro duran</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>