<?php
session_start();

include_once "../../config/config.php";
date_default_timezone_set('Asia/Jakarta');

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=../../index.php?alert=1'>";
} else {
    if ($_GET['act'] =='insert') {
        if (isset($_POST['save'])) {

            $random = (rand() % 999);

            $id_santri = $_POST["id_santri"];
            $nama = $_POST["nama"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $alamat = $_POST["alamat"];
            $no_telpon = $_POST["no_telpon"];
            $jenis_kelamin = $_POST["jenis_kelamin"];

            $mySql    = "INSERT INTO santri
                                  VALUES('$id_santri','$nama', '$tgl_lahir', '$alamat' , '$no_telpon' , '$jenis_kelamin')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
            if ($query) {
                header("location: ../../main.php?open=tampilsantri&alert=1");
            }
        }
    } elseif ($_GET['act'] =='update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_santri'])) {

            $id_santri = $_POST["id_santri"];
            $nama = $_POST["nama"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $alamat = $_POST["alamat"];
            $no_telpon = $_POST["no_telpon"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
           
                $mySql = "UPDATE santri SET nama='$nama', tgl_lahir='$tgl_lahir' ,alamat='$alamat' ,no_telpon='$no_telpon' WHERE id_santri='$id_santri'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampilsantri&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_santri'])) {
            $id_santri = $_GET['id_santri'];

            $mySql = "DELETE FROM santri WHERE id_santri='$id_santri'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilsantri&alert=2");
            }
        }
    }
}
