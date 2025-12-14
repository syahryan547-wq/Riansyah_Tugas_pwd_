<?php
require_once "../config/Database.php";
require_once "../classes/Rental.php";

$db = new Database();
$conn = $db->connect();
$rental = new Rental($conn);

if (isset($_POST['submit'])) {
    $rental->insert($_POST['nama'], $_POST['jenis'], $_POST['lama'], $_POST['harga']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Data Penyewa</h2>

<form method="POST">
    <label>Nama Penyewa:</label>
    <input type="text" name="nama" required>

    <label>Jenis PS:</label>
    <input type="text" name="jenis" required>

    <label>Lama Sewa:</label>
    <input type="number" name="lama" required>

    <label>Harga per Jam:</label>
    <input type="number" name="harga" required>

    <button type="submit" name="submit" class="btn tambah">Tambah</button>
    <a href="index.php" class="btn back">Kembali</a>
</form>

</body>
</html>