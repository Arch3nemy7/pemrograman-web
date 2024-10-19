<!DOCTYPE html>
<html>
<head>
    <title>Coba PHP</title>
    PRAKTIKUM
    Praktikum Pemrograman WEB
    Page 4
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <?php
        if (isset ($_GET['nama']) && $_GET['nama'] == "0") {
            $nama_str = "<p style='color:red'>Nama Belum Diisi !</p>";
        } else {
            $nama_str = "";
        }
    ?>

    <form action="coba4_1.php" method="post">
        <fieldset>
            Nama <br/>
            <input type="text" name="nama"><?php echo $nama_str?><br>
            <br/>
            <input type="submit">
        </fieldset>
    </form>
</body>
</html>