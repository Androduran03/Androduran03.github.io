<?php
session_start();
error_reporting(0);
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login_admin.php"</script>';
}
$query = mysqli_query($konek, "SELECT *FROM tb_about WHERE id_about ='" . $_GET['ide'] . "'");
$d = mysqli_fetch_object($query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
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
                <label for="nama_about" class="col-sm-6 col-form-label">Nama About</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_about" id="nama_about" value="<?= $d->nama_about; ?>">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="deskripsi_about"> Deskripsi</label>
                <div class="form-floating">
                    <textarea class="form-control" id="deskripsi_about" name="deskripsi_about" style="height: 100px"><?= $d->deskripsi_about; ?></textarea>
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="foto_about">
                    <h4>Gambar</h4>
                </label>
                <div class="col-sm-8">
                    <img src="img/<?= $d->foto_about; ?>" alt="" width="50px" class="mb-3 mt-3">
                    <input type="hidden" name="foto" value="<?= $d->foto_about; ?>">
                    <input type="file" class="form-control" name="foto_about" id="foto_about">
                </div>
            </div>

            <button class="btn btn-primary" name="ubah_about"> Ubah</button>
        </form>
        <?php
        if (isset($_POST['ubah_about'])) {
            $nama_about = $_POST['nama_about'];
            $deskripsi_about = $_POST['deskripsi_about'];
            $foto = $_POST['foto'];
            $filename = $_FILES['foto_about']['name'];
            $tmp_name = $_FILES['foto_about']['tmp_name'];

            if ($filename != '') {
                $type1 = explode('.', $filename);
                $type2 = $type1[1];
                $new_name = 'foto' . time() . '.' . $type2;

                $type_dizinkan = array('jpg', 'png', 'jfif', 'jpeg');
                if (!in_array($type2, $type_dizinkan)) {
                    echo ' <script>alert("file tidak di izinkan")</script>';
                } else {
                    unlink('./img/' . $foto);
                    move_uploaded_file($tmp_name, './img/' . $new_name);
                    $namagambar = $new_name;
                }
            } else {

                $namagambar = $foto;
            }




            $u_about = mysqli_query($konek, "UPDATE tb_about SET 
nama_about = '" . $nama_about . "',deskripsi_about = '" . $deskripsi_about . "',foto_about ='" . $namagambar . "' WHERE id_about = $d->id_about");
            if ($u_about) {
                echo '<script> alert ("data berhasil di ubah")</script>';
                echo '<script> window.location = "about.php"</script>';
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
    <script>
        CKEDITOR.replace('deskripsi_about');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>