<!DOCTYPE html>
<html lang="en">
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
            <br>
            <a class="button" href="index.php">KEMBALI</a>
            <br>
            <br>
            <form action="tambahKontak_aksi.php" method="post">
                <table>
                    <h3>Tambah Data Kontak Bisnis</h3>
                    <tr>
                        <td>Perusahaan</td>
                        <td><input type="text" name="Perusahaan"></td>
                    </tr>
                    <tr>
                        <td>Nama Depan</td>
                        <td><input type="text" name="NamaDepan"></td>
                    </tr>
                    <tr>
                        <td>Nama Belakang</td>
                        <td><input type="text" name="NamaBelakang"></td>
                    </tr>
                    <tr>
                        <td>Alamat Email</td>
                        <td><input type="text" name="AlamatEmail"></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td><input type="text" name="Jabatan"></td>
                    </tr>
                    <tr>
                        <td>Telepon Kantor</td>
                        <td><input type="text" name="TeleponKantor"></td>
                    </tr>
                    <tr>
                        <td>Telepon Rumah</td>
                        <td><input type="text" name="TeleponRumah"></td>
                    </tr>
                    <tr>
                        <td>Telepon Seluler</td>
                        <td><input type="text" name="TeleponSeluler"></td>
                    </tr>
                    <tr>
                        <td>Nomor Faks</td>
                        <td><input type="text" name="NomorFaks"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><input type="text" name="Alamat"></td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td><input type="text" name="Kota"></td>
                    </tr>
                    <tr>
                        <td>Negara Bagian/Provinsi</td>
                        <td><input type="text" name="NegaraBagianAtauProvinsi"></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td><input type="text" name="KodePos"></td>
                    </tr>
                    <tr>
                        <td>Halaman Web</td>
                        <td><input type="text" name="HalamanWeb"></td>
                    </tr>
                    <tr>
                        <td>Negara/Kawasan</td>
                        <td><input type="text" name="NegaraAtauKawasan"></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td><input type="text" name="Kategori"></td>
                    </tr>
                    <tr>
                        <td>Catatan</td>
                        <td><input type="text" name="Catatan"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="Tambah"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>