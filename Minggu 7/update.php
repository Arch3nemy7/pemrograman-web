<?php
    //koneksi database
    include 'connection.php';

    //menangkap data yang dikirim dari form
    $id = $_POST['id'];
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
    //echo $NamaBelakang

    //update data ke data base
    $sql = "UPDATE Kontak Set Perusahaan='$Perusahaan', NamaBelakang='$NamaBelakang', NamaDepan='$NamaDepan', AlamatEmail='$AlamatEmail', Jabatan='$Jabatan', TeleponKantor='$TeleponKantor', TeleponRumah='$TeleponRumah', TeleponSeluler='$TeleponSeluler', NomorFaks='$NomorFaks', Alamat='$Alamat', Kota='$Kota', NegaraBagianAtauProvinsi='$NegaraBagianAtauProvinsi', KodePos='$KodePos', NegaraAtauKawasan='$NegaraAtauKawasan', HalamanWeb='$HalamanWeb', Kategori='$Kategori', Catatan='$Catatan' WHERE ID = $id";
    $result = $db_conn->query($sql);

    //mengalihkan halaman kembali ke index.php
    header("location:index.php");
?>