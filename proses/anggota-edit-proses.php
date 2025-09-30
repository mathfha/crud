<?php
include '../koneksi.php'; 

$id_anggota    = $_POST['id_anggota']; 
$nama          = $_POST['nama']; 
$jenis_kelamin = $_POST['jenis_kelamin']; 
$alamat        = $_POST['alamat'];
$foto_awal     = $_POST['foto_awal'];

if (isset($_POST['simpan'])) {
    $nama_file = $_FILES['foto']['name'];

    if (!empty($nama_file)) {
        $lokasi_file = $_FILES['foto']['tmp_name']; 
        $tipe_file   = pathinfo($nama_file, PATHINFO_EXTENSION); 
        $file_foto   = $id_anggota . "." . $tipe_file; 

        $folder = "../assets/images/$file_foto";

        if ($foto_awal != "-" && file_exists("../assets/images/$foto_awal")) {
            unlink("../assets/images/$foto_awal");
        }

        if (!move_uploaded_file($lokasi_file, $folder)) {
            $file_foto = $foto_awal; 
        }
    } else {
        $file_foto = $foto_awal;
    }

    $sql = "UPDATE anggota 
            SET nama='$nama', jeniskelamin='$jenis_kelamin', alamat='$alamat', foto='$file_foto'
            WHERE idanggota='$id_anggota'";

    $query = mysqli_query($db, $sql);
    if (!$query) {
        die("Gagal update data: " . mysqli_error($db));
    }

    header("Location: ../index.php?p=anggota");
    exit;
}
?>
