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

			$no_pengeluaran=$_POST["no_pengeluaran"];
			$tgl_pengeluaran=$_POST["tgl_pengeluaran"];
			$tgl_nota=$_POST["tgl_nota"];
			$kode_akun=$_POST["kode_akun"];
			$jumlah=$_POST["jumlah"];
														
						$mySql	= "INSERT INTO pengeluaran
                                  VALUES('$no_pengeluaran','$tgl_pengeluaran','$tgl_nota','$kode_akun','$jumlah')";
						$query	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());

                        if ($query) {
                            header("location: ../../main.php?open=tampilpengeluaran&alert=1");
                        }							
		}
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['no_pengeluaran'])) {
                				
			$no_pengeluaran=$_POST["no_pengeluaran"];
			$tgl_pengeluaran=$_POST["tgl_pengeluaran"];
			$tgl_nota=$_POST["tgl_nota"];
			$kode_akun=$_POST["kode_akun"];
			$jumlah=$_POST["jumlah"];
				
                    $mySql = "UPDATE pengeluaran SET tgl_pengeluaran='$tgl_pengeluaran', tgl_nota='$tgl_nota' ,kode_akun='$kode_akun',jumlah='$jumlah' WHERE no_pengeluaran='$no_pengeluaran'";
					$query	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());

                    if ($query) {
                        header("location: ../../main.php?open=tampilpengeluaran&alert=2");
                    }				
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['no_pengeluaran'])) {
            $no_pengeluaran = $_GET['no_pengeluaran'];
    
			$mySql = "DELETE FROM pengeluaran WHERE no_pengeluaran='$no_pengeluaran'";
			$query = mysql_query($mySql, $koneksidb) or die ("Query salah".mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilpengeluaran&alert=3");
            }	
			
        }
    }       
}       
?>