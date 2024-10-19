<?php
    // koneksi database
    include 'connection.php';

    // menangkap data yang di kirim dari form
    $Perusahaan = $_POST['Perusahaan'];
    $NamaDepan = $_POST['NamaDepan'];
    $NamaBelakang = $_POST['NamaBelakang'];
    $AlamatEmail = $_POST['AlamatEmail'];
    $Jabatan = $_POST['Jabatan'];
    $TeleponKantor = $_POST['TeleponKantor'];
    $TeleponRumah = $_POST['TeleponRumah'];
    $TeleponSeluler = $_POST['TeleponSeluler'];
    $NomorFaks = $_POST['NomorFaks'];
    $Alamat = $_POST['Alamat'];
    $Kota = $_POST['Kota'];
    $NegaraBagianAtauProvinsi = $_POST['NegaraBagianAtauProvinsi'];
    $KodePos = $_POST['KodePos'];
    $NegaraAtauKawasan = $_POST['NegaraAtauKawasan'];
    $HalamanWeb = $_POST['HalamanWeb'];
    $Negara = $_POST['NegaraAtauKawasan'];
    $Kategori = $_POST['Kategori'];
    $Catatan = $_POST['Catatan'];

    // menginput data ke database
    $sql = "INSERT INTO Kontak (Perusahaan, NamaBelakang, NamaDepan, AlamatEmail, Jabatan, TeleponKantor, TeleponRumah, TeleponSeluler, NomorFaks, Alamat, Kota, NegaraBagianAtauProvinsi, KodePos, NegaraAtauKawasan, HalamanWeb, Kategori, Catatan) Values ('$Perusahaan', '$NamaBelakang', '$NamaDepan', '$AlamatEmail', '$Jabatan', '$TeleponKantor', '$TeleponRumah', '$TeleponSeluler', '$NomorFaks', '$Alamat', '$Kota', '$NegaraBagianAtauProvinsi', '$KodePos', '$NegaraAtauKawasan', '$HalamanWeb', '$Kategori', '$Catatan')";
    $result = $db_conn->query($sql);
    
    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
?>