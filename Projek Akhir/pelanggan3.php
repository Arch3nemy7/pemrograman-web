<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3a65de3b60.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <style>
        .wrapper {
            margin: 150px auto;
            min-width: 30vw;
            max-width: 80vw;
        }

        .wrapper h2 {
            text-align: center;
        }

        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            width: 100%;
            font-size: 0.9em;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: rgba(250, 97, 91, 255);
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr.even {
            background-color: #f5f5f5;
        }

        .content-table tbody tr.odd {
            background-color: #ffffff;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid rgba(250, 97, 91, 255);
        }

        .content-table tbody tr:hover {
            /* font-weight: bold; */
            color: rgba(250, 97, 91, 255);
            background-color: #e1e1e1;
        }

        .table-head {
            border-bottom: 1px solid #cccccc;
        }

        .pill {
            font-size: 12px;
            font-family: "Readex Pro", sans-serif;
            padding: 0.5em 1em;
            margin: 0.25em;
            border-radius: 1em;
            border: none;
            outline: none;
            background: #009879;
            cursor: pointer;
        }

        .pill:hover {
            background: #16c09e;
        }

        .pill-hapus {
            background: rgb(255, 96, 96);
        }

        .pill-hapus:hover {
            background: rgb(255, 16, 16);
        }
    </style>
    <title>Data Penitipan</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="brand-logo"><img src="./images/logo.jpg" alt="logo"></div>
            <div class="navbar-links">
                <nav>
                    <ul>
                        <div class="navbar-links-btn">
                            <a href="index3.php#beranda">
                                <li>Beranda</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="index3.php#layanan">
                                <li>Layanan</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="index3.php#dokter">
                                <li>Dokter</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="index3.php#kontak">
                                <li>Kontak</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="pelanggan.php">
                                <li>Pelanggan</li>
                            </a>
                        </div>
                    </ul>
                </nav>
            </div>
            <div class="navbar-button">
                <ul>
                    <div class="navbar-button-sign">
                        <li><a href="logout.php">Log Out<i class="fas fa-sharp fa-solid fa-arrow-right-from-bracket"></i></a></li>
                    </div>
                </ul>
            </div>
        </div>
        <div class="wrapper">
            <h2>Data Penitipan</h2>
            <table class="content-table">
                <thead>
                    <tr>
                        <th class="table-head" align="center" colspan="11">
                            <h3>Daftar Penitipan Hewan</h3>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Peliharaan</th>
                        <th>Jenis Hewan</th>
                        <th>Catatan</th>
                        <th>Staff</th>
                        <th>Status Penitipan</th>
                        <th>Total Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Foto Peliharaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include './library/connection.php';
                    $no = 1;
                    $sql = "SELECT DISTINCT p.id_penitipan, pl.id_pelanggan, pl.nama_pelanggan, h.nama_peliharaan, h.jenis_hewan, p.status_penitipan, p.file_path, s.nama_staff, h.catatan, py.total_pembayaran, py.status_pembayaran
                            FROM penitipan p
                            JOIN hewan h ON p.id_peliharaan = h.id_peliharaan
                            JOIN pelanggan pl ON h.id_pelanggan = pl.id_pelanggan
                            JOIN staff s ON p.id_staff = s.id_staff
                            JOIN penitipan_detail pd ON p.id_penitipan = pd.id_penitipan
                            JOIN pembayaran py ON p.id_penitipan = py.id_penitipan
                            ORDER BY p.id_penitipan";
                    $result = pg_query($conn, $sql);
                    while ($row = pg_fetch_assoc($result)) {
                        $class = ($no % 2 == 0) ? 'even' : 'odd';
                    ?>
                        <tr class="<?php echo $class; ?>">
                            <td><?php echo $no++ ?></td>
                            <td><a href="detailPelanggan3.php?id_pelanggan=<?php echo $row['id_pelanggan'] ?>"><?php echo $row['nama_pelanggan'] ?></a></td>
                            <td><?php echo $row['nama_peliharaan'] ?></td>
                            <td><?php echo $row['jenis_hewan'] ?></td>
                            <td><?php echo $row['catatan'] ?></td>
                            <td><?php echo $row['nama_staff'] ?></td>
                            <td><?php echo $row['status_penitipan'] ?></td>
                            <td><?php echo $row['total_pembayaran'] ?></td>
                            <td><?php echo $row['status_pembayaran'] ?></td>
                            <td><a href="<?php echo $row['file_path']; ?>"><?php echo "Lihat Gambar" ?></a></td>
                            <td>
                                <a href="editPenitipan3.php?id_penitipan=<?php echo $row['id_penitipan'] ?>"><button class="pill">Edit</button></a>
                                <a href="deletePenitipan3.php?id_pelanggan=<?php echo $row['id_pelanggan'] ?>"><button class="pill pill-hapus">Hapus</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    pg_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>