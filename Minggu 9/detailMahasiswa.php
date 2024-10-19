<?php
session_start();

if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {
    header('Location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <script src="https://kit.fontawesome.com/3a65de3b60.js" crossorigin="anonymous"></script>
    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Menu</h2>
            <div class="menu">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="profile.php"><i class="fas fa-user"></i>Profile</a></li>
                    <li class="active"><a href="mahasiswa.php"><i class="fas fa-address-card"></i>Data Mahasiswa</a></li>
                    <li><a href="tugas.php"><i class="fas fa-project-diagram"></i>Upload Tugas</a></li>
                </ul>
            </div>
            <div class="logout">
                <ul>
                <li><a href="logout.php"><i class="fas fa-sharp fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="header">
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="content">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th class="table-head" align="center" colspan="3">
                                <h3>Data Mahasiswa</h3>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './library/connection.php';
                        $nrp = $_GET['nrp'];
                        $sql = "SELECT nrp, nama, jenis_kelamin, jurusan, email_student, nomor_hp, alamat, asal_sekolah, mata_kuliah_favorit FROM mahasiswa WHERE nrp = '$nrp'";
                        $result = pg_query($conn, $sql);
                        while ($row = pg_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td colspan="2" align="center"><img src="images/<?php echo $row['nrp'] ?>.jpg" alt="Foto Mahasiswa"></td>
                            </tr>
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
        </div>
    </div>

</body>

</html>