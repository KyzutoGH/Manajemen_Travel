<div class="login-box">
  <div class="login-box-body">
    <h4>Anda Yakin Mau Menghapus Data Armada :</h4>
    <form action="armada/proses.php" method="post">
    <?php
    $id = $_GET['idarmada'];
    $data = mysqli_query($koneksi, "select * from armada where idarmada='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
      <div class="form-group has-feedback">
        <input type="hidden" name="subzero" value="<?php echo $subzero; ?>">
        <input type="hidden" name="idarmada" value="<?php echo $d['IDArmada']; ?>">
        <label for="judul">Nama Armada</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['NamaArmada'
        ];?>" name="nama">
      </div>
      <div class="form-group has-feedback">
        <label for="pengarang">Jenis</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['Jenis'
        ];?>" name="jenis">
      </div>
      <div class="form-group has-feedback">
        <label for="penerbit">Status</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['Status'
        ];?>" name="status">
      </div>
      <div class="alert alert-danger has-feedback">
        <p>Perhatian!</p>
        <p>Data yang sudah dihapus tidak dapat dikembalikan kembali.</p>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-danger btn-flat pull-right" name="hapus">Hapus</button>
          <a href="../index.php?submenu=<?php echo $subzero;?>" class="btn btn-warning btn-flat pull-left" name="batal">Batal</a>
        </div>
      </div>
      <?php
      }
      ?>
    </form>
  </div>
</div>