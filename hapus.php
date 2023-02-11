<?php
include 'koneksi.php';

if (isset($_GET['idd'])) {
    $delete = mysqli_query($konek, "SELECT foto_destinasi FROM tb_destinasi WHERE id_destinasi = '" . $_GET['idd'] . "'");
    $d = mysqli_fetch_object($delete);
    unlink('./img/' . $d->foto_destinasi);
    $hapus = mysqli_query($konek, "DELETE FROM tb_destinasi WHERE id_destinasi = '" . $_GET['idd'] . "'");
    echo '<script> alert ("data berhasil di hapus")</script>';
    echo '<script> window.location = "destinasi.php"</script>';
}
if (isset($_GET['idg'])) {
    $delete = mysqli_query($konek, "SELECT foto_gallery FROM tb_gallery WHERE id_gallery ='" . $_GET['idg'] . "' ");
    $d = mysqli_fetch_object($delete);
    unlink('./img/' . $d->foto_gallery);
    $hapus = mysqli_query($konek, "DELETE FROM tb_gallery WHERE id_gallery='" . $_GET['idg'] . "'");
    echo '<script> alert ("data berhasil di hapus")</script>';
    echo '<script> window.location = "gallery.php"</script>';
}
if (isset($_GET['ida'])) {
    $delete = mysqli_query($konek, "SELECT foto_about FROM tb_about WHERE id_about = '" . $_GET['ida'] . "'");
    $d = mysqli_fetch_object($delete);
    unlink('./img/' . $d->foto_about);
    $hapus = mysqli_query($konek, "DELETE FROM tb_about WHERE id_about = '" . $_GET['ida'] . "'");
    echo '<script> alert ("data berhasil di hapus")</script>';
    echo '<script> window.location = "about.php"</script>';
}
