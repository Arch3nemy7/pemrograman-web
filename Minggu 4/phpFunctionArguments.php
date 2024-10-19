<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Function Arguments</title>
</head>
<body>

<?php
    function familyName($fname) {
        echo "$fname Refsnes.<br>";
    }

    function familyName2 ($fname, $year) {
        echo "$fname Refsnes. Born in $year <br>";
    }

    familyName("Jani");
    familyName("Hege");
    familyName("Stale");
    familyName("Kai Jim");
    familyName("Borge");

    echo "<br>";

    familyName2("Hege", "1975");
    familyName2("Stale", "1978");
    familyName2("Kai Jim", "1983");
?>
    
</body>
</html>