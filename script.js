function hapusData(id) {
    if (confirm("Yakin ingin menghapus data?")) {
        window.location.href = "delete.php?id=" + id;
    }
}