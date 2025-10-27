    <?php
    $id = $_GET['idarmada'];
    $data = mysqli_query($koneksi, "select * from armada where IDArmada='$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
      <div class="box">
        <form method="post" class="form-horizontal" action="armada/apply.php">
          <input type="hidden" name="idarmada" value="<?php echo $d["IDArmada"] ?>">
          <h4 style="margin-left: 10px">Masukkan Data Armada</h4>
          <div class="form-group has-feedback">
            <label for="kode" class="col-sm-2 control-label">Nama Armada</label>
            <div class="col-sm-9" style="width: 930px">
              <input type="text" class="form-control" placeholder="Nama Armada" name="nama" value="<?php echo $d["NamaArmada"]; ?>" />
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="jenis" class="col-sm-2 control-label">Jenis Armada</label>
            <div class="col-sm-9" style="width: 930px">
              <select name="jenis" class="form-control">
                <option value="Bus" <?php echo ($d['Jenis'] == 'Bus') ? 'selected' : ''; ?>>Bus</option>
                <option value="Kapal" <?php echo ($d['Jenis'] == 'Kapal') ? 'selected' : ''; ?>>Kapal</option>
                <option value="Pesawat" <?php echo ($d['Jenis'] == 'Pesawat') ? 'selected' : ''; ?>>Pesawat</option>
              </select>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="status" class="col-sm-2 control-label">Status Partner</label>
            <div class="col-sm-9" style="width: 930px">
              <select name="status" class="form-control">
                <option value="Partner" <?php echo ($d['Status'] == 'Partner') ? 'selected' : ''; ?>>Partner</option>
                <option value="Non-Partner" <?php echo ($d['Status'] == 'Non-Partner') ? 'selected' : ''; ?>>Non-Partner</option>
              </select>
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="col-sm-10 pull-right">
              <button type="submit" class="btn btn-success" name="tambah">
                Simpan
              </button>
              <a href="../index.php?submenu=<?php echo $subzero;?>" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
            </div>
          </div>
          <br />
        </form>

      <?php } ?>