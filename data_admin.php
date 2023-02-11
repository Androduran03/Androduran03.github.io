<?php

include 'koneksi.php';

$admin = mysqli_query($konek, "SELECT*FROM tb_admin");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Admin</title>
</head>

<body>
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
            <h2>Data Admin</h2>



            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">No HP</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($admin as $a) : ?>

                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $a['username_admin']; ?></td>
                            <td><?= $a['sandi_admin']; ?></td>
                            <td><?= $a['nama_admin']; ?></td>
                            <td><?= $a['alamat_admin']; ?></td>
                            <td><?= $a['email_admin']; ?></td>
                            <td><?= $a['hp_admin']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

    </html>
</body>

</html>