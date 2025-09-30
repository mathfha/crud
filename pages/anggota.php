<div id="label-page">
    <h3>Tampil Data Anggota</h3>
</div>

<div id="content">
    <p id="tombol-tambah-container">
        <a href="index.php?p=anggota-input" class="tombol">Tambah Anggota</a>
        <a target="_blank" href="pages/cetak.php" class="tombol">Cetak</a>
    </p>

    <div style="text-align:right; margin-bottom:10px;">
        <form method="POST" class="form-inline">
            <input type="text" name="pencarian" placeholder="Cari anggota..." style="padding:5px;">
            <input type="submit" name="search" value="Cari" class="tombol">
        </form>
    </div>

    <table id="tabel-tampil" border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse; text-align:center;">
        <thead style="background:#f2f2f2;">
            <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $batas = 10;
        extract($_GET);
        if(empty($hal)){
            $posisi = 0;
            $hal = 1;
            $nomor = 1;
        } else {
            $posisi = ($hal - 1) * $batas; 
            $nomor = $posisi + 1; 
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){ 
            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian'])); 
            if($pencarian != ""){ 
                $sql = "SELECT * FROM anggota WHERE nama LIKE '%$pencarian%'
                        OR idanggota LIKE '%$pencarian%'
                        OR jeniskelamin LIKE '%$pencarian%'
                        OR alamat LIKE '%$pencarian%'"; 
                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM anggota LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM anggota";
            }
        } else {
            $query = "SELECT * FROM anggota LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM anggota";
        }
        
        $q_tampil_anggota = mysqli_query($db, $query);
        if(mysqli_num_rows($q_tampil_anggota) > 0){
            while($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)){
                if(empty($r_tampil_anggota['foto']) || $r_tampil_anggota['foto']=='-'){
                    $foto = "admin-no-photo.jpg";
                } else {
                    $foto = $r_tampil_anggota['foto'];
                }
        ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_anggota['idanggota']; ?></td>
                <td><?php echo $r_tampil_anggota['nama']; ?></td>
                <td><img src="assets/images/<?php echo $foto; ?>" width="60" height="60" style="border-radius:5px;"></td>
                <td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
                <td><?php echo $r_tampil_anggota['alamat']; ?></td>
                <td>
                    <a target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol">Cetak</a>
                    <a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol">Edit</a>
                    <a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a>
                </td>
            </tr>
        <?php 
                $nomor++; 
            }
        } else {
            echo "<tr><td colspan='7'>Data Tidak Ditemukan</td></tr>";
        }?>
        </tbody>
    </table>

    <div style="margin-top:10px; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <?php
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            if(isset($_POST['pencarian']) && $_POST['pencarian']!=''){
                echo "Data Hasil Pencarian: <b>$jml</b>";
            } else {
                echo "Jumlah Data: <b>$jml</b>";
            }
            ?>
        </div>
        <div class="pagination">
            <?php
            $jml_hal = ceil($jml/$batas);
            for($i=1; $i<=$jml_hal; $i++){
                if($i != $hal){
                    echo "<a href=\"?p=anggota&hal=$i\" class=\"tombol\">$i</a> ";
                } else {
                    echo "<span class=\"tombol\" style=\"background:#555; color:white;\">$i</span> ";
                }
            }
            ?>
        </div>
    </div>
</div>