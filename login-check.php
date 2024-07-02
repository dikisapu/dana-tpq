<?php
include_once "config/config.php";
date_default_timezone_set('Asia/Jakarta');

$username = $_POST['username'];
$password = md5($_POST['password']);
$time = date("YmdHis") + 180;

if (!ctype_alnum($username) || !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
} else {
	$loginSql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$loginQry = mysql_query($loginSql, $koneksidb) or die("Query Periksa Password Salah : " . mysql_error());

	if (mysql_num_rows($loginQry) >= 1) {
		$data  = mysql_fetch_array($loginQry);

		session_start();
		$_SESSION['id_user']  = $data['id_user'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['level_user'] = $data['level_user'];

		// Redirect based on user type
		switch ($data['level_user']) {
			case 'admin':
				header("Location: admin/main.php?open=Halaman-Utama");
				break;
			case 'donatur':
				header("Location: donatur/main.php?open=Halaman-Utama");
				break;
			case 'santri':
				header("Location: santri/main.php?open=Halaman-Utama");
				break;
			case 'kepala tpq':
				header("Location: kepala tpq/main.php?open=Halaman-Utama");
				break;
			default:
				header("Location: index.php?alert=1");
		}
	} else {
		header("Location: index.php?alert=1");
	}
}
