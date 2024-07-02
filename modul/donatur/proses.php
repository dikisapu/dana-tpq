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

            $id_donatur = $_POST["id_donatur"];
            $nama= $_POST["nama"];
            $alamat = $_POST["alamat"];
            $no_telpon = $_POST["no_telpon"];
            $jenis_donatur = $_POST["jenis_donatur"];

            $mySql    = "INSERT INTO donatur
                                  VALUES('$id_donatur','$nama','$alamat' , '$no_telpon' , '$jenis_donatur')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampildonatur&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_donatur'])) {

            $id_donatur = $_POST["id_donatur"];
            $nama = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $no_telpon = $_POST["no_telpon"];
            $jenis_donatur = $_POST["jenis_donatur"];

                $mySql = "UPDATE donatur SET nama='$nama',alamat='$alamat' ,no_telpon='$no_telpon' ,jenis_donatur='$jenis_donatur' WHERE id_donatur='$id_donatur'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampildonatur&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_donatur'])) {
            $id_guru = $_GET['id_donatur'];

            $mySql = "DELETE FROM donatur WHERE id_donatur='$id_donatur'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampildonatur&alert=2");
            }
        }
    }
}
