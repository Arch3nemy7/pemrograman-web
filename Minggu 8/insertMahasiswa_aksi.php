<?php
    include 'connection.php';

    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $email_student = $_POST['email_student'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $mata_kuliah_favorit = $_POST['mata_kuliah_favorit'];

    $sql = "INSERT INTO mahasiswa(nrp, nama, jenis_kelamin, jurusan, email_student, nomor_hp, alamat, asal_sekolah, mata_kuliah_favorit) VALUES ('$nrp', '$nama', '$jenis_kelamin', '$jurusan', '$email_student', '$nomor_hp', '$alamat', '$asal_sekolah', '$mata_kuliah_favorit')";
    
    if (pg_query($conn, $sql)) {
        echo "Data Baru berhasil di tambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . pg_last_error($conn);
    }

    pg_close($conn);
    header("location:index.php");
?>