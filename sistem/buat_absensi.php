<h1 class="h3 mb-4 text-gray-800">Buat Absensi</h1>

<form class="offset-md-1" method="post" enctype="multipart/form-data">

  <div class="form-group col-md-10 mb-3">
    <label>Nama Lengkap</label>
    <input type="name" name="name" readonly value="<?php echo $_SESSION["user"]['nama_lengkap'] ?>" class="form-control">
  </div>

  <div class="form-group col-md-10 mb-3">
    <label>Ekstrakurikuler</label>
    <?php
        $user_id = $_SESSION["user"]["id_user"];
        $result = $kn->query("SELECT nama_ekstra FROM tb_ekstra JOIN tb_pelatih_ekstra ON tb_ekstra.id_ekstra = tb_pelatih_ekstra.id_ekstra WHERE id_pelatih = '$user_id'"); 
        $id_ekstra_pelatih = $result->fetch_assoc();
        ?>
    <input type="text" name="ekstra" readonly value="<?php echo $id_ekstra_pelatih['nama_ekstra'] ?>" class="form-control">
  </div>
  
  <div class="col-md-10 mb-3">
  <label>Hari</label>
  <input type="text" name="hari" id="hari" readonly class="form-control">
  </div>

  
  <div class="col-md-10 mb-5">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

<?php
if (isset($_POST['submit']))
{
    $user_id = $_SESSION["user"]["id_user"];

    $namaEKs = $_POST['ekstra'];

        $ambl = $kn->query("SELECT * FROM tb_ekstra WHERE nama_ekstra='$namaEKs'");
        $idEkstra=$ambl->fetch_assoc();

        $IDEkstra = $idEkstra['id_ekstra'];

    $kn->query("INSERT INTO tb_buat_absensi
        (id_pelatih,id_ekstra, nama_ekstra, hari)
        VALUES ('$user_id', '$IDEkstra', '$_POST[ekstra]', '$_POST[hari]')");

    echo "<script>alert('Data berhasil dimasukkan');</script>";
    echo "<script>location='index.php?halaman=buat_absensi';</script>";
}
?>

<div class="table-responsive">
<table class="table table-striped">
  <thead style="background-color: #67999A;" class="table text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Ekstrakurikuler</th>
      <th scope="col">Hari</th>
      <th scope="col">Tanggal, Waktu</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nmr=1; ?>
        <?php 
        $id = $_SESSION["user"]["id_user"];
        $ambl=$kn->query("SELECT * FROM tb_buat_absensi WHERE id_pelatih='$id' "); ?>
        <?php while($pch = $ambl->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nmr; ?></td>
            <td><?php echo $pch['nama_ekstra']; ?></td>
            <td><?php echo $pch['hari']; ?></td>
            <td><?php echo date('d F Y H:i', strtotime($pch['tanggal'])); ?></td>
            <td><a href="index.php?halaman=delete_absensi&id=<?php echo $pch['id_buat_absensi']; ?>" class="btn btn-danger">Hapus</a></td>
        </tr>
        <?php $nmr++; ?>
        <?php } ?>
  </tbody>
</table>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
  var hariElement = document.getElementById('hari');

  // Array hari
  var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

  // Buat objek tanggal hari ini
  var tanggalHariIni = new Date();

  // Dapatkan hari ini
  var hariIni = namaHari[tanggalHariIni.getDay()];

  // Tampilkan hanya hari
  hariElement.value = hariIni;
});
</script>