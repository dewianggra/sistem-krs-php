<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Sparepart & Aksesoris Motor</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #d45858ff;
        }
        .nota {
            background: white;
            border: 2px solid #000;
            padding: 20px;
            width: 450px;
            margin: auto;
        }
        h2, h3 {
            text-align: center;
            margin: 5px 0;
        }
        table {
            width: 100%;
            margin-top: 10px;
        }
        td {
            padding: 5px;
        }
        .hasil {
            font-weight: bold;
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="nota">
    <h2>TOKO SPAREPART & AKSESORIS MOTOR</h2>
    <h3>TOKO DRUPADI CANTIX</h3>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td>Nama Pembeli</td>
                <td>:</td>
                <td><input type="text" name="nama_pembeli" required></td>
            </tr>
            <tr>
                <td>ID Barang</td>
                <td>:</td>
                <td><input type="text" name="id_barang" required></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" required></td>
            </tr>
            <tr>
                <td>Harga Satuan</td>
                <td>:</td>
                <td><input type="number" name="harga" required></td>
            </tr>
            <tr>
                <td>Jumlah Beli</td>
                <td>:</td>
                <td><input type="number" name="jumlah" required></td>
            </tr>
        </table>

        <br>
        <center>
            <input type="submit" name="proses" value="Hitung Total">
        </center>
    </form>

    <?php
    if (isset($_POST['proses'])) {
        $nama_pembeli = $_POST['nama_pembeli'];
        $id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $total = $harga * $jumlah;

        echo "<hr>";
        echo "<h3>Nota Pembelian</h3>";
        echo "<table>";
        echo "<tr><td>Nama Pembeli</td><td>:</td><td>$nama_pembeli</td></tr>";
        echo "<tr><td>ID Barang</td><td>:</td><td>$id_barang</td></tr>";
        echo "<tr><td>Nama Barang</td><td>:</td><td>$nama_barang</td></tr>";
        echo "<tr><td>Harga Satuan</td><td>:</td><td>Rp " . number_format($harga, 0, ',', '.') . "</td></tr>";
        echo "<tr><td>Jumlah Beli</td><td>:</td><td>$jumlah</td></tr>";
        echo "<tr><td>Total Bayar</td><td>:</td><td><b>Rp " . number_format($total, 0, ',', '.') . "</b></td></tr>";
        echo "</table>";
        echo "<br><div class='footer'>
                <b>Total Pembayaran Rp " . number_format($total, 0, ',', '.') . "</b><br><br>
                Kasir,<br>
                <b>DRUPADI CANTIX</b>
              </div>";
    }
    ?>
</div>

</body>
</html>
