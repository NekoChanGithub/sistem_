<h1 class="h3 mb-4 text-gray-800">Edit Cek Absensi</h1>

<form class="offset-md-1" method="post" enctype="multipart/form-data">

<?php
     $id = $_SESSION["user"]["id_user"];
	$ambl=$kn->query("SELECT tb_absensi.nama_ekstra, tb_absensi.id_absensi, tb_absensi.waktu_absen, tb_absensi.keterangan, tb_absensi.status, tb_kelas.kelas, tb_user.nama_lengkap
        FROM tb_absensi
        JOIN tb_kelas ON tb_absensi.id_kelas = tb_kelas.id_kelas
        JOIN tb_user ON tb_absensi.id_user = tb_user.id_user
        WHERE tb_absensi.id_absensi = '$_GET[id]'; "); 
	    $cek_absensi=$ambl->fetch_assoc();
    ?>

  <div class="form-group col-md-10 mb-3">
    <label>Nama Lengkap</label>
    <input type="name" name="name" readonly value="<?php echo $cek_absensi["nama_lengkap"] ?>" class="form-control">
  </div>
  <div class="form-group col-md-10 mb-3">
    <label>Ekstrakurikuler</label>
    <input type="text" name="name" readonly value="<?php echo $cek_absensi["nama_ekstra"] ?>" class="form-control">
  </div>
  <div class="form-group col-md-10 mb-3">
    <label>Keterangan</label>
    <input type="text" name="name" readonly value="<?php echo $cek_absensi["keterangan"] ?>" class="form-control">
  </div>
  <div class="form-group col-md-10 mb-3">
    <label>Waktu Absensi</label>
    <input type="text" name="name" readonly value="<?php echo date('d F Y H:i', strtotime($cek_absensi['waktu_absen'])); ?>" class="form-control">
  </div>
  <div class="form-group col-md-10 mb-3">
    <label>Status</label>
	  <select class="custom-select" name="status">
	  <option selected disabled><?php echo $cek_absensi["status"] ?></option>
	  <option value="Dikonfirmasi">Dikonfirmasi</option>
	  <option value="Ditolak">Ditolak</option>
	  </select>
  </div>

  <div class="col-md-10 mb-5">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>

  <?php
if (isset($_POST['submit']))
{
    $kn->query("UPDATE tb_absensi
	SET status = '$_POST[status]' WHERE id_absensi = '$_GET[id]'");

    echo "<script>alert('Status Berhasil diupdate');</script>";
    echo "<script>location='index.php?halaman=cek_absensi';</script>";
}
?>
</form>