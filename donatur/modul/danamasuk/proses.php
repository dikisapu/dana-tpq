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

            $id_dana_masuk = $_POST["id_dana_masuk"];
            $tgl_transaksi = $_POST["tgl_transaksi"];
            $id_donatur = $_POST["id_donatur"];
            $jmlh_dana_masuk = $_POST["jmlh_dana_masuk"];
            $keterangan = $_POST["keterangan"];

            $random = (rand()%999);
            $nama_file          = $_FILES['data_upload']['name'];
            $ukuran_file        = $_FILES['data_upload']['size'];
            $tipe_file          = $_FILES['data_upload']['type'];
            $tmp_file           = $_FILES['data_upload']['tmp_name'];
            $extensi 			= pathinfo($nama_file, PATHINFO_EXTENSION);     
            $allowed_extensions = array('pdf','PDF','jpg','jpeg','png');           
			$nama_file_new = $random."-".$nama_file;		
            $pathdok               = "berkas/".$nama_file_new;         
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);
			
				if(in_array($extension, $allowed_extensions)) {
					if(move_uploaded_file($tmp_file, $pathdok)) {

            $mySql    = "INSERT INTO danamasuk VALUES('$id_dana_masuk','$tgl_transaksi','$id_donatur', '$jmlh_dana_masuk' , '$keterangan', '$nama_file_new')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampildanamasuk&alert=1");
            }
        } else {
                header("location: ../../main.php?open=tampildanamasuk&alert=4");
            }				
        } else {
            header("location: ../../main.php?open=tampildanamasuk&alert=4");
        }
        }
    }
     elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_dana_masuk'])) {

            $id_dana_masuk = $_POST["id_dana_masuk"];
            $tgl_transaksi = $_POST["tgl_transaksi"];
            $id_donatur = $_POST["id_donatur"];
            $jmlh_dana_masuk = $_POST["jmlh_dana_masuk"];
            $keterangan = $_POST["keterangan"];

            $random = (rand()%999);
            $nama_file          = $_FILES['data_upload']['name'];
            $ukuran_file        = $_FILES['data_upload']['size'];
            $tipe_file          = $_FILES['data_upload']['type'];
            $tmp_file           = $_FILES['data_upload']['tmp_name'];
            $extensi 			= pathinfo($nama_file, PATHINFO_EXTENSION);     
            $allowed_extensions = array('pdf','PDF','jpg','jpeg','png');           
			$nama_file_new = $random."-".$nama_file;		
            $pathdok               = "berkas/".$nama_file_new;         
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);

	if(!$tmp_file){

                $mySql = "UPDATE danamasuk SET tgl_transaksi='$tgl_transaksi' ,id_donatur='$id_donatur' ,jmlh_dana_masuk='$jmlh_dana_masuk' ,keterangan='$keterangan' WHERE id_dana_masuk='$id_dana_masuk'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampildanamasuk&alert=3");
                }
            }else{

                $mySql = "SELECT * FROM danamasuk WHERE id_dana_masuk='$id_dana_masuk'";
                $myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());  
                $dt = mysql_fetch_array($myQry);
                
                $gmbr=$dt['nama_file'];
                $tmpfile = "berkas/$gmbr";	
                
                    if(in_array($extension, $allowed_extensions)) {
                        if(move_uploaded_file($tmp_file, $pathdok)) {
                            $mySql = "UPDATE danamasuk SET tgl_transaksi='$tgl_transaksi' ,id_donatur='$id_donatur' ,jmlh_dana_masuk='$jmlh_dana_masuk' ,
                            keterangan='$keterangan', nama_file='$nama_file_new' WHERE id_dana_masuk='$id_dana_masuk'";
                            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                            if ($query) {
                                unlink ($tmpfile);
                                header("location: ../../main.php?open=tampildanamasuk&alert=3");
                            }
            
                        } else {
                            header("location: ../../main.php?open=tampildanamasuk&alert=4");
                        }				
                    } else {
                        header("location: ../../main.php?open=tampildanamasuk&alert=4");
                    }		
            }            
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_dana_masuk'])) {
            $id_dana_masuk = $_GET['id_dana_masuk'];

            $mySql = "DELETE FROM danamasuk WHERE id_dana_masuk='$id_dana_masuk'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());
            $dt = mysql_fetch_array($myQry);
			
			$gmbr=$dt['nama_file'];
			$tmpfile = "berkas/$gmbr";

            $mySql = "DELETE FROM danamasuk WHERE id_dana_masuk='$id_dana_masuk'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
				unlink ($tmpfile);
                header("location: ../../main.php?open=tampildanamasuk&alert=2");
            }	
			
        }
    }
}

?>
