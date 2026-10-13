<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP</title>
</head>
<body>
    <form action="" method="POST">
    <label for="namaBarang">
        Nama barang:
        <input type="text" placeholder="Masukan nama barang" id="namaBarang" name="namaBarang">
    </label><br>
    <label for="hargaSatuan">
        Harga satuan:
        <input type="number" placeholder="Masukan harga satuan" id="hargaSatuan" name="hargaSatuan">
    </label><br>
    <label for="jumlahPembelian">
        Jumlah pembelian:
        <input type="number" placeholder="Masukan jumlah pembelian" id="jumlahPembelian" name="jumlahPembelian">
    </label><br>
    <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
    if (isset($_POST["submit"])) {

        $namaBarang = $_POST["namaBarang"];
        $hargaSatuan = $_POST["hargaSatuan"];
        $jumlahPembelian = $_POST["jumlahPembelian"];

        if ($hargaSatuan <= 0 || $jumlahPembelian <= 0) {
            echo "Error: harga tidak boleh minus dan jumlah pembelian minimal 1";
        } else {
            $totalHarga = $hargaSatuan * $jumlahPembelian;
            
            $diskoPersen = 0;
            if ($totalHarga >= 500000) {
                $diskonPersen = 20;
            } elseif ($totalHarga >= 250000) {
                $diskonPersen = 10;
            } else {
                $diskonPersen = 0;
            }

            $nilaiDiskon = $totalHarga * ($diskonPersen / 100);
            $totalPembayaran = $totalHarga - $nilaiDiskon;

            echo "<div class='hasil'>";
            echo "<h3>Detail Pembayaran</h3>";
            echo "<p><strong>Nama Barang:</strong> " . htmlspecialchars($namaBarang) . "</p>";
            echo "<p><strong>Harga Satuan:</strong> Rp " . number_format($hargaSatuan, 0, ',', '.') . "</p>";
            echo "<p><strong>Jumlah Pembelian:</strong> " . $jumlahPembelian . "</p>";
            echo "<p><strong>Total Harga Sebelum Diskon:</strong> Rp " . number_format($totalHarga, 0, ',', '.') . "</p>";
            echo "<p><strong>Diskon:</strong> " . $diskonPersen . "% (Potongan Rp " . number_format($nilaiDiskon, 0, ',', '.') . ")</p>";
            echo "<hr>";
            echo "<p><strong>Total Pembayaran:</strong> <span>Rp " . number_format($totalPembayaran, 0, ',', '.') . "</span></p>";
            echo "</div>";
        
        }



    }

?>