<div class="login-box">
  <div class="login-box-body">
    <h4>Anda Yakin Mau Menghapus Data Armada :</h4>
    <form action="pelanggan/proses.php" method="post">
    <?php
    $id = $_GET['IDPelanggan'];
    $data = mysqli_query($koneksi, "select * from pelanggan where IDPelanggan='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
      <div class="form-group has-feedback">
        <input type="hidden" name="subzero" value="<?php echo $subzero; ?>">
        <input type="hidden" name="idpelanggan" value="<?php echo $d['IDPelanggan']; ?>">
        <label for="judul">Nama Armada</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['Username'
        ];?>" name="username">
      </div>
      <div class="form-group has-feedback">
        <label for="pengarang">Jenis</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['NamaPelanggan'
        ];?>" name="namapelanggan">
      </div>
      <div class="form-group has-feedback">
        <label for="penerbit">Status</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['NomorIdentitas'
        ];?>" name="nomoridentitas">
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