<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PT. TSELALOE OEN TOENK</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            margin: 40px;
            background-color: #cf4d4dff;
        }
        .nota {
            background: white;
            border: 2px solid #000;
            padding: 25px;
            width: 600px;
            margin: auto;
        }
        h2, h3 {
            text-align: center;
            margin: 0;
        }
        hr {
            border: 1px solid #000;
        }
        table {
            width: 100%;
            margin-top: 10px;
        }
        td {
            padding: 5px;
            vertical-align: top;
        }
        .footer {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="nota">  
    <hr>
    <h2>PT. TSELALOE OEN TOENK</h2>
    <h4 style="text-align:center;">JL. Tselalu Bahagia No.13, Klaten</h4>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td>ID Karyawan</td><td>:</td>
                <td><input type="text" name="id" required></td>
            </tr>
            <tr>
                <td>Nama Karyawan</td><td>:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Gaji Pokok</td><td>:</td>
                <td><input type="number" name="gapok" required></td>
            </tr>
            <tr>
                <td>Jam Kerja</td><td>:</td>
                <td><input type="number" name="jam" required></td>
            </tr>
        </table>

        <br>
        <center>
            <input type="submit" name="proses" value="Hitung Gaji">
        </center>
    </form>

    <?php
    if (isset($_POST['proses'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $gapok = $_POST['gapok'];
        $jam = $_POST['jam'];

        $gator = $gapok * $jam;
        $potongan = 0.1 * $gator;
        $gaji_bersih = $gator - $potongan;

        echo "<hr>";
        echo "<h3>Slip Gaji Karyawan</h3>";
        echo "<table>";
        echo "<tr><td>ID Karyawan</td><td>:</td><td>$id</td></tr>";
        echo "<tr><td>Nama Karyawan</td><td>:</td><td>$nama</td></tr>";
        echo "<tr><td>Gaji Pokok</td><td>:</td><td>Rp " . number_format($gapok, 0, ',', '.') .
         "</td></tr>";
        echo "<tr><td>Jam Kerja</td><td>:</td><td>$jam Jam</td></tr>";
        echo "<tr><td>Gaji Kotor</td><td>:</td><td>Rp " . number_format($gator, 0, ',', '.') .
         "</td></tr>";
        echo "<tr><td>Potongan (10%)</td><td>:</td><td>Rp " . number_format($potongan, 0, ',', '.') .
         "</td></tr>";
        echo "<tr><td><b>Gaji Bersih</b></td><td>:</td><td><b>Rp " . number_format($gaji_bersih, 0, ',',
         '.') . "</b></td></tr>";
        echo "</table>";

        echo "<br><div class='footer'><b>Total Gaji Bersih Karyawan Rp " . number_format($gaji_bersih, 0, ',',
         '.') . "</b></div>";
    }
    ?>
</div>

</body>
</html>
