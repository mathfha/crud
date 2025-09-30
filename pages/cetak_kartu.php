<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql   = "SELECT * FROM anggota WHERE idanggota='$id'";
$query = mysqli_query($db, $sql);
$data  = mysqli_fetch_assoc($query);
if (!$data) {
    die("Data tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Kartu Anggota</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0;
            background: #f8f8f8;
        }
        .kartu {
            width: 500px;
            height: 300px;
            border: 2px solid #000;
            padding: 20px;
            display: flex;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 12px;
            background: #fff;
        }
        .kartu .foto {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .kartu .foto img {
            width: 120px;
            height: 160px;
            object-fit: cover;
            border: 2px solid #333;
        }
        .kartu .data {
            width: 60%;
            padding-left: 20px;
        }
        .kartu h3 {
            margin: 0 0 15px 0;
            text-align: center;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
        .kartu p {
            margin: 8px 0;
            font-size: 14px;
        }
        @media print {
            .no-print { display: none; }
            body { justify-content: flex-start; align-items: flex-start; background: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="kartu">
        <div class="foto">
            <img src="../assets/images/<?php echo $data['foto']; ?>" alt="Foto">
        </div>
        <div class="data">
            <h3>Kartu Anggota Perpustakaan</h3>
            <p><strong>ID:</strong> <?php echo $data['idanggota']; ?></p>
            <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
            <p><strong>Jenis Kelamin:</strong> <?php echo $data['jeniskelamin']; ?></p>
            <p><strong>Alamat:</strong> <?php echo $data['alamat']; ?></p>
        </div>
    </div>

    <div class="no-print" style="margin-top:20px; text-align:center; width:100%;">
        <a href="../index.php?p=anggota">⬅️ Kembali</a>
    </div>
</body>
</html>
