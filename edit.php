<?php
require_once "../config/Database.php";
require_once "../classes/Rental.php";

$db = new Database();
$conn = $db->connect();
$rental = new Rental($conn);

$id = $_GET['id'];
$data = $rental->getById($id);

if (isset($_POST['submit'])) {
    $rental->update($id, $_POST['nama'], $_POST['jenis'], $_POST['lama'], $_POST['harga']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Data Penyewa</h2>

<form method="POST">
    <label>Nama Penyewa:</label>
    <input type="text" name="nama" value="<?= $data['nama_penyewa'] ?>" required>

    <label>Jenis PS:</label>
    <input type="text" name="jenis" value="<?= $data['jenis_ps'] ?>" required>

    <label>Lama Sewa:</label>
    <input type="number" name="lama" value="<?= $data['lama_sewa'] ?>" required>

    <label>Harga per Jam:</label>
    <input type="number" name="harga" value="<?= $data['harga_per_jam'] ?>" required>

    <button type="submit" name="submit" class="btn edit">Update</button>
    <a href="index.php" class="btn back">Kembali</a>
</form>

</body>
</html>