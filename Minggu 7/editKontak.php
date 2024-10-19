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
        <div class="home">
            <h2>Kontak Bisnis - MS Access</h2>
            <br/>
            <a class="button" href="index.php">KEMBALI</a>
            <br/>
            <br/>
            <?php
                include 'connection.php';
                $id = $_GET['id'];
                $sql = "SELECT ID, Perusahaan, NamaBelakang, NamaDepan, AlamatEmail, Jabatan, TeleponKantor, TeleponRumah, TeleponSeluler, NomorFaks, Alamat, Kota, NegaraBagianAtauProvinsi, KodePos, NegaraAtauKawasan, HalamanWeb, Kategori, Catatan FROM Kontak WHERE ID = $id";
                $result = $db_conn->query($sql);
                while($row = $result->fetch()) {
            ?>
                <form method="post" action="update.php">
                    <table>
                        <h3>Edit Kontak Bisnis</h3>
                        <tr>
                            <td>Perusahaan</td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
                                <input type="text" name="Perusahaan" value="<?php echo $row[1]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Belakang</td>
                            <td><input type="text" name="NamaBelakang" value="<?php echo $row[2]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama Depan</td>
                            <td><input type="text" name="NamaDepan" value="<?php echo $row[3]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat Email</td>
                            <td><input type="text" name="AlamatEmail" value="<?php echo $row[4]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><input type="text" name="Jabatan" value="<?php echo $row[5]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Telepon Kantor</td>
                            <td><input type="text" name="TeleponKantor" value="<?php echo $row[6]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Telepon Rumah</td>
                            <td><input type="text" name="TeleponRumah" value="<?php echo $row[7]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Telepon Seluler</td>
                            <td><input type="text" name="TeleponSeluler" value="<?php echo $row[8]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nomor Faks</td>
                            <td><input type="text" name="NomorFaks" value="<?php echo $row[9]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="Alamat" value="<?php echo $row[10]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Kota</td>
                            <td><input type="text" name="Kota" value="<?php echo $row[11]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Negara Bagian/Provinsi</td>
                            <td><input type="text" name="NegaraBagianAtauProvinsi" value="<?php echo $row[12]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Kode Pos</td>
                            <td><input type="text" name="KodePos" value="<?php echo $row[13]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Halaman Web</td>
                            <td><input type="text" name="HalamanWeb" value="<?php echo $row[14]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Negara/Kawasan</td>
                            <td><input type="text" name="NegaraAtauKawasan" value="<?php echo $row[15]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><input type="text" name="Kategori" value="<?php echo $row[16]; ?>"></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td><input type="text" name="Catatan" value="<?php echo $row[17]; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="SIMPAN"></td>
                        </tr>
                    </table>
                </form>
            <?php
                }
            ?>
        </div>
    </body>
</html>