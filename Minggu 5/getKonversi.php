<?php
    $nama = $_POST['nama'];
    $nilai_angka = $_POST['nilai_angka'];
    $hasilNama = cekNama($nama);
    $hasilNilai = cekNilai($nilai_angka);
    $nilai_huruf = '';
    
    if ($nama != $hasilNama || $nilai_angka != $hasilNilai) {
        header("location:formKonversi.php?nama=" . $hasilNama . "&nilai_angka=" . $hasilNilai);
    } else {
        echo 'Nama : ' . $_POST['nama'];
        echo '<br/>';
    }
    
    function cekNama($nama) 
    {   
        if ($nama == "") {
            $nama = "0";
        } else if (preg_match("/[0-9]/", $nama)) {
            $nama = "1";
        }
    
        return $nama;
    }
    
    function cekNilai($nilai_angka) 
    {   
        if ($nilai_angka == "") {
            $nilai_angka = "0";
        } else if (!preg_match("/[0-9]/", $nilai_angka)) {
            $nilai_angka = "1";
        }
    
        return $nilai_angka;
    }

    function konversi($nilai_angka) {
        if ($nilai_angka > 80) {
            $nilai_huruf = 'A';
        } else if ($nilai_angka > 70) {
            $nilai_huruf = 'AB';
        } else if ($nilai_angka > 65) {
            $nilai_huruf = 'B';
        } else if ($nilai_angka > 60) {
            $nilai_huruf = 'BC';
        } else if ($nilai_angka > 55) {
            $nilai_huruf = 'C';
        } else if ($nilai_angka > 40) {
            $nilai_huruf = 'D';
        } else {
            $nilai_huruf = 'E';
        }

        echo $nilai_huruf;
    }
    
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nilai_angka = $_POST['nilai_angka'];

        konversi($nilai_angka);
    }
?>