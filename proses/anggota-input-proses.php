<?php
include '../koneksi.php';

$id_anggota    = $_POST['id_anggota'];
$nama          = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat        = $_POST['alamat'];
$status        = "Tidak Meminjam";

if (isset($_POST['simpan'])) {
    $nama_file = $_FILES['foto']['name'];

    if (!empty($nama_file)) {
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file   = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto   = $id_anggota . "." . $tipe_file;

        $folder = "../assets/images/$file_foto";
        if (move_uploaded_file($lokasi_file, $folder)) {
        } else {
            $file_foto = "-";
        }
    } else {
        $file_foto = "-";
    }

    $sql = "INSERT INTO anggota (idanggota, nama, jeniskelamin, alamat, status, foto)
            VALUES ('$id_anggota', '$nama', '$jenis_kelamin', '$alamat', '$status', '$file_foto')";
    
    $query = mysqli_query($db, $sql);
    if (!$query) {
        die("Gagal menyimpan data: " . mysqli_error($db));
    }

    header("Location: ../index.php?p=anggota");
    exit;
}
?>
