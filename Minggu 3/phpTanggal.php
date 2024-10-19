<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Tanggal</title>
</head>
<body>

<?php 
    date_default_timezone_set("Asia/Jakarta");
    
    $day = date('l');
    $date = date('d');
    $month = date('m');
    $tahun = date('Y');

    switch($day){
        case 'Sunday':
            $day = 'Minggu';
            break;
        case 'Monday':
            $day = 'Senin';
            break;
        case 'Tuesday':
            $day = 'Selasa';
            break;
        case 'Wednesday':
            $day = 'Rabu';
            break;
        case 'Thursday':
            $day = 'Kamis';
            break;
        case 'Friday':
            $day = 'Jumat';
            break;
        case 'Saturday':
            $day = 'Sabtu';
            break;
    }

    switch($month){
        case 1:
            $month = 'Januari';
            break;
        case 2:
            $month = 'Februari';
            break;
        case 3:
            $month = 'Maret';
            break;
        case 4:
            $month = 'April';
            break;
        case 5:
            $month = 'Mei';
            break;
        case 6:
            $month = 'Juni';
            break;
        case 7:
            $month = 'Juli';
            break;
        case 8:
            $month = 'Agustus';
            break;
        case 9:
            $month = 'September';
            break;
        case 10:
            $month = 'Oktober';
            break;
        case 11:
            $month = 'November';
            break;
        case 12:
            $month = 'Desember';
            break;
    }

    echo "Sekarang hari : $day, $date $month $tahun";
?>

</body>
</html>