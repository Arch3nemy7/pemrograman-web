<?php
    // Sertakan file koneksi
    include 'connection.php';

    //Ambil id dari parameter GET
    $id = $_GET['id'];

    // Buat query SQL untuk menghapus data berdasarkan id
    $sql = "DELETE FROM Kontak WHERE ID = $id";

    // Eksekusi query SQL
    $result = $db_conn->query($sql);
    header("location:index.php");
?>