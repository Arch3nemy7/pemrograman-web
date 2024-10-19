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
        <a href="insertMahasiswa.php"><button class="pill">Tambah Data</button></a>
        <table class="content-table">
            <thead>
                <tr>
                    <th class="table-head" align="center" colspan="5"><h3>Daftar Mahasiswa PENS</h3></th>
                </tr>
                <tr>
                    <th>No </th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $no = 1;
                $sql = "SELECT nrp, nama, jenis_kelamin FROM mahasiswa ORDER BY nrp";
                $result = pg_query($conn, $sql);
                while ($row = pg_fetch_assoc($result)) {
                    $class = ($no % 2 == 0) ? 'even' : 'odd';
                ?>
                    <tr class="<?php echo $class; ?>">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nrp'] ?></td>
                        <td><a href="detailMahasiswa.php?nrp=<?php echo $row['nrp'] ?>"><?php echo $row['nama'] ?></a></td>
                        <td><?php echo $row['jenis_kelamin'] ?></td>
                        <td>
                            <a href="editMahasiswa.php?nrp=<?php echo $row['nrp'] ?>"><button class="pill">Edit</button></a>
                            <a href="deleteMahasiswa.php?nrp=<?php echo $row['nrp'] ?>"><button class="pill pill-hapus">Hapus</button></a>
                        </td>
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