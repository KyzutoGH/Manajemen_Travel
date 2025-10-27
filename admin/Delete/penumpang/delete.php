<div class="login-box">
  <div class="login-box-body">
    <h4>Anda Yakin Mau Menghapus Data Penumpang :</h4>
    <form action="penumpang/proses.php" method="post">
    <?php
    $id = $_GET['IDPenumpang'];
    $data = mysqli_query($koneksi, "select * from penumpang where IDPenumpang='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
      <div class="form-group has-feedback">
        <input type="hidden" name="subzero" value="<?php echo $subzero; ?>">
        <input type="hidden" name="idpenumpang" value="<?php echo $d['IDPenumpang']; ?>">
        <label for="judul">Nama Penumpang</label>
        <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['NamaPenumpang'
        ];?>" name="namapenumpang">
      </div>
      <div class="form-group has-feedback">
        <label for="pengarang">Nomor Identitas</label>
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