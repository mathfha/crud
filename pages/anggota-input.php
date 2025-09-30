<div id="label-page"><h3>Input Data Anggota</h3></div>
<div id="content">
    <form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data" class="form-card">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">Foto</td>
                <td><input type="file" name="foto" class="form-input"></td>
            </tr>
            <tr>
                <td class="label-formulir">ID Anggota</td>
                <td><input type="text" name="id_anggota" class="form-input" placeholder="Masukkan ID Anggota"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama</td>
                <td><input type="text" name="nama" class="form-input" placeholder="Masukkan Nama Lengkap"></td>
            </tr>
            <tr>
                <td class="label-formulir">Jenis Kelamin</td>
                <td>
                    <label><input type="radio" name="jenis_kelamin" value="Pria"> Pria</label>
                    <label style="margin-left:15px;"><input type="radio" name="jenis_kelamin" value="Wanita"> Wanita</label>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Alamat</td>
                <td><textarea rows="3" cols="40" name="alamat" class="form-input" placeholder="Masukkan alamat"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="simpan" class="btn-submit" onclick="return confirm('Yakin Data Disimpan?')">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<style>
    #label-page h3 {
        text-align: center;
        background: #2c3e50;
        color: #fff;
        padding: 10px;
        border-radius: 6px;
    }
    .form-card {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0px 3px 8px rgba(0,0,0,0.2);
    }
    #tabel-input {
        width: 100%;
    }
    .label-formulir {
        width: 120px;
        padding: 8px;
        vertical-align: top;
        font-weight: bold;
    }
    .form-input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }
    .form-input:focus {
        border-color: #2c3e50;
        outline: none;
        box-shadow: 0 0 5px rgba(44,62,80,0.3);
    }
    .btn-submit {
        padding: 10px 20px;
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.3s;
    }
    .btn-submit:hover {
        background: #219150;
    }
</style>
