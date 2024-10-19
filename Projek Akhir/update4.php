<?php
    include './library/connection.php';

    $new_id_penitipan = $_POST['new_id_penitipan'];
    $old_id_penitipan = $_POST['old_id_penitipan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama_peliharaan = $_POST['nama_peliharaan'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $status_penitipan = $_POST['status_penitipan'];
    $nama_staff = $_POST['nama_staff'];
    $catatan = $_POST['catatan'];
    $status_pembayaran = $_POST['status_pembayaran'];
    $total_pembayaran = $_POST['total_pembayaran'];

    $sql = "UPDATE penitipan SET id_penitipan = '$new_id_penitipan', status_penitipan = '$status_penitipan' WHERE id_penitipan = '$old_id_penitipan'";
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "Data penitipan berhasil diupdate.";
    } else {
        echo "Data penitipan gagal diupdate.";
    }

    $sql = "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan' WHERE id_pelanggan = (SELECT id_pelanggan FROM hewan WHERE id_peliharaan = '$old_id_penitipan')";
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "Data pelanggan berhasil diupdate.";
    } else {
        echo "Data pelanggan gagal diupdate.";
    }

    $sql = "UPDATE hewan SET nama_peliharaan = '$nama_peliharaan', jenis_hewan = '$jenis_hewan', catatan = '$catatan' WHERE id_peliharaan = '$old_id_penitipan'";
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "Data hewan berhasil diupdate.";
    } else {
        echo "Data hewan gagal diupdate.";
    }

    $sql = "UPDATE staff SET nama_staff = '$nama_staff' WHERE id_staff = (SELECT id_staff FROM penitipan WHERE id_penitipan = '$old_id_penitipan')";
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "Data staff berhasil diupdate.";
    } else {
        echo "Data staff gagal diupdate.";
    }

    $sql = "UPDATE pembayaran SET status_pembayaran = '$status_pembayaran', total_pembayaran = '$total_pembayaran' WHERE id_penitipan = '$old_id_penitipan'";
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "Data pembayaran berhasil diupdate.";
    } else {
        echo "Data pembayaran gagal diupdate.";
    }

    header("location: editPenitipan4.php");
?>
