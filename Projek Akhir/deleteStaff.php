<?php
    include './library/connection.php';
    
    $id_staff = $_GET['id_staff'];
    
    // Hapus data dari tabel staff berdasarkan id_staff
    $sql_delete_staff = "DELETE FROM staff
                         WHERE id_staff = '$id_staff'";
    $result_delete_staff = pg_query($conn, $sql_delete_staff);
    
    if ($result_delete_staff) {
        echo "Data staff berhasil dihapus.";
    } else {
        echo "Gagal menghapus data staff. Error: " . pg_last_error();
    }
    
    pg_close($conn);
    header("location:staff.php");
?>