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
    <title>Main User Page</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Sidebar</h2>
            <div class="menu">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="profile.php"><i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="mahasiswa.php"><i class="fas fa-address-card"></i>Data Mahasiswa</a></li>
                    <li class="active"><a href="tugas.php"><i class="fas fa-project-diagram"></i>Upload Tugas</a></li>
                    <li><a href="dataTugas.php"><i class="fas fa-project-diagram"></i>Data Tugas</a></li>
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
                <h2>Upload Tugas</h2>
            </div>
            <div class="content-upload">
                <div class="info">
                    <h2>Upload File</h2>
                </div>
                <?php
                include './library/connection.php';
                $nrp = $_SESSION['nrp'];
                ?>
                <form enctype="multipart/form-data" method="post" action="upload.php?nrp=<?php echo $nrp ?>">
                    <input type="file" name="userfile"><br>
                    <input class="button" type="submit" name="upload" value="Upload">
                </form>
            </div>
        </div>
    </div>
</body>

</html>