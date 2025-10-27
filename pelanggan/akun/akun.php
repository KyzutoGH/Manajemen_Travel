<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .profile-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 25px;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px 20px;
        text-align: center;
        position: relative;
    }
    
    .profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
        background-size: cover;
        opacity: 0.3;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        margin: 0 auto 15px;
        position: relative;
        z-index: 1;
    }
    
    .profile-name {
        color: white;
        font-size: 28px;
        font-weight: 700;
        margin: 10px 0 5px;
        position: relative;
        z-index: 1;
    }
    
    .profile-uid {
        color: rgba(255,255,255,0.9);
        font-size: 14px;
        font-weight: 500;
        position: relative;
        z-index: 1;
    }
    
    .stats-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        padding: 25px;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        border-color: #667eea;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        color: white;
        font-size: 24px;
    }
    
    .stat-value {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin: 10px 0 5px;
    }
    
    .stat-label {
        font-size: 14px;
        color: #7f8c8d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .action-buttons {
        padding: 0 25px 25px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .btn-action {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 15px 25px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        text-align: center;
        display: block;
    }
    
    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.5);
        color: white;
        text-decoration: none;
    }
    
    .btn-action i {
        margin-right: 8px;
    }
    
    .page-header-account {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 25px;
        color: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    .page-header-account h1 {
        margin: 0;
        color: white;
        font-weight: 700;
        font-size: 28px;
    }
    
    .page-header-account .breadcrumb {
        background: transparent;
        padding: 10px 0 0 0;
        margin: 0;
    }
    
    .page-header-account .breadcrumb li a {
        color: white;
    }
    
    .page-header-account .breadcrumb li {
        color: rgba(255,255,255,0.8);
    }
    
    .stat-success {
        background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%);
    }
    
    .stat-danger {
        background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
    }
    
    .stat-info {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .stat-warning {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    @media (max-width: 768px) {
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .action-buttons {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="page-header-account">
            <h1><i class="fa fa-user-circle"></i> Akun Saya</h1>
            <ol class="breadcrumb">
                <li><a href="index.php?submenu=Jadwal"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li>Akun Saya</li>
            </ol>
        </div>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php
                $aidi = $_GET['IDPelanggan'];
                
                // Fixed Query: Ambil data pelanggan dulu
                $dataPelanggan = mysqli_query($koneksi, "
                    SELECT * FROM pelanggan WHERE IDPelanggan = $aidi
                ");
                $pelanggan = mysqli_fetch_array($dataPelanggan);
                
                // Query terpisah untuk statistik transaksi dengan GROUP BY
                $dataStats = mysqli_query($koneksi, "
                    SELECT 
                        COUNT(IDTransaksi) AS totalTransaksi,
                        SUM(CASE WHEN StatusTransaksi = 'Dibayar' THEN 1 ELSE 0 END) AS totalDibayar,
                        SUM(CASE WHEN StatusTransaksi = 'Dibatalkan' THEN 1 ELSE 0 END) AS totalDibatalkan,
                        SUM(CASE WHEN StatusTransaksi = 'Dibayar' THEN TotalHarga ELSE 0 END) AS totalHargaDibayar
                    FROM transaksi 
                    WHERE IDPelanggan = $aidi
                ");
                $stats = mysqli_fetch_array($dataStats);
                
                // Handle jika tidak ada data transaksi
                $totalTransaksi = $stats['totalTransaksi'] ?? 0;
                $totalDibayar = $stats['totalDibayar'] ?? 0;
                $totalDibatalkan = $stats['totalDibatalkan'] ?? 0;
                $totalHargaDibayar = $stats['totalHargaDibayar'] ?? 0;
                ?>
                
                <div class="profile-card">
                    <!-- Profile Header -->
                    <div class="profile-header">
                        <img class="profile-avatar" src="../dist/img/e17747c78dd89a1d9522c5da154128b2.png" alt="Profile Picture">
                        <h3 class="profile-name"><?php echo $pelanggan['NamaPelanggan']; ?></h3>
                        <p class="profile-uid">
                            <i class="fa fa-id-card"></i> UID: <?php echo $pelanggan['IDPelanggan']; ?>
                        </p>
                    </div>
                    
                    <!-- Statistics -->
                    <div class="stats-container">
                        <div class="stat-card stat-info">
                            <div class="stat-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="stat-value"><?php echo $totalTransaksi; ?></div>
                            <div class="stat-label">Total Transaksi</div>
                        </div>
                        
                        <div class="stat-card stat-success">
                            <div class="stat-icon">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div class="stat-value"><?php echo $totalDibayar; ?></div>
                            <div class="stat-label">Transaksi Sukses</div>
                        </div>
                        
                        <div class="stat-card stat-danger">
                            <div class="stat-icon">
                                <i class="fa fa-times-circle"></i>
                            </div>
                            <div class="stat-value"><?php echo $totalDibatalkan; ?></div>
                            <div class="stat-label">Transaksi Batal</div>
                        </div>
                        
                        <div class="stat-card stat-warning">
                            <div class="stat-icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="stat-value" style="font-size: 20px;">
                                <?php echo 'Rp ' . number_format($totalHargaDibayar, 0, ',', '.'); ?>
                            </div>
                            <div class="stat-label">Nilai Transaksi</div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="index.php?submenu=EAkun&IDPelanggan=<?php echo $pelanggan['IDPelanggan']; ?>" class="btn-action">
                            <i class="fa fa-edit"></i> Edit Akun
                        </a>
                        <a href="index.php?submenu=EPenumpang&IDPelanggan=<?php echo $pelanggan['IDPelanggan']; ?>" class="btn-action">
                            <i class="fa fa-users"></i> Kelola Penumpang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>