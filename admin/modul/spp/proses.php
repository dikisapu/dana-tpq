<?php
session_start();

include_once "../../../config/config.php";
date_default_timezone_set('Asia/Jakarta');

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=../../index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['save'])) {

            $random = (rand() % 999);

            $id_spp = $_POST["id_spp"];
            $tgl_bayar = $_POST["tgl_bayar"];
            $id_santri = $_POST["id_santri"];
            $jmlh_pembayaran = $_POST["jmlh_pembayaran"];
            $metode_pembayaran = $_POST["metode_pembayaran"];
            $random = rand(0, 999);
            $nama_file = $_FILES['data_upload']['name'];
            $ukuran_file = $_FILES['data_upload']['size'];
            $tipe_file = $_FILES['data_upload']['type'];
            $tmp_file = $_FILES['data_upload']['tmp_name'];
            $extensi = pathinfo($nama_file, PATHINFO_EXTENSION);
            $allowed_extensions = array('pdf', 'PDF', 'jpg', 'jpeg', 'png');
            $nama_file_new = $random . "-" . $nama_file;
            $pathdok = "berkas/" . $nama_file_new;

            if (in_array($extensi, $allowed_extensions)) {
                if (move_uploaded_file($tmp_file, $pathdok)) {
                    $mySql = "INSERT INTO spp (id_spp, tgl_bayar, id_santri, jmlh_pembayaran, metode_pembayaran, nama_file)
                          VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($koneksidb, $mySql);
                    mysqli_stmt_bind_param($stmt, 'sssdss', $id_spp, $tgl_bayar, $id_santri, $jmlh_pembayaran, $metode_pembayaran, $nama_file_new);

                    if (mysqli_stmt_execute($stmt)) {
                        header("location: ../../main.php?open=tampilspp&alert=1");
                    } else {
                        header("location: ../../main.php?open=tampilspp&alert=4");
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    header("location: ../../main.php?open=tampilspp&alert=4");
                }
            } else {
                header("location: ../../main.php?open=tampilspp&alert=4");
            }
        }} elseif ($_GET['act'] == 'update') {
            if (isset($_POST['save'])) {
                if (isset($_POST['id_spp'])) {

                    $id_spp = $_POST["id_spp"];
                    $tgl_bayar = $_POST["tgl_bayar"];
                    $id_santri = $_POST["id_santri"];
                    $jmlh_pembayaran = $_POST["jmlh_pembayaran"];
                    $metode_pembayaran = $_POST["metode_pembayaran"];

                    $random = (rand() % 999);
                    $nama_file          = $_FILES['data_upload']['name'];
                    $ukuran_file        = $_FILES['data_upload']['size'];
                    $tipe_file          = $_FILES['data_upload']['type'];
                    $tmp_file           = $_FILES['data_upload']['tmp_name'];
                    $extensi             = pathinfo($nama_file, PATHINFO_EXTENSION);
                    $allowed_extensions = array('pdf', 'PDF', 'jpg', 'jpeg', 'png');
                    $nama_file_new = $random . "-" . $nama_file;
                    $pathdok               = "berkas/" . $nama_file_new;
                    $file               = explode(".", $nama_file);
                    $extension          = array_pop($file);

                    if (!$tmp_file) {


                        $mySql = "UPDATE spp SET tgl_bayar='$tgl_bayar', id_santri='$id_santri', jmlh_pembayaran='$jmlh_pembayaran', metode_pembayaran='$metode_pembayaran' WHERE id_spp='$id_spp'";
                        $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                        if ($query) {
                            header("location: ../../main.php?open=tampilspp&alert=3");
                        }
                    } else {

                        $mySql = "SELECT * FROM spp WHERE id_spp='$id_spp'";
                        $myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
                        $dt = mysql_fetch_array($myQry);

                        $gmbr = $dt['nama_file'];
                        $tmpfile = "berkas/$gmbr";

                        if (in_array($extension, $allowed_extensions)) {
                            if (move_uploaded_file($tmp_file, $pathdok)) {

                                $mySql = "UPDATE spp SET tgl_bayar='$tgl_bayar', id_santri='$id_santri', jmlh_pembayaran='$jmlh_pembayaran', 
                metode_pembayaran='$metode_pembayaran', nama_file='$nama_file_new' WHERE id_spp='$id_spp'";
                                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                                if ($query) {
                                    unlink($tmpfile);
                                    header("location: ../../main.php?open=tampilspp&alert=3");
                                }
                            } else {
                                header("location: ../../main.php?open=tampilspp&alert=4");
                            }
                        } else {
                            header("location: ../../main.php?open=tampilspp&alert=4");
                        }
                    }
                }
            }
        } elseif ($_GET['act'] == 'delete') {
            if (isset($_GET['id_spp'])) {
                $id_spp = $_GET['id_spp'];

                $mySql = "DELETE FROM spp WHERE id_spp='$id_spp'";
                $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());
                $dt = mysql_fetch_array($myQry);

                $gmbr = $dt['nama_file'];
                $tmpfile = "berkas/$gmbr";

                $mySql = "DELETE FROM spp WHERE id_spp='$id_spp'";
                $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

                if ($query) {
                    unlink($tmpfile);
                    header("location: ../../main.php?open=tampilspp&alert=2");
                }
            }
        }
    }
