<div class="login-box">
  <div class="login-box-body">
    <h4>Anda Yakin Mau Menghapus Data Armada :</h4>
    <form action="jadwal/proses.php" method="post">
      <?php
      $id = $_GET['idjadwal'];
      $data = mysqli_query($koneksi, "SELECT armada.NamaArmada, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada WHERE IDJadwal = $id;");
      while ($d = mysqli_fetch_array($data)) {
      ?>
        <div class="form-group has-feedback">
          <input type="hidden" name="subzero" value="<?php echo $subzero; ?>">
          <input type="hidden" name="idjadwal" value="<?php echo $d['IDJadwal']; ?>">
          <label for="judul">Nama Armada</label>
          <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['NamaArmada'] . ' - ' . $d['Kelas']; ?>" name="nama">
        </div>
        <div class="form-group has-feedback">
          <label for="pengarang">Asal dan Tujuan</label>
          <input type="text" class="form-control" disabled="disabled" value="<?php echo $d['Asal'] . ' - ' . $d['Tujuan']; ?>" name="jenis">
        </div>
        <div class="form-group has-feedback">
          <label for="penerbit">Tanggal</label>
          <?php
          $tanggalBerangkat = $d['TanggalBerangkat'];
          $timestamp = strtotime($tanggalBerangkat);

          $bulan = array(
            1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni",
            7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"
          );

          $tanggalFormatted = date('d', $timestamp) . ' ' . $bulan[date('n', $timestamp)] . ' ' . date('Y', $timestamp);
          ?>
          <input type="text" class="form-control" disabled="disabled" value="<?php echo $tanggalFormatted; ?>" name="status">
        </div>
        <div class="alert alert-danger has-feedback">
          <p>Perhatian!</p>
          <p>Data yang sudah dihapus tidak dapat dikembalikan kembali.</p>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-danger btn-flat pull-right" name="hapus">Hapus</button>
            <a href="../index.php?submenu=<?php echo $subzero; ?>" class="btn btn-warning btn-flat pull-left" name="batal">Batal</a>
          </div>
        </div>
      <?php
      }
      ?>
    </form>
  </div>
</div>