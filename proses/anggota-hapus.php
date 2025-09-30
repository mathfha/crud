<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql = "SELECT foto FROM anggota WHERE idanggota='$id'";
$query = mysqli_query($db, $sql);
$data  = mysqli_fetch_assoc($query);

if ($data['foto'] != "-" && file_exists("../assets/images/".$data['foto'])) {
    unlink("../assets/images/".$data['foto']);
}

$sql_hapus = "DELETE FROM anggota WHERE idanggota='$id'";
$query_hapus = mysqli_query($db, $sql_hapus);

if ($query_hapus) {
    header("Location: ../index.php?p=anggota");
} else {
    echo "Gagal menghapus data: " . mysqli_error($db);
}
?>
