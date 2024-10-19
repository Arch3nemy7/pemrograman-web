<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deret Bilangan Prima</title>
</head>
<body>

    <form method="post" action="phpBilanganPrima.php">
        <input type="text" name="banyak" autocomplete="off" placeholder="Masukkan panjang deret bilangan prima">
        <button type="submit" name="submit" value="submit">Submit</button>
    </form>

<?php

    if (isset($_POST['submit'])){
        $banyak = $_POST['banyak'];
        $jumlah = 0;
        $is_prime;
            
        for($i = 2; $jumlah < $banyak; $i++){
            $is_prime = 1;

            for($j = 2; $j <= $i / 2; $j++){
                if($i % $j == 0){
                    $is_prime = 0;
                    break;
                }
            }
            
            if($is_prime == 1){
                echo $i;
                echo " ";
                $jumlah++;
            }

        }    
    }
        
?>
    
</body>
</html>