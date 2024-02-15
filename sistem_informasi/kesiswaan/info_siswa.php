<h1 class="h3 mb-4 text-gray-800">Informasi Siswa</h1>

<?php

$ambl = $kn->query("SELECT tb_user.id_user, tb_user.nama_lengkap, tb_kelas.kelas FROM tb_user
	LEFT JOIN tb_kelas ON tb_user.id_user = tb_kelas.id_user
    WHERE tb_user.id_user ='$_GET[id]' ");
	$value = $ambl->fetch_assoc();

$result = $kn->query("SELECT nama_ekstra FROM tb_ekstra_diikuti WHERE id_user = '$_GET[id]' ");


?>



<style>
	#bg {
		background-color: #fff;
	}
</style>

 <div class="form-group col-md-5 mb-3">
    <label>Nama Lengkap</label>
    <input id="bg" type="text"  readonly value="<?php echo $value['nama_lengkap'] ?>" class="form-control">
  </div>

  <div class="form-group col-md-5 mb-3">
    <label>Kelas</label>
    <input id="bg" type="text" readonly value="<?php echo $value['kelas'] ?>" class="form-control">
  </div>
 
  <div class="col-md-5 mb-3">
    <label>Ekstrakurikuler</label>
    <?php echo "<ul class='list-group'>";
    while($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item'>" . $row["nama_ekstra"] . "</li>";
    }
    echo "</ul>"; ?>
  </div>




