<h1 class="h3 mb-4 text-gray-800">Edit Pelatih</h1>

<?php

$ambl = $kn->query("SELECT tb_user.id_user, tb_user.nama_lengkap, tb_user.username, tb_ekstra.nama_ekstra FROM tb_user
    LEFT JOIN tb_pelatih_ekstra ON tb_user.id_user=tb_pelatih_ekstra.id_pelatih 
    LEFT JOIN tb_ekstra ON tb_pelatih_ekstra.id_ekstra = tb_ekstra.id_ekstra
    WHERE tb_user.id_user ='$_GET[id]' ");
    $value = $ambl->fetch_assoc();
?>

<form method="post">

 <div class="form-group col-md-5 mb-3">
    <label>Nama Lengkap</label>
    <input type="text" name="name" value="<?php echo $value['nama_lengkap'] ?>" class="form-control">
  </div>

  <div class="form-group col-md-5 mb-3">
    <label>Username</label>
    <input type="text" name="username" value="<?php echo $value['username'] ?>" class="form-control">
  </div>

  <div class="col-md-5 mb-3">
        <label>Ekstrakurikuler Pelatih</label>
        <select class="custom-select" name="ekstra">
        <option selected><?php echo $value['nama_ekstra'] ?></option>
          <?php
        $result = $kn->query("SELECT * FROM tb_ekstra");

        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['nama_ekstra'] . '">' . $row['nama_ekstra'] . '</option>';
        } ?>
        </select>
      </div>
  

  <div class="form-group col-md-5 mb-3">
  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
  </div>


</form>

  <?php
if (isset($_POST['submit']))
{
        $nama_ekstra = $_POST['ekstra'];

        $ekstra = $kn->query("SELECT id_ekstra FROM tb_ekstra WHERE nama_ekstra = '$nama_ekstra' ");
        $id_eks = $ekstra->fetch_assoc();

        $id_Eks = $id_eks['id_ekstra'];
        
        $kn->query("UPDATE tb_user, tb_pelatih_ekstra SET nama_lengkap='$_POST[name]',
        username='$_POST[username]', id_ekstra='$id_Eks'
        WHERE tb_user.id_user='$_GET[id]' AND tb_pelatih_ekstra.id_pelatih='$_GET[id]'");
    
    echo "<script>alert('Data Telah Diubah');</script>";
    echo "<script>location='index.php?halaman=user_pelatih';</script>";
    
}
?>


