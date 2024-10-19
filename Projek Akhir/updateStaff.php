<?php
    include './library/connection.php';
    
    $new_id_staff = $_POST['new_id_staff'];
    $old_id_staff = $_POST['old_id_staff'];
    $nama_staff = $_POST['nama_staff'];
    $jabatan_staff = $_POST['jabatan_staff'];
    $gaji_staff = $_POST['gaji_staff'];
    $no_telepon_staff = $_POST['no_telepon_staff'];
    $email_staff = $_POST['email_staff'];
    $role = $_POST['role'];
    
    $sql = "UPDATE staff
            SET id_staff = '$new_id_staff',
                nama_staff = '$nama_staff',
                jabatan_staff = '$jabatan_staff',
                gaji_staff = '$gaji_staff',
                no_telepon_staff = '$no_telepon_staff',
                email_staff = '$email_staff',
                role = '$role'
            WHERE id_staff = '$old_id_staff'";
    
    $result = pg_query($conn, $sql);
    
    if ($result) {
        echo "Data staff berhasil diupdate.";
    } else {
        echo "Data staff gagal diupdate.";
    }

    header("location: editStaff.php?id_staff=$new_id_staff");
?>
