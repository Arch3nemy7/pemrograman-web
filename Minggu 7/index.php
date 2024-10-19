<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <title>Kontak Bisnis</title>
    </head>
    <body>
        <div class="home">
            <h2>Kontak Bisnis - MS Access</h2>       
            <a class="button" href="tambahKontak.php">Tambah Kontak</a>       
            <table border='1'>
            <tr>
                <th>No </th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Alamat Email</th>
                <th>Aksi</th>
            </tr>
            <?php
                include 'connection.php';
                // $update = "UPDATE Kontak SET NamaDepan = 'Panji' WHERE ID = 4";
                // $hasil = $db_conn->query($update);
                $no = 1;
                $sql = "SELECT ID, NamaBelakang, NamaDepan, AlamatEmail FROM Kontak";
                $result = $db_conn->query($sql);
                while ($row = $result->fetch()) {
            ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[3]?></td>
                    <td>
                        <a class="button" href="detailKontak.php?id=<?php echo $row[0]?>">Detail</a>
                        <a class="button" href="editKontak.php?id=<?php echo $row[0]?>">Edit</a>
                        <a class="button-hapus" href="deleteKontak.php?id=<?php echo $row[0]?>">Hapus</a>
                    </td>
                </tr>
            <?php
                }
                echo "</table>";
            ?>
        </div>
    </body>
</html>