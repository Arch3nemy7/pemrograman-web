    <?php
    include './library/connection.php';
    $no = 1;
    $sql = "SELECT DISTINCT s.id_staff, s.nama_staff, s.jabatan_staff, s.gaji_staff, s.no_telepon_staff, s.email_staff, s.role
            FROM staff s
            ORDER BY s.id_staff";
    $result = pg_query($conn, $sql);
    ?>

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
        <title>Data Staff</title>
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
                                <a href="pelanggan4.php">
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
            <h2>Data Staff</h2>
            <a href="tambahStaff.php"><button class="pill">Tambah</button></a>
            <table class="content-table">
                <thead>
                    <tr>
                        <th class="table-head" align="center" colspan="8">
                            <h3>Daftar Staff</h3>
                        </th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama Staff</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = pg_fetch_assoc($result)) {
                        $class = ($no % 2 == 0) ? 'even' : 'odd';
                    ?>
                        <tr class="<?php echo $class; ?>">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_staff'] ?></td>
                            <td><?php echo $row['jabatan_staff'] ?></td>
                            <td><?php echo $row['gaji_staff'] ?></td>
                            <td><?php echo $row['no_telepon_staff'] ?></td>
                            <td><?php echo $row['email_staff'] ?></td>
                            <td><?php echo $row['role'] ?></td>
                            <td>
                                <a href="editStaff.php?id_staff=<?php echo $row['id_staff'] ?>"><button class="pill">Edit</button></a>
                                <a href="deleteStaff.php?id_staff=<?php echo $row['id_staff'] ?>"><button class="pill pill-hapus">Hapus</button></a>
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