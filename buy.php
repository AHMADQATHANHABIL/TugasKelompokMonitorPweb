<?php
require 'koneksi.php'; 

$sql = "SELECT * FROM product_info";
$result = $conn->query($sql);

// Periksa jika kueri berhasil dijalankan
if ($result === false) {
    die("Error dalam menjalankan kueri: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="buy.css">
</head>
<body>
<section id="PaymentOptions" class="PaymentOptions">
    <div class="container">
        <h2>Metode Pembayaran</h2>
        <p>Silahkan pilih metode pembayaran Anda:</p>
        <form action="simpan_pesanan.php" method="post">
    <div class="mb-3">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="produk">Produk</label>
        <select class="form-control" id="produk" name="produk" required>
            <option value="-">Pilih produk anda...</option>
            <?php while($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?> - <?php echo $row['product_description']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="kapasitas">Kapasitas</label>
        <select class="form-control" id="kapasitas" name="kapasitas" required>
            <option value="-">Pilih kapasitas...</option>
            <option value="512gb">512gb</option>
            <option value="1tb">1tb</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
    </div>
    <div class="mb-3">
        <label for="ewalletSelection">PILIH E-WALLET</label>
        <select class="form-control" id="ewalletSelection" name="ewallet" required>
            <option value="-">--</option>
            <option value="DANA">DANA</option>
            <option value="GOPAY">GOPAY</option>
            <option value="SHOPPEPAY">SHOPPEPAY</option>
            <option value="OVO">OVO</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="bankSelection">PILIH BANK</label>
        <select class="form-control" id="bankSelection" name="bank" required>
            <option value="-">--</option>
            <option value="BANK BRI">BANK BRI</option>
            <option value="BANK MANDIRI">BANK MANDIRI</option>
            <option value="BANK BCA">BANK BCA</option>
            <option value="BANK BNI">BANK BNI</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="Total">Masukkan Jumlah Nominal :</label>
        <input type="text" class="form-control" id="Harga" name="Total" required>
    </div>
    <div class="mb-4">
        <button type="submit" class="btn btn-primary" name="beli">Bayar Sekarang</button>
    </div>
</form>

    </div>
</section>
</body>
</html>
