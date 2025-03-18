<?php
require 'function.php';

// Periksa apakah koneksi database tersedia
if (!isset($c)) {
    die("Koneksi database tidak ditemukan.");
}

if(isset($_GET['idp'])){
    $idp = mysqli_real_escape_string($c, $_GET['idp']);

    // Inisialisasi variabel untuk menghindari error undefined
    $tanggal = "-";
    $nama_pelanggan = "-";
    $ambil_detail = null;

    // Ambil data pesanan dan pelanggan
    $ambil = mysqli_query($c, "SELECT * FROM pesanan p 
                               JOIN pelanggan pl ON p.idpelanggan = pl.idpelanggan 
                               WHERE p.idorder='$idp'");

    if ($ambil && mysqli_num_rows($ambil) > 0) {
        $data = mysqli_fetch_array($ambil);
        $nama_pelanggan = $data['namapelanggan'];
        $tanggal = $data['tanggal'];
    } else {
        die("Pesanan tidak ditemukan! Pastikan ID pesanan benar.");
    }

    // Ambil detail pesanan
    $ambil_detail = mysqli_query($c, "SELECT dp.qty, pr.namaproduk, pr.harga 
                                      FROM detailpesanan dp 
                                      JOIN produk pr ON dp.idproduk = pr.idproduk 
                                      WHERE dp.idpesanan='$idp'");

    if (!$ambil_detail) {
        die("Error mengambil detail pesanan: " . mysqli_error($c));
    }
} else {
    die("ID pesanan tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembelian</title>
    <style>
        body { font-family: 'Courier New', monospace; text-align: center; background-color: #3E5879; }
        .struk {
            width: 320px;
            margin: 40px auto;
            padding: 15px;
            background: #fff;
            border: 1px solid #000;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
        }
        h2 { text-align: center; font-size: 18px; border-bottom: 1px dashed #000; padding-bottom: 5px; }
        p { margin: 5px 0; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; }
        th, td {
            border-bottom: 1px dashed #000;
            padding: 5px;
            text-align: left;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            border-top: 1px dashed #000;
            padding-top: 5px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="struk">
        <h2>KAWA CLOTHES<br>Jl. Raya Kebuyo 54</br></h2>
        <p><strong>Tanggal :</strong> <?php echo $tanggal; ?></p>
        <p><strong>Pelanggan :</strong> <?php echo $nama_pelanggan; ?></p>
        <table>
            <tr><th>Produk</th><th>Qty</th><th>Harga</th></tr>
            <?php
            $total = 0;
            if ($ambil_detail && mysqli_num_rows($ambil_detail) > 0) {
                while($row = mysqli_fetch_array($ambil_detail)) {
                    $subtotal = $row['qty'] * $row['harga'];
                    $total += $subtotal;
                    echo "<tr>
                            <td>{$row['namaproduk']}</td>
                            <td>{$row['qty']}</td>
                            <td>Rp. " . number_format($row['harga']) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada detail pesanan.</td></tr>";
            }
            ?>
            <tr><td colspan="2" class="total">Total</td><td class="total">Rp. <?php echo number_format($total); ?></td></tr>
        </table>
        <p class="footer">★★★★ HAPPY SHOPPING ★★★★<br>║▌║█║▌│║▌║▌█</p>
    </div>
</body>
</html>
                    