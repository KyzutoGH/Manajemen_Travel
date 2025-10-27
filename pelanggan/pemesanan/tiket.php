<style>
    @media print {
        .no-print {
            display: none !important;
        }
        .content-wrapper {
            margin: 0 !important;
            padding: 0 !important;
        }
        .ticket-container {
            page-break-after: always;
            margin-bottom: 20px;
        }
    }
    
    .ticket-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        position: relative;
        overflow: hidden;
    }
    
    .ticket-card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%);
    }
    
    .ticket-header {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        text-align: center;
    }
    
    .ticket-header h2 {
        margin: 0;
        color: #667eea;
        font-weight: bold;
        font-size: 24px;
    }
    
    .ticket-body {
        background: white;
        border-radius: 10px;
        padding: 0;
        overflow: hidden;
    }
    
    .ticket-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .ticket-table th {
        background: #f8f9fa;
        padding: 15px;
        text-align: center;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .ticket-table td {
        padding: 20px 15px;
        text-align: center;
        color: #212529;
        font-size: 16px;
        font-weight: 500;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .ticket-table tr:last-child td {
        border-bottom: none;
    }
    
    .signature-cell {
        vertical-align: middle;
        background: #f8f9fa;
    }
    
    .ticket-footer {
        background: white;
        border-radius: 10px;
        padding: 15px;
        margin-top: 15px;
        text-align: center;
    }
    
    .ticket-footer p {
        margin: 0;
        color: #e74c3c;
        font-weight: bold;
        font-size: 14px;
        letter-spacing: 1px;
    }
    
    .ticket-info-badge {
        display: inline-block;
        background: #667eea;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin: 5px;
    }
    
    .btn-print-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 25px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    .btn-print-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.6);
        color: white;
    }
    
    .page-header-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        color: white;
    }
    
    .page-header-custom h1 {
        margin: 0;
        color: white;
        font-weight: 700;
    }
</style>

