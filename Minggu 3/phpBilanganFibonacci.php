<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deret Fibonacci</title>
</head>
<body>

    <form method="post" action="phpBilanganFibonacci.php">
        <input type="text" name="banyak" autocomplete="off" placeholder="Masukkan panjang deret fibonacci">
        <button type="submit" name="submit" value="submit">Submit</button>
    </form>

    <?php

    if (isset($_POST['submit'])){
        $banyak = $_POST['banyak'];
        $a = 0;
        $b = 1;

        echo "Deret Fibonacci: ";

        for($i = 1; $i <= $banyak; $i++){
            echo $a;
            echo " ";
            
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }
    }

    ?>
    
</body>
</html>