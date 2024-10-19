<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>konversi Nilai</title>
    </head>
    <body>
        
    <?php
        $nama_str = "";
        $nilai_str = "";

        if (isset($_GET['nama'])) {  
            if ($_GET['nama'] == "0") {
                $nama_str = "<p style='color:red'>Nama Belum Diisi !</p>";
            }  else if ($_GET['nama'] == "1") {
                $nama_str = "<p style='color:red'>Nama hanya boleh mengandung huruf!</p>";
            }
        }

        if (isset($_GET['nilai_angka'])) {
            if ($_GET['nilai_angka'] == "0") {
                $nilai_str = "<p style='color:red'>Nilai Belum Diisi !</p>";
            } else if ($_GET['nilai_angka'] == "1") {
                $nilai_str = "<p style='color:red'>Nilai hanya boleh mengandung angka!</p>";
            }
        } 

    ?>

    <form action="getKonversi.php" method="post">
        <fieldset>
            Nama :<br/>
            <input type="text" name="nama" required><?php echo $nama_str?><br>
            <br/>
            Nilai Angka :<br/>
            <input type="text" name="nilai_angka" required><?php echo $nilai_str?><br>
            <br/><br/>
            <button type="submit" name="submit" value="submit">Konversi</button>
        </fieldset>
    </form>
</body>
</html>