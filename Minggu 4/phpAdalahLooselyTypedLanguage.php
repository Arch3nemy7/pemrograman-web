<?php
    declare(strict_types=1); //strict mode
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Adalah Lossely Typed Language</title>
</head>
<body>
    
<?php
    function addNumbers(int $a, int $b) {
        return $a + $b;
    }
    
    echo addNumbers(5, "5");
?>
    
</body>
</html>