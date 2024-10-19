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
    <div class="container">
        <h2>Data Mahasiswa - PostgreSQL</h2>
        <a href="index.php"><button class="pill">Kembali</button></a>
        <table class="content-table">
            <thead>
                <tr>
                    <th class="table-head" align="center" colspan="2"><h3>Data Mahasiswa</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $nrp = $_GET['nrp'];
                $sql = "SELECT nrp, nama, jenis_kelamin, jurusan, email_student, nomor_hp, alamat, asal_sekolah, mata_kuliah_favorit FROM mahasiswa WHERE nrp = '$nrp'";
                $result = pg_query($conn, $sql);
                while ($row = pg_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td>NRP</td>
                        <td><?php echo $row['nrp'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo $row['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?php echo $row['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td><?php echo $row['jurusan'] ?></td>
                    </tr>
                    <tr>
                        <td>Email Student</td>
                        <td><?php echo $row['email_student'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $row['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td><?php echo $row['nomor_hp'] ?></td>
                    </tr>
                    <tr>
                        <td>Asal SMA</td>
                        <td><?php echo $row['asal_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <td>Mata Kuliah Favorit</td>
                        <td><?php echo $row['mata_kuliah_favorit'] ?></td>
                    </tr>
                <?php
                }
                pg_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>