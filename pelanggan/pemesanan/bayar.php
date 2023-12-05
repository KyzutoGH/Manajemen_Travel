<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Mode</h1>
        <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Tambah <?php if ($subzero == "Armada") {
                                            echo 'Armada';
                                        } ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <?php
            // Include necessary files and connect to the database
            include("../bagian/koneksi.php");

            // Check if the form is submitted
            if (isset($_POST['bayar'])) {
                // Retrieve data from the form
                $idJadwal = $_GET['idjadwal'];
                $idPelanggan = $_SESSION['idpelanggan'];
                $jumlahPenumpang = $_POST['jumlah_penumpang'];
                $totalHarga = $_POST['total_harga'];

                // Insert the transaction data into the Transaksi table
                $sqlInsertTransaksi = "INSERT INTO Transaksi (IDPelanggan, IDJadwal, TanggalTransaksi, TotalHarga, StatusTransaksi) VALUES ('$idPelanggan', '$idJadwal', NOW(), '$totalHarga', 'Belum Dibayar')";
                mysqli_query($koneksi, $sqlInsertTransaksi);

                // Retrieve the IDTransaksi from the last inserted transaction
                $idTransaksi = mysqli_insert_id($koneksi);

                // Insert the passenger details into the Detailtransaksi table
                for ($i = 1; $i <= $jumlahPenumpang; $i++) {
                    $selectedPenumpangKey = "nama_penumpang_" . $i;

                    // Check if the selected value for the current passenger exists
                    if (isset($_POST[$selectedPenumpangKey])) {
                        $namaPenumpang = $_POST[$selectedPenumpangKey];

                        // Fetch the IDPenumpang corresponding to the selected name from the database
                        $sqlPenumpang = mysqli_query($koneksi, "SELECT IDPenumpang FROM penumpang WHERE NamaPenumpang='$namaPenumpang'");
                        $rowPenumpang = mysqli_fetch_assoc($sqlPenumpang);
                        $idPenumpang = $rowPenumpang['IDPenumpang'];

                        // Fetch the HargaTiket corresponding to the selected IDJadwal from the database
                        $sqlHargaTiket = mysqli_query($koneksi, "SELECT Harga FROM jadwal WHERE IDJadwal='$idJadwal'");
                        $rowHargaTiket = mysqli_fetch_assoc($sqlHargaTiket);
                        $hargaTiket = $rowHargaTiket['Harga'];

                        // Insert passenger details into the Detailtransaksi table
                        $sqlInsertDetailTransaksi = "INSERT INTO Detailtransaksi (IDTransaksi, IDPenumpang, HargaTiket) VALUES ('$idTransaksi', '$idPenumpang', '$hargaTiket')";
                        mysqli_query($koneksi, $sqlInsertDetailTransaksi);
                    }
                }
            }
            ?>

            <!-- HTML Payment Form -->
            <form method="post" class="form-horizontal" action="payment.php">
                <h4 style="margin-left: 10px">Proses Pembayaran</h4>

                <!-- Display the selected trip details -->
                <div class="form-group has-feedback">
                    <label for="jadwal" class="col-sm-2 control-label">Jadwal Perjalanan</label>
                    <div class="col-sm-9" style="width: 930px">
                        <?php
                        // Fetch and display the selected trip details
                        $idJadwal = $_GET['idjadwal'];
                        $sqlJadwal = mysqli_query($koneksi, "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada;");
                        $rowJadwal = mysqli_fetch_assoc($sqlJadwal);

                        // Store the totalHarga in a variable for later use
                        $totalHarga = $rowJadwal['Harga'] * $_GET['jumlah_penumpang'];

                        echo "Armada: " . $rowJadwal['NamaArmada'] . "<br>";
                        echo "Jenis: " . $rowJadwal['Jenis'] . "<br>";
                        echo "Asal: " . $rowJadwal['Asal'] . "<br>";
                        echo "Tujuan: " . $rowJadwal['Tujuan'] . "<br>";
                        echo "Tanggal Berangkat: " . $rowJadwal['TanggalBerangkat'] . "<br>";
                        echo "Harga: " . $totalHarga . "<br>";

                        ?>
                    </div>
                </div>

                <!-- Display the selected passenger details -->
                <div class="form-group has-feedback">
                    <label for="penumpang" class="col-sm-2 control-label">Nama Pelanggan</label>
                    <div class="col-sm-9" style="width: 930px">
                        <?php
                        // Fetch and display the selected passenger details
                        $idPelanggan = $_SESSION['idpelanggan'];
                        $sqlPelanggan = mysqli_query($koneksi, "SELECT * FROM Pelanggan WHERE IDPelanggan = $idPelanggan");
                        $rowPelanggan = mysqli_fetch_assoc($sqlPelanggan);

                        echo "Nama Pelanggan: " . $rowPelanggan['NamaPelanggan'] . "<br>";

                        $jumlahPenumpang = $_GET['jumlah_penumpang'];

                        for ($i = 1; $i <= $jumlahPenumpang; $i++) {
                            $selectedPenumpangKey = "idpenumpang_" . $i;

                            // Check if the selected value for the current passenger exists
                            if (isset($_GET[$selectedPenumpangKey])) {
                                $selectedPenumpangID = $_GET[$selectedPenumpangKey];

                                // Fetch the name corresponding to the selected ID from the database
                                $sqlPenumpang = mysqli_query($koneksi, "SELECT NamaPenumpang FROM penumpang WHERE IDPenumpang='$selectedPenumpangID'");
                                $rowPenumpang = mysqli_fetch_assoc($sqlPenumpang);

                                // Display the name
                                $selectedPenumpangName = $rowPenumpang['NamaPenumpang'];
                                echo "Nama Penumpang $i: $selectedPenumpangName <br>";
                            }
                        }


                        ?>
                    </div>
                </div>

                <!-- Display the total price -->
                <div class="form-group has-feedback">
                    <label for="total_harga" class="col-sm-2 control-label">Total Harga</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" name="total_harga" value="<?= $totalHarga; ?>" readonly />
                    </div>
                </div>

                <!-- Passenger details -->
                <div id="passenger-details"></div>

                <script>
                    // Add input fields for each passenger based on the selected quantity (up to 8)
                    document.querySelector('input[name="jumlah_penumpang"]').addEventListener('change', function() {
                        const quantity = parseInt(this.value);
                        const maxPassengers = 8; // Set the maximum number of passengers

                        const validQuantity = Math.min(quantity, maxPassengers);

                        this.value = validQuantity;

                        const passengerDetailsDiv = document.getElementById('passenger-details');

                        passengerDetailsDiv.innerHTML = '';

                        for (let i = 1; i <= validQuantity; i++) {
                            passengerDetailsDiv.innerHTML += `<div class="form-group has-feedback">
                    <label for="nama_penumpang_${i}" class="col-sm-2 control-label">Nama Penumpang ${i}</label>
                    <div class="col-sm-9" style="width: 930px">
                        <input type="text" class="form-control" name="nama_penumpang_${i}" placeholder="Nama Penumpang ${i}" required />
                    </div>
                </div>`;
                        }
                    });
                </script>

                <!-- Payment details (you may expand this section for card details, etc.) -->
                <div class="form-group has-feedback">
                    <label for="payment_details" class="col-sm-2 control-label">Payment Details</label>
                    <div class="col-sm-9" style="width: 930px">
                        <!-- Add your payment form fields here -->
                        <!-- Example: credit card number, expiration date, CVV, etc. -->
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <div class="col-sm-10 pull-right">
                        <button type="submit" class="btn btn-success pull-right" name="bayar">
                            Bayar
                        </button>
                        <a href="index.php?submenu=Jadwal" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>