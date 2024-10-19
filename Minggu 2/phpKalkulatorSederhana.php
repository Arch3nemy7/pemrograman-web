<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    
<?php
    if (isset($_POST['submit'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operasi = $_POST['operasi'];
        switch ($operasi) {
            case 'Tidak Ada':
                $hasil = "Silakan pilih operasinya!";
                break;
            case 'Tambah':
                $hasil = $num1 + $num2;
                break;
            case 'Kurang':
                $hasil = $num1 - $num2;
                break;
            case 'Kali':
                $hasil = $num1 * $num2;
                break;
            case 'Bagi':
                $hasil = $num1 / $num2;
                break;
        }
    }
    ?>

    <div class="kalkulator">
    <h2 class="judul">Kalkulator Sederhana</h2>

    <form method="post" action="phpKalkulatorSederhana.php">
        <input type="text" name="num1" class="bil" autocomplete="off" placeholder="Masukkan angka pertama">
        <br><br>
        <input type="text" name="num2" class="bil" autocomplete="off" placeholder="Masukkan angka kedua">
        <br><br>
        <select class="opt" name="operasi">
            <option value="Tidak Ada">Tidak Ada</option>
            <option value="Tambah">Tambah</option>
            <option value="Kurang">Kurang</option>
            <option value="Kali">Kali</option>
            <option value="Bagi">Bagi</option>
        </select>
        <br><br>
        <button type="submit" name="submit" value="submit" class="tombol">Submit</button>
        <br><br>
    </form>

    <?php if(isset($_POST['submit'])){ ?>
    	<input type="text" value="<?php echo $hasil; ?>" class="bil">
    <?php }else{ ?>
    	<input type="text" value="0" class="bil">
    <?php } ?>	

    </div>
</body>
</html>