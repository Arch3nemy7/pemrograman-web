<?php
    include './library/connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM upload WHERE id = '$id'";

    if (pg_query($conn, $sql)) {
        echo "Data Berhasil Terhapus";
    } else {
        echo "Gagal, Error : " . pg_last_error();
    }
    
    pg_close($conn);
    header("location:dataTugas.php");
?>