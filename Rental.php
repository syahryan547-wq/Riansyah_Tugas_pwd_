<?php
class Rental {
    private $conn;
    private $table = "ps";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nama, $jenis, $lama, $harga) {
        $query = "INSERT INTO $this->table (nama_penyewa, jenis_ps, lama_sewa, harga_per_jam)
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nama, $jenis, $lama, $harga]);
    }

    public function update($id, $nama, $jenis, $lama, $harga) {
        $query = "UPDATE $this->table SET nama_penyewa=?, jenis_ps=?, lama_sewa=?, harga_per_jam=?
                  WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nama, $jenis, $lama, $harga, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}