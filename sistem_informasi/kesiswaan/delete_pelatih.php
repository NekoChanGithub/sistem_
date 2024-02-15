<?php 

$ambl = $kn->query("SELECT * FROM tb_user, tb_pelatih_ekstra WHERE tb_user.id_user='$_GET[id]' AND tb_pelatih_ekstra.id_pelatih='$_GET[id]'");

$kn->query("DELETE FROM tb_user WHERE id_user='$_GET[id]'");
$kn->query("DELETE FROM tb_pelatih_ekstra WHERE id_pelatih='$_GET[id]'");

echo "<script>alert('User Terhapus');</script>";
echo "<script>location='index.php?halaman=user_pelatih';</script>";
?>