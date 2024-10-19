<?php
    include 'connection.php';

    $new_nrp = $_POST['new_nrp'];
    $old_nrp = $_POST['old_nrp'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];
    $email_student = $_POST['email_student'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $mata_kuliah_favorit = $_POST['mata_kuliah_favorit'];

    $sql = "SELECT nrp FROM mahasiswa WHERE nrp = '$new_nrp' AND nrp <> '$old_nrp'";
    $result = pg_query($conn, $sql);

    if (pg_num_rows($result) > 0) {
        echo "NRP sudah digunakan.";
    } else {
        $sql = "UPDATE mahasiswa SET nrp = '$new_nrp', nama = '$nama', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', email_student = '$email_student', nomor_hp = '$nomor_hp', alamat = '$alamat', asal_sekolah = '$asal_sekolah', mata_kuliah_favorit = '$mata_kuliah_favorit' WHERE nrp = '$old_nrp'";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo "Data berhasil diupdate.";
        } else {
            echo "Data gagal diupdate.";
        }
    }

    header("location:index.php");
?>