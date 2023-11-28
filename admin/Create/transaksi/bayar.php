
<?php
// Include necessary files and connect to the database
include("../../bagian/koneksi.php");

// Check if the form is submitted
if (isset($_POST['bayar'])) {
    // Retrieve data from the form
    $idJadwal = $_POST['idjadwal'];
    $idPelanggan = $_POST['idpelanggan'];
    $jumlahPenumpang = $_POST['jumlah_penumpang'];
    $totalHarga = $_POST['total_harga'];

    // Process the payment (you may want to implement a payment gateway integration here)

    // Insert the transaction data into the database
    $sqlInsert = "INSERT INTO Transaksi (IDJadwal, IDPelanggan, JumlahPenumpang, TotalHarga) VALUES ('$idJadwal', '$idPelanggan', '$jumlahPenumpang', '$totalHarga')";
    mysqli_query($koneksi, $sqlInsert);

    // Redirect to a thank you page or any other appropriate page
    header("Location: thank_you.php");
    exit();
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
            $idJadwal = $_POST['idjadwal'];
            $sqlJadwal = mysqli_query($koneksi, "SELECT armada.NamaArmada, armada.Jenis, jadwal.IDJadwal, jadwal.Asal, jadwal.Tujuan, jadwal.Kelas, jadwal.TanggalBerangkat, jadwal.JamBerangkat, jadwal.JamTiba, jadwal.Harga, jadwal.Diskon FROM armada JOIN jadwal ON armada.IDArmada = Jadwal.IDArmada;");
            $rowJadwal = mysqli_fetch_assoc($sqlJadwal);

            echo "Armada: " . $rowJadwal['NamaArmada'] . "<br>";
            echo "Jenis: " . $rowJadwal['Jenis'] . "<br>";
            echo "Asal: " . $rowJadwal['Asal'] . "<br>";
            echo "Tujuan: " . $rowJadwal['Tujuan'] . "<br>";
            echo "Tanggal Berangkat: " . $rowJadwal['TanggalBerangkat'] . "<br>";
            echo "Harga: " . $rowJadwal['Harga'] . "<br>";
            
            // Store the totalHarga in a variable for later use
            $totalHarga = $rowJadwal['Harga'];
            ?>
        </div>
    </div>

    <!-- Display the selected passenger details -->
    <div class="form-group has-feedback">
        <label for="penumpang" class="col-sm-2 control-label">Nama Pelanggan</label>
        <div class="col-sm-9" style="width: 930px">
            <?php
            // Fetch and display the selected passenger details
            $idPelanggan = $_POST['idpelanggan'];
            $sqlPelanggan = mysqli_query($koneksi, "SELECT * FROM Pelanggan WHERE IDPelanggan = $idPelanggan");
            $rowPelanggan = mysqli_fetch_assoc($sqlPelanggan);

            echo "Nama Pelanggan: " . $rowPelanggan['NamaPelanggan'] . "<br>";
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
        document.querySelector('input[name="jumlah_penumpang"]').addEventListener('change', function () {
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
            <a href="../index.php?submenu=<?php echo $subzero ?>" class="pull-left btn btn-primary" style="margin-left: 0px">Batal</a>
        </div>
    </div>
</form>
