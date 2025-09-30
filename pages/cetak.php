<?php
include '../koneksi.php';

$sql   = "SELECT * FROM anggota";
$query = mysqli_query($db, $sql);
if (!$query) {
    die("Query Error: " . mysqli_error($db));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 60px;
            height: auto;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <h2>Data Anggota Perpustakaan</h2>

    <table>
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $row['idanggota']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jeniskelamin']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if ($row['foto'] != "-") { ?>
                            <img src="../assets/images/<?php echo $row['foto']; ?>">
                        <?php } else { ?>
                            Tidak ada
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="no-print" style="margin-top:20px; text-align:center;">
        <button onclick="window.print()">Cetak</button>
        <a href="../index.php?p=anggota">Kembali</a>
    </div>
</body>
</html>
