<?php
    // folder penempatan untuk file yang diupload bisa disesuaikan
    // selama PHP bisa membaca folder tersebut
    $uploadDir = './files/';

    if (isset($_POST['upload'])) {
        $fileName = $_FILES['userfile']['name'];
        $tmpName = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];
        $filePath = $uploadDir . $fileName;
        $nrp = $_GET['nrp'];

        // baca konten file
        $fileContent = file_get_contents($tmpName);

        // simpan file ke folder upload
        $result = move_uploaded_file($tmpName, $filePath);

        if (!$result) {
            echo "Error uploading file";
            exit;
        }

        include './library/connection.php';

        $fileName = stripslashes($fileName);
        $filePath = stripslashes($filePath);
        $fileName = pg_escape_string($conn, $fileName);
        $filePath = pg_escape_string($conn, $filePath);
        $fileContent = pg_escape_bytea($conn, $fileContent);

        // simpan informasi file ke dalam tabel upload
        $query = "INSERT INTO upload (name, size, type, path, content, nrp) " . "VALUES ('$fileName', '$fileSize', '$fileType', '$filePath', '$fileContent', '$nrp')";

        $result = pg_query($conn, $query);

        if (!$result) {
            echo "Error, query failed : " . pg_last_error();
            exit;
        }

        pg_close($conn);
        header("location:tugas.php");
    }
?>
