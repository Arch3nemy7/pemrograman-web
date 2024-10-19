<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Minggu ke 5</title>
</head>
<body>

    <?php
        echo strlen("Hello, World!");

        echo "<br>";

        echo chr(80) . "<br>"; // Decimal
        echo chr(046) . "<br>"; // Octal
        echo chr(0x46) . "<br>"; // Hex

        $str = "Selamat datang di PENS";
        print_r(explode(" ", $str));

        echo "<br>";
        
        $str = "Hello";
        echo md5($str);
        
        echo "<br>";
        
        echo substr("Hello world", 1);
        
        echo "<br>";
        
        echo substr_count("Hello world. world The world is nice","world");
        
        echo "<br>";
        
        echo substr_replace("PPPHel","world", 3);
        
        echo "<br>";
        
        $str = "Hello World!";
        echo $str . "<br>";
        echo trim($str,"Hed!");

        echo "<br>";

        $str = "Hello World!";
        echo trim($str);

        $dat = '123A';
        if(is_numeric($dat)){
            echo "betul";
        }else{
            echo "salah";
        }
    ?>

</body>
</html>