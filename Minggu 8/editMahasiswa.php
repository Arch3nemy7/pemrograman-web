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
    <div>
        <?php
        include 'connection.php';
        $nrp = $_GET['nrp'];
        $sql = "SELECT nrp, nama, jenis_kelamin, jurusan, email_student, nomor_hp, alamat, asal_sekolah, mata_kuliah_favorit FROM mahasiswa WHERE nrp = '$nrp'";
        $result = pg_query($conn, $sql);
        while ($row = pg_fetch_assoc($result)) {
        ?>
            <div class="wrapper">
                <div class="title">
                    Edit Data Mahasiswa
                </div>
                <div class="form">
                    <form method="post" action="update.php">
                        <div class="input-field">
                            <label>NRP</label>
                            <input type="text" name="new_nrp" class="input" value="<?php echo $row['nrp']; ?>">
                            <input type="hidden" name="old_nrp" value="<?php echo $row['nrp']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Nama</label>
                            <input type="text" name="nama" class="input" value="<?php echo $row['nama']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <div class="custom-select">
                                <select name="jenis_kelamin">
                                    <option value="" disabled>Select</option>
                                    <option value="Laki-Laki" <?php if ($row['jenis_kelamin'] == 'Laki-Laki') {
                                                                    echo 'selected';
                                                                } ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') {
                                                                    echo 'selected';
                                                                } ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" class="input" value="<?php echo $row['jurusan']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Email Student</label>
                            <input type="text" name="email_student" class="input" value="<?php echo $row['email_student']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Alamat</label>
                            <textarea name="alamat" class="textarea"><?php echo $row['alamat']; ?></textarea>
                        </div>
                        <div class="input-field">
                            <label>No HP</label>
                            <input type="text" name="nomor_hp" class="input" value="<?php echo $row['nomor_hp']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Asal SMA</label>
                            <input type="text" name="asal_sekolah" class="input" value="<?php echo $row['asal_sekolah']; ?>">
                        </div>
                        <div class="input-field">
                            <label>Mata Kuliah Favorit</label>
                            <input type="text" name="mata_kuliah_favorit" class="input" value="<?php echo $row['mata_kuliah_favorit']; ?>">
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Submit" class="button">
                        </div>
                    </form>
                    <a href="index.php"><button class="button">Kembali</button></a>
                </div>
            </div>
        <?php
        }
        pg_close($conn);
        ?>
    </div>
</body>

</html>