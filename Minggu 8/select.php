<?php
    include 'connection.php';

    $sql = "SELECT * FROM siswa";
    
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            echo "NRP : " . $row["nrp"]. "<br>";
            echo "Nama : " . $row["nama"]. "<br>";
            echo "Umur : " . $row["umur"]. " tahun <br>";
            echo "Jenis Kelamin : " . $row["jenis_kelamin"]. "<br>";
            echo "Alamat : ".$row["alamat"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    pg_close($conn);
?>