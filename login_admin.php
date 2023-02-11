<?php
include 'koneksi.php';
session_start();
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
    <div class="container">
        <h2 class="text-center text-danger mt-4 p-2 ">Login Admin</h2>
        <form action="" method="POST">

            <div class="mb-3 row ">
                <label for="Username" class="col-sm-6 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username_admin" id="Username">
                </div>
            </div>
            <div class="mb-3 row ">
                <label for="Password" class="col-sm-6 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="sandi_admin" id="sandi">
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-center" name="submit">Login</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($konek, $_POST['username_admin']);
            $sandi = mysqli_real_escape_string($konek, $_POST["sandi_admin"]);
            $login = mysqli_query($konek, "SELECT * FROM tb_admin WHERE username_admin = '" . $username . "' AND sandi_admin='" . $sandi . "'");
            if (mysqli_num_rows($login) > 0) {
                $cek = mysqli_fetch_object($login);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $cek;
                $_SESSION['id'] = $cek->id_admin;

                echo ' <script>window.location="dasboard_admin.php"</script>';
            } else {
                echo '<script>alert("password dan username salah")</script> ';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>