<?php 

$ambl = $kn->query("SELECT * FROM tb_ekstra WHERE tb_ekstra.id_ekstra='$_GET[id]' ");

$kn->query("DELETE FROM tb_ekstra WHERE id_ekstra='$_GET[id]'");

echo "<script>alert('Ekstra Terhapus');</script>";
echo "<script>location='index.php?halaman=ekstra';</script>";
?>
