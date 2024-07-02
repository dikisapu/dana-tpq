<?php
session_start();

include_once "../../config/config.php";
date_default_timezone_set('Asia/Jakarta');

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['save'])) {
			
			$random = (rand()%999);

			$no_penerimaan=$_POST["no_penerimaan"];
			$tgl_penerimaan=$_POST["tgl_penerimaan"];
			$tgl_nota=$_POST["tgl_nota"];
			$kode_akun=$_POST["kode_akun"];
			$jumlah=$_POST["jumlah"];
														
						$mySql	= "INSERT INTO penerimaan
                                  VALUES('$no_penerimaan','$tgl_penerimaan','$tgl_nota','$kode_akun','$jumlah')";
						$query	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());

                        if ($query) {
                            header("location: ../../main.php?open=tampilpenerimaan&alert=1");
                        }							
		}
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['no_penerimaan'])) {
                				
			$no_penerimaan=$_POST["no_penerimaan"];
			$tgl_penerimaan=$_POST["tgl_penerimaan"];
			$tgl_nota=$_POST["tgl_nota"];
			$kode_akun=$_POST["kode_akun"];
			$jumlah=$_POST["jumlah"];
				
                    $mySql = "UPDATE penerimaan SET tgl_penerimaan='$tgl_penerimaan', tgl_nota='$tgl_nota' ,kode_akun='$kode_akun',jumlah='$jumlah' WHERE no_penerimaan='$no_penerimaan'";
					$query	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());

                    if ($query) {
                        header("location: ../../main.php?open=tampilpenerimaan&alert=2");
                    }				
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['no_penerimaan'])) {
            $no_penerimaan = $_GET['no_penerimaan'];
    
			$mySql = "DELETE FROM penerimaan WHERE no_penerimaan='$no_penerimaan'";
			$query = mysql_query($mySql, $koneksidb) or die ("Query salah".mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilpenerimaan&alert=3");
            }	
			
        }
    }       
}       
?>