<div class="content-wrapper">
    <section class="content-header no-print">
        <div class="page-header-custom">
            <h1><i class="fa fa-ticket"></i> E-Ticket Perjalanan</h1>
            <ol class="breadcrumb" style="background: transparent; padding: 10px 0;">
                <li><a href="../index.php" style="color: white;"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li style="color: white;">Tambah <?php if ($submenu == "Transaksi") echo 'Transaksi'; ?></li>
            </ol>
        </div>
    </section>
    
    <section class="content">
        <div class="box" style="border: none; box-shadow: none;">
            <div class="no-print" style="margin-bottom: 20px;">
                <button onclick="window.print()" class="btn btn-print-custom">
                    <i class="fa fa-print"></i> Cetak Semua Tiket
                </button>
            </div>
            
            <?php
            $idtrxk = $_GET['IDTransaksi'];
            $data = mysqli_query($koneksi, "SELECT j.IDJadwal,
                t.IDTransaksi,
                j.Kelas,
                a.NamaArmada,
                j.Asal,
                j.Tujuan,
                t.BuktiTransaksi,
                j.TanggalBerangkat,
                j.JamBerangkat,
                j.JamTiba,
                t.IDTransaksi AS 'ID Transaksi',
                p.NamaPelanggan AS 'Nama Pelanggan',
                CONCAT(SUBSTRING(a.NamaArmada, 1, 3), SUBSTRING(j.Asal, 1, 3), SUBSTRING(j.Tujuan, 1, 3)) AS 'Perjalanan',
                t.TanggalTransaksi AS 'Tanggal Transaksi',
                t.TotalHarga AS 'Harga',
                j.Diskon AS 'Diskon',
                t.StatusTransaksi AS 'Status',
                COUNT(tp.IDPenumpang) AS 'Jumlah Penumpang'
            FROM 
                transaksi t
            JOIN 
                pelanggan p ON t.IDPelanggan = p.IDPelanggan
            JOIN 
                jadwal j ON t.IDJadwal = j.IDJadwal
            JOIN 
                armada a ON j.IDArmada = a.IDArmada
            LEFT JOIN
                detailtransaksi tp ON t.IDTransaksi = tp.IDTransaksi
            WHERE t.IDTransaksi = $idtrxk;");

            // Check if there are rows in the result set
            if (mysqli_num_rows($data) > 0) {
                // Loop through each row in the result set
                while ($row = mysqli_fetch_assoc($data)) {
                    if ($row['Jumlah Penumpang'] >= 1) {
                        $passengerData = mysqli_query($koneksi, "SELECT * FROM detailtransaksi 
                        JOIN penumpang ON detailtransaksi.IDPenumpang = penumpang.IDPenumpang
                        WHERE detailtransaksi.IDTransaksi = $idtrxk;");

                        if (mysqli_num_rows($passengerData) > 0) {
                            // Loop through each passenger and display ticket information
                            while ($passengerRow = mysqli_fetch_assoc($passengerData)) {
            ?>
                                <div class="ticket-container">
                                    <div class="ticket-card">
                                        <div class="ticket-header">
                                            <h2><i class="fa fa-bus"></i> E-TICKET PERJALANAN</h2>
                                            <div style="margin-top: 10px;">
                                                <span class="ticket-info-badge">ID: <?php echo $row['ID Transaksi']; ?></span>
                                                <span class="ticket-info-badge"><?php echo $row['Status']; ?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="ticket-body">
                                            <table class="ticket-table">
                                                <tr>
                                                    <th><i class="fa fa-user"></i> NAMA PENUMPANG<br><small>Passenger Name</small></th>
                                                    <th><i class="fa fa-star"></i> KELAS<br><small>Class</small></th>
                                                    <th><i class="fa fa-calendar"></i> TANGGAL & JAM<br><small>Date & Time</small></th>
                                                </tr>
                                                <tr>
                                                    <td><strong><?php echo strtoupper($passengerRow['NamaPenumpang']); ?></strong></td>
                                                    <td><strong><?php echo strtoupper($row['Kelas']); ?></strong></td>
                                                    <td><strong><?php
                                                        $tanggalBerangkat = $row['TanggalBerangkat'];
                                                        $timestamp = strtotime($tanggalBerangkat);

                                                        $bulan = array(
                                                            1 => "JANUARI", 2 => "FEBRUARI", 3 => "MARET", 4 => "APRIL", 5 => "MEI", 6 => "JUNI",
                                                            7 => "JULI", 8 => "AGUSTUS", 9 => "SEPTEMBER", 10 => "OKTOBER", 11 => "NOVEMBER", 12 => "DESEMBER"
                                                        );                                                

                                                        $tanggalFormatted = date('d', $timestamp) . ' ' . $bulan[date('n', $timestamp)] . ' ' . date('Y', $timestamp);
                                                        $jamBerangkat = date('H:i', $timestamp);

                                                        echo $tanggalFormatted . '<br><span style="color: #e74c3c; font-size: 18px;">' . $jamBerangkat . ' WIB</span>';
                                                    ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fa fa-bus"></i> ARMADA<br><small>Fleet</small></th>
                                                    <th><i class="fa fa-map-marker"></i> RUTE PERJALANAN<br><small>Route</small></th>
                                                    <th rowspan="2" class="signature-cell">
                                                        <div style="padding: 10px;">
                                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?php echo urlencode('ID:' . $row['ID Transaksi'] . '|Penumpang:' . $passengerRow['NamaPenumpang'] . '|Rute:' . $row['Asal'] . '-' . $row['Tujuan']); ?>" alt="QR Code">
                                                            <br><small style="color: #6c757d;">QR Code</small>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td><strong><?php echo strtoupper($row['NamaArmada']); ?></strong></td>
                                                    <td>
                                                        <strong style="color: #667eea;">
                                                            <?php echo strtoupper($row['Asal']); ?>
                                                            <i class="fa fa-arrow-right" style="margin: 0 10px;"></i>
                                                            <?php echo strtoupper($row['Tujuan']); ?>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <div class="ticket-footer">
                                            <p><i class="fa fa-info-circle"></i> E-TIKET INI WAJIB DISIMPAN UNTUK KEBERANGKATAN</p>
                                            <small style="color: #6c757d; display: block; margin-top: 5px;">
                                                Harap tunjukkan e-tiket ini saat check-in / Please show this e-ticket during check-in
                                            </small>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Tidak ada data penumpang tersedia.</div>';
                        }
                    } else {
                        ?>
                        <div class="ticket-container">
                            <div class="ticket-card">
                                <div class="ticket-header">
                                    <h2><i class="fa fa-bus"></i> E-TICKET PERJALANAN</h2>
                                </div>
                                <div class="ticket-body">
                                    <table class="ticket-table">
                                        <!-- Add your existing table structure here if needed -->
                                    </table>
                                </div>
                                <div class="ticket-footer">
                                    <p><i class="fa fa-info-circle"></i> E-TIKET INI WAJIB DISIMPAN UNTUK KEBERANGKATAN</p>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } else {
                // Display a message if there are no rows in the result set
                echo '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> Tidak ada data tiket tersedia.</div>';
            }
            ?>
        </div>
    </section>
</div>