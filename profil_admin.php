<?php
session_start();
error_reporting(0);
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login_admin.php"</script>';
}
$query = mysqli_query($konek, "SELECT *FROM tb_admin WHERE id_admin = '" . $_SESSION['id'] . "'");
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
        <h3 class="mt-4">Profil Admin</h3>
        <form action="" method="POST">
            <div class="mb-3 row ">
                <label for="nama" class="col-sm-6 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $d->nama_admin; ?>">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="pass2" claspass2ol-sm-6 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" id="nama" value="<?= $d->alamat_admin; ?>">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="email" class="col-sm-6 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" value="<?= $d->email_admin; ?>">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="no_hp" class="col-sm-6 col-form-label">no_hp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_hp" id="nama" value="<?= $d->hp_admin; ?>">
                </div>
            </div>
            <button class="btn btn-primary" name="ubah_profil"> Ubah</button>
        </form>
        <?php
        if (isset($_POST['ubah_profil'])) {
            $nama = ucwords($_POST['nama']);
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $update = mysqli_query($konek, "UPDATE tb_admin SET 
  nama_admin= '" . $nama . "',
  alamat_admin= '" . $alamat . "',
  email_admin= '" . $email . "',
  hp_admin= '" . $no_hp . "' WHERE id_admin = $d->id_admin;

 
 ");
            if ($update) {
                echo '<script> alert ("data berhasil di ubah")</script>';
                echo '<script> window.location = "profil_admin.php"</script>';
            } else {
                echo ' gagal' . mysqli_error($konek);
            }
        }

        ?>
        <h3 class="mt-4">Profil Admin</h3>
        <form action="" method="POST">
            <div class="mb-3 row ">
                <label for="pass1" class="col-sm-6 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pass1" id="pass1">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="pass2" class="col-sm-6 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pass2" id="pass2">
                </div>
            </div>

            <button class="btn btn-primary" name="ubah_password"> Ubah</button>
        </form>
        <?php
        if (isset($_POST['ubah_password'])) {
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if ($pass2 != $pass1) {
                echo '<script>alert("Konfirmasi Password Tidak sesuai")</script>';
            } else {
                $u_pass = mysqli_query($konek, "UPDATE tb_admin SET 
sandi_admin = '" . $pass1 . "' WHERE id_admin = $d->id_admin");
                if ($u_pass) {
                    echo '<script> alert ("data berhasil di ubah")</script>';
                    echo '<script> window.location = "profil_admin.php"</script>';
                } else {
                    echo 'gagal' . mysqli_error($konek);
                }
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