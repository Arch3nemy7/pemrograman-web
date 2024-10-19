<?php
    $host = "localhost";
    $user = "postgres";
    $password = "6saturnus";
    $dbname = "siswa";

    $conn = pg_connect("host=$host port=5432 dbname=$dbname user=$user password=$password");
    
    if (!$conn) {
        die("Koneksi Gagal: " . pg_last_error());
    } else {
        // echo "Koneksi Berhasil<br/>";
    }
?>