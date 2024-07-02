<?php
session_start();

include_once "../../config/config.php";
date_default_timezone_set('Asia/Jakarta');

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=../../index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['save'])) {

            $random = (rand() % 999);

            $id_guru = $_POST["id_guru"];
            $nama = $_POST["nama"];
            $ttl = $_POST["ttl"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            $alamat = $_POST["alamat"];
            $telp = $_POST["telp"];
            $id_matapelajaran = $_POST["id_matapelajaran"];

            $mySql    = "INSERT INTO guru
                                  VALUES('$id_guru','$nama','$ttl','$jenis_kelamin' , '$alamat' , '$telp' , '$id_matapelajaran')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilguru&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_guru'])) {

                $id_guru = $_POST["id_guru"];
                $nama = $_POST["nama"];
                $ttl = $_POST["ttl"];
                $alamat = $_POST["alamat"];
                $telp = $_POST["telp"];
                $id_matapelajaran = $_POST["id_matapelajaran"];

                $mySql = "UPDATE guru SET nama='$nama', ttl='$ttl' ,alamat='$alamat' ,telp='$telp' ,id_matapelajaran='$id_matapelajaran' WHERE id_santri='$id_santri'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampilguru&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_guru'])) {
            $id_guru = $_GET['id_guru'];

            $mySql = "DELETE FROM guru WHERE id_guru='$id_guru'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilguru&alert=2");
            }
        }
    }
}
