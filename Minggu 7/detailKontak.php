<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kontak Bisnis</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body>
        <div>
            <h2>Kontak Bisnis - MS Access</h2>
            <br/>
            <a class="button" href="index.php">KEMBALI</a>
            <br/>
            <table border='1'>
            <tr>
                <th>No </th>
                <th>Perusahaan</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Alamat Email</th>
                <th>Jabatan</th>
                <th>Telepon Kantor</th>
                <th>Telepon Rumah</th>
                <th>Telepon Seluler</th>
                <th>Nomor Faks</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Negara Bagian/Provinsi</th>
                <th>Kode Pos</th>
                <th>Negara/Kawasan</th>
                <th>Halaman Web</th>
                <th>Catatan</th>
                <th>Kategori</th>
            </tr>
            <?php
                include 'connection.php';
                // $update = "UPDATE Kontak SET NamaDepan = 'Panji' WHERE ID = 4";
                // $hasil = $db_conn->query($update);
                // $no = 1;
                $id = $_GET['id'];
                $sql = "SELECT ID, Perusahaan, NamaBelakang, NamaDepan, AlamatEmail, Jabatan, TeleponKantor, TeleponRumah, TeleponSeluler, NomorFaks, Alamat, Kota, NegaraBagianAtauProvinsi, KodePos, NegaraAtauKawasan, HalamanWeb, Catatan, Kategori FROM Kontak WHERE id = $id";
                $result = $db_conn->query($sql);
                while ($row = $result->fetch()) {
            ?>
                <tr>
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
                    <td><?php echo $row[4]?></td>
                    <td><?php echo $row[5]?></td>
                    <td><?php echo $row[6]?></td>
                    <td><?php echo $row[7]?></td>
                    <td><?php echo $row[8]?></td>
                    <td><?php echo $row[9]?></td>
                    <td><?php echo $row[10]?></td>
                    <td><?php echo $row[11]?></td>
                    <td><?php echo $row[12]?></td>
                    <td><?php echo $row[13]?></td>
                    <td><?php echo $row[14]?></td>
                    <td><?php echo $row[15]?></td>
                    <td><?php echo $row[16]?></td>
                    <td><?php echo $row[17]?></td>
                </tr>
            <?php
                }
                echo "</table>";
            ?>
        </div>
    </body>
</html>