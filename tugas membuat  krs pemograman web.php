<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Rencana Studi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4a31d6ff;
            margin: 0;
            padding: 20px;
        }
        h2, h3 {
            text-align: center;
            margin: 5px;
        }
        form {
            background-color: #fffacd;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: 0 auto 20px auto;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }
        label { font-weight: bold; }
        input {
            margin-bottom: 10px;
            padding: 5px;
            width: 95%;
        }
        button {
            background-color: #6d57bd;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background-color: #5a47a0; }
        .krs-container {
            background: white;
            padding: 20px;
            width: 70%;
            margin: 0 auto;
            border: 1px solid black;
        }
        .header-krs { text-align: center; margin-bottom: 20px; }
        .identitas { margin-bottom: 15px; line-height: 1.8; }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
            text-align: center;
        }
        .print-btn {
            display: block;
            margin: 20px auto;
            background-color: darkgreen;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .print-btn:hover { background-color: green; }
        .back-btn {
            display: block;
            margin: 10px auto;
            background-color: darkred;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .back-btn:hover { background-color: red; }
        @media print {
            .print-btn, .back-btn { display: none; }
            body { background: white; }
            .krs-container { border: none; }
        }
    </style>
</head>
<body>

<?php if (!isset($_POST['submit'])): ?>
    <!-- FORM INPUT -->
    <h2>Formulir KRS Mahasiswa</h2>
    <form method="POST">
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        
        <label>Program Studi:</label><br>
        <input type="text" name="prodi" required><br>
        
        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br>
        
        <label>Mata Kuliah 1:</label><br>
        <input type="text" name="mk1" required><br>
        <label>SKS 1:</label><br>
        <input type="number" name="sks1" required><br>
        
        <label>Mata Kuliah 2:</label><br>
        <input type="text" name="mk2" required><br>
        <label>SKS 2:</label><br>
        <input type="number" name="sks2" required><br>
        
        <label>Mata Kuliah 3:</label><br>
        <input type="text" name="mk3" required><br>
        <label>SKS 3:</label><br>
        <input type="number" name="sks3" required><br><br>
        
        <button type="submit" name="submit">Simpan</button>
    </form>

<?php else: ?>
    <!-- HASIL KRS -->
    <div class="krs-container">
        <div class="header-krs">
            <h3>FAKULTAS ILMU KOMPUTER</h3>
            <h3>UNIVERSITAS DUTA BANGSA SURAKARTA</h3>
            <p>Jl. Bhayangkara 55 Surakarta</p>
            <hr>
            <h3>KARTU RENCANA STUDI</h3>
        </div>
        <div class="identitas">
            NIM : <?php echo htmlspecialchars($_POST['nim']); ?><br>
            Nama : <?php echo htmlspecialchars($_POST['nama']); ?><br>
            Program Studi : <?php echo htmlspecialchars($_POST['prodi']); ?><br>
            Kelas : <?php echo htmlspecialchars($_POST['kelas']); ?><br>
        </div>
        <h4>MATA KULIAH YANG DIAMBIL</h4>
        <table>
            <tr><th>No</th><th>Mata Kuliah</th><th>SKS</th></tr>
            <tr><td>1</td><td><?php echo htmlspecialchars($_POST['mk1']); ?></td><td><?php echo htmlspecialchars($_POST['sks1']); ?></td></tr>
            <tr><td>2</td><td><?php echo htmlspecialchars($_POST['mk2']); ?></td><td><?php echo htmlspecialchars($_POST['sks2']); ?></td></tr>
            <tr><td>3</td><td><?php echo htmlspecialchars($_POST['mk3']); ?></td><td><?php echo htmlspecialchars($_POST['sks3']); ?></td></tr>
            <tr><th colspan="2">Total SKS</th><th><?php echo intval($_POST['sks1']) + intval($_POST['sks2']) + intval($_POST['sks3']); ?></th></tr>
        </table>

        <button class="print-btn" onclick="window.print()">Cetak KRS</button>
        <button class="back-btn" onclick="window.location.href=window.location.pathname">Kembali ke Form</button>
    </div>
<?php endif; ?>

</body>
</html>
