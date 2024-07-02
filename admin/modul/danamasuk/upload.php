<h3> Upload Dokumen </h3>

<form action="" method="POST" enctype="multipart/form-data"> 
	<b> File Upload</b> <input type="file" name="NamaFile">
	<input type="submit" name="proses" value="Upload">
</form>

<?php
	$koneksidb = mysql_connect($host, $user, $pass) or die ('Koneksi MySQL gagal !'); 
mysql_select_db($db, $koneksidb) or die ('Database tidak ditemukan !');

if(isset($_POST['proses'])){

	$direktori = "berkas/";
	$file_name=$_FILES['NamaFile']['name'];
	move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);

	mysql_query($koneksidb, "insert into dokumen set file='$file_name'");

	echo "<b>File berhasil diupload";
}

?>