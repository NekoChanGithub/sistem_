<?php 

$ambl = $kn->query("SELECT * FROM tb_buat_absensi WHERE id_buat_absensi='$_GET[id]'");
$pch = $ambl->fetch_assoc();


$kn->query("DELETE FROM tb_buat_absensi WHERE id_buat_absensi='$_GET[id]'");

echo "<script>alert('Absensi Terhapus');</script>";
echo "<script>location='index.php?halaman=buat_absensi';</script>";
?>