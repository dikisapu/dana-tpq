<?php 
include "parser-php-version.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));  
$host='localhost'; 
$user='root'; 
$pass=''; 
$db='danatpq'; 
$koneksidb = mysql_connect($host, $user, $pass) or die ('Koneksi MySQL gagal !'); 
mysql_select_db($db, $koneksidb) or die ('Database tidak ditemukan !'); 
?>