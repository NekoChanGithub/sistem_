<h1 class="h3 mb-5 text-gray-800">Laporan Jurnal Ekstrakurikuler</h1>

<?php
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";

if (isset($_POST["submit"]))
{
	$id = $_SESSION["user"]["id_user"];

    $tgl_mulai= $_POST["tglm"];
    $tgl_selesai= $_POST["tgls"];
  
    $ambl = $kn->query("SELECT * FROM tb_jurnal LEFT JOIN tb_pelatih_ekstra ON
    tb_jurnal.id_user=tb_pelatih_ekstra.id_pelatih WHERE tb_jurnal.id_user = '$id' AND tb_jurnal.tanggal BETWEEN '$tgl_mulai' AND  '$tgl_selesai' ");
   while($pch = $ambl->fetch_assoc())
   {
     $semuadata[]=$pch;
   }

}
 ?>

 <form method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tglm" class="form-control">
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgls" class="form-control">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <button style="margin-top: 32px;" class="btn btn-primary" name="submit">Lihat Laporan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="table-responsive">
<table class="table table-bordered">
  <thead style="background-color: #67999A;" class="table text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Ekstrakurikuler</th>
      <th scope="col">Waktu</th>
      <th scope="col">Judul Jurnal</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($semuadata as $key => $value): ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_ekstra"] ?></td>
            <td><?php echo date("d F Y H:i",strtotime($value["tanggal"])) ?></td>
            <td><?php echo $value["judul_jurnal"] ?></td>
            <td>
                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#jurnal_<?php echo $value['id_jurnal']; ?>">
                  Lihat Isi Jurnal
                </button>
            </td>
        </tr>
        <?php endforeach ?>
  </tbody>
</table>
</div>

<?php foreach ($semuadata as $value): ?>

<div class="modal fade" id="jurnal_<?php echo $value['id_jurnal']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isi Jurnal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $id = $_SESSION["user"]["id_user"];

         $id_jurnal = $value['id_jurnal']; 

        $ambl = $kn->query("SELECT * FROM tb_jurnal LEFT JOIN tb_pelatih_ekstra ON
            tb_jurnal.id_user=id_pelatih_ekstra WHERE tb_jurnal.id_user = '$id' AND tb_jurnal.id_jurnal= '$id_jurnal'");
        $isi_jurnal = $ambl->fetch_assoc();
         ?>
     <p class="text-dark justify"><?php echo $value["isi_jurnal"] ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <?php endforeach ?>