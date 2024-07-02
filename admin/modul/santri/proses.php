<?php
session_start();

include_once "../../../config/config.php";
date_default_timezone_set('Asia/Jakarta');

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=../../index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['save'])) {
            $id_santri = $_POST["id_santri"];
            $nis = $_POST["nis"];
            $nama = $_POST["nama"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $alamat = $_POST["alamat"];
            $no_telpon = $_POST["no_telpon"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            $password = $_POST["nis"];
            $modEnkrip = md5($password);

            $cekid = mysqli_query($koneksidb, "SELECT * FROM user WHERE username='$nis'")
                or die('Query error: ' . mysqli_error($koneksidb));
            $cekdata = mysqli_fetch_assoc($cekid);

            $id_username = isset($cekdata["username"]) ? $cekdata["username"] : '';

            if ($nis == $id_username) {
                header("Location: ../../main.php?open=tampilsantri&alert=5");
            } else {
                $mySql = "INSERT INTO santri (id_santri, nis, nama, tgl_lahir, alamat, no_telpon, jenis_kelamin) 
                          VALUES ('$id_santri', '$nis', '$nama', '$tgl_lahir', '$alamat', '$no_telpon', '$jenis_kelamin')";
                $query = mysqli_query($koneksidb, $mySql) or die("Query error: " . mysqli_error($koneksidb));

                $mySql2 = "INSERT INTO user (nama, username, password, level_user) 
                           VALUES ('$nama', '$nis', '$modEnkrip', 'santri')";
                $query2 = mysqli_query($koneksidb, $mySql2) or die("Query error: " . mysqli_error($koneksidb));

                if ($query && $query2) {
                    header("Location: ../../main.php?open=tampilsantri&alert=1");
                }
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save']) && isset($_POST['id_santri'])) {
            $id_santri = $_POST["id_santri"];
            $nis = $_POST["nis"];
            $nama = $_POST["nama"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $alamat = $_POST["alamat"];
            $no_telpon = $_POST["no_telpon"];
            $jenis_kelamin = $_POST["jenis_kelamin"];

            $mySql = "UPDATE santri SET nis='$nis', nama='$nama', tgl_lahir='$tgl_lahir', alamat='$alamat', no_telpon='$no_telpon', jenis_kelamin='$jenis_kelamin' WHERE id_santri='$id_santri'";
            $query = mysqli_query($koneksidb, $mySql) or die("Query error: " . mysqli_error($koneksidb));

            if ($query) {
                header("Location: ../../main.php?open=tampilsantri&alert=3");
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_santri'])) {
            $id_santri = $_GET['id_santri'];

            $mySql = "DELETE FROM santri WHERE id_santri='$id_santri'";
            $query = mysqli_query($koneksidb, $mySql) or die("Query error: " . mysqli_error($koneksidb));

            if ($query) {
                header("Location: ../../main.php?open=tampilsantri&alert=2");
            }
        }
    }
}
