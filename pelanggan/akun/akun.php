<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Akun Saya</h1>
        <ol class="breadcrumb">
            <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Akun Saya</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <?php
                    $aidi = $_GET['IDPelanggan'];
                    $data = mysqli_query($koneksi, "
                    SELECT 
                        pelanggan.*, 
                        transaksi.*,
                        COUNT(transaksi.IDTransaksi) AS totalTransaksi,
                        SUM(CASE WHEN transaksi.StatusTransaksi = 'Dibayar' THEN 1 ELSE 0 END) AS totalDibayar,
                        SUM(CASE WHEN transaksi.StatusTransaksi = 'Dibatalkan' THEN 1 ELSE 0 END) AS totalDibatalkan,
                        SUM(CASE WHEN transaksi.StatusTransaksi = 'Dibayar' THEN transaksi.TotalHarga ELSE 0 END) AS totalHargaDibayar
                    FROM pelanggan 
                    JOIN transaksi ON pelanggan.IDPelanggan = transaksi.IDPelanggan 
                    WHERE pelanggan.IDPelanggan = $aidi
                ");

                    $d = mysqli_fetch_array($data)
                    ?>
                    <div class="box-body">
                        <div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <img class="profile-user-img img-responsive img-circle" src="../dist/img/e17747c78dd89a1d9522c5da154128b2.png" alt="User profile picture">
                                    <h3 class="profile-username text-center"><?php echo $d['NamaPelanggan']; ?></h3>
                                    <p class="text-muted text-center">UID : <?php echo $d['IDPelanggan']; ?></p>
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Total Transaksi</b> <a class="pull-right"><?php echo $d['totalTransaksi']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Transaksi Sukses</b> <a class="pull-right"><?php echo $d['totalDibayar']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Transaksi Batal</b> <a class="pull-right"><?php echo $d['totalDibatalkan']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nilai Transaksi</b> <a class="pull-right"><?php $harga = $d['totalHargaDibayar'];
                                                                                                echo 'Rp ' . number_format($harga, 0, ',', '.'); ?></a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-sm-6">
                                    <a href="index.php?submenu=EAkun&IDPelanggan=<?php echo $d['IDPelanggan'];?>" class="btn btn-primary btn-block"><b>Edit Akun</b></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="index.php?submenu=EPenumpang&IDPelanggan=<?php echo $d['IDPelanggan'];?>" class="btn btn-primary btn-block"><b>Manajemen Penumpang</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>