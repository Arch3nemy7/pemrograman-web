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
                    <li><a href="mahasiswa.php"><i class="fas fa-address-card"></i>Data Mahasiswa</a></li>
                    <li><a href="tugas.php"><i class="fas fa-project-diagram"></i>Upload Tugas</a></li>
                    <li class="active"><a href="dataTugas.php"><i class="fas fa-project-diagram"></i>Data Tugas</a></li>
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
                <h2>Data Tugas</h2>
            </div>
            <div class="content">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th class="table-head" align="center" colspan="5">
                                <h3>Daftar File Tugas</h3>
                            </th>
                        </tr>
                        <tr>
                            <th>No </th>
                            <th>Nama File</th>
                            <th>Ukuran File</th>
                            <th>Tipe File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './library/connection.php';
                        $nrp = $_SESSION['nrp'];
                        $no = 1;
                        $sql = "SELECT id, name, size, type, path FROM upload WHERE nrp = '$nrp' ORDER BY id";
                        $result = pg_query($conn, $sql) or die('Error, query failed');

                        while (list($id, $name, $size, $type, $path) = pg_fetch_array($result)) {
                            $class = ($no % 2 == 0) ? 'even' : 'odd';
                        ?>
                            <tr class="<?php echo $class; ?>">
                                <td><?php echo $no++ ?></td>
                                <td><a href="<?php echo $path; ?>" download><?php echo $name ?></a></td>
                                <td><?php echo number_format($size / 1024, 2) ?> KB</td>
                                <td><?php echo $type ?></td>
                                <td>
                                    <a href="deleteTugas.php?id=<?php echo $id ?>"><button class="pill pill-hapus">Hapus</button></a>
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
    </div>

</body>

</html>