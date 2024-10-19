<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <style>
        .wrapper {
            margin: 150px auto;
            min-width: 30vw;
            max-width: 50vw;
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
            background-color: rgba(45, 83, 220);
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
            border-bottom: 2px solid rgba(45, 83, 220);
        }

        .content-table tbody tr:hover {
            /* font-weight: bold; */
            color: rgba(45, 83, 220);
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
    <title>Data Pelanggan</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="brand-logo"><img src="./images/logo.jpg" alt="logo"></div>
            <div class="navbar-links">
                <nav>
                    <ul>
                        <div class="navbar-links-btn">
                            <a href="index4.php#beranda">
                                <li>Beranda</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="index4.php#layanan">
                                <li>Layanan</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="index4.php#dokter">
                                <li>Dokter</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="index4.php#kontak">
                                <li>Kontak</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="#">
                                <li>Pelanggan</li>
                            </a>
                        </div>
                        <div class="navbar-links-btn">
                            <a href="staff.php">
                                <li>Staff</li>
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
    </div>
    <div class="wrapper">
        <h2>Data Pelanggan</h2>
        <a href="pelanggan4.php"><button class="pill">Kembali</button></a>
        <table class="content-table">
            <thead>
                <tr>
                    <th class="table-head" align="center" colspan="2">
                        <h3>Data Pelanggan</h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './library/connection.php';
                $id_pelanggan = $_GET['id_pelanggan'];
                $sql = "SELECT nama_pelanggan, alamat_pelanggan, no_telepon_pelanggan, email_pelanggan FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                $result = pg_query($conn, $sql);
                while ($row = pg_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td><?php echo $row['nama_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Pelanggan</td>
                        <td><?php echo $row['alamat_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <td>No Telepon Pelanggan</td>
                        <td><?php echo $row['no_telepon_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <td>Email Pelanggan</td>
                        <td><?php echo $row['email_pelanggan'] ?></td>
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