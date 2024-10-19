<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="wrapper">
        <div class="title">
            Tambah Data Mahasiswa
        </div>
        <div class="form">
            <form action="insertMahasiswa_aksi.php" method="post">
                <div class="input-field">
                    <label>NRP</label>
                    <input type="text" name="nrp" class="input">
                </div>
                <div class="input-field">
                    <label>Nama</label>
                    <input type="text" name="nama" class="input">
                </div>
                <div class="input-field">
                    <label>Jenis Kelamin</label>
                    <div class="custom-select">
                        <select name="jenis_kelamin">
                            <option value="" selected disabled>Select</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="input-field">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="input">
                </div>
                <div class="input-field">
                    <label>Email Student</label>
                    <input type="text" name="email_student" class="input">
                </div>
                <div class="input-field">
                    <label>Alamat</label>
                    <textarea name="alamat" class="textarea"></textarea>
                </div>
                <div class="input-field">
                    <label>No HP</label>
                    <input type="text" name="nomor_hp" class="input">
                </div>
                <div class="input-field">
                    <label>Asal SMA</label>
                    <input type="text" name="asal_sekolah" class="input">
                </div>
                <div class="input-field">
                    <label>Mata Kuliah Favorit</label>
                    <input type="text" name="mata_kuliah_favorit" class="input">
                </div>
                <div class="input-field">
                    <input type="submit" name="tambah" class="button">
                </div>
            </form>
            <a href="index.php"><button class="button">Kembali</button></a>
        </div>
    </div>
</body>

</html>