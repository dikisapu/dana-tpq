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

            $id_jadwalmatapelajaran = $_POST["id_jadwalmatapelajaran"];
            $hari = $_POST["hari"];
            $jam_mulail = $_POST["jam_mulai"];
            $jam_selesai = $_POST["jam_selesai"];
            $id_guru = $_POST["id_guru"];
            $id_matapelajaran = $_POST["id_matapelajaran"];

            $mySql    = "INSERT INTO jadwalmatapelajaran
                                  VALUES('$id_matapelajaran','$jam_mulai','$jam_selesai','$id_guru' , '$id_matapelajaran')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampiljadwalmatapelajaran&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_santri'])) {

                $id_santri = $_POST["id_santri"];
                $nama = $_POST["nama"];
                $ttl = $_POST["ttl"];
                $alamat = $_POST["alamat"];
                $telp = $_POST["telp"];
                $id_tingkatan = $_POST["id_tingkatan"];

                $mySql = "UPDATE santri SET nama='$nama', ttl='$ttl' ,alamat='$alamat' ,telp='$telp' ,id_tingkatan='$id_tingkatan' WHERE id_santri='$id_santri'";
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
