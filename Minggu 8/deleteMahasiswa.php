<?php
    include 'connection.php';

    $nrp = $_GET['nrp'];

    $sql = "DELETE FROM mahasiswa WHERE nrp = '$nrp'";

    if (pg_query($conn, $sql)) {
        echo "Data Berhasil Terhapus";
    } else {
        echo "Gagal, Error : " . pg_last_error();
    }
    
    pg_close($conn);
    header("location:index.php");
?>