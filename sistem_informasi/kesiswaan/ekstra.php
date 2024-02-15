<h1 class="h3 mb-4 text-gray-800">Ekstrakurikuler</h1>

<form class="offset-md-1" method="post" enctype="multipart/form-data">

  <div class="form-group col-md-10 mb-3">
    <label>Nama Ekstrakurikuler</label>
    <input type="name" name="name" class="form-control" required>
  </div>

  
  <div class="col-md-10 mb-5">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

<?php
if (isset($_POST['submit']))
{
    
    
    
    {

        $kn->query("INSERT INTO tb_ekstra
        (nama_ekstra)
        VALUES('$_POST[name]')"); 

    }

    
    
    echo "<script>alert('Data berhasil di masukkan');</script>";
    echo "<script>location='index.php?halaman=ekstra';</script>";
    
}
?>

<div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Ekstrakurikuler</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #67999A;" class="table text-white">
                                       <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama Ekstrakurikuler</th>
                                          <th scope="col">Aksi</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                    <?php $nmr=1; ?>
        <?php $ambl=$kn->query("SELECT * FROM tb_ekstra"); ?>
        <?php while($pch = $ambl->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nmr; ?></td>
            <td><?php echo $pch['nama_ekstra']; ?></td>
            <td><a href="index.php?halaman=delete_ekstra&id=<?php echo $pch['id_ekstra']; ?>" class="btn btn-danger">Hapus</a></td>
        </tr>
        <?php $nmr++; ?>
        <?php } ?>
          
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>