<?php
require_once "../config/Database.php";
require_once "../classes/Rental.php";

$db = new Database();
$conn = $db->connect();
$rental = new Rental($conn);
$data = $rental->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental PS</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<h2>Data Penyewaan PS</h2>

<a href="add.php" class="btn tambah">+ Tambah Penyewa</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Jenis PS</th>
        <th>Lama</th>
        <th>Harga/Jam</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nama_penyewa"] ?></td>
            <td><?= $row["jenis_ps"] ?></td>
            <td><?= $row["lama_sewa"] ?> Jam</td>
            <td><?= $row["harga_per_jam"] ?></td>
            <td><?= $row["lama_sewa"] * $row["harga_per_jam"] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn edit">Ubah</a>
                <button onclick="hapusData(<?= $row['id'] ?>)" class="btn hapus">Hapus</button>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
