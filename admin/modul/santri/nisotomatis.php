<?php
include_once "../../../config/config.php";

function generateNIS() {
    global $koneksidb;

    // Ambil dua digit terakhir dari tahun saat ini
    $year = date('y');

    // Query untuk mendapatkan NIS terakhir yang dimulai dengan dua digit tahun saat ini
    $query = "SELECT nis FROM santri WHERE nis LIKE '$year%' ORDER BY nis DESC LIMIT 1";
    $result = mysql_query($query, $koneksidb) or die("Query salah : " . mysql_error());

    if ($row = mysql_fetch_array($result)) {
        $lastNIS = substr($row['nis'], 2); // Ambil bagian nomor urut dari NIS terakhir
        $newNIS = intval($lastNIS) + 1;
    } else {
        $newNIS = 1; // Jika belum ada NIS yang dimulai dengan dua digit tahun ini, mulai dari 1
    }

    // Format NIS baru menjadi 5 digit dengan leading zeros
    $formattedNIS = $year . str_pad($newNIS, 3, "0", STR_PAD_LEFT);

    return $formattedNIS;
}
?>
