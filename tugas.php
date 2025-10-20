<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembelian Barang di Toko Komputer</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            background-color: #cce5ff; 
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            color: #003366;
            text-align: center;
        }
        form {
            background-color: #f0f8ff;
            padding: 20px;
            border: 2px solid #003366;
            border-radius: 10px;
            width: 420px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        label {
            display: inline-block;
            width: 130px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 200px;
            padding: 5px;
            border: 1px solid #666;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #003366;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0055aa;
        }
        .hasil {
            margin-top: 30px;
            background-color: #ffffff;
            border: 2px solid #003366;
            padding: 25px;
            width: 420px;
            border-radius: 10px;
            text-align: left;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        .hasil h3 {
            text-align: center;
            color: #003366;
            margin-bottom: 10px;
        }
        .hasil hr {
            border: 1px solid #003366;
        }
        .total {
            text-align: right;
            font-weight: bold;
            color: #003366;
        }
    </style>
</head>
<body>
    <h2>Program Pembelian Barang<br>Toko Komputer</h2>

    <form method="post">
        <label>Nama Barang:</label> 
        <input type="text" name="barang" required><br><br>

        <label>Harga Satuan:</label> 
        <input type="number" name="harga" required><br><br>

        <label>Jumlah Beli:</label> 
        <input type="number" name="jumlah" required><br><br>

        <label>Diskon (%) :</label> 
        <input type="number" name="diskon_manual" value="0" min="0" max="100"><br><br>

        <div style="text-align:center;">
            <input type="submit" name="hitung" value="Hitung Total">
        </div>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $barang = trim($_POST['barang'] ?? '');
        $barang = htmlspecialchars($barang, ENT_QUOTES, 'UTF-8');

        $harga = isset($_POST['harga']) ? (float) str_replace(',', '.', $_POST['harga']) : 0.0;
        $jumlah = isset($_POST['jumlah']) ? (int) $_POST['jumlah'] : 0;
        $diskon_manual = isset($_POST['diskon_manual']) ? (float) $_POST['diskon_manual'] : 0.0;

    
        if ($harga < 0) $harga = 0;
        if ($jumlah < 0) $jumlah = 0;
        if ($diskon_manual < 0) $diskon_manual = 0;
        if ($diskon_manual > 100) $diskon_manual = 100;

        $total = $harga * $jumlah;

        if ($jumlah >= 10) {
            $diskon_auto = 0.15 * $total;
        } elseif ($jumlah >= 5) {
            $diskon_auto = 0.10 * $total;
        } else {
            $diskon_auto = 0;
        }

        $diskon_tambahan = ($diskon_manual / 100) * $total;

        $diskon_total = $diskon_auto + $diskon_tambahan;

        $bayar = $total - $diskon_total;

        echo "<div class='hasil'>";
        echo "<h3>🧾 Nota Pembelian</h3>";
        echo "Nama Barang : <b>$barang</b><br>";
        echo "Harga Satuan : Rp " . number_format($harga, 0, ',', '.') . "<br>";
        echo "Jumlah Beli : $jumlah<br>";
        echo "Total Harga : Rp " . number_format($total, 0, ',', '.') . "<br>";
        echo "Diskon Otomatis : Rp " . number_format($diskon_auto, 0, ',', '.') . "<br>";
        echo "Diskon Tambahan ($diskon_manual%) : Rp " . number_format($diskon_tambahan, 0, ',', '.') . "<br>";
        echo "<hr>";
        echo "<div class='total'>Total Bayar : Rp " . number_format($bayar, 0, ',', '.') . "</div>";
        echo "</div>";
    }
    ?>
</body>
</html>